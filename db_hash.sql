-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 09:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hash`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_algorithm`
--

CREATE TABLE `tbl_algorithm` (
  `id` bigint(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_algorithm`
--

INSERT INTO `tbl_algorithm` (`id`, `name`, `count`) VALUES
(1, 'md2', 2),
(2, 'md4', 0),
(3, 'md5', 0),
(4, 'sha1', 0),
(5, 'sha224', 0),
(6, 'sha256', 0),
(7, 'sha384', 0),
(8, 'sha512/224', 0),
(9, 'sha512/256', 0),
(10, 'sha512', 0),
(11, 'sha3-224', 0),
(12, 'sha3-256', 0),
(13, 'sha3-384', 0),
(14, 'sha3-512', 0),
(15, 'ripemd128', 0),
(16, 'ripemd160', 0),
(17, 'ripemd256', 0),
(18, 'ripemd320', 0),
(19, 'whirlpool', 0),
(20, 'tiger128,3', 0),
(21, 'tiger160,3', 0),
(22, 'tiger192,3', 0),
(23, 'tiger128,4', 0),
(24, 'tiger160,4', 0),
(25, 'tiger192,4', 0),
(26, 'snefru', 0),
(27, 'snefru256', 0),
(28, 'gost', 0),
(29, 'gost-crypto', 0),
(30, 'adler32', 0),
(31, 'crc32', 0),
(32, 'crc32b', 0),
(33, 'fnv132', 0),
(34, 'fnv1a32', 0),
(35, 'fnv164', 0),
(36, 'fnv1a64', 0),
(37, 'joaat', 0),
(38, 'haval128,3', 0),
(39, 'haval160,3', 0),
(40, 'haval192,3', 0),
(41, 'haval224,3', 0),
(42, 'haval256,3', 0),
(43, 'haval128,4', 0),
(44, 'haval160,4', 0),
(45, 'haval192,4', 0),
(46, 'haval224,4', 0),
(47, 'haval256,4', 0),
(48, 'haval128,5', 0),
(49, 'haval160,5', 0),
(50, 'haval192,5', 0),
(51, 'haval224,5', 0),
(52, 'haval256,5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` bigint(20) NOT NULL,
  `normal_string` text COLLATE utf8_persian_ci NOT NULL,
  `hash_string` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `type` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_algorithm`
--
ALTER TABLE `tbl_algorithm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_algorithm`
--
ALTER TABLE `tbl_algorithm`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD CONSTRAINT `tbl_data_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tbl_algorithm` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
