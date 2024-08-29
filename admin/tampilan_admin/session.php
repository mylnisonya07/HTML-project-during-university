<?php
if(!isset($_SESSION["admin"])){
  // Diarahkan ke ke login.php
  echo "<script>alert('Silahkan login!')</script>";
  echo "<script>location='login.php';</script>";
}
?>
