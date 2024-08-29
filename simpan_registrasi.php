<?php 
include "koneksi.php";

	$email_pelanggan = $_POST["email_pelanggan"];
	$password_pelanggan = $_POST["password_pelanggan"];
	$nama_pelanggan = $_POST["nama_pelanggan"];
	$telepon_pelanggan = $_POST["telepon_pelanggan"];
	$alamat_pelanggan = $_POST["alamat_pelanggan"];

$proses = mysqli_query($koneksi, "insert into pelanggan values ('', '$email_pelanggan', '$password_pelanggan', '$nama_pelanggan', '$telepon_pelanggan' ,'$alamat_pelanggan')");

if ($proses) {
  echo "<script>alert('Registrasi Berhasil, silakan Login'); </script>";
  echo "<script>location='login.php';</script>";
}else{
  echo "Gagal";
}
?>