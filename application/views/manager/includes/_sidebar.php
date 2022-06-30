<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  

?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin'); ?>" class="brand-link">
    <img src="<?= base_url(get_general_settings()['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?=get_general_settings()['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
      <div class="info">
        <a href="#" class="d-block" style="color: white;"><?= ucwords($this->session->userdata('name')); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li id=''  class="nav-item has-treeview" style="color: white;">
        <a href="<?= base_url('manager/dashboard') ?>" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-dashboard"></i>
            <p style="color: white;">Dashboard
            </p>
          </a> 
      </li>
    
      <li id=''  class="nav-item has-treeview" style="color: white;">
        <a href="<?= base_url('manager/participant') ?>" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-users"></i>
            <p style="color: white;">Participant
            </p>
          </a> 
      </li>
    
      
      <li id=''  class="nav-item has-treeview" style="color: white;">
        <a href="<?= base_url('manager/logout') ?>" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-users"></i>
            <p style="color: white;">logout
            </p>
          </a> 
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