<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Financial extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
    //    $this->rbac->check_module_access();
        $this->load->model('admin/financial_model', 'financial');
		//$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }



    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/xlsx', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'xlsx')){
                return true;
            }else{
                $this->session->set_flashdata('success', 'Please select only XLSX file to upload.');
                return false;
            }
        }else{
            $this->session->set_flashdata('success', 'Please select a XLSX file to upload.');
            return false;
        }
    }


    public function import(){
        $data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('importSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'XLSX file', 'callback_file_check');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('SimpleXLSX');
                    
                    // Parse data from CSV file
                     $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
                     $header_values = $rows = [];

                    // Insert/update CSV data into database
                    if(!empty($xlsx))
                    {
                    foreach ( $xlsx->rows() as $k => $r ) 
                    {
	            	if ( $k === 0 ) {
			        $header_values = $r;
			        continue;
		            }
		            $rows[] = array_combine( $header_values, $r );
	                }

	

foreach($rows as $key=>$val)
{
      $data=array();
     $data = array(
    'catalogue'=>$this->input->post('catalogue'),
    'cat_num' => $val['Support Category Number'],
    'cat_name' => $val['Support Category Name'],
    'item_num' => $val['Support Item Number'],
    'item_name' => $val['Support Item Name'],
    'price' => $val['Price'],
    'unit' => $val['Unit'],
    'distance' =>$val['$/km'],
    );
   
$num=$this->db->get_where('support_category',array('catalogue'=>$this->input->post('catalogue'),'cat_num'=>$row['Support Category Number'],'item_num'=>$row['Support Item Number']))->num_rows();
if($num==0) 
{
$this->financial->insertsupportcat($data);
}
else
{

         $data=array();
         $data = array(
        'cat_name' => $val['Support Category Name'],
        'item_name' =>$val['Support Item Name'],
        'price' => $val['Price'],
        'unit' => $val['Unit'],
        'distance' =>$val['$/km'],
        );
        $this->db->where('catalogue',$this->input->post('catalogue'));
        $this->db->where('cat_num',$val['Support Category Number']);
        $this->db->where('item_num',$val['Support Item Number']);
        $this->db->update('support_category',$data);

}
    
}


                       
                        $successMsg='done';
                        $this->session->set_flashdata('success', $successMsg);
                    }
                }else{
                    $this->session->set_flashdata('success', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->set_flashdata('success', 'Invalid file, please select only XLSX file.');
            }
        }
        redirect('admin/financial/support');
    }
    



    
    public function import2(){
        $data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('importSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('file', 'XLSX file', 'callback_file_check');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                   // Load CSV reader library
                    $this->load->library('SimpleXLSX');
                    
                    // Parse data from CSV file
                     $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
                     $header_values = $rows = [];

                    // Insert/update CSV data into database
                    if(!empty($xlsx))
                    {
                    foreach ( $xlsx->rows() as $k => $r ) 
                    {
	            	if ( $k === 0 ) {
			        $header_values = $r;
			        continue;
		            }
		            $rows[] = array_combine( $header_values, $r );
	                }
                    
                        
                    }
	
                 
                    if(!empty($xlsx))
                   {
                        
                        
                        
foreach($rows as $key=>$val)
{
        $data=array();
        $data = array(
        'empcontract_id' => $this->input->post('emp_contract'),
        'emptype_id' => $this->input->post('emp_type'),
        'classification_id' => $this->input->post('emp_class'),
         'pre_award' => $this->input->post('empcontract_id'),
        'hourly_rate' => $val['A'],
        'saturday' => $val['B'],
        'sunday' => $val['C'],
        'publicholiday' => $val['D'],
        'aftshift' => $val['E'],
        'nigshift' => $val['F'],
        'overtimefirst' => $val['G'],
        'overtimesec' => $val['H'],
        'overtimethird' => $val['I'],
        'lessten' => $val['J'],
        'brokenshift' => $val['K'],
    );


//    $this->db->insert('emppay_guide',$data);
$this->financial->insertemppay($data);
    
}
                        
                        $successMsg='done';
                        $this->session->set_flashdata('success', $successMsg);
                    }
                }else{
                    $this->session->set_flashdata('success', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->set_flashdata('success', 'Invalid file, please select only XLSX file.');
            }
        }
        redirect('admin/financial/employeepay');
    }
    

















public function index($type='')
{       	perm(28);

    if($_POST)
    {
        $this->session->set_userdata('filter_type','');
        $this->session->set_userdata('filter_keyword',$_POST['keyword']);
        $this->session->set_userdata('filter_status','');
        
    }
    else
    {
        $this->session->set_userdata('filter_type',$type);
        $this->session->set_userdata('filter_keyword','');
        $this->session->set_userdata('filter_status','');
    }
        $data['list'] = $this->financial->get();
        $data['title'] = 'All Allownce';
        $data['ajaxurl']='financial/allallowance';
        lv('financial/index',$data);
}

public function allallowance()
{
    perm(28);
  $data['list'] = $this->financial->get();
  $this->load->view('admin/financial/allallowance',$data);
}

public  function getallowance($id) {
    perm(28);
        $data = $this->financial->getallowance($id);

        echo json_encode($data);
    }

public function addallowance()
{  perm(27);
    $this->rbac->check_operation_access(); // check opration permission

    //echo "addallownce";

   $name= $this->input->post('name');
   $rate= $this->input->post('rate');
   $frequency= $this->input->post('frequency');

   if(!empty($name))

   {

    $data = array(
                        'name' => $name,
                        'rate' => $rate,
                        'frequency' => $frequency,
                    );

    $this->financial->insert($data);

    $this->session->set_flashdata('success', 'Allowance has been added successfully!');
                        redirect(base_url('admin/financial/index'));

   }
   else
   {

    redirect(admin/financial/index);
   }
    
    $data['title'] = 'Add Allownce';
    lv('Financial/addallownce',$data);


}

function deleteallowance($id=''){
    perm(30);

        $this->financial->deleteallowance($id);

        // Activity Log 
     //   $this->activity_model->add_log(6);

        $this->session->set_flashdata('success','Allowance has been Deleted Successfully.'); 
        redirect(base_url('admin/financial/index'));
    }

public function editallowance()
{ perm(29);
    $id=$_POST['id'];
    $name=$_POST['name'];
    $rate=$_POST['rate'];
    $frequency=$_POST['frequency'];
if(!empty($id))

   {
    $data = array(
                         'id'=> $id,
                        'name' => $name,
                        'rate' => $rate,
                        'frequency' => $frequency,
                    );


    $this->financial->Updateallowance($data);
}

 $this->session->set_flashdata('success','Allowance has been Updated Successfully.'); 
        redirect(base_url('admin/financial/index'));

   
}

// Support Category operations

public function support($type='')
{      perm(32);

    
    if($_POST)
    {
        $this->session->set_userdata('filter_type','');
        $this->session->set_userdata('filter_keyword',$_POST['keyword']);
        $this->session->set_userdata('filter_status','');
        
    }
    else
    {
        $this->session->set_userdata('filter_type',$type);
        $this->session->set_userdata('filter_keyword','');
        $this->session->set_userdata('filter_status','');
    }

    
         $data['list'] = $this->financial->get_supportcat();
        $data['title'] = 'Support Category List';
        $data['ajaxurl']='financial/allsupportcat';
        lv('financial/support',$data);
}

public function allsupportcat()
{
    perm(32);
  $data['list'] = $this->financial->get_supportcat();
  $this->load->view('admin/financial/allsupportcat',$data);
}

public function addsuportcat()
{ perm(31);
    //echo "addallownce";
    $cat_no= $this->input->post('cat_no');
   if(!empty($cat_no))

   {

                      $data = array(
                        'cat_num' => $cat_no,
                        'catalogue' => $this->input->post('catalogue'),
                        'cat_name' => $this->input->post('cat_name'),
                        'item_num' => $this->input->post('item_no'),
                        'item_name' => $this->input->post('item_name'),
                        'price' => $this->input->post('price'),
                        'unit' => $this->input->post('unit'),
                        'distance' => $this->input->post('distance'),
                    );

    $this->financial->insertsupportcat($data);

    $this->session->set_flashdata('success', 'Category has been added successfully!');
                        redirect(base_url('admin/financial/support'));

   }
   else
   {

    redirect('admin/financial/index');
   }
    
    $data['title'] = 'add Suport Category';
    lv('Financial/addallownce',$data);


}
public function editsupportcat()
{  perm(33);
    $id=$_POST['id'];
    $catalogue=$_POST['catalogue'];
    $cat_num=$_POST['cat_num'];
    $cat_name=$_POST['cat_name'];
    $item_num=$_POST['item_num'];
    $item_name=$_POST['item_name'];
    $unit=$_POST['unit'];
    $price=$_POST['price'];
    $distance=$_POST['distance'];
    
if(!empty($id))

   {
    $data = array(
                         'id'=> $id,
                         'catalogue'=> $catalogue,
                         'cat_num' => $cat_num,
                        'cat_name' => $cat_name,
                        'item_num' => $item_num,
                        'item_name' => $item_name,
                        'unit'=>$unit,
                        'price'=> $price,
                        'distance'=>$distance,
                    );


    $this->financial->Updatesupportcat($data);
}
$this->session->set_flashdata('success','Category has been Updated Successfully.'); 
        redirect(base_url('admin/financial/support'));

   
}

function deletesupportcat($id=''){
    perm(34);
      //  $this->rbac->check_operation_access(); // check opration permission

        $this->financial->deletesupportcat($id);

        // Activity Log 
     //   $this->activity_model->add_log(6);

        $this->session->set_flashdata('success','Category has been Deleted Successfully.'); 
        redirect(base_url('admin/financial/support'));
    }

    public function employeepay($type='')
{

    perm(36);
   $this->session->set_userdata('filter_type',$type);
        $this->session->set_userdata('filter_keyword','');
        $this->session->set_userdata('filter_status','');
         $data['list'] = $this->financial->get_emppay();
        $data['title'] = 'Employee Pay Guide';
        $data['ajaxurl']='financial/emppay';
        lv('financial/employeepay',$data);
}

    public function emppay()
{
 
  $data['list'] = $this->financial->get_emppay();
  $data['classification'] = $this->financial->get_emp_classification();
  $data['type'] = $this->financial->get_emptype();
  $data['contract'] = $this->financial->get_empcontract();
  $data['award'] = $this->financial->getAward();
  $this->load->view('admin/financial/emppay',$data);
}

public function addemppay()
{   perm(35);
    //echo "addallownce";
    $empcon= $this->input->post('emp_contract');
   if(!empty($empcon))

   {
 
           $data = array(
                        'empcontract_id' => $empcon,
                        'emptype_id' => $this->input->post('emp_type'),
                        'classification_id' => $this->input->post('emp_class'),
                      
                      
                        'pre_award' => $this->input->post('pmac'),
                        'hourly_rate' => $this->input->post('hpr'),
                        'saturday' => $this->input->post('sat'),
                        'sunday' => $this->input->post('sun'),
                        'publicholiday' => $this->input->post('ph'),
                        'aftshift' => $this->input->post('as'),
                        'nigshift' => $this->input->post('ns'),
                        'overtimefirst' => $this->input->post('otone'),
                        'overtimesec' => $this->input->post('ottwo'),
                        'overtimethird' => $this->input->post('otthree'),
                        'lessten' => $this->input->post('lt'),
                        'brokenshift' => $this->input->post('bs'),
                    );



    $this->financial->insertemppay($data);

    $this->session->set_flashdata('success', 'Employee Pay has been added successfully!');
                        redirect(base_url('admin/financial/employeepay'));

   }
   else
   {
    redirect(admin/financial/employeepay);
   }
    
    $data['title'] = 'add Suport Category';
    lv('Financial/addallownce',$data);


}
public function editemppay()
{   perm(37);
    $id=$_POST['id'];
    $empcontract_id=$_POST['empcontract_id'];
    $emptype_id=$_POST['emptype_id'];
    $classification_id=$_POST['classification_id'];
    $pre_award=$_POST['pre_award'];
    $hourly_rate=$_POST['hourly_rate'];
    $saturday=$_POST['saturday'];
    $sunday=$_POST['sunday'];
    $publicholiday=$_POST['publicholiday'];
    $aftshift=$_POST['aftshift'];
    $nigshift=$_POST['nigshift'];
    $overtimefirst=$_POST['overtimefirst'];
    $overtimesec=$_POST['overtimesec'];
    $overtimethird=$_POST['overtimethird'];
    $lessten=$_POST['lessten'];
    $brokenshift=$_POST['brokenshift'];
    
if(!empty($id))

   {
    $data = array(
                         'id'=> $id,
                        'empcontract_id' => $empcontract_id,
                        'emptype_id' => $emptype_id,
                        'classification_id' => $classification_id,
                        'pre_award' => $pre_award,
                        'hourly_rate' => $hourly_rate,
                        'saturday' => $saturday,
                        'sunday' => $sunday,
                        'publicholiday' => $publicholiday,
                        'aftshift' => $aftshift,
                        'nigshift' => $nigshift,
                        'overtimefirst' => $overtimefirst,
                        'overtimesec' => $overtimesec,
                        'overtimethird' => $overtimethird,
                        'lessten' => $lessten,
                        'brokenshift' => $brokenshift,
                    );


    $this->financial->Updateemppay($data);
}
$this->session->set_flashdata('success','Employee Pay guide has been Updated Successfully.'); 
        redirect(base_url('admin/financial/employeepay'));

   
}


function deleteemppay($id='')
{
        perm(38);
        $this->financial->deleteemppay($id);
        $this->session->set_flashdata('success','Employee pay has been Deleted Successfully.'); 
        redirect(base_url('admin/financial/employeepay'));
}




}