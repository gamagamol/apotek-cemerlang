-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 12:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `nama_beban` varchar(64) NOT NULL,
  `total` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id`, `nota_num`, `date`, `nama_beban`, `total`) VALUES
(9, 'cemerlang/beban/2023/1', '2023-06-30', 'beban listrik', '500000'),
(10, 'cemerlang/beban/2023/2', '2023-08-07', 'beban listrik', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `id_coa` int(11) NOT NULL,
  `kode_coa` varchar(50) DEFAULT NULL,
  `nama_coa` varchar(45) DEFAULT NULL,
  `header_coa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`id_coa`, `kode_coa`, `nama_coa`, `header_coa`) VALUES
(1, '101', 'kas', '111'),
(4, '400', 'penjualan', '411'),
(6, '310', 'modal ', '311'),
(7, '510', 'beban gaji', '511'),
(8, '511', 'beban listrik & telepon', '511'),
(9, '512', 'beban air', '511'),
(10, '513', 'beban perlengkapan', '511'),
(13, '501', 'retur pembelian', '511'),
(16, '102', 'persediaan obat', '111'),
(17, '503', 'HPP', '511');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_unit` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `kode_obat`, `name`, `id_unit`, `stock`, `id_supplier`) VALUES
(1, 'OB1', 'Sanmol', '4', 417, 11),
(2, 'OB2', 'Konidin', '8', 50, 11),
(3, 'OB3', 'Panacilin', '8', 208, 11),
(4, 'OB4', 'Become-C ', '4', 30, 11),
(5, 'OB5', 'Rohto Cool Eye Drop 7 ml', '3', 18, 11),
(14, 'OB6', 'Betadine', '3', 24, 12),
(15, 'OB7', 'Diprogenta salep kulit', '5', 2, 12),
(16, 'OB8', 'Cendo salep mata', '5', 10, 12),
(17, 'OB9', 'Cendo xitrol drops', '6', 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `kode_coa` char(15) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `posisi_dr_cr` varchar(6) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_transaksi`, `kode_coa`, `tgl_jurnal`, `posisi_dr_cr`, `nominal`) VALUES
(207, 68, '102', '2023-08-17', 'debet', 40000),
(208, 68, '101', '2023-08-17', 'kredit', 40000),
(209, 56, '101', '2023-08-17', 'debet', 12000),
(210, 56, '400', '2023-08-17', 'kredit', 12000),
(211, 56, '503', '2023-08-17', 'debet', 0),
(212, 56, '102', '2023-08-17', 'kredit', 0),
(213, 70, '102', '2023-08-17', 'debet', 30000),
(214, 70, '101', '2023-08-17', 'kredit', 30000),
(215, 57, '101', '2023-08-17', 'debet', 7000),
(216, 57, '400', '2023-08-17', 'kredit', 7000),
(217, 57, '503', '2023-08-17', 'debet', 0),
(218, 57, '102', '2023-08-17', 'kredit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `nama_modal` varchar(64) NOT NULL,
  `total` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id`, `nota_num`, `date`, `nama_modal`, `total`) VALUES
(1, 'cemerlang/modal/2023/1', '2023-03-25', 'modal_awal', '10000000'),
(6, 'cemerlang/modal/2023/2', '2023-05-01', 'bertambah', '5000000'),
(7, 'cemerlang/modal/2023/3', '2023-08-07', 'bertambah', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(100) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL,
  `harga_pembelian` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `nota_num`, `id_drug`, `qty`, `date`, `total`, `harga_pembelian`) VALUES
(70, 'cemerlang/pembelian/2023/2', '14', 5, '2023-08-17', '30000', 6),
(69, 'cemerlang/pembelian/2023/1', '2', 5, '2023-08-17', '30000', 6),
(68, 'cemerlang/pembelian/2023/1', '1', 2, '2023-08-17', '10000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_drug` varchar(64) CHARACTER SET utf8 NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL,
  `harga_retur_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(100) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL,
  `harga_penjualan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nota_num`, `id_drug`, `qty`, `date`, `total`, `harga_penjualan`) VALUES
(57, 'cemerlang/penjualan/2023/2', '14', 1, '2023-08-17', '7000', 7),
(56, 'cemerlang/penjualan/2023/1', '1', 2, '2023-08-17', '12000', 6);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `hp`, `address`) VALUES
(14, 'PT Rohto Laboratories Indonesia', '022-6809742', 'Jl. Raya Cimareme 203 Padalarang'),
(15, 'PT Sanbe Farma ', '022-630036', 'Jl. Industri I No.9 Desa Utama, Leuwigajah Cimindi, Cimahi'),
(11, 'PT Dexa Medica ', '022-54416296', 'Jl. Cibolerang No.160, Margasuka, Kec. Babakan Ciparay, Bandung'),
(12, 'PT Combi Putra', '022-5407365', 'Jl. Terusan Holis N0.472'),
(13, 'PT Kimia Farma', '022-4204043', 'Jl. Cicendo No.43 Bandung'),
(22, 'PT Parit Padang Global', '022-5436829', 'Komp. Kopo Mas Regency Blok B No. 21-22, Margasuka, Babakan Ciparay, Bandung'),
(21, 'PT Kalbe Farma', '022-5407126', 'Jl. Soekarno Hatta No.344, Sukapura, Kiaracondong, Bandung'),
(23, 'PT Anugerah Pharmindo Lestari', '022-85440004', 'Jl. Terusan Holis Cibolerang No.2, RT.01/RW.10, Margahayu Utara, Kec. Babakan Ciparay, Bandung'),
(24, 'PT. Novartis Indonesia', '022-6047185', 'JL Terusan Holis, No. 466, Babakan Ciparay, Caringin, Kec. Bandung Kulon, Bandung'),
(25, 'PT Pharos Indonesia', '022-7316284', 'Jl. Permai Raya No. 25, Komplek Margahayu Permai, Margaasih, Kab. Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(3, 'botol'),
(4, 'strip'),
(5, 'tube'),
(6, 'fls');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`id_coa`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `kode_coa` (`kode_coa`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
  MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
