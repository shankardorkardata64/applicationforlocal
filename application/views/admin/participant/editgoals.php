<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?= $title?> </h3>
          </div>
          <div class="d-inline-block float-right">
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


                  <?php echo form_open_multipart(base_url('admin/participant/edit_goals/'.$goals['id']), 'class="form-horizontal"' )?> 


<?php 
$dropdown1=array(array('id'=>'Long','name'=>'Long Term Goal'),array('id'=>'Short','name'=>'Short Term Goal'));
$array=array(
array('label'=>'goal_type','required'=>'required','name'=>'goal_type','type'=>'select', 'value'=>$goals['goal_type'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'enter_your_goal','required'=>'required','name'=>'goal','type'=>'text', 'value'=>$goals['goal'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there1','type'=>'text', 'value'=>$goals['strategey_to_get_there1'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there2','type'=>'text', 'value'=>$goals['strategey_to_get_there2'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there3','type'=>'text', 'value'=>$goals['strategey_to_get_there3'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'time_frame','required'=>'required','name'=>'time_frame','type'=>'text', 'value'=>$goals['time_frame'],'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'picture','required'=>'required','name'=>'picture','type'=>'file', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
);
echo create_formb($array);
?>



                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="Edit Goal" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>


             


</div>
</div></div></div></div></div></section></div>