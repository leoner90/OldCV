-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 04:40 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gettimelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `april`
--

CREATE TABLE IF NOT EXISTS `april` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `april`
--

INSERT INTO `april` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `august`
--

CREATE TABLE IF NOT EXISTS `august` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `august`
--

INSERT INTO `august` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `december`
--

CREATE TABLE IF NOT EXISTS `december` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `december`
--

INSERT INTO `december` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `february`
--

CREATE TABLE IF NOT EXISTS `february` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `february`
--

INSERT INTO `february` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, '/10/8/9/11'),
(27, ''),
(28, ''),
(29, '');

-- --------------------------------------------------------

--
-- Table structure for table `january`
--

CREATE TABLE IF NOT EXISTS `january` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `january`
--

INSERT INTO `january` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `julay`
--

CREATE TABLE IF NOT EXISTS `julay` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `julay`
--

INSERT INTO `julay` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `june`
--

CREATE TABLE IF NOT EXISTS `june` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `june`
--

INSERT INTO `june` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `march`
--

CREATE TABLE IF NOT EXISTS `march` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `march`
--

INSERT INTO `march` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, '/17'),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `may`
--

CREATE TABLE IF NOT EXISTS `may` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `may`
--

INSERT INTO `may` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `november`
--

CREATE TABLE IF NOT EXISTS `november` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `november`
--

INSERT INTO `november` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `october`
--

CREATE TABLE IF NOT EXISTS `october` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `october`
--

INSERT INTO `october` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `september`
--

CREATE TABLE IF NOT EXISTS `september` (
  `date` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(2000) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `september`
--

INSERT INTO `september` (`date`, `time`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
