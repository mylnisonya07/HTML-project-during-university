<?php
session_start();

//koneksi ke database
include 'koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if(!isset($_SESSION["pelanggan"])){
  // Diarahkan ke ke login.php
  echo "<script>alert('Silahkan login!')</script>";
  echo "<script>location='login.php';</script>";
}

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('keranjang kosong, silahkan belanja dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
  <!-- icon -->
  <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
	<script src="admin/assets/js/jquery-1.10.2.js"></script>
<!-- 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css"> -->
	<title>Check Out</title>
</head>
<body style="background-image: url(image_buyme/yellow7.jpg);">

<!-- NavBar -->
<?php include 'menu.php'; ?>

<br>
<section class="konten">
	<div class="container" style="background-color: white; border-radius: 15px;">
	<div align="center">
		<br>
		<h1 style="color: black;"><b>CHECKOUT</b></h1>
	</div>
	<div class="container mt-5">
		<table class="table table-bordered" style="border: 8px solid #253D93;">
			<thead style="background-color: #253D93; color:white; text-align: center;">
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody style="background-color:#F9D701; border: 8px solid white; text-align: center; color: black;">
				<?php $nomor=1; ?>
				<?php $totalberat = 0; ?>
				<?php $totalbelanja = 0; ?>
        <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
        <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
        <?php
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        $subharga = $pecah['harga_produk'] * $jumlah;
        // Subberat diperoleh dari berat produk x jumlah
        $subberat = $pecah['berat_produk'] * $jumlah;
        $totalberat+=$subberat;
				?>
				<tr style="background-color: white; border: 8px solid #253D93;  color: black; text-align: center;">
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $nomor; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $pecah["nama_produk"]; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;">Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;"><?php echo $jumlah; ?></td>
					<td style="border-right: 3px solid #253D93; border-bottom: 3px solid #253D93;">Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot style="background-color: white; border: 8px solid #253D93;  color: black; text-align: center;">
				<tr>
					<th colspan="4" style="border-right: 3px solid #253D93;">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja)?></th>
				</tr>
			</tfoot>
		</table>

		<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" style="border: 4px solid #253D93; border-radius: 8px;">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" style="border: 4px solid #253D93; border-radius: 8px;">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label style="color: black; size: 18px;"><h5>Alamat Lengkap Pengiriman</h5></label>
				<textarea class="form-control" name="alamat_pengiriman" placeholder="masukkan alamat lengkap (termasuk kode pos)" required style="border: 4px solid #253D93; border-radius: 8px;"></textarea><br>
			</div>
			<!-- source code dari rajaongkir -->
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Provinsi</label>
            <select name="nama_provinsi" id="" class="form-control" required>
              <!-- Menggunakan javascript -->
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Distrik</label>
            <select name="nama_distrik" id="" class="form-control" required>

            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Ekspedisi</label>
            <select name="nama_ekspedisi" id="" class="form-control" required>

            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="">Paket</label>
            <select name="nama_paket" id="" class="form-control" required>

            </select>
          </div>
        </div>
      </div>
			<br>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Berat</label>
						<input type="text" name="total_berat" value="<?= $totalberat; ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Provinsi</label>
						<input type="text" name="provinsi" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Distrik</label>
						<input type="text" name="distrik" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Tipe</label>
						<input type="text" name="tipe" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Kode Pos</label>
						<input type="text" name="kodepos" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Ekspedisi</label>
						<input type="text" name="ekspedisi" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Paket</label>
						<input type="text" name="paket" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Ongkir</label>
						<input type="text" name="ongkir" class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="">Estimasi</label>
						<input type="text" name="estimasi" class="form-control">
					</div>
				</div>
			</div>

      <div class="form-group" style="margin-top: 10px; float: right;">
        <button class="btn btn-primary" name="checkout">Checkout</button>
				<br>
				<br>
      </div>
    </form>

    <?php
    if(isset($_POST["checkout"])){
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $tanggal_pembelian = date('Y-m-d');
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

      $totalberat = $_POST['total_berat'];
      $provinsi = $_POST['provinsi'];
      $distrik = $_POST['distrik'];
      $tipe = $_POST['tipe'];
      $kodepos = $_POST['kodepos'];
      $ekspedisi = $_POST['ekspedisi'];
      $paket = $_POST['paket'];
      $ongkir = $_POST['ongkir'];
      $estimasi = $_POST['estimasi'];

      $total_pembelian = $totalbelanja + $ongkir;

      // Menyimpan data ke tabel pembelian
      $koneksi->query("INSERT INTO pembelian(id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman, totalberat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

      // Mendapatkan id_pembelian yang baru terjadi
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach($_SESSION["keranjang"] as $id_produk => $jumlah){

        // Mendapatkan data produk berdasarkan id_produk
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $nama = $perproduk['nama_produk'];
        $harga = $perproduk['harga_produk'];
        $berat = $perproduk['berat_produk'];
        $subberat = $perproduk['berat_produk']*$jumlah;
        $subharga = $perproduk['harga_produk']*$jumlah;

        $koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

        // Update stok
        $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
      }

      // Mengosongkan keranjang belanja
      unset($_SESSION["keranjang"]);

      // Tampilan dialihkan ke halaman nota dari pembelian barusan
      echo "<script>alert('Pembelian sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }

    ?>

  </div>
</section>

<script>
    $(document).ready(function(){
      $.ajax({
        type: 'post',
        url: 'dataprovinsi.php',
        success: function(hasil_provinsi){
          $("select[name=nama_provinsi]").html(hasil_provinsi);
        }
      });

      $("select[name=nama_provinsi]").on("change", function(){
        // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
          type: 'post',
          url: 'datadistrik.php',
          data: 'id_provinsi='+id_provinsi_terpilih,
          success:function(hasil_distrik){
            $("select[name=nama_distrik]").html(hasil_distrik);
          }
        })
      });

      $.ajax({
        type: 'post',
        url: 'jasaekspedisi.php',
        success: function(hasil_ekspedisi){
          $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
        }
      });

      $("select[name=nama_ekspedisi]").on("change", function(){
        // Mendapatkan data ongkos kirim

        // Mendapatkan ekspedisi yang dipilih
        var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
        // Mendapatkan id_distrik yang dipilih
        var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
        // Mendapatkan toatal berat dari inputan
        $total_berat = $("input[name=total_berat]").val();
        $.ajax({
          type: 'post',
          url: 'datapaket.php',
          data: 'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+$total_berat,
          success: function(hasil_paket){
            // console.log(hasil_paket);
            $("select[name=nama_paket]").html(hasil_paket);

            // Meletakkan nama ekspedisi terpilih di input ekspedisi
            $("input[name=ekspedisi]").val(ekspedisi_terpilih);
          }
        })
      });

      $("select[name=nama_distrik]").on("change", function(){
        var prov = $("option:selected", this).attr('nama_provinsi');
        var dist = $("option:selected", this).attr('nama_distrik');
        var tipe = $("option:selected", this).attr('tipe_distrik');
        var kodepos = $("option:selected", this).attr('kodepos');

        $("input[name=provinsi]").val(prov);
        $("input[name=distrik]").val(dist);
        $("input[name=tipe]").val(tipe);
        $("input[name=kodepos]").val(kodepos);
      });

      $("select[name=nama_paket]").on("change", function(){
        var paket = $("option:selected", this).attr("paket");
        var ongkir = $("option:selected", this).attr("ongkir");
        var etd = $("option:selected", this).attr("etd");

        $("input[name=paket]").val(paket);
        $("input[name=ongkir]").val(ongkir);
        $("input[name=estimasi]").val(etd);
      })
    });
  </script>

</body>
</html>
