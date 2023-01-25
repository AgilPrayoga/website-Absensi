-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2023 pada 12.48
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendences`
--

CREATE TABLE `attendences` (
  `id` int(11) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) DEFAULT NULL,
  `clock_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `attendences`
--

INSERT INTO `attendences` (`id`, `employee_id`, `date`, `clock_in`, `clock_out`) VALUES
(75, 101, '2023-01-23', '17:35:46', '17:35:49'),
(76, 102, '2023-01-23', '17:36:01', '17:36:04'),
(77, 103, '2023-01-23', '17:36:09', '17:36:12'),
(78, 104, '2023-01-23', '17:36:17', '17:36:18'),
(79, 105, '2023-01-23', '17:36:24', '17:36:26'),
(80, 106, '2023-01-23', '17:36:31', '17:36:34'),
(81, 107, '2023-01-23', '17:36:40', '17:36:42'),
(82, 108, '2023-01-23', '17:37:05', '17:37:06'),
(83, 109, '2023-01-23', '17:37:14', '17:37:16'),
(84, 111, '2023-01-23', '17:37:34', '17:37:36'),
(85, 112, '2023-01-23', '17:37:42', '17:37:44'),
(86, 113, '2023-01-23', '17:37:50', '17:37:52'),
(87, 103, '2023-01-25', '17:59:15', '17:59:26'),
(88, 111, '2023-01-25', '18:04:46', '18:08:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `employee_id`, `fullname`, `role`, `password`) VALUES
(85, 100, 'Ari Agil Prayoga', 'admin', '100822'),
(86, 101, 'Aditya Hutama mm', 'operator', '123'),
(88, 102, 'M.Andi Mahardi', 'operator', '123'),
(89, 103, 'NormanJuliand', 'operator', '123'),
(90, 104, 'sibob', 'operator', '123'),
(91, 105, 'Deva yugo', 'operator', '123'),
(92, 106, 'Bonifasius manuel DA', 'operator', '123'),
(93, 107, 'M.Abdhi Pratama', 'operator', '123'),
(94, 108, 'Rendy Pradana', 'operator', '123'),
(95, 109, 'Dono Pradana', 'operator', '123'),
(96, 110, 'Irfan Setiawan', 'operator', '123'),
(97, 111, 'Doni Setiawan', 'operator', '123'),
(98, 112, 'Dian Pradana', 'operator', '123'),
(99, 113, 'Agustian Pratama', 'operator', '123'),
(100, 114, 'dadang gotri', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employe_id` (`employee_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `attendences`
--
ALTER TABLE `attendences`
  ADD CONSTRAINT `attendences_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
