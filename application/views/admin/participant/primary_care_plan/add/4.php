<div class="tab">Allied Health Plan:4
    <!-- <form> -->
<p><select class="form-control i_have_allied_health_plan" name="i_have_allied_health_plan" caslass="form-control">
                          <option value=""><?= trans('Allied Health Plan- Yes/No') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>   
<div  id='i_have_allied_health_plan_div' style='display:none';>
<p>
<?php 
$dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));  $dropdown1=select('allied_helth_plan',array('type'=>0));  foreach($dropdown1 as $d){?>
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
</p>               


</div>
<!-- <input type='submit'>
</form> -->
<script>
$(document).ready(function(){
  
  $('.i_have_allied_health_plan').on('change', function() {
    if ( this.value == 'Yes')
    {
      $("#i_have_allied_health_plan_div").show();
      //$("#3_1").attr("required","required");

    }
    else
    {
      $("#i_have_allied_health_plan_div").hide();
     // $("#3_1").removeAttr("required");
     
    }
  });
});
</script>
</div>