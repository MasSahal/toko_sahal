<?php
$id = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id'");
if ($hapus == 'success') {
    echo"<script>alert('Berhasil Menghapus Pelangan ! ');</script>";
    echo"<script>location='index.php?halaman=pelanggan';</script>";
}else{
    echo"<script>alert('Gagal Menghapus Pelangan ! ');</script>";
}
?>