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
    <link rel="shortcut icon" href="<?= base_url('assets/img/ico.png') ?>" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css?n=6') ?>" rel="stylesheet">
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    
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

        function formatCurrency(amount, decimalCount = 2, decimal = ",", thousands = ".") {
            try {
                decimalCount = Math.abs(decimalCount);
                decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

                const negativeSign = amount < 0 ? "-" : "";

                let i = parseInt(amount = Math.abs(Number(amount) || 0)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;

                return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands);
            } catch (e) {
                console.log(e)
            }
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
        
        <div class="sidebar-brand-text mx-3">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="" width="40">
            NIA-TRANS</div>
    </a>

    <?php  
        $segment_1 = $this->uri->segment(1);
        $segment_2 = $this->uri->segment(2);
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($segment_1=='dashboard') echo 'active' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <!-- Data Master -->
    <li class="nav-item <?php if($segment_1=='c_master') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
            aria-expanded="true" aria-controls="collapseDataMaster">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseDataMaster" class="collapse <?php if($segment_1=='c_master') echo 'show' ?>" aria-labelledby="headingDataMaster"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($segment_2=='tahun_ajaran') echo 'active' ?>" href="<?= base_url('c_master/tahun_ajaran') ?>">Tahun Ajaran</a>
                <a class="collapse-item <?php if($segment_2=='lembaga') echo 'active' ?>" href="<?= base_url('c_master/lembaga') ?>">Lembaga</a>
                <a class="collapse-item <?php if($segment_2=='siswa') echo 'active' ?>" href="<?= base_url('c_master/siswa') ?>">Siswa</a>
                <a class="collapse-item <?php if($segment_2=='kebutuhan') echo 'active' ?>" href="<?= base_url('c_master/kebutuhan') ?>">Kebutuhan</a>
            </div>
        </div>
    </li>
    <!-- Data Attribute -->
    <li class="nav-item <?php if($segment_1=='c_attribute') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataAttribute"
            aria-expanded="true" aria-controls="collapseDataAttribute">
            <i class="fas fa-fw fa-file "></i>
            <span>Data Attribute</span>
        </a>
        <div id="collapseDataAttribute" class="collapse <?php if($segment_1=='c_attribute') echo 'show' ?>" aria-labelledby="headingDataAttribute"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($segment_2=='komite') echo 'active' ?>" href="<?= base_url('c_attribute/komite') ?>">Komite</a>
                <a class="collapse-item <?php if($segment_2=='semester') echo 'active' ?>" href="<?= base_url('c_attribute/semester') ?>">Semester</a>
                <a class="collapse-item <?php if($segment_2=='lainnya') echo 'active' ?>" href="<?= base_url('c_attribute/lainnya') ?>">Lainnya</a>
            </div>
        </div>
    </li>

    <!-- Data Biaya -->
    <li class="nav-item <?php if($segment_1=='c_biaya') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataBiaya"
            aria-expanded="true" aria-controls="collapseDataBiaya">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Pengaturan Biaya</span>
        </a>
        <div id="collapseDataBiaya" class="collapse <?php if($segment_1=='c_biaya') echo 'show' ?>" aria-labelledby="headingDataBiaya"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($segment_2=='biaya_lembaga') echo 'active' ?>" href="<?= base_url('c_biaya/biaya_lembaga') ?>">Biaya Lembaga</a>
                <a class="collapse-item <?php if($segment_2=='biaya_kebutuhan') echo 'active' ?>" href="<?= base_url('c_biaya/biaya_kebutuhan') ?>">Biaya Kebutuhan</a>
            </div>
        </div>
    </li>

    <!-- Data Transaksi -->
    <li class="nav-item <?php if($segment_1=='c_transaksi') echo 'active' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
            aria-expanded="true" aria-controls="collapseTransaksi">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse <?php if($segment_1=='c_transaksi') echo 'show' ?>" aria-labelledby="headingTransaksi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($segment_2=='pembayaran') echo 'active' ?>" href="<?= base_url('c_transaksi/pembayaran') ?>">Pembayaran</a>
                <a class="collapse-item <?php if($segment_2=='pengeluaran') echo 'active' ?>" href="<?= base_url('c_transaksi/pengeluaran') ?>">Pengeluaran</a>
                <a class="collapse-item <?php if($segment_2=='riwayat') echo 'active' ?>" href="<?= base_url('c_transaksi/riwayat') ?>">Riwayat</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?php if($segment_1=='user') echo 'active' ?>">
        <a class="nav-link" href="<?= base_url('user') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

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
