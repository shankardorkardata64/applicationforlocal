

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
                  
              </div>
              <div class="d-inline-block float-right">
                
              </div>
            </div>
            <div class="card-body">
            <h3 class="card-title">
                    <i class="fa fa-list"></i>
                    <?= $title ?>
                  </h3>


    <!-- Main content -->
    <section class="content mt10">
    	
               
               <div class="row">
 <div class="col-md-4">

 <div class="card">
    		<div class="card-body">
               <!-- Load Admin list (json request)-->
 
 <?php echo form_open(base_url('admin/region/add'), 'class="form-horizontal"');  ?> 
 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <label for="username" class="col-md-12 control-label"><?= trans('Enter Region Name') ?></label>
 <div classs="col-md-12">
 <input type="text" name="name" class="form-control" id="username" placeholder="Enter Region Name">
 </div>
 </div>
 </div>
 </div>

 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
  <div class="col-md-12">
  <input type="submit" name="submit" value=" <?= $title ?>" class="btn btn-primary pull-right">
  </div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_close(); ?>
</div>
 <div class="col-md-8">

<?php
$info=$this->db->get('region')->result_array();

?>
                  <h3 class="card-title">
                    <i class="fa fa-list"></i>
                    All Regions
                  </h3>

 <div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('Name') ?></th>
                
                <th><?= trans('edit') ?></th>
               

            </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
					<?=$row['id']?>
                </td>
                <td><?=$row['name']?></td> 
                
                
                
                <td>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$row['id']?>">Edit</button>

                </td>

            </tr>

  
<!-- Modal -->
<div id="myModal<?=$row['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      
    
 <?php echo form_open(base_url('admin/region/edit'), 'class="form-horizontal"');  ?> 
 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <label for="username" class="col-md-12 control-label"><?= trans('Enter New Region Name want to set') ?></label>
 <div classs="col-md-12">
 <input type="text" name="name" class="form-control"  value='<?=$row['name']?>' id="username" placeholder="Enter Region Name">
 </div>
 </div>
 </div>
 </div>

 <input type='hidden' value='<?=$row['id']?>' name='id'>;
 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
  <div class="col-md-12">
  <input type="submit" name="submit" value=" <?= $title ?>" class="btn btn-primary pull-right">
  </div>
</div>
</div>
</div>
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

            <?php endforeach;?>
        </tbody>
    </table>
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

</script> 
























</div>



</div>
</section>

            </div> 
        </div>
    </section>


</div>