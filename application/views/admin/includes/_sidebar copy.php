<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
        <?php 
          $menu = get_sidebar_menu(); 

          foreach ($menu as $nav):

            $sub_menu = get_sidebar_sub_menu($nav['module_id']);

            $has_submenu = (count($sub_menu) > 0) ? true : false;
            $sess1=($this->session->userdata('module_access1'));
            //  '<pre>';
            //  print_r($sess1['shift']['view']);
            // echo '</pre>'; 
        ?>

        <li id="<?= ($nav['controller_name']) ?>" class="nav-item <?= ($has_submenu) ? 'has-treeview' : '' ?> has-treeview" style="color: white;">

          <a href="<?= base_url('admin/'.$nav['controller_name']) ?>" class="nav-link" style="color: white;">
            <i class="nav-icon fa <?= $nav['fa_icon'] ?>"></i>
            <p style="color: white;">
              <?= trans($nav['module_name']) ?>
               <!-- <?=$this->rbac->check_module_permission($nav['controller_name'])?>
                -->
              <?= ($has_submenu) ? '<i class="right fa fa-angle-left"></i>' : '' ?>
            </p>
          </a>

          <!-- sub-menu -->
          <?php 
            if($has_submenu): 
          ?>
          <ul class="nav nav-treeview" style="color: white;">

            <?php foreach($sub_menu as $sub_nav): ?>
                
                <?php
                if($this->session->userdata('is_supper'))
                {
                   ?>


<li class="nav-item" style="color: white;">
              <a href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>" class="nav-link" style="color: white;margin-left: 28px;" >
                <!<i class="fa fa-circsle-o nav-icon"></i>
                <p style="color: white;"><?= trans($sub_nav['name']) ?> <?=@$sess[$nav['controller_name']][$sub_nav['link']]?>  </p>
               <!-- <?=$nav['controller_name'].'-'.$sub_nav['link']?> -->
              </a>
            </li>
<?php 
                }else
                {
                  if(isset($sess1[$nav['controller_name']][$sub_nav['link']]) AND $sess1[$nav['controller_name']][$sub_nav['link']]==1)
                {
                 ?>
   

            <li class="nav-item" style="color: white;">
              <a href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>" class="nav-link" style="color: white;margin-left: 28px;" >
                <!<i class="fa fa-circsle-o nav-icon"></i>
                <p style="color: white;"><?= trans($sub_nav['name']) ?> <?=@$sess[$nav['controller_name']][$sub_nav['link']]?>  </p>
               <!-- <?=$nav['controller_name'].'-'.$sub_nav['link']?> -->
              </a>
            </li>
 
            <?php  }  } 
          
          endforeach; ?>
           
          </ul>
          <?php endif; ?>
          <!-- /sub-menu -->
        </li>

        <?php //endif; ?>

        <?php 
       endforeach; ?>

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