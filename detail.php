<?php
session_start();
// koneksi ke database
include 'koneksi.php';

// mendapatkan id_produk dari url
$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi -> query ("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc())
{
  $fotoproduk[] = $tiap;
}
// echo "<pre>";
// print_r($detail);
// echo "<pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Produk</title>
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/berandapembeli.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>
	<style type="text/css">

			img {
				max-width: 100%; }

			.preview {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
						-ms-flex-direction: column;
								flex-direction: column; }
				@media screen and (max-width: 996px) {
					.preview {
						margin-bottom: 20px; } }

			.preview-pic {
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
						-ms-flex-positive: 1;
								flex-grow: 1; }

			.preview-thumbnail.nav-tabs {
				border: none;
				margin-top: 15px; }
				.preview-thumbnail.nav-tabs li {
					width: 18%;
					margin-right: 2.5%; }
					.preview-thumbnail.nav-tabs li img {
						max-width: 100%;
						display: block; }
					.preview-thumbnail.nav-tabs li a {
						padding: 0;
						margin: 0; }
					.preview-thumbnail.nav-tabs li:last-of-type {
						margin-right: 0; }

			.tab-content {
				overflow: hidden;
			}
				.tab-content img {
					width: 100%;
					-webkit-animation-name: opacity;
									animation-name: opacity;
					-webkit-animation-duration: .3s;
									animation-duration: .3s; }

			.card {
				margin-top: 50px;
				padding: 3em;
				line-height: 1.5em; }


			@media screen and (min-width: 997px) {
				.wrapper {
					display: -webkit-box;
					display: -webkit-flex;
					display: -ms-flexbox;
					display: flex; } }

			.details {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-webkit-flex-direction: column;
						-ms-flex-direction: column;
								flex-direction: column; }

			.colors {
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
						-ms-flex-positive: 1;
								flex-grow: 1; }

			.product-title, .price, .sizes, .colors {
				text-transform: UPPERCASE;
				font-weight: bold; }

			.checked, .price span {
				color: #ff9f1a; }

			.product-title, .rating, .product-description, .price, .vote, .sizes {
				margin-bottom: 15px; }

			.product-title {
				margin-top: 0; }

			.size {
				margin-right: 10px; }
				.size:first-of-type {
					margin-left: 40px; }

			.color {
				display: inline-block;
				vertical-align: middle;
				margin-right: 10px;
				height: 2em;
				width: 2em;
				border-radius: 2px; }
				.color:first-of-type {
					margin-left: 20px; }

			.add-to-cart, .like {
				background: #ff9f1a;
				padding: 1.2em 1.5em;
				border: none;
				text-transform: UPPERCASE;
				font-weight: bold;
				color: #fff;
				-webkit-transition: background .3s ease;
								transition: background .3s ease; }
				.add-to-cart:hover, .like:hover {
					background: #b36800;
					color: #fff; }

			.not-available {
				text-align: center;
				line-height: 2em; }
				.not-available:before {
					font-family: fontawesome;
					content: "\f00d";
					color: #fff; }

			.orange {
				background: #ff9f1a; }

			.green {
				background: #85ad00; }

			.blue {
				background: #0076ad; }

			.tooltip-inner {
				padding: 1.3em; }

			@-webkit-keyframes opacity {
				0% {
					opacity: 0;
					-webkit-transform: scale(3);
									transform: scale(3); }
				100% {
					opacity: 1;
					-webkit-transform: scale(1);
									transform: scale(1); } }

			@keyframes opacity {
				0% {
					opacity: 0;
					-webkit-transform: scale(3);
									transform: scale(3); }
				100% {
					opacity: 1;
					-webkit-transform: scale(1);
									transform: scale(1); } }

	</style>
<!-- NavBar -->
<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
					<div class="card">
							<div class="container-fliud">
									<div class="wrapper row">
											<div class="preview col-md-6">
													<div class="preview-pic tab-content">
														<div class="tab-pane active" id="pic-1" ><img src="admin/gambar_produk/<?php echo $detail["gambar_produk"]; ?>" alt="" class="img-fluid rounded" height="580" width="580"></div>
														<!-- <div class="tab-pane" id="pic-2">
															<?php //foreach ($fotoproduk as $key => $value): ?>
																<img src="../admin/gambar_produk/<?php echo $value["nama_produk_foto"]; ?>" alt="" class="container-fluid"><br><br>
															<?php //endforeach ?>
														</div> -->
													</div>
													<!-- <ul class="preview-thumbnail nav nav-tabs">
														<li><a data-target="#pic-2" data-toggle="tab">
															<?php //foreach ($fotoproduk as $key => $value): ?>
																<img src="../admin/gambar_produk/<?php echo $value["nama_produk_foto"]; ?>" alt="" class="container-fluid"><br><br>
															<?php //endforeach ?>
														</a></li>
													</ul> -->
											</div>
											<div class="col-md-6">
												<h2><?php echo $detail["nama_produk"] ?></h2>
												<div class="rating">
														<div class="stars">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
														</div>
														<span class="review-no">41 reviews</span>
												</div>
												<p class="product-stock">Stok terbatas! Tersisa <?php echo $detail['stok_produk'] ?> lagi!!</p>
												<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

												<h6>Stok: <?php echo $detail['stok_produk'] ?></h6>
												<br>
												<form method="post">
													<div class="form-group">
														<p class = "jumlah">Masukkan jumlah yang diinginkan</p>
														<div class="input-group">
															<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
															<div class="input-group-btn">
																<button class="btn btn-primary" name="beli">Beli</button>
															</div>
														</div>
													</div>
												</form>

												<?php
												// jika ada tombol beli
												if (isset($_POST["beli"])) {
													// mendapatkan jumlah produk yang diinputkan
													$jumlah = $_POST["jumlah"];
													//masukkan di keranjang belanja
													$_SESSION["keranjang"][$id_produk] = $jumlah;

													echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
													echo "<script>location='keranjang.php';</script>";
												}
												?>

												<br>
												<h6>Deskripsi Produk: </h6>
												<p><?php echo $detail["deskripsi_produk"]; ?></p>
											</div>
									</div>
							</div>
					</div>
			</div>
			<br>
			<br>
</section>

</body>
</html>
