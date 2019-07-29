-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2019 at 02:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `judul` text NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `catatan` text NOT NULL,
  `stemming` text NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `stok` int(5) NOT NULL,
  `img_buku` text,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_kategori`, `judul`, `penerbit`, `pengarang`, `catatan`, `stemming`, `tahun_terbit`, `stok`, `img_buku`, `updated_at`, `deleted_at`) VALUES
('BUKU000001', 'KATEGORI001', 'Aljabar Linear Dasar Dilengkapi program MATLAB dan penerapannya', 'Wagito', 'Penerbit Gava Media Yogyakarta', 'Asli', 'aljabar linear dasar lengkap program matlab terap', 2003, 10, 'BUKU000001.jpg', '2019-07-19 10:49:08', NULL),
('BUKU000002', 'KATEGORI001', 'Pengantar Kalkulus Diferensial Cepat dan Mudah Mengenal Dunia Kalkulus Diferensial Secara Filosofi', 'ANDI OFFSET', '*Kartono & F. W. Nurwiyati', 'Asli', 'antar kalkulus diferensial cepat mudah kenal dunia filosofi', 1995, 10, 'BUKU000002.jpeg', '2019-07-16 10:29:40', NULL),
('BUKU000003', 'KATEGORI001', 'Himpunan & Logika Kabur Serta Aplikasinya', 'PT. Prestasi Pustakaraya Jakar', 'Eko Prasetyo Dharmawan', 'Asli', 'himpun logika kabur aplikasi', 2011, 1, 'BUKU000003.jpg', '2019-07-16 10:27:45', NULL),
('BUKU000004', 'KATEGORI001', 'Logika Matematika Soal dan Penyelesaian Logika, Himpunan, Relasi dan Fungsi', 'Uncen', 'Uncen', 'Asli', 'logika matematika selesai himpun relasi fungsi', 2019, 10, 'BUKU000004.jpg', '2019-07-16 10:46:13', NULL),
('BUKU000005', 'KATEGORI001', 'Menguasai Analisis Kompleks dalam Matematika Teknik', 'Uncen', 'Uncen', 'Asli', 'kuasa analisis kompleks matematika teknik', 2019, 10, 'BUKU000005.jpg', '2019-07-16 10:46:48', NULL),
('BUKU000006', 'KATEGORI002', 'Fisika Dasar, Listrik, Magnet, dan Termofisika', 'Uncen', 'Uncen', 'Asli', 'fisika dasar listrik magnet termofisika', 2019, 10, NULL, '2019-07-16 13:06:21', NULL),
('BUKU000007', 'KATEGORI002', 'Analisis Rangkaian Linear', 'Uncen', 'Uncen', 'Asli', 'analisis rangkai linear', 2019, 10, NULL, '2019-07-16 13:21:39', NULL),
('BUKU000008', 'KATEGORI002', 'Analisis Struktur Berbentuk Rangka dalam Formulasi Matriks', 'Uncen', 'Uncen', 'Asli', 'analisis struktur bentuk rangka formulasi matriks', 2019, 10, NULL, '2019-07-16 13:22:10', NULL),
('BUKU000009', 'KATEGORI002', 'Fisika Dasar : Mekanika', 'Uncen', 'Uncen', 'Asli', 'fisika dasar mekanika', 2019, 10, NULL, '2019-07-16 13:22:36', NULL),
('BUKU000010', 'KATEGORI002', 'Fisika Dasar: Gelombang dan Optik', 'Uncen', 'Uncen', 'Asli', 'fisika dasar gelombang optik', 2019, 10, NULL, '2019-07-16 13:23:19', NULL),
('BUKU000011', 'KATEGORI003', 'E-education Konsep, Teknologi, dan Aplikasi Internet Pendidikan', 'Uncen', 'Uncen', 'Asli', 'eeducation konsep teknologi aplikasi internet didik', 2019, 10, NULL, '2019-07-16 13:23:54', NULL),
('BUKU000012', 'KATEGORI003', 'Pemrograman Berorientasi Objek Teori dan Aplikasi dengan C++ berbasis Windows & Linux', 'Uncen', 'Uncen', 'Asli', 'pemrograman orientasi objek teori aplikasi c bas windows linux', 2019, 10, NULL, '2019-07-16 13:24:18', NULL),
('BUKU000013', 'KATEGORI003', 'Cara Mudah Membuat Desain Web Untuk Pemula', 'Uncen', 'Uncen', 'Asli', 'mudah desain web mula', 2019, 10, NULL, '2019-07-16 13:24:47', NULL),
('BUKU000014', 'KATEGORI003', 'Utility Jaringan Panduan Mengoptimalkan Jaringan Komputer Berbasis Windows', 'Uncen', 'Uncen', 'Asli', 'utility jaring pandu optimal komputer bas windows', 2019, 10, NULL, '2019-07-16 13:25:11', NULL),
('BUKU000015', 'KATEGORI003', 'Konsep Dasar Pengembangan Jaringan (Subnet, VLSM, Routing, DES, PGP, & Firewall)', 'Uncen', 'Uncen', 'Asli', 'konsep dasar kembang jaring subnet vlsm routing des pgp firewall', 2019, 10, NULL, '2019-07-16 13:25:34', NULL),
('BUKU000016', 'KATEGORI004', 'Memecahkan kasus statistik : Deskriptif, Parametrik, dan Non-Parametrik dengan SPSS', 'Uncen', 'Uncen', 'Uncen', 'pecah statistik deskriptif parametrik nonparametrik spss', 2019, 10, NULL, '2019-07-18 04:19:58', NULL),
('BUKU000017', 'KATEGORI004', 'Pengambilan Sampel Dalam Penelitian Survei', 'Uncen', 'Uncen', 'Asli', 'ambil sampel teliti survei', 2019, 10, NULL, '2019-07-18 04:20:26', NULL),
('BUKU000018', 'KATEGORI004', 'Desain Eksperimen dengan Metode Taguchi', 'Uncen', 'Uncen', 'Asli', 'desain eksperimen metode taguchi', 2019, 10, NULL, '2019-07-18 04:20:51', NULL),
('BUKU000019', 'KATEGORI004', 'Analisis Multivariat Terapan dengan Program SPSS, AMOS, & SMARTPLS', 'Uncen', 'Uncen', 'Asli', 'analisis multivariat terap program spss amos smartpls', 2019, 10, NULL, '2019-07-18 04:21:25', NULL),
('BUKU000020', 'KATEGORI004', 'Analisis regresi terapan', 'Uncen', 'Uncen', 'Asli', 'analisis regresi terap', 2019, 10, NULL, '2019-07-18 04:22:19', NULL),
('BUKU000021', 'KATEGORI004', 'Pengantar statistik probabilitas dan matematika', 'Uncen', 'Uncen', 'Asli', 'antar statistik probabilitas matematika', 2019, 10, NULL, '2019-07-18 04:22:42', NULL),
('BUKU000022', 'KATEGORI004', 'Pengantar proses stokastik', 'Uncen', 'Uncen', 'Asli', 'antar proses stokastik', 2019, 10, NULL, '2019-07-28 17:58:30', NULL),
('BUKU000023', 'KATEGORI001', 'Aljabar Linear Dasar Dilengkapi program MATLAB dan penerapannya', 'uncen', 'uncen', 'asli', 'aljabar linear dasar lengkap program matlab terap', 2019, 10, NULL, '2019-07-28 17:57:15', '2019-07-28 17:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(5) NOT NULL,
  `durasi` int(2) NOT NULL,
  `nominal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `durasi`, `nominal`) VALUES
(2, 1, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nip` varchar(15) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `img_dosen` text,
  `terakhir_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nip`, `nama_lengkap`, `jurusan`, `email`, `password`, `img_dosen`, `terakhir_login`) VALUES
('201431299', 'Muhammad Iriansyah Putra', 'S1 Teknik Informatika', 'ryanjoker87@gmail.com', 'Pace11', '201431299.jpg', '2019-06-16 20:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KATEGORI001', 'Matematika'),
('KATEGORI002', 'Fisika'),
('KATEGORI003', 'Sistem Informasi'),
('KATEGORI004', 'Statistik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `anggota_aktif` int(1) NOT NULL,
  `img_mhs` text,
  `terakhir_login` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_lengkap`, `email`, `password`, `anggota_aktif`, `img_mhs`, `terakhir_login`) VALUES
('20150511014001', 'Erin Fitriah Rahayu Putri', 'ryanjoker87@gmail.com', 'erinf11', 1, '20150511014001.jpg', '2019-07-14 13:28:51'),
('20150511014002', 'Sara Margaretha Yokhu', 'muhammad.iriansyah@ralali.com', 'saram11', 1, '20150511014002.jpeg', '2019-06-12 08:16:58'),
('20150511014003', 'Abdul Fiqih', 'abdulfiqih@gmail.com', 'abdulf11', 0, '20150511014003.jpg', '2019-04-20 14:33:55'),
('20150511014004', 'Andreas Reniban', 'andreasreniban@gmail.com', 'andreasr11', 1, '20150511014004.jpg', '2019-04-21 03:22:16'),
('20150511014005', 'Rekha Ayu', 'ryanjoker87@gmail.com', 'rekha', 1, '20150511014005.png', '2019-07-28 18:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_pinjaman` int(5) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nip` varchar(15) DEFAULT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status_pinjaman` int(1) NOT NULL,
  `acc` int(1) NOT NULL,
  `notif_email` int(1) NOT NULL,
  `denda` int(1) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_pinjaman`, `id_buku`, `nim`, `nip`, `tgl_pinjam`, `tgl_selesai`, `tgl_kembali`, `status_pinjaman`, `acc`, `notif_email`, `denda`, `keterangan`) VALUES
(1, 'BUKU000001', '20150511014005', NULL, '2019-07-29', '2019-07-31', NULL, 0, 1, 0, 0, 'mantapsss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` int(2) NOT NULL,
  `terakhir_login` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `terakhir_login`) VALUES
(1, 'admin', 'admin11', 0, '2019-07-28 18:20:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tbl_dosen` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
