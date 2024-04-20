-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2024 pada 08.14
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
  `harga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_price`
--

INSERT INTO `tbl_price` (`id_price`, `nama_produk`, `harga`) VALUES
(1, 'COL', '560,000.00 '),
(2, 'JB', '560,000.00 ');

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
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
