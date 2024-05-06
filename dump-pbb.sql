-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 06:31 PM
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
  `user_id` int(11) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `user_id`, `wilayah`, `status`, `keterangan`) VALUES
(78, '2024-05-03', 'K2', 0, '0', 0, NULL),
(79, '2024-05-04', 'K1', 0, '0', 0, NULL),
(80, '2024-05-06', 'K1', 0, '0', 1, 'AAAA'),
(81, '2024-05-07', 'K1', 0, '0', 0, NULL),
(82, '2024-05-06', 'K1', 0, '0', 0, NULL);

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
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id` int(11) NOT NULL,
  `subsidi_normal` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_1` varchar(100) DEFAULT NULL,
  `subsidi_dibayar_2` varchar(100) DEFAULT NULL,
  `cap_shell` varchar(100) DEFAULT NULL,
  `subsidi_transport` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `id_sortir` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `approved_by` int(11) DEFAULT NULL,
  `subsidi_dibayar_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id`, `subsidi_normal`, `subsidi_dibayar_1`, `subsidi_dibayar_2`, `cap_shell`, `subsidi_transport`, `created_at`, `id_sortir`, `status`, `approved_by`, `subsidi_dibayar_3`) VALUES
(1, '1000000', '1000000', '1000000', '1000000', '1000000', '2024-04-21', 57, 0, NULL, NULL),
(2, '500000', '300000', '100000', '10000', '10000', '2024-04-22', 1, 1, NULL, NULL),
(3, '40000', '40000', '20000', '10', '30000', '2024-04-24', 19, 0, NULL, '10000'),
(4, '100000', '100000', '100000', '100000', '100000', '2024-05-03', 78, 0, NULL, '100000'),
(5, '1000000', '1000000', '1000000', '1000000', '1000000', '2024-05-04', 79, 0, NULL, '1000000'),
(6, '1000000', '1000000', '1000000', '10000001', '10000002', '2024-05-04', 14, 0, NULL, '1000000'),
(8, '1500', '1500', '1500', '1500', '1500', '2024-05-05', 7, 0, NULL, '1500'),
(9, '1500', '1500', '1500', '1500', '1500', '2024-05-05', 7, 0, NULL, '1500'),
(11, '10', '10', '10', '10', '10', '2024-05-05', 15, 0, NULL, '10'),
(13, '10', '10', '10', '10', '10', '2024-05-05', NULL, 0, NULL, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_memo`
--

CREATE TABLE `tbl_memo` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `subsidi` varchar(100) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `id_sortir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_memo`
--

INSERT INTO `tbl_memo` (`id`, `kode_supplier`, `tanggal`, `qty`, `status`, `subsidi`, `approved_by`, `id_sortir`) VALUES
(6, 'K2', '1979-03-12', '1363', '4', '1', '4', 5),
(7, 'K2', '2024-04-22', '594', '0', '50000', NULL, 1),
(8, 'K2', '2024-04-22', '594', '0', '30000', NULL, 1),
(9, 'K2', '2024-04-22', '594', '4', '100000', '4', 6);

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
-- Table structure for table `tbl_penerimaan`
--

CREATE TABLE `tbl_penerimaan` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT '0',
  `approved_by` varchar(100) DEFAULT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `id_sortir` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `potongan_harga` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penerimaan`
--

INSERT INTO `tbl_penerimaan` (`id`, `status`, `approved_by`, `kode_supplier`, `id_sortir`, `tanggal`, `potongan_harga`, `total`) VALUES
(1, '1', '4', 'K2', '2', '2024-04-21', '11', '12317'),
(2, '1', '4', 'K2', '6', '2024-04-22', '', '2079009'),
(3, '1', '4', 'K2', '6', '2024-04-22', '', '2079009');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
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
  `keterangan_approval` varchar(100) DEFAULT NULL,
  `qty_kg` varchar(100) DEFAULT NULL,
  `dp_100` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `area`, `bahan_masuk`, `upload_images`, `dp_60`, `request_dp`, `total_bayar`, `bank`, `no_rek`, `tanggal_transaksi`, `keterangan`, `status`, `created_at`, `supplier`, `approved_by`, `keterangan_approval`, `qty_kg`, `dp_100`) VALUES
(1, 'Purwakarta', '1', NULL, '1', '1', '2', 'Placeat unde ab et ', '', '2024-04-20', 'a', 1, '2024-04-20 11:07:41', 'K1', NULL, '  1111', NULL, NULL),
(2, 'Purwakarta', 'Doloremque dolore ex', NULL, 'Elit quaerat est q', 'Exercitation odit no', 'Delectus neque sit ', 'bca', '', '2008-04-28', 'Deserunt illum enim', 1, '2024-04-20 11:24:13', 'j6', NULL, NULL, NULL, NULL),
(3, 'Purwakarta', '1', NULL, '15', '10', '25', 'Placeat unde ab et ', '1234', '2024-04-23', 'menunggu audit', 0, '2024-04-22 09:52:29', 'K1', NULL, NULL, NULL, NULL),
(4, 'Purwakarta', '3', 'user8-128x128.jpg', '1', '2', '3', 'Placeat unde ab et ', '1234', '2024-04-22', 'p', 0, '2024-04-22 09:56:23', 'K1', NULL, NULL, NULL, NULL),
(5, 'Purwakarta', '1', 'AdminLTELogo2.png', '4', '5', '6', 'Placeat unde ab et ', '1234', '2024-04-24', '1', 0, '2024-04-24 14:27:40', 'K1', NULL, NULL, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

CREATE TABLE `tbl_price` (
  `id_price` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_price`
--

INSERT INTO `tbl_price` (`id_price`, `nama_produk`, `harga`, `id_area`) VALUES
(1, 'COL', '560000', 2),
(2, 'JB', '560000', 2),
(3, 'JBJK', ' 285000', 2),
(4, 'JL', '285000', 2),
(5, 'XLP', '275000', 2),
(6, 'KJ', ' 285000', 2),
(7, 'BF / LP', ' 285000', 2),
(8, 'SPK', '275000', 2),
(9, 'SP', ' 5,000', 2),
(10, 'SPH', ' 5,000', 0),
(11, 'CL', ' 10000', 2),
(12, 'CLF', ' 30000', 2),
(13, 'MH', ' 3000', 2),
(14, 'MHR', ' 30000', 2),
(15, 'PHR', '45000', 2),
(16, 'B COL', '45000', 2),
(17, 'B JB', '45000', 2),
(18, 'B JBJK	', '45000', 2),
(19, 'B XLP', '45000', 2),
(20, 'B BF / LP', '45000', 2),
(21, 'B SPK', '45000', 2),
(22, 'B SP', '45000', 2),
(23, 'B CL', ' 30000', 2),
(24, 'B MH', ' 30000', 2),
(25, 'SHELL', '1', 2);

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
  `status` int(11) DEFAULT 0,
  `jbb_jf` varchar(255) DEFAULT NULL,
  `spk_sp` varchar(255) DEFAULT NULL,
  `sp_sph` varchar(255) DEFAULT NULL,
  `id_bb` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
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
  `is_corection` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sortir`
--

INSERT INTO `tbl_sortir` (`id`, `kode_supplier`, `tanggal_sj`, `tanggal_rec`, `tanggal_rec2`, `tanggal_rec3`, `number`, `col`, `bf`, `jb`, `jb_bf`, `jbb_jk`, `jbb_bf`, `xlp`, `bf_k3_col`, `bf_k3_jb`, `bf_k3_jk`, `bf_k3_jl`, `bf_jl`, `bf_kj`, `bf_bf`, `bf_lp_slb`, `bf_sp`, `bf_spk_xlp`, `bf_spk_sp`, `spk_sp_jb`, `spk_sp_xlp`, `spk_sp_bfp`, `spk_sp_sph`, `sp_cl`, `sp_clf`, `mh`, `mh_slb`, `phr`, `basi_col`, `basi_jb`, `basi_jk`, `basi_xlp`, `basi_bf`, `basi_sp`, `mhr`, `basi_cl`, `basi_mh`, `air`, `shell`, `loss`, `timbangan_kotor`, `timbangan_bb`, `status`, `jbb_jf`, `spk_sp`, `sp_sph`, `id_bb`, `approved_by`, `cap`, `potong`, `note`, `shell_phr_keras`, `shell_mhr_keras`, `shell_phr_halus`, `shell_mhr_halus`, `keterangan`, `basi_col2`, `basi_jb2`, `basi_jk2`, `basi_xlp2`, `basi_bf2`, `basi_sp2`, `mhr2`, `basi_cl2`, `basi_mh2`, `is_corection`) VALUES
(14, 'K2', '2024-05-03', '2024-05-03', NULL, NULL, 78, '33.2', '33.2', '33.2', '33.2', '2.58', '43.23', '33.2', '45.32', '45.32', '45.32', '45.32', '33.2', '1.46', '33.2', '45.32', '33.2', '33.2', '0.16', '2.26', '33.19', '45.32', NULL, '33.2', '33.2', '18.24', '33.2', NULL, '33.2', '1.44', '45.32', '33.2', '33.2', '45.32', NULL, '33.2', '0.79', '33', '44', '33', NULL, NULL, 2, NULL, '33.2', '0.94', 78, 4, 'ya', NULL, 'okeoekeo', '2', '2', '2', '2', NULL, '21', '22', '33', '44', '11', '11', NULL, '22', '33', 0),
(15, 'K1', '2024-05-05', '2024-05-05', '0000-00-00', '0000-00-00', 16, '8', '87', '7', '7', '7', '6', '7', '7', '7', '7', '77', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '7', NULL, '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '1', '7', NULL, NULL, 3, '', '7', '7', 79, 4, 'ya', '', '', '6', '6', '67', '7', '', '6', '6', '6', '6', '6', '6', NULL, '6', '6', 0),
(16, 'K1', '2024-05-05', '2024-05-05', NULL, NULL, 16, '8', '87', '7', '7', '7', '7', '7', '7', '7', '7', '77', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '7', NULL, '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '1', '7', NULL, NULL, 2, '', '7', '7', 80, 4, 'ya', '', '', '7', '7', '7', '7', 'P', '7', '7', '7', '7', '7', '7', NULL, '7', '7', 0),
(17, 'K1', '2024-05-06', '2024-05-06', NULL, NULL, 81, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', NULL, NULL, 3, NULL, '1', '1', 81, 4, 'ya', NULL, '', '1', '1', '1', '1', '', '1', '1', '1', '5', '1', '1', NULL, '1', '1', 0),
(26, 'K1', '2024-05-05', '2024-05-06', NULL, NULL, 16, '8', '87', '7', '7', '7', '7', '7', '7', '7', '7', '77', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '7', NULL, '7', '7', '7', '7', '7', '7', NULL, '7', '7', '7', '44', '7', NULL, NULL, 3, NULL, '7', '7', 80, NULL, 'ya', NULL, '', '7', '7', '7', '7', NULL, '7', '7', '7', '7', '7', '7', NULL, '7', '7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_daging`
--

CREATE TABLE `tbl_sub_daging` (
  `id` int(11) NOT NULL,
  `id_bahan_baku` int(11) DEFAULT NULL,
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
  `tipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sub_daging`
--

INSERT INTO `tbl_sub_daging` (`id`, `id_bahan_baku`, `spesifikasi_bahan`, `spek`, `bungkus`, `tkotor`, `tbersih`, `spek2`, `bungkus2`, `tkotor2`, `tbersih2`, `qty`, `tipe`) VALUES
(114, 78, 'jk', 'jk', '11', '23', '22', NULL, NULL, NULL, NULL, '22', 0),
(115, 79, 'A', 'A', '1', '2', '3', NULL, NULL, NULL, NULL, '3', 0),
(116, 79, 'B', 'B', '3', '4', '5', NULL, NULL, NULL, NULL, '5', 0),
(117, 79, 'C', 'C', '6', '6', '6', NULL, NULL, NULL, NULL, '6', 0),
(118, 80, 'A', 'A', '1', '1', '1', NULL, NULL, NULL, NULL, '1', 0),
(119, 81, 'K', 'K', '2', '2', '2', NULL, NULL, NULL, NULL, '2', 0),
(120, 82, 'A', 'A', '1', '2', '3', NULL, NULL, NULL, NULL, '3', 0);

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
  `no_ktp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `no_rekening` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`, `wilayah`, `no_rekening`) VALUES
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 443, 0, 'Asperiores duis dolo', '', '1234'),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 443, 0, 'Deserunt officiis co', '', '1244'),
(3, 'j6', 'adi', 'bca', 'gddg', 'taufik', '6565656', 443, 323232, 'sasasas', '', '12345'),
(4, 'rudi', 'Rudianto', 'BCA', '081', 'rudi', '2.png', 440, 21, 'Hehe', '', '11223344');

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
  `email` varchar(255) NOT NULL,
  `sign` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `tanggal`, `wilayah`, `email`, `sign`) VALUES
(4, 'admin', '4297f44b13955235245b2497399d7a93', 9, '2024-04-07', '[\"1\",\"3\"]', 'bonevyxalu@mailinator.com', NULL),
(5, 'fihat', '4297f44b13955235245b2497399d7a93', 9, '2024-04-07', '[\"1\",\"3\"]', 'rymax@mailinator.com', NULL),
(6, 'hyfivux', '$2y$10$pYRxGz9Qbmp4EtmDWBkf2.6WVJFkl2cmx3c8jWNIWStv/AThJeQDW', 5, '2024-04-07', '[\"1\",\"3\"]', 'cedehaligy@mailinator.com', NULL),
(7, 'pozabe', '$2y$10$yF1AkcrZX2eBc60pcR1F5OAx0ei85VoKijTJvd2oounMrUQ5kb6L6', 9, '2024-04-08', '[\"1\",\"3\"]', 'fidyrarux@mailinator.com', NULL),
(8, '1', '$2y$10$ZoTFfrBE7VT.ZC8mtFdE5uoHTcy9Tq/YE3Gzin80Dnd.5ornagYLq', 2, '2024-04-08', '[\"1\",\"3\"]', '2222@gmail.com', NULL),
(9, 'wycajinose', '$2y$10$fH/49RDgnxfraw4hvAJosOgZdvICTFk3IWCrnZwtBz1Sw2Y2l.ffK', 2, '2024-04-08', '[\"1\",\"3\"]', 'bupefy@mailinator.com', NULL);

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
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_laporan_id_IDX` (`id`) USING BTREE;

--
-- Indexes for table `tbl_memo`
--
ALTER TABLE `tbl_memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  ADD PRIMARY KEY (`id_pembayaran_dp`);

--
-- Indexes for table `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE;

--
-- Indexes for table `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`id_price`);

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
-- Indexes for table `tbl_sub_daging`
--
ALTER TABLE `tbl_sub_daging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sub_daging_id_IDX` (`id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_memo`
--
ALTER TABLE `tbl_memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_sub_daging`
--
ALTER TABLE `tbl_sub_daging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
