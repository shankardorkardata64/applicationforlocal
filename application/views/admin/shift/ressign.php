
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

                  <?php echo form_open_multipart(base_url('admin/shift/ressign'), 'class="form-horizontal"');  ?> 
                  


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
        <select name="participant" readonly requiredd="" class="form-control participant_name" id="select">
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













                  <!-------->
                 <div class='row'>

<div class="col-md-6">
              </div>
  <div class="col-md-6">

  <div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Add Split Shift') ?>" class="btn btn-primary pull-right">
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