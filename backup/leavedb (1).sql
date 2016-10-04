-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 11:58 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `assign_person_name` varchar(45) DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `leavedate_from` date DEFAULT NULL,
  `startdate_half` int(11) DEFAULT NULL,
  `leavedate_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `user_id`, `assign_person_name`, `reason`, `leavedate_from`, `startdate_half`, `leavedate_to`, `status`) VALUES
(1, 8, 'Kaveendra', 'Weeding ', '2016-09-08', 0, '2016-09-08', 1),
(3, 4, 'Azminx', 'Posanal reason', '2016-09-08', 0, '2016-09-08', 1),
(4, 6, 'ranjan@nexlanka.com', 'postponed leave ', '2016-09-13', 0, '2016-09-13', 1),
(5, 4, 'Azminx', 'Personel ', '2016-10-01', 0, '2016-10-02', 0),
(6, 2, 'Sunethra', 'private', '2016-09-27', 0, '2016-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `register_id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) DEFAULT NULL,
  `last` varchar(255) DEFAULT NULL,
  `tp` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `confirmpass` varchar(255) DEFAULT NULL,
  `basic_salory` varchar(255) DEFAULT NULL,
  `education_qualifications` varchar(255) DEFAULT NULL,
  `professional_qualifications` varchar(255) DEFAULT NULL,
  `imageurl` varchar(500) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first`, `last`, `tp`, `pass`, `confirmpass`, `basic_salory`, `education_qualifications`, `professional_qualifications`, `imageurl`, `nic`, `dob`, `status`, `bank_name`, `account_number`) VALUES
(1, 'admin', 'admin', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '2016-08-09', 1, NULL, NULL),
(2, 'ranjan@nexlanka.com', 'M.M.R.N. Jayasinghe', '+94716618826', 'Ranjan@nexlanka', 'Ranjan@nexlanka', '12000', '', '', '../uploads/1472645277.jpg', '873610506V', '1987-12-26', 0, 'BOC', '79013372'),
(3, 'Rajika', 'N.R. Munasinghe', '+94716894116', 'Rajika116', 'Rajika116', '', '', '', '../uploads/1472646657.jpg', '726731993V', '1972-06-21', 0, 'BOC', '79014872'),
(4, 'Shamika Ranga', 'H.R.S.R. Kumara', '+94715287456', 'Shamika944', 'Shamika944', '', '', '', '../uploads/1472647374.jpg', '893652817V', '1989-12-30', 0, 'BOC', '79012475'),
(5, 'Azminx', 'M.A.M Asmi', '+94757891910', 'Azminx910', 'Azminx910', '', '', '', '../uploads/1472697993.jpg', '952692127V', '1995-09-25', 0, 'BOC', '79013396'),
(6, 'Sunethra', 'T.M.S.K. Wedanda', '+940716778779', 'Sunethranx677', 'Sunethranx677', '', '', '', '../uploads/1472698597.jpg', '8978601171V', '1989-10-12', 0, 'BOC', '9890610'),
(7, 'Dulajent', 'W. Dulaj Niroshan Jayaweera', '+94779750061', 'Dulajent501dULAJENT501', '', '', '', '', '../uploads/1472698894.jpg', '961860180V', '1996-07-04', 0, 'BOC', '79013575'),
(8, 'Kaveendra', 'W.M.T.K. Senevirathna', '+94721823143', '', '', '', '', '', '../uploads/1472699088.jpg', '950811331V', '1995-03-21', 0, 'BOC', '6244844'),
(9, 'Dulanjana', 'M.L.Dulanjana Liyanage', '+94770185593', 'Liyanage593', 'Liyanage593', '', '', '', '../uploads/1472699415.jpg', '923663959V', '1992-12-31', 0, 'BOC', '79012532'),
(10, 'RanawakaNS', 'D.A.L.B.S. Ranawaka', '+94714227039', 'RanawakaNS39', 'RanawakaNS39', '12000', '', '', '../uploads/1472699789.jpg', '900521782V', '1990-02-21', 0, 'BOC', '79012077'),
(11, 'NishshankaNS', 'R.R.R.K.L. Nishshanka', '+948340615', 'kavindaShSh', 'kavindaNsNs', '12000', '', '', '../uploads/1472700178.jpg', '910052969V', '1991-01-05', 0, 'BOC', '79013340'),
(12, 'DanthilaNS', 'D.M.D.K.B. Dissanayaka', '+94713387300', 'Danns7373', 'Danns7373', '12000', '', '', '../uploads/1472701096.jpg', '87353943V', '1987-12-18', 0, 'BOC', '873533943');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
