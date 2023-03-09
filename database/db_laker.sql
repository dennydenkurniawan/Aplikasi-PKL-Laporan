-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2023 pada 04.15
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_adminpetugas`
--

CREATE TABLE `akun_adminpetugas` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_adminpetugas`
--

INSERT INTO `akun_adminpetugas` (`id`, `nama`, `username`, `password`, `level`) VALUES
('1', 'Admin', 'admin', '123', 'admin'),
('2', 'Johan Fatony', 'tony', '123', 'petugas'),
('4', 'Ramadhan', 'rama', '123', 'petugas'),
('63ee390ce1531', 'Ajai', 'ajai', '123', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_masyarakat`
--

CREATE TABLE `akun_masyarakat` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `level` enum('masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_masyarakat`
--

INSERT INTO `akun_masyarakat` (`id`, `nama`, `ttl`, `alamat`, `no_telp`, `username`, `password`, `level`) VALUES
('63ee30fc10736', 'Alda Widia Putri', 'Penajam, 23-05-2001', 'Penajam, Kal-Tim', '08223344551', 'alda', '123', 'masyarakat'),
('63f2f3d7728e4', 'Mursiah', 'Marabahan, 12-Januari-2023', 'Ulu Benteng ', '08223344551', 'mursiah', '123', 'masyarakat'),
('63f4c2d9c0fca', 'Hilma Azizah', 'Banjarmasin, 11 November 2000', 'Jl. Jendral Sudirman', '08225597828', 'hilma', '124314sa', 'masyarakat'),
('63f4c47ca22a3', 'Jihan Hayati', 'Amuntai, 8 November 2000', 'Jl. Jendral Sudirman', '082255814771', 'jihan', '2466dew', 'masyarakat'),
('63f4c753ea581', 'Emilia Putri', 'Marabahan, 11 November 2000', 'Jl. Jendral Sudirman', '082255814744', 'emil', '12312ss', 'masyarakat'),
('64081067a1b75', 'Lailan', 'Marabahan, 11 November 2000', 'Jl. Jendral Sudirman', '08223344551', 'elan2', '123', 'masyarakat'),
('640937582cb41', 'test', 'test', 'test', '082255814774', 'tes', '123', 'masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasus`
--

CREATE TABLE `tb_kasus` (
  `id` varchar(50) NOT NULL,
  `no_reg` varchar(50) NOT NULL,
  `tgl_lapor` date DEFAULT NULL,
  `tgl` date NOT NULL,
  `kronologi` varchar(1000) NOT NULL,
  `alamat_kej` varchar(1000) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `id_input` varchar(50) NOT NULL,
  `status` enum('masuk','diterima','ditolak') DEFAULT NULL,
  `progress` enum('belum','selesai') NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kasus`
--

INSERT INTO `tb_kasus` (`id`, `no_reg`, `tgl_lapor`, `tgl`, `kronologi`, `alamat_kej`, `provinsi`, `kabupaten`, `kecamatan`, `id_input`, `status`, `progress`, `date_created`, `last_edited`) VALUES
('63f4b8f589971', '094/001/UPTD.PPA/2023', '2023-02-21', '2023-02-20', 'Sering dipukuli suami', 'Jl. Merintis No.01', 'Kalimantan Selatan', 'Barito Kuala', 'Marabahan', '63ee30fc10736', 'diterima', 'selesai', '2023-02-21 20:28:37', NULL),
('63f4bda5520db', '-', '2023-03-20', '2023-03-19', 'Anak hilang setelah bertengkar, sampai sekarang tak kunjung kembali', 'Jl. Jogja No.05', 'Kalimantan Selatan', 'Barito Kuala', 'Alalak', '63ee30fc10736', 'masuk', 'belum', '2023-02-21 20:48:37', NULL),
('63f4be18e9938', '094/002/UPTD.PPA/2023', '2023-03-18', '2023-03-17', 'Dimarahi Mertua', 'Jl. Malang No.3', 'Kalimantan Selatan', 'Barito Kuala', 'Anjir Muara', '63ee30fc10736', 'diterima', 'selesai', '2023-02-21 20:50:32', NULL),
('63f4be889a436', '094/004/UPTD.PPA/2023', '2023-03-04', '2023-03-03', 'Selalu di marahi Istri', 'Jl. Jepang No.03', 'Kalimantan Selatan', 'Barito Kuala', 'Bakumpai', '63ee30fc10736', 'diterima', 'selesai', '2023-02-21 20:52:24', NULL),
('63f4c198a9744', '-', '2023-02-22', '2023-02-21', 'Di Tikam Orang tak dikenal', 'Jl. Semarang No.02', 'Kalimantan Selatan', 'Barito Kuala', 'Barambai', '63f2f3d7728e4', 'masuk', 'belum', '2023-02-21 21:05:28', NULL),
('63f4c1c040bdf', '-', '2023-02-21', '2023-02-20', 'Di Culik Orang', 'Jl. Maluku', 'Kalimantan Selatan', 'Barito Kuala', 'Belawang', '63f2f3d7728e4', 'ditolak', 'belum', '2023-02-21 21:06:08', NULL),
('63f4c35734477', '094/005/UPTD.PPA/2023', '2023-01-22', '2023-01-21', 'Di pukul orang tidak diketahui', 'Jl. Magelang No. 09', 'Kalimantan Selatan', 'Barito Kuala', 'Cerbon', '63f4c2d9c0fca', 'diterima', 'selesai', '2023-02-21 21:12:55', NULL),
('63f4c389e79e9', '-', '2023-01-19', '2023-01-18', 'Di Bully teman', 'Jl. Mandastana No.04', 'Kalimantan Selatan', 'Barito Kuala', 'Kuripan', '63f4c2d9c0fca', 'ditolak', 'belum', '2023-02-21 21:13:45', NULL),
('63f4c57b2d01b', '094/003/UPTD.PPA/2023', '2023-03-15', '2023-03-15', 'DIbully Teman Sekelas', 'Jl. Anggur No.04', 'Kalimantan Selatan', 'Barito Kuala', 'Mandastana', '63f4c47ca22a3', 'diterima', 'selesai', '2023-02-21 21:22:03', NULL),
('63f4c5a3679e1', '-', '2023-02-18', '2023-02-15', 'Di Kucilkan Keuarga', 'Jl. Jambu No.7', 'Kalimantan Selatan', 'Barito Kuala', 'Mekarsari', '63f4c47ca22a3', 'masuk', 'belum', '2023-02-21 21:22:43', NULL),
('63f4c77df2923', '-', '2022-06-06', '2022-06-05', 'Di Pukuli Teman', 'Jl. Wangkang No.4', 'Kalimantan Selatan', 'Barito Kuala', 'Rantau Badauh', '63f4c753ea581', 'ditolak', 'belum', '2023-02-21 21:30:37', NULL),
('63f4c7b2033d7', '-', '2022-06-04', '2022-06-03', 'Di pukuli tetangga', 'Jl. Singkong No.9', 'Kalimantan Selatan', 'Barito Kuala', 'Tabukan', '63f4c753ea581', 'ditolak', 'belum', '2023-02-21 21:31:30', NULL),
('63f5e8779e22e', '-', '2012-02-21', '2012-02-20', 'Dijambret Preman', 'Jl. Simpang Siur', 'Kalimantan Selatan', 'Barito Kuala', 'Tabukan', '63f4c753ea581', 'masuk', 'belum', '2023-02-22 18:03:35', NULL),
('63f5e8a13fa22', '-', '2022-09-09', '2022-09-08', 'Dianiaya Mertua', 'Jl. Lidah Buaya', 'Kalimantan Selatan', 'Barito Kuala', 'Tamban', '63f4c753ea581', 'ditolak', 'belum', '2023-02-22 18:04:17', NULL),
('640810a597a25', '-', '2023-03-08', '2023-03-01', 'Istri saya sering dianiaya tetangga sebelah rumah', 'Jl. Jendral Sudirman NO 11', 'Kalimantan Selatan', 'Barito Kuala', 'Marabahan', '64081067a1b75', 'masuk', 'belum', '2023-03-08 12:35:49', NULL),
('64093773ec1a6', '094/0099/UPTD.PPA/2023', '2023-03-09', '2023-03-09', 'tests', 'tes', 'Kalimantan Selatan', 'Barito Kuala', 'Alalak', '640937582cb41', 'diterima', 'belum', '2023-03-09 09:33:39', '2023-03-09 09:34:39'),
('64094dbed923b', '', '2023-03-15', '2023-03-21', '', '', 'Kalimantan Selatan', 'Barito Kuala', 'Alalak', '1', 'diterima', 'belum', '2023-03-09 11:08:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_korban`
--

CREATE TABLE `tb_korban` (
  `id_korban` varchar(50) NOT NULL,
  `id_kasus` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jns_kelamin` enum('perempuan','laki-laki') NOT NULL,
  `pendidikan` enum('na','sd','sltp','slta','pt','tk','tdk_sekolah','') NOT NULL,
  `pekerjaan` enum('na','swasta','pegawai','pedagang','irt','tdk_bekerja','pelajar') NOT NULL,
  `status_perkawinan` enum('na','kawin','cerai','belum') NOT NULL,
  `tindak_kekerasan` enum('fisik','psikis','seksual','exploitasi','penelantaran','lainnya') NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_korban`
--

INSERT INTO `tb_korban` (`id_korban`, `id_kasus`, `nama`, `tgl_lahir`, `alamat`, `jns_kelamin`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `tindak_kekerasan`, `date_created`, `last_edited`) VALUES
('63f4bf3b965a3', '63f4be18e9938', 'Alda Anatasya', '2001-05-23', 'Jl. Manggis No 02', 'perempuan', 'pt', 'swasta', 'kawin', 'psikis', '2023-02-21 20:55:23', NULL),
('63f4bf974d6b8', '63f4be4e891f7', 'Denny kurniawan', '2000-11-11', 'Jl. Sudirman No.11', 'laki-laki', 'pt', 'pegawai', 'kawin', 'psikis', '2023-02-21 20:56:55', NULL),
('63f4bff4831e6', '63f4be889a436', 'Denny kurniawan', '2000-11-11', 'Jl. Sudirman No.5', 'laki-laki', 'pt', 'pegawai', 'kawin', 'fisik', '2023-02-21 20:58:28', NULL),
('63f4c1f6d6443', '63f4c198a9744', 'Mursiah', '1998-06-20', 'Jl. Ulu Benteng No.3', 'perempuan', 'slta', 'irt', 'kawin', 'fisik', '2023-02-21 21:07:02', NULL),
('63f4c260bb8a6', '63f4c1c040bdf', 'Zaleha', '1979-08-19', 'Jl. Palembang No.07', 'perempuan', 'pt', 'pedagang', 'kawin', 'fisik', '2023-02-21 21:08:48', NULL),
('63f4c3f033d07', '63f4c35734477', 'Hilma Azizah', '2002-05-20', 'Jl. Beringin No. 05', 'perempuan', 'pt', 'swasta', 'belum', 'fisik', '2023-02-21 21:15:28', NULL),
('63f4c435533e3', '63f4c389e79e9', 'Hilma Azizah', '2002-08-08', 'Jl. Beringin No 9', 'perempuan', 'pt', 'pelajar', 'belum', 'psikis', '2023-02-21 21:16:37', '2023-02-21 21:16:45'),
('63f4c6701e797', '63f4c57b2d01b', 'Jihan Hayati', '2001-01-20', 'Jl. Guntur No.5', 'perempuan', 'sltp', 'pelajar', 'belum', 'psikis', '2023-02-21 21:26:08', NULL),
('63f4c6c28298f', '63f4c5a3679e1', 'Jihan Hayati', '2003-02-20', 'Jl. Rendang No.3', 'perempuan', 'sltp', 'pelajar', 'belum', 'psikis', '2023-02-21 21:27:30', NULL),
('640810e9ce753', '640810a597a25', 'Alda Anatasya', '2001-12-12', 'Jl. Gt Moh. Seman No 13', 'perempuan', 'slta', 'irt', 'kawin', 'fisik', '2023-03-08 12:36:57', NULL),
('6409378e5b4ee', '64093773ec1a6', 'tes', '2023-03-08', 'tes', 'perempuan', 'pt', 'pelajar', 'kawin', 'psikis', '2023-03-09 09:34:06', '2023-03-09 10:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelaku`
--

CREATE TABLE `tb_pelaku` (
  `id_pelaku` varchar(50) NOT NULL,
  `id_kasus` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jns_kelamin` enum('perempuan','laki-laki') NOT NULL,
  `pendidikan` enum('na','sd','sltp','slta','pt','tk','tdk_sekolah') NOT NULL,
  `pekerjaan` enum('na','swasta','pegawai','pedagang','irt','tdk_bekerja') NOT NULL,
  `status_perkawinan` enum('na','kawin','cerai','belum') NOT NULL,
  `hubungan_dengan_korban` enum('na','orang_tua','keluarga/saudara','lainnya','tetangga','pacar/teman','guru','majikan','rekan_kerja','suami/istri') NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelaku`
--

INSERT INTO `tb_pelaku` (`id_pelaku`, `id_kasus`, `nama`, `tgl_lahir`, `alamat`, `jns_kelamin`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `hubungan_dengan_korban`, `date_created`, `last_edited`) VALUES
('63f4bbd7e9d57', '63f4b8f589971', 'Wahid', '1998-05-16', 'Banjarmasin, Kal-Sel', 'laki-laki', 'pt', 'swasta', 'kawin', 'suami/istri', '2023-02-21 20:40:55', NULL),
('63f4bf0789958', '63f4bda5520db', 'Andhika', '1995-02-05', 'Penajam, Kaltim', 'laki-laki', 'pt', 'pegawai', 'kawin', 'suami/istri', '2023-02-21 20:54:31', NULL),
('63f4bfd102ea3', '63f4be4e891f7', 'Fairuz Muslimah', '2000-08-20', 'Jl. Sudirma No.3', 'perempuan', 'pt', 'pegawai', 'kawin', 'suami/istri', '2023-02-21 20:57:53', NULL),
('63f4c019d697f', '63f4be889a436', 'Alda Widia Putri', '2001-05-23', 'Jl. Sudirman No.5', 'perempuan', 'pt', 'irt', 'kawin', 'suami/istri', '2023-02-21 20:59:05', NULL),
('63f4c07e89b60', '63f4be889a436', 'Ahlun Nazar', '1996-06-06', 'Jl. Maluku No.04', 'laki-laki', 'pt', 'pegawai', 'kawin', 'orang_tua', '2023-02-21 21:00:46', NULL),
('63f4c2337b281', '63f4c198a9744', 'Hartoyo', '1985-08-19', 'Jl. Subang No.06', 'laki-laki', 'na', 'na', 'na', 'lainnya', '2023-02-21 21:08:03', NULL),
('63f4c29db6f04', '63f4c1c040bdf', 'Reihan ', '1998-08-05', 'Jl. Sumatera No. 8', 'laki-laki', 'na', 'swasta', 'na', 'lainnya', '2023-02-21 21:09:49', NULL),
('63f4c41b14210', '63f4c35734477', 'Jamal', '2002-08-08', 'Jl. Sudimampir', 'laki-laki', 'na', 'na', 'na', 'lainnya', '2023-02-21 21:16:11', NULL),
('63f4c4612bd16', '63f4c389e79e9', 'Alda Anatasya', '2002-03-20', 'Jl. Nanas No.3', 'perempuan', 'pt', '', 'belum', 'pacar/teman', '2023-02-21 21:17:21', NULL),
('63f4c69ac1bb9', '63f4c57b2d01b', 'Reza Arfiansyah', '2003-02-20', 'Jl. Jerman No.4', 'laki-laki', 'sltp', '', 'belum', 'pacar/teman', '2023-02-21 21:26:50', NULL),
('63f4c6e3a4cb2', '63f4c5a3679e1', 'Komar', '2000-01-01', 'Jl. Paringin No.3', 'perempuan', 'na', 'na', 'na', 'keluarga/saudara', '2023-02-21 21:28:03', '2023-02-21 21:29:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_pelayanan` varchar(50) NOT NULL,
  `id_kasus` varchar(50) NOT NULL,
  `no_register` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tgl_pelayanan` date DEFAULT NULL,
  `pelayanan` varchar(50) DEFAULT NULL,
  `deskripsi_pelayanan` varchar(1000) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelayanan`
--

INSERT INTO `tb_pelayanan` (`id_pelayanan`, `id_kasus`, `no_register`, `nama_petugas`, `tgl_pelayanan`, `pelayanan`, `deskripsi_pelayanan`, `date_created`, `last_edited`) VALUES
('64093b54ac283', '64093773ec1a6', '094/0099/UPTD.PPA/2023', 'Johan Fatony', '2023-03-03', 'Penegakkan Hukum', 'coba', '2023-03-09 09:50:12', '2023-03-09 09:54:29'),
('64093c64edec8', '64093773ec1a6', '094/0099/UPTD.PPA/2023', 'Johan Fatony', '2023-03-28', 'Kesehatan', 'sehat', '2023-03-09 09:54:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan_diterima`
--

CREATE TABLE `tb_pengaduan_diterima` (
  `id` varchar(50) NOT NULL,
  `id_kasus` varchar(50) NOT NULL,
  `no_register` varchar(50) NOT NULL,
  `nama_petugas` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengaduan_diterima`
--

INSERT INTO `tb_pengaduan_diterima` (`id`, `id_kasus`, `no_register`, `nama_petugas`, `status`, `date_created`) VALUES
('63f4cc1292405', '63f4b8f589971', '094/001/UPTD.PPA/2023', 'Admin', 'diterima', '2023-02-21 21:50:10'),
('63f4cc1e51b68', '63f4be18e9938', '094/002/UPTD.PPA/2023', 'Admin', 'diterima', '2023-02-21 21:50:22'),
('63f4cc29c32fc', '63f4c57b2d01b', '094/003/UPTD.PPA/2023', 'Admin', 'diterima', '2023-02-21 21:50:33'),
('63f4cc34731fb', '63f4be889a436', '094/004/UPTD.PPA/2023', 'Admin', 'diterima', '2023-02-21 21:50:44'),
('63f4cc3c29dfa', '63f4c35734477', '094/005/UPTD.PPA/2023', 'Admin', 'diterima', '2023-02-21 21:50:52'),
('640937eec4e04', '64093773ec1a6', '094/0099/UPTD.PPA/2023', 'Johan Fatony', 'diterima', '2023-03-09 09:35:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan_ditolak`
--

CREATE TABLE `tb_pengaduan_ditolak` (
  `id` varchar(50) NOT NULL,
  `id_kasus` varchar(50) NOT NULL,
  `nama_petugas` varchar(15) NOT NULL,
  `status` enum('ditolak') NOT NULL,
  `alasan_ditolak` varchar(200) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengaduan_ditolak`
--

INSERT INTO `tb_pengaduan_ditolak` (`id`, `id_kasus`, `nama_petugas`, `status`, `alasan_ditolak`, `date_created`) VALUES
('63f4cc98e14ce', '63f4c7b2033d7', 'Admin', 'ditolak', 'Tidak ada data Korban', '2023-02-21 21:52:24'),
('63f4ccb2902cc', '63f4c389e79e9', 'Admin', 'ditolak', 'Telah Diselesaikan di tempat', '2023-02-21 21:52:50'),
('63f4ccd133150', '63f4be4e891f7', 'Admin', 'ditolak', 'kondisi Emosi Sesaat', '2023-02-21 21:53:21'),
('63f4cce2ec6ae', '63f4c1c040bdf', 'Admin', 'ditolak', 'Tidak ada Saksi yang lihat', '2023-02-21 21:53:38'),
('63f4ccf003c1d', '63f4c77df2923', 'Admin', 'ditolak', 'Tidak ada saksi ', '2023-02-21 21:53:52'),
('64093c78e0707', '63f5e8a13fa22', 'Johan Fatony', 'ditolak', 'tidak mungkin', '2023-03-09 09:55:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_adminpetugas`
--
ALTER TABLE `akun_adminpetugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `akun_masyarakat`
--
ALTER TABLE `akun_masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_kasus`
--
ALTER TABLE `tb_kasus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_korban`
--
ALTER TABLE `tb_korban`
  ADD PRIMARY KEY (`id_korban`),
  ADD UNIQUE KEY `id_korban` (`id_korban`);

--
-- Indeks untuk tabel `tb_pelaku`
--
ALTER TABLE `tb_pelaku`
  ADD PRIMARY KEY (`id_pelaku`),
  ADD UNIQUE KEY `id_pelaku` (`id_pelaku`);

--
-- Indeks untuk tabel `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD UNIQUE KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `tb_pengaduan_diterima`
--
ALTER TABLE `tb_pengaduan_diterima`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_pengaduan_ditolak`
--
ALTER TABLE `tb_pengaduan_ditolak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
