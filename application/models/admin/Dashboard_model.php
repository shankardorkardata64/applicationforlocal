<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){
			return $this->db->count_all('ci_users');
		}
		public function get_active_users(){
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_users');
		}
		public function get_deactive_users(){
			$this->db->where('is_active', 0);
			return $this->db->count_all_results('ci_users');
		}

     public function getparticipant()
	 { 
        $participant=array();
		
        if($this->session->userdata('admin_role_id')==1)
		{
			$participant=$this->db->get('participant')->result_array();
		}
		else
		{
	    $admin_id=$this->session->userdata('admin_id');
		$service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
		$service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
		$region=@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region;
		$region_array=@explode(',',$region); //4,5,6,7
		foreach($region_array as $r)
		{   
		  $p=$this->db->get_where('participant',array('region'=>$r))->result_array();
		  foreach($p as $p1)
		  {
		  array_push($participant,$p1);
		  }
		}
	    }

$people=$participant;
$sortArray = array();
foreach($people as $person){
    foreach($person as $key=>$value){
        if(!isset($sortArray[$key])){
            $sortArray[$key] = array();
        }
        $sortArray[$key][] = $value;
    }
}
$orderby = "id"; //change this to whatever key you want from the array
array_multisort($sortArray[$orderby],SORT_DESC,$people);
return $people;
}

}

?>
