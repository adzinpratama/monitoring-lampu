-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2021 pada 04.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smarhome`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi`
--

CREATE TABLE `aksi` (
  `id_aksi` int(255) NOT NULL,
  `username` varchar(80) NOT NULL,
  `waktu` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `nama_kontrol` varchar(80) NOT NULL,
  `type` varchar(10) NOT NULL,
  `posisi` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aksi`
--

INSERT INTO `aksi` (`id_aksi`, `username`, `waktu`, `nama_kontrol`, `type`, `posisi`, `status`) VALUES
(1, 'saya', '2021-01-21 03:41:23', 'Lampu 1', 'lampu', 'Teras rumah', 'Off'),
(2, 'saya', '2021-01-21 03:21:52', 'Lampu 2', 'lampu', 'Ruang Tamu', 'On'),
(3, 'niza', '2021-01-18 23:23:24', 'Lampu 3', 'lampu', 'Kamar 1', 'On'),
(4, 'niza', '2021-01-18 23:23:24', 'Lampu 4', 'lampu', 'Dapur', 'On'),
(5, 'saya', '2021-01-21 03:41:50', 'Pintu 1', 'pintu', 'Teras Rumah', 'Key'),
(6, 'niza', '2021-01-19 00:55:28', 'Pintu 2', 'pintu', 'Pintu Depan', 'Key'),
(7, 'saya', '2021-01-21 03:22:08', 'Pintu 3', 'pintu', 'Kamar 1', 'Unkey'),
(8, 'niza', '2021-01-18 23:43:34', 'Pintu 4', 'pintu', 'Pintu Belakang', 'Key');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(75) NOT NULL,
  `group` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `active` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `username`, `group`, `password`, `email`, `activation_code`, `created_on`, `last_login`, `active`) VALUES
(6, 'habibi', 'admin', '$2a$12$1R8yCJAbgZmFxY0twoiGJ.c5BebezRPutlyh1yWVWn69CzSRAaZfW', 'habib@gmail.com', NULL, '2021-01-18 13:02:41', '2021-01-21 03:30:47', 1),
(10, 'niza fadilah', 'admin', '$2a$12$cXmrojorPTX7gdAob4fgkeB1Z96yEh4cVFGcsC8z9EknaIIaoIGby', 'niza@gmail.com', NULL, '2021-01-21 03:36:29', '2021-01-21 03:39:59', 1),
(11, 'Furqon', 'admin', '$2a$12$UbsxI2GYMgQzbEcc406aeucT/G0DYCBNJ/hxIdpYAM5qnxrFg3oV2', 'furqon@gmail.com', NULL, '2021-01-21 03:40:57', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksi`
--
ALTER TABLE `aksi`
  ADD PRIMARY KEY (`id_aksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksi`
--
ALTER TABLE `aksi`
  MODIFY `id_aksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
