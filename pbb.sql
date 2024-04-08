-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:39 PM
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
(2, 'jakarta', '440'),
(4, 'purwakarta', '443'),
(6, 'banjarmasin', '454'),
(10, 'pontianak', '559');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daging`
--

CREATE TABLE `tbl_daging` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `supplier` int(11) NOT NULL,
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
(1, '1987-04-02', 0, 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0, '', 0, 0),
(2, '1987-04-02', 0, 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0, '', 0, 0),
(3, '1989-07-10', 0, 'Et pariatur Aut rer', '[{\"spek\":\"Enim rerum voluptate\",\"bungkus\":\"Exercitation corpori\",\"tkotor\":\"Ullamco consequatur \",\"tbersih\":\"Proident dolor ulla\"},{\"spek\":\"Quo cum vero est non\",\"bungkus\":\"Excepteur vitae dese\",\"tkotor\":\"Non porro sed assume\",\"tbersih\":\"Ullamco eu sed et Na\"},{\"spek\":\"Mollit praesentium i\",\"bungkus\":\"Fugiat eaque cillum \",\"tkotor\":\"Sequi et tenetur des\",\"tbersih\":\"In molestiae consequ\"}]', '[{\"spek\":\"Et soluta maiores ni\",\"bungkus\":\"Dolores minima verit\",\"tkotor\":\"Ut doloremque quibus\",\"tbersih\":\"Ullamco ratione corr\"},{\"spek\":\"Voluptatibus debitis\",\"bungkus\":\"Et elit voluptatibu\",\"tkotor\":\"Quis qui beatae atqu\",\"tbersih\":\"Ad sunt ex eum minu\"},{\"spek\":\"A enim eaque quis el\",\"bungkus\":\"Suscipit hic elit e\",\"tkotor\":\"Aut ut autem officia\",\"tbersih\":\"Voluptas aspernatur \"}]', 0, '', 0, 0),
(4, '2002-12-19', 0, 'Esse voluptate liber', '[{\"spek\":\"Natus consequatur r\",\"bungkus\":\"Amet ducimus error\",\"tkotor\":\"Nihil cupidatat faci\",\"tbersih\":\"Sunt eum pariatur N\"},{\"spek\":\"Cumque nostrud venia\",\"bungkus\":\"Magni qui earum non \",\"tkotor\":\"A molestiae exercita\",\"tbersih\":\"Labore ratione moles\"}]', '[{\"spek\":\"Velit blanditiis po\",\"bungkus\":\"Fugiat delectus qui\",\"tkotor\":\"Autem nihil mollit s\",\"tbersih\":\"Sint commodo et duci\"},{\"spek\":\"Perferendis Nam ea q\",\"bungkus\":\"Vel quia duis sed la\",\"tkotor\":\"Odit eum id ea illum\",\"tbersih\":\"Temporibus excepturi\"}]', 0, '', -1, 0),
(5, '1998-11-27', 0, 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"}]', 0, '', 0, 0),
(6, '1998-11-27', 0, 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', 0, '', 0, 0);

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
  `no_ktp` int(30) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`, `wilayah`) VALUES
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 0, 0, 'Asperiores duis dolo', ''),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 0, 0, 'Deserunt officiis co', '');

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
(1, 'admin', '$2y$08$NtXgdffk6T39Aq5Liz7zh.682Te.Z12DoLVwg6Q9ZHmCOuaLXYlQe', 6, NULL, '[\"1\",\"3\"]', ''),
(2, 'user', '$2y$10$xW1GCpZhK0a5IKJeGn1BheX1uIaXaCnfOj7vvHLXpCyKHhykQ.GOC', 6, NULL, '[\"1\",\"3\"]', ''),
(3, 'tucyme', '$2y$10$2pi2mXpLXwKcHI0Xwwd2Q.sGNe9MkBEcPb9/PVVEEpWkAA5sxRb5y', 1, '0000-00-00', '[\"1\",\"3\"]', 'bute@mailinator.com'),
(4, 'wuvofaqaq', '$2y$10$2/wmYRSbPaixerOHF3akd.TNFnMZiO6ggXdXEtWnd7f6eQfD4wYym', 9, '2024-04-07', '[\"1\",\"3\"]', 'bonevyxalu@mailinator.com'),
(5, 'fihat', '$2y$10$B1O4BlWph4X1BUlGzUGgJueC4fSbXM8/BfQupX5LU1y8UsZjzRb2y', 9, '2024-04-07', '[\"1\",\"3\"]', 'rymax@mailinator.com'),
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
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
