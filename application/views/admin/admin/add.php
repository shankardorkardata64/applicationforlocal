
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
                    .error_prefix
                     {
                       color:white;
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
              <?= trans('add_new_admin') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
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

                  <?php echo  form_open_multipart(base_url('admin/admin/add'), 'class="form-horizontal"');  ?> 
                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="firstname"
                   value="<?php echo set_value('firstname'); ?>" 
                    class="form-control" id="firstname">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="lastname"  value="<?php echo set_value('lastname'); ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   



                  <div class='row'>
                   <div class="col-sm-6">

                   <div class="form-group">
                    <label for="username" class="col-md-12 control-label"><?= trans('username') ?></label>
                   <div class="col-md-12">
                      <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" id="username" placeholder="">
                    </div>
                  </div>

                   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                    <label for="email" class="col-md-12 control-label"><?= trans('email') ?></label>

                    <div class="col-md-12">
                      <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email" placeholder="">
                    </div>
                  </div>
                    </div>
                  </div>
   



                  


                  
                  <div class='row'>
                   <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="col-md-12 control-label"><?= trans('password') ?></label>

                    <div class="col-md-12">
                      <input type="password" name="password" class="form-control" id="password" placeholder="">
                      <span><?php echo form_error('password'); ?></span>
                    </div>
                  </div></div>
                   <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="col-md-12 control-label"><?= trans('cpassword') ?></label>

                    <div class="col-md-12">
                      <input type="password" name="cpassword" class="form-control" id="password" placeholder="">
                    </div>
                  </div></div>
                  </div>

                  



                  <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="mobile_no" class="col-md-12 control-label"><?= trans('mobile_no') ?></label>
                  <div class="col-md-12">
                  <input type="number" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>" class="form-control" id="mobile_no" placeholder="">
                  </div>
                  </div></div>

                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="role" class="col-md-12 control-label">Select User Role*</label>
  

                  <?php
                            $role=$this->session->userdata('admin_role_id');
      if($role!=1)
      {
        unset($admin_roles[0]);
      }
                            ?>
                    <div class="col-md-12">
                      <select name="role" id='role' class="form-control">
                        <option value=""><?= trans('select_role') ?></option>
                        <?php foreach($admin_roles as $role): ?>
                          

                          <option value="<?= $role['admin_role_id']; ?>"
                          <?php if(set_value('role')==$role['admin_role_id']) { echo 'selected';} ?>
                          ><?= $role['admin_role_title']; ?></option>
                      
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                     </div>


                     <div class="col-sm-4">
                  <div class="form-group">
                  <label for="role" class="col-md-12 control-label"><?= trans('service_provider') ?>*</label>

                    <div class="col-md-12">
                      <select required name="service_provider_id" class="form-control">
                        <option value="">Select <?= trans('service_provider') ?></option>
                        <?php
                        
                        
$admin_id=$this->session->userdata('admin_id');
$service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
if($this->session->userdata('is_supper')!=1)
{
  $service_provider=$this->db->get_where('service_provider',array('id'=>$service_provider_id))->result_array();
}                       

                        foreach($service_provider as $role): ?>
                          <option  value="<?= $role['id']; ?>"
                          
                          <?php echo set_select('service_provider_id', $role['id']); ?>
                          ><?= $role['pname']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                   </div>
                  

                  </div>

                  <script>
                  $(document).ready(function(){
    $('#role').on('change', function() {
      if ( this.value == '7')
      //.....................^.......
      {
        $("#caretakerfild").show();
      }
      else
      {
        $("#caretakerfild").hide();
      }
    });
});

</script>
<?php
$none='none';
if(set_value('role')==7)
{
  $none='';
}
?>

<div id='caretakerfild' style='display:<?=$none?>;'>



                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('passport_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="passport_number" value="<?php echo set_value('passport_number'); ?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="passport_ex_date"  value="<?php echo set_value('passport_ex_date'); ?>"  class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>

                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('visa_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="visa_number"  value="<?php echo set_value('visa_number'); ?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="visa_ex_date" value="<?php echo set_value('visa_ex_date'); ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('nois_reff_no') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="nois_reff_no" value="<?php echo set_value('nois_reff_no'); ?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  </div>
                  </div>



                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('nois_check_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="nois_check_number" value="<?php echo set_value('nois_check_number'); ?>"  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="nois_check_number_ex_date" value="<?php echo set_value('nois_check_number_ex_date'); ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>



<hr>
                  <div class='row'>
                   <div class="col-sm-4">
                   <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('police_check_issue_date') ?></label>
                  <div class="col-md-12">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"><div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('i_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" value="<?php echo set_value('police_check_issue_date_issue_date'); ?>" name="police_check_issue_date_issue_date" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"><div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" value="<?php echo set_value('police_check_issue_date_ex_date'); ?>" name="police_check_issue_date_ex_date" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
                     
                
                     <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('wwccn')?></label>
                <div class="col-md-12">
                  <input type="text" name="wwccn" value="<?php echo set_value('wwccn'); ?>" class="form-control" id="wwccn" placeholder="">
                  </div>
                  </div>
                  </div>
                
                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="wwccn_d" value="<?php echo set_value('wwccn_d'); ?>" class="form-control" id="wwccn_d" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('dln')?></label>
                  <div class="col-md-12">
                  <input type="text" name="dln" value="<?php echo set_value('dln'); ?>" 
                   class="form-control" id="dln" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-3"><div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dln_d" value="<?php echo set_value('dln_d'); ?>" class="form-control" id="dln_d" placeholder="">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-3"><div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('state') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="state"  value="<?php echo set_value('state'); ?>" class="form-control" id="state" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('What other supports is this
employee qualified to provide?')?></label>
                  </div>
                  </div>
                  <div class="col-sm-6"><div class="form-group">
                  
     <div class="multiselect">
    
    <div id="checkboxes">
        <?php foreach($emp_qualified as $e) { ?>
      <label for="<?=$e['id']?>"><input type="checkbox" id="<?=$e['id']?>" name='emp_qualified[]'
      <?php echo set_checkbox('emp_qualified', $e['id']); ?> 
      value='<?=$e['id']?>'/>   <?=$e['name']?>   </label>
      <br>
       <?php } ?>
    </div>
  </div>
                                   </div>
                  </div>
                </div>
                <hr>

                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('phone_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>"  class="form-control" id="firstname" placeholder="">
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
                          <option    <?php echo set_select('gender', $g['id']); ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  </div>
                  </div>
                  </div>
                  

                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('address') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('timezone') ?></label>
                  
                  <div class="col-md-12">
                      <select name="timezone" class="form-control">
                        <option value=""><?= trans('select_timezone') ?></option>
                        <?php foreach($emp_timezone as $g): ?>
                          <option    <?php echo set_select('timezone', $g['id']); ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>
                 </div>
              
                 <!-- <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emp_contract') ?></label>
                  
                  <div class="col-md-12">
                      <select name="emp_contract" class="form-control">
                        <option value=""><?= trans('select_emp_contract') ?></option>
                        <?php foreach($emp_contract as $g): ?>
                          <option    <?php echo set_select('emp_contract', $g['id']); ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emp_type') ?></label>
                  
                  <div class="col-md-12">
                      <select name="emp_type" class="form-control">
                        <option value=""><?= trans('select_emp_type') ?></option>
                        <?php foreach($emp_type as $g): ?>
                          <option    <?php echo set_select('emp_type', $g['id']); ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>
                  


                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emp_pre_modern_award_classification') ?></label>
                  
                  <div class="col-md-12">
                      <select name="emp_pre_modern_award_classification" class="form-control">
                        <option value=""><?= trans('select') ?></option>
                        <?php foreach($emp_pre_modern_award_classification as $g): ?>
                          <option    <?php echo set_select('emp_pre_modern_award_classification', $g['id']); ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>
                 </div>
-->
                 <hr>
                 
                 <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Characteristics')?></label>
                  <div class="col-md-12">
                  <input type="text" name="characteristics" value="<?php echo set_value('characteristics'); ?>" class="form-control" id="characteristics" placeholder="">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Intrest')?></label>
                  <div class="col-md-12">
                  <input type="text" name="interest" value="<?php echo set_value('interest'); ?>" class="form-control" id="intrest" placeholder="">
                  </div>
                  </div>
                  </div>
                    <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Qualities')?></label>
                  <div class="col-md-12">
                  <input type="text" name="qualities" value="<?php echo set_value('qualities'); ?>"  class="form-control" id="qualities" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                <hr>
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('photo') ?></label>
                  
                   <div class="col-md-12">
                  <input type="file" name="photo"  class="form-control" id="photo" placeholder="">
                  <span style='color:red;'> allowed file extenstions:-gif|jpg|png|jpeg|pdf</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                  <div class="form-group">
                  <!-- <label for="lastname" class="col-md-12 control-label"><?= trans('Document') ?></label>
                  
                   <div class="col-md-12">
                  <input type="file" name="doc"  class="form-control" id="doc" placeholder="">
                  <span style='color:red;'> allowed file extenstions:-gif|jpg|png|jpeg|pdf</span>
                  </div> -->
                </div>
              </div>
                </div>

                 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="after-add-more">
  
    <div class="col-md-4">                                
        <div class="form-group">
            <!-- <label class="control-label">Document if other</label>
            <input maxlength="200" type="file" class="form-control" name="multipleUpload[]" />
            <span style='color:red;'> allowed file extenstions:-gif|jpg|png|jpeg|pdf</span>
         -->
          </div>
    </div>
    <div class="col-md-2">
        <div class="form-group change">
            <!-- <label for="">&nbsp;</label><br/><a class="btn btn-success add-more">+ Add More Documents</a> -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 
         var html = $(".after-add-more").first().clone();
          $(html).find(".change").html("<a class='btn btn-success add-more'>+ Add More Documents</a><a class='btn btn-danger remove'>- Remove</a>");
         $(".after-add-more").last().after(html);
     });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});
</script>
</div>  <!-- caretakerfield end-->

                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('add_user') ?>" class="btn btn-primary pull-right">
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