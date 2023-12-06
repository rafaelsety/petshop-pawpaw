-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 16.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `akses_menu_user`
--

CREATE TABLE `akses_menu_user` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(11) NOT NULL,
  `menu_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akses_menu_user`
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
(9, 'Kasir', '2'),
(10, 'Kasir', '3'),
(11, 'Kasir', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_produk` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_produk`, `id_kategori`, `nama_produk`, `merk`, `harga_beli`, `harga_jual`, `satuan_produk`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, 'Pensil', 'Fabel Castel', '1500', '3000', 'PCS', '98', '6 October 2020, 0:41', NULL),
(2, 'BR002', 5, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '38', '6 October 2020, 0:41', '6 October 2020, 0:54'),
(3, 'BR003', 1, 'Pulpen', 'Standard', '1500', '2000', 'PCS', '70', '6 October 2020, 1:34', NULL),
(4, 'BR004', 1, 'Penghapus', 'Joyko', '1000', '2000', 'PCS', '7', '6 October 2020, 1:34', NULL),
(5, 'BR005', 1, 'Tipe-x', 'Joyko', '2000', '5000', 'PCS', '6', '6 October 2020, 1:34', NULL),
(6, 'BR006', 1, 'Klip', 'Clip', '500', '1000', 'PCS', '6', '6 October 2020, 1:34', NULL),
(7, 'BR007', 1, 'Lem', 'Fox', '5000', '7000', 'PCS', '19', '6 October 2020, 1:34', NULL),
(8, 'BR008', 1, 'Buku Tulis', 'SIDU', '2000', '3000', 'PCS', '3', '6 October 2020, 1:34', NULL),
(9, 'BR010', 1, 'Spidol', 'Snowman', '1000', '2000', 'PCS', '10', '6 October 2020, 1:34', NULL),
(10, 'BR011', 1, 'Kuas', 'Spot', '2000', '3000', 'PCS', '28', '6 October 2020, 1:34', NULL),
(12, 'BR013', 1, 'Buku Gambar', 'Sidu', '4000', '5000', 'PCS', '3', '6 October 2020, 1:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Fauzan Falah', 'uj harapan', '081234567890', 'example@gmail.com', 'unnamed.jpg', '12314121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV Daruttaqwa', 'Ujung Harapan', '081234567890', 'Fauzan Falah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `gambar`, `nik`, `password`, `jabatan`, `no_hp_user`, `status`, `tanggal_masuk`) VALUES
(1, 'rafaek', '123raf', 'default.jpg', '123', '$2y$10$Cikxn9Qb8wXmhbHbtKhZLebLhZv4kTRoTiIvERzNJnNNzlz6eG656', 'Pemilik', 0, '1', 1701267319),
(2, 'Sendoh', '124sen', 'default.jpg', '123', '$2y$10$Z0VWKZTvQfwc1QLydya49.LjtdmvRQWA7fzl.GGKJau5Q7KzznWma', 'Kasir', 0, '1', 1701274460);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'Dashboard', 'dashboard/dashpemilik', 'fas fa-fw fa-columns', 1),
(2, 'Produk', 'produk', 'fas fa-fw fa-database', 1),
(3, 'Transaksi', 'transaksi', 'fas fa-fw fa-table', 1),
(4, 'Kasir', 'kasir', 'fas fa-fw fa-cash-register', 1),
(5, 'Manajemen', 'manajemen', 'fas fa-fw fa-users-cog', 1),
(9, 'Dashboard', 'dashboard/dashpengelola', 'fas fa-fw fa-columns', 1),
(10, 'Dashboard', 'dashboard/dashkasir', 'fas fa-fw fa-columns', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
