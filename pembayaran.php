<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// jika tidak ada sesson pelanggan/blom login
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

//mendapatkan id_pembelian dri url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('Tidak dapat melihat');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>

	<?php include 'menu.php' ; ?>
	<br>
	<h1 align="center"><b>Konfirmasi Pembayaran</b></h1>
	<br>
	<div class="container" style="background-color: #253D93; border-radius: 15px"><br>
		<p style="color: #ffff">Kirim bukti pembayaran Anda di sini</p>
		<div class="alert alert-primary">Total Tagihan Anda <strong class="text-danger">Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data" style="color: #ffff; background-color: #253D93">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<!-- <input type="number" class="form-control" name="jumlah" min="1"> -->
				<!-- <input type="text" readonly value="<?php //echo $_SESSION["pelanggan"]['nama_pelanggan']?>" class="form-control"> -->
				<script>
					function handleMyInput(event){
						const { value, max } = event.target
						if(value >= max) alert('Max value reached');
						}
				</script>
				<input type="number" min="<?php echo $detpem["total_pembelian"] ?>" class="form-control" name="jumlah" max="<?php echo $detpem["total_pembelian"] ?>">
				<!-- <input type="number" step="100" min="0" max=<?php //$detpem["total_pembelian"] ?> id='myInput' onclick='handleMyInput(event)' /> -->
				<!-- <input type="num" min="<?php //echo ($detpem["total_pembelian"]) ?>" max="<?php //echo ($detpem["total_pembelian"]) ?>" class="form-control" name="jumlah"> -->

			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p > Foto Bukti Harus JPG, Maksimal 2MB</p>
			</div>
			<button class="btn btn-info" align="right" name="kirim"><b>Kirim</b></button>
		</form><br>
	</div>
<?php
	// jika ada tombol kirim
if (isset($_POST["kirim"])) {
	//upload bukti pembayaran
	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	//simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	//update status
	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

	echo "<script>alert('Terimakasih telah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
</body>
</html>
