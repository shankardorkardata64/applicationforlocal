<?php
class Admin_roles extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        //$this->rbac->check_module_access();

		$this->load->model('admin/admin_roles_model', 'admin_roles');
    }

	//-----------------------------------------------------		
	function index(){

		perm(57);
		$data['title'] = trans('role_and_permissions');;
		$data['records'] = $this->admin_roles->get_all();

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/admin_roles/index', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	function change_status(){

		perm(56);
	//	$this->rbac->check_operation_access(); // check opration permission

		$this->admin_roles->change_status();
	}

	//------------------------------------------------------------
	function delete($id=''){

		//$this->rbac->check_operation_access(); // check opration permission

		perm(58);
		$this->admin_roles->delete($id);
		$this->session->set_flashdata('msg','Role has been Deleted Successfully.');	
		redirect('admin/admin_roles');
	}
	
	//-----------------------------------------------------------------
	function add(){

		perm(55);
		//$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit'))
		{
			$this->admin_roles->insert();	
			$this->session->set_flashdata('success', 'Record Added Successfully');	
			redirect('admin/admin_roles');
		}

		$data['title'] = trans('add_new_role');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/admin_roles/add', $data);
		$this->load->view('admin/includes/_footer');
	}

	//--------------------------------------------------
	function edit($id=""){

		perm(56);
	//	$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit'))
		{
			$this->admin_roles->update();
			$this->session->set_flashdata('success', 'Record updated Successfully');		
			redirect('admin/admin_roles');
		}
		if($id=="") 
			redirect('admin/admin_roles');

		$data['title'] = trans('edit_role');
		$data['record'] = $this->admin_roles->get_role_by_id($id);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/admin_roles/edit', $data);
		$this->load->view('admin/includes/_footer');
	}

	//--------------------------------------------------
	function access($id=""){

		perm(47);
		//$this->rbac->check_operation_access(); // check opration permission

		$data['title'] = trans('admin_permissions');
		$data['record']= $this->admin_roles->get_role_by_id($id);
		$data['access']= $this->admin_roles->get_access($id);
		$data['modules']= $this->admin_roles->get_modules();
        
		$data['perm']= $this->db->get('perm');

		$this->load->view('admin/includes/_header');
		$this->load->view('admin/admin_roles/access', $data);
		$this->load->view('admin/includes/_footer');
	}

	//-----------------------------------------------------------
	function set_access()
	{   

		perm(46);
		$perm=$_POST['perm'];
		$admin_role_id=$_POST['admin_role_id'];
        $perm=implode(",",$perm);
		$this->db->where('admin_role_id',$admin_role_id);
		$this->db->update('ci_admin_roles',array('perm'=>$perm));
        $this->session->set_flashdata('success', 'Role Updated successfully!');
		redirect(base_url('admin/admin_roles/access/'.$admin_role_id));

	}

	//--------------------------------------------------
	function check_admin_role($id=0){
		
		$this->db->from('admin_roles');
		$this->db->where('admin_role_title',$this->input->post('admin_role_title'));
		$this->db->where('admin_role_id !='.$id);
		$query=$this->db->get();
		if($query->num_rows() >0)
			echo 'false';
		else 
	    	echo 'true';
    }

  
}

?>