<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
$data = $ambil->fetch_assoc();

//Hapus Foto
$foto_produk = $data['foto_produk'];
if (file_exists("../foto_produk/$foto_produk")) {
    unlink("../foto_produk/$foto_produk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$id'");
echo"<script>alert('Produk Dihapus ! ');</script>";
echo"<script>location='index.php?halaman=produk';</script>";