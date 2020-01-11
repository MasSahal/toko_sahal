<?php
session_start();
//mendapatkan id produk dari  url
$id_produk = $_GET['id'];

//jika sudah ada id produk di keranjang dan di klik lagi maka produk ditambah 1
if(isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] +=1;
}else{
    //jika produk blm ada di keranjang maka produk adalah 1
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Produk Berhasil Dimasukan ke Keranjang');</script>";
echo "<script>location='index.php';</script>"
?>
