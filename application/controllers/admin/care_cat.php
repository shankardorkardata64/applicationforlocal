<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Care_cat extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        //$this->rbac->check_module_access();
        $this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }
   

    public function index($type='')
    {          perm(2);
        $this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		$data['info'] = $this->db->get('care_cat')->result_array();
		$data['title'] = 'Care Category List';
        $data['ajaxurl']='care_cat/list';
        lv('care_cat/index',$data);
   }
  
  public function list()
  {  perm(2);
             $data['info'] = $this->db->get('care_cat')->result_array();
           $this->load->view('admin/care_cat/list',$data);
  }
  

  
  public function edit($id='')
  {  perm(3);
   $this->rbac->check_operation_access(); // check opration permission
   if($_POST)
   {
       $id=$this->input->post('id');
     $data = array('name' => $this->input->post('name'),'status'=> $this->input->post('status'));
     $data = $this->security->xss_clean($data);
     $this->db->where('id',$id);
     $this->db->update('care_cat',$data);
     //$insert_id=$this->db->insert_id();
     $insert_id=1;
     if($insert_id)
     {
         
						// Activity Log 
		$this->activity_model->add_log(4);
        $this->session->set_flashdata('success', 'Care Catogory updated  successfully!');
        redirect(base_url('admin/care_cat'));
     }
     else
     {
        $this->session->set_flashdata('error', 'Error ! Try again');
        redirect(base_url('admin/care_cat'));
     }

   }
   else
   {
    //$this->session->set_userdata('filter_type',$type);
    //$this->session->set_userdata('filter_keyword','');
    //$this->session->set_userdata('filter_status','');
    $data['info'] = $this->db->get_where('care_cat',array('id'=>$id))->result_array();
    $data['title'] = 'Update Care Category';
    $data['ajaxurl']='care_cat/edit';
    lv('care_cat/edit',$data);
   }
  }



  public function add()
  { 
     perm(1); 
   //$this->rbac->check_operation_access(); // check opration permission
   if($_POST)
   {
     $data = array('name' => $this->input->post('name'));
     //echo '<pre>';
     //print_r($data); die();
     $data = $this->security->xss_clean($data);
     $this->db->insert('care_cat',$data);
     $insert_id=$this->db->insert_id();
     if($insert_id)
     {
         
						// Activity Log 
						$this->activity_model->add_log(4);

        $this->session->set_flashdata('success', 'Care Catogory added  successfully!');
        redirect(base_url('admin/care_cat'));
     }
     else
     {
        $this->session->set_flashdata('error', 'Error ! Try again');
        redirect(base_url('admin/care_cat'));
     }

   }
   else
   {
    //$this->session->set_userdata('filter_type',$type);
    //$this->session->set_userdata('filter_keyword','');
    //$this->session->set_userdata('filter_status','');
    $data['info'] = $this->db->get('care_cat')->result_array();
    $data['title'] = 'Care Category List';
    $data['ajaxurl']='care_cat/add';
    lv('care_cat/add',$data);
   }
  }



      //------------------------------------------------------------
	function delete($id=''){
    perm(6);
		$this->rbac->check_operation_access(); // check opration permission
       // $this->db->delete('care_cat',array('id'=>$id));

		// Activity Log 
		$this->activity_model->add_log(6);
        $this->session->set_flashdata('success','Care Catogory Deleted successfully!');	
        redirect(base_url('admin/care_cat'));
	}




}