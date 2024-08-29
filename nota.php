<?php
session_start();

//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>Nota</title> -->
  <!-- icon -->
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
	<title>Nota Pembelian</title>
</head>
<body>

<!-- NavBar -->
<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<br>
		<!-- nota disini copas dari nota yang ada di admin dari file detail.php-->
		<h1 style: align="center"><b>Detail Pembelian</b></h1>
		<hr size="10">
		<br>

		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
		$detail = $ambil->fetch_assoc();
		?>

		<!-- <h1>data orang yang beli</h1>
		<pre> <?php //print_r($detail); ?></pre>

		<h1>data orang yang login</h1>
		<pre><?php //print_r($_SESSION)?></pre> -->

		<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain -->
		<!-- pelanggan yang beli harus pelanggan yang login -->
		<?php
		// mendapatkan id_pelanggan yang beli
		$idpelangganyangbeli= $detail["id_pelanggan"];

		// mendapatkan id_pelanggan yang login
		$idpelangganyanglogin= $_SESSION["pelanggan"]["id_pelanggan"];

		if ($idpelangganyangbeli!==$idpelangganyanglogin){
			echo "<script>alert('jangan nakal');</script>";
			echo "<script>location='riwayat.php';</script>";
			exit();
		}

		?>

		<div class="row" style="background-color: #ffff; border-radius: 15px"><br>
			<div class="col-md-4">
				<h3>Pembelian</h3>
				<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
				Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
				Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong><?php echo $detail['nama_pelanggan']; ?> </strong><br>
				<p>
					<?php echo $detail['telepon_pelanggan']; ?><br>
					<?php echo $detail['email_pelanggan']; ?>
				</p>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				<strong><?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?></strong><br>
        Ongkos kirim: Rp. <?= number_format($detail['ongkir']); ?>,-<br>
        Ekspedisi: <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
        Alamat Lengkap: <?= $detail['alamat_pengiriman']; ?>
			</div>
		</div><br>

		<table style="border: 8px solid #253D93; " align="center" class="table table-bordered">
			<thead style="background-color: #253D93; border: #253D93 " align="center">
				<tr style="color: #ffff">
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Berat</th>
					<th>Jumlah</th>
					<th>Subberat</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody style="border: 5px solid #253D93; background-color: #ffff" align="center">
				<?php $nomor=1; ?>
				<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
				<?php while ($pecah=$ambil->fetch_assoc()) { ?>
				<tr  style="border: 5px solid #253D93">
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;"><?php echo $nomor; ?></td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;"><?php echo $pecah['nama']; ?></td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;">Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;"><?= $pecah["berat"]; ?> gram</td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;"><?php echo $pecah['jumlah']; ?></td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;"><?= $pecah["subberat"]; ?> gram</td>
					<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93;">Rp. <?php echo number_format($pecah['subharga']); ?></td>
				</tr>
				<?php $nomor++; ?>
			    <?php } ?>
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col-md-7">
				<div class="alert alert-primary">

					<p>
						Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
						<strong>BANK MANDIRI 137-0000000-1313 an. Shipuan</strong>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>
