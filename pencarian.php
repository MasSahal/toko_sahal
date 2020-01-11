<?php
session_start();
//koneksi ke database
include('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        #card:hover {
            transform: scale(1.02);
            box-shadow: -2px -2px 5px 1px #ebebeb;
            -webkit-transition: -webkit-transform, opacity;
            -webkit-transition-duration: 200ms, 6000ms;
            /* -webkit-transition-delay: 0ms, 6000ms; */
        }

        #produk:hover {
            color: white;
            background-color: #676767;
        }

        #produk:hover {
            text-decoration: none;
            outline: none;
            /* color:blue; */
        }
    </style>

    <title>Mas Sahal Official</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-info-300">
    <?php include('layouts/navbar.php'); ?>

    <!-- konten -->
    <section class="konten mt-4">
        <div class="container">
            <div id="produk" class="card border-bottom-warning py-2 mb-4">
                <h1 class="card-title m-2 text-center">Produk Popular</h1>
            </div>
            <div class="row">

                <?php
                //var_dump($_SESSION);
                $no = 1;
                $query = $koneksi->query("SELECT * FROM produk");
                while ($produk = $query->fetch_assoc()) {
                ?>
                    <div class="col-md-3 mb-3">
                        <div id="card" class="card <?php if ($no % 2 != 0) {
                                                        echo "border-bottom-dark";
                                                    } else {
                                                        echo "border-bottom-warning";
                                                    } ?> py-2">
                            <a href="detail_produk.php?id=<?php echo $produk['id_produk']; ?>" class="text-dark" id="produk">
                                <img class="card-img-top" src="foto_produk/<?php echo $produk['foto_produk']; ?>" alt="">
                                <div class="card-body">
                                    <p class="card-title"><?php $no++; ?></p>
                                    <h5 class="card-title"><?php echo $produk['nama_produk']; ?></h5>
                            </a>
                            <p class="card-text"><?php echo 'Rp. ' . number_format($produk['harga_produk']); ?></p>
                            <a href="masukan_keranjang.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-cart-plus"></i> Cart</a>
                            <a href="beli.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                        </div>
                    </div>
            </div>
        <?php } ?>
        </div>
    </section>
    <?php include('layouts/footer.php'); ?>


    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>