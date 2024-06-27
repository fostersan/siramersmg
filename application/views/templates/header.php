<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRAME - RSMG | <?php echo $page_title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/morris.js/morris.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link href="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte3/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/adminlte3/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <!-- </form> -->

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-users mr-2"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Hai, Admin!</span>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item">
              Keluar
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="http://localhost/siramersmg/dashboard" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/adminlte3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>SIRAME</b>RSMG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo site_url('users') ?>" class="nav-link">
                    <i class="fas fa-user-plus"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url('supplier') ?>" class="nav-link">
                    <i class="far fa-user"></i>
                    <p>Supplier</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url('kategori') ?>" class="nav-link">
                    <i class="far fa-star"></i>
                    <p>Kategori Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url('satuan') ?>" class="nav-link">
                    <i class="far fa-circle"></i>
                    <p>satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url('barang') ?>" class="nav-link">
                    <i class="far fa-copy"></i>
                    <p>Barang Medis</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo site_url('barangmasuk') ?>" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                    <p>Barang Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url('barangkeluar') ?>" class="nav-link">
                    <i class="fas fa-angle-left"></i>
                    <p>Barang Keluar</p>
                  </a>
                </li>
              </ul>
            <li class="nav-item">
              <a href="<?php echo site_url('peramalan') ?>" class="nav-link">
                <p>
                  Peramalan
                </p>
              </a>
            </li>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js";></script>
  <script type="text/javascript">
    var last = 0;
    function{
      var url = '<?php base_url() ?>dashboard/ceknotif?last='+last;
      $.get(url, {}, function(resp){
        if(resp.result != false){
          $("#notif").html(resp.result);
          last=resp.last;
        }
        setTimeout("check()", 2000);
      }, 'json');
    }
    $(document).ready(function(){
      check();
    });
  </script> -->