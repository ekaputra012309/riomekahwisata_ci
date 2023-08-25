-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 04:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riomekahwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jamaah`
--

CREATE TABLE `tbl_jamaah` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nomor_ktp` int(16) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `handphone` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `no_passport` varchar(100) DEFAULT NULL,
  `tgl_dikeluarkan` date DEFAULT NULL,
  `tempat_dikeluarkan` varchar(100) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `nama_marham` varchar(100) DEFAULT NULL,
  `hub_marham` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `gol_darah` varchar(5) DEFAULT NULL,
  `baju` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='datatable jamaah table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id`, `kategori`, `nama_paket`, `create_at`) VALUES
(1, 'Haji', 'Haji VVIP', '2023-08-25 10:12:12'),
(2, 'Haji', 'Haji Furoda', '2023-08-25 10:13:42'),
(3, 'Haji', 'Haji Reguler', '2023-08-25 10:14:02'),
(4, 'Umroh', 'Umroh 9 hari', '2023-08-25 10:14:18'),
(5, 'Umroh', 'Umroh + taif 13 hari', '2023-08-25 10:14:42'),
(6, 'Umroh', 'Umroh + kairo mesir 15 hari', '2023-08-25 10:20:56'),
(7, 'Umroh', 'Umroh + turki 15 hari', '2023-08-25 10:21:27'),
(8, 'Umroh', 'Umroh + dubai 15 hari', '2023-08-25 10:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id`, `logo`, `nama`, `alias`, `alamat`, `deskripsi`, `created_at`) VALUES
(1, '1692950519_7e80c824a1117273a166.png', 'PT. RIO MEKAH WISATA', 'RMW', 'di isi alamat', 'di isi deskripsi', '2023-08-25 08:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varbinary(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `fullname`, `email`, `pass`, `phone`, `photo`, `created_at`) VALUES
(1, 'admin', 'admin pt rio', 'admin@gmail.com', 0x2432792431302448506472693370416c534b6f624d4b425933664e574f5a414a6e4f6e4474374a4a4c2e5477636449356576555147307949586f5661, '088776666554', '1692950188_4011c13b6a7aeefe25e4.png', '2023-08-25 07:56:28'),
(2, 'agus', 'agus pra', 'agus@gmail.com', 0x24327924313024435652646d472f527958426259666b794c435079394f5a3349564e46726d3147584870343951344c45367a78716a754e33426e634f, '087777777777', '1692951784_b4f509439d49b133ae5f.png', '2023-08-25 08:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jamaah`
--
ALTER TABLE `tbl_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jamaah`
--
ALTER TABLE `tbl_jamaah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
