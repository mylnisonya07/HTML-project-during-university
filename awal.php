<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
   <title>Halaman Awal</title>
   <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
   <link rel="stylesheet" type="text/css" href="css/awal.css">
</head>
<body>
  <br/>
  <br/>
  <table class="container3">
        <tr>
            <td class="textcolor">
                <img class="center2" src="image_buyme/register.png" alt="Logo BuyMe">
                <h1 align="center">INGIN MASUK SEBAGAI</h1><hr>
                <table align="center" class="table">
                  <tr>
                  </tr>
                  <tr>
                    <td align="center" class="btn" width=180px; style="position: relative; right: 40px;">
                      <button type="button" class="btn btn-primary" id="liveAlertBtn"><a href="admin/tampilan_admin/login.php">Admin</a></button>
                    </td>
                    <td align="center" class="btn" width=180px; style="position: relative; left: 40px;">
                      <button type="button" class="btn btn-primary" id="liveAlertBtn"> <a href="pelanggan/login.php">Pelanggan</a></button>
                    </td>
                  </tr>
                </table>
            </td>
        </tr>
  </table>
</body>
</html>
