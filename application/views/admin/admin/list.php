<?php // echo '<pre>';
        //    print_r($info);
          //  echo '</pre>'; ?>
<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('user') ?></th>
                <th><?= trans('username') ?></th>
                <th><?= trans('email') ?></th>
                <th><?= trans('region') ?></th>
                
                <th><?= trans('role') ?></th>
                <th width="100"><?= trans('status') ?></th>
                <th width="120"><?= trans('action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($info as $row): ?>
            <tr>
            	<td>
					<?=$row['admin_id']?>
                </td>
                <td>
				<?=$row['firstname']?> <?=$row['lastname']?>
                   
                </td>
                <td>
                    <?=$row['username']?>
                </td> 
                <td>
					<?=$row['email']?>
                </td>
                <td>
                    <?php

if($row['admin_role_id']!=1){
 $row['service_provider_id']=$this->db->get_where('ci_admin',array('admin_id'=>$row['admin_id']))->row()->service_provider_id;

             $ch=$ar=array();
           $ch=select('service_provider',array('id'=>$row['service_provider_id']))[0]['region'];
             $ch=explode(',',$ch);
             foreach($ch as $key=>$c) 
             {
             $rr=$this->db->get_where('region',array('id'=>$c))->row()->name;
             array_push($ar,$rr);
              }
             echo implode(',',$ar); 
            }else { echo 'N/A';} ?>
            </td>

                <td><?=$row['admin_role_title']?>
                    <!-- <button class="btn btn-xs btn-success"></button> -->
                </td> 
                <td><input class='tgl tgl-ios tgl_checkbox' 
                    data-id="<?=$row['admin_id']?>" 
                    id='cb_<?=$row['admin_id']?>' 
                    type='checkbox' <?php echo ($row['is_active'] == 1)? "checked" : ""; ?> />
                    <label class='tgl-btn' for='cb_<?=$row['admin_id']?>'></label>
                </td>

                <td>
                <a href="<?= base_url("admin/admin/document/".$row['admin_id']); ?>" title="Add Documnents" class="btn btn-info btn-xs"><i class="fa fa-file"></i></a>
                    <a href="<?= base_url("admin/admin/edit/".$row['admin_id']); ?>" class="btn btn-warning btn-xs mr5" >
                    <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= base_url("admin/admin/delete/".$row['admin_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

