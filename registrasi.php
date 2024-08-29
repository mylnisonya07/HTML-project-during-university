<!DOCTYPE html>
<html>
<head>
   <title>Registrasi</title>
   <link rel="icon" href="image_buyme/logo buyme.png" type="image/png">
   <link rel="stylesheet" type="text/css" href="css/loginadmin.css">
</head>
<body>
  <br/>
  <br/>

  <table>
      <tr>
          <td>
              <img class="image1r" src="image_buyme/flower.png" alt="">
          </td>
          <td rowspan="2">
              <img class="image2r" src="image_buyme/flower2.png" alt="">
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
                <img class="center" src="image_buyme/logo buyme.png" alt="Logo BuyMe">
                <h2 align="center">REGISTRASI AKUN PELANGGAN</h2><hr>
                <table align="center">
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input id="password" type="email" name="email_pelanggan" required/></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password_pelanggan"></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input id="username" type="text" name="nama_pelanggan" required/></td>
                  </tr>
                  <tr>
                    <td>Nomor HP</td>
                    <td>:</td>
                    <td><input id="username" type="text" name="telepon_pelanggan" required/></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input id="username" type="text" name="alamat_pelanggan" required/></td>
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
