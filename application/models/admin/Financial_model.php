
<?php
	class Financial_model extends CI_Model{

		

        public function get()
		{
			$admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $this->db->where('service_provider_id',$service_provider_id);
			}
	
			$type=$this->session->userdata('filter_type');
			$keyword=$this->session->userdata('filter_keyword');
			if($keyword!='')
			{
				$this->db->like('name',$keyword);
				$this->db->or_like('rate',$keyword);
			}
			
			$status=$this->session->userdata('filter_status');
		    
			$r=$this->db->get('allowance')->result_array();

			return $r;
		}
		public function getAward(){
			return $this->db->get('emp_pre_modern_award_classification')->result_array();

		}
		public function insert($data){
			$admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $data['service_provider_id']=$service_provider_id; 
			}
			$this->db->insert('allowance', $data);
			return true;
		}
		function deleteallowance($id){		
	      $this->db->where('id',$id);
	      $this->db->delete('allowance');
        }
         public function get_supportcat(){

			$type=$this->session->userdata('filter_type');
			$keyword=$this->session->userdata('filter_keyword');
		
			$status=$this->session->userdata('filter_status');
		    $admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $this->db->where('service_provider_id',$service_provider_id);
			}
	       if($keyword!='')
			{
				$this->db->like('cat_name',$keyword);
				$this->db->or_like('catalogue',$keyword);
				$this->db->or_like('item_name',$keyword);
				$this->db->or_like('unit',$keyword);
				$this->db->or_like('item_num',$keyword);		
			}
			
			return $this->db->get('support_category')->result_array();

		}
		public function insertsupportcat($data){

			$admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $data['service_provider_id']=$service_provider_id; 
			}
			$this->db->insert('support_category', $data);
			return true;
		}
		function Updatesupportcat($data){		
	      $this->db->where('id',$data['id']);
	      $this->db->update('support_category',$data);
        } 
		function deletesupportcat($id){		
	      $this->db->where('id',$id);
	      $this->db->delete('support_category');
        } 
        function Updateallowance($data){		
	      $this->db->where('id',$data['id']);
	      $this->db->update('allowance',$data);
        } 
         public function get_emppay()
		{
			$admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $this->db->where('service_provider_id',$service_provider_id);
			}
	
			return $this->db->get('emppay_guide')->result_array();

		}
			public function insertemppay($data){
				$admin_id=$this->session->userdata('admin_id');
			$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
            if($admin_role_id==8)
			{
			  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
	          $data['service_provider_id']=$service_provider_id; 
			}
			$this->db->insert('emppay_guide', $data);
			return true;
		}
		public function get_emp_classification(){
			return $this->db->get('emp_classification')->result_array();

		}
		public function get_empcontract(){
			return $this->db->get('emp_contract')->result_array();

		}
		public function get_emptype(){
			return $this->db->get('emp_type')->result_array();

		}
		function Updateemppay($data){		
	      $this->db->where('id',$data['id']);
	      $this->db->update('emppay_guide',$data);
        } 
		function deleteemppay($id){		
	      $this->db->where('id',$id);
	      $this->db->delete('emppay_guide');
        } 
public function getallowance($id){
			$query = $this->db->get_where('allowance', array('id' => $id));
			return $result = $query->row_array();
		}
		



	
		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return true;
		}

		//---------------------------------------------------
		// Change user status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_users');
		} 

	}

?>