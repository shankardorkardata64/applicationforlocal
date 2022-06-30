
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
            <a href="<?= base_url('admin/participant/editadditionalcareprofile/'.$i['id']); ?>" class="btn btn-success">
            <i class="fa fa-list"></i> <?= trans('Edit Plan') ?></a>
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

                  <?php echo form_open_multipart(base_url('admin/participant/addadditionalcareprofile/'.$i['id']), 'class="form-horizontal"');  ?> 


                   <input type='hidden' name='action' value='edit'>
                   <input type='hidden' name='id' value='<?=$i['id']?>'>





                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('care_plan') ?></label>
                  <div class="col-md-12">

                  <select readonly required name="care_plan" class="form-control">
                   <option   value="">Please Select Care Plan</option>   
 
                   <?php  
                   $care_cat=select('allied_helth_plan');
                   foreach($care_cat as $cc) {
                   ?>

 <option <?php if($i['care_plan']==$cc['id']) {  echo "Selected";  } ?> value='<?=$cc['id']?>'><?=$cc['name']?></option>
  <?php } ?> 

                </select>

            </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('service_provider') ?></label>
                  <div class="col-md-12"> 
                  <?php  
                  $service_provider=select('service_provider');?>
                  <select  readonly  required name="service_provider" class="form-control">
                  <option   value="">Please Select Care Plan</option>   
                   <?php 
                   foreach($service_provider as $cc) {
                   ?>

 <option <?php if($i['service_provider']==$cc['id']) {  echo "Selected";  } ?> value='<?=$cc['id']?>'><?=$cc['pname']?></option>
  <?php } ?> 

                </select>

                  </div>
                  </div>
                  </div>

                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('plan_review_date') ?></label>
                  <div class="col-md-12">
                  <input  readonly type="text" name="plan_review_date" value="<?=$i['plan_review_date']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('assesment_description') ?></label>
                  <div class="col-md-12">
                  <input  readonly type="text" name="assesment_description" value="<?=$i['assesment_description']?>"  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('stratergies') ?></label>
                  <div class="col-md-12">
                  <input  readonly type="text" name="stratergies" value="<?=$i['stratergies']?>"  class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('add_task_for_support_worker') ?></label>
                  <div class="col-md-12">
             
                  <?php  
                  $service_provider=array('Yes','No');?>
                  <select  readonly  required name="add_task_for_support_worker" class="form-control">
                  <option   value=""><?= trans('select') ?> <?= trans('add_task_for_support_worker') ?></option>   
                   <?php 
                   foreach($service_provider as $cc) {
                   ?>
              <option <?php if($i['add_task_for_support_worker']==$cc) {  echo "Selected";  } ?> value='<?=$cc?>'><?=$cc?></option>
  <?php } ?> 

                </select>
                </div>
                  </div>
                  </div>




                  

                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>