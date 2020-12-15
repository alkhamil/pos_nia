<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $title ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css?n=a') ?>" rel="stylesheet">
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    
    <!-- Page level plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css');?>">
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/daterangepicker/moment.min.js')?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/daterangepicker/daterangepicker.css')?>" />
    <script type="text/javascript" src="<?= base_url('assets/vendor/daterangepicker/daterangepicker.min.js')?>"></script>

    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/select2.min.css?n=1')?>" />
    <script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js')?>"></script>

    <link rel="stylesheet" href="<?= base_url('assets/vendor/toasts/iziToast.css')?>" />
    <script type="text/javascript" src="<?= base_url('assets/vendor/toasts/iziToast.js')?>"></script>

    
    <script src="<?= base_url('assets/vendor/swal/sweetalert2@10.js') ?>"></script>

    <script>
        function showLoad(){
            $('.content').css('opacity', 0.6);
            $('.load').addClass('loader');
        }
        function hideLoad(){
            $('.content').removeAttr('style');
            $('.load').removeClass('loader');
        }
        function scrollUp(elm){
            $([document.documentElement, document.body]).animate({
                scrollTop: $(elm).offset().top
            }, 1000);
        }
    </script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">POS-NIA</div>
    </a>

    <?php  
        $uri = $this->uri->segment(1);
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($uri=='dashboard') echo 'active' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li class="nav-item <?php if($uri=='tahun_ajaran' || $uri=='attribute' || $uri=='lembaga' || $uri=='siswa') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
            aria-expanded="true" aria-controls="collapseDataMaster">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseDataMaster" class="collapse <?php if($uri=='tahun_ajaran' || $uri=='attribute' || $uri=='lembaga' || $uri=='siswa') echo 'show' ?>" aria-labelledby="headingDataMaster"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($uri=='tahun_ajaran') echo 'active' ?>" href="<?= base_url('tahun_ajaran') ?>">Tahun Ajaran</a>
                <a class="collapse-item <?php if($uri=='attribute') echo 'active' ?>" href="<?= base_url('attribute') ?>">Attribute</a>
                <a class="collapse-item <?php if($uri=='lembaga') echo 'active' ?>" href="<?= base_url('lembaga') ?>">Lembaga</a>
                <a class="collapse-item <?php if($uri=='siswa') echo 'active' ?>" href="<?= base_url('siswa') ?>">Siswa</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?php if($uri=='biaya_lembaga') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataTransaksi"
            aria-expanded="true" aria-controls="collapseDataTransaksi">
            <i class="fas fa-fw fa-exchange-alt"></i>
            <span>Data Transaksi</span>
        </a>
        <div id="collapseDataTransaksi" class="collapse <?php if($uri=='biaya_lembaga') echo 'show' ?>" aria-labelledby="headingDataTransaksi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($uri=='biaya_lembaga') echo 'active' ?>" href="<?= base_url('biaya_lembaga') ?>">Biaya Lembaga</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?php if($uri=='user') echo 'active' ?>">
        <a class="nav-link" href="<?= base_url('user') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>User</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
<div id="content">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_profile.svg') ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
