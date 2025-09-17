-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2025 at 04:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` char(12) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `foto`, `nama`, `nim`, `jurusan`, `email`) VALUES
(1, 'aqua.png', 'Aqua Hoshino', '002411710001', 'IMT', 'aqua02@yahoo.com'),
(2, 'ruby.png', 'Ruby Hoshino', '005519880001', 'COM', 'r_hoshino@example.com'),
(3, 'kana.png', 'Kana Arima', '002412710003', 'VCD', 'rimakana@example.com'),
(4, 'memcho.png', 'Mem-Cho', '002411710003', 'IMT', 'mem@yahoo.com'),
(5, 'akane.png', 'Akane Kurokawa', '002411710003', 'VCD', 'kurokawa@example.com'),
(6, 'melt.png', 'Melt Narushima', '005519880002', 'COM', 'shimamelt@example.com'),
(7, 'minami.png', 'Minami Kotobuki', '005519880003', 'COM', 'kotonami@example.com'),
(8, 'abiko.png', 'Abiko Samejima', '002412710004', 'VCD', 'bikobiko@yahoo.com'),
(9, 'frill.png', 'Frill Shiranui', '005519880004', 'COM', 'freenui@example.com'),
(10, 'yuki.png', 'Yuki Sumi', '002412710005', 'VCD', 'sukiyumi@example.com'),
(11, 'kengo.png', 'Kengo Morimoto', '002411710001', 'IMT', 'moriken@example.com'),
(12, 'sakuya.png', 'Sakuya Kamoshida', '002411710003', 'IMT', 'sakushida@example.com'),
(13, 'taiki.png', 'Taiki Himekawa', '005519880004', 'COM', 'taikawa@example.com'),
(14, 'yoriko.png', 'Yoriko Kichijou', '002412710004', 'VCD', 'kokijouji@example.com'),
(15, 'sarina.png', 'Sarina Tendouji', '005519880005', 'COM', 'sandouji@example.com'),
(16, 'nobuyuki.png', 'Nobuyuki Kumano', '002411710004', 'IMT', 'kumano@example.com'),
(17, 'miyako.png', 'Miyako Saitou', '005519880006', 'COM', 'miyakosai@example.com'),
(18, 'pieyon.png', 'Pieyon', '002411710003', 'IMT', 'pieyon@example.com'),
(19, 'masaya.png', 'Masaya Kaburagi', '002412710006', 'IMT', 'kaburagi@example.com'),
(20, 'taishi.png', 'Taishi Gotanda', '002412710007', 'IMT', 'gotanda@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
