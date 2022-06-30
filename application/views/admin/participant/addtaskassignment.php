
                  <div class='row'>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-6"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                  </div>

                  <style>
                      .weekDays-selector input {
  display: none!important;
}

.weekDays-selector input[type=checkbox] + label {
  display: inline-block;
  border-radius: 6px;
  background: #dddddd;
  height: 40px;
  width: 46px;
  margin-right: 3px;
  line-height: 40px;
  text-align: center;
  cursor: pointer;
}

.weekDays-selector input[type=checkbox]:checked + label {
  background: #2AD705;
  color: #ffffff;
}



.weekDays-selector1 input {
  display: none!important;
}

.weekDays-selector1 input[type=checkbox] + label {
  display: inline-block;
  border-radius: 6px;
  background: #dddddd;
  height: 40px;
  width: 46px;
  margin-right: 3px;
  line-height: 40px;
  text-align: center;
  cursor: pointer;
}

.weekDays-selector1 input[type=checkbox]:checked + label {
  background: #2AD705;
  color: #ffffff;
}

                      </style>
                      
                      <link href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>


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

                  <?php echo form_open_multipart(base_url('admin/participant/addtaskassignment'), 'class="form-horizontal"');  ?> 
                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('care_profile') ?></label>
                  <div class="col-md-12">
<?php // pd($user_plans);  ?>
                  <select required name="cat_id" class="form-control">
    <option value=''>Select Care Plan</option>
  <?php 
  $sel=select('care_cat');
  foreach($sel as $p1)
  { 
  ?>
   <option value="<?=$p1['id']?>"><?=$p1['name']?></option>
  <?php } ?>
</select>

                  </div>
                  </div>
                  </div>
                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('task_for_careplan') ?></label>
                  <div class="col-md-12">
<?php // pd($user_plans);  ?>
                  <select required name="task_for_careplan" class="form-control">
    <option value=''>Select Care Plan</option>
    <option value='NULL'>General Task</option>
  
  <?php 
  
  foreach($user_plans['Other Care Plan'] as $p)
  { 
  ?>
   <option value="<?=$p['care_plan']?>"> <?=$this->db->get_where('allied_helth_plan',array('id'=>$p['care_plan']))->row()->name?></option>
  <?php } ?>
</select>

                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('task_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="task_name" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   

                  <hr>

                  <div class='row'>
                   <div class="col-sm-12"><div class="form-group">
                  <label for="chkPassport" class="col-md-12 control-label"><?= trans('frequency_option') ?></label>
                  
                  
  </div></div></div>
  <div class='row'>
                  <!--
                   <div class="col-sm-4">
                   <label for="chkPassport">
 <input name='daily'  type="checkbox" id="chkPassport" />
    Daily
</label>  

                   </div>  -->
                   <div class="col-sm-4">
                   <label for="chkPassport">
                   Every
</label>

                   <select id='eday' name='every_days' class="form-control">
    <option value=''>Select days frequency</option>
    <option value='1'>Daily(1 days)</option>
    <?php foreach(array(2,5,10,12,15,20,30) as $days) { ?>
<option value="<?=$days?>"><?=$days?> days</option>
        <?php } ?>
</select> 
                   </div>
                  
                   <div class="col-sm-4">
                       
                          <div class="form-group eday_hide">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('specific_day_of_the_week') ?></label>
                  <div class="col-md-12">

  <?php foreach(array('Mon','Tue','Wed','Thu','Fri','Sat','Sun') as $days) { ?>

  <label for="<?=$days?>">
    <input type="checkbox"  value='<?=$days?>' name='specific_day_of_the_week[]' id="<?=$days?>" />
    <?=$days?>
</label>
<?php } ?>

                 </div>
                       
    </div>
    
    
             <div class="col-sm-4">
    </div>
              </div>


              <hr class='eday_hide'>
                  

                  <div class='row eday_hide'> 
                  <div class="col-sm-8">
               
                  </div>
                  </div>
    
                  <div class="col-sm-4"></div>

                  </div>
<!--
<hr class='eday_hide'>

                  <div class='row eday_hide'> 
                   <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('fortnightly_on') ?></label>
                  <div class="col-md-12">


                  <?php foreach(array('Mon','Tue','Wed','Thu','Fri','Sat','Sun') as $days) { ?>

<label for="f<?=$days?>">
  <input type="checkbox" value='<?=$days?>' name='fortnightly_on[]' id="f<?=$days?>" />
  <?=$days?>
</label>
<?php } ?>


                 </div>
                  </div>
                  </div>
   

                  <div class="col-sm-4"></div>
                  </div>     -->
<input type="hidden" value='<?=$participant_id?>' name='user_id'>

                  <hr>


                  <div class='row'>
                   
                   <div class="col-sm-4"> 
                   <div class="form-group">
                  <label for="monthy_starting_on" class="col-md-12 control-label"><?= trans('monthy_starting_on') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="monthy_starting_on" class="form-control" id="monthy_starting_on" placeholder="">
                  </div>
                  </div> 
                  </div>
                   <div class="col-sm-4">
                       
                         <div class="form-group">

<label for="monthy_starting_on" class="col-md-12 control-label"><?= trans('every_for_month') ?></label>
                  
<select name='every_months' class="form-control">
<option value=''>Select "Every For Months?"</option>
<?php foreach(array(1,2,3,4,5,6,7,8,9,10,11,12) as $days) { ?>
<option value="<?=$days?>"><?=$days?> months</option>
<?php } ?>
</select>
</div>
                       
                   </div> 
                   <div class="col-sm-4">
                       
                        <label for="started_on" class="col-md-12 control-label"><?= trans('started_on') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="started_on" class="form-control" id="started_on" placeholder="">
                  </div>
                   </div>
                  </div>


<hr>
                 

<?php 
$p=hoursRange(0,86400,1800,'');
?>
                    <div class='row'>
                  <div class="col-sm-4">

                  <div class="form-group">

<label for="monthy_starting_on" class="col-md-12 control-label"><?= trans('add_specific_time_of_day') ?></label>
                  
<select name='add_specific_time_of_day[]' multiple class="form-control multiple-select">
<?php foreach($p as $days=>$val) { ?>
<option value="<?=$days?>"><?=$val?></option>
<?php } ?>
</select>
</div>
</div>

                  <div class="col-sm-4">
                  
                  </div> 
                  

                   </div>
                   <div class="col-sm-4">
                   </div>
                    </div>


                    










                  <div class="col-md-12">
                  <div class="form-group">
                      <input type="submit" name="submit" value="<?= trans('save') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>
  <script>
  $(function() {
    $('.multiple-select').multipleSelect()
  })
</script>
  
     <script type="text/javascript">
            $(document).ready(function() {
                $("#eday").on('change', function() {
                    $(this).find("option:selected").each(function() {
                        var geeks = $(this).attr("value");
                       
 // alert(geeks);
  
  if(geeks=='')
  {
                     $(".eday_hide").show();
  }
  else
  {
 $(".eday_hide").hide(); 
  }
  
  
                    });
                }).change();
            });
        </script>
  
  