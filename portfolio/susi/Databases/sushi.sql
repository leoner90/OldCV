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
-- Database: `sushi`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` decimal(2,2) NOT NULL,
  `name` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `img1`, `img2`, `img3`, `img4`, `description`, `price`, `name`) VALUES
(1, '../img/tigerMain.png', '../img/tigerSmallFirst.png', '../img/tigerSmallSecond.png', '../img/tigerSmallThird.png', 'Batch sushi rice, made with  raw rice.\nlarge raw peeled tiger prawns.\ntbsp tobiko, flying fish roe.\ntbsp Japanese mayonnaise, or ordinary mayonnaise.\nsheets nori seaweed.\nleaves of baby gem lettuce.\n', '0.19', 'Tiger Sushi Roll.'),
(3, '../img/philadelphiaMain.png', '../img/philadelphiaSmallFirst.png', '../img/philadelphiaSmallSecond.png', '../img/philadelphiaSmallThird.png', 'Sushi rice.  water. seasoned rice vinegar.  nori (seaweed paper)  smoked salmon. small cucumber.  cream cheese.', '0.99', 'Philadelphia '),
(4, '../img/californiaMain.png', '../img/californiaSmallFirst.png', '../img/californiaSmallSecond.png', '../img/californiaSmallThird.png', ' Crab meat, avocado, nori, cucumber, and sesame seeds.  ', '0.99', 'California Roll'),
(8, '../img/mangoMain.png', '../img/mangoSmallFirst.png', '../img/mangoSmallSecond.png', '../img/mangoSmallThird.png', 'Avocado, crab meat, tempura shrimp, mango slices, and creamy mango paste.', '0.99', 'Mango Roll'),
(9, '../img/salmonMain.png', '../img/salmonSmallFirst.png', '../img/salmonSmallSecond.png', '../img/salmonSmallThird.png', 'Cream cheese, yamagobo, and avocado inside. Baked salmon on top.', '0.96', 'Baked Salmon Roll');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
