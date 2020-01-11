<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php
                        $id = $_GET['id'];
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
                        $data = $ambil->fetch_assoc();
                        ?>
                        <h2>Ubah Produk</h2>
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="" value="<?= $data['nama_produk']; ?>" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga (Rp)</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="" value="<?= $data['harga_produk']; ?>" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (Gr)</label>
                                <input type="number" name="berat" id="berat" class="form-control" placeholder="" value="<?= $data['berat_produk']; ?>" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Produk</label><br>
                                <img src="../foto_produk/<?php echo $data['foto_produk']; ?>" alt="" width="200px"><br>
                                <small><a href="#" data-toggle="modal" data-target="#ubahFoto" class="btn btn-sm btn-outline-dark mt-2">Ubah Foto Produk</a></small>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea rows="5" class="form-control" name="deskripsi" required><?php echo $data['deskripsi_produk']; ?></textarea>
                            </div>
                            <input type="reset" name="reset" value="Undo" class="btn btn-sm  btn-warning">
                            <input type="submit" name="edit" value="Simpan Perubahan" class="btn btn-sm btn-success">
                        </form>


                        <!-- Tambah Pelanggan Modal-->
<div class="modal fade" id="ubahFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto</label><br>
                        <input type="file" name="foto" required>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-default">
                    <input type="submit" name="ubah_foto" value="Simpan" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

                        <?php
                        if (isset($_POST['edit'])) {

                            $nama_produk = $_POST['nama'];
                            $harga_produk = $_POST['harga'];
                            $berat_produk = $_POST['berat'];
                            $deskripsi_produk = $_POST['deskripsi'];

                                $edit_produk = $koneksi->query("UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', berat_produk='$berat_produk', deskripsi_produk='$deskripsi_produk'
                                    WHERE id_produk='$id'");

                                if ($edit_produk = 'success') {
                                    echo "
                                        <script>alert('Berhasil Mengubah Produk ! ');</script>
                                        <meta http-equiv='refresh' content='0;url=index.php?halaman=produk'>";
                                } else {

                                    echo "<script>alert('Gagal Ubah Produk ! ');</script>";
                                }
                            }
                        if (isset($_POST['ubah_foto'])) {
                            //ambil data foto
                            $nama = $_FILES['foto']['name'];
                            $lokasi = $_FILES['foto']['tmp_name'];
                            if (!empty($lokasi)) {
                                move_uploaded_file($lokasi, "../foto_produk/" . $nama);

                                $ubah_foto = $koneksi->query("UPDATE produk SET foto_produk='$nama' WHERE id_produk='$id'");

                                if ($ubah_foto = 'success') {
                                    echo "
                                        <div class='alert alert-success'>Berhasil Mengubah Foto Produk ! </div>
                                        <meta http-equiv='refresh' content='0;url=index.php?halaman=edit_produk&id={$id}'>";
                                } else {

                                    echo "<script>alert('Gagal Ubah Foto Produk ! ');</script>";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>