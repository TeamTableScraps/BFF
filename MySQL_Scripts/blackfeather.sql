SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `blackfeather` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blackfeather`;

DROP TABLE IF EXISTS `booths`;
CREATE TABLE IF NOT EXISTS `booths` (
  `booth_ID` int(10) NOT NULL AUTO_INCREMENT,
  `is_available` tinyint(1) NOT NULL,
  PRIMARY KEY (`booth_ID`),
  UNIQUE KEY `booth_ID` (`booth_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

INSERT INTO `booths` (`booth_ID`, `is_available`) VALUES
(1, 0),
(2, 1),
(3, 1),
(4, 0),
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
(18, 1),
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
COMMIT;
