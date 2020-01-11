<?php 
$id = $_GET['id'];
$koneksi->query("UPDATE pembelian SET status_pembelian='Dibayar' WHERE id_pembelian='$id'");

echo"<meta http-equiv='refresh' content='0;url=index.php?halaman=pembelian'>";
?>