<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
              <div class="d-inline-block">
                  <h3 class="card-title"> <i class="fa fa-edit"></i>
                  &nbsp; <?= $title ?> </h3>
              </div>
              <div class="d-inline-block float-right">
                <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> <?= trans('back') ?></a>
              </div>
            </div>
            <div class="card-body">
            	<div class="col-md-12">
                    <h3 class="box-title">
						<?php
						
						 $perm=$record['perm'];
						$perm = explode(',', $perm);
				       ?>

                        <span class="mr5"><?= trans('permission_access') ?> : </span> 
						<?=strtoupper($record['admin_role_title'])?>
                    </h3>
                </div>
            </div>
			<div class="card-body">
				<div class="row">
				<?php echo form_open(base_url('admin/admin_roles/set_access'), 'id="frmvalidate"');  ?> 
                 <input name='admin_role_id'  type='hidden' value='<?=$record['admin_role_id']?>'>
					<div class="col-md-12">
					<?php 
						$this->db->order_by('id','ASC');
						$this->db->group_by('name');
						$modules=$this->db->get('perm')->result_array();
						 ?>
					<?php foreach($modules as $module): ?>
						<div class="col-md-12">
							<div class="row">
	                        	<div class="col-md-3">
	                        		<h5 class="m-0">
	                                	<strong class="f-16"><?= trans($module['name'])?></strong>
	                                </h5>
								</div>
	                            <div class="col-md-9">
	                            	<div class="row mb-3">
									<?php 
							  $m=$this->db->get_where('perm',array('name'=>$module['name']))->result_array(); 
                              foreach($m as $operation):?>
	                                    <div class="col-md-3 pb-3">	
	                                        <span class="pull-left">
	                                            <input class='' name='perm[]' type='checkbox'
	                                            id='<?=$operation["id"]?>' value='<?=$operation["id"]?>' 
	                             <?php if (in_array($operation["id"], $perm)) echo 'checked="checked"';?>
	                                            />
	                                            <label class='tgl-btn'
												 for='<?=$operation["id"]?>'
												 >
												 <!-- <?=$operation["id"]?> -->
												 <span class="mt-15 pl-3">
												<?=ucwords($operation['action'])?>
	                                        </span>
												</label> 
	                                        </span>

	                                    </div>
	                                <?php endforeach; ?>
	                            	</div>
	                            </div>
	                        </div>
	                        <hr style="margin:7px 0px;" />
						</div>  
						<?php endforeach; ?>

						<div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right"><?= trans('submit') ?></button>
                    </div>
                    <?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>


