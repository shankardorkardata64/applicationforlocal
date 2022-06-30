
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

                  <?php echo form_open_multipart(base_url('admin/shift/edit'), 'class="form-horizontal"');  ?> 
                  


                  <?php 

$participant=select('participant');
$s=select('shift',array('id'=>$id))[0];
               
                  ?>
<input type='hidden' value='<?=$id?>' name='id'>
<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">participant_name</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="participant" requiredd="" class="form-control participant_name" id="select">
          <option value="">Please Select value</option>
         
         <?php
           foreach($participant as $rate) {  
           ?>
         <option value="<?=$rate['id']?>"
         
         <?php
         if($s['participant']==$rate['id']) { echo  "Selected";}
         ?>
         ><?=$rate['first_name']?> <?=$rate['last_name']?></option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>



                  <?php 
                  $allowance=select('allowance');
                  $employee_pay_rate=select('emppay_guide');
                  $emp=select('ci_admin',array('admin_role_id'=>7));
                  $dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));
                //  echo '<pre>';
               //   print_r($s);


           
                  $array=array(
                  //array('label'=>'participant_name','required'=>'requdddired','name'=>'participant_name','type'=>'text', 'value'=>''),
                  array('label'=>'date','name'=>'date','required'=>'requirded','type'=>'date', 'value'=>$s['date']),
                  );
                  echo create_formb($array);

?>

<div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_start</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time" 
                  reqduired="" name="shift_start" 
                  class="form-control shift_start"
                 
                   id="time" value='<?=($s['shift_start'])?>'
                    placeholder="shift_start">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>
 <!--2021-11-15T13:14-->
 
<!--                  id="time" value='<?=date('Y-m-d\TH:i:s',$s['shift_start'])?>'-->


                  <div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_end</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time" 
                  value='<?=$s['shift_end']?>'
                  reqduired="" name="shift_end" class="form-control shift_end" id="time" placeholder="shift_end">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>


<?php

                  
                  $array=array(
                  array('label'=>'shift_type','name'=>'shift_type','type'=>'text','required'=>'requdired', 'value'=>$s['shift_type']),
                //  array('label'=>'allowances','name'=>'allowances','type'=>'select','dropdown'=>$allowance, 'required'=>'rsequired','value'=>$s['allowances']),
                  array('label'=>'shift_location','name'=>'shift_location','type'=>'text','required'=>'requiredd', 'value'=>$s['shift_location']),
                  array('label'=>'other_location','name'=>'other_location','type'=>'text','required'=>'requiredd', 'value'=>$s['other_location']),
                  );
                 echo create_formb($array);
               ?>



<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">select_employee</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="employee" requiredd="" class="form-control select_employee" id="select">
          <option value="">Please Select value</option>
         
         <?php
           foreach($emp as $rate) {  
           ?>
         <option value="<?=$rate['admin_id']?>"
         
         <?php
         if($s['employee']==$rate['admin_id']) { echo  "Selected";}
         ?>
         ><?=$rate['firstname']?> <?=$rate['lastname']?></option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>






<!--
<div class="row">
      
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">employee_pay_rate</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="pay_rate" requiredd="" class="form-control employee_pay_rate" id="select">
          <option value="">Please Select value</option>
          
         
         <?php
           foreach($employee_pay_rate as $rate) {  
           ?>
         <option value="<?=$rate['id']?>"
         <?php
         if($s['pay_rate']==$rate['id']) { echo  "Selected";}
         ?>
         
         ><?=$rate['hourly_rate']?>(Hourly Rate)</option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       


       </div>
      
       
       <div class="col-sm-2">
       

       </div>
      
       </div>-->








<div class="row">
      
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">Status</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
   <select name='status' class="form-control">
    <option value=''>Select Option Please</option>
    <option <?php  if($s['status']==0){ echo 'selected'; }?> value='0'>Pending</option>
    <option  <?php  if($s['status']==1){ echo 'selected'; }?> value='1'>Accept</option>
    <option value='2' <?php  if($s['status']==2){ echo 'selected'; }?>>Reject</option>
    
    
</select>

      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       


       </div>
      
       
       <div class="col-sm-2">
       

       </div>
      
       </div>




                  <!-------->
                 <div class='row'>

<div class="col-md-6">
              </div>
  <div class="col-md-6">

  <div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Update Data') ?>" class="btn btn-primary pull-right">
  </div>
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