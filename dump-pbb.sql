-- MySQL dump 10.13  Distrib 8.2.0, for macos13.5 (x86_64)
--
-- Host: localhost    Database: pbb
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_area`
--

DROP TABLE IF EXISTS `tbl_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_area` (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `nama_area` text NOT NULL,
  `kode_area` text NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_area`
--

LOCK TABLES `tbl_area` WRITE;
/*!40000 ALTER TABLE `tbl_area` DISABLE KEYS */;
INSERT INTO `tbl_area` VALUES (2,'Jakarta Dan Pasir Putih','404'),(4,'Purwakarta','443'),(6,'Banjarmasin','454'),(10,'Pontianak','559'),(11,'Cirebon','441'),(12,'Lampung','442'),(13,'Belitung','123'),(14,'Bangka','124'),(15,'Kalimantan Timur','125'),(16,'Kalimantan Tengah','126'),(17,'Makasar','127'),(18,'Papua','129'),(19,'Jawa Timur','130'),(20,'Kalimantan Selatan','131'),(21,'Lombok','132'),(22,'Kendari','133'),(23,'Batam','134'),(24,'Jawa Tengah','140');
/*!40000 ALTER TABLE `tbl_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_daging`
--

DROP TABLE IF EXISTS `tbl_daging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_daging` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `keterangan` varchar(100) DEFAULT NULL,
  `is_lunas` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_daging`
--

LOCK TABLES `tbl_daging` WRITE;
/*!40000 ALTER TABLE `tbl_daging` DISABLE KEYS */;
INSERT INTO `tbl_daging` VALUES (117,'2024-05-24','A3',0,'0',1,'',0),(118,'2024-05-24','A9',0,'0',0,NULL,0),(119,'2024-05-24','A14',0,'0',-1,NULL,0),(120,'2024-05-25','A11',0,'0',0,NULL,0);
/*!40000 ALTER TABLE `tbl_daging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_file`
--

DROP TABLE IF EXISTS `tbl_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_file` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_file`
--

LOCK TABLES `tbl_file` WRITE;
/*!40000 ALTER TABLE `tbl_file` DISABLE KEYS */;
INSERT INTO `tbl_file` VALUES (7,'3358.PNG',1,'2024-05-23 03:05:07','');
/*!40000 ALTER TABLE `tbl_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_file_2`
--

DROP TABLE IF EXISTS `tbl_file_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_file_2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_file_2`
--

LOCK TABLES `tbl_file_2` WRITE;
/*!40000 ALTER TABLE `tbl_file_2` DISABLE KEYS */;
INSERT INTO `tbl_file_2` VALUES (5,'3360.PNG',-1,'2024-05-23 03:07:33','');
/*!40000 ALTER TABLE `tbl_file_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kota`
--

DROP TABLE IF EXISTS `tbl_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_kota` (
  `id_kota` int NOT NULL AUTO_INCREMENT,
  `kode_area` int NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kota`
--

LOCK TABLES `tbl_kota` WRITE;
/*!40000 ALTER TABLE `tbl_kota` DISABLE KEYS */;
INSERT INTO `tbl_kota` VALUES (1,440,'Jakarta Utara',1),(2,440,'Jakarta Timur',1),(3,440,'Jakarta Barat',1),(4,440,'Jakarta Selatan',1),(5,440,'Jakarta Pusat',1);
/*!40000 ALTER TABLE `tbl_kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_laporan`
--

DROP TABLE IF EXISTS `tbl_laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_laporan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subsidi_normal` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_1` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_2` varchar(100) DEFAULT NULL,
  `cap_shell` varchar(100) DEFAULT NULL,
  `subsidi_transport` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `id_sortir` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `approved_by` int DEFAULT NULL,
  `subsidi_dibayar_3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_laporan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_laporan`
--

LOCK TABLES `tbl_laporan` WRITE;
/*!40000 ALTER TABLE `tbl_laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_memo`
--

DROP TABLE IF EXISTS `tbl_memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_memo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `subsidi` double DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `id_sortir` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_memo`
--

LOCK TABLES `tbl_memo` WRITE;
/*!40000 ALTER TABLE `tbl_memo` DISABLE KEYS */;
INSERT INTO `tbl_memo` VALUES (14,'A1','2024-05-23','1','0',70000,NULL,108),(15,'A3','2024-05-24','27','0',90000,NULL,111),(16,'A14','2024-05-24','42.2','0',80000,NULL,113),(17,'A9','2024-05-24','34','0',80000,NULL,112);
/*!40000 ALTER TABLE `tbl_memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pembayaran_dp`
--

DROP TABLE IF EXISTS `tbl_pembayaran_dp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pembayaran_dp` (
  `id_pembayaran_dp` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` text NOT NULL,
  `id_area` int NOT NULL,
  `bahan_masuk` text NOT NULL,
  `dp_seratus` text NOT NULL,
  `dp_enampuluh` text NOT NULL,
  `diminta_supplier` text NOT NULL,
  `bank` text NOT NULL,
  `no_rek` text NOT NULL,
  `nama_rekening` text NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembayaran_dp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pembayaran_dp`
--

LOCK TABLES `tbl_pembayaran_dp` WRITE;
/*!40000 ALTER TABLE `tbl_pembayaran_dp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pembayaran_dp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_penerimaan`
--

DROP TABLE IF EXISTS `tbl_penerimaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_penerimaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT '0',
  `approved_by` varchar(100) DEFAULT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `id_sortir` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `potongan_harga` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penerimaan`
--

LOCK TABLES `tbl_penerimaan` WRITE;
/*!40000 ALTER TABLE `tbl_penerimaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_penerimaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pengajuan`
--

DROP TABLE IF EXISTS `tbl_pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pengajuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `area` varchar(100) DEFAULT NULL,
  `bahan_masuk` varchar(100) DEFAULT NULL,
  `upload_images` varchar(255) DEFAULT NULL,
  `dp_60` varchar(100) DEFAULT NULL,
  `request_dp` varchar(100) DEFAULT NULL,
  `total_bayar` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `keterangan_approval` varchar(100) DEFAULT NULL,
  `qty_kg` varchar(100) DEFAULT NULL,
  `dp_100` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pengajuan`
--

LOCK TABLES `tbl_pengajuan` WRITE;
/*!40000 ALTER TABLE `tbl_pengajuan` DISABLE KEYS */;
INSERT INTO `tbl_pengajuan` VALUES (8,'Jakarta Dan Pasir Putih','21,4','4.PNG','Rp. 42.000','Rp. 600.000','Rp. 900.000','','','2024-05-27','',2,'2024-05-27 10:37:33','A8',NULL,' ','21,4','Rp. 70.000'),(9,'','60 ','3.PNG','Rp. 60.000','Rp. 90.000','Rp. 60.000','','','2024-05-27','',2,'2024-05-27 11:06:52','A4',NULL,' ','90','Rp. 70.000');
/*!40000 ALTER TABLE `tbl_pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_price`
--

DROP TABLE IF EXISTS `tbl_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_price` (
  `id_price` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_area` int NOT NULL,
  PRIMARY KEY (`id_price`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_price`
--

LOCK TABLES `tbl_price` WRITE;
/*!40000 ALTER TABLE `tbl_price` DISABLE KEYS */;
INSERT INTO `tbl_price` VALUES (1,'COL','400000','0001-01-01',2),(2,'JB','560000',NULL,2),(3,'JBJK',' 285000',NULL,2),(4,'JL','285000',NULL,2),(5,'XLP','275000',NULL,2),(6,'KJ',' 285000',NULL,2),(7,'BF / LP',' 285000',NULL,2),(8,'SPK','275000',NULL,2),(9,'SP',' 5,000',NULL,2),(10,'SPH',' 5,000',NULL,0),(11,'CL',' 10000',NULL,2),(12,'CLF',' 30000',NULL,2),(13,'MH',' 3000',NULL,2),(14,'MHR',' 30000',NULL,2),(15,'PHR','45000',NULL,2),(16,'B COL','45000',NULL,2),(17,'B JB','45000',NULL,2),(18,'B JBJK	','45000',NULL,2),(19,'B XLP','45000',NULL,2),(20,'B BF / LP','45000',NULL,2),(21,'B SPK','45000',NULL,2),(22,'B SP','45000',NULL,2),(23,'B CL',' 30000',NULL,2),(24,'B MH',' 30000',NULL,2),(25,'SHELL','1',NULL,2),(27,'col','100000',NULL,2);
/*!40000 ALTER TABLE `tbl_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_price_tr`
--

DROP TABLE IF EXISTS `tbl_price_tr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_price_tr` (
  `id_price` int NOT NULL AUTO_INCREMENT,
  `id_sortir` int NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `id_area` int NOT NULL,
  PRIMARY KEY (`id_price`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_price_tr`
--

LOCK TABLES `tbl_price_tr` WRITE;
/*!40000 ALTER TABLE `tbl_price_tr` DISABLE KEYS */;
INSERT INTO `tbl_price_tr` VALUES (105,108,'COL','100000',2),(106,108,'JB','560000',2),(107,108,'JBJK',' 285000',2),(108,108,'JL','285000',2),(109,108,'XLP','275000',2),(110,108,'KJ',' 285000',2),(111,108,'BF / LP',' 285000',2),(112,108,'SPK','275000',2),(113,108,'SP',' 5,000',2),(114,108,'SPH',' 5,000',0),(115,108,'CL',' 10000',2),(116,108,'CLF',' 30000',2),(117,108,'MH',' 3000',2),(118,108,'MHR',' 30000',2),(119,108,'PHR','45000',2),(120,108,'B COL','45000',2),(121,108,'B JB','45000',2),(122,108,'B JBJK	','45000',2),(123,108,'B XLP','45000',2),(124,108,'B BF / LP','45000',2),(125,108,'B SPK','45000',2),(126,108,'B SP','45000',2),(127,108,'B CL',' 30000',2),(128,108,'B MH',' 30000',2),(129,108,'SHELL','1',2),(130,108,'col','100000',2),(131,109,'COL','200000',2),(132,109,'JB','560000',2),(133,109,'JBJK',' 285000',2),(134,109,'JL','285000',2),(135,109,'XLP','275000',2),(136,109,'KJ',' 285000',2),(137,109,'BF / LP',' 285000',2),(138,109,'SPK','275000',2),(139,109,'SP',' 5,000',2),(140,109,'SPH',' 5,000',0),(141,109,'CL',' 10000',2),(142,109,'CLF',' 30000',2),(143,109,'MH',' 3000',2),(144,109,'MHR',' 30000',2),(145,109,'PHR','45000',2),(146,109,'B COL','45000',2),(147,109,'B JB','45000',2),(148,109,'B JBJK	','45000',2),(149,109,'B XLP','45000',2),(150,109,'B BF / LP','45000',2),(151,109,'B SPK','45000',2),(152,109,'B SP','45000',2),(153,109,'B CL',' 30000',2),(154,109,'B MH',' 30000',2),(155,109,'SHELL','1',2),(156,109,'col','100000',2),(157,110,'COL','300000',2),(158,110,'JB','560000',2),(159,110,'JBJK',' 285000',2),(160,110,'JL','285000',2),(161,110,'XLP','275000',2),(162,110,'KJ',' 285000',2),(163,110,'BF / LP',' 285000',2),(164,110,'SPK','275000',2),(165,110,'SP',' 5,000',2),(166,110,'SPH',' 5,000',0),(167,110,'CL',' 10000',2),(168,110,'CLF',' 30000',2),(169,110,'MH',' 3000',2),(170,110,'MHR',' 30000',2),(171,110,'PHR','45000',2),(172,110,'B COL','45000',2),(173,110,'B JB','45000',2),(174,110,'B JBJK	','45000',2),(175,110,'B XLP','45000',2),(176,110,'B BF / LP','45000',2),(177,110,'B SPK','45000',2),(178,110,'B SP','45000',2),(179,110,'B CL',' 30000',2),(180,110,'B MH',' 30000',2),(181,110,'SHELL','1',2),(182,110,'col','100000',2),(183,111,'COL','300000',2),(184,111,'JB','560000',2),(185,111,'JBJK',' 285000',2),(186,111,'JL','285000',2),(187,111,'XLP','275000',2),(188,111,'KJ',' 285000',2),(189,111,'BF / LP',' 285000',2),(190,111,'SPK','275000',2),(191,111,'SP',' 5,000',2),(192,111,'SPH',' 5,000',0),(193,111,'CL',' 10000',2),(194,111,'CLF',' 30000',2),(195,111,'MH',' 3000',2),(196,111,'MHR',' 30000',2),(197,111,'PHR','45000',2),(198,111,'B COL','45000',2),(199,111,'B JB','45000',2),(200,111,'B JBJK	','45000',2),(201,111,'B XLP','45000',2),(202,111,'B BF / LP','45000',2),(203,111,'B SPK','45000',2),(204,111,'B SP','45000',2),(205,111,'B CL',' 30000',2),(206,111,'B MH',' 30000',2),(207,111,'SHELL','1',2),(208,111,'col','100000',2),(209,112,'COL','400000',2),(210,112,'JB','560000',2),(211,112,'JBJK',' 285000',2),(212,112,'JL','285000',2),(213,112,'XLP','275000',2),(214,112,'KJ',' 285000',2),(215,112,'BF / LP',' 285000',2),(216,112,'SPK','275000',2),(217,112,'SP',' 5,000',2),(218,112,'SPH',' 5,000',0),(219,112,'CL',' 10000',2),(220,112,'CLF',' 30000',2),(221,112,'MH',' 3000',2),(222,112,'MHR',' 30000',2),(223,112,'PHR','45000',2),(224,112,'B COL','45000',2),(225,112,'B JB','45000',2),(226,112,'B JBJK	','45000',2),(227,112,'B XLP','45000',2),(228,112,'B BF / LP','45000',2),(229,112,'B SPK','45000',2),(230,112,'B SP','45000',2),(231,112,'B CL',' 30000',2),(232,112,'B MH',' 30000',2),(233,112,'SHELL','1',2),(234,112,'col','100000',2),(235,113,'COL','400000',2),(236,113,'JB','560000',2),(237,113,'JBJK',' 285000',2),(238,113,'JL','285000',2),(239,113,'XLP','275000',2),(240,113,'KJ',' 285000',2),(241,113,'BF / LP',' 285000',2),(242,113,'SPK','275000',2),(243,113,'SP',' 5,000',2),(244,113,'SPH',' 5,000',0),(245,113,'CL',' 10000',2),(246,113,'CLF',' 30000',2),(247,113,'MH',' 3000',2),(248,113,'MHR',' 30000',2),(249,113,'PHR','45000',2),(250,113,'B COL','45000',2),(251,113,'B JB','45000',2),(252,113,'B JBJK	','45000',2),(253,113,'B XLP','45000',2),(254,113,'B BF / LP','45000',2),(255,113,'B SPK','45000',2),(256,113,'B SP','45000',2),(257,113,'B CL',' 30000',2),(258,113,'B MH',' 30000',2),(259,113,'SHELL','1',2),(260,113,'col','100000',2),(261,114,'COL','400000',2),(262,114,'JB','560000',2),(263,114,'JBJK',' 285000',2),(264,114,'JL','285000',2),(265,114,'XLP','275000',2),(266,114,'KJ',' 285000',2),(267,114,'BF / LP',' 285000',2),(268,114,'SPK','275000',2),(269,114,'SP',' 5,000',2),(270,114,'SPH',' 5,000',0),(271,114,'CL',' 10000',2),(272,114,'CLF',' 30000',2),(273,114,'MH',' 3000',2),(274,114,'MHR',' 30000',2),(275,114,'PHR','45000',2),(276,114,'B COL','45000',2),(277,114,'B JB','45000',2),(278,114,'B JBJK	','45000',2),(279,114,'B XLP','45000',2),(280,114,'B BF / LP','45000',2),(281,114,'B SPK','45000',2),(282,114,'B SP','45000',2),(283,114,'B CL',' 30000',2),(284,114,'B MH',' 30000',2),(285,114,'SHELL','1',2),(286,114,'col','100000',2);
/*!40000 ALTER TABLE `tbl_price_tr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nama_role` text NOT NULL,
  `descriptiom` text NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` VALUES (1,'master_admin','Master Admin'),(2,'general_manager','General Manager/pbb'),(3,'manager_produksi','Manager Produksi'),(4,'admin_receiving','Admin Receiving'),(5,'departement_coasting','Departement Coasting'),(6,'tl_sortir','Team Leader Sortir'),(7,'sortir','sortir'),(9,'admin_bahan_baku','Admin Bahan Baku '),(10,'manager_pbb','Manager PBB'),(11,'tl_bahan_baku','Team Leader Bahan Baku'),(12,'Audit','Audit');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sortir`
--

DROP TABLE IF EXISTS `tbl_sortir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_sortir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(255) DEFAULT NULL,
  `tanggal_sj` date DEFAULT NULL,
  `tanggal_rec` date DEFAULT NULL,
  `tanggal_rec1` date DEFAULT NULL,
  `tanggal_rec2` date DEFAULT NULL,
  `tanggal_rec3` date DEFAULT NULL,
  `number` int DEFAULT NULL,
  `col` varchar(255) DEFAULT NULL,
  `bf` varchar(255) DEFAULT NULL,
  `jb` varchar(255) DEFAULT NULL,
  `jb_bf` varchar(255) DEFAULT NULL,
  `jbb_jk` varchar(255) DEFAULT NULL,
  `jbb_bf` varchar(255) DEFAULT NULL,
  `xlp` varchar(255) DEFAULT NULL,
  `bf_k3_col` varchar(255) DEFAULT NULL,
  `bf_k3_jb` varchar(255) DEFAULT NULL,
  `bf_k3_jk` varchar(255) DEFAULT NULL,
  `bf_k3_jl` varchar(255) DEFAULT NULL,
  `bf_jl` varchar(255) DEFAULT NULL,
  `bf_kj` varchar(255) DEFAULT NULL,
  `bf_bf` varchar(255) DEFAULT NULL,
  `bf_lp_slb` varchar(255) DEFAULT NULL,
  `bf_sp` varchar(255) DEFAULT NULL,
  `bf_spk_xlp` varchar(255) DEFAULT NULL,
  `bf_spk_sp` varchar(255) DEFAULT NULL,
  `spk_sp_jb` varchar(255) DEFAULT NULL,
  `spk_sp_xlp` varchar(255) DEFAULT NULL,
  `spk_sp_bfp` varchar(255) DEFAULT NULL,
  `spk_sp_sph` varchar(255) DEFAULT NULL,
  `sp_cl` varchar(255) DEFAULT NULL,
  `sp_clf` varchar(255) DEFAULT NULL,
  `mh` varchar(255) DEFAULT NULL,
  `mh_slb` varchar(255) DEFAULT NULL,
  `phr` varchar(255) DEFAULT NULL,
  `basi_col` varchar(255) DEFAULT NULL,
  `basi_jb` varchar(255) DEFAULT NULL,
  `basi_jk` varchar(255) DEFAULT NULL,
  `basi_xlp` varchar(255) DEFAULT NULL,
  `basi_bf` varchar(255) DEFAULT NULL,
  `basi_sp` varchar(255) DEFAULT NULL,
  `mhr` varchar(255) DEFAULT NULL,
  `basi_cl` varchar(255) DEFAULT NULL,
  `basi_mh` varchar(255) DEFAULT NULL,
  `air` varchar(255) DEFAULT NULL,
  `shell` varchar(255) DEFAULT NULL,
  `loss` varchar(255) DEFAULT NULL,
  `air_2` varchar(10) NOT NULL,
  `shell_2` varchar(10) NOT NULL,
  `loss_2` varchar(10) NOT NULL,
  `air_3` varchar(10) NOT NULL,
  `shell_3` varchar(10) NOT NULL,
  `loss_3` varchar(10) NOT NULL,
  `timbangan_kotor` varchar(255) DEFAULT NULL,
  `timbangan_bb` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `jbb_jf` varchar(255) DEFAULT NULL,
  `spk_sp` varchar(255) DEFAULT NULL,
  `sp_sph` varchar(255) DEFAULT NULL,
  `id_bb` int DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `cap` varchar(100) DEFAULT NULL,
  `potong` varchar(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `shell_phr_keras` varchar(100) DEFAULT NULL,
  `shell_mhr_keras` varchar(100) DEFAULT NULL,
  `shell_phr_halus` varchar(100) DEFAULT NULL,
  `shell_mhr_halus` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `basi_col2` varchar(255) DEFAULT NULL,
  `basi_jb2` varchar(255) DEFAULT NULL,
  `basi_jk2` varchar(255) DEFAULT NULL,
  `basi_xlp2` varchar(255) DEFAULT NULL,
  `basi_bf2` varchar(255) DEFAULT NULL,
  `basi_sp2` varchar(255) DEFAULT NULL,
  `mhr2` varchar(255) DEFAULT NULL,
  `basi_cl2` varchar(255) DEFAULT NULL,
  `basi_mh2` varchar(255) DEFAULT NULL,
  `is_corection` int NOT NULL DEFAULT '0',
  `col_2` varchar(10) DEFAULT NULL,
  `bf_2` varchar(10) DEFAULT NULL,
  `jb_2` varchar(10) DEFAULT NULL,
  `jb_bf_2` varchar(10) DEFAULT NULL,
  `jbb_jk_2` varchar(10) DEFAULT NULL,
  `jbb_bf_2` varchar(10) DEFAULT NULL,
  `xlp_2` varchar(10) DEFAULT NULL,
  `bf_k3_col_2` varchar(10) DEFAULT NULL,
  `bf_k3_jb_2` varchar(10) DEFAULT NULL,
  `bf_k3_jk_2` varchar(10) DEFAULT NULL,
  `bf_k3_jl_2` varchar(10) DEFAULT NULL,
  `bf_jl_2` varchar(10) DEFAULT NULL,
  `bf_kj_2` varchar(10) DEFAULT NULL,
  `bf_bf_2` varchar(10) DEFAULT NULL,
  `bf_lp_slb_2` varchar(10) DEFAULT NULL,
  `bf_sp_2` varchar(10) DEFAULT NULL,
  `bf_spk_xlp_2` varchar(10) DEFAULT NULL,
  `bf_spk_sp_2` varchar(10) DEFAULT NULL,
  `spk_sp_jb_2` varchar(10) DEFAULT NULL,
  `spk_sp_xlp_2` varchar(10) DEFAULT NULL,
  `spk_sp_bfp_2` varchar(10) DEFAULT NULL,
  `spk_sp_2` varchar(10) DEFAULT NULL,
  `sp_sph_2` varchar(10) DEFAULT NULL,
  `sp_cl_2` varchar(10) DEFAULT NULL,
  `sp_clf_2` varchar(10) DEFAULT NULL,
  `mh_2` varchar(10) DEFAULT NULL,
  `mh_slb_2` varchar(10) DEFAULT NULL,
  `basi_col_2` varchar(10) DEFAULT NULL,
  `basi_jb_2` varchar(10) DEFAULT NULL,
  `basi_jk_2` varchar(10) DEFAULT NULL,
  `basi_xlp_2` varchar(10) DEFAULT NULL,
  `basi_bf_2` varchar(10) DEFAULT NULL,
  `basi_sp_2` varchar(10) DEFAULT NULL,
  `basi_cl_2` varchar(10) DEFAULT NULL,
  `basi_mh_2` varchar(10) DEFAULT NULL,
  `basi_col2_2` varchar(10) DEFAULT NULL,
  `basi_jb2_2` varchar(10) DEFAULT NULL,
  `basi_jk2_2` varchar(10) DEFAULT NULL,
  `basi_xlp2_2` varchar(10) DEFAULT NULL,
  `basi_bf2_2` varchar(10) DEFAULT NULL,
  `basi_sp2_2` varchar(10) DEFAULT NULL,
  `basi_cl2_2` varchar(10) DEFAULT NULL,
  `basi_mh2_2` varchar(10) DEFAULT NULL,
  `col_3` varchar(10) DEFAULT NULL,
  `bf_3` varchar(10) DEFAULT NULL,
  `jb_3` varchar(10) DEFAULT NULL,
  `jb_bf_3` varchar(10) DEFAULT NULL,
  `jbb_jk_3` varchar(10) DEFAULT NULL,
  `jbb_bf_3` varchar(10) DEFAULT NULL,
  `xlp_3` varchar(10) DEFAULT NULL,
  `bf_k3_col_3` varchar(10) DEFAULT NULL,
  `bf_k3_jb_3` varchar(10) DEFAULT NULL,
  `bf_k3_jk_3` varchar(10) DEFAULT NULL,
  `bf_k3_jl_3` varchar(10) DEFAULT NULL,
  `bf_jl_3` varchar(10) DEFAULT NULL,
  `bf_kj_3` varchar(10) DEFAULT NULL,
  `bf_bf_3` varchar(10) DEFAULT NULL,
  `bf_lp_slb_3` varchar(10) DEFAULT NULL,
  `bf_sp_3` varchar(10) DEFAULT NULL,
  `bf_spk_xlp_3` varchar(10) DEFAULT NULL,
  `bf_spk_sp_3` varchar(10) DEFAULT NULL,
  `spk_sp_jb_3` varchar(10) DEFAULT NULL,
  `spk_sp_xlp_3` varchar(10) DEFAULT NULL,
  `spk_sp_bfp_3` varchar(10) DEFAULT NULL,
  `spk_sp_3` varchar(10) DEFAULT NULL,
  `sp_sph_3` varchar(10) DEFAULT NULL,
  `sp_cl_3` varchar(10) DEFAULT NULL,
  `sp_clf_3` varchar(10) DEFAULT NULL,
  `mh_3` varchar(10) DEFAULT NULL,
  `mh_slb_3` varchar(10) DEFAULT NULL,
  `basi_col_3` varchar(10) DEFAULT NULL,
  `basi_jb_3` varchar(10) DEFAULT NULL,
  `basi_jk_3` varchar(10) DEFAULT NULL,
  `basi_xlp_3` varchar(10) DEFAULT NULL,
  `basi_bf_3` varchar(10) DEFAULT NULL,
  `basi_sp_3` varchar(10) DEFAULT NULL,
  `basi_cl_3` varchar(10) DEFAULT NULL,
  `basi_mh_3` varchar(10) DEFAULT NULL,
  `basi_col2_3` varchar(10) DEFAULT NULL,
  `basi_jb2_3` varchar(10) DEFAULT NULL,
  `basi_jk2_3` varchar(10) DEFAULT NULL,
  `basi_xlp2_3` varchar(10) DEFAULT NULL,
  `basi_bf2_3` varchar(10) DEFAULT NULL,
  `basi_sp2_3` varchar(10) DEFAULT NULL,
  `basi_cl2_3` varchar(10) DEFAULT NULL,
  `basi_mh2_3` varchar(10) DEFAULT NULL,
  `tambahan` varchar(255) NOT NULL,
  `tambahan_new` text NOT NULL,
  `dp` double DEFAULT NULL,
  `pinjaman` double DEFAULT NULL,
  `faktur` double DEFAULT NULL,
  `no_nota` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sortir`
--

LOCK TABLES `tbl_sortir` WRITE;
/*!40000 ALTER TABLE `tbl_sortir` DISABLE KEYS */;
INSERT INTO `tbl_sortir` VALUES (111,'A3','2024-05-24',NULL,'2024-05-24',NULL,NULL,117,'11','2','3','4','5','6','','','','','','','','','','','','','','','',NULL,'','','','',NULL,'22','','','','1','',NULL,'','','','','','','','','','','',NULL,NULL,4,NULL,'','',117,1,'ya',NULL,'','','','','','','','','','','','',NULL,'','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',5000000,5000000,300000,''),(112,'A9','2024-05-24',NULL,'2024-05-24',NULL,NULL,118,'2','1','3','4','7','8','','','','','','','','','','','','','','','',NULL,'','','','',NULL,'31','','','','3','',NULL,'','','','','','','','','','','',NULL,NULL,4,NULL,'','',118,1,'ya',NULL,'','','','','','','','','','','','',NULL,'','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',0,0,0,''),(113,'A14','2024-05-24',NULL,'2024-05-24',NULL,NULL,119,'33.2','2','4','4','2','5','','','','','','','','','','','','','','','',NULL,'','','','',NULL,'9','','','','33.19','',NULL,'','','','','','','','','','','',NULL,NULL,4,NULL,'','',119,1,'ya',NULL,'','','','','','','','','','','','',NULL,'','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1.2,5,0,'12/23/banjar'),(114,'A11','2024-05-27',NULL,'2024-05-27',NULL,NULL,120,'0.21','33.2','','','','','','','','','','','','','','','','','','','',NULL,'','','','',NULL,'','','','','','',NULL,'','','','','','','','','','','',NULL,NULL,1,NULL,'','',120,NULL,'ya',NULL,'','','','','',NULL,'','','','','','',NULL,'','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `tbl_sortir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sub_daging`
--

DROP TABLE IF EXISTS `tbl_sub_daging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_sub_daging` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_bahan_baku` int DEFAULT NULL,
  `spesifikasi_bahan` varchar(100) DEFAULT NULL,
  `spek` varchar(100) DEFAULT NULL,
  `bungkus` varchar(100) DEFAULT NULL,
  `tkotor` varchar(100) DEFAULT NULL,
  `tbersih` varchar(100) DEFAULT NULL,
  `spek2` varchar(100) DEFAULT NULL,
  `bungkus2` varchar(100) DEFAULT NULL,
  `tkotor2` varchar(100) DEFAULT NULL,
  `tbersih2` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `tipe` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_sub_daging_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_daging`
--

LOCK TABLES `tbl_sub_daging` WRITE;
/*!40000 ALTER TABLE `tbl_sub_daging` DISABLE KEYS */;
INSERT INTO `tbl_sub_daging` VALUES (163,117,'taufik ','taufik ','11','23','22',NULL,NULL,NULL,NULL,'22',0),(164,118,'tes11','tes11','11','23','22',NULL,NULL,NULL,NULL,'22',0),(165,119,'jk','jk','11','23','22',NULL,NULL,NULL,NULL,'22',0),(166,120,'jk','jk','11','3','22',NULL,NULL,NULL,NULL,'22',0);
/*!40000 ALTER TABLE `tbl_sub_daging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_supplier` (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(255) NOT NULL,
  `nama_supplier` text NOT NULL,
  `bank` text,
  `nomor` text,
  `an` text,
  `npwp` text,
  `id_area` int NOT NULL,
  `no_ktp` varchar(10) DEFAULT '0',
  `alamat` text,
  `wilayah` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(100) DEFAULT NULL,
  `no_nota` text NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=1033 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (5,'A1','ALI NURDIN','','','',NULL,404,'','','','','0'),(6,'A2','HASANUDIN','','','',NULL,404,'','','','','0'),(7,'A3','MASDI							',NULL,'											id=','											id=','3366.PNG',0,'3367.PNG','','',NULL,'0'),(8,'A4','MISAR','','','','',404,'','','','','0'),(9,'A5','BENI TOMALA','','','','',404,'','','','','0'),(10,'A6','JUNAEDI','','','','',404,'','','','','0'),(11,'A7','ISMAIL','','','','',404,'','','','','0'),(12,'A8','NAEM','','','','',404,'','','','','0'),(13,'A9','HAKIM												',NULL,'											id=','											id=','3368.PNG',0,'3369.PNG','','',NULL,'0'),(14,'A10','MARKANI','','','','',404,'','','','','0'),(15,'A11','YULI','','','','',404,'','','','','0'),(16,'A12','MP MUARA BENDERA','','','','',404,'','','','','0'),(17,'A13','AWANG','','','','',404,'','','','','0'),(18,'A14','SINI','','','','',404,'','','','','0'),(19,'A15','ALEN','','','','',404,'','','','','0'),(20,'A16','ROSID','','','','',404,'','','','','0'),(21,'A17','ISMAIL','','','','',404,'','','','','0'),(22,'A18','ARYA','','','','',404,'','','','','0'),(23,'A19','ADANG','','','','',404,'','','','','0'),(24,'A20','KASAN','','','','',404,'','','','','0'),(25,'A21','SUHARI','','','','',404,'','','','','0'),(26,'A22','SLAMET','','','','',404,'','','','','0'),(27,'A23','MIRPAKO','','','','',404,'','','','','0'),(28,'A24','RONI','','','','',404,'','','','','0'),(29,'A25','SUKAR','','','','',404,'','','','','0'),(30,'A26','SAONAH','','','','',404,'','','','','0'),(31,'A27','GATOT','','','','',404,'','','','','0'),(32,'A29','KARSIM','','','','',404,'','','','','0'),(33,'A30','MAHFUD','','','','',404,'','','','','0'),(34,'A31','SOBARI','','','','',404,'','','','','0'),(35,'A32','JAKARIA/ARYA','','','','',404,'','','','','0'),(36,'A33','SUTRISNO JKT','','','','',404,'','','','','0'),(37,'A34','SUWANDA','','','','',404,'','','','','0'),(38,'A35','MAHMUD FADHOLI','','','','',404,'','','','','0'),(39,'A36','EEN OCTAVIA','','','','',404,'','','','','0'),(40,'A38','KUNTARA','','','','',404,'','','','','0'),(41,'A39','KOSIM','','','','',404,'','','','','0'),(42,'A40','SUTARNO','','','','',404,'','','','','0'),(43,'A42','JAELANI','','','','',404,'','','','','0'),(44,'A43','H.SYAEFUDIN','','','','',404,'','','','','0'),(45,'A44','ZIDAN','','','','',404,'','','','','0'),(46,'A45','MAHMUDI','','','','',404,'','','','','0'),(47,'A46','IROH','','','','',404,'','','','','0'),(48,'A47','HERMANTO JKT','','','','',404,'','','','','0'),(49,'A48','MAULANA','','','','',404,'','','','','0'),(50,'A49','DEWI FATIMAH','','','','',404,'','','','','0'),(51,'A50','BUANG','','','','',404,'','','','','0'),(52,'A51','NURDIN','','','','',404,'','','','','0'),(53,'A52','SUHARI','','','','',404,'','','','','0'),(54,'A53','WAWAN','','','','',404,'','','','','0'),(55,'A54','NESIN','','','','',404,'','','','','0'),(56,'A55','DARJA','','','','',404,'','','','','0'),(57,'A59','SOBRI','','','','',404,'','','','','0'),(58,'A60','SUBHAN','','','','',404,'','','','','0'),(59,'A61','MIMI','','','','',404,'','','','','0'),(60,'A62','DEDI','','','','',404,'','','','','0'),(61,'A63','SATIBI','','','','',404,'','','','','0'),(62,'A66','SUMINTA','','','','',404,'','','','','0'),(63,'A67','NURUL YAKIN','','','','',404,'','','','','0'),(64,'A68','NAMIROH','','','','',404,'','','','','0'),(65,'A69','NISA JAYA','','','','',404,'','','','','0'),(66,'A70','AMDAN','','','','',404,'','','','','0'),(67,'A71','ALIYAH','','','','',404,'','','','','0'),(68,'A72','SYAEPUL BAHRI','','','','',404,'','','','','0'),(69,'A73','IRWAN','','','','',404,'','','','','0'),(70,'A76','SUNASIR','','','','',404,'','','','','0'),(71,'A82','SUGIRI','','','','',404,'','','','','0'),(72,'A86','NURLELA','','','','',404,'','','','','0'),(73,'A87','KRISNA MUKTI','','','','',404,'','','','','0'),(74,'A89','RIAN','','','','',404,'','','','','0'),(75,'A90','BILAL','','','','',404,'','','','','0'),(76,'A91','KARTIKA','','','','',404,'','','','','0'),(77,'A92','ILHAM','','','','',404,'','','','','0'),(78,'A93','ERIK','','','','',404,'','','','','0'),(79,'A94','MUGIONO','','','','',404,'','','','','0'),(80,'A95','ROHIM','','','','',404,'','','','','0'),(81,'A96','KANZEN','','','','',404,'','','','','0'),(82,'A97','PUTRA JAYA','','','','',404,'','','','','0'),(83,'A98','MILYANAH','','','','',404,'','','','','0'),(84,'A99','HILMAN','','','','',404,'','','','','0'),(85,'A100','SUTISNA','','','','',404,'','','','','0'),(86,'A101','SINI','','','','',404,'','','','','0'),(87,'A74','DEDIH','','','','',404,'','','','','0'),(88,'A75','SITI ELANI','','','','',404,'','','','','0'),(89,'A77','DULAH','','','','',404,'','','','','0'),(90,'A102','MUSLIH','','','','',404,'','','','','0'),(91,'A103','BABAY','','','','',404,'','','','','0'),(92,'A104','SYAMSUDIN','','','','',404,'','','','','0'),(93,'A105','YAYAT','','','','',404,'','','','','0'),(94,'B1','SADAT','','','','',441,'','','','','0'),(95,'B2','WIRSO','','','','',441,'','','','','0'),(96,'B3','SUYATA','','','','',441,'','','','','0'),(97,'B4','ULFAH','','','','',441,'','','','','0'),(98,'B5','ROBI','','','','',441,'','','','','0'),(99,'B6','DINI','','','','',441,'','','','','0'),(100,'B7','PRENTI','','','','',441,'','','','','0'),(101,'B8','FIAN','','','','',441,'','','','','0'),(102,'B9','CAHAYA','','','','',441,'','','','','0'),(103,'B10','rohman','','','','',441,'','','','','0'),(104,'B11','TABRONI','','','','',441,'','','','','0'),(105,'B12','PERSIS','','','','',441,'','','','','0'),(106,'B13','DUDI','','','','',441,'','','','','0'),(107,'B14','HANIF','','','','',441,'','','','','0'),(108,'B15','SADINAH','','','','',441,'','','','','0'),(109,'B16','WITA','','','','',441,'','','','','0'),(110,'B17','adi','','','','',441,'','','','','0'),(111,'B18','rukini','','','','',441,'','','','','0'),(112,'B19','KENZAROK','','','','',441,'','','','','0'),(113,'B20','OVIC','','','','',441,'','','','','0'),(114,'B21','zalih','','','','',441,'','','','','0'),(115,'B22','WARSONO','','','','',441,'','','','','0'),(116,'B23','WULAN','','','','',441,'','','','','0'),(117,'B24','SURIP','','','','',441,'','','','','0'),(118,'B25','CASMADI','','','','',441,'','','','','0'),(119,'B26','ERI AFIKAH','','','','',441,'','','','','0'),(120,'B27','ANDI','','','','',441,'','','','','0'),(121,'B28','RISKULY','','','','',441,'','','','','0'),(122,'B29','sawila','','','','',441,'','','','','0'),(123,'B30','TALIM','','','','',441,'','','','','0'),(124,'B31','H. UUN','','','','',441,'','','','','0'),(125,'B32','H.NIWAN','','','','',441,'','','','','0'),(126,'B33','WARNOTO','','','','',441,'','','','','0'),(127,'B34','sadira','','','','',441,'','','','','0'),(128,'B35','RASJU','','','','',441,'','','','','0'),(129,'B36','hermanto','','','','',441,'','','','','0'),(130,'B37','MAN','','','','',441,'','','','','0'),(131,'B38','ROCHMAT HIDAYAT','','','','',441,'','','','','0'),(132,'B39','WAHYU','','','','',441,'','','','','0'),(133,'B40','IYAN','','','','',441,'','','','','0'),(134,'B41','AQILAH','','','','',441,'','','','','0'),(135,'B42','TARJUNA','','','','',441,'','','','','0'),(136,'B43','DESY','','','','',441,'','','','','0'),(137,'B44','RONI','','','','',441,'','','','','0'),(138,'B45','FAHMI','','','','',441,'','','','','0'),(139,'B46','bayu','','','','',441,'','','','','0'),(140,'B47','ROKAYAH','','','','',441,'','','','','0'),(141,'B48','YUSUP','','','','',441,'','','','','0'),(142,'B49','HARTONO','','','','',441,'','','','','0'),(143,'B50','H.TUTI','','','','',441,'','','','','0'),(144,'B66','WARINI','','','','',441,'','','','','0'),(145,'B67','LISTIYANTO','','','','',441,'','','','','0'),(146,'B68','kardono','','','','',441,'','','','','0'),(147,'B69','ahmad','','','','',441,'','','','','0'),(148,'B70','riswadi','','','','',441,'','','','','0'),(149,'B71','kanisa','','','','',441,'','','','','0'),(150,'B51','PARLIN','','','','',441,'','','','','0'),(151,'B52','YANTO','','','','',441,'','','','','0'),(152,'B53','BUDI HERNANTO','','','','',441,'','','','','0'),(153,'B54','KURSAN','','','','',441,'','','','','0'),(154,'B55','H. ALIF','','','','',441,'','','','','0'),(155,'B56','YADI','','','','',441,'','','','','0'),(156,'B57','MUNAWIR','','','','',441,'','','','','0'),(157,'B58','SATORI','','','','',441,'','','','','0'),(158,'B59','ADE ROHADI/surya ade','','','','',441,'','','','','0'),(159,'B60','ARI/SARI','','','','',441,'','','','','0'),(160,'B61','MASTUR','','','','',441,'','','','','0'),(161,'B62','KATIJA','','','','',441,'','','','','0'),(162,'B63','HERU','','','','',441,'','','','','0'),(163,'B64','ARI WIRYADI','','','','',441,'','','','','0'),(164,'B65','DWI CRBN','','','','',441,'','','','','0'),(165,'B72','tajudin','','','','',441,'','','','','0'),(166,'B73','mariah','','','','',441,'','','','','0'),(167,'B74','IPIN SARIPIN','','','','',441,'','','','','0'),(168,'B75','tawaf','','','','',441,'','','','','0'),(169,'B76','DEDE','','','','',441,'','','','','0'),(170,'B77','fadli','','','','',441,'','','','','0'),(171,'B78','KAISAH','','','','',441,'','','','','0'),(172,'B79','SINAR LAUT','','','','',441,'','','','','0'),(173,'B80','GILANG','','','','',441,'','','','','0'),(174,'B81','nafisah','','','','',441,'','','','','0'),(175,'B82','luki','','','','',441,'','','','','0'),(176,'B83','MUALIM','','','','',441,'','','','','0'),(177,'B84','JOJO','','','','',441,'','','','','0'),(178,'B85','WASTERI/UWAS','','','','',441,'','','','','0'),(179,'B86','halimah','','','','',441,'','','','','0'),(180,'B87','HELMI','','','','',441,'','','','','0'),(181,'B88','SUJANA','','','','',441,'','','','','0'),(182,'B89','H. SOLEH','','','','',441,'','','','','0'),(183,'B90','DICKY','','','','',441,'','','','','0'),(184,'B91','nur mesyi','','','','',441,'','','','','0'),(185,'B92','UBAY','','','','',441,'','','','','0'),(186,'B93','IKWAN','','','','',441,'','','','','0'),(187,'B94','ANGGUN','','','','',441,'','','','','0'),(188,'B95','LUKMAN','','','','',441,'','','','','0'),(189,'B96','HEGAR / RUKINI','','','','',441,'','','','','0'),(190,'B97','ROYANDI','','','','',441,'','','','','0'),(191,'B98','ANWAR ANAS','','','','',441,'','','','','0'),(192,'B99','ROSID','','','','',441,'','','','','0'),(193,'B100','DAFFA','','','','',441,'','','','','0'),(194,'B101','NUR KHASANAH','','','','',441,'','','','','0'),(195,'B102','NURYATI','','','','',441,'','','','','0'),(196,'B103','ROJI','','','','',441,'','','','','0'),(197,'B104','MUFID','','','','',441,'','','','','0'),(198,'B105','INAYAH','','','','',441,'','','','','0'),(199,'B106','HAYATI','','','','',441,'','','','','0'),(200,'B107','WAITO','','','','',441,'','','','','0'),(201,'B108','SANTOSO','','','','',441,'','','','','0'),(202,'B109','SUHARTO','','','','',441,'','','','','0'),(203,'B110','SURINI','','','','',441,'','','','','0'),(204,'B111','YUSUF','','','','',441,'','','','','0'),(205,'B112','DANURI','','','','',441,'','','','','0'),(206,'B113','DARMO','','','','',441,'','','','','0'),(207,'B114','SATURI','','','','',441,'','','','','0'),(208,'B115','RASBIN','','','','',441,'','','','','0'),(209,'B120','SUDINA','','','','',441,'','','','','0'),(210,'B121','SURYATI','','','','',441,'','','','','0'),(211,'B122','DEDE PRIYANTO','','','','',441,'','','','','0'),(212,'B124','ANGGI','','','','',441,'','','','','0'),(213,'B125','RIDWAN','','','','',441,'','','','','0'),(214,'B126','TOIPAH','','','','',441,'','','','','0'),(215,'B127','JANA','','','','',441,'','','','','0'),(216,'B128','SITI MARYAM','','','','',441,'','','','','0'),(217,'B129','AMANDA','','','','',441,'','','','','0'),(218,'C4','SAM','','','','',442,'','','','','0'),(219,'C6','TRI SUKADI','','','','',442,'','','','','0'),(220,'C7','AGAL','','','','',442,'','','','','0'),(221,'C8','SAENAH','','','','',442,'','','','','0'),(222,'C9','DENI','','','','',442,'','','','','0'),(223,'C10','SUDIRMAN','','','','',442,'','','','','0'),(224,'C11','SUHENDRI','','','','',442,'','','','','0'),(225,'C12','BUDI PRASETYO','','','','',442,'','','','','0'),(226,'C13','IWAN SETIAWAN','','','','',442,'','','','','0'),(227,'C14','AHMAD ROHADI','','','','',442,'','','','','0'),(228,'C15','HEMI MARLIANI','','','','',442,'','','','','0'),(229,'C16','FIRMAN','','','','',442,'','','','','0'),(230,'C17','IYON KASIONO','','','','',442,'','','','','0'),(231,'C21','ELI SUSANTI','','','','',442,'','','','','0'),(232,'C22','FIRDAUS','','','','',442,'','','','','0'),(233,'C23','FATHUR','','','','',442,'','','','','0'),(234,'C27','JULI','','','','',442,'','','','','0'),(235,'C28','ABDULLOH','','','','',442,'','','','','0'),(236,'C29','PLONCO','','','','',442,'','','','','0'),(237,'C31','BASUNIH','','','','',442,'','','','','0'),(238,'C32','WARINTO','','','','',442,'','','','','0'),(239,'C33','CASMIRA','','','','',442,'','','','','0'),(240,'C34','SUPARMAN','','','','',442,'','','','','0'),(241,'C35','REZI','','','','',442,'','','','','0'),(242,'C36','AGUS','','','','',442,'','','','','0'),(243,'C37','KASID','','','','',442,'','','','','0'),(244,'C38','HAVLIN','','','','',442,'','','','','0'),(245,'C39','SAGEK','','','','',442,'','','','','0'),(246,'C41','HARIYANTO','','','','',442,'','','','','0'),(247,'C42','SUJARWO','','','','',442,'','','','','0'),(248,'C43','HAMIMAH','','','','',442,'','','','','0'),(249,'C44','WANIDA','','','','',442,'','','','','0'),(250,'C45','WANDI','','','','',442,'','','','','0'),(251,'C47','SAU','','','','',442,'','','','','0'),(252,'C49','ALBERT','','','','',442,'','','','','0'),(253,'C50','ANDRE','','','','',442,'','','','','0'),(254,'C51','NOVI/ANDI ASNAWI','','','','',442,'','','','','0'),(255,'C52','ROFI','','','','',442,'','','','','0'),(256,'C53','ISKANDAR','','','','',442,'','','','','0'),(257,'C54','SUWAJI','','','','',442,'','','','','0'),(258,'C55','SITI FATIMAH','','','','',442,'','','','','0'),(259,'C56','HERMAN','','','','',442,'','','','','0'),(260,'C57','LESTARI','','','','',442,'','','','','0'),(261,'C58','JUWANDI LAMPUNG','','','','',442,'','','','','0'),(262,'C60','TIMAN','','','','',442,'','','','','0'),(263,'C61','ABDUL ROHMAN','','','','',442,'','','','','0'),(264,'C62','YANTI','','','','',442,'','','','','0'),(265,'C63','DANI','','','','',442,'','','','','0'),(266,'C66','KOLID','','','','',442,'','','','','0'),(267,'C59','FIBRI','','','','',442,'','','','','0'),(268,'C65','ARIL','','','','',442,'','','','','0'),(269,'C66','KOLID','','','','',442,'','','','','0'),(270,'C67','ARIF','','','','',442,'','','','','0'),(271,'C68','AMALIA','','','','',442,'','','','','0'),(272,'C69','MAARIF','','','','',442,'','','','','0'),(273,'C70','SAIFUDIN','','','','',442,'','','','','0'),(274,'D1','MASITA','','','','',559,'','','','','0'),(275,'D2','ADI KAKAP','','','','',559,'','','','','0'),(276,'D3','JUMILAH','','','','',559,'','','','','0'),(277,'D4','SULAIMAN DTKR','','','','',559,'','','','','0'),(278,'D5','NENENG','','','','',559,'','','','','0'),(279,'D6','RUDI','','','','',559,'','','','','0'),(280,'D7','DEDI','','','','',559,'','','','','0'),(281,'D8','HANAFI','','','','',559,'','','','','0'),(282,'D9','ALI AKBAR','','','','',559,'','','','','0'),(283,'D10','ASMU','','','','',559,'','','','','0'),(284,'D11','USMAN','','','','',559,'','','','','0'),(285,'D12','MUSLIHAT','','','','',559,'','','','','0'),(286,'D13','ABDUL MIAT','','','','',559,'','','','','0'),(287,'D14','HARYANTO','','','','',559,'','','','','0'),(288,'D15','LILIK/PENDI','','','','',559,'','','','','0'),(289,'D16','HIKAL','','','','',559,'','','','','0'),(290,'D17','YULI','','','','',559,'','','','','0'),(291,'D18','RENA','','','','',559,'','','','','0'),(292,'D19','SININ','','','','',559,'','','','','0'),(293,'D20','VELLY','','','','',559,'','','','','0'),(294,'D21','BELLA','','','','',559,'','','','','0'),(295,'D22','IBRAHIM PTNK','','','','',559,'','','','','0'),(296,'D23','SURIANA','','','','',559,'','','','','0'),(297,'D24','NASIR','','','','',559,'','','','','0'),(298,'D25','AMIR','','','','',559,'','','','','0'),(299,'D26','NADIN','','','','',559,'','','','','0'),(300,'D27','BIDIN','','','','',559,'','','','','0'),(301,'D28','M. ISRAK','','','','',559,'','','','','0'),(302,'D29','NUR','','','','',559,'','','','','0'),(303,'D30','ERIK ISKANDAR','','','','',559,'','','','','0'),(304,'D31','MURNI','','','','',559,'','','','','0'),(305,'D32','AMIR KAKAP','','','','',559,'','','','','0'),(306,'D33','MUSA/AGUNG','','','','',559,'','','','','0'),(307,'D34','DIDIK','','','','',559,'','','','','0'),(308,'D35','MANCA','','','','',559,'','','','','0'),(309,'D36','RYAN','','','','',559,'','','','','0'),(310,'D37','RISWANDINATA','','','','',559,'','','','','0'),(311,'D38','SULAIMAN KTP','','','','',559,'','','','','0'),(312,'D39','JEFRI','','','','',559,'','','','','0'),(313,'D40','KARNADI','','','','',559,'','','','','0'),(314,'D41','ZAHWA','','','','',559,'','','','','0'),(315,'D42','RUSLI','','','','',559,'','','','','0'),(316,'D43','AIRIL','','','','',559,'','','','','0'),(317,'D44','JUHAN/FIRMAN','','','','',559,'','','','','0'),(318,'D45','BUDI KETAPANG','','','','',559,'','','','','0'),(319,'D46','RARA','','','','',559,'','','','','0'),(320,'D47','IBRAHIM MPWH','','','','',559,'','','','','0'),(321,'D48','YUDHA','','','','',559,'','','','','0'),(322,'D49','MAWAN','','','','',559,'','','','','0'),(323,'D50','AMOX','','','','',559,'','','','','0'),(324,'D51','DODO','','','','',559,'','','','','0'),(325,'D52','RUSLI KAKAP','','','','',559,'','','','','0'),(326,'D53','LINDA','','','','',559,'','','','','0'),(327,'D54','MAWI','','','','',559,'','','','','0'),(328,'D55','MUSMULYADI','','','','',559,'','','','','0'),(329,'D56','ALMI','','','','',559,'','','','','0'),(330,'D57','ADIRA','','','','',559,'','','','','0'),(331,'D58','REZA','','','','',559,'','','','','0'),(332,'D59','RADIT','','','','',559,'','','','','0'),(333,'D60','INDRAWATI/AFRAH','','','','',559,'','','','','0'),(334,'D61','IBRAHIM BUDI (BAY)','','','','',559,'','','','','0'),(335,'D62','KARMILA','','','','',559,'','','','','0'),(336,'D63','SAMSUL/MEGA','','','','',559,'','','','','0'),(337,'D64','SUDIRO','','','','',559,'','','','','0'),(338,'D65','FIAN','','','','',559,'','','','','0'),(339,'D66','SUDIR MW','','','','',559,'','','','','0'),(340,'D67','SOBUR','','','','',559,'','','','','0'),(341,'D68','MANTO SATAI','','','','',559,'','','','','0'),(342,'D69','ABIYU','','','','',559,'','','','','0'),(343,'D70','M. YUSUF','','','','',559,'','','','','0'),(344,'D71','IID','','','','',559,'','','','','0'),(345,'D72','AKHUN','','','','',559,'','','','','0'),(346,'D73','ISMAIL','','','','',559,'','','','','0'),(347,'D74','ANNABA','','','','',559,'','','','','0'),(348,'D75','YATNO','','','','',559,'','','','','0'),(349,'D76','PARDI','','','','',559,'','','','','0'),(350,'D77','HUSNUL','','','','',559,'','','','','0'),(351,'D78','JANUARDI','','','','',559,'','','','','0'),(352,'D79','GUSTI ANDRE','','','','',559,'','','','','0'),(353,'D80','JAFRI','','','','',559,'','','','','0'),(354,'D81','FIDARIS','','','','',559,'','','','','0'),(355,'D82','RISKY','','','','',559,'','','','','0'),(356,'D83','SUDIANTO','','','','',559,'','','','','0'),(357,'D84','FIRMAN','','','','',559,'','','','','0'),(358,'D85','FAREL','','','','',559,'','','','','0'),(359,'D86','DESI/MAKMUR','','','','',559,'','','','','0'),(360,'D87','KRISMANTO','','','','',559,'','','','','0'),(361,'D88','AHMAD WIWID','','','','',559,'','','','','0'),(362,'D89','YUSMAN','','','','',559,'','','','','0'),(363,'D90','JUSWANA','','','','',559,'','','','','0'),(364,'D91','RIYASIH','','','','',559,'','','','','0'),(365,'D92','CITO','','','','',559,'','','','','0'),(366,'D93','MP PONTIANAK','','','','',559,'','','','','0'),(367,'D94','HALIMAH','','','','',559,'','','','','0'),(368,'D95','AMOK BASIR','','','','',559,'','','','','0'),(369,'D96','PUTRIANA','','','','',559,'','','','','0'),(370,'D97','ZYA','','','','',559,'','','','','0'),(371,'D98','JULIADI','','','','',559,'','','','','0'),(372,'D99','LISA/ARIF','','','','',559,'','','','','0'),(373,'D100','ARJUNA NIAH','','','','',559,'','','','','0'),(374,'D101','SYAHRUDIN','','','','',559,'','','','','0'),(375,'D102','SUHARDI','','','','',559,'','','','','0'),(376,'D103','RIDWAN','','','','',559,'','','','','0'),(377,'D104','DEDI GUNAWAN','','','','',559,'','','','','0'),(378,'D105','ANA RITA','','','','',559,'','','','','0'),(379,'D106','ADITYA','','','','',559,'','','','','0'),(380,'D107','DEDEN','','','','',559,'','','','','0'),(381,'D108','JAMALUDIN','','','','',559,'','','','','0'),(382,'D109','YOGI','','','','',559,'','','','','0'),(383,'D110','DESY ASWANI','','','','',559,'','','','','0'),(384,'D111','SAPARUDIN','','','','',559,'','','','','0'),(385,'D112','BUSTAM','','','','',559,'','','','','0'),(386,'D113','TONI','','','','',559,'','','','','0'),(387,'D114','RINDIA','','','','',559,'','','','','0'),(388,'D115','PAUJI','','','','',559,'','','','','0'),(389,'D116','WINDA','','','','',559,'','','','','0'),(390,'D117','HENDRIZAL/NAZAR','','','','',559,'','','','','0'),(391,'D118','SUYATNO','','','','',559,'','','','','0'),(392,'D119','BUDIANSYAH','','','','',559,'','','','','0'),(393,'D120','SURITA','','','','',559,'','','','','0'),(394,'D121','RIRIN','','','','',559,'','','','','0'),(395,'D122','RANDI','','','','',559,'','','','','0'),(396,'D123','ANDI ERWANDI','','','','',559,'','','','','0'),(397,'D124','MASKUR','','','','',559,'','','','','0'),(398,'D125','HAMSAH','','','','',559,'','','','','0'),(399,'D126','IAN/RIZKIAN','','','','',559,'','','','','0'),(400,'D127','ADITYA SETIAWAN/YUNI','','','','',559,'','','','','0'),(401,'D128','ABIZAR/SAPARI','','','','',559,'','','','','0'),(402,'D129','VITA SARI','','','','',559,'','','','','0'),(403,'D130','ARIYANTO','','','','',559,'','','','','0'),(404,'D131','RUDI SANTOSO','','','','',559,'','','','','0'),(405,'D132','UDAINI/PITRIYANI','','','','',559,'','','','','0'),(406,'D133','MADANI','','','','',559,'','','','','0'),(407,'D134','SAHRANI','','','','',559,'','','','','0'),(408,'D135','EVI/FAUZAN','','','','',559,'','','','','0'),(409,'D136','RIDUAN','','','','',559,'','','','','0'),(410,'D137','ASNAN','','','','',559,'','','','','0'),(411,'D138','IMRAN KETAPANG','','','','',559,'','','','','0'),(412,'D139','SUKRI/SAMSUL','','','','',559,'','','','','0'),(413,'D140','SITI','','','','',559,'','','','','0'),(414,'D141','JUMRATUL','','','','',559,'','','','','0'),(415,'D142','SURIANI','','','','',559,'','','','','0'),(416,'D143','MUSAIDIN','','','','',559,'','','','','0'),(417,'D144','SUHADA','','','','',559,'','','','','0'),(418,'D145','SURIYANI KALBAR','','','','',559,'','','','','0'),(419,'D146','LISA YANA','','','','',559,'','','','','0'),(420,'D147','BUDIMAN','','','','',559,'','','','','0'),(421,'D148','TIWI','','','','',559,'','','','','0'),(422,'D149','SAHRANI KALBAR','','','','',559,'','','','','0'),(423,'D150','TAJUINSYAH','','','','',559,'','','','','0'),(424,'D151','FAISAL','','','','',559,'','','','','0'),(425,'D152','MEGANSYAH','','','','',559,'','','','','0'),(426,'D153','NUR HAYAMI','','','','',559,'','','','','0'),(427,'D154','RAMAYATI','','','','',559,'','','','','0'),(428,'D155','RAJALI','','','','',559,'','','','','0'),(429,'D156','MP KETAPANG','','','','',559,'','','','','0'),(430,'D157','SABARANI','','','','',559,'','','','','0'),(431,'E1','KATI','','','','',123,'','','','','0'),(432,'E2','AGUS','','','','',123,'','','','','0'),(433,'E3','ARBA','','','','',123,'','','','','0'),(434,'E4','SUMARSONO','','','','',123,'','','','','0'),(435,'E5','ARYANTO','','','','',123,'','','','','0'),(436,'E8','HABRUN','','','','',123,'','','','','0'),(437,'E9','ROSMIATI','','','','',123,'','','','','0'),(438,'E10','INDRA JAYA','','','','',123,'','','','','0'),(439,'E11','DARMAWI','','','','',123,'','','','','0'),(440,'E12','AIDI','','','','',123,'','','','','0'),(441,'E13','AGHIL','','','','',123,'','','','','0'),(442,'E14','RAHUDI','','','','',123,'','','','','0'),(443,'E16','RONI','','','','',123,'','','','','0'),(444,'E17','YULIANTI','','','','',123,'','','','','0'),(445,'E18','KASRI','','','','',123,'','','','','0'),(446,'E19','HENDRA','','','','',123,'','','','','0'),(447,'E21','NASRI','','','','',123,'','','','','0'),(448,'E28','PARDIN','','','','',123,'','','','','0'),(449,'E30','SARWEDI','','','','',123,'','','','','0'),(450,'E31','ANGGA','','','','',123,'','','','','0'),(451,'E32','YUNNI','','','','',123,'','','','','0'),(452,'E33','NURHIDAYATI','','','','',123,'','','','','0'),(453,'E35','TOPAN','','','','',123,'','','','','0'),(454,'E36','SRI REJEKI','','','','',123,'','','','','0'),(455,'E37','SISKA','','','','',123,'','','','','0'),(456,'E38','SUHERMAN','','','','',123,'','','','','0'),(457,'E39','ABDUL MANAF','','','','',123,'','','','','0'),(458,'E40','SAMRAN','','','','',123,'','','','','0'),(459,'E50','ADUL','','','','',123,'','','','','0'),(460,'E54','ISTIMEWA','','','','',123,'','','','','0'),(461,'E56','AGRA','','','','',123,'','','','','0'),(462,'E58','AKIONG','','','','',123,'','','','','0'),(463,'E60','MP BELITUNG','','','','',123,'','','','','0'),(464,'E61','JULIANTO','','','','',123,'','','','','0'),(465,'E64','BABE','','','','',123,'','','','','0'),(466,'E67','ATAT','','','','',123,'','','','','0'),(467,'E72','PANI','','','','',123,'','','','','0'),(468,'E73','HAIRUL','','','','',123,'','','','','0'),(469,'E74','ADE SURYANI','','','','',123,'','','','','0'),(470,'E75','TARA','','','','',123,'','','','','0'),(471,'E77','IRMA','','','','',123,'','','','','0'),(472,'E78','MASTONO','','','','',123,'','','','','0'),(473,'E79','AGUS MULYONO','','','','',123,'','','','','0'),(474,'F1','AGUS ISMAIL','','','','',124,'','','','','0'),(475,'F2','RAHMAT SADAI','','','','',124,'','','','','0'),(476,'F3','DENDI','','','','',124,'','','','','0'),(477,'F4','RAHMAN','','','','',124,'','','','','0'),(478,'F5','FIRJAE','','','','',124,'','','','','0'),(479,'F6','FIRDAUS','','','','',124,'','','','','0'),(480,'F7','YUSRI','','','','',124,'','','','','0'),(481,'F8','RUSTON','','','','',124,'','','','','0'),(482,'F9','SELI','','','','',124,'','','','','0'),(483,'F10','AJON','','','','',124,'','','','','0'),(484,'F11','BINTARIA','','','','',124,'','','','','0'),(485,'F12','ERNI','','','','',124,'','','','','0'),(486,'F13','ZULKIFLI / SUPYANIDI','','','','',124,'','','','','0'),(487,'F14','ION','','','','',124,'','','','','0'),(488,'F15','CAKMAN','','','','',124,'','','','','0'),(489,'F16','SUTIONO','','','','',124,'','','','','0'),(490,'F17','CAWI','','','','',124,'','','','','0'),(491,'F18','RUSTAM','','','','',124,'','','','','0'),(492,'F19','SUDIRMAN','','','','',124,'','','','','0'),(493,'F20','EFENDI','','','','',124,'','','','','0'),(494,'F21','IAN','','','','',124,'','','','','0'),(495,'F22','NOKY','','','','',124,'','','','','0'),(496,'F23','IRAWAN','','','','',124,'','','','','0'),(497,'F24','ASSE/YUDI','','','','',124,'','','','','0'),(498,'F25','RIKI','','','','',124,'','','','','0'),(499,'F26','MP BANGKA','','','','',124,'','','','','0'),(500,'F27','ANGGA DARMAWAN','','','','',124,'','','','','0'),(501,'F28','PARDI/TAHER','','','','',124,'','','','','0'),(502,'F29','ISMAIL','','','','',124,'','','','','0'),(503,'F30','YUDHI','','','','',124,'','','','','0'),(504,'G1','RONI','','','','',140,'','','','','0'),(505,'G2','NARDI','','','','',140,'','','','','0'),(506,'G3','SUWARNO','','','','',140,'','','','','0'),(507,'G4','RASMIN','','','','',140,'','','','','0'),(508,'G5','ROMLI','','','','',140,'','','','','0'),(509,'G6','SITI ROHMAH','','','','',140,'','','','','0'),(510,'G7','PRIYO','','','','',140,'','','','','0'),(511,'G11','MUHTADI','','','','',140,'','','','','0'),(512,'G12','SIMON/ENDAMG','','','','',140,'','','','','0'),(513,'G15','MUDASIN','','','','',140,'','','','','0'),(514,'G17','ABDUL FATAH','','','','',140,'','','','','0'),(515,'G20','KARMIDI','','','','',140,'','','','','0'),(516,'G21','SISWANTO','','','','',140,'','','','','0'),(517,'G24','HADI','','','','',140,'','','','','0'),(518,'G25','JUHARI','','','','',140,'','','','','0'),(519,'G27','MP PUTRA','','','','',140,'','','','','0'),(520,'G30','ROFIK','','','','',140,'','','','','0'),(521,'G35','FAHRUL','','','','',140,'','','','','0'),(522,'G36','MP PANTURA','','','','',140,'','','','','0'),(523,'G37','UCOK','','','','',140,'','','','','0'),(524,'G38','YOYO','','','','',140,'','','','','0'),(525,'G39','MUJIB','','','','',140,'','','','','0'),(526,'G44','AGUS','','','','',140,'','','','','0'),(527,'G46','ARIF','','','','',140,'','','','','0'),(528,'G47','SUJAT','','','','',140,'','','','','0'),(529,'G48','EKO','','','','',140,'','','','','0'),(530,'G49','TOPIK','','','','',140,'','','','','0'),(531,'G51','ANDIK','','','','',140,'','','','','0'),(532,'G52','SUGENG','','','','',140,'','','','','0'),(533,'G53','ZAINUL IKHWAN','','','','',140,'','','','','0'),(534,'G54','MUKHLISON','','','','',140,'','','','','0'),(535,'G55','CV. MAJU WARAKE','','','','',140,'','','','','0'),(536,'G56','SODIKIN NUR KOLIK','','','','',140,'','','','','0'),(537,'G57','YULI SUSANTI','','','','',140,'','','','','0'),(538,'G58','TOHA','','','','',140,'','','','','0'),(539,'G59','HENDY WIBAWA','','','','',140,'','','','','0'),(540,'G60','AISA','','','','',140,'','','','','0'),(541,'G61','ROHANDA','','','','',140,'','','','','0'),(542,'G62','ACHDY','','','','',140,'','','','','0'),(543,'G63','NUR SISKA','','','','',140,'','','','','0'),(544,'G64','DIDIK','','','','',140,'','','','','0'),(545,'G65','ZAINAL ARIFIN','','','','',140,'','','','','0'),(546,'G66','YATEMIN','','','','',140,'','','','','0'),(547,'G67','TAMSIR','','','','',140,'','','','','0'),(548,'G68','ADI SURYADI','','','','',140,'','','','','0'),(549,'G69','SULISTYO','','','','',140,'','','','','0'),(550,'G70','ROSIDI','','','','',140,'','','','','0'),(551,'G71','PRIYANTI','','','','',140,'','','','','0'),(552,'G72','PRAMITA','','','','',140,'','','','','0'),(553,'G73','SODIKIN','','','','',140,'','','','','0'),(554,'G74','SUGIYATI','','','','',140,'','','','','0'),(555,'G75','AHMAD SYIFA','','','','',140,'','','','','0'),(556,'G76','CHRISTIAN','','','','',140,'','','','','0'),(557,'G77','TITIK','','','','',140,'','','','','0'),(558,'G78','SETIAWAN','','','','',140,'','','','','0'),(559,'G79','ERLIN INDAH','','','','',140,'','','','','0'),(560,'G80','SUPRIYANTI','','','','',140,'','','','','0'),(561,'G81','YOSI','','','','',140,'','','','','0'),(562,'G83','HERI','','','','',140,'','','','','0'),(563,'H1','DEDI SUHERLAN','','','','',134,'','','','','0'),(564,'H16','MIN JIU','','','','',134,'','','','','0'),(565,'J1','ITA','','','','',133,'','','','','0'),(566,'J2','LAODE','','','','',133,'','','','','0'),(567,'J3','SUTRISNO','','','','',133,'','','','','0'),(568,'L1','AYUB','','','','',132,'','','','','0'),(569,'L2','SALMAN','','','','',132,'','','','','0'),(570,'L3','SIDIK','','','','',132,'','','','','0'),(571,'L4','MP LOMBOK','','','','',132,'','','','','0'),(572,'L5','TITI','','','','',132,'','','','','0'),(573,'L6','AZWAR','','','','',132,'','','','','0'),(574,'L7','TALUN','','','','',132,'','','','','0'),(575,'L8','JAMALUDIN','','','','',132,'','','','','0'),(576,'L9','AGUS SALIM','','','','',132,'','','','','0'),(577,'L10','MUHAMMAD','','','','',132,'','','','','0'),(578,'L11','ALUNG','','','','',132,'','','','','0'),(579,'M1','MIDAN','','','','',131,'','','','','0'),(580,'M2','H.MANSYUR/L3','','','','',131,'','','','','0'),(581,'M3','DORES/SURIANSYAH','','','','',131,'','','','','0'),(582,'M4','BAHRUDIN/BARUDING','','','','',131,'','','','','0'),(583,'M5','AMIRUDIN TAMIYANG','','','','',131,'','','','','0'),(584,'M6','SUHARDI','','','','',131,'','','','','0'),(585,'M7','MANSYAH','','','','',131,'','','','','0'),(586,'M8','HASNAINI','','','','',131,'','','','','0'),(587,'M9','DIDIK/DAFFA','','','','',131,'','','','','0'),(588,'M10','SITI HAJAR','','','','',131,'','','','','0'),(589,'M11','MUARA HATI/EDO/H.HATI','','','','',131,'','','','','0'),(590,'M12','H. ACO/ANWAR','','','','',131,'','','','','0'),(591,'M13','TAMADING','','','','',131,'','','','','0'),(592,'M14','JALI','','','','',131,'','','','','0'),(593,'M15','MUSLIYADI','','','','',131,'','','','','0'),(594,'M16','ANDI SAHARUDIN','','','','',131,'','','','','0'),(595,'M17','TAMSAR','','','','',131,'','','','','0'),(596,'M18','ZAINAL','','','','',131,'','','','','0'),(597,'M19','MULYATI','','','','',131,'','','','','0'),(598,'M20','BUNGALIA / KOMARUDIN','','','','',131,'','','','','0'),(599,'M21','SUAEB','','','','',131,'','','','','0'),(600,'M22','SIRATANG','','','','',131,'','','','','0'),(601,'M23','BAYAH','','','','',131,'','','','','0'),(602,'M24','AWALUDIN','','','','',131,'','','','','0'),(603,'M25','HAJRAH','','','','',131,'','','','','0'),(604,'M26','DEVI/HAFIFUDIN','','','','',131,'','','','','0'),(605,'M27','HASAN KOTABARU','','','','',131,'','','','','0'),(606,'M28','M. NASRUN','','','','',131,'','','','','0'),(607,'M29','SAKKA','','','','',131,'','','','','0'),(608,'M30','M. RASYIDIN','','','','',131,'','','','','0'),(609,'M31','MUIS','','','','',131,'','','','','0'),(610,'M32','H. IPAH','','','','',131,'','','','','0'),(611,'M33','JUMADAH','','','','',131,'','','','','0'),(612,'M34','JAINUDIN/HERMAN','','','','',131,'','','','','0'),(613,'M35','DAHRI','','','','',131,'','','','','0'),(614,'M36','GANDI/JORONG','','','','',131,'','','','','0'),(615,'M37','SUPARDI','','','','',131,'','','','','0'),(616,'M38','WARTO','','','','',131,'','','','','0'),(617,'M39','SIRE','','','','',131,'','','','','0'),(618,'M40','SARUDIN','','','','',131,'','','','','0'),(619,'M41','RINI','','','','',131,'','','','','0'),(620,'M42','AFIKA','','','','',131,'','','','','0'),(621,'M43','PUDING/HUSNA','','','','',131,'','','','','0'),(622,'M44','TINTANG','','','','',131,'','','','','0'),(623,'M45','SUDIANUR','','','','',131,'','','','','0'),(624,'M46','JAMAL JORONG','','','','',131,'','','','','0'),(625,'M47','H. AMIR PAGATAN','','','','',131,'','','','','0'),(626,'M48','SYAMSUDIN','','','','',131,'','','','','0'),(627,'M49','HAMDIAH','','','','',131,'','','','','0'),(628,'M50','SABANUR','','','','',131,'','','','','0'),(629,'M51','JOJO/JOHANSYAH','','','','',131,'','','','','0'),(630,'M52','HAMSYAH/MARHANSYAH','','','','',131,'','','','','0'),(631,'M53','RUSDANI','','','','',131,'','','','','0'),(632,'M54','H. IDERUS','','','','',131,'','','','','0'),(633,'M55','ADRIAN','','','','',131,'','','','','0'),(634,'M56','NASIR/LAYLA','','','','',131,'','','','','0'),(635,'M57','HAMID PAGATAN','','','','',131,'','','','','0'),(636,'M58','MUKHTAR','','','','',131,'','','','','0'),(637,'M59','H.SAIFUDIN','','','','',131,'','','','','0'),(638,'M60','SAIDE','','','','',131,'','','','','0'),(639,'M61','RUPIAH','','','','',131,'','','','','0'),(640,'M62','RUHAEDA','','','','',131,'','','','','0'),(641,'M63','BAHARANI','','','','',131,'','','','','0'),(642,'M64','SULAIMAN','','','','',131,'','','','','0'),(643,'M65','SADAKE','','','','',131,'','','','','0'),(644,'M66','YANA','','','','',131,'','','','','0'),(645,'M67','H.TAKE','','','','',131,'','','','','0'),(646,'M68','MUKAROMAH','','','','',131,'','','','','0'),(647,'M69','SULAIMAN SIMLATAKAN','','','','',131,'','','','','0'),(648,'M70','MISNAHAR','','','','',131,'','','','','0'),(649,'M71','H.NUSU/YUNUS','','','','',131,'','','','','0'),(650,'M72','AKU (YAKUP)','','','','',131,'','','','','0'),(651,'M73','JOJO/JOHANSYAH KK','','','','',131,'','','','','0'),(652,'M74','MANA BAHARUDIN','','','','',131,'','','','','0'),(653,'M75','HASRIFIN','','','','',131,'','','','','0'),(654,'M76','LABE','','','','',131,'','','','','0'),(655,'M77','YANTO KK','','','','',131,'','','','','0'),(656,'M78','ALIMUDIN','','','','',131,'','','','','0'),(657,'M79','AMIR TAKISUNG/IRHAM','','','','',131,'','','','','0'),(658,'M80','FITRI/HELDA','','','','',131,'','','','','0'),(659,'M81','HATIANSYAH','','','','',131,'','','','','0'),(660,'M82','HERI','','','','',131,'','','','','0'),(661,'M83','YANTO ','','','','',131,'','','','','0'),(662,'M84','HALIMAH','','','','',131,'','','','','0'),(663,'M85','HALIA','','','','',131,'','','','','0'),(664,'M86','SURIANSYAH','','','','',131,'','','','','0'),(665,'M87','SUGANI','','','','',131,'','','','','0'),(666,'M88','MP FOTS BANJARMASIN','','','','',131,'','','','','0'),(667,'M89','MUHAMMAD FITRI','','','','',131,'','','','','0'),(668,'M90','NORMA INDAH / RIDUANSYAH','','','','',131,'','','','','0'),(669,'M91','H. ALIANSYAH','','','','',131,'','','','','0'),(670,'M92','ALAM/FATIMAH','','','','',131,'','','','','0'),(671,'M93','MUJAHIDIN','','','','',131,'','','','','0'),(672,'M94','NANTANG','','','','',131,'','','','','0'),(673,'M95','SULAIMAN KK','','','','',131,'','','','','0'),(674,'M96','ROMLAH','','','','',131,'','','','','0'),(675,'M97','AGUS SUBKAN','','','','',131,'','','','','0'),(676,'M98','M. TAUFIQ','','','','',131,'','','','','0'),(677,'M99','SAID','','','','',131,'','','','','0'),(678,'M100','DEVI TAKISUNG','','','','',131,'','','','','0'),(679,'N4','SULHAN','','','','',130,'','','','','0'),(680,'N5','HUSNI','','','','',130,'','','','','0'),(681,'N6','MOYO','','','','',130,'','','','','0'),(682,'N8','FATIMAH','','','','',130,'','','','','0'),(683,'N9','MOYO','','','','',130,'','','','','0'),(684,'N10','ZAINUL','','','','',130,'','','','','0'),(685,'N14','NUR','','','','',130,'','','','','0'),(686,'N15','HENI','','','','',130,'','','','','0'),(687,'N16','ALI MANSUR','','','','',130,'','','','','0'),(688,'N18','MUSA','','','','',130,'','','','','0'),(689,'N20','ANI','','','','',130,'','','','','0'),(690,'N24','KUSNAIDI','','','','',130,'','','','','0'),(691,'N29','MASKUR','','','','',130,'','','','','0'),(692,'N30','JAIZ','','','','',130,'','','','','0'),(693,'N31','SUPARTO','','','','',130,'','','','','0'),(694,'N33','MUDHAR','','','','',130,'','','','','0'),(695,'N36','KHOTIB','','','','',130,'','','','','0'),(696,'N37','BUDI','','','','',130,'','','','','0'),(697,'N40','RAHMAT','','','','',130,'','','','','0'),(698,'N43','SUTRISNO','','','','',130,'','','','','0'),(699,'N44','IPUNG','','','','',130,'','','','','0'),(700,'N45','SUKANDAR TONGAS','','','','',130,'','','','','0'),(701,'N46','ARIFIN','','','','',130,'','','','','0'),(702,'N47','JUNAIDI','','','','',130,'','','','','0'),(703,'N48','TOPIK','','','','',130,'','','','','0'),(704,'N49','IMRON','','','','',130,'','','','','0'),(705,'N50','SOLIHUN','','','','',130,'','','','','0'),(706,'N51','SAMSI','','','','',130,'','','','','0'),(707,'N52','LIANA','','','','',130,'','','','','0'),(708,'N53','ZULFA','','','','',130,'','','','','0'),(709,'N54','IAN','','','','',130,'','','','','0'),(710,'N55','IFAH','','','','',130,'','','','','0'),(711,'N56','ANNA','','','','',130,'','','','','0'),(712,'N57','RUHANA','','','','',130,'','','','','0'),(713,'N58','DAVID','','','','',130,'','','','','0'),(714,'N59','MATRAJI','','','','',130,'','','','','0'),(715,'N60','YULI DEDI IRAWAN','','','','',130,'','','','','0'),(716,'N61','ABDUL GOFUR','','','','',130,'','','','','0'),(717,'N62','SRI','','','','',130,'','','','','0'),(718,'N63','MASNIYANTO','','','','',130,'','','','','0'),(719,'N64','ANAM MUHTAR','','','','',130,'','','','','0'),(720,'N65','IRAWATI','','','','',130,'','','','','0'),(721,'N67','HORYADI','','','','',130,'','','','','0'),(722,'N68','DINI HARIANI','','','','',130,'','','','','0'),(723,'N69','MUKHLISON JATIM','','','','',130,'','','','','0'),(724,'N70','IBAD','','','','',130,'','','','','0'),(725,'N71','ELSERIA','','','','',130,'','','','','0'),(726,'P2','NURBAYA','','','','',129,'','','','','0'),(727,'P3','SANYOTO','','','','',129,'','','','','0'),(728,'P4','ADIANTO','','','','',129,'','','','','0'),(729,'P5','IMRON','','','','',129,'','','','','0'),(730,'P6','JUMIATI BERAU','','','','',129,'','','','','0'),(731,'P7','RUDI','','','','',129,'','','','','0'),(732,'P8','SUTRISNO','','','','',129,'','','','','0'),(733,'P9','NUR HAMIDA','','','','',129,'','','','','0'),(734,'P10','TOMMY','','','','',129,'','','','','0'),(735,'P11','FOTS DOBO','','','','',129,'','','','','0'),(736,'P12','FRENGKI','','','','',129,'','','','','0'),(737,'P13','ANGGI','','','','',129,'','','','','0'),(738,'P14','MARKUS','','','','',129,'','','','','0'),(739,'P15','JUWANDI','','','','',129,'','','','','0'),(740,'P16','MP SORONG','','','','',129,'','','','','0'),(741,'P17','SONY','','','','',129,'','','','','0'),(742,'P18','MUSAIDIN','','','','',129,'','','','','0'),(743,'P19','FIRDAUS','','','','',129,'','','','','0'),(744,'P20','SEPTIANDA','','','','',129,'','','','','0'),(745,'P21','FOTS TARAKAN','','','','',129,'','','','','0'),(746,'P22','HERMAN','','','','',129,'','','','','0'),(747,'P23','RASMAL','','','','',129,'','','','','0'),(748,'P24','SAPUTERA','','','','',129,'','','','','0'),(749,'P26','HUTUR','','','','',129,'','','','','0'),(750,'P27','ANWAR','','','','',129,'','','','','0'),(751,'P13','ANGGI','','','','',129,'','','','','0'),(752,'P28','ACOK','','','','',129,'','','','','0'),(753,'P29','ZULKARNAIN','','','','',129,'','','','','0'),(754,'P30','HASRIYANTI','','','','',129,'','','','','0'),(755,'Q1','HENDRA KURNIAWANTA','','','','',127,'','','','','0'),(756,'S1','IBRAHIM','','','','',126,'','','','','0'),(757,'S2','H. RUSDI','','','','',126,'','','','','0'),(758,'S3','EDI','','','','',126,'','','','','0'),(759,'S4','ADENAN','','','','',126,'','','','','0'),(760,'S5','MASLIKHAN','','','','',126,'','','','','0'),(761,'S6','SITI RUBIANTI','','','','',126,'','','','','0'),(762,'S7','ARBAIN','','','','',126,'','','','','0'),(763,'S8','SUWARNI','','','','',126,'','','','','0'),(764,'S9','MASRAN','','','','',126,'','','','','0'),(765,'S10','MASLIAN','','','','',126,'','','','','0'),(766,'S11','AKILIN','','','','',126,'','','','','0'),(767,'S12','MARDI','','','','',126,'','','','','0'),(768,'S13','HAMLI','','','','',126,'','','','','0'),(769,'S14','SITI AKRAMAH','','','','',126,'','','','','0'),(770,'S15','ABDUL GONI','','','','',126,'','','','','0'),(771,'S16','ACEK HASAN','','','','',126,'','','','','0'),(772,'S17','YUSUF','','','','',126,'','','','','0'),(773,'S18','JAHRA','','','','',126,'','','','','0'),(774,'S19','MASRAN PKB','','','','',126,'','','','','0'),(775,'S20','ACHMADI','','','','',126,'','','','','0'),(776,'S21','HAMBLI','','','','',126,'','','','','0'),(777,'S22','JAIDI','','','','',126,'','','','','0'),(778,'S23','FATMAWATI','','','','',126,'','','','','0'),(779,'S24','MASRANSYAH','','','','',126,'','','','','0'),(780,'S25','ABDUL MUIN','','','','',126,'','','','','0'),(781,'S26','JAKA','','','','',126,'','','','','0'),(782,'S27','SYAHRIAN','','','','',126,'','','','','0'),(783,'S28','PURI','','','','',126,'','','','','0'),(784,'S29','KHUSNI','','','','',126,'','','','','0'),(785,'S30','DULHADI','','','','',126,'','','','','0'),(786,'S31','UDI','','','','',126,'','','','','0'),(787,'S32','MAMAN','','','','',126,'','','','','0'),(788,'S33','NURYADIN','','','','',126,'','','','','0'),(789,'S34','DODO','','','','',126,'','','','','0'),(790,'S35','HASAN PKLB','','','','',126,'','','','','0'),(791,'S36','UJANG','','','','',126,'','','','','0'),(792,'S37','JAMAL','','','','',126,'','','','','0'),(793,'S38','KARMAN','','','','',126,'','','','','0'),(794,'S39','NORBAAT','','','','',126,'','','','','0'),(795,'S40','NUR HATTA','','','','',126,'','','','','0'),(796,'S41','SOLEHATI','','','','',126,'','','','','0'),(797,'S42','RIADI','','','','',126,'','','','','0'),(798,'S43','RUSTAM','','','','',126,'','','','','0'),(799,'S44','MINAN','','','','',126,'','','','','0'),(800,'S45','AIRL','','','','',126,'','','','','0'),(801,'S46','YADI','','','','',126,'','','','','0'),(802,'S47','MADI','','','','',126,'','','','','0'),(803,'S48','ENDEK','','','','',126,'','','','','0'),(804,'S49','ASMUDI','','','','',126,'','','','','0'),(805,'S50','JAKARIA','','','','',126,'','','','','0'),(806,'S51','AMAT','','','','',126,'','','','','0'),(807,'S52','ISUK','','','','',126,'','','','','0'),(808,'S53','AGAN','','','','',126,'','','','','0'),(809,'S54','JUNAI','','','','',126,'','','','','0'),(810,'S55','JONI','','','','',126,'','','','','0'),(811,'S56','LIHIN','','','','',126,'','','','','0'),(812,'S57','TONI','','','','',126,'','','','','0'),(813,'S58','MEGI','','','','',126,'','','','','0'),(814,'S59','SUPRIYANTO','','','','',126,'','','','','0'),(815,'S60','UMMI','','','','',126,'','','','','0'),(816,'S61','KHAERUDIN','','','','',126,'','','','','0'),(817,'S62','MUJI','','','','',126,'','','','','0'),(818,'S63','HALIDAH','','','','',126,'','','','','0'),(819,'S64','KAFIDHOH','','','','',126,'','','','','0'),(820,'S65','ARIFIN','','','','',126,'','','','','0'),(821,'S66','KURNIA SAPUTRA','','','','',126,'','','','','0'),(822,'S67','RAMLAN','','','','',126,'','','','','0'),(823,'S68','LAMSI/MULYADIN','','','','',126,'','','','','0'),(824,'S69','SAHMUDIN','','','','',126,'','','','','0'),(825,'S70','RICKY CHRISNA','','','','',126,'','','','','0'),(826,'S71','ADE SAEFUL HAYAT','','','','',126,'','','','','0'),(827,'S72','AHMAD FAUZI','','','','',126,'','','','','0'),(828,'S73','SUPRIYANTO PKLB/USUP','','','','',126,'','','','','0'),(829,'S74','RIMA','','','','',126,'','','','','0'),(830,'T1','JAMALUDIN','','','','',125,'','','','','0'),(831,'T2','TETA KK','','','','',125,'','','','','0'),(832,'T3','TETA','','','','',125,'','','','','0'),(833,'T4','HANISA KK/IWAN SETIAWAN','','','','',125,'','','','','0'),(834,'T5','ISMAIL','','','','',125,'','','','','0'),(835,'T6','HANISA/IWAN SETIAWAN','','','','',125,'','','','','0'),(836,'T7','ISMAIL KK','','','','',125,'','','','','0'),(837,'T8','IKHWAN KK','','','','',125,'','','','','0'),(838,'T9','IKHWAN','','','','',125,'','','','','0'),(839,'T10','MUHAMMAD','','','','',125,'','','','','0'),(840,'T11','AHER','','','','',125,'','','','','0'),(841,'T12','AHER KK','','','','',125,'','','','','0'),(842,'T13','AKMAL','','','','',125,'','','','','0'),(843,'T14','ADI','','','','',125,'','','','','0'),(844,'T15','ARUNA','','','','',125,'','','','','0'),(845,'T16','DAMING','','','','',125,'','','','','0'),(846,'T17','ERNA (ARSYAD)','','','','',125,'','','','','0'),(847,'T18','SARIFUDIN','','','','',125,'','','','','0'),(848,'T19','M. HIDAYAT','','','','',125,'','','','','0'),(849,'T20','M. HIDAYAT KK','','','','',125,'','','','','0'),(850,'T21','JUMIATI','','','','',125,'','','','','0'),(851,'T22','BURHANUDDIN','','','','',125,'','','','','0'),(852,'T23','BURHANUDDIN kk','','','','',125,'','','','','0'),(853,'T24','JAMALUDIN KK','','','','',125,'','','','','0'),(854,'T25','KUIDNG','','','','',125,'','','','','0'),(855,'T26','NATIYAH','','','','',125,'','','','','0'),(856,'T27','KUDING KK','','','','',125,'','','','','0'),(857,'T28','ROSIDAH','','','','',125,'','','','','0'),(858,'T29','NAJIRAH','','','','',125,'','','','','0'),(859,'T30','JAINUDDIN GROGOR','','','','',125,'','','','','0'),(860,'T31','ROSIDAH kk','','','','',125,'','','','','0'),(861,'T32','ADIANTO','','','','',125,'','','','','0'),(862,'T33','HASAN BONTANG','','','','',125,'','','','','0'),(863,'T34','JUMIATI KK','','','','',125,'','','','','0'),(864,'T35','MUHAMMAD SAID','','','','',125,'','','','','0'),(865,'U1','DUDI SUHAEDI','','','','',443,'','','','','0'),(866,'U2','WILIS WIBISONO','','','','',443,'','','','','0'),(867,'U3','ROCHMAT HIDAYAT','','','','',443,'','','','','0'),(868,'U4','HERLIN LUSIANA','','','','',443,'','','','','0'),(869,'U5','KASMIRA','','','','',443,'','','','','0'),(870,'U6','YUSNITA RAHMAH','','','','',443,'','','','','0'),(871,'U7','YUSNITA RAHMAH','','','','',443,'','','','','0'),(872,'U8','DICKY WAHYUDIN','','','','',443,'','','','','0'),(873,'U9','ANDI','','','','',443,'','','','','0'),(874,'U10','DORI','','','','',443,'','','','','0'),(875,'U11','ISKAK','','','','',443,'','','','','0'),(876,'U12','ILLASTUTI','','','','',443,'','','','','0'),(877,'U13','NIWAN','','','','',443,'','','','','0'),(878,'U15','NAFISAH','','','','',443,'','','','','0'),(879,'U16','SADAT','','','','',443,'','','','','0'),(880,'U17','DEDE PRIYANTO','','','','',443,'','','','','0'),(881,'U18','ARI WIRYADI','','','','',443,'','','','','0'),(882,'U19','KURSAN','','','','',443,'','','','','0'),(883,'U20','WARSONO','','','','',443,'','','','','0'),(884,'U21','MARIAH','','','','',443,'','','','','0'),(885,'U22','IPIN SARIPIN','','','','',443,'','','','','0'),(886,'U23','WARTONO','','','','',443,'','','','','0'),(887,'U24','AKHMAD YANI','','','','',443,'','','','','0'),(888,'U25','M AAN HARTONO','','','','',443,'','','','','0'),(889,'U26','ADE ROHADI','','','','',443,'','','','','0'),(890,'U28','PARLIN','','','','',443,'','','','','0'),(891,'U29','TARJUNA','','','','',443,'','','','','0'),(892,'U30','KAISAH','','','','',443,'','','','','0'),(893,'U31','WASTERI','','','','',443,'','','','','0'),(894,'U32','SADIRA','','','','',443,'','','','','0'),(895,'U33','WASTERI','','','','',443,'','','','','0'),(896,'U34','MARYATI','','','','',443,'','','','','0'),(897,'U35','RASBIN B WARYO','','','','',443,'','','','','0'),(898,'U36','WAHYU','','','','',443,'','','','','0'),(899,'U37','JOJO SUMASJO','','','','',443,'','','','','0'),(900,'U38','ADI SAPTOMO','','','','',443,'','','','','0'),(901,'U39','WAMAT','','','','',443,'','','','','0'),(902,'U40','WIRTO HERMATO B TASMIN','','','','',443,'','','','','0'),(903,'U41','KURSAN','','','','',443,'','','','','0'),(904,'U42','KANISA','','','','',443,'','','','','0'),(905,'U43','SUJANA','','','','',443,'','','','','0'),(906,'U44','WARSONO','','','','',443,'','','','','0'),(907,'U45','NURKOLIS','','','','',443,'','','','','0'),(908,'U46','BUDI HERNANTO','','','','',443,'','','','','0'),(909,'U47','SUKMAWATI','','','','',443,'','','','','0'),(910,'U48','PERSIS','','','','',443,'','','','','0'),(911,'U49','KARSIWAN','','','','',443,'','','','','0'),(912,'U50','MASTUR','','','','',443,'','','','','0'),(913,'U51','HERU SANTOSO','','','','',443,'','','','','0'),(914,'U52','YADI','','','','',443,'','','','','0'),(915,'U53','SUSILAWATI','','','','',443,'','','','','0'),(916,'U54','TASINI','','','','',443,'','','','','0'),(917,'U55','TUTI MARYATI','','','','',443,'','','','','0'),(918,'U56','ANTON CAHYANTO','','','','',443,'','','','','0'),(919,'U57','HERU DWI ADZANI','','','','',443,'','','','','0'),(920,'U58','MURODIF','','','','',443,'','','','','0'),(921,'U59','DIANA PUTRI','','','','',443,'','','','','0'),(922,'U60','ABDUL AHMAD ROJAB','','','','',443,'','','','','0'),(923,'U61','CASMO','','','','',443,'','','','','0'),(924,'U62','SUMARNI','','','','',443,'','','','','0'),(925,'U63','ULIMAHSARI','','','','',443,'','','','','0'),(926,'U64','NUR MESYI','','','','',443,'','','','','0'),(927,'U65','FERA SILVIA WULANDARI','','','','',443,'','','','','0'),(928,'U66','SOBANA','','','','',443,'','','','','0'),(929,'U67','OVIC KUSUMA','','','','',443,'','','','','0'),(930,'U68','SURINI','','','','',443,'','','','','0'),(931,'U69','MUALIM','','','','',443,'','','','','0'),(932,'U70','HERMANTO','','','','',443,'','','','','0'),(933,'U71','ERNAWATI','','','','',443,'','','','','0'),(934,'U72','WIRSO','','','','',443,'','','','','0'),(935,'U73','SUNENGSIH','','','','',443,'','','','','0'),(936,'U74','MOH NURUR ROHMAN','','','','',443,'','','','','0'),(937,'U75','SUHARTO','','','','',443,'','','','','0'),(938,'U76','GHOFAR ISMAIL','','','','',443,'','','','','0'),(939,'U77','IBU WAHYUNINGSIH','','','','',443,'','','','','0'),(940,'U78','H M TABRONI B TALAM','','','','',443,'','','','','0'),(941,'U79','RUDI HARYANTO','','','','',443,'','','','','0'),(942,'U80','CASINAH','','','','',443,'','','','','0'),(943,'U81','BUDI LAKSANA','','','','',443,'','','','','0'),(944,'V1','LINA MUSTIKAWATI','','','','',443,'','','','','0'),(945,'V2','ALI NURDIN','','','','',443,'','','','','0'),(946,'V3','H SYAEFUDIN','','','','',443,'','','','','0'),(947,'V4','ANDI HASNATANG','','','','',443,'','','','','0'),(948,'V5','HAPID','','','','',443,'','','','','0'),(949,'V6','FITRIAH','','','','',443,'','','','','0'),(950,'V7','JUJU','','','','',443,'','','','','0'),(951,'V8','LILI SUHELI','','','','',443,'','','','','0'),(952,'V9','ABDUL KOSIM','','','','',443,'','','','','0'),(953,'V10','RIAN SANDI','','','','',443,'','','','','0'),(954,'V11','ROHMAH BT ROHMAN','','','','',443,'','','','','0'),(955,'V12','DEWI FATIMAH','','','','',443,'','','','','0'),(956,'V13','DARMAN','','','','',443,'','','','','0'),(957,'V14','JAELANI','','','','',443,'','','','','0'),(958,'V15','IPROHATUL FUADAH','','','','',443,'','','','','0'),(959,'V16','SUTARNO BIN TARYA','','','','',443,'','','','','0'),(960,'V17','SARJI','','','','',443,'','','','','0'),(961,'V18','NESIN','','','','',443,'','','','','0'),(962,'V19','WAWAN SUARDI','','','','',443,'','','','','0'),(963,'V20','JAKARIA','','','','',443,'','','','','0'),(964,'V21','JAKARIA','','','','',443,'','','','','0'),(965,'V22','SELAMET','','','','',443,'','','','','0'),(966,'V23','TARSAN','','','','',443,'','','','','0'),(967,'V24','KHUSAERI','','','','',443,'','','','','0'),(968,'V25','LENI','','','','',443,'','','','','0'),(969,'V26','MUNJIA','','','','',443,'','','','','0'),(970,'V27','JUNAEDI','','','','',443,'','','','','0'),(971,'V28','BUANG BIN ONYON','','','','',443,'','','','','0'),(972,'V29','SUTRISNO','','','','',443,'','','','','0'),(973,'W1','HARIYANTO','','','','',443,'','','','','0'),(974,'W2','SYAMSUDDIN','','','','',443,'','','','','0'),(975,'W3','SAGEK','','','','',443,'','','','','0'),(976,'W4','ABDUL MUIS','','','','',443,'','','','','0'),(977,'W5','IYON KASIONO SE','','','','',443,'','','','','0'),(978,'W6','SAENAH','','','','',443,'','','','','0'),(979,'W7','HAFLIN MOHAMMAD','','','','',443,'','','','','0'),(980,'W8','NGATINI','','','','',443,'','','','','0'),(981,'W9','NUR HAYANTI HJ','','','','',443,'','','','','0'),(982,'W10','WANIDA','','','','',443,'','','','','0'),(983,'W11','BASUNI','','','','',443,'','','','','0'),(984,'W12','WINDI','','','','',443,'','','','','0'),(985,'W13','NUR MALIKI','','','','',443,'','','','','0'),(986,'W14','SULMAN','','','','',443,'','','','','0'),(987,'W15','MUHAMMAD ROFI','','','','',443,'','','','','0'),(988,'W16','SUWAJI','','','','',443,'','','','','0'),(989,'W17','IWAN SETIAWAN','','','','',443,'','','','','0'),(990,'W18','SUPARMAN','','','','',443,'','','','','0'),(991,'W19',' I KETUT ANOM','','','','',443,'','','','','0'),(992,'W20','ACOK','','','','',443,'','','','','0'),(993,'W21','WARINTO','','','','',443,'','','','','0'),(994,'W22','AHMAD JUNAIDI','','','','',443,'','','','','0'),(995,'Y1','ARBAA','','','','',443,'','','','','0'),(996,'Y2','SAIFUL BASRI','','','','',443,'','','','','0'),(997,'Y3','AIDI','','','','',443,'','','','','0'),(998,'Y4','NAILAH OKTARINI','','','','',443,'','','','','0'),(999,'Y5','AMIRUDIN','','','','',443,'','','','','0'),(1000,'Y6','NASRI','','','','',443,'','','','','0'),(1001,'Y7','SUHERMAN','','','','',443,'','','','','0'),(1002,'Y8','YUNNI APRIANSIH','','','','',443,'','','','','0'),(1003,'Y9','YURANDA IRAWAN','','','','',443,'','','','','0'),(1004,'Y10','INDRA WIJAYA','','','','',443,'','','','','0'),(1005,'Y11','SULASTRI','','','','',443,'','','','','0'),(1006,'Y12','SUPRIADI','','','','',443,'','','','','0'),(1007,'Y13','ARYANTO','','','','',443,'','','','','0'),(1008,'Y14','ELLY','','','','',443,'','','','','0'),(1009,'Y15','MOCHAMAD TAUFIK YUDHA ASWARDHANI','','','','',443,'','','','','0'),(1010,'Z1','MUFRON','','','','',443,'','','','','0'),(1011,'Z2','RUDI','','','','',443,'','','','','0'),(1012,'Z3','HARYATI','','','','',443,'','','','','0'),(1013,'Z4','SUPARMAN','','','','',443,'','','','','0'),(1014,'Z5','YUDHI','','','','',443,'','','','','0'),(1015,'Z6','ASE','','','','',443,'','','','','0'),(1016,'Z7','HARNASYADI','','','','',443,'','','','','0'),(1017,'Z8','SRI HARTINI','','','','',443,'','','','','0'),(1018,'Z9','RAHMAN','','','','',443,'','','','','0'),(1019,'Z10','DINA','','','','',443,'','','','','0'),(1020,'Z11','MULYADI','','','','',443,'','','','','0'),(1021,'Z12','ISMAIL','','','','',443,'','','','','0'),(1022,'Z13','YASIR','','','','',443,'','','','','0'),(1023,'Z14','ADITYA','','','','',443,'','','','','0'),(1024,'Z15','HERI','','','','',443,'','','','','0'),(1025,'Z16','IAN/SUPYANIDI/ZULKIFLI','','','','',443,'','','','','0'),(1026,'Z17','SUDIRMAN','','','','',443,'','','','','0'),(1027,'Z18','EFENDI','','','','',443,'','','','','0'),(1028,'Z19','CAWI','','','','',443,'','','','','0'),(1029,'Z20','NOKY','','','','',443,'','','','','0'),(1030,'Z21','IRAWAN','','','','',443,'','','','','0'),(1031,'Z22','TAHIR','','','','',443,'','','','','0'),(1032,'32323','dodo','d','32332','asas','3355.PNG',404,'Capture325','ddddddddddd',NULL,'333','0');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sign` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','4297f44b13955235245b2497399d7a93',1,'2024-04-07','[\"1\",\"3\"]','bonevyxalu@mailinator.com',NULL),(2,'generalmanager','d56b699830e77ba53855679cb1d252da',2,'2024-05-18','[\"440\"]','generalmanager@generalmanager.com','33.PNG'),(3,'managerproduksi','d56b699830e77ba53855679cb1d252da',3,'2024-05-18','[\"440\"]','managerproduksi@managerproduksi.com','332.PNG'),(4,'adminreceiving','d56b699830e77ba53855679cb1d252da',4,'2024-05-18','[\"440\"]','adminreceiving@adminreceiving.com','333.PNG'),(5,'departementcoasting','d56b699830e77ba53855679cb1d252da',5,'2024-05-18','[\"440\"]','departementcoasting@departementcoasting.com','334.PNG'),(7,'sortir','d56b699830e77ba53855679cb1d252da',7,'2024-05-18','[\"440\"]','sortir@sortir.com','336.PNG'),(8,'adminbahanbaku','d56b699830e77ba53855679cb1d252da',9,'2024-05-18','[\"440\"]','adminbahanbaku@adminbahanbaku.com','337.PNG'),(9,'managerpbb','d56b699830e77ba53855679cb1d252da',10,'2024-05-18','[\"440\"]','managerpbb@managerpbb.com','338.PNG'),(10,'tlbahanbaku','d56b699830e77ba53855679cb1d252da',11,'2024-05-18','[\"440\"]','tlbahanbaku@tlbahanbaku.com','339.PNG'),(11,'fihat','4297f44b13955235245b2497399d7a93',9,'2024-04-07','[\"1\",\"3\"]','rymax@mailinator.com',NULL),(12,'hyfivux','$2y$10$pYRxGz9Qbmp4EtmDWBkf2.6WVJFkl2cmx3c8jWNIWStv/AThJeQDW',5,'2024-04-07','[\"1\",\"3\"]','cedehaligy@mailinator.com',NULL),(13,'pozabe','$2y$10$yF1AkcrZX2eBc60pcR1F5OAx0ei85VoKijTJvd2oounMrUQ5kb6L6',9,'2024-04-08','[\"1\",\"3\"]','fidyrarux@mailinator.com',NULL),(14,'1','$2y$10$ZoTFfrBE7VT.ZC8mtFdE5uoHTcy9Tq/YE3Gzin80Dnd.5ornagYLq',2,'2024-04-08','[\"1\",\"3\"]','2222@gmail.com',NULL),(15,'wycajinose','$2y$10$fH/49RDgnxfraw4hvAJosOgZdvICTFk3IWCrnZwtBz1Sw2Y2l.ffK',2,'2024-04-08','[\"1\",\"3\"]','bupefy@mailinator.com',NULL),(26,'receiving_jakarta','202cb962ac59075b964b07152d234b70',4,'2024-05-20','[\"404\"]','taufikcamp43@gmail.com','3310.PNG'),(27,'tl_bbjakarta','202cb962ac59075b964b07152d234b70',11,'2024-05-20','[\"404\"]','taufikcamp43@gmail.com','3311.PNG'),(28,'tl_bbkalsel','202cb962ac59075b964b07152d234b70',11,'2024-05-20','[\"131\"]','taufikcamp43@gmail.com','Capture32.PNG'),(29,'coasting_jakarta','202cb962ac59075b964b07152d234b70',5,'2024-05-20','[\"404\"]','coasting@gmail.com','3312.PNG'),(30,'produksi_jakarta','202cb962ac59075b964b07152d234b70',3,'2024-05-20','[\"404\"]','taufikcamp43@gmail.com','3313.PNG'),(31,'sortirjakarta','202cb962ac59075b964b07152d234b70',7,'2024-05-20','[\"404\"]','p90110@listrindo.com','3314.PNG'),(32,'tlsortirjakarta','202cb962ac59075b964b07152d234b70',6,'2024-05-20','[\"404\"]','taufikcamp43@gmail.com','3315.PNG'),(33,'alimar','202cb962ac59075b964b07152d234b70',2,'2024-05-21','[\"404\",\"559\",\"442\"]','alex@gmail.com','3323.PNG'),(34,'dio','202cb962ac59075b964b07152d234b70',4,'2024-05-21','[\"404\",\"441\"]','taufikcamp43@gmail.com','3324.PNG'),(35,'deni','202cb962ac59075b964b07152d234b70',11,'2024-05-21','[\"442\"]','taufikcamp43@gmail.com','3325.PNG'),(36,'bayu','202cb962ac59075b964b07152d234b70',2,'2024-05-21','[\"454\"]','taufikcamp43@gmail.com','3326.PNG'),(37,'doni','202cb962ac59075b964b07152d234b70',5,'2024-05-21','[\"124\"]','taufikcamp43@gmail.com','3327.PNG'),(38,'danil','202cb962ac59075b964b07152d234b70',6,'2024-05-21','[\"442\",\"123\",\"124\"]','taufikcamp43@gmail.com','3328.PNG'),(39,'user_bb','202cb962ac59075b964b07152d234b70',4,'2024-05-22','[\"404\"]','','3348.PNG'),(40,'jojo','202cb962ac59075b964b07152d234b70',11,'2024-05-22','[\"404\"]','','3349.PNG'),(41,'ina','202cb962ac59075b964b07152d234b70',6,'2024-05-22','[\"404\"]','','Capture323.PNG'),(42,'mila','202cb962ac59075b964b07152d234b70',5,'2024-05-22','[\"404\"]','','3350.PNG'),(43,'alimar','202cb962ac59075b964b07152d234b70',2,'2024-05-22','[\"404\"]','','3351.PNG'),(44,'nurul','202cb962ac59075b964b07152d234b70',9,'2024-05-22','[\"404\"]','','3352.PNG'),(45,'iwan','202cb962ac59075b964b07152d234b70',3,'2024-05-22','[\"404\"]','','3353.PNG'),(47,'tl_sortir','202cb962ac59075b964b07152d234b70',6,'2024-05-22','[\"404\"]','','3354.PNG'),(48,'tl_banjar','202cb962ac59075b964b07152d234b70',11,'2024-05-23','[\"454\"]','','3356.PNG');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pbb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-28 18:33:12
