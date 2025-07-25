-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2025 at 07:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_tugas`
--

CREATE TABLE `manajemen_tugas` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `batas` date DEFAULT NULL,
  `status` enum('dalam_proses','belum_mengisi','selesai') DEFAULT NULL,
  `progres` int DEFAULT NULL,
  `aksi` enum('hapus','selesai') DEFAULT NULL
) ;

--
-- Dumping data for table `manajemen_tugas`
--

INSERT INTO `manajemen_tugas` (`id`, `judul`, `deskripsi`, `batas`, `status`, `progres`, `aksi`) VALUES
(1, 'ji', 'jo', '2025-07-24', 'belum_mengisi', 56, 'selesai'),
(2, 'jjojoo', 'jjiijiji', '2025-07-23', 'belum_mengisi', 100, 'selesai'),
(3, 'jjojoo', 'jjiijiji', '2025-07-23', 'belum_mengisi', 100, 'selesai'),
(4, 'jjojoo', 'jjiijiji', '2025-07-23', 'belum_mengisi', 100, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `jumlah_pembayaran` int NOT NULL,
  `metode_pembayaran` enum('transfer','ewallet','cod') DEFAULT NULL,
  `setuju_syarat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `jumlah_pembayaran`, `metode_pembayaran`, `setuju_syarat`) VALUES
(1, 4000, 'transfer', 1),
(2, 4000, 'transfer', 1),
(3, 4000, 'transfer', 1),
(4, 4000, 'transfer', 1),
(5, 3000000, 'cod', 1),
(6, 3000000, 'cod', 1),
(7, 3000000, 'cod', 1),
(8, 3000000, 'cod', 1),
(9, 3000000, 'cod', 1),
(10, 3000000, 'cod', 1),
(11, 3000000, 'cod', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int NOT NULL,
  `jumlah_penawaran` int DEFAULT NULL,
  `pesan` text,
  `durasi_pengerjaan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `jumlah_penawaran`, `pesan`, `durasi_pengerjaan`) VALUES
(1, 30, 'oke', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `tipe_pengguna` enum('klien','freelancer') DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL,
  `bio` text,
  `gambar_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `kata_sandi`, `tipe_pengguna`, `nomor_telepon`, `bio`, `gambar_profil`) VALUES
(1, 'Aurelia Dwiyan Putri', 'aurl@gmail.com', '$2y$10$izqfvCp4/4ke6g28DVseMuamG4F48RhvWH0IAeAxUuqTFiMNLu46W', 'klien', '085722162873', 'huhuy', 'IMG_20250514_105952.png'),
(2, 'zahra tunnisa', 'zahra@gmail.com', '$2y$10$czg1TEQtp18kJHGCjPawxO6o9cHJbbwRtCZBeu6RZ/yyAH6ZGbVFy', 'freelancer', '089779898989', 'hjhj', 'c9a.jpg'),
(3, 'salwa', 'jubleg@gmail.com', '$2y$10$T/8EuEKvlYw6yjXIDXD4EuHah7zKKPSGwgpAq6hAV0PDermAP.Hfi', 'klien', '088795471044', 'jojo', 'c9a.jpg'),
(4, 'salwa', 'jubleg@gmail.com', '$2y$10$6X/w18Ko47DWDFbQ04w2oudAKfwoDUO9Am4R1cWSOQDIzVrqNvyW2', 'klien', '088795471044', 'jojo', 'c9a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int NOT NULL,
  `judul_portofolio` varchar(255) NOT NULL,
  `ringkasan_portofolio` text NOT NULL,
  `keahlian` text,
  `warna_tema` varchar(50) DEFAULT NULL,
  `gambar_proyek` text,
  `terima_klien` enum('ya','tidak') DEFAULT 'tidak',
  `layanan` text,
  `longitude` decimal(10,8) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `items` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `judul_portofolio`, `ringkasan_portofolio`, `keahlian`, `warna_tema`, `gambar_proyek`, `terima_klien`, `layanan`, `longitude`, `latitude`, `items`, `created_at`) VALUES
(1, 'jooooooooo', 'n', '', '#000000', '', 'ya', 'Konsultasi,Maintenance', '90.00000000', '45.00000000', '[{\"judul\":\"jaaajjja\",\"deskripsi\":\"jpiiiiiiiiiooo\",\"url\":\"https:\\/\\/www.notion.so\\/\"}]', '2025-07-25 06:50:31'),
(2, 'jooooooooo', 'i', 'Pengembangan Aplikasi Mobile,Penulisan Konten', '#dc4c4c', '', 'ya', 'Konsultasi,Maintenance,Pelatihan', '90.00000000', '45.00000000', '[{\"judul\":\"jaaajjja\",\"deskripsi\":\"jpiiiiiiiiiooo\",\"url\":\"https:\\/\\/www.notion.so\\/\"}]', '2025-07-25 06:51:38'),
(3, 'jooooooooo', 'h', 'Pengembangan Aplikasi Mobile', '#000000', '[\"form_portofolio (2).png\"]', 'ya', 'Konsultasi,Maintenance', '90.00000000', '45.00000000', '[{\"judul\":\"jaaajjja\",\"deskripsi\":\"jpiiiiiiiiiooo\",\"url\":\"https:\\/\\/www.notion.so\\/\"}]', '2025-07-25 06:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `posting_proyek`
--

CREATE TABLE `posting_proyek` (
  `id` int NOT NULL,
  `detail_proyek` text,
  `deskripsi` text,
  `kategori` enum('penulisan_konten','desain_grafis') DEFAULT NULL,
  `anggaran` int DEFAULT NULL,
  `batas_penawaran` datetime DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `lokasi_pengerjaan` enum('remote','onsite') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posting_proyek`
--

INSERT INTO `posting_proyek` (`id`, `detail_proyek`, `deskripsi`, `kategori`, `anggaran`, `batas_penawaran`, `lampiran`, `lokasi_pengerjaan`) VALUES
(1, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite'),
(2, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite'),
(3, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite'),
(4, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite'),
(5, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite'),
(6, 'jangan', 'oke', 'penulisan_konten', 4000, '2025-07-23 10:26:00', 'image.png', 'onsite');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int NOT NULL,
  `rating` int NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `rating`, `komentar`, `created_at`) VALUES
(1, 3, 'jnj', '2025-07-22 12:20:24'),
(2, 1, 'okoko', '2025-07-23 01:26:15'),
(3, 1, 'okoko', '2025-07-23 01:26:59'),
(4, 4, 'kn', '2025-07-23 01:27:04'),
(5, 4, 'kn', '2025-07-23 01:27:46'),
(6, 4, 'kn', '2025-07-23 01:28:30'),
(7, 5, '', '2025-07-23 01:28:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manajemen_tugas`
--
ALTER TABLE `manajemen_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting_proyek`
--
ALTER TABLE `posting_proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manajemen_tugas`
--
ALTER TABLE `manajemen_tugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posting_proyek`
--
ALTER TABLE `posting_proyek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
