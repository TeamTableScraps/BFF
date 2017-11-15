-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2017 at 03:27 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `blackfeather` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blackfeather`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(10) NOT NULL AUTO_INCREMENT UNIQUE,
  `first_name` blob NOT NULL,
  `last_name` blob NOT NULL,
  `email` blob NOT NULL,
  `password` blob NOT NULL,
  `is_organizer` boolean NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`user_ID`)

) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `booths`;
CREATE TABLE IF NOT EXISTS `booths` (
  `booth_ID` int(10) NOT NULL AUTO_INCREMENT UNIQUE,
  `is_available` boolean NOT NULL,
  PRIMARY KEY (`booth_ID`)

) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `user_ID` int(10) NOT NULL UNIQUE,
  `booth_ID` int(10) UNIQUE,
  `years_active` smallint,
  PRIMARY KEY (`user_ID`),
  FOREIGN KEY (`user_ID`) REFERENCES users(`user_ID`),
  FOREIGN KEY (`booth_ID`) REFERENCES booths(`booth_ID`)

) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `user_ID` int(10) NOT NULL UNIQUE,
  `sponsorship_level` blob,
  `years_active` smallint,
  PRIMARY KEY (`user_ID`),
  FOREIGN KEY (`user_ID`) REFERENCES users(`user_ID`)

) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

COMMIT;
