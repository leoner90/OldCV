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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersforadportal`
--

CREATE TABLE IF NOT EXISTS `usersforadportal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `history` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usersforadportal`
--

INSERT INTO `usersforadportal` (`id`, `login`, `password`, `email`, `history`) VALUES
(1, 'leoner', 'dbff5b1fcd564753ea7b628356698166', 'leonid.90@inbox.ru', '114/alldistricts/birmingham/982b63fede095d43e2663fb9a2cf5ec8%115/alldistricts/birmingham/982b63fede095d43e2663fb9a2cf5ec8%1/alldistricts/bradford/982b63fede095d43e2663fb9a2cf5ec8%');

-- --------------------------------------------------------

--
-- Table structure for table `usersforsushi`
--

CREATE TABLE IF NOT EXISTS `usersforsushi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `history` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `usersforsushi`
--

INSERT INTO `usersforsushi` (`id`, `login`, `password`, `email`, `history`) VALUES
(6, 'leoner', 'a9c534509f1f445fc489cfbe84b359eb', 'leonid.90@inbox.ru', ''),
(7, 'leoner2', 'a9c534509f1f445fc489cfbe84b359eb', 'leonid.91@inbox.ru', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
