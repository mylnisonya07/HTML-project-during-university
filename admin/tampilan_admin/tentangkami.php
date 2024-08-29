<?php
//koneksi ke database
include '../../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tentang Kami</title>
  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

  <!-- <link rel="stylesheet" href="../../css/sidebar.css" type="text/css"> -->
</head>

<body>
  <!-- Sidenav -->
  <?php include 'side-bar.php' ?>
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
              <h6 class="h2 text-white d-inline-block mb-0">Beranda</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="beranda.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
              <h3 class="mb-0">Tentang C’mon Go Shopping</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples" class="table table-hover">
                <!-- untuk home beranda new-->
                <div class="container">
                  <div class="wrapper">
                    <section id="home">
                      <table >
                        <tr>
                          <td>
                             <div class="kolom">
                            <p class="deskripsi" align="justify"><b>C’mon Go Shopping berupa aplikasi sistem informasi jual beli produk UKM berbasis web merupakan aplikasi yang memiliki tujuan untuk menciptakan media yang dapat memperkenalkan produk-produk UKM,dan memberikan layanan informasi bagi admin dan pembeli mengenai produk UKM dan hasil penjualan dari transaksi tersebut. Sistem informasi manajemen ini dibentuk untuk memenuhi tugas akhir dari matakuliah Sistem Informasi Jurusan Informatika, Fakultas Teknologi Informasi, Universitas Islam Indonesia.</b></p>
                            <br>
                            <h3 align="center"> <i>Tim Pengembang C’mon Go Shopping</i>
                              <br></br>
                              <div class="container-fluid">
                                <table class="table">
                                  <tr align="center">
                                    <!-- <td>
                                      <div class="card" style="width: 10rem;">
                                        <img src="../../image_buyme/indah.png" class="card-img-top">
                                        <div class="card-body">
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; top: 5px;"><b>20523108</b></p>
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; bottom: 6px;"><b>Indah Rahma Ilmiana</b></p>
                                        </div>
                                      </div>
                                    </td> -->
                                    <td>
                                      <div class="card" style="width: 10rem;">
                                        <img src="../../image_buyme/mayla.jpg" class="card-img-top">
                                        <div class="card-body">
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; top: 5px;"><b>20523241</b></p>
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; bottom: 6px;"><b>Mayla Ayyuni Sonya</b></p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="card" style="width: 10rem;">
                                        <img src="../../image_buyme/faridah.jpg" class="card-img-top">
                                        <div class="card-body">
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; top: 5px;"><b>20523144</b></p>
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; bottom: 6px;"><b>Faridah Amaliyah</b></p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="card" style="width: 10rem;">
                                        <img src="../../image_buyme/riri.jpg" class="card-img-top">
                                        <div class="card-body">
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; top: 5px;"><b>20523027</b></p>
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; bottom: 6px;"><b>Febrianty Ayu Puspitasari</b></p>
                                        </div>
                                      </div>
                                    <!-- </td>
                                    <td>
                                      <div class="card" style="width: 10rem;">
                                        <img src="../../image_buyme/dinda.jpg" class="card-img-top">
                                        <div class="card-body">
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; top: 5px;"><b>20523086</b></p>
                                          <p class="card-text" align="center" style="font-size: 12px; position: relative; bottom: 6px;"><b>Annisa Dinda Septina</b></p>
                                        </div>
                                      </div>
                                    </td> -->
                                  </tr>
                                </table>
                              </div>

                            </h3>
                            <p><b>
                              Sponsor : Program Studi Informatika, Universitas Islam Indonesia
                              HENDRIK, M.Eng.
                            </b></p>
                            <br>
                            <p>
                              <a href="beranda.php" class="btn btn-primary" style="background-color: #253D93; border: 4px solid #253D93 ; border-radius: 0.6em;" ><b>Kembali</b></a>

                            </p>
                            </div>
                          </td>

                        </tr>
                      </table>
                    </section>
                  </div>
                </div>
              </div>
          </div>
      </div>

    <!-- Footer -->
    <?php include 'footer.php' ?>

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
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
