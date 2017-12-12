-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2017 at 09:50 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackfeather`
--
CREATE DATABASE IF NOT EXISTS `blackfeather` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blackfeather`;

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

DROP TABLE IF EXISTS `booths`;
CREATE TABLE IF NOT EXISTS `booths` (
  `booth_ID` int(10) NOT NULL AUTO_INCREMENT,
  `is_available` tinyint(1) NOT NULL,
  PRIMARY KEY (`booth_ID`),
  UNIQUE KEY `booth_ID` (`booth_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`booth_ID`, `is_available`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(10, 1),
(9, 1),
(8, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 0),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(5, 1),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `user_ID` int(10) NOT NULL,
  `sponsorship_level` blob NOT NULL,
  `spons_name` blob NOT NULL,
  `spons_phone` blob NOT NULL,
  `spons_email` blob NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`user_ID`, `sponsorship_level`, `spons_name`, `spons_phone`, `spons_email`) VALUES
(11, 0xf727fe07f7d992040c799232085ec345, 0xb7af6af1302d8cb551b946daa6b2049a, 0x2bf8fa8ee3c06fb2f7c82a45501d6031, 0x5eba6ab53a3e6315a18d87fb8d9386792bd6d0bdde6a7119d27aea0fbdfaeb16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` blob NOT NULL,
  `last_name` blob NOT NULL,
  `email` blob NOT NULL,
  `password` blob NOT NULL,
  `phone` blob NOT NULL,
  `is_organizer` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `first_name`, `last_name`, `email`, `password`, `phone`, `is_organizer`) VALUES
(11, 0x910496e3cf08c0e4a28f96d3fedacf87, 0x5e74586c67a1d569e544e0f974c877d4, 0x0602b3959e954d904d9d2a3b3ac202bdc3f9e7d42a20f448953eea410db59213, 0x03829cb31a5fb944f0a49adb5c50b858, 0xe4f68e0f253ef4e1e078dc54c01960b1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `user_ID` int(10) NOT NULL,
  `booth_ID` int(10) NOT NULL DEFAULT '0',
  `bznz_name` varchar(50) NOT NULL,
  `bznz_phone` varchar(16) NOT NULL,
  `bznz_url` varchar(150) NOT NULL,
  `bznz_email` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`user_ID`, `booth_ID`, `bznz_name`, `bznz_phone`, `bznz_url`, `bznz_email`, `description`) VALUES
(11, 18, 'Mike\\\'s Meals', '850-418-7097', 'http://www.mikesmeals.com', 'mike@mikesmeals.com', 'We serve food AND vodka!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
