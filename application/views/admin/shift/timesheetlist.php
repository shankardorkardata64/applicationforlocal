<?php // echo '<pre>';
        //    print_r($info);
          //  echo '</pre>'; ?>
<div class="datalist">
    
       <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <!--<th>Sr</th>-->
                  <th>Participant</th>
                  <th>Shift type</th>
                  <th>Location</th>
                  <th>date</th>
                  <th>From</th>
                  <th>to</th>
                  <th>Support Worker</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php foreach($shift as $s){ 
                    $emp=select('ci_admin',array('admin_id'=>$s['employee']))[0];
   			$en=$emp['firstname'].' '.$emp['lastname'];
		   
                    
                    ?>
                    <tr>
                        <td><?=@select('participant',array('id'=>$s['participant']))[0]['first_name']?> </td>
                          <td><?=$s['shift_type']?></td>
                            <td><?=$s['shift_location']?></td>
                              <td><?=$s['date']?></td>
                                <td><?=date('h:i:s a',strtotime($s['shift_start']))?></td>
                                 <td><?=date('h:i:s a',strtotime($s['shift_end']))?></td>
                                  <td><?=$en?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                
              </table>
    
</div>




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

</script>

