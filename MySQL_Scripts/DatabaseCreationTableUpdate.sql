-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2017 at 09:38 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `blackfeatherfestival`
--
CREATE DATABASE IF NOT EXISTS `blackfeatherfestival` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blackfeatherfestival`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `first_name` blob NOT NULL,
  `last_name` blob NOT NULL,
  `email` blob NOT NULL,
  `password` blob NOT NULL,
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

INSERT INTO `users` (`user_ID`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 0x247596049f3440f7dff8a470ae624a92, 0xaededb434abf6f816110867abe65dee4, 0xe8459a91828c574c11319ae6ecfc0410b213d8d25a73d2e90082a272e9747937, 0xba404cf044197a41142d3baf014b30b8);
COMMIT;
