
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
              <?= trans('allocate_careplan') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('alloacte_plan') ?></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">


                  <?php 
                  /* echo '<pre>';
                print_r($primary_care_plan);
               echo '</pre>';
  */
 ?>
                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>





                  <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('my_medical_condition') ?></label>
                  </div>
                 </div>
                 <input type="hidden" value='<?=$primary_care_plan['id']?>' name='tid'?>
                  <div class="col-md-4">
                  <div class="form-group">
                  
                     <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['my_medical_condition']?></label>
                 
                    </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>


  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?= trans('my_primary_disability') ?></label>
                 </div>
                </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['my_primary_disability'] ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">

                 </div>
                  </div>
                   </div>
  
                   



                <div id="newRow"></div>

  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?= trans('my_know_alegy') ?></label>
                 </div>
                </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['my_know_alegy'] ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">

                 </div>
                  </div>
                   </div>
  






                   
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('reaction') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  
                
                   <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['reaction']?></label>
                 
                </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>


                   
                   
                   <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname"  class="col-md-6 control-label"><?= trans('action_on_reaction') ?></label>
                  </div>
                 </div>

                  <div class="col-md-4">
                  <div class="form-group">
                
                   <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['action_on_reaction']?></label>
                  
                </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>
                  <div class='row'>
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?= trans('general_alerts') ?></label>
                  </div>
                  </div>
                 <div class="col-md-4">
                  <div class="form-group">
               
                   <label for="firstname" class="col-md-6 control-label"><?=$primary_care_plan['general_alerts']?></label>
                 
                </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                   </div>
                   <div class="form-group">
                    <div class="col-md-12">
       <hr>
                </div>
                  </div>
     
<center> <h3>About Myself and My Preference</h3>  </center>


                        <br>
                        <h4>
                            The following are describe my ideal Support worker
                        </h4>
                        <br>


                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('lang') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['lang']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>







                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('characterestics') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['characterestics']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>


                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('qualty') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['qualty']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('interest') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['interest']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>
                  



                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('culture') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['culture']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>
   




                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('spiritual') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['spiritual']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>


                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('valueandbel') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['valueandbel']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('strenghts') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['strenghts']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>

   






                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('interest') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['interest']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>



                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('difficult') ?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['difficult']?></label>
                  </div>
                  </div>
                  <div class="col-md-4">
                  </div>
                  </div>



<br>
<h5>Emergency Contact</h5>
<br>
                  <div class='row'>
                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('emergency_name') ?></label>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['emergency_name']?></label>
                  </div>
                  </div>


                  <div class="col-sm-3">
                  <div class="form-group">
                  <label for="firstname" required class="col-md-6 control-label"><?= trans('emergency_phone') ?></label>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="firstname" class="col-md-6 control-label"><?=$i['emergency_phone']?></label>
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



  <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += ' <div class="row">';
        html += '<div class="col-sm-4">';
        html += '<div class="form-group">';
        //html += ' <label for="firstname" class="col-md-6 control-label"><?= trans("my_primary_disability") ?></label>';
        html += ' </div>';
        html += ' </div>';
        html += '<div class="col-md-4">';
        html += '<div class="form-group">';
        html += ' <input type="text" required name="my_primary_disability[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="Add more<?= trans('my_primary_disability') ?>">';
        html += '</div>';
        html += ' </div>';
        html += ' <div class="col-md-4">';
       html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>





<script type="text/javascript">
    // add row
    $("#addRow1").click(function () {
        var html = '';
        html += '<div id="inputFormRow1">';
        html += ' <div class="row">';
        html += '<div class="col-sm-4">';
        html += '<div class="form-group">';
        //html += ' <label for="firstname" class="col-md-6 control-label"><?= trans("my_know_alegy") ?></label>';
        html += ' </div>';
        html += ' </div>';
        html += '<div class="col-md-4">';
        html += '<div class="form-group">';
        html += ' <input type="text"  required name="my_know_alegy[]" class="form-control" id="firstnamy_medical_coditionme" placeholder="Add more <?= trans('my_know_alegy') ?>">';
        html += '</div>';
        html += ' </div>';
        html += ' <div class="col-md-4">';
       html += '<button id="removeRow1" type="button" class="btn btn-danger">Remove</button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';

        $('#newRow1').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow1', function () {
        $(this).closest('#inputFormRow1').remove();
    });
</script>