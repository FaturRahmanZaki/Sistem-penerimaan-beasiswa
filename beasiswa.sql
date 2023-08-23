-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2023 pada 16.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` decimal(4,2) NOT NULL,
  `beasiswa` varchar(50) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_ajuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `registrations`
--

INSERT INTO `registrations` (`id`, `nama`, `email`, `nomor_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `created_at`, `status_ajuan`) VALUES
(26, 'Fatur Rahman', 'Fatur.fatur12@gmail.com', '085163215978', 5, 3.30, 'akademik', 'foto l.png', '2023-08-22 10:34:53', 'belum di verifikasi'),
(27, 'ibrahim haykal', 'ibrahimhaykal@gmail.com', '085163215978', 2, 3.10, 'akademik', 'Modul I_UI UX.pdf', '2023-08-22 11:56:41', 'Terverifikasi'),
(28, 'hafiz ayyasy pratama', 'hafizfae12@gmail.com', '085163215978', 3, 3.10, 'non-akademik', 'White Modern Oil and Gas Company Logo.png', '2023-08-22 12:01:08', 'belum di verifikasi'),
(29, 'testdoang', 'lailatulmysyarah@gmail.com', '085163215978', 1, 3.10, 'akademik', 'KTP.jpg', '2023-08-22 12:18:30', 'belum di verifikasi'),
(30, 'testdoang2', 'vehelep122@iucake.com', '085163215978', 1, 3.10, 'akademik', 'MODUL PELATIHAN 1 (HTML _ CSS_JAVASCRIPT_BOOTSTRAP).pdf', '2023-08-22 12:18:57', 'belum di verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
