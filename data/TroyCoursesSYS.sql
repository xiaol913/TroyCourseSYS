-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 09 日 05:24
-- 服务器版本: 5.1.32
-- PHP 版本: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `troycoursesys`
--
CREATE DATABASE IF NOT EXISTS `TroyCourseSYS`;
USE `troycoursesys`;

-- --------------------------------------------------------

--
-- 表的结构 `troy_admins`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_admins`;
CREATE TABLE IF NOT EXISTS `troy_admins` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `troy_admins`
--

REPLACE INTO `troy_admins` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'superadmin', 'a66abb5684c45962d887564f08346e8d', 'xiaol913@qq.com', 1),
(2, 'xianggao', 'e10adc3949ba59abbe56e057f20f883e', 'xgao127803@troy.edu', 0),
(3, 'xiaol913', 'a85f4ea38d66131b0497d1d62de94e13', '2202568@qq.com', 0);

-- --------------------------------------------------------

--
-- 表的结构 `troy_album`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_album`;
CREATE TABLE IF NOT EXISTS `troy_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pId` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `troy_album`
--


-- --------------------------------------------------------

--
-- 表的结构 `troy_courses`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_courses`;
CREATE TABLE IF NOT EXISTS `troy_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) NOT NULL,
  `courseId` int(10) unsigned NOT NULL,
  `subjectId` int(10) unsigned NOT NULL,
  `courseStartTime` int(50) NOT NULL,
  `courseEndTime` int(50) NOT NULL,
  `courseAvai` int(10) unsigned NOT NULL,
  `courseCapa` int(10) unsigned NOT NULL,
  `courseTerm` int(10) NOT NULL,
  `courseStat` int(10) NOT NULL,
  `courseLoca` varchar(45) NOT NULL,
  `courseDesc` text NOT NULL,
  `courseCred` decimal(10,2) NOT NULL,
  `courseLevel` int(10) NOT NULL,
  `courseProfId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseName` (`courseName`),
  UNIQUE KEY `courseId` (`courseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
-- --------------------------------------------------------

--
-- 表的结构 `troy_level`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_level`;
CREATE TABLE IF NOT EXISTS `troy_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `levelName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `troy_level`
--

REPLACE INTO `troy_level` (`id`, `levelName`) VALUES
(1, 'Undergraduate'),
(2, 'Graduate'),
(3, 'Education Specialist'),
(4, 'Doctorate');

-- --------------------------------------------------------

--
-- 表的结构 `troy_professors`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_professors`;
CREATE TABLE IF NOT EXISTS `troy_professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profFirstName` varchar(55) NOT NULL,
  `profLastName` varchar(55) NOT NULL,
  `profEmail` varchar(55) NOT NULL,
  `profPhoneNum` varchar(55) NOT NULL,
  `profDesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `troy_register`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_register`;
CREATE TABLE IF NOT EXISTS `troy_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sId` int(50) NOT NULL,
  `cId` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `troy_register`
--


-- --------------------------------------------------------

--
-- 表的结构 `troy_schedule`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_schedule`;
CREATE TABLE IF NOT EXISTS `troy_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mon` varchar(55) DEFAULT NULL,
  `tue` varchar(55) DEFAULT NULL,
  `wed` varchar(55) DEFAULT NULL,
  `thu` varchar(55) DEFAULT NULL,
  `fri` varchar(55) DEFAULT NULL,
  `sat` varchar(55) DEFAULT NULL,
  `sun` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

--
-- 表的结构 `troy_students`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_students`;
CREATE TABLE IF NOT EXISTS `troy_students` (
  `sId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` char(45) NOT NULL,
  `sFirstName` varchar(45) NOT NULL,
  `sLastName` varchar(45) NOT NULL,
  `sBTD` varchar(45) NOT NULL,
  `sAddress` varchar(45) NOT NULL,
  `sEmail` varchar(45) NOT NULL,
  `phoneNum` int(15) NOT NULL,
  `sMajorId` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`sId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000004 ;

--
-- 导出表中的数据 `troy_students`
--

REPLACE INTO `troy_students` (`sId`, `username`, `password`, `sFirstName`, `sLastName`, `sBTD`, `sAddress`, `sEmail`, `phoneNum`, `sMajorId`, `level`) VALUES
(1000001, 'student1', '5e5545d38a68148a2d5bd5ec9a89e327', 'First', 'Last', '1995-01-30', 'Address', 'email@email.com', 123456789, '1', '1'),
(1000002, 'student2', '213ee683360d88249109c2f92789dbc3', 'ABC', 'EFD', '1990-02-15', 'Address', 'email@email.com', 987654321, '2', '1'),
(1000003, 'student3', '8e4947690532bc44a8e41e9fb365b76a', 'ZXC', 'VCN', '1989-11-01', 'Address', 'email@email.com', 555555555, '3', '2');

-- --------------------------------------------------------

--
-- 表的结构 `troy_subjects`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_subjects`;
CREATE TABLE IF NOT EXISTS `troy_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subShortName` varchar(15) NOT NULL,
  `subName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subShortName` (`subShortName`),
  UNIQUE KEY `subName` (`subName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `troy_subjects`
--


-- --------------------------------------------------------

--
-- 表的结构 `troy_term`
--
-- 创建时间: 2016 年 04 月 09 日 05:19
--

DROP TABLE IF EXISTS `troy_term`;
CREATE TABLE IF NOT EXISTS `troy_term` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `termName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `troy_term`
--

REPLACE INTO `troy_term` (`id`, `termName`) VALUES
(1, 'Fall Semester 2016'),
(2, 'Summer Semester 2016'),
(3, 'Spring Semester 2016'),
(4, 'Term V 2016'),
(5, 'Term IV 2016'),
(6, 'Term III 2016'),
(7, 'Summer International 2016'),
(8, 'Spring International 2016');
