-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 04:54 AM
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
(1, 'cemerlang/beban/2023/1', '2023-04-14', 'beban listrik', '50000');

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
(4, '401', 'penjualan', '411'),
(6, '310', 'modal usaha', '311'),
(7, '510', 'beban gaji', '511'),
(8, '511', 'beban listrik', '511'),
(9, '512', 'beban air', '511'),
(10, '513', 'beban peralatan', '511'),
(11, '102', 'persediaan barang dagang', '111'),
(12, '500', 'pembelian', '511'),
(13, '501', 'retur pembelian', '511'),
(14, '402', 'potongan penjualan', '411');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_unit` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `kode_obat`, `name`, `id_unit`, `stock`) VALUES
(1, 'OB1', 'Sanmol', '4', 329),
(2, 'OB2', 'Konidin', '8', 50),
(3, 'OB3', 'Panacilin', '8', 208),
(4, 'OB4', 'Become-C ', '4', -30),
(5, 'OB5', 'Rohto Cool Eye Drop 7 ml', '3', 18),
(0, '', 'Sanmol Strip 4 Tablet', '', 50),
(0, '', 'Become-C Tablet', '', 20),
(0, '', 'Sanmol Strip 4 Tablet', '', 50),
(0, '', 'Become-C Tablet', '', 20);

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
(1, 9, '101', '2023-03-03', 'debet', 100000),
(2, 9, '500', '2023-03-03', 'kredit', 100000),
(5, 1, '101', '2023-03-25', 'debet', 10000000),
(6, 1, '401', '2023-03-25', 'kredit', 10000000),
(15, 3, '101', '2023-04-14', 'debet', 10000),
(16, 3, '501', '2023-04-14', 'kredit', 10000),
(17, 12, '101', '2023-04-14', 'debet', 25000),
(18, 12, '401', '2023-04-14', 'kredit', 25000),
(19, 4, '101', '2023-04-14', 'debet', 10000),
(20, 4, '501', '2023-04-14', 'kredit', 10000),
(21, 1, '101', '2023-04-14', 'debet', 50000),
(22, 1, '401', '2023-04-14', 'kredit', 50000),
(23, 2, '101', '2023-05-07', 'debet', 500000),
(24, 2, '401', '2023-05-07', 'kredit', 500000),
(25, 3, '101', '2023-05-07', 'debet', 100000),
(26, 3, '401', '2023-05-07', 'kredit', 100000),
(27, 4, '101', '2023-05-07', 'debet', 200000),
(28, 4, '401', '2023-05-07', 'kredit', 200000),
(29, 5, '101', '2023-05-07', 'debet', 50000),
(30, 5, '401', '2023-05-07', 'kredit', 50000),
(31, 11, '101', '2023-05-14', 'debet', 50000),
(32, 11, '500', '2023-05-14', 'kredit', 50000),
(33, 12, '101', '2023-05-31', 'debet', 200000),
(34, 12, '500', '2023-05-31', 'kredit', 200000),
(35, 13, '101', '2023-05-31', 'debet', 15000),
(36, 13, '401', '2023-05-31', 'kredit', 15000),
(37, 5, '101', '2023-05-31', 'debet', 100000),
(38, 5, '501', '2023-05-31', 'kredit', 100000),
(39, 6, '101', '2023-05-31', 'debet', 100000),
(40, 6, '501', '2023-05-31', 'kredit', 100000),
(41, 14, '101', '2023-06-15', 'debet', 12000),
(42, 14, '401', '2023-06-15', 'kredit', 12000),
(43, 7, '101', '2023-06-15', 'debet', 30000),
(44, 7, '501', '2023-06-15', 'kredit', 30000),
(45, 13, '101', '2023-06-28', 'debet', 180000),
(46, 13, '500', '2023-06-28', 'kredit', 180000),
(47, 15, '101', '2023-06-28', 'debet', 14000),
(48, 15, '400', '2023-06-28', 'kredit', 14000),
(49, 14, '101', '2023-06-28', 'debet', 100000),
(50, 14, '500', '2023-06-28', 'kredit', 100000),
(51, 16, '101', '2023-06-28', 'debet', 12000),
(52, 16, '400', '2023-06-28', 'kredit', 12000);

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
(2, 'cemerlang/modal/2023/2', '2023-05-07', 'bertambah', '500000'),
(3, 'cemerlang/modal/2023/3', '2023-05-07', 'bertambah', '100000'),
(4, 'cemerlang/modal/2023/4', '2023-05-07', 'berkurang', '200000'),
(5, 'cemerlang/modal/2023/5', '2023-05-07', 'berkurang', '50000');

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
(11, 'cemerlang/pembelian/2023/3', '4', 10, '2023-05-14', '50000', 5000),
(12, 'cemerlang/pembelian/2023/4', '5', 20, '2023-05-31', '200000', 10000),
(9, 'cemerlang/pembelian/2023/2', '1', 20, '2023-03-03', '100000', 5000),
(13, 'cemerlang/pembelian/2023/5', '4', 30, '2023-06-28', '180000', 6000),
(14, 'cemerlang/pembelian/2023/6', '5', 20, '2023-06-28', '100000', 5000);

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

--
-- Dumping data for table `purchase_return`
--

INSERT INTO `purchase_return` (`id`, `nota_num`, `id_drug`, `qty`, `date`, `total`, `harga_retur_pembelian`) VALUES
(3, 'cemerlang/retur_pembelian/2023/2', '1', 2, '2023-04-14', '10000', 5),
(5, 'cemerlang/retur_pembelian/2023/3', '1', 20, '2023-05-31', '100000', 5),
(6, 'cemerlang/retur_pembelian/2023/4', '1', 20, '2023-05-31', '100000', 5),
(7, 'cemerlang/retur_pembelian/2023/5', '1', 10, '2023-06-15', '30000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `receivable`
--

CREATE TABLE `receivable` (
  `no_re` int(11) NOT NULL,
  `re_date` date NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `nominal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivable`
--

INSERT INTO `receivable` (`no_re`, `re_date`, `debit`, `credit`, `catatan`, `nominal`) VALUES
(1, '2023-01-30', '1-10001 Kas', '1-10001 Kas', 'Hutang usaha', '15000000'),
(1, '2023-01-30', '1-10001 Kas', '1-10001 Kas', 'Hutang usaha', '15000000');

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
(13, 'cemerlang/penjualan/2023/5', '1', 2, '2023-05-31', '15000', 8),
(12, 'cemerlang/penjualan/2023/4', '1', 5, '2023-04-14', '25000', 5),
(14, 'cemerlang/penjualan/2023/6', '1', 2, '2023-06-15', '12000', 6),
(15, 'cemerlang/penjualan/2023/7', '1', 2, '2023-06-28', '14000', 7000),
(16, 'cemerlang/penjualan/2023/8', '5', 2, '2023-06-28', '12000', 6000);

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
(12, 'PT Combiphar', '022-6809129', 'Jl. Raya Simpang 383 Padalarang'),
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
(6, 'kotak');

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
-- Indexes for table `receivable`
--
ALTER TABLE `receivable`
  ADD KEY `no_re` (`no_re`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
  MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
