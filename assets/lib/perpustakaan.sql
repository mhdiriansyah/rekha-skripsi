-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2019 at 06:56 PM
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
('BUKU000001', 'KATEGORI001', 'Aljabar Linier Dasar Dilengkapi program MATLAB dan penerapannya', 'Wagito', 'Penerbit Gava Media Yogyakarta', 'Asli', 'aljabar linier dasar lengkap program matlab terap', 2003, 10, 'BUKU000001.jpg', '2019-07-30 01:16:35', NULL),
('BUKU000002', 'KATEGORI001', 'Pengantar Kalkulus Diferensial Cepat dan Mudah Mengenal Dunia Kalkulus Diferensial Secara Filosofi', 'ANDI OFFSET', '*Kartono & F. W. Nurwiyati', 'Asli', 'antar kalkulus diferensial cepat mudah kenal dunia filosofi', 1995, 10, 'BUKU000002.jpeg', '2019-07-16 10:29:40', NULL),
('BUKU000003', 'KATEGORI001', 'Himpunan & Logika Kabur Serta Aplikasinya', 'PT. Prestasi Pustakaraya Jakar', 'Eko Prasetyo Dharmawan', 'Asli', 'himpun logika kabur aplikasi', 2011, 1, 'BUKU000003.jpg', '2019-07-16 10:27:45', NULL),
('BUKU000004', 'KATEGORI001', 'Logika Matematika Soal dan Penyelesaian Logika, Himpunan, Relasi dan Fungsi', 'Uncen', 'Uncen', 'Asli', 'logika matematika selesai himpun relasi fungsi', 2019, 10, 'BUKU000004.jpg', '2019-07-16 10:46:13', NULL),
('BUKU000005', 'KATEGORI001', 'Menguasai Analisis Kompleks dalam Matematika Teknik', 'Uncen', 'Uncen', 'Asli', 'kuasa analisis kompleks matematika teknik', 2019, 10, 'BUKU000005.jpg', '2019-07-16 10:46:48', NULL),
('BUKU000006', 'KATEGORI002', 'Fisika Dasar, Listrik, Magnet, dan Termofisika', 'Uncen', 'Uncen', 'Asli', 'fisika dasar listrik magnet termofisika', 2019, 10, NULL, '2019-07-16 13:06:21', NULL),
('BUKU000007', 'KATEGORI002', 'Analisis Rangkaian Linear', 'Uncen', 'Uncen', 'Asli', 'analisis rangkai linear', 2019, 10, NULL, '2019-07-16 13:21:39', '2019-07-30 01:13:16'),
('BUKU000008', 'KATEGORI002', 'Analisis Struktur Berbentuk Rangka dalam Formulasi Matriks', 'Uncen', 'Uncen', 'Asli', 'analisis struktur bentuk rangka formulasi matriks', 2019, 10, NULL, '2019-07-16 13:22:10', '2019-07-30 01:13:40'),
('BUKU000009', 'KATEGORI002', 'Fisika Dasar : Mekanika', 'Uncen', 'Uncen', 'Asli', 'fisika dasar mekanika', 2019, 10, NULL, '2019-07-16 13:22:36', NULL),
('BUKU000010', 'KATEGORI002', 'Fisika Dasar: Gelombang dan Optik', 'Uncen', 'Uncen', 'Asli', 'fisika dasar gelombang optik', 2019, 10, NULL, '2019-07-16 13:23:19', NULL),
('BUKU000011', 'KATEGORI003', 'E-education Konsep, Teknologi, dan Aplikasi Internet Pendidikan', 'Uncen', 'Uncen', 'Asli', 'eeducation konsep teknologi aplikasi internet didik', 2019, 10, NULL, '2019-07-16 13:23:54', '2019-07-30 01:13:56'),
('BUKU000012', 'KATEGORI003', 'Pemrograman Berorientasi Objek Teori dan Aplikasi dengan C++ berbasis Windows & Linux', 'Uncen', 'Uncen', 'Asli', 'pemrograman orientasi objek teori aplikasi c bas windows linux', 2019, 10, NULL, '2019-07-16 13:24:18', NULL),
('BUKU000013', 'KATEGORI003', 'Cara Mudah Membuat Desain Web Untuk Pemula', 'Uncen', 'Uncen', 'Asli', 'mudah desain web mula', 2019, 10, NULL, '2019-07-16 13:24:47', '2019-07-30 01:14:17'),
('BUKU000014', 'KATEGORI003', 'Utility Jaringan Panduan Mengoptimalkan Jaringan Komputer Berbasis Windows', 'Uncen', 'Uncen', 'Asli', 'utility jaring pandu optimal komputer bas windows', 2019, 10, NULL, '2019-07-16 13:25:11', NULL),
('BUKU000015', 'KATEGORI003', 'Konsep Dasar Pengembangan Jaringan (Subnet, VLSM, Routing, DES, PGP, & Firewall)', 'Uncen', 'Uncen', 'Asli', 'konsep dasar kembang jaring subnet vlsm routing des pgp firewall', 2019, 10, NULL, '2019-07-16 13:25:34', '2019-07-30 01:14:59'),
('BUKU000016', 'KATEGORI004', 'Memecahkan kasus statistik : Deskriptif, Parametrik, dan Non-Parametrik dengan SPSS', 'Uncen', 'Uncen', 'Uncen', 'pecah statistik deskriptif parametrik nonparametrik spss', 2019, 10, NULL, '2019-07-18 04:19:58', NULL),
('BUKU000017', 'KATEGORI004', 'Pengambilan Sampel Dalam Penelitian Survei', 'Uncen', 'Uncen', 'Asli', 'ambil sampel teliti survei', 2019, 10, NULL, '2019-07-18 04:20:26', NULL),
('BUKU000018', 'KATEGORI004', 'Desain Eksperimen dengan Metode Taguchi', 'Uncen', 'Uncen', 'Asli', 'desain eksperimen metode taguchi', 2019, 10, NULL, '2019-07-18 04:20:51', NULL),
('BUKU000019', 'KATEGORI004', 'Analisis Multivariat Terapan dengan Program SPSS, AMOS, & SMARTPLS', 'Uncen', 'Uncen', 'Asli', 'analisis multivariat terap program spss amos smartpls', 2019, 10, NULL, '2019-07-18 04:21:25', NULL),
('BUKU000020', 'KATEGORI004', 'Analisis regresi terapan', 'Uncen', 'Uncen', 'Asli', 'analisis regresi terap', 2019, 10, NULL, '2019-07-18 04:22:19', '2019-07-30 01:15:41'),
('BUKU000021', 'KATEGORI004', 'Pengantar statistik probabilitas dan matematika', 'Uncen', 'Uncen', 'Asli', 'antar statistik probabilitas matematika', 2019, 10, NULL, '2019-07-18 04:22:42', NULL),
('BUKU000022', 'KATEGORI004', 'Pengantar proses stokastik', 'Uncen', 'Uncen', 'Asli', 'antar proses stokastik', 2019, 10, NULL, '2019-07-18 04:23:08', '2019-07-30 01:12:47'),
('BUKU000023', 'KATEGORI001', 'Aljabar Linier Elementer Versi Aplikasi', 'Erlangga', '*HOWARD ANTON *CHRIS RORRES', 'Aljabar', 'aljabar linier elementer versi aplikasi', 2004, 4, NULL, '2019-07-30 01:58:28', NULL),
('BUKU000024', 'KATEGORI001', 'Dasar-Dasar Metode Numerik', 'Uncen', 'Uncen', 'numerik', 'dasardasar metode numerik', 2019, 1, NULL, '2019-07-30 02:00:20', NULL),
('BUKU000025', 'KATEGORI001', 'Teori dan Komputasi Numerik Diferensial dan Integral', 'uncen', 'uncen', 'mtk', 'teori komputasi numerik diferensial integral', 2019, 1, NULL, '2019-07-30 02:01:05', NULL),
('BUKU000026', 'KATEGORI002', 'Pengantar Optik Geometri Fisika', 'uncen', 'uncen', 'fis', 'antar optik geometri fisika', 2019, 1, NULL, '2019-07-30 02:08:00', NULL),
('BUKU000027', 'KATEGORI002', 'Fisika Dasar: Listrik-Magnet, Optika, Fisika Modern Untuk Mahasiswa', 'uncen', 'uncen', 'ada', 'fisika dasar listrikmagnet optika modern mahasiswa', 2019, 1, NULL, '2019-07-30 02:08:24', NULL),
('BUKU000028', 'KATEGORI003', 'ALGORITMA & PEMROGRAMAN DALAM BAHASA PASCAL dan C ', 'uncen', 'uncen', 'ada', 'algoritma pemrograman bahasa pascal c', 2019, 1, NULL, '2019-07-30 02:08:48', NULL),
('BUKU000029', 'KATEGORI003', 'MEMBANGUN JARINGAN KOMPUTER Mudah membuat jaringan komputer (Wire & Wireless) untuk pengguna Windows dan Linux', 'uncen', 'uncen', 'ada', 'bangun jaring komputer mudah wire wireless guna windows linux', 2019, 1, NULL, '2019-07-30 02:09:19', NULL),
('BUKU000030', 'KATEGORI003', 'MEMBANGUN JARINGAN KOMPUTER Mudah membuat jaringan komputer (Wire & Wireless) untuk pengguna Windows dan Linux', 'uncen', 'uncen', 'Ada', 'bangun jaring komputer mudah wire wireless guna windows linux', 2019, 1, NULL, '2019-07-30 02:10:01', NULL),
('BUKU000031', 'KATEGORI003', 'Solusi Membuat Aplikasi Java dengan Java Studio', 'uncen', 'uncen', 'ada', 'solusi aplikasi java studio', 2019, 1, NULL, '2019-07-30 02:18:53', NULL),
('BUKU000032', 'KATEGORI003', 'KONSEP, TEKNOLOGI, DAN APLIKASI INTERNET PENDIDIKAN\r\n', 'uncen', 'uncen', 'ada', 'konsep teknologi aplikasi internet didik', 2019, 1, NULL, '2019-07-30 02:19:14', NULL),
('BUKU000033', 'KATEGORI004', 'Analisis Ekonometrika dan Statistika dengan Eviews\r\n', 'uncen', 'uncen', 'ada', 'analisis ekonometrika statistika eviews', 2019, 1, NULL, '2019-07-30 02:20:41', NULL),
('BUKU000034', 'KATEGORI004', 'Analisis Data Kuantitatif Dengan Statistika Inferensial\r\n', 'uncen', 'uncen', 'ada', 'analisis data kuantitatif statistika inferensial', 2019, 1, NULL, '2019-07-30 02:21:50', NULL),
('BUKU000035', 'KATEGORI004', 'Analisis Regresi dalam Penelitian Ekonomi dan Bisnis: dilengkapi Aplikasi SPSS & Eviews\r\n', 'uncen', 'uncen', 'ada', 'analisis regresi teliti ekonomi bisnis lengkap aplikasi spss eviews', 2019, 1, NULL, '2019-07-30 02:22:48', NULL),
('BUKU000036', 'KATEGORI004', 'Metode Statistika untuk bisnis dan ekonomi\r\n', 'uncen', 'uncen', 'ada', 'metode statistika bisnis ekonomi', 2019, 1, NULL, '2019-07-30 02:23:31', NULL),
('BUKU000037', 'KATEGORI004', 'Statistika Non Parametris: Aplikasinya dalam Bidang Ekonomi dan bisnis\r\n', 'uncen', 'uncen', 'ada', 'statistika non parametris aplikasi bidang ekonomi bisnis', 2019, 1, NULL, '2019-07-30 02:24:55', NULL),
('BUKU000038', 'KATEGORI004', 'Mengolah Data Statistik dengan Mudah Menggunakan Minitab 14\r\n', 'uncen', 'uncen', 'ada', 'olah data statistik mudah minitab 14', 2019, 1, NULL, '2019-07-30 02:25:18', NULL),
('BUKU000039', 'KATEGORI004', 'Statistika untuk biologi, farmasi, kedokteran dan ilmu yang bertautan\r\n', 'uncen', 'uncen', 'ada', 'statistika biologi farmasi dokter ilmu taut', 2019, 1, NULL, '2019-07-30 02:25:36', NULL),
('BUKU000040', 'KATEGORI004', 'Statistik Multivariat: Konsep dan Aplikasi dengan SPSS\r\n', 'uncen', 'uncen', 'ada', 'statistik multivariat konsep aplikasi spss', 2019, 1, NULL, '2019-07-30 02:26:02', NULL),
('BUKU000041', 'KATEGORI004', 'Statistik NonParametrik: Konsep dan Aplikasi dengan SPSS\r\n', 'uncen', 'uncen', 'ada', 'statistik nonparametrik konsep aplikasi spss', 2019, 1, NULL, '2019-07-30 02:54:57', NULL),
('BUKU000042', 'KATEGORI004', 'Buku Tabel Statistika\r\n', 'uncen', 'uncen', 'ada', 'buku tabel statistika', 2019, 1, NULL, '2019-07-30 02:55:22', NULL),
('BUKU000043', 'KATEGORI004', 'Pengantar Statistika: Panduan Praktis Bagi Pengajar dan Mahasiswa\r\n', 'uncen', 'uncen', 'ada', 'antar statistika pandu praktis ajar mahasiswa', 2019, 1, NULL, '2019-07-30 02:55:44', NULL),
('BUKU000044', 'KATEGORI004', 'Dasar-dasar Statistika: Aneka Bidang Ilmu Pertanian dan Hayati\r\n', 'uncen', 'uncen', 'ada', 'dasardasar statistika aneka bidang ilmu tani hayati', 2019, 1, NULL, '2019-07-30 02:56:10', NULL),
('BUKU000045', 'KATEGORI004', 'Statistik NonParametrik: Konsep dan Aplikasi dengan SPSS\r\n', 'uncen', 'uncen', 'ada', 'statistik nonparametrik konsep aplikasi spss', 2019, 1, NULL, '2019-07-30 02:56:34', NULL),
('BUKU000046', 'KATEGORI004', 'Mengolah Data Statistik Hasil Penelitian dengan SPSS 17\r\n', 'uncen', 'uncen', 'ada', 'olah data statistik hasil teliti spss 17', 2019, 1, NULL, '2019-07-30 02:57:05', NULL),
('BUKU000047', 'KATEGORI004', 'Statistika Untuk penelitian', 'uncen', 'uncen', 'ada', 'statistika teliti', 2019, 1, NULL, '2019-07-30 02:57:30', NULL),
('BUKU000048', 'KATEGORI004', 'Teknik-teknik Statistika dalam Bisnis dan Ekonomi Menggunakan Kelompok Data Global', 'uncen', 'uncen', 'ada', 'teknikteknik statistika bisnis ekonomi kelompok data global', 2019, 1, NULL, '2019-07-30 02:58:01', NULL),
('BUKU000049', 'KATEGORI004', 'Pengantar Statistika I: Panduan Bagi Pengajar dan Mahasiswa', 'uncen', 'uncen', 'ada', 'antar statistika i pandu ajar mahasiswa', 2019, 1, NULL, '2019-07-30 02:58:30', NULL),
('BUKU000050', 'KATEGORI004', 'Pengantar Statistika II: Panduan Bagi Pengajar dan Mahasiswa', 'uncen', 'uncen', 'ada', 'antar statistika ii pandu ajar mahasiswa', 2019, 1, NULL, '2019-07-30 02:59:03', NULL),
('BUKU000051', 'KATEGORI004', 'Ilmu Peluang dan Statistika untuk Insinyur dan Ilmuwan', 'uncen', 'uncen', 'ada', 'ilmu peluang statistika insinyur ilmuwan', 2019, 1, NULL, '2019-07-30 02:59:30', NULL),
('BUKU000052', 'KATEGORI004', 'Statistika Terapan: Teori, Contoh Kasus, dan Aplikasi dengan SPSS', 'uncen', 'uncen', 'ada', 'statistika terap teori contoh aplikasi spss', 2019, 1, NULL, '2019-07-30 02:59:57', NULL),
('BUKU000053', 'KATEGORI004', 'Statistika Dasar', 'uncen', 'uncen', 'ada', 'statistika dasar', 2019, 1, NULL, '2019-07-30 03:00:22', NULL),
('BUKU000054', 'KATEGORI004', 'Statistika untuk bisnis & ekonomi', 'uncen', 'uncen', 'ada', 'statistika bisnis ekonomi', 2019, 1, NULL, '2019-07-30 03:00:44', NULL),
('BUKU000055', 'KATEGORI004', 'Statistika Untuk Penelitian', 'uncen', 'uncen', 'ada', 'statistika teliti', 2019, 1, NULL, '2019-07-30 03:01:03', NULL),
('BUKU000056', 'KATEGORI004', 'Statistika Deskriptif dan Probabilitas', 'uncen', 'uncen', 'ada', 'statistika deskriptif probabilitas', 2019, 1, NULL, '2019-07-30 03:01:27', NULL),
('BUKU000057', 'KATEGORI004', 'Statistik', 'uncen', 'uncen', 'ada', 'statistik', 2019, 1, NULL, '2019-07-30 03:01:52', NULL),
('BUKU000058', 'KATEGORI004', 'Statistik Deskriptif dalam Bidang Ekonomi dan Niaga', 'uncen', 'uncen', 'ada', 'statistik deskriptif bidang ekonomi niaga', 2019, 1, NULL, '2019-07-30 03:02:14', NULL),
('BUKU000059', 'KATEGORI004', 'Teori dan Aplikasi dalam Statistik', 'uncen', 'uncen', 'ada', 'teori aplikasi statistik', 2019, 1, NULL, '2019-07-30 03:02:34', NULL),
('BUKU000060', 'KATEGORI004', 'Statistik untuk Bisnis dan Ekonomi', 'uncen', 'uncen', 'ada', 'statistik bisnis ekonomi', 2019, 1, NULL, '2019-07-30 03:02:56', NULL),
('BUKU000061', 'KATEGORI004', 'Metode Statistika\r\n', 'uncen', 'uncen', 'ada', 'metode statistika', 2019, 1, NULL, '2019-07-30 03:03:22', NULL),
('BUKU000062', 'KATEGORI004', 'Pengantar Statistik untuk Bidang Ilmu', 'uncen', 'uncen', 'ada', 'antar statistik bidang ilmu', 2019, 1, NULL, '2019-07-30 03:03:48', NULL),
('BUKU000063', 'KATEGORI004', 'Belajar Cepat Analisis Statistik Parametrik dan Non Parametrik dengan SPSS', 'uncen', 'uncen', 'ada', 'ajar cepat analisis statistik parametrik non spss', 2019, 1, NULL, '2019-07-30 03:04:17', NULL),
('BUKU000064', 'KATEGORI004', 'Matlab untuk Statistika & Teknik Optimasi Aplikasi untuk Rekayasa & Bisnis', 'uncen', 'uncen', 'ada', 'matlab statistika teknik optimasi aplikasi rekayasa bisnis', 2019, 1, NULL, '2019-07-30 03:05:08', NULL),
('BUKU000065', 'KATEGORI004', 'Statistik NonParametrik untuk Penelitian', 'uncen', 'uncen', 'ada', 'statistik nonparametrik teliti', 2019, 1, NULL, '2019-07-30 03:05:25', NULL),
('BUKU000066', 'KATEGORI004', 'Pengendalian Kualitas Statistik: Pendekatan Teoritis dan Aplikatif', 'uncen', 'uncen', 'ada', 'kendali kualitas statistik dekat teoritis aplikatif', 2019, 1, NULL, '2019-07-30 03:05:43', NULL),
('BUKU000067', 'KATEGORI004', 'Aplikasi Statistik Untuk Penelitian Dilengkapi dengan Excel & SPSS', 'uncen', 'uncen', 'ada', 'aplikasi statistik teliti lengkap excel spss', 2019, 1, NULL, '2019-07-30 03:06:17', NULL),
('BUKU000068', 'KATEGORI004', 'Metode Penelitian Kuantitatif Kualitatif Dan R&D', 'uncen', 'uncen', 'ada', 'metode teliti kuantitatif kualitatif rd', 2019, 1, NULL, '2019-07-30 03:07:02', NULL),
('BUKU000069', 'KATEGORI004', 'Pengantar Proses Stokastik', 'uncen', 'uncen', 'ada', 'antar proses stokastik', 2019, 1, NULL, '2019-07-30 03:07:32', NULL),
('BUKU000070', 'KATEGORI004', 'Pengantar Analisis Multivariat', 'uncen', 'uncen', 'ada', 'antar analisis multivariat', 2018, 1, NULL, '2019-07-30 03:08:18', NULL),
('BUKU000071', 'KATEGORI004', 'Perangkat Lunak Analisis Data Lanjutan: Manual Programmer Unix & Windows', 'uncen', 'uncen', 'ada', 'perangkat lunak analisis data lanjut manual programmer unix windows', 2019, 1, NULL, '2019-07-30 03:12:51', NULL),
('BUKU000072', 'KATEGORI004', 'Statistika Induktif untuk Ekonomi dan Bisnis', 'uncen', 'uncen', 'ada', 'statistika induktif ekonomi bisnis', 2019, 1, NULL, '2019-07-30 03:13:07', NULL),
('BUKU000073', 'KATEGORI004', 'Pengantar Pemodelan Seri Waktu dan Peramalan dalam Bisnis dan Ekonomi', 'uncen', 'uncen', 'ada', 'antar model seri amal bisnis ekonomi', 2019, 1, NULL, '2019-07-30 03:14:50', NULL),
('BUKU000074', 'KATEGORI004', 'Analisis Komponen Utama ', 'uncen', 'uncen', 'ada', 'analisis komponen utama', 2019, 1, NULL, '2019-07-30 03:16:01', NULL),
('BUKU000075', 'KATEGORI004', 'Distribusi Varian Matriks', 'uncen', 'uncen', 'ada', 'distribusi varian matriks', 2019, 1, NULL, '2019-07-30 03:17:47', NULL),
('BUKU000076', 'KATEGORI004', 'Penerapan Analisis Regresi', 'uncen', 'uncen', 'ada', 'terap analisis regresi', 2019, 1, NULL, '2019-07-30 03:18:31', NULL),
('BUKU000077', 'KATEGORI004', 'Penerapan Analisis Statistik Multivariat', 'uncen', 'uncen', 'ada', 'terap analisis statistik multivariat', 2019, 1, NULL, '2019-07-30 03:20:10', NULL),
('BUKU000078', 'KATEGORI004', 'Panduan Pengguna Statistik', 'uncen', 'uncen', 'ada', 'pandu guna statistik', 2019, 1, NULL, '2019-07-30 03:21:37', NULL),
('BUKU000079', 'KATEGORI004', 'Garis Besar Statistik Schaum ', 'uncen', 'uncen', 'ada', 'garis statistik schaum', 2019, 1, NULL, '2019-07-30 03:24:38', NULL),
('BUKU000080', 'KATEGORI004', 'Teori dan Aplikasi Regresi Kuantil', 'uncen', 'uncen', 'ada', 'teori aplikasi regresi kuantil', 2019, 1, NULL, '2019-07-30 03:25:56', NULL),
('BUKU000081', 'KATEGORI004', 'Latihan Awal Desain dan Analisis Percobaan', 'uncen', 'uncen', 'ada', 'latih desain analisis coba', 2019, 1, NULL, '2019-07-30 03:30:02', NULL),
('BUKU000082', 'KATEGORI004', 'Probabilitas, Variabel Acak, dan Proses Stokastik', 'uncen', 'uncen', 'ada', 'probabilitas variabel acak proses stokastik', 2019, 1, NULL, '2019-07-30 03:30:57', NULL),
('BUKU000083', 'KATEGORI004', 'Statistik: Konsep Dasar, Aplikasi, dan Pengembangannya', 'uncen', 'uncen', 'ada', 'statistik konsep dasar aplikasi kembang', 2019, 1, NULL, '2019-07-30 03:31:25', NULL),
('BUKU000084', 'KATEGORI004', 'Model Statistik Linier', 'uncen', 'uncen', 'ada', 'model statistik linier', 2019, 1, NULL, '2019-07-30 03:32:13', NULL),
('BUKU000085', 'KATEGORI004', 'Inferensi dan Aplikasi Statistik Multivariat', 'uncen', 'uncen', 'ada', 'inferensi aplikasi statistik multivariat', 2019, 1, NULL, '2019-07-30 03:33:23', NULL),
('BUKU000086', 'KATEGORI004', 'Analisis Regresi : Konsep dan Aplikasi', 'uncen', 'uncen', 'ada', 'analisis regresi konsep aplikasi', 2019, 1, NULL, '2019-07-30 03:33:59', NULL),
('BUKU000087', 'KATEGORI004', 'Statistika Terapan: konsep, Contoh dan analisis Data dengan Program SPSS/Lisrel dalam Penelitian', 'uncen', 'uncen', 'ada', 'statistika terap konsep contoh analisis data program spsslisrel teliti', 2019, 1, NULL, '2019-07-30 03:34:19', NULL),
('BUKU000088', 'KATEGORI004', 'Pengantar Statistik Matematika', 'uncen', 'uncen', 'ada', 'antar statistik matematika', 2019, 1, NULL, '2019-07-30 03:35:34', NULL),
('BUKU000089', 'KATEGORI004', 'Statistika Matematika Modern', 'uncen', 'uncen', 'ada', 'statistika matematika modern', 2019, 1, NULL, '2019-07-30 03:35:57', NULL),
('BUKU000090', 'KATEGORI004', 'Statistik untuk Windows : Perangkat Lunak Analitis', 'uncen', 'uncen', 'ada', 'statistik windows perangkat lunak analitis', 2019, 1, NULL, '2019-07-30 03:37:21', NULL),
('BUKU000091', 'KATEGORI004', 'Dasar Pengambilan Sampel Survei', 'uncen', 'uncen', 'ad', 'dasar ambil sampel survei', 2019, 1, NULL, '2019-07-30 03:39:10', NULL),
('BUKU000092', 'KATEGORI004', 'Penerapan Analisis Regresi: Sebuah Alat Penelitian', 'uncen', 'uncen', 'ada', 'terap analisis regresi alat teliti', 2019, 1, NULL, '2019-07-30 03:40:20', NULL),
('BUKU000093', 'KATEGORI004', 'Pemodelan Data Biner ', 'uncen', 'uncen', 'ada', 'model data biner', 2019, 1, NULL, '2019-07-30 03:41:21', NULL),
('BUKU000094', 'KATEGORI004', 'Metode Statistik Berbasis Data', 'uncen', 'uncen', 'ada', 'metode statistik bas data', 2019, 1, NULL, '2019-07-30 03:42:19', NULL),
('BUKU000095', 'KATEGORI004', 'Prinsip dalam Penerapan Statistik', 'uncen', 'uncen', 'ada', 'prinsip terap statistik', 2019, 2, NULL, '2019-07-30 03:43:00', NULL),
('BUKU000096', 'KATEGORI004', 'Penerapan Deret Waktu Ekonometrik', 'uncen', 'uncen', 'ada', 'terap deret ekonometrik', 2019, 1, NULL, '2019-07-30 03:45:51', NULL),
('BUKU000097', 'KATEGORI004', 'Pemodelan Persamaan Struktural : Metode alternatif Dengan Partial Least Squares (PLS)', 'uncen', 'uncen', 'ada', 'model sama struktural metode alternatif partial least squares pls', 2019, 2, NULL, '2019-07-30 03:46:59', NULL),
('BUKU000098', 'KATEGORI004', 'Cara Analisis Menggunakan SPSS dan Excel: Panduan Pengolahan Data Penelitian untuk Skripsi/Tesis', 'uncen', 'uncen', 'ada', 'analisis spss excel pandu olah data teliti skripsitesis', 2019, 1, NULL, '2019-07-30 03:48:19', NULL),
('BUKU000099', 'KATEGORI004', 'Analisis SEM-PLS dengan WarpPLS 3.0 untuk Hubungan Nonlinier dalam Penelitian Sosial dan Bisnis', 'uncen', 'uncen', 'ada', 'analisis sempls warppls 30 hubung nonlinier teliti sosial bisnis', 2019, 1, NULL, '2019-07-30 03:48:43', NULL),
('BUKU000100', 'KATEGORI004', 'Konsep dan Aplikasi Structural Equation Modeling Berbasis Varian Dalam Penelitian Bisnis', 'uncen', 'uncen', 'ada', 'konsep aplikasi structural equation modeling bas varian teliti bisnis', 2019, 2, NULL, '2019-07-30 03:49:07', NULL),
('BUKU000101', 'KATEGORI004', 'Desain dan Analisis Percobaan', 'uncen', 'uncen', 'ada', 'desain analisis coba', 2019, 12, NULL, '2019-07-30 03:50:14', NULL),
('BUKU000102', 'KATEGORI004', 'Pengantar untuk Model Regresi Logistik ', 'uncen', 'uncen', 'ada', 'antar model regresi logistik', 2019, 1, NULL, '2019-07-30 03:52:07', NULL),
('BUKU000103', 'KATEGORI004', 'Analisis Data Kategori ', 'uncen', 'uncen', 'ada', 'analisis data kategori', 2019, 1, NULL, '2019-07-30 03:53:25', NULL),
('BUKU000104', 'KATEGORI004', 'Pengantar Statistika', 'uncen', 'uncen', 'ada', 'antar statistika', 2019, 3, NULL, '2019-07-30 03:53:42', NULL),
('BUKU000105', 'KATEGORI004', 'Metode Statistika I', 'uncen', 'uncen', 'ada', 'metode statistika i', 2019, 3, NULL, '2019-07-30 03:54:08', NULL),
('BUKU000106', 'KATEGORI004', 'Metode Statistika II', 'uncen', 'uncen', 'ada', 'metode statistika ii', 2019, 3, NULL, '2019-07-30 03:54:28', NULL),
('BUKU000107', 'KATEGORI004', 'Statistika Deskriptif dalam Bidang Ekonomi dan Niaga', 'uncen', 'uncen', 'ada', 'statistika deskriptif bidang ekonomi niaga', 2019, 1, NULL, '2019-07-30 03:54:50', NULL),
('BUKU000108', 'KATEGORI004', 'Statistika Untuk Penelitian', 'uncen', 'uncen', 'ada', 'statistika teliti', 2019, 1, NULL, '2019-07-30 03:55:20', NULL),
('BUKU000109', 'KATEGORI004', 'Pengantar Ekonometrika Spasial ', 'uncen', 'uncen', 'ada', 'antar ekonometrika spasial', 2019, 1, NULL, '2019-07-30 03:56:11', NULL),
('BUKU000110', 'KATEGORI003', 'Buku Panduan untuk Penerapan Kriptografi', 'uncen', 'uncen', 'ada', 'buku pandu terap kriptografi', 2019, 1, NULL, '2019-07-30 04:05:01', NULL),
('BUKU000111', 'KATEGORI003', 'Komunikasi dan Jaringan Nirkabel', 'uncen', 'uncen', 'ada', 'komunikasi jaring nirkabel', 2019, 1, NULL, '2019-07-30 04:06:32', NULL),
('BUKU000112', 'KATEGORI003', 'Pengantar untuk Riset Operasi Edisi 8', 'uncen', 'uncen', 'ada', 'antar riset operasi edisi 8', 2019, 2, NULL, '2019-07-30 04:07:14', NULL),
('BUKU000113', 'KATEGORI003', 'Pengembangan WAP dengan WML dan WMLScript', 'uncen', 'uncen', 'ada', 'kembang wap wml wmlscript', 2019, 1, NULL, '2019-07-30 04:08:25', NULL),
('BUKU000114', 'KATEGORI003', 'Riset Operasi : Pengantar Edisi 6', 'uncn', 'uncen', 'ada', 'riset operasi antar edisi 6', 2019, 1, NULL, '2019-07-30 04:09:58', NULL),
('BUKU000115', 'KATEGORI003', 'Membuat Aplikasi Database Berbasis Web', 'uncen', 'uncen', 'ada', 'aplikasi database bas web', 2019, 1, NULL, '2019-07-30 04:10:17', NULL),
('BUKU000116', 'KATEGORI003', 'Menjadi Programer Linux dengan Mandrakelinux 10', 'uncen', 'uncen', 'ada', 'programer linux mandrakelinux 10', 2019, 1, NULL, '2019-07-30 04:11:30', NULL),
('BUKU000117', 'KATEGORI003', 'Konfigurasi SERVER LINUX dengan WEBMIN ', 'uncen', 'uncen', 'ada', 'konfigurasi server linux webmin', 2019, 1, NULL, '2019-07-30 04:11:46', NULL),
('BUKU000118', 'KATEGORI003', 'Presentasi multimedia dengan macromedia Flash\r\n', 'uncen', 'unen', 'ada', 'presentasi multimedia macromedia flash', 2019, 2, NULL, '2019-07-30 04:12:08', NULL),
('BUKU000119', 'KATEGORI003', '20 Teknik Flash Master UNTUK FLASH MX 2004 DAN FLASH PROFESSIONAL 8\r\n', 'uncen', 'uncen', 'ada', '20 teknik flash master mx 2004 professional 8', 2019, 1, NULL, '2019-07-30 04:12:29', NULL),
('BUKU000120', 'KATEGORI003', 'Penyelesaian Masalah Optimasi dengan Teknik - teknik Heuristik\r\n', 'uncen', 'uncen', 'ada', 'selesai optimasi teknik heuristik', 2019, 2, NULL, '2019-07-30 04:12:46', NULL),
('BUKU000121', 'KATEGORI003', 'PENGANTAR TOPOLOGI\r\n', 'uncen', 'uncen', 'ada', 'antar topologi', 2091, 2, NULL, '2019-07-30 04:13:11', NULL),
('BUKU000122', 'KATEGORI003', 'Mikrotik Kung Fu Kitab Manajemen Bandwidth\r\n', 'uncen', 'uncen', 'ada', 'mikrotik kung fu kitab manajemen bandwidth', 2091, 12, NULL, '2019-07-30 04:13:30', NULL),
('BUKU000123', 'KATEGORI003', 'Cara Mudah Membuat Desain Web Untuk Pemula\r\n', 'uncen', 'uncen', 'ada\r\n', 'mudah desain web mula', 2019, 1, NULL, '2019-07-30 04:13:50', NULL),
('BUKU000124', 'KATEGORI003', 'Buku Pintar Ubuntu\r\n', 'uncen', 'uncen', 'ada', 'buku pintar ubuntu', 2019, 2, NULL, '2019-07-30 04:14:11', NULL),
('BUKU000125', 'KATEGORI003', 'Ubuntu dari Zero 2\r\n', 'uncen', 'unen', 'ada', 'ubuntu zero 2', 2019, 2, NULL, '2019-07-30 04:16:17', NULL),
('BUKU000126', 'KATEGORI003', 'Bagi Programmer Pemula Pengenalan ASP.NET dan WEB MATRIX\r\n', 'uncen', 'uncen', 'ada', 'programmer mula kenal aspnet web matrix', 2019, 1, NULL, '2019-07-30 04:16:35', NULL),
('BUKU000127', 'KATEGORI003', 'Efek-efek Kreatif dalam Adobe After Effects\r\n', 'uncen', 'uncen', 'ada', 'efekefek kreatif adobe after effects', 2019, 1, NULL, '2019-07-30 04:16:55', NULL),
('BUKU000128', 'KATEGORI003', 'SENI INTERNET HACKING \r\n', 'uncen', 'uncen', 'ada', 'seni internet hacking', 2019, 2, NULL, '2019-07-30 04:17:46', NULL),
('BUKU000129', 'KATEGORI003', '(2 in 1 )1 MENIT BELAJAR DESAIN GRAFIS PHOTOSHOP & CORELDRAW\r\n', 'uncen', 'uncen', 'ada', '2 in 1 menit ajar desain grafis photoshop coreldraw', 2019, 2, NULL, '2019-07-30 04:18:07', NULL),
('BUKU000130', 'KATEGORI003', 'Membuat Aplikasi Penggajian dengan Macro Excel\r\n', 'uncen', 'uncen', 'ada', 'aplikasi gaji macro excel', 2019, 1, NULL, '2019-07-30 04:18:25', NULL),
('BUKU000131', 'KATEGORI003', 'Switch & Multilayer Switch Cisco Implementasi Jaringan Akses\r\n', 'uncen', 'uncen', 'ada', 'switch multilayer cisco implementasi jaring akses', 2019, 1, NULL, '2019-07-30 04:18:45', NULL),
('BUKU000132', 'KATEGORI003', 'COMPUTER TROJAN (Belajar TrojanMulai dari NOL)\r\n', 'uncen', 'uncen', 'ada\r\n', 'computer trojan ajar trojanmulai nol', 2019, 1, NULL, '2019-07-30 04:19:07', NULL),
('BUKU000133', 'KATEGORI003', 'PEMROGRAMAN BASIC EDISI KEDUA \r\n', 'uncen', 'uncen', 'ada', 'pemrograman basic edisi', 2019, 1, NULL, '2019-07-30 04:19:46', NULL),
('BUKU000134', 'KATEGORI003', 'Koleksi Program VB.NET untuk Tugas Akhir dan Skripsi\r\n', 'uncen', 'uncen', 'ada', 'koleksi program vbnet tugas skripsi', 2019, 2, NULL, '2019-07-30 04:20:04', NULL),
('BUKU000135', 'KATEGORI003', 'Sistem Kontrol via Web dengan CGI,PHP, dan Ajax\r\n', 'uncen', 'uncen', 'ada', 'sistem kontrol via web cgiphp ajax', 2019, 3, NULL, '2019-07-30 04:20:24', NULL),
('BUKU000136', 'KATEGORI003', 'Microsoft Visual Basic 6.0 untuk Pemula\r\n', 'uncen', 'uncen', 'ada', 'microsoft visual basic 60 mula', 2018, 2, NULL, '2019-07-30 04:20:46', NULL),
('BUKU000137', 'KATEGORI003', 'Belajar Otodidak Java Dengan NetBeans 6.0\r\n', 'uncen', 'uncen', 'ada', 'ajar otodidak java netbeans 60', 2019, 2, NULL, '2019-07-30 04:21:07', NULL),
('BUKU000138', 'KATEGORI003', 'Ubuntu dari Zero 1\r\n', 'uncen', 'uncen', 'ada', 'ubuntu zero 1', 2019, 1, NULL, '2019-07-30 04:21:36', NULL),
('BUKU000139', 'KATEGORI003', 'Panduan Praktis Membangun LAN\r\n', 'uncen', 'uncen', 'ada', 'pandu praktis bangun lan', 2019, 1, NULL, '2019-07-30 04:21:58', NULL),
('BUKU000140', 'KATEGORI003', 'e-Government IN ACTION RAGAM KASUS IMPLEMENTASI SUKSES DI BERBAGAI BELAHAN DUNIA\r\n', 'uncen', 'uncen', 'ada', 'egovernment in action ragam implementasi sukses bahan dunia', 2019, 1, NULL, '2019-07-30 04:22:20', NULL),
('BUKU000141', 'KATEGORI003', 'Seri Kursus Singkat, langkah demi langkah untuk pemograman DELPHI 2010', 'uncen', 'uncen', 'ada', 'seri kursus singkat langkah pemograman delphi 2010', 2019, 2, NULL, '2019-07-30 04:24:00', NULL),
('BUKU000142', 'KATEGORI003', 'Elektronika Komputer Digital Pengantar Mikrokomputer\r\n', 'uncen', 'uncen', 'ada', 'elektronika komputer digital antar mikrokomputer', 2019, 2, NULL, '2019-07-30 04:24:20', NULL),
('BUKU000143', 'KATEGORI003', 'ASSEMBLER (BAHASA RAKITAN) Menguasai Prinsip-Prinsip Pemrograman Bahasa Rakitan pada komputer dengan emu8086 *Penuntun Memahami Operasi Kerja Komputer (Mikroprosesor) *Dilengkapi Soal-soal Latihan,Solusi dan Pembahasan\r\n', 'uncen', 'uncen', 'ada', 'assembler bahasa rakit kuasa prinsipprinsip pemrograman komputer emu8086 tuntun paham operasi kerja mikroprosesor lengkap soalsoal latihansolusi bahas', 2019, 2, NULL, '2019-07-30 04:24:49', NULL),
('BUKU000144', 'KATEGORI003', 'Riset Operasi dalam Pendekatan Algoritmis edisi 2 \r\n', 'uncne', 'uncen', 'ada', 'riset operasi dekat algoritmis edisi 2', 2019, 2, NULL, '2019-07-30 04:25:05', NULL),
('BUKU000145', 'KATEGORI003', 'Membangun Layanan Blog sendiri dengan Word Press Multi User Untuk Institusi Pendidikan, Pemerintahan, Perkantoran, Organisasi, dan Komunitas\r\n', 'uncen', 'uncen', 'ada', 'bangun layan blog word press multi user institusi didik perintah kantor organisasi komunitas', 2019, 2, NULL, '2019-07-30 04:25:30', NULL),
('BUKU000146', 'KATEGORI003', 'Seni Teknik Hacking UNCEN SORED 2\r\n', 'uncen', 'uncen', 'ada', 'seni teknik hacking uncen sored 2', 2019, 2, NULL, '2019-07-30 04:25:54', NULL),
('BUKU000147', 'KATEGORI003', 'JARINGAN KOMPUTER DENGAN TCP/IP Membahas Konsep Dan Teknik Implementasi TCP/IP Dalam Jaringan Komputer\r\n', 'uncen', 'uncen', 'ada\r\n', 'jaring komputer tcpip bahas konsep teknik implementasi', 2019, 2, NULL, '2019-07-30 04:26:11', NULL),
('BUKU000148', 'KATEGORI003', 'Merancang Bangun dan Mengkonfigurasi Jaringan WAN dengan Packet Tracer\r\n', 'uncen', 'uncen', 'ada\r\n', 'rancang bangun konfigurasi jaring wan packet tracer', 2019, 2, NULL, '2019-07-30 04:26:31', NULL),
('BUKU000149', 'KATEGORI003', 'Aplikasi Penggajian dengan Java untuk  Pemula\r\n', 'uncen', 'uncen', 'ada', 'aplikasi gaji java mula', 2019, 1, NULL, '2019-07-30 04:26:47', NULL),
('BUKU000150', 'KATEGORI003', 'Teknik Rahasia MERAKIT KOMPUTER Sendiri Tanpa Komputer\r\n', 'uncen', 'uncen', 'ada', 'teknik rahasia rakit komputer', 2019, 1, NULL, '2019-07-30 04:27:02', NULL),
('BUKU000151', 'KATEGORI001', 'Aljabar Abstrak Edisi 2', 'uncen', 'uncen', 'ada', 'aljabar abstrak edisi 2', 2019, 2, NULL, '2019-07-30 04:27:56', NULL),
('BUKU000152', 'KATEGORI001', 'Latihan Awal dalam Persamaan Diferensial dengan Aplikasi Pemodelan ', 'uncen', 'uncen', 'ada', 'latih sama diferensial aplikasi model', 2019, 2, NULL, '2019-07-30 04:29:26', NULL),
('BUKU000153', 'KATEGORI001', 'Garis Besar Schaum Seri Teori dan Masalah Matriks', 'uncen', 'uncen', 'ada', 'garis schaum seri teori matriks', 2019, 2, NULL, '2019-07-30 04:31:17', NULL),
('BUKU000154', 'KATEGORI001', 'Persamaa DIferensial Biasa dan Parsial: Pengantar Sistem Dinamis', 'uncen', 'uncen', 'ada', 'persamaa diferensial parsial antar sistem dinamis', 2019, 2, NULL, '2019-07-30 04:32:49', NULL),
('BUKU000155', 'KATEGORI001', 'Persamaan Diferensial: Perspektif Pemodelan Edisi Pendahuluan', 'uncen', 'uncen', 'ada', 'sama diferensial perspektif model edisi dahulu', 2019, 1, NULL, '2019-07-30 04:34:40', NULL),
('BUKU000156', 'KATEGORI001', 'Persamaan Diferensial Dasar dan Masalah Nilai Batas', 'uncen', 'uncen', 'ada', 'sama diferensial dasar nilai batas', 2019, 2, NULL, '2019-07-30 04:35:34', NULL),
('BUKU000157', 'KATEGORI001', 'Teori dan Latihan dalam Persamaan Diferensial Biasa', 'uncen', 'uncen', 'ada', 'teori latih sama diferensial', 2019, 2, NULL, '2019-07-30 04:36:10', NULL),
('BUKU000158', 'KATEGORI001', 'Buku Panduan untuk Tabel dan Rumus Matematika', 'uncen', 'uncen', 'ada', 'buku pandu tabel rumus matematika', 2019, 2, NULL, '2019-07-30 04:36:49', NULL),
('BUKU000159', 'KATEGORI001', 'Matriks Polinomial', 'uncen', 'uncen', 'ada', 'matriks polinomial', 2019, 2, NULL, '2019-07-30 04:37:17', NULL),
('BUKU000160', 'KATEGORI001', 'Catatan Kuliah dalam Sistem Ekonomi dan Matematika', 'uncen', 'uncnen', 'ada', 'catat kuliah sistem ekonomi matematika', 2019, 2, NULL, '2019-07-30 04:38:10', NULL),
('BUKU000161', 'KATEGORI001', 'ALat untuk Perhitungan Keuangan', 'uncen', 'uncen', 'ada', 'alat hitung uang', 2019, 2, NULL, '2019-07-30 04:39:17', NULL),
('BUKU000162', 'KATEGORI001', 'Teori dan Latihan dalam Ekonomi Sapsial\r\n', 'uncen', 'uncen', 'ada', 'teori latih ekonomi sapsial', 2019, 2, NULL, '2019-07-30 04:39:53', NULL),
('BUKU000163', 'KATEGORI001', 'Buku Panduan untuk Variabel Kompleks', 'uncen', 'uncen', 'ada', 'buku pandu variabel kompleks', 2019, 1, NULL, '2019-07-30 04:40:48', NULL),
('BUKU000164', 'KATEGORI001', 'Latihan Awal dalam Aljabar Abstak Edisi 6', 'uncen', 'uncen', 'ada', 'latih aljabar abstak edisi 6', 2019, 2, NULL, '2019-07-30 04:41:20', NULL),
('BUKU000165', 'KATEGORI001', 'Teori Antrian Pendekatan Aljabar Linier', 'uncen', 'uncen', 'ada', 'teori antri dekat aljabar linier', 2019, 2, NULL, '2019-07-30 04:42:23', NULL),
('BUKU000166', 'KATEGORI001', 'Latihan dalam Pemodelan Linier', 'uncen', 'uncen', 'ada', 'latih model linier', 22019, 2, NULL, '2019-07-30 04:43:07', NULL),
('BUKU000167', 'KATEGORI001', 'Pemodelan Linier', 'uncen', 'uncen', 'ada', 'model linier', 2019, 2, NULL, '2019-07-30 04:43:28', NULL),
('BUKU000168', 'KATEGORI001', 'Aljabar Menengah dengan Aplikasi Edisi 4', 'uncen', 'uncen', 'ada', 'aljabar tengah aplikasi edisi 4', 2019, 2, NULL, '2019-07-30 04:44:15', NULL),
('BUKU000169', 'KATEGORI001', 'Modul Ring dan Kategori Edisi 2\r\n', 'uncen', 'uncen', 'ada', 'modul ring kategori edisi 2', 2019, 1, NULL, '2019-07-30 04:47:23', NULL),
('BUKU000170', 'KATEGORI001', 'KALKULUS PERUBAH BANYAK\r\n', 'uncen', 'uncen', 'ada', 'kalkulus ubah', 2019, 2, NULL, '2019-07-30 04:48:01', NULL),
('BUKU000171', 'KATEGORI001', 'LOGIKA MATEMATIKA\r\n', 'uncen', 'uncen', 'ada', 'logika matematika', 2019, 2, NULL, '2019-07-30 04:49:03', NULL),
('BUKU000172', 'KATEGORI001', 'LOGIKA DAN TEORI HIMPUNAN\r\n', 'uncen', 'uncen', 'ada', 'logika teori himpun', 2019, 2, NULL, '2019-07-30 04:49:25', NULL),
('BUKU000173', 'KATEGORI001', 'MATEMATIKA DASAR Untuk Perguruan Tinggi\r\n', 'uncen', 'uncen', 'ada', 'matematika dasar guru', 2019, 2, NULL, '2019-07-30 04:49:42', NULL),
('BUKU000174', 'KATEGORI001', 'DASAR - DASAR OPERATIONS RESEARCH\r\n', 'uncen', 'uncen', 'ada', 'dasar operations research', 2019, 1, NULL, '2019-07-30 04:50:06', NULL),
('BUKU000175', 'KATEGORI001', 'Pengantar analisis kompleks TERBITAN PERBAIKAN\r\n', 'uncen', 'uncen', 'ada', 'antar analisis kompleks terbit baik', 2019, 2, NULL, '2019-07-30 04:50:22', NULL),
('BUKU000176', 'KATEGORI001', 'Metode Numerik\r\n', 'uncen', 'uncen', 'ada', 'metode numerik', 2019, 2, NULL, '2019-07-30 04:50:42', NULL),
('BUKU000177', 'KATEGORI001', 'LOGIKA SUATU PENGANTAR\r\n', 'uncen', 'uncen', 'ada', 'logika antar', 2, 2, NULL, '2019-07-30 04:51:07', NULL),
('BUKU000178', 'KATEGORI001', 'Matematika Keuangan Untuk Perguruang Tinggi\r\n', 'uncen', 'uncen', 'uncen', 'matematika uang perguruang', 2019, 1, NULL, '2019-07-30 04:51:35', NULL),
('BUKU000179', 'KATEGORI001', 'Matematika Keuangan\r\n', 'uncne', 'uncen', 'uncen', 'matematika uang', 2019, 2, NULL, '2019-07-30 04:51:54', NULL),
('BUKU000180', 'KATEGORI001', 'Pengantar Matematika Epidemiologi\r\n', 'uncen', 'uncen', 'ada', 'antar matematika epidemiologi', 2018, 2, NULL, '2019-07-30 04:52:14', NULL),
('BUKU000181', 'KATEGORI001', 'Kalkulus 2\r\n', 'uncen', 'uncen', 'ada', 'kalkulus 2', 2019, 2, NULL, '2019-07-30 04:52:32', NULL),
('BUKU000182', 'KATEGORI001', 'Metode Numerik\r\n', 'uncen', 'unecn', 'ada', 'metode numerik', 2018, 2, NULL, '2019-07-30 04:52:52', NULL),
('BUKU000183', 'KATEGORI001', 'Persamaan Diferensial Biasa\r\n', 'uncen', 'uncen', 'ada', 'sama diferensial', 2019, 1, NULL, '2019-07-30 04:53:12', NULL),
('BUKU000184', 'KATEGORI001', 'Aljabar Linier Elementer Versi Aplikasi\r\n', 'uncen', 'uncen', 'ada', 'aljabar linier elementer versi aplikasi', 2019, 2, NULL, '2019-07-30 04:53:48', NULL),
('BUKU000185', 'KATEGORI001', 'Matriks Persamaan Linier dan Pemrograman Linier\r\n', 'uncen', 'uncen', 'ada', 'matriks sama linier pemrograman', 2019, 2, NULL, '2019-07-30 04:54:16', NULL),
('BUKU000186', 'KATEGORI001', 'Buku Ajar Persamaan Diferensial\r\n', 'uncen', 'uncen', 'ada', 'buku ajar sama diferensial', 2019, 2, NULL, '2019-07-30 04:54:32', NULL),
('BUKU000187', 'KATEGORI001', 'Matematika Diskrit\r\n', 'uncen', 'uncen', 'ada', 'matematika diskrit', 2019, 2, NULL, '2019-07-30 04:54:50', NULL),
('BUKU000188', 'KATEGORI001', 'Persamaan Diferensial Biasa\r\n', 'uncen', 'uncen', 'ada', 'sama diferensial', 2019, 2, NULL, '2019-07-30 04:55:13', NULL),
('BUKU000189', 'KATEGORI001', 'Geometri Analitik Bidang Ruang\r\n', 'uncen', 'uncen', 'ada', 'geometri analitik bidang ruang', 2018, 2, NULL, '2019-07-30 04:55:32', NULL),
('BUKU000190', 'KATEGORI001', 'Matematika Diskrit dan Aplikasinya\r\n', 'uncen', 'uncne', 'ada', 'matematika diskrit aplikasi', 2017, 2, NULL, '2019-07-30 04:55:49', NULL),
('BUKU000191', 'KATEGORI001', 'Matematika Diskrit\r\n', 'uncen', 'uncen', 'ada', 'matematika diskrit', 2019, 2, NULL, '2019-07-30 04:56:08', NULL),
('BUKU000192', 'KATEGORI001', 'Pengantar Teori Bilangan\r\n', 'uncen', 'uncen', 'ada', 'antar teori bilang', 2019, 2, NULL, '2019-07-30 04:56:26', NULL),
('BUKU000193', 'KATEGORI001', 'Analisis Ril', 'uncen', 'uncen', 'ada', 'analisis ril', 2019, 2, NULL, '2019-07-30 04:57:03', NULL),
('BUKU000194', 'KATEGORI001', 'Analisis Ril dan Kompleks', 'uncen', 'uncen', 'ada', 'analisis ril kompleks', 2019, 2, NULL, '2019-07-30 04:57:27', NULL),
('BUKU000195', 'KATEGORI001', 'Variabel Ril', 'Uncen', 'uncen', 'ada', 'variabel ril', 2019, 2, NULL, '2019-07-30 04:57:56', NULL),
('BUKU000196', 'KATEGORI004', 'Cara Praktis Melakukan Uji Validitas Alat Ukur Penelitian', 'uncen', 'uncen', 'ada', 'praktis uji validitas alat ukur teliti', 2019, 1, NULL, '2019-07-30 04:58:26', NULL),
('BUKU000197', 'KATEGORI004', 'Statistik\r\n', 'uncen', 'uncen', 'ada', 'statistik', 2019, 2, NULL, '2019-07-30 04:58:44', NULL),
('BUKU000198', 'KATEGORI004', 'Aplikasi Analisis Mulivariate Dengan Program SPSS\r\n', 'uncen', 'uncen', 'ada', 'aplikasi analisis mulivariate program spss', 2019, 1, NULL, '2019-07-30 04:59:03', NULL),
('BUKU000199', 'KATEGORI001', 'Matematika Diskrit\r\n', 'uncen', 'uncen', 'ada', 'matematika diskrit', 2019, 2, NULL, '2019-07-30 04:59:30', NULL),
('BUKU000200', 'KATEGORI001', 'Aljabar Linier dan Aplikasinya\r\n', 'uncen', 'uncen', 'ada', 'aljabar linier aplikasi', 2019, 1, NULL, '2019-07-30 05:00:01', NULL),
('BUKU000201', 'KATEGORI001', 'SERI BUKU SCHAUM TEORI DAN SOAL-SOAL Riset  OPERASI \r\n', 'uncen', 'uncen', 'ada', 'seri buku schaum teori soalsoal riset operasi', 2019, 2, NULL, '2019-07-30 05:00:41', NULL);

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
('20150511014003', 'Abdul Fiqih', 'abdulfiqih@gmail.com', 'abdulf11', 1, '20150511014003.jpg', '2019-08-02 02:43:11'),
('20150511014004', 'Andreas Reniban', 'andreasreniban@gmail.com', 'andreasr11', 1, '20150511014004.jpg', '2019-04-21 03:22:16'),
('20150511014005', 'Rekha Ayu', 'anggraenirekha@gmail.com', 'rekha', 1, '20150511014005.png', '2019-08-02 16:12:25');

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
  `denda` int(10) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_pinjaman`, `id_buku`, `nim`, `nip`, `tgl_pinjam`, `tgl_selesai`, `tgl_kembali`, `status_pinjaman`, `acc`, `notif_email`, `denda`, `keterangan`) VALUES
(3, 'BUKU000001', '20150511014005', NULL, '2019-08-02', '2019-08-03', '2019-08-06', 1, 1, 1, 22500, 'Untuk Skripsi');

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
(1, 'admin', 'admin11', 0, '2019-08-02 16:32:58');

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
  MODIFY `id_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
