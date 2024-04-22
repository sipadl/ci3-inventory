-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2024 pada 06.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id_area` int(11) NOT NULL,
  `nama_area` text NOT NULL,
  `kode_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_area`
--

INSERT INTO `tbl_area` (`id_area`, `nama_area`, `kode_area`) VALUES
(2, 'Jakarta', '440'),
(4, 'Purwakarta', '443'),
(6, 'Banjarmasin', '454'),
(10, 'Pontianak', '559');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daging`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `spesifikasi`, `daging_putih`, `daging_merah`, `user_id`, `wilayah`, `status`, `qty`) VALUES
(61, '2024-04-22', 'K2', 'jb', '[{\"spek\":\"jk\",\"bungkus\":\"11\",\"tkotor\":\"7.85\",\"tbersih\":\"7.28\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"56.87\",\"tbersih\":\"9.39\"}]', 0, '0', 0, '16.67'),
(62, '2024-04-22', 'j6', 'bahan jadi', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"11.6\",\"tbersih\":\"56.98\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"56.87\",\"tbersih\":\"87,98\"}]', 0, '0', 0, '143.98');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL,
  `kode_area` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `kode_area`, `nama_kota`, `status`) VALUES
(1, 440, 'Jakarta Utara', 1),
(2, 440, 'Jakarta Timur', 1),
(3, 440, 'Jakarta Barat', 1),
(4, 440, 'Jakarta Selatan', 1),
(5, 440, 'Jakarta Pusat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
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
  `approved_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id`, `subsidi_normal`, `subsidi_dibayar_1`, `subsidi_dibayar_2`, `cap_shell`, `subsidi_transport`, `created_at`, `id_sortir`, `status`, `approved_by`) VALUES
(1, '1000000', '1000000', '1000000', '1000000', '1000000', '2024-04-21', 57, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_memo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_memo`
--

INSERT INTO `tbl_memo` (`id`, `kode_supplier`, `tanggal`, `qty`, `status`, `subsidi`, `approved_by`, `id_sortir`) VALUES
(6, 'K2', '1979-03-12', '1363', '0', '1', NULL, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran_dp`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerimaan`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerimaan`
--

INSERT INTO `tbl_penerimaan` (`id`, `status`, `approved_by`, `kode_supplier`, `id_sortir`, `tanggal`, `potongan_harga`, `total`) VALUES
(1, '1', '4', 'K2', '2', '2024-04-21', '11', '12317');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `area`, `bahan_masuk`, `upload_images`, `dp_60`, `request_dp`, `total_bayar`, `bank`, `no_rek`, `tanggal_transaksi`, `keterangan`, `status`, `created_at`, `supplier`, `approved_by`) VALUES
(1, 'Purwakarta', '1', NULL, '1', '1', '2', 'Placeat unde ab et ', '', '2024-04-20', 'a', 1, '2024-04-20 11:07:41', 'K1', NULL),
(2, 'Purwakarta', 'Doloremque dolore ex', NULL, 'Elit quaerat est q', 'Exercitation odit no', 'Delectus neque sit ', 'bca', '', '2008-04-28', 'Deserunt illum enim', 1, '2024-04-20 11:24:13', 'j6', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_price`
--

CREATE TABLE `tbl_price` (
  `id_price` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `id_area` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_price`
--

INSERT INTO `tbl_price` (`id_price`, `nama_produk`, `harga`, `id_area`) VALUES
(1, 'COL', '560,000.00', 2),
(2, 'JB', '560,000.00', 2),
(3, 'JBJK', ' 285,000.00', 2),
(4, 'JL', '285,000.00 ', 2),
(5, 'XLP', '275,000.00 ', 2),
(6, 'KJ', ' 285,000.00 ', 2),
(7, 'BF / LP', ' 285,000.00 ', 2),
(8, 'SPK', ' 275,000.00 ', 2),
(9, 'SP', ' 5,000.00 ', 2),
(10, 'SPH', '5,000.00 ', 0),
(11, 'CL', ' 10,000.00 ', 2),
(12, 'CLF', ' 30,000.00 ', 2),
(13, 'MH', ' 3,000.00 ', 2),
(14, 'MHR', '  30,000.00 ', 2),
(15, 'PHR', '45,000.00 ', 2),
(16, 'B COL', '45,000.00 ', 2),
(17, 'B JB', '45,000.00 ', 2),
(18, 'B JBJK	', '45,000.00', 2),
(19, 'B XLP', '45,000.00', 2),
(20, 'B BF / LP', '45,000.00', 2),
(21, 'B SPK', '45,000.00', 2),
(22, 'B SP', '45,000.00', 2),
(23, 'B CL', '30,000.00 ', 2),
(24, 'B MH', '30,000.00 ', 2),
(25, 'SHELL', '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` text NOT NULL,
  `descriptiom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_role`
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
-- Struktur dari tabel `tbl_sortir`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`, `wilayah`, `no_rekening`) VALUES
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 443, 0, 'Asperiores duis dolo', '', NULL),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 443, 0, 'Deserunt officiis co', '', NULL),
(3, 'j6', 'adi', 'bca', 'gddg', 'taufik', '6565656', 443, 323232, 'sasasas', '', NULL),
(4, 'rudi', 'Rudianto', 'BCA', '081', 'rudi', '2.png', 440, 21, 'Hehe', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `wilayah` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
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
-- Indeks untuk tabel `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indeks untuk tabel `tbl_daging`
--
ALTER TABLE `tbl_daging`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_laporan_id_IDX` (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_memo`
--
ALTER TABLE `tbl_memo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  ADD PRIMARY KEY (`id_pembayaran_dp`);

--
-- Indeks untuk tabel `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pengajuan_id_IDX` (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`id_price`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_daging`
--
ALTER TABLE `tbl_daging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_memo`
--
ALTER TABLE `tbl_memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
