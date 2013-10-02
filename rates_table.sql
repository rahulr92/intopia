-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2013 at 01:32 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intopia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rates_table`
--

CREATE TABLE IF NOT EXISTS `rates_table` (
  `quarter_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_inven_rt` decimal(3,2) NOT NULL,
  `us_chip_rt` int(11) NOT NULL,
  `us_pc_rt` int(11) NOT NULL,
  `ec_inven_rt` decimal(3,2) NOT NULL,
  `ec_chip_rt` int(11) NOT NULL,
  `ec_pc_rt` int(11) NOT NULL,
  `br_inven_rt` decimal(3,2) NOT NULL,
  `br_chip_rt` int(11) NOT NULL,
  `br_pc_rt` int(11) NOT NULL,
  PRIMARY KEY (`quarter_id`),
  UNIQUE KEY `quarter_id_2` (`quarter_id`),
  KEY `quarter_id` (`quarter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rates_table`
--

INSERT INTO `rates_table` (`quarter_id`, `us_inven_rt`, `us_chip_rt`, `us_pc_rt`, `ec_inven_rt`, `ec_chip_rt`, `ec_pc_rt`, `br_inven_rt`, `br_chip_rt`, `br_pc_rt`) VALUES
(1, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(2, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(3, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(4, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(5, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(6, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(7, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(8, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(9, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(10, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(11, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60),
(12, '0.20', 120, 100, '0.20', 100, 90, '0.20', 50, 60);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
