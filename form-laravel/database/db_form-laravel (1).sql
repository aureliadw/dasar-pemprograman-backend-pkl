-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2025 at 08:25 AM
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
-- Database: `db_form-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lpl`
--

CREATE TABLE `lpl` (
  `id` bigint UNSIGNED NOT NULL,
  `portofolio_id` bigint UNSIGNED NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `terbuka_klien` tinyint(1) NOT NULL DEFAULT '0',
  `layanan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `setuju` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpl`
--

INSERT INTO `lpl` (`id`, `portofolio_id`, `longitude`, `latitude`, `terbuka_klien`, `layanan`, `setuju`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '142.0237550', '-58.3219070', 1, '\"[\\\"Maintenance\\\",\\\"Konsultasi\\\",\\\"Pelatihan\\\"]\"', 1, '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(2, 2, '173.8807300', '-79.1781600', 1, '\"[\\\"Maintenance\\\"]\"', 0, '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(3, 3, '94.4236880', '-18.4113180', 0, '\"[\\\"Maintenance\\\"]\"', 1, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(4, 4, '56.9395100', '-10.5989990', 0, '\"[\\\"Konsultasi\\\",\\\"Pelatihan\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(5, 5, '-11.3063400', '-20.2487030', 0, '\"[\\\"Pelatihan\\\",\\\"Maintenance\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(6, 6, '58.4478180', '-54.7093830', 1, '\"[\\\"Maintenance\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(7, 7, '141.8403320', '-84.8445230', 0, '\"[\\\"Maintenance\\\",\\\"Pelatihan\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(8, 8, '-162.8437010', '68.4369190', 1, '\"[\\\"Pelatihan\\\",\\\"Maintenance\\\",\\\"Konsultasi\\\"]\"', 1, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(9, 9, '-16.9547430', '5.9456980', 1, '\"[\\\"Konsultasi\\\",\\\"Pelatihan\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(10, 10, '16.7755470', '-41.7176780', 1, '\"[\\\"Pelatihan\\\",\\\"Maintenance\\\",\\\"Konsultasi\\\"]\"', 0, '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_tugas`
--

CREATE TABLE `manajemen_tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `batas` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `progres` int NOT NULL DEFAULT '0',
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manajemen_tugas`
--

INSERT INTO `manajemen_tugas` (`id`, `judul`, `deskripsi`, `batas`, `status`, `progres`, `aksi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tugas Proyek #1', 'Deskripsi singkat untuk tugas proyek nomor 1.', '2025-09-22', 'dalam_proses', 25, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(2, 'Tugas Proyek #2', 'Deskripsi singkat untuk tugas proyek nomor 2.', '2025-09-11', 'selesai', 77, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(3, 'Tugas Proyek #3', 'Deskripsi singkat untuk tugas proyek nomor 3.', '2025-09-02', 'dalam_proses', 29, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(4, 'Tugas Proyek #4', 'Deskripsi singkat untuk tugas proyek nomor 4.', '2025-09-09', 'dalam_proses', 11, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(5, 'Tugas Proyek #5', 'Deskripsi singkat untuk tugas proyek nomor 5.', '2025-09-05', 'selesai', 3, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(6, 'Tugas Proyek #6', 'Deskripsi singkat untuk tugas proyek nomor 6.', '2025-09-23', 'dalam_proses', 71, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(7, 'Tugas Proyek #7', 'Deskripsi singkat untuk tugas proyek nomor 7.', '2025-09-02', 'dalam_proses', 50, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(8, 'Tugas Proyek #8', 'Deskripsi singkat untuk tugas proyek nomor 8.', '2025-09-05', 'belum_mengisi', 54, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(9, 'Tugas Proyek #9', 'Deskripsi singkat untuk tugas proyek nomor 9.', '2025-09-07', 'dalam_proses', 77, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(10, 'Tugas Proyek #10', 'Deskripsi singkat untuk tugas proyek nomor 10.', '2025-09-18', 'dalam_proses', 47, 'Belum ada catatan aksi', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_08_042025_create_portofolio_table', 1),
(6, '2025_08_08_042236_create_portofolio_item_table', 1),
(7, '2025_08_08_042255_create_portofolio_gambar_table', 1),
(8, '2025_08_08_042312_create_lpl_table', 1),
(9, '2025_08_12_074040_add_extra_fields_to_users_table', 1),
(10, '2025_08_14_072740_create_pembayaran_table', 1),
(11, '2025_08_14_072927_create_penawaran_table', 1),
(12, '2025_08_14_073000_create_posting_proyek_table', 1),
(13, '2025_08_14_073013_create_ulasan_table', 1),
(14, '2025_08_14_073031_create_manajemen_tugas_table', 1),
(15, '2025_08_15_063135_add_user_columns_and_softdelete_to_portofolio_satu_table', 1),
(16, '2025_08_19_070100_add_created_updated_by_to_portofolio_satu_table', 1),
(17, '2025_08_20_063614_change_keahlian_layanan_to_text', 1),
(18, '2025_08_25_060214_create_permission_tables', 1),
(19, '2025_08_26_011628_rename_columns_in_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `jumlah_pembayaran` decimal(15,2) NOT NULL,
  `metode_pembayaran` enum('Transfer Bank','E-Wallet','Cash On Delivery') COLLATE utf8mb4_unicode_ci NOT NULL,
  `setuju_syarat` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `jumlah_pembayaran`, `metode_pembayaran`, `setuju_syarat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '601840.00', 'Transfer Bank', 0, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(2, '261956.00', 'E-Wallet', 1, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(3, '981734.00', 'E-Wallet', 0, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(4, '134566.00', 'Transfer Bank', 0, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(5, '653601.00', 'Transfer Bank', 1, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(6, '432273.00', 'E-Wallet', 1, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(7, '597796.00', 'E-Wallet', 0, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(8, '254649.00', 'E-Wallet', 0, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(9, '196305.00', 'Transfer Bank', 1, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(10, '820260.00', 'Transfer Bank', 1, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(11, '7000000.00', 'E-Wallet', 1, '2025-08-25 19:00:27', '2025-08-25 19:00:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` bigint UNSIGNED NOT NULL,
  `jumlah_penawaran` decimal(15,2) NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci,
  `durasi_pengerjaan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `jumlah_penawaran`, `pesan`, `durasi_pengerjaan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2824443.00', 'Penawaran terbaik untuk pengerjaan cepat.', 4, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(2, '3487069.00', 'Penawaran terbaik untuk pengerjaan cepat.', 6, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(3, '3612897.00', 'Kami menawarkan pengerjaan dengan kualitas premium.', 6, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(4, '4138612.00', 'Penawaran terbaik untuk pengerjaan cepat.', 8, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(5, '3336413.00', 'Kami menawarkan pengerjaan dengan kualitas premium.', 12, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(6, '2726025.00', NULL, 4, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(7, '4573702.00', 'Penawaran terbaik untuk pengerjaan cepat.', 3, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(8, '2168877.00', 'Penawaran terbaik untuk pengerjaan cepat.', 6, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(9, '4528449.00', 'Kami menawarkan pengerjaan dengan kualitas premium.', 7, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(10, '4236493.00', 'Penawaran terbaik untuk pengerjaan cepat.', 15, '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(11, '800000.00', 'ok', 9, '2025-08-25 19:03:35', '2025-08-25 19:03:55', '2025-08-25 19:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_portofolio', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(2, 'edit_portofolio', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(3, 'delete_portofolio', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(4, 'view_portofolio', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(5, 'create_pembayaran', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(6, 'edit_pembayaran', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(7, 'delete_pembayaran', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(8, 'view_pembayaran', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(9, 'create_pengajuan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(10, 'edit_pengajuan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(11, 'delete_pengajuan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(12, 'view_pengajuan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(13, 'create_proyek', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(14, 'edit_proyek', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(15, 'delete_proyek', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(16, 'view_proyek', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(17, 'create_ulasan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(18, 'edit_ulasan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(19, 'delete_ulasan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(20, 'view_ulasan', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(21, 'create_tugas', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(22, 'edit_tugas', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(23, 'delete_tugas', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(24, 'view_tugas', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_gambar1`
--

CREATE TABLE `portofolio_gambar1` (
  `id` bigint UNSIGNED NOT NULL,
  `portofolio_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolio_gambar1`
--

INSERT INTO `portofolio_gambar1` (`id`, `portofolio_id`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'uploads/portofolio/ex-voluptatum-68ad10dc1cece.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(2, 1, 'uploads/portofolio/rerum-fugit-68ad10de58fef.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(3, 1, 'uploads/portofolio/est-vero-68ad10de5a6b3.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(4, 2, 'uploads/portofolio/veritatis-dolores-68ad10dee97bf.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(5, 2, 'uploads/portofolio/est-ea-68ad10deeb012.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(6, 2, 'uploads/portofolio/dolores-quaerat-68ad10deec1b4.png', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(7, 3, 'uploads/portofolio/quia-ipsam-68ad10def3fb0.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(8, 4, 'uploads/portofolio/voluptas-ut-68ad10df04d3f.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(9, 4, 'uploads/portofolio/magni-non-68ad10df05b4d.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(10, 5, 'uploads/portofolio/id-vel-68ad10df0f9f6.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(11, 5, 'uploads/portofolio/nam-sunt-68ad10df110e0.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(12, 6, 'uploads/portofolio/et-aut-68ad10df19f2e.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(13, 6, 'uploads/portofolio/amet-dolor-68ad10df1b66d.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(14, 7, 'uploads/portofolio/et-culpa-68ad10df24a4a.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(15, 7, 'uploads/portofolio/dolorum-sint-68ad10df25b75.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(16, 7, 'uploads/portofolio/porro-id-68ad10df26d77.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(17, 8, 'uploads/portofolio/quidem-autem-68ad10df30aec.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(18, 9, 'uploads/portofolio/voluptas-est-68ad10df35dd1.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(19, 9, 'uploads/portofolio/recusandae-totam-68ad10df37a90.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(20, 10, 'uploads/portofolio/iusto-ea-68ad10df3ead7.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(21, 10, 'uploads/portofolio/quos-nihil-68ad10df40282.png', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_item`
--

CREATE TABLE `portofolio_item` (
  `id` bigint UNSIGNED NOT NULL,
  `portofolio_id` bigint UNSIGNED NOT NULL,
  `judul_proyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_singkat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_proyek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolio_item`
--

INSERT INTO `portofolio_item` (`id`, `portofolio_id`, `judul_proyek`, `deskripsi_singkat`, `url_proyek`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Saepe sint ut iusto.', 'Dolorum esse sed quia ut suscipit ducimus ab qui deleniti.', 'https://blick.com/inventore-quis-sapiente-delectus-dicta-quia.html', '2025-08-25 18:41:48', '2025-08-25 18:41:48', NULL),
(2, 1, 'Sint vitae delectus voluptatem.', 'Soluta sed non laborum et minus hic eum et.', 'https://www.howell.com/velit-autem-minima-consectetur-voluptas-sed-ducimus-natus', '2025-08-25 18:41:48', '2025-08-25 18:41:48', NULL),
(3, 1, 'Rerum error voluptatem sunt.', 'Dolorem voluptatum cum quia soluta ea sint at repellendus.', 'http://www.jones.com/dolorem-totam-deleniti-harum-cumque-earum-iste-ducimus', '2025-08-25 18:41:48', '2025-08-25 18:41:48', NULL),
(4, 2, 'Illo facere quis ullam.', 'Voluptas est quia ut consequatur omnis eaque.', 'https://haley.com/suscipit-tenetur-fugiat-quisquam-sit-sunt.html', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(5, 2, 'Sit rerum ullam laboriosam non.', 'Nam quidem pariatur quia debitis labore dolores ut ullam.', 'http://www.wisozk.com/in-dolor-eos-adipisci-reprehenderit-iste-tempora-eos-adipisci', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(6, 2, 'Nisi nulla temporibus.', 'Et quod dolor voluptatem sed aut perferendis quisquam earum quidem quod.', 'https://www.swift.org/dolores-vitae-voluptatum-laudantium-voluptatum-minima-delectus-laboriosam', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(7, 3, 'Aut et.', 'Voluptatum dolorem impedit assumenda fugiat id ad vel et voluptates harum.', 'http://goodwin.com/velit-aliquam-eum-dolorem-qui-et-velit-est.html', '2025-08-25 18:41:50', '2025-08-25 18:41:50', NULL),
(8, 4, 'Dolorem quis.', 'Explicabo sequi nobis fugit non molestiae ut laudantium rerum fuga reprehenderit.', 'http://miller.org/sint-qui-vel-hic', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(9, 5, 'Dolorem amet voluptas.', 'Nemo consectetur at voluptatem ea laudantium error consectetur tempore pariatur nulla voluptatum.', 'http://orn.com/libero-est-fugit-similique-nihil-voluptas-facere-nobis', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(10, 5, 'Totam nobis sequi optio at.', 'Voluptas sint accusantium mollitia consequatur quam id eveniet.', 'http://www.marquardt.org/', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(11, 5, 'Harum eaque ratione quaerat.', 'Quisquam animi consequatur architecto ab facere fuga libero non sit porro.', 'https://www.goodwin.com/inventore-in-minima-hic-dolores-quidem', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(12, 6, 'Cumque natus.', 'Non impedit suscipit dolor exercitationem sequi consectetur voluptatem qui.', 'http://www.cummerata.com/quis-vel-quidem-aut-cupiditate-cumque-ut-quaerat', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(13, 6, 'Possimus delectus.', 'Autem recusandae cupiditate doloribus vitae in dolores unde quisquam.', 'http://www.kunze.com/et-ut-facilis-quis-fugit-laborum-eos', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(14, 6, 'Ducimus nihil sapiente ducimus.', 'Aut doloremque tenetur placeat officia quas maxime ut esse provident ad officiis maiores ab.', 'http://www.batz.biz/exercitationem-minus-et-eveniet-saepe', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(15, 7, 'Atque odio eos suscipit officia.', 'Explicabo quas atque laudantium vero cumque ullam occaecati odit.', 'http://www.flatley.com/in-aut-eos-ab-blanditiis-temporibus-aut', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(16, 7, 'Voluptatibus voluptatem laudantium temporibus.', 'Voluptatem delectus in quia qui ut voluptas autem incidunt at nihil dicta soluta.', 'http://www.kuhlman.com/odio-placeat-dolorum-error-voluptas', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(17, 7, 'Explicabo mollitia eos accusamus.', 'Rerum dolorem harum laudantium quis sed eaque.', 'http://www.collins.com/', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(18, 8, 'Exercitationem incidunt laboriosam.', 'Optio est aliquam adipisci nostrum molestiae perspiciatis praesentium maiores voluptate ad debitis qui in.', 'https://www.heathcote.com/ipsam-voluptatem-harum-corporis-adipisci-sunt-neque', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(19, 8, 'Itaque quia hic.', 'Molestias et occaecati sunt eius voluptatem tenetur neque vel est in.', 'http://rutherford.org/iure-blanditiis-dolor-aut-neque.html', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(20, 9, 'Sit officia voluptatum laborum.', 'Consequatur repellendus unde reiciendis ut eveniet mollitia.', 'http://www.mcclure.com/quo-harum-deserunt-iste-et-consequatur', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL),
(21, 10, 'Ad voluptas nihil.', 'Qui eos fugiat quas aut quia et et architecto accusantium officiis consectetur dicta recusandae.', 'http://mante.com/vero-eos-facilis-omnis-sed-repellendus-ut-unde', '2025-08-25 18:41:51', '2025-08-25 18:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio_satu`
--

CREATE TABLE `portofolio_satu` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_portofolio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `warna_tema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolio_satu`
--

INSERT INTO `portofolio_satu` (`id`, `judul_portofolio`, `ringkasan`, `keahlian`, `warna_tema`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'Quidem deleniti.', 'Veritatis excepturi voluptatem tempora quam omnis non quia. Commodi est aperiam laborum similique. Omnis id soluta error alias est quod ut. Temporibus hic amet cumque ut.', '\"[\\\"SEO\\\",\\\"Pengembangan Aplikasi Mobile\\\"]\"', '#00cc00', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(2, 'Debitis quas sunt.', 'Dignissimos quod quod labore. Quod cum repudiandae impedit repellendus dolorum deserunt. Et natus enim dignissimos deleniti totam est. Molestiae eos doloremque quae sit quaerat.', '\"[\\\"Desain UI\\\\\\/UX\\\"]\"', '#001155', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(3, 'Voluptas dolor voluptas pariatur.', 'Unde sunt at saepe odio quia rerum. Eaque blanditiis sequi corrupti voluptatem eius. Dignissimos explicabo non consequatur quis.', '\"[\\\"Pengembangan Aplikasi Mobile\\\",\\\"Penulisan Konten\\\",\\\"SEO\\\"]\"', '#0055aa', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(4, 'Eos magnam consequatur quos.', 'Nemo repellat assumenda illo neque sapiente ab excepturi non. Saepe hic vitae ipsa debitis. Et vero ut quos et commodi in voluptates et.', '\"[\\\"Pengembangan Aplikasi Mobile\\\",\\\"Desain UI\\\\\\/UX\\\"]\"', '#0088dd', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(5, 'Eum et deleniti sed.', 'Ab nobis cumque et inventore voluptatem autem perspiciatis. Qui velit possimus maxime ducimus voluptas odio vero reprehenderit. Qui nemo et tenetur perferendis alias vero voluptate molestias. Veniam quasi amet dicta ea aut.', '\"[\\\"SEO\\\",\\\"Pemasaran Digital\\\",\\\"Penulisan Konten\\\"]\"', '#006622', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(6, 'Ea aliquam omnis itaque.', 'Qui sapiente eaque esse consequuntur. Reiciendis quam ratione aut et molestiae sit maiores temporibus. Provident eveniet quas alias tempora assumenda.', '\"[\\\"Desain UI\\\\\\/UX\\\",\\\"Pengembangan Aplikasi Mobile\\\"]\"', '#00ff66', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(7, 'Minima porro corporis eveniet.', 'Sed illum officiis impedit ut aut molestias. Repellat consequatur totam ipsum incidunt laudantium eaque voluptatem. Consequatur non cumque qui aliquid. Et est voluptatem esse possimus architecto.', '\"[\\\"SEO\\\"]\"', '#001111', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(8, 'Eius aspernatur distinctio.', 'Molestiae quia aperiam ut unde sunt minima. Reprehenderit modi cum voluptatem qui quos officia id. Consequuntur eaque commodi eos quia.', '\"[\\\"SEO\\\"]\"', '#003377', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(9, 'Sit molestiae error accusantium.', 'Ipsa quasi tenetur laudantium consequatur deserunt ducimus et. Sapiente ducimus tempore tempore velit. Sed quaerat nihil ut voluptatem dolore iste molestias non.', '\"[\\\"SEO\\\"]\"', '#00bb44', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL),
(10, 'Mollitia quae quod.', 'Eligendi sunt velit vel enim quia beatae. A reiciendis id dolores consequatur voluptatibus nemo nemo nesciunt. Et nihil quisquam sequi et est. Ab non amet voluptate dolorem excepturi et.', '\"[\\\"Pemasaran Digital\\\",\\\"Desain UI\\\\\\/UX\\\",\\\"Penulisan Konten\\\"]\"', '#0077aa', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posting_proyek`
--

CREATE TABLE `posting_proyek` (
  `id` bigint UNSIGNED NOT NULL,
  `detail_proyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Pengembangan Web','Desain Grafis','Pengembangan Mobile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` bigint UNSIGNED NOT NULL,
  `batas_penawaran` date NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_pengerjaan` enum('onsite','remote') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posting_proyek`
--

INSERT INTO `posting_proyek` (`id`, `detail_proyek`, `deskripsi`, `kategori`, `anggaran`, `batas_penawaran`, `lampiran`, `lokasi_pengerjaan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Animi nesciunt atque deserunt in.', 'Quaerat voluptatibus totam dolores sit et rerum ad. Magnam similique vel voluptas quis eos incidunt. Sapiente laborum doloremque et excepturi assumenda.', 'Desain Grafis', 5665578, '2025-08-29', 'booking_system.jpg', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(2, 'Eos temporibus pariatur velit aspernatur.', 'Dolorem provident aperiam qui incidunt numquam qui. Doloremque est ut distinctio autem sunt. Repudiandae sunt qui reiciendis voluptatibus accusantium.', 'Pengembangan Mobile', 4175402, '2025-10-18', 'booking_system.jpg', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(3, 'Commodi ipsum temporibus quis ab ea.', 'Repellendus aut qui amet repudiandae eveniet incidunt cum. Nihil et voluptatem ea adipisci voluptatem provident porro debitis.', 'Pengembangan Mobile', 9623639, '2025-09-07', 'seo_report.pdf', 'remote', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(4, 'Natus odit quis et.', 'Tempore quia delectus quod. Quos quo ipsa veritatis laboriosam.', 'Desain Grafis', 7135103, '2025-10-13', 'animasi1.gif', 'remote', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(5, 'Omnis doloribus quas consequuntur doloremque est.', 'Dignissimos vel qui accusantium atque animi accusantium doloremque. Beatae unde nulla nam sint eum molestias quibusdam. Qui magni vitae recusandae soluta deleniti animi sapiente.', 'Pengembangan Mobile', 8846523, '2025-10-08', 'brosur1.jpg', 'remote', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(6, 'Voluptates impedit natus architecto.', 'Cum est ut vero molestias sed aperiam molestias adipisci. Impedit dignissimos temporibus minus autem quam maiores est.', 'Pengembangan Mobile', 9076025, '2025-09-29', 'web_design.png', 'remote', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(7, 'Molestias et provident in.', 'Cupiditate ad ipsum velit sit et deleniti. Ipsum distinctio et ipsum et doloremque.', 'Pengembangan Mobile', 4434819, '2025-09-11', 'video1.mp4', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(8, 'Incidunt eaque quis.', 'Quo ipsum et facere asperiores. Explicabo et velit ex odit aut molestias blanditiis. Culpa quia occaecati a maxime consectetur enim.', 'Pengembangan Mobile', 3442309, '2025-10-14', 'logo1.png', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(9, 'Deleniti sed tempora.', 'Dolores sunt corrupti reprehenderit rerum est rem eos. Animi quos quo aut quam et. Qui sit aut iste dicta.', 'Desain Grafis', 3468253, '2025-10-13', 'web_design.png', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(10, 'Ut pariatur dolores quas.', 'Neque vel voluptatem incidunt est aspernatur et quia. Et eos quaerat molestiae praesentium atque.', 'Pengembangan Web', 8466580, '2025-10-03', 'web_design.png', 'onsite', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46'),
(2, 'user', 'web', '2025-08-25 18:41:46', '2025-08-25 18:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(4, 2),
(8, 2),
(12, 2),
(16, 2),
(20, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint UNSIGNED NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `rating`, `komentar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Biasa saja, sesuai harga yang dibayarkan.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(2, 2, 'Kerja rapi, tapi komunikasi kurang cepat.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(3, 3, 'Kerja bagus, hanya saja sedikit telat.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(4, 3, 'Kurang memuaskan, banyak revisi yang diperlukan.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(5, 4, 'Kerja bagus, hanya saja sedikit telat.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(6, 3, 'Kualitas kerja sangat baik dan komunikatif.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(7, 4, 'Sangat profesional dan hasilnya memuaskan.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(8, 3, 'Pelayanan sangat memuaskan, proyek selesai tepat waktu.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(9, 4, 'Kerja bagus, hanya saja sedikit telat.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL),
(10, 3, 'Luar biasa, akan menggunakan jasa ini lagi.', '2025-08-25 18:41:47', '2025-08-25 18:41:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_picture`, `tipe_pengguna`, `telepon`, `bio`, `deleted_at`) VALUES
(1, 'Admin Form', 'admin@gmail.com', '2025-08-25 18:41:46', '$2y$10$w0xBt1D8ziZjBY2UoSnlVOaFUhCev2QyMjY2UZPY.eJKwdAqwsUzi', 'VUzyKpr2hk3qOMmMLDT21TOWdswGgJbi23bLNP08aoYwXpb2OzfspEYavRIw', '2025-08-25 18:41:47', '2025-08-25 18:41:47', '1.jpg', 'Admin', '08123456789', '-', NULL),
(2, 'Orel', 'orel@gmail.com', '2025-08-25 18:41:47', '$2y$10$wMX.mYjp7z4jD8XroCghYOb8SkNKnVj7EwnASnBLEkQ0Q2HFyFM/S', 'aJXfULsJkldgCSQOZuhjEehI8OJJIYHoZr7Vq9f61irNm8kv5hfZgn1ZiqxF', '2025-08-25 18:41:47', '2025-08-25 18:41:47', '2.jpg', 'Klien', '08123456788', '-', NULL),
(3, 'zahir', 'zahir@gmail.com', '2025-08-25 18:41:47', '$2y$10$yLn/N9EsXrQhgH7Od5Ks2ugBomDWYNRZ7C6ULOegeBSgdY1Oyooym', 'GVMde2GAYv', '2025-08-25 18:41:47', '2025-08-25 18:41:47', '3.jpg', 'Freelancer', '08123456787', 'Freelancer sukses ibu kota', NULL),
(4, 'aurel', 'aurel@gmail.com', NULL, '$2y$10$yLN7pu9kTkxsJZts8MJ3j.JfbiuxtCNCN41ENkm5I4u8KS5rZtqja', NULL, '2025-08-25 20:28:27', '2025-08-25 20:28:27', 'profile_pictures/4Tg3GOdd9qfyofHobxEhtZ1ecvlFDutpBxB5XG0I.png', NULL, NULL, 'ok', NULL),
(5, 'unga', 'unga@gmail.com', NULL, '$2y$10$g.LKWYUyfi/leOOLwmqnfu6v73.ip49VGfjYg3zL1OrZS3iZXD0zG', NULL, '2025-08-25 20:35:14', '2025-08-25 20:35:14', 'profile_pictures/v1XgSfKONQIQg7SVgLJkRcf19Wujgqs8ETp3VLoj.png', NULL, NULL, 'ok', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lpl`
--
ALTER TABLE `lpl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpl_portofolio_id_foreign` (`portofolio_id`);

--
-- Indexes for table `manajemen_tugas`
--
ALTER TABLE `manajemen_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portofolio_gambar1`
--
ALTER TABLE `portofolio_gambar1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portofolio_gambar1_portofolio_id_foreign` (`portofolio_id`);

--
-- Indexes for table `portofolio_item`
--
ALTER TABLE `portofolio_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portofolio_item_portofolio_id_foreign` (`portofolio_id`);

--
-- Indexes for table `portofolio_satu`
--
ALTER TABLE `portofolio_satu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting_proyek`
--
ALTER TABLE `posting_proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lpl`
--
ALTER TABLE `lpl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manajemen_tugas`
--
ALTER TABLE `manajemen_tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portofolio_gambar1`
--
ALTER TABLE `portofolio_gambar1`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `portofolio_item`
--
ALTER TABLE `portofolio_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `portofolio_satu`
--
ALTER TABLE `portofolio_satu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posting_proyek`
--
ALTER TABLE `posting_proyek`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lpl`
--
ALTER TABLE `lpl`
  ADD CONSTRAINT `lpl_portofolio_id_foreign` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolio_satu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio_gambar1`
--
ALTER TABLE `portofolio_gambar1`
  ADD CONSTRAINT `portofolio_gambar1_portofolio_id_foreign` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolio_satu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio_item`
--
ALTER TABLE `portofolio_item`
  ADD CONSTRAINT `portofolio_item_portofolio_id_foreign` FOREIGN KEY (`portofolio_id`) REFERENCES `portofolio_satu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
