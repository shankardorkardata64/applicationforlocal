
                  <div class='row'>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-6"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                  </div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?= $title ?> </h3>
          </div>
          <div class="d-inline-block float-right">
          <!--  <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
-->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" 
data-target="#myModal">Incident Review and Follow Up</button>

</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Incident Review and Follow Up</h4>
      </div>
      <div class="modal-body">
        
      
<?php echo form_open_multipart(base_url('admin/participant/in_re'), 'class="form-horizontal"');  ?> 
                  

<?php


$array=array(
  array('name'=>'id','type'=>'hidden', 'value'=>$incident['id']));
echo create_form($array);

?>
<div class='row'>
                   <div class="col-sm-6">Incident review and follow up</div>
                   <div class="col-sm-6">
<select required name='incident_review_and_follow_up' class='form-control'>
<option value=''>Select Please</option>
<option value='Yes' <?php if($incident['incident_review_and_follow_up']=='Yes') { echo 'selected';}  ?>>Yes</option>
<option value='No'  <?php if($incident['incident_review_and_follow_up']=='No') { echo 'selected';}  ?>>No</option>
</select>

                   </div>
                  </div>

                  
<div class='row'>
                   <div class="col-sm-6">Type</div>
                   <div class="col-sm-6">
                     <select required name='type' class='form-control'>
<option value=''>Select Please</option>
<option  <?php if($incident['type']=='type1') { echo 'selected';}  ?> value='type1'>type1</option>
<option value='type2'  <?php if($incident['type']=='type2') { echo 'selected';}  ?>>type2</option></select>
  
  </div>
                  </div>
                  
                  
<div class='row'>
                   <div class="col-sm-6">Follow up required</div>
                   <div class="col-sm-6">

                   <select required name='follow_up_required' class='form-control'>
<option value=''>Select Please</option>
<option value='Yes' <?php if($incident['follow_up_required']=='Yes') { echo 'selected';}  ?>>Yes</option>
<option value='No' <?php if($incident['follow_up_required']=='No') { echo 'selected';}  ?> >No</option>
</select>
                   </div>
                  </div>


                  <div class='row'>
                   <div class="col-sm-6">Details of follow up</div>
                   <div class="col-sm-6">
                     <input type='text' placeholder='Details of follow up' 
                     value='<?=$incident['details_of_follow_up']?>'
                     name='details_of_follow_up' class='form-control'>
                   </div> 
                  </div>

                  <div class='row'>
                   <div class="col-sm-6">Prevention measures</div>
                   <div class="col-sm-6">   
                     <input type='text'
                     value='<?=$incident['prevention_mensures']?>'
                     placeholder='Prevention measures' name='prevention_mensures' class='form-control'>
                  </div>
                  </div>


                  <div class='row'>
                   <div class="col-sm-6">Assign to another person?</div>
                   <div class="col-sm-6">
                   <select required name='assign_to_another_person' class='form-control'>
<option value=''>Select Please</option>
<option value='Yes' <?php if($incident['assign_to_another_person']=='Yes') { echo 'selected';}  ?>>Yes</option>
<option value='No'  <?php if($incident['assign_to_another_person']=='No') { echo 'selected';}  ?>>No</option>

</select>
                   </div>
                  </div>

<div class='row'>
                   <div class="col-sm-6">Name of assigned person?</div>
                   <div class="col-sm-6">   
                     <input type='text'
                     
                     value='<?=$incident['name_of_assigned_person']?>'
                     placeholder='Name of assigned person?' name='name_of_assigned_person' class='form-control'>
                  </div>
                  </div>
                  

                  <div class='row'>
                   <div class="col-sm-6">Action</div>
                   <div class="col-sm-6">
                   <select required name='status' class='form-control'>
<option value=''>Select Please</option>
<option value='1'>  Save & Activate</option>
<option value='3'>Close & Archive</option>
</select>  </div>
                  </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <input type="submit" name="submit" value="<?= trans('save') ?>" class="btn btn-primary pull-right">
                  </div>
                 </div>  
                 </div>  
                 <?php echo form_close(); ?>
                 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                  <?php echo form_open_multipart(base_url('admin/participant/editincident'), 'class="form-horizontal"');  ?> 
                  

                  <?php 

$participant_id=$incident['user_id'];

$dropdown=select('incident_select');
$array=array(
array('name'=>'status','type'=>'hidden', 'value'=>$incident['status']),
array('name'=>'id','type'=>'hidden', 'value'=>$incident['id']),
array('name'=>'user_id','type'=>'hidden', 'value'=>$participant_id),
array('name'=>'incident_type','type'=>'select','value'=>$incident['incident_type'],'dropdown'=>$dropdown,'check_val'=>'id'), 
array('name'=>'time','type'=>'time', 'value'=>$incident['time']),
array('name'=>'date','type'=>'date', 'value'=>$incident['date']),
array('name'=>'specific_location','type'=>'text', 'value'=>$incident['specific_location']),
array('name'=>'description_of_incident','type'=>'textarea', 'value'=>$incident['description_of_incident']),
array('name'=>'name_of_contact_detail_of_other_withness','type'=>'text', 'value'=>$incident['name_of_contact_detail_of_other_withness']),
array('name'=>'immediate_action_taken','type'=>'text', 'value'=>$incident['immediate_action_taken']),
array('name'=>'next_of_kin_contacted','type'=>'radio', 'value'=>$incident['next_of_kin_contacted'],'dropdown'=>array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No')),'check_val'=>'id'),
array('name'=>'was_anyone_injured','type'=>'radio','value'=>$incident['was_anyone_injured'],'dropdown'=>array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No')),'check_val'=>'id'),
);



echo create_form($array);

                  ?>
  
  <?php  if($incident['was_anyone_injured']=='Yes'){ $st='none'; } else {$st='df';}?>
  <div id="dvPassport" style="display: <?=$st?>">
<h5>Details of injury</h5>
<?php   
  $dropdown=select('incident_select');
$array=array(
array('required'=>'','label'=>'name_of_person_injured','name'=>'name_of_person_injured','type'=>'text', 'value'=>$incident['name_of_person_injured']),
array('required'=>'','name'=>'injury_date','label'=>'date','type'=>'date', 'value'=>$incident['injury_date']),
array('required'=>'','name'=>'contact_number_of_injured_person','label'=>'contact_number_of_injured_person','type'=>'text', 'value'=>$incident['contact_number_of_injured_person']),
array('required'=>'','name'=>'email_number_of_injured_person','label'=>'email_number_of_injured_person','type'=>'text', 'value'=>$incident['email_number_of_injured_person']),
);
echo create_formb($array);
?>


<h5>Mechanism of injury</h5>
<?php $mechanism_injury=select('mechanism_injury'); ?> 
                   <div class='row'>
<?php 
$incident['mechanism_injury']=str_replace('[','',$incident['mechanism_injury']);
$incident['mechanism_injury']=str_replace(']','',$incident['mechanism_injury']);
foreach($mechanism_injury as $m) { ?> 
                   <div class="col-sm-6">
                    <div class='row'>

                    <div class="col-sm-6"> 
 
 <label for='<?=trans($m['name'])?>' class='col-md-12 control-label'>
 <input id='<?=trans($m['name'])?>' type='checkbox'
 <?php
 if(in_array('"'.$m['id'].'"',explode(",",$incident['mechanism_injury']))){ echo "checked=checked";}  ?>
 value="<?=$m['id']?>" name='mechanism_injury[]'> <?=trans($m['name'])?></label>
</div>
                   
                  </div>
               </div>
<?php } ?>

                  </div>
                  <br>
                  <div class='row'>
                   <div class="col-sm-4">
                   <label for="firstname" class="col-md-12 control-label"><?= trans('If other, provide details') ?></label>
                   </div>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <div class="col-md-12">
                  <input type="text" name="mechanical_if_other" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  
                   <div class="col-sm-4"></div>
                  </div>

</div>
                  <h5>Nature of injury(s) (select all that apply)</h5>
<?php $mechanism_injury=select('nature_of_injury'); ?> 
                   <div class='row'>
<?php 


$incident['nature_of_injury']=str_replace('[','',$incident['nature_of_injury']);
$incident['nature_of_injury']=str_replace(']','',$incident['nature_of_injury']);
foreach($mechanism_injury as $m) { ?> 
                   <div class="col-sm-6">
                    <div class='row'>

                    <div class="col-sm-6"> 
 
 <label for='<?=trans($m['name'])?>' class='col-md-12 control-label'>
 <input id='<?=trans($m['name'])?>' type='checkbox'
 
 <?php
if(in_array('"'.$m['id'].'"',explode(",",$incident['nature_of_injury']))){ echo "checked=checked"; } 
 ?>
 
 value="<?=$m['id']?>" name='nature_of_injury[]'> <?=trans($m['name'])?></label>
</div>
                   
                  </div>
               </div>
<?php } ?>

                  </div>
                  <br>
                  <div class='row'>
                   <div class="col-sm-4">
                   <label for="firstname" class="col-md-12 control-label">
                       <?= trans('If other, provide details') ?></label>
                   </div>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <div class="col-md-12">
                  <input type="text" value="<?=$incident['nature_of_injury_if_other']?>" name="nature_of_injury_if_other" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  
                   <div class="col-sm-4"></div>
                  </div>

<br>
                  <div class='row'>
                   <div class="col-sm-6">
                   <label for="firstname" class="col-md-12 control-label"><?= trans('specific_part_of_the_body_injured') ?></label>
                   </div>
                   <div class="col-sm-6">
                  <div class="form-group">
                  <div class="col-md-12">
                  <input type="text" value="<?=$incident['specific_part_of_the_body_injured']?>" name="specific_part_of_the_body_injured" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>








</div>




  <script>
    $(function () {
        $(".was_anyone_injured").click(function () {
          var test = $(this).val(); 
          if (test=='Yes') {
                $("#dvPassport").show();
                //$("#AddPassport").hide();
            } else {
                $("#dvPassport").hide();
              //  $("#AddPassport").show();
            }
        });
    });
   </script> 

      
<div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <input type="submit" name="submit" value="<?= trans('save') ?>" class="btn btn-primary pull-right">
                  </div>
                 </div>  
                  <div class="col-md-6">
                  
                  </div>
      
</div>            <?php echo form_close(); ?>
           

                  





        <!-- /.box-body -->
              </div>

              
                 
              
                 <div class="col-md-6">
                  
                  </div>
      
</div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>