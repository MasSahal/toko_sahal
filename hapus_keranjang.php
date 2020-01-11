<?php
session_start();
$id_produk = $_GET['id'];
unset($_SESSION['keranjang'][$id_produk]);
?>
<script>
    alert('Produk Berhasil di hapus dari Keranjang');
    location='keranjang.php';
</script>