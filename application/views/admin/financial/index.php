

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
                    All Allowance
                  </h3>
              </div>
              <div class="d-inline-block float-right">
                
              </div>
            </div>
            <div class="card-body">
            <?php echo form_open("admin/Financial/index",'method="post" class="filterdata"') ?>    
                <div class="row">
   
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="keyword" value='<?=$this->session->userdata('filter_keyword')?>' class="form-control"  placeholder="<?= trans('search_from_here') ?>..."
                         />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="submit"  value="<?= trans('search_from_here') ?>..."/>
                        </div>
                    </div>

                </div>
                <?php echo form_close(); ?> 
            </div> 
        </div>
    </section>


    <!-- Main content -->
    <section class="content mt10">
      <div class="card">
        <div class="card-body">
          
               <!-- Load Admin list (json request)-->
               <div class="data_container">
               <div class="datalist">
    
               </div>



               </div>
           </div>
       </div>
    </section>
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
function load_records()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$('.data_container').load('<?=base_url('admin/'.$ajaxurl)?>');
}
load_records();
</script>



