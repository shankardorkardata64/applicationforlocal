<h3 class="card-title" align="right">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Add
</button>

<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Import in Bulk </button>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

      <div class="col-md-12" id="importFrm" style="displasy: none;">
            <form action="<?php echo base_url('admin/financial/import')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
          
                <div class="form-group">
                  <input type="text" required id="catalogue" name="catalogue" class="form-control" placeholder="Enter Name Of Support Catalogue Name">
                </div>
          
          <img src='<?=base_url('uploads')?>/import1.png'>
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
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

<div class="card-body">
                <?php echo form_open("admin/Financial/support",'method="post" class="filterdata"') ?>    
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
   

<table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th>Catalogue Name</th>
                  <th>Category No</th>
                <th>Category Name</th>
                <th>Item No</th>
                <th>Item Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>S/Km</th>
                <th>Action</th>
                

            </tr>
        </thead>
        <tbody>
<?php foreach ($list as $row): ?>
    
<div id="testmodal<?php echo $row['id']?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Support Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                 <div class="modal-body">
                     
 <form id="email_form" action="<?php echo base_url('admin/financial/editsupportcat')?>"  class="staff-form" class="staff-form" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

 <div class="form-group">
                    <label for="username" class="label">Name Of Support Catalogue Name</label>
                  <input type="text" id="catalogue" name="catalogue" value="<?php echo $row['catalogue']?>" class="form-control" placeholder="">
          
              </div>
           
         
     <div class="form-group">
                    <label for="username" class="label">Support Category Number</label>
                  <input type="text" id="cat_num" name="cat_num" value="<?php echo $row['cat_num']?>" class="form-control" placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Support Category Name</label>
                  <input type="text" name="cat_name" class="form-control" id="cat_name"  value="<?php echo $row['cat_name']?>" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Item Number</label>
                  <input type="text" name="item_num" class="form-control" id="item_num"  value="<?php echo $row['item_num']?>" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Item Name</label>
                  <input type="text" name="item_name" class="form-control" id="item_name"  value="<?php echo $row['item_name']?>" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Unit</label>
                  <input type="text" name="unit" class="form-control" id="unit"  value="<?php echo $row['unit']?>"placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Price</label>
                  <input type="text" name="price" class="form-control" id="price"  value="<?php echo $row['price']?>"placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">S/Km</label>
                  <input type="text" name="distance" class="form-control" id="distance"  value="<?php echo $row['distance']?>" placeholder="">
          
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
                    <?=$row['catalogue']?>
                </td>
                <td>
                    <?=$row['cat_num']?>
                </td>
                <td>
                    <?=$row['cat_name']?>
                </td>
                <td>
                    <?=$row['item_num']?>
                </td> 
                <td>
                    <?=$row['item_name']?>
                </td>
                <td>
                    <?=$row['unit']?>
                </td> 
                <td>
                    <?=$row['price']?>
                </td> 
                <td>
                    <?=$row['distance']?>
                </td> 
              
                <td>
<div class="btn btn-warning btn-sm checkbox-toggle" id="element<?php echo $row['id']?>" class="btn btn-default ">Edit</div>
<a title="Delete" class="delete btn btn-sm btn-danger" href="<?=base_url('admin/financial/deletesupportcat')?>/<?=$row['id']?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> Delete</a>
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
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Support Catalogue </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form"  action="addsuportcat" method="post" enctype="multipart/form-data">
      <div class="modal-body">

         <div class="form-group">
                    <label for="username" class="label">Name Of Support Catalogue Name</label>
                  <input type="text" name="catalogue" class="form-control" id="catalogue" placeholder="">
          
              </div>
         
     <div class="form-group">

             
                    <label for="username" class="label">Support Category Number</label>
                  <input type="text" name="cat_no" class="form-control" id="cat_no" placeholder="">
          
              </div>
               <div class="form-group">

             
                    <label for="username" class="label">Support Category Name</label>
                  <input type="text" name="cat_name" class="form-control" id="cat_name" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Item Number</label>
                  <input type="text" name="item_no" class="form-control" id="item_no" placeholder="">
              </div>
               <div class="form-group">
                    <label for="username" class="label">Item Name</label>
                  <input type="text" name="item_name" class="form-control" id="item_name" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Unit</label>
                  <input type="text" name="unit" class="form-control" id="unit" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">Price</label>
                  <input type="text" name="price" class="form-control" id="price" placeholder="">
          
              </div>
               <div class="form-group">
                    <label for="username" class="label">S/Km</label>
                  <input type="text" name="distance" class="form-control" id="distance" placeholder="">
          
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
        var catalogue = $('#catalogue').val();
        var cat_num = $('#cat_num').val();
       var cat_name = $('#cat_name').val();
       var item_num = $('#item_num').val();
       var item_name = $('#item_name').val();
       var unit = $('#unit').val();
       var price = $('#price').val();
       var distance = $('#distance').val();
        if(id!="" ){
            $.ajax({
                url: "<?php echo base_url('admin/financial/editsupportcat')?>",
                type: "POST",
                data: {
                    id: id,
                    catalogue: catalogue,
                    cat_num: cat_num,
                    cat_name: cat_name,
                    item_num: item_num,
                    item_name: item_name,
                    unit:unit,
                    price:price,
                    distance:distance,
                                
                },
                cache: false,
                success: function(dataResult){
                     window.location.href = '<?php echo base_url('admin/financial/support')?>';
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
