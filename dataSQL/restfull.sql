-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 12:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restfull`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademikti`
--

CREATE TABLE `akademikti` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` int(9) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` int(9) NOT NULL,
  `bidangkeahlian` varchar(255) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `level` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `slug`, `nama`, `nik`, `bidangkeahlian`, `jk`, `level`, `created_at`, `updated_at`) VALUES
(1, 'mark', 'Karl Marx', 111109898, 'Kirinisme', 'laki-laki', 'dosen', '2020-09-17 21:41:47', '2020-10-07 12:18:01'),
(2, NULL, 'muhammad al khawarizmi', 11111111, 'Aljabar,Matematika', 'laki-laki', 'dosen', '2020-09-17 22:44:22', '2020-09-17 22:44:22'),
(45, NULL, 'Aviram Lotha Yizrael', 11111110, 'Teknik Fisika', 'laki-laki', 'dosen', '2020-09-28 08:47:26', '2020-10-09 23:09:34'),
(49, NULL, 'Flavius Heraclius Augustus', 989898989, 'Teknik Perang, Diplomasi, Geopolitik, ekonom', 'laki-laki', 'dosen', '2020-10-10 04:03:34', '2020-10-10 04:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(9) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `nim`, `level`, `created_at`, `updated_at`) VALUES
(1, 'judith', 175410093, 'admin', NULL, NULL),
(2, 'adit', 666666666, 'admin', '2020-10-10 04:20:03', '2020-10-10 04:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(9) NOT NULL,
  `ipk` double NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `level` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `slug`, `nama`, `nim`, `ipk`, `jk`, `level`, `komentar`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Uzumaki Sarutod', 1010001, 3, 'laki-laki', 'mahasiswa', '', '2020-09-18 06:33:31', '2020-10-10 03:50:53'),
(2, NULL, 'Uzumaki Bayu', 1001, 4, 'laki-laki', 'mahasiswa', '', '2020-09-18 06:34:02', '2020-09-18 06:34:02'),
(3, 'mark', 'Emilia', 10101014, 4, 'perempuan', 'mahasiswa', '', '2020-09-18 06:34:21', '2020-10-05 21:21:21'),
(51, NULL, 'Hartono', 101110110, 9, 'laki-laki', 'mahasiswa', '', '2020-09-26 07:41:35', '2020-10-09 23:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-12-152132', 'App\\Database\\Migrations\\Aturdata', 'default', 'App', 1599925749, 1),
(2, '2020-09-12-154201', 'App\\Database\\Migrations\\Aturdata2', 'default', 'App', 1599925750, 1),
(3, '2020-09-12-154420', 'App\\Database\\Migrations\\Aturdata3', 'default', 'App', 1599925750, 1),
(4, '2020-09-20-032724', 'App\\Database\\Migrations\\Aturdata3', 'default', 'App', 1600572513, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `nama` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nik` int(9) NOT NULL,
  `nim` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`nama`, `nik`, `nim`) VALUES
('Mark', 11110, 10101014),
('Mark', 11110, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademikti`
--
ALTER TABLE `akademikti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademikti`
--
ALTER TABLE `akademikti`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
