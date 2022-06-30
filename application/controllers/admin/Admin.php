<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }

	//-----------------------------------------------------		
	function index($type=''){
		perm(16);
		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		
		$data['admin_roles'] = $this->admin->get_admin_roles();
		
		$data['title'] = 'Admin List';

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/admin/index', $data);
		$this->load->view('admin/includes/_footer');
	}



	//---------------------------------------------------------
	function filterdata(){

		$this->session->set_userdata('filter_type',$this->input->post('type'));
		$this->session->set_userdata('filter_status',$this->input->post('status'));
		$this->session->set_userdata('filter_keyword',$this->input->post('keyword'));
	}



	//--------------------------------------------------		
	function list_data(){
		perm(16);

		$data['info'] = $this->admin->get_all();


		$this->load->view('admin/admin/list',$data);
	}

	//-----------------------------------------------------------
	function change_status(){
		perm(17);
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->change_status();
	}
	public function password_check($str)
{
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
}
	//--------------------------------------------------
function add()
{
perm(15);
if($this->input->post('submit'))
{


			    $this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|is_unique[ci_admin.username]|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_admin.email]|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|alpha_numeric');
				$this->form_validation->set_rules('role', 'Role', 'trim|required');
            	if($this->input->post('role')==7 OR $this->input->post('role')==8)
 				{
				$this->form_validation->set_rules('service_provider_id', 'Service Provider', 'trim|required');
				}
				if($this->input->post('role')==7)
 				{
				$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            	$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            	$this->form_validation->set_rules('address', 'Address', 'trim|required');
            	$this->form_validation->set_rules('timezone', 'TimeZone', 'trim|required');
            	
            //	$this->form_validation->set_rules('emp_contract', 'Contract Type', 'trim|required');
            	//$this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
            //	$this->form_validation->set_rules('emp_pre_modern_award_classification', 'Pre-Modern Award Classification', 'trim|required');
            	
	        	$this->form_validation->set_rules('passport_number', 'Passport Number', 'trim|is_unique[ci_admin.passport_number]');
				$this->form_validation->set_rules('passport_ex_date', 'Passport Expire Date', 'trim');
            	$this->form_validation->set_rules('visa_number', 'Visa Number', 'trim|is_unique[ci_admin.visa_number]');
				$this->form_validation->set_rules('visa_ex_date', 'Visa Expire Date', 'trim');
            	$this->form_validation->set_rules('nois_reff_no', 'NDIS Worker Screening Check Application Refference Number', 'trim|is_unique[ci_admin.nois_reff_no]');
    			$this->form_validation->set_rules('nois_check_number', 'NDIS Worker Screening Check Number', 'trim|is_unique[ci_admin.nois_check_number]');
                $this->form_validation->set_rules('nois_check_number_ex_date','NDIS Worker Screening Check Number Expire Date', 'trim');
                $this->form_validation->set_rules('police_check_issue_date_issue_date', 'Police check expire date', 'trim|required');
                $this->form_validation->set_rules('police_check_issue_date_ex_date', 'Police check expire date', 'trim|required');
             	} 
				if ($this->form_validation->run() == FALSE) 
				{
					//$data = array('errors' => validation_errors());
					$this->session->set_flashdata('errors', validation_errors());
					$this->loadaddform();
				}
				else
				{
						$data = array(
						'admin_role_id' => $this->input->post('role'),
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
						);

						if($this->input->post('role')==7)
						{
					
							$data['passport_number'] =  $this->input->post('passport_number');
							$data['passport_ex_date'] = $this->input->post('passport_ex_date');
							$data['visa_number'] =$this->input->post('visa_number');
							$data['visa_ex_date'] =$this->input->post('visa_ex_date');
							$data['nois_reff_no'] =$this->input->post('nois_reff_no');
							$data['nois_check_number'] =$this->input->post('nois_check_number');
							$data['nois_check_number_ex_date'] =$this->input->post('nois_check_number_ex_date');
						
							$data['police_check_issue_date_issue_date'] =$this->input->post('police_check_issue_date_issue_date');
							$data['police_check_issue_date_ex_date'] =$this->input->post('police_check_issue_date_ex_date');
							$data['phone_number'] =$this->input->post('phone_number');
							$data['gender'] =$this->input->post('gender');
							$data['address'] =$this->input->post('address');
							$data['timezone'] =$this->input->post('timezone');
							
				// 			$data['emp_contract'] =$this->input->post('emp_contract'); 
				// 			$data['emp_type'] =$this->input->post('emp_type');
				// 			$data['emp_pre_modern_award_classification'] =$this->input->post('emp_pre_modern_award_classification');
							
							
							$data['emp_contract'] =1; 
							$data['emp_type'] =1;
							$data['emp_pre_modern_award_classification'] =1;
							
							$data['wwccn'] =$this->input->post('wwccn');
							$data['wwccn_d'] =$this->input->post('wwccn_d');
							$data['dln'] =$this->input->post('dln');
							$data['dln_d'] =$this->input->post('dln_d');
							$photo='avtar.png';
							$data['photo']=$photo;
							$data['state'] =$this->input->post('state');
							$data['characteristics'] =$this->input->post('characteristics');
							$data['interest'] =$this->input->post('interest');
							$data['qualities'] =$this->input->post('qualities');
							$eq=implode(',',$this->input->post('emp_qualified'));
							$data['emp_qualified']=$eq;
						}

						if($this->input->post('role')==7 OR $this->input->post('role')==8)
						{
							$data['service_provider_id']=$this->input->post('service_provider_id');
						}

						
	 if($_POST)
  {

  
if($this->input->post('role')==7) 
{
    	$config = array(
		'upload_path' => "./uploads/profile/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "1200",
		'max_width' => "1900",
		'file_name'=>rand(23,343434).time()
		);
   		$this->load->library('upload', $config);	
  		if($_FILES['photo']['error']==0 )
		{
			if($this->upload->do_upload('photo'))
			{
			$udata = $this->upload->data();
			$data['photo']=$udata['file_name'];
			}
			else
  			{
    		$err=$this->upload->display_errors();
  			$this->session->set_flashdata('errors', $err);
  			$this->loadaddform(); // redirect(base_url('admin/admin/add'),'refresh');
  			}  
		}





//   if($_FILES['doc']['error']==0)
//   {
//     $configdoc = array(
//     'upload_path' => "./uploads/profile/",
//     'allowed_types' => "gif|jpg|png|jpeg|pdf",
//     'overwrite' => TRUE,
//     'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//     'max_height' => "1200",
//     'max_width' => "1900",
//     'file_name'=>rand(23,343434).time()
// 	);
// 	$this->load->library('upload', $configdoc);
// 	if($this->upload->do_upload('doc'))	
// 	{
//     $udata = $this->upload->data();
//     $doc=$udata['file_name'];
// 	}
// 	else
//   	{
//     $err=$this->upload->display_errors();
//   	$data = array(
//       'errors' => $err
//   	);
//   	$this->session->set_flashdata('errors', $data['errors']);
//   	$this->loadaddform();//redirect(base_url('admin/admin/add'),'refresh');
//   	}  
// }
//  if(isset($doc))
//   {
//   $data['doc']=$doc;	
//   }




// 	$otherfile=array();

//  $files = $_FILES;
//  $cpt = count($_FILES ['multipleUpload'] ['name']);
//  if($cpt!=0)
//  {
//  for ($i = 0; $i < $cpt; $i ++) {

//             $name = time().$files ['multipleUpload'] ['name'] [$i];
//             $_FILES ['multipleUpload'] ['name'] = $name;
//             $_FILES ['multipleUpload'] ['type'] = $files ['multipleUpload'] ['type'] [$i];
//             $_FILES ['multipleUpload'] ['tmp_name'] = $files ['multipleUpload'] ['tmp_name'] [$i];
//             $_FILES ['multipleUpload'] ['error'] = $files ['multipleUpload'] ['error'] [$i];
//             $_FILES ['multipleUpload'] ['size'] = $files ['multipleUpload'] ['size'] [$i];
			
// $this->load->library('upload', $config);
//             $this->upload->initialize($this->set_upload_options("./uploads/profile/"));
//             if(!($this->upload->do_upload('multipleUpload')) || $files ['multipleUpload'] ['error'] [$i] !=0)
//             {
//                     $err=$this->upload->display_errors();
  
//     $data = array(
//       'errors' => $err
//   );
//   $this->session->set_flashdata('errors', $data['errors']);
//   $this->loadaddform();// redirect(base_url('admin/admin/add'),'refresh');
  
//             }
//             else
//             {
//              $filename=$name;
//              array_push($otherfile,$filename);

//             }
//         }

// $data['other_files']=json_encode($otherfile);
// }
/**************************************************/
}
          

					$data = $this->security->xss_clean($data);
					
					//echo '<pre>';  print_r($data); echo '</pre>'; die();
					$result = $this->admin->add_admin($data);
 

					if($result){

						// Activity Log 
						$this->activity_model->add_log(4);
                        $this->session->set_flashdata('success', 'Admin has been added successfully!');
						redirect(base_url('admin/admin'));
					}
				}
				
				
			}
		}
			else
			{
		$this->loadaddform();
		}
	}

public function loadaddform()
{   
	$data['admin_roles']=$this->admin->get_admin_roles();
	$data['emp_contract']=select('emp_contract');
	$data['emp_pre_modern_award_classification']=select('emp_pre_modern_award_classification');
	$data['emp_type']=select('emp_type');
	$data['emp_gender']=select('emp_gender');
	$data['emp_timezone']=select('emp_timezone');
	$data['service_provider']=select('service_provider');
	$data['emp_qualified'] = $this->db->get('emp_qualified')->result_array();

	$this->load->view('admin/includes/_header', $data);
	$this->load->view('admin/admin/add');
	$this->load->view('admin/includes/_footer');

}

public function set_upload_options($file_path) {
    // upload an image options
    $config = array();
    $config ['upload_path'] = $file_path;
    $config ['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    return $config;
}
	//--------------------------------------------------

function docdelete($id)
{

	           if($id)
				{   $this->db->where('id',$id);
					$this->db->update('userdocuments',array('status'=>1));
				}
				redirect(base_url('admin/admin/document/'.$this->session->userdata('emp_id')),'refresh');
}


function action_doc()
{
	$configdoc = array(
		'upload_path' => "./uploads/documents/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "1200",
		'max_width' => "1900",
		'file_name'=>'userdoc_'.rand(23,343434).time()
	);
	$this->load->library('upload', $configdoc);
			

	if($_POST)
	{   
		$expireon=$this->input->post('expireon');
		if($_POST['action']=='add')
		{
		 if($this->upload->do_upload('doc'))
			{
				$udata = $this->upload->data();
				$doc=base_url('uploads/documents/'.$udata['file_name']);
				if($doc)
				{
					$this->db->insert('userdocuments',array('expireon'=>strtotime($expireon),'user_id'=>$_POST['user_id'],'document_id'=>$_POST['type'],'name'=>$doc));
				}
				redirect(base_url('admin/admin/document/'.$_POST['user_id']),'refresh');
			}
			else
			{
				$err=$this->upload->display_errors();
			    $data = array('errors' => $err);
			   $this->session->set_flashdata('errors', $data['errors']);
			   redirect(base_url('admin/admin/document/'.$_POST['user_id']),'refresh');
			}  
        }	
		else
		{
			if($this->upload->do_upload('doc'))
			{
				$udata = $this->upload->data();
				$doc=base_url('uploads/documents/'.$udata['file_name']); 
				if($doc)
				{   $this->db->where('id',$_POST['id']);
					$this->db->update('userdocuments',array('expireon'=>strtotime($expireon),'name'=>$doc));
				}
				redirect(base_url('admin/admin/document/'.$_POST['user_id']),'refresh');
			}
			else
			{
				$err=$this->upload->display_errors();
			    $data = array('errors' => $err);
			   $this->session->set_flashdata('errors', $data['errors']);
			   redirect(base_url('admin/admin/document/'.$_POST['user_id']),'refresh');
			}  
		}
	}
}
	function document($id)
	{
		
	     perm(17);
		$data['admin'] = $this->admin->get_admin_by_id($id);
		$this->session->set_userdata('emp_id',$id);
$this->db->select('userdocuments.user_id,userdocuments.expireon,userdocuments.id as id,userdocuments.document_id,userdocuments.name as doc,userdocuments.status,documnet_type.name');
$this->db->from('userdocuments');
$this->db->where('userdocuments.user_id', $id);
$this->db->where('userdocuments.status=', 0);
$this->db->join('documnet_type', 'userdocuments.document_id = documnet_type.id', 'left');
$query = $this->db->get()->result_array();

		$data['userdocuments']=$query;
		$data['user_id']=$id;
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/userdoc/list', $data);
		$this->load->view('admin/includes/_footer');	

	}

	//--------------------------------------------------
	function edit($id=""){
		perm(17);
		$this->rbac->check_operation_access(); // check opration permission


		$data['admin_roles'] = $this->admin->get_admin_roles();
		$data['emp_contract']=select('emp_contract');
		$data['service_provider']=select('service_provider');
		$data['emp_pre_modern_award_classification']=select('emp_pre_modern_award_classification');
        $data['emp_type']=select('emp_type');
		$data['emp_gender']=select('emp_gender');
		$data['emp_timezone']=select('emp_timezone');
 
		if($this->input->post('submit')){

			
			
			$this->form_validation->set_rules('username', 'Username', 'trim|alpha_numeric|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			if($this->input->post('password') != '' AND $this->input->post('cpassword') != '')
			{ 
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
			}
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_rules('service_provider_id', 'Service Provider', 'trim|required');
           
if($this->input->post('role')==7)
{  
	$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
	$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
	$this->form_validation->set_rules('address', 'Address', 'trim|required');
	$this->form_validation->set_rules('timezone', 'TimeZone', 'trim|required');
//	$this->form_validation->set_rules('emp_contract', 'Contract Type', 'trim|required');
	//$this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
	//$this->form_validation->set_rules('emp_pre_modern_award_classification', 'Pre-Modern Award Classification', 'trim|required');
	

				$this->form_validation->set_rules('passport_number', 'Passport Number', 'trim|required');
				$this->form_validation->set_rules('passport_ex_date', 'Passport Expire Date', 'trim|required');

				$this->form_validation->set_rules('visa_number', 'Visa Number', 'trim|required');
				$this->form_validation->set_rules('visa_ex_date', 'Visa Expire Date', 'trim|required');

				$this->form_validation->set_rules('nois_reff_no', 'NDIS Worker Screening Check Application Refference Number', 'trim|required');
    			$this->form_validation->set_rules('nois_check_number', 'NDIS Worker Screening Check Number', 'trim|required');
                $this->form_validation->set_rules('nois_check_number_ex_date','NDIS Worker Screening Check Number Expire Date', 'trim|required');

                $this->form_validation->set_rules('police_check_issue_date_issue_date', 'Police check expire date', 'trim|required');
                $this->form_validation->set_rules('police_check_issue_date_ex_date', 'Police check expire date', 'trim|required');
}

			if ($this->form_validation->run() == FALSE) 
			{
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/admin/edit/'.$id),'refresh');
			}
			else{
				$data = array(
					'admin_role_id' => $this->input->post('role'),
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'is_active' => 1,
					'updated_at' => date('Y-m-d : h:m:s'),
				);

				if($this->input->post('password') != '' AND $this->input->post('cpassword') != '')
				{ 
					$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}

				$data['admin_role_id'] =  $this->input->post('role');
				if($this->input->post('role')==7)
				{
				$data['passport_number'] =  $this->input->post('passport_number');
    $data['passport_ex_date'] = ($this->input->post('passport_ex_date'));
    $data['visa_number'] =$this->input->post('visa_number');
    $data['visa_ex_date'] =($this->input->post('visa_ex_date'));
	$data['nois_reff_no'] =$this->input->post('nois_reff_no');
    $data['nois_check_number'] =$this->input->post('nois_check_number');
    $data['nois_check_number_ex_date'] =($this->input->post('nois_check_number_ex_date'));
    $data['service_provider_id']=$this->input->post('service_provider_id');
    $data['police_check_issue_date_issue_date'] =$this->input->post('police_check_issue_date_issue_date');
    $data['police_check_issue_date_ex_date'] =$this->input->post('police_check_issue_date_ex_date');
    $data['phone_number'] =$this->input->post('phone_number');
    $data['gender'] =$this->input->post('gender');
    $data['address'] =$this->input->post('address');
    $data['timezone'] =$this->input->post('timezone');
    
   // $data['emp_contract'] =$this->input->post('emp_contract'); 
   // $data['emp_type'] =$this->input->post('emp_type');
    //$data['emp_pre_modern_award_classification'] =$this->input->post('emp_pre_modern_award_classification');
    
    
							$data['emp_contract'] =1; 
							$data['emp_type'] =1;
							$data['emp_pre_modern_award_classification'] =1;
							
    $data['wwccn'] =$this->input->post('wwccn');
    	$data['wwccn_d'] =$this->input->post('wwccn_d');
    	$data['dln'] =$this->input->post('dln');
    	$data['dln_d'] =$this->input->post('dln_d');
    	$data['state'] =$this->input->post('state');
    	   	$data['characteristics'] =$this->input->post('characteristics');
    	$data['interest'] =$this->input->post('interest');
    	$data['qualities'] =$this->input->post('qualities');
    	$eq=implode(',',$this->input->post('emp_qualified'));
    	 $data['emp_qualified']=$eq;
				}
				     if($this->input->post('role')==7 OR $this->input->post('role')==8)
						{
							$data['service_provider_id']=$this->input->post('service_provider_id');
						}


    	 if($_POST)
  {

  
if($this->input->post('role')==7)
{
  if($_FILES['photo']['error']==0)
  {
    $config = array(
    'upload_path' => "./uploads/profile/",
    'allowed_types' => "gif|jpg|png|jpeg|pdf",
    'overwrite' => TRUE,
    'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    'max_height' => "1200",
    'max_width' => "1900",
    'file_name'=>rand(23,343434).time()
);
$this->load->library('upload', $config);
if($this->upload->do_upload('photo'))
{
    $udata = $this->upload->data();
    $photo=$udata['file_name'];

}
else
  {
    $err=$this->upload->display_errors();
  
    $data = array(
      'errors' => $err
  );
  $this->session->set_flashdata('errors', $data['errors']);
  redirect(base_url('admin/admin/edit/'.$id),'refresh');
  }  

  }

 if(isset($photo))
      {
      $data['photo']=$photo;	
      }

}
				$data = $this->security->xss_clean($data);
				
				$result = $this->admin->edit_admin($data, $id);
				
				if($result)
				{
					// Activity Log 
					//$this->activity_model->add_log(5);

					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('admin/admin/edit/'.$id));
				}
			}
		}
	}

		elseif($id==""){
			redirect('admin/admin');
		}
		else{
			$data['admin'] = $this->admin->get_admin_by_id($id);
			$data['emp_qualified'] = $this->db->get('emp_qualified')->result_array();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/admin/edit', $data);
			$this->load->view('admin/includes/_footer');
		}		
	}

	//--------------------------------------------------
	function check_username($id=0){
		perm(17);
		$this->db->from('admin');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('admin_id !='.$id);
		$query=$this->db->get();
		if($query->num_rows() >0)
			echo 'false';
		else 
	    	echo 'true';
    }

    //------------------------------------------------------------
	function delete($id=''){
		perm(18);
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->delete($id);

		// Activity Log 
		$this->activity_model->add_log(6);

		$this->session->set_flashdata('success','User has been Deleted Successfully.');	
		redirect('admin/admin');
	}
	
}

?>