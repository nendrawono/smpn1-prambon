-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2022 pada 20.48
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
-- Database: `skrip-dit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ekstra`
--

CREATE TABLE `detail_ekstra` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `ekstra_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_ekstra`
--

INSERT INTO `detail_ekstra` (`id`, `siswa_id`, `ekstra_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 67, 1, NULL, '2022-04-29 11:47:55', NULL),
(19, 62, 1, NULL, '2022-04-29 11:47:55', NULL),
(20, 35, 1, NULL, '2022-04-29 11:47:55', NULL),
(21, 52, 1, NULL, '2022-04-29 11:47:55', NULL),
(23, 67, 2, NULL, '2022-04-29 11:48:26', NULL),
(24, 7, 2, NULL, '2022-04-29 11:48:26', NULL),
(26, 62, 7, NULL, '2022-05-07 01:03:17', NULL),
(27, 1535010089, 7, NULL, '2022-05-07 01:03:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstra`
--

CREATE TABLE `ekstra` (
  `id` int(11) NOT NULL,
  `nm_ekstra` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekstra`
--

INSERT INTO `ekstra` (`id`, `nm_ekstra`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PRAMUKA', '2022-03-23 13:39:27', '2022-04-29 08:54:35', NULL),
(2, 'TATA BUSANA', '2022-03-23 07:50:29', '2022-04-29 09:10:56', NULL),
(3, 'KARAWITAN', '2022-04-10 14:18:33', '2022-04-29 09:11:04', NULL),
(4, 'TATA BOGA', '2022-04-29 04:17:27', '2022-04-29 04:17:27', NULL),
(5, 'SENI MUSIK', '2022-04-29 04:18:04', '2022-04-29 04:18:04', NULL),
(6, 'SENI TARI', '2022-04-29 04:18:09', '2022-04-29 04:18:09', NULL),
(7, 'ESPORT', '2022-04-29 11:48:46', '2022-04-29 11:48:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `emosi`
--

CREATE TABLE `emosi` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(255) DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `emosi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `emosi`
--

INSERT INTO `emosi` (`id`, `siswa_id`, `hari`, `bulan`, `tahun_ajaran_id`, `emosi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(99, '7', 7, 6, 5, 1, '2022-07-07 10:55:38', '2022-07-07 16:26:59', NULL),
(100, '35', 7, 8, 5, 1, '2022-07-07 10:55:38', '2022-07-07 16:28:12', NULL),
(101, '62', 7, 6, 5, 1, '2022-07-07 10:55:38', '2022-07-07 16:27:14', NULL),
(102, '67', 7, 8, 5, 1, '2022-07-07 10:55:38', '2022-07-07 16:28:08', NULL),
(103, '1535010089', 7, 7, 5, 1, '2022-07-07 10:55:38', '2022-07-07 17:12:51', NULL),
(104, '7', 7, 7, 5, 1, '2022-07-07 10:58:41', NULL, NULL),
(105, '35', 7, 7, 5, 1, '2022-07-07 10:58:41', NULL, NULL),
(106, '62', 7, 7, 5, 1, '2022-07-07 10:58:41', NULL, NULL),
(107, '67', 7, 7, 5, 1, '2022-07-07 10:58:41', NULL, NULL),
(108, '1535010089', 7, 7, 5, 1, '2022-07-07 10:58:41', '2022-07-07 17:11:25', NULL),
(109, '7', 7, 7, 5, 1, '2022-07-07 10:58:44', NULL, NULL),
(110, '35', 7, 7, 5, 1, '2022-07-07 10:58:44', NULL, NULL),
(111, '62', 7, 7, 5, 1, '2022-07-07 10:58:44', NULL, NULL),
(112, '67', 7, 7, 5, 1, '2022-07-07 10:58:44', NULL, NULL),
(113, '1535010089', 7, 7, 5, 1, '2022-07-07 10:58:44', '2022-07-07 17:12:54', NULL),
(114, '7', 7, 7, 5, 1, '2022-07-07 12:11:47', NULL, NULL),
(115, '35', 7, 7, 5, 1, '2022-07-07 12:11:47', NULL, NULL),
(116, '62', 7, 7, 5, 1, '2022-07-07 12:11:47', NULL, NULL),
(117, '67', 7, 7, 5, 1, '2022-07-07 12:11:47', NULL, NULL),
(118, '1535010089', 7, 7, 5, 0, '2022-07-07 12:11:47', NULL, NULL),
(119, '7', 7, 7, 5, 1, '2022-07-07 12:11:53', NULL, NULL),
(120, '35', 7, 7, 5, 1, '2022-07-07 12:11:53', NULL, NULL),
(121, '62', 7, 7, 5, 1, '2022-07-07 12:11:53', NULL, NULL),
(122, '67', 7, 7, 5, 1, '2022-07-07 12:11:53', NULL, NULL),
(123, '1535010089', 7, 7, 5, 0, '2022-07-07 12:11:53', NULL, NULL),
(124, '7', 7, 7, 5, 1, '2022-07-07 12:12:06', NULL, NULL),
(125, '35', 7, 7, 5, 1, '2022-07-07 12:12:06', NULL, NULL),
(126, '62', 7, 7, 5, 1, '2022-07-07 12:12:06', NULL, NULL),
(127, '67', 7, 7, 5, 1, '2022-07-07 12:12:06', NULL, NULL),
(128, '1535010089', 7, 7, 5, 1, '2022-07-07 12:12:06', NULL, NULL),
(129, '7', 7, 7, 5, 1, '2022-07-07 12:12:08', NULL, NULL),
(130, '35', 7, 7, 5, 1, '2022-07-07 12:12:08', NULL, NULL),
(131, '62', 7, 7, 5, 1, '2022-07-07 12:12:08', NULL, NULL),
(132, '67', 7, 7, 5, 1, '2022-07-07 12:12:08', NULL, NULL),
(133, '1535010089', 7, 7, 5, 1, '2022-07-07 12:12:08', NULL, NULL),
(134, '7', 7, 7, 5, 1, '2022-07-07 12:13:18', NULL, NULL),
(135, '35', 7, 7, 5, 1, '2022-07-07 12:13:18', NULL, NULL),
(136, '62', 7, 7, 5, 1, '2022-07-07 12:13:18', NULL, NULL),
(137, '67', 7, 7, 5, 1, '2022-07-07 12:13:18', NULL, NULL),
(138, '1535010089', 7, 7, 5, 1, '2022-07-07 12:13:18', NULL, NULL),
(139, '7', 9, 7, 5, 1, '2022-07-09 10:26:17', NULL, NULL),
(140, '35', 9, 7, 5, 1, '2022-07-09 10:26:17', NULL, NULL),
(141, '62', 9, 7, 5, 1, '2022-07-09 10:26:17', NULL, NULL),
(142, '67', 9, 7, 5, 1, '2022-07-09 10:26:17', NULL, NULL),
(143, '1535010089', 9, 7, 5, 1, '2022-07-09 10:26:17', NULL, NULL),
(144, '7', 9, 7, 5, 1, '2022-07-09 10:26:35', NULL, NULL),
(145, '35', 9, 7, 5, 1, '2022-07-09 10:26:35', NULL, NULL),
(146, '62', 9, 7, 5, 1, '2022-07-09 10:26:35', NULL, NULL),
(147, '67', 9, 7, 5, 1, '2022-07-09 10:26:35', NULL, NULL),
(148, '1535010089', 9, 7, 5, 0, '2022-07-09 10:26:35', NULL, NULL),
(149, '1535010089', 9, 7, 5, 0, '2022-07-09 12:04:30', NULL, NULL),
(150, '35', 9, 7, 5, 1, '2022-07-09 12:04:30', NULL, NULL),
(151, '62', 9, 7, 5, 1, '2022-07-09 12:04:30', NULL, NULL),
(152, '67', 9, 7, 5, 1, '2022-07-09 12:04:30', NULL, NULL),
(153, '7', 9, 7, 5, 1, '2022-07-09 12:04:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` varchar(50) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nm_guru` varchar(255) DEFAULT NULL,
  `alamat_guru` varchar(255) DEFAULT NULL,
  `jabatan_id` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nm_guru`, `alamat_guru`, `jabatan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('085733502466', '085733502466', 'Test Guru', 'Jl. Test Guru', '3', '2022-07-09 11:12:20', '2022-07-09 11:12:20', NULL),
('111111111111', '111111111111', 'Nendra', 'Jl.krukah', '2', '2022-07-07 10:46:37', '2022-07-07 15:46:50', '2022-07-07 10:46:50'),
('123', '123', 'nendra wono', 'jl.krukah lama', '2', '2022-07-07 09:49:30', '2022-07-07 14:51:01', '2022-07-07 09:51:01'),
('1535001181', '1535001181', 'GURU 1', 'Jl. Sebelah Sekolahan no 2', '3', '2022-04-24 08:34:20', '2022-05-07 05:48:33', NULL),
('1535010073', '1535010073', 'AKU KEPALA SEKOLAH S. Pdi,P', 'Jl. Bapak Kepala Sekolah no 32', '1', '2022-05-07 00:36:36', '2022-05-07 06:02:04', NULL),
('2147483647', '15340134381', 'Guru 2', 'Jl. Guru 2', '3', '2022-04-26 12:02:56', '2022-05-07 05:48:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nm_jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nm_jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KEPALA SEKOLAH', '2022-05-07 05:38:23', '2022-05-07 06:02:26', NULL),
(2, 'GURU BP', '2022-05-07 05:38:41', '2022-05-07 05:38:45', NULL),
(3, 'GURU MATAPELAJARAN', '2022-05-07 05:39:08', '2022-05-07 05:39:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` int(11) NOT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam_ke` varchar(255) DEFAULT NULL,
  `jam_mulai` varchar(255) DEFAULT NULL,
  `jam_selesai` varchar(255) DEFAULT '',
  `kelas_id` int(11) DEFAULT NULL,
  `guru_id` varchar(50) DEFAULT NULL,
  `matpel_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `hari`, `jam_ke`, `jam_mulai`, `jam_selesai`, `kelas_id`, `guru_id`, `matpel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'selasa', '1', '07:00', '12:00', 1, '1535001181', 5, '2022-04-24 15:03:28', '2022-04-26 16:29:58', NULL),
(12, 'kamis', '1', '07:00', '08:00', 1, '1535001181', 6, '2022-04-26 11:37:57', '2022-04-26 11:37:57', NULL),
(13, 'senin', '1', '07:00', '09:00', 1, '1535001181', 5, '2022-04-26 12:00:17', '2022-04-26 12:00:17', NULL),
(14, 'senin', '2', '10:00', '11:00', 1, '1535001181', 6, '2022-04-26 12:00:17', '2022-04-26 12:00:17', NULL),
(15, 'senin', '3', '12:00', '15:00', 1, '1535001181', 7, '2022-04-26 12:00:17', '2022-04-26 12:00:17', NULL),
(16, 'rabu', '1', '07:00', '11:00', 1, '1535001181', 8, '2022-04-26 12:01:02', '2022-04-26 12:01:02', NULL),
(17, 'senin', '1', '07:00', '08:00', 2, '1535001181', 5, '2022-04-29 04:25:52', '2022-04-29 04:25:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nm_kelas` varchar(255) DEFAULT NULL,
  `wali_kelas_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nm_kelas`, `wali_kelas_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VII-A', 1535001181, '1', '2022-03-04 07:51:55', '2022-05-09 08:13:34', NULL),
(2, 'VII-B', 1535001181, '1', '2022-03-04 02:23:45', '2022-05-09 08:13:35', NULL),
(3, 'VII-C', 1535010073, '1', '2022-03-23 12:52:12', '2022-05-09 08:14:17', NULL),
(6, 'VIII-A', 1535001181, '1', '2022-04-24 09:28:52', '2022-05-09 08:13:41', NULL),
(7, 'IX-A', 1535010073, '1', '2022-04-24 09:29:02', '2022-05-09 08:14:16', NULL),
(9, 'X', 1535010073, '1', '2022-05-09 03:29:58', '2022-05-09 08:34:03', '2022-05-09 03:34:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nm_matpel` varchar(255) DEFAULT '',
  `kkm` int(11) DEFAULT NULL,
  `kelompok` varchar(2) DEFAULT '',
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matpel`
--

INSERT INTO `matpel` (`id`, `nm_matpel`, `kkm`, `kelompok`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Ilmu Pengetahuan Alam', 80, 'A', 'Deskripsi', '2022-04-05 01:57:36', '2022-05-01 12:59:29', NULL),
(6, 'Bahasa Indonesia', 80, 'A', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-23 16:16:29', '2022-05-01 17:28:09', NULL),
(7, 'Bahasa Inggris', 75, 'B', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-26 11:35:27', '2022-05-01 17:28:11', NULL),
(8, 'Seni Budaya', 80, 'C', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-26 11:35:40', '2022-05-01 17:28:12', NULL),
(9, 'Ab eligendi officia ', 35, 'Be', 'Consequatur nisi mo', '2022-05-11 13:16:59', '2022-05-11 18:17:06', '2022-05-11 13:17:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matpel_detail`
--

CREATE TABLE `matpel_detail` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `matpel_id` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang`
--

CREATE TABLE `orang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orang`
--

INSERT INTO `orang` (`id`, `nama`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'wonox', 'asdkj', '0000-00-00 00:00:00', '2022-01-05 06:59:50', NULL),
(3, 'WONO', 'KRI FATAHILAH 245', NULL, NULL, NULL),
(5, 'WONO', 'kKRI FATAHILAH 245', '2022-01-05 01:02:16', '2022-01-05 01:02:16', NULL),
(6, 'WONO', 'kKRI FATAHILAH 245', '2022-02-01 07:00:05', '2022-02-01 07:00:05', NULL),
(7, 'WONO', 'kKRI FATAHILAH 245', '2022-02-01 07:00:26', '2022-02-01 07:00:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `isi_pengumuman`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '          \r\n                    \r\n          <p>          \r\n          </p><h1><u style=\"\">          \r\n                    \r\n                    \r\n          <span style=\"font-family: Impact;\">isi pengumuman nih</span></u></h1><h1><br></h1><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><h1><u style=\"\"><span style=\"font-family: Impact;\"><br></span>          </u></h1>          <img style=\"width: 300px;\" src=\"data:image/jpeg;base64,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\" data-filename=\"togamas_18075_Hilmy_Milan.jpg\"><p></p>                    ', '2022-04-28 16:13:00', '2022-05-19 11:06:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(50) DEFAULT NULL,
  `prestasi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `siswa_id`, `prestasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7', 'lomba robotik tahun 2022', '2022-04-28 18:38:59', NULL, NULL),
(2, '7', 'lomba balet', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport`
--

CREATE TABLE `raport` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(50) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `spiritual_pred` text DEFAULT NULL,
  `spiritual_des` text DEFAULT NULL,
  `sosial_pred` text DEFAULT NULL,
  `sosial_des` text DEFAULT NULL,
  `sakit` int(11) DEFAULT 0,
  `ijin` int(11) DEFAULT 0,
  `tanpa_keterangan` int(11) DEFAULT 0,
  `membaca` text DEFAULT NULL,
  `menghitung` text DEFAULT NULL,
  `prilaku` text DEFAULT NULL,
  `disiplin` text DEFAULT NULL,
  `kerja_keras` text DEFAULT NULL,
  `kreatif` text DEFAULT NULL,
  `mandiri` text DEFAULT NULL,
  `rasa_ingin_tau` text DEFAULT NULL,
  `tanggung_jawab` text DEFAULT NULL,
  `kepala_sekolah_id` int(11) DEFAULT NULL,
  `wali_kelas_id` int(11) DEFAULT NULL,
  `koor_inklusif_id` int(11) DEFAULT NULL,
  `raport_status` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `raport`
--

INSERT INTO `raport` (`id`, `siswa_id`, `kelas_id`, `tahun_ajaran_id`, `spiritual_pred`, `spiritual_des`, `sosial_pred`, `sosial_des`, `sakit`, `ijin`, `tanpa_keterangan`, `membaca`, `menghitung`, `prilaku`, `disiplin`, `kerja_keras`, `kreatif`, `mandiri`, `rasa_ingin_tau`, `tanggung_jawab`, `kepala_sekolah_id`, `wali_kelas_id`, `koor_inklusif_id`, `raport_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, '1535010089', 1, 2, 'B', 'spiritual des', 'C', 'sosial des', 1, 2, 4, 'abcde', 'abcde menghitung', 'abcde prilaku', 'abcde disiplin', 'abcde kerja keras', 'abcde kreatif', 'abcde mendiri', 'abcde rasa', 'abcde tgng jawab', 1535010073, 1535001181, 1535001181, 'draft', '2022-05-09 14:56:10', '2022-05-12 17:48:39', NULL),
(36, '35', 1, 2, 'SB', 'Aliquip qui adipisic', 'SB', 'Earum est vero face', 1, 1, 1, '     Ad repellendus Occa     ', '     Quidem quasi volupta     ', '     Nulla sit est dolore     ', '     Totam sed expedita l     ', '     Doloremque inventore     ', '     Ducimus at distinct     ', '     Aut a nostrud proide     ', '     Consequat Voluptate     ', '     Dolor quia qui esse     ', NULL, NULL, NULL, 'publish', '2022-05-16 12:20:38', '2022-05-16 17:20:38', NULL),
(39, '7', 2, 2, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', NULL, NULL, NULL),
(42, '7', 2, 5, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', NULL, NULL, NULL),
(43, '153501001', NULL, 5, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', NULL, NULL, NULL),
(44, '1535010089', 1, 5, 'SB', 'des pred', 'SB', 'des sos', 1, 2, 3, ' memnaca   ', ' menghitung   ', ' prilaku   ', ' disiplin   ', ' kerjakeras   ', ' kreatif   ', ' mandiri   ', ' rasa ingin tau   ', ' tanggung jawab   ', NULL, NULL, NULL, 'publish', '2022-07-09 13:23:30', '2022-07-09 18:23:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_ekstra`
--

CREATE TABLE `raport_ekstra` (
  `id` int(11) NOT NULL,
  `raport_id` int(11) DEFAULT NULL,
  `ekstra_id` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `raport_ekstra`
--

INSERT INTO `raport_ekstra` (`id`, `raport_id`, `ekstra_id`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 7, 'esport dengan baik', '2022-05-09 15:00:35', '2022-05-09 15:00:39', NULL),
(10, 39, 2, NULL, NULL, NULL, NULL),
(12, 41, 7, NULL, NULL, NULL, NULL),
(13, 42, 2, NULL, NULL, NULL, NULL),
(19, 44, 7, ' esport nec ', '2022-07-09 13:23:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_matpel`
--

CREATE TABLE `raport_matpel` (
  `id` int(11) NOT NULL,
  `raport_id` int(11) DEFAULT NULL,
  `matpel_id` int(11) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT '',
  `predikat` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `raport_matpel`
--

INSERT INTO `raport_matpel` (`id`, `raport_id`, `matpel_id`, `nilai`, `predikat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 5, '100', 'A', '2022-05-09 15:01:41', NULL, NULL),
(2, 11, 6, '90', 'B', '2022-05-09 15:02:02', NULL, NULL),
(3, 11, 7, '80', 'B+', '2022-05-09 15:02:26', NULL, NULL),
(4, 11, 8, '60', 'C', '2022-05-09 15:02:54', NULL, NULL),
(28, 39, 5, '0', '-', NULL, NULL, NULL),
(33, 42, 5, '0', '-', NULL, NULL, NULL),
(54, 44, 5, '100', 'A', NULL, NULL, NULL),
(55, 44, 6, '100', 'A', NULL, NULL, NULL),
(56, 44, 7, '100', 'A', NULL, NULL, NULL),
(57, 44, 8, '100', 'A', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `nis` varchar(255) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nm_siswa` varchar(255) DEFAULT '',
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status_dalam_keluarga` varchar(50) DEFAULT '',
  `anak_ke` varchar(50) DEFAULT '',
  `tlp` varchar(50) DEFAULT '',
  `sekolah_asal` varchar(255) DEFAULT NULL,
  `diterima_dikelas` varchar(255) DEFAULT NULL,
  `diterima_tgl` date DEFAULT NULL,
  `nm_ayah` varchar(255) DEFAULT NULL,
  `nm_ibu` varchar(255) DEFAULT NULL,
  `alamat_ortu` varchar(255) DEFAULT NULL,
  `tlp_ortu` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `nm_wali` varchar(255) DEFAULT NULL,
  `alamat_wali` varchar(255) DEFAULT NULL,
  `tlp_wali` varchar(255) DEFAULT NULL,
  `pekerjaan_wali` varchar(255) DEFAULT NULL,
  `reff_passfoto` longtext DEFAULT NULL,
  `original_passfoto` longtext DEFAULT NULL,
  `kelas_sekarang` int(11) DEFAULT NULL,
  `guru_pendamping_sekarang` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `kelas_id`, `nm_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `status_dalam_keluarga`, `anak_ke`, `tlp`, `sekolah_asal`, `diterima_dikelas`, `diterima_tgl`, `nm_ayah`, `nm_ibu`, `alamat_ortu`, `tlp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nm_wali`, `alamat_wali`, `tlp_wali`, `pekerjaan_wali`, `reff_passfoto`, `original_passfoto`, `kelas_sekarang`, `guru_pendamping_sekarang`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', 1, 'ADMIN', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/superadmin.jpg', NULL, 1, NULL, NULL, NULL, '2022-05-20 02:38:17', '2022-05-20 02:33:19'),
('1535010089', '1535010089', 1, 'DIDIT AURYAN IM', 'SIDOARJO', '1997-07-05', 'L', 'Jl. GPA NO 43', 'ISLAM', 'KANDUNG', '1', '0315043433', 'SDN NEGERI 11', '1', '2022-01-01', 'AYAH DIDIT', 'IBU DIDIT', 'JL. GPA NO 25', '0315022222', 'PNS', 'IBU RUMAH TANGGA', '', '', '', '', 'img/1535010089.jpg', NULL, 1, '1535001181', 1, '2022-05-07 00:30:35', '2022-05-07 09:11:04', NULL),
('35', '35', 1, 'REZA', 'SURABAYA', '1969-12-31', 'L', 'Ex provident mollit', 'Numquam odit eos nes', 'Amet cumque officia', 'Harum praesentium te', '39', 'Non eiusmod aute non', NULL, '2022-08-01', 'Dignissimos vel qui ', 'Beatae eu ex reicien', 'Neque neque possimus', '81', 'Qui ullam voluptas a', 'Rerum in reprehender', '', '', '', '', 'img/35.jpg', NULL, 1, '0', 1, '2022-04-24 07:56:58', '2022-04-29 16:00:38', NULL),
('52', '52', 3, 'YUNI', 'MAGETAN', '2022-04-06', 'P', 'Aut deserunt in sed ', 'Quia deleniti volupt', 'Quos nostrud tempora', 'Deleniti dicta culpa', '89', 'Sunt pariatur Mini', NULL, '1970-01-01', 'Laudantium impedit', 'Magna duis sed id d', 'Molestias nulla vel ', '74', 'Dolore vel eligendi ', 'Modi qui non illum ', 'Ducimus fugit veni', 'Deleniti nulla sequi', '85', 'Officiis harum conse', 'img/52.jpg', NULL, 3, '0', 1, '2022-04-26 12:04:31', '2022-04-29 16:00:59', '2022-04-26 12:04:42'),
('62', '62', 7, 'WONO', 'MOJOKERTO', '1970-01-01', 'P', 'Est non laboris mod', 'Aut consequatur maio', 'Adipisci explicabo ', 'Expedita ipsum iusto', '12', 'Rerum ipsum aperiam ', NULL, '1970-01-01', 'Rerum harum dolorum ', 'Labore quia est fugi', 'A in numquam earum a', '47', 'Suscipit cum molesti', 'Non culpa odio est f', 'Voluptatum impedit ', 'Quis cupidatat ex vo', '67', 'Nostrum quisquam vol', 'img/62.jpg', NULL, 7, '0', 1, '2022-04-28 14:37:28', '2022-04-29 16:00:53', NULL),
('67', '67', 6, 'KAILA', 'PROBOLINGGO', '2022-04-28', 'L', 'Et iure irure omnis ', 'Ipsa debitis sint n', 'Ex qui perspiciatis', 'Doloremque adipisci ', '1', 'Unde quis iure esse ', NULL, '2022-04-01', 'Sit in modi temporib', 'Natus explicabo Qui', 'Soluta quae sunt acc', '56', 'Veniam aut irure du', 'Exercitationem volup', 'In minima neque non ', 'Quasi laborum Ipsa', '78', 'Culpa qui id moles', 'img/67.jpg', NULL, 6, '0', 1, '2022-04-28 02:18:12', '2022-04-29 16:01:02', NULL),
('7', '7', 2, 'SUWANDI', 'SURABAYA', '2002-01-05', 'L', 'JL. ALAMAT PESERTA DIDIK 24 BLCOK A', 'ISLAM', 'KANDUNG', '1', '0831343837483', 'SDN NEGERI 1', '2', '2022-01-31', 'NAMA AYAH', 'NAMA IBU', 'JL. ALMAT ORTU', '031503433', 'WIRASWASTA', 'IBU RUMAH TANGGA', 'NAMA WALINYA', 'JL. WALI MURID', '031503412', 'SWASTA', 'img/7.jpg', NULL, 2, '1535001181', 1, '2022-04-26 12:05:22', '2022-05-21 18:31:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `semester`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2019-2022', '1', 0, '2022-04-28 06:44:26', '2022-04-29 02:27:17', NULL),
(2, '2021 - 2022', '2', 0, '2022-04-28 06:44:44', '2022-05-21 14:14:54', NULL),
(3, '2018 - 2019', '1', 0, '2022-04-29 02:26:36', '2022-04-29 02:26:36', NULL),
(4, '2021 - 2022', '1', 0, '2022-05-21 14:14:43', '2022-07-07 10:53:50', NULL),
(5, '2021-2022', '2', 1, '2022-07-07 10:54:03', '2022-07-07 10:54:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `siswa_id` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `siswa_id`, `status`, `created_at`, `updated_at`, `deleted_at`, `id_role`) VALUES
(1, 'admin', 'admin', '1', 1, NULL, NULL, NULL, 1),
(26, '1535010089', '1535010089', '1535010089', 1, '2022-05-07 00:30:35', '2022-05-07 06:06:14', NULL, 3),
(30, '085733502466', '085733502466', '085733502466', 1, '2022-07-09 11:12:20', '2022-07-09 11:12:20', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `emosi`
--
ALTER TABLE `emosi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matpel_detail`
--
ALTER TABLE `matpel_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raport_ekstra`
--
ALTER TABLE `raport_ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raport_matpel`
--
ALTER TABLE `raport_matpel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `emosi`
--
ALTER TABLE `emosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `raport`
--
ALTER TABLE `raport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `raport_ekstra`
--
ALTER TABLE `raport_ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `raport_matpel`
--
ALTER TABLE `raport_matpel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
