-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 08:25 PM
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
-- Table structure for table `nec_table`
--

CREATE TABLE IF NOT EXISTS `nec_table` (
  `nec_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `current_period_id` int(11) NOT NULL,
  `exe_period_id` int(11) NOT NULL,
  `area_from_id` int(11) NOT NULL,
  `area_to_id` int(11) NOT NULL,
  `prod_sold` varchar(20) NOT NULL,
  `seller_grade_id` int(11) NOT NULL,
  `unit_quantity` int(11) NOT NULL,
  `cash_payment` int(11) NOT NULL,
  `ap1_amt` int(11) NOT NULL,
  `ap2_amt` int(11) NOT NULL,
  `conversion` int(11) NOT NULL,
  `freight_type` varchar(20) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nec_table`
--

INSERT INTO `nec_table` (`nec_id`, `user_id`, `current_period_id`, `exe_period_id`, `area_from_id`, `area_to_id`, `prod_sold`, `seller_grade_id`, `unit_quantity`, `cash_payment`, `ap1_amt`, `ap2_amt`, `conversion`, `freight_type`, `currency_id`, `unit_price`, `timestamp`) VALUES
(1, 2, 1, 0, 1, 1, 'X', 2, 7, 82, 10, 12, 0, 'Surface (S)', 4, 67, '2013-09-17 17:37:06'),
(2, 2, 1, 1, 1, 1, 'X', 0, 50, 23, 1, 12, 1, 'Air (A)', 1, 12, '2013-09-17 19:35:27'),
(3, 2, 1, 9, 1, 2, 'X', 1, 100, 12, 23, 34, 1, 'Air (A)', 1, 12, '2013-09-17 19:39:56'),
(4, 2, 3, 0, 2, 1, 'Y', 5, 23, 12, 32, 34, 0, 'Surface (S)', 2, 34, '2013-09-17 19:53:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
