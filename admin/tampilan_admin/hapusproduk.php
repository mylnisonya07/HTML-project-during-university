<?php
//koneksi ke database
include '../../koneksi.php';
?>

<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambarproduk = $pecah['gambar_produk'];
if (file_exists("../gambar_produk/$gambarproduk")) 
{
	unlink("../gambar_produk/$gambarproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='produk.php?halaman=produk';</script>";
?>