<?php
session_start();
//koneksi ke database
include '../../koneksi.php';
include 'helper.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Grafik Produk</title>

  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">

  <style>
    canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
 }
  </style>
</head>

<body>

  <div class="all">
    <div class="header">
      <h2><b>Stok Penjualan</b></h2>
    </div>
    <div class="image">
      <img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
    </div>
    <br>
    <br>
    <div class="container container2">
      <div class="container-fluid" align="center">
        <form method="post" enctype="multipart/form-data">
          <table class="table" style="border-color: black;">
            <h2 align="center">Grafik stok penjualan produk terbanyak</h2>
            <div style="width: 1000px; height: 500px; " class="chart">
              <canvas id="chartKu" style="background-color:antiquewhite " ></canvas>
              <?php
              include "../../koneksi.php";

              $response = array();

              $result = mysqli_query(
                $koneksi,
                "select id_pembelian_produk, nama, MAX(jumlah) 'total' FROM pembelian_produk GROUP BY nama;"
              );
              foreach ($result as $key) {
                // $key = mysqli_fetch_assoc($result);
                $data['nama'] = $key["nama"];
                $data['total'] = $key["total"];
                array_push($response, $data);
              }
              $dataProduk = "";
              foreach ($response as $data) {
                $dataProduk .= "\"" . $data["nama"] . "\"";
                $dataProduk .= ",";
              }

              $dataTotal = "";
              foreach ($response as $data) {
                $dataTotal .= $data["total"];
                $dataTotal .= ",";
              }
              buatChart("chartKu", $dataProduk, $dataTotal, "bar");

              ?>

            </div>


            <!-- Data untuk tabel -->
            <table border="1" class="table table-hover " style="border: 5px solid #253D93; ">
              <thead>
                <tr align="center">
                  <th>Nomer</th>
                  <th>ID pembelian barang</th>
                  <th>Nama Barang</th>
                  <th>Penjualan Terbanyak</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $kon = mysqli_connect("localhost", "root", "", "buyme");
                $nama_produk = "";
                $jumlah = null;
                $bulan = null;
                $nomor = 1;
                $sql = "select id_pembelian_produk, nama, MAX(jumlah) 'total' FROM pembelian_produk GROUP BY nama;";
                $hasil = mysqli_query($kon, $sql);
                while ($data = mysqli_fetch_array($hasil)) {
                  //Mengambil nilai jurusan dari database
                  $id = $data['id_pembelian_produk'];
                  $ed = "'$id'" . ", ";
                  //Mengambil nilai jurusan dari database
                  $produk = $data['nama'];
                  $nama_produk .= "'$produk'" . ", ";
                  //Mengambil nilai total dari database
                  $jum = $data['total'];
                  $jumlah .= "$jum" . ", ";
                ?>
                  <tr align="center">
                    <td><?php echo  $nomor++; ?></td>
                    <td><?php echo  $id; ?></td>
                    <td><?php echo  $produk; ?></td>
                    <td><?php echo $jum; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>


            <script>

            </script>
          </table>

          <br></br>
          <a href="laporan_pembelian.php" class="btn btn-primary" style="color: black; background-color: #F9D701; border: 4px solid #F9D701; border-radius: 0.6em;"><b>Kembali</b></a>

      </div>
      <!-- Optional JS -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
      <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
      <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
      <script src="../../admin/coba.php"></script>
      <br>
      <br>
    </div>
  </div>
</body>

</html>