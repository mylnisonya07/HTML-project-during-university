<?php
include '../../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk= '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
	$datakategori[] = $tiap;
}

///////////
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

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Produk</title>
  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">
</head>

<body style="background-color: white;">
	<!-- yang aku tambahin -->
	<div class="all">
		<div class="judul">
			<h2><b>Ubah Produk</b></h2>
		</div>
		<div class="image">
			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
		</div>
		<br>
		<br>
			<div class="container container2">
				<br>
				<div class="container-fluid">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control" name="id_kategori">
								<option value="">Pilih Kategori</option>
								<?php foreach ($datakategori as $key => $value): ?>

								<option value="<?php echo $value["id_kategori"] ?>" <?php if ($pecah["id_kategori"]==$value["id_kategori"]){echo "selected"; } ?> >
									<?php echo $value["nama_kategori"] ?>

								</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Harga Produk (Rp)</label>
							<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
						</div>
						<div class="form-group">
							<label>Stok Produk</label>
							<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
						</div>
						<br>
						<label><b>Gambar Produk Utama</b></label>
						<div class="form-group">
							<img src="../gambar_produk/<?php echo $pecah['gambar_produk']; ?>" width="200">
						</div>
						<br>
						<label><b>Gambar Produk Lainnya</b></label>
						<!-- <div class="row"> -->
					      <?php foreach ($fotoproduk as $key => $value): ?>
					      <div class="col-md-3 text-center">
					        <img src="../gambar_produk/<?php echo $value["nama_produk_foto"] ?>" alt="" class="container-fluid"><br>
									<br>
					        <a href="hapusfotoproduk.php?halaman=hapusfotoproduk&idfoto=<?php echo $value["id_produk_foto"] ?>&idproduk=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
					      </div>
					      <?php endforeach ?>
					    <!-- </div> -->
					    
						<div class="form-group" style="position: relative; top:27px">
							<label>Ubah Gambar Produk</label>
							<input type="file" name="gambar" class="form-control">
						</div>
						<br><br>
						<div class="form-group">
								<label style="color: #ffff; font-size: 16px;"> Tambahkan Foto Produk</label>
									<input type="file" class="form-control" name="produk_foto">
								<button class="btn btn-primary" name="simpan" value="simpan" style="align : right;
								flex: 1 1 auto;
								display: inline-block;
								font-weight: bold;
								font-size: 14px;
								background-color: #F9D701;
								color: black;">Tambah</button>
						</div>
							<?php
							if (isset($_POST["simpan"])) {
								$lokasifoto = $_FILES["produk_foto"]["tmp_name"];
								$namafoto = $_FILES["produk_foto"]["name"];

								$namafoto = date("YmdHis").$namafoto;

								//upload
								move_uploaded_file($lokasifoto, "../gambar_produk/".$namafoto);

								$koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) VALUES ('$id_produk', '$namafoto') ");

								echo "<script>alert('foto produk berhasil disimpan');</script>";
								echo "<script>location='ubahproduk.php?halaman=ubahproduk&id=$id_produk';</script>";
							}
							?>
							<br>
						<div class="form-group">
					    <label>Deskripsi Produk</label>
					        <textarea  class="form-control" name="deskripsi" rows="10" value="<?php echo $pecah['deskripsi_produk'];?>"></textarea>
					  </div>
					    <br>

					    <a href="produk.php" class="btn btn-primary btn-ubah">Batal</a>
							<button class="btn btn-primary btn-ubah" name="ubah"> Ubah </button>						

						<?php
						if (isset($_POST['ubah']))
						{
						 	$namagambar = $_FILES['gambar']['name'];
						 	$lokasigambar = $_FILES['gambar']['tmp_name'];
						 	//jk gambar berubah
						 	if (!empty($lokasigambar)) {

						 		move_uploaded_file($lokasigambar, "../gambar_produk/".$namagambar);
						 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]', gambar_produk='$namagambar', deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
						 	}
						 	else
						 	{
						 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',  deskripsi_produk='$_POST[deskripsi]', id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
						 	}

						 	echo "<script>alert('data produk telah diubah');</script>";
						 	echo "<script>location='produk.php?halaman=produk';</script>";
						}
						?>
					</form>
				</div>
				<br>

			</div>

	</div>
	<br>
	<br>
	<!-- sampe sini -->
</body>
</html>
