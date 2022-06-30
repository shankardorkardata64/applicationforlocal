<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Participant extends MY_Controller
{
    function __construct(){

        parent::__construct();
        auth_check(); // check login auth
        $this->rbac->check_module_access();

		$this->load->model('admin/admin_model', 'admin');
		$this->load->model('admin/Activity_model', 'activity_model');
    }

public function uploaddoc($f1,$user_id)
{
  $err=false;
  if(@$_FILES[$f1]['error']==0)
  {
  $f=uploadfile($f1);
  $upload_advanced_helth_directive=@$f['file'];
  if(!$upload_advanced_helth_directive){ $err=@$f['err']; }

  if($err==false){
  if($key=$f1){$val=$upload_advanced_helth_directive;}
  }
  $nu=$this->db->get_where('pcplan',array('user_id'=>$user_id,'key'=>$key))->num_rows();
  if($nu==0)
  {
  $this->db->insert('pcplan',array('user_id'=>$user_id,'key'=>$key,'value'=>$val));
  }
  else
  {
  $this->db->where('user_id',$user_id);  
  $this->db->where('key',$key);  
  $this->db->update('pcplan',array('value'=>$val));  
  } 
  }
}
    public function npadd()
    {

      if($_POST)
      {
          $data=$_POST;
          $user_id=$data['user_id'];
          unset($data['user_id']);
       
       
       
       
       
       
          $file=array('upload_advanced_helth_directive');
          foreach($file as $f1)
            { 
              $this->uploaddoc($f1,$user_id);
            }

       

          echo '<pre>'; print_r($data); 

       
          foreach($data as $key=>$val)
          {
          
          if(is_array($val))
          {
            $val=json_encode($val);
          }  
          
          $this->insert($user_id,$key,$val);
        }
        

  die();

      }
      else
      {
      $id=4;
      $data['id']=$id;
      lv('participant/npadd',$data);
      }
    }

public function insert($user_id,$key,$val)
{
  $nu=$this->db->get_where('pcplan',array('user_id'=>$user_id,'key'=>$key))->num_rows();
          if($nu==0)
          {
          $this->db->insert('pcplan',array('user_id'=>$user_id,'key'=>$key,'value'=>$val));
          }
          else
          {
          $this->db->where('user_id',$user_id);  
          $this->db->where('key',$key);  
          $this->db->update('pcplan',array('value'=>$val));  
          }
}

    public function v2()
    {
      $admin_id=50;   
      $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
      $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
      $region=$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region;
      $region_array=explode(',',$region); //4,5,6,7
      $participant=array();
      foreach($region_array as $r)
      {
        $p=$this->db->get_where('participant',array('region'=>$r))->result_array();
        foreach($p as $p1)
        {
        array_push($participant,$p1);
        }
      }
      print_r($participant); 

    }


public function ajaxtest($resion_id)
{
$this->load->helper('ajax');    

echo get_user_list_with_service_provider(get_service_provider($resion_id));
    
}

    public function addtaskassignment($participant_id='')
    { 
      
      perm(65);
 if($_POST)
 {
 $data=$_POST;
 $participant_id=$data['user_id'];
if(isset($data['daily']) AND $data['daily']=='on')
{
foreach($_POST['add_specific_time_of_day'] as $r)
{
    $in=array();
    
    $in['every_days']=1;
    $in['user_id']=$data['user_id'];
    $in['cat_id'] = $data['cat_id'];
    $in['task_for_careplan']= $data['task_for_careplan'];
    $in['task_name']= $data['task_name'];
    $in['monthy_starting_on'] = $data['monthy_starting_on'];
    $in['every_months'] = $data['every_months'];
    $in['started_on'] = $data['started_on'];
    $in['specific_day_of_the_week']=$in['fortnightly_on']=NULL;
    $in['status']=0;
    $in['add_specific_time_of_day']=$r;
    $this->db->insert('task',$in);  
} 
if($this->db->insert_id()!='')
{

   $this->session->set_flashdata('success', 'care plan task been added successfully!');
   redirect(base_url('admin/participant/view/'.$participant_id));
}
}
else
{
  if(!isset($data['daily']) AND $data['every_days']!='')
  {
 foreach($_POST['add_specific_time_of_day'] as $r)
{ 
    $in=array();
    $in['every_days']=$data['every_days'];
    $in['user_id']=$data['user_id'];
    $in['cat_id'] = $data['cat_id'];
    $in['task_for_careplan']= $data['task_for_careplan'];
    $in['task_name']= $data['task_name'];
    $in['monthy_starting_on'] = $data['monthy_starting_on'];
    $in['every_months'] = $data['every_months'];
    $in['started_on'] = $data['started_on'];
    $in['specific_day_of_the_week']=$in['fortnightly_on']=NULL;
    $in['status']=0;
    $in['add_specific_time_of_day']=$r;
    $this->db->insert('task',$in); 
} 
if($this->db->insert_id()!='')
{

   $this->session->set_flashdata('success', 'task added successfully!');
   redirect(base_url('admin/participant/view/'.$participant_id));
}   
}
  else
  {

  if(!isset($data['daily']) AND $data['every_days']=='' AND !empty($data['specific_day_of_the_week'])) 
  {
foreach($_POST['specific_day_of_the_week'] as $day)
{
    foreach($_POST['add_specific_time_of_day'] as $r)
{   $in=array();
    $in['every_days']=NULL;
    $in['user_id']=$data['user_id'];
    $in['cat_id'] = $data['cat_id'];
    $in['task_for_careplan']= $data['task_for_careplan'];
    $in['task_name']= $data['task_name'];
    $in['monthy_starting_on'] = $data['monthy_starting_on'];
    $in['every_months'] = $data['every_months'];
    $in['started_on'] = $data['started_on'];
    $in['specific_day_of_the_week']=$day;
    $in['fortnightly_on']=NULL;
    $in['status']=0;
    $in['add_specific_time_of_day']=$r;
    $this->db->insert('task',$in); 
}
}



   $this->session->set_flashdata('success', 'care plan task been added successfully!');
   redirect(base_url('admin/participant/view/'.$participant_id));

}

  }
}



}
else
{
        $id=$participant_id;
        $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
        $data['emp_gender']=select('emp_gender');
        $data['i']=select('participant',array('id'=>$id))[0];
        $data['title'] = 'Add Task';
        $data['ajaxurl']='participant/list';
        $primary_care_plan=select('primary_care_plan',array('user_id'=>$id));
        $primary_care_plan=@array('Primary Care Plan'=>$primary_care_plan[0]);
        $other_plan=array('Other Care Plan'=>select('other_care_plan',array('user_id'=>$id)));
        $out=array_merge($primary_care_plan,$other_plan);
        $data['user_plans']=$out;
        $data['participant_id']=$participant_id;
       lv('participant/addtaskassignment',$data);
}
}




public function test()
{
  $data='{"my_medical_condition":"Diabetes, Paraplegic","my_primary_disability":["Autism","TBI"],"my_know_alegy":["Penicillin - Anaphylaxis","Seafood - Rash"],"reaction":"-","action_on_reaction":"Call my EPOA and advise them, send email to me","general_alerts":"I have a German Sheppherd who is my therapy dog ","advance_helth_care_directive":"Yes","induring_poa":"3","prefered_method_of_contact":"1","aname":"Kerry Hill","aphone_no":"123456789","amobile":"123456789","aemail":"mother@gmail.com","aaddress":"address","arelationship":"relationship","atype":"EPOA","I_have_an_Advanced_Health_Directive":"Yes","display_advanced_health_directive_on_support_cosole":"Yes","i_have_allied_health_plan":"Yes","physiotherapy_plan":"Yes","occupational_plan":"No","speech_pathology_plan":"Yes","podiatry_plan":"No","chiropractor_plan":"No","optometry_plan":"No","osteopathy_plan":"No","excersise_physiology_plan":"No","psychology_plan":"No","counselling_plan":"Yes","dietetics_plan":"No","arts_therapy_plan":"No","music_therapy_plan":"No","i_require_assistance_with_medication":"No","medication_assistance_plan":"","i_have_a_hearing_impairment":"Yes","hearing_aids":"Yes","complex_hearing_deficit":"Yes","free_text_box_communication":"this is free test box under communctionaction","i_have_vision_impairment":"Yes","i_have_vision_impairment_option":["Visually impaired","Glasses- Reading"],"free_text_box_vision_impairment_option":"other free test box from communction ","opthomologist_plan":"Yes","optometrist_plan":"Yes","audiologist_and_hearing_plan":"No","i_have_specific_communication_requirements":"No","my_preferred_lang_is":"","my_preferences":"","i_primarily_use_non_verbal_communication":"No","verbal_communicators":"","verbal_communicators_free_text":"","speech":"","speech_free_text":"","non_verbal_level_of_vocalisation":"","non_verbal_level_of_vocalisation_free_text":"","non_verbal_receptive_communication":"","non_verbal_receptive_communication_free_text":"","i_have_specific_communication_requirements_not_already_discussed":"","i_require_domestic_assistance_to_optimize":"Yes","create_domestic_assistance_task":"Yes","i_require_assistance_with_personal_care":"No","bathing_/_showering":"","bathing_/_showering_free_text":"","toileting":"","toileting_free_text":"","i_have_specific_personal_care_requirement_not_already_discussed":"","create_personal_Care_task":"No","i_require_assistance_with_home_maintaice":"No","home_maintaince_task_list":"No","i_require_assistance_with_Transport":"No","create_Transport_task":"No","i_require_high_intensity_support":"No","i_require_support_to_manage_severe_constipation":"No","create_bowel_management_plan":"No","i_require_support_with_peg_feeding":"No","create_peg_management_plan":"No","i_require_support_with_my_indwelling_catheter":"No","create_catheter_management_plan":"No","i_require_support_with_your_in_out_catheter":"No","create_in_out_catheter_management_plan":"No","i_require_support_with_non_invasive_ventilation":"No","create_ventilation_plan":"No","i_experience_difficulty_with_swallowing_or_yes_noexcessive_drooling_and_are_at_risk_of_choking":"No","create_dysphagia_plan":"No","i_have_a_meal_time_plan":"No","create_meal_time_plan":"No","i_have_a_tracheostomy":"No","create_tracheostomy":"No","i_have_diabetes":"No","create_diabetes_management_plan":"No","i_have_regular_seizures":"No","create_seizure_management_plan":"No","i_have_pressure_or_wound_care_support_requirements":"No","create_wound_care_plan":"No","i_have_a_stoma":"No","create_stoma_management_plan":"No","i_have_other_health_related_needs":"No","create_custom_care_plan":"No","i_require_assistance_with_developing_and_maintaining_relationships_and_accessing_the_community":"No","create_social_support_task_list":"No","i_have_specific_instruaction_regarding_my_diet":"Yes","my_dietary_requirements":"dietary requirements","i_have_eating_and_drinking_requirements":"112","i_have_eating_and_drinking_requirements_free_text":"","i_have_meal_plans_issued_by_helth_care_professional":"Yes","food_and_nutrition_plan":"Yes","i_require_assistance_with_mobility":"No","level_of_independent_walking":"","level_of_independent_walking_free_text":"","walking_ability":"","walking_ability_free_text":"","mobility_create_risk_assessment":"No","i_have_specific_instruction_on_personal_sefety":"No","personal_security_option_items_i_have_in_place_are":"","i_would_prefer":"","awareness_of_dangers_in_the_home_(e_g__hot_water,_stove,poisons)":"","awareness_of_dangers_in_the_home_(e_g__hot_water,_stove,poisons)_free_text":"","support_required_in_community":"","support_required_in_community_free_text":"","create_risk_assessment_for_personal_sefety":"No","i_have_specific_preferences_on_regarding_wellbeing":"No","expression":"","expression_free_text":"","alertness":"","alertness_free_text":"","i_have_littel_interest_or_plesure_in_things_i_normally_enjoy_for_personal_sefety":"No","feel_anxious_restless_or_uneasy_for_personal_sefety":"No","feel_sad_depressed_or_hopeless_for_personal_sefety":"No"}';
 $rt=json_decode($data,true);

  foreach($rt as $key=>$val)
  {
      if(!is_array($val))
      {
        //if($key=='Enduring POA')
          echo trans($key).'-'.$val;
          echo '<br>';
        
      }
      else
      { 
      echo trans($key).'-';
      echo implode(',',$val);

     //print_r($val);
      }
      echo '<br>';
  }
    
}

    public function addincident($user_id='')
    {
      perm(73);
     if($_POST)
     {
     $data=$_POST;
     unset($data['submit']);
   
    $data['mechanism_injury']=json_encode($data['mechanism_injury']);
    $data['nature_of_injury']=json_encode($data['nature_of_injury']);
    $this->db->insert('incident',$data);
   redirect(base_url('admin/participant/view/'.$data['user_id']));

  }
     else
     {
       
      $data['participant_id']=$user_id;
      $data['title'] = 'Add Incident Report';
      lv('participant/addincident',$data);
     }

    
    }
    
    public function in_re()
    {
      
      perm(74);
      if($_POST)
      {
        $id=$this->input->post('id');
        $data=$_POST;
        unset($data['submit']);
        unset($data['id']);
        
       $this->db->where('id',$id);
       $this->db->update('incident',$data);
     
        $data=array();      
      $data=@select('incident',array('id'=>$id))[0];
     

      $this->session->set_flashdata('success', 'incident record updated  successfully!');
     redirect(base_url('admin/participant/view/'.$data['user_id']));
      }
        
    }
    public function editincident($id='')
    {
      perm(74);
    if($_POST)
    {
      $id=$this->input->post('id');
      $data=$_POST;
      unset($data['submit']);
      unset($data['id']);
    
     $data['mechanism_injury']=json_encode($data['mechanism_injury']);
     $data['nature_of_injury']=json_encode($data['nature_of_injury']);
     $this->db->where('id',$id);
     $this->db->update('incident',$data);
     
   $this->session->set_flashdata('success', 'incident record updated  successfully!');
   redirect(base_url('admin/participant/view/'.$data['user_id']));
    }
    else
    {
      
      $data['title'] = 'Edit incident ';
      $data['incident']=@select('incident',array('id'=>$id))[0];
      lv('participant/editincident',$data);
    }

    }

    
    public function editriskassessments($id='' )
    {
    perm(71);
   if($_POST)
   {
   $data=$_POST;
   $id=$this->input->post('id');
   unset($data['id']);
   unset($data['submit']);
   $this->db->where('id',$id);
   $this->db->update('riskassessments',$data);
   $participant_id=$this->db->get_where('riskassessments',array('id'=>$id))->row()->user_id;
   $this->session->set_flashdata('success', 'care plan Risk assesment updated successfully!');
   redirect(base_url('admin/participant/editriskassessments/'.$id));
   }
   else
   {
      
      $data['title'] = 'Edit Risk Assessments';
      $data['riskassessments']=@select('riskassessments',array('id'=>$id))[0];
      lv('participant/viewriskassessments',$data);
   }
    }




    public function deleteriskassessments($id)
    {
  perm(71);
   if($id)
   {
   $participant_id=$this->db->get_where('riskassessments',array('id'=>$id))->row()->user_id;
   driskassessments($id);
   $this->session->set_flashdata('success', 'Risk assesment deleted successfully!');
   redirect(base_url('admin/participant/view/'.$participant_id));
   }
    }


    public function addriskassessments($participant_id='')
    {
      perm(70);
      $this->rbac->check_operation_access(); // check opration permission
   if($_POST)
  { //hazard_identified, list_current_risk_control,risk_rating,list_additional_control,additonal_mesure_imp,date_of_creation
    //date_of_reassesment,user_id

  $data=$_POST;
   $participant_id=$data['user_id'];
  unset($data['submit']);
  $data['date_of_reassesment']=date('d-m-Y',strtotime($data['date_of_reassesment']));
  $data['date_of_creation']=date('d-m-Y',strtotime($data['date_of_creation']));
  $this->db->insert('riskassessments',$data);
  if($this->db->insert_id()!='')
  {
  $this->session->set_flashdata('success', 'care plan Risk assesment added successfully!');
  redirect(base_url('admin/participant/view/'.$participant_id));
  }
}
else
{
        $id=$participant_id;
        $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
        $data['emp_gender']=select('emp_gender');
        $data['i']=select('participant',array('id'=>$id))[0];
        $data['title'] = 'Add Risk Assessments';
        $data['ajaxurl']='participant/list';
        $primary_care_plan=select('primary_care_plan',array('user_id'=>$id));
        $primary_care_plan=array('Primary Care Plan'=>$primary_care_plan[0]);
        $other_plan=array('Other Care Plan'=>select('other_care_plan',array('user_id'=>$id)));
        $out=array_merge($primary_care_plan,$other_plan);
        $data['user_plans']=$out;
        $data['participant_id']=$participant_id;
        lv('participant/addriskassessments',$data);
}
}



    public function addtaskassignment_ori($participant_id='')
    { 
      perm(65);
    $this->rbac->check_operation_access(); // check opration permission

  if($_POST)
  {
      
      
      
 $data=$_POST;
 unset($data['submit']);


foreach($_POST['add_specific_time_of_day'] as $r)
{
    if($r!=''){
 $data['specific_day_of_the_week']=@implode(',',$_POST['specific_day_of_the_week']);
 $data['fortnightly_on']=@implode(',',$_POST['fortnightly_on']);
 $data['add_specific_time_of_day']=$r;
 $data['added_at']=time();
 $data['updated_at']='';
 $data['cat_id']=$this->input->post('cat_id');
 $participant_id=$data['user_id'];
 $this->db->insert('task',$data); 
    }
    else
    {
        die('must select time');
    }
}
if($this->db->insert_id()!='')
{

   $this->session->set_flashdata('success', 'care plan task been added successfully!');
   redirect(base_url('admin/participant/view/'.$participant_id));
}
}
else
{
        $id=$participant_id;
        $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
        $data['emp_gender']=select('emp_gender');
        $data['i']=select('participant',array('id'=>$id))[0];
        $data['title'] = 'Add Task';
        $data['ajaxurl']='participant/list';
        $primary_care_plan=select('primary_care_plan',array('user_id'=>$id));
        $primary_care_plan=@array('Primary Care Plan'=>$primary_care_plan[0]);
        $other_plan=array('Other Care Plan'=>select('other_care_plan',array('user_id'=>$id)));
        $out=array_merge($primary_care_plan,$other_plan);
        $data['user_plans']=$out;
        $data['participant_id']=$participant_id;
       lv('participant/addtaskassignment',$data);
}
}

public function view($id)
{

  perm(59);
  $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];

  $data['task']=@select('task',array('user_id'=>$id));
  $data['riskassessments']=@select('riskassessments',array('user_id'=>$id));

  $data['emp_gender']=select('emp_gender');
  $data['i']=select('participant',array('id'=>$id))[0];
  $data['title'] = 'Participant List';
  $data['ajaxurl']='participant/list';
  
   lv('participant/view',$data);
}



public function addadditionalcareprofile($id='')
{  
  //  echo $id;
    //other_care_plan

    $this->rbac->check_operation_access(); // check opration permission
  
      if($_POST)
      { 

        $action=$_POST['action'];
         if($action=='add')
         { perm(62);
          //INSERT INTO `ew_swap_rates` (`id`, `currency_to`, `currency_from`, `rate_from`, `rate_to`, `percentage_rate`, `fee`) VALUES (NULL, 'CNY', 'ERO', '0', '0', '0', '0') 
        $in['user_id']=$_POST['user_id'];
        $in['care_plan']=$_POST['care_plan'];
        $in['service_provider']=$_POST['service_provider'];
        $in['plan_review_date']=$_POST['plan_review_date'];
        $in['assesment_description']=$_POST['assesment_description'];
        $in['stratergies']=$_POST['stratergies'];
        $in['add_task_for_support_worker']=$_POST['add_task_for_support_worker'];
        $in['date']=time();
        $in['status']=0;
        $in['valid_till']=strtotime(date('d-m-Y', strtotime('365 days')));
        $this->db->insert('other_care_plan',$in);
 if($_POST['add_task_for_support_worker']=='Yes') {
     
        $this->session->set_flashdata('success', 'care plan has been added successfully! Please Add Task For this Care plan');
        redirect(base_url('admin/participant/addtaskassignment/'.$id));
 }
 else
 {
     
        $this->session->set_flashdata('success', 'care plan has been added successfully!');
        redirect(base_url('admin/participant/view/'.$id));
     
 }
      }
         elseif($action=='edit')
         {
 
          perm(63);
          $table_id=$_POST['id'];
          //$in['user_id']=$_POST['user_id'];
          //$in['care_plan']=$_POST['care_plan'];
          $in['service_provider']=$_POST['service_provider'];
          $in['plan_review_date']=$_POST['plan_review_date'];
          $in['assesment_description']=$_POST['assesment_description'];
          $in['stratergies']=$_POST['stratergies'];
          $in['add_task_for_support_worker']=$_POST['add_task_for_support_worker'];
       //   $in['date']=time();
          $in['status']=0;
          $this->db->where('id',$table_id);
          $this->db->update('other_care_plan',$in);
         

          
          $this->session->set_flashdata('success', ' care plan has been updated successfully!');
         
          redirect(base_url('admin/participant/editadditionalcareprofile/'.$id));

         }
         else
         {
          $this->session->set_flashdata('error', 'This action is not valid!');

          redirect(base_url('admin/participant/view/'.$id));

         }
         

      }
      else
      {
        perm(64);

    $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
    $data['emp_gender']=select('emp_gender');
    $data['care_cat']=select('care_cat');
    $data['i']=select('participant',array('id'=>$id))[0];
    $data['title'] = 'Allocate Additional Care Plan';
    $data['ajaxurl']='participant/list';
    lv('participant/addadditionalcareprofile',$data);
      }



//user_id	care_plan	service_provider	plan_review_date	assesment_description	stratergies	add_task_for_support_worker	date	status	
}

public function add_goals()
{ 
  perm(66);
  $primary_care_plan_id=$this->input->post('primary_care_plan_id');
$goal_type=$this->input->post('goal_type');
$num=$this->db->get_where('goals',array('primary_care_plan_id'=>$primary_care_plan_id,'goal_type'=>$goal_type))->num_rows();
if($num > 1)
{
  
  $this->session->set_flashdata('error', 'Allready added 2 '.$_POST['goal_type'].' Term Goals');
  redirect(base_url('admin/participant/goals/'.$_POST['user_id']));
  
}


$in=$_POST;
unset($in['submit']);
if($_FILES['picture']['error']==0)
    {
      $config = array(
      'upload_path' => "./uploads/",
      'allowed_types' => "*",
      'overwrite' => TRUE,
      'file_name'=>'goals_'.rand(23,343434).time()
  );
  $this->load->library('upload', $config);
  if($this->upload->do_upload('picture'))
  {
      $udata = $this->upload->data();
      $photo=$udata['file_name'];
   }
  else
    {
    $err=$this->upload->display_errors();
    $this->session->set_flashdata('error', 'Error in uploading Advanced Helth Directive-'.$err);
    redirect(base_url('admin/participant/goals/'.$_POST['user_id']));
    }
    $in['file	']=$photo;
  }
  else
  {
    $in['file	']=NULL;
  }
  $this->db->insert('goals',$in);
  if($this->db->insert_id())
  {
    
    $this->session->set_flashdata('success', $_POST['goal_type'].' Term Goals added successfully');
    redirect(base_url('admin/participant/goals/'.$_POST['user_id']));
  }


}

public function goals($id)
{ 
  perm(69);
  $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
 $data['primary_care_plan_id']=@$data['primary_care_plan']['id'];
 $data['title'] = 'Allocate Goals';
 $data['user_id']=$id;
 $data['ajaxurl']='participant/goals';
 lv('participant/goals',$data);
}





public function editgoals($id)
{ perm(67);
 $data['title'] = 'Edit Goals';
 $data['user_id']=$id;
 $data['goals']=select('goals',array('id'=>$id))[0];
 lv('participant/editgoals',$data);
}
public function edit_goals($id)
{
  if($_POST)
  {
   
 $d=select('goals',array('id'=>$id))[0];
$in=$_POST;
unset($in['submit']);
if($_FILES['picture']['error']==0)
    {
      $config = array(
      'upload_path' => "./uploads/",
      'allowed_types' => "*",
      'overwrite' => TRUE,
      'file_name'=>'goals_'.rand(23,343434).time()
  );
  $this->load->library('upload', $config);
  if($this->upload->do_upload('picture'))
  {
      $udata = $this->upload->data();
      $photo=$udata['file_name'];
   }
  else
    {
    $err=$this->upload->display_errors();
    $this->session->set_flashdata('error', 'Error in uploading Advanced Helth Directive-'.$err);
    redirect(base_url('admin/participant/editgoals/'.$id));
    }
    $in['file	']=$photo;
  }
  else
  {
    $in['file	']=NULL;
  }
  $this->db->where('id',$id);
  $this->db->update('goals',$in);
  
  $this->session->set_flashdata('success', $d['goal_type'].' Term Goals updated successfully');
  redirect(base_url('admin/participant/editgoals/'.$id));
  }

}




public function editadditionalcareprofile($id)
{ 

  perm(63);
 $data['action']='edit'; 
 $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
 $data['emp_gender']=select('emp_gender');
 $data['care_cat']=select('care_cat');
 $data['i']=select('other_care_plan',array('id'=>$id))[0];
 $data['title'] = 'Allocate Additional Care Plan';
 $data['ajaxurl']='participant/list';
 lv('participant/editadditionalcareprofile',$data);
}


public function viewadditionalcareprofile($id)
{ 
  perm(64);
 $data['action']='view'; 
 $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
 $data['emp_gender']=select('emp_gender');
 $data['care_cat']=select('care_cat');
 $data['i']=select('other_care_plan',array('id'=>$id))[0];
 $data['title'] = 'View Additional Care Plan';
 $data['ajaxurl']='participant/list';
 lv('participant/viewadditionalcareprofile',$data);
}

public function viewcareprofile($id)
{
  perm(64);
  $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
  $data['emp_gender']=select('emp_gender');
  $data['i']=select('participant',array('id'=>$id))[0];
  $data['title'] = 'Participant List';
   $data['ajaxurl']='participant/list';
   lv('participant/viewcareprofile',$data);
}

public function careprofile($id='',$type='',$action='')
{ 
  

  if($_POST)
  {
    

      if($type='primarycareplan')
      {
           
          if($action=='add')
          { 
            perm(62);
       if($this->db->get_where('primary_care_plan',array('user_id'=>$id))->num_rows()==0)
        {

          
            $separator=',';
            $inp=$_POST;
            $in['user_id']=$inp['user_id']=$id;
            $in['my_medical_condition']=$inp['my_medical_condition'];
            $in['my_primary_disability']= implode($separator, $inp['my_primary_disability']);
            $in['my_know_alegy']= implode($separator, $inp['my_know_alegy']);
            $in['reaction']=$inp['reaction'];
            $in['action_on_reaction']=$inp['action_on_reaction'];
            $in['general_alerts']=$inp['general_alerts'];
           
            
            $this->db->insert('primary_care_plan',$in);
            $this->activity_model->add_log(4);
            $this->session->set_flashdata('success', 'primary care plan has been added successfully!');
            redirect(base_url('admin/participant/careprofile/'.$id));
        }
        else
        {
          $this->session->set_flashdata('error', 'primary care plan has allready available for this participant!');
          redirect(base_url('admin/participant/careprofile/'.$id));
        
        }

          }
 
          else if($action=='edit')
          { 
            perm(63);
            $separator=',';
            $inp=$_POST;
            
    
            $in['user_id']=$inp['user_id']=$id;
            $in['my_medical_condition']=$inp['my_medical_condition'];
            $in['my_primary_disability']= implode($separator, $inp['my_primary_disability']);
            $in['my_know_alegy']= implode($separator, $inp['my_know_alegy']);
            $in['reaction']=$inp['reaction'];
            $in['action_on_reaction']=$inp['action_on_reaction'];
            $in['general_alerts']=$inp['general_alerts'];
            
            $in['advance_helth_care_directive']=$inp['advance_helth_care_directive'];
            $in['I_have_an_Advanced_Health_Directive']=$inp['I_have_an_Advanced_Health_Directive'];
      if($in['advance_helth_care_directive']=='Yes')
    {
    $in['induring_poa']=$this->input->post('induring_poa');
     $in['prefered_method_of_contact']=$this->input->post('prefered_method_of_contact');
     $in['aname']=$this->input->post('aname');
     $in['aphone_no']=$this->input->post('aphone_no');
     $in['amobile']=$this->input->post('amobile');
     $in['aemail']=$this->input->post('aemail');
     $in['aaddress']=$this->input->post('aaddress');
     $in['arelationship']=$this->input->post('arelationship');
     $in['atype']=$this->input->post('atype');
      }
      else
      {
              $in['induring_poa']=$in['prefered_method_of_contact']=$in['aname']='';
      }

 if($in['I_have_an_Advanced_Health_Directive']=='Yes')
  {
    $in['display_advanced_health_directive_on_support_cosole']=$this->input->post('display_advanced_health_directive_on_support_cosole');

 
    if($_FILES['upload_advanced_helth_directive']['error']==0)
    {
    
   $config = array(
      'upload_path' => "./uploads/",
      'allowed_types' => "*",
      'overwrite' => TRUE,
      //'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
      //'max_height' => "1200",
      //'max_width' => "1900",
      'file_name'=>'pcare_'.rand(23,343434).time()
  );
  $this->load->library('upload', $config);
  if($this->upload->do_upload('upload_advanced_helth_directive'))
  {
      $udata = $this->upload->data();
      $photo=$udata['file_name'];
   }
  else
    {
    $err=$this->upload->display_errors();
    $this->session->set_flashdata('error', 'Error in uploading Advanced Helth Directive-'.$err);
    redirect(base_url('admin/participant/careprofile/'.$id));

    }  
  
  }

    $in['upload_advanced_helth_directive']=$photo;
  }
  else
  {
    $in['display_advanced_health_directive_on_support_cosole']=$in['upload_advanced_helth_directive']=0;
  }




            
               
       if($this->db->get_where('primary_care_plan',array('user_id'=>$id))->num_rows()==0)
       {

            unset($_POST['submit']);
            
            unset($_POST['0']);
        $in['data']=json_encode($_POST);
    //medication_assistance_plan,

$oth=$this->db->get_where('allied_helth_plan',array('type'=>1))->result_array();
foreach($oth as $o)
{
$postt=strtolower(str_replace(' ','_',$o['name']));

if($_POST[$postt]=='Yes')
{
$care_plan=$o['id'];
//$r=array('user_id'=>$id,'care_plan'=>$care_plan,'service_provider'=>1);
$r=array('user_id'=>$id,'care_plan'=>$care_plan);
//print_r($r);
create_other_plan($r);
}
}
/********************************************************************* */
$ar=array();
if($_POST['i_require_domestic_assistance_to_optimize']=='Yes')
{
 $ar['create_domestic_assistance_task']='Domestic Assistance Task'; 
 $cat_id=14;
}
if($_POST['i_require_assistance_with_home_maintaice']=='Yes')
{
 $ar['home_maintaince_task_list']='Home Maintaince Task'; 
 $cat_id=15;
}
if($_POST['i_require_assistance_with_personal_care']=='Yes')
{
 $ar['create_personal_Care_task']='Personal Care Task'; 
 $cat_id=9;
}
if($_POST['i_require_assistance_with_developing_and_maintaining_relationships_and_accessing_the_community']=='Yes')
{
  $ar['create_social_support_task_list']='Social Support Task';
  $cat_id=17;
}
if($_POST['i_require_occupational_with']=='Yes')
{
$ar['create_transport_tasks_list']='Transport Task';
$cat_id=7;
}
/*
echo '<pre>';
print_r($ar);
*/
foreach($ar as $key=>$val)
{
if($_POST[$key]=='Yes')
{
  if($key=='create_domestic_assistance_task'){$cat_id=14;}
  elseif($key=='home_maintaince_task_list'){$cat_id=15; }
  elseif($key=='create_personal_Care_task'){$cat_id=9; }
  elseif($key=='create_social_support_task_list'){$cat_id=17; }
  elseif($key=='create_transport_tasks_list'){$cat_id=7; }
  else { $cat_id=0;}
 $rtu=array('user_id'=>$id,'taskname'=>$val,'cat_id'=>$cat_id);
//print_r($rtu);
create_other_task($rtu);
}
}
/********************************************************************************* */


$ca=array(
'mobility_create_risk_assessment'=>'Mobility' ,
'create_risk_assessment_for_personal_sefety'=>'Personal Sefety',
'create_risk_assessment_memory'=>'Memory',
'create_risk_assessment_behaviours_that_challenge_or_concern_carers'=>'Behaviours That challenge',
'occupation_create_risk_assessment'=>'Occupation');

foreach ($ca as $cc1=>$vaal){
 
if($_POST[$cc1]=='Yes')
{
  $data1=array();
  $data1['hazard_identified']=$vaal.' Risk Assessment';
$data1['list_current_risk_control']=NULL;
$data1['risk_rating']=1;
$data1['list_additional_control']=NULL;
$data1['additonal_mesure_imp']=NULL;
$data1['date_of_reassesment']=NULL;
$data1['date_of_creation']=date('d-m-Y');
$data1['user_id']=$id;
create_other_assessment($data1);
}}
   
        $this->db->insert('primary_care_plan',$in);
        $this->activity_model->add_log(4);
        $this->session->set_flashdata('success', 'primary care plan has been added successfully!');
       }
       else
       {
            $inp=$_POST;
            unset($inp['tid']);
            $in['data']=json_encode($inp);
            $this->db->where('id',$_POST['tid']);  
            $this->db->update('primary_care_plan',$in);
            $this->activity_model->add_log(4);
            $this->session->set_flashdata('success', 'primary care plan has been updated successfully!');
       }
            redirect(base_url('admin/participant/careprofile/'.$id));
    
          }
         else
         {
           echo 'ggg'; die();
         } 
    





      }



  }
  else
  {
    perm(64);
     $data['primary_care_plan']=@select('primary_care_plan',array('user_id'=>$id))[0];
    $data['emp_gender']=select('emp_gender');
    $data['admin']=select('participant',array('id'=>$id))[0];
    $data['title'] = 'Participant List';
     $data['ajaxurl']='participant/list';
     lv('participant/careprofile',$data);
  } 
}

function pfilterdata()
{

  $this->session->set_userdata('pfilter_type',$this->input->post('type'));
  $this->session->set_userdata('pfilter_status',$this->input->post('status'));
  $this->session->set_userdata('pfilter_keyword',$this->input->post('keyword'));
}
public function index($type='')
{    perm(59);
  
    $this->session->set_userdata('pfilter_type','');
    $this->session->set_userdata('pfilter_keyword','');
    $this->session->set_userdata('pfilter_status','');
    $data['info'] = $this->db->get('care_cat')->result_array();
    $data['title'] = 'Participant List';
    $data['ajaxurl']='participant/list';
    lv('participant/index',$data);
}

public function list()
{  perm(59);
   if($this->session->userdata('admin_role_id')==1)
   {
   
     
    $filterData1 = $this->session->userdata('pfilter_type');
    if($filterData1!='')
    $this->db->where('participant.region',$filterData1);
    
    $filterData2 = $this->session->userdata('pfilter_keyword');
    if($filterData2!='')
    $this->db->like('participant.first_name',$filterData2);
    
    $filterData3= $this->session->userdata('pfilter_status');
    if($filterData3!='')
    $this->db->where('participant.status',$filterData3);
    


    // $this->session->set_userdata('pfilter_type','');
    // $this->session->set_userdata('pfilter_status','');
    // $this->session->set_userdata('pfilter_keyword','');
    


    $data['info'] = $this->db->get('participant')->result_array();
  //echo $this->db->last_query();
    
   }
   else
   {
     try{
      $admin_id=$this->session->userdata('admin_id');
      $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
      $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;

          $filterData1 = $this->session->userdata('pfilter_type');
         if($filterData1!='')
         {
           $region=$filterData1;
         }
         else
         {
            $region=@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region;
         }
      
      
      $region_array=@explode(',',$region); //4,5,6,7
      $participant=array();
      foreach($region_array as $r)
      {


        $this->db->where('participant.region',$r);
        
    
        $filterData2 = $this->session->userdata('pfilter_keyword');
        if($filterData2!='')
        $this->db->like('participant.first_name',$filterData2);

        $filterData3= $this->session->userdata('pfilter_status');
        if($filterData3!='')
        $this->db->where('participant.status',$filterData3);
       
        
        $p=$this->db->get('participant')->result_array();
        foreach($p as $p1)
        {
        array_push($participant,$p1);
        }

      }
      $data['info']=$participant;
    }
    catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
    }
      }
    $this->load->view('admin/participant/list',$data);
}

public function add()
{  perm(77);
    $this->rbac->check_operation_access(); // check opration permission
  if($_POST)
  {


    $photo='user.png';
   // pd($_POST); die();

    if($_FILES['file']['error']==0)
    {
    

   $config = array(
      'upload_path' => "./uploads/",
      'allowed_types' => "gif|jpg|png|jpeg|pdf",
      'overwrite' => TRUE,
      'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
      'max_height' => "1200",
      'max_width' => "1900",
      'file_name'=>rand(23,343434).time()
  );
  $this->load->library('upload', $config);
  if($this->upload->do_upload('file'))
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
    $this->loadaddform(); //  redirect(base_url('admin/participant/add'),'refresh');
    }  
  
  }
  else
  {
    $photo='user.png';
  }
    
      $this->form_validation->set_rules('firstname', 'First Name', 'trim|alpha|required');
	    $this->form_validation->set_rules('lastname', 'Last Name', 'trim|alpha|required');
	    $this->form_validation->set_rules('preferred_name', trans('preferred_username'), 'trim');
	    $this->form_validation->set_rules('dob',trans('dob'), 'trim|required');
      $this->form_validation->set_rules('address',trans('address'), 'trim|required');
	    $this->form_validation->set_rules('phone_number',trans('phone_number'), 'trim|required');
	    $this->form_validation->set_rules('ndis_number',trans('ndis_number'), 'trim');
	    $this->form_validation->set_rules('medicare_number',trans('medicare_number'), 'trim');
	    $this->form_validation->set_rules('medicare_number_edate',trans('medicare_number_edate'), 'trim');
	    $this->form_validation->set_rules('pension_number',trans('pension_number'), 'trim');
	    $this->form_validation->set_rules('pension_number_edate',trans('pension_number_e'), 'trim');
	    $this->form_validation->set_rules('dva_number',trans('dva_number'), 'trim');
	    $this->form_validation->set_rules('dva_number_edate',trans('dva_number_e'), 'trim');
	    $this->form_validation->set_rules('cc_number',trans('cc_number'), 'trim');
	    $this->form_validation->set_rules('cc_number_edate',trans('cc_number_edate'), 'trim');
	    $this->form_validation->set_rules('r_first_name',trans('r_first_name'), 'trim|required');
	    $this->form_validation->set_rules('r_last_name',trans('r_last_name'), 'trim|required');
	    $this->form_validation->set_rules('r_phone_number',trans('r_phone_number'), 'trim|required');
	    $this->form_validation->set_rules('abount_me',trans('abount_me'), 'trim|required');
	    $this->form_validation->set_rules('gender',trans('gender'), 'trim|required');
      $this->form_validation->set_rules('email',trans('email'), 'trim|required');
     // $this->form_validation->set_rules('latlng',trans('latlng'), 'trim|required');
    if ($this->form_validation->run() == FALSE) 
    {
        $data = array(
            'errors' => validation_errors()
        );
        $this->session->set_flashdata('errors', $data['errors']);
        $this->loadaddform();
        //redirect(base_url('admin/participant/add'),'refresh');
    }
    else
    {  

      

      
        $in['lang']=$this->input->post('lang');
        $in['emergency_name']=$this->input->post('emergency_name');
        $in['emergency_phone']=$this->input->post('emergency_phone');
        $in['characterestics']=$this->input->post('characterestics');
        $in['qualty']=$this->input->post('qualty');
        $in['interest']=$this->input->post('interest');
        $in['culture']=$this->input->post('culture');
        $in['spiritual']=$this->input->post('spiritual');
        $in['valueandbel']=$this->input->post('valueandbel');
        $in['strenghts']=$this->input->post('strenghts');
        $in['difficult']=$this->input->post('difficult');
      
        $in['first_name']=$this->input->post('firstname');
        $in['last_name']=$this->input->post('lastname');
        $in['preferred_name']=$this->input->post('preferred_name');	
        $in['dob']=$this->input->post('dob');	
        $in['age']=calculate_age($this->input->post('dob'));	
        $in['address']=$this->input->post('address');	
        $in['phone_number']=$this->input->post('phone_number');	
        $in['ndis_number']=$this->input->post('ndis_number');	
        $in['medicare_number']=$this->input->post('medicare_number');	
        $in['medicare_number_edate']=$this->input->post('medicare_number_edate');	
        $in['pension_number']=$this->input->post('pension_number');	
        $in['pension_number_edate']=$this->input->post('pension_number_edate');	
        $in['dva_number']=$this->input->post('dva_number');	
        $in['dva_number_edate']=$this->input->post('dva_number_edate');	
        $in['cc_number']=$this->input->post('cc_number');	
        $in['cc_number_edate']=$this->input->post('cc_number_edate');	
        $in['r_first_name']=$this->input->post('r_first_name');	
        $in['r_last_name']=$this->input->post('r_last_name');	
        $in['r_phone_number']=$this->input->post('r_phone_number');	
      $in['abount_me']=$this->input->post('abount_me');	
      $in['email']=$this->input->post('email');	
      $oo=get_latlong($in['address']);
      $in['latlng']=$oo['latlong'];
     // $in['address']=$oo['formatted_address'];
      $in['photo']=$photo;
      $in['gender']=$this->input->post('gender');	
      $in['status']=1;
      $in['region']=$this->input->post('region');
      $in['image_url']=base_url().'/uploads/';
      $in['added_by_admin_id']=$this->session->userdata('admin_id');
      $in['helthcare_provider_type_name']=json_encode($this->input->post('helthcare_provider_type_name'));
      $in['helthcare_provider_name']=json_encode($this->input->post('helthcare_provider_name'));
      $in['helthcare_provider_clinic']=json_encode($this->input->post('helthcare_provider_clinic'));
      $in['helthcare_provider_address']=json_encode($this->input->post('helthcare_provider_address'));
      $in['helthcare_provider_postcode']=json_encode($this->input->post('helthcare_provider_postcode'));
      $in['helthcare_provider_phone']=json_encode($this->input->post('helthcare_provider_phone'));
      $in['helthcare_provider_fax']=json_encode($this->input->post('helthcare_provider_fax'));
      $in['helthcare_provider_email']=json_encode($this->input->post('helthcare_provider_email'));

      /* if($this->session->userdata('is_supper')==0)
      {
      $in['caretaker_id']=$this->session->userdata('admin_id');	
      }
      else
      { */
      
      $in['caretaker_id']=$this->input->post('caretaker_id');	
      
      //}

      $in = $this->security->xss_clean($in);
			 if(insert('participant',$in)!='')
        {
            $this->activity_model->add_log(4);
            $this->session->set_flashdata('success', 'Participant has been added successfully!');
						redirect(base_url('admin/participant'));
        }
        else
        {
         $this->session->set_flashdata('errors','Try Again');
         redirect(base_url('admin/participant/add'),'refresh');
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
    $data['service_provider']=select('service_provider');
    $data['emp_gender']=select('emp_gender');
    $data['caretaker']=select('ci_admin',array('admin_role_id'=>7));
    $data['title'] = 'Add Participant';
    $data['ajaxurl']='participant/list';
    lv('participant/add',$data);
}


public function edit($id='')
{ 
  perm(60);
  $this->rbac->check_operation_access(); // check opration permission
  if($_POST)
  {
  $id=$this->input->post('id');
  
  if($_FILES['photo']['error']==0)
  {
    $config = array(
    'upload_path' => "./uploads/",
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
//die();
}
else
  {
    $err=$this->upload->display_errors();
  
    $data = array(
      'errors' => $err
  );
  $this->session->set_flashdata('errors', $data['errors']);
  redirect(base_url('admin/participant/edit/'.$id),'refresh');
  }  

  }



  $this->form_validation->set_rules('firstname', 'First Name', 'trim|alpha|required');
  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|alpha|required');
  $this->form_validation->set_rules('preferred_username', trans('preferred_username'), 'trim|required');
  $this->form_validation->set_rules('dob',trans('dob'), 'trim|required');
  $this->form_validation->set_rules('address',trans('address'), 'trim|required');
  $this->form_validation->set_rules('phone_number',trans('phone_number'), 'trim|required');
  $this->form_validation->set_rules('ndis_number',trans('ndis_number'), 'trim|required');
  $this->form_validation->set_rules('medicare_number',trans('medicare_number'), 'trim|required');
  $this->form_validation->set_rules('medicare_number_edate',trans('medicare_number_edate'), 'trim|required');
  $this->form_validation->set_rules('pension_number',trans('pension_number'), 'trim|required');
  $this->form_validation->set_rules('pension_number_edate',trans('pension_number_e'), 'trim|required');
  $this->form_validation->set_rules('dva_number',trans('dva_number'), 'trim|required');
  $this->form_validation->set_rules('dva_number_edate',trans('dva_number_e'), 'trim|required');
  $this->form_validation->set_rules('cc_number',trans('cc_number'), 'trim|required');
  $this->form_validation->set_rules('cc_number_edate',trans('cc_number_e'), 'trim|required');
  $this->form_validation->set_rules('r_first_name',trans('r_first_name'), 'trim|required');
  $this->form_validation->set_rules('r_last_name',trans('r_last_name'), 'trim|required');
  $this->form_validation->set_rules('r_phone_number',trans('r_phone_number'), 'trim|required');
  $this->form_validation->set_rules('abount_me',trans('abount_me'), 'trim|required');
  $this->form_validation->set_rules('gender',trans('gender'), 'trim|required');
  $this->form_validation->set_rules('email',trans('email'), 'trim|required');
  
 // $this->form_validation->set_rules('latlng',trans('latlng'), 'trim|required');
  if ($this->form_validation->run() == FALSE) 
    {
        $data = array(
            'errors' => validation_errors()
        );
        $this->session->set_flashdata('errors', $data['errors']);
        redirect(base_url('admin/participant/edit/'.$id),'refresh');
    }
    else
    {  






      $in['lang']=$this->input->post('lang');
      $in['emergency_name']=$this->input->post('emergency_name');
      $in['emergency_phone']=$this->input->post('emergency_phone');
      


      $in['characterestics']=$this->input->post('characterestics');
      $in['qualty']=$this->input->post('qualty');
      $in['interest']=$this->input->post('interest');

      $in['culture']=$this->input->post('culture');
      $in['spiritual']=$this->input->post('spiritual');
      $in['valueandbel']=$this->input->post('valueandbel');
      $in['strenghts']=$this->input->post('strenghts');
      
      $in['difficult']=$this->input->post('difficult');
      
      $in['address']=$this->input->post('address');	
      $in['latlng']=get_latlong($in['address'])['latlong'];
      
      $in['first_name']=$this->input->post('firstname');
      $in['last_name']=$this->input->post('lastname');
      $in['preferred_name']=$this->input->post('preferred_username');	
      $in['dob']=$this->input->post('dob');
      $in['age']=calculate_age($this->input->post('dob'));	
      	
      $in['phone_number']=$this->input->post('phone_number');	
      $in['ndis_number']=$this->input->post('ndis_number');	
      $in['medicare_number']=$this->input->post('medicare_number');	
      $in['medicare_number_edate']=$this->input->post('medicare_number_edate');	
      $in['pension_number']=$this->input->post('pension_number');	
      $in['pension_number_edate']=$this->input->post('pension_number_edate');	
      $in['dva_number']=$this->input->post('dva_number');	
      $in['dva_number_edate']=$this->input->post('dva_number_edate');	
      $in['cc_number']=$this->input->post('cc_number');	
      $in['cc_number_edate']=$this->input->post('cc_number_edate');	
      $in['r_first_name']=$this->input->post('r_first_name');	
      $in['r_last_name']=$this->input->post('r_last_name');	
      $in['r_phone_number']=$this->input->post('r_phone_number');	
      $in['abount_me']=$this->input->post('abount_me');	
      $in['email']=$this->input->post('email');	
      if(isset($photo))
      {
      $in['photo']=$photo;	
      }
      $in['gender']=$this->input->post('gender');	
      $in['status']=1;
      $in['region']=$this->input->post('region');	
      $in = $this->security->xss_clean($in);
   	  
      $this->db->where('id',$id);
      $this->db->update('participant',$in);

      $this->activity_model->add_log(4);
      $this->session->set_flashdata('success', 'Participant has been updated  successfully!');
      redirect(base_url('admin/participant/edit/'.$id));
  

    }








  }
else
{  perm(77);
  $data['emp_gender']=select('emp_gender');
    $data['info']=select('participant',array('id'=>$id))[0];
    $data['title'] = 'edit Participant';
    $data['ajaxurl']='participant/list';
    lv('participant/edit',$data);
}


}




function delete($id='')
{
  perm(61);
    $this->db->delete('participant',array('id'=>$id));

    // Activity Log 
   $this->activity_model->add_log(6);
    $this->session->set_flashdata('success','Participant Deleted successfully!');	
    redirect(base_url('admin/participant'));
}




}
