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
  `qty` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_daging`
--

LOCK TABLES `tbl_daging` WRITE;
/*!40000 ALTER TABLE `tbl_daging` DISABLE KEYS */;
INSERT INTO `tbl_daging` VALUES (1,'1987-04-02','0','Qui nostrud cumque s','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',0,0),(2,'1987-04-02','0','Qui nostrud cumque s','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',0,0),(3,'1989-07-10','0','Et pariatur Aut rer','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',0,0),(4,'2002-12-19','0','Esse voluptate liber','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',-1,0),(5,'1998-11-27','0','Quibusdam consequatu','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',0,0),(6,'1998-11-27','0','Quibusdam consequatu','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'',0,0),(7,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(8,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(9,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(10,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(11,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(12,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(13,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(14,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(15,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(16,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(17,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(18,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,212),(19,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(20,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(21,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(22,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(23,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(24,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(25,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(26,'0000-00-00','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(27,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(28,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(29,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(30,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(31,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(32,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(33,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(34,'2024-04-16','0','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(35,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,12),(36,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,12),(37,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(38,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(39,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(40,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(41,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(42,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(43,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(44,'2024-04-16','0','11','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(45,'2024-04-16','0','','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,11),(46,'0000-00-00','0','8','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(47,'0000-00-00','0','8','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(48,'2024-04-16','0','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(49,'2024-04-16','0','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(50,'2024-04-16','0','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(51,'0000-00-00','0','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(52,'2024-04-11','0','2','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,3),(53,'2024-04-16','j6','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(54,'2024-04-16','K2','1','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,1),(55,'0000-00-00','K2','111','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,22),(56,'2024-04-16','j6','re','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]','[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]',0,'0',0,2),(57,'0000-00-00','K1','1','[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]','[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]',0,'0',0,8);
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
  `status` int(2) DEFAULT 0,
  `jbb_jf` varchar(255) NOT NULL,
  `spk_sp` varchar(255) NOT NULL,
  `sp_sph` varchar(255) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `cap` varchar(255) NOT NULL,
  `potong` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sortir`
--

LOCK TABLES `tbl_sortir` WRITE;
/*!40000 ALTER TABLE `tbl_sortir` DISABLE KEYS */;
INSERT INTO `tbl_sortir` VALUES (1,'K2','2001-07-07','2024-04-21',NULL,NULL,19,'1','2','3','5','2','1','23','22','1','1','1','2','4','1','2','3','5','11','12','12','1','113','3','2','11','1','23','4','1','212','11','1','2','5','2','5','1','11','42','1','33',0,'32','312','111',57,'Ya','22');
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
  `no_ktp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (1,'K1','Et qui occaecat et i','Placeat unde ab et ','Recusandae Assumend','Odit eos nostrum eni','Adipisicing sint qu',0,'0','Asperiores duis dolo',''),(2,'K2','Obcaecati eligendi s','Est veniam rerum s','Adipisci aut commodo','Ut dolores rem eiusm','Commodi in ex molest',0,'0','Deserunt officiis co',''),(3,'j6','adi','bca','gddg','taufik','6565656',443,'323232','sasasas',''),(4,'Architecto in possim','Quo sunt maiores est','Dolor autem distinct','+1 (126) 902-1475','Nulla aliquip aute d','Screenshot (3).png',559,'0','Qui eaque consectetu',''),(5,'Libero ut facere est','Dolor obcaecati dolo','In molestias perspic','+1 (359) 795-4626','Pariatur Consequat','Screenshot_(3)9.png',440,'Screenshot_(3)10.png','Quidem distinctio E','');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','$2y$08$NtXgdffk6T39Aq5Liz7zh.682Te.Z12DoLVwg6Q9ZHmCOuaLXYlQe',6,NULL,'[\"1\",\"3\"]',''),(2,'user','$2y$10$xW1GCpZhK0a5IKJeGn1BheX1uIaXaCnfOj7vvHLXpCyKHhykQ.GOC',6,NULL,'[\"1\",\"3\"]',''),(3,'tucyme','$2y$10$2pi2mXpLXwKcHI0Xwwd2Q.sGNe9MkBEcPb9/PVVEEpWkAA5sxRb5y',1,'0000-00-00','[\"1\",\"3\"]','bute@mailinator.com'),(4,'wuvofaqaq','$2y$10$2/wmYRSbPaixerOHF3akd.TNFnMZiO6ggXdXEtWnd7f6eQfD4wYym',9,'2024-04-07','[\"1\",\"3\"]','bonevyxalu@mailinator.com'),(5,'fihat','$2y$10$B1O4BlWph4X1BUlGzUGgJueC4fSbXM8/BfQupX5LU1y8UsZjzRb2y',9,'2024-04-07','[\"1\",\"3\"]','rymax@mailinator.com'),(6,'hyfivux','$2y$10$pYRxGz9Qbmp4EtmDWBkf2.6WVJFkl2cmx3c8jWNIWStv/AThJeQDW',5,'2024-04-07','[\"1\",\"3\"]','cedehaligy@mailinator.com'),(7,'pozabe','$2y$10$yF1AkcrZX2eBc60pcR1F5OAx0ei85VoKijTJvd2oounMrUQ5kb6L6',9,'2024-04-08','[\"1\",\"3\"]','fidyrarux@mailinator.com'),(8,'1','$2y$10$ZoTFfrBE7VT.ZC8mtFdE5uoHTcy9Tq/YE3Gzin80Dnd.5ornagYLq',2,'2024-04-08','[\"1\",\"3\"]','2222@gmail.com'),(9,'wycajinose','$2y$10$fH/49RDgnxfraw4hvAJosOgZdvICTFk3IWCrnZwtBz1Sw2Y2l.ffK',2,'2024-04-08','[\"1\",\"3\"]','bupefy@mailinator.com'),(10,'123','$2y$10$9IgUkE0NCCzTVtksLR382OyCgY/QUMP4.b4lSbsrDFV5XAldDcTUO',1,'2024-04-16','[\"443\"]','123@gmail.com'),(11,'123','$2y$10$pApytkIcvs3GkO82lhaz9.oGXqoUCkKu/Am1RY.agA/lACvcnqZiW',2,'2024-04-16','[\"454\"]','123@gmail.com');
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

-- Dump completed on 2024-04-17  1:14:34
