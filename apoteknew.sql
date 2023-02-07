-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 06:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteknew`
--

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE `capital` (
  `no_cap` int(255) NOT NULL,
  `date` date NOT NULL,
  `debit` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `nominal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `capital`
--

INSERT INTO `capital` (`no_cap`, `date`, `debit`, `credit`, `catatan`, `nominal`) VALUES
(1, '2023-01-30', 'Modal Usaha', 'Modal Usaha', 'Modal Usaha', '15000000');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `kode_coa` int(5) NOT NULL,
  `nama_coa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

CREATE TABLE `debt` (
  `no_debt` int(255) NOT NULL,
  `debt_date` date NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `catatan_debt` text NOT NULL,
  `nominal_debt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debt`
--

INSERT INTO `debt` (`no_debt`, `debt_date`, `debit`, `credit`, `catatan_debt`, `nominal_debt`) VALUES
(1, '2023-01-29', 'kas', 'kas', 'hutang usaha', '1000000'),
(2, '2023-01-29', '5-50100 Hutang Usaha', '5-50100 Hutang Usaha', 'piutang', '1500000');

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
  `purchase_price` decimal(19,0) NOT NULL,
  `selling_price` decimal(19,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `kode_obat`, `name`, `id_unit`, `stock`, `purchase_price`, `selling_price`) VALUES
(1, 'OB1', 'Paramex', '8', 352, '8000', '10000'),
(2, 'OB2', 'Konidin', '8', 50, '3000', '5000'),
(3, 'OB3', 'Panacilin', '8', 208, '4000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `invoice_num` int(11) NOT NULL,
  `id_supplier` varchar(11) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `invoice_num`, `id_supplier`, `id_drug`, `qty`, `date`, `total`) VALUES
(5, 4, '1', '1', 500, '2020-06-04', '4000000'),
(3, 2, '1', '3', 208, '2020-06-03', '832000'),
(6, 5, '2', '1', 2, '2023-01-28', '16000');

-- --------------------------------------------------------

--
-- Table structure for table `receivable`
--

CREATE TABLE `receivable` (
  `no_re` int(255) NOT NULL,
  `re_date` date NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `nominal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receivable`
--

INSERT INTO `receivable` (`no_re`, `re_date`, `debit`, `credit`, `catatan`, `nominal`) VALUES
(1, '2023-01-30', '1-10001 Kas', '1-10001 Kas', 'Hutang usaha', '15000000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `nota_num` varchar(20) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nota_num`, `id_drug`, `qty`, `date`, `total`) VALUES
(7, '1', '1', 100, '2020-06-07', '1000000'),
(8, '2', '1', 40, '2020-06-07', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `id_sales_dtl` int(11) NOT NULL,
  `nota_num` varchar(20) NOT NULL,
  `id_drug` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(19,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `hp`, `address`) VALUES
(1, 'CV Cininta', '0248313757', 'Jl Lampersari 57 Semarang'),
(2, 'PT. Kalbe Farmasi', '082286062083', 'Jl. Garuda Sakti Km. 1, Kel. Simpang Baru');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(3, 'botol'),
(4, 'buah'),
(5, 'dos'),
(6, 'gelas'),
(7, 'kaleng'),
(8, 'kapsul'),
(9, 'lembar');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`no_cap`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`kode_coa`);

--
-- Indexes for table `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`no_debt`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`id_sales_dtl`);

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
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
  MODIFY `kode_coa` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debt`
--
ALTER TABLE `debt`
  MODIFY `no_debt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `id_sales_dtl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
