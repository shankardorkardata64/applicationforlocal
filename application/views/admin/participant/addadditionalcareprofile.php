
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

                  <?php echo form_open_multipart(base_url('admin/participant/addadditionalcareprofile/'.$i['id']), 'class="form-horizontal"');  ?> 


                   <input type='hidden' name='action' value='add'>
                   <input type='hidden' name='user_id' value='<?=$i['id']?>'>


                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('care_plan') ?></label>
                  <div class="col-md-12">

                  <select  required name="care_plan" class="form-control">
                   <option   value="">Please Select Care Plan</option>   
 
                   <?php 
                   $care_cat=select('allied_helth_plan');
                   foreach($care_cat as $cc) {
                   ?>

 <option value='<?=$cc['id']?>'><?=$cc['name']?></option>
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
                  <select  required name="service_provider" class="form-control">
                  <option   value="">Please Select Care Plan</option>   
                   <?php 
                   foreach($service_provider as $cc) {
                   ?>

 <option value='<?=$cc['id']?>'><?=$cc['pname']?></option>
  <?php } ?> 

                </select>

                  </div>
                  </div>
                  </div>

                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('plan_review_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="plan_review_date" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('assesment_description') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="assesment_description" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('stratergies') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="stratergies" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('add_task_for_support_worker') ?></label>
                  <div class="col-md-12">

                 <select name="add_task_for_support_worker" class="form-control" >  
  <option value=''>Select Yes/No</option>
  <option value='Yes'>Yes</option>
  <option value='No'>No</option>
                 </select>  
                </div>
                  </div>
                  </div>





                  <div class="form-group">
                    <div class="col-md-12">
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