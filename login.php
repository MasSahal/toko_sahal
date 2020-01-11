<?php
session_start();
//koneksi ke database
include('koneksi.php');

if (isset($_SESSION['pelanggan'])) {
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-info">
<?php include('layouts/navbar.php'); ?>

    <!-- konten -->
    <section class="konten mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-left-info card-default p-4 mt-5">
                        <div class="card-heading">
                            <h3 class="panel-title text-center">Login</h3>
                        </div>
                        <div class="card-default">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********" aria-describedby="helpId">
                                    <div class="text-center">
                                        <small id="helpId" class="mx-2"><a href="#">Daftar</a></small>
                                        <small id="helpId"><a href="#">Lupa Password</a></small>
                                    </div>
                                </div>
                                <button type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block">Login</button>
                            </form>
                            <?php
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $pass  = $_POST['password'];

                                $query = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan=md5('$pass')");
                                $cek = $query->num_rows;
                                if ($cek == 1) {
                                    //membuat akun dimasukan ke array
                                    $akun_session = $query->fetch_assoc();
                                    //memasukan akun ke session_start
                                    $_SESSION['pelanggan'] = $akun_session;
                                    $_SESSION['id_akun'] = $akun_session['id_pelanggan'];
                                    var_dump($_SESSION);
                                    echo "<script>alert('Selamat Datang');</script>";
                                    echo "<script>location='index.php';</script>";
                                } else {
                                    echo "<script>alert('Login Gagal, Silahkan cek kembali akun Anda ! ');</script>";
                                    echo "<script>location='login.php';</script>";
                                }
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

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>