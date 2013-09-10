-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2013 at 05:25 AM
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
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `msg` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `anony_flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`mail_id`, `thread_id`, `post_id`, `timestamp`, `sender_id`, `receiver_id`, `msg`, `status`, `anony_flag`) VALUES
(70, 29, 39, '2013-09-09 04:02:26', 2, 4, 'Test', 1, 1),
(71, 29, 39, '2013-09-09 04:02:26', 4, 2, 'Testing out', 1, 1),
(72, 29, 39, '2013-09-09 04:02:26', 2, 4, 'I give up :(', 1, 0),
(73, 30, 40, '2013-09-09 03:49:02', 4, 2, 'Test', 1, 0),
(74, 29, 39, '2013-09-09 04:02:26', 2, 4, 'test reply', 1, 0),
(75, 31, 42, '2013-09-09 04:08:39', 4, 8, 'Reply1 :)', 1, 0),
(76, 31, 42, '2013-09-09 04:08:39', 4, 8, 'Reply1 :)', 1, 0),
(77, 31, 42, '2013-09-09 04:08:39', 4, 8, 'Reply2', 1, 0),
(78, 31, 42, '2013-09-09 04:08:39', 4, 8, 'Reply3\r\n', 1, 0),
(79, 31, 42, '2013-09-09 04:08:39', 4, 8, 'reply4\r\n', 1, 0),
(80, 30, 40, '2013-09-09 03:49:02', 2, 4, 'Test', 1, 1),
(81, 30, 40, '2013-09-09 03:49:02', 2, 4, 'Test2', 1, 1),
(82, 32, 42, '2013-09-09 04:08:24', 2, 8, 'Test Reply - unread', 1, 0),
(83, 32, 42, '2013-09-09 04:08:24', 2, 8, 'Test Reply - unread', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE IF NOT EXISTS `postings` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `type_id` int(11) NOT NULL,
  `period` int(5) NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anony_flag` tinyint(4) NOT NULL DEFAULT '0',
  `full_visibility` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `user_id` (`user_id`,`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`post_id`, `title`, `desc`, `type_id`, `period`, `status_id`, `user_id`, `timestamp`, `anony_flag`, `full_visibility`) VALUES
(39, 'Foo Bar', 'Description', 1, 1, 1, 4, '2013-09-08 00:03:52', 1, 1),
(40, 'Post Visi', 'Ability', 1, 1, 0, 2, '2013-09-09 04:20:21', 0, 0),
(41, 'Title', 'Test', 0, 1, 1, 2, '2013-09-09 04:20:30', 0, 0),
(42, 'Test Email', 'Notification', 2, 6, 1, 8, '2013-09-09 01:49:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `postings_bkp`
--

CREATE TABLE IF NOT EXISTS `postings_bkp` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `type_id` int(11) NOT NULL,
  `period` varchar(5) NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `user_id` (`user_id`,`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `postings_bkp`
--

INSERT INTO `postings_bkp` (`post_id`, `title`, `desc`, `type_id`, `period`, `status_id`, `user_id`, `timestamp`) VALUES
(1, 'Sed ac ultricies aenean', 'testDescription', 1, '1', 1, 0, '2013-08-30 09:52:12'),
(2, 'Phasellus sit et ', 'testDescription', 1, '1', 1, 1, '2013-08-30 09:52:24'),
(3, 'Rahul testing', 'Adipiscing odio proin pid velit lorem pellentesque in, velit tortor pulvinar proin. Enim nunc, magna in? Mattis, non a turpis, platea nunc velit sed urna scelerisque integer, etiam ac augue, enim integer egestas, amet in diam, lectus nascetur. Diam adipiscing ac egestas et amet vut magna placerat nunc? Mus ac lorem ut, tristique amet urna aliquet. Massa enim. Cum scelerisque porta placerat urna, cursus etiam sed, ultricies porta? ', 2, '4', 0, 2, '2013-08-30 10:50:03'),
(4, 'Hello World', 'Turpis eu augue, ac porta massa enim tortor placerat, porttitor placerat. Velit rhoncus hac rhoncus eros adipiscing sit, ut cras diam amet quis, elit lacus turpis odio cum nec nisi odio enim, sed! Elit auctor! Vut eu cum tincidunt. Amet mattis natoque integer eu tristique nisi penatibus. Montes cum, magna? Habitasse magnis pellentesque nascetur pulvinar? Pulvinar. Ridicu', 1, '8', 1, 2, '2013-08-30 09:52:51'),
(5, 'Foo Bar', 'DescriptionTurpis eu augue, ac porta massa enim tortor placerat, porttitor placerat. Velit rhoncus hac rhoncus eros adipiscing sit, ut cras diam amet quis, elit lacus turpis odio cum nec nisi odio enim, sed! Elit auctor! Vut eu cum tincidunt. Amet mattis natoque integer eu tristique nisi penatibus. Montes cum, magna? Habitasse magnis pellentesque nascetur pulvinar? Pulvinar. Ridicu', 1, '5', 0, 2, '2013-08-30 10:58:34'),
(6, 'Introduction to DBMS', 'DescriptionTurpis eu augue, ac porta massa enim tortor placerat, porttitor placerat. Velit rhoncus hac rhoncus eros adipiscing sit, ut cras diam amet quis, elit lacus turpis odio cum nec nisi odio enim, sed! Elit auctor! Vut eu cum tincidunt. Amet mattis natoque integer eu tristique nisi penatibus. Montes cum, magna? Habitasse magnis pellentesque nascetur pulvinar? Pulvinar. Ridicu', 1, '5', 1, 2, '2013-08-30 09:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_visibility`
--

CREATE TABLE IF NOT EXISTS `post_visibility` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_visibility`
--

INSERT INTO `post_visibility` (`post_id`, `user_id`) VALUES
(40, 5),
(40, 7),
(40, 10),
(40, 12),
(41, 4);

-- --------------------------------------------------------

--
-- Table structure for table `recyclebin`
--

CREATE TABLE IF NOT EXISTS `recyclebin` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `type_id` int(11) NOT NULL,
  `period` varchar(5) NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anony_flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `user_id` (`user_id`,`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `recyclebin`
--

INSERT INTO `recyclebin` (`post_id`, `title`, `desc`, `type_id`, `period`, `status_id`, `user_id`, `timestamp`, `anony_flag`) VALUES
(4, 'Hello World', 'Turpis eu augue, ac porta massa enim tortor placerat, porttitor placerat. Velit rhoncus hac rhoncus eros adipiscing sit, ut cras diam amet quis, elit lacus turpis odio cum nec nisi odio enim, sed! Elit auctor! Vut eu cum tincidunt. Amet mattis natoque integer eu tristique nisi penatibus. Montes cum, magna? Habitasse magnis pellentesque nascetur pulvinar? Pulvinar. Ridicu', 1, '8', 1, 2, '2013-08-30 09:52:51', 0),
(6, 'Introduction to DBMS', 'DescriptionTurpis eu augue, ac porta massa enim tortor placerat, porttitor placerat. Velit rhoncus hac rhoncus eros adipiscing sit, ut cras diam amet quis, elit lacus turpis odio cum nec nisi odio enim, sed! Elit auctor! Vut eu cum tincidunt. Amet mattis natoque integer eu tristique nisi penatibus. Montes cum, magna? Habitasse magnis pellentesque nascetur pulvinar? Pulvinar. Ridicu', 1, '5', 1, 2, '2013-08-30 09:53:12', 0),
(22, 'we need to license a new patent', 'but we will need 500K', 1, '2', 1, 2, '2013-09-04 15:08:50', 0),
(23, '0', '0', 0, '0', 1, 2, '2013-09-04 15:09:04', 0),
(24, 'titleeeee', 'descreeeee', 2, '2', 0, 2, '2013-09-05 14:07:08', 0),
(25, 'titleeeee', 'descreeeee', 2, '2', 1, 2, '2013-09-04 15:10:26', 0),
(26, 'Anony Test', 'Description', 1, '1', 1, 2, '2013-09-05 14:47:44', 0),
(28, 'Anony Test2', 'Description', 1, '1', 0, 2, '2013-09-05 14:50:14', 1),
(30, 'Dapibus ultrices mus dictumst elementum sed, tortor, porttitor ', 'Description', 1, '1', 1, 2, '2013-09-05 16:18:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `person1_id` int(11) NOT NULL,
  `person2_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `person1_id`, `person2_id`, `post_id`) VALUES
(29, 2, 4, 39),
(30, 4, 2, 40),
(31, 4, 8, 42),
(32, 2, 8, 42);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `teamname` varchar(100) NOT NULL,
  `teamno` int(2) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `teamno` (`teamno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `teamname`, `teamno`) VALUES
(1, 'castro.78@osu.edu', '123', 'Breaking Bad, Inc.', 1),
(2, 'rahulr92@gmail.com', 'test', 'Team2', 2),
(3, 'john', 'john', 'Team3', 3),
(4, 'chris', 'test', 'Team4', 4),
(5, 'quadsurf@gmail.com', '123', 'Team5', 5),
(6, 'sada', 'sada', 'Team6', 6),
(7, 'sad', 'dsd', 'Team7', 7),
(8, 'rahulr921@gmail.com', 'pass', 'Breaking Good Inc.', 8),
(9, 'name8', 'pass', 'Team9', 9),
(10, 'Name10', 'pass', 'Team10', 10),
(11, 'name11', 'pass', 'Team11', 11),
(12, 'name12', 'pass', 'team12', 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
