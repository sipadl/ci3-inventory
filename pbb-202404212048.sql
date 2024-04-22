-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: pbb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nama_area` text NOT NULL,
  `kode_area` text NOT NULL,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_daging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `daging_putih` text NOT NULL,
  `daging_merah` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_daging`
--

LOCK TABLES `tbl_daging` WRITE;
/*!40000 ALTER TABLE `tbl_daging` DISABLE KEYS */;
INSERT INTO `tbl_daging` VALUES (53,'2024-04-16','j6','1','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]',0,'0',0,'1'),(54,'2024-04-16','K2','1','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]',0,'0',0,'1'),(55,'2024-04-17','K2','111','[{\"spek\":\"3\",\"bungkus\":\"3\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]','[{\"spek\":\"3\",\"bungkus\":\"2\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]',0,'0',0,'22'),(56,'2024-04-16','j6','re','[{\"spek\":\"22\",\"bungkus\":\"33\",\"tkotor\":\"44\",\"tbersih\":\"55\"},{\"spek\":\"88\",\"bungkus\":\"77\",\"tkotor\":\"66\",\"tbersih\":\"66\"}]','[{\"spek\":\"99\",\"bungkus\":\"88\",\"tkotor\":\"77\",\"tbersih\":\"66\"},{\"spek\":\"334\",\"bungkus\":\"33\",\"tkotor\":\"54\",\"tbersih\":\"56\"}]',0,'0',0,'2'),(57,'2024-04-16','K1','Ayam','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"11\"}]','[{\"spek\":\"1\",\"bungkus\":\"2\",\"tkotor\":\"3\",\"tbersih\":\"12.1\"}]',0,'0',0,'23.1'),(58,'2024-04-16','K1','Ikan Nemu','[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"10\",\"tbersih\":\"11.2\"}]','[{\"spek\":\"11\",\"bungkus\":\"12\",\"tkotor\":\"33\",\"tbersih\":\"50.1\"}]',0,'0',0,'61.3'),(59,'2024-04-16','K1','Bebek Bakar','[{\"spek\":\"19\",\"bungkus\":\"99\",\"tkotor\":\"99\",\"tbersih\":\"99\"}]','[{\"spek\":\"123\",\"bungkus\":\"123\",\"tkotor\":\"12\",\"tbersih\":\"119\"}]',0,'0',0,'218'),(60,'2024-04-16','K1','Kambing','[{\"spek\":\"10\",\"bungkus\":\"11\",\"tkotor\":\"14\",\"tbersih\":\"13.5\"}]','[{\"spek\":\"30\",\"bungkus\":\"120\",\"tkotor\":\"150\",\"tbersih\":\"551\"}]',0,'0',0,'564.5');
/*!40000 ALTER TABLE `tbl_daging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kota`
--

DROP TABLE IF EXISTS `tbl_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `kode_area` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subsidi_normal` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_1` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_2` varchar(100) DEFAULT NULL,
  `cap_shell` varchar(100) DEFAULT NULL,
  `subsidi_transport` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `id_sortir` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `approved_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_laporan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_laporan`
--

LOCK TABLES `tbl_laporan` WRITE;
/*!40000 ALTER TABLE `tbl_laporan` DISABLE KEYS */;
INSERT INTO `tbl_laporan` VALUES (1,'1000000','1000000','1000000','1000000','1000000','2024-04-21',57,0,NULL);
/*!40000 ALTER TABLE `tbl_laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_memo`
--

DROP TABLE IF EXISTS `tbl_memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `subsidi` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `id_sortir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_memo`
--

LOCK TABLES `tbl_memo` WRITE;
/*!40000 ALTER TABLE `tbl_memo` DISABLE KEYS */;
INSERT INTO `tbl_memo` VALUES (6,'K2','1979-03-12','1363','0','1',NULL,5);
/*!40000 ALTER TABLE `tbl_memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pembayaran_dp`
--

DROP TABLE IF EXISTS `tbl_pembayaran_dp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pembayaran_dp` (
  `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` text NOT NULL,
  `id_area` int(11) NOT NULL,
  `bahan_masuk` text NOT NULL,
  `dp_seratus` text NOT NULL,
  `dp_enampuluh` text NOT NULL,
  `diminta_supplier` text NOT NULL,
  `bank` text NOT NULL,
  `no_rek` text NOT NULL,
  `nama_rekening` text NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_penerimaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT '0',
  `approved_by` varchar(100) DEFAULT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `id_sortir` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `potongan_harga` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penerimaan`
--

LOCK TABLES `tbl_penerimaan` WRITE;
/*!40000 ALTER TABLE `tbl_penerimaan` DISABLE KEYS */;
INSERT INTO `tbl_penerimaan` VALUES (1,'1','4','K2','2','2024-04-21','11','12317');
/*!40000 ALTER TABLE `tbl_penerimaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pengajuan`
--

DROP TABLE IF EXISTS `tbl_pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pengajuan`
--

LOCK TABLES `tbl_pengajuan` WRITE;
/*!40000 ALTER TABLE `tbl_pengajuan` DISABLE KEYS */;
INSERT INTO `tbl_pengajuan` VALUES (1,'Purwakarta','1',NULL,'1','1','2','Placeat unde ab et ','','2024-04-20','a',1,'2024-04-20 11:07:41','K1',NULL),(2,'Purwakarta','Doloremque dolore ex',NULL,'Elit quaerat est q','Exercitation odit no','Delectus neque sit ','bca','','2008-04-28','Deserunt illum enim',1,'2024-04-20 11:24:13','j6',NULL);
/*!40000 ALTER TABLE `tbl_pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_price`
--

DROP TABLE IF EXISTS `tbl_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_price` (
  `id_price` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `id_area` int(30) NOT NULL,
  PRIMARY KEY (`id_price`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_price`
--

LOCK TABLES `tbl_price` WRITE;
/*!40000 ALTER TABLE `tbl_price` DISABLE KEYS */;
INSERT INTO `tbl_price` VALUES (1,'COL','560,000.00',2),(2,'JB','560,000.00',2),(3,'JBJK',' 285,000.00',2),(4,'JL','285,000.00 ',2),(5,'XLP','275,000.00 ',2),(6,'KJ',' 285,000.00 ',2),(7,'BF / LP',' 285,000.00 ',2),(8,'SPK',' 275,000.00 ',2),(9,'SP',' 5,000.00 ',2),(10,'SPH','5,000.00 ',0),(11,'CL',' 10,000.00 ',2),(12,'CLF',' 30,000.00 ',2),(13,'MH',' 3,000.00 ',2),(14,'MHR','  30,000.00 ',2),(15,'PHR','45,000.00 ',2),(16,'B COL','45,000.00 ',2),(17,'B JB','45,000.00 ',2),(18,'B JBJK	','45,000.00',2),(19,'B XLP','45,000.00',2),(20,'B BF / LP','45,000.00',2),(21,'B SPK','45,000.00',2),(22,'B SP','45,000.00',2),(23,'B CL','30,000.00 ',2),(24,'B MH','30,000.00 ',2),(25,'SHELL','1',2);
/*!40000 ALTER TABLE `tbl_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` text NOT NULL,
  `descriptiom` text NOT NULL,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sortir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(255) DEFAULT NULL,
  `tanggal_sj` date DEFAULT NULL,
  `tanggal_rec` date DEFAULT NULL,
  `tanggal_rec2` date DEFAULT NULL,
  `tanggal_rec3` date DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
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
  `timbangan_kotor` varchar(255) DEFAULT NULL,
  `timbangan_bb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `jbb_jf` varchar(255) DEFAULT NULL,
  `spk_sp` varchar(255) DEFAULT NULL,
  `sp_sph` varchar(255) DEFAULT NULL,
  `id_bb` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `cap` varchar(100) DEFAULT NULL,
  `potong` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sortir`
--

LOCK TABLES `tbl_sortir` WRITE;
/*!40000 ALTER TABLE `tbl_sortir` DISABLE KEYS */;
INSERT INTO `tbl_sortir` VALUES (3,'K1','2024-04-18','2024-04-18',NULL,NULL,1,'1','2','23','3','4',NULL,'3','2','3','3','3','3','3','3','3','33','3','3','3','3','3',NULL,'3','3','3','222','9','09','8','77','11','123','123','123','11','1','112','1221','122','122','11',0,'3','3','3',55,NULL,NULL,NULL),(4,'j6','1989-08-27','2013-08-06',NULL,NULL,1,'50','23','64','60','53',NULL,'90','41','9','38','51','44','89','82','89','17','25','18','91','68','1',NULL,'12','20','73','89','55','92','14','43','47','35','7','92','80','3','59','1','48','54','33.2',0,'13','82','12',56,4,NULL,NULL),(5,'K2','1985-12-06','1979-03-12',NULL,NULL,1,'60','63','39','34','77',NULL,'55','75','14','51','58','15','57','23','72','96','21','39','92','84','35',NULL,'64','66','84','89','4','76','52','63','77','11','53','37','36','3','88','53','74','13','11.2',3,'2','86','27',57,4,NULL,NULL),(8,'j6','1996-09-09','2004-07-23','2024-04-18','2024-04-18',1,'26','0','70','99','50',NULL,'1','92','61','79','56','48','56','67','57','54','96','59','27','63','70',NULL,'26','98','0','29','78','11','70','90','97','27','99','16','60','82','38','2','37','1','78',4,'19','35','2',54,4,NULL,NULL),(9,'j6','2024-04-12','2024-04-05',NULL,NULL,8,'1.3','10.9','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,'','','',53,NULL,NULL,NULL),(10,'j6','2024-04-20','2024-04-20','2024-04-20',NULL,9,'9','9','9','9','99',NULL,'9','9','9','9','9','9','9','9','9','9','99','9','9','9','9',NULL,'9','9','9','99',NULL,'9','9','9','9','9','9',NULL,'9','9','9','9','9.5',NULL,NULL,NULL,'9','9','9',58,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_sortir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(255) NOT NULL,
  `nama_supplier` text NOT NULL,
  `bank` text NOT NULL,
  `nomor` text NOT NULL,
  `an` text NOT NULL,
  `npwp` text NOT NULL,
  `id_area` int(11) NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `no_rekening` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (1,'K1','Et qui occaecat et i','Placeat unde ab et ','Recusandae Assumend','Odit eos nostrum eni','Adipisicing sint qu',443,0,'Asperiores duis dolo','',NULL),(2,'K2','Obcaecati eligendi s','Est veniam rerum s','Adipisci aut commodo','Ut dolores rem eiusm','Commodi in ex molest',443,0,'Deserunt officiis co','',NULL),(3,'j6','adi','bca','gddg','taufik','6565656',443,323232,'sasasas','',NULL),(4,'rudi','Rudianto','BCA','081','rudi','2.png',440,21,'Hehe','',NULL);
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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

-- Dump completed on 2024-04-21 20:48:24
