

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?= trans('Primary Careplan') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">


                  <?php 
                  /* echo '<pre>';
                print_r($primary_care_plan);
               echo '</pre>';
  */
 ?>
                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>


   <?php if(empty($primary_care_plan))
    {   ?>

                  <?php echo form_open_multipart(base_url('admin/participant/careprofile/'.$admin['id'].'/primarycareplan/edit'), 'class="form-horizontal"' )?> 
                  <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('my_medical_condition') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="my_medical_condition" class="form-control" id="firstnamy_medical_coditionme" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>


                   <div id="inputFormRow">
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?= trans('my_primary_disability') ?></label>
                  </div>
                   </div>
                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="my_primary_disability[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="<?= trans('my_primary_disability') ?>">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <button id="addRow" type="button" class="btn btn-info">Add More</button>
                  </div>
                  </div>
                  </div>


                   
            <div id="newRow"></div>


                   

            <div id="inputFormRow">
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('my_know_alegy') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="my_know_alegy[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <button id="addRow1" type="button" class="btn btn-info">Add More</button>
                
                  </div>
                   </div>
                   </div>

                   
                   <div id="newRow1"></div>




                   
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('reaction') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="reaction" class="form-control" id="firstnamy_medical_coditionme" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>


                   
                   
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname"  class="col-md-6 control-label"><?= trans('action_on_reaction') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="action_on_reaction" class="form-control" id="firstnamy_medical_coditionme" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>



                   
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?= trans('general_alerts') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" required name="general_alerts" class="form-control" id="firstnamy_medical_coditionme" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>






                   <center>
<h3>My Appointed Decision Maker
</h3>
        </center>
                   <div class='row'>
                   <div class="col-sm-4">
                   <label for="lastname" class="col-md-12 control-label"><?= trans('I_have_an_alternative_decision_maker') ?></label></div>
                   <div class="col-sm-4">
                   <div class="form-group">
                    <div class="col-md-12">
                    <select class="form-control advance_helth_care_directive" name="advance_helth_care_directive" class="form-control">
                        <option value=""><?= trans('please_select') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                      
                        </select>
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"></div>
                  </div>

                  <div class='hide_div_on_adv_no' style='display:none;'>
                  
                  <div class='row'>
                   <div class="col-sm-4">
                   <label for="lastname" class="col-md-12 control-label"><?= trans('Type') ?></label></div>
                   <div class="col-sm-4">
                   <div class="form-group">
                    <div class="col-md-12">
                    <select name="induring_poa" class="form-control">
                        <option value=""><?= trans('please_select') ?></option>
                          <option >Power of Attorney</option>
                          <option >Office Of Public Guardian</option>
                        <option >Family Member</option>
                        </select>
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4">
                   <label for="lastname" class="col-md-12 control-label"><?= trans('prefered_method_of_contact') ?></label></div>
                   <div class="col-sm-4">
                   <div class="form-group">
                    <div class="col-md-12">
                    <select name="prefered_method_of_contact" class="form-control">
                        <option value=""><?= trans('please_select') ?></option>
                          <option >Phone</option>
                          <option >Mobile</option>
                           <option >Email</option>
                        </select>
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"></div>
                  </div>

                <?php 
                $array=array(
                  array('label'=>'name','required'=>'requdddired','name'=>'aname','type'=>'text', 'value'=>''),
                  array('label'=>'phone_no','name'=>'aphone_no','required'=>'requirded','type'=>'text', 'value'=>''),
                  array('label'=>'mobile','name'=>'amobile','type'=>'text', 'required'=>'reqduired','value'=>''),
                  array('label'=>'email','name'=>'aemail','type'=>'text', 'required'=>'requidred','value'=>''),
                  array('label'=>'address','name'=>'aaddress','type'=>'text','required'=>'requdired', 'value'=>''),
                  array('label'=>'relationship','name'=>'arelationship','type'=>'text', 'required'=>'rsequired','value'=>''),
                  array('label'=>'type','name'=>'atype','type'=>'hidden','required'=>'requiredd', 'value'=>'NULL'),
                );
               echo create_formb($array);
               ?>

                  

                  </div>  <!--hide_div_on_adv_no-->


                  <hr>
                  <center>
<h3>Advanced Health Directive
</h3>
        </center>
      
        <?php $dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
                $array=array(
                  array('label'=>'I_have_an_Advanced_Health_Directive','required'=>'redquired','name'=>'I_have_an_Advanced_Health_Directive','type'=>'select', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
                  
                );
               echo create_formb($array);
               ?>
            
                  

 <div class="hide_div_on_adv_helthdericetive" style='display:none;'>
  

 <?php $dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
                $array=array(
                  array('label'=>'display_advanced_health_directive_on_support_cosole','required'=>'requdired','name'=>'display_advanced_health_directive_on_support_cosole','type'=>'select', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
                  array('label'=>'upload_advanced_helth_directive','required'=>'reqduired','name'=>'upload_advanced_helth_directive','type'=>'file', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
                  
                );
               echo create_formb($array);
?>

              </div> <!--hide_div_on_adv_helthdericetive close-->
<hr>



<?php 
$dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$dropdown1=select('allied_helth_plan',array('type'=>0));
$array=array(
       array('label'=>'i_have_allied_health_plan','required'=>'requdired','name'=>'i_have_allied_health_plan','type'=>'select', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
            );
echo create_formb($array);
?>

<div class='hide_oni_have_allied_health_plan' style="display:none;">
                <div class='row'>
                   <div class="col-sm-6">  <label for="" class="col-md-12 control-label">
                 I have/need a </label></div>
                   <div class="col-sm-6"></div>
                  </div>

                    <?php  foreach($dropdown1 as $d){?>
                  <div class='row'>
                   <div class="col-sm-12">
   <?php
   
$d['name']=strtolower(str_replace(' ','_',$d['name']));
$array=array(
       array('label'=>$d['name'],'required'=>'requdired','name'=>$d['name'],'type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
            );
echo create_formb($array);
?>
</div>
                  </div>
    <?php } ?>

</div>

<center><h3>Medication</h3></center>
   <?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$array=array(
array('label'=>'i_require_assistance_with_medication','required'=>'requdired','name'=>'i_require_assistance_with_medication','type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
);
echo create_formb($array);
?>

<div class="hide_on_i_require_assistance_with_medication" style="display:none;"> 
<?php
$array=array(
  array('label'=>'medication_assistance_plan','required'=>'df','name'=>'medication_assistance_plan','type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
  );
//  echo create_formb($array);
?>


<?php 
$oth=$this->db->get_where('allied_helth_plan',array('type'=>1,'cat_id'=>18))->result_array();
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
foreach($oth as $o){
//$oth=$this->db->get_where('allied_helth_plan',array('type'=>1,'cat_id'=>6))->result_array();

$o['name']=strtolower(str_replace(' ','_',$o['name']));
  $plan_label='create_'.$o['name'];
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$o['name'],'type'=>'select', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>

</div>




<center><h3>Communication</h3></center>
   <?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$array=array(
array('label'=>'i_have_a_hearing_impairment','required'=>'requdired','name'=>'i_have_a_hearing_impairment','type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
);
echo create_formb($array);
?>

<div class="hide_on_i_have_a_hearing_impairment" style="display:none;"> 
<?php
$array=array(
  array('label'=>'hearing_aids','required'=>'df','name'=>'hearing_aids','type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>

<?php
$array=array(
  array('label'=>'complex_hearing_deficit','required'=>'df','name'=>'complex_hearing_deficit','type'=>'select', 'value'=>'No','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>

<?php
$array=array(
  array('label'=>'free_text_box','required'=>'df','name'=>'free_text_box_communication','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>
</div>
</hr>



<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$array=array(
array('label'=>'i_have_vision_impairment','required'=>'requdired','name'=>'i_have_vision_impairment','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_i_have_vision_impairment" style="display:none;"> 

<?php
$dropdown1=array(array('id'=>'Visually impaired','name'=>'Visually impaired'),array('id'=>'Glasses- Reading','name'=>'Glasses- Reading'),array('id'=>'Glasses- Long distance','name'=>'Glasses- Long distance'),);
$array=array(
array('label'=>'','required'=>'requdired','name'=>'i_have_vision_impairment_option','type'=>'checkbox', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>





<?php
$array=array(
  array('label'=>'free_text_box_if_any_other','required'=>'df','name'=>'free_text_box_vision_impairment_option','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>
</div>
<?php 
$oth=$this->db->get_where('allied_helth_plan',array('type'=>1,'cat_id'=>1))->result_array();
?>

<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
foreach($oth as $o){
  
$o['name']=strtolower(str_replace(' ','_',$o['name']));

  $plan_label='create_'.$o['name'];
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$o['name'],'type'=>'select', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>


<?php
$array=array(
  array('label'=>'i_have_specific_communication_requirements','required'=>'df','name'=>'i_have_specific_communication_requirements','type'=>'select', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>
</hr>

<div class="hide_on_i_have_specific_communication_requirements" style="display:none;"> 
<hr>

<?php
$array=array(
  array('label'=>'my_preferred_lang_is','required'=>'df','name'=>'my_preferred_lang_is','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);


  $dropdown1=array(array('id'=>'Verbal','name'=>'Verbal'),array('id'=>'Non-Verbal','name'=>'Non-Verbal'));
  
    $plan_label='i_am';
  $array=array(
  array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'radio', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);

  $dropdown1=array(array('id'=>'No Assistance','name'=>'No Assistance'),array('id'=>'Interpretor','name'=>'Interpretor'),array('id'=>'Communication Aid(s)','name'=>'Communication Aid(s)'));
  
    $plan_label='i_require';
  $array=array(
  array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'checkbox', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);

  $array=array(
    array('label'=>'my_preferences','required'=>'df','name'=>'my_preferences','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
    );
    echo create_formb($array);
?>
<hr>


<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_primarily_use_non_verbal_communication';
$array=array(
array('label'=>$plan_label,'required'=>'requdired',
'name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>


<?php  
$verbal_communicators=select('care_type',array('id'=>1));
print_r($verbal_communicators);
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
 $plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text',
'label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>

<?php  
$verbal_communicators=select('care_type',array('id'=>3));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,'required'=>'requdired',
'name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>



<?php  
$verbal_communicators=select('care_type',array('id'=>17));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>



<?php  
$verbal_communicators=select('care_type',array('id'=>18));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>


<?php 
  $array=array(
  array('label'=>'i_have_specific_communication_requirements_not_already_discussed','required'=>'df','name'=>'i_have_specific_communication_requirements_not_already_discussed','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>








<hr>

</div>



<hr>

<h3>Domestic Assistance</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_require_domestic_assistance_to_optimize';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_i_require_domestic_assistance_to_optimize" style="display:none;">

<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='create_domestic_assistance_task';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>

<h3>Personal Care</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_require_assistance_with_personal_care';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label?>" style="display:none;">

<?php  
$verbal_communicators1=select('care_type',array('cat_care_id'=>9));
foreach($verbal_communicators1 as $vr1){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr1['id']));
$plan_label1= strtolower(str_replace(' ', '_',$vr1['name']));
$array1=array(
array('free_text'=>$plan_label1.'_free_text',
'label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array1);
}
$array=array(
  array('label'=>'i_have_specific_personal_care_requirement_not_already_discussed','required'=>'df','name'=>'i_have_specific_personal_care_requirement_not_already_discussed','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formb($array);
?>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labe1l='create_personal_Care_task';
$array=array(
array('label'=>$plan_labe1l,'required'=>'requdired','name'=>$plan_labe1l,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_label?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label?>").show();}else{$(".hide_on_<?=$plan_label?>").hide();}});});</script>
<hr>

<h3>Home Maintenance (funded)</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelw='i_require_assistance_with_home_maintaice';
$array=array(
array('label'=>$plan_labelw,'required'=>'requdired','name'=>$plan_labelw,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_labelw?>" style="display:none;">


<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelws='home_maintaince_task_list';
$array=array(
array('label'=>$plan_labelws,'required'=>'requdired','name'=>$plan_labelws,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_labelw?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_labelw?>").show();}else{$(".hide_on_<?=$plan_labelw?>").hide();}});});</script>


<hr>

<h3>Trasport</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelw1='i_require_assistance_with_Transport';
$array=array(
array('label'=>$plan_labelw1,'required'=>'requdired','name'=>$plan_labelw1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_labelw1?>" style="display:none;">


<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelws1='create_Transport_task';
$array=array(
array('label'=>$plan_labelws1,'required'=>'requdired','name'=>$plan_labelws1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_labelw1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_labelw1?>").show();}else{$(".hide_on_<?=$plan_labelw1?>").hide();}});});</script>
<hr> 
<h3>High Intensity Supports</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelw11='i_require_high_intensity_support';
$array=array(
array('label'=>$plan_labelw11,'required'=>'requdired','name'=>$plan_labelw11,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>

<div class="hide_on_<?=$plan_labelw11?>" style="display:none;">
<hr>

<?php 
$arr=array(
'i_require_support_to_manage_severe_constipation'=>'create_bowel_management_plan', 
'i_require_support_with_peg_feeding'=>'create_peg_management_plan',
'i_require_support_with_my_indwelling_catheter'=>'create_catheter_management_plan',
'i_require_support_with_your_in_out_catheter'=>'create_in_out_catheter_management_plan',
'i_require_support_with_non_invasive_ventilation'=>'create_ventilation_plan',
'i_experience_difficulty_with_swallowing_or_yes_noexcessive_drooling_and_are_at_risk_of_choking'=>'create_dysphagia_plan',
'i_have_a_meal_time_plan'=>'create_meal_time_plan',
'i_have_a_tracheostomy'=>'create_tracheostomy', 
'i_have_diabetes'=>'create_diabetes_management_plan', 
'i_have_regular_seizures'=>'create_seizure_management_plan',
'i_have_pressure_or_wound_care_support_requirements'=>'create_wound_care_plan',
'i_have_a_stoma'=>'create_stoma_management_plan',
'i_have_other_health_related_needs'=>'create_custom_care_plan'
);
foreach($arr as $req=>$plan)
{
$plan_labelw11112=$req;
$array=array(
array('label'=>$plan_labelw11112,'required'=>'requdired','name'=>$plan_labelw11112,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_labelw11112?>" style="display:none;">
<?php 
$plan22=$plan;
$array=array(
array('label'=>$plan22,'required'=>'requdired','name'=>$plan22,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_labelw11112?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_labelw11112?>").show();}else{$(".hide_on_<?=$plan_labelw11112?>").hide();}});});</script>
</hr>

<?php 
}
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_labelw11?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_labelw11?>").show();}else{$(".hide_on_<?=$plan_labelw11?>").hide();}});});</script>

<hr>
<h3>Social Support Individual/Group</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_labelw1='i_require_assistance_with_developing_and_maintaining_relationships_and_accessing_the_community';
$array=array(
array('label'=>$plan_labelw1,'required'=>'requdired','name'=>$plan_labelw1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_labelw1?>" style="display:none;">
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='create_social_support_task_list';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_labelw1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_labelw1?>").show();}else{$(".hide_on_<?=$plan_labelw1?>").hide();}});});</script>
<hr>
<h3>Food and Nutrition</h3>
<?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_have_specific_instruaction_regarding_my_diet';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);

$plan_label='my_dietary_requirements';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'text', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);




$verbal_communicators=select('care_type',array('id'=>6));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}


$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_have_meal_plans_issued_by_helth_care_professional';
$array=array(
array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>

<div class="hide_on_<?=$plan_label?>" style="display:none;">

<?php
//$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
//$plan_label1='create_food_and_nutrition_plan';
//$array=array(
//array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
//);
//echo create_formb($array);



$oth=$this->db->get_where('allied_helth_plan',array('type'=>1,'cat_id'=>6))->result_array();
//print_r($oth);
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
foreach($oth as $o){
  $o['name']=strtolower(str_replace(' ','_',$o['name']));

  $plan_label1='create_'.$o['name'];
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$o['name'],'type'=>'selectb', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>

</div>
<script>$(document).ready(function(){$('.<?=$plan_label?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label?>").show();}else{$(".hide_on_<?=$plan_label?>").hide();}});});</script>
<hr>

<h2><center>Physical and Mental Wellbeing</center></h2>
<h3>Mobility</h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_require_assistance_with_mobility';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>


<div class="hide_on_<?=$plan_label1?>" style="display:none;">
<?php


$verbal_communicators=select('care_type',array('cat_care_id'=>7));
//print_r($verbal_communicators);
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,'required'=>'requdired',
'name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}

?>




<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_risk_assessment';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>'mobility_'.$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>

</div>
<script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>








<hr>

<h3>Personal Safety </h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_have_specific_instruction_on_personal_sefety';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label1?>" style="display:none;">
<?php

$plan_label1w='personal_security_option_items_i_have_in_place_are';

$array=array(
  array('label'=>$plan_label1w,'required'=>'requdired','name'=>$plan_label1w,'type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);


  $plan_label1w='i_would_prefer';

  $array=array(
    array('label'=>$plan_label1w,'required'=>'requdired','name'=>$plan_label1w,'type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
    );
    echo create_formb($array);

$verbal_communicators=select('care_type',array('cat_care_id'=>8));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_risk_assessment';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_for_personal_sefety','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
</div>
<script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>








<hr>

<h3>Mood and Wellbeing</h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_have_specific_preferences_on_regarding_wellbeing';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label1?>" style="display:none;">
<?php

$verbal_communicators=select('care_type',array('cat_care_id'=>10));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>
<h5>I have noticed that lately I…</h5> <?php 
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='i_have_littel_interest_or_plesure_in_things_i_normally_enjoy';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_for_personal_sefety','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),

);
echo create_formb($array);


$plan_label11sd='feel_anxious_restless_or_uneasy';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_for_personal_sefety','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),

);
echo create_formb($array);


$plan_label11sd='feel_sad_depressed_or_hopeless';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_for_personal_sefety','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);


echo '<hr>';




$oth=$this->db->get_where('allied_helth_plan',array('type'=>1,'cat_id'=>10))->result_array();
//print_r($oth);
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
foreach($oth as $o){
$o['name']=strtolower(str_replace(' ','_',$o['name']));
$plan_label11sd='create_'.$o['name'];
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$o['name'],'type'=>'select', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>

</div>
<script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>



<hr>


<h3>Confusion / Memory</h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_have_specific_preferences_on_regarding_memory';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label1?>" style="display:none;">
<?php

$verbal_communicators=select('care_type',array('cat_care_id'=>11));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>



<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_risk_assessment';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_memory','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>


</div> <script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>



<hr>


<h3>Behaviours that Challenge or Concern Carers</h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_have_specific_preferences_on_regarding_behaviours_that_challenge_or_concern_carers';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label1?>" style="display:none;">



<?php
$dropdown1=array(
                 array('id'=>'Physcial and mental wellbeing plan','name'=>'Physcial and mental wellbeing plan'),
                 array('id'=>'Treatment support Order','name'=>'Treatment support Order'),
                 array('id'=>'Forensic Order','name'=>'Forensic Order'),
                );
$plan_label11sd='behaviours_order';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'checkbox', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>


<h5>Type of behaviour</h5>
<?php
$verbal_communicators=select('care_type',array('cat_care_id'=>12));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>

<hr>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='i_require_specialiesed_behaviour_support';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>

<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='i_have_positive_behaviour_management_plan_or_steategies_in_place';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>



<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='my_plan_uses_restrictive_practices';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>




<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_positive_behaviour_support_plan';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>




<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_positive_behaviour_support_plan_with_restrictive_practices';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>







<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_risk_assessment';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd.'_behaviours_that_challenge_or_concern_carers','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>


</div> <script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>




<hr>

<h3>Occupation / Leisure Activities</h3>
<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label1='i_require_occupational_with';
$array=array(
array('label'=>$plan_label1,'required'=>'requdired','name'=>$plan_label1,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>
<div class="hide_on_<?=$plan_label1?>" style="display:none;">
<?php

$verbal_communicators=select('care_type',array('cat_care_id'=>13));
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
$plan_label= strtolower(str_replace(' ', '_',$vr['name']));
$array=array(
array('free_text'=>$plan_label.'_free_text','label'=>$plan_label,
'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
}
?>



<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label11sd='create_risk_assessment';
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>'occupation_'.$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>

<hr>
<?php
$nextarr=array('i_would_like_assiatance_to_manage_learning_opportunities',
  'i_would_like_assistance_to_maintain_my_education_or_other_skill_building_opportunities',
  'create_learning_opportunities_/_education_plan',
  'i_would_like_assistance_to_manage_seeking_or_keeping_paid_or_voluntary_employment',
);
foreach($nextarr as $rr)
{

  $plan_label11sd=$rr;
  $array=array(
  array('label'=>$plan_label11sd,'required'=>'requdired',
  'name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);
  
}

?>
<hr>

<?php
$nextarr=array('create_employment_plan',
'i_need_transport_assistance_to_attend_my_occupation_or_leisure_activities',
);
foreach($nextarr as $rr)
{

  $plan_label11sd=$rr;
  $array=array(
  array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,
  'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);
  
}

?>




<hr>

<?php
$nextarr=array('create_transport_tasks_list');
foreach($nextarr as $rr)
{

  $plan_label11sd=$rr;
  $array=array(
  array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formb($array);
  
}

?>




</div> <script>$(document).ready(function(){$('.<?=$plan_label1?>').on('change', function() {if ( this.value == 'Yes'){$(".hide_on_<?=$plan_label1?>").show();}else{$(".hide_on_<?=$plan_label1?>").hide();}});});</script>



<hr>
<h3>Clinical Observations</h3>
<?php 
$rr='i_need_clinical_observations';
$plan_label11sd=$rr;
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);


$rr='create_medical_speciality_plan';
$plan_label11sd=$rr;
$array=array(
array('label'=>$plan_label11sd,'required'=>'requdired','name'=>$plan_label11sd,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'care_profile_review_date','required'=>'requdired','name'=>'care_profile_review_date','type'=>'date', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),

);
echo create_formb($array);




?>







</div>





                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('Add_care_profile') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>


                  <?php } else  {  ?>

  <?php
$f=json_decode($primary_care_plan['data'],true);
foreach($f as $key=>$val)
{
if(!is_array($val))
{
  if($val!='' AND $val!='No' AND $val!='no' )
{ ?>

                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans($key) ?></label>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans($val) ?></label>
                  </div>
                  </div>
                  <div class="col-md-2">
                  </div>
                  </div>

<?php
}
    }
    else
    { 
if($val!='' OR $val!='No' OR $val!='no' )
{ ?>


<div class='row'>
                   <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans($key) ?></label>
                  </div>
                 </div>

                 <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans(implode(',',$val)) ?></label>
               
                </div>
                  </div>
                  <div class="col-md-2">
                  </div>
                   </div>
<?php 
       }   }
  }
?>





























                    <?php } ?>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>



  <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += ' <div class="row">';
        html += '<div class="col-sm-4">';
        html += '<div class="form-group">';
        //html += ' <label for="firstname" class="col-md-6 control-label"><?= trans("my_primary_disability") ?></label>';
        html += ' </div>';
        html += ' </div>';
        html += '<div class="col-md-4">';
        html += '<div class="form-group">';
        html += ' <input type="text" required name="my_primary_disability[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="Add more<?= trans('my_primary_disability') ?>">';
        html += '</div>';
        html += ' </div>';
        html += ' <div class="col-md-4">';
       html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>





<script type="text/javascript">
    // add row
    $("#addRow1").click(function () {
        var html = '';
        html += '<div id="inputFormRow1">';
        html += ' <div class="row">';
        html += '<div class="col-sm-4">';
        html += '<div class="form-group">';
        html += ' </div>';
        html += ' </div>';
        html += '<div class="col-md-4">';
        html += '<div class="form-group">';
        html += ' <input type="text"  required name="my_know_alegy[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="Add more <?= trans('my_know_alegy') ?>">';
        html += '</div>';
        html += ' </div>';
        html += ' <div class="col-md-4">';
       html += '<button id="removeRow1" type="button" class="btn btn-danger">Remove</button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';

        $('#newRow1').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow1', function () {
        $(this).closest('#inputFormRow1').remove();
    });
</script>


<script>
  $(document).ready(function(){
  
    $('.advance_helth_care_directive').on('change', function() {
      if ( this.value == 'Yes')
      //.....................^.......
      {
        $(".hide_div_on_adv_no").show();
      }
      else
      {
        $(".hide_div_on_adv_no").hide();
      }
    });
});

$(document).ready(function(){
  
  $('.I_have_an_Advanced_Health_Directive').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_div_on_adv_helthdericetive").show();
    }
    else
    {
      $(".hide_div_on_adv_helthdericetive").hide();
    }
  });
});



$(document).ready(function(){
  
  $('.i_have_allied_health_plan').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_oni_have_allied_health_plan").show();
    }
    else
    {
      $(".hide_oni_have_allied_health_plan").hide();
    }
  });
});



$(document).ready(function(){
  
  $('.i_require_assistance_with_medication').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_on_i_require_assistance_with_medication").show();
    }
    else
    {
      $(".hide_on_i_require_assistance_with_medication").hide();
    }
  });
});



$(document).ready(function(){
  
  $('.i_have_a_hearing_impairment').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_on_i_have_a_hearing_impairment").show();
    }
    else
    {
      $(".hide_on_i_have_a_hearing_impairment").hide();
    }
  });
});

$(document).ready(function(){
  
  $('.i_have_vision_impairment').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_on_i_have_vision_impairment").show();
    }
    else
    {
      $(".hide_on_i_have_vision_impairment").hide();
    }
  });
});



$(document).ready(function(){
  
  $('.i_have_specific_communication_requirements').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_on_i_have_specific_communication_requirements").show();
    }
    else
    {
      $(".hide_on_i_have_specific_communication_requirements").hide();
    }
  });
});





$(document).ready(function(){
  
  $('.i_require_domestic_assistance_to_optimize').on('change', function() {
    if ( this.value == 'Yes')
    //.....................^.......
    {
      $(".hide_on_i_require_domestic_assistance_to_optimize").show();
    }
    else
    {
      $(".hide_on_i_require_domestic_assistance_to_optimize").hide();
    }
  });
});





 





  </script>




