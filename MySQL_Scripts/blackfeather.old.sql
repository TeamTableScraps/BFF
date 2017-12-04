-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2017 at 12:00 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`booth_ID`, `is_available`) VALUES
(1, 0),
(2, 1),
(3, 1),
(4, 0),
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
  `sponsorship_level` blob,
  `years_active` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`user_ID`, `sponsorship_level`, `years_active`) VALUES
(7, 0x87762c49d32bea947450731b9baf13c3, 2),
(8, 0x612258607127bc51530b12b1c837aa2d, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `first_name`, `last_name`, `email`, `password`, `phone`, `is_organizer`) VALUES
(1, 0xd6b90b7a940aba8122ab6abfa6be23d4, 0x34fab0dc72b6a2c2f55ab6c5032b1e98, 0xd22222e5fde742d062fdd3df0f0f9287, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(2, 0xa33161189a93dd00b2c1f5d11ec9bd0e, 0x34fab0dc72b6a2c2f55ab6c5032b1e98, 0xd06fe87b61ae45a7a41983034c7476f0, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(3, 0xd33182d44bd669f3e500f79ff569e33b, 0xc2b826094a0710e5be02dd9f20f78195, 0x911437466fe57e407365b697693aaf4b, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(4, 0x749841dc009a0da936853bae5834de3d, 0xda0c27df7e026ecca43470712150310c, 0xc61b1f95e083ce8a3026691ba47d220849408a751488026f525c76b0cb4e3d2b, 0x03829cb31a5fb944f0a49adb5c50b858, '', 1),
(5, 0x5a99fe32ca6149b5331b9716a0f406e9, 0xdf2f1f87069e2d3998eb798f9e09a9c1, 0xaf66d611f096faf5567a8a080bc7258b49408a751488026f525c76b0cb4e3d2b, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(6, 0x5a99fe32ca6149b5331b9716a0f406e9, 0xd683329bb10545e66136d7d489d1072a, 0x216e645e36181e54a81edc7eff17d0e0ddcd320c570f27d25f90ac030f64f53d, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(7, 0x7d929c14f9892b8618546df0082ef078, 0xdf2f1f87069e2d3998eb798f9e09a9c1, 0x560086e11f047ea72df535e4c391f7952bd6d0bdde6a7119d27aea0fbdfaeb16, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(8, 0x7d929c14f9892b8618546df0082ef078, 0xd683329bb10545e66136d7d489d1072a, 0x948d9bc6438a39bdf9cc80abe4d78ece1e7c57a057bcb6b25e3db1116959e8e2, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0),
(9, 0x910496e3cf08c0e4a28f96d3fedacf87, 0x5e74586c67a1d569e544e0f974c877d4, 0xe8459a91828c574c11319ae6ecfc0410b213d8d25a73d2e90082a272e9747937, 0x03829cb31a5fb944f0a49adb5c50b858, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `user_ID` int(10) NOT NULL,
  `booth_ID` int(10) DEFAULT NULL,
  `years_active` smallint(6) DEFAULT NULL,
  `vendor_type` varchar(100) NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`),
  UNIQUE KEY `booth_ID` (`booth_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`user_ID`, `booth_ID`, `years_active`, `vendor_type`) VALUES
(5, 1, 2, 'Hot dogs'),
(6, 4, 5, 'Wings');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
