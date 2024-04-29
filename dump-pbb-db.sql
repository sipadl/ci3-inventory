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
  `nama_area` text COLLATE utf8mb4_general_ci NOT NULL,
  `kode_area` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_area`
--

LOCK TABLES `tbl_area` WRITE;
/*!40000 ALTER TABLE `tbl_area` DISABLE KEYS */;
INSERT INTO `tbl_area` VALUES (2,'Jakarta','440'),(4,'Purwakarta','443'),(6,'Banjarmasin','454'),(10,'Pontianak','559');
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
  `supplier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_daging`
--

LOCK TABLES `tbl_daging` WRITE;
/*!40000 ALTER TABLE `tbl_daging` DISABLE KEYS */;
INSERT INTO `tbl_daging` VALUES (18,'2024-04-23','j6',0,'0',0),(19,'2024-04-24','K1',0,'0',0),(20,'0000-00-00','K1',0,'0',0),(21,'2024-04-29','K1',0,'0',0),(22,'2024-04-30','K1',0,'0',0),(23,'2024-04-30','K1',0,'0',0),(24,'2024-04-30','K1',0,'0',0);
/*!40000 ALTER TABLE `tbl_daging` ENABLE KEYS */;
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
  `nama_kota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `subsidi_normal` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subsidi_dibayar_1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subsidi_dibayar_2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cap_shell` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subsidi_transport` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `id_sortir` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `approved_by` int DEFAULT NULL,
  `subsidi_dibayar_3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_laporan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_laporan`
--

LOCK TABLES `tbl_laporan` WRITE;
/*!40000 ALTER TABLE `tbl_laporan` DISABLE KEYS */;
INSERT INTO `tbl_laporan` VALUES (1,'1000000','1000000','1000000','1000000','1000000','2024-04-21',57,0,NULL,NULL),(2,'500000','300000','100000','10000','10000','2024-04-22',1,1,NULL,NULL),(3,'40000','40000','20000','10','30000','2024-04-24',19,0,NULL,'10000');
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
  `kode_supplier` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT '0',
  `subsidi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_sortir` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_memo`
--

LOCK TABLES `tbl_memo` WRITE;
/*!40000 ALTER TABLE `tbl_memo` DISABLE KEYS */;
INSERT INTO `tbl_memo` VALUES (6,'K2','1979-03-12','1363','4','1','4',5),(7,'K2','2024-04-22','594','0','50000',NULL,1),(8,'K2','2024-04-22','594','0','30000',NULL,1),(9,'K2','2024-04-22','594','4','100000','4',6);
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
  `nama_supplier` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_area` int NOT NULL,
  `bahan_masuk` text COLLATE utf8mb4_general_ci NOT NULL,
  `dp_seratus` text COLLATE utf8mb4_general_ci NOT NULL,
  `dp_enampuluh` text COLLATE utf8mb4_general_ci NOT NULL,
  `diminta_supplier` text COLLATE utf8mb4_general_ci NOT NULL,
  `bank` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_rek` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama_rekening` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pembayaran_dp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT '0',
  `approved_by` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_supplier` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_sortir` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `potongan_harga` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penerimaan`
--

LOCK TABLES `tbl_penerimaan` WRITE;
/*!40000 ALTER TABLE `tbl_penerimaan` DISABLE KEYS */;
INSERT INTO `tbl_penerimaan` VALUES (1,'1','4','K2','2','2024-04-21','11','12317'),(2,'1','4','K2','6','2024-04-22','','2079009'),(3,'1','4','K2','6','2024-04-22','','2079009');
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
  `area` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bahan_masuk` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `upload_images` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dp_60` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `request_dp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_bayar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_rek` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `supplier` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_approval` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty_kg` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dp_100` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pengajuan`
--

LOCK TABLES `tbl_pengajuan` WRITE;
/*!40000 ALTER TABLE `tbl_pengajuan` DISABLE KEYS */;
INSERT INTO `tbl_pengajuan` VALUES (1,'Purwakarta','1',NULL,'1','1','2','Placeat unde ab et ','','2024-04-20','a',1,'2024-04-20 11:07:41','K1',NULL,'  1111',NULL,NULL),(2,'Purwakarta','Doloremque dolore ex',NULL,'Elit quaerat est q','Exercitation odit no','Delectus neque sit ','bca','','2008-04-28','Deserunt illum enim',1,'2024-04-20 11:24:13','j6',NULL,NULL,NULL,NULL),(3,'Purwakarta','1',NULL,'15','10','25','Placeat unde ab et ','1234','2024-04-23','menunggu audit',0,'2024-04-22 09:52:29','K1',NULL,NULL,NULL,NULL),(4,'Purwakarta','3','user8-128x128.jpg','1','2','3','Placeat unde ab et ','1234','2024-04-22','p',0,'2024-04-22 09:56:23','K1',NULL,NULL,NULL,NULL),(5,'Purwakarta','1','AdminLTELogo2.png','4','5','6','Placeat unde ab et ','1234','2024-04-24','1',0,'2024-04-24 14:27:40','K1',NULL,NULL,'2','3');
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
  `nama_produk` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `id_area` int NOT NULL,
  PRIMARY KEY (`id_price`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_price`
--

LOCK TABLES `tbl_price` WRITE;
/*!40000 ALTER TABLE `tbl_price` DISABLE KEYS */;
INSERT INTO `tbl_price` VALUES (1,'COL','560000',2),(2,'JB','560000',2),(3,'JBJK',' 285000',2),(4,'JL','285000',2),(5,'XLP','275000',2),(6,'KJ',' 285000',2),(7,'BF / LP',' 285000',2),(8,'SPK','275000',2),(9,'SP',' 5,000',2),(10,'SPH',' 5,000',0),(11,'CL',' 10000',2),(12,'CLF',' 30000',2),(13,'MH',' 3000',2),(14,'MHR',' 30000',2),(15,'PHR','45000',2),(16,'B COL','45000',2),(17,'B JB','45000',2),(18,'B JBJK	','45000',2),(19,'B XLP','45000',2),(20,'B BF / LP','45000',2),(21,'B SPK','45000',2),(22,'B SP','45000',2),(23,'B CL',' 30000',2),(24,'B MH',' 30000',2),(25,'SHELL','1',2);
/*!40000 ALTER TABLE `tbl_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nama_role` text COLLATE utf8mb4_general_ci NOT NULL,
  `descriptiom` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` VALUES (1,'master_admin','Master Admin'),(2,'general_manager','General Manager'),(3,'manager_produksi','Manager Produksi'),(4,'admin_receiving','Admin Receiving'),(5,'departement_coasting','Departement Coasting'),(6,'tl_sortir','Team Leader Sortir'),(7,'sortir','sortir'),(8,'supplier','supplier'),(9,'admin_bahan_baku','Admin Bahan Baku '),(10,'manager_pbb','Manager PBB');
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
  `kode_supplier` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_sj` date DEFAULT NULL,
  `tanggal_rec` date DEFAULT NULL,
  `tanggal_rec2` date DEFAULT NULL,
  `tanggal_rec3` date DEFAULT NULL,
  `number` int DEFAULT NULL,
  `col` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jb_bf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jbb_jk` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jbb_bf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `xlp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_k3_col` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_k3_jb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_k3_jk` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_k3_jl` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_jl` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_kj` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_bf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_lp_slb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_sp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_spk_xlp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bf_spk_sp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spk_sp_jb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spk_sp_xlp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spk_sp_bfp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spk_sp_sph` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sp_cl` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sp_clf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mh` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mh_slb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phr` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_col` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_jb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_jk` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_xlp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_bf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_sp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mhr` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_cl` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basi_mh` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `air` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shell` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loss` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timbangan_kotor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timbangan_bb` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `jbb_jf` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spk_sp` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sp_sph` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_bb` int DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `cap` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `potong` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shell_phr_keras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shell_mhr_keras` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shell_phr_halus` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shell_mhr_halus` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sortir`
--

LOCK TABLES `tbl_sortir` WRITE;
/*!40000 ALTER TABLE `tbl_sortir` DISABLE KEYS */;
INSERT INTO `tbl_sortir` VALUES (6,'K2','2024-04-22','2024-04-22',NULL,NULL,1,'9','9','9','9','9',NULL,'9','99','','99','99','9','9','9','9','9','9','9','9','9','99',NULL,'9','9','9','9',NULL,'9','9','9','9','9','9',NULL,'9','9','9','9','9',NULL,NULL,5,'9','9','9',1,4,'ya','9',NULL,NULL,NULL,NULL,NULL,NULL),(7,'j6','2024-04-23','2024-04-22',NULL,NULL,7,'3','8','8','8','8',NULL,'8','88','8','8','8','8','8','8','8','8','8','8','8','8','8',NULL,'8','8','8','8',NULL,'8','8','8','8','8','8',NULL,'8','8','8','8','5',NULL,NULL,5,'8','8','8',2,4,'ya','11',NULL,NULL,NULL,NULL,NULL,NULL),(8,'K1','2024-04-23','2024-04-23',NULL,NULL,8,'1','2','3','4','5',NULL,'7','8','9','9','8','7','6','5','4','3','2','1','2','2','2',NULL,'1','3','3','3',NULL,'4','4','4','4','4','4',NULL,'4','4','5','5','5',NULL,NULL,5,'6','2','2',19,NULL,'ya','22','X',NULL,NULL,NULL,NULL,NULL),(9,'K1','2024-04-30','2024-04-29',NULL,NULL,24,'9','9','9','9','9',NULL,'9','9','99','9','9','9','9','9','9','9','9','9','9','9','9',NULL,'9','9','9','9',NULL,'9','9','9','99','9','9',NULL,'9','9','','9','99',NULL,NULL,2,'9','9','',24,4,'ya',NULL,'Woke','9','9','9','9',NULL);
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
  `spesifikasi_bahan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spek` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bungkus` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tkotor` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tbersih` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spek2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bungkus2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tkotor2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tbersih2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipe` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_sub_daging_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_daging`
--

LOCK TABLES `tbl_sub_daging` WRITE;
/*!40000 ALTER TABLE `tbl_sub_daging` DISABLE KEYS */;
INSERT INTO `tbl_sub_daging` VALUES (1,18,'1','23','3','3','3','4','4','4','4',NULL,NULL),(2,19,'Q','1','2','3','4','4','3','2','1','5',NULL),(3,19,'W','2','1','2','1','1','2','1','2','3',NULL),(4,20,'','A','1','1','1','A','2','2','2','3',NULL),(5,20,'','A','3','3','3','','','','','3',NULL),(6,22,'','A1','1','1','1',NULL,NULL,NULL,NULL,'1',0),(7,22,'','A2','2','2','2',NULL,NULL,NULL,NULL,'2',1),(8,22,'','A','1','1','1',NULL,NULL,NULL,NULL,'1',1),(9,24,'','A1','1','1','1',NULL,NULL,NULL,NULL,'1',0),(10,24,'','A2','2','2','2',NULL,NULL,NULL,NULL,'2',1),(11,24,'','A','1','1','1',NULL,NULL,NULL,NULL,'1',1);
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
  `kode_supplier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_supplier` text COLLATE utf8mb4_general_ci NOT NULL,
  `bank` text COLLATE utf8mb4_general_ci NOT NULL,
  `nomor` text COLLATE utf8mb4_general_ci NOT NULL,
  `an` text COLLATE utf8mb4_general_ci NOT NULL,
  `npwp` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_area` int NOT NULL,
  `no_ktp` int NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rekening` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (1,'K1','Et qui occaecat et i','Placeat unde ab et ','Recusandae Assumend','Odit eos nostrum eni','Adipisicing sint qu',443,0,'Asperiores duis dolo','','1234'),(2,'K2','Obcaecati eligendi s','Est veniam rerum s','Adipisci aut commodo','Ut dolores rem eiusm','Commodi in ex molest',443,0,'Deserunt officiis co','','1244'),(3,'j6','adi','bca','gddg','taufik','6565656',443,323232,'sasasas','','12345'),(4,'rudi','Rudianto','BCA','081','rudi','2.png',440,21,'Hehe','','11223344');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (4,'admin','4297f44b13955235245b2497399d7a93',9,'2024-04-07','[\"1\",\"3\"]','bonevyxalu@mailinator.com'),(5,'fihat','4297f44b13955235245b2497399d7a93',9,'2024-04-07','[\"1\",\"3\"]','rymax@mailinator.com'),(6,'hyfivux','$2y$10$pYRxGz9Qbmp4EtmDWBkf2.6WVJFkl2cmx3c8jWNIWStv/AThJeQDW',5,'2024-04-07','[\"1\",\"3\"]','cedehaligy@mailinator.com'),(7,'pozabe','$2y$10$yF1AkcrZX2eBc60pcR1F5OAx0ei85VoKijTJvd2oounMrUQ5kb6L6',9,'2024-04-08','[\"1\",\"3\"]','fidyrarux@mailinator.com'),(8,'1','$2y$10$ZoTFfrBE7VT.ZC8mtFdE5uoHTcy9Tq/YE3Gzin80Dnd.5ornagYLq',2,'2024-04-08','[\"1\",\"3\"]','2222@gmail.com'),(9,'wycajinose','$2y$10$fH/49RDgnxfraw4hvAJosOgZdvICTFk3IWCrnZwtBz1Sw2Y2l.ffK',2,'2024-04-08','[\"1\",\"3\"]','bupefy@mailinator.com');
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

-- Dump completed on 2024-04-29 12:04:51