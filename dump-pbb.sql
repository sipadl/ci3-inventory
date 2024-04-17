-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 06:51 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
