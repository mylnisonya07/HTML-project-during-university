<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="image_buyme/logo buyme.png" width="95" height="80" alt="">
<!--         <strong>Buy</strong>Me -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form action="pencarian.php" method="get" class="d-flex ms-auto my-4 my-lg-0">
          <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Produk" style="width: 350px">
          <button class="btn btn-light"><i class="fas fa-search"></i></button>
        </form>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php">Keranjang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
            <!-- jika sudah login (ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            <!-- selain itu (belum login || belum ada session pelanggan) -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftar.php">Daftar</a>
              </li>
            <?php endif ?>  
        </ul>

      </div>
    
    </div>
</nav>