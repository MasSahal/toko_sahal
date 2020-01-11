<div class="row">
    <div class="col-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <h2>Tambah Data Pelanggan</h2>
                
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
                    <input name="tambah" id="tambah" class="btn btn-sm btn-primary" type="submit" value="Simpan">
                    
                </form>
            </div>
          </div>
        </div>
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

    //jika password sama
    if ($password == $password2) {
        
        $update = $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan)
        VALUES ('$email',md5('$password'),'$nama','$telepon')");
        if ($update == "success") {
            echo "<script>alert('Berhasil Menambah Data');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
            
        }else{
            echo "<script>alert('Gagal Mengubah Data');</script>";
        }
    }else{
        echo "<script>alert('Password Tidak Sama !');</script>";
    }
}
?>