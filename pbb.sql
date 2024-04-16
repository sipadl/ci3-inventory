-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2024 pada 06.01
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
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daging`
--

INSERT INTO `tbl_daging` (`id`, `tanggal`, `supplier`, `spesifikasi`, `daging_putih`, `daging_merah`, `user_id`, `wilayah`, `status`, `qty`) VALUES
(1, '1987-04-02', '0', 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0, '', 0, 0),
(2, '1987-04-02', '0', 'Qui nostrud cumque s', '[{\"spek\":\"Dolorem accusantium \",\"bungkus\":\"Reprehenderit molest\",\"tkotor\":\"Atque in sit eum tem\",\"tbersih\":\"Est in nemo veritati\"}]', '[{\"spek\":\"Ea modi aliquam qui \",\"bungkus\":\"Magni nostrum ullam \",\"tkotor\":\"Officia ea doloribus\",\"tbersih\":\"Quia dolor aut dicta\"}]', 0, '', 0, 0),
(3, '1989-07-10', '0', 'Et pariatur Aut rer', '[{\"spek\":\"Enim rerum voluptate\",\"bungkus\":\"Exercitation corpori\",\"tkotor\":\"Ullamco consequatur \",\"tbersih\":\"Proident dolor ulla\"},{\"spek\":\"Quo cum vero est non\",\"bungkus\":\"Excepteur vitae dese\",\"tkotor\":\"Non porro sed assume\",\"tbersih\":\"Ullamco eu sed et Na\"},{\"spek\":\"Mollit praesentium i\",\"bungkus\":\"Fugiat eaque cillum \",\"tkotor\":\"Sequi et tenetur des\",\"tbersih\":\"In molestiae consequ\"}]', '[{\"spek\":\"Et soluta maiores ni\",\"bungkus\":\"Dolores minima verit\",\"tkotor\":\"Ut doloremque quibus\",\"tbersih\":\"Ullamco ratione corr\"},{\"spek\":\"Voluptatibus debitis\",\"bungkus\":\"Et elit voluptatibu\",\"tkotor\":\"Quis qui beatae atqu\",\"tbersih\":\"Ad sunt ex eum minu\"},{\"spek\":\"A enim eaque quis el\",\"bungkus\":\"Suscipit hic elit e\",\"tkotor\":\"Aut ut autem officia\",\"tbersih\":\"Voluptas aspernatur \"}]', 0, '', 0, 0),
(4, '2002-12-19', '0', 'Esse voluptate liber', '[{\"spek\":\"Natus consequatur r\",\"bungkus\":\"Amet ducimus error\",\"tkotor\":\"Nihil cupidatat faci\",\"tbersih\":\"Sunt eum pariatur N\"},{\"spek\":\"Cumque nostrud venia\",\"bungkus\":\"Magni qui earum non \",\"tkotor\":\"A molestiae exercita\",\"tbersih\":\"Labore ratione moles\"}]', '[{\"spek\":\"Velit blanditiis po\",\"bungkus\":\"Fugiat delectus qui\",\"tkotor\":\"Autem nihil mollit s\",\"tbersih\":\"Sint commodo et duci\"},{\"spek\":\"Perferendis Nam ea q\",\"bungkus\":\"Vel quia duis sed la\",\"tkotor\":\"Odit eum id ea illum\",\"tbersih\":\"Temporibus excepturi\"}]', 0, '', -1, 0),
(5, '1998-11-27', '0', 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"}]', 0, '', 0, 0),
(6, '1998-11-27', '0', 'Quibusdam consequatu', '[{\"spek\":\"Inventore aperiam re\",\"bungkus\":\"Quia tempore ipsa \",\"tkotor\":\"Porro ut ut magni ex\",\"tbersih\":\"Officiis non soluta \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', '[{\"spek\":\"Ipsa anim voluptati\",\"bungkus\":\"Sed exercitation exp\",\"tkotor\":\"Cupiditate consequat\",\"tbersih\":\"Consectetur dolore \"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', 0, '', 0, 0),
(7, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 2),
(8, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 2),
(9, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 2),
(10, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 2),
(11, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(12, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(13, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(14, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(15, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(16, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(17, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(18, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 212),
(19, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(20, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(21, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(22, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(23, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(24, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(25, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(26, '0000-00-00', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(27, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(28, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(29, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(30, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(31, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(32, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(33, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"},{\"spek\":\"\",\"bungkus\":\"\",\"tkotor\":\"\",\"tbersih\":\"\"}]', 0, '0', 0, 1),
(34, '2024-04-16', '0', '1', '[{\"spek\":\"3\",\"bungkus\":\"1\",\"tkotor\":\"2\",\"tbersih\":\"1\"}]', '[{\"spek\":\"3\",\"bungkus\":\"4\",\"tkotor\":\"56\",\"tbersih\":\"1\"}]', 0, '0', 0, 2),
(35, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 12),
(36, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 12),
(37, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(38, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 1),
(39, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(40, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(41, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(42, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(43, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(44, '2024-04-16', '0', '11', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(45, '2024-04-16', '0', '', '[{\"spek\":\"wes1\",\"bungkus\":\"wes2\",\"tkotor\":\"wes3\",\"tbersih\":\"wes4\"}]', '[{\"spek\":\"wes5\",\"bungkus\":\"wes6\",\"tkotor\":\"wes7\",\"tbersih\":\"wes8\"}]', 0, '0', 0, 11),
(46, '0000-00-00', '0', '8', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', 0, '0', 0, 1),
(47, '0000-00-00', '0', '8', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', '[{\"spek\":\"2\",\"bungkus\":\"2\",\"tkotor\":\"2\",\"tbersih\":\"2\"}]', 0, '0', 0, 1),
(48, '2024-04-16', '0', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, 1),
(49, '2024-04-16', '0', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, 1),
(50, '2024-04-16', '0', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, 1),
(51, '0000-00-00', '0', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"121\",\"tkotor\":\"1\",\"tbersih\":\"12\"}]', 0, '0', 0, 1),
(52, '2024-04-11', '0', '2', '[{\"spek\":\"3\",\"bungkus\":\"3\",\"tkotor\":\"3\",\"tbersih\":\"44\"}]', '[{\"spek\":\"4\",\"bungkus\":\"4\",\"tkotor\":\"45455\",\"tbersih\":\"5555\"}]', 0, '0', 0, 3),
(53, '2024-04-16', 'j6', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, 1),
(54, '2024-04-16', 'K2', '1', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', '[{\"spek\":\"1\",\"bungkus\":\"1\",\"tkotor\":\"1\",\"tbersih\":\"1\"}]', 0, '0', 0, 1),
(55, '0000-00-00', 'K2', '111', '[{\"spek\":\"3\",\"bungkus\":\"3\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]', '[{\"spek\":\"3\",\"bungkus\":\"2\",\"tkotor\":\"3\",\"tbersih\":\"2\"}]', 0, '0', 0, 22),
(56, '2024-04-16', 'j6', 're', '[{\"spek\":\"22\",\"bungkus\":\"33\",\"tkotor\":\"44\",\"tbersih\":\"55\"},{\"spek\":\"88\",\"bungkus\":\"77\",\"tkotor\":\"66\",\"tbersih\":\"66\"}]', '[{\"spek\":\"99\",\"bungkus\":\"88\",\"tkotor\":\"77\",\"tbersih\":\"66\"},{\"spek\":\"334\",\"bungkus\":\"33\",\"tkotor\":\"54\",\"tbersih\":\"56\"}]', 0, '0', 0, 2);

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
  `status` int(2) DEFAULT 0,
  `jbb_jf` varchar(255) NOT NULL,
  `spk_sp` varchar(255) NOT NULL,
  `sp_sph` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sortir`
--

INSERT INTO `tbl_sortir` (`id`, `kode_supplier`, `tanggal_sj`, `tanggal_rec`, `tanggal_rec2`, `tanggal_rec3`, `number`, `col`, `bf`, `jb`, `jb_bf`, `jbb_jk`, `jbb_bf`, `xlp`, `bf_k3_col`, `bf_k3_jb`, `bf_k3_jk`, `bf_k3_jl`, `bf_jl`, `bf_kj`, `bf_bf`, `bf_lp_slb`, `bf_sp`, `bf_spk_xlp`, `bf_spk_sp`, `spk_sp_jb`, `spk_sp_xlp`, `spk_sp_bfp`, `spk_sp_sph`, `sp_cl`, `sp_clf`, `mh`, `mh_slb`, `phr`, `basi_col`, `basi_jb`, `basi_jk`, `basi_xlp`, `basi_bf`, `basi_sp`, `mhr`, `basi_cl`, `basi_mh`, `air`, `shell`, `loss`, `timbangan_kotor`, `timbangan_bb`, `status`, `jbb_jf`, `spk_sp`, `sp_sph`) VALUES
(1, 'K2', '2001-07-07', '2024-04-21', NULL, NULL, 19, 'Amet voluptates ull', 'Ullam sit dolore do', 'Eu ullam quidem est ', 'Eos laborum Except', 'Consequuntur quo aut', NULL, 'Eos non laborum Om', 'Dolore mollit accusa', 'Possimus minus et d', 'Reiciendis quia nost', 'Amet duis consequat', 'Autem non officia be', 'Debitis pariatur Vo', 'Dolore sunt dolorem', 'Molestias numquam an', 'Voluptatem Eveniet', 'Quia eaque incidunt', 'Quia incidunt aut r', 'Fugit voluptatem re', 'Sit voluptatem Opt', 'Aut quo quo iusto of', NULL, 'Hic et doloribus des', 'In distinctio Verit', 'Quo sint voluptas h', 'Nostrud consequat D', 'Qui possimus ad ass', 'Dolores beatae deser', 'Eius consequat Ea c', 'Illo ex ipsa ipsum ', 'Commodo et ut aspern', 'Esse nulla sint mo', 'Nihil est eius modi ', 'Ut modi aut velit co', 'Perferendis quia vol', 'Pariatur Sit ut su', 'Voluptatibus delenit', 'Cumque tempor recusa', 'Ut aut quis adipisci', 'Vitae consequatur as', 'Rerum delectus solu', 0, 'Voluptates aute labo', 'Consectetur deserunt', 'Dolores esse ut sed '),
(2, 'j6', '2024-04-16', '2024-04-16', NULL, NULL, 7, 'd', 'd', 'a', 's', 's', NULL, 's', '', 'a', 's', 'd', 'xs', 'd', 'fd', 'fd', 'fdg', 'f', 'ds', 'rer4', 'er', 'fd', NULL, 'frt', 'cc', 'dfc', 'vb', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 'cc', 0, 's', 'gh', 'bv');

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
  `no_ktp` int(30) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `bank`, `nomor`, `an`, `npwp`, `id_area`, `no_ktp`, `alamat`, `wilayah`) VALUES
(1, 'K1', 'Et qui occaecat et i', 'Placeat unde ab et ', 'Recusandae Assumend', 'Odit eos nostrum eni', 'Adipisicing sint qu', 0, 0, 'Asperiores duis dolo', ''),
(2, 'K2', 'Obcaecati eligendi s', 'Est veniam rerum s', 'Adipisci aut commodo', 'Ut dolores rem eiusm', 'Commodi in ex molest', 0, 0, 'Deserunt officiis co', ''),
(3, 'j6', 'adi', 'bca', 'gddg', 'taufik', '6565656', 443, 323232, 'sasasas', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran_dp`
--
ALTER TABLE `tbl_pembayaran_dp`
  MODIFY `id_pembayaran_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_sortir`
--
ALTER TABLE `tbl_sortir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
