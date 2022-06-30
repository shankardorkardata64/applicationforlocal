  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= trans('dashboard') ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<?php 
$user_count=$this->db->get_where('ci_admin',array('admin_role_id'=>7))->num_rows();

$participant=$this->dashboard_model->getparticipant();
$participantcount=count($participant);

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        <?php 
        
        $sess=($this->session->userdata('module_access1'));
                
        // echo $sess['careprofile']['view'];
    if($this->session->userdata('admin_role_id')==1)
		{ 
    ?>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                  <?=$user_count?>
                </span>
              </div>
            
            </div>
            <!-- /.info-box -->
                    </div>
    <?php } ?>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Participant</span>
                <span class="info-box-number"><?=$participantcount?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Service Providers</span>
                <span class="info-box-number"><?php
                echo $this->db->get('service_provider')->num_rows();
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-map"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total  Region</span>
                <span class="info-box-number"><?php
                echo $this->db->get('region')->num_rows();
                ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Participant Location</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-1" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <div id="world-map-markers1" style="height: 325px; overflow: hidden"></div>
                  </div>

                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Todays Top 10 Sift Tasks</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>

<?php 

$every_days_arr=array();
$this->db->order_by('id','DESC'); 
$this->db->limit(10); 
$this->db->group_by('cat_id'); 
$every_days1=$this->db->get('task')->result_array();
foreach($every_days1 as $gd1)
{
$daily_to_array2=array();

$this->db->order_by('id','DESC'); 
$this->db->limit(10); 
$every_days=$this->db->get_where('task',array('cat_id'=>$gd1['cat_id']))->result_array();
foreach($every_days as $t)
{
$Timestamp = strtotime($t['started_on']);
$TotalTimeStamp = strtotime('+ '.$t['every_days'].' days', $Timestamp);
$dd=date('d-m-Y', $TotalTimeStamp); 
$Date1 = date('d-m-Y',$Timestamp);
$Date2 =date('d-m-Y');
$array = array();
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
  
  
  
  
  $ch=false;
  if($t['every_days']!=NULL)
  {
     for ($currentDate = $Variable1;
     $currentDate <= $Variable2; 
     $currentDate += (86400*$t['every_days'])
     )
     {
     $Store = date('Y-m-d', $currentDate);
     $array[] = $Store;
  }
  $ch=in_array(date('Y-m-d'),$array);
  }
  
  
  $specific_day_of_the_week=false;
  
  if($t['specific_day_of_the_week']!=NULL)
  {
  $specific_day_of_the_week=$t['specific_day_of_the_week']==date('D')?true:false;
  }
  
  $fortnightly_on=false;
  if($t['fortnightly_on']!=NULL)
  {
  $fortnightly_on=$t['fortnightly_on']==date('D')?true:false;
  }
  

if($ch==true OR $specific_day_of_the_week==true OR $fortnightly_on==true)
{  
$num=$this->db->get_where('task_done',array('task_id'=>$t['id'],'time'=>$t['add_specific_time_of_day'],'date'=>date('d-m-Y')))->num_rows();
$data=array();
$data['task_id']=$t['id'];
$data['user']=$this->db->get_where('participant',array('id'=>$t['user_id']))->row()->first_name.' '.$this->db->get_where('participant',array('id'=>$t['user_id']))->row()->last_name;
$data['name']=$t['task_name'];
$data['time']=$t['add_specific_time_of_day'];
$data['status']=$num==0?0:1;
$data['cat_id']=$this->db->get_where('care_cat',array('id'=>$t['cat_id']))->row()->name;
$data['task_for_careplan']=$t['task_for_careplan'];
$data['TaskID']=@$t['id'];
$data['Task']=@$t['task_name'];
$data['Time']=@$t['add_specific_time_of_day'];
$data['Status']=$num==0?"Pending":"Complited";
$data['Task_At']=$t['every_days']!=NULL?' Task on Every '.$t['every_days'].' Day at '.$t["add_specific_time_of_day"].' OClock':'Task On '.$t['specific_day_of_the_week'].' at '.$t["add_specific_time_of_day"].' OClock';
$data['Care_Category']=select('care_cat',array('id'=>$t['cat_id']))[0]['name'];

if(is_in_array($participant, 'id', $t['user_id'])=='yes')
{
array_push($every_days_arr,$data);
}
}
}  //2nd fr each loop
}



 
?>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>User</th>
                      <th>Category Name</th>
                      <th>Task</th>
                      <th>Time</th>
                      <th>Status</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                  <?php foreach($every_days_arr as $t){ ?>
                    <tr>
                    <td><a href="pages/examples/invoice.html"><?=$t['user']?></a></td>
                    <td><a href="pages/examples/invoice.html"><?=$t['cat_id']?></a></td>
                        
                    <td><a href="pages/examples/invoice.html"><?=$t['name']?></a></td>
                      <td>
                        <span class="badge badge-success"><?=$t['time']?></span></td>
                      <td>
                        <span class="<?php echo $t['Status']=='Pending'?'badge badge-warning':'badge badge-success '?>">
                        <?=$t['Status']?>
                      </span>
                      </td>
                    </tr>
                    <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            


          <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Participant</h3>


                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-listd clearfix">
                     
                     <?php 
                     $ic=1;
                           foreach($participant as $u) {
                    if($ic<=8) {  
                    ?>

                    <li class="item">
                    
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?= $u['first_name']?> <?= $u['last_name']?>
                        
                    </div>
                  </li>
                        

                      <?php  } $ic++; } ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?=base_url('admin/participant/index')?>">View All Participant</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card" style='display:none;'>
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style='display:none;'>
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="<?= base_url()?>assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Samsung TV
                        <span class="badge badge-warning float-right">$1800</span></a>
                      <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="<?= base_url()?>assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Bicycle
                        <span class="badge badge-info float-right">$700</span></a>
                      <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="<?= base_url()?>assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="<?= base_url()?>assets/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">PlayStation 4
                        <span class="badge badge-success float-right">$399</span></a>
                      <span class="product-description">
                        PlayStation 4 500GB Console (PS4)
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="<?= base_url() ?>assets/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js"></script>

<?php 
$marker=$participant;

$aa=array();
foreach($marker as $m) 
{
   $l=explode(",",trim($m['latlng']));
   $a=array('latLng'=>$l,'name'=>$m['first_name'].' '.$m['last_name']);
   array_push($aa,$a);
 }

 $marker=json_encode($aa);
 ?>
<script>
    $('#world-map-markers1').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: true,
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(210, 214, 222, 1)',
        'fill-opacity': 1,
        stroke: 'none',
        'stroke-width': 0,
        'stroke-opacity': 1
      },
      hover: {
        'fill-opacity': 0.7,
        cursor: 'pointer'
      },
      selected: {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle: {
      initial: {
        fill: '#00a65a',
        stroke: '#111'
      }
    },
    markers: <?=$marker?>
  })

  </script>