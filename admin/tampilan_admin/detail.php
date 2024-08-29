<?php
//koneksi ke database
include '../../koneksi.php';
?>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php //print_r($detail); ?></pre> -->

<!DOCTYPE html>
<html>
<head>
	<title>Detail Pembelian</title>
  <!-- icon -->
  <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">
</head>
<body>

</body>
</html>
	<div class="all">
  		<div class="header">
  				<h2><b>Detail Pembelian</b></h2>
  		</div>
  		<div class="image">
  			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
  		</div>
  		<br>
  		<br>
    <div class="container">
      <div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<br>
						<h3>Pembelian</h3>
						<p>
							Tanggal: <?php echo $detail['tanggal_pembelian'];?><br>
							Total: Rp. <?php echo number_format($detail['total_pembelian']);?> <br>
							Status: <?php echo $detail['status_pembelian'];?>
						</p>
					</div>
					<div class="col-md-4">
						<br>
						<h3>Pelanggan</h3>
						<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
						<p>
							<?php echo $detail['telepon_pelanggan'];?><br>
							<?php echo $detail['email_pelanggan'];?>
						</p>
					</div>
					<div class="col-md-4">
						<br>
						<h3>Pengiriman</h3>
						<strong><?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?></strong><br>
			        Ongkos kirim: Rp. <?= number_format($detail['ongkir']); ?>,-<br>
			        Ekspedisi: <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
			        Alamat Lengkap: <?= $detail['alamat_pengiriman']; ?>
					</div>

				</div>
				<br>
				
				<table class="table table-bordered" style="border: 8px solid #253D93; " align="center" class="table table-bordered">
					<thead style="background-color: #253D93; border: #253D93 " align="center">
						<tr style="color: #ffff">
							<th>No</th>
							<th>Nama Produk</th>
							<th>Harga Produk</th>
							<th>Jumlah Produk</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody style="border: 5px solid #253D93; background-color: #ffff" align="center">
						<?php $nomor=1; ?>
						<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
						<?php while ($pecah=$ambil->fetch_assoc()) { ?>
						<tr style="border: 5px solid #253D93">
							<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93; color: black;"><?php echo $nomor; ?></td>
							<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93; color: black;"><?php echo $pecah['nama_produk']; ?></td>
							<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93; color: black;">Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
							<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93; color: black;"><?php echo $pecah['jumlah']; ?></td>
							<td style="border-right: 5px solid #253D93; border-bottom: 5px solid #253D93; color: black;">
								Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
							</td>
						</tr>
						<?php $nomor++; ?>
					    <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
</div>
