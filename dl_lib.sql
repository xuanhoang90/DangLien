-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 04:26 PM
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
  `maso_sach` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ma_issn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ddc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kichthuoc` text COLLATE utf8_unicode_ci NOT NULL,
  `ngonngu` text COLLATE utf8_unicode_ci NOT NULL,
  `tukhoa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `kholuutru` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `parent`, `image`, `description`, `price`, `number`, `post_date`, `post_by`, `nhasanxuat`, `sotrang`, `luotxem`, `namsanxuat`, `maso_sach`, `theloai`, `ma_issn`, `ma_ddc`, `kichthuoc`, `ngonngu`, `tukhoa`, `kholuutru`, `status`) VALUES
(3, 'Hello 2', 'Xuan Hoang', 1, '/uploads/images/Ahri Dynasty (Chinese artwork).png', 'dsfadfasf', '123', '123', '2015-11-18 07:52:39', 1, 'Xuan Hoang', '123', '0', '1234', '12345', 'sach', '1234', '1234', '123', 'vi', 'asdfdfsf', '1', 1),
(4, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:50:48', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(5, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:51:50', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(6, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:53:25', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(7, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:53:49', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(8, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:55:47', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(9, 'ertert', '123123', 1, '/uploads/images/acolyte_lee_sin_by_fazie69-d5njm0e.png', 'qweqwe', '123', '123', '2015-11-17 14:56:13', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(10, 'Hello Xuan Hoang', 'Hoang', 2, '/uploads/images/Akali Blood Moon.png', 'dfdsfsdf', '123', '123', '2015-11-17 15:12:04', 1, 'Kim Dong', '123', '0', '1234', '12343', 'tapchi', '1234', '1234', '1280x500', 'vi', 'Sach, Hello', '2', 1),
(11, 'Test 1', 'erwerwer', 3, '/uploads/images/Ezreal Pulsefire (without LoL logo).png', 'dsfdsfsdf', '123', '123', '2015-11-18 07:04:45', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '2', 1),
(13, 'Dang Lien Book', 'Dang Lien', 2, '/uploads/images/1524856.png', 'asdasdasd', '1000000', '123', '2015-11-18 08:00:03', 1, 'Kim Dong', '23', '0', '2015', '12345', 'tapchi', '1234', '1234', '1280x500', 'en', 'Sach, Hello', '2', 1),
(14, 'Hello Xuan Hoang', 'Hoang', 1, '/uploads/images/1_homepage.__large_preview.jpg', 'qweqwe', '123', '123', '2015-11-19 02:41:29', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(15, 'Hello Xuan Hoang', 'Hoang', 1, '/uploads/images/1_homepage.__large_preview.jpg', 'qweqwe', '123', '123', '2015-11-19 02:41:35', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(16, 'Hello Xuan Hoang', 'Hoang', 1, '/uploads/images/1_homepage.__large_preview.jpg', 'qweqwe', '123', '123', '2015-11-19 02:41:41', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1),
(17, 'Hello Xuan Hoang', 'Hoang', 1, '/uploads/images/1_homepage.__large_preview.jpg', 'qweqwe', '123', '123', '2015-11-19 02:41:48', 1, 'Kim Dong', '123', '0', '1234', '12343', 'sach', '1234', '1234', '123', 'vi', 'Sach, Hello', '1', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `date_created`, `created_by`, `status`) VALUES
(1, 'Chu de 1', '0000-00-00 00:00:00', 0, 1),
(2, 'Chu de 2', '0000-00-00 00:00:00', 0, 1),
(3, 'Chu de 3', '0000-00-00 00:00:00', 0, 1),
(4, 'Danh muc (New 1)', '2015-11-18 15:46:24', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `account`, `password`, `acc_type`, `status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
(2, 'smod', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(3, 'member', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1),
(5, 'xuanhoang', 'e10adc3949ba59abbe56e057f20f883e', 3, 1);

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
