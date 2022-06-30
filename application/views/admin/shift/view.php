
                  <div class='row'>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-6"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                  </div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?= $title ?> </h3>
          </div>
          <div class="d-inline-block float-right">
          <!--<button type="button" class="btn btn-info btn-lg"-->
          <!-- data-toggle="modal" data-target="#add">Add Shift</button>-->
           
        </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">
                    <?php $this->load->view('admin/includes/_messages.php') ?>
  
                    <div>

                    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th 
{
  border: 1px solid #ddd;
  padding: 8px;
}
.pending
{
width: 114px;
height: 12px;
left: 520px;
top: 255px;
background: #FFF4DE;
border: 0.5px solid #FFB833;
box-sizing: border-box;
border-radius: 5px;"
}
.accepted{
    width: 114px;
height: 12px;
left: 520px;
top: 255px;
background: #E8FFCB;
border: 0.5px solid #89C440;
box-sizing: border-box;
border-radius: 5px;"
}



.rejected{
    width: 114px;
height: 12px;
left: 520px;
top: 255px;
background: #FFD6E6;
border: 0.5px solid #D93E7C;
box-sizing: border-box;
border-radius: 5px;"
}

#customers tr:nth-child(even){background-color: #f2f2f2;}


#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #36bcb1;
  color: white;
}
.singledate { 
width: 46px;
height: 26px;
left: 572px;
top: 210px;
background: #9F9BF1; border: 0.5px solid rgba(75, 74, 75, 0.15);
box-sizing: border-box;
border-radius: 25px; 
}

.previous {
  background-color: #04AA6D;
  color: white;
}

.next {
  background-color: #04AA6D;
  color: white;
}

</style>


<?php echo form_open_multipart(base_url('admin/shift/view'), 'class="form-horizontal"');  ?> 
                  

<?php 
$emp=$this->admin->get_all1(7);

$resion=0;
if(isset($res) AND $res!='')
{
  $resion=$res;
}



?>


<div class="row">
<div class="col-sm-4">
<label for="firstname" class="col-md-12 control-label"> Select Supprt Worker
<select name='employee' class='form-control from'>
<option value=''>Select Emp</option>
<?php 
foreach($emp as $e)  {  
?>
<option <?php  if($employee==$e['admin_id']) { echo 'selected';} ?> value="<?=$e['admin_id']?>"><?=$e['firstname']?> <?=$e['lastname']?></option>

<?php } ?>
</select>
      </div>




        <div class="col-sm-4">
        <label for="firstname" class="col-md-12 control-label"> Select Region
  <?php 
  $ress2=select('region');
  ?>
    </label>
    <div class="form-group">
<select name="res" class="form-control from">
<option value='0'>Select Region</option>
<?php 
foreach($ress2 as $r1) 
{ 
?>

  <option   <?php  if($resion==$r1['id']) { echo 'selected';} ?>   value="<?=$r1['id']?>"><?=$r1['name']?></option>
<?php } ?>
</select>
  </div>
  </div>
  <?php
  if(isset($from)){    
    $this->session->set_userdata('fromdate',strtotime($from));
 }
 ?>
        <div class="col-md-4">
        <label for="firstname" class="col-md-12 control-label"> Select Date</label>
        <div class="form-group">
        <input type="date" value="<?=@$from?>" requirded="" name="from" class="form-control from" id="date" placeholder="">
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


                  <!-------->
                  <div class='row'>

<div class="col-md-6">

<div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Serch Data') ?>" class="btn btn-primary pull-right">
  </div>
              </div>
  <div class="col-md-6">

</div>
      </div>

      
      <?php echo form_close(); ?>
      <?php
      $from1=strtotime($from);
        $this_week_start = strtotime("-7 day",$from1);  //1650272400
        $this_week_end = strtotime("+7 day", $from1);

        ?>
      <a   class='btn btn-info' href='<?=base_url('admin/shift/view/'.$this_week_start)?>' class="previous">&laquo; Previous</a>
      <a style="float: right;" class='btn btn-info' href='<?=base_url('admin/shift/view/'.$this_week_end)?>' class="next">Next &raquo; </a>

<table id="customers">
  <tr>
    <th>Participant</th>

    <th>

    <?= date('D', strtotime($from));?>   <span class="singledate"> <?= date('d', strtotime($from));?> 
    </span>

 </th>
    <th>
    <?= date('D', strtotime($from . ' +1 day'));?>   <span class="singledate"> <?= date('d', strtotime($from . ' +1 day'));?> 
    </span>

    </th>
    <th>   <?= date('D', strtotime($from . ' +2 day'));?>   <span class="singledate"> <?= date('d', strtotime($from . ' +2 day'));?> 
    </span>
</th> 
    <th>   <?= date('D', strtotime($from . ' +3 day'));?>   <span class="singledate">  <?= date('d', strtotime($from . ' +3 day'));?> 
    </span>
</th>
    <th>   <?= date('D', strtotime($from . ' +4 day'));?>    <span class="singledate">  <?= date('d', strtotime($from . ' +4 day'));?> 
    </span>
</th>
    <th>   <?= date('D', strtotime($from . ' +5 day'));?>   <span class="singledate">  <?= date('d', strtotime($from . ' +5 day'));?> 
    </span>
</th>
    <th>  <?= date('D', strtotime($from . ' +6 day'));?>  <span class="singledate">  <?= date('d', strtotime($from . ' +6 day'));?> 
    </span>
</th>

  </tr>

<?php
  $participant=select('participant');
  
  ?>
  <?php
           foreach($participant as $p) {  
           ?>
  <tr>


    <td> 
      <img src="<?=base_url()?>uploads/<?=$p['photo']?>"  class="img-circle" alt="" border="3" 
    height="50" width="50"> <?=$p['first_name']?>  <?=$p['last_name']?> 
  
  </td>



 <td>
<?php 
$rr=get_shift($p['id'],date('Y-m-d', strtotime($from)),$resion,$employee);
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
data-toggle="modal"  data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?>-<?=$r['shift_end']?> </span> <br>

<centedr><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></center>
<?php
}
}
else
{
}  echo '<br><center><a  data-toggle="modal" class="adds1" data-pdate1="'.date('Y-m-d', strtotime($from)).'"  data-pname1="'.$p['first_name'].' '.$p['last_name'].'" data-id1="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';

?>
 </td>

<td> 
 <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +1 day')),$resion,$employee)); 

 if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br>
<?php
}
}else
{
}    echo '<br> <center><a  data-toggle="modal" class="adds2" data-pdate2="'.date('Y-m-d', strtotime($from. ' +1 day')).'"  data-pname2="'.$p['first_name'].' '.$p['last_name'].'" data-id2="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';


?>
</td>

    <td> 
    <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +2 day')),$resion,$employee)); 
    
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br>
<?php
}
}else
{
 // echo '<center><a  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a></center>';
}    echo '<br> <center><a  data-toggle="modal" class="adds3" data-pdate3="'.date('Y-m-d', strtotime($from. ' +2 day')).'"  data-pname3="'.$p['first_name'].' '.$p['last_name'].'" data-id3="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';

    

?>

</td>
    <td> 
    <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +3 day')),$resion,$employee)); 
    
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
    <span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br>
    <?php
}
}else
{
 // echo '<center><a  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a></center>';
}    echo '<br> <center><a  data-toggle="modal" class="adds4" data-pdate4="'.date('Y-m-d', strtotime($from. ' +3 day')).'"  data-pname4="'.$p['first_name'].' '.$p['last_name'].'" data-id4="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';


?>

</td>
    <td> 
    <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +4 day')),$resion,$employee)); 
    
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br>
<?php
}
}else
{
}

 // echo '<center><a  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a></center>';
     echo '<br><center><a  data-toggle="modal" class="adds5" data-pdate5="'.date('Y-m-d', strtotime($from. ' +4 day')).'"  data-pname5="'.$p['first_name'].' '.$p['last_name'].'" data-id5="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';


?>

</td>

    <td> 
    <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +5 day')),$resion,$employee)); 
    
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br><?php
}
}else
{
  //echo '<center><a  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a></center>';
}
echo '<br><center><a  data-toggle="modal" class="adds6" data-pdate6="'.date('Y-m-d', strtotime($from. ' +5 day')).'"  data-pname6="'.$p['first_name'].' '.$p['last_name'].'" data-id6="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';


?>

</td>


    <td> 
    <?php $rr=(get_shift($p['id'],date('Y-m-d', strtotime($from. ' +6 day')),$resion,$employee)); 
    
if(isset($rr) AND !empty($rr))
{ 
    foreach($rr as $r) {
    ?>
<span class='<?=$r['class']?>' 
 data-toggle="modal" data-target="#myModal<?=$r['shift_id']?>" > <?=$r['shift_start']?> -<?=$r['shift_end']?></span>
 <span><a  data-toggle="modal" data-target="#copy<?=$r['shift_id']?>"><i class="fa fa-copy"></i></a></span>
<br>

<?php
}
}else
{
  //echo '<center><a  data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></a></center>';
    echo '<center><a  data-toggle="modal" class="adds7" data-pdate7="'.date('Y-m-d', strtotime($from. ' +6 day')).'"  data-pname7="'.$p['first_name'].' '.$p['last_name'].'" data-id7="'.$p['id'].'" data-target="#add"><i class="fa fa-plus"></i></a></center>';

}
?>

</td>


  </tr> 
  <?php } ?>
</table>



<?php  
foreach(select('shift') as $sh) 
{?>

<div class="modal fade" id="copy<?=$sh['id']?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Copy Shift</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

                  <?php echo form_open_multipart(base_url('admin/shift/copy'), 'class="form-horizontal"');  ?> 
                  
                  <input type='hidden' name='id' value="<?=$sh['id']?>">
                  <?php 
                  $array=array(
                    array('label'=>'From Date','name'=>'date','required'=>'requirded','type'=>'date', 'value'=>''),
                    array('label'=>'To Date','name'=>'todate','required'=>'requirded','type'=>'date', 'value'=>''),
                   
                  );
                    echo create_form($array);
                   ?>


<div class='row'>

<div class="col-md-6">
              </div>
  <div class="col-md-6">

  <div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Copy Shift') ?>" class="btn btn-primary pull-right">
  </div>
</div>
      </div>
      <?php echo form_close(); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<?php } ?>


<script>

$(document).on("click", ".adds1", function () 
{ 
      $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id1 = $(this).data('id1'); loaddata(id1);
      var pname1= $(this).data('pname1');
      var pdate1= $(this).data('pdate1');
      $(".modal-body #pid").val( id1 );
      $(".modal-body #pname").val( pname1 );
      $(".modal-body #pdate").val( pdate1 );
      
});

$(document).on("click", ".adds2", function () {   $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val(''); 
      var id2 = $(this).data('id2');  loaddata(id2);
      var pname2= $(this).data('pname2');
      var pdate2= $(this).data('pdate2');
      $(".modal-body #pid").val( id2 );
      $(".modal-body #pname").val( pname2 );
      $(".modal-body #pdate").val( pdate2 );
      
});



$(document).on("click", ".adds3", function () {   
    $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id3 = $(this).data('id3');  loaddata(id3);
      var pname3= $(this).data('pname3');
      var pdate3= $(this).data('pdate3');
      $(".modal-body #pid").val( id3 );
      $(".modal-body #pname").val( pname3 );
      $(".modal-body #pdate").val( pdate3 );
      
});




$(document).on("click", ".adds4", function () {  
    $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id4 = $(this).data('id4');  loaddata(id4);
      var pname4= $(this).data('pname4');
      var pdate4= $(this).data('pdate4');
      $(".modal-body #pid").val( id4 );
      $(".modal-body #pname").val( pname4 );
      $(".modal-body #pdate").val( pdate4 );
      
});




$(document).on("click", ".adds5", function () { 
    $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id5 = $(this).data('id5');  loaddata(id5);
      var pname5= $(this).data('pname5');
      var pdate5= $(this).data('pdate5');
      $(".modal-body #pid").val( id5 );
      $(".modal-body #pname").val( pname5 );
      $(".modal-body #pdate").val( pdate5 );
      
});



$(document).on("click", ".adds6", function () {  
    $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id6 = $(this).data('id6');  
      loaddata(id6);
      var pname6= $(this).data('pname6');
      var pdate6= $(this).data('pdate6');
      $(".modal-body #pid").val( id6 );
      $(".modal-body #pname").val( pname6 );
      $(".modal-body #pdate").val( pdate6 );
      
});


$(document).on("click", ".adds7", function () { 
    
      $(".modal-body #pid").val('');
      $(".modal-body #pname").val('');
      $(".modal-body #pdate").val('');
      var id7 = $(this).data('id7'); 
      loaddata(id7);
      var pname7= $(this).data('pname7');
      var pdate7= $(this).data('pdate7');
      $(".modal-body #pid").val( id7 );
      $(".modal-body #pname").val( pname7 );
      $(".modal-body #pdate").val( pdate7 );
      
});


</script>
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Shift</h4>
      </div>
      <div class="modal-body">
    

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjlyTMFSZuwQMG2AA5aAsyUSmLWADqZuI&libraries=places"></script>  
<style>
    #map_canvas{
    width: 650px;
    height: 400px;
}

    </style> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">


                  <?php echo form_open_multipart(base_url('admin/shift/add'), 'class="form-horizontal"');  ?> 
                  

                  <?php 

$participant=select('participant');
                  ?>

<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">participant_name</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-12">
          
      <!--  <select namfe="participants" requiredd="" class="form-control participant_name" id="selectp">
          <option value="">Please Select value</option>
         
         <?php
           foreach($participant as $rate) {  
           ?>
         <option  value="<?=$rate['id']?>"><?=$rate['first_name']?> <?=$rate['last_name']?></option>
          <?php } ?>
        </select>  -->
        <input type='hidden' class="form-control participant_name" readonly  name='participant'  id="pid">
        <input type='text' class="form-control participant_name" readonly  namedf='participant'  id="pname">
      
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>



                  <?php 
                  $allowance=$this->financial->get(); //select('allowance');
                  $employee_pay_rate=$this->financial->get_emppay(); //select('emppay_guide');
                 
                  $admin_id=$this->session->userdata('admin_id');
                  $service_provider_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
                  $admin_role_id=@$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->admin_role_id;


                  if($admin_role_id==8)
		{
      $emp=select('ci_admin',array('admin_role_id'=>7,'service_provider_id'=>$service_provider_id));

    }
    else
    {
                  $emp=select('ci_admin',array('admin_role_id'=>7));

    }

                  $dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));



                //   $array=array(
                //   //array('label'=>'participant_name','required'=>'requdddired','name'=>'participant_name','type'=>'text', 'value'=>''),
                //   array('label'=>'date','id'=>'pdate','name'=>'date','required'=>'requirded','type'=>'date', 'value'=>''),
                //   );
                  //echo create_formb($array);

?>
<div class="row">
        <div class="col-sm-4">
        <label for="firstname" class="col-md-12 control-label">Date</label>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <input type="date"  requirded="" name="date" class="form-control date" id="pdate" placeholder="">
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>
<div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_start</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time"  required="required" required name="shift_start" class="form-control shift_start" id="time" placeholder="shift_start">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>



                  <div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_end</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time" value="" required="required" name="shift_end" class="form-control shift_end" id="time" placeholder="shift_end">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>


<?php

                  
                  $array=array(
                    //array('label'=>'participant_name','required'=>'requdddired','name'=>'participant_name','type'=>'text', 'value'=>''),
                  array('label'=>'shift_type','name'=>'shift_type','type'=>'text','required'=>'required', 'value'=>''),
                  //array('label'=>'create_a_split_shift','name'=>'create_a_split_shift','type'=>'select', 'dropdown'=>$dropdown,'required'=>'requdired', 'value'=>''),
                  //array('label'=>'allowances','name'=>'allowances','type'=>'select','dropdown'=>$allowance, 'required'=>'required','value'=>''),
                  array('label'=>'shift_location','name'=>'shift_location','type'=>'text','required'=>'required', 'readonly'=>'readonly', 'value'=>''),
                  array('label'=>'other_location','name'=>'other_location','type'=>'text','required'=>'required', 'readonly'=>'readonly','value'=>''),
                  //array('label'=>'select_employee','name'=>'select_employee','type'=>'select','required'=>'requiredd','dropdown'=>$emp, 'check_val'=>'admin_id','value'=>''),
                
                  );
                 echo create_formb($array);
               ?>



<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">select_employee</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-12">
        <select name="employee"  required="required" class="form-control select_employee" id="selecte">
          <option value="">Please Select value</option>
         
         <?php
           foreach($emp as $rate) {  
           ?>
         <!--<option value="<?=$rate['admin_id']?>"><?=$rate['firstname']?> <?=$rate['lastname']?></option>-->
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>






<!--
<div class="row">
      
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">employee_pay_rate</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-12">
        <select name="pay_rate" requiredd="" class="form-control employee_pay_rate" id="select">
          <option value="">Please Select value</option>
         
         <?php
           foreach($employee_pay_rate as $rate) {  
           ?>
         <option value="<?=$rate['id']?>"><?=$rate['hourly_rate']?>(Hourly Rate)</option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       


       </div>
      
       
       <div class="col-sm-2">
       

       </div>
      
       </div>
       
       -->
 <input type="hidden" class="form-control" id="latlng" size="40" /> 


       <br>
       <div class="row">
      
    <div class="col-sm-4">
       


       </div>
       
      
       </div>

      
      <br>
                  <!-------->
                 <div class='row'>

<div class="col-md-6">
              </div>
  <div class="col-md-6">

  <div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Add Shift') ?>" class="btn btn-primary pull-right">
  </div>
</div>
      </div>
      <?php echo form_close(); ?>

    </div>
<!-- /.box-body -->


<script>
loaddata();

function loaddata(level) {
  

        if(level){
               $.ajax ({
                type: 'POST',
                url: '<?=base_url('admin/shift/get_participant_data')?>',
                data: { participant_id: '' + level + '' },
                success : function(htmlresponse) {
                const obj = JSON.parse(htmlresponse);  
                 var address=obj['address'];
                 var latlng=obj['latlng'];
                 var option=obj['option'];


    $('#latlng').val(latlng);
    $('input[name="shift_location"]').val(address);
  
    $('input[name="other_location"]').val(latlng);
      $('#selecte').html(option);
      },error:function(e){
                alert("error");}
            });
        }
        else
        {
             $('#latlng').val('');
    $('input[name="shift_location"]').val('');
  
    $('input[name="other_location"]').val('');
      $('#selecte').html('<option value="">Select Participant First</option>');
        }
}
$(document).ready(function($) {
    $("#selectp").on('change', function() {
        var level = $(this).val();
      //  alert(level);
        if(level){
               $.ajax ({
                type: 'POST',
                url: '<?=base_url('admin/shift/get_participant_data')?>',
                data: { participant_id: '' + level + '' },
                success : function(htmlresponse) {
                const obj = JSON.parse(htmlresponse);  
                 var address=obj['address'];
                 var latlng=obj['latlng'];
                 var option=obj['option'];


    $('#latlng').val(latlng);
    $('input[name="shift_location"]').val(address);
  
    $('input[name="other_location"]').val(latlng);
      $('#selecte').html(option);
      },error:function(e){
                alert("error");}
            });
        }
        else
        {
             $('#latlng').val('');
    $('input[name="shift_location"]').val('');
  
    $('input[name="other_location"]').val('');
      $('#selecte').html('<option value="">Select Participant First</option>');
        }
    });
});
    </script>  
    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





</div>


















                  </div>
<!-- /.box-body -->

</div>
</div>
</div>  
</div>
</div>
</section> 
</div>


<?php  
foreach(select('shift') as $sh) 
{
  //PRINT_R($sh);
?>
<!-- Modal -->
<div id="myModal<?=$sh['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
        
  <?php  
   if($sh['status']==1)
    {
      $status='Shift Confirmed';
      $class='accepted';
     ?>
 <center>
 <h3><?=$status?></h3>
<h5>
Participant Name <br>
  <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->first_name?> <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->last_name?>
</h5>


<h5> Employee<br>
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?>  
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?> 
  </h5>

<!--<h5> Allowances<br>-->
<!--  <?php echo $this->db->get_where('allowance',array('id'=>$sh['allowances']))->row()->name?> -->
<!--  </h5>-->

  <h5> Shift Location <br>
  <?php echo $sh['shift_location'];?> 
  <?php if($sh['other_location']!='')
  {  ?>
  <br>
  Other Location <br>
  <?php echo $sh['other_location']?>
  <?php } ?>
  </h5>


  <!--<h5> Employee Pay Rate <br>-->
  <!--<?php echo $this->db->get_where('emppay_guide',array('id'=>$sh['pay_rate']))->row()->hourly_rate?> Per Hours-->
  <!--</h5>-->

 <a href="<?=base_url()?>admin/shift/edit/<?=$sh['id']?>" class='btn btn-info'>Edit</a>

</center>
<?php 
    
    
    }
   
   ?>





<?php  
   if($sh['status']==0)
    {
      $status='Awaiting confirmation';
      $class='accepted';
     ?>
 <center>
 <h3><?=$status?></h3>
<h5>
Participant Name <br>
  <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->first_name?> <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->last_name?>
</h5>

<h5> Employee<br>
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?>  
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?> 
  </h5>

<!--<h5> Allowances<br>-->
<!--  <?php echo $this->db->get_where('allowance',array('id'=>$sh['allowances']))->row()->name?> -->
<!--  </h5>-->

  <h5> Shift Location <br>
  <?php echo $sh['shift_location'];?> 
  <?php if($sh['other_location']!='')
  {  ?>
  <br>
  Other Location <br>
  <?php echo $sh['other_location']?>
  <?php } ?>
  </h5>


  <!--<h5> Employee Pay Rate <br>-->
  <!--<?php echo $this->db->get_where('emppay_guide',array('id'=>$sh['pay_rate']))->row()->hourly_rate?> Per Hours-->
  <!--</h5>-->
  <a href="<?=base_url()?>admin/shift/edit/<?=$sh['id']?>" class='btn btn-info'>Edit</a>
  </center>
   <?php 
    }
   ?>



<?php  
   if($sh['status']==2)
    {
      $status='Shift Rejected';
      $class='accepted';
     ?>
 <center>
 <h3><?=$status?></h3>


 <h5> 
  The shift was rejected by the employee for the following reason:
    <br>
    <?php echo $sh['rejected_reson'];?> 
    </h5>


    

 <h5>
Participant Name <br>
  <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->first_name?> <?php echo $this->db->get_where('participant',array('id'=>$sh['participant']))->row()->last_name?>
</h5>

<h5> Employee<br>
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?>  
  <?php echo $this->db->get_where('ci_admin',array('admin_id'=>$sh['employee']))->row()->firstname?> 
  </h5>

<!--<h5> Allowances<br>-->
<!--  <?php echo $this->db->get_where('allowance',array('id'=>$sh['allowances']))->row()->name?> -->
<!--  </h5>-->


  <h5> Shift Location <br>
  <?php echo $sh['shift_location'];?> 
  <?php if($sh['other_location']!='')
  {  ?>
  <br>
  Other Location <br>
  <?php echo $sh['other_location']?>
  <?php } ?>
  </h5>


  <!--<h5> Employee Pay Rate <br>-->
  <!--<?php echo $this->db->get_where('emppay_guide',array('id'=>$sh['pay_rate']))->row()->hourly_rate?> Per Hours-->
  <!--</h5>-->
 <a href="<?=base_url()?>admin/shift/edit/<?=$sh['id']?>" class='btn btn-info'>Edit</a>

  <a href="<?=base_url()?>admin/shift/request_again/<?=$sh['id']?>" class='btn btn-info'>Request again</a>
  

  <a href="<?=base_url()?>admin/shift/ressign/<?=$sh['id']?>" class='btn btn-info' style='background:#6A2875;'>Reassign</a>
  



  </center>
   <?php 
    }
   ?>




      </div>


      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php  } ?>