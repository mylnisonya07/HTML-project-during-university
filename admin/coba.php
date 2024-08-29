<?php
include "../koneksi.php";

$response = array();

$result = mysqli_query($koneksi, 
        "select id_pembelian_produk, nama, MAX(jumlah) 'total' FROM pembelian_produk GROUP BY nama;");
foreach ($result as $key){
    // $key = mysqli_fetch_assoc($result);
    $data = array();
    $data['nama'] = $key["nama"];
    $data['total'] = $key["total"];
    array_push($response, $data);
}
echo json_encode($response);
?>
