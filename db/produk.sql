-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2023 pada 12.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
