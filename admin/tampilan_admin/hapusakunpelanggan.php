<?php
//koneksi ke database
include '../../koneksi.php';
?>

<?php

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Akun Pelanggan Terhapus');</script>";
echo "<script>location='pelanggan.php?halaman=pelanggan';</script>";
?>
