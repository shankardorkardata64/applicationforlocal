

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

<?php echo form_open(base_url('admin/careprofile/edit'), 'class="form-horizontal"');  ?> 
<div class="form-group">
  <label for="username" class="col-md-12 control-label"><?= trans('care_profile_name') ?></label>

  <div class="col-md-12">
    <input type="text" name="name" value="<?=$info[0]['name']?>" class="form-control" id="username" placeholder="">
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
   <option     <?php if($c['id']==$info[0]['cat_care_id']) { echo 'Selected';} ?>  value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
    
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
<option   value="<?php echo $c['id']; ?>"  <?php if($c['id']==$info[0]['care_input_type']) { echo 'Selected';} ?> ><?php echo $c['name']; ?></option>
<?php } ?>
</select>

</div>
</div>







<input type='hidden' name='id' value='<?=$info[0]['id'  ]?>'>




<div class="form-group">
<div class="col-md-12">
<input type="submit" name="submit" value="<?= trans('update') ?>" class="btn btn-primary pull-right">
</div>
</div>
<?php echo form_close(); ?>
</div>
<div class="col-md-8">

    <div class="container"style="max-width: 700px;">


                                         
    <?php echo form_open(base_url('admin/careprofile/edit_option'), 'class="form-horizontal"');  ?> 
            <div class="row">
                <div class="col-lg-12">
   
                <?php foreach($option as $o){ ?>
     
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                        <input type="text"  required name="option[]" value="<?=$o['name']?>" class="form-control" id="email">
                    
                        <div class="input-group-append">                
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

    <?php } ?>
    <input type='hidden' name='id' value='<?=$info[0]['id']?>'>

    <input type='hidden' name='type_id' value='<?=$info[0]['care_input_type']?>'>


    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>

                    <input type="submit" name="submit" value="<?= trans('update') ?>" class="btn btn-primary pull-right">
                </div>
            </div>


    
 <?php echo form_close(); ?>
                    
        </div>


    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="option[]" class="form-control m-input" placeholder="Enter More Option" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>

</div>
</div>
               
               </div>



               </div>
           </div>
       </div>
    </section>
    <!-- /.content -->
</div>







