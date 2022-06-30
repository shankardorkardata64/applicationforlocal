<style>
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #ec3535;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

.smallfont
{  font-size: 13px;
}
.buttonsmallfont
{  font-size: 10px;
}

.cardscroll{
    height: 400px;
    overflow-x: scroll;
    width: 100%;
}
  

</style>
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
          </div>
          <div class="d-inline-block float-right">
  
        </div>
        </div>
        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card-body">
          <div class="row">

                  <!-- For Messages -->


            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">
   

                <div class='row'  style="border: 5px solid black;">
                   <div class="col-sm-4">
               
               <div class="card1a">
   
               <div class='row'  style="border-bottom: 5px solid black;">
                   <div class="col-sm-6"> 
                   <center><img src="<?=base_url()?>uploads/<?=$i['photo']?>" alt="<?=$i['email']?>" style="width:75%">
                    </center>
                    </div>
                   <div class="col-sm-6">
                    <center><h4 style="
    color: blue;
"><?=$i['first_name']?>  <?=$i['last_name']?> </h4>  <h5>  <?=$i['age']?> Years Old </center></h5>
                 </div>
              </div>

<hr>

              
              <div class='row' >
                   <div class="col-sm-6"> 
                   <center><i class="fa fa-phone"> </i>  Phone</center>
                    </div>
                   <div class="col-sm-6">
                    <center><h5> <?=$i['phone_number']?></h5>
                 </div>
              </div>


              
              <div class='row'>
                   <div class="col-sm-6"> 
                   <center><i class="fa fa-envelope"> </i>  Email</center>
                    </div>
                   <div class="col-sm-6">
                    <center><h5> <?=$i['email']?></h5>
                 </div>
              </div>


              
              <div class='row'>
                   <div class="col-sm-6"> 
                   <center><i class="fa fa-map"> </i>  Address</center>
                    </div>
                   <div class="col-sm-6">
                    <center><h5> <?=$i['address']?></h5>
                 </div>
              </div>
              <div class='row'>
              <div class="col-sm-12">
            <center>
            <button  onclick="document.location='<?=base_url()?>admin/participant/careprofile/<?=$i['id']?>'">Edit Care Profile <i class="fa fa-edit"></i></button>
           </center>
           
           
           </div>
           </div>
            


                   </div>
                   
                   </div>
                   <div class="col-sm-6" style=" border-left: 5px solid black; ">
                   <div style=" border-bottom: 5px solid black; ">
                   
                   <h4>Myself</h4>
</div>
                   <hr>
                 <div class='row'>
                   <div class="col-sm-6"><h5><?= trans('lang') ?></h5></div>
                   <div class="col-sm-6"><h5><?=$i['lang']?></h5></div>
                   </div>



                  <div class='row'>
                   <div class="col-sm-6"><h5><?= trans('culture') ?></h5></div>
                   <div class="col-sm-6"><h5><?=$i['culture']?></h5></div>
                  </div>


                  
                  <div class='row'>
                   <div class="col-sm-6"><h5><?= trans('spiritual') ?></h5></div>
                   <div class="col-sm-6"><h5><?=$i['spiritual']?></h5></div>
                  </div>


                  
                  
                  <div class='row'>
                   <div class="col-sm-6"><h5><?= trans('valueandbel') ?></h5></div>
                   <div class="col-sm-6"><h5><?=$i['valueandbel']?></h5></div>
                  </div>

                   </div>
                  </div>


            </div>
                <!-- /.box-body -->
              </div>

              <hr>


              
          <div class="row" style="border: 5px solid black;">
            
          <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center>Other Care Plans</center> 
            </div>
            <div class="card-body cardscroll">
            
            <?php 
            $inpu=select('other_care_plan',array('user_id'=>$i['id']));
            
            ?>
            
            <?php  foreach($inpu as $in){?>
            <div class="row smallfont">
              <div class="col-md-12">
                <?php echo ($this->db->get_where('allied_helth_plan',array('id'=>$in['care_plan']))->result_array()[0]['name']);?>
                <a class="smallfont" href="<?=base_url()?>admin/participant/editadditionalcareprofile/<?=$in['id']?>"><i class="fa fa-edit"></i></a>
                
                <a class="smallfont" href="<?=base_url()?>admin/participant/viewadditionalcareprofile/<?=$in['id']?>"><i class="fa fa-eye"></i></a>
                
              
              </div>
              <div class="col-md-12">Valid Till <?=date('d-m-Y',$in['valid_till'])?></div>
             </div>
             <hr>
             <?php } ?>

            <center>
  <button  class="buttonsmallfont"  onclick="document.location='<?=base_url()?>admin/participant/addadditionalcareprofile/<?=$i['id']?>'">Add Addtional <i class="fa fa-plus" aria-hidden="true"></i>
</button>
           </center>
          
          </div>
           </div>
           </div>
        

           <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center>Task assignment </center> 
            </div>
            <div class="card-body cardscroll">
              
            <?php foreach($task as $t) {?>
            <div class="row smallfont">
              <div class="col-md-12"><?=$t['task_name']?></div>
              <div class="col-md-12"><?php if($t['updated_at']=='') {   ?>Started On <?=date('d-m-Y',$t['added_at'])?> <?php } else { ?> Date of last Edit  <?=date('d-m-Y',$t['updated_at'])?>
                <?php } ?>
              </div>
            </div>
            <hr>
             <?php } ?>

            <center>
  <button class="buttonsmallfont"  onclick="document.location='<?=base_url()?>admin/participant/addtaskassignment/<?=$i['id']?>'">Add Task<i class="fa fa-plus" aria-hidden="true"></i>
</button>
           </center>
          

           </div>
           </div>
           </div>
           <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center>Primary Care Plan </center> 
            </div>
            <div class="card-body cardscroll">
              <div class="row smallfont">
              <div class="col-md-12">Main Care Plan   
                <a href="<?=base_url()?>admin/participant/careprofile/<?=$i['id']?>" >
              <i class="fa fa-eye smallfont"></i></a>
            </div>
            <?php 

if($primary_care_plan['valid_till']!='')
{
?>
              <div class="col-md-12"> Valid Till <?=@$primary_care_plan['valid_till']?></div>
 
 <?php } ?>
            </div>
            <hr>
            <div class="row smallfont">
              <div class="col-md-12">Goals    
                <!-- <a title='add new Goals' href="<?=base_url()?>admin/participant/goals/<?=$i['id']?>" >
              <i class="fa fa-plus smallfont"></i></a>

               -->
              <a href="<?=base_url()?>admin/participant/goals/<?=$i['id']?>" >
              <i  title='add new goal ,view & edit allready added goals' class="fa fa-eye smallfont"></i></a>
            </div>
            </div>
          
          </div>
           </div>
           </div>
           <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center>Risk Assessments </center> 
            </div>
            <div class="card-body cardscroll">
            
            <?php foreach($riskassessments as $t) {?>
            <div class="row smallfont">
              <div class="col-md-12"><?=$t['hazard_identified']?>
            
             
              <a title='view & edit' href="<?=base_url()?>admin/participant/editriskassessments/<?=$t['id']?>" >
              <i class="fa fa-eye smallfont"></i></a>



              
              <a  onclick="return confirm('Are you sure, you want to delete it?')" title='delete' href="<?=base_url()?>admin/participant/deleteriskassessments/<?=$t['id']?>" >
              <i class="fa fa-trash smallfont"></i></a>
            </div>
              <div class="col-md-12">Valid Till  <?=$t['date_of_reassesment']?>
            </div>
            </div>
            <hr>
            <?php } ?>  

            <center>
  <button class="buttonsmallfont"  onclick="document.location='<?=base_url()?>admin/participant/addriskassessments/<?=$i['id']?>'">Add Risk Assessments<i class="fa fa-plus" aria-hidden="true"></i>
</button>
           </center>
            
           </div>
           </div>
           </div>
           <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center> Active Charts</center> 
            </div>
            <div class="card-body cardscroll">
              <div class="row">
              <div class="col-md-12"></div>
              <div class="col-md-12"></div>
            </div>
           </div>
           </div>
           </div>
           <div class="col-md-2">
            <div class="card card-default color-palette-bo">
            <div class="card-header">
            <center>Active Incidents </center> 
            </div>
            <div class="card-body cardscroll">
            <?php 
            $riskassessments=select('incident',array('user_id'=>$i['id']));
            foreach($riskassessments as $t) {?>
            <div class="row smallfont">
              <div class="col-md-12"><?=$this->db->get_where('incident_select',array('id'=>$t['incident_type']))->row()->name?>
            
             
              <a title='view & edit' href="<?=base_url()?>admin/participant/editincident/<?=$t['id']?>" >
              <i class="fa fa-eye smallfont"></i></a>
            
            </div>
              <div class="col-md-12">Date of Incident:- <?=$t['date']?>
            </div>
            </div>
            <hr>  
            <?php } ?>
         



            <center>
  <button class="buttonsmallfont"  onclick="document.location='<?=base_url()?>admin/participant/addincident/<?=$i['id']?>'">Add Incident Report<i class="fa fa-plus" aria-hidden="true"></i>
</button>
           </center>

           </div>
           </div>
           </div>
        

        
        
        
        
        
        
        
        
        
        </div>
        </div>
        
    </div>
        
    </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>

