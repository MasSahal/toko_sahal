<?php
session_start();
var_dump($_SESSION['keranjang']);
//koneksi ke database
include('koneksi.php');
//jika keranjang kosong
if (empty($_SESSION['keranjang'])) {
    echo
    "<script>
    alert('Keranjang kosong, silahkan berbelanja !');
    location='index.php';
    </script>";
    error_reporting(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Keranjang</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
<?php include('layouts/navbar.php'); ?>

    <!-- konten -->
    <section class="konten mt-4">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr class="py-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub-Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total_belanja = 0;
                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                        // menampilkan produk berdasarkan id produk
                        $query = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $data = $query->fetch_assoc();
                        $subharga = $data['harga_produk'] * $jumlah;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($data['harga_produk']); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td><a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
                        </tr>
                        <?php $total_belanja += $subharga; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Sub-Total</td>
                        <td colspan="2">Rp. <?php echo number_format($total_belanja); ?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="row float-right">
                <div class="col-12 ">
                    <a href="index.php" class="btn btn-sm btn-warning">Kembali Belanja</a>
                    <a href="checkout.php" class="btn btn-sm btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </section>

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