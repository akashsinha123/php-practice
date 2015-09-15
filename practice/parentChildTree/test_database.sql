-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2010 at 08:43 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `parentchild`
--

CREATE TABLE IF NOT EXISTS `parentchild` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Parent_ID` bigint(20) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `parentchild`
--

INSERT INTO `parentchild` (`ID`, `Parent_ID`, `Name`) VALUES
(1, 0, 'a'),
(2, 0, 'b'),
(3, 1, 'c'),
(4, 1, 'd'),
(5, 3, 'e'),
(6, 3, 'f'),
(7, 5, 'i'),
(8, 5, 'j'),
(9, 6, 'k'),
(10, 6, 'l'),
(11, 7, 'm'),
(12, 7, 'n'),
(13, 8, 'o'),
(14, 8, 'p'),
(15, 11, 'q'),
(16, 11, 'r'),
(17, 12, 's'),
(18, 12, 't'),
(19, 4, 'g'),
(20, 4, 'h'),
(21, 19, 'u'),
(22, 19, 'v'),
(23, 22, 'w'),
(24, 22, 'x'),
(25, 2, 'y'),
(26, 2, 'z'),
(27, 25, 'y1'),
(28, 25, 'y2'),
(29, 26, 'z1'),
(30, 26, 'z2');