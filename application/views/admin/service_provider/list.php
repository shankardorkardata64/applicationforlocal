<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('Servive_provider_name') ?></th>
                
                <th><?= trans('Servive_provider_phone') ?></th>
                
                <th><?= trans('Servive_provider_address') ?></th>
                <th><?= trans('region') ?></th>
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
                <td><?=$row['pname']?></td> 
                
                <td><?=$row['pnumber']?></td> 
                
                <td><?=$row['paddress']?></td> 
                
                <td>
                    <?php
                
             $ch=$row['region'];
             $ch=explode(',',$ch);
             $ar=array();
             foreach($ch as $key=>$c) 
             {
             $rr=$this->db->get_where('region',array('id'=>$c))->row()->name;
             array_push($ar,$rr);
              }
             echo implode(',',$ar);
            ?>
            </td> 
                
                
                <td><a href="<?=base_url('admin/service_provider/edit')?>/<?=$row['id']?>">Edit</a></td>
                <td><a href="<?=base_url('admin/service_provider/delete')?>/<?=$row['id']?>">Delete</a></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

