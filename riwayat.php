<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Belanja</title>
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>
	<?php include 'menu.php' ; ?>

	<br>
	<!-- <pre><?php //print_r($_SESSION) ?></pre> -->
	<section>
		<div class="container" style="background-color: white; border-radius: 15px">
			<div align="center"> <br>
			<h2><b>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></b></h2>
			<br>
			<br>
			</div>
			<table class="table table-bordered" >
				<thead style="border: 5px solid  #253D93; background-color: #253D93;" align="center">
					<tr style="color: #ffff" >
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody style="border: 5px solid #253D93;" align="center">
					<?php
					$nomor=1;
					//mendapatkan id_pelanggan yg login dr session
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
					while ($pecah = $ambil->fetch_assoc()) {
					?>
					<tr style="background-color: #ffff; border: 5px solid #253D93">
						<td style="border: 5px solid #253D93"><?php echo $nomor; ?></td>
						<td style="border: 5px solid #253D93"><?php echo $pecah["tanggal_pembelian"]?></td>
						<td style="border: 5px solid #253D93"><?php echo $pecah["status_pembelian"]?>
						 	<?php
						 	if (!empty($pecah['resi_pengiriman'])): ?>
						 		Resi: <?php echo $pecah['resi_pengiriman']; ?>
						 	<?php endif ?>
						</td>
						<td style="border: 5px solid #253D93"><?php echo number_format($pecah["total_pembelian"])?></td>
						<td style="border: 5px solid #253D93">
							<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-primary" style="background-color: #253D93; color: white">Nota</a>

							<?php if ($pecah['status_pembelian']=="pending"): ?>
							<a href ="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success" >
								Input Pembayaran
							</a>
							<?php else: ?>
							<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">
								Lihat Pembayaran
							</a>
							<?php endif ?>

						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table><br>
			</div>
	</section>
</body>
</html>
