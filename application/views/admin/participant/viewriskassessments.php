
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

                  <?php echo form_open_multipart(base_url('admin/participant/editriskassessments'), 'class="form-horizontal"');  ?> 
                  


<?php 
$participant_id=1;
$r=$riskassessments;
$dropdown=select('risk_rating');
$array=array(
array('name'=>'hazard_identified','type'=>'text', 'value'=>$r['hazard_identified']),
array('name'=>'id','type'=>'hidden', 'value'=>$r['id']),
array('name'=>'status','type'=>'hidden', 'value'=>0),
array('name'=>'list_current_risk_control','type'=>'text', 'value'=>$r['list_current_risk_control']),
array('name'=>'risk_rating','type'=>'select','value'=>$r['risk_rating'],'dropdown'=>$dropdown,'check_val'=>'id'),
array('name'=>'list_additional_control','type'=>'textarea', 'value'=>$r['list_additional_control']),
array('name'=>'additonal_mesure_imp','type'=>'text', 'value'=>$r['additonal_mesure_imp']),
array('name'=>'date_of_creation','type'=>'date', 'value'=>$r['date_of_creation']),
array('name'=>'date_of_reassesment','type'=>'date', 'value'=>$r['date_of_reassesment']),
);
echo create_form($array);

                  ?>
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
                <!-- /.box-body -->
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>