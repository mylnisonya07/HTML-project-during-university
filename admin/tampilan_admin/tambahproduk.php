<?php
//koneksi ke database
include '../../koneksi.php';

$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
	$datakategori[] = $tiap;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Produk</title>
  	<!-- icon -->
  	<link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">
	<!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
</head>
<body>
	<!-- aku tambahin -->
	<div class="all">
		<div class="header">
			<h2><b>Tambah Produk</b></h2>
		</div>
		<div class="image">
			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
		</div>
		<br>
		<br>
		<div class="container container2">
			<br>
			<!-- <h2>Tambah Produk</h2> -->
			<div class="container-fluid">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="id_kategori">
							<option value="">Pilih Kategori</option>
							<?php foreach ($datakategori as $key => $value): ?>
							<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Harga Produk (Rp)</label>
						<input type="number" class="form-control" name="harga">
					</div>
					<div class="form-group">
						<label>Berat (gr)</label>
						<input type="number" name="berat" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok Produk</label>
						<input type="number" class="form-control" name="stok">
					</div>
					<div class="form-group">
						<label>Gambar Produk</label>
						<div class="letak-input" style="margin-bottom: 10px;">
							<input type="file" class="form-control" name="gambar[]">
						</div>
						<span class ="btn btn-primary btn-tambah">
							<i class="plus"><strong>+</strong></i>
						</span>
					</div>
					<div class="form-group">
						<label>Deskripsi Produk</label>
						<textarea class="form-control" name="deskripsi" rows="10"></textarea>
					</div>
					<br>
					<button class="btn btn-primary btn-simpan" name="save">Simpan</button>
					<br>
					<br>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<!-- sampe sini -->

<?php
if (isset($_POST['save']))
 {
 	$namanamafoto = $_FILES['gambar']['name'];
 	$lokasilokasifoto = $_FILES['gambar']['tmp_name'];
 	move_uploaded_file($lokasilokasifoto[0], "../gambar_produk/".$namanamafoto[0]);
 	$koneksi->query("INSERT INTO produk (nama_produk, harga_produk,berat_produk, stok_produk, gambar_produk, deskripsi_produk, id_kategori)
 		VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]', '$_POST[stok]', '$namanamafoto[0]', '$_POST[deskripsi]', '$_POST[id_kategori]')");

 	//mendapatkan id_produk barusan
	$id_produk_barusan = $koneksi->insert_id;

	foreach($namanamafoto as $key => $tiap_nama) {
		$tiap_lokasi = $lokasilokasifoto[$key];
		move_uploaded_file($tiap_lokasi, "../gambar_produk/" .$tiap_nama);

		//simpan ke mysql (tapi kita perlu tau id_produknya berapa
		$koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
			VALUES ('$id_produk_barusan','$tiap_nama')");
		}

 	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	// echo "<meta http.equiv='refresh' content='1;url=index.php?halaman=produk'>";
 	echo "<script>location='produk.php?halaman=produk';</script>";
 }
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click", function(){
			$(".letak-input").append("<input type='file' class='form-control' name='gambar[]'>");
		})
	})
</script>

</body>
</html>
