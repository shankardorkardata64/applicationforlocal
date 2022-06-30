<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function get_user_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_user($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//-----------------------------------------------------
	function get_admin_roles()
	{
		$this->db->from('ci_admin_roles');
		$this->db->where('admin_role_status',1);
		$query=$this->db->get();
		return $query->result_array();
	}

	//-----------------------------------------------------
	function get_admin_by_id($id)
	{
		$this->db->from('ci_admin');
		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');
		$this->db->where('admin_id',$id);
		$query=$this->db->get();
		return $query->row_array();
	}



	function timesheetjson($table,$searchQuery='',$postData=null){

		$response = array();
   
		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value
        $searchQuery = "";
	    //if($searchValue != '')
	    //{
		  // $searchQuery = " (participant like '%".$searchValue."%' or employee like '%".$searchValue."%' or date like'%".$searchValue."%' ) ";
		
	        
	    //}
	    
        
		$this->db->select('count(*) as allcount');
		$records = $this->db->get($table)->result();
		$totalRecords = $records[0]->allcount;
   
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		   //if($searchQuery != '')
		   //$this->db->where($searchQuery);
		   if($this->session->userdata('r')!='')
	    {
	        $this->db->where('region',$this->session->userdata('r'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	    
	    
	        if($this->session->userdata('p')!='')
	    {
	        $this->db->where('participant',$this->session->userdata('p'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	    
	    
	       if($this->session->userdata('s')!='')
	    {
	        $this->db->where('employee',$this->session->userdata('s'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	    
	    $this->db->where('status',1);
		$records = $this->db->get($table)->result();
		$totalRecordwithFilter = $records[0]->allcount;
   
		## Fetch records
		$this->db->select('*');
		   
		    if($this->session->userdata('r')!='')
	    {
	        $this->db->where('region',$this->session->userdata('r'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	    
	    
	        if($this->session->userdata('p')!='')
	    {
	        $this->db->where('participant',$this->session->userdata('p'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	    
	    
	       if($this->session->userdata('s')!='')
	    {
	        $this->db->where('employee',$this->session->userdata('s'));
	        // $this->db->where('employee',$this->session->userdata('e'));
	    }
	     $this->db->where('status',1);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get($table)->result();
        $this->session->set_userdata('last_query',$this->db->last_query());
		$data = array();
        $sr=1;
		foreach($records as $record ){
			$emp=select('ci_admin',array('admin_id'=>$record->employee))[0];
   			$en=$emp['firstname'].' '.$emp['lastname'];
		   
			   $data[] = array(
			  "sr"=>$sr,      
			  "participant"=>@select('participant',array('id'=>$record->participant))[0]['first_name'],
			  "shift_type"=>$record->shift_type,
			  "shift_location"=>$record->shift_location,
			  "date"=>$record->date,
			  "shift_start"=>date('h:i:s a',strtotime($record->shift_start)),
			  "shift_end"=>date('h:i:s a',strtotime($record->shift_end)),
			  "employee"=>$en,
				); 
				$sr++;
		}
   
		## Response
		$response = array(
		   "draw" => intval($draw),
		   "iTotalRecords" => $totalRecords,
		   "iTotalDisplayRecords" => $totalRecordwithFilter,
		   "aaData" => $data
		);
     $this->session->set_userdata('r','');
    $this->session->set_userdata('p','');
    $this->session->set_userdata('s','');
		return $response; 
	  }


	//-----------------------------------------------------
	function get_all($admin_role_id1='')
	{
        //echo $admin_role_id1;
		$admin_id=$this->session->userdata('admin_id');
		 $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
		$admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;

		$this->db->from('ci_admin');
       $this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');


		
		if($this->session->userdata('filter_type')!='')

			$this->db->where('ci_admin.admin_role_id',$this->session->userdata('filter_type'));

		if($this->session->userdata('filter_status')!='')

			$this->db->where('ci_admin.is_active',$this->session->userdata('filter_status'));

		if($this->session->userdata('filter_keyword')!='')

			$this->db->or_like('ci_admin.username',$this->session->userdata('filter_keyword'));


		$filterData = $this->session->userdata('filter_keyword');
        $this->db->like('ci_admin_roles.admin_role_title',$filterData);
	    $this->db->where('ci_admin.is_supper !=', 1);
		
		if($admin_role_id==8)
		{
 		 $this->db->where('ci_admin.service_provider_id',$service_provider_id);
		}

		$this->db->order_by('ci_admin.admin_id','desc');

		$query = $this->db->get();

		//echo $this->db->last_query();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		//echo '<pre>'; print_r($module);
		return $module;
	}


	function get_all1($admin_role_id1='')
	{
        
		 $admin_id=$this->session->userdata('admin_id');
		 $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
		 $admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;
         $this->db->from('ci_admin');
         $this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');
        if($admin_role_id1!='')
		{
		$this->db->where('ci_admin.admin_role_id ', $admin_role_id1);
		}
		
		if($admin_role_id==8)
		{
 		 $this->db->where('ci_admin.service_provider_id',$service_provider_id);
		}

		$this->db->order_by('ci_admin.admin_id','desc');
        $query = $this->db->get();

		//echo $this->db->last_query();

		$module = array();

		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}

		//echo '<pre>'; print_r($module);
		return $module;
	}


	//-----------------------------------------------------
public function add_admin($data){
	$this->db->insert('ci_admin', $data);
	return true;
}

	//---------------------------------------------------
	// Edit Admin Record
public function edit_admin($data, $id){
	$this->db->where('admin_id', $id);
	$this->db->update('ci_admin', $data);
	return true;
}

	//-----------------------------------------------------
function change_status()
{		
	$this->db->set('is_active',$this->input->post('status'));
	$this->db->where('admin_id',$this->input->post('id'));
	$this->db->update('ci_admin');
} 

	//-----------------------------------------------------
function delete($id)
{		
	$this->db->where('admin_id',$id);
	$this->db->delete('ci_admin');
} 

}

?>