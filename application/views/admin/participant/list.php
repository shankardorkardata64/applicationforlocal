  <div class="content-wrapper">

    <table id="example11" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('ndis') ?></th>
                <th><?= trans('photo') ?></th>
                <th><?= trans('full_name') ?></th>
                <th><?= trans('region') ?></th>
                <th>View</th>
                <th><?= trans('edit') ?></th>
                
                <th><?= trans('delete') ?></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>

            <tr>

                 <td>
					<?=$row['ndis_number']?> 
                </td>

            <td>
            <img src="<?=base_url()?>uploads/<?=$row['photo']?> " alt="" border=3 height=50 width=50></img>
		     </td>
            
            	<td>
					<?=$row['first_name']?>   <?=$row['last_name']?>
                </td>
            
                <td><?=$this->db->get_where('region',array('id'=>$row['region']))->row()->name?></td>
                
                <!--<td><a href="<?=base_url('admin/participant/careprofile')?>/<?=$row['id']?> ">View</a></td>-->
                <!--<td><a href="<?=base_url('admin/participant/viewcareprofile')?>/<?=$row['id']?> ">View Care Profile</a></td>-->
                <td><a href="<?=base_url('admin/participant/view')?>/<?=$row['id']?> ">Primary Care Profile</a></td>
                <td><a href="<?=base_url('admin/participant/edit')?>/<?=$row['id']?> ">Edit</a></td>
                <td><a href="<?=base_url('admin/participant/delete')?>/<?=$row['id']?> ">Delete</a></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>



</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example11").DataTable();
  });

</script> 
