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

    <title>Nota Pembelian</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- konten -->
    <section class="konten mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="header text-center">
                                <h3>Laporan Pembelian Barang/Jasa Di Mas Sahal Official Shop</h3>
                                <h5>www.massahalofficial.com</h5>
                            </div>
                            <hr class="py-4">
                            <?php

                            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
                            $detail = $ambil->fetch_assoc();
                            //var_dump($detail);
                            ?>

                            <div class="row">
                                <div class="col-6">
                                    <table cellpadding="7">
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>:</th>
                                            <td>MSOFF00<?php echo $detail['id_pembelian']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td><?php echo $detail['nama_pelanggan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>No Telepon</th>
                                            <td>:</td>
                                            <td><?php echo $detail['telepon_pelanggan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?php echo $detail['email_pelanggan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pembelian</th>
                                            <td>:</td>
                                            <td><?php echo $detail['tanggal_pembelian']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Pembelian</th>
                                            <td>:</td>
                                            <td><?php echo $detail['status_pembelian']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Pembelian</th>
                                            <td>:</td>
                                            <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table cellpadding="7">
                                        <tr>
                                            <th colspan="3">Pengiriman</th>
                                        </tr>
                                        <tr>
                                            <td>Kota</td>
                                            <td>:</td>
                                            <td><?php echo $detail['nama_kota']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Lengkap</td>
                                            <td>:</td>
                                            <td><?php echo $detail['alamat_pengiriman']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Kirim</td>
                                            <td>:</td>
                                            <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- Link Pembayaran -->
                            <!-- <div class="row">
                                        <div class="col-md">
                                            <div class="alert alert-info">
                                                Silahkan Melakukan Pembayaran Sebesar Rp.  echo number_format($detail['total_pembelian']); Ke Rekening BRI
                                                <b>Rek : 5835450043</b> an SAHL. Kirim bukti pembayaran <a href="#">disini</a>
                                            </div>
                                        </div>
                                    </div> -->
                            <table class="table table-bordered table-hover table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th>Qty</th>
                                        <th>Sub-Berat</th>
                                        <th>Sub-Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $total_pembelian = 0;
                                    $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id];'");
                                    while ($data = $ambil->fetch_assoc()) {
                                        // $subharga = $data['harga_produk']*$data['jumlah'];
                                        //var_dump($data);
                                    ?>
                                        <tr>
                                            <td><?= $i = $i + 1; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td>Rp. <?= number_format($data['harga']); ?></td>
                                            <td><?= number_format($data['berat']); ?>gr</td>
                                            <td><?= $data['jumlah']; ?> </td>
                                            <td><?= number_format($data['subberat']); ?>gr</td>
                                            <td>Rp. <?= number_format($data['subharga']); ?></td>
                                        </tr>
                                        <?php $total_pembelian += $data['subharga']; ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="right">Biaya Kirim <?php echo $detail['kurir']; ?></td>
                                        <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" align="right"><b>Total Pembelian</b></td>
                                        <td><b>Rp. <?= number_format($total_pembelian + $detail['tarif']); ?></b></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row mt-5">
                                <div class="col-3"></div>
                                <div class="col-3"></div>
                                <div class="col-3"></div>
                                <div class="col-3 mt-3">
                                    <h5>Hormat Kami</h5>
                                    <img src="admin/img/ttd.png" alt="Ms shop" width="120px" class="my-3">
                                    <p>Admin MSOFF</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.print();
        </script>
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