

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
         <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                  <h3 class="card-title">
                    <i class="fa fa-list"></i>
                    <?= $title ?>
                  </h3>
              </div>
              <div class="d-inline-block float-right">
                
              </div>
            </div>
            <div class="card-body">
            </div> 
        </div>
    </section>


    <!-- Main content -->
    <section class="content mt10">
    	<div class="card">
    		<div class="card-body">
               <!-- Load Admin list (json request)-->
               <div class="data_container">
               <div class="datalist">
 <!-- For Messages -->
 <?php $this->load->view('admin/includes/_messages.php') ?>
 <?php echo form_open(base_url('admin/service_provider/add'), 'class="form-horizontal"');  ?> 

 <div class="row">

 <div class="col-md-4">

<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('Servive_provider_name') ?></label>

  <div class="col-md-12">
    <input type="text" name="pname" class="form-control" id="username" placeholder="">
  </div>
</div>



<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('Servive_provider_phone') ?></label>

  <div class="col-md-12">
    <input type="text" name="pnumber" class="form-control" id="username" placeholder="">
  </div>
</div>



<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('Servive_provider_address') ?></label>

  <div class="col-md-12">
    <input type="text" name="paddress" class="form-control" id="username" placeholder="">
  </div>
</div>


</div>
<div class="col-md-4">

<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('main_contact_name') ?></label>

  <div class="col-md-12">
    <input type="text" name="cname" class="form-control" id="username" placeholder="">
  </div>
</div>



<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('main_contact_phone') ?></label>

  <div class="col-md-12">
    <input type="text" name="cnumber" class="form-control" id="username" placeholder="">
  </div>
</div>



<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('main_contact_address') ?></label>

  <div class="col-md-12">
    <input type="text" name="caddress" class="form-control" id="username" placeholder="">
  </div>
</div>


</div>
<div class="col-md-4">

<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('what_do_you_call_your_participants?') ?></label>

  <div class="col-md-12">
    <input type="text" name="call_participlant" class="form-control" id="username" placeholder="">
  </div>



  <div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('region') ?></label>

  <div class="col-md-12">
    
<div class="multiselect">
    
    <div id="checkboxes">
        <?php foreach($region as $a) { ?>
      <label for="<?=$a['id']?>">  <input type="checkbox" id="<?=$a['id']?>" name='region[]' value='<?=$a['id']?>'/><?=$a['name']?></label>
       <?php } ?>
    </div>
  </div>

  </div>
  


</div>


</div></div>
               
               </div>

<div class="form-group">
<div class="col-md-12">
<input type="submit" name="submit" value=" <?= $title ?>" class="btn btn-primary pull-right">
</div>
</div>

               <?php echo form_close(); ?>


               </div>
           </div>
       </div>
    </section>
    <!-- /.content -->
</div>







