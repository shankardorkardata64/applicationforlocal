<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
        $this->load->model('admin/financial_model', 'financial');
    }

    public function timesheetjson()
    {
         // POST data
         $postData=$serchq='';
         if($_POST)
         {
             $postData = $this->input->post();
         
             $serchq='';
         }
 
         // Get data
         $data = $this->admin->timesheetjson('shift',$serchq,$postData);
        // print_r($data);
         echo json_encode($data);
    }
    

	function filterdata()
	{

		$this->session->set_userdata('r',$this->input->post('r'));
		$this->session->set_userdata('p',$this->input->post('p'));
		$this->session->set_userdata('s',$this->input->post('s'));
		$this->session->set_userdata('last_query','');
        
	}
	
	function list_data(){
		


 	   if($this->session->userdata('r')!='')

			$this->db->where('region',$this->session->userdata('r'));

		if($this->session->userdata('p')!='')

			$this->db->where('participant',$this->session->userdata('p'));

		if($this->session->userdata('s')!='')

			$this->db->where('employee',$this->session->userdata('s'));
        
        
        $this->db->where('status',1);
        $data['shift']=$this->db->get('shift')->result_array();
        $this->session->set_userdata('last_query',$this->db->last_query());
        
		$this->load->view('admin/shift/timesheetlist',$data);
	}


public function export()
{
    $q=$this->session->userdata('last_query');
    $shift=$this->db->query($q)->result_array();
   // echo '<pre>'; print_r($re);
    
   $filename = 'timesheet'.time().'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
   $file = fopen('php://output', 'w');
    $header = array("Participant","Shift type","Location","Date","From","To","Support Worker"); 
     fputcsv($file, $header);
     foreach($shift as $key=>$s)
     { 
                    $emp=select('ci_admin',array('admin_id'=>$s['employee']))[0];
   		        	$en=$emp['firstname'].' '.$emp['lastname'];
		            fputcsv($file,array(@select('participant',array('id'=>$s['participant']))[0]['first_name'],
		            $s['shift_type'],
		            $s['shift_location'],
		            $s['date'],
		            date('h:i:s a',strtotime($s['shift_start'])),
		            date('h:i:s a',strtotime($s['shift_end'])),
		            $en
		            )); 
     }
     fclose($file); 
}
public function timesheet()
{
    
    $this->session->set_userdata('r','');
    $this->session->set_userdata('p','');
    $this->session->set_userdata('s','');
    //$data['shift']=select('shift',array('status'=>1));
    $data['title'] = 'Timesheet';
    lv('shift/timesheet',$data);
    
        
}

public function timesheet_old()
{
    if($_POST)
    {
         $r=$this->input->post('r'); // die();
         $this->session->set_userdata('r',$r);
         $r=$this->input->post('p'); // die();
         $this->session->set_userdata('p',$r);
         $r=$this->input->post('s'); // die();
         $this->session->set_userdata('s',$r);
    }
    else
    {
    $this->session->set_userdata('r','');
    $this->session->set_userdata('p','');
    $this->session->set_userdata('s','');
    }
    
    $data['shift']=select('shift',array('status'=>1));
    $data['title'] = 'Timesheet';
    lv('shift/timesheet',$data);
    
        
    }


public function ajaxtest()
{
    $this->load->helper('ajax');
    echo get_user_list_with_participant(4);
    
}

public function get_participant_data()
{   
    $id= $this->input->post('participant_id');
    $data=$this->db->get_where('participant',array('id'=>$id))->result_array()[0];
        $this->load->helper('ajax');
    $option=get_user_list_with_participant($id);
$data['option']=$option;
echo json_encode($data);
}

public function view($dydate='')
{
    
    perm(17);

   if($_POST)
   {
        $res=$_POST['res'];
        $date = strtotime($_POST['from']); 
        $data['employee']=$this->input->post('employee');
        $this_week_start = date("Y-m-d",$date);  //1650272400
      //  $this->session->set_userdata('fromdate',$date);
        $this_week_end = date("Y-m-d", strtotime("+6 day", $date));
  
   }
   else
   {
    $res='';
    $data['employee']='';

    if($dydate=='')
    {
    $monday = strtotime("last monday");
    }
    else
    {
    $monday=$dydate;
    }
    
    if($this->session->userdata('monday')!='' AND  $this->session->userdata('monday')!=$dydate)
    {
        //$monday=$this->session->userdata('monday');
    }
  //  echo $dydate; // die();
   // $this->session->set_userdata('fromdate',$monday);
 
    $this->session->set_userdata('monday',$monday);
    //$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
    //$monday=$monday+7*86400;
    
     $sunday = strtotime(date("Y-m-d",$monday)." +7 days");
     $this_week_start = date("Y-m-d",$monday);
    
    $this_week_end = date("Y-m-d",$sunday);
    }

    $data['res']=$res;
    $data['from']=$this_week_start;
    $data['to']=$this_week_end;
    $data['title'] = 'View Shift';
    //echo '<pre>'; print_r($data); die();
    
    lv('shift/view',$data);
}


public function ressign($id='')
{   perm(25);
    if($_POST)
    {
        
        $data=$_POST;
        $id=$_POST['id'];
        unset($data['submit']);
        unset($data['id']);
        $data['status']='0';
        
        $this->db->where('id',$id);
        $this->db->update('shift',$data);
        
        $this->session->set_flashdata('success', 'Shift Request ressigned to other support care sucesfully!');
        redirect(base_url('admin/shift/view/'.$id));
    }
    else
    {
    $data['id']=$id;    
    $data['title'] = 'Reassign Shift';
    lv('shift/ressign',$data);
    }
}


public function request_again($id='')
{  perm(25);
    $this->db->where('id',$id);
    $this->db->update('shift',array('status'=>0));
    $this->session->set_flashdata('success', 'Shift Request again Assisgned sucesfully!');
    redirect(base_url('admin/shift/edit/'.$id));
}

public function copy()
{
    perm(23);
$data=$this->db->get_where('shift',array('id'=>$_POST['id']))->result_array()[0];
if($data['date']==$_POST['date'])
{
    
    $this->session->set_flashdata('error', 'Shift datetime Confilct , please check date and time!');
    redirect(base_url('admin/shift/view/'));
}
unset($data['id']);
$todate=$_POST['todate'];
if($todate=='')
{
    $todate=$_POST['date'];
}
$p=date_range(($_POST['date']), $todate);

foreach($p as $d)
{
$data['date']=$d;
$data['status']='0';
$this->db->insert('shift',$data);
}
$insertid=$this->db->insert_id();
        
        
        if($insertid)
        {
        $data['id']=$insertid;
        $participant=select('participant',array('id'=>$data['participant']))[0];
       
      
         $sh= get_single_shift($insertid);
         $sh['participant_id']=$data['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
       
        
        $add_notification=array('remote_id'=>$insertid,'admin_id'=>$data['employee'],'type'=>'shift','notification'=>'Hey You have new Shift added by Admin Please confirm','data'=>json_encode($sh),'date'=>date("d-m-Y h:i:sa"));
        add_notification($add_notification);
        }      
        $this->session->set_flashdata('success', 'Shift added sucesfully!');
       if($this->session->userdata('fromdate'))
        {
             redirect(base_url('admin/shift/view/'.$this->session->userdata('fromdate')));
        }
        else
        {
             redirect(base_url('admin/shift/view'));
        }
    
}

public function add()
{
    
    perm(23);
    
    
    if($_POST)
    {
        
        $data=$_POST;

        $participant=select('participant',array('id'=>$_POST['participant']))[0];
       
        $format = 'Y-m-d H:i';
        $date = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_start']);
        $from=$date->format('Y-m-d H:i') . "\n";
        
        $dateto = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_end']);
         $to=$dateto->format('Y-m-d H:i') . "\n";
        
        $ShiftDuration=differenceInHours($from,$to);
        $ShiftDuration=number_format($ShiftDuration, 2, '.', '');

       // $ShiftDuration=differenceInHours($_POST['shift_start'],$_POST['shift_end']); 
        $data['shift_start']=($_POST['shift_start']);
        $data['shift_end']=($_POST['shift_end']);
        $data['latlng']=($_POST['other_location']);
        $data['shift_duration']=$ShiftDuration;
        $data['region']=$participant['region'];
        unset($data['submit']);
        //echo '<pre>'; print_r($data); die();
        $this->db->insert('shift',$data);
        $insertid=$this->db->insert_id();
        
        
        if($insertid){
        $data['id']=$insertid;
        
      
         $sh= get_single_shift($insertid);
         $sh['participant_id']=$_POST['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
       
        
        $add_notification=array('remote_id'=>$insertid,'admin_id'=>$_POST['employee'],'type'=>'shift','notification'=>'Hey You have new Shift added by Admin','data'=>json_encode($sh),'date'=>date("d-m-Y h:i:sa"));
        add_notification($add_notification);
        }      
        $this->session->set_flashdata('success', 'Shift added sucesfully!');
        
        if($this->session->userdata('fromdate'))
        {
             redirect(base_url('admin/shift/view/'.$this->session->userdata('fromdate')));
        }
        else
        {
             redirect(base_url('admin/shift/view'));
        }
       
    }
    else
    {
    $data['title'] = 'Add Shift';
    lv('shift/add',$data);
    }
 }


 public function edit($id='')
{  perm(25);
    if($_POST)
    {
        
        $data=$_POST;
        $id=$_POST['id'];

        $format = 'Y-m-d H:i';
        $date = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_start']);
        $from=$date->format('Y-m-d H:i') . "\n";
        
        $dateto = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_end']);
         $to=$dateto->format('Y-m-d H:i') . "\n";
        
        $ShiftDuration=differenceInHours($from,$to);
        
        $ShiftDuration=number_format($ShiftDuration, 2, '.', '');

        $data['shift_start']=($_POST['shift_start']);
        $data['shift_end']=($_POST['shift_end']);
        $data['shift_duration']=$ShiftDuration;
        unset($data['submit']);
        unset($data['id']);
        $this->db->where('id',$id);
        $this->db->update('shift',$data);
        if($data['status']==1)
        {
         $participant=select('participant',array('id'=>$_POST['participant']))[0];
         $sh= get_single_shift($id);
         $sh['participant_id']=$_POST['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $add_notification=array('remote_id'=>$id,'admin_id'=>$_POST['employee'],'type'=>'shift','notification'=>'Hey You have new Shift added by Admin','data'=>json_encode($sh),'date'=>date("d-m-Y h:i:sa"));
         add_notification($add_notification);
        }
        
        
        
       // $data['id']=$insertid;
       /* $add_notification=array('remote_id'=>$insertid,'admin_id'=>$_POST['employee'],'type'=>'shift','notification'=>'Hey Your Shift editd  by Admin','data'=>json_encode($data),'date'=>date("d-m-Y h:i:sa"));
        add_notification($add_notification);
        
        
           $participant=select('participant',array('id'=>$get['participant']))[0];
         $sh= get_single_shift($shift_id);
         $sh['participant_id']=$get['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $sh=json_encode($sh);
         $this->db->where('type','shift');
         $this->db->where('remote_id',$shift_id);
         $this->db->update('notification',array('data'=>$sh));
        
        */
        
        
        $this->session->set_flashdata('success', 'Shift updated sucesfully!');
        redirect(base_url('admin/shift/edit/'.$id));
    }
    else
    {
    $data['id']=$id;    
    $data['title'] = 'Edit Shift';
    lv('shift/edit',$data);
    }
 }



}