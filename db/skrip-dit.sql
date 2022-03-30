-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2022 pada 16.40
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
-- Database: `skrip-dit`
--

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
(1, 'PRAMUKA', '2022-03-23 13:39:27', '2022-03-23 13:39:27', '2022-03-23 07:39:27'),
(2, 'AS 2', '2022-03-23 07:50:29', '2022-03-23 13:50:38', '2022-03-23 07:50:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nm_kelas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nm_kelas`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VII A', '1', '2022-03-04 07:51:55', '2022-03-23 13:10:33', NULL),
(2, 'VII B', '1', '2022-03-04 02:23:45', '2022-03-23 13:10:37', NULL),
(3, 'VII C', '1', '2022-03-23 12:52:12', '2022-03-23 13:10:41', NULL),
(4, 'SA', '1', '2022-03-23 07:46:42', '2022-03-23 13:46:45', '2022-03-23 07:46:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matpel`
--

CREATE TABLE `matpel` (
  `id` int(11) NOT NULL,
  `nm_pelajaran` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kelompok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matpel`
--

INSERT INTO `matpel` (`id`, `nm_pelajaran`, `deskripsi`, `kelompok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAHASA INDONESIA', 'Deskripis pelajaran bahasa indonesia', 'umum', '2022-03-23 13:11:55', '2022-03-23 13:21:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matpel_detail`
--

CREATE TABLE `matpel_detail` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `matpel_id` int(11) DEFAULT NULL,
  `kkm` int(11) DEFAULT NULL,
  `kelompok` varchar(2) DEFAULT NULL,
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
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
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
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `kelas_id`, `nm_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `status_dalam_keluarga`, `anak_ke`, `tlp`, `sekolah_asal`, `diterima_dikelas`, `diterima_tgl`, `nm_ayah`, `nm_ibu`, `alamat_ortu`, `tlp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nm_wali`, `alamat_wali`, `tlp_wali`, `pekerjaan_wali`, `reff_passfoto`, `original_passfoto`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1535010081, 1, 1, 'NENDRA WONO', 'MAGETAN', '0000-00-00', 'L', 'Jl. Krukah Lama 2/21', 'islam', 'kandung', '1', '0315024395', 'SDN NEGERI 1', 'VII A', NULL, 'BAPAK', 'IBUK', 'JL. GUBAIR', '0853433232', 'WIRASWASTA', 'IBU RUMAH TANGGA', '', NULL, NULL, NULL, 'https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png', 'https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png', 1, '2022-03-23 13:57:04', '2022-03-23 14:19:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`, `id_role`) VALUES
(1, 'wono', 'wono123', 1, '0000-00-00 00:00:00', '2022-02-01 13:09:19', NULL, NULL),
(14, 'ew', 'wer', 1, NULL, '2022-02-01 14:26:26', '2022-02-01 08:26:26', NULL),
(15, 'colk1', 'Pa$$w0rd!', 1, NULL, '2022-02-01 09:54:56', NULL, NULL),
(16, 'sd', 'we', 1, NULL, '2022-02-01 15:55:42', '2022-02-01 09:55:42', NULL),
(17, 'WONO', 'kKRI FATAHILAH 245', 1, '2022-02-01 07:24:34', '2022-02-01 07:24:34', NULL, NULL),
(18, 'WONO', 'kKRI FATAHILAH 245', 1, '2022-02-01 07:24:57', '2022-02-01 15:12:07', '2022-02-01 09:12:07', NULL),
(19, 'rysikatel', 'Pa$$w0rd!', 1, '2022-02-01 07:45:03', '2022-02-01 07:45:03', NULL, NULL),
(20, '', '', 1, '2022-02-01 08:45:27', '2022-02-01 15:11:15', '2022-02-01 09:11:15', NULL),
(21, '', '', 1, '2022-02-01 08:46:32', '2022-02-01 15:11:11', '2022-02-01 09:11:11', NULL),
(22, 'ruwemegy', 'Pa$$w0rd!', 1, '2022-02-01 09:11:03', '2022-02-01 09:11:03', NULL, NULL),
(23, 'welasodot', 'Pa$$w0rd!', 1, '2022-02-01 09:11:23', '2022-02-01 15:11:33', '2022-02-01 09:11:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
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
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
