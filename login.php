<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="google-signin-client_id" content="787952971609-as4nmqjonpbivvnl49ouf980sog497fi.apps.googleusercontent.com">
    <title>Login Pelanggan</title>
    <!-- icon -->
    <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/loginpelanggan.css">
</head>
<body>
  <br/>
  <br/>

  <table>
      <tr>
          <td>
              <img class="image1" src="image_buyme/flower.png" alt="">
          </td>
          <td rowspan="2">
              <img class="image2" src="image_buyme/flower2.png" alt="">
          </td>
      </tr>
      <tr>
          <td height=200px></td>
      </tr>
  </table>

  <table class="container">
      <form action="" method="post">
        <tr>
            <td class="textcolor">
                <img class="center" src="image_buyme/logo buyme.png" alt="Logo BuyMe">
                <h2>LOGIN PELANGGAN</h2><br>
                Email<br>
                <input id="username" type="text" name="email" required/>
                Password<br>
                <input id="password" type="password" name="password" required/><br>
            </td>
        </tr>
        <tr>
            <td class="btn">
                <input class="text" type="submit" name="simpan" value="LOG IN">
            </td>
        </tr>
        <!-- ============================================================= -->
        <tr>
          <td>
           <h4 align="center" style="color: #253D93;">OR</h4>
            <hr size="5px" style="color: black">
          </td>
        </tr>
        <tr>
          <td>
              <!-- <br> -->
              <div class="g-signin2" data-onsuccess="onSignIn" align="center" style="background-color: white; border: solid 5px white"></div>
          </td>
        </tr>

            <tr>
                <td class="bottom">
                <br>Belum punya akun?<br>
                Registrasi <a href="registrasi.php">di sini</a>
                </td>
            </tr>
      </form>
      <?php
      if (isset($_POST["simpan"]))
      {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $ambil= $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        $akunyangcocok = $ambil ->num_rows;
        if ($akunyangcocok==1)
        {
          $akun = $ambil-> fetch_assoc();
          $_SESSION["pelanggan"] = $akun;
          echo "<script>alert('anda sukses login');</script>";
          echo "<script>location='checkout.php';</script>";

        } else {
          echo "<script>alert('anda gagal, periksa akun anda');</script>";
          echo "<script>location='login.php';</script>";
        }
      }
      ?>

      <script src="https://apis.google.com/js/platform.js" async defer></script>

  </table>
</body>
</html>
