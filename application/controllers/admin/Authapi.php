<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authapi extends CI_Controller 
{
    
    
    
    public function __construct()
    {
        parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
	}


    public function index()
    {
        echo 'hi ';
    }

	public function login()
    {
        $input= input();
        $username=$input['username'];
        $password=$input['password'];
        $check_auth_client=check_auth_client();
       if ($check_auth_client == true) 
        {
            $data = array(
            'username' => $username,
            'password' => $password
        );
        $result = $this->auth_model->login($data);
        unset($result['password']);
        if($result)
        {
            if($result['is_verify'] == 0)
            {
                json_output(400, array('status' => false, 'message' => 'Please verify your email address!'));

            }
            elseif($result['is_active'] == 0)
            {
                json_output(400, array('status' => false, 'message' => 'Account is disabled by Admin!'));
             }
            elseif($result['is_admin'] == 1)
            {
                json_output(200, array('status' => true, 'data'=>$result,'message' => 'Successfully loged in'));
            }
            else
            {
                  json_output(400, array('status' => false, 'message' => 'Undefined Role'));
            }        
       }
       else
       {
                  json_output(400, array('status' => false, 'message' => 'Not Vaild Credentials'));
       }
      }
  }


}


?>