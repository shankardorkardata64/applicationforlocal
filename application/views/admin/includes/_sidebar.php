<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
$def='#36BCB1';
$col='#232626';

?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:<?=COLOUR?>">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url($this->general_settings['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: white;"><?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
     


    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li id="dashboard" class="nav-item" style="color: white;">

          <a href="<?=base_url()?>admin/dashboard" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-dashboard"></i>
            <p style="color: white;">
              Dashboard          
                    </p>
          </a>


        </li>

        
        
        <li id="care_cat" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/care_cat" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p style="color: white;">
              Care Category               <!-- 1                -->
                   </p>
          </a>

     
        </li>

        
        
        <li id="careprofile" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/careprofile" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p style="color: white;">
              Care Profile               <!-- 1                -->
                     </p>
          </a>

        </li>

        
        
        <li id="admin" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/admin" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-user-circle-o"></i>
            <p style="color: white;">
              System Users               <!-- 1                -->
                         </p>
          </a>

        </li>

        
        
        <li id="service_provider" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/service_provider" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p style="color: white;">
              Service Provider               <!-- 1                -->
                        </p>
          </a>

         
                    <!-- /sub-menu -->
        </li>

        
        
        <li id="participant" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/participant" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-users"></i>
            <p style="color: white;">
              Participant               <!-- 1                -->
                      </p>
          </a>

          <!-- sub-menu -->
                 
                    <!-- /sub-menu -->
        </li>

        
        
     


<!-------------------->

        
<li id="shift" class="nav-item has-treeview has-treeview" style="color: white;">

<a href="#" class="nav-link" style="color: white;">
  <i class="nav-icon fa fa-pie-chart"></i>
  <p style="color: white;">
    Shift Manager               <!-- 1                -->
    <i class="right fa fa-angle-left"></i>            </p>
</a>

<!-- sub-menu -->
          <ul class="nav nav-treeview" style="color: white;">

                  
      

<li class="nav-item" style="color: white;">
    <a href="<?=base_url()?>admin/shift/view" class="nav-link" style="color: white;margin-left: 28px;">
      <!--<i class="fa fa-circsle-o nav-icon"-->
      <p style="color: white;">All Shifts</p>
     <!-- Financial-index -->
    </a>
  </li>
      
      

<li class="nav-item" style="color: white;">
    <a href="<?=base_url()?>admin/shift/timesheet" class="nav-link" style="color: white;margin-left: 28px;">
      <!--<i class="fa fa-circsle-o nav-icon"-->
      <p style="color: white;">TimeSheet   </p>
     <!-- Financial-support -->
    </a>
  </li>
      
      

 
</ul>
          <!-- /sub-menu -->
</li>



















<!------------------->
        
        
        <li id="region" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/region/add" class="nav-link" style="color: white;">
          <i class="nav-icon fa fa-map"></i>
            <p style="color: white;">
              Manage Regions               <!-- 1                -->
                       </p>
          </a>

       
                    <!-- /sub-menu -->
        </li>

        
        
        <li id="admin_roles" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/admin_roles" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-book"></i>
            <p style="color: white;">
              Role &amp; Permissions               <!-- 1                -->
                     </p>
          </a>
         </li>

        
        
        <li id="Financial" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/Financial" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-pie-chart"></i>
            <p style="color: white;">
              Financial               <!-- 1                -->
              <i class="right fa fa-angle-left"></i>            </p>
          </a>

          <!-- sub-menu -->
                    <ul class="nav nav-treeview" style="color: white;">

                            
                
<!--
<li class="nav-item" style="color: white;">
              <a href="<?=base_url()?>admin/Financial/index" class="nav-link" style="color: white;margin-left: 28px;">
               
                <p style="color: white;">Allowance   </p>
              
              </a>
            </li>
                -->
                

<li class="nav-item" style="color: white;">
              <a href="<?=base_url()?>admin/Financial/support" class="nav-link" style="color: white;margin-left: 28px;">
                
                <p style="color: white;">Support Catalogue   </p>
              
              </a>
            </li>
                
                <!--

<li class="nav-item" style="color: white;">
              <a href="<?=base_url()?>admin/Financial/employeepay" class="nav-link" style="color: white;margin-left: 28px;">
              
                <p style="color: white;">Employee Pay Guide   </p>
               
              </a>
            </li>
-->           
          </ul>
                    <!-- /sub-menu -->
        </li>

        
        
     
        <li id="export" class="nav-item  has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/export" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-database"></i>
            <p style="color: white;">
              Backup &amp; Export               <!-- 1                -->
                          </p>
          </a>

          <!-- sub-menu -->
                    <!-- /sub-menu -->
        </li>

        
        
        <li id="general_settings" class="nav-item has-treeview has-treeview" style="color: white;">

          <a href="<?=base_url()?>admin/general_settings" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-cogs"></i>
            <p style="color: white;">
              Settings               <!-- 1                -->
              <i class="right fa fa-angle-left"></i>            </p>
          </a>

          <!-- sub-menu -->
                    <ul class="nav nav-treeview" style="color: white;">

                            
                










                    <li class="nav-item" style="color: white;">
              <a href="<?=base_url()?>admin/general_settings/" class="nav-link" style="color: white;margin-left: 28px;">
                <!--<i class="fa fa-circsle-o nav-icon"-->
                <p style="color: white;">General Settings   </p>
               <!-- general_settings- -->
              </a>
            </li>
                
                

<li class="nav-item" style="color: white;">
              <a href="<?=base_url()?>admin/general_settings/email_templates" class="nav-link" style="color: white;margin-left: 28px;">
                <!--<i class="fa fa-circsle-o nav-icon"-->
                <p style="color: white;">Email Template Settings   </p>
               <!-- general_settings-email_templates -->
              </a>
            </li>
           
          </ul>
                    <!-- /sub-menu -->
        </li>

        
        
      
        
      </ul>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>