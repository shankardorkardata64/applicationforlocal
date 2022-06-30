
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_provider extends MY_Controller {
	

    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
      //  $this->rbac->check_module_access();
        $this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }


public function index($type='')
    {  perm(20);
       // echo '<pre>';
     //   print_r($this->session->userdata('module_access')); die();
       $this->rbac->check_operation_access(); // check opration permission
        $this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		$data['info'] = $this->db->get('care_cat')->result_array();
		$data['title'] = 'Service Provider List';
        $data['ajaxurl']='service_provider/list';
        lv('service_provider/index',$data);
   }

  
  public function list()
  { perm(20);
             $data['info'] = $this->db->get('service_provider')->result_array();
              $this->load->view('admin/service_provider/list',$data);
  }
  

public function add()
{ 
    perm(15);
    
    $this->rbac->check_operation_access(); // check opration permission
   
    if($_POST){

                $r=implode(',',$this->input->post('region'));
                $in['pname']=$this->input->post('pname');
                $in['pnumber']=$this->input->post('pnumber');
                $in['paddress']=$this->input->post('paddress');

                
                $in['cname']=$this->input->post('cname');
                $in['cnumber']=$this->input->post('cnumber');
                $in['caddress']=$this->input->post('caddress');

                $in['region']=$r;              
                $in['call_participlant']=$this->input->post('call_participlant');
 

                $this->db->insert('service_provider',$in);
                $insert_id=$this->db->insert_id();
                if($insert_id)
                {
                    
                                   // Activity Log 
                                   $this->activity_model->add_log(4);
           
                   $this->session->set_flashdata('success', 'Service Provider added  successfully!');
                   redirect(base_url('admin/service_provider'));
                }
                else
                {
                   $this->session->set_flashdata('error', 'Error ! Try again');
                   redirect(base_url('admin/service_provider'));
                }
           
                redirect(base_url('admin/service_provider'));
                


    } else {
    $data['region'] = $this->db->get('region')->result_array();
    $data['title'] = 'Add Service Provider';
    $data['ajaxurl']='service_provider/add';
    lv('service_provider/add',$data);
    }

}



public function edit($id='')
{
    perm(21);

    if($_POST){

                $r=implode(',',$this->input->post('region'));
                $in['pname']=$this->input->post('pname');
                $in['pnumber']=$this->input->post('pnumber');
                $in['paddress']=$this->input->post('paddress');

                
                $in['cname']=$this->input->post('cname');
                $in['cnumber']=$this->input->post('cnumber');
                $in['caddress']=$this->input->post('caddress');

                $in['region']=$r;              
                $in['call_participlant']=$this->input->post('call_participlant');
 
 
                $this->db->where('id',$_POST['id']);
                $this->db->update('service_provider',$in);
                $insert_id=1;
                if($insert_id)
                {
                    
                                   // Activity Log 
                                   $this->activity_model->add_log(4);
           
                   $this->session->set_flashdata('success', 'Service Provider updated  successfully!');
                   redirect(base_url('admin/service_provider'));
                }
                else
                {
                   $this->session->set_flashdata('error', 'Error ! Try again');
                   redirect(base_url('admin/service_provider'));
                }
           

                redirect(base_url('admin/service_provider'));

    } else {
    $data['info']=select('service_provider',array('id'=>$id));
    $data['region'] = $this->db->get('region')->result_array();
    $data['title'] = 'Edit Service Provider';
    $data['ajaxurl']='service_provider/add';
    lv('service_provider/edit',$data);
    }

}


public function delete($id)
{ 
    perm(22);
    if($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('service_provider');
    }
    
    $this->session->set_flashdata('success', 'Service Provider deleted  successfully!');
    redirect(base_url('admin/service_provider'));
}


}