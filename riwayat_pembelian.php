<?php
session_start();
//koneksi ke database
include('koneksi.php');

//jika tidak ada yg login maka kembali ke login.php
if (!isset($_SESSION['pelanggan'])) {
    header('location:index.php');
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

    <title>Mas Sahal Official</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
<?php include('layouts/navbar.php'); ?>
    
    <!-- ini konten -->
    <section>
        <div class="container">
            <h1 class="my-4 text-center">Riwayat Pembelian Produk</h1>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Id Pembelian</th>
                            <th>Tanggal Pembelian</th>
                            <th>Alamat Pengiriman</th>
                            <th>Status Pembelian</th>
                            <th>Jumlah Total</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        // var_dump($_SESSION);
                        // $_SESSION['id_pelanggan'] = $_SESSION['pelanggan']['id_pelanggan'];
                        // var_dump($_SESSION['pelanggan']['id_pelanggan']);                                                                                                                                    
                        // foreach ($_SESSION['id_pelanggan'] as $id => $id_pelanggan) {
                    
                        $data_saya = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$_GET[id];'");
                        while ($data =$data_saya->fetch_assoc()) {
                        if ($data < 1) {
                            echo "<div class='alert alert-danger'>Anda belum melakukan transaksi apapun !</div>";
                        }else{
                        ?>
                        <tr>
                            <td><?= $data['id_pembelian'] ;?></td>
                            <td><?= $data['tanggal_pembelian'] ;?></td>
                            <td><?= $data['alamat_pengiriman'] ;?></td>
                            <td><?= $data['status_pembelian'] ;?></td>
                            <td>Rp. <?= number_format( $data['total_pembelian']) ;?></td>
                            <td>
                                <a href="nota_pembelian.php?id=<?= $data['id_pembelian'];?>" class="btn btn-sm btn-info">Detail</a>
                                <?php
                                if ($data['status_pembelian'] == 'Dibayar') { ?>
                                <a href="pembayaran.php?id=<?= $data['id_pembelian'];?>" class="btn btn-sm btn-success">Pembayaran</a>
                                <a href="diterima.php?id=<?= $data['id_pembelian'];?>" class="btn btn-sm btn-primary">Diterima</a>
                                <?php }elseif($data['status_pembelian'] == 'Diterima'){ ?>
                                <a href="#" class="btn btn-sm btn-secondary" disabled>Telah Diterima</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php var_dump($data); ?>
                        <?php var_dump($_SESSION['pelanggan']['id_pelanggan']); ?>
                        <?php }} ?>
                    </table>
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