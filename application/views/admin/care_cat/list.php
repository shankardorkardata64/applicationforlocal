<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('cname') ?></th>
                <th><?= trans('status') ?></th>
                <th><?= trans('ename') ?></th>
                <th><?= trans('dname') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
					<?=$row['id']?>
                </td>
                <td>
                    <?=$row['name']?>
                </td> 
                <td>
                <?php if($row['status']==1){ echo 'Active'; } else { echo 'De-Active';  }  ?>

                </td>
                <td><a href="<?=base_url('admin/care_cat/edit')?>/<?=$row['id']?>">Edit</a></td>
                <td><a href="<?=base_url('admin/care_cat/delete')?>/<?=$row['id']?>">Delete</a></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

