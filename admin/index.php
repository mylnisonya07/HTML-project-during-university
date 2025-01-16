<?php
session_start();
//koneksi ke database
include '../koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if(!isset($_SESSION["admin"])){
  // Diarahkan ke ke login.php
  echo "<script>alert('Silahkan login!')</script>";
  echo "<script>location='tampilan_admin/login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BuyMe</title>
  <!-- icon -->
  <link rel="icon" href="../image_buyme/logo buyme.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>

  <link rel="stylesheet" href="../../css/sidebar.css" type="text/css">

</head>

<body>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../image_buyme/logo buyme.png" alt="" width="40" height="100"><strong>BuyMe</strong>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/beranda.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-shop text-black"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/kategori.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-single-copy-04 text-black"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/produk.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-planet text-black"></i>
                <span class="nav-link-text">Produk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/pembelian.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-bag-17 text-black"></i>
                <span class="nav-link-text">Pembelian</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/laporan_pembelian.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-folder-17 text-black"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampilan_admin/pelanggan.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-single-02 text-black"></i>
                <span class="nav-link-text">Pelanggan</span>
              </a>
            </li>
            <!-- jika sudah login (ada session pelanggan) -->
            <?php if (isset($_SESSION["admin"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="tampilan_admin/logout.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                  <i class="ni ni-button-power text-black"></i>
                  <span class="nav-link-text">Log Out</span>
                </a>
              </li>
            <!-- selain itu (belum login || belum ada session pelanggan) -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="tampilan_admin/login.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                  <i class="ni ni-button-power text-black"></i>
                  <span class="nav-link-text">Log In</span>
                </a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->

              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Index</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Components</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">WELCOME!</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="container">
                  <div class="form-group"><br>
                    <h1 style="font-size: 33px"><b><?php echo $_SESSION["admin"]['nama_lengkap']?></b></h1>
                    <div class="chart">
                      <canvas id="chart" class="chart-canvas" height="300"></canvas>
                    </div>
 
                  </div>
                  <br>
                </div>
          </div>
        </div>
      </div>

    <!-- Footer -->
    <footer class=" pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2021 <a href="" class="font-weight-bold ml-1">Shipuan Tim</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="" class="nav-link">Shipuan Tim</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
              <a href="https://informatics.uii.ac.id/" class="nav-link" target="_blank">Informatics UII</a>
            </li>
          </ul>
        </div>
      </div>
      <br>
    </footer>

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="../admin/assets/js/grafik.js"></script>

</body>

</html>
