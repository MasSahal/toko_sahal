<?php
include('koneksi.php');
$id = $_GET['id'];
$koneksi->query("UPDATE pembelian SET status_pembelian='Diterima' WHERE id_pembelian='$id'");
echo"<meta http-equiv='refresh' content='0;url=riwayat_pembelian.php?id=12.php'>";
?>