-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 10:59 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `sms_packages`
--

CREATE TABLE IF NOT EXISTS `sms_packages` (
  `pkg_id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(50) NOT NULL,
  `sms_count` int(11) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`pkg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sms_packages`
--

INSERT INTO `sms_packages` (`pkg_id`, `pkg_name`, `sms_count`, `amount`) VALUES
(1, 'Offer1', 10, 5),
(2, 'Offer2', 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nme` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nme`, `mobile_number`, `password`) VALUES
(1, 'test11', '09447062625', 'test11'),
(2, 'test12', '09947785460', 'test12');

-- --------------------------------------------------------

--
-- Table structure for table `user_sms_credit`
--

CREATE TABLE IF NOT EXISTS `user_sms_credit` (
  `user_id` int(11) NOT NULL,
  `sms_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sms_credit`
--

INSERT INTO `user_sms_credit` (`user_id`, `sms_credit`) VALUES
(1, 10),
(2, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
