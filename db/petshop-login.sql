-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu_user`
--

CREATE TABLE `akses_menu_user` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(11) NOT NULL,
  `menu_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akses_menu_user`
--

INSERT INTO `akses_menu_user` (`id`, `jabatan`, `menu_id`) VALUES
(1, 'Pemilik', '1'),
(2, 'Pemilik', '2'),
(3, 'Pemilik', '3'),
(4, 'Pemilik', '5'),
(5, 'Pengelola', '9'),
(6, 'Pengelola', '2'),
(7, 'Pengelola', '3'),
(8, 'Kasir', '10'),
(9, 'Kasir', '11'),
(10, 'Kasir', '3'),
(11, 'Kasir', '4');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_transaksi` varchar(20) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `harga_produk` varchar(20) NOT NULL,
  `jenis_hewan` varchar(20) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `sub_total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_transaksi`, `nama_produk`, `kode_produk`, `harga_produk`, `jenis_hewan`, `jumlah_produk`, `sub_total`) VALUES
('PJ1702353633', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 2, '20000'),
('PJ1702353633', 'Gunting Kuku', 'AK002', '10000', 'Anjing', 1, '10000'),
('PJ1702355577', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702355701', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702355712', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702355828', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702355976', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702356025', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702356213', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702356353', 'Gunting Kuku', 'AK001', '10000', 'Kucing', 1, '10000'),
('PJ1702525119', 'coba', 'AK020', '2000', 'Kucing', 1, '2000'),
('PJ1702525119', 'coba', 'AK020', '2000', 'Kucing', 1, '2000');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `kd_produk` int(10) NOT NULL,
  `nama_produk` varchar(256) NOT NULL,
  `bnyk_unit` int(50) NOT NULL,
  `harga` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(256) NOT NULL,
  `jenis_hewan` varchar(50) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `stok` int(100) NOT NULL,
  `berat_bersih` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `jenis_hewan`, `kategori_produk`, `stok`, `berat_bersih`, `harga`, `gambar`) VALUES
('AK001', 'Gunting Kuku', 'Kucing', 'Aksesoris', 25, '-', 10000, 'gunting kuku kucing_anjing.jpeg'),
('AK002', 'Gunting Kuku', 'Anjing', 'Aksesoris', 25, '-', 10000, 'gunting kuku kucing_anjing.jpeg'),
('AK003', 'Tempat Makan & Minum Plastik', 'Kucing', 'Aksesoris', 5, '-', 55000, 'Tempat makan_minum kucing.jpeg'),
('AK004', 'Tempat Makan & Minum Plastik', 'Anjing', 'Aksesoris', 10, '-', 55000, 'Tempat makan_minum kucing.jpeg'),
('AK005', 'Tempat Makan & Minum Stainless', 'Kucing', 'Aksesoris', 20, '-', 65000, 'Tempat Makan_Minum anjing.jpg'),
('AK006', 'Tempat Makan & Minum Stainless', 'Anjing', 'Aksesoris', 20, '-', 65000, 'Tempat Makan_Minum anjing.jpg'),
('AK007', 'Litter Box (Box Pasir)', 'Kucing', 'Aksesoris', 50, '-', 20000, 'little box.jpeg'),
('AK008', 'Litter Box (Box Pasir)', 'Anjing', 'Aksesoris', 50, '-', 20000, 'little box.jpeg'),
('AK009', 'Sapu & Pengki', 'Kucing', 'Aksesoris', 50, '-', 7000, 'Sapu _ Pengki pembersih kotoran.jpeg'),
('AK010', 'Sapu & Pengki', 'Anjing', 'Aksesoris', 50, '-', 7000, 'Sapu _ Pengki pembersih kotoran.jpeg'),
('AK011', 'Kandang Hewan', 'Kucing', 'Aksesoris', 15, '-', 70000, 'Kandang.jpeg'),
('AK012', 'Kandang Hewan', 'Anjing', 'Aksesoris', 15, '-', 70000, 'Kandang.jpeg'),
('AK013', 'Kalung', 'Kucing', 'Aksesoris', 100, '-', 5000, 'Kalung kucing_anjing.jpeg'),
('AK014', 'Kalung', 'Anjing', 'Aksesoris', 100, '-', 5000, 'Kalung kucing_anjing.jpeg'),
('AK015', 'Shampoo Kucing', 'Kucing', 'Aksesoris', 20, '100 ml', 20000, 'sampo kucing.jpeg'),
('AK016', 'Shampoo Anjing', 'Anjing', 'Aksesoris', 10, '100 ml', 35000, 'sampo anjing.jpeg'),
('AK017', 'Pasir', 'Kucing', 'Aksesoris', 25, '25 L', 25000, 'pasir kucing.jpeg'),
('AK018', 'Sisir', 'Kucing', 'Aksesoris', 50, '-', 18000, 'sisir kucing_anjing.jpeg'),
('AK019', 'Sisir', 'Anjing', 'Aksesoris', 50, '-', 18000, 'sisir kucing_anjing.jpeg'),
('AK020', 'coba', 'Kucing', 'Aksesoris', 1, '-', 2000, 'img1702524063.png'),
('AK15', 'wqwqw', 'Anjing', 'Aksesoris', 50, '1 kg', 18000, 'default.jpg'),
('M001', 'Mainan Kucing Tikus', 'Kucing', 'Mainan', 50, '-', 7.5, 'Mainan Kucing Tikus.png'),
('M002', 'Play Toy With Circuit Ball With Scratch Pad', 'Kucing', 'Mainan', 30, '-', 85, 'Play Toy With Circuit Ball With Scratch Pad.png'),
('M003', 'Play Toy Tower', 'Kucing', 'Mainan', 60, '-', 54, 'Play Toy Tower.png'),
('M004', 'Doll Fish', 'Kucing', 'Mainan', 55, '-', 28, 'doll fish.jpeg'),
('M005', 'Mainan Terowongan Lipat Tunnel 1 Arah', 'Kucing', 'Mainan', 45, '-', 70, 'Mainan Terowongan Lipat Tunnel 1 Arah.png'),
('M006', 'Small Bell Rubbe Ball', 'Anjing', 'Mainan', 65, '-', 9, 'Small Bell Rubbe Ball.jpg'),
('M007', 'Silicone Frisbee Dog Toys', 'Anjing', 'Mainan', 36, '-', 11, 'Silicone Frisbee Dog Toys.png'),
('M008', 'Plush Toys Squeaky', 'Anjing', 'Mainan', 25, '-', 25, 'Plush Toys Squeaky.jpg'),
('M009', 'Bel Pengumpan Makanan', 'Kucing', 'Mainan', 60, '-', 10, 'Bel Pengumpan Makanan.jpeg'),
('M010', 'Bel Pengumpan Makanan', 'Anjing', 'Mainan', 60, '-', 10, 'Bel Pengumpan Makanan.jpeg'),
('M011', 'Dog Rope Toy', 'Kucing', 'Mainan', 29, '-', 10, 'Dog Rope Toy.jpg'),
('MK001', 'Royal Canin', 'Kucing', 'Makanan', 50, '400 gr', 150000, 'royal canin.jpeg'),
('MK002', 'Bolt', 'Kucing', 'Makanan', 85, '8 kg', 140000, 'bolt.jpeg'),
('MK003', 'Excel', 'Kucing', 'Makanan', 100, '500 gr', 15000, 'excel.jpeg'),
('MK004', 'Cat Choize', 'Kucing', 'Makanan', 50, '800 gr', 25000, 'cat choize.jpeg'),
('MK005', 'Whiskas', 'Kucing', 'Makanan', 30, '1 kg', 70000, 'whiskas.jpeg'),
('MK006', 'Equilibrio', 'Anjing', 'Makanan', 25, '2 kg', 160000, 'Equilibrio.jpeg'),
('MK007', 'Happy Dog', 'Anjing', 'Makanan', 45, '1 kg', 80000, 'Happy dog.jpeg'),
('MK008', 'Dog Choize', 'Anjing', 'Makanan', 100, '800 gr', 20000, 'Dog choize.jpeg'),
('MK009', 'Nice', 'Anjing', 'Makanan', 50, '1 kg', 25000, 'nice.jpeg'),
('MK010', 'Pedigree', 'Anjing', 'Makanan', 26, '1 kg', 30000, 'Pedigree.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV Daruttaqwa', 'Ujung Harapan', '081234567890', 'Fauzan Falah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(20) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `tgl_transaksi` varchar(20) DEFAULT NULL,
  `jam_transaksi` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `username`, `tgl_transaksi`, `jam_transaksi`, `total`) VALUES
(18, 'PJ1702353633', 'Sendoh', '12/12/2023', '11:00:33', 30000),
(19, 'PJ1702355577', 'Sendoh', '12/12/2023', '11:32:57', 10000),
(20, 'PJ1702355701', 'Sendoh', '12/12/2023', '11:35:01', 10000),
(21, 'PJ1702355712', 'Sendoh', '12/12/2023', '11:35:12', 10000),
(22, 'PJ1702355828', 'Sendoh', '12/12/2023', '11:37:08', 10000),
(23, 'PJ1702355976', 'Sendoh', '12/12/2023', '11:39:36', 10000),
(24, 'PJ1702356025', 'Sendoh', '12/12/2023', '11:40:25', 10000),
(25, 'PJ1702356213', 'Sendoh', '12/12/2023', '11:43:33', 10000),
(26, 'PJ1702356353', 'Sendoh', '12/12/2023', '11:45:53', 10000),
(29, 'PJ1702525119', 'Sendoh', '14/12/2023', '10:38:39', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `jabatan` varchar(11) NOT NULL,
  `no_hp_user` int(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `gambar`, `nik`, `password`, `jabatan`, `no_hp_user`, `status`, `tanggal_masuk`) VALUES
(1, 'rafaek', '123raf', 'default.jpg', '123', '123456', 'Pemilik', 0, '1', 1701267319),
(2, 'Sendoh', '124sen', 'default.jpg', '123', '12345', 'Kasir', 0, '1', 1701274460),
(3, 'faf', 'pengg', '', '3201292806040004', '1234', 'Pengelola', 0, '1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'Dashboard', 'dashboard/dashpemilik', 'fas fa-fw fa-columns', 1),
(2, 'Produk', 'produk', 'fas fa-fw fa-database', 1),
(3, 'Transaksi', 'transaksi', 'fas fa-fw fa-table', 1),
(4, 'Kasir', 'kasir', 'fas fa-fw fa-cash-register', 1),
(5, 'Manajemen ', 'manajemen', 'fas fa-fw fa-users-cog', 1),
(9, 'Dashboard', 'dashboard/dashpengelola', 'fas fa-fw fa-columns', 1),
(10, 'Dashboard', 'dashboard/dashkasir', 'fas fa-fw fa-columns', 1),
(11, 'Produk', 'produk/produk_kasir', 'fas fa-fw fa-database', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
