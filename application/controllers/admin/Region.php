<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        
		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }

    
public function add()
{
    
    
    perm(50);
    
    if($_POST)
    {
        
    $data=$_POST;
    unset($data['submit']);
    $this->db->insert('region',$data);
    $this->session->set_flashdata('success', 'Region has been added  successfully!');
    redirect(base_url('admin/region/add'));
    }
    else
    {

        $data['title'] = 'Add Region';
        lv('region/add',$data);
    }
}


    
public function edit()
{
    
    perm(52);
   
    
    
    if($_POST)
    {
        
    $data=$_POST;
    unset($data['submit']);
    unset($data['id']);
    $this->db->where('id',$_POST['id']);
    $this->db->update('region',$data);
    $this->session->set_flashdata('success', 'Region has been Updated  successfully!');
    redirect(base_url('admin/region/add'));
    }
    else
    {

        $data['title'] = 'Add Region';
        lv('region/add',$data);
    }
}


}