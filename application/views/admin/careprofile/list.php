<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('care_profile_cat') ?></th>
                
                <th><?= trans('care_profile_name') ?></th>

                <th><?= trans('input_type') ?></th>
                <th><?= trans('edit') ?></th>
                <th><?= trans('delete') ?></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
					<?=$row['id']?>
                </td>
                
                <td>
                    <?=@select('care_cat',array('id'=>$row['cat_care_id']))[0]['name']?>
                </td>
                <td>
                    <?=$row['name']?>
                </td> 
                <td><?php  echo get_input_by_id($row['care_input_type']);?></td>
                <td><a href="<?=base_url('admin/careprofile/edit')?>/<?=$row['id']?>">Edit</a></td>
                <td><a href="<?=base_url('admin/careprofile/delete')?>/<?=$row['id']?>">Delete</a></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

