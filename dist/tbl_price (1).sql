-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2024 pada 08.59
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
(24, 'B MH', '30,000.00 ', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`id_price`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
