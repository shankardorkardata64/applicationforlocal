<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
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
        $fcm_token=@$input['fcm_token'];
        
        
        
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
            if($fcm_token!='')
            {
            $this->db->where('admin_id',$result['admin_id']);
            $this->db->update('ci_admin',array('fcm_token'=>$fcm_token));
            }
            
            
            
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
                 if($fcm_token!='')
            { $result['fcm_token']=$fcm_token;}
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



  public function forgot_password()
  {
      $input= input();
      $email=$input['email'];
     // $email='ershankardorkar@gmail.com';
      $check_auth_client=check_auth_client();
      if ($check_auth_client == true) 
      {
        $response = $this->auth_model->check_user_mail($email);
        unset($response['password']);
        if($response)
        {
            $rand=get_otp(); 
            $this->auth_model->password_reset_code_app($rand, $response['admin_id']);

             
					// --- sending email
					$to = $response['email'];
					$mail_data= array(
						'fullname' => $response['firstname'].' '.$response['lastname'],
						'otp' =>$rand
					);
					//$email_re=$this->mailer->mail_template($to,'forget-password-app',$mail_data);
                    $email_re=1;
                    if($email_re)
                    {
                        json_output(200, array('status' => true, 'data'=>$response,'message' => 'OTP Send On Your Email , Please check '));
                    }
                    else
                    {
                        
            json_output(400, array('status' => false, 'message' => 'Try Again ,Email Server Down'));
                    }



        }
        else
        {
            json_output(400, array('status' => false, 'message' => 'This Email Not Exists'));
        }

      
  
      }
  }



  public function forgot_password_check_opt()
  {
    $input= input();
    $otp=$input['otp'];
    $email=$input['email'];
    $password=$input['password'];
    $cpassword=$input['cpassword'];
    
    $check_auth_client=check_auth_client();
    if ($check_auth_client == true) 
    {
      $response = $this->auth_model->check_user_mail($email);
      unset($response['password']);
      if($response)
      {
        if($password==$cpassword)
        {

          $password_reset_code_app=$response['password_reset_code_app'];
          if($otp==$password_reset_code_app)
          {
          $new_password=password_hash($password, PASSWORD_BCRYPT);
          $this->auth_model->reset_password_app($response['admin_id'], $new_password);
		  json_output(200, array('status' => true, 'data'=>$response,'message' => 'New Password Set Successfully'));
          }
          else
          {
          if($response['password_reset_code_app']=='')
          {
               $rand= get_otp(); 
               $this->auth_model->password_reset_code_app($rand, $response['admin_id']);
       
                
                       // --- sending email
                       $to = $response['email'];
                       $mail_data= array(
                           'fullname' => $response['firstname'].' '.$response['lastname'],
                           'otp' =>$rand
                       );
                      // $email_re=$this->mailer->mail_template($to,'forget-password-app',$mail_data);
                       $email_re=1;
                       json_output(400, array('status' => false, 'message' => 'Please Check Your email For Correct OTP'));
            
                    }
            else
            {
             json_output(400, array('status' => false, 'message' => 'Please Enter Correct OTP'));
            }
            }
        }
        else
        {
            json_output(400, array('status' => false, 'message' => 'Both Password Should be same'));
            
        }
     
      }
      else
      {
      json_output(400, array('status' => false, 'message' => 'This Email Not Exists'));
      }

    }




  }







}
?>