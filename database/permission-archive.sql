-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2022 pada 19.14
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
-- Database: `permission-archive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_barang`
--

CREATE TABLE `db_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `barang_masuk` varchar(128) NOT NULL,
  `barang_ng` varchar(128) DEFAULT NULL,
  `barang_keluar` varchar(128) DEFAULT NULL,
  `dc_barang_masuk` datetime DEFAULT NULL,
  `dc_barang_keluar` datetime DEFAULT NULL,
  `status_1` varchar(128) DEFAULT NULL,
  `status_2` varchar(128) DEFAULT NULL,
  `status_3` varchar(128) DEFAULT NULL,
  `status_4` varchar(128) DEFAULT NULL,
  `is_read` int(1) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_request_edit` datetime DEFAULT NULL,
  `date_request_delete` datetime DEFAULT NULL,
  `pesan_request_edit` text DEFAULT NULL,
  `pesan_request_delete` text DEFAULT NULL,
  `dc_approved1` datetime DEFAULT NULL,
  `dc_approved2` datetime DEFAULT NULL,
  `dc_approved3` datetime DEFAULT NULL,
  `dc_approved4` datetime DEFAULT NULL,
  `dc_reject1` datetime DEFAULT NULL,
  `dc_reject2` datetime DEFAULT NULL,
  `dc_reject3` datetime DEFAULT NULL,
  `dc_reject4` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_barang`
--

INSERT INTO `db_barang` (`id_barang`, `kode_barang`, `nama_barang`, `barang_masuk`, `barang_ng`, `barang_keluar`, `dc_barang_masuk`, `dc_barang_keluar`, `status_1`, `status_2`, `status_3`, `status_4`, `is_read`, `date_created`, `date_request_edit`, `date_request_delete`, `pesan_request_edit`, `pesan_request_delete`, `dc_approved1`, `dc_approved2`, `dc_approved3`, `dc_approved4`, `dc_reject1`, `dc_reject2`, `dc_reject3`, `dc_reject4`) VALUES
(1, 'B1', 'Bangku', '10', '5', '5', '2022-10-30 00:25:00', '2022-10-30 00:36:51', NULL, NULL, NULL, NULL, 1, '2022-10-30 00:25:40', '2022-10-30 00:29:25', NULL, 'ada barang ng', NULL, '2022-10-30 00:36:13', '2022-10-30 00:36:17', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'A100', 'Kipas', '15', NULL, '15', '2022-10-30 01:27:00', NULL, 'Approved', 'Pending', NULL, NULL, 0, '2022-10-30 01:27:35', '2022-10-31 08:35:33', '2022-10-30 03:41:50', 'edit', 'kepengen ajh', '2022-10-30 04:00:30', '2022-10-31 05:00:50', '2022-11-14 01:02:43', '2022-10-31 05:00:55', NULL, NULL, '2022-10-30 04:00:44', NULL),
(3, '09', 'Kursi', '1', NULL, '1', '2022-11-12 01:48:00', '2022-11-14 01:03:17', 'Pending', 'Pending', NULL, NULL, 1, '2022-11-12 01:48:19', '2022-11-12 01:48:38', NULL, 'tes', NULL, '2022-11-12 02:08:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_exit`
--

CREATE TABLE `db_exit` (
  `id_exit` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `barang_masuk` varchar(128) NOT NULL,
  `barang_ng` varchar(128) DEFAULT NULL,
  `barang_keluar` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL,
  `dc_barang_masuk` datetime NOT NULL,
  `dc_barang_keluar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_exit`
--

INSERT INTO `db_exit` (`id_exit`, `id_barang`, `kode_barang`, `nama_barang`, `barang_masuk`, `barang_ng`, `barang_keluar`, `date_created`, `dc_barang_masuk`, `dc_barang_keluar`) VALUES
(4, 2, 'A100', 'Kipas', '15', NULL, '15', '2022-10-30 01:27:35', '2022-10-30 01:27:00', '2022-10-31 04:23:45'),
(5, 2, 'A100', 'Kipas', '15', NULL, '15', '2022-10-30 01:27:35', '2022-10-30 01:27:00', '2022-11-11 23:57:37'),
(6, 3, '09', 'Kursi', '1', NULL, '1', '2022-11-12 01:48:19', '2022-11-12 01:48:00', '2022-11-14 01:03:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Super_Admin'),
(2, 'Direktur'),
(3, 'Manajer'),
(4, 'Admin'),
(5, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `last_logged_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `email`, `image`, `username`, `password`, `id_role`, `is_active`, `created_at`, `last_logged_on`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 'Rosenthal.jpeg', 'super-admin', '$2y$10$YJ7SD7jHsO/hLT8G8fqkD.wcej766MFsKVUCakQdKuBO/BOGa3hiS', 1, 1, '2022-10-21', '2022-11-14 01:13:41'),
(2, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$gGLnbIb4sUSN9v8btlJL0Oekpon9VsuG5Y6iLtDRhTrGmNdQoWvm2', 2, 1, '2022-10-21', '2022-11-14 01:02:27'),
(3, 'User', 'user@gmail.com', NULL, 'user', '$2y$10$SO./nTC58tamiVZX8vbc3e0jHfLp5l3x4kjodAmHiuX9xcIEu7sLm', 3, 1, '2022-10-21', '2022-10-27 00:52:02'),
(4, 'Client', 'client@gmail.com', NULL, 'client', '$2y$10$GhkobZwAgmm5QdmBiiPg4eW96O3SgIWvlG4uqywY4qmzeztW99Ms6', 4, 1, '2022-10-21', '2022-10-31 08:35:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(5, 2, 2),
(8, 4, 3),
(25, 1, 5),
(26, 4, 4),
(31, 1, 2),
(32, 1, 3),
(33, 1, 4),
(34, 3, 2),
(35, 2, 4),
(36, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Super_Admin'),
(2, 'Management'),
(3, 'Admin'),
(4, 'User_Access'),
(5, 'Menu'),
(12, 'tes123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Users Management', 'super_admin', 'fas fa-fw fa-user-tie', 1),
(2, 1, 'Role', 'super_admin/role', 'fas fa-fw fa-user-edit', 1),
(10, 2, 'Dashboard', 'management', 'fas fa-fw fa-tachometer-alt', 1),
(11, 2, 'Data Barang Masuk', 'management/dataBarangMasuk', 'fas fa-fw fa-chalkboard', 1),
(12, 2, 'Data Barang Keluar', 'management/dataBarangKeluar', 'fas fa-fw fa-user-edit', 1),
(13, 2, 'Waiting Request Edit', 'management/waitingRequestEdit', 'fas fa-fw fa-user-edit', 1),
(14, 2, 'Waiting Request Delete', 'management/waitingRequestDelete', 'fas fa-fw fa-user-times', 1),
(15, 2, 'All Archive Data', 'management/viewAllArchiveData', 'fas fa-fw fa-box', 1),
(20, 3, 'Home', 'admin', 'fas fa-fw fa-home', 1),
(21, 3, 'Data Barang Masuk', 'admin/dataBarangMasuk', 'fas fa-fw fa-chalkboard', 1),
(22, 3, 'Data Barang Keluar', 'admin/dataBarangKeluar', 'fas fa-fw fa-user-edit', 1),
(23, 3, 'Request Edit Archive', 'admin/requestEditArchive', 'fas fa-fw fa-pen-square', 1),
(24, 3, 'Request Delete Archive', 'admin/requestDeleteArchive', 'fas fa-fw fa-window-close', 1),
(25, 3, 'Archive Data', 'admin/viewArsip', 'fas fa-fw fa-archive', 1),
(30, 4, 'Edit Profile', 'user_access/editProfile', 'fas fa-fw fa-user-edit', 1),
(31, 4, 'Last Logged', 'user_access/lastLoggedOn', 'fas fa-fw fas fa-user-clock', 1),
(32, 4, 'Change Password', 'user_access/changePassword', 'fas fa-fw fa-key', 1),
(36, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(37, 5, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(12, 'kira312.hy@gmail.com', '/k84orG9gf0CqrbXc7YeuQiYzFy8KcoVRsJrf5LbAGs=', 1667777927),
(13, 'kira312.hy@gmail.com', 'zJ1wP3vHbZu1meKvK95+NTeO5v8igDynpBMz6PS/XkA=', 1667777982);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_barang`
--
ALTER TABLE `db_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `db_exit`
--
ALTER TABLE `db_exit`
  ADD PRIMARY KEY (`id_exit`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_barang`
--
ALTER TABLE `db_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_exit`
--
ALTER TABLE `db_exit`
  MODIFY `id_exit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
