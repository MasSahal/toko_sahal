<?php
session_start();
//koneksi ke database
include('koneksi.php');
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
//jika keranjang kosong ngapain checkout
if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Silahkan belanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
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

    <title>Checkout</title>

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
            <h1>Chekout Belanja</h1>
            <hr class="py-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub-Harga</th>
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
                        </tr>
                        <?php $total_belanja += $subharga; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><b>Sub-Total</b></td>
                        <td><b>Rp. <?php echo number_format($total_belanja); ?></b></td>
                    </tr>
                </tfoot>
            </table>

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" readonly class="form-control" value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" readonly class="form-control" value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ongkir">Ongkos Kirim</label>
                            <select class="form-control" name="id_ongkir" required>
                                <option value="">Pilih Jenis Pengiriman</option>
                                <?php
                                $ongkir = $koneksi->query('SELECT * FROM ongkir');
                                while ($data = $ongkir->fetch_assoc()) {
                                ?>
                                    <option value="<?= $data['id_ongkir']; ?>"><?= $data['kurir'] . ' - Rp. ' . number_format($data['tarif']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div> <!-- Punya Row -->
                <div class="row">
                    <div class="col-8" width="100%">
                        <div class="form-group">
                            <label for="alamat_pengiriman">Alamat Lengkap Pengiriman</label>
                            <textarea cols="20" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control block" required placeholder="Masukan alamat pengiriman (termasuk kode pos)"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nama_kota">Kota</label>
                            <input type="text" name="nama_kota" id=nama_kota" class="form-control" placeholder="Masukan kota tujuan" required aria-describedby="helpId">
                        </div>
                    </div>
                </div> <!-- Punya Row -->
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Checkout" name="checkout" class="btn btn-sm btn-primary float-right">
                        <a href="index.php" class=" btn btn-sm btn-warning mx-1 float-right">Kembali</a>
                    </div>
                </div> <!-- Punya Row -->
            </form>
            <?php
            if (isset($_POST['checkout'])) {
                $id_pelanggan    = $_SESSION['pelanggan']['id_pelanggan'];
                $id_ongkir       = $_POST['id_ongkir'];
                $tanggal         = date('Y-m-d');

                //ambil tarif di table database ongkir
                $ongkir = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $data_ongkir = $ongkir->fetch_assoc();
                $nama_kota = $_POST['nama_kota'];
                $alamat_pengiriman = $_POST['alamat_pengiriman'];
                $kurir = $data_ongkir['kurir'];
                $tarif_ongkir = $data_ongkir['tarif'];

                //mendapatkan total pembelian + ongkir
                $total_pembelian = $total_belanja + $tarif_ongkir;

                //1. Simpan data ke table pembelian
                $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,alamat_pengiriman,kurir,tarif)
                    VALUES ('$id_pelanggan','$id_ongkir','$tanggal','$total_pembelian','$nama_kota','$alamat_pengiriman','$kurir','$tarif_ongkir')");

                //mendapatkan id pembelian yang baru terjadi
                //gunakan   $koneksi->insert_id;
                $id_pembelian_barusan =  $koneksi->insert_id;
                echo $id_pembelian_barusan;
                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                    // medapatkan data produk berdasarkan id produk
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $per_produk = $ambil->fetch_assoc();

                    $nama_produk = $per_produk['nama_produk'];
                    $harga_produk = $per_produk['harga_produk'];
                    $berat_produk = $per_produk['berat_produk'];
                    $subberat = $per_produk['berat_produk'] * $jumlah;
                    $subharga = $per_produk['harga_produk'] * $jumlah;

                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah)
                    VALUES ('$id_pembelian_barusan','$id_produk','$nama_produk','$harga_produk','$berat_produk','$subberat','$subharga','$jumlah')");
                }
                //jika sukses checkout maka keranjang bersih 
                unset($_SESSION['keranjang']);

                //tampilan dialihkan ke halaman nota pembelian barusan terjadi
                echo "<script>alert('Pembelian Berhasil !')</script>";
                echo "<script>location='nota_pembelian.php?id=$id_pembelian_barusan'</script>";
            }
            var_dump($_SESSION['pelanggan']);
            var_dump($_SESSION['keranjang']);
            ?>
        </div> <!-- Punya Kontainer -->
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