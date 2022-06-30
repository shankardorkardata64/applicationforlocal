<h3 class="card-title" align="right">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Add
</button>

<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Import in Bulk </button>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

      <div class="col-md-12" id="importFrm" style="displasy: none;">
            <form action="<?php echo base_url('admin/financial/import2')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
          
            <div class="form-group">
         <label for="username"   style="
    float: left;
" class="label">Employee Contract</label>
                  <select name="emp_contract" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($contract as $co): ?>
                          <option value="<?= $co['id']; ?>"><?= $co['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
              </div>  
              <div class="form-group">
         <label for="username"   style="
    float: left;
"    class="label">Employee Type</label>
                  <select name="emp_type" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($type as $t): ?>
                          <option value="<?= $t['id']; ?>"><?= $t['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    
          
              </div>  
     <div class="form-group">
         <label for="username"  style="
    float: left;
" class="label">Employee Classification</label>
                  <select name="emp_class" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($classification as $c): ?>
                          <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    
          
              </div>
      

              <div class="form-group">
                    <label  style="
    float: left;
"  for="username" class="label">Pre-Mdern Award Classification </label>
                  <select name="empcontract_id" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($award as $aw): ?>
                          <option value="<?= $aw['id']; ?>"><?= $aw['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
          
              </div>
          
<div>            
          <img   style="
    float: left;
"  src='<?=base_url('uploads')?>/import2.png'>
                <input   style="
    float: left;
"  type="file" name="file" />
                        </div>
                        <div>
                        <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
   
                      </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


                  </h3>
</br>
<div class="datalist">

<table id="example1" class="table table-bordered table-hover">
        <thead>
       
                <tr>
                <th width="50"><?= trans('id') ?></th>
                <th>Pre Award</th>
                <th>hourly Rate</th>
                <th>Action</th>            
            </tr>
        </thead>
        <tbody>
<?php foreach ($list as $row): ?>
    
<div id="testmodal<?php echo $row['id']?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee Pay Guide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                 <div class="modal-body">
                     
 <form id="email_form" action="<?php echo base_url('admin/financial/editemppay')?>" class="staff-form" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
           
         
     <div class="form-group">
                    <label for="username" class="label">Employee Contract</label>
                  <select name="empcontract_id" class="form-control" >
                         <?php foreach($contract as $co): ?>
                         <option   <?php if($row['empcontract_id']==$co['id']){ echo "Selected";} ?>  value="<?= $co['id']; ?>"><?= $co['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
          
              </div>
                  <div class="form-group">
         <label for="username" class="label"">Employee Type</label>
                  <select name="emptype_id" class="form-control" >
                        
                        <?php foreach($type as $t): ?>
                         <option   <?php if($row['emptype_id']==$t['id']){ echo "Selected";} ?>  value="<?= $t['id']; ?>"><?= $t['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    
          
              </div>  
               <div class="form-group">
 <label for="username" class="label"">Employee Classification</label>
                  <select name="classification_id" class="form-control" >
                        <?php foreach($classification as $c): ?>
                         <option   <?php if($row['classification_id']==$c['id']){ echo "Selected";} ?>  value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                    
                      </select>
              </div>
               <div class="form-group">
                    <label for="username" class="label">Pre-Mdern Award Classification </label>
                  <select name="pre_award" class="form-control" >
                       
                        <?php foreach($award as $aw): ?>
                         <option   <?php if($row['pre_award']==$aw['id']){ echo "Selected";} ?>  value="<?= $aw['id']; ?>"><?= $aw['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
          
              </div>
              <div class="form-group">
                    <label for="username" class="label">Hourly Pay Rate</label>
                  <input type="text" name="hourly_rate" class="form-control" id="hourly_rate"  value="<?php echo $row['hourly_rate']?>" placeholder="">       
              </div>
               <div class="form-group">
                    <label for="username" class="label">Saturday</label>
                  <input type="text" name="saturday" class="form-control" id="saturday"  value="<?php echo $row['saturday']?>" placeholder="">       
              </div>
              <div class="form-group">
                    <label for="username" class="label">Sunday</label>
                  <input type="text" name="sunday" class="form-control" id="sunday"  value="<?php echo $row['sunday']?>" placeholder="">       
              </div>
              <div class="form-group">
                    <label for="username" class="label">Public Holiday</label>
                  <input type="text" name="publicholiday" class="form-control" id="publicholiday"  value="<?php echo $row['publicholiday']?>" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Afternoon Shift</label>
                  <input type="text" name="aftshift" class="form-control" id="aftshift"  value="<?php echo $row['aftshift']?>" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Night Shift</label>
                  <input type="text" name="nigshift" class="form-control" id="aftshift"  value="<?php echo $row['nigshift']?>" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Overtime- Monday To Saturday First 3 Hours(Full-Time) Or First 2 Hours (Part-Time)</label>
                  <input type="text" name="overtimefirst" class="form-control" id="overtimefirst"  value="<?php echo $row['overtimefirst']?>" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Overtime- Monday To Saturday After 3 Hours(Full-Time) Or After 2 Hours (Part-Time)</label>
                  <input type="text" name="overtimesec" class="form-control" id="overtimesec"  value="<?php echo $row['overtimesec']?>" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Overtime- Public Holiday</label>
                  <input type="text" name="overtimethird" class="form-control" id="overtimethird"  value="<?php echo $row['overtimethird']?>" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Less Than 10 Hours Break Between Shifts</label>
                  <input type="text" name="lessten" class="form-control" id="lessten"  value="<?php echo $row['lessten']?>" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Broken Shift-Working Beyond A 12 Hours Span- Disability Service Work</label>
                  <input type="text" name="brokenshift" class="form-control" id="brokenshift"  value="<?php echo $row['brokenshift']?>" placeholder="">
              </div>

<input type="hidden" id="id" name="id" value="<?php echo $row['id']?>" class="form-control" placeholder="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="button" id="join_list" value="Save" class="btn btn-primary">
            </div>
            
        
         </form>
   </div>
    </div>
</div>

     <tr>
             <td>
                    <?=$row['id']?>
                </td>
                <td>
                    <?=$row['pre_award']?>
                </td>
                <td>
                    <?=$row['hourly_rate']?>
                </td>
<td>
<div class="btn btn-warning btn-sm checkbox-toggle" id="element<?php echo $row['id']?>" class="btn btn-default ">Edit</div>
<a title="Delete" class="delete btn btn-sm btn-danger" href="<?=base_url('admin/financial/deleteemppay')?>/<?=$row['id']?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> Delete</a>

</td>
 </tr>
<script>
    $(document).ready(function(){
  var show_btn=$('#element<?php echo $row['id']?>');
  
  //$("#testmodal").modal('show');
  
    show_btn.click(function(){
      $("#testmodal<?php echo $row['id']?>").modal('show');
  })
});
</script>

<?php endforeach ?>

   </tbody>
    </table>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Employee Pay Guid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form"  action="addemppay" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
         <label for="username" class="label"">Employee Contract</label>
                  <select name="emp_contract" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($contract as $co): ?>
                          <option value="<?= $co['id']; ?>"><?= $co['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
              </div>  
              <div class="form-group">
         <label for="username" class="label"">Employee Type</label>
                  <select name="emp_type" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($type as $t): ?>
                          <option value="<?= $t['id']; ?>"><?= $t['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    
          
              </div>  
     <div class="form-group">
         <label for="username" class="label"">Employee Classification</label>
                  <select name="emp_class" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($classification as $c): ?>
                          <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    
          
              </div>
                 <div class="form-group">
                    <label for="username" class="label">Pre-Mdern Award Classification </label>
                  <select name="empcontract_id" class="form-control" >
                        <option value="#">Select</option>
                        <?php foreach($award as $aw): ?>
                          <option value="<?= $aw['id']; ?>"><?= $aw['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Hourly Pay Rate</label>
                  <input type="text" name="hpr" class="form-control" id="hpr" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Saturday</label>
                  <input type="text" name="sat" class="form-control" id="sat" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Sunday</label>
                  <input type="text" name="sun" class="form-control" id="sun" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Public Holiday</label>
                  <input type="text" name="ph" class="form-control" id="ph" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Afternoon Shift</label>
                  <input type="text" name="as" class="form-control" id="as" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Night Shift</label>
                  <input type="text" name="ns" class="form-control" id="ns" placeholder="">
              </div>
                <div class="form-group">
                    <label for="username" class="label">Overtime- Monday To Saturday First 3 Hours(Full-Time) Or First 2 Hours (Part-Time) </label>
                  <input type="text" name="otone" class="form-control" id="otone" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Overtime- Monday To Saturday After 3 Hours(Full-Time) Or After 2 Hours (Part-Time) </label>
                  <input type="text" name="ottwo" class="form-control" id="ottwo" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Overtime- Public Holiday</label>
                  <input type="text" name="otthree" class="form-control" id="otthree" placeholder="">
              </div>
              <div class="form-group">
                    <label for="username" class="label">Less Than 10 Hours Break Between Shifts</label>
                  <input type="text" name="lt" class="form-control" id="lt" placeholder="">
              </div>
            
              <div class="form-group">
                    <label for="username" class="label">Broken Shift-Working Beyond A 12 Hours Span- Disability Service Work</label>
                  <input type="text" name="bs" class="form-control" id="bs" placeholder="">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
 <script>
$(document).ready(function() {
    $('#join_list').on('click', function() {
        $("#join_list").attr("disabled", "disabled");
        var id = $('#id').val();
        var empcontract_id = $('#empcontract_id').val();
        var emptype_id = $('#emptype_id').val();
        var classification_id = $('#classification_id').val();
        var pre_award = $('#pre_award').val();
        var hourly_rate = $('#hourly_rate').val();
        var saturday = $('#saturday').val();
        var sunday = $('#sunday').val();
        var publicholiday = $('#publicholiday').val();
        var aftshift = $('#aftshift').val();
        var nigshift = $('#nigshift').val();
        var overtimefirst = $('#overtimefirst').val();
        var overtimesec = $('#overtimesec').val();
        var overtimethird = $('#overtimethird').val();
        var lessten = $('#lessten').val();
        var brokenshift = $('#brokenshift').val();
        if(id!="" ){
            $.ajax({
                url: "<?php echo base_url('admin/financial/editemppay')?>",
                type: "POST",
                data: {
                    id: id,
                    empcontract_id: empcontract_id,
                    emptype_id: emptype_id,
                    classification_id: classification_id,
                    pre_award: pre_award,
                    hourly_rate: hourly_rate,
                    saturday: saturday,
                    sunday: sunday,
                    publicholiday: publicholiday,
                    aftshift: aftshift,
                    nigshift: nigshift,
                    overtimefirst: overtimefirst,
                    overtimesec: overtimesec,
                    overtimethird: overtimethird,
                    lessten: lessten,
                    brokenshift: brokenshift,
                                
                },
                cache: false,
                success: function(dataResult){
                     window.location.href = '<?php echo base_url('admin/financial/employeepay')?>';
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#butsave").removeAttr("disabled");  

                    }
                    else if(dataResult.statusCode==201){
                       alert("Error occured !");
                    }
                    
                }
            });
        }
        else{
            alert('Please fill all the field !');
        }
    });
});
</script>