
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
--></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>

                  <?php echo form_open_multipart(base_url('admin/participant/addincident'), 'class="form-horizontal"');  ?> 
                  

                  <?php 
$dropdown=select('incident_select');
$array=array(
array('name'=>'status','type'=>'hidden', 'value'=>0),
array('name'=>'user_id','type'=>'hidden', 'value'=>$participant_id),
array('name'=>'incident_type','type'=>'select','value'=>'','dropdown'=>$dropdown,'check_val'=>'id'), 
array('name'=>'time','type'=>'time', 'value'=>''),
array('name'=>'date','type'=>'date', 'value'=>''),
array('name'=>'specific_location','type'=>'text', 'value'=>''),
array('name'=>'description_of_incident','type'=>'textarea', 'value'=>''),
array('name'=>'name_of_contact_detail_of_other_withness','type'=>'text', 'value'=>''),
array('name'=>'immediate_action_taken','type'=>'text', 'value'=>''),
array('name'=>'next_of_kin_contacted','type'=>'radio', 'value'=>'','dropdown'=>array(array('id'=>1,'name'=>'Yes'),array('id'=>2,'name'=>'No')),'check_val'=>'id'),
array('name'=>'was_anyone_injured','type'=>'radio','value'=>'','dropdown'=>array(array('id'=>1,'name'=>'Yes'),array('id'=>2,'name'=>'No')),'check_val'=>'id'),
);



echo create_form($array);

                  ?>
  
  <div id="dvPassport" style="display: none">
<h5>Details of injury</h5>
<?php   
  $dropdown=select('incident_select');
$array=array(
array('required'=>'','label'=>'name_of_person_injured','name'=>'name_of_person_injured','type'=>'text', 'value'=>''),
array('required'=>'','name'=>'injury_date','label'=>'date','type'=>'date', 'value'=>''),
array('required'=>'','name'=>'contact_number_of_injured_person','label'=>'contact_number_of_injured_person','type'=>'text', 'value'=>''),
array('required'=>'','name'=>'email_number_of_injured_person','label'=>'email_number_of_injured_person','type'=>'text', 'value'=>''),
);
echo create_formb($array);
?>

<h5>Mechanism of injury</h5>
<?php $mechanism_injury=select('mechanism_injury'); ?> 
                   <div class='row'>
<?php foreach($mechanism_injury as $m) { ?> 
                   <div class="col-sm-6">
                    <div class='row'>

                    <div class="col-sm-6"> 
 
 <label for='<?=trans($m['name'])?>' class='col-md-12 control-label'>
 <input id='<?=trans($m['name'])?>' type='checkbox' value="<?=$m['id']?>" name='mechanism_injury[]'> <?=trans($m['name'])?></label>
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
<?php foreach($mechanism_injury as $m) { ?> 
                   <div class="col-sm-6">
                    <div class='row'>

                    <div class="col-sm-6"> 
 
 <label for='<?=trans($m['name'])?>' class='col-md-12 control-label'>
 <input id='<?=trans($m['name'])?>' type='checkbox' value="<?=$m['id']?>" name='nature_of_injury[]'> <?=trans($m['name'])?></label>
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
                  <input type="text" name="nature_of_injury_if_other" class="form-control" id="firstname" placeholder="">
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
                  <input type="text" name="specific_part_of_the_body_injured" class="form-control" id="firstname" placeholder="">
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

                  


                </div>
                <!-- /.box-body -->
              </div>

              
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <input type="submit" name="submit" value="<?= trans('save') ?>" class="btn btn-primary pull-right">
                  </div>
                 </div>  
                  <div class="col-md-6">
                  
                  </div>
      
</div>            <?php echo form_close(); ?>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>