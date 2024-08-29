<?php
//koneksi ke database
include '../../koneksi.php';
?>

<?php
//cek kategori
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];
//baca nama file yang mau dihapus
$ambil = $koneksi-> query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc())
{
  $semuadata[] = $tiap;
}
}
$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori terhapus');</script>";
echo "<script>location='kategori.php?halaman=kategori';</script>";
?>
