<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Data Pelanggan</h2>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>E-Mail</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 0;
                                    $ambil = $koneksi->query("SELECT * FROM pelanggan");
                                    while ($data = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no += 1; ?></td>
                                            <td><?php echo $data['nama_pelanggan']; ?></td>
                                            <td><?php echo $data['email_pelanggan']; ?></td>
                                            <td><?php echo $data['telepon_pelanggan']; ?></td>
                                            <td>
                                                <a href="index.php?halaman=edit_pelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-eraser"></i> Ubah</a>
                                                ||
                                                <a href="index.php?halaman=hapus_pelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahPelanggan"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Tambah Pelanggan Modal-->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
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
                        <input type="password" min="10" name="password" id="password" class="form-control" required placeholder="Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" min="10" name="password2" id="password" class="form-control" required placeholder="Ulangi Password" aria-describedby="helpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="cancel" id="camcel" class="btn btn-sm btn-default" type="reset" value="Ulangi">
                    <input name="tambah" id="tambah" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['username'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $akun = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
    //jika email sudah terdaftar
    if ($akun->num_rows != 0) {
        echo "<script>alert('Email Sudah Terdaftar');</script>";
    
    }else{
        //jika password sama
        if ($password == $password2) {

            $update = $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan)
            VALUES ('$email',md5('$password'),'$nama','$telepon')");
            if ($update == "success") {
                echo "<script>alert('Berhasil Menambah Data');</script>";
                echo "<meta http-equiv='refresh' content='0.1;url=index.php?halaman=pelanggan'>";
            } else {
                echo "<script>alert('Gagal Mengubah Data');</script>";
            }
        } else {
            echo "<script>alert('Password Tidak Sama !');</script>";
        }
    }
}
?>