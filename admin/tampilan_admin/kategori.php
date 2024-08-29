<?php
session_start();
//koneksi ke database
include '../../koneksi.php';
include 'session.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kategori</title>
  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css"> -->
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
              <h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="beranda.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kategori</li>
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
              <h3 class="mb-0">Kategori</h3>
            </div>
            <body>
            	<!-- yang aku tambahin -->
            <div class="all">
              <!-- <div class="header">
          				<h2 style="position: relative; left: 30px;">Tambah Produk</h2>
          		</div> -->
            	<div class="container container2"  >
            		<form method="post">
            			<div class="form-group" >
                    <table >
                      <tr>
                        <br>
                        <label><b>Masukkan Kategori</b></label>
                        <td>
                          <input type="text" class="form-control" name="nama_kategori" style="width: 1000px">
                        </td>
                        <td>
                          <button class="btn btn-info " name="save" style="position: relative; left: 30px; width: 100px;">Tambah</button></a>
                        </td>
                      </tr>
                    </table>
            			</div>
            		</form>
                <?php
                if (isset($_POST['save']))
                 {
                 	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$_POST[nama_kategori]')");

                 	echo "<div class='alert alert-info'>Data tersimpan</div>";
                 	echo "<script>location='kategori.php?halaman=produk';</script>";
                 }
                ?>

                <?php
                $ambil = $koneksi-> query("SELECT*FROM kategori");
                while ($tiap = $ambil->fetch_assoc())
                {
                  $semuadata[] = $tiap;
                }
                 ?>

                <div class="card-body">
                  <div class="row icon-examples">
                    <table class="table table-hover " style="border: 5px solid #253D93; ">
                      <thead>
                        <tr class="bg-primary"  style="color: white; ">
                          <th><b>No</b></th>
                          <td><b>Kategori</b></td>
                          <td><b>Aksi</b></td>
                        </tr>
                      </thead>
                      <tbody>
                      <!-- yang aku ubah -->
                        <?php $nomor=1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
                        <?php while($pecah = $ambil->fetch_assoc()){ ?>
                          <tr>
                            <td><?php echo $nomor; ?></td>
                            <td>
                              <?php echo $pecah['nama_kategori'];?></td>
                            <td>
                              <a href="hapuskategori.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori']; ?>">
                                <span class="btn btn-danger" style="width: 100px;"><b>Hapus</b></span>
                              </a>
                            </td>
                          </tr>
                          <?php $nomor++; ?>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

            	</div>
            </div>
            <!-- sampe sini -->

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
