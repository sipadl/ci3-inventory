-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 11:44 AM
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
  `qty` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `spesifikasi`, `daging_putih`, `daging_merah`, `user_id`, `wilayah`, `status`, `qty`) VALUES
(53, '2024-04-16', 'j6', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, '1'),
(54, '2024-04-16', 'K2', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, '1'),
(55, '2024-04-17', 'K2', '111', '[{\"spek\":\"3\",\"bungkus\":\"3\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]', '[{\"spek\":\"3\",\"bungkus\":\"2\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]', 0, '0', 0, '22'),
(56, '2024-04-16', 'j6', 're', '[{\"spek\":\"22\",\"bungkus\":\"33\",\"tkotor\":\"44\",\"tbersih\":\"55\"},{\"spek\":\"88\",\"bungkus\":\"77\",\"tkotor\":\"66\",\"tbersih\":\"66\"}]', '[{\"spek\":\"99\",\"bungkus\":\"88\",\"tkotor\":\"77\",\"tbersih\":\"66\"},{\"spek\":\"334\",\"bungkus\":\"33\",\"tkotor\":\"54\",\"tbersih\":\"56\"}]', 0, '0', 0, '2'),
(57, '2024-04-16', 'K1', 'Ayam', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"11\"}]', '[{\"spek\":\"1\",\"bungkus\":\"2\",\"tkotor\":\"3\",\"tbersih\":\"12.1\"}]', 0, '0', 0, '23.1'),
(58, '2024-04-16', 'K1', 'Ikan Nemu', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"10\",\"tbersih\":\"11.2\"}]', '[{\"spek\":\"11\",\"bungkus\":\"12\",\"tkotor\":\"33\",\"tbersih\":\"50.1\"}]', 0, '0', 0, '61.3'),
(59, '2024-04-16', 'K1', 'Bebek Bakar', '[{\"spek\":\"19\",\"bungkus\":\"99\",\"tkotor\":\"99\",\"tbersih\":\"99\"}]', '[{\"spek\":\"123\",\"bungkus\":\"123\",\"tkotor\":\"12\",\"tbersih\":\"119\"}]', 0, '0', 0, '218'),
(60, '2024-04-16', 'K1', 'Kambing', '[{\"spek\":\"10\",\"bungkus\":\"11\",\"tkotor\":\"14\",\"tbersih\":\"13.5\"}]', '[{\"spek\":\"30\",\"bungkus\":\"120\",\"tkotor\":\"150\",\"tbersih\":\"551\"}]', 0, '0', 0, '564.5');

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
  `approved_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `area`, `bahan_masuk`, `upload_images`, `dp_60`, `request_dp`, `total_bayar`, `bank`, `no_rek`, `tanggal_transaksi`, `keterangan`, `status`, `created_at`, `supplier`, `approved_by`) VALUES
(1, 'Purwakarta', '1', NULL, '1', '1', '2', 'Placeat unde ab et ', '', '2024-04-20', 'a', 1, '2024-04-20 11:07:41', 'K1', NULL),
(2, 'Purwakarta', 'Doloremque dolore ex', NULL, 'Elit quaerat est q', 'Exercitation odit no', 'Delectus neque sit ', 'bca', '', '2008-04-28', 'Deserunt illum enim', 1, '2024-04-20 11:24:13', 'j6', NULL);

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
  `status` int(11) DEFAULT NULL,
  `jbb_jf` varchar(255) DEFAULT NULL,
  `spk_sp` varchar(255) DEFAULT NULL,
  `sp_sph` varchar(255) DEFAULT NULL,
  `id_bb` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `cap` varchar(100) DEFAULT NULL,
  `potong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sortir`
--

INSERT INTO `tbl_sortir` (`id`, `kode_supplier`, `tanggal_sj`, `tanggal_rec`, `tanggal_rec2`, `tanggal_rec3`, `number`, `col`, `bf`, `jb`, `jb_bf`, `jbb_jk`, `jbb_bf`, `xlp`, `bf_k3_col`, `bf_k3_jb`, `bf_k3_jk`, `bf_k3_jl`, `bf_jl`, `bf_kj`, `bf_bf`, `bf_lp_slb`, `bf_sp`, `bf_spk_xlp`, `bf_spk_sp`, `spk_sp_jb`, `spk_sp_xlp`, `spk_sp_bfp`, `spk_sp_sph`, `sp_cl`, `sp_clf`, `mh`, `mh_slb`, `phr`, `basi_col`, `basi_jb`, `basi_jk`, `basi_xlp`, `basi_bf`, `basi_sp`, `mhr`, `basi_cl`, `basi_mh`, `air`, `shell`, `loss`, `timbangan_kotor`, `timbangan_bb`, `status`, `jbb_jf`, `spk_sp`, `sp_sph`, `id_bb`, `approved_by`, `cap`, `potong`) VALUES
(3, 'K1', '2024-04-18', '2024-04-18', NULL, NULL, 1, '1', '2', '23', '3', '4', NULL, '3', '2', '3', '3', '3', '3', '3', '3', '3', '33', '3', '3', '3', '3', '3', NULL, '3', '3', '3', '222', '9', '09', '8', '77', '11', '123', '123', '123', '11', '1', '112', '1221', '122', '122', '11', 0, '3', '3', '3', 55, NULL, NULL, NULL),
(4, 'j6', '1989-08-27', '2013-08-06', NULL, NULL, 1, '50', '23', '64', '60', '53', NULL, '90', '41', '9', '38', '51', '44', '89', '82', '89', '17', '25', '18', '91', '68', '1', NULL, '12', '20', '73', '89', '55', '92', '14', '43', '47', '35', '7', '92', '80', '3', '59', '1', '48', '54', '33.2', 0, '13', '82', '12', 56, 4, NULL, NULL),
(5, 'K2', '1985-12-06', '1979-03-12', NULL, NULL, 1, '60', '63', '39', '34', '77', NULL, '55', '75', '14', '51', '58', '15', '57', '23', '72', '96', '21', '39', '92', '84', '35', NULL, '64', '66', '84', '89', '4', '76', '52', '63', '77', '11', '53', '37', '36', '3', '88', '53', '74', '13', '11.2', 3, '2', '86', '27', 57, 4, NULL, NULL),
(8, 'j6', '1996-09-09', '2004-07-23', '2024-04-18', '2024-04-18', 1, '26', '0', '70', '99', '50', NULL, '1', '92', '61', '79', '56', '48', '56', '67', '57', '54', '96', '59', '27', '63', '70', NULL, '26', '98', '0', '29', '78', '11', '70', '90', '97', '27', '99', '16', '60', '82', '38', '2', '37', '1', '78', 4, '19', '35', '2', 54, 4, NULL, NULL),
(9, 'j6', '2024-04-12', '2024-04-05', NULL, NULL, 8, '1.3', '10.9', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 53, NULL, NULL, NULL),
(10, 'j6', '2024-04-20', '2024-04-20', '2024-04-20', NULL, 9, '9', '9', '9', '9', '99', NULL, '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '99', '9', '9', '9', '9', NULL, '9', '9', '9', '99', NULL, '9', '9', '9', '9', '9', '9', NULL, '9', '9', '9', '9', '9.5', NULL, NULL, NULL, '9', '9', '9', 58, NULL, NULL, NULL);

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
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 443, 0, 'Asperiores duis dolo', '', NULL),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 443, 0, 'Deserunt officiis co', '', NULL),
(3, 'j6', 'adi', 'bca', 'gddg', 'taufik', '6565656', 443, 323232, 'sasasas', '', NULL),
(4, 'rudi', 'Rudianto', 'BCA', '081', 'rudi', '2.png', 440, 21, 'Hehe', '', NULL);

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
(4, 'admin', '4297f44b13955235245b2497399d7a93', 9, '2024-04-07', '[\"1\",\"3\"]', 'bonevyxalu@mailinator.com'),
(5, 'fihat', '4297f44b13955235245b2497399d7a93', 9, '2024-04-07', '[\"1\",\"3\"]', 'rymax@mailinator.com'),
(6, 'hyfivux', '$2y$10$pYRxGz9Qbmp4EtmDWBkf2.6WVJFkl2cmx3c8jWNIWStv/AThJeQDW', 5, '2024-04-07', '[\"1\",\"3\"]', 'cedehaligy@mailinator.com'),
(7, 'pozabe', '$2y$10$yF1AkcrZX2eBc60pcR1F5OAx0ei85VoKijTJvd2oounMrUQ5kb6L6', 9, '2024-04-08', '[\"1\",\"3\"]', 'fidyrarux@mailinator.com'),
(8, '1', '$2y$10$ZoTFfrBE7VT.ZC8mtFdE5uoHTcy9Tq/YE3Gzin80Dnd.5ornagYLq', 2, '2024-04-08', '[\"1\",\"3\"]', '2222@gmail.com'),
(9, 'wycajinose', '$2y$10$fH/49RDgnxfraw4hvAJosOgZdvICTFk3IWCrnZwtBz1Sw2Y2l.ffK', 2, '2024-04-08', '[\"1\",\"3\"]', 'bupefy@mailinator.com');

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
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
