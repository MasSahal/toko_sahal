<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mas Sahal Official</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Checkout</a>
                </li>
                <?php if (!isset($_SESSION['pelanggan'])) { ?>
                    <li> <a class="nav-link" href="login.php">Login</a></li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if (!isset($_SESSION['pelanggan'])) {
                                                                                                                                                            echo "Login";
                                                                                                                                                        } else {
                                                                                                                                                            echo $_SESSION['pelanggan']['nama_pelanggan'];
                                                                                                                                                        } ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="riwayat_pembelian.php?id=<?= $_SESSION['pelanggan']['id_pelanggan']; ?>">Riwayat Pembelian</a>
                            <a class="dropdown-item" href="akun_saya.php?id_akun=<?= $_SESSION['pelanggan']['id_pelanggan']; ?>">Pengaturan Akun</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit" name="pencarian">Search</button>
            </form>
        </div>
    </div>
</nav>