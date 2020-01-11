-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 05:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_sahal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Akun Admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Mas Sahal'),
(2, 'user', 'user', 'Abu Sahl');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `kurir`, `tarif`) VALUES
(1, 'Bandung', 'JNE Same Day 1 Hari', 20000),
(2, 'Jakarta', 'JNE Chargo > 30 Kg 2-4 Hari', 52000),
(3, 'Jakarta', 'J&T Same Day 1-2 Hari', 17000),
(4, 'Jakarta', 'J&T Express 2-3 Hari', 20000),
(5, 'Jakarta', 'JNE Reguler 3-4 Hari', 11000),
(6, 'Jakarta', 'J&T Reguler 3-4 Hari', 11000),
(7, 'Jakarta', 'TIKI Ekspress 2-4 Hari', 12000),
(8, 'Jakarta', 'Pos Kilat Khusus 2-4 Hari', 10000),
(9, 'Jakarta', 'Wahana Ekspress 3-5 Hari', 8000),
(10, 'Jakarta', 'Indah Chargo > 30kg 3-5 Hari', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(9, 'sahal@localhost.com', 'e517abcdbf397a6311d7a9ba18b0ddb5', 'Sahal', '08543573458'),
(10, 'zahrina@localhost.com', '789eff097b162a08ea529d580879d8a2', 'Zahrina Nurpuriani', '083293934934'),
(11, 'usamah@localhost.com', 'bb8d20b6f2e6180d1d400113321333e9', 'Usamah', '08342343223'),
(12, 'massahal@localhost.com', '7ae3295ab87e7639a84346d8211f9eb2', 'Mas Sahal', '085795567332'),
(13, 'sitimusyarofah@localhost.com', '1a2cce00e74e8aeae85a1961ecfacc33', 'Siti Musyarofah', '083423434323'),
(14, 'danuarta@localhost.com', 'd9fa97a3d944da60f221b4f0378fce4a', 'Syawaluddin Danuarta', '08543576690'),
(15, 'admin@localhost.com', '202cb962ac59075b964b07152d234b70', 'siswa', '08543573458'),
(19, 'abusahl444@gmail.com', '202cb962ac59075b964b07152d234b70', 'siswa', '08543573458');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status_pembelian` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `alamat_pengiriman`, `kurir`, `tarif`, `status_pembelian`) VALUES
(1, 9, 1, '2019-12-27', 10520000, 'Cirebon', 'SDI Umar Bin Alkhattab,Jl. Sunan Gunung Jati, Desa Grogol, Kecamatan Gunung Jati , Kabupaten Cirebon Depan UPT Gunung Jati\r\nKAB. CIREBON - GUNUNG JATI (CIREBON UTARA)\r\nJAWA BARAT\r\nID 45151', 'JNE Same Day 1 Hari', 20000, 'Dibayar'),
(2, 12, 5, '2019-12-27', 10511000, 'Cirebon', 'SDI Umar Bin Alkhattab,Jl. Sunan Gunung Jati, Desa Grogol, Kecamatan Gunung Jati , Kabupaten Cirebon Depan UPT Gunung Jati\r\nKAB. CIREBON - GUNUNG JATI (CIREBON UTARA)\r\nJAWA BARAT\r\nID 45151', 'JNE Reguler 3-4 Hari', 11000, 'Diterima'),
(3, 10, 4, '2019-12-27', 18020000, 'Cirebon', 'Jln Dr Ciptomangunkusumo', 'J&T Express 2-3 Hari', 20000, 'Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 35, 1, 'CCTV 10 Kamera', 10500000, 10000, 10000, 10500000),
(2, 2, 35, 1, 'CCTV 10 Kamera', 10500000, 10000, 10000, 10500000),
(3, 3, 43, 1, 'Paket Internet 1Gbps', 18000000, 1000, 1000, 18000000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(34, 'CCTV 16 Kamera', 16000000, 16000, 'Paket-CCTV-Hikvision-4-Ch-600x600.jpg', 'Paket CCTV 16 Kamera 10 Outdoor, 6 Indoor Serta DVR'),
(35, 'CCTV 10 Kamera', 10500000, 10000, 'Paket-CCTV-Hikvision-10-Ch-600x600.jpg', 'Paket CCTV 6 Kamera Outdoor, 4 Kamera Indoor dan DVR'),
(36, 'CCTV 20 Kamera', 19000000, 19000, 'Paket-CCTV-Hikvision-20-Ch-600x600.jpg', 'Paket CCTV 20 Kamera 14 Outdoor, 6 Indoor Serta DVR'),
(37, 'CCTV 5 Kamera', 6500000, 5500, 'Paket-CCTV-Hikvision-5-Ch-600x600.jpg', 'Paket CCTV 5 Kamera 3 Outdoor, 2 Indoor Serta DVR'),
(38, 'Sepatu Gunung YN01', 450000, 1200, '9409fd395aef6c95ae99b74d8f2d5c3c.jfif', 'Sepatu Co-Trek Ukuran 39-44'),
(39, 'Sepatu Gunung YN02', 550000, 1300, 'f9dbff6632981f9a04c7b3ee25077f14.jfif', 'Sepatu Co-Trek Ukuran 39-44'),
(40, 'Sepatu Gunung YN03', 550000, 1250, '23753220_B.jpg', 'Sepatu Co-Trek Ukuran 39-44'),
(41, 'Sepatu Gunung YN04', 399900, 1000, '0281c65efc3330ead4edcf2df324d011.jfif', 'Sepatu Co-Trek Ukuran 39-44'),
(42, 'CCTV Wireless', 2500000, 1000, 'wifi-ip-camera-cctv-1-or-4-inch-2mp-1080p-solar-panel-power-white-1.jpg', 'CCTV Wireless 720p dengan Panel Surya 20Mp'),
(43, 'Paket Internet 1Gbps', 18000000, 1000, 'paket wifi3.jpg', 'Paket Internet Super Ngebut 1Gbps unlimited tanpa FUP'),
(44, 'Netflix 1 Bulan', 150000, 500, 'netflix-1-bulan.jpg', 'Netflix Premium 1Bulan'),
(45, 'Biznet 40mbps', 480000, 1000, 'W3OpgzF3_400x400.png', 'Biznet 1 Bulan speed 40mbps unlimited kuota tanpa FUP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
