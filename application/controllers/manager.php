<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {


    
	public function __construct(){

		parent::__construct();
		$this->load->library('mailer');
		$this->load->helper('functions');
    }
	public function index()
	{
        if($this->session->has_userdata('system_users_id'))
        {
			redirect('manager/dashboard');
		}
		else
        {
			redirect('manager/auth');
		}
    }


    public function dashboard()
    {
        $data='';
        mlv('dashboard/index',$data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('manager/auth'), 'refresh');
    }
    


    public function auth()
	{  
        $sidebar=false;
        if($_POST)
        {
            $email=$this->input->post('email');
            echo $password=$this->input->post('password');
         $result=$this->db->get_where('system_users',array('email'=>$email,'password'=>$password))->result_array();
  
  if(!empty($result))
  {
      $result=$result[0];
      if($result['status']==1)
      {
            $manager_data = array(
            'system_users_id' => $result['id'],
            'name' => $result['name'],
            'email' => $result['email'],
            'user_role_id' => $result['role'],
            'user_role' =>$result['role']==2?'Manager':'Supervisior',
            'status'=>$result['status'],
            'sidebar'=>true,
        );
        $this->session->set_userdata($manager_data);
        

        redirect(base_url('manager/dashboard'), 'refresh');
      }
      else
      {
          die('Status is inactive');
      }

  }
  else
  {
      echo 'invalid credentials'; die();
  }


        }
        else
        {
            $data='auth';
             mlv('auth/index',$data);
        }

    }



}