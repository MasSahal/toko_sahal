<div class="row">
    <div class="col-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <h2>Edit Data Pelanggan</h2>
                <?php
                $id = $_GET['id'];
                $ubah = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
                $data = $ubah->fetch_assoc();
                var_dump($data);
                ?>
                <form method="post">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control" value="<?= $data['nama_pelanggan'];?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="telepon">No Telepon</label>
                      <input type="number" name="telepon" id="telepon" class="form-control" value="<?= $data['telepon_pelanggan'];?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="<?= $data['email_pelanggan'];?>" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <small><a href="#" data-toggle="modal" data-target="#ubahPassword">Ubah Password</a></small>
                    </div>
                    <input name="update" id="update" class="btn btn-sm btn-primary" type="submit" value="Simpan Perubahan">
                    
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Modal Ubah Password-->
<div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ubah Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <form method="post">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group">
              <label for="password">Password Baru</label>
              <input type="text" name="password" id="password" class="form-control form-control-md" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="password">Ulangi Password</label>
              <input type="text" name="password2" id="password" class="form-control form-control-md" aria-describedby="helpId">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary" name="save_pw">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('#ubahPassword').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM
    
  });
</script>

<?php
//ini untuk ubah password pelanggan
if (isset($_POST['save_pw'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //jika nilai password dan password2 sama
    if ($password == $password2) {
      $pw = $koneksi->query("UPDATE pelanggan SET password_pelanggan=md5('$password') WHERE id_pelanggan='$id'");
      
      //jika $pw berhasil update data
      if ($pw == 'success') {
        echo "<script>alert('Password Berhasil Diubah !');</script>";
      }else{
        echo "<script>alert('Gagal Mengubah Password !');</script>";
      }
    }else{
      echo "<script>alert('Password Tidak Sama !');</script>";
  }
}

//Ini Untuk ubah profile pelanggan
if (isset($_POST['update'])) {
    $nama = $_POST['username'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    
    $update = $koneksi->query("UPDATE pelanggan SET email_pelanggan='$email', nama_pelanggan='$nama', telepon_pelanggan='$telepon'  WHERE id_pelanggan='$id'");
      
      //jika $update berhasil update data
      if ($update == "success") {
          echo "<script>alert('Berhasil Mengubah Data');</script>";
          echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pelanggan'>";
          
      }else{
          echo "<script>alert('Gagal Mengubah Data !');</script>";
      }
}
?>


