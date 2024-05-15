-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 04:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musikweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id` int(11) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `penyanyi` varchar(40) NOT NULL,
  `tglrilis` date DEFAULT NULL,
  `foto` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id`, `judul`, `penyanyi`, `tglrilis`, `foto`) VALUES
(1, 'Sulung', 'Kunto Aji', '2018-09-14', 'sulung.jpg'),
(2, 'Alexandra', 'Reality Club', '2017-07-05', 'alexandra.jpg'),
(3, 'secukupnya', 'Hindia', '2019-03-05', 'secukupnya.jpg'),
(4, 'Mangu', 'Fourtwnty', '2022-02-04', 'mangu.jpeg'),
(5, 'Mata Air', 'Hindia', '2019-11-29', 'mataair.jpg'),
(6, 'Besok Mungkin Kita Sampai', 'Hindia', '2019-11-28', 'besok.jpg'),
(7, 'Rumah ke Rumah', 'Hindia', '2019-11-28', 'rumah.jpg'),
(8, 'Is It the Answer?', 'Reality Club', '2017-08-19', '600x600bf-60.jpg'),
(9, 'Sunshine', 'The Panturas', '2018-02-19', 'sunshine.jpg'),
(10, 'Timur', 'The Adams', '2019-03-06', 'timur.jpg'),
(11, 'Mungkin Takut Perubahan', 'Lomba Sihir', '2021-10-08', 'mungkin.jpg'),
(12, 'Semua Orang Pernah Sakit Hati', 'Lomba Sihir', '2021-03-26', 'semua.jpg'),
(13, '33x', 'Perunggu', '2022-03-11', 'perunggu.jpg'),
(14, 'Pastikan Riuh Akhiri Malammu', 'Perunggu', '2022-03-11', 'perunggu.jpg'),
(15, 'Rehat', 'Kunto Aji', '2018-09-28', 'sulung.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
