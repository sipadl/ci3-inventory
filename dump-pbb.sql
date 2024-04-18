-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 03:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id_area` int(11) NOT NULL,
  `nama_area` text NOT NULL,
  `kode_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id_area`, `nama_area`, `kode_area`) VALUES
(2, 'Jakarta', '440'),
(4, 'Purwakarta', '443'),
(6, 'Banjarmasin', '454'),
(10, 'Pontianak', '559');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daging`
--

CREATE TABLE `tbl_daging` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `daging_putih` text NOT NULL,
  `daging_merah` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `spesifikasi`, `daging_putih`, `daging_merah`, `user_id`, `wilayah`, `status`, `qty`) VALUES
(1, '1987-04-02', '0', 'Qui nostrud cumque s', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', 0, 0),
(2, '1987-04-02', '0', 'Qui nostrud cumque s', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', 0, 0),
(3, '1989-07-10', '0', 'Et pariatur Aut rer', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', 0, 0),
(4, '2002-12-19', '0', 'Esse voluptate liber', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', -1, 0),
(5, '1998-11-27', '0', 'Quibusdam consequatu', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', 0, 0),
(6, '1998-11-27', '0', 'Quibusdam consequatu', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '', 0, 0),
(7, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(8, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(9, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(10, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(11, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(12, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(13, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(14, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(15, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(16, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(17, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(18, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 212),
(19, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(20, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(21, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(22, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(23, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(24, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(25, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(26, '0000-00-00', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(27, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(28, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(29, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(30, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(31, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(32, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(33, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(34, '2024-04-16', '0', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(35, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 12),
(36, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 12),
(37, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(38, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(39, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(40, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(41, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(42, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(43, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(44, '2024-04-16', '0', '11', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(45, '2024-04-16', '0', '', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 11),
(46, '0000-00-00', '0', '8', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(47, '0000-00-00', '0', '8', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(48, '2024-04-16', '0', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(49, '2024-04-16', '0', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(50, '2024-04-16', '0', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(51, '0000-00-00', '0', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(52, '2024-04-11', '0', '2', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 3),
(53, '2024-04-16', 'j6', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(54, '2024-04-16', 'K2', '1', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 1),
(55, '0000-00-00', 'K2', '111', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 22),
(56, '2024-04-16', 'j6', 're', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', '[{\"spek\": \"1 \",\"bungkus\": \"331\",\"tkotor\": \"0.22\",\"tbersih\": \"3\"}]', 0, '0', 0, 2),
(57, '0000-00-00', 'K1', '1', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', 0, '0', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL,
  `kode_area` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `kode_area`, `nama_kota`, `status`) VALUES
(1, 440, 'Jakarta Utara', 1),
(2, 440, 'Jakarta Timur', 1),
(3, 440, 'Jakarta Barat', 1),
(4, 440, 'Jakarta Selatan', 1),
(5, 440, 'Jakarta Pusat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_dp`
--

CREATE TABLE `tbl_pembayaran_dp` (
  `id_pembayaran_dp` int(11) NOT NULL,
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
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` text NOT NULL,
  `descriptiom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`, `descriptiom`) VALUES
(1, 'master_admin', 'Master Admin'),
(2, 'general_manager', 'General Manager'),
(3, 'manager_produksi', 'Manager Produksi'),
(4, 'admin_receiving', 'Admin Receiving'),
(5, 'departement_coasting', 'Departement Coasting'),
(6, 'tl_sortir', 'Team Leader Sortir'),
(7, 'sortir', 'sortir'),
(8, 'supplier', 'supplier'),
(9, 'admin_bahan_baku', 'Admin Bahan Baku '),
(10, 'manager_pbb', 'Manager PBB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sortir`
--

CREATE TABLE `tbl_sortir` (
  `id` int(11) NOT NULL,
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
  `approved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sortir`
--

INSERT INTO `tbl_sortir` (`id`, `kode_supplier`, `tanggal_sj`, `tanggal_rec`, `tanggal_rec2`, `tanggal_rec3`, `number`, `col`, `bf`, `jb`, `jb_bf`, `jbb_jk`, `jbb_bf`, `xlp`, `bf_k3_col`, `bf_k3_jb`, `bf_k3_jk`, `bf_k3_jl`, `bf_jl`, `bf_kj`, `bf_bf`, `bf_lp_slb`, `bf_sp`, `bf_spk_xlp`, `bf_spk_sp`, `spk_sp_jb`, `spk_sp_xlp`, `spk_sp_bfp`, `spk_sp_sph`, `sp_cl`, `sp_clf`, `mh`, `mh_slb`, `phr`, `basi_col`, `basi_jb`, `basi_jk`, `basi_xlp`, `basi_bf`, `basi_sp`, `mhr`, `basi_cl`, `basi_mh`, `air`, `shell`, `loss`, `timbangan_kotor`, `timbangan_bb`, `status`, `jbb_jf`, `spk_sp`, `sp_sph`, `id_bb`, `cap`, `potong`, `approved_by`) VALUES
(1, 'Pilih Salah satu', '2001-07-07', '2024-04-21', '2024-04-17', '2024-04-17', 19, '1', '2', '3', '5', '2', '1', '23', '22', '1', '1', '1', '2', '4', '1', '2', '3', '5', '11', '12', '12', '1', '113', '3', '2', '11', '1', '23', '4', '1', '212', '11', '1', '2', '5', '2', '5', '1', '11', '41', '5', '21', 2, '32', '312', '111', 57, 'Ya', 'keterangan dalam text', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `nama_supplier` text NOT NULL,
  `bank` text NOT NULL,
  `nomor` text NOT NULL,
  `an` text NOT NULL,
  `npwp` text NOT NULL,
  `id_area` int(11) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`, `wilayah`) VALUES
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 0, '0', 'Asperiores duis dolo', ''),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 0, '0', 'Deserunt officiis co', ''),
(3, 'j6', 'adi', 'bca', 'gddg', 'taufik', '6565656', 443, '323232', 'sasasas', ''),
(4, 'Architecto in possim', 'Quo sunt maiores est', 'Dolor autem distinct', '+1 (126) 902-1475', 'Nulla aliquip aute d', 'Screenshot (3).png', 559, '0', 'Qui eaque consectetu', ''),
(5, 'Libero ut facere est', 'Dolor obcaecati dolo', 'In molestias perspic', '+1 (359) 795-4626', 'Pariatur Consequat', 'Screenshot_(3)9.png', 440, 'Screenshot_(3)10.png', 'Quidem distinctio E', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `tanggal`, `wilayah`, `email`) VALUES
(1, 'admin', '4297f44b13955235245b2497399d7a93', 6, NULL, '[\"1\",\"3\"]', 'xyz@gmail.com'),
(2, 'user', '4297f44b13955235245b2497399d7a93', 6, NULL, '[\"1\",\"3\"]', ''),
(12, 'andi01', '4297f44b13955235245b2497399d7a93', 6, '2024-04-17', '[\"440\",\"443\"]', 'andi@zki.com'),
(13, 'andi02', '4297f44b13955235245b2497399d7a93', 1, '2024-04-17', '[\"440\",\"443\"]', 'anxi@klo.com'),
(14, 'poi', '4297f44b13955235245b2497399d7a93', 2, '2024-04-17', '[\"440\",\"443\"]', 'poi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tbl_daging`
--
ALTER TABLE `tbl_daging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  ADD PRIMARY KEY (`id_pembayaran_dp`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_daging`
--
ALTER TABLE `tbl_daging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
