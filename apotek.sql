-- MySQL dump 10.13  Distrib 8.0.31, for macos12 (x86_64)
--
-- Host: 127.0.0.1    Database: apotek
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `capital`
--

DROP TABLE IF EXISTS `capital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capital` (
  `no_cap` int NOT NULL,
  `date` date NOT NULL,
  `debit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`no_cap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capital`
--

LOCK TABLES `capital` WRITE;
/*!40000 ALTER TABLE `capital` DISABLE KEYS */;
INSERT INTO `capital` VALUES (1,'2023-01-30','Modal Usaha','Modal Usaha','Modal Usaha','15000000');
/*!40000 ALTER TABLE `capital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coa`
--

DROP TABLE IF EXISTS `coa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coa` (
  `id_coa` int NOT NULL AUTO_INCREMENT,
  `kode_coa` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_coa` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_coa` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_coa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coa`
--

LOCK TABLES `coa` WRITE;
/*!40000 ALTER TABLE `coa` DISABLE KEYS */;
INSERT INTO `coa` VALUES (1,'101','akun','111'),(4,'112','test','test');
/*!40000 ALTER TABLE `coa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debt`
--

DROP TABLE IF EXISTS `debt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debt` (
  `no_debt` int NOT NULL AUTO_INCREMENT,
  `debt_date` date NOT NULL,
  `debit` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `credit` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan_debt` text COLLATE utf8mb4_general_ci NOT NULL,
  `nominal_debt` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`no_debt`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debt`
--

LOCK TABLES `debt` WRITE;
/*!40000 ALTER TABLE `debt` DISABLE KEYS */;
INSERT INTO `debt` VALUES (1,'2023-01-29','kas','kas','hutang usaha','1000000'),(2,'2023-01-29','5-50100 Hutang Usaha','5-50100 Hutang Usaha','piutang','1500000');
/*!40000 ALTER TABLE `debt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drugs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_unit` varchar(11) NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES (1,'OB1','Paramexx','4',352),(2,'OB2','Konidin','8',50),(3,'OB3','Panacilin','8',208),(4,'OB4','testing','3',0),(5,'OB5','asd','4',0);
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_num` int NOT NULL,
  `id_supplier` varchar(11) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (5,4,'1','1',500,'2020-06-04',4000000),(3,2,'1','3',208,'2020-06-03',832000),(6,5,'2','1',2,'2023-01-28',16000);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receivable`
--

DROP TABLE IF EXISTS `receivable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receivable` (
  `no_re` int NOT NULL,
  `re_date` date NOT NULL,
  `debit` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `credit` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  KEY `no_re` (`no_re`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receivable`
--

LOCK TABLES `receivable` WRITE;
/*!40000 ALTER TABLE `receivable` DISABLE KEYS */;
INSERT INTO `receivable` VALUES (1,'2023-01-30','1-10001 Kas','1-10001 Kas','Hutang usaha','15000000');
/*!40000 ALTER TABLE `receivable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nota_num` varchar(20) NOT NULL,
  `id_drug` varchar(64) NOT NULL,
  `qty` int NOT NULL,
  `date` date NOT NULL,
  `total` decimal(19,0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (7,'1','1',100,'2020-06-07',1000000),(8,'2','1',40,'2020-06-07',400000);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_detail`
--

DROP TABLE IF EXISTS `sales_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_detail` (
  `id_sales_dtl` int NOT NULL AUTO_INCREMENT,
  `nota_num` varchar(20) NOT NULL,
  `id_drug` varchar(20) NOT NULL,
  `qty` int NOT NULL,
  `subtotal` decimal(19,0) NOT NULL,
  PRIMARY KEY (`id_sales_dtl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_detail`
--

LOCK TABLES `sales_detail` WRITE;
/*!40000 ALTER TABLE `sales_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'CV Cininta','0248313757','Jl Lampersari 57 Semarang'),(2,'PT. Kalbe Farmasi','082286062083','Jl. Garuda Sakti Km. 1, Kel. Simpang Baru'),(5,'testtttttt','12312312','test'),(6,'tesasdasdasdsad','12312','asdasd');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (3,'botol'),(4,'buah'),(5,'dos'),(6,'gelas'),(7,'kaleng'),(8,'kapsul'),(9,'lembar'),(11,'tes');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-14 19:27:40
