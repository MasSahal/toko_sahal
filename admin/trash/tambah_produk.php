<div class="row">
    <div class="col-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col my-2">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-sm-8">
                        <h2>Tambah Produk</h2>
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga (Rp)</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (Gr)</label>
                                <input type="number" name="berat" id="berat" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea rows="10" class="form-control" name="deskripsi"required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label><br>
                                <input type="file" name="foto" required>
                            </div>
                            <hr class="py-2">
                            <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-warning">
                            <input type="submit" name="tambah" value="Tambah Produk" class="btn btn-sm btn-success">
                        </form>

                        <?php

                        if (isset($_POST['tambah'])) {
                            $nama_produk = $_POST['nama'];
                            $harga_produk = $_POST['harga'];
                            $berat_produk = $_POST['berat'];
                            $deskripsi_produk = $_POST['deskripsi'];

                            //ambil data foto
                            $nama = $_FILES['foto']['name'];
                            $lokasi = $_FILES['foto']['tmp_name'];
                            move_uploaded_file($lokasi, "../foto_produk/".$nama);

                            $add_produk = $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) 
                            VALUES ('$nama_produk','$harga_produk','$berat_produk','$nama','$deskripsi_produk')");

                            if ($add_produk == 'success') {
                                echo "
                                <div class='alert alert-success'>Berhasil Menambahkan Produk ! </div>
                                <meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
                            }else{
                                echo "<script>alert('Gagal Tambah Produk ! ');</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>