CREATE DATABASE IF NOT EXISTS `TroyCourseSYS`;
USE `TroyCourseSYS`;
SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;
SET NAMES utf8;
SET @OLD_TIME_ZONE=@@TIME_ZONE;
SET TIME_ZONE='+00:00' ;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 ;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;
SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 ;
/*以上done*/

DROP TABLE IF EXISTS `troy_admins`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_admins` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) not NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_admins` WRITE;
ALTER TABLE `troy_admins` DISABLE KEYS;
INSERT INTO troy_admins (username, password,email,level) VALUES ('superadmin',md5('admin123456'),'xiaol913@qq.com','1');
INSERT INTO troy_admins (username, password,email) VALUES ('xianggao',md5('123456'),'xgao127803@troy.edu');
INSERT INTO troy_admins (username, password,email) VALUES ('xiaol913',md5('651134'),'2202568@qq.com');
ALTER TABLE `troy_admins` ENABLE KEYS;
UNLOCK TABLES;
/*添加一般管理员表，并添加一名默认管理员 done*/

DROP TABLE IF EXISTS `troy_subjects`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subShortName` varchar(15) NOT NULL,
  `subName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subShortName` (`subShortName`),
  UNIQUE KEY `subName` (`subName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_subjects` WRITE;
ALTER TABLE `troy_subjects` DISABLE KEYS;
INSERT INTO troy_subjects (subShortName, subName) VALUES ('CS','Computer Science');
INSERT INTO troy_subjects (subShortName, subName) VALUES ('MTH','Math');
INSERT INTO troy_subjects (subShortName, subName) VALUES ('SPN','Spanish');
ALTER TABLE `troy_subjects` ENABLE KEYS;
UNLOCK TABLES;
/*添加学院表 done*/

DROP TABLE IF EXISTS `troy_courses`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) NOT NULL,
  `courseId` int unsigned NOT NULL,
  `subjectId` int unsigned NOT NULL,
  `courseStartTime` int(50) NOT NULL,
  `courseEndTime` int(50) NOT NULL,
  `courseAvai` int unsigned NOT NULL,
  `courseCapa` int unsigned NOT NULL,
  `courseTerm` int(10) NOT NULL,
  `courseStat` int(10) NOT NULL,
  `courseLoca` varchar(45) NOT NULL,
  `courseDesc` TEXT NOT NULL,
  `courseCred` decimal(10,2) NOT NULL,
  `courseLevel` int(10) NOT NULL,
  `courseProfId` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseName` (`courseName`),
  UNIQUE KEY `courseId` (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_courses` WRITE;
ALTER TABLE `troy_courses` DISABLE KEYS;
INSERT INTO troy_courses (courseAvai,courseName,courseId,subjectId,courseStartTime,courseEndTime,courseCapa,courseTerm,courseStat,courseLoca,courseDesc,courseCred,courseLevel,courseProfId) VALUES ('30','Advanced Programming I','2265','1','11','12','30','3','1','Troy','Provides student the opportunity to gain experience and training in an additional high-level language. The course focuses on advanced topics including objects, structures, applets, graphics, exception handling, files, and streaming.','3','1','1');
INSERT INTO troy_courses (courseAvai,courseName,courseId,subjectId,courseStartTime,courseEndTime,courseCapa,courseTerm,courseStat,courseLoca,courseDesc,courseCred,courseLevel,courseProfId) VALUES ('30','Fundamentals of Algebra','1100','2','17','18','30','3','1','Troy','Topics include integer and rational arithmetic, linear equations, inequalities, integer exponents, polynomials and factoring, rational expression. Prerequisite: Placement or a grade of C or better in MTH 0096. Note: This course is for institutional credit only and will not be used in meeting degree requirements. This course will not substitute for any general studies requirement.','3','1','2');
INSERT INTO troy_courses (courseAvai,courseName,courseId,subjectId,courseStartTime,courseEndTime,courseCapa,courseTerm,courseStat,courseLoca,courseDesc,courseCred,courseLevel,courseProfId) VALUES ('30','Introductory Spanish II','1142','3','8','9','30','3','1','Troy','Introduction to the Spanish language and cultures.','3','1','3');
ALTER TABLE `troy_courses` ENABLE KEYS;
UNLOCK TABLES;
/*添加课程表 done*/

DROP TABLE IF EXISTS `troy_students`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_students` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000001;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_students` WRITE;
ALTER TABLE `troy_students` DISABLE KEYS;
INSERT INTO troy_students (username,password,sFirstName,sLastName,sBTD,sAddress,sEmail,phoneNum,sMajorId,level) VALUES ('student1',md5('student1'),'First','Last','1995-01-30','Address','email@email.com','123456789','1','1');
INSERT INTO troy_students (username, password,sFirstName,sLastName,sBTD,sAddress,sEmail,phoneNum,sMajorId,level) VALUES ('student2',md5('student2'),'ABC','EFD','1990-02-15','Address','email@email.com','987654321','2','1');
INSERT INTO troy_students (username, password,sFirstName,sLastName,sBTD,sAddress,sEmail,phoneNum,sMajorId,level) VALUES ('student3',md5('student3'),'ZXC','VCN','1989-11-01','Address','email@email.com','555555555','3','2');
ALTER TABLE `troy_students` ENABLE KEYS;
UNLOCK TABLES;
/*添加学生表 done*/

DROP TABLE IF EXISTS `troy_schedule`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mon` varchar(55) NULL,
  `tue` varchar(55) NULL,
  `wed` varchar(55) NULL,
  `thu` varchar(55) NULL,
  `fri` varchar(55) NULL,
  `sat` varchar(55) NULL,
  `sun` varchar(55) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_schedule` WRITE;
ALTER TABLE `troy_schedule` DISABLE KEYS;
INSERT INTO troy_schedule (mon,wed,fri) VALUES ('2265','2265','2265');
INSERT INTO troy_schedule (tue,thu) VALUES ('1100','1100');
INSERT INTO troy_schedule (mon,wed,fri) VALUES ('1142','1142','1142');
ALTER TABLE `troy_schedule` ENABLE KEYS;
UNLOCK TABLES;
# 添加课程时间表 done

DROP TABLE IF EXISTS `troy_professors`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profFirstName` varchar(55) NOT NULL ,
  `profLastName` varchar(55) NOT NULL,
  `profEmail` varchar(55) NOT NULL,
  `profPhoneNum` varchar(55) NOT NULL,
  `profDesc` varchar(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_professors` WRITE;
ALTER TABLE `troy_professors` DISABLE KEYS;
INSERT INTO troy_professors (profFirstName,profLastName,profEmail,profPhoneNum) VALUES ('profF1','profL1','prof1@troy.edu','3313313311');
INSERT INTO troy_professors (profFirstName,profLastName,profEmail,profPhoneNum) VALUES ('profF2','profL2','prof2@troy.edu','3323323322');
INSERT INTO troy_professors (profFirstName,profLastName,profEmail,profPhoneNum) VALUES ('profF3','profL3','prof3@troy.edu','3343343344');
ALTER TABLE `troy_professors` ENABLE KEYS;
UNLOCK TABLES;
# 添加教授表 done

DROP TABLE IF EXISTS `troy_album`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pId` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
# 添加相册表 done

DROP TABLE IF EXISTS `troy_term`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_term` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `termName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_term` WRITE;
ALTER TABLE `troy_term` DISABLE KEYS;
INSERT INTO troy_term (termName) VALUES ('Fall Semester 2016');
INSERT INTO troy_term (termName) VALUES ('Summer Semester 2016');
INSERT INTO troy_term (termName) VALUES ('Spring Semester 2016');
INSERT INTO troy_term (termName) VALUES ('Term V 2016');
INSERT INTO troy_term (termName) VALUES ('Term IV 2016');
INSERT INTO troy_term (termName) VALUES ('Term III 2016');
INSERT INTO troy_term (termName) VALUES ('Summer International 2016');
INSERT INTO troy_term (termName) VALUES ('Spring International 2016');
ALTER TABLE `troy_professors` ENABLE KEYS;
UNLOCK TABLES;
# 添加学期表 done

DROP TABLE IF EXISTS `troy_level`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `levelName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
LOCK TABLES `troy_level` WRITE;
ALTER TABLE `troy_level` DISABLE KEYS;
INSERT INTO troy_level (levelName) VALUES ('Undergraduate');
INSERT INTO troy_level (levelName) VALUES ('Graduate');
INSERT INTO troy_level (levelName) VALUES ('Education Specialist');
INSERT INTO troy_level (levelName) VALUES ('Doctorate');
ALTER TABLE `troy_professors` ENABLE KEYS;
UNLOCK TABLES;
# 添加学期表 done

DROP TABLE IF EXISTS `troy_register`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `troy_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sId` int(50) NOT NULL,
  `cId` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
UNLOCK TABLES;
# 添加注册表 done

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;
SET SQL_NOTES=@OLD_SQL_NOTES;
/*done*/
