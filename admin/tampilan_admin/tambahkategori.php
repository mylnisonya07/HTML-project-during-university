<?php
//koneksi ke database
include '../../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Kategori</title>
	<!-- icon -->
	<link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	
<div class="container">
	<br>
	<h2>Tambah Kategori</h2>
	<form method="post">
		<div class="form-group">
			<label>Nama Kategori</label>
			<input type="text" class="form-control" name="nama_kategori">
		</div>
		<br>
		<button class="btn btn-primary" name="save">Simpan</button>
	</form>
</div>

<?php
if (isset($_POST['save']))
 {
 	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$_POST[nama_kategori]')");

 	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	echo "<script>location='kategori.php?halaman=produk';</script>";
 } 
?>

</body>
</html>