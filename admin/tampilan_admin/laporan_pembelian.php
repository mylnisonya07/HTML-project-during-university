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
  <title>Laporan Pembelian</title>
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

  <!-- <link rel="stylesheet" href="../../css/sidebar.css" type="text/css"> -->
</head>

<body >
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
              <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="beranda.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Laporan Pembelian</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <?php
    $semuadata=array();
    $tgl_mulai="-";
    $tgl_selesai="-";
    $status = "";
    if (isset($_POST["kirim"])) {
      $tgl_mulai = $_POST["tglm"];
      $tgl_selesai = $_POST['tgls'];
      $status = $_POST["status"];
      $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
      while ($pecah=$ambil->fetch_assoc())
      {
        $semuadata[]=$pecah;
      }

      // echo "<pre>";
      // print_r($semuadata);
      // echo "</pre>";
    }
     ?>
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h3>
              <div class="icon-examples"">
                <br></br>
                  <a href="laporan_grafik.php" class="btn btn-info">Grafik Pendapatan Penjualan</a>
                </div>
            </div>
            
            <div class="card-body">
              <div class="row icon-examples">
                <div class="container-fluid">
                  <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label style="width: 700px">Status</label>
                            <select class="form-control" name="status">
                              <option value="">Pilih Status</option>
                              <option value="Dibatalkan" <?php echo $status=="Dibatalkan"?"selected":""; ?> >Dibatalkan</option>
                              <option value="Barang Dikirim" <?php echo $status=="Barang Dikirim"?"selected":""; ?> >Barang Dikirim</option>
                              <option value="Selesai" <?php echo $status=="Selesai"?"selected":""; ?> >Selesai</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp;</label><br>
                            <button class="btn btn-primary " name="kirim" style="background-color: #253D93; border: 4px solid #253D93 ; border-radius: 0.6em; width: 100px;"  ><b>Lihat</b></button>
                        </div>
                      </div>
                    </form>
                    <table class="table table-hover" style="border: 5px solid #253D93;" >
                      <thead>
                        <tr class="bg-primary"  style="color: white; ">
                          <th><b>No</b></th>
                          <th><b>Pelanggan</b></th>
                          <th><b>Tanggal</b></th>
                          <th><b>Jumlah</b></th>
                          <th><b>Status</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total=0; ?>
                        <?php foreach ($semuadata as $key => $value): ?>
                          <?php $total+=$value['total_pembelian'] ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $value["nama_pelanggan"] ?></td>
                          <td><?php echo date("d F Y",strtotime($value["tanggal_pembelian"])) ?></td>
                          <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
                          <td><?php echo $value["status_pembelian"] ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">Total</th>
                        <th>Rp. <?php echo number_format($total); ?></th>
                        <th></th>
                      </tr>
                    </tfoot>
                   </table>
                </div>

              </div>
            </div>
          </div>

    <!-- Footer -->
    <?php include 'footer.php' ?>

      </div>
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
