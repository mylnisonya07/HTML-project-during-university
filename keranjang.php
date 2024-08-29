<?php
session_start();

//koneksi ke database
include 'koneksi.php';

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('keranjang kosong, silahkan belanja dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>

<!-- NavBar -->
<?php include 'menu.php'; ?>

<br>
<section class="konten">
	<div class="container">
	<div class="container" style="background-color: white; border-radius: 15px;">
		<div align="center">
			<br>
		<h1><strong>KERANJANG</strong></h1>
	</div>
	<br>
		<table class="table table-bordered" style="border: 8px solid #253D93;">
			<thead style="background-color: #253D93; color:white; text-align: center;">
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody style="background-color: white; border: 8px solid #253D93;  color: black; text-align: center;">
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;
				?>
				<tr>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $nomor; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $pecah["nama_produk"]; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;">Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $jumlah; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;">Rp. <?php echo number_format($subharga); ?></td>
					<td style="border-bottom: 3px solid #253D93;">
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs" style="background-color: #FF0000;">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>

		<div align="right">
			<a href="index.php" class="btn btn-info" style="align-items: right;"><b>Lanjutkan Belanja</b></a>
			<a href="checkout.php" class="btn btn-primary" style="background-color: #253D93; align-items: right; color: white;"><b>Checkout</b></a>
		</div>
		<br>
	</div>
</div>
</section>

</body>
</html>
