-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2024 pada 08.59
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
(1, 'jakarta', '441'),
(2, 'jakarta', '440'),
(3, 'purwakarta', '442'),
(4, 'purwakarta', '443'),
(5, 'banjarmasin', '444'),
(6, 'banjarmasin', '454'),
(7, 'purwakarta', '446'),
(8, 'pontianak', '447'),
(9, 'pontianak', '448'),
(10, 'pontianak', '559');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daging`
--

CREATE TABLE `tbl_daging` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `supplier` int(11) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `daging_putih` text NOT NULL,
  `daging_merah` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `spesifikasi`, `daging_putih`, `daging_merah`, `user_id`) VALUES
(1, '1987-04-02', 0, 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0),
(2, '1987-04-02', 0, 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0),
(3, '1989-07-10', 0, 'Et pariatur Aut rer', '[{\"spek\":\"Enim rerum voluptate\",\"bungkus\":\"Exercitation corpori\",\"tkotor\":\"Ullamco consequatur \",\"tbersih\":\"Proident dolor ulla\"},{\"spek\":\"Quo cum vero est non\",\"bungkus\":\"Excepteur vitae dese\",\"tkotor\":\"Non porro sed assume\",\"tbersih\":\"Ullamco eu sed et Na\"},{\"spek\":\"Mollit praesentium i\",\"bungkus\":\"Fugiat eaque cillum \",\"tkotor\":\"Sequi et tenetur des\",\"tbersih\":\"In molestiae consequ\"}]', '[{\"spek\":\"Et soluta maiores ni\",\"bungkus\":\"Dolores minima verit\",\"tkotor\":\"Ut doloremque quibus\",\"tbersih\":\"Ullamco ratione corr\"},{\"spek\":\"Voluptatibus debitis\",\"bungkus\":\"Et elit voluptatibu\",\"tkotor\":\"Quis qui beatae atqu\",\"tbersih\":\"Ad sunt ex eum minu\"},{\"spek\":\"A enim eaque quis el\",\"bungkus\":\"Suscipit hic elit e\",\"tkotor\":\"Aut ut autem officia\",\"tbersih\":\"Voluptas aspernatur \"}]', 0),
(4, '2002-12-19', 0, 'Esse voluptate liber', '[{\"spek\":\"Natus consequatur r\",\"bungkus\":\"Amet ducimus error\",\"tkotor\":\"Nihil cupidatat faci\",\"tbersih\":\"Sunt eum pariatur N\"},{\"spek\":\"Cumque nostrud venia\",\"bungkus\":\"Magni qui earum non \",\"tkotor\":\"A molestiae exercita\",\"tbersih\":\"Labore ratione moles\"}]', '[{\"spek\":\"Velit blanditiis po\",\"bungkus\":\"Fugiat delectus qui\",\"tkotor\":\"Autem nihil mollit s\",\"tbersih\":\"Sint commodo et duci\"},{\"spek\":\"Perferendis Nam ea q\",\"bungkus\":\"Vel quia duis sed la\",\"tkotor\":\"Odit eum id ea illum\",\"tbersih\":\"Temporibus excepturi\"}]', 0),
(5, '1998-11-27', 0, 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"}]', 0),
(6, '1998-11-27', 0, 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', 0);

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
(2, 'general_manager_banjarmasin', 'General Manager Banjar Masin'),
(3, 'manager_produksi_banjarmasin', 'Manager Produksi banjarmasin'),
(4, 'admin_receiving_banjarmasin', 'Admin Receiving'),
(5, 'departement_coasting_banjar_masin', 'Departement Coasting'),
(6, 'tl_sortir_banjarmasin', 'Team Leader Sortir'),
(7, 'sortir_banjarmasin', 'sortir'),
(8, 'supplier', 'supplier'),
(9, 'admin_bahan_baku_banjarmasin', 'Admin Bahan Baku banjarmasin '),
(10, 'manager_pbb_banjarmasin', 'Manager PBB'),
(12, 'general_manager_purwakarta', 'General Manager Purwakarta'),
(13, 'general_manager_purwakarta', 'General Manager Purwakarta'),
(14, 'manager_produksi_purwakarta', 'Manager Produksi Purwakarta'),
(15, 'admin_receiving_purwakarta', 'Admin Receiving Purwakarta'),
(16, 'departement_coasting_purwakarta', 'Departement Coasting purwakarta'),
(17, 'tl_sortir_purwakarta', 'Team Leader Sortir purwakarta'),
(18, 'sortir_purwakarta', 'sortir banjarmasin'),
(19, 'admin_bahan_baku_purwakarta', 'Admin Bahan Baku purwakarta'),
(20, 'manager_pbb_banjarmasin', 'Manager PBB banjarmasin'),
(21, 'admin_bahan_baku_pontianak', 'Admin Bahan Baku pontianak '),
(22, 'manager_pbb_pontianak', 'Manager PBB pontianak'),
(23, 'general_manager_pontianak', 'General Manager pontianak'),
(24, 'general_manager_pontianak', 'General Manager pontianak'),
(25, 'manager_produksi_pontianak', 'Manager Produksi pontianak'),
(26, 'admin_receiving_pontianak', 'Admin Receiving pontianak'),
(27, 'departement_coasting_pontianak', 'Departement Coasting pontianak'),
(28, 'tl_sortir_pontianak', 'Team Leader Sortir pontianak'),
(29, 'sortir_pontianak', 'sortir pontianak'),
(30, 'admin_bahan_baku_pontianak', 'Admin Bahan Baku pontianak'),
(31, 'manager_pbb_pontianak', 'Manager PBB pontianak'),
(32, 'admin_bahan_baku_jakarta', 'Admin Bahan Baku jakarta'),
(33, 'manager_pbb_jakarta', 'Manager PBB jakarta'),
(34, 'admin_bahan_baku_jakarta', 'Admin Bahan Baku jakarta '),
(35, 'manager_pbb_jakarta', 'Manager PBB jakarta'),
(36, 'general_manager_jakarta', 'General Manager jakarta'),
(37, 'general_manager_jakarta', 'General Manager jakarta'),
(38, 'manager_produksi_jakarta', 'Manager Produksi jakarta'),
(39, 'admin_receiving_jakarta', 'Admin Receiving jakarta'),
(40, 'departement_coasting_jakarta', 'Departement Coasting jakarta'),
(41, 'tl_sortir_jakarta', 'Team Leader Sortir jakarta'),
(42, 'sortir_jakarta', 'sortir jakarta'),
(43, 'admin_bahan_baku_jakarta', 'Admin Bahan Baku pjakarta'),
(44, 'manager_pbb_jakarta', 'Manager PBB jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` text NOT NULL,
  `bank` text NOT NULL,
  `nomor` text NOT NULL,
  `an` text NOT NULL,
  `npwp` text NOT NULL,
  `id_area` int(11) NOT NULL,
  `no_ktp` int(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`) VALUES
(1, 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 0, 0, 'Asperiores duis dolo'),
(2, 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 0, 0, 'Deserunt officiis co'),
(3, 'adi', 'bca', '54545545', 'taufik', '6565656', 0, 323232, 'dsdsdsdsd'),
(4, 'sasas', 'sasas', 'sasas', 'asas', 'asasas', 0, 2147483647, 'sasasasas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'pyzunurola', '$2y$10$lUjtPsuIPAYF7x8AWQPl4.KCuImbHc/e6gyx.b0KgE.HiDOewNZgy', 6),
(2, 'pyzunurola', '$2y$10$vyutbIa5m3BqFJwlU0fTaevz/PFZn8nfVBSrS0IcbnGD1etJ/6c7O', 6);

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
-- Indeks untuk tabel `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  ADD PRIMARY KEY (`id_pembayaran_dp`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
