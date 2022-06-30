

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
                  <h3 class="card-title">
                    <i class="fa fa-list"></i>
                    <?=$title?>
                  </h3>
              </div>
              <div class="d-inline-block float-right">
                
              <div class="d-inline-block float-right">
                <a href='<?=base_url('admin/participant/add')?>' class="btn btn-success">sAdd Participant</a>
              </div>
              </div>
            </div>
            <div class="card-body">
                <?php echo form_open("/",'class="filterdata"') ?>    
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">


                        <?php 
$allre=$this->db->get('region')->result_array();
$admin_id=$this->session->userdata('admin_id');
      if($this->session->userdata('is_supper')==1)
      {
        $region=$allre;
      }
      else
      {

        $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
        $region=explode(",",@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
      }
   
        ?>

                            <select name="type" class="form-control" onchange="filter_data()" >
                                <option value="">Select Regions</option>
                             
                                <?php    if($this->session->userdata('is_supper')==1)
      { 
      foreach($region as $g): ?>
          <option value="<?= $g['id']; ?>"><?= $g['name']; ?>
        </option>
        <?php endforeach; ?>
      <?php 
      }
      else { 

    foreach($region as $g): ?>
                          <option value="<?= $g ?>">
                           <?=$this->db->get_where('region',array('id'=>$g))->row()->name?>
                        </option>
                        <?php endforeach; ?>
            <?php } ?>
             

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="status" class="form-control" onchange="filter_data()" >
                                <option value=""><?= trans('all_status') ?></option>
                                <option value="1"><?= trans('active') ?></option>
                                <option value="0"><?= trans('inactive') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control"  placeholder="<?= trans('search_from_here') ?>..." onkeyup="filter_data()" />
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?> 
            </div> 
            </div> 
            
            
            
        </div> 	<div class="card" style="padding-top: -6px;margin-top: -382px;">
    
    		<div class="card-body">
               <!-- Load Admin list (json request)-->
               <div class="data_container">
               <div class="datalist">
    
               </div>



               </div>
           </div>
       </div>
    </section>


    <!-- Main content -->
    
    
  
    <!-- /.content -->
</div>



<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

</script> 

<script>
  //------------------------------------------------------------------
function filter_data()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$.post('<?=base_url('admin/participant/pfilterdata')?>',$('.filterdata').serialize(),function(){
	$('.data_container').load('<?=base_url('admin/'.$ajaxurl)?>');
});
}
//------------------------------------------------------------------
function load_records()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$('.data_container').load('<?=base_url('admin/'.$ajaxurl)?>');
}
load_records();
</script>



