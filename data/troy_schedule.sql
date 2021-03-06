-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-14 03:18:39
-- 服务器版本： 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `troycoursesys`
--

-- --------------------------------------------------------

--
-- 表的结构 `troy_schedule`
--

DROP TABLE IF EXISTS `troy_schedule`;
CREATE TABLE IF NOT EXISTS `troy_schedule` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mon` varchar(55) DEFAULT NULL,
  `tue` varchar(55) DEFAULT NULL,
  `wed` varchar(55) DEFAULT NULL,
  `thu` varchar(55) DEFAULT NULL,
  `fri` varchar(55) DEFAULT NULL,
  `sat` varchar(55) DEFAULT NULL,
  `sun` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `troy_schedule`
--

INSERT INTO `troy_schedule` (`id`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
(2, '', '1100', '', '1100', '', '', ''),
(3, '1142', NULL, '1142', NULL, '1142', NULL, NULL),
(4, '2250', '', '2250', '', '2250', '', ''),
(5, '', '2255', '', '2255', '', '', ''),
(6, '3310', '', '3310', '', '3310', '', ''),
(7, '', '3323', '', '3323', '', '', ''),
(8, '', '3332', '', '3332', '', '', ''),
(9, '3329', '', '3329', '', '3329', '', ''),
(10, '', '3360', '', '3360', '', '', ''),
(11, '3370', '', '3370', '', '3370', '', ''),
(12, '3372', '', '3372', '', '3372', '', ''),
(13, '4420', '', '4420', '', '4420', '', ''),
(14, '4445', '', '4445', '', '4445', '', ''),
(15, '4448', '', '4448', '', '4448', '', ''),
(16, '2210', '', '', '', '', '', ''),
(17, '', '1133', '', '1133', '', '', ''),
(19, '1101', '', '1101', '', '1101', '', ''),
(20, '1102', '', '1102', '', '1102', '', ''),
(21, '2206', '', '2206', '', '2206', '', ''),
(22, '3352', '', '3352', '', '3352', '', ''),
(23, '', '2252', '', '2252', '', '', ''),
(24, '2201', '', '2201', '', '2201', '', ''),
(25, '2241', '', '2241', '', '2241', '', ''),
(26, '2225', '2225', '2225', '', '2225', '', ''),
(27, '3331', '', '3331', '', '3331', '', ''),
(28, '3318', '', '3318', '', '3318', '', ''),
(29, '3350', '', '3350', '', '', '', ''),
(30, '4426', '', '4426', '', '4426', '', ''),
(31, '5524', '', '', '', '', '', ''),
(32, '', '5545', '', '', '', '', ''),
(33, '5550', '', '5550', '', '5550', '', ''),
(34, '', '6680', '', '6680', '', '', ''),
(35, '2221', '', '2221', '', '2221', '', ''),
(36, '3335', '', '3335', '', '', '', ''),
(37, '3375', '', '3375', '', '3375', '', ''),
(38, '', '', '3345', '', '', '', ''),
(39, '3380', '', '3380', '', '3380', '', ''),
(40, '4442', '', '4442', '', '4442', '', ''),
(41, '4472', '', '4472', '', '4472', '', ''),
(42, '3395', '', '3395', '', '3395', '', ''),
(43, '2200', '', '2200', '', '2200', '', ''),
(44, '1145', '', '1145', '', '1145', '', ''),
(45, '', '', '', '', '4499', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
