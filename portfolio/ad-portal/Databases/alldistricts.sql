-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 04:39 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alldistricts`
--

-- --------------------------------------------------------

--
-- Table structure for table `birmingham`
--

CREATE TABLE IF NOT EXISTS `birmingham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

-- --------------------------------------------------------

--
-- Table structure for table `bradford`
--

CREATE TABLE IF NOT EXISTS `bradford` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `bristol`
--

CREATE TABLE IF NOT EXISTS `bristol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leeds`
--

CREATE TABLE IF NOT EXISTS `leeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `liverpool`
--

CREATE TABLE IF NOT EXISTS `liverpool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `london`
--

CREATE TABLE IF NOT EXISTS `london` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manchester`
--

CREATE TABLE IF NOT EXISTS `manchester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sheffield`
--

CREATE TABLE IF NOT EXISTS `sheffield` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL,
  `img3` varchar(500) NOT NULL,
  `img4` varchar(500) NOT NULL,
  `tittle` varchar(150) NOT NULL,
  `text` varchar(2500) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `phone` int(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
