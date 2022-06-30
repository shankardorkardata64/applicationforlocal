<div class="tab">Communication:6
    <!-- <form> -->
  
    <link href="<?=base_url()?>assets/dist/js/multiselect.css" rel="stylesheet"/>
	<script src="<?=base_url()?>assets/dist/js/multiselect.min.js"></script>

	<style>
		/* example of setting the width for multiselect */
		.mselect {
			width: 800px;
		}
	</style>




<p><select class="form-control i_have_a_hearing_impairment" name="i_have_a_hearing_impairment" caslass="form-control">
                          <option value=""><?= trans('AlI require assistance with Communication- Yes/No') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>   
<div  id='i_have_a_hearing_impairment_div' style='display:none';>
<p>
<select class="form-control hearing_aids" name="hearing_aids" caslass="form-control">
                          <option value=""><?= trans('hearing_aids') ?>- Yes/No</option>
                          <option value="No"><?= trans('hearing_aids') ?>- No </option>
                          <option value="Yes"><?= trans('hearing_aids') ?>- Yes </option>
                        </select>
</p>               

<p>
<select class="form-control complex_hearing_deficit" name="complex_hearing_deficit" caslass="form-control">
                          <option value=""><?= trans('complex_hearing_deficit') ?>- Yes/No</option>
                          <option value="No"><?= trans('complex_hearing_deficit') ?>-No </option>
                          <option value="Yes"><?= trans('complex_hearing_deficit') ?>-Yes </option>
                        </select>
</p>

<p><input placeholder="if any other ?" oninput="this.className = ''" name="free_text_box_communication"></p>

</div>


<p>

<select class="form-control i_have_vision_impairment" name="i_have_vision_impairment" caslass="form-control">
                          <option value=""><?= trans('i_have_vision_impairment') ?>- Yes/No</option>
                          <option value="No"><?= trans('i_have_vision_impairment') ?>-No </option>
                          <option value="Yes"><?= trans('i_have_vision_impairment') ?>-Yes </option>
                        </select>

</p>


<div  id='i_have_vision_impairment_div' style='display:none';>
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
echo create_formc($array);
}
?>


<?php
$dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$array=array(
  array('label'=>'i_have_specific_communication_requirements','required'=>'df','name'=>'i_have_specific_communication_requirements','type'=>'select', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formc($array);
?>
</hr>

<div id="hide_on_i_have_specific_communication_requirements" style="display:none;"> 
<hr>

<?php
$array=array(
  array('label'=>'my_preferred_lang_is','required'=>'df','name'=>'my_preferred_lang_is','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formc($array);


  $dropdown1=array(array('id'=>'Verbal','name'=>'Verbal'),array('id'=>'Non-Verbal','name'=>'Non-Verbal'));
  
    $plan_label='i_am';
  $array=array(
  array('label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
  );
  echo create_formc($array);

  $dropdown11=array('No-Assistance','Interpretor','Communication Aid(s)');
  ?>

<div class='row'>
      
      <div class='col-sm-4'><label for='firstname' class='col-md-12 control-label'><?=trans('i_require')?></label>
      </div>

      <div class='col-sm-4'>
     <div class='form-group'>

  <select id='testSelect1' name='i_require_in_communication[]'  multiple>
    <?php foreach($dropdown11 as $d) { ?>
	<option  value=<?=$d?>><?=$d?></option>
  <?php } ?>
</select>
</div>
</div>
</div>
  <?php 

  $array=array(
    array('label'=>'my_preferences','required'=>'df','name'=>'my_preferences','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
    );
    echo create_formc($array);
?>
<hr>


<?php
$dropdown1=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
$plan_label='i_primarily_use_non_verbal_communication';
$array=array(
array('label'=>$plan_label,'required'=>'requdired',
'name'=>$plan_label,'type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formc($array);
?>


<?php  
$verbal_communicators=select('care_type',array('id'=>1));
//print_r($verbal_communicators);
foreach($verbal_communicators as $vr){
$dropdown1=select('care_type_options',array('care_profile_id'=>$vr['id']));
 $plan_label= strtolower(str_replace(' ', '_',$vr['name']));

$array=array(
array('free_text'=>$plan_label.'_free_text',
'label'=>$plan_label,'required'=>'requdired','name'=>$plan_label,'type'=>'selectb', 'value'=>'0','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formc($array);
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
echo create_formc($array);
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
echo create_formc($array);
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
echo create_formc($array);
}
?>


<?php 
  $array=array(
  array('label'=>'i_have_specific_communication_requirements_not_already_discussed','required'=>'df','name'=>'i_have_specific_communication_requirements_not_already_discussed','type'=>'text', 'value'=>'','dropdown'=>$dropdown,'check_val'=>'id'),
  );
  echo create_formc($array);
?>







</div>  <!--hide_on_i_have_specific_communication_requirements-->

</div>


</div>


<!-- <input type='submit'>
</form> -->


<script>
$(document).ready(function(){
  
  $('.i_have_specific_communication_requirements').on('change', function() {
    //alert(this.value);
    if ( this.value == 'Yes')
    {

      $("#hide_on_i_have_specific_communication_requirements").show();
      //$("#3_1").attr("required","required");

    }
    else
    {
      $("#hide_on_i_have_specific_communication_requirements").hide();
     // $("#3_1").removeAttr("required");
     
    }
  });
});
</script>

<script>
$(document).ready(function(){
  
  $('.i_have_vision_impairment').on('change', function() {
    if ( this.value == 'Yes')
    {
      $("#i_have_vision_impairment_div").show();
      //$("#3_1").attr("required","required");

    }
    else
    {
      $("#i_have_vision_impairment_div").hide();
     // $("#3_1").removeAttr("required");
     
    }
  });
});
</script>

<script>
$(document).ready(function(){
  
  $('.i_have_a_hearing_impairment').on('change', function() {
    if ( this.value == 'Yes')
    {
      $("#i_have_a_hearing_impairment_div").show();
      //$("#3_1").attr("required","required");

    }
    else
    {
      $("#i_have_a_hearing_impairment_div").hide();
     // $("#3_1").removeAttr("required");
     
    }
  });
});
</script>

</div>


<script>
  $(document).ready(function(){
    $('#testSelect1').multiselect(); 
  });
</script>