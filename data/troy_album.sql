-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-14 02:51:18
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
-- 表的结构 `troy_album`
--

DROP TABLE IF EXISTS `troy_album`;
CREATE TABLE IF NOT EXISTS `troy_album` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pId` int(10) UNSIGNED NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `troy_album`
--

INSERT INTO `troy_album` (`id`, `pId`, `albumPath`) VALUES
(1, 2, '9fb32f3ec54e342797b37b9bdf0a33b8.jpg'),
(2, 1, '94a8b37d30d8820d1cc481233b8d7ae6.jpg'),
(3, 3, '24eb0becabfd67de35afcf53ea1063f6.jpg'),
(4, 37, '4106b9c30895fdf93640648de3138ee5.jpg'),
(5, 4, 'a520be8a3b37d76013daac7354fa8789.jpg'),
(6, 5, 'b21e61e33ef99685f758f24ed5f4d7b1.jpg'),
(7, 6, '11fb7d99ea2f133c6b69f5cd500d84ef.jpg'),
(8, 7, '27dea07aeb3c96f042066139980ee2e3.jpg'),
(9, 8, '505813503b81f8e0c2a186f54da4755e.jpg'),
(10, 9, 'bf9164f6aa64def15c53c28c415a4c0d.jpg'),
(11, 10, '9859744033c6bb36ef283a108beb2fa1.jpg'),
(12, 2, 'abeebe01b947d5ef5d55413b394b6185.jpg'),
(13, 2, '182904f25ae2456448aa3276702c45d4.jpg'),
(14, 8, '921bd18b6a70e55b1d20800559c0a71c.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
