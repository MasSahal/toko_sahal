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

    <title>Mas Sahal Official</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-info">
    <?php include('layouts/navbar.php'); ?>

    <!-- Ini Konten -->
    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required placeholder="Username" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input type="number" name="telepon" id="telepon" class="form-control" required placeholder="No Telepon" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password2" id="password" class="form-control" required placeholder="Ulangi Password" aria-describedby="helpId">
                    </div>
                    <input name="cancel" id="camcel" class="btn btn-sm btn-default" type="reset" value="Ulangi">
                    <input name="tambah" id="tambah" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                </form>
            </div>
        </div>
    </section>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>


