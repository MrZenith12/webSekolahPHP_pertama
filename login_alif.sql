-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2024 pada 19.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_alif`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alif`
--

CREATE TABLE `data_alif` (
  `nis` int(10) NOT NULL,
  `NISN` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_alif`
--

INSERT INTO `data_alif` (`nis`, `NISN`, `nama`, `kelas`, `prodi`) VALUES
(1, 1, 'abdul', 'XII', 'RPL'),
(2, 2, 'aliff', 'XII', 'RPL'),
(3, 4, 'jihan', 'XII', 'RPL'),
(4, 6, 'risha', 'XII', 'RPL'),
(5, 8, 'dea', 'XII', 'RPL'),
(7, 10, 'dipo', 'XII', 'RPL'),
(8, 11, 'dwiki', 'XII', 'RPL'),
(10, 13, 'hanifah', 'XII', 'RPL'),
(26, 67, 'qodri', 'XII', 'RPL'),
(34, 27, 'rangga', 'XII', 'RPL'),
(48, 25, 'rizki fadillah', 'XII', 'RPL'),
(60, 45, 'khalid', 'XII', 'RPL'),
(68, 41, 'nadya', 'XII', 'RPL'),
(70, 86, 'fauzan', 'XII', 'RPL'),
(75, 65, 'fauzari', 'XII', 'RPL'),
(79, 12, 'nayla', 'XII', 'RPL'),
(88, 62, 'balqan', 'XII', 'RPL'),
(91, 83, 'ridwan', 'XII', 'RPL'),
(93, 43, 'hafiz', 'XII', 'RPL'),
(9345, 9754, 'yoga', 'XII', 'RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_login`
--

CREATE TABLE `form_login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_login`
--

INSERT INTO `form_login` (`username`, `password`) VALUES
('admin1', 'admin1'),
('alif1', 'alif1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_alif`
--
ALTER TABLE `data_alif`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `NISN` (`NISN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
