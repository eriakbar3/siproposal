<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo $base_url; ?>/img/chat-search.png">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $base_url; ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="<?php echo $base_url; ?>/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/data-tables/DT_bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/jquery-multi-select/css/multi-select.css" />

    <!--bootstrap switcher-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />

    <!-- switchery-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/switchery/switchery.css" />

    <!--select 2-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/select2/css/select2.min.css"/>



    <!--right slidebar-->
    <link href="<?php echo $base_url; ?>/css/slidebars.css" rel="stylesheet">

    <!--  summernote -->
    <link href="<?php echo $base_url; ?>/assets/summernote/dist/summernote.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $base_url; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/css/style-responsive.css" rel="stylesheet" />
    <script src="<?php echo $base_url; ?>/js/jquery.js"></script>

  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="index-2.html" class="logo" >Siproposal<span>sistem</span></a>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li class="dropdown language">
                      <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">

                          <span class="username"><?php echo strtoupper($username); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="<?php echo $base_url; ?>/logout.php"> <i class="fa fa-sign-out"></i> Logout</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown start-->

              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="index.php?act=profile">
                          <i class="fa fa-bars"></i>
                          <span>Profile Setker</span>
                      </a>
                  </li>
                  <li>
                      <a href="index.php?act=ajukan-proposal">
                          <i class="fa fa-bars"></i>
                          <span>Ajukan Proposal</span>
                      </a>
                  </li>
                  <li>
                      <a href="index.php?act=proposal">
                          <i class="fa fa-bars"></i>
                          <span>Data Proposal</span>
                      </a>
                  </li>
                  <li>
                      <a href="index.php?act=data-reviewer">
                          <i class="fa fa-bars"></i>
                          <span>Data Reviewer</span>
                      </a>
                  </li>



              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
