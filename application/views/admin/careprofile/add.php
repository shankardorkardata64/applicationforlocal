

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
                    <?= trans('add_care_cate') ?>
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
<div class="row">

 <div class="col-md-4">

<?php echo form_open(base_url('admin/Careprofile/addcareprofile'), 'class="form-horizontal"');  ?> 
<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('care_profile_name') ?></label>

  <div class="col-md-12">
    <input type="text" name="name" class="form-control" id="username" placeholder="">
  </div>
</div>





<?php
$care_cat=$this->db->get_where('care_cat',array('status'=>1))->result_array();

?>

<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('cname') ?></label>

  <div class="col-md-12">
 

<select class="form-control" name="cat_care_id">
     
 <?php
 foreach($care_cat as $c) {
 ?> 
   <option   value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
    
<?php } ?>
</select>

</div>
</div>

<?php
$care_cat=$this->db->get('care_inputtype')->result_array();

?>


<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('input_type') ?></label>

  <div class="col-md-12">
 

<select class="form-control" name="care_input_type">
 <?php
 foreach($care_cat as $c) {
 ?> 
<option   value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
<?php } ?>
</select>

</div>
</div>






<div class="form-group">
<div class="col-md-12">
<input type="submit" name="submit" value="<?= trans('add_care_cate') ?>" class="btn btn-primary pull-right">
</div>
</div>
<?php echo form_close(); ?>
</div>
<div class="col-md-8">



</div>
</div>
               
               </div>



               </div>
           </div>
       </div>
    </section>
    <!-- /.content -->
</div>







