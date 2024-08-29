<?php
session_start();
//koneksi ke database
include 'koneksi.php';

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran
  LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
  WHERE pembelian.id_pembelian='$id_pembelian'");
  $detbay = $ambil->fetch_assoc();

//jika belum ada data pembayaran
if (empty($detbay)){
  echo "<script>alert('belum ada data pembayaran')</script>";
  echo "<script>location='riwayat.php'</script>";
  exit();
}

//jika data pelanggan yang bayar tidak sesuai dengan yang login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"]){
  echo "<script>alert('anda tidak berhak melihat pembayaran orang lain')</script>";
  echo "<script>lo cation='riwayat.php'</script>";
  exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lihat Pembayaran</title>
    <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
  </head>
  <body style="background-color: #F9D701 ">
    <?php include 'menu.php' ?><br>
    <div class="container" align="center">
        <div>
          <div class="card shadow" style="width: 35rem;">
            <br><h1><b>Lihat Pembayaran</b></h1>
            <hr size="20">
            <div class="inner">
              <img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="card-img-top">
            </div>

            <div class="card-body">
              <table class="table" style="border-bottom: 5px solid #253D93; background-color: #253D93; color: white;"align="center">
              <tr>
                <th style="position: relative; left: 20px;">Nama</th>
                <th style="position: relative; left: 20px;">:</th>
                <td style="background-color: white; color: black; border: 5px solid #253D93"><?php echo $detbay["nama"] ?></td>
              </tr>
              <tr>
                <th style="position: relative; left: 20px;">Bank</th>
                <th style="position: relative; left: 20px;">:</th>
                <td style="background-color: white; color: black; border: 5px solid #253D93"><?php echo $detbay["bank"] ?></td>
              </tr>
              <tr style="background-color: #253D93">
                <th style="position: relative; left: 20px;">Tanggal</th>
                <th style="position: relative; left: 20px;">:</th>
                <td style="background-color: white; color: black; border: 5px solid #253D93"><?php echo $detbay["tanggal"] ?></td>
              </tr>
              <tr style="background-color: #253D93">
                <th style="position: relative; left: 20px;">Jumlah</th>
                <th style="position: relative; left: 20px;">:</th>
                <td style="background-color: white; color: black; border: 5px solid #253D93">Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
              </tr>
            </table>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-6" align="center">
          <table class="table" style="background-color: #253D93; color: white; "align="center">
            <tr>
              <th>Nama</th>
              <td style="background-color: white; color: #253D93; border: 5px solid #253D93"><?php echo $detbay["nama"] ?></td>
            </tr>
            <tr>
              <th>Bank</th>
              <td style="background-color: white; color: #253D93; border: 5px solid #253D93"><?php echo $detbay["bank"] ?></td>
            </tr>
            <tr style="background-color: #253D93">
              <th>Tanggal</th>
              <td style="background-color: white; color: #253D93; border: 5px solid #253D93"><?php echo $detbay["tanggal"] ?></td>
            </tr>
            <tr>
              <th style="background-color: #253D93">Jumlah</th>
              <td style="background-color: white; color: #253D93; border: 5px solid #253D93">Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
            </tr>
            <div class="image">
              <img src="../bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
            </div>
          </table>
        </div>
      </div> -->
    </div>
  </body>
</html>
