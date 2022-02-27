-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 03:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smarthome`
--
CREATE DATABASE IF NOT EXISTS `db_smarthome` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_smarthome`;

-- --------------------------------------------------------

--
-- Table structure for table `esp`
--

DROP TABLE IF EXISTS `esp`;
CREATE TABLE IF NOT EXISTS `esp` (
  `id` int(3) NOT NULL,
  `data` enum('0','1') NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esp`
--

INSERT INTO `esp` (`id`, `data`, `time_start`, `time_end`) VALUES
(1, '1', '2021-05-24 17:26:54', '2021-05-25 10:26:54'),
(2, '1', '2021-05-24 16:26:54', '2021-05-24 20:26:54'),
(3, '1', '2021-05-24 18:43:49', '2021-05-25 07:43:49'),
(4, '1', '2021-05-24 16:43:49', '2021-05-24 20:43:49'),
(5, '1', '2021-05-25 19:45:32', '2021-05-26 06:45:32'),
(6, '1', '2021-05-26 20:45:32', '2021-05-27 19:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `group` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `group`, `password`, `email`, `activation_code`, `created_on`, `last_login`, `active`) VALUES
(12, 'qisthi', 'admin', '$2a$12$6po1JOydHBtnbMj7lhU6jO5V1eyqz7/ChFG7K/nsgYFkhCsbXaoJ.', 'qisthi@ondoluye.com', NULL, '2021-05-24 03:16:00', '2021-11-04 20:43:07', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
