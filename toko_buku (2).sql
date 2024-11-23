-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `databuku` ()   SELECT * FROM buku$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `noisbn` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `gambar`) VALUES
(5, 'FAIRY TAIL', 1214, 'nasaki', 'gramedia', 2006, 94, 30000, 45000, '329-224-images (3).jpeg'),
(6, 'record of ragnarok', 1214, 'Shinya Umemura', 'gramedia', 2017, 100, 34000, 40000, '209-ror1.jpg'),
(7, 'yotsuba to!', 1214, ' Kiyohiko Azuma', 'gramedia', 2003, 59, 25000, 40000, '948-Yotsuba&_01_Ina_(1).jpg'),
(8, 'gintama', 1214, 'Hideaki Sorachi', 'gramedia', 2007, 110, 30000, 45000, 'gintama.jpeg'),
(10, 'kimetsu no yaiba', 1214, 'Shinya Umemura', 'gramedia', 2016, 75, 35000, 45000, 'kimetsu.jpg'),
(11, 'uzumaki junji ito', 1214, 'Junji Ito', 'gramedia', 1999, 25, 50000, 68000, 'JACKET_COV-_UZUMAKI_INA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_buku`, `jumlah`, `harga`, `total`) VALUES
(1, 2, 5, 1, 20000, 20000),
(2, 3, 5, 1, 20000, 20000),
(3, 4, 5, 1, 20000, 20000),
(4, 5, 7, 2, 40000, 80000),
(5, 5, 6, 1, 40000, 40000),
(6, 6, 7, 2, 40000, 80000),
(7, 6, 6, 1, 40000, 40000),
(8, 7, 7, 1, 40000, 40000),
(9, 8, 7, 1, 40000, 40000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE buku set stok=stok-NEW.jumlah
WHERE id_buku=NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(2, 'david', 'klojen', '08239283493');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` int(11) DEFAULT NULL,
  `status` varchar(59) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','pegawai','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `level`) VALUES
(5, 'David Deka Maulana', 'klojen', 2147483647, 'Admin', 'admin', '8b6bc5d8046c8466359d3ac43ce362ab', 'admin'),
(16, 'Andia Alsha', 'polowijen', 12, 'Admin', 'pegawai', '1cdac5ad084879e80e5b67c51baa9095', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(1, 2, 5, '2', '2024-02-01'),
(3, 2, 6, '10', '2024-06-01'),
(4, 2, 6, '10', '2024-06-04'),
(6, 2, 7, '10', '2024-06-06'),
(7, 2, 8, '10', '2024-11-11');

--
-- Triggers `pasok`
--
DELIMITER $$
CREATE TRIGGER `tambah_pasok` AFTER INSERT ON `pasok` FOR EACH ROW BEGIN
UPDATE buku set stok=stok+new.jumlah
WHERE id_buku=new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_kasir`, `total`, `tanggal`) VALUES
(3, 5, '20000', '2024-06-04'),
(4, 5, '20000', '2024-06-04'),
(6, 5, '120000', '2024-06-04'),
(7, 5, '40000', '2024-06-04'),
(8, 5, '40000', '2024-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan2`
--

CREATE TABLE `penjualan2` (
  `id_buku` int(11) NOT NULL,
  `kasir` int(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan2`
--

INSERT INTO `penjualan2` (`id_buku`, `kasir`, `jumlah`, `total`, `tanggal`) VALUES
(1, 0, 2, 0, '2024-05-26'),
(2, 0, 2, 0, '2024-05-26'),
(3, 0, 4, 0, '2024-05-29'),
(5, 0, 4, 0, '2024-06-01'),
(6, 0, 4, 0, '2024-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan2`
--
ALTER TABLE `penjualan2`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan2`
--
ALTER TABLE `penjualan2`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pasok_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
