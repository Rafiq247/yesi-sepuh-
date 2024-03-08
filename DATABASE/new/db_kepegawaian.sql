-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 17.06
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `overtime` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `salary`, `overtime`) VALUES
(5, 'Kepala Projek Manager', 250000, 100000),
(6, 'Arsitek', 300000, 100000),
(7, 'Wakil Projek Manager', 200000, 80000),
(8, 'Kepala Pengawasan', 200000, 80000),
(9, 'Staf Pengawasan', 150000, 60000),
(10, 'CMO', 150000, 60000),
(11, 'Admin', 100000, 100000),
(12, 'Staff Marketing', 100000, 40000),
(13, 'OB', 100000, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaporan_absen`
--

CREATE TABLE `pelaporan_absen` (
  `id_pelaporan` int(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi_masalah` text NOT NULL,
  `file` text NOT NULL,
  `jenispelaporan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `waktu_lembur` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lembur`
--

INSERT INTO `tb_lembur` (`id_lembur`, `id_pegawai`, `date`, `waktu_lembur`, `status`) VALUES
(8, 'P-002', '2023-06-11', '20:00:00', 1),
(9, 'P-002', '2023-07-24', '20:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_payrol`
--

CREATE TABLE `tb_payrol` (
  `id_payrol` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `periode` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `gaji_lembur` double NOT NULL,
  `bonus` double NOT NULL,
  `keterangan` text NOT NULL,
  `gaji_bersih` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_kepegawaian` int(2) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_user`, `nama_pegawai`, `jekel`, `pendidikan`, `status_kepegawaian`, `agama`, `jabatan`, `no_hp`, `alamat`, `foto`, `ktp`, `tanggal_masuk`) VALUES
('P-002', 'U-002', 'fira venika', 'P', 'D3 MANAJAMEN INFORMATIKA', 1, 'Islam', '5', '08312232322', 'Rimbo data', 'toonmecom_ad8f15.jpeg', 'Krem_Abstrak_Bagan_Organisasi_Mahasiswa_Grafik.png', '2023-07-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presents`
--

CREATE TABLE `tb_presents` (
  `id_presents` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` int(2) NOT NULL,
  `foto_selfie_masuk` varchar(255) DEFAULT NULL,
  `foto_selfie_pulang` varchar(255) DEFAULT NULL,
  `keterangan_izin` text NOT NULL,
  `id_lembur` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_presents`
--

INSERT INTO `tb_presents` (`id_presents`, `id_pegawai`, `tanggal`, `waktu`, `keterangan`, `foto_selfie_masuk`, `foto_selfie_pulang`, `keterangan_izin`, `id_lembur`, `status`) VALUES
(102, 'P-002', '2023-07-23', '21:44:24', 2, '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y1.png', '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y11.png', '', NULL, 2),
(103, 'P-002', '2023-07-24', '21:46:34', 3, '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y12.png', '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y13.png', '', 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(260) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`) VALUES
('0', 'PT. SURYABUMI AGROLANGGENG', 'admin@gmail.com', 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1),
('U-002', 'fira venika', 'firavenika06@gmail.com', 'toonmecom_ad8f15.jpeg', '$2y$10$VpyaTQ92mT8.oj6fR.5e9enBCnoGwOkBLbpfLVfgve3eKM281INuy', 2, 1, 1690209672, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `pelaporan_absen`
--
ALTER TABLE `pelaporan_absen`
  ADD PRIMARY KEY (`id_pelaporan`);

--
-- Indeks untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indeks untuk tabel `tb_payrol`
--
ALTER TABLE `tb_payrol`
  ADD PRIMARY KEY (`id_payrol`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_presents`
--
ALTER TABLE `tb_presents`
  ADD PRIMARY KEY (`id_presents`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`temp`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelaporan_absen`
--
ALTER TABLE `pelaporan_absen`
  MODIFY `id_pelaporan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_payrol`
--
ALTER TABLE `tb_payrol`
  MODIFY `id_payrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_presents`
--
ALTER TABLE `tb_presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
