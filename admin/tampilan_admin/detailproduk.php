<?php
//koneksi ke database
include '../../koneksi.php';

$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk' ");
$detailproduk = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi -> query ("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc())
{
  $fotoproduk[] = $tiap;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Detail Produk</title>
  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">
</head>
<body>
  <div class="all">
  		<div class="header">
  				<h2><b>Detail Produk</b></h2>
  		</div>
  		<div class="image">
  			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
  		</div>
  		<br>
  		<br>
    <div class="container container2">
      <div class="container-fluid">
        <form method="post" enctype="multipart/form-data">
          <table class="table" style="border-color: black;">
            <br>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Kategori</th>
              <td style="border: 3px solid #253D93; color: black;"><?php echo $detailproduk["nama_kategori"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Produk</th>
              <td style="border: 3px solid #253D93; color: black;"><?php echo $detailproduk["nama_produk"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Harga</th>
              <td style="border: 3px solid #253D93; color: black;">Rp. <?php echo number_format($detailproduk["harga_produk"]); ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Berat</th>
              <td style="border: 3px solid #253D93; color: black;"><?= $detailproduk['berat_produk']; ?> Gr</td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Stok</th>
              <td style="border: 3px solid #253D93; color: black;"><?php echo $detailproduk["stok_produk"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #253D93; color: black;">Deskripsi</th>
              <td style="border: 3px solid #253D93; color: black;"><?php echo $detailproduk["deskripsi_produk"]; ?></td>
            </tr>
            <br>
          </table>
        </form>
        <h4 style="text-align: left; color: white;"><b>Gambar Produk "<?php echo $detailproduk["nama_produk"]; ?>"</b></h4>
        <tr>
          <th><img src="../gambar_produk/<?php echo $detailproduk['gambar_produk']; ?>" width="200"></th>
        </tr>
        <div class="row" style="border: 15px solid #253D93; border-color: #253D93; ">
          <?php foreach ($fotoproduk as $key => $value): ?>
          <div class="col-md-3 text-center" style="padding: 20px; width: 30%; height: 30%">
            <img src="../gambar_produk/<?php echo $value["nama_produk_foto"] ?>" alt="" class="container-fluid"><br><br>
          </div>
          <?php endforeach ?>
        </div>
        <a href="produk.php" class="btn btn-primary" style="color: black; background-color: #F9D701; border: 4px solid #F9D701; border-radius: 0.6em;" ><b>Kembali</b></a>

      </div>
      <br>
      <br>
    </div>
  </div>
<br>
<br>
</body>
</html>
