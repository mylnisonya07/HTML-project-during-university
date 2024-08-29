<?php 
include "../../koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];

$proses = mysqli_query($koneksi, "insert into admin values ('', '$username', '$password', '$nama_lengkap')");

if ($proses) {
  echo "<script>alert('Registrasi Berhasil, silakan Login'); </script>";
  echo "<script>location='login.php';</script>";
}else{
  echo "Gagal";
}
?>