<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              All goals </h3>
          </div>
          <div class="d-inline-block float-right">

          <?php if(!empty($primary_care_plan)) {   ?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" 
data-target="#myModal">Add Goals</button>


<?php } ?>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <?php $this->load->view('admin/includes/_messages.php') ?>




<?php
$g=$this->db->get_where('goals',array('user_id'=>$user_id))->result_array();
?>

<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('Sr.No') ?></th>
                <th><?= trans('goal_type') ?></th>
                <th><?= trans('goal') ?></th>
                <th><?= trans('strategey_to_get_there1') ?></th>
                <th><?= trans('strategey_to_get_there2') ?></th>
                <th><?= trans('strategey_to_get_there3') ?></th>
              
              
                <th><?= trans('time_frame') ?></th>
                <th><?= trans('file') ?></th>
                <th><?= trans('Edit') ?></th>
                
              
          </tr>
        </thead>
        <tbody>
            
            <?php 
            $rt=0;
            foreach($g as $row): ?>

             <tr>
               <td><?=++$rt;?></td>
             <td><?=$row['goal_type']?> Term</td>
             <td><?=$row['goal']?></td>
             <td><?=$row['strategey_to_get_there1']?></td>
             <td><?=$row['strategey_to_get_there2']?></td>
            <td><?=$row['strategey_to_get_there3']?></td>
            <td><?=$row['time_frame']?></td>
            <td><a target='_blank' href="<?=base_url('uploads/'.$row['file'])?>">View</a></td>
            <td>
  <a href='<?=base_url('admin/participant/editgoals/'.$row['id'])?>'>Edit</a>

            </td>
          </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>







   <?php if(!empty($primary_care_plan)) {   ?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Goals</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart(base_url('admin/participant/add_goals'), 'class="form-horizontal"' )?> 


<?php 
$dropdown1=array(array('id'=>'Long','name'=>'Long Term Goal'),array('id'=>'Short','name'=>'Short Term Goal'));
$array=array(
array('label'=>'goal_type','required'=>'required','name'=>'goal_type','type'=>'select', 'value'=>'No','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'enter_your_goal','required'=>'required','name'=>'goal','type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there1','type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there2','type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'strategey_to_get_there','required'=>'required','name'=>'strategey_to_get_there3','type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'time_frame','required'=>'required','name'=>'time_frame','type'=>'text', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'picture','required'=>'required','name'=>'picture','type'=>'file', 'value'=>'','dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'primary_care_plan_id','required'=>'required','name'=>'primary_care_plan_id','type'=>'hidden', 'value'=>$primary_care_plan_id,'dropdown'=>$dropdown1,'check_val'=>'id'),
array('label'=>'primary_care_plan_id','required'=>'required','name'=>'user_id','type'=>'hidden', 'value'=>$user_id,'dropdown'=>$dropdown1,'check_val'=>'id'),

);
echo create_formb($array);
?>
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('Add_Goals') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>


    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


                 
             


                  <?php } ?>
</div>
</div></div></div></div></div></section></div>