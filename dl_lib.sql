-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 10:21 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dl_lib`
--
CREATE DATABASE IF NOT EXISTS `dl_lib` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dl_lib`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` double NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_by` double NOT NULL DEFAULT '0',
  `nhasanxuat` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sotrang` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `luotxem` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `namsanxuat` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `parent`, `image`, `description`, `price`, `number`, `post_date`, `post_by`, `nhasanxuat`, `sotrang`, `luotxem`, `namsanxuat`, `status`) VALUES
(1, 'Test sach 1', 'Hoang', 1, '', '', '0', '0', '2015-11-16 02:28:16', 0, '', '0', '0', '', 1),
(2, 'Test sach 1', 'Hoang', 1, '', '', '0', '0', '2015-11-16 02:28:16', 0, '', '0', '0', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `id` double NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `date_created`, `created_by`, `status`) VALUES
(1, 'Chu de 1', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `id` double NOT NULL AUTO_INCREMENT,
  `book_id` double NOT NULL,
  `member_id` double NOT NULL,
  `mod_id` double NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` double NOT NULL AUTO_INCREMENT,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acc_type` tinyint(1) NOT NULL COMMENT '1: master admin, 2: mod, 3: user',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `account`, `password`, `acc_type`, `status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
(2, 'smod', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(3, 'member', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_description`
--

CREATE TABLE IF NOT EXISTS `member_description` (
  `id` double NOT NULL AUTO_INCREMENT,
  `member_id` double NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `class` text COLLATE utf8_unicode_ci NOT NULL,
  `school` text COLLATE utf8_unicode_ci NOT NULL,
  `daybirth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
