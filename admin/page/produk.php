

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Data Produk</h2>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $ambil = $koneksi->query("Select * from produk");
                                    while ($data = $ambil->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?php echo $i = $i + 1; ?></td>
                                            <td><?= $data['nama_produk']; ?></td>
                                            <td><?= $data['harga_produk']; ?></td>
                                            <td><?= $data['berat_produk']; ?> Gramm</td>
                                            <td><img src="../foto_produk/<?= $data['foto_produk']; ?>" width="100px"></td>
                                            <td class="justify-content-centered">
                                                <a href="index.php?halaman=edit_produk&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-eraser"></i> Ubah</a>
                                                <a href="index.php?halaman=hapus_produk&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusProduk"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-sm btn-success mt-2" data-toggle="modal" data-target="#tambahProduk"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Tambah Pelanggan Modal-->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" enctype="multipart/form-data" method="post">
                <div class="modal-body">
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
                        <textarea rows="3" class="form-control" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label><br>
                        <input type="file" name="foto" required>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-default">
                    <input type="submit" name="tambah" value="Tambah Produk" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama'];
    $harga_produk = $_POST['harga'];
    $berat_produk = $_POST['berat'];
    $deskripsi_produk = $_POST['deskripsi'];

    //ambil data foto
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk/" . $nama);

    $add_produk = $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) 
    VALUES ('$nama_produk','$harga_produk','$berat_produk','$nama','$deskripsi_produk')");

    if ($add_produk == 'success') {
        echo "
        <div class='alert alert-success'>Berhasil Menambahkan Produk ! </div>
        <meta http-equiv='refresh' content='0;url=index.php?halaman=produk'>";
    } else {
        echo "<script>alert('Gagal Tambah Produk ! ');</script>";
    }
}
?>