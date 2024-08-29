<!-- <link rel="stylesheet" href="../../css/sidebar.css" type="text/css"> -->

<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../../image_buyme/logo buyme.png" alt="" width="40" height="100"><strong>CGS</strong><div></div>C'mon Go Shopping
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="beranda.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-shop text-black"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kategori.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-single-copy-04 text-black"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-planet text-black"></i>
                <span class="nav-link-text">Produk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pembelian.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-bag-17 text-black"></i>
                <span class="nav-link-text">Pembelian</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="laporan_pembelian.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-folder-17 text-black"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pelanggan.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                <i class="ni ni-single-02 text-black"></i>
                <span class="nav-link-text">Pelanggan</span>
              </a>
            </li>
            <!-- jika sudah login (ada session pelanggan) -->
            <?php if (isset($_SESSION["admin"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                  <i class="ni ni-button-power text-black"></i>
                  <span class="nav-link-text">Log Out</span>
                </a>
              </li>
            <!-- selain itu (belum login || belum ada session pelanggan) -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php" onmouseover="this.style.backgroundColor='#F9D701';" onmouseout="this.style.backgroundColor='white';">
                  <i class="ni ni-button-power text-black"></i>
                  <span class="nav-link-text">Log In</span>
                </a>
              </li>
            <?php endif ?>

          </ul>
        </div>
      </div>
    </div>
  </nav>
