-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 02:58 PM
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `slug`, `nama`, `nik`, `bidangkeahlian`, `jk`, `created_at`, `updated_at`) VALUES
(1, 'mark', 'Mark', 11110, 'Kiririsme', 'laki-laki', '2020-09-17 21:41:47', '2020-09-17 21:41:47'),
(2, NULL, 'muhammad al khawarizmi', 11111111, 'Aljabar,Matematika', 'laki-laki', '2020-09-17 22:44:22', '2020-09-17 22:44:22'),
(3, NULL, 'Aviram', 11111110, 'Teknik Mesin', 'laki-laki', '2020-09-18 06:35:30', '2020-09-18 06:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(9) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `nim`, `created_at`, `updated_at`) VALUES
(1, 'Judith herlambang', 175410093, NULL, NULL);

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
  `komentar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `slug`, `nama`, `nim`, `ipk`, `jk`, `komentar`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Uzumaki Sarutod', 1010001, 3, 'laki-laki', '', '2020-09-18 06:33:31', '2020-09-24 10:35:35'),
(2, NULL, 'Uzumaki Bayu', 1001, 4, 'laki-laki', '', '2020-09-18 06:34:02', '2020-09-18 06:34:02'),
(3, 'mark', 'Emilia', 10101014, 4, 'perempuan', '', '2020-09-18 06:34:21', '2020-09-18 09:23:39'),
(51, NULL, 'Hartono', 101110110, 3, 'laki-laki', '', '2020-09-26 07:41:35', '2020-09-26 07:41:35');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
