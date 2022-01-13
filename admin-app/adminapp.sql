-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2022 pada 18.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `id_pelatihan` bigint(20) UNSIGNED NOT NULL,
  `tglbooking` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `id_peserta`, `id_pelatihan`, `tglbooking`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-20', '2022-01-13 10:14:52', '2022-01-13 10:14:52'),
(2, 2, 2, '2020-01-20', '2022-01-13 10:15:25', '2022-01-13 10:15:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katagoris`
--

CREATE TABLE `katagoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namakatagori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `katagoris`
--

INSERT INTO `katagoris` (`id`, `namakatagori`, `created_at`, `updated_at`) VALUES
(1, 'offline class', '2022-01-05 12:28:23', '2022-01-05 12:28:23'),
(2, 'webinar', '2022-01-05 12:28:39', '2022-01-05 12:28:39'),
(3, 'online self', '2022-01-05 12:28:55', '2022-01-05 12:28:55'),
(4, 'learning', '2022-01-05 12:29:09', '2022-01-05 12:29:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_04_164424_create_users_table', 1),
(3, '2022_01_04_182131_create_peserta_table', 2),
(4, '2022_01_04_182954_create_katagori_table', 2),
(5, '2022_01_04_183221_create_peserta_table', 3),
(6, '2022_01_04_185250_create_pelatihan_table', 4),
(7, '2022_01_05_082557_create_peserta_table', 5),
(8, '2022_01_05_092514_create_pesertas_table', 6),
(9, '2022_01_05_095826_create_peserta_table', 7),
(10, '2022_01_05_100057_create_pesertas_table', 8),
(11, '2022_01_05_102220_create_katagoris_table', 9),
(12, '2022_01_05_102300_create_pelatihans_table', 9),
(13, '2022_01_05_135634_create_pesertas_table', 10),
(14, '2022_01_05_135740_create_katagoris_table', 11),
(15, '2022_01_05_140439_create_pesertas_table', 12),
(16, '2022_01_05_140507_create_katagoris_table', 12),
(17, '2022_01_05_140538_create_pelatihans_table', 12),
(18, '2022_01_05_204630_create_pelatihans_table', 13),
(19, '2022_01_06_090719_create_bookings_table', 14),
(20, '2022_01_06_091311_create_bookings_table', 15),
(21, '2022_01_13_140804_create_bookings_table', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_katagori` bigint(20) UNSIGNED NOT NULL,
  `namapelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglpelatihan` date NOT NULL,
  `lokasipelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelatihans`
--

INSERT INTO `pelatihans` (`id`, `id_katagori`, `namapelatihan`, `tglpelatihan`, `lokasipelatihan`, `created_at`, `updated_at`) VALUES
(1, 1, 'class', '2022-01-06', 'Jakarta Timur', '2022-01-05 15:29:20', '2022-01-06 02:00:14'),
(2, 2, 'web', '2020-01-20', 'Malang', '2022-01-13 10:13:31', '2022-01-13 10:13:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namapeserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesertas`
--

INSERT INTO `pesertas` (`id`, `namapeserta`, `email`, `jeniskelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'satya', 'satyapradana98@gmail.com', 'Laki-laki', 'Malang', '2022-01-05 10:44:04', '2022-01-05 10:44:21'),
(2, 'ahmad', 'ahmad@gmail.com', 'Laki-laki', 'Malang', '2022-01-13 10:14:08', '2022-01-13 10:14:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$10$yxSj/cM5B4VdnwbqRdeH/e4sQ9Xe1G2jmSrYW4Vc5bM32nnhchi16', 'weEe9ybqNVDOybesn2v33xFKqoOPTx7rYUUihevUUWxF3vOdAAv7BU41XnQo', '2022-01-04 09:48:57', '2022-01-04 09:48:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_id_peserta_foreign` (`id_peserta`),
  ADD KEY `bookings_id_pelatihan_foreign` (`id_pelatihan`);

--
-- Indeks untuk tabel `katagoris`
--
ALTER TABLE `katagoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihans_id_katagori_foreign` (`id_katagori`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
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
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `katagoris`
--
ALTER TABLE `katagoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_id_pelatihan_foreign` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihans` (`id`),
  ADD CONSTRAINT `bookings_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id`);

--
-- Ketidakleluasaan untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD CONSTRAINT `pelatihans_id_katagori_foreign` FOREIGN KEY (`id_katagori`) REFERENCES `katagoris` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
