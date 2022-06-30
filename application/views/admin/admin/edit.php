
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
              <?= trans('add_new_admin') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
          </div>
        </div>

        <?php
  //       echo '<pre>';
  //  print_r($admin);
   
  //  echo '</pre>';
  //       ?>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>

                  <?php echo form_open_multipart(base_url('admin/admin/edit/'.$admin['admin_id']), 'class="form-horizontal"' )?> 
             

                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="firstname"   value="<?= $admin['firstname']; ?>"  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="lastname"  value="<?= $admin['lastname']; ?>"   class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   



                  <div class='row'>
                   <div class="col-sm-6">

                   <div class="form-group">
                    <label for="username" class="col-md-12 control-label"><?= trans('username') ?></label>
                   <div class="col-md-12">
                      <input type="text"  value="<?= $admin['username']; ?>"  name="username" class="form-control" id="username" placeholder="">
                    </div>
                  </div>

                   </div>
                   <div class="col-sm-6">
                   <div class="form-group">
                    <label for="email" class="col-md-12 control-label"><?= trans('email') ?></label>

                    <div class="col-md-12">
                      <input type="email" name="email" value="<?= $admin['email']; ?>" class="form-control" id="email" placeholder="">
                    </div>
                  </div>
                    </div>
                  </div>
   



                  


                  
                  <div class='row'>
                   <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="col-md-12 control-label"><?= trans('password') ?></label>

                    <div class="col-md-12">
                      <input type="password"  name="password" class="form-control" id="password" placeholder="">
                    </div>
                  </div></div>
                   <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="col-md-12 control-label"><?= trans('cpassword') ?></label>

                    <div class="col-md-12">
                      <input type="password"  name="cpassword" class="form-control" id="password" placeholder="">
                    </div>
                  </div></div>
                  </div>

                  



                  <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="mobile_no" class="col-md-12 control-label"><?= trans('mobile_no') ?></label>
                  <div class="col-md-12">
                  <input type="number" name="mobile_no"  value="<?= $admin['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                  </div>
                  </div></div>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="role" class="col-md-12 control-label"><?= trans('select_admin_role') ?>*</label>

                    <div class="col-md-12">
                      <select name="role" id='role' class="form-control">
                        <option value=""><?= trans('select_role') ?></option>
                        <?php foreach($admin_roles as $role): ?>
                          <option <?php if($admin['admin_role_id']==$role['admin_role_id']){ echo "Selected";} ?> value="<?= $role['admin_role_id']; ?>"><?= $role['admin_role_title']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                   </div>


                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="role" class="col-md-12 control-label"><?= trans('service_provider') ?>*</label>

                    <div class="col-md-12">
                      <select name="service_provider_id" class="form-control">
                        <option value="">Select <?= trans('service_provider') ?></option>
                        <?php
                        
                   ///  $admin['service_provider_id']=$this->db->get_where('ci_admin',array('admin_id'=>$admin['admin_id']))->row()->service_provider_id;

                        
                        foreach($service_provider as $se): ?>
                          <option <?php if($admin['service_provider_id']==$se['id']){ echo "Selected";} ?>
                           value="<?= $se['id']; ?>"><?= $se['pname']; ?></option>
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

<div id='caretakerfild'   <?php if($admin['admin_role_id']!=7) {   ?> style='display:none;' <?php } ?>>




                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('passport_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" value="<?= $admin['passport_number']; ?>" name="passport_number" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" value="<?=$admin['passport_ex_date']; ?>" name="passport_ex_date" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>


                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('visa_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="visa_number" value="<?= $admin['visa_number']; ?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="visa_ex_date" value="<?= $admin['visa_ex_date']; ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>




                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('nois_reff_no') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="nois_reff_no" value="<?= $admin['nois_reff_no']; ?>"  class="form-control" id="firstname" placeholder="">
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
                  <input type="text" name="nois_check_number" value="<?= $admin['nois_check_number']; ?>"  class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="nois_check_number_ex_date" value="<?= $admin['nois_check_number_ex_date']; ?>" class="form-control" id="lastname" placeholder="">
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
                  <input type="date" name="police_check_issue_date_issue_date"  value="<?= $admin['police_check_issue_date_issue_date']; ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4"><div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="police_check_issue_date_ex_date" value="<?= $admin['police_check_issue_date_ex_date']; ?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('wwccn')?></label>
                <div class="col-md-12">
                  <input type="text" name="wwccn" class="form-control" id="wwccn" value="<?= $admin['wwccn']; ?>" placeholder="">
                  </div>
                  </div>
                  </div>
                
                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="wwccn_d" class="form-control" id="wwccn_d" value="<?= $admin['wwccn_d']; ?>" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('dln')?></label>
                <div class="col-md-12">
                  <input type="text" name="dln" class="form-control" id="dln" value="<?= $admin['dln']; ?>" placeholder="">
                  </div>
                  </div>
                  </div>
                
                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dln_d" class="form-control" id="dln_d" value="<?= $admin['dln_d']; ?>" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('State') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="state" class="form-control" id="state" value="<?= $admin['state']; ?>" placeholder="">
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
      <label for="<?=$e['id']?>">  


<input type="checkbox" <?php 
      if(in_array($e['id'],explode(",",$admin['emp_qualified']))==true) { echo 'checked'; } else {  echo '';} ?>
      
      isd="<?=$e['id']?>" name='emp_qualified[]' value='<?=$e['id']?>'/>
      
      <?=$e['name']?>
    
    </label>
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
                  <input type="text" name="phone_number" value="<?= $admin['phone_number']; ?>" class="form-control" id="firstname" placeholder="">
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
                          <option   <?php if($admin['gender']==$g['id']){ echo "Selected";} ?>  value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
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
                  <input type="text" name="address" value="<?= $admin['address']; ?>" class="form-control" id="firstname" placeholder="">
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
                          <option  <?php if($admin['timezone']==$g['id']){ echo "Selected";} ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>
                 </div>
                 
                 

 <!--
                 <div class='row'>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emp_contract') ?></label>
                  
                  <div class="col-md-12">
                      <select name="emp_contract" class="form-control">
                        <option value=""><?= trans('select_emp_contract') ?></option>
                        <?php foreach($emp_contract as $g): ?>
                          <option  <?php if($admin['emp_contract']==$g['id']){ echo "Selected";} ?>  value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
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
                          <option  <?php if($admin['emp_type']==$g['id']){ echo "Selected";} ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
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
                          <option  <?php if($admin['emp_pre_modern_award_classification']==$g['id']){ echo "Selected";} ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                   
                  </div>
                  </div>
                  </div>
                  

                 </div>-->
                  <hr>
                 
                 <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Characteristics')?></label>
                  <div class="col-md-12">
                  <input type="text" name="characteristics" value="<?= $admin['characteristics']; ?>" class="form-control" id="characteristics" placeholder="">
                  </div>
                  </div>
                  </div>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Intrest')?></label>
                  <div class="col-md-12">
                  <input type="text" name="interest" value="<?= $admin['interest']; ?>" class="form-control" id="intrest" placeholder="">
                  </div>
                  </div>
                  </div>
                    <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?=trans('Qualities')?></label>
                  <div class="col-md-12">
                  <input type="text" name="qualities" value="<?= $admin['qualities']; ?>" class="form-control" id="qualities" placeholder="">
                  </div>
                  </div>
                  </div>
                </div>
                <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('photo') ?></label>
                  
                   <div class="col-md-12">
                  <input type="file" name="photo" value="<?=$admin['photo']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                  <div class="form-group">

                    <div class="col-md-12">
                   <div class="col-sm-4">
                   <img src="<?=base_url()?>uploads/profile/<?=$admin['photo']?> " alt="" border=3 height=100 width=100></img>
      
                  
                  </div>
                  </div>
                  </div>
                 </div>
                </div>
                <!--
                <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('Documnet') ?></label>
                  
                   <div class="col-md-12">
                  <input type="file" name="doc" value="<?=$admin['doc']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                </div>
              </div>
              
              <div class="col-sm-4">
                  <div class="form-group">

                    <div class="col-md-12">
                   <div class="col-sm-4">
                    <label for="lastname" class="col-md-12 control-label"><?= trans('View') ?></label>
                    <a target="_blank" class="btn btn-info" href="<?=base_url()?>uploads/profile/<?=$admin['doc']?> ">Click Here!</a>
                  
                  </div>
                  </div>
                  </div>
                 </div>
                </div>
                -->
                
<!--                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="after-add-more">
  
    <div class="col-md-4">                                
        <div class="form-group">
            <label class="control-label">Document if other</label>
            <input maxlength="200" type="file" class="form-control" placeholder="Enter Logger Name" name="multipleUpload[]" />
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group change">
            <label for="">&nbsp;</label><br/>
            <a class="btn btn-success add-more">+ Add More Documents</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 
         var html = $(".after-add-more").first().clone();
           $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-success add-more'>+ Add More Documents</a> <label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
        $(".after-add-more").last().after(html);
     });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});
</script>
-->

                 
</div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('edit_user') ?>" class="btn btn-primary pull-right">
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