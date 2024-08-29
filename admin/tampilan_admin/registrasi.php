<!DOCTYPE html>
<html>
<head>
   <title>Registrasi</title>
   <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
   <link rel="stylesheet" type="text/css" href="../../css/loginadmin.css">
</head>
<body>
  <br/>
  <br/>

  <table>
      <tr>
          <td>
              <img class="image1r" src="../../image_buyme/flower.png" alt="">
          </td>
          <td rowspan="2">
              <img class="image2r" src="../../image_buyme/flower2.png" alt="">
          </td>
      </tr>
      <tr>
          <td height=200px></td>
      </tr>
  </table>

  <table class="container2">
      <form action="simpan_registrasi.php" method="post">
        <tr>
            <td class="textcolor">
                <img class="center" src="../../image_buyme/logo buyme.png" alt="Logo BuyMe">
                <h2 align="center">REGISTRASI AKUN ADMIN</h2><hr>
                <table align="center">
                  <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input id="username" type="text" name="username" required/></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input id="password" type="password" name="password" required/></td>
                  </tr>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama_lengkap"></td>
                  </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="btn">
                <input class="text" type="submit" name="proses" value="Daftar">
            </td>
        </tr>
      </form>
  </table>
</body>
</html>
