
                  <div class='row'>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-6"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                  </div>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm46Na2pfh0csGP2bocMljHJ9q8xRbnk8&libraries=places"></script>  
<style>
    #map_canvas
    {
    width: 650px;
    height: 400px;
}
</style>


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

                  <?php echo form_open_multipart(base_url('admin/participant/add'), 'class="form-horizontal"');  ?> 
                  
 <?php
// $address='Rautnagar Akluj 413101';
  //print_r(get_latlong($address));
 ?>
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>";  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="lastname"value="<?php echo set_value('lastname'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('preferred_username') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="preferred_name" value="<?php echo set_value('preferred_name'); ?>";  class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  

                  </div>
   





                  



                  



                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('dva_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="dva_number" value="<?php echo set_value('dva_number'); ?>";  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('dva_number_e') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dva_number_edate" value="<?php echo set_value('dva_number_edate'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>

                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('pension_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="pension_number" value="<?php echo set_value('pension_number'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('pension_number_e') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="pension_number_edate" value="<?php echo set_value('pension_number_edate'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>




                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('dob') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dob" value="<?php echo set_value('dob'); ?>";  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('gender') ?></label>
                  <div class="col-md-12">
                      <select name="gender" class="form-control">
                        <option value=""><?= trans('select_gender') ?></option>
                        <?php foreach($emp_gender as $g): ?>
                          <option value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  </div>
                  
                  </div>
                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('address') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="address" value="<?php echo set_value('address'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('phone_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                        </div>
                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('email') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="email" value="<?php echo set_value('email'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  

                  </div>
                  </div>



                  
                  <div class='row'>
                  <div class="col-sm-6">
                  </div>
                  <div class="col-sm-6">
                  </div>
                  </div>
                  

                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('ndis_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="ndis_number" value="<?php echo set_value('ndis_number'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('medicare_number') ?></label>
                  
                  <div class="col-md-12">
                  <input type="text" name="medicare_number" value="<?php echo set_value('medicare_number'); ?>"; class="form-control" id="firstname" placeholder="">
                  
                  </div>
                  </div>
                  </div>


                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('medicare_number_edate') ?></label>
                  
                  <div class="col-md-12">
                  <input type="date" name="medicare_number_edate" value="<?php echo set_value('medicare_number_edate'); ?>"; class="form-control" id="firstname" placeholder="">
                  
                  </div>
                  </div>
                  </div>
                 </div>
                 




                 <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('cc_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="cc_number" value="<?php echo set_value('cc_number'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('cc_number_edate') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="cc_number_edate" value="<?php echo set_value('cc_number_edate'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>







                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('r_first_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_first_name" value="<?php echo set_value('r_first_name'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('r_last_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_last_name" value="<?php echo set_value('r_last_name'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('r_phone_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_phone_number" value="<?php echo set_value('r_phone_number'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  

                  </div>
   



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('about_me') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="abount_me"  value="<?php echo set_value('abount_me'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('photo') ?></label>
                  <div class="col-md-12">
                  <input type="file" name="file" value="<?php echo set_value('file'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  
                  
                  </div>
                  

                  </div>
   
<hr>
<center>
<h3>About Myself and My Preference</h3>
                        </center>


<br>
                        <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('lang') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="lang" value="<?php echo set_value('lang'); ?>";  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emergency_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="emergency_name" value="<?php echo set_value('emergency_name'); ?>";  class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emergency_phone') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="emergency_phone" value="<?php echo set_value('emergency_phone'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('characterestics') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="characterestics" value="<?php echo set_value('characterestics'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('qualty') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="qualty"  value="<?php echo set_value('qualty'); ?>";  class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('interest') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="interest"  value="<?php echo set_value('interest'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('culture') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="culture" value="<?php echo set_value('culture'); ?>"; class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('spiritual') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="spiritual" value="<?php echo set_value('spiritual'); ?>"; class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('valueandbel') ?></label>
                  <div class="col-md-12">
                    <textarea class="form-control" name="valueandbel" ><?php echo set_value('valueandbel'); ?></textarea>
                  </div>
                  </div>
                  </div>
                  </div>
   






                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('strenghts') ?></label>
                  <div class="col-md-12">
                    
                  <textarea class="form-control" name="strenghts"><?php echo set_value('strenghts'); ?></textarea>
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('interest') ?></label>
                  <div class="col-md-12">
                    
                  <textarea class="form-control" name="interest"><?php echo set_value('interest'); ?></textarea>
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('difficult') ?></label>
                  <div class="col-md-12">
                    <textarea class="form-control" name="difficult"><?php echo set_value('difficult'); ?></textarea>
                  </div>
                  </div>
                  </div>
                  </div>

<!--

                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">Select Address location</label>
                  <div class="col-md-12">
                  <div id="map_canvas"></div>
                  <input type="text"  id="latlng" name='latlng' required  class="form-control" readonly /><br />
      
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  </div>

                  <div class="col-sm-4"></div>
                  </div>-->

   

<hr>
<h5>My Preferred Health Care Providers</h5>
<?php 

$arr=array('GP','Pharmacy','Hospital');
foreach($arr as $rty)
{
?>

<div class="row">
                    <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-12" style="align-items: stretch !important; display:flex !important; flex-direction: column !important; ">

                  <div class='row'>
                
                  <div class="col-sm-4">  
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">Provider Type name</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_type_name[]"  class="form-control" value='<?=$rty?>' readonly id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                

                  <div class="col-sm-4">  
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">name</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_name[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">clinic</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_clinic[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                 
                </div>
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">address</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_address[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">postcode</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_postcode[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4"></div>
                  </div>






                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">phone</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_phone[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">Fax</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_fax[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">                
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">email</label>
                  <div class="col-md-12">
                  <input type="text" name="helthcare_provider_email[]" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
                   </div>
                  </div>

<hr>

<?php } ?>


            <div class="row">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                  <div class="input-group mb-12" style="align-items: stretch !important; display:flex !important; flex-direction: column !important; ">

                  
                  
                  




                            <div class="input-group-append">                
                            </div>
                        </div>
                    </div>
 


                    <div id="newRow"></div>


                    <br>
                    <button id="addRow" type="button" class="btn btn-info">Add More My Preferred Health Care Providers</button>
                </div>
            </div>
    </div>

           <script type="text/javascript">
           $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow"> <hr>';
            html += '<div class="input-group mb-12" style="align-items: stretch !important; display:flex !important; flex-direction: column !important; ">';
            html += '<div class="row">';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">Provider Type name</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_type_name[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">name</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_name[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">clinic</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_clinic[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">address</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_address[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">postcode</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_postcode[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-4"></div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">phone</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_phone[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="form-group">';
            html += '<label for="lastname" class="col-md-12 control-label">Fax</label>';
            html += '<div class="col-md-12">';
            html += '<input type="text" name="helthcare_provider_fax[]" class="form-control" id="lastname" placeholder="">';
            html += '</div>';
            html += ' </div>';
            html += '</div>';
            html += '<div class="col-sm-4">';                
            html += ' <div class="form-group">';
            html += ' <label for="lastname" class="col-md-12 control-label">email</label>';
            html += ' <div class="col-md-12">';
            html += '  <input type="text" name="helthcare_provider_email[]" class="form-control" id="lastname" placeholder="">';
            html += '  </div>';
            html += '  </div>';
            html += '  </div>';
            html += '  </div>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';
             $('#newRow').append(html);
        });
         $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
         });
    </script>



<br>
      </div>






<?php 
$allre=$this->db->get('region')->result_array();
$admin_id=$this->session->userdata('admin_id');
      if($this->session->userdata('is_supper')==1)
      {
        $region=$allre;
      }
      else
      {

        $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
        $region=explode(",",@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
      }
   
        ?>
        <br><br>
                 <div class='row'>
                 
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="region" class="col-md-12 control-label"><?= trans('region') ?></label>
                  <div class="col-md-12">
                      <select name="region"  required id='regions' class="form-control">
                        <option value=""><?= trans('select_region') ?></option>
                    <?php    if($this->session->userdata('is_supper')==1)
      { 
      foreach($region as $g): ?>
          <option value="<?= $g['id']; ?>"><?= $g['name']; ?>
        </option>
        <?php endforeach; ?>
      <?php 
      }
      else { 

    foreach($region as $g): ?>
                          <option value="<?= $g ?>">
                           <?=$this->db->get_where('region',array('id'=>$g))->row()->name?>
                        </option>
                        <?php endforeach; ?>
            <?php } ?>
                        
                      </select>
                  </div>
                  </div>
                  
                  </div>
                 
                  <div class="col-sm-4" style="display:none;">
                  <div class="form-group">
                  <label for="caretaker_id"  class="col-md-12 control-label"><?= trans('Allocate_to_care_taker') ?></label>
                  <div class="col-md-12">
                      <select name="caretaker_id"  id='caretaker_id' class="form-control">
                        <option value=""><?= trans('select_caretaker') ?></option>
<!--                        <?php foreach($caretaker as $g): ?>
                          <option value="<?= $g['admin_id']; ?>"><?= $g['firstname']?>  <?= $g['lastname']; ?> </option>
                        <?php endforeach; ?>-->
                      </select>
                  </div>
                  </div>
                  
                  </div>
                  
                  </div>
                  
<?php //} ?>
        



 
                 <div class='row'>

                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('save') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
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


           <script type="text/javascript">
$(document).ready(function()
{
    
$(document).on('change','#region',function()
{
       // alert('fddsf');
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'GET',
                url:'<?=base_url('admin/participant/ajaxtest/')?>/'+countryID,
                success:function(html){
                    $('#caretaker_id').html(html);
                    $(':input[type="submit"]').prop('disabled', false);
                }
            }); 
        }else{
            $('#caretaker_id').html('<option value="">Select region first</option>');
            $(':input[type="submit"]').prop('disabled', true);
        }
    });
    
    
});
</script>
