<?php
//koneksi ke database
include 'koneksi.php';

$keyword=$_GET["kat"];

$semuadata=array();
$ambil = $koneksi-> query("SELECT * FROM produk WHERE id_kategori='$_GET[kat]'");
while($pecah = $ambil->fetch_assoc()){
  $semuadata[]=$pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pencarian Kategori</title>
    <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/berandapelanggan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
  </head>
  <body>
  <?php include 'menu.php'; ?>
    <div class="container">
      <br>
      <h3>Pencarian Produk : </h3>
      <br>

      <?php if (empty($semuadata)): ?>
        <div class="alert alert-danger">Produk tidak ditemukan</div>
      <?php endif ?>

      <div class="row justify-content-center">

        <?php foreach ($semuadata as $key => $value): ?>

        <div class="col-md-3">
            <div class="card shadow" style="width: 20rem;">
              <div class="inner">
                <img src="admin/gambar_produk/<?php echo $value["gambar_produk"] ?>" alt="" class="card-img-top">
              </div>

              <div class="card-body">
                <h5 class="card-title"><?php echo $value["nama_produk"] ?></h5>
                <h4>Rp. <?php echo number_format($value['harga_produk']) ?></h4>
                <br>
                <a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Beli</a>
                <a href="detail.php?id=<?php echo $value["id_produk"];?>" class="btn btn-info">Detail</a>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </body>
</html>
