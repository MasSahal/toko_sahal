<?php
session_start();
//koneksi ke database
include('koneksi.php');

//mendapatkan id_produk
$id_produk = $_GET['id'];
//pilih produk sesusi id produk
$produk = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
//jadikan sebagai array
$data = $produk->fetch_assoc();
// var_dump($data);
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

    <!-- Custom  template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-info">
<?php include('layouts/navbar.php'); ?>
    <!-- Konten -->
    <section class="content mt-4">
        <div class="container">
            <div class="card p-4">
                <div class="container">
                    <a href="index.php"><i class="fa fa-angle-double-left"></i> Kembali</a>
                    <div class="row pt-2">
                        <div class="col-md-6">
                            
                            <center><img class="img-responsive " src="foto_produk/<?= $data['foto_produk'];?>" width="400em"></center>
                            <!-- <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div> -->
                        
                        </div>
                        <div class="col-md-6 pb-4">
                            <h2><strong><?= $data['nama_produk'];?></strong></h2>
                            <hr>
                            <p><?=$data['deskripsi_produk'];?>. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus pariatur obcaecati sunt cupiditate maxime dolorem doloremque. Odio labore veritatis tempora mollitia molestias, sequi inventore distinctio sunt dicta libero eius sed.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Do eos et rerum  amet sequi. Dignissimos, vel.</p>
                            <h4>Rp. <?=number_format($data['harga_produk']);?></h4>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" name="jumlah" id="jumlah" class="form-control form-control-mdx"  placeholder="Qty" required min="1" aria-describedby="helpId">
                                        <div class="input-group-btn">
                                            <input type="submit" value="Buy Now" name="beli" class="btn btn-md btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['beli'])) {
                                    //medapatkan jumlah produk yg dibeli
                                    $jumlah_beli = $_POST['jumlah'];

                                    // memasukan ke keranjang dengan session
                                    // $id_produk dari atas
                                    $_SESSION['keranjang'][$id_produk] = $jumlah_beli;
                                    echo"<script>alert('Produk berhasil masuk ke Keranjang !');</script>";
                                    echo"<script>location='keranjang.php';</script>";
                                }
                            ?>
                        </div>
                    </div>
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
    
    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

</body>

</html>