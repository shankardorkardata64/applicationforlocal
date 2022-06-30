<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
      
      
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Documnet</button>

        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Add New Document</h4>
      </div>
      <div class="modal-body">
      
      
      <?php echo  form_open_multipart(base_url('admin/admin/action_doc/'), 'class="form-horizontal" method="post"');  ?> 
              <div class="card-body">
                  <input type='hidden' name='action' value='add'>
                  <input type='hidden' name='user_id' value='<?=$user_id?>'>
                  <div class="form-group">
                  <label>Select Document Type</label>
                    <select name='type' class="form-control">
                    <?php 
                    $doc=$this->db->get_where('documnet_type',array('status'=>1))->result_array();
                    foreach($doc as $d) { 
                    ?>  
                    <option value='<?=$d['id']?>'><?=$d['name']?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group">
                  <label>Document Expire On </label>
                  <input type='date' name='expireon' required class="form-control">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputFile">Select Document File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input required name='doc' type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      <input type="submit" class="btn btn-primary" value='Upload Document'>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                </div>
                <?php echo form_close(); ?>
           
    
    </div>
     
     
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



    
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Document List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr</th>
                  <th>Document</th>
                  <th>Expire on</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
              <?php
              $k=0;
             // print_r($userdocuments);
              foreach ($userdocuments as $doc) {  ?>
                <tr>
                  <td><?=++$k?></td>
                  <td><?=$doc['name']?></td>
                  <td><?php if($doc['expireon']!='') { echo date('d-m-Y',$doc['expireon']);} ?></td>
                  <td><a href='<?=$doc['doc']?>' target='_blank'>view</a></td>
                  <td>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$doc['id']?>">Edit</button>


               
               <div id="myModal<?=$doc['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body"> 
      
                  <?php echo  form_open_multipart(base_url('admin/admin/action_doc/'), 'class="form-horisdfzontal" method="post"');  ?> 
       <input type='hidden' name='action' value='edit'>
                  <input type='hidden' name='id' value='<?=$doc['id']?>'>
                 
                  <input type='hidden' name='user_id' value='<?=$user_id?>'>
                   <div class="form-group">
                  <label>Document Expire On </label>
                  <input type='date' name='expireon' required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Select Document File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  name='doc' type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                      <input type="submit" class="btn btn-primary" value='Upload Document'>
                      </div>
                    </div>
                  </div>
                 
                </div> 
                   </div>
                <!-- /.card-body -->

                <?php echo form_close(); ?>
                 
      </div>
     
    </div>

  </div>
</div>
               
                
           
           
           
           
    
     

                  </td>
                  <td><a href='<?=base_url('admin/admin/docdelete/'.$doc['id'])?>'>Delete</a></td>
                 </tr>
     
                 <?php } ?>
              
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
