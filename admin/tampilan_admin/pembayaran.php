<?php
session_start();
include '../../koneksi.php';
include 'session.php';
//mendapatkan id pembelian
$id_pembelian = $_GET['id'];
//mengambil data pembayaran
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian=$id_pembelian");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Pembayaran</title>
	<!-- icon -->
	<link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
	<link rel="stylesheet" href="../../style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">
</head>
<body>
	<div class="all">
  		<div class="header">
  				<h2><b>Detail Pembayaran</b></h2>
  		</div>
  		<div class="image">
  			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
  		</div>
  		<br>
  		<br>
    <div class="container container2" style="width: 60rem;">
			<div class="row">
				<div class="col-md-6">
					<table class="table" style="border-color: black;">
						<br>
						<tr style="background-color: white; position: relative; left: 250px;">
							<th style="border: 3px solid #253D93; color: black;">Nama</th>
							<td style="border: 3px solid #253D93; color: black;"><?php echo $detail['nama'] ?></td>
						</tr>
						<tr style="background-color: white; position: relative; left: 250px;">
							<th style="border: 3px solid #253D93; color: black;">Bank</th>
							<td style="border: 3px solid #253D93; color: black;"><?php echo $detail['bank'] ?></td>
						</tr>
						<tr style="background-color: white; position: relative; left: 250px;">
							<th style="border: 3px solid #253D93; color: black;">Jumlah</th>
							<td style="border: 3px solid #253D93; color: black;">Rp. <?php echo number_format($detail['jumlah']) ?></td>
						</tr>
						<tr style="background-color: white; position: relative; left: 250px;">
							<th style="border: 3px solid #253D93; color: black;">Tanggal</th>
							<td style="border: 3px solid #253D93; color: black;"><?php echo $detail['tanggal'] ?></td>
						</tr>
					</table>
					<div class="image" style="position: relative; left: 250px;">
						<img src="../../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="container-fluid">
					</div>
				</div>
			</div>
				<form method="post">
					<div class="form-group">
						<label>No Resi Pengiriman</label>
						<input type="text" class="form-control" name="resi">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option value=""> Pilih Status</option>
							<option value="dibatalkan">Dibatalkan</option>
							<option value="barang dikirim">Barang Dikirim</option>
							<option value="selesai">Selesai</option>
						</select>
					</div>
					<br>
					<button class="btn btn-primary" name="proses" style="
					position: relative;
				  left: 90%;
					flex: 1 1 auto;
				  display: inline-block;
				  background-color: #F9D701;
				  color: black;
				  font-weight: bold;
				  font-size: 18px;">Proses</button>
					<br>
					<br>
				</form>

				<?php
				if (isset($_POST["proses"])) {

					$resi =$_POST["resi"];
					$status =$_POST["status"];
					$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

					echo "<script>alert('data pembelian terupdate');</script>";
					echo "<script>location='pembelian.php?halaman=pembelian';</script>";
				}
				?>
	</div>
</div>

</body>
</html>
