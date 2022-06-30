<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($title)? $title.' - ' : 'Title -' ?> <?= get_general_settings()['application_name']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DropZone -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/dropzone/dropzone.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>

</head>

<?php 
$bg_cover='blue';
?>
<body class="hold-transition sidebar-mini <?=  (isset($bg_cover)) ? 'bg-cover' : '' ?>">

<!-- Main Wrapper Start -->
<div class="wrapper">

  <!-- Navbar -->

  <?php $navbar=true; if(!isset($navbar)): ?>

  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Languages -->
      <?php  $languages = get_language_list(); ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Languages">
          <i class="fa fa-globe"></i>
          <span class="badge badge-warning navbar-badge">
            <?php 
           $lang = ($this->session->userdata('site_lang') == '') ? get_general_settings()['default_language'] : $this->session->userdata('site_lang');
            echo get_lang_short_code($lang); 
            ?>
              
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php foreach($languages as $lang):  ?>
          <a href="<?= base_url('home/site_lang/'.$lang['id']) ?>" class="dropdown-item">
            <i class="fa fa-flag mr-2"></i> <?= $lang['name'] ?>
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach; ?>
      </li>
      <!-- Messages Dropdown Menu -->

      
      <li class="nav-item d-nonde d-sm-inline-block">
        <a href="<?= base_url('manager/profile') ?>" class="nav-link"><?= trans('profile') ?></a>
      </li>

      <li class="nav-item d-nodne d-sm-inline-block">
        <a href="<?= base_url('manager/auth/logout') ?>" class="nav-link"><?= trans('logout') ?></a>
      </li>

    </ul>
  </nav>

  <?php endif; ?>

  <!-- /.navbar -->


  <!-- Sideabr -->

  <?php

  if($this->session->userdata('sidebar')==1): ?>

  <?php $this->load->view('manager/includes/_sidebar'); ?>

  <?php endif; ?>

  <!-- / .Sideabr -->