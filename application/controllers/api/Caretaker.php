<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Caretaker extends CI_Controller {
    
    public $client_service = "smartschool";
    public $auth_key = "schoolAdmin@";

	public function __construct()
	{

		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
        $this->load->helper('language'); 
        $this->lang->load('site');
	}






public function testlist()
{
$admin_id=41;
 $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
$service_provider_region=explode(",",$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
$par=array();
foreach($service_provider_region as $res)
{
        $par=array_merge($par,selecto('participant',array('region'=>$res)));
    
}
echo '<pre>';
print_r($par);
//get_participant()


    
}


public function get_chart_type()
{
    
    $chart1=$this->db->get_where('chart_type',array('chart_type'=>1))->result_array();
    $chart2=$this->db->get_where('chart_type',array('chart_type'=>2,'in_out'=>'in'))->result_array();
    $chart3=$this->db->get_where('chart_type',array('chart_type'=>2,'in_out'=>'out'))->result_array();
    $data=array('chart1'=>$chart1,'chart2'=>$chart2,'chart3'=>$chart3);

     
if(!empty($data))
{
json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}
}


public function addblowel()
{
    
    $input= input();
    $user_id=$input['participant_id'];
    $date=date('d-m-Y');
    $time=date("H:i"); 
    $num=$this->db->get_where('BowelChart',array('user_id'=>$user_id,'date'=>$date,'time'=>$time))->num_rows();
    if($num==0)
    {
      $in['user_id']=$user_id;
      $in['date']=$date;
      $in['time']=$time;
      $in['observation']=$input['observation'];
      if($in['observation']=='Bowel open')
     {
         $in['size']=$input['size'];
         $in['type']=$input['type'];
     }
     else
     {
         $in['size']=$in['type']='';
     }
      $in['comment']=$input['comment'];
      $in['alert']=$input['alert'];
      
      
      
      $this->db->insert('BowelChart',$in);
      $inq=$this->db->insert_id();
      if($inq)
      {
         if($in['alert']==1)
         {
      $rt=array('note_id'=>$inq,'user_id'=>$in['user_id'],'alert_text'=>$in['observation'].'-'.$in['comment'],'date'=>date('d-m-Y'),'time'=>date("h:i:s a"),'isread'=>0);
        $this->db->insert('alert',$rt);
         }
          
      json_output(200, array('status' => true,'message' => 'Sucessfully Added'));
      }
    }
    else
    {
       json_output(200, array('status' => false,'message' => 'Allready Added'));
    }
}

public function blowelchart($user_id)
{
    $date=date('d-m-Y');
    $num=$this->db->get_where('BowelChart',array('user_id'=>$user_id,'date'=>$date))->num_rows();
    if($num==0)
    {
    json_output(200, array('status' => false,'message' => 'Empty list'));
    }
    else
    {
    $data=$this->db->get_where('BowelChart',array('user_id'=>$user_id,'date'=>$date))->result_array();
    json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get'));
    }
    
}



public function fluidechart($user_id)
{
    $date=date('d-m-Y');
    $num=$this->db->get_where('FluidChart',array('user_id'=>$user_id,'date'=>$date))->num_rows();
    if($num==0)
    {
    json_output(200, array('status' => false,'message' => 'Empty list'));
    }
    else
    {
    $data=$this->db->get_where('FluidChart',array('user_id'=>$user_id,'date'=>$date))->result_array();
    json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get'));
    }
    
}


public function add_fluid()
{
    
     $input= input();
     $user_id=$input['participant_id'];
     $date=date('d-m-Y');
     $time=date("H:i"); 
     $num=$this->db->get_where('FluidChart',array('user_id'=>$user_id,'date'=>$date,'time'=>$time))->num_rows();
      $in['user_id']=$user_id;
      $in['date']=$date;
      $in['time']=$time;
      $in['observation']=$input['observation'];
      $in['type']=$input['type'];
      if($input['type']=='In')
      {
      
      $in['fluid']=$input['fluid'];
      }
      
      $in['size']=$input['amount'];
      if(@$input['comment']!='')
      {
          $in['comment']=$input['comment'];
      }else
      {
          $in['comment']='';
      }
      
      $this->db->insert('FluidChart',$in);
      $in1=$this->db->insert_id();
      if($in1)
      {
          
       //   if($in['alert']==1)
         //{
      //$rt=array('note_id'=>$in1,'user_id'=>$in['user_id'],'alert_text'=>$in['observation'],'date'=>date('d-m-Y'),'time'=>date("h:i:s a"),'isread'=>0);
        //$this->db->insert('alert',$rt);
         //}
          
      json_output(200, array('status' => true,'message' => 'Sucessfully Added'));
      }
  
    else
    {
       json_output(200, array('status' => false,'message' => 'Try again'));
    }
}



public function view_risk($id)
{
    
    
    $p=array();
    $r=$this->db->get_where('riskassessments',array('id'=>$id))->result_array();
    foreach($r as $t)
    {
        $p['Hazard identified']=$t['hazard_identified'];
        $p['List Of Current Risk Control']=$t['list_current_risk_control'];
        $p['Risk Rating']=$this->db->get_where('risk_rating',array('id'=>$t['risk_rating']))->row()->name;
        $p['List of additional Control']=$t['list_additional_control'];
        $p['Additional measures implemented']=$t['additonal_mesure_imp'];
        $p['Date of creation']=$t['date_of_creation'];
        $p['Date of reassessment']=$t['date_of_reassesment'];
        
    }
    $data=$p;
if(!empty($data))
{
json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}
    
}

public function faq()
{
 
$data=$this->db->get_where('faq',array('status'=>1))->result_array();
if(!empty($data))
{
json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get faq'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}

    
}



public function task_in_detail($task_id)
{
$t=$this->db->get_where('task',array('id'=>$task_id))->result_array()[0];

if(!empty($t))
{

$task_done=$this->db->get_where('task_done',array('task_id'=>$task_id,'user_id'=>$t['user_id'],'time'=>$t['add_specific_time_of_day'],'date'=>date('d-m-Y')))->num_rows();
$data=array();
$data['TaskID']=@$t['id'];
$data['Task']=@$t['task_name'];
$data['Time']=@$t['add_specific_time_of_day'];
$data['Status']=$task_done==0?"Pending":"Complited";
$data['Task_At']=$t['every_days']!=NULL?' Task on Every '.$t['every_days'].' Day at '.$t["add_specific_time_of_day"].' OClock':'Task On '.$t['specific_day_of_the_week'].' at '.$t["add_specific_time_of_day"].' OClock';
$data['Care_Category']=select('care_cat',array('id'=>$t['cat_id']))[0]['name'];




if(!empty($data))
{
json_output(200, array('status' => true,'data'=>$data,'message' => 'Sucessfully get task'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}

}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}


    
}



public function get_count()
{
    $admin_id=$_GET['admin_id'];  //$admin_id=41;
    $participant_id=@$_GET['participant_id'];
    $notification=$data=$this->db->get_where('notification',array('admin_id'=>$admin_id,'read'=>0))->num_rows();
    if(isset($participant_id))
    {
     $alert=$this->db->get_where('alert',array('user_id'=>$participant_id,'isread'=>0))->num_rows();
     $task=$this->task_count($participant_id);
      $count=array('notification'=>$notification,'alert'=>$alert,'task'=>$task);
     }
else
{
    
$count=array('notification'=>$notification);
}


 json_output(200, array('status' => true,'data'=>$count,'message' => 'Sucessfully get count'));
     
}




public function task_count($user_id)
{
$monthy_starting_on=$started_on=date('Y-m-d');
$task_count=0;
$every_days_arr=array();
$this->db->group_by('cat_id'); 
$every_days1=$this->db->get_where('task',array('user_id'=>$user_id))->result_array();
foreach($every_days1 as $gd1)
{
$daily_to_array2=array();
$every_days=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id))->result_array();
foreach($every_days as $t)
{
$Timestamp = strtotime($t['started_on']);
$TotalTimeStamp = strtotime('+ '.$t['every_days'].' days', $Timestamp);
$dd=date('d-m-Y', $TotalTimeStamp); 
$Date1 = date('d-m-Y',$Timestamp);
$Date2 =date('d-m-Y');
$array = array();
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
  
  
  
  
  $ch=false;
  if($t['every_days']!=NULL)
  {
     for ($currentDate = $Variable1;
     $currentDate <= $Variable2; 
     $currentDate += (86400*$t['every_days'])
     )
     {
     $Store = date('Y-m-d', $currentDate);
     $array[] = $Store;
  }
  $ch=in_array(date('Y-m-d'),$array);
  }
  
  
  $specific_day_of_the_week=false;
  
  if($t['specific_day_of_the_week']!=NULL)
  {
  $specific_day_of_the_week=$t['specific_day_of_the_week']==date('D')?true:false;
  }
  
  $fortnightly_on=false;
  if($t['fortnightly_on']!=NULL)
  {
  $fortnightly_on=$t['fortnightly_on']==date('D')?true:false;
  }
  

if($ch==true OR $specific_day_of_the_week==true OR $fortnightly_on==true)
{  
$data=array();
$data['task_id']=$t['id'];
$data['name']=$t['task_name'];
$data['time']=$t['add_specific_time_of_day'];
$data['status']=$t['status'];
$data['cat_id']=$t['cat_id'];
$data['task_for_careplan']=$t['task_for_careplan'];



array_push($every_days_arr,$data);
$task_count++;
}
}  //2nd fr each loop
}



return $task_count;
}

public function read_notification_read_status()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
     $id=@$_GET['id'];
     $this->db->where('id',$id);
     $this->db->update('notification',array('read'=>1));
    }
}

public function update_task_state()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
     $id=@$_GET['id'];
     $status=@$_GET['status'];
  
  
$t=$this->db->get_where('task',array('id'=>$id))->result_array()[0];
  
     if($status==1)
     {
         
      $num=$this->db->get_where('task_done',array('task_id'=>$task_id,'user_id'=>$t['user_id'],'time'=>$t['add_specific_time_of_day'],'date'=>date('d-m-Y')))->num_rows();
      if($num==0){
      $task_done=$this->db->insert('task_done',array('task_id'=>$id,'user_id'=>$t['user_id'],'time'=>$t['add_specific_time_of_day'],'date'=>date('d-m-Y')));
      $this->db->where('id',$id);
      $this->db->update('task',array('status'=>1));
      }
       
         
     }
     else
     {
     
    $this->db->where('id',$id);
     $this->db->update('task',array('status'=>0));
  
  
         
         $this->db->where('task_id',$id);
         $this->db->where('user_id',$t['user_id']);
         $this->db->where('time',$t['add_specific_time_of_day']);
         $this->db->where('date',date('d-m-Y'));
         $this->db->delete('task_done');
     }
     
     
     
     json_output(200, array('status' => true,'message' => 'Status Updated Sucessfully'));
            
    
    
}
}

public function get_task_main()
{
$check_auth_client=check_auth_client();
if($check_auth_client == true) 
{
$input= input();
$user_id=$input['participant_id'];
$monthy_starting_on=$started_on=date('Y-m-d');
$this->db->group_by('cat_id');  
$get_daily=$this->db->get_where('task',array('user_id'=>$user_id,'every_days'=>'','monthy_starting_on'=>$monthy_starting_on,'started_on'=>$started_on))->result_array();
$daily_to_array=array();
foreach($get_daily as $gd1)
{
$get_daily1=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id,'every_days'=>'','monthy_starting_on'=>$monthy_starting_on,'started_on'=>$started_on))->result_array();
$daily_to_api=array();

foreach($get_daily1 as $gd)
{
$data=array();
$data['task_id']=$gd['id'];
$data['name']=$gd['task_name'];
$data['time']=$gd['add_specific_time_of_day'];
$data['status']=$gd['status'];
$data['cat_id']=$gd['cat_id'];
$data['task_for_careplan']=$gd['task_for_careplan'];
array_push($daily_to_api,$data); 
}
array_push($daily_to_array,array('Title'=>select('care_cat',array('id'=>$gd1['cat_id']))[0]['name'],'Task_List'=>$daily_to_api));
}

if(!empty($daily_to_array))
{
json_output(200, array('status' => true,'data'=>$daily_to_array,'message' => 'Sucessfully get task'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}
}
}

public function get_task()
{
$check_auth_client=check_auth_client();
if($check_auth_client == true) 
{
$input= input();
$user_id=$input['participant_id'];
$every_days_arr=array();
$this->db->group_by('cat_id'); 
$every_days1=$this->db->get_where('task',array('user_id'=>$user_id))->result_array();
foreach($every_days1 as $gd1)
{
$daily_to_array2=array();
$every_days=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id))->result_array();
foreach($every_days as $t)
{
$Timestamp = strtotime($t['started_on']);
$TotalTimeStamp = strtotime('+ '.$t['every_days'].' days', $Timestamp);
$dd=date('d-m-Y', $TotalTimeStamp); 
$Date1 = date('d-m-Y',$Timestamp);
$Date2 =date('d-m-Y');
$array = array();
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
  
  
  
  
  $ch=false;
  if($t['every_days']!=NULL)
  {
     for ($currentDate = $Variable1;
     $currentDate <= $Variable2; 
     $currentDate += (86400*$t['every_days'])
     )
     {
     $Store = date('Y-m-d', $currentDate);
     $array[] = $Store;
  }
  $ch=in_array(date('Y-m-d'),$array);
  }
  
  
  $specific_day_of_the_week=false;
  
  if($t['specific_day_of_the_week']!=NULL)
  {
  $specific_day_of_the_week=$t['specific_day_of_the_week']==date('D')?true:false;
  }
  
  $fortnightly_on=false;
  if($t['fortnightly_on']!=NULL)
  {
  $fortnightly_on=$t['fortnightly_on']==date('D')?true:false;
  }
  

if($ch==true OR $specific_day_of_the_week==true OR $fortnightly_on==true)
{  
    $num=$this->db->get_where('task_done',array('task_id'=>$t['id'],'user_id'=>$t['user_id'],'time'=>$t['add_specific_time_of_day'],'date'=>date('d-m-Y')))->num_rows();
      
$data=array();
$data['task_id']=$t['id'];
$data['name']=$t['task_name'];
$data['time']=$t['add_specific_time_of_day'];
$data['status']=$num==0?0:1;
$data['cat_id']=$t['cat_id'];
$data['task_for_careplan']=$t['task_for_careplan'];
$data['TaskID']=@$t['id'];
$data['Task']=@$t['task_name'];
$data['Time']=@$t['add_specific_time_of_day'];
$data['Status']=$num==0?"Pending":"Complited";
$data['Task_At']=$t['every_days']!=NULL?' Task on Every '.$t['every_days'].' Day at '.$t["add_specific_time_of_day"].' OClock':'Task On '.$t['specific_day_of_the_week'].' at '.$t["add_specific_time_of_day"].' OClock';
$data['Care_Category']=select('care_cat',array('id'=>$t['cat_id']))[0]['name'];


array_push($every_days_arr,$data);
}
}  //2nd fr each loop
}



  $newarray=array();
  foreach($every_days_arr as $key => $value)
  {
   $newarray[select('care_cat',array('id'=>$value['cat_id']))[0]['name']][$key] = $value;
  }
  $rr=array();
 foreach($newarray as $key=>$ttt)
  {
     $title=$key;
     $ttt=array_values($ttt);
     array_push($rr,array('Title'=>$title,'Task_List'=>$ttt));
     
     
  }
 
if(!empty($rr))
{
json_output(200, array('status' => true,'data'=>$rr,'message' => 'Sucessfully get task'));
}
else
{
json_output(200, array('status' => false,'message' => 'Empty list'));
}
}
}





public function gettasktest()
{
$user_id=10;
echo '<pre>';
/*
$monthy_starting_on=$started_on=date('Y-m-d');
$this->db->group_by('cat_id');  
$get_daily=$this->db->get_where('task',array('user_id'=>$user_id,'every_days'=>'','monthy_starting_on'=>$monthy_starting_on,'started_on'=>$started_on))->result_array();
$daily_to_array=array();
foreach($get_daily as $gd1)
{
$get_daily1=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id,'every_days'=>'','monthy_starting_on'=>$monthy_starting_on,'started_on'=>$started_on))->result_array();
$daily_to_api=array();
foreach($get_daily1 as $gd)
{
$data=array();
$data['task_id']=$gd['id'];
$data['name']=$gd['task_name'];
$data['time']=$gd['add_specific_time_of_day'];
$data['status']=$gd['status'];
$data['cat_id']=$gd['cat_id'];
$data['task_for_careplan']=$gd['task_for_careplan'];
array_push($daily_to_api,$data); 
}
array_push($daily_to_array,array('Title'=>select('care_cat',array('id'=>$gd1['cat_id']))[0]['name'],'Task_List'=>$daily_to_api));
}

//print_r($daily_to_array);

*/


$every_days_arr=array();
$this->db->group_by('cat_id'); 
$every_days1=$this->db->get_where('task',array('user_id'=>$user_id))->result_array();
foreach($every_days1 as $gd1)
{
$daily_to_array2=array();
$every_days=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id))->result_array();
foreach($every_days as $t)
{
$Timestamp = strtotime($t['started_on']);
$TotalTimeStamp = strtotime('+ '.$t['every_days'].' days', $Timestamp);
$dd=date('d-m-Y', $TotalTimeStamp); 
$Date1 = date('d-m-Y',$Timestamp);
$Date2 =date('d-m-Y');
$array = array();
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
  $ch=false;
  if($t['every_days']!=NULL)
  {
for ($currentDate = $Variable1;
     $currentDate <= $Variable2; 
     $currentDate += (86400*$t['every_days'])
     )
     {
     $Store = date('Y-m-d', $currentDate);
     $array[] = $Store;
  }
  
  

  $ch=in_array(date('Y-m-d'),$array);
  }
  $spe=false;
  if($t['specific_day_of_the_week']!=NULL)
  {
  $spe=$t['specific_day_of_the_week']==date('D')?true:false;
  }      
  

if($ch==true OR $spe==true)
{  
$data=array();
$data['task_id']=$t['id'];
$data['name']=$t['task_name'];
$data['time']=$t['add_specific_time_of_day'];
$data['status']=$t['status'];
$data['cat_id']=$t['cat_id'];
$data['task_for_careplan']=$t['task_for_careplan'];
array_push($every_days_arr,$data);
}
}  //2nd fr each loop
}
   $newarray=array();
  foreach($every_days_arr as $key => $value)
  {
   $newarray[select('care_cat',array('id'=>$value['cat_id']))[0]['name']][$key] = $value;
  }
  $rr=array();
  foreach($newarray as $key=>$ttt)
  {
     $title=$key;
     array_push($rr,array('Title'=>$title,'Task_List'=>$ttt));
 }






die(); 








$every_days_arr=array();
$this->db->group_by('cat_id'); 
$every_days1=$this->db->get_where('task',array('user_id'=>$user_id,'every_days'=>'','specific_day_of_the_week!='=>NULL))->result_array();
foreach($every_days1 as $gd1)
{
$daily_to_array2=array();
$every_days=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id'],'user_id'=>$user_id,'every_days'=>'','specific_day_of_the_week!='=>NULL))->result_array();
foreach($every_days as $t)
{
if($t['specific_day_of_the_week']==NULL AND $t['fortnightly_on']==NULL) 
{
$Timestamp = strtotime($t['started_on']);
$TotalTimeStamp = strtotime('+ '.$t['every_days'].' days', $Timestamp);
$dd=date('d-m-Y', $TotalTimeStamp); 
$Date1 = date('d-m-Y',$Timestamp);
$Date2 =date('d-m-Y');
$array = array();
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
for ($currentDate = $Variable1;
     $currentDate <= $Variable2; 
     $currentDate += (86400*$t['every_days'])
     )
     {
     $Store = date('Y-m-d', $currentDate);
     $array[] = $Store;
  }
$ch=in_array(date('Y-m-d'),$array);
if($ch==true)
{  
    $specific_day_of_the_week=explode(",",$t['specific_day_of_the_week']);
    $fortnightly_on=explode(",",$t['fortnightly_on']);
    $specific_day_of_the_week1=in_array(date('D'),$specific_day_of_the_week);

if($specific_day_of_the_week1==true)
{
$data=array();
$data['task_id']=$t['id'];
$data['name']=$t['task_name'];
$data['time']=$t['add_specific_time_of_day'];
$data['status']=$t['status'];
$data['cat_id']=$t['cat_id'];
$data['task_for_careplan']=$t['task_for_careplan'];
array_push($every_days_arr,$data);
}
}
}
}  //2nd fr each loop
}
$newarray=array();
    foreach($every_days_arr as $key => $value){
   $newarray[select('care_cat',array('id'=>$value['cat_id']))[0]['name']][$key] = $value;
}
$rr=array();
foreach($newarray as $key=>$ttt)
{
     $title=$key;
     array_push($rr,array('Title'=>$title,'Task_List'=>$ttt));
}
print_r($rr);



  die();
  




    
}








    

    


public function reject_shift()
{
    
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
     $input= input();
     $shift_id=$_GET['shift_id']; 
     $rejected_reson=$_GET['rejected_reason'];
     $get=$this->db->get_Where('shift',array('id'=>$shift_id))->result_array();
     if(!empty($get))
     {
        $get=$get[0];
        if($get['status']==2)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Rejected'));
        }
        else
        {
            if($rejected_reson=='')
            {
            json_output(200, array('status' => false,'message' => 'Rejection Reason must enter'));
            }
            elseif($get['status']==0)
            {
                
                $this->db->where('id',$shift_id);
                $this->db->update('shift',array('status'=>'2','rejected_reson'=>$rejected_reson));
                
                
         /*********/
         $participant=select('participant',array('id'=>$get['participant']))[0];
         $sh= get_single_shift($shift_id);
         $sh['participant_id']=$get['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $sh=json_encode($sh);
         $this->db->where('type','shift');
         $this->db->where('remote_id',$shift_id);
         $this->db->update('notification',array('data'=>$sh));
         /*********/
         
                json_output(200, array('status' => true,'message' => 'Shift Accepted Sucessfully'));
            }
            else
            {
            json_output(200, array('status' => false,'message' => 'Shift Must be in Pending State before it reject'));
            }
            
        }
    }
    }
    
    
    
    
}


public function get_notification()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
{
$input= input();
$admin_id=$input['admin_id']; 
//$admin_id=41;
$this->db->order_by('id','DESC');
$data=$this->db->get_where('notification',array('admin_id'=>$admin_id))->result_array();
$count=$this->db->get_where('notification',array('admin_id'=>$admin_id,'read'=>0))->num_rows();
  



if(!empty($data))
{
    json_output(200, array('status' => true,'data'=>$data,'count'=>$count,'message' => 'Successfully get '));
}
else
{
    json_output(200, array('status' => false,'message' => 'Dont Have any notification'));
}
    
   }
    
}


public function accept_shift($shift_id)
{
    
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
     $get=$this->db->get_Where('shift',array('id'=>$shift_id))->result_array();
     if(!empty($get))
     {
        $get=$get[0];
        if($get['status']==1)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Accepted'));
        }
        elseif($get['status']==2)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Rejected'));
        }
        else
        {
            if($get['status']==0)
            {
                
                $this->db->where('id',$shift_id);
                $this->db->update('shift',array('status'=>'1'));
         
         $participant=select('participant',array('id'=>$get['participant']))[0];
         $sh= get_single_shift($shift_id);
         $sh['participant_id']=$get['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $sh=json_encode($sh);
         $this->db->where('type','shift');
         $this->db->where('remote_id',$shift_id);
         $this->db->update('notification',array('data'=>$sh));
         
       
        
                
                
                json_output(200, array('status' => true,'message' => 'Shift Accepted Sucessfully'));
            
                
            }
            else
            {
            json_output(200, array('status' => false,'message' => 'Shift Must be in Pending State before it accept'));
            }
            
        }
    }
    }
    
}

public function formatcheck()
{
         $shift_start=str_replace('_',':','12_10'.'_00');
         $shift_end=str_replace('_',':','23_10'.'_00');
         $date2=$date=str_replace('_','-',"28_04_2022"." 00:00:01");
         $date2=DateTime::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d'); 
        // echo $date2.' '.$shift_start;
        
         $from = $date2.' '.$shift_start;
         $to = $date2.' '.$shift_end;
    
        
          echo $ShiftDuration=differenceInHours($from,$to);

}

public function accept_shift_with_update()
{       $shift_id=$_GET['shift_id'];

  if($_GET['shift_start']=='' AND $_GET['shift_end']=='' AND $_GET['date']=='')
  {
      json_output(200, array('status' => false,'message' => 'Data Invalid'));
  }
  else
  {
        $shift_start=str_replace('_',':',$_GET['shift_start']);
        $shift_end=str_replace('_',':',$_GET['shift_end']);
        $date2=$date=str_replace('_','-',$_GET['date']);
         $date1=date('Y-m-d',strtotime($date));
       
         $from = $date1.' '.$shift_start;
         $to = $date1.' '.$shift_end;
   
   
   
$ShiftDuration=$ShiftDuration=differenceInHours($from,$to);


     $get=$this->db->get_Where('shift',array('id'=>$shift_id))->result_array();
     if(!empty($get))
     {
        $get=$get[0];
        // if($get['status']==1)
        // {
        // json_output(200, array('status' => false,'message' => 'Shift Allready Accepted'));
        // }
        // else
        if($get['status']==2)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Rejected'));
        }
        else
        {
            //if($get['status']==0)
            //{
                
                $this->db->where('id',$shift_id);
                $this->db->update('shift',array('shift_duration'=>$ShiftDuration,'status'=>'1','shift_start'=>$shift_start,'shift_end'=>$shift_end,'date'=>$date1));
                
         
         $participant=select('participant',array('id'=>$get['participant']))[0];
         $sh= get_single_shift($shift_id);
         $sh['participant_id']=$get['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $sh=json_encode($sh);
         $this->db->where('type','shift');
         $this->db->where('remote_id',$shift_id);
         $this->db->update('notification',array('data'=>$sh));
         
       
        
                
                
                json_output(200, array('status' => true,'message' => 'Shift Accepted Sucessfully with new date or  time'));
            
                
            // }
            // else
            // {
            // json_output(200, array('status' => false,'message' => 'Shift Must be in Pending State before it accept'));
            // }
            
        }
    }
    }
}

public function accept_shift_with_update1()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
        $input= input();
        
        $data =json_encode($input).PHP_EOL;
$fp = fopen('accept_shift_with_update', 'a');
fwrite($fp, $data);
        $shift_id=$input['shift_id']; 
        $shift_start=$input['shift_start'];
        $shift_end=$input['shift_end'];
        $date1=$input['date'];
        

        $format = 'Y-m-d H:i';
        $date = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_start']);
        $from=$date->format('Y-m-d H:i') . "\n";
        $dateto = DateTime::createFromFormat($format, $_POST['date'].' '.$_POST['shift_end']);
        $to=$dateto->format('Y-m-d H:i') . "\n";
        $ShiftDuration=differenceInHours($from,$to);
      $ShiftDuration=number_format($ShiftDuration, 2, '.', '');

$ShiftDuration=2;



     $get=$this->db->get_Where('shift',array('id'=>$shift_id))->result_array();
     if(!empty($get))
     {
        $get=$get[0];
        if($get['status']==1)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Accepted'));
        }
        elseif($get['status']==2)
        {
        json_output(200, array('status' => false,'message' => 'Shift Allready Rejected'));
        }
        else
        {
            if($get['status']==0)
            {
                
                $this->db->where('id',$shift_id);
                $this->db->update('shift',array('shift_duration'=>$ShiftDuration,'status'=>'1','shift_start'=>$shift_start,'shift_end'=>$shift_end,'date'=>$date1));
                
         
         $participant=select('participant',array('id'=>$get['participant']))[0];
         $sh= get_single_shift($shift_id);
         $sh['participant_id']=$get['participant'];
         $sh['participant_name']=$participant['first_name'].' '.$participant['last_name'];
         $sh=json_encode($sh);
         $this->db->where('type','shift');
         $this->db->where('remote_id',$shift_id);
         $this->db->update('notification',array('data'=>$sh));
         
       
        
                
                
                json_output(200, array('status' => true,'message' => 'Shift Accepted Sucessfully with new date or  time'));
            
                
            }
            else
            {
            json_output(200, array('status' => false,'message' => 'Shift Must be in Pending State before it accept'));
            }
            
        }
    }
    }
    
}



public function get_single_shift($id)
{
    

 

  
    $shifts=$this->db->get_where('shift',array('id'=>$id))->result_array();

    $put=array();
    foreach($shifts as $s)
    {
      $participant=select('participant',array('id'=>$s['participant']));
      $date=date('Y-m-d');
      $shift=get_single_shift($id);   
      $ss=array();
      $single_participant_data=array('participant'=>$participant,'shift'=>$shift);
      array_push($put,$single_participant_data);
    }
    
    return $put;


}




public function get_timeline()
{
    
 //   
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
{
$input= input();
$admin_id=$input['admin_id'];  
//$admin_id=41;

if(@$_POST['date'])
{
    $this->db->group_by('participant'); 
    $shifts=$this->db->get_where('shift',array('employee'=>$admin_id,'date'=>$_POST['date']))->result_array();
    
}
else
{

    $this->db->group_by('participant'); 
    $shifts=$this->db->get_where('shift',array('employee'=>$admin_id))->result_array();
}

    $put=array();
    foreach($shifts as $s)
    {
      $participant=@select('participant',array('id'=>$s['participant']));
      $date=date('Y-m-d');
      $shift=get_shift($s['participant'],$date);   
      $ss=array();
      $single_participant_data=array('participant_info'=>@$participant[0],'shift'=>$shift);
      array_push($put,$single_participant_data);
    }
    

if(!empty($put))
{
    json_output(200, array('status' => true,'data'=>$put,'message' => 'Successfully get '));
}
else
{
    json_output(200, array('status' => false,'message' => 'Error Try again'));
}
}

}



public function get_appointment()
{
        $check_auth_client=check_auth_client();
        if($check_auth_client == true) 
        {
              $input= input();
$user_id=$input['user_id'];

$this->db->order_by('id','DESC');
$data=$this->db->get_where('appointment',array('user_id'=>$user_id))->result_array();

if(!empty($data))
{
    json_output(200, array('status' => true,'data'=>$data,'message' => 'Successfully get '));
}
else
{
    json_output(200, array('status' => false,'message' => 'Error Try again'));
}


        }     

    }


    public function add_appointment()
    {
        $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $input= input();

            $post['user_id']=$input['user_id'];
            $post['date']=$input['date'];
            $post['time']=$input['time'];
            $post['description']=$input['description'];
            $post['add_notes']=$input['add_notes'];
            $post['added_on']=date('d-m-Y h:s:i');
        
            $this->db->insert('appointment',$post);
            if($this->db->insert_id())
            {
                json_output(200, array('status' => true,'message' => 'Successfully added'));
            }
            else
            {
                json_output(200, array('status' => false,'message' => 'Error Try again'));
            }
    }

    }







    public function alert_read_status_update_with_id($id)
    {
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $alert_id=$id;
          $this->db->where('id',$alert_id);
          $this->db->update('alert',array('isread'=>1));
          json_output(200, array('status' => true, 'data'=>array(),'message' => 'Successfully Alert Read '));
    }
    }
    public function get_notes()
    {
  
      $check_auth_client=check_auth_client();
      if($check_auth_client == true) 
      {
            $input= input();
            $user_id=$input['user_id'];
            //$user_id=1;
            $note=$this->db->get_where('note',array('user_id'=>$user_id))->result_array();
    
            $notearray=array();
            foreach($note as $n)
            {
                $push=array();
                $push['id']=$n['id'];
                $push['note_type']=select('note_type',array('id'=>$n['note_type']))[0]['name'];
                $push['note']=$n['note'];
                $create_alert='No';
                if($n['create_alert']==1)
                {
                    $create_alert='Yes';
                }
                $push['create_alert']=$create_alert;
                $push['added_at']=date('d-m-Y',$n['added_at']);
                array_push($notearray,$push);
            }

            if(!empty($notearray))
            {
             json_output(200, array('status' => true, 'data'=>$notearray,'message' => 'Successfully get'));
            }
            else
            {
             json_output(200, array('status' => false, 'message' => 'Dont have any notes'));
                
            }
    }
    }


    public function incident_report_options()
    { 
        $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
        $incident_select=select('incident_select');
        $mechanism_injury=select('mechanism_injury');
        $nature_of_injury=select('nature_of_injury');
        $array=array('Incident Select'=>$incident_select,'Mechanism Injury'=>$mechanism_injury,'Nature Of Injury'=>$nature_of_injury);
        json_output(200, array('status' => true, 'data'=>$array,'message' => 'Successfully Get List'));
    }
    }

    public function get_perticular_incident()
    {
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $input= input();
          $user_id=$input['incident_id'];
          //$user_id=1;
          
          $this->db->order_by('id','DESC');
          $data=$this->db->get_where('incident',array('id'=>$user_id))->result_array()[0];
         
   $data['incident_type']=$this->db->get_where('incident_select',array('id'=>$data['incident_type']))->row()->name;
   $r=explode('","',$data['mechanism_injury']);
   $mechanism_injury=array();
   foreach($r as $rt)
   {
       $rs=str_replace('["','',$rt);
       $rs=str_replace('"]','',$rs);
       array_push($mechanism_injury,$this->db->get_where('mechanism_injury',array('id'=>$rs))->row()->name);
   }

   $mechanism_injury=implode(",",$mechanism_injury);
   $data['mechanism_injury']=$mechanism_injury;
   $r=explode('","',$data['nature_of_injury']);
   $mechanism_injury=array();
   foreach($r as $rt)
   {
       $rs=str_replace('["','',$rt);
       $rs=str_replace('"]','',$rs);
       array_push($mechanism_injury,$this->db->get_where('nature_of_injury',array('id'=>$rs))->row()->name);
   }

   $mechanism_injury=implode(",",$mechanism_injury);
   $data['nature_of_injury']=$mechanism_injury;

          if(!empty($data))
          {
           json_output(200, array('status' => true, 'data'=>$data,'message' => 'Successfully get'));
          }
          else
          {
           json_output(200, array('status' => false, 'message' => 'Dont have an incident data'));
              
          }
    }   
    }


    
  
    public function get_incident_list()
    {
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $input= input();
          $user_id=$input['user_id'];
      //    $user_id=1;
           $this->db->order_by('id','DESC');
          $data=$this->db->get_where('incident',array('user_id'=>$user_id))->result_array();
         
         $a=array();
           foreach($data as $d)
           {
               $incident_type=$this->db->get_where('incident_select',array('id'=>$d['incident_type']))->row()->name;
                array_push($a,array('incident_id'=>$d['id'],'incident_type'=>$incident_type,'Date'=>$d['date'],'Time'=>$d['time']));
           }
          if(!empty($data))
          {
           json_output(200, array('status' => true, 'data'=>$a,'message' => 'Successfully get'));
          }
          else
          {
           json_output(200, array('status' => false, 'message' => 'Dont have any incident'));
              
          }
    }   
    }




public function get_risk_assesments_list()
    {
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $input= input();
          $user_id=$input['user_id'];
         // $user_id=1;
          
          $this->db->order_by('id','DESC');
          $this->db->select('id,hazard_identified as name,date_of_reassesment as valid till ,status');
          $data=$this->db->get_where('riskassessments',array('user_id'=>$user_id))->result_array();

          if(!empty($data))
          {
           json_output(200, array('status' => true, 'data'=>$data,'message' => 'Successfully get'));
          }
          else
          {
           json_output(200, array('status' => false, 'message' => 'Dont have any risk assessement'));
              
          }
    }   
    }

public function get_alerts()
  {

    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
          $input= input();
          $user_id=$input['user_id'];
          $alert=select('alert',array('user_id'=>$user_id));
          $this->db->group_by('date');
          $alert=$this->db->get_where('alert',array('user_id'=>$user_id))->result_array();


        $data=array();
        foreach($alert as $a)
        {   $this->db->order_by('id','DESC');
            $alertq=$this->db->get_where('alert',array('user_id'=>$user_id,'date'=>$a['date']))->result_array();
            $array=array('date'=>$a['date'],'list'=>$alertq);
            array_push($data,$array);
        }

       if(!empty($data))
       {
        json_output(200, array('status' => true, 'data'=>$data,'message' => 'Successfully get'));
       }
       else
       {
        json_output(200, array('status' => false, 'message' => 'Dont have any alerts'));
           
       }
    }
 }
  
  public function test()
  {
      /*
     // $json="{'sada','rtret','fgfhfh'}";
      $json='{"user_id":"1","status":"status","incident_type":"41","time":"14:43:18","date":"12\/11\/2021","specific_location":"","description_of_incident":"","name_of_contact_detail_of_other_withness":"com.google.android.material.textfield.TextInputEditText{fdffab2 VFED..CL. ........ 0,0-1036,155 #7f0900ab app:id\/etxNameContactDtlOtherWit}","immediate_action_taken":"","next_of_kin_contacted":"Yes","was_anyone_injured":"Yes","name_of_person_injured":"41","injury_date":"41","contact_number_of_injured_person":"41","email_number_of_injured_person":"41","mechanism_injury":"[Slip\/tall\/Flip, Exposure to a biological agent (including body fluids), Manual handling]"}';
            
      $aii=json_decode($json,true);
      echo $r=$aii['mechanism_injury'];
      $pu=array('dfgfd','fggdfgfdg');
      $dat=json_encode($pu);
        $ary=json_decode($aii['mechanism_injury'],true);
        $r=str_replace("[","",$r);
        $r=str_replace("]","",$r);
         $rr=explode(',', $r);
      
     
      foreach($rr as $j)
      { //  echo $j;  echo '<br>';
         $rty=$this->db->get_where('mechanism_injury',array('name'=>$j))->result_array(); echo '<br>';    
         print_r($rty);
          echo '<br>';
          
      }
      
     die();
      */
  }

    public function add_incident()
    {
        $check_auth_client=check_auth_client();
        if($check_auth_client == true) 
        {
            
            
            
            $input= input();
            $in['user_id']=$input['user_id'];
            $in['status']=$input['status'];
            $in['incident_type']=$input['incident_type'];	
            $in['time']=$input['time'];
            $in['date']=$input['date'];
            $in['specific_location']=$input['specific_location'];
            $in['description_of_incident']=$input['description_of_incident'];
            $in['name_of_contact_detail_of_other_withness']=$input['name_of_contact_detail_of_other_withness'];
            $in['immediate_action_taken']=$input['immediate_action_taken'];
            $in['next_of_kin_contacted']=$input['next_of_kin_contacted'];
            $in['was_anyone_injured']=$input['was_anyone_injured'];
            $in['name_of_person_injured']=$input['name_of_person_injured'];
            $in['injury_date']=$input['injury_date'];
            $in['contact_number_of_injured_person']=$input['contact_number_of_injured_person'];
            $in['email_number_of_injured_person']=$input['email_number_of_injured_person'];
            $in['mechanism_injury']=@json_encode($input['mechanism_injury']);
            $in['mechanical_if_other']=$input['mechanical_if_other'];	
            $in['nature_of_injury']=@json_encode($input['nature_of_injury']);
            $in['nature_of_injury_if_other']=$input['nature_of_injury_if_other'];
            $in['specific_part_of_the_body_injured']=$input['specific_part_of_the_body_injured'];	
            $this->db->insert('incident',$in);
            if($this->db->insert_id())
            {
                json_output(200, array('status' => true, 'data'=>$in,'message' => 'Successfully Added'));
    
            }
            else
            {
            json_output(200, array('status' => false, 'message' => 'Failed !, Try again'));
            }

        } 
    }


    public function add_note()
    {
       
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $user_id=$input['user_id'];
    $note_type=$input['note_type'];
    $note=$input['note'];
    $create_alert=$input['create_alert'];
    $this->db->insert('note',array('added_at'=>strtotime(date('d-m-Y')),'user_id'=>$user_id,'note_type'=>$note_type,'note'=>$note,'create_alert'=>$create_alert));
    $insert_id=$this->db->insert_id();
    if($insert_id)
    {

    if($create_alert==1)
    {
    create_alert($insert_id,$input);
    } 
       
    json_output(200, array('status' => true,'message' => 'Successfully Added'));
    }
    else
    {
    json_output(200, array('status' => false, 'message' => 'Failed !, Try again'));
    }
    }
    }


public function get_note_type()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
     $note_type=select('note_type');
     $g=array();
     foreach($note_type as $key=>$val)
     {
       array_push($g,array('key'=>$val['id'],'val'=>$val['name']));
     }
    json_output(200, array('status' => true, 'data'=>$g,'message' => 'Successfully Get List'));
    }
}



  

public function achieve_goal()
{

    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $user_id=$input['goal_id'];
    
    $up['how']=$input['how'];
    $up['statergy_used']=$input['statergy_used'];
    $up['outcome']=$input['outcome'];
    $up['pic']=$input['pic'];
    $up['status']=$input['status'];
    

   $this->db->where('id',$user_id);
   $data=$this->db->update('goals',$up);
$affected_rows=$this->db->affected_rows();

 if($affected_rows!=0)
 {
    json_output(200, array('status' => true, 'data'=>$data,'message' => 'Successfully Updated'));
     
 }
 else
 {
    json_output(200, array('status' => false, 'message' => 'Error Try again'));
   
 }

    }
}


public function goals_in_details()
{

    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $id=$input['goal_id'];
    
   $data=select('goals',array('id'=>$id));

 if(!empty($data))
 {
    json_output(200, array('status' => true, 'data'=>$data[0],'message' => 'Successfully get'));
     
 }
 else
 {
    json_output(200, array('status' => false, 'message' => 'You dont Have any goal'));
   
 }

    }
}


public function goals()
{

    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $user_id=$input['user_id'];
    
    $goal_type=$input['goal_type'];
    
   // $user_id=1;
 //  $goal_type='Short';
   $data=select('goals',array('user_id'=>$user_id,'goal_type'=>$goal_type));
   
 if(!empty($data))
 {
    json_output(200, array('status' => true, 'data'=>$data,'message' => 'Successfully get'));
     
 }
 else
 {
    json_output(200, array('status' => false, 'message' => 'You dont Have any goal'));
   
 }

    }
}
    public function participant_data()
    {
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $id=$input['id'];
    //$id=2;
    $primary_care_plan=select('primary_care_plan',array('user_id'=>$id));
    if(!empty($primary_care_plan))
    {
     $primary_care_plan[0]['plan_name']='Primary Care Plan';
     $primary_care_plan[0]['valid_till']=(json_decode($primary_care_plan[0]['data'],true)['care_profile_review_date']);
     //$primary_care_plan[0]['valid_till']=date('d-m-Y');
     
     $primary_care_plan=array('Primary Care Plan'=>$primary_care_plan[0]);
     $this->db->select('other_care_plan.*');
     $this->db->select('care_cat.name as plan_name');
     $this->db->from('other_care_plan');
     $this->db->join('care_cat', 'care_cat.id = other_care_plan.care_plan');
     $this->db->where('other_care_plan.user_id', $id);
     $query = $this->db->get()->result_array();
     $rt=array();
     foreach($query  as $q)
     {  
      $q['date']=date('d-m-Y ',$q['date']);
      $q['valid_till']=date('d-m-Y ',$q['valid_till']);
      if($q['status']==0){ $q['status']='Active';} else {$q['status']='De-Active';}
      $rt=array_merge($rt,array($q));
     }
     $rt1=array('Other Care Plan'=>$rt);
     $out=array_merge($primary_care_plan,$rt1);
     json_output(200, array('status' => true, 'data'=>$out,'message' => 'Successfully Get List'));
   }
  else
  {
      json_output(200, array('status' => false, 'message' => 'You dont Have Primary Care Plan , please Ask admin to add'));
  }




    }

}




public function get_participant()
{   
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $admin_id=$input['admin_id'];
  //$admin_id=41;
/***********OLD *************/
    $par=selecto('participant',array('caretaker_id'=>$admin_id));
 //   $par=selecto('participant');
/***********/    
    
/***********NEW******************/
$service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
$service_provider_region=explode(",",$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
$par=array();
foreach($service_provider_region as $res)
{
$par=array_merge($par,selecto('participant',array('region'=>$res)));
}
/***********/





    $count=$this->db->get_where('notification',array('admin_id'=>$admin_id,'read'=>0))->num_rows();
 
     if(!empty($par))
     {
     json_output(200, array('status' => true, 'data'=>$par,'count'=>$count,'message' => 'Successfully get'));
     }
     else
     {
         
    json_output(200, array('status' => false, 'message' => 'You dont Have any Participant'));
     }
    }

}



public function get_additinal_careplan()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $user_id=$input['other_care_plan_id'];
    $this->db->select('allied_helth_plan.name as Care Plan,plan_review_date as Plan Review Date,assesment_description as Assessement Description,
    stratergies as Strategies,add_task_for_support_worker as Add tasks for support workers?,valid_till as Plan Review Date');
    $this->db->from('other_care_plan');
    $this->db->where('other_care_plan.id', $user_id);
    $this->db->join('allied_helth_plan', 'allied_helth_plan.id = other_care_plan.care_plan', 'left');
    $query = $this->db->get()->result_array();  
    $query[0]['Plan Review Date']=date('d-m-Y',$query[0]['Plan Review Date']);
    if(!empty($query))
    {
    json_output_object(200, array('status' => true, 'data'=>$query[0],'message' => 'Successfully Feached List'));
    }
    else
    {
    json_output(200, array('status' => false, 'message' => 'You dont Have any Plans')); 
    }
    }

}


public function get_primary_plan()
{

    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
$admin_id=$input['user_id'];
//$admin_id=10;
$data=select('primary_care_plan',array('user_id'=>$admin_id));

if(!empty($data))
{
$data=$data[0];
$send=json_decode($data['data'],true);

$send_array=array();
foreach($send as $key=>$val)
{
    if(!is_array($val))
    {
    //    if($val!='' AND $val!='No')
  if($val!='' AND $val!='No' AND $val!='no' )

        {
        array_push($send_array,array('key'=>trans($key),'val'=>$this->land_c($val)));
        }
    }
    else
    {
        
          
        array_push($send_array,array('key'=>trans($key),'val'=>$this->land_c(implode(',',$val))));
    }   
}
json_output(200, array('status' => true, 'data'=>$send_array,'message' => 'Successfully Feached List'));
  

}
else
{

    json_output(200, array('status' => false, 'message' => 'User dont Have any Primary care plan'));
}
    }
}










function land_c($string)
{
    $r=$this->lang->line($string);
    if($r=='')
    {
        return  $string;
    }
    else
    {
        return $r;
    }
}





public function update_password()
{
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $input= input();
    $admin_id=$input['admin_id'];
    $current_password=$input['current_password'];
    $new_password=$input['new_password'];

    $response=@select('ci_admin',array('admin_id'=>37))[0];
    if(!empty($response))
    {
    $validPassword = password_verify($current_password, $response['password']);
	if($validPassword==1)
    {

        $data = array(
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
            'updated_at' => date('Y-m-d : h:m:s'),
            );
        
    $data = $this->security->xss_clean($data);
    $this->db->where('admin_id', $admin_id);
    $this->db->update('ci_admin', $data);
    }	
    else
    {
    json_output(400, array('status' => false, 'message' => 'You  Have Enterd Wrong Current Password'));
    }    

    }
    else
    {
    json_output(400, array('status' => false, 'message' => 'Action Not Valid'));
    }

}
  }


    public function update_profile()
    {
    $input= input();
    $admin_id=$input['admin_id'];
    $email=$input['email'];
    $firstname=$input['firstname'];
    $lastname=$input['lastname'];
    $check_auth_client=check_auth_client();
    if($check_auth_client == true) 
    {
    $response = $this->auth_model->check_user_mail($email);
    if($response['admin_id']!=$admin_id AND  !empty($response))
     {
     json_output(400, array('status' => false, 'message' => 'Email Allready in Use'));
     }
     else
     {
     
     $data = array(
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'updated_at' => date('Y-m-d : h:m:s'),
    );
    $data = $this->security->xss_clean($data);
    $this->db->where('admin_id', $admin_id);
    $this->db->update('ci_admin', $data);
    $response = $this->auth_model->check_user_mail($email);
    json_output(200, array('status' => true, 'data'=>$response,'message' => 'Successfully Updated'));
}
}
}




public function get_profile()
{


$input= input();
$admin_id=$input['admin_id'];
//$admin_id=41;
$check_auth_client=check_auth_client();
if ($check_auth_client == true) 
{
$response = @selecto('ci_admin',array('admin_id'=>$admin_id))[0];
$response->photo=base_url().'/uploads/profile/'.$response->photo;
 if(empty($response))
 {
 json_output(400, array('status' => false, 'message' => 'User Not Exits'));
 }
 else
 {
 json_output_object(200, array('status' => true, 'data'=>$response,'message' => 'Successfully Get user Data'));
 } 
}
}





}
?>