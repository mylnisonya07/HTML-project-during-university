<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// if (!isset($_SESSION['pelanggan']))
// {
//   echo "<script>alert('Anda harus login');</script>";
//   echo "<script>location:'login.php';</script>";
//   header('location:login.php');
//   exit;
// }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BuyMe</title>
  <!-- icon -->
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="css/berandapelanggan.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>

	<!-- NavBar -->
	<?php include 'menu.php'; ?>

	<!-- <br> -->

  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	<!-- Awal Carousel -->
	<!-- <div class="container"> -->
		<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
		  	<div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
			    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>
		  	</div>
		  	<div class="carousel-inner">
		    	<div class="carousel-item active">
		    		<!-- <a class="navbar-brand" href="index.php"> -->
				        <img src="carousel/1.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a> -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="detail.php?id=7"> -->
				        <img src="carousel/4.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a>  -->
				    <div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="detail.php?id=11"> -->
				        <img src="carousel/2.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a>  -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="detail.php?id=6"> -->
				        <img src="carousel/5.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a> -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="detail.php?id=9"> -->
				        <img src="carousel/3.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a> -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="detail.php?id=18"> -->
				        <img src="carousel/6.png" class="d-block w-100" alt="" border="5px">
				    <!-- </a> -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			    <div class="carousel-item">
			    	<!-- <a class="navbar-brand" href="pencarian.php?keyword=sepatu"> -->
				        <img src="carousel/img5.jpg" class="d-block w-100" alt="" border="5px">
				    <!-- </a> -->
			      	<div class="carousel-caption d-none d-md-block"></div>
			    </div>
			</div>

			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			</button>
		</div>

	<!-- </div> -->
	<!-- Akhir Carousel -->
  <!-- <br> -->
  <!-- category -->
  <div class="container">
  	<div class="section" style="padding:25px 0;">
  		<br>
			<h1 align="center"><b>Kategori</b></h1>
			<div class="row">
				<div class="box" style="background-color: #fff;
							border:5px solid #ccc;
							padding:10px;
							margin:10px 0 25px 0; width: 98.5%; position: relative; left: 12px">

				<?php
					$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk_kategori.php?kat=<?php echo $k['id_kategori'] ?>">
							<div class="col-md-2 text-center" style="width:14%;
									height: auto;
									float: left;
									/*padding:15px;*/
									/*margin-bottom: 10px;*/
									position: relative;
									left: 10px;">
								<img src="image_buyme/7.png" style="margin-bottom:5px; width:37%; height:auto">
								<p><button class="btn btn-info" style="width: 170px; font-size: 12px; border: 3px solid #212429;"><b><?php echo $k['nama_kategori'] ?></b></button></p>
							</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
				</div>
			</div>
		</div>
  </div>
	
  <!-- akhir kategori -->

	<section class="konten">
		<div class="container">
			<h1 align="center" style="margin-bottom: 20px;"><b>Produk Terbaru</b></h1>
			<div class="row justify-content-center">
				<?php $ambil = $koneksi->query("SELECT * FROM produk");?>
				<?php while($perproduk = $ambil->fetch_assoc()){ ?>
				<!-- <pre><?php //print_r($perproduk) ?></pre> -->
				<div class="col-md-3">
					<div class="card shadow" style="width: 20rem;">
						<div class="inner">
							<img src="admin/gambar_produk/<?php echo $perproduk['gambar_produk'];?>" alt="" class="card-img-top">
						</div>

						<div class="card-body">
							<h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
							<h4>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h4>
							<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
							<br>
							<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-info">Detail</a>

						</div>
					</div>
				</div>
				<?php } ?>
				<br>
			</div>
	</section>


</body>
</html>
