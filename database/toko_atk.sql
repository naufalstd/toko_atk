-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 19.06
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_atk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `id_kategori`, `nama_barang`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, '1', 'Amplop  Coklat', 'Amplop  Coklat.jpg', 'Amplop polos ukuran  F4 (240 x 340 mm) isi 100 Lembar, berat satu pak 1.500 gram', '2021-07-24 11:16:56', '2021-07-24 11:16:56'),
(8, '1', 'Amplop CD', 'Amplop CD.png', 'Amplop CD/DVD 100 grm isi 100 lembar. Ukuran 12,5 x 12,5 cm. Bahan kertas HVS 100gsm.', '2021-07-24 11:17:28', '2021-07-24 11:17:28'),
(9, '1', 'Amplop coklat', 'Amplop coklat.jpg', 'Amplop coklat non seal ukuran A4 (22 x 30 cm). Ketebalan 80 gsm. Isi perpack 100 lembar. Berat satu pak 660 gram', '2021-07-24 11:18:18', '2021-07-24 11:18:18'),
(10, '1', 'Amplop KF', 'Amplop KF.png', 'ukuran A3 (30X42cm)  isi 100 Lembar', '2021-07-24 11:19:02', '2021-07-24 11:21:55'),
(11, '1', 'Amplop KF', 'Amplop KF.png', 'Ukuran Folio  23,8 cm x 34 cm   isi 100 lembar', '2021-07-24 11:19:37', '2021-07-24 11:22:38'),
(12, '1', 'Amplop KF (110x230mm)', 'Amplop KF (110x230mm).png', 'Ukuran 110x230mm isi 100 Lembar', '2021-07-24 11:20:40', '2021-07-24 11:23:22'),
(13, '1', 'Buku Tulis Besar', 'Buku Tulis Besar.jpg', 'Buku tulis ukuran folio, isi 100 lembar', '2021-07-24 11:21:14', '2021-07-24 11:21:14'),
(14, '1', 'Buku Tulis ukuran folio', 'Buku Tulis ukuran folio.jpg', 'Ukuran Folio (215 x 330 mm), Hard Cover, isi 100 lembar, 1 pcs 850 gram', '2021-07-24 11:24:15', '2021-07-24 11:24:15'),
(15, '1', 'Continous form', 'Continous form.jpg', 'Kertas komputer rangkap 4 lembar. Ukuran kertas 9,5\" x 11\" (dibagi 2).  Isi box: 4 x 1000 set. Warna kertas: Putih, Merah, Kuning, Hijau. 4 ply NCR', '2021-07-24 11:24:46', '2021-07-24 11:24:46'),
(16, '2', 'Batrai 9 Volt', 'Batrai 9 Volt.jpg', 'Baterai 9 volt. Berbentuk persegi 6LR61, berat 90 gram', '2021-07-24 16:11:54', '2021-07-24 16:11:54'),
(17, '2', 'Calculator', 'Calculator.png', 'Calculator seri/tipe SDC-867 Kalkulator Meja Office Desktop dengan 12 digit. Dimensi: 45 x 150 x 151 mm.', '2021-07-24 16:12:22', '2021-07-24 16:12:22'),
(18, '2', 'Mouse Wireless M331', 'Mouse Wireless M331.png', 'Koneksi wireless 2,4 GHz, jangkauan wireless 10 meter, menggunakan baterai AAx1, 1000 DPI,', '2021-07-24 16:13:29', '2021-07-24 16:13:29'),
(19, '2', 'Tinta stempel', 'Tinta stempel.png', 'Isi tinta stempel warna biru merk volume 50 ml', '2021-07-24 16:14:19', '2021-07-24 16:14:19'),
(20, '2', 'Connector HDMI', 'Connector HDMI.png', '\"Kabel Monitor LCD HDMI to HDMI  Panjang 1.5 M\"', '2021-07-24 16:14:47', '2021-07-24 16:14:47'),
(21, '3', 'Box file', 'Box file.jpg', '\"Bahan PVC tipe 1034B-01. Ukuran A4 dan F4   Size jumbo lebar 10 cm \"', '2021-07-24 16:15:25', '2021-07-24 16:15:25'),
(22, '3', 'Bussines File', 'Bussines File.png', 'Map plastik tipe busines file 940 snelhekter. 1 pak berisi 12 pcs. Ukuran A4 dab F4', '2021-07-24 16:16:09', '2021-07-24 16:16:09'),
(23, '3', 'Foolscap Suspension file', 'Foolscap Suspension file.png', 'Ukuran : Folio, penahan kertas karton, model no. 3470', '2021-07-24 16:17:09', '2021-07-24 16:17:09'),
(24, '3', 'Ordner', 'Ordner.jpg', 'Lever Arch File Ordner berbahan PVC, model no. 1450V. Ukuran A4, lebar punggung 7cm.', '2021-07-24 16:17:47', '2021-07-24 16:17:47'),
(25, '3', 'Stopmap folio', 'Stopmap folio.png', 'Berbahan karton biasa, 1 pak isi 50 buah. Ukuran F4 dan A4', '2021-07-24 16:18:20', '2021-07-24 16:18:20'),
(26, '4', 'Bubble Wrap', 'Bubble Wrap.jpg', 'Plastik pelindung barang mudah pecah. Ukuran diameter gelembung 1 cm. Ukuran lebar plastik 30 cm dan panjang gulungan 50 meter', '2021-07-24 16:19:00', '2021-07-24 16:19:00'),
(27, '4', 'Cairan penghapus', 'Cairan penghapus.jpg', 'Cairan penghapus dengan model kuas, Art no. 9200, berat 50 gram', '2021-07-24 16:19:33', '2021-07-24 16:19:33'),
(28, '4', 'Gunting kertas', 'Gunting kertas.jpg', 'Ukuran produk : panjang 16 cm x lebar 6 cm. Stainless steel material. Berat 75 gram. Tipe SC-838', '2021-07-24 16:20:45', '2021-07-24 16:20:45'),
(29, '4', 'Snowman OPF', 'Snowman OPF.png', 'Spidol OPF Hitam, 1 Box 12 Pcs', '2021-07-24 16:21:26', '2021-07-24 16:21:26'),
(30, '4', 'Tempat Pensil Meja Besi', 'Tempat Pensil Meja Besi.png', 'Tempat pensil untuk diletakkan di meja. Bermaterial atau berbahan besi. Berukuran 7x7x9 cm', '2021-07-24 16:22:03', '2021-07-24 16:22:03'),
(31, '5', 'Pel', 'Pel.jpg', 'Mop memiliki gagang aluminium yang ringan dan kuat. Lengkap dengan bahan sumbu. Panjang sumbu : 12 cm, panjang gagang : 110 cm (dengan double drat)', '2021-07-24 16:22:40', '2021-07-24 16:22:40'),
(32, '5', 'Sabun cuci piring', 'Sabun cuci piring.jpg', 'Sabun cuci piring kemasan berbahan dasar jeruk nipis agar telrlihat lebih kinclong, Bevolume755ml,', '2021-07-24 16:23:20', '2021-07-24 16:23:20'),
(33, '5', 'Sapu & Pengki', 'Sapu & Pengki.jpg', '1 set (sapu dan pengki). Sapu berbahan nilon, panjanga gagang sapu dan pengki 75 cm', '2021-07-24 16:23:44', '2021-07-24 16:23:44'),
(34, '5', 'Tempat sampah', 'Tempat sampah.jpg', 'tempat sampah berkapasitas 10 liter. Dim : 260 x H 265 mm. Ctn Dim : 560 x 515 x 686 mm', '2021-07-24 16:24:06', '2021-07-24 16:24:06'),
(35, '5', 'Tissue', 'Tissue.png', 'Tissue wajah Nice 250 sheet, 2 ply', '2021-07-24 16:24:36', '2021-07-24 16:24:36'),
(36, '6', 'File Cabinet', 'File Cabinet.png', 'Dua pintu geser. Dimensi luar: 400 (L) x 900 (W) x 1850 (H). Dimensi dalam : 380 (L) x 850 (W) x 1775 (H)', '2021-07-24 16:25:41', '2021-07-24 16:25:41'),
(37, '6', 'Kursi Kerja', 'Kursi Kerja.jpg', 'Kursi no. Model 848 X. Berbahan oscar/fabric dan plastik, rangka kaki terbuat dari plastik, sandaran kursi TC (Tilting control), gaslift hydrolic, warna hitam', '2021-07-24 16:26:01', '2021-07-24 16:26:01'),
(38, '6', 'Meja rapat', 'Meja rapat.png', 'Meja rapat bundar model DMTP. Ukuran diameter 120 cm, tinggi 75 cm. Tebal top table : 25 mm.warna melamine : Maple-white.  Profil meja : soft forming duck nose. Profil kaki meja : partikel bo', '2021-07-24 16:26:19', '2021-07-24 16:26:19'),
(39, '6', 'White Board', 'White Board.png', 'Papan tulis putih, ukuran 40 x 60 cm. Terdapat pen gantung. Tempat penghapus aluminium.', '2021-07-24 16:26:44', '2021-07-24 16:26:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoris`
--

CREATE TABLE `categoris` (
  `id_kategori` int(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categoris`
--

INSERT INTO `categoris` (`id_kategori`, `keterangan`) VALUES
(1, 'Kertas, Amplop, Buku'),
(2, 'Tinta Printer & Elektronik'),
(3, 'Ordner, Boxfile, Map, dll'),
(4, 'ATK'),
(5, 'Keperluan Umum'),
(6, 'Kelengkapan Sarana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_14_025419_create_barangs_table', 1),
(6, '2021_04_14_025518_create_pesanans_table', 2),
(7, '2021_04_14_025704_create_pesanan_details_table', 2),
(8, '2021_06_07_155927_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('naufal@gmail.com', '$2y$10$spOxzJa5.tUAG6Y/5c4vlep6xDwQntxpUB7k384XZR1zpPgiThcc2', '2021-04-13 23:25:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_awal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noted` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksiatasans`
--

CREATE TABLE `transaksiatasans` (
  `id` int(10) NOT NULL,
  `id_atasan` int(10) NOT NULL,
  `id_bawahan` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksiatasans`
--

INSERT INTO `transaksiatasans` (`id`, `id_atasan`, `id_bawahan`, `created_at`, `updated_at`) VALUES
(1, 0, 4, '2021-07-24 16:34:37', '2021-07-24 16:34:37'),
(2, 6, 6, '2021-07-24 16:38:33', '2021-07-24 16:38:33'),
(6, 13, 13, '2021-07-24 16:40:39', '2021-07-24 16:40:39'),
(7, 3, 4, '2021-07-24 16:34:51', '2021-07-24 16:34:51'),
(8, 5, 6, '2021-07-24 16:40:09', '2021-07-24 16:40:09'),
(9, 15, 15, '2021-07-24 16:40:56', '2021-07-24 16:40:56'),
(10, 0, 9, '2021-07-24 16:41:01', '2021-07-24 16:41:01'),
(11, 0, 2, '2021-07-24 16:47:13', '2021-07-24 16:47:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dana` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `dana`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@kimiafarma.co.id', 'admin', '', NULL, '$2y$10$kUWqCmuFe9u8qRh7Q5aQAOTfU2pJah.9..iKbATZkpS8cN8bwmWte', NULL, NULL, NULL, NULL, '2021-07-24 16:47:13'),
(5, 'Atasan IT', 'atasanit@kimiafarma.co.id', 'atasan', '', NULL, '$2y$10$KMpMYJ.vaKJUNMhx2lzE3u12zKlnqoDlYVi7lUf8MEu2FFeRuFF3S', NULL, NULL, NULL, NULL, '2021-07-24 16:40:09'),
(6, 'Unit IT', 'unitit@kimiafarma.co.id', 'user', '100000', NULL, '$2y$10$v0jjExrgx3hTTUJD4qd/wOGDxDbExXwSF0sLusGtYeSHIaqg1oEhK', NULL, NULL, NULL, NULL, '2021-07-24 16:38:33'),
(9, 'Unit HC', 'unithc@kimiafarma.co.id', 'user', '95000', NULL, '$2y$10$y91K0WAREmlpTpUxguSTzusmwbSdGuTSDm1PXETTqTO0H4U8C5wti', NULL, NULL, NULL, '2021-07-12 13:37:32', '2021-07-24 16:41:01'),
(13, 'Atasan HC', 'atasanhc@kimiafarma.co.id', 'atasan', '', NULL, '$2y$10$/QwdsAR.tjUUs6QDAi8NeOPLKMQI7vXQNZKpRBPS.bSdEr1jp/L76', NULL, NULL, NULL, '2021-07-15 03:45:50', '2021-07-24 16:40:39'),
(14, 'Unit Umum', 'unitumum@kimiafarma.co.id', 'user', '', NULL, '$2y$10$CpFyMt61EwoSNCZrRxbMZOKPQX.VEn.fRpITu9XKi4kEOnd3epbBm', NULL, NULL, NULL, '2021-07-24 16:35:23', '2021-07-24 16:35:51'),
(15, 'Atasan Umum', 'atasanumum@kimiafarma.co.id', 'atasan', '', NULL, '$2y$10$81YdC8mQiCcF0gAaTVkoJedonu3h.fBLPPYh2HOtB6OZRKPNRQXyS', NULL, NULL, NULL, '2021-07-24 16:35:41', '2021-07-24 16:40:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `transaksiatasans`
--
ALTER TABLE `transaksiatasans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `categoris`
--
ALTER TABLE `categoris`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksiatasans`
--
ALTER TABLE `transaksiatasans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
