<?php
session_start();
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
   <title>Login Admin</title>
   <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
   <link rel="stylesheet" type="text/css" href="../../css/loginadmin.css">
</head>
<body>
  <br/>
  <br/>

  <table>
      <tr>
          <td>
              <img class="image1" src="../../image_buyme/flower.png" alt="">
          </td>
          <td rowspan="2">
              <img class="image2" src="../../image_buyme/flower2.png" alt="">
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
                <img class="center" src="../../image_buyme/logo buyme.png" alt="Logo BuyMe">
                <h2>LOGIN ADMIN</h2><br>
                Username<br>
                <input id="username" type="text" name="user" required/>
                Password<br>
                <input id="password" type="password" name="pass" required/><br>
            </td>
        </tr>
        <tr align="center">
            <td class="btn">
                <input class="text" align="center" type="submit" name="login" value="LOG IN">
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
          if (isset($_POST['login']))
          {
            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password ='$_POST[pass]'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok==1) {
              $_SESSION['admin']=$ambil-> fetch_assoc();
              echo "<script>alert('anda sukses login');</script>";
               echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
            } else {
              echo "<div class='alert alert-danger'>Login gagal</div>";
               echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
          }
          ?>
  </table>
</body>
</html>
