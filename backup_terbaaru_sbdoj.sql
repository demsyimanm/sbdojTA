-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 07:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `detail`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Join', 'Join untuk menggabungkan 2 tabel', NULL, '2017-03-05 21:17:24', '2017-03-05 21:22:30'),
(2, 'AA', 'adas', '2017-03-05 21:24:35', '2017-03-05 21:24:31', '2017-03-05 21:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `dbversion`
--

CREATE TABLE `dbversion` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbversion`
--

INSERT INTO `dbversion` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Oracle SQL', '2016-11-17 06:46:44', '0000-00-00 00:00:00'),
(2, 'MySQL', '2016-11-17 06:46:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_akhir` datetime DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listdb_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `konten`, `waktu_mulai`, `waktu_akhir`, `kelas`, `listdb_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(32, 'Praktikum Modul 2', 'Gameplay :\r\n1. Kerjakan soal dengan menggunakan Sqldeveloper\r\n2. Copy query ke field yang telah disediakan di halaman submission\r\n\r\nPeraturan :\r\n1. Dilarang mencontek / meng-copy jawaban teman, karena akan ketahuan siapa yang mencontek\r\n2. Kerjakan dengan', '2010-08-11 00:00:00', '2017-01-10 20:00:00', 'A', 3, '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(33, 'coba', 'dad', '2016-12-31 20:36:00', '2016-12-13 20:36:00', 'D', 13, '2016-12-13 06:37:22', '0000-00-00 00:00:00', '2016-12-13 06:37:22'),
(34, 'Praktikum', 'Event praktikum SBD 2016 menggunakan database SIAKAD', '2016-12-13 20:34:45', '2016-12-31 20:34:45', 'D', 13, NULL, '0000-00-00 00:00:00', '2016-12-23 19:46:39'),
(35, 'Praktikum 3', 'Praktikum 3 mengenai query select', '2016-12-28 19:33:15', '2017-04-28 19:33:15', 'E', 13, NULL, '0000-00-00 00:00:00', '2017-02-23 02:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `listdb`
--

CREATE TABLE `listdb` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `db_username` varchar(50) DEFAULT NULL,
  `db_password` varchar(50) DEFAULT NULL,
  `db_name` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dbversion_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listdb`
--

INSERT INTO `listdb` (`id`, `ip`, `db_username`, `db_password`, `db_name`, `status`, `dbversion_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, '10.151.63.12', 'sbdoj', 'wdvrdx24680', 'siakad', 1, 1, '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(4, '10.151.34.248', 'siakad', 'pusing3003', 'siakad praktikum', 0, 1, '2016-12-13 05:11:35', '0000-00-00 00:00:00', '2016-12-13 05:11:35'),
(5, '10.151.34.248', 'siakad', 'pusing3003', 'xe_siakad', 0, 1, '2016-12-13 05:11:33', '0000-00-00 00:00:00', '2016-12-13 05:11:33'),
(6, '10.151.34.248', 'siakad', 'pusing3003', 'xe_siakad', 0, 2, '2016-12-13 05:11:37', '0000-00-00 00:00:00', '2016-12-13 05:11:37'),
(7, '10.151.34.248', 'siakad', 'pusing3003', 'siakad praktikum', 1, 1, '2016-12-13 05:24:42', '0000-00-00 00:00:00', '2016-12-13 05:24:42'),
(8, '10.151.34.248', 'siakad', 'pusing3003', 'siakad praktikum', 0, 1, '2016-12-13 05:27:17', '0000-00-00 00:00:00', '2016-12-13 05:27:17'),
(9, '10.151.34.248', 'siakad', 'pusing3003', 'xe_siakad', 0, 1, '2016-12-13 05:27:19', '0000-00-00 00:00:00', '2016-12-13 05:27:19'),
(10, '10.151.34.248', 'siakad', 'pusing3003', 'xe_siakad', 0, 1, '2016-12-13 05:27:21', '0000-00-00 00:00:00', '2016-12-13 05:27:21'),
(11, '10.151.34.248', 'siakad', 'pusing3003', 'SIAKAD', 1, 1, '2016-12-13 06:15:45', '0000-00-00 00:00:00', '2016-12-13 06:15:45'),
(12, '10.151.34.248', 'siakad', 'pusing3003', 'xe_siakad', 0, 1, '2016-12-13 06:18:19', '0000-00-00 00:00:00', '2016-12-13 06:18:19'),
(13, '10.151.63.12', 'sbdoj', 'wdvrdx24680', 'siakad', 0, 1, NULL, '0000-00-00 00:00:00', '2017-02-16 23:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_16_125129_databasev1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jawaban` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `event_id`, `judul`, `konten`, `jawaban`, `deleted_at`, `created_at`, `updated_at`) VALUES
(58, '32', 'easy 1', 'Tampilkan NRP,nama, dan Tempat lahir mahasiwa yang mendapatkan nilai E pada FRS urutkan berdasarkan NRP secara descending', 'SELECT DISTINCT f.nrp, m.nama, m.tempat_lhr FROM mahasiswa m, frs f WHERE m.NRP = f.NRP and nilai_huruf = \'E\' ORDER BY f.NRP DESC;', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(59, '32', 'easy 2', 'Tampilkan semua data dosen yang mengajar mata kuliah SISTEM INFORMASI urutkan berdasarkan NIP secara ascending', 'select distinct d.*\nfrom dosen d, mk_tawar mkt\nwhere d.NIP = mkt.NIP\nand mkt.ID_MK in (select ID_MK from matakuliah where mata_kuliah = \'SISTEM INFORMASI\')\norder by d.NIP ASC', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(60, '32', 'medium 1', 'Tampilkan semua data mahasiswa yang mengambil mata kuliah ARSITEKTUR KOMPUTER yang diajar oleh Ibu Sarwosri, S.Kom urutkan berdasarkan NRP secara ascending', 'select distinct m.*\nfrom mahasiswa m, dosen d, matakuliah mk, mk_tawar mkt, frs f\nwhere m.NRP = f.NRP\nand f.ID_MK_TAWAR = mkt.ID_MK_TAWAR\nand mk.ID_MK = mkt.ID_MK\nand d.NIP = mkt.NIP\nand mk.ID_MK in (select ID_MK from matakuliah where mata_kuliah = \'ARSITEKTUR KOMPUTER\')\nand d.NIP = (select NIP from dosen where nama LIKE \'%Sarwosri%\' )\norder by m.NRP ASC', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(61, '32', 'medium 2', 'Tampilkan nrp mahasiswa malas(tidak pernah mengambil FRS selama kuliah) dan lahir di MALANG(KOTA MALANG DAN KABUPATEN MALANG) TERURUT SESUAI NRP DESCENCDING)', 'SELECT NRP\nFROM MAHASISWA\nWHERE NRP NOT IN (\n	SELECT MAHASISWA.NRP \n	FROM MAHASISWA, FRS, MK_TAWAR\n	WHERE MAHASISWA.NRP = FRS.NRP AND MK_TAWAR.ID_MK_TAWAR = FRS.ID_MK_TAWAR\n) AND UPPER(MAHASISWA.TEMPAT_LHR) LIKE \'%MALANG%\'\nORDER BY NRP DESC', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(63, '32', 'hard 1', 'Tampilkan semua data mata kuliah beserta nilai hurufnya pada data FRS yang memiliki nilai angka di atas rata-rata nilai angka pada data nilai serta urutkan berdasarkan ID mata kuliah secara ascending dan berdasarkan nilai huruf secara descending, dan jang', 'select distinct mk.*, f.nilai_huruf\nfrom matakuliah mk, mk_tawar mkt, frs f\nwhere mk.ID_MK = mkt.ID_MK\nand mkt.ID_MK_TAWAR = f.ID_MK_TAWAR\nand f.NILAI_HURUF in (select NILAI_HURUF from NILAI where nilai_angka > (select avg(nilai_angka) from nilai))\norder by mk.ID_MK ASC, f.nilai_huruf DESC;', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(98, '32', 'hard 2', 'coba', 'select distinct mk.*, f.nilai_huruf\r\nfrom matakuliah mk, mk_tawar mkt, frs f\r\nwhere mk.ID_MK = mkt.ID_MK\r\nand mkt.ID_MK_TAWAR = f.ID_MK_TAWAR\r\nand f.NILAI_HURUF in (select NILAI_HURUF from NILAI where nilai_angka > (select avg(nilai_angka) from nilai))\r\norder by mk.ID_MK ASC, f.nilai_huruf DESC;', '2016-12-13 06:18:18', '0000-00-00 00:00:00', '2016-12-13 06:18:18'),
(99, '34', '1A. EASY', 'Tampilkan nilai rata - rata mahasiswa pada semester 2', 'select avg(n.nilai_angka)\r\nfrom mk_tawar mkt, nilai n, frs f\r\nwhere mkt.semester = \'2\' and mkt.id_mk=f.id_mk and f.nilai_huruf=n.nilai_huruf;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:36:32'),
(100, '34', '2A. EASY', 'Tampilkan data dosen lengkap yang mengajar dengan kode mata kuliah \'IF1409\' dan mahasiswa yang mengambil mata kuliah tersebut mendapat nilai \'B\'', 'select distinct dsn.*\r\nfrom dosen dsn, mahasiswa mhs, frs f, matakuliah mk, mk_tawar mkt\r\nwhere  dsn.nip= mkt.nip and mkt.id_mk= f.id_mk and f.nrp=mhs.nrp and mk.id_mk=mkt.id_mk and mk.id_mk=\'IF1409\' and f.nilai_huruf=\'B\'\r\norder by dsn.nip asc;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:37:05'),
(101, '34', '3A. EASY', 'Tampilkan nip, tahun, dan mata kuliah yang diampu oleh setiap dosen. Tidak ada data ganda. Data diurutkan berdasarkan urutan atribut yang diminta.', 'select distinct d.nip, f.tahun, mk.MATA_KULIAH\r\nfrom frs f, mk_tawar mt, MATAKULIAH mk, dosen d\r\nwhere\r\nf.ID_MK = mt.ID_MK and\r\nmt.NIP = d.NIP and\r\nmt.ID_MK = mk.ID_MK\r\norder by d.nip, f.tahun, mk.mata_kuliah;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:38:05'),
(102, '34', '4A. MEDIUM', 'Tampilkan nama mahasiswa, nilai huruf, mata kuliah dan nilai minimal dari mahasiswa yg lulus pada semester 1. Urutkan berdasrkan nama mahasiswa', 'select distinct mhs.nama, f.nilai_huruf, mk.mata_kuliah, mk.nilai_min\r\nfrom mahasiswa mhs, frs f, matakuliah mk, mk_tawar mkt\r\nwhere mhs.nrp= f.nrp and f.id_mk= mkt.id_mk and mkt.id_mk= mk.id_mk and mkt.semester=\'1\' and f.nilai_huruf < mk.nilai_min\r\norder by mhs.nama asc;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:38:31'),
(103, '34', '5A. MEDIUM', 'Tampilkan (dengan urut) nip, tahun, mata kuliah, dan rata-rata nilai mata kuliah dari setiap dosen di setiap tahun dan pada setiap mata kuliah yang diampu. Agar lebih mudah, nilai rata-rata dibulatkan menjadi maksimal 2 digit dibelakang koma. Data diurutkan berdasarkan atribut yang diminta.', 'select d.nip, f.tahun, mk.MATA_KULIAH, round(avg(n.nilai_angka),2) as Average\r\nfrom frs f, mk_tawar mt, MATAKULIAH mk, dosen d, nilai n\r\nwhere\r\nf.ID_MK = mt.ID_MK and\r\nmt.NIP = d.NIP and\r\nmt.ID_MK = mk.ID_MK and\r\nf.NILAI_HURUF = n.NILAI_HURUF\r\ngroup by d.nip, f.tahun, mk.MATA_KULIAH\r\norder by d.nip, f.tahun, mk.mata_kuliah, average;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:39:12'),
(104, '34', '6A. HARD (BELUM BENER)', 'Tampilkan TAHUN_ANGKATAN, SEMESTER (1 untuk ganjil, 2 untuk genap), dan IPS TERTINGGI berdasarkan TAHUN_ANGKATAN dan SEMESTER diurutkan berdasarkan TAHUN_ANGKATAN dari kecil ke besar dan SEMESTER dari kecil ke besar.\r\nCatatan: semester 3 menjadi semester 1 karena ganjil. Tahun angkatan diambil dari NRP mahasiswa.', 'SELECT TAHUN_ANGKATAN, CASE SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,MAX(IPS) AS IPS\r\nFROM (SELECT FRS.NRP AS NRP_MHS, CASE MK_TAWAR.SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,\r\nCASE SUBSTR(FRS.NRP,3,2) WHEN \'95\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'96\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'97\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'98\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'99\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2))\r\nELSE CONCAT(20,SUBSTR(FRS.NRP,3,2)) END AS TAHUN_ANGKATAN,\r\nROUND(SUM(NILAI.NILAI_ANGKA*SKS)/SUM(SKS),2) AS IPS\r\nFROM FRS, NILAI, MATAKULIAH, MK_TAWAR                   \r\nWHERE FRS.NILAI_HURUF=NILAI.NILAI_HURUF\r\nAND MK_TAWAR.ID_MK=MATAKULIAH.ID_MK AND FRS.ID_MK= MK_TAWAR.ID_MK\r\nGROUP BY FRS.NRP, MK_TAWAR.SEMESTER\r\nORDER BY TAHUN_ANGKATAN ASC,IPS DESC, MK_TAWAR.SEMESTER ASC)\r\nGROUP BY TAHUN_ANGKATAN, SEMESTER\r\nORDER BY TAHUN_ANGKATAN, SEMESTER;', NULL, '0000-00-00 00:00:00', '2016-12-28 05:39:52'),
(105, '34', '1B. EASY', 'Tampilkan data nip dan nama dosen yang mengajar mahasiswa yang pada namanya mengandung huruf u pada karakter ke-4, urutkan berdasarkan nip.', 'select DISTINCT dsn.nip, dsn.nama\nfrom dosen dsn, mahasiswa mhs, frs f, mk_tawar mkt  \nwhere dsn.nip=mkt.nip and mkt.id_mk=f.id_mk and f.nrp=mhs.nrp and mhs.nama like \'___u%\' \norder by dsn.nip asc; ', NULL, '0000-00-00 00:00:00', '2016-12-28 05:40:17'),
(106, '34', '2B. EASY', 'Tampilkan data mata kuliah yang diambil oleh mahasiswa yang lahir pada bulan september, urutkan descending berdasarkan id matakuliah.', 'select DISTINCT mk.*\r\nfrom mahasiswa mhs, matakuliah mk, mk_tawar mkt, frs f \r\nwhere mhs.nrp= f.nrp and f.id_mk= mkt.id_mk and mkt.id_mk=mk.id_mk and to_char(mhs.tgl_lhr,\'MM\')=9 \r\norder by mk.id_mk desc; ', NULL, '0000-00-00 00:00:00', '2016-12-13 11:25:49'),
(107, '34', '3B. EASY', 'Tampilkan nama dosen dan rata-rata nilai mata kuliah yang pernah diampu. Urutkan berdasarkan nilai rata-rata secara descending', 'select d.nama, round(avg(n.nilai_angka), 2) as aver\r\nfrom dosen d, frs s , nilai n, matakuliah m , mk_tawar mt\r\nwhere \r\ns.id_mk = m.id_mk and s.nilai_huruf = n.nilai_huruf\r\nand mt.id_mk = s.id_mk and d.nip = mt.nip\r\ngroup by d.nama\r\norder by aver desc', NULL, '0000-00-00 00:00:00', '2016-12-28 05:42:03'),
(108, '34', '4B. MEDIUM', 'Tampilkan tahun dan mata kuliah yang memiliki rata-rata tertinggi dalam setiap tahun dan setiap matakuliah. Urutkan berdasarkan tahun secara descending.', 'select k.tahun, k.mata_kuliah\r\nfrom\r\n(select f.tahun, m.mata_kuliah, avg(n.nilai_angka) as aver\r\nfrom frs f, matakuliah m, nilai n \r\nwhere f.id_mk = m.id_mk and n.nilai_huruf = f.nilai_huruf\r\ngroup by f.tahun, m.mata_kuliah) k\r\nwhere k.aver = (select max(r.aver)\r\nfrom\r\n(select f.tahun, m.mata_kuliah, avg(n.nilai_angka) as aver\r\nfrom frs f, matakuliah m, nilai n \r\nwhere f.id_mk = m.id_mk and n.nilai_huruf = f.nilai_huruf\r\ngroup by f.tahun, m.mata_kuliah ) r)\r\norder by k.tahun desc;', NULL, '0000-00-00 00:00:00', '2016-12-13 11:51:17'),
(109, '34', '5B. MEDIUM (BELUM BENER)', 'Tampilkan nrp, nama, dan sks tempuh mahasiswa selama kuliah yang sks tempuhnya tidak kurang dari 100 sks.', 'select m.nrp, m.nama, sum(mk.sks) as skstempuh\r\nfrom mahasiswa m, frs f, matakuliah mk\r\nwhere m.nrp=f.nrp and mk.id_mk= f.id_mk\r\ngroup by m.nrp, m.nama\r\nHAVING sum(mk.sks) >= 100;', NULL, '0000-00-00 00:00:00', '2016-12-13 11:55:20'),
(110, '34', '6B. HARD (BELUM BENER)', 'Tampilkan TAHUN_ANGKATAN, SEMESTER (1 untuk ganjil, 2 untuk genap), dan IPS rata-rata berdasarkan TAHUN_ANGKATAN dan SEMESTER diurutkan berdasarkan TAHUN_ANGKATAN dari kecil ke besar dan IPS rata-rata dari besar ke kecil\r\nCatatan: semester 3 menjadi semester 1 karena ganjil. Tahun angkatan diambil dari NRP mahasiswa.', 'SELECT TAHUN_ANGKATAN, CASE SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,ROUND(AVG(IPS),2) AS IPS\r\nFROM (SELECT FRS.NRP AS NRP_MHS, CASE MK_TAWAR.SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,\r\nCASE SUBSTR(FRS.NRP,3,2) WHEN \'95\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'96\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'97\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'98\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'99\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2))\r\nELSE CONCAT(20,SUBSTR(FRS.NRP,3,2)) END AS TAHUN_ANGKATAN,\r\nROUND(SUM(NILAI.NILAI_ANGKA*SKS)/SUM(SKS),2) AS IPS\r\nFROM FRS, NILAI, MATAKULIAH, MK_TAWAR                   \r\nWHERE FRS.NILAI_HURUF=NILAI.NILAI_HURUF\r\nAND MK_TAWAR.ID_MK=MATAKULIAH.ID_MK AND FRS.ID_MK= MK_TAWAR.ID_MK\r\nGROUP BY FRS.NRP, MK_TAWAR.SEMESTER\r\nORDER BY TAHUN_ANGKATAN ASC,IPS DESC, MK_TAWAR.SEMESTER ASC)\r\nGROUP BY TAHUN_ANGKATAN, SEMESTER\r\nORDER BY TAHUN_ANGKATAN ASC, IPS DESC;\r\n', NULL, '0000-00-00 00:00:00', '2016-12-13 11:55:09'),
(111, '35', '1A. EASY', 'Tampilkan nilai rata - rata mahasiswa pada semester 2', 'select avg(n.nilai_angka)\nfrom mk_tawar mkt, nilai n, frs f\nwhere mkt.semester = \'2\' and mkt.id_mk=f.id_mk and f.nilai_huruf=n.nilai_huruf;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '35', '2A. EASY', 'Tampilkan data dosen lengkap yang mengajar dengan kode mata kuliah \'IF1409\' dan mahasiswa yang mengambil mata kuliah tersebut mendapat nilai \'B\'', 'select distinct dsn.*\nfrom dosen dsn, mahasiswa mhs, frs f, matakuliah mk, mk_tawar mkt\nwhere  dsn.nip= mkt.nip and mkt.id_mk= f.id_mk and f.nrp=mhs.nrp and mk.id_mk=mkt.id_mk and mk.id_mk=\'IF1409\' and f.nilai_huruf=\'B\'\norder by dsn.nip asc;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '35', '3A. EASY', 'Tampilkan nip, tahun, dan mata kuliah yang diampu oleh setiap dosen. Tidak ada data ganda. Data diurutkan berdasarkan urutan atribut yang diminta.', 'select distinct d.nip, f.tahun, mk.MATA_KULIAH\nfrom frs f, mk_tawar mt, MATAKULIAH mk, dosen d\nwhere\nf.ID_MK = mt.ID_MK and\nmt.NIP = d.NIP and\nmt.ID_MK = mk.ID_MK\norder by d.nip, f.tahun, mk.mata_kuliah;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '35', '4A. MEDIUM', 'Tampilkan nama mahasiswa, nilai huruf, mata kuliah dan nilai minimal dari mahasiswa yg lulus pada semester 1. Urutkan berdasrkan nama mahasiswa', 'select distinct mhs.nama, f.nilai_huruf, mk.mata_kuliah, mk.nilai_min\nfrom mahasiswa mhs, frs f, matakuliah mk, mk_tawar mkt\nwhere mhs.nrp= f.nrp and f.id_mk= mkt.id_mk and mkt.id_mk= mk.id_mk and mkt.semester=\'1\' and f.nilai_huruf < mk.nilai_min\norder by mhs.nama asc;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '35', '5A. MEDIUM', 'Tampilkan (dengan urut) nip, tahun, mata kuliah, dan rata-rata nilai mata kuliah dari setiap dosen di setiap tahun dan pada setiap mata kuliah yang diampu. Agar lebih mudah, nilai rata-rata dibulatkan menjadi maksimal 2 digit dibelakang koma. Data diurutkan berdasarkan atribut yang diminta.', 'select d.nip, f.tahun, mk.MATA_KULIAH, round(avg(n.nilai_angka),2) as Average\r\nfrom frs f, mk_tawar mt, MATAKULIAH mk, dosen d, nilai n\r\nwhere\r\nf.ID_MK = mt.ID_MK and\r\nmt.NIP = d.NIP and\r\nmt.ID_MK = mk.ID_MK and\r\nf.NILAI_HURUF = n.NILAI_HURUF\r\ngroup by d.nip, f.tahun, mk.MATA_KULIAH\r\norder by d.nip, f.tahun, mk.mata_kuliah, average;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '35', '6A. HARD (BELUM BENER)', 'Tampilkan TAHUN_ANGKATAN, SEMESTER (1 untuk ganjil, 2 untuk genap), dan IPS TERTINGGI berdasarkan TAHUN_ANGKATAN dan SEMESTER diurutkan berdasarkan TAHUN_ANGKATAN dari kecil ke besar dan SEMESTER dari kecil ke besar.\r\nCatatan: semester 3 menjadi semester 1 karena ganjil. Tahun angkatan diambil dari NRP mahasiswa.', 'SELECT TAHUN_ANGKATAN, CASE SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,MAX(IPS) AS IPS\nFROM (SELECT FRS.NRP AS NRP_MHS, CASE MK_TAWAR.SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,\nCASE SUBSTR(FRS.NRP,3,2) WHEN \'95\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \nWHEN \'96\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'97\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \nWHEN \'98\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'99\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2))\nELSE CONCAT(20,SUBSTR(FRS.NRP,3,2)) END AS TAHUN_ANGKATAN,\nROUND(SUM(NILAI.NILAI_ANGKA*SKS)/SUM(SKS),2) AS IPS\nFROM FRS, NILAI, MATAKULIAH, MK_TAWAR                   \nWHERE FRS.NILAI_HURUF=NILAI.NILAI_HURUF\nAND MK_TAWAR.ID_MK=MATAKULIAH.ID_MK AND FRS.ID_MK= MK_TAWAR.ID_MK\nGROUP BY FRS.NRP, MK_TAWAR.SEMESTER\nORDER BY TAHUN_ANGKATAN ASC,IPS DESC, MK_TAWAR.SEMESTER ASC)\nGROUP BY TAHUN_ANGKATAN, SEMESTER\nORDER BY TAHUN_ANGKATAN, SEMESTER;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '35', '1B. EASY', 'Tampilkan data nip dan nama dosen yang mengajar mahasiswa yang pada namanya mengandung huruf u pada karakter ke-4, urutkan berdasarkan nip.', 'select DISTINCT dsn.nip, dsn.nama\r\nfrom dosen dsn, mahasiswa mhs, frs f, mk_tawar mkt  \r\nwhere dsn.nip=mkt.nip and mkt.id_mk=f.id_mk and f.nrp=mhs.nrp and mhs.nama like \'___u%\' \r\norder by dsn.nip asc; ', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '35', '2B. EASY', 'Tampilkan data mata kuliah yang diambil oleh mahasiswa yang lahir pada bulan september, urutkan descending berdasarkan id matakuliah.', 'select DISTINCT mk.*\r\nfrom mahasiswa mhs, matakuliah mk, mk_tawar mkt, frs f \r\nwhere mhs.nrp= f.nrp and f.id_mk= mkt.id_mk and mkt.id_mk=mk.id_mk and to_char(mhs.tgl_lhr,\'MM\')=9 \r\norder by mk.id_mk desc; ', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '35', '3B. EASY', 'Tampilkan nama dosen dan rata-rata nilai mata kuliah yang pernah diampu. Urutkan berdasarkan nilai rata-rata secara descending', 'select d.nama, round(avg(n.nilai_angka), 2) as aver\r\nfrom dosen d, frs s , nilai n, matakuliah m , mk_tawar mt\r\nwhere \r\ns.id_mk = m.id_mk and s.nilai_huruf = n.nilai_huruf\r\nand mt.id_mk = s.id_mk and d.nip = mt.nip\r\ngroup by d.nama\r\norder by aver desc', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '35', '4B. MEDIUM', 'Tampilkan tahun dan mata kuliah yang memiliki rata-rata tertinggi dalam setiap tahun dan setiap matakuliah. Urutkan berdasarkan tahun secara descending.', 'select k.tahun, k.mata_kuliah\nfrom\n(select f.tahun, m.mata_kuliah, avg(n.nilai_angka) as aver\nfrom frs f, matakuliah m, nilai n \nwhere f.id_mk = m.id_mk and n.nilai_huruf = f.nilai_huruf\ngroup by f.tahun, m.mata_kuliah) k\nwhere k.aver = (select max(r.aver)\nfrom\n(select f.tahun, m.mata_kuliah, avg(n.nilai_angka) as aver\nfrom frs f, matakuliah m, nilai n \nwhere f.id_mk = m.id_mk and n.nilai_huruf = f.nilai_huruf\ngroup by f.tahun, m.mata_kuliah ) r)\norder by k.tahun desc;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '35', '5B. MEDIUM (BELUM BENER)', 'Tampilkan nrp, nama, dan sks tempuh mahasiswa selama kuliah yang sks tempuhnya tidak kurang dari 100 sks.', 'select m.nrp, m.nama, sum(mk.sks) as skstempuh\r\nfrom mahasiswa m, frs f, matakuliah mk\r\nwhere m.nrp=f.nrp and mk.id_mk= f.id_mk\r\ngroup by m.nrp, m.nama\r\nHAVING sum(mk.sks) >= 100;', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '35', '6B. HARD (BELUM BENER)', 'Tampilkan TAHUN_ANGKATAN, SEMESTER (1 untuk ganjil, 2 untuk genap), dan IPS rata-rata berdasarkan TAHUN_ANGKATAN dan SEMESTER diurutkan berdasarkan TAHUN_ANGKATAN dari kecil ke besar dan IPS rata-rata dari besar ke kecil\r\nCatatan: semester 3 menjadi semester 1 karena ganjil. Tahun angkatan diambil dari NRP mahasiswa.', 'SELECT TAHUN_ANGKATAN, CASE SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,ROUND(AVG(IPS),2) AS IPS\r\nFROM (SELECT FRS.NRP AS NRP_MHS, CASE MK_TAWAR.SEMESTER WHEN \'3\' THEN \'1\' WHEN \'1\' THEN \'1\' ELSE \'2\' END AS SEMESTER,\r\nCASE SUBSTR(FRS.NRP,3,2) WHEN \'95\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'96\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'97\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) \r\nWHEN \'98\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2)) WHEN \'99\' THEN CONCAT(19,SUBSTR(FRS.NRP,3,2))\r\nELSE CONCAT(20,SUBSTR(FRS.NRP,3,2)) END AS TAHUN_ANGKATAN,\r\nROUND(SUM(NILAI.NILAI_ANGKA*SKS)/SUM(SKS),2) AS IPS\r\nFROM FRS, NILAI, MATAKULIAH, MK_TAWAR                   \r\nWHERE FRS.NILAI_HURUF=NILAI.NILAI_HURUF\r\nAND MK_TAWAR.ID_MK=MATAKULIAH.ID_MK AND FRS.ID_MK= MK_TAWAR.ID_MK\r\nGROUP BY FRS.NRP, MK_TAWAR.SEMESTER\r\nORDER BY TAHUN_ANGKATAN ASC,IPS DESC, MK_TAWAR.SEMESTER ASC)\r\nGROUP BY TAHUN_ANGKATAN, SEMESTER\r\nORDER BY TAHUN_ANGKATAN ASC, IPS DESC;\r\n', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'asisten', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jawaban` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `question_id`, `users_id`, `nilai`, `jawaban`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 99, 228, 0, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 106, 228, 100, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 107, 228, 0, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 106, 228, 100, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 106, 228, 100, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 107, 228, 0, 'SELECT D.NAMA, AVG(NILAI_ANGKA)\r\nFROM DOSEN D, NILAI N, FRS F, mk_tawar MK\r\nWHERE d.nip= mk.nip AND MK.id_mk= f.id_mk AND F.nilai_huruf = n.nilai_huruf \r\nGROUP BY d.nama\r\nORDER BY AVG(NILAI_ANGKA) DESC;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 107, 228, 0, 'SELECT D.NAMA, AVG(NILAI_ANGKA)\r\nFROM DOSEN D, NILAI N, FRS F, mk_tawar MK\r\nWHERE d.nip= mk.nip AND MK.id_mk= f.id_mk AND F.nilai_huruf = n.nilai_huruf \r\nGROUP BY d.nama\r\nORDER BY AVG(NILAI_ANGKA) DESC\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 107, 228, 0, 'SELECT D.NAMA, AVG(NILAI_ANGKA)\r\nFROM DOSEN D, NILAI N, FRS F, mk_tawar MK\r\nWHERE d.nip= mk.nip AND MK.id_mk= f.id_mk AND F.nilai_huruf = n.nilai_huruf \r\nGROUP BY d.nama\r\nORDER BY AVG(NILAI_ANGKA) DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 99, 246, 0, 'SELECT AVG(NILAI_ANGKA)\r\nFROM NILAI\r\nWHERE NILAI_HURUF IN (SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 100, 246, 0, 'SELECT *\r\nFROM DOSEN\r\nWHERE NIP IN (SELECT NIP FROM MK_TAWAR WHERE ID_MK=\'IF1409\' AND ID_MK IN (SELECT ID_MK FROM FRS WHERE NILAI_HURUF=\'B\'))', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 101, 246, 0, 'SELECT DISTINCT MT.NIP, MT.TAHUN, MK.MATA_KULIAH\r\nFROM MK_TAWAR MT, MATAKULIAH MK\r\nWHERE MT.ID_MK=MK.ID_MK\r\nORDER BY MT.NIP, MT.TAHUN, MK.MATA_KULIAH ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 102, 246, 0, 'SELECT M.NAMA, N.NILAI_HURUF, MK.MATA_KULIAH, MK.NILAI_MIN\r\nFROM MAHASISWA M, MATAKULIAH MK, NILAI N, MK_TAWAR MT, FRS F\r\nWHERE F.ID_MK=MK.ID_MK AND F.NILAI_HURUF=N.NILAI_HURUF AND MK.ID_MK=MT.ID_MK AND F.NILAI_HURUF>MK.NILAI_MIN\r\nORDER BY M.NAMA ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 103, 246, 0, 'SELECT DISTINCT MT.NIP, MT.TAHUN, MK.MATA_KULIAH, AVG(N.NILAI_ANGKA) AS AVERAGE\r\nFROM MK_TAWAR MT, MATAKULIAH MK, FRS F, NILAI N\r\nWHERE MT.ID_MK=MK.ID_MK AND MK.ID_MK=F.ID_MK AND F.NILAI_HURUF=N.NILAI_HURUF\r\nORDER BY MT.NIP, MT.TAHUN, MK.MATA_KULIAH ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 105, 223, 0, 'select distinct d.nip , d.nama\r\nfrom dosen D, mahasiswa M, matakuliah MK, mk_tawar MT, frs F\r\nwhere mk.id_mk= mt.id_mk and d.nip= mt.nip and f.id_mk = mk.id_mk and f.nrp = m.nrp\r\nand substr (m.nama,4,1) = \'u\' order by d.nip', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 106, 223, 0, 'select distinct MK.*\r\nfrom matakuliah MK , mahasiswa M , mk_tawar MT, frs F\r\nwhere mk.id_mk = mt.id_mk and f.id_mk = mk.id_mk and m.nrp = f.nrp and f.id_mk = mt.id_mk\r\nand extract (month from m.tgl_lhr) = 9 order by mk.id_mk desc', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 101, 221, 0, 'SELECT D.NIP, MT.TAHUN, MK.MATA_KULIAH\r\nFROM DOSEN D, MK_TAWAR MT, MATAKULIAH MK\r\nWHERE D.NIP=MT.NIP AND MT.ID_MK=MK.ID_MK\r\nORDER BY D.NIP, MT.TAHUN, MK.MATA_KULIAH', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 99, 255, 0, 'SELECT AVG(N.NILAI_ANGKA)\r\nFROM NILAI N\r\nWHERE NILAI_HURUF IN(SELECT NILAI_HURUF FROM FRS WHERE SEMESTER=\'2\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 100, 255, 0, 'SELECT *\r\nFROM DOSEN\r\nWHERE NIP IN(SELECT NIP FROM MK_TAWAR WHERE ID_MK IN (SELECT ID_MK FROM MATAKULIAH WHERE ID_MK=\'IF1409\' AND ID_MK IN(SELECT ID_MK FROM FRS WHERE NILAI_HURUF=\'B\')))', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 101, 255, 0, 'SELECT DISTINCT T.NIP,T.TAHUN,M.MATA_KULIAH\r\nFROM MATAKULIAH M,MK_TAWAR T\r\nWHERE T.ID_MK=M.ID_MK\r\nORDER BY T.NIP,M.MATA_KULIAH,T.TAHUN ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 102, 255, 0, 'SELECT M.NAMA,N.NILAI_HURUF,MK.MATA_KULIAH,MK.NILAI_MIN\r\nFROM MAHASISWA M,NILAI N,MATAKULIAH MK,FRS F,MK_TAWAR T\r\nWHERE M.NRP=F.NRP AND F.NILAI_HURUF=N.NILAI_HURUF AND T.SEMESTER=\'1\' AND T.ID_MK=MK.ID_MK\r\nORDER BY M.NAMA,N.NILAI_HURUF ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 100, 253, 0, 'select dosen. *\r\nfrom dosen, frs, mk_tawar\r\nwhere mk_tawar.nip=dosen.nip and dosen.nip=mk_tawar.nip \r\nand mk_tawar.tahun = frs.tahun and mk_tawar.tahun = frs.tahun\r\nand frs.id_mk=\'IF1409\' and frs.nilai_huruf=\'B\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 99, 253, 0, 'select avg(nilai_angka)\r\nfrom nilai, frs\r\nwhere nilai.nilai_huruf=frs.nilai_huruf\r\nand frs.semester=2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 101, 253, 0, 'select distinct nip, tahun, mata_kuliah\r\nfrom mk_tawar, matakuliah\r\nwhere matakuliah.id_mk = mk_tawar.id_mk and mk_tawar.nip = dosen.nip\r\norder by dosen.nip asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 99, 239, 0, 'select avg(n.nilai_angka) from nilai n, frs f where n.nilai_huruf in\r\n(select nilai_huruf from frs where semester=\'2\') and n.nilai_huruf=f.nilai_huruf\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 100, 239, 0, 'select d.* from dosen d, mahasiswa m where nip in\r\n(select nip from mk_tawar where id_mk=\'IF1409\') and m.nrp in\r\n(select nrp from frs where id_mk=\'IF1409\' and nilai_huruf=\'B\')', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 101, 239, 0, 'select mt.nip, mt.tahun, mk.mata_kuliah from mk_tawar mt, matakuliah mk\r\nwhere mt.id_mk= mk.id_mk', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 105, 228, 0, '	SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 105, 228, 0, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 106, 228, 0, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 105, 228, 0, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 106, 228, 0, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 105, 228, 0, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 105, 228, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 105, 220, 100, 'SELECT D.NIP, D.NAMA\r\nFROM DOSEN D\r\nWHERE D.NAMA LIKE \'???U%\'\r\nORDER BY D.NIP ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 106, 220, 0, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, MK_TAWAR MK, FRS F, MAHASISWA MS\r\nWHERE M.ID_MK=MK.ID_MK AND MK.TAHUN=F.TAHUN AND MS.NRP=F.NRP AND EXTRACT (MONTH FROM MS.TGL_LHR)=9\r\nORDER BY M.ID_MK DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 107, 220, 0, 'SELECT D.NAMA\r\nFROM DOSEN D, FRS F, MK_TAWAR MK\r\nWHERE D.NIP=MK.NIP AND MK.TAHUN=F.TAHUN AND ( SELECT(AVG NILAI_HURUF FROM FRS) AS AVERAGE', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 99, 239, 0, 'select avg(n.nilai_angka) from nilai n, frs f where n.nilai_huruf in\r\n(select nilai_huruf from frs where semester=\'2\') and n.nilai_huruf=f.nilai_huruf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 99, 238, 0, 'select avg(N.Nilai_Angka) \r\nfrom NILAI N, FRS F\r\nwhere N.NILAI_HURUF in F.NILAI_HURUF and F.SEMESTER = \'2\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 100, 238, 0, 'select * from DOSEN\r\nwhere NIP in (select nip from MK_TAWAR \r\nwhere ID_MK in (select ID_MK from FRS\r\nwhere ID_MK = \'IF1409\'\r\nand NILAI_HURUF = \'B\'));', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 101, 238, 0, 'select DOS.NIP, MT.Tahun, MK.MATA_KUlIAH\r\nfrom DOSEN DOS, MATAKULIAH MK, MK_TAWAR MT\r\nwhere DOS.NIP = MT.NIP and MT.ID_MK = MK.ID_MK\r\norder by MT.NIP, MT.TAHUN;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 102, 238, 0, 'select max(FRS.NILAI_HURUF) from FRS, NILAI NI, MATAKULIAH MK\r\nwhere SEMESTER = \'1\' and NI.NILAI_HURUF = FRS.NILAI_HURUF and MK.ID_MK = FRS.ID_MK\r\ngroup by MK.MATA_KULIAH;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 102, 238, 0, 'select MATA_KULIAH from MATAKULIAH\r\nwhere ID_MK in (Select ID_MK from FRS where SEMESTER = \'1\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 102, 238, 0, 'select MHS.NAMA, FRS.NILAI_HURUF, MK.MATA_KULIAH, MK.NILAI_MIN\r\nfrom MAHASISWA MHS, FRS, MATAKULIAH MK\r\nwhere MHS.NRP = FRS.NRP \r\nand FRS.ID_MK = MK.ID_MK \r\nand FRS.SEMESTER = \'1\' \r\norder by MHS.NAMA, FRS.NILAI_HURUF;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 105, 233, 0, 'SELECT d.nip, d.nama, m.nama FROM dosen d, mahasiswa m, frs f, matakuliah mk, mk_tawar mkt WHERE mkt.nip= d.nip AND mk.id_mk= mkt.id_mk\r\nAND f.nrp=m.nrp AND mkt.id_mk= f.id_mk\r\nAND m.nama LIKE \'___u%\' ORDER BY d.nip ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 105, 233, 0, 'SELECT d.nip, d.nama, m.nama FROM dosen d, mahasiswa m, frs f, matakuliah mk, mk_tawar mkt WHERE mkt.nip= d.nip AND mk.id_mk= mkt.id_mk\r\nAND f.nrp=m.nrp AND mkt.id_mk= f.id_mk\r\nAND m.nama LIKE \'___u%\' ORDER BY d.nip ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 106, 233, 0, 'SELECT mk.* FROM mahasiswa m, frs f, matakuliah mk, mk_tawar mkt WHERE mk.id_mk= mkt.id_mk AND f.nrp=m.nrp AND mkt.id_mk= f.id_mk\r\nAND \r\nAND extract(month from m.tgl_lhr)=9 ORDER BY mk.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 107, 233, 0, 'SELECT AVG(n.nilai_angka) FROM nilai n, mk_tawar mkt, matakuliah mk, dosen d, frs f WHERE mkt.nip= d.nip AND mkt.id_mk= mk.id_mk', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 109, 233, 0, 'SELECT m.nrp, m.nama, mk.sks FROM mahasiswa m, matakuliah mk, frs f, mk_tawar mkt WHERE f.nrp=m.nrp AND f.id_mk=mkt.id_mk AND mkt.id_mk=mk.id_mk\r\nAND \r\nAND mk.sks>=100', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 99, 242, 0, 'Select AVG(N.Nilai_Angka)\r\nfrom nilai n, frs F\r\nwhere n.nilai_huruf= f.nilai_huruf and f.semester=\'2\'', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 100, 242, 0, 'select d.*, mkt.id_mk, f.nilai_huruf\r\nfrom dosen d, mk_tawar mkt, matakuliah m, frs f\r\nwhere f.nilai_huruf=\'B\' and mkt.id_mk=\'IF1409\' and d.nip= mkt.nip AND mkt.id_mk= m.id_mk And mkt.semester=f.semester', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 101, 242, 0, 'select d.nip, f.tahun, m.mata_kuliah\nfrom dosen d, frs f, matakuliah m, mk_tawar mkt\nwhere d.nip= mkt.nip and mkt.id_mk= m.id_mk and mkt.tahun=f.tahun', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 102, 242, 0, 'select m.nama, n.nilai_huruf, mk.mata_kuliah, mk.nilai_min\nfrom mahasiswa m, matakuliah mk, nilai n, mk_tawar mkt, frs f\nwhere m.nrp=f.nrp and f.nilai_huruf= n.nilai_huruf and f.tahun=mkt.tahun and mkt.id_mk= mk.id_mk\nand n.nilai_huruf < mk.nilai_min\norder by m.nama', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 103, 242, 0, 'select d.nip, f.tahun, mk.mata_kuliah, avg(n.nilai_angka)\nfrom dosen d, frs f, matakuliah mk, mk_tawar mkt, nilai n\nwhere d.nip= mkt.nip and mkt.id_mk= mk.id_mk and mkt.tahun=f.tahun and f.nilai_huruf= n.nilai_huruf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 117, 286, 0, 'select D.* from Dosen D,mahasiswa M \nwhere like \'%u%', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 118, 286, 0, 'select distinct M.* from MATAKULIAH M,MAHASISWA M,DOSEN D\nwhere M.ID_MK = D.ID_MK and M.NIP like \'%september%\'', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 119, 286, 0, 'select distinct D.NAMA from DOSEN D, NILAI N, FRS F,MAHASISWA M\nwhere D.ID_MK = N.ID_MK and F.NRP\n   (select avg(M.ID_MK)\n    from MATAKULIAH);', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 120, 286, 0, 'select distinct M.NRP from MAHASISWA M,MATAKULIAH MT,\r\nwhere MT.MAHASISWA and MT. <= like \'%100%\' ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 117, 262, 100, 'select DISTINCT d.nip, d.nama\nfrom dosen d, mahasiswa m, mk_tawar mk, frs f\nwhere d.nip= mk.nip and mk.id_mk= f.id_mk and f.nrp= m.nrp and m.nama like \'___u%\'\norder by d.nip ASC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 118, 262, 100, 'select * \r\nfrom matakuliah \r\nWHERE id_mk IN (SELECT id_mk FROM FRS WHERE NRP IN (SELECT NRP FROM (SELECT NRP,EXTRACT (MONTH FROM TGL_LHR)AS TGL FROM mahasiswa) WHERE TGL=9)) \r\norder BY id_mk DESC\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 119, 262, 0, 'select d.nama, avg((nilai_huruf)from nilai) as \'AVERAGE\'\r\nfrom dosen d, mahasiswa m , mk_tawar t, frs f, nilai n\r\nwhere d.nip= t.nip and t.id_mk = f.id_mk and f.nilai_huruf= n.nilai_huruf ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 111, 275, 0, 'select AVG(nilai.nilai_angka)\r\n	from nilai, frs\r\n	where nilai.nilai_huruf = frs.nilai_huruf and frs.semester = 2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 113, 275, 0, 'elect mkt.nip, mkt.tahun, mk.mata_kuliah\r\n	from mk_tawar mkt, dosen d, matakuliah mk\r\n	where  mk.id_mk = mkt.id_mk\r\n	and mkt.nip = d.nip\r\n	order by mkt.nip, mkt.tahun;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 113, 275, 0, 'select mkt.nip, mkt.tahun, mk.mata_kuliah\nfrom mk_tawar mkt, dosen d, matakuliah mk\nwhere mk.id_mk = mkt.id_mk\nand mkt.nip = d.nip\norder by mkt.nip, mkt.tahun;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 111, 277, 0, 'SELECT AVG(N.NILAI_ANGKA) FROM NILAI N, MK_TAWAR M WHERE M.SEMESTER=2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 112, 277, 0, 'SELECT * FROM DOSEN WHERE NIP IN\n(SELECT NIP FROM MK_TAWAR WHERE ID_MK=\'IF1409\' AND ID_MK IN\n(SELECT ID_MK FROM FRS WHERE NILAI_HURUF=\'B\'));', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 113, 277, 0, 'SELECT D.NIP, F.TAHUN, M.MATA_KULIAH FROM DOSEN D, FRS F, MATAKULIAH M WHERE F.ID_MK=M.ID_MK AND D.NIP IN\n(SELECT MK.NIP FROM MK_TAWAR MK WHERE MK.ID_MK IN\n(SELECT M.ID_MK FROM MATAKULIAH M, FRS F WHERE M.ID_MK=F.ID_MK)) ORDER BY D.NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 111, 280, 0, 'select avg(n.nilai_angka)\nfrom nilai n, frs f\nwhere f.nilai_huruf = n.nilai_huruf\n  and f.semester = \'2\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 112, 280, 100, 'select distinct d.* \nfrom dosen d, mk_tawar mt, frs f\nwhere d.nip = mt.nip and mt.tahun = f.tahun and\n  mt.id_mk = \'IF1409\' and f.nilai_huruf = \'B\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 113, 280, 0, 'select distinct d.nip, mt.tahun, mk.mata_kuliah\nfrom dosen d, mk_tawar mt, matakuliah mk\nwhere d.nip = mt.nip and mt.id_mk = mk.id_mk\norder by d.nip asc; ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 114, 280, 0, 'select distinct m.nama, n.nilai_huruf, mk.mata_kuliah, temp.nilai_min\nfrom mahasiswa m, nilai n, matakuliah mk, frs f, mk_tawar mt,\n  ( select f.id_mk, max (f.nilai_huruf) as nilai_min\n    from frs f, mahasiswa m\n    group by f.id_mk \n  ) temp\nwhere temp.id_mk = f.id_mk and m.nrp = f.nrp and n.nilai_huruf = f.nilai_huruf\nand mk.id_mk = mt.id_mk and mt.tahun = f.tahun\norder by m.nama asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 115, 280, 0, 'select d.nip, mt.tahun, mk.mata_kuliah, rt.average\r\nfrom dosen d, mk_tawar mt, frs f, matakuliah mk, nilai n, \r\n  ( select avg(n.nilai_huruf)\r\n    from nilai n\r\n  )\r\nwhere;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 114, 280, 0, 'select temp.tahun_angkatan, mt.semester, temp1.IPS\nfrom mk_tawar mt, \n  ( select mt.tahun as tahun_angkatan\n    from mk_tawar mt\n    order by mt.tahun asc  \n  ) temp, \n  ( select avg(n.nilai_angka)\n    from nilai n, frs f, mahasiswa m\n  ) temp1\nwhere;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 111, 283, 0, 'SELECT AVG(N.NILAI_ANGKA)\r\nFROM NILAI N, FRS\r\nWHERE N.NILAI_HURUF = FRS.NILAI_HURUF\r\nAND FRS.SEMESTER = 2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 112, 283, 0, 'SELECT DOSEN.*\r\nFROM DOSEN, MK_TAWAR\r\nWHERE DOSEN.NIP = MK_TAWAR.NIP\r\nAND ID_MK = \'IF1409\'\r\nAND ID_MK IN (SELECT ID_MK\r\n              FROM FRS\r\n              WHERE NILAI_HURUF = \'B\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 113, 283, 0, 'SELECT NIP, TAHUN, MATA_KULIAH\r\nFROM MK_TAWAR, MATAKULIAH\r\nWHERE MATAKULIAH.ID_MK = MK_TAWAR.ID_MK\r\nORDER BY NIP, TAHUN;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 114, 283, 0, 'SELECT NAMA, NILAI_HURUF, MATA_KULIAH, NILAI_MIN\r\nFROM MAHASISWA, (SELECT FRS.*, MATA_KULIAH, NILAI_MIN\r\n                 FROM FRS, (SELECT MK_TAWAR.*, MATA_KULIAH, NILAI_MIN\r\n                            FROM MK_TAWAR, MATAKULIAH\r\n                            WHERE MK_TAWAR.ID_MK = MATAKULIAH.ID_MK) TEMP\r\n                  WHERE TEMP.TAHUN = FRS.TAHUN\r\n                  AND TEMP.SEMESTER = FRS.SEMESTER\r\n                  AND TEMP.KELAS = FRS.KELAS\r\n                  AND TEMP.KODE_JURUSAN = FRS.KODE_JURUSAN\r\n                  AND TEMP.ID_MK = FRS.ID_MK) TEMP\r\nWHERE TEMP.NRP = MAHASISWA.NRP\r\nAND TEMP.NILAI_MIN >= TEMP.NILAI_HURUF\r\nORDER BY NAMA, NILAI_HURUF;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 115, 283, 0, 'SELECT DOSEN.NIP, MK_TAWAR.TAHUN, MATA_KULIAH, AVG(NILAI_ANGKA) AS AVERAGE\nFROM DOSEN, MK_TAWAR, MATAKULIAH, FRS, NILAI\nWHERE DOSEN.NIP = MK_TAWAR.NIP\nAND MK_TAWAR.ID_MK = MATAKULIAH.ID_MK\nAND MK_TAWAR.ID_MK = FRS.ID_MK\nAND FRS.NILAI_HURUF = NILAI.NILAI_HURUF\nGROUP BY DOSEN.NIP, MK_TAWAR.TAHUN, MATA_KULIAH\nORDER BY NIP, TAHUN;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 111, 285, 0, 'select avg(n.nilai_angka) from nilai n;\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 112, 285, 0, 'select d.*\r\nfrom dosen d, mk_tawar t, frs f, mahasiswa m\r\nwhere d.nip= t.nip\r\nand t.id_mk = f.id_mk\r\nand t.id_mk=\'IF1409\'\r\nand m.nrp= f.nrp\r\nand f.nilai_huruf=\'B\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 113, 285, 0, 'select d.nip, t.tahun, mk.mata_kuliah\r\nfrom dosen d, mk_tawar t, matakuliah mk\r\nwhere d.nip= t.nip\r\nand t.id_mk= mk.id_mk\r\norder by d.nip, t.tahun;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 114, 285, 0, 'select m.nama, f. nilai_huruf, mk.mata_kuliah, \r\nfrom mahasiswa m, frs f, mk_tawar t, matakuliah mk\r\nwhere (select min(f.nilai_huruf) from frs f, nilai n, mahasiswa m\r\nwhere f.nilai_huruf= n.nilai_angka\r\nand m.nrp = f.nrp\r\nand f.semester =\'7\');\r\nand m.nrp= f.nrp\r\nand f.id_mk =t.id_mk\r\nand d.nip = t.nip;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 111, 266, 0, 'SELECT AVG (N.NILAI ANGKA)\r\nFROMM NILAI N\r\nWHERE NILAI ANGKA IN\r\n(\r\nSELECT F.SEMESTER\r\nFROM FRS F\r\nWHERE SEMESTER =\'2\');', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 112, 266, 0, 'SELECT D.*\r\nFROM DOSEN D, MK_TAWAR MT WHERE D.ID_MK = MT.ID_MK IN (SELECT MK.ID_MK FROM MATA_KULIAH MK\r\nWHERE MK.ID_MK=\'IF1409\')\r\nAND\r\nSELECT M.NRP FROM MAHASISWA M WHERE M.NRP IN (SELECT F.NRP FROM FRS F WHERE M.NRP=F.NRP IN (SELECT F.NILAI\r\nFROM FRS F\r\nWHERE N.NILAI HURUF IN (SELECT N.NILAI_HURUF FROM N.NILAI_HURUF\r\nWHERE NILAI_HURUF -\'B\')));', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 112, 266, 0, 'SELECT D.*\r\nFROM DOSEN D, MK_TAWAR MT WHERE D.ID_MK = MT.ID_MK IN (SELECT MK.ID_MK FROM MATA_KULIAH MK\r\nWHERE MK.ID_MK=\'IF1409\')\r\nAND\r\nSELECT M.NRP FROM MAHASISWA M WHERE M.NRP IN (SELECT F.NRP FROM FRS F WHERE M.NRP=F.NRP IN (SELECT F.NILAI\r\nFROM FRS F\r\nWHERE N.NILAI HURUF IN (SELECT N.NILAI_HURUF FROM N.NILAI_HURUF\r\nWHERE NILAI_HURUF =\'B\')));', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 113, 266, 0, 'SELECT M.NIP, M.TAHUN, MK.MATAKULIAH FROM MK_TAWAR MT, MATAKULIAH MK WHERE\r\nMK.ID_MK\r\nIN( SELECT MK.ID_MK\r\nFROM MATAKULIAH)\r\nORDER BY M.NIP, M.TAHUN\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 111, 278, 0, 'select avg(n.nilai_angka) from nilai n, frs f\r\nwhere f.semester=2 and n.nilai_huruf=f.nilai_huruf;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 112, 278, 100, 'select distinct d.* from dosen d, frs f, mk_tawar m\nwhere m.id_mk=\'IF1409\' and f.nilai_huruf=\'B\' and d.nip= m.nip and m.id_mk= f.id_mk ;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 113, 278, 100, 'select distinct d.nip, f.tahun, mk.mata_kuliah from dosen d, frs f, mk_tawar m, matakuliah mk\r\nwhere d.nip= m.nip and m.id_mk= f.id_mk and m.id_mk= mk.id_mk\r\norder by d.nip, f.tahun, mk.mata_kuliah asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 114, 278, 0, 'select distinct m.nama, f.nilai_huruf, mk.mata_kuliah, mk.nilai_min from mahasiswa m, frs f, matakuliah mk, mk_tawar mt, nilai n\r\nwhere n.nilai_huruf < mk.nilai_min and f.semester=1 and m.nrp= f.nrp and mt.id_mk= f.id_mk and f.nilai_huruf= n.nilai_huruf and mt.id_mk= mk.id_mk\r\norder by m.nama asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 115, 278, 0, 'select distinct d.nip, f.tahun, mk.mata_kuliah, avg(n.nilai_angka)\r\nfrom dosen d, mahasiswa m, frs f, matakuliah mk, mk_tawar mt, nilai n \r\nwhere d.nip= mt.nip and m.nrp= f.nrp and mt.id_mk= f.id_mk and f.nilai_huruf= n.nilai_huruf and mt.id_mk= mk.id_mk\r\norder by d.nip, f.tahun, mk.mata_kuliah asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 116, 278, 0, 'select f.tahun, f.semester,  from dosen d, mahasiswa m, frs f, matakuliah mk, mk_tawar mt, nilai n \r\nwhere\r\nd.nip= mt.nip and m.nrp= f.nrp and mt.id_mk= f.id_mk and f.nilai_huruf= n.nilai_huruf and mt.id_mk= mk.id_mk\r\norder by d.nip, f.tahun, mk.mata_kuliah asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 111, 268, 0, 'select avg(nilai.nilai_angka)\r\nfrom nilai, frs\r\nwhere nilai.nilai_huruf = frs.nilai_huruf and frs.semester = \'2\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 112, 268, 100, 'select DISTINCT dosen.*\nfrom dosen, frs, mk_tawar\nwhere dosen.nip = mk_tawar.nip and frs.nilai_huruf = \'B\' and mk_tawar.id_mk = \'IF1409\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 113, 268, 0, 'select DISTINCT mk_tawar.nip, mk_tawar.tahun, matakuliah.mata_kuliah\r\nfrom mk_tawar, matakuliah group by mk_tawar.nip, mk_tawar.tahun, matakuliah.mata_kuliah;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 114, 268, 0, 'select mahasiswa.nama, frs.nilai_huruf, matakuliah.mata_kuliah, matakuliah.nilai_min\r\nfrom mahasiswa, frs, matakuliah\r\nwhere frs.semester = \'1\' and mahasiswa.nrp = frs.nrp and frs.id_mk = matakuliah.id_mk and frs.nilai_huruf < matakuliah.nilai_min;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 115, 268, 0, 'select dosen.nip, mk_tawar.tahun, matakuliah.mata_kuliah\r\nfrom dosen, mk_tawar, matakuliah\r\nwhere dosen.nip = mk_tawar.nip and mk_tawar.id_mk = matakuliah.id_mk;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 113, 282, 0, 'SELECT NIP, NAMA\r\nFROM dosen\r\nWHERE NAMA LIKE \'___u%\'\r\nORDER BY nip;\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 118, 282, 0, 'SELECT MATAKULIAH.MATA_KULIAH\r\nFROM MATAKULIAH , FRS , MAHASISWA \r\nWHERE MATAKULIAH.id_mk = FRS.id_mk AND MAHASISWA.nrp = FRS.nrp AND to_char(MAHASISWA.tgl_lhr, \'mm\')=to_char(to_date(\'09\',\'mm\'), \'mm\')\r\nORDER BY MATAKULIAH.ID_MK DESC;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 117, 273, 0, 'select d.nip , d.nama\r\nfrom dosen d , mahasiswa m, mk_tawar t, frs f\r\nwhere d.nip=t.nip and t.id_mk=f.id_mk and m.nrp= f.nrp\r\nand substr(m.nama, 3, 1)=\'u\'\r\norder by d.nip asc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 112, 273, 0, 'select m.id_mk , m.mata_kuliah , m.sks, m.nilai_min\r\nfrom matakuliah m, mk_tawar t, frs f, mahasiswa h \r\nwhere m.id_mk= t.id_mk and t.id_mk= f.id_mk and f.nrp= h.nrp\r\nand extract(month from (h.tgl_lhr)) = \'9\'\r\norder by m.id_mk desc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 117, 263, 0, 'select DISTINCT d.nip, d.nama\r\nfrom dosen d, frs f, mahasiswa m, mk_tawar mk\r\nwhere m.nrp = f.nrp and f.id_mk = mk.id_mk and mk.nip = d.nip\r\nand m.nama like \'%___u%\'\r\norder by d.nip;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 118, 263, 100, 'select DISTINCT ma.*\r\nfrom matakuliah ma, mahasiswa m, mk_tawar mk, frs f\r\nwhere ma.id_mk = mk.id_mk and m.nrp = f.nrp and mk.id_mk = f.id_mk\r\nand extract(month from m.tgl_lhr) = \'09\'\r\norder by ma.id_mk desc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 114, 263, 0, 'select distinct d.nama, x.rata\r\nfrom dosen d, nilai n, mk_tawar mk, frs f\r\n    (select ma.id_mk, avg(ma.nilai_min) as rata from matakuliah ma, mk_tawar mk, frs f, nilai n\r\n    where mk.id_mk = ma.id_mk and f.tahun = mk.tahun and f.nilai_huruf = n.nilai_huruf) x\r\nwhere mk.id_mk = f.id_mk and f.nilai_huruf = n.nilai_huruf and d.nip = mk.nip and x.id_mk = mk.id_mk\r\norder by x.rata desc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 119, 263, 0, 'select distinct d.nama, x.rata\r\nfrom dosen d, nilai n, mk_tawar mk, frs f\r\n    (select ma.id_mk, avg(ma.nilai_min) as rata from matakuliah ma, mk_tawar mk, frs f, nilai n\r\n    where mk.id_mk = ma.id_mk and f.tahun = mk.tahun and f.nilai_huruf = n.nilai_huruf) x\r\nwhere mk.id_mk = f.id_mk and f.nilai_huruf = n.nilai_huruf and d.nip = mk.nip and x.id_mk = mk.id_mk\r\norder by x.rata desc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 120, 263, 0, 'select mk.tahun, ma.mata_kuliah\nfrom mk_tawar mk, matakuliah ma\nwhere mk.id_mk = ma.id_mk\ngroup by mk.tahun, ma.mata_kuliah\nhaving avg(mk.tahun) > (select max(tahun) from mk_tawar);', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 121, 263, 0, 'select m.nrp, m.nama, ma.sks\r\nfrom mahasiswa m, matakuliah ma, frs f, mk_tawar mk\r\nwhere m.nrp = f.nrp and f.tahun = mk.tahun and mk.id_mk = ma.id_mk;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 117, 267, 0, 'SELECT NIP, NAMA\r\nFROM DOSEN\r\nWHERE NAMA LIKE \'%%%u%\'\r\nORDER BY NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 118, 267, 100, 'SELECT MATAKULIAH.*\r\nFROM MATAKULIAH\r\nWHERE ID_MK IN\r\n  (SELECT ID_MK\r\n   FROM MK_TAWAR\r\n   WHERE ID_MK IN\r\n    (SELECT ID_MK\r\n     FROM FRS\r\n     WHERE NRP IN\r\n      (SELECT NRP\r\n      FROM MAHASISWA\r\n      WHERE EXTRACT(MONTH FROM MAHASISWA.TGL_LHR) = 9)))\r\nORDER BY ID_MK DESC;\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 117, 284, 100, 'select DISTINCT d.nip, d.nama\r\nfrom dosen d, MAHASISWA m, frs f, matakuliah a, mk_tawar b\r\nwhere substr(m.nama,4,1)=\'u\' and d.nip=b.nip and b.id_mk= a.id_mk and a.id_mk=f.id_mk and f.nrp=m.nrp\r\norder by d.nip;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 118, 284, 0, 'select DISTINCT a.*\r\nfrom mahasiswa m, matakuliah a, frs f\r\nwhere extract (month from m.tgl_lhr)=\'8\' and m.nrp=f.nrp and f.id_mk=a.id_mk\r\norder by a.id_mk desc;\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 117, 265, 100, 'SELECT DISTINCT D.NIP, D.NAMA\r\nFROM DOSEN D, MK_TAWAR MK, FRS F, MAHASISWA M \r\nWHERE MK.NIP=D.NIP AND MK.ID_MK = f.id_mk AND f.nrp = M.nrp AND SUBSTR (M.NAMA,4,1)=\'u\'\r\nORDER BY D.NIP', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 118, 265, 100, 'SELECT DISTINCT M.*\r\nFROM MATAKULIAH M, mk_tawar MK, frs F, mahasiswa MS\r\nWHERE M.ID_MK = mk.id_mk AND mk.id_mk = f.id_mk AND f.nrp = MS.NRP AND EXTRACT (MONTH FROM ms.tgl_lhr)=9\r\nORDER BY m.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 119, 265, 0, 'SELECT D.NAMA, AVG(NILAI_ANGKA)\r\nFROM DOSEN D, NILAI N, FRS F, mk_tawar MK\r\nWHERE d.nip= mk.nip AND MK.id_mk= f.id_mk AND F.nilai_huruf = n.nilai_huruf \r\nGROUP BY d.nama\r\nORDER BY AVG(NILAI_ANGKA) DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 117, 259, 0, 'select d.nip, d.nama\r\nfrom dosen d, mk_tawar mkt, frs f, mahasiswa m\r\nwhere d.nip= mkt.nip and f.nrp= m.nrp and mkt.id_mk= f.id_mk and m.nama like \'___u%\' \r\norder by d.nip;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 118, 259, 0, 'select mt.*\r\nfrom matakuliah mt, mahasiswa m, frs f\r\nwhere mt.id_mk= f.id_mk and f.nrp= m.nrp and extract(month from m.tgl_lhr)=\'9\'\r\norder by mt.id_mk DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 119, 259, 0, 'select d.nama, n.nilai_angka\r\nfrom dosen d, nilai n\r\nwhere nilai_angka=(select( AVG(nilai_angka) from nilai))\r\norder by n.nilai_angka DESC\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 120, 259, 0, 'select f.tahun, mt.nilai_min\r\nfrom frs f, matakuliah mt,mkt mk_tawar\r\nwhere f.id_mk= mt.id_mk and mkt.tahun=f.tahun and (nilai_min= (select AVG(nilai_min) from matakuliah)as x)\r\nand (nilai_min=(select MAX(x)from matakuliah) as y)\r\ngroup by f.tahun DESC', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 121, 259, 0, 'select m.nrp, m.nama, mt. sks\r\nfrom mahasiswa m, matakuliah mt\r\nwhere m.sks=(select SUM (sks) from matakuliah mt) and m.sks>100', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 117, 269, 100, 'SELECT NIP,NAMA FROM DOSEN WHERE NIP IN (SELECT DISTINCT NIP FROM MK_TAWAR WHERE ID_MK IN (SELECT ID_MK FROM FRS WHERE NRP IN (SELECT NRP FROM MAHASISWA WHERE NAMA LIKE \'___u%\')))ORDER BY NIP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 119, 269, 0, 'SELECT B.NAMA,AVER FROM DOSEN B,(SELECT NIP,AVG(D.NIL) AS AVER FROM MK_TAWAR B,(SELECT B.ID_MK,D.NILAI_ANGKA AS NIL FROM FRS B,NILAI D WHERE B.NILAI_HURUF=D.NILAI_HURUF)D WHERE B.ID_MK=D.ID_MK GROUP BY B.NIP)D WHERE B.NIP=D.NIP ORDER BY D.AVER DESC;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 121, 269, 0, 'SELECT B.NRP,D.NAMA,B.TEMPUH FROM (SELECT NRP,TEMPUH FROM (SELECT NRP,SUM(D.SKS) AS TEMPUH FROM FRS B,MATAKULIAH D WHERE B.ID_MK=D.ID_MK GROUP BY NRP) WHERE TEMPUH>=100)B,MAHASISWA D WHERE B.NRP=D.NRP;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 117, 270, 100, 'select DISTINCT d.NIP, d.NAMA\nfrom dosen d, mahasiswa m, frs f, mk_tawar mt\nwhere m.nama LIKE \'___u%\' and d.nip= mt.nip and mt.id_mk= f.id_mk and m.nrp= f.nrp\norder by NIP asc', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 118, 270, 0, 'select distinct m.*, n.nilai_huruf\r\nfrom matakuliah m, nilai n, frs f, mk_tawar mk\r\nwhere n.nilai_huruf = f.nilai_huruf and f.id_mk = mk.id_mk and m.id_mk = mk.id_mk and n.nilai_angka> (\r\nSELECT avg(nilai_angka) FROM nilai);', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 117, 274, 0, 'SELECT D.NIP, D. NAMA FROM DOSEN D, mk_tawar MK, FRS F, mahasiswa M\nWHERE d.nip= mk.nip AND mk.kode_jurusan= f.kode_jurusan AND f.nrp= m.nrp AND substr(M.nama, 4, 1)=\'u\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 118, 274, 0, 'SELECT MT.* FROM matakuliah MT, frs F, mahasiswa M\nWHERE EXTRACT(MONTH FROM m.tgl_lhr)=09\nORDER BY f.id_mk ASC ;\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 119, 274, 0, 'SELECT D.NAMA, AV.SCORE \nFROM dosen D, mk_tawar MK, matakuliah M, frs F, nilai N, (SELECT AVG(nilai_angka) AS SCORE FROM nilai) AV\nWHERE D.NIP=MK.NIP AND MK.SEMESTER=F.SEMESTER AND N.NILAI_HURUF=F.NILAI_HURUF;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 120, 274, 0, 'SELECT TAHUN, MATA_KULIAH FROM nilai N, frs F, mk_tawar MK, matakuliah MT\r\nWHERE mk.semester= f.semester AND n.nilai_huruf= f.nilai_huruf AND mt.id_mk= mk.id_mk AND MAX(SELECT AVG(N.NILAI_ANGKA));', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 117, 279, 0, 'select nip, nama \nfrom dosen \nwhere nama like \'%u%\' order by nip;\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 118, 279, 0, 'from matakuliah where id_mk in\r\n      (select id_mk from frs where nrp in\r\n        (select nrp from mahasiswa where to_char(tgl_lhr, \'MM\') = 09)) order by id_mk desc;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 117, 281, 0, 'select distinct d.nip, d.nama\nfrom dosen d, mk_tawar mk, frs f, mahasiswa m \nwhere d.nip=mk.nip and mk.tahun=f.tahun and m.nrp=f.nrp\nand substr(m.nama,+4,1)=\'u\'\norder by d.nip;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 117, 261, 0, 'select avg(n.nilai_angka) from frs f, nilai n, matakuliah mk\r\nwhere mk.id_mk= f.id_mk and n.nilai_huruf = f.nilai_huruf and f.semester = 2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 118, 261, 0, 'select d.* \nfrom dosen d, mk_tawar mk, matakuliah m ,frs f where f.id_mk=\'IF1409\' and mk.id_mk = f.id_mk and mk.nip = d.nip  and m.id_mk = f.id_mk\nand f.nilai_huruf =\'B\' and m.id_mk = f.id_mk;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 119, 261, 0, 'select d.nip, mkt.mk_tawar, mk.mata_kuliah from dosen d, mata_kuliah mk, mk_tawar mkt where d.nip = mk.nip and mkt.id_mk = mk.id_mk; ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 111, 261, 0, 'select avg(n.nilai_angka) from frs f, nilai n, matakuliah mk\r\nwhere mk.id_mk= f.id_mk and n.nilai_huruf = f.nilai_huruf and f.semester = 2;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 112, 261, 0, 'select d.* \nfrom dosen d, mk_tawar mk, matakuliah m ,frs f where f.id_mk=\'IF1409\' and mk.id_mk = f.id_mk and mk.nip = d.nip  and m.id_mk = f.id_mk\nand f.nilai_huruf =\'B\' and m.id_mk = f.id_mk;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 113, 261, 0, 'select d.nip, mkt.mk_tawar, mk.mata_kuliah from dosen d, mata_kuliah mk, mk_tawar mkt where d.nip = mk.nip and mkt.id_mk = mk.id_mk; ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 114, 261, 0, 'select mhs.nama, f.nilai_huruf, mk.mata_kuliah from nilai n, frs f, mahasiswa mhs, matakuliah mk where f.nrp = mhs.nrp and f.id_mk = mk.mata_kuliah   \r\nand n.nilai_angka = f.nilai_huruf ;  ', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 111, 264, 0, 'select avg(n.nilai_angka)\nfrom frs f, nilai n\nwhere f.nilai_huruf=n.nilai_huruf  and f.semester=2;\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 112, 264, 0, 'select d.*\r\nfrom dosen d, matakuliah m, mk_tawar mk, nilai n, frs f\r\nwhere d.nip= mk.nip and mk.id_mk = m.id_mk and f.tahun= mk.tahun and f.nilai_huruf=n.nilai_huruf and m.id_mk=\'IF1409\' and n.nilai_huruf=\'B\';', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 113, 264, 0, 'select distinct d.nip, mk.tahun, m.mata_kuliah\r\nfrom dosen d, mk_tawar mk, matakuliah m\r\nwhere d.nip= mk.nip and mk.id_mk = m.id_mk;', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 114, 264, 0, 'select mhs.nama, n.nilai_huruf, m.mata_kuliah, x.nilai_min \nfrom mahasiswa mhs, nilai n, matakuliah m, frs f, mk_tawar mk,\n  (select min(n.nilai_huruf) as nilai_min\n  from mahasiswa mhs, nilai n, matakuliah m, frs f, mk_tawar mk\n  where mhs.nrp = f.nrp and f.nilai_huruf = n.nilai_huruf and f.semester = mk.semester\n  and mk.id_mk = m.id_mk) x\nwhere (n.nilai_huruf = x.nilai_huruf and f.semester=1);', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 115, 264, 0, 'select d.nip, f.tahun, m.mata_kuliah, x.average\nfrom dosen d, frs f, matakuliah m, nilai n, mk_tawar mk,\n  (select avg(n.nilai_angka) as average\n  from dosen d, frs f, matakuliah m, nilai n, mk_tawar mk\n  where d.nip= mk.nip and mk.tahun=f.tahun and f.nilai_huruf=n.nilai_huruf) x\nwhere (n.nilai_huruf = x.nilai_huruf);', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 111, 260, 0, 'select avg(nilai_angka)\r\nfrom nilai', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 112, 260, 0, 'select d.*\r\nfrom dosen d, frs f, mahasiswa s, mk_tawar t, matakuliah m\r\nwhere d.nip = t.nip and f.nrp = s.nrp and m.id_mk= t.id_mk and t.id_mk = f.id_mk and f.id_mk= t.id_mk and f.id_mk = m.id_mk and t.id_mk=\'IF1409\' and f.nilai_huruf = \'B\'', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 113, 260, 0, 'select d.nip, t.tahun, m.mata_kuliah\nfrom dosen d, mk_tawar t, matakuliah m\nwhere d.nip = t.nip and m.id_mk = t.id_mk\norder by d.nip, t.tahun asc', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 114, 260, 0, 'select m.nama, f.nilai_huruf, mk.mata_kuliah, mk.nilai_min\nfrom mahasiswa m, frs f, matakuliah mk\nwhere m.nrp = f.nrp and f.id_mk = mk.id_mk\norder by m.nama asc', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 115, 260, 0, 'select d.nip, m.tahun, mk.mata_kuliah, avg(n.nilai_angka) as AVERAGE\nfrom dosen d, matakuliah mk, nilai n, frs f, mk_tawar m\nwhere d.nip= m.nip and n.nilai_huruf= f.nilai_huruf and m.id_mk= mk.id_mk and m.kelas = f.kelas and m.semester = f.semester and f.tahun= m.tahun and f.semester= m.semester and f.id_mk= m.id_mk\norder by d.nip, m.tahun asc', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 116, 260, 0, 'select mhs.nrp, f.semester, avg(n.nilai_angka)\nFROM mahasiswa mhs, frs f, nilai n \nwhere n.nilai_huruf= f.nilai_huruf and mhs.nrp= f.nrp\ngroup by n.nilai_huruf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submissiontutorial`
--

CREATE TABLE `submissiontutorial` (
  `id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `jawaban` varchar(2048) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` varchar(2048) NOT NULL,
  `jawaban` varchar(2048) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `category_id`, `judul`, `konten`, `jawaban`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '4', '5', '2017-03-05 22:05:51', '2017-03-05 21:48:12', '2017-03-05 22:05:51'),
(2, 1, '2', '3', 'e', '2017-03-05 22:06:23', '2017-03-05 22:06:20', '2017-03-05 22:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `kode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `kelas`, `role_id`, `kode`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'bilfash', NULL, '5113100091', '$2y$10$SVgRSSp34xdNYR4RIs1LEeiYRf4vsH9465g2/4tZshE6OMB/Wvj/m', 'A', 1, NULL, NULL, 'HjDrvPRXE7wGtgsCcPAjFZlyg9uLmRkMmAeEik0R1ku3PBANlnFaBxewOcaj', '2015-08-17 15:13:22', '2016-05-03 03:37:20'),
(12, 'Asisten SBD kelas A', 'demsyx707@gmail.com', 'sbdA', '$2y$10$aSmZQhnacHHV6bjdXiodwev/PW1ZSa7YcgmcGhtWMFFewaU8K.Tka', 'A', 2, 'mGzNb1', 1, 'dbEKbYfNPi5mAOJ1WlnbUgXiUM1FuVPHX1AiEpzjmuid8prs60gd4CwkTkfn', '0000-00-00 00:00:00', '2017-03-07 19:53:23'),
(13, 'Asisten SBD kelas B', NULL, 'sbdB', '$2y$10$wuusvnuXI2fiS4h3dllR9OmXcT1DyIivay9Kzn8FNtVi4VSeW5DA.', 'B', 2, NULL, NULL, 'Yndx9gSoFABJXPqIzhA50ZLNGRAknCxMuPDaXu7YpgFQ0LSLRA4277MzzYCN', '0000-00-00 00:00:00', '2016-10-11 11:12:36'),
(14, 'Asisten SBD kelas C', NULL, 'sbdC', '$2y$10$45fTTOfitKIPyGpc48FM5uH5LkKjaXdedz3N/XgZShpkU/icjT..K', 'C', 2, NULL, NULL, 'U8V6KC3QiYjv0h7dwbWFw5mow0x1A8FUgLGUfX0dS1OvrG5Cc6bBIKTVobDj', '0000-00-00 00:00:00', '2016-10-11 11:12:49'),
(59, 'Asisten SBD kelas D', NULL, 'sbdD', '$2y$10$olhxSdESNohU1/I7/cnPpuW7Sh.Kp43l3cfgMj2PblCoZ4PXFMsQq', 'D', 2, NULL, NULL, 'MUnY153NOBeSFsuPuexhcL0Daf68db9cbGeeBFNJUUR5HIjrCUdHOkSjQolA', '0000-00-00 00:00:00', '2016-12-28 06:10:49'),
(162, 'Demsy Iman Mustasyar', NULL, 'demsyiman', '$2y$10$gWShDrYvsUyzPiJC/BM4oe47jGxuUU1pIxOfqq5uJ2CvHvivWRnVy', 'A', 1, NULL, NULL, 'LM7foPKJR3XIE0v4kxtWbXlELF0KZfPNuzgSLJz6w9JevzZlgCVmTCmNFJQj', '0000-00-00 00:00:00', '2016-12-28 05:19:32'),
(167, 'Hifnie Bilfash', NULL, 'billyfash', '$2y$10$tE/H5c0yxHmmRmn5To5LD.aMTB9LKqVDAzZI8kS/8r4b94u9w.5nK', 'A', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Asisten SBD kelas C', NULL, 'sbdF', '$2y$10$sbWMJv1JZPK/mgGwWwSvRueZIjteaMIakQPZ8S19mvPvz74hEnaqy', 'F', 2, NULL, NULL, NULL, '0000-00-00 00:00:00', '2016-12-04 00:51:03'),
(215, 'Asisten SBD kelas G', NULL, 'sbdG', '$2y$10$5oAlHyofjrIgXKnwQTJlTey9gRd67xEvicVAYFrp0uxT8X8V0UON.', 'G', 2, NULL, NULL, NULL, '0000-00-00 00:00:00', '2016-12-04 00:51:33'),
(216, 'Damai Marisa Bachri', NULL, '5115100001', '$2y$10$K/eZJUdM4KlMOJFhjH15YOuNHjIQ5S/stXZ18pQfk6RH5b9g7AiJ6', 'D', 3, NULL, NULL, 'ETyPm7is9cbYM0C386Fy4i081Vu5izzt9FTfnXpE9H5OTRHSICtUKOuhcH4e', '0000-00-00 00:00:00', '2016-12-13 02:40:29'),
(217, 'Purina Qurota Ayunin', NULL, '5115100008', '$2y$10$P/UQOcF1KDoYP.0jDEGUmuZLmq9SR0GlLTKcRQnm3lxROvAEb4YcK', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'NARENDRA HARYO BISMO', NULL, '5115100009', '$2y$10$.gmHeDV6J3Fy74oky/P93e3DOJSgArje6x.zpA6aXat8FPGR7LxUS', 'D', 3, NULL, NULL, 'mlGQPaVGRaTZJcChl5R7BdEuZokYQfNAsY18KHwpWv4oZEZ3bBDPswKLQN8s', '0000-00-00 00:00:00', '2017-02-23 02:25:04'),
(219, 'Arij Nafi`atul Mashuda', NULL, '5115100013', '$2y$10$Ruq2t7yObx.W1dydR2TgTuTjjoNsv4nDVJyhqZwC5t8fqxkBukLpS', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Gd. Wahyu Nugraha Subagia', NULL, '5115100016', '$2y$10$stPQFxaCRzjjRqxjprypl.WI3fhkYBaGUnYi3GRnfWvT3YwjpKpbK', 'D', 3, NULL, NULL, 'd5zmj1LnQVuZkNW0DTLMaP3hrFILxIMujBo4AmZdMSRjgbAd1xFZWoS5npU3', '0000-00-00 00:00:00', '2016-12-17 10:27:29'),
(221, 'Nabilah Zaki Lismia', NULL, '5115100020', '$2y$10$A6BTWALy7e.yF2M3oI46xONt3q/o8x7CAzhSMWIBKJCwD/jTgilsy', 'D', 3, NULL, NULL, 'cXatOLoiC7Z0dsrl9wFs2HQoWNukYpUUSRxzmEtmdn3EWXW2eZSuq28yUM6B', '0000-00-00 00:00:00', '2016-12-14 01:34:15'),
(222, 'Gerald Parlindungan Salomo', NULL, '5115100021', '$2y$10$wUoHeE2WA7ydL5aADj9Dh.21Z0fnBob8va4fD5pfZncA/1w6MCW1C', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Huda Fauzan Murtadho', NULL, '5115100022', '$2y$10$Gjtv7UyKdLFvHtjhq8a51ufKWBQG.VNOFm4f.nC5oxgPNpB39iqQ6', 'D', 3, NULL, NULL, 't9SjWQ1gVyIExU8Xu9GdgYXlAFV6yMIBMPCzlu9eJq2RDfayqsCh9rsCitmk', '0000-00-00 00:00:00', '2016-12-14 01:32:59'),
(224, 'Yolanda Wisdanita Samosir', NULL, '5115100023', '$2y$10$8DcoRAisj6vMxiEYF2qgneM9HdXu8/hIMWfiY1p6RUkyNCU0L4dQq', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Widhera Yoza Mahana Putra', NULL, '5115100024', '$2y$10$DRvEtIOs7W6XnCELk43/xefK4W3ykLLdFaRfkAdo5BNdM.Ibe2/S2', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Bagus Dharma Iswara', NULL, '5115100028', '$2y$10$ke3rojLjZrlgEVY43hz/VejmVbbUEH091XEYay4B8M1ZJR74jMQpy', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Rahajeng Dwi Permatasari', NULL, '5115100033', '$2y$10$kjaOSBX5cnwBinuNjtOYCeK65ikrPyWR9CaYVFFwEZn2MTdHiHOpm', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Satriyo Nugroho', NULL, '5115100034', '$2y$10$xv2y8uYKDxsh9rsfZCJAKuW.upQE4rxMSpDRSEwO4BdZ2NCpUsA2e', 'D', 3, NULL, NULL, 'FF6HZ7A5CChRs5K9wY4A4gwKt3ceVDYTtHW4mkHm48NUsRjiAJpHihLR3Uya', '0000-00-00 00:00:00', '2016-12-28 05:16:37'),
(229, 'Findryan Kurnia Pradana', NULL, '5115100035', '$2y$10$uDWCWNHJBPNlbUmMXKPCJu3RrGDAPCRKXgahaDNnXpG0SQEtcmeC6', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'M. Azka Yasin', NULL, '5115100038', '$2y$10$yYEB2OaUAwQNnRJdmB4rq.TTwXlJoFf.y6ZxezEWn4qjtJMqC9zPK', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Ivan Fadhila', NULL, '5115100039', '$2y$10$nep/XBAYv5KXes3HfVKds.VnPNrNQIgREa6IygnmPyAJf3LMv.CW.', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Abyan Dafa', NULL, '5115100040', '$2y$10$3cDXusaMsAKq5u8PaYGJy.bOc7pixrvFdUQ.6VJuTcvke.gFwyzDW', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Hania Maghfira', NULL, '5115100042', '$2y$10$t5guxwOv4ayjhai4f962iOIlfD/nYXQKeMfDVWK2.aWYJ2yyMnboW', 'D', 3, NULL, NULL, 'MQl5uyhVryGtQup6WDmpHuhONbkmO8iadOZdx082V5xKctmYGyBp9hwQkTwx', '0000-00-00 00:00:00', '2016-12-17 18:54:30'),
(234, 'Hafara Firdausi', NULL, '5115100043', '$2y$10$2NC39iD18qfc42TQEHn0J.e4ZWa2PHZIPbPfDnZiYm.SgrnJLKxN2', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Renaldi Wahyudiono', NULL, '5115100044', '$2y$10$wWsAK20MGsFLalXjy6Pa2.Qs7vcoo6THGO9ieFiWCBgWR91qiVwyC', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Rohana Qudus', NULL, '5115100045', '$2y$10$IhehAmAkXK39RMrP3iswVeFilOX55qK3mcdEO.L9MhmWdZaAQR632', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Rizaldy Primanta Putra', NULL, '5115100046', '$2y$10$tDX7CYTwiG6mU8vHJraDlevK6WVY1IQZR7Qhw2etvyPUnYPWY7Ei2', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Mohammad Fikri', NULL, '5115100049', '$2y$10$lsZ5DaalTaPQRqYcV6Oeies66RGgqL/cUOMe.sCTWj/bdfma.eXve', 'D', 3, NULL, NULL, 'tu0ro844p0K0Ejv8vaI1SrHC9bZSqGKEeWx3VR1vIMh7I2v5RxP6xMkt9OOm', '0000-00-00 00:00:00', '2016-12-17 18:52:07'),
(239, 'Asadul Haq Muhammad Shani', NULL, '5115100051', '$2y$10$km7edHCYSG1.BaQboNo54e6N9/wJmbHiJpYvhKYNaEluVa5JeIlJu', 'D', 3, NULL, NULL, '4IFoD67VB6aRd588i2X87JPVQ8NE9DT4WVkK2Ip5qdL8BYTaCJ7MJXOCaHrb', '0000-00-00 00:00:00', '2016-12-17 10:25:41'),
(240, 'Salma Nurkhafidoh', NULL, '5115100053', '$2y$10$dADSmWIwOOsq5FG6QlIk1OzDgLpouBihrDqQRvmOxUXsrL7wE1SBS', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Pradipta Baskara', NULL, '5115100055', '$2y$10$Yg00ZttkOqvvlJUrrFxjWeB73aA0Ci0jScRIoTjdkJKNdkupdDwjK', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Ghina Latifah Anandaputri', NULL, '5115100056', '$2y$10$IxcSVEiOU0CzEmOg2f96Ged5a6yFQRbhRGc1v9/fPl0l75xtvTzyu', 'D', 3, NULL, NULL, 'W85KfcuaQS03g1EbVoYheQWwoCf6uq2LsaLjfSYgM6Zfz6B7MFyS6sF9JYyg', '0000-00-00 00:00:00', '2016-12-17 18:56:08'),
(243, 'Adi Darmawan', NULL, '5115100079', '$2y$10$/YPBWkVBN/NkxMMJ9w9MzO2CkTkTeWnwqnRsSEjMVkR16Z/0ZufCa', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'ADITYA PRATAMA', NULL, '5115100101', '$2y$10$Zhpw8uzht2W/2uGAia/6P.b448qUloSdQ1VK0P7jJlkieLaA2q8Vq', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'ZAHRI RUSLI', NULL, '5115100108', '$2y$10$g4pVklAs7qUD0Q4wErJJe.WdePRd66quyylH3T6oh3y.CSQhUTSFK', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'MUHAMMAD ADIB ARINANDA', NULL, '5115100111', '$2y$10$93fI3kUjQyihLD2ASTM2he562X9WhhjCxJ62LZolDG5LGzSirrhWi', 'D', 3, NULL, NULL, 'OZHR1aGElxVJhkrvvvZFQtASnjypXmUTOn6e3wtiMmG3IBHFRIiNC6foMOhz', '0000-00-00 00:00:00', '2016-12-14 01:31:14'),
(247, 'DICKY MUHAMMAD PRIANGGA', NULL, '5115100121', '$2y$10$BrGXZrGx0p1XCaYYvB4xMeb2g8k3Zptnw44x8.PtPh.pdPte7Hxlq', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'RAFIDAH RAFALIA', NULL, '5115100139', '$2y$10$P0i1gOHeJ5Wlg.naQI8ddelWZyZRPNU0tDtVEafrJF5314Fgv4lCG', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'GLENN LUCAS HARRYARA', NULL, '5115100148', '$2y$10$GPsWOmgRQy0YzR4tQbRGY.MT3WYsiR6Pnu7RJ0qpsH7gaK/BulJL2', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'SUBHAN MAULANA', NULL, '5115100149', '$2y$10$1wjbivy1SQSiRo99x3YjrOpfBMBqcRuotV2/5N4wyJCDVlrkUkpSW', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'WAHYU PUJIONO', NULL, '5115100151', '$2y$10$lkYmE7VAAgYD1PEmmjGrSezsT5cGTbeNl36xPVUyTxamb5I7J1aeq', 'D', 3, NULL, NULL, 'i7EBTT9jsOlxJiphNL5Fy7ItK4nWiBKVfKTOt8dZtLUyW2FIOIp2x6087x3S', '0000-00-00 00:00:00', '2016-12-14 03:16:23'),
(252, 'UNGGUL WIDODO WIJAYANTO', NULL, '5115100154', '$2y$10$gaPxryIVY/0.rwGMUeQ3G.UBbXsJlDWGvkNYXkvm/90YSqGa.49E6', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'WAHYU IVAN SATYAGRAHA', NULL, '5115100155', '$2y$10$UvfSAaAy2czWNP8iw7VXUO6CZ3W27/lnsGQqsu3.e8wU1ANUvmPPG', 'D', 3, NULL, NULL, 'W2Eb0QldmxnSErlPcx3Dnzhpcx2DvsOZgJPv1hq4c6G7Jm9OnRkRfgseOh1Y', '0000-00-00 00:00:00', '2016-12-17 10:26:11'),
(254, 'RAFI R RAMADHAN', NULL, '5115100158', '$2y$10$RLMSpQ1AZOyUeTnBHUoBguVsbB.EDQN.TtPRx5AvIO42.3RlqpYEW', 'D', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'RAKHMA RUFAIDA HANUM', NULL, '5115100161', '$2y$10$Tq2GVlit2nvcvo5un7AT5.ovsbJ7BkTU6kDejrKsTqZpyxL6IAXRC', 'D', 3, NULL, NULL, '7QNpxw3CLNuuh6oWxPPOOcdhuNz0sqwbpItNnNadsAYX6VZrm5Umfg42oQoQ', '0000-00-00 00:00:00', '2016-12-14 01:36:34'),
(256, 'Asisten SBD Kelas E', NULL, 'sbdE', '$2y$10$3HEMherYpwJTaj0QjzZdquLG0cJcStDxhJLwAruXCcopRlLD1Ju4G', 'E', 2, NULL, NULL, 'ik9MZJgiRp2wDbw4tnLkfhBJxsIRLVZ37H1D47CO0nR1rcJoSlzXGkw6YjGC', '0000-00-00 00:00:00', '2017-02-23 02:24:22'),
(257, 'Septiawan A.R.', NULL, '5109100072', '$2y$10$cUFCkGrMvBrP/OlfzqcynuKMW3WZ7HlIC7519LXl9Rdz1KeaLHEgS', 'E', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'M. Iqbal', NULL, '5114100095', '$2y$10$k5bIwAEcVXBBglj3aSMd0OvABWKTytFtizTL7LsGMZPA9CC5G3nQi', 'E', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'Syavira T.Z.', NULL, '5115100002', '$2y$10$a2wC7vhjG8s1aA.PgElhQuK6xxiZfqDg5aDthEPSJlk1O8afltWhy', 'E', 3, NULL, NULL, 'zARGBHT5Rc6mUbFnryTfAXoVLCvujaxifCDOpwnljSCB4mG2HuJPNTe14lWb', '0000-00-00 00:00:00', '2017-03-01 09:26:03'),
(260, 'Aulia Teaku Nururrahman', NULL, '5115100012', '$2y$10$6zfhAPx/OpD0k1jkfrK6auQfPGBDPROKILNXIAtKinV76axZ2d9AO', 'E', 3, NULL, NULL, 'U6et9M8ymfsx9bInA4bq69TlqiWmXCXHVaFOzqjHfYVg8CYIZBfQ2Fa1deRD', '0000-00-00 00:00:00', '2016-12-28 07:25:58'),
(261, 'Sirria Panah Alam', NULL, '5115100017', '$2y$10$EONBKKsifq3kCVIjr3aIl.17vGiX.81V.stJixIg8nawD8NtTEdjC', 'E', 3, NULL, NULL, 'fWnZMotaTVRBNsnYyW5b0Nu1XEbWmmSfMjQoWKTG9ka7YcVTGM0rUQMrTYUr', '0000-00-00 00:00:00', '2016-12-28 07:22:02'),
(262, 'Drajad Bima Ajipangestu', NULL, '5115100031', '$2y$10$nJfmm2uoB.MznqTeew1bFOv5obCqGfo5zNYJF3HyAJA0fa/UtXGNa', 'E', 3, NULL, NULL, 'h5I8FI9hQIbdX8Kx8K4BoSfDryNpCZA61H5rtuqKOZSYeyhHqgmV9eSgD7wY', '0000-00-00 00:00:00', '2016-12-28 06:24:27'),
(263, 'Nafingatun Ngaliah', NULL, '5115100032', '$2y$10$5ECRbIw5Bv5LjAxbLA01kOq5RCIp6N5R.pHh84TW2lDKs5zIZwtVy', 'E', 3, NULL, NULL, '98lqg31elsfbdJcRr47JEHfuI2wcp7UXShfFq9ovF1Epnb9gq7OION0qkOAd', '0000-00-00 00:00:00', '2016-12-28 07:03:52'),
(264, 'Mutia Rahmi Dewi', NULL, '5115100048', '$2y$10$UV.PVJz3ncECnRzWwg1cX.o4Asweo0lpjS3HJHeTbBjoSzUYpnHou', 'E', 3, NULL, NULL, 'ZPoBpriY6PbGDRxEnhds42P9bZoHLBp17wYVzxwi1bxaLMGh9NaBPs05Eeop', '0000-00-00 00:00:00', '2016-12-28 07:24:14'),
(265, 'Muh. Akram Abdullah', NULL, '5115100050', '$2y$10$2J1FJL8rvC3Di3a8wq4PE.7VWWgR4/Sh5bATIt9h8xo9lQbK0BTBq', 'E', 3, NULL, NULL, 'SiIfRXldISFOks4fqy8udHLddPaDTeT2Xp4wOlzP0MsrGuqckmyVSlGWdJgb', '0000-00-00 00:00:00', '2016-12-28 07:08:01'),
(266, 'Naufal Pranasetyo Fodensi', NULL, '5115100057', '$2y$10$pFaL5uTH577VoUJcQFLWteW5BlHZzMVki6Kh78pinV/R9bO1iLYs.', 'E', 3, NULL, NULL, 'WWnBTv5eiyBpvqybaUwZ4oz6oemeFWDlYsdXNQU5kmBSJahRcNeFGzWrl5fu', '0000-00-00 00:00:00', '2016-12-28 06:41:10'),
(267, 'Alvin Mudhoffar', NULL, '5115100062', '$2y$10$QQkfMyQRiLFjmToA7g9X3.TJ6zWLSIZl7ncDSHihFokp.sBlBibfu', 'E', 3, NULL, NULL, 'x2yYAXtvYedpOxAkBnxgUPMdpLIOMotql1o3yQiP6fXwn2Q15WlomsfN42eg', '0000-00-00 00:00:00', '2016-12-28 07:05:33'),
(268, 'Gusti Ngurah Satria Aryawan', NULL, '5115100066', '$2y$10$y/l6RkBOygGCWJm9/pNNyuoD0gg7WKcUjG1pea3cvlUHLw2ky0tBy', 'E', 3, NULL, NULL, 'tZMMTviB4M3hBq8NZSYGco9QFLTrWpJ0NVCb9uEwDKaGOFVMoEMyq6ClIJHL', '0000-00-00 00:00:00', '2016-12-28 06:55:15'),
(269, 'Djohon Prabowo', NULL, '5115100067', '$2y$10$SDufqo7b73lGsYnj9JUG0OZcUjSNv/lpD/dyzLSWXxx/dZ5qr869y', 'E', 3, NULL, NULL, 'CxM4pKyq1vPGLAxqjphtgfYiMGyA1mT1FE3CvHhPYcNpiy4nsZThwkJNstU7', '0000-00-00 00:00:00', '2016-12-28 07:12:35'),
(270, 'Rangga Senatama Putra', NULL, '5115100076', '$2y$10$Sl4BtgBSLHU2AVt2wjm7k.2hQePlf3WlpjjkqnnLWDGiV8Ex2o.TG', 'E', 3, NULL, NULL, 'Ux15gFCYrz8iYpUM4tipOYuG8blcpVzf0LpwN6NiwkCA5UNIhzU3SUiio2Yk', '0000-00-00 00:00:00', '2016-12-28 07:13:51'),
(271, 'Muhammad Budiana Eka Faruq\'', NULL, '5115100084', '$2y$10$05o6U7W4gLteBwdZ/t3dtuLpbet6brC4oeODnvT257pBfsdeRDZJG', 'E', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'Vicky Mahfudy', NULL, '5115100105', '$2y$10$7MX4onIo4KyF4cfosH2feuToPCkOzNQ6AhT1bjS3Cr8SRw5Xa9AuK', 'E', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'Yudha Aditya Muhammad', NULL, '5115100106', '$2y$10$TlxL2CTEmazgtLut1aCv4.e5utGc.s6xV5kFU9g5tnRc/cSfs1ERG', 'E', 3, NULL, NULL, '9nWDe1UlApJGPQCXTXSqPwPGeWO1HbKUUAHMA3cFoJaJESkNzoNL62S1FBpQ', '0000-00-00 00:00:00', '2016-12-28 07:00:16'),
(274, 'Muhammad Faris Didin A', NULL, '5115100118', '$2y$10$7qjfNN5LsS0X86c2XmIOw.Lohu2En.94SgaTt2b7B0fEF.bvya51S', 'E', 3, NULL, NULL, 'bSft9Kk3eRTg5rd35OMcYT7D7w6SeiF9dDEnqg5QV0tXAfSPfmR6x97GIsax', '0000-00-00 00:00:00', '2016-12-28 07:15:06'),
(275, 'Cahya Putra Hikmawan', NULL, '5115100119', '$2y$10$v51M.YVrnccmSUzSMbsB5O4OflcNeyoBDcjguHkUgXdDOyyCTCRS2', 'E', 3, NULL, NULL, 'yfOhfoDUwsepapFsjTkPlHYP2nDo01vAFy6JiBoLv9yHtmjBWqo1AQhTdzwR', '0000-00-00 00:00:00', '2016-12-28 06:28:15'),
(276, 'Ahmad Ibnu Fajar', NULL, '5115100133', '$2y$10$PQ6xDtcrBercohS3jYA/zu/CcLQFPc654K/kupYaHpxnKCJna5ED.', 'E', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'Agatha Putri Adwitya', NULL, '5115100137', '$2y$10$qeJEH1YXQSIARz8uWfHAduJL5Bk.n7cJjbQinQ.jrZIUaF40QTrzq', 'E', 3, NULL, NULL, 'f367XjZBZLa3vVQ3PfUZcL6sIbC7u18jaxFtrklz2SKKfOqajYLjXjXTolHJ', '0000-00-00 00:00:00', '2016-12-28 06:30:38'),
(278, 'M. Rosyid Abdurrohman', NULL, '5115100144', '$2y$10$zwlRVwNjAqKuABkfSsPX2OEKy6ubn9GspJTWeC1t8j7MmS1G8GDaS', 'E', 3, NULL, NULL, '9It7hxC4XvGrK9F3AJ5e6ptvLD816WeP4eUTfrpPqsoy3k5Xm7mmndYm8wVt', '0000-00-00 00:00:00', '2016-12-28 06:46:31'),
(279, 'Rizky Pratama R.', NULL, '5115100157', '$2y$10$AidXfcnOXlXRRI13Lwt31.NNB9QSJiGaiBYlc7/p.cswKKkA6BT/G', 'E', 3, NULL, NULL, 'wAxogNS8fnjMaqNxkSV8Qh6Fzgkrz1CuH74xwMuduIxbKYy3tIeIqeq4AeHv', '0000-00-00 00:00:00', '2016-12-28 07:16:26'),
(280, 'Astrid Febrianca', NULL, '5115100162', '$2y$10$l4gAHsA.7DvTlFx8tHcUbeJTPkZW/FRU8Nt4nNWBQJ7NyfzzIKf8S', 'E', 3, NULL, NULL, 'BdxRQ5txfRK9s3FDvOPvuARibg3zy6iOOldYJ1E30SK03xf8yBRXQuSDt84Z', '0000-00-00 00:00:00', '2016-12-28 06:35:46'),
(281, 'Alfindio Muhammad Abdallah', NULL, '5115100164', '$2y$10$pUMCVyEIw/3RS5U4D8a0Q.2zdRA/62pPy4o1PvUN7bzVsQTNahj32', 'E', 3, NULL, NULL, 'FGjvoYVBu2s7mrH9i9KlqdurfIJhQfU4Q5P3QtXZCv2atjfUcPCGH7sM3pDp', '0000-00-00 00:00:00', '2016-12-28 07:17:22'),
(282, 'M. Reza Ar Razi', NULL, '5115100165', '$2y$10$mIUVQZZms9xScvCQla68dujbPTULSu.Tu0Qh4pPp6vMw1j0g0N5gS', 'E', 3, NULL, NULL, '9B1nB4zoRygfkJRCXivP8A80skFpfsVi1Q4G5XK8oLDTWDG44vlimeco0beE', '0000-00-00 00:00:00', '2016-12-28 06:57:56'),
(283, 'Muhammad Firza Gustama', NULL, '5115100170', '$2y$10$ZHLB77qwQqozDpW6Rm4qSu3EuEWaU64w6NXymAWLnvpxmFNn0KncS', 'E', 3, NULL, NULL, 'OdbAsxRrIkxELspQr1FrBuRFhC7NgVDeGEf9VBTGffpfPDdZmGEM5NQsfXGi', '0000-00-00 00:00:00', '2016-12-28 06:37:39'),
(284, 'Alya Sherlyna Shana P.', NULL, '5115100177', '$2y$10$JKtfqn3tyYzHv8VTWiGRuO7AoSwgxC0AbWO5ndPLSYROn1dSGLDmC', 'E', 3, NULL, NULL, 'Jm1AHWCtNrzdnsXIxbUY5okp1XBHhS53ehR6Zf3JO4k2RyaNNNfowSDVkLTc', '0000-00-00 00:00:00', '2016-12-28 07:06:26'),
(285, 'Nurazizah K.', NULL, '5115100702', '$2y$10$T2MrKb/ouQ1DnbfyU3heFeXmu.0Ego6opLcD7Abda1LT5rUszDsW.', 'E', 3, NULL, NULL, 'BZ6IGg1k1ncr8L52HUB9XjBIVXYGTpOPmibRBkbFjwAGI0w6wkX8QqbWSk5T', '0000-00-00 00:00:00', '2016-12-28 06:39:00'),
(286, 'Dara Tursina', NULL, '5115100707', '$2y$10$mEcleDGB72HwlitVmhAhweExfeHB19MZKBRskiPNWmH/tIm8Sg0De', 'E', 3, NULL, NULL, '9Km3vgIgzySwvVoOCWAj3ACHjkCqKLrtcIHaslhsig88vp92AIsJ3RDBwmPg', '0000-00-00 00:00:00', '2016-12-28 06:21:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbversion`
--
ALTER TABLE `dbversion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listdb`
--
ALTER TABLE `listdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissiontutorial`
--
ALTER TABLE `submissiontutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dbversion`
--
ALTER TABLE `dbversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `listdb`
--
ALTER TABLE `listdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `submissiontutorial`
--
ALTER TABLE `submissiontutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
