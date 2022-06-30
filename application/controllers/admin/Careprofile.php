<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Careprofile extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
       // $this->rbac->check_module_access();
        $this->load->model('admin/admin_model', 'admin');
	    	$this->load->model('admin/Activity_model', 'activity_model');
    }
   
    //
    //	    $data['info'] = $this->db->get('care_cat')->result_array();
    //      $this->load->view('admin/care_cat/list',$data);



    public function edit_option()
    {
      perm(7);

$id=$_POST['id'];
$this->db->where('care_profile_id',$id);
$this->db->delete('care_type_options');
 foreach($_POST['option'] as $key=>$op)
{
 $in['value']=$key;
 $in['type_id']=$_POST['type_id'];
 $in['name']=$op;
 $in['care_profile_id']=$id;
 $this->db->insert('care_type_options',$in);
}

						// Activity Log 
$this->activity_model->add_log(4);
$this->session->set_flashdata('success', 'Care type options  updated  successfully!');
redirect(base_url('admin/careprofile'));
$url='admin/careprofile/edit/'.$id;
redirect(base_url($url));
    }

    public function index($type='')
    {
      perm(12);
        $this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		$data['info'] = $this->db->get('care_cat')->result_array();
		$data['title'] = 'Care Profile List';
        $data['ajaxurl']='careprofile/list';
        lv('careprofile/index',$data);
   }
  
  public function list()
  {  perm(12);
             $data['info'] = $this->db->get('care_type')->result_array();
           $this->load->view('admin/careprofile/list',$data);
  }
  

  
  public function edit($id='')
  {
    perm(7);
   if($_POST)
   {
       $id=$this->input->post('id');

       $data = array('name' => $this->input->post('name')
       ,'cat_care_id' => $this->input->post('cat_care_id'),
       'care_input_type' => $this->input->post('care_input_type')
       );
   

     $data = $this->security->xss_clean($data);
     $this->db->where('id',$id);
     $this->db->update('care_type',$data);
     //$insert_id=$this->db->insert_id();
     $insert_id=1;
     if($insert_id)
     {
         
						// Activity Log 
		$this->activity_model->add_log(4);
        $this->session->set_flashdata('success', 'Care Type updated  successfully!');
        redirect(base_url('admin/careprofile'));
     }
     else
     {
        $this->session->set_flashdata('error', 'Error ! Try again');
        redirect(base_url('admin/careprofile'));
     }

   }
   else
   {
    $data['info'] = $this->db->get_where('care_type',array('id'=>$id))->result_array();
    $data['option'] = $this->db->get_where('care_type_options',array('care_profile_id'=>$id))->result_array();
   
    $data['title'] = 'Update Care careprofile';
    $data['ajaxurl']='careprofile/edit';
    lv('careprofile/edit',$data);
   }
  }



  public function addcareprofile()
  {
   
    perm(11);
    if($_POST)
   {
     $data = array('name' => $this->input->post('name')
    ,'cat_care_id' => $this->input->post('cat_care_id'),
    'care_input_type' => $this->input->post('care_input_type')
    );

     //echo '<pre>';
     //print_r($data); die();
     $data = $this->security->xss_clean($data);
     $this->db->insert('care_type',$data);
     $insert_id=$this->db->insert_id();
     if($insert_id)
     {
         
						// Activity Log 
						$this->activity_model->add_log(4);

        $this->session->set_flashdata('success', 'Care Catogory added  successfully!');
        redirect(base_url('admin/careprofile'));
     }
     else
     {
        $this->session->set_flashdata('error', 'Error ! Try again');
        redirect(base_url('admin/careprofile'));
     }

   }
   else
   {
    //$this->session->set_userdata('filter_type',$type);
    //$this->session->set_userdata('filter_keyword','');
    //$this->session->set_userdata('filter_status','');
    $data['info'] = $this->db->get('care_cat')->result_array();
    $data['title'] = 'Care Category Type List';
    $data['ajaxurl']='care_cat/add';
    lv('careprofile/add',$data);
   }
  }




    //------------------------------------------------------------
	function delete($id='')
    {
      perm(8);
		$this->rbac->check_operation_access(); // check opration permission
     //   $this->db->delete('care_type',array('id'=>$id));

		// Activity Log 
		$this->activity_model->add_log(6);
        $this->session->set_flashdata('success','Care Catogory Deleted successfully!');	
        redirect(base_url('admin/careprofile'));
	}




}