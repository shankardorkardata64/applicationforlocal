<?php 

function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d') {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function perm($id)
{
    $ci =&get_instance();
    $role=$ci->session->userdata('admin_role_id'); 
    if($role!=1)
    {
    $perm='';
    $perm=$ci->db->get_where('ci_admin_roles',array('admin_role_id'=>$role))->row()->perm; 
    $perm = explode(',', $perm);
    
    if (in_array($id, $perm))
    {
      }
    else
    {  
        $back_to=rand(5345,5345435);
        redirect('access_denied/index/'.$back_to);
    }
    }

}






function get_user_list_with_participant($participant_id)
{
    
      $ci =&get_instance();
      $resion_id=$ci->db->get_where('participant',array('id'=>$participant_id))->row()->region;
      return $array=get_user_list_with_service_provider(get_service_provider($resion_id));
    
}




function get_service_provider($resion_id)
{
      $ci =&get_instance();
      $service_provider=$ci->db->get('service_provider')->result_array();
      $et=array();
      foreach($service_provider as $s)
      {
          $s_region=explode(',',$s['region']);
     
          if(in_array($resion_id,$s_region))
          {
              $et=array_merge($et,array($s['id']));
              
          }
          
          
      }
      
    return $et;
}



function get_user_list_with_service_provider($array)
{
//$array=array(2,3);
$ci =&get_instance();
$user=array();
foreach($array as $a)
{
$us=$ci->db->get_where('ci_admin',array('service_provider_id'=>$a,'admin_role_id'=>7))->result_array();
foreach($us as $u)
{
    $user=array_merge($user,array($u['admin_id']));
}
}

if(!empty($user))
{
$option='<option value="">Please Select</option>';

foreach($user as $uu)
{
    $name=@$ci->db->get_where('ci_admin',array('admin_id'=>$uu))->row()->username;
   if($name)
   {
   $option.= "<option value='".$uu."'>".$name."</option>";
   }
       
   }
$option.= "";
}
else
{
$option='<option value="">There is no any Caretaker in this resion</option>';
    
}

return $option;



    
    
}


?>