-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2013 at 05:08 AM
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
-- Table structure for table `insurance_table`
--

CREATE TABLE IF NOT EXISTS `insurance_table` (
  `insurance_id` int(11) NOT NULL AUTO_INCREMENT,
  `money_area_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_currency_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `us_inventory_sf` int(11) NOT NULL,
  `ec_inventory_sf` int(11) NOT NULL,
  `br_inventory_sf` int(11) NOT NULL,
  `us_chip_no` int(11) NOT NULL,
  `ec_chip_no` int(11) NOT NULL,
  `br_chip_no` int(11) NOT NULL,
  `us_pc_no` int(11) NOT NULL,
  `ec_pc_no` int(11) NOT NULL,
  `br_pc_no` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`insurance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `insurance_table`
--

INSERT INTO `insurance_table` (`insurance_id`, `money_area_id`, `user_id`, `payment_currency_id`, `period_id`, `us_inventory_sf`, `ec_inventory_sf`, `br_inventory_sf`, `us_chip_no`, `ec_chip_no`, `br_chip_no`, `us_pc_no`, `ec_pc_no`, `br_pc_no`, `timestamp`) VALUES
(1, 4, 2, 4, 0, 3000, 6000, 3000, 15, 16, 15, 17, 17, 15, '2013-09-12 12:49:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
