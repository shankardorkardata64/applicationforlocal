<h3 class="card-title" align="right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Add
</button>
                  </h3>
</br>
<div class="datalist">

<table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th>Name</th>
                <th>Rate</th>
                <th>Frequency</th>
                <th>Action</th>
                

            </tr>
        </thead>
        <tbody>
<?php foreach ($list as $row): ?>
    
<div id="testmodal<?php echo $row['id']?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Allawance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                 <div class="modal-body">
                     
 <form id="emdfgail_form"
  action="<?php echo base_url('admin/financial/editallowance')?>"
   class="staff-form" autocomplete="off"
    method="post"
    accept-charset="utf-8">
 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
           
         
     <div class="form-group">
                    <label for="username" class="label">Allowance Name</label>
                  <input type="text" id="name" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Rate</label>
                  <input type="text" id="rate" name="rate" value="<?php echo $row['rate']?>" class="form-control"  placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Frequency</label>
                  <input type="text" id="frequency" name="frequency" value="<?php echo $row['frequency']?>" class="form-control" placeholder="">
          
              </div>
<input type="hidden" id="id" name="id" value="<?php echo $row['id']?>" class="form-control" placeholder="">
            <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>

        <input type="submit">
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
                    <?=$row['name']?>
                </td>
                <td>
                    <?=$row['rate']?>
                </td> 
                <td>
                    <?=$row['frequency']?>
                </td> 
              
                <td> 

<div class="btn btn-warning btn-sm checkbox-toggle" id="element<?php echo $row['id']?>" class="btn btn-default ">Edit</div>
<a title="Delete" class="delete btn btn-sm btn-danger" href="<?=base_url('admin/financial/deleteallowance')?>/<?=$row['id']?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> Delete</a>

</td>
 </tr>
<script>
    $(document).ready(function(){
  var show_btn=$('#element<?php echo $row['id']?>');
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add Allawance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form"  action="addallowance" method="post" enctype="multipart/form-data">
      <div class="modal-body">
         
     <div class="form-group">

             
                    <label for="username" class="label">Allowance Name</label>
                  <input type="text" name="name" class="form-control" placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Rate</label>
                  <input type="text" name="rate" class="form-control"  placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Frequency</label>
                  
                  
                  <select name="frequency" class="form-control">
                        <option value=""><?= trans('select_frequency') ?></option>
                        <?php foreach(select('frequency') as $g): ?>
                          <option value="<?= $g['name']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
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
        var name = $('#name').val();
       var rate = $('#rate').val();
       var frequency = $('#frequency').val();
        if(name!="" && id!="" ){
            $.ajax({
                url: "<?php echo base_url('admin/financial/editallowance')?>",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    rate: rate,
                    frequency: frequency,
                                
                },
                cache: false,
                success: function(dataResult){
                     window.location.href = '<?php echo base_url('admin/financial/index')?>';
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