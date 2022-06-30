<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TimeSheet</h1>
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
              <h3 class="card-title">All Confirmed Shifts</h3>
            </div>
            <!-- /.card-header -->

<?php

//echo $this->session->userdata('last_query');
?>
            <div class="card-body">
                <?php echo form_open("admin/shift/timesheet",'class="filterdata"') ?>    
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">


                        <?php 
$allre=$this->db->get('region')->result_array();
$admin_id=$this->session->userdata('admin_id');
      if($this->session->userdata('is_supper')==1)
      {
        $region=$allre;
        $emp=select('ci_admin',array('admin_role_id'=>7));
      }
      else
      {

         $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
        $region=explode(",",@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
        $emp=select('ci_admin',array('admin_role_id'=>7,'service_provider_id'=>$service_provider_id));
      }
   
        ?>
   <label for="firstname" class="col-md-12 control-label"> Select Regions </label>
                            <select name="r"  class="form-control" onchange="filter_data()" >
                                <option value="">Select Regions</option>
                             
                                <?php    if($this->session->userdata('is_supper')==1)
      { 
      foreach($region as $g): ?>
          <option  <?php if($this->session->userdata('r')==$g['id']) { echo 'selected';} ?> value="<?= $g['id']; ?>"><?= $g['name']; ?>
        </option>
        <?php endforeach; ?>
      <?php 
      }
      else { 

    foreach($region as $g): ?>
                          <option <?php if($this->session->userdata('r')==$g) { echo 'selected';} ?>  value="<?= $g ?>">
                           <?=$this->db->get_where('region',array('id'=>$g))->row()->name?>
                        </option>
                        <?php endforeach; ?>
            <?php } ?>
             

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            

   <label for="firstname" class="col-md-12 control-label"> Select Support Worker  </label>
                            <select name="s" class="form-control" onchange="filter_data()" >
                                <option value=""><?= trans('select employee') ?></option>

 <?php  
foreach($emp as $p){
?>                  
<option value='<?=$p['admin_id']?>'><?php echo $p['firstname'].' '.$p['lastname']?></option>
<?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    
                 <?php      
  if($this->session->userdata('is_supper')==1)
      { 
          $par=selecto('participant');
      }
      else 
      {
 $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
$service_provider_region=explode(",",$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
$par=array();
foreach($service_provider_region as $res)
{
        $par=array_merge($par,selecto('participant',array('region'=>$res)));
    
}
}


?>     <div class="col-md-2">
                        <div class="form-group">
                            
   <label for="firstname" class="col-md-12 control-label"> Select Participant  </label>
                            <select name="p" class="form-control" onchange="filter_data()" >
                                <option value=""><?= trans('select Participant') ?></option>

 <?php  
foreach($par as $p){
?>                  
<option value='<?=$p->id?>'><?php echo $p->first_name.' '.$p->last_name?></option>
<?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <!--<div class="col-md-6">-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" name="keyword" class="form-control"  placeholder="<?= trans('search_from_here') ?>..." onkeyup="filter_data()" />-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                
                        <input type="submit" value="Submit">

                <?php echo form_close(); ?> 
            </div>

            <div class="card-body">
                
                <a href="<?=base_url('admin/shift/export')?>" class='btn btn-info'>Export Data in CSV</a>
                 <div class="data_container"></div>
           
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/datatables.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable(
        {  
    //     dom: 'Bfrtip',
    //     // buttons: [
    //     // {
    //     //     extend: 'pdf',
    //     //     text: 'Save current page',
    //     //     exportOptions: {
    //     //         modifier: {
    //     //             page: 'current'
    //     //         }
    //     //     }
    //     // }
    // ],
        //   'processing': true,
        //   'searching': false,
        //   'serverSide': true,
        //   'serverMethod': 'post',
        //   'ajax': 
        //   {
        //      'url':'<?=base_url('admin/shift/timesheetjson')?>'
        //   },
        //   'columns': [
        //      // { data: 'sr',bSortable: false },
        //      { data: 'participant',bSortable: false },
        //      { data:'shift_type',bSortable: false },
        //      { data:'shift_location',bSortable: false },
        //      { data: 'date',bSortable: false },
        //      { data: 'shift_start',bSortable: false },
        //      { data: 'shift_end',bSortable: false },
        //      { data: 'employee',bSortable: false },                                   
        //   ]
        }
    );
  });

function filter_data()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$.post('<?=base_url('admin/shift/filterdata')?>',$('.filterdata').serialize(),function(){
	$('.data_container').load('<?=base_url('admin/shift/list_data')?>');
});
}
  function load_records()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$('.data_container').load('<?=base_url('admin/shift/list_data')?>');
}
load_records();

</script>



</body>
</html>
