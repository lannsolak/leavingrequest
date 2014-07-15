-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for upleavingrequest
DROP DATABASE IF EXISTS `upleavingrequest`;
CREATE DATABASE IF NOT EXISTS `upleavingrequest` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `upleavingrequest`;


-- Dumping structure for table upleavingrequest.tbl_calendar
DROP TABLE IF EXISTS `tbl_calendar`;
CREATE TABLE IF NOT EXISTS `tbl_calendar` (
  `calendar_id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_fromdate` date DEFAULT NULL,
  `calendar_todate` date DEFAULT NULL,
  `calendar_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`calendar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_calendar: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_calendar` DISABLE KEYS */;
INSERT INTO `tbl_calendar` (`calendar_id`, `calendar_fromdate`, `calendar_todate`, `calendar_deleted`) VALUES
	(1, '2014-08-01', '2014-08-31', 0),
	(2, '2014-08-01', '2014-08-31', 0),
	(3, '2014-07-15', '2014-08-16', 0),
	(4, '0000-00-00', '0000-00-00', 0),
	(5, '2014-07-15', NULL, 0),
	(6, '2014-07-16', '2014-07-17', 0);
/*!40000 ALTER TABLE `tbl_calendar` ENABLE KEYS */;


-- Dumping structure for table upleavingrequest.tbl_department
DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_title` varchar(45) DEFAULT NULL,
  `dept_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_department: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_department` DISABLE KEYS */;
INSERT INTO `tbl_department` (`dept_id`, `dept_title`, `dept_deleted`) VALUES
	(1, 'ICT', 0);
/*!40000 ALTER TABLE `tbl_department` ENABLE KEYS */;


-- Dumping structure for table upleavingrequest.tbl_request
DROP TABLE IF EXISTS `tbl_request`;
CREATE TABLE IF NOT EXISTS `tbl_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_subject` varchar(45) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `request_approvedate` date DEFAULT NULL,
  `request_message` text,
  `request_approveby` int(11) DEFAULT NULL,
  `tbl_user_user_id` int(11) NOT NULL,
  `tbl_calendar_calendar_id` int(11) DEFAULT NULL,
  `request_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `request_status` varchar(20) DEFAULT '0',
  PRIMARY KEY (`request_id`),
  KEY `fk_tbl_request_tbl_user1_idx` (`tbl_user_user_id`),
  KEY `fk_tbl_request_tbl_calendar1_idx` (`tbl_calendar_calendar_id`),
  KEY `request_approveby` (`request_approveby`),
  CONSTRAINT `fk_tbl_request_tbl_calendar1` FOREIGN KEY (`tbl_calendar_calendar_id`) REFERENCES `tbl_calendar` (`calendar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_request_tbl_user1` FOREIGN KEY (`tbl_user_user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_request_tbl_user2` FOREIGN KEY (`request_approveby`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_request: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_request` DISABLE KEYS */;
INSERT INTO `tbl_request` (`request_id`, `request_subject`, `request_date`, `request_approvedate`, `request_message`, `request_approveby`, `tbl_user_user_id`, `tbl_calendar_calendar_id`, `request_deleted`, `request_status`) VALUES
	(5, 'Sick Leave', '2014-03-05', '0000-00-00', 'I have a body not good', 1, 2, 3, 0, '1'),
	(6, 'stomachache', '2014-03-05', '0000-00-00', 'I have a body not good', 1, 3, 1, 0, '1'),
	(7, 'headach', '2014-03-05', '0000-00-00', 'I have a body not good', 1, 1, 2, 0, '1'),
	(8, 'stomachache', '2014-03-05', '0000-00-00', 'I have a body not good', 1, 1, 2, 0, '1'),
	(9, 'Wedding Saorin', '2014-07-15', NULL, 'Saorin invite to a specail guest.', NULL, 2, 6, 0, '2');
/*!40000 ALTER TABLE `tbl_request` ENABLE KEYS */;


-- Dumping structure for table upleavingrequest.tbl_role
DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  `role_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_role: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` (`role_id`, `role_name`, `role_deleted`) VALUES
	(1, 'administrator', 0),
	(2, 'vice president', 0),
	(3, 'manager', 0),
	(4, 'staff', 0);
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;


-- Dumping structure for table upleavingrequest.tbl_rud
DROP TABLE IF EXISTS `tbl_rud`;
CREATE TABLE IF NOT EXISTS `tbl_rud` (
  `tbl_user_user_id` int(11) NOT NULL,
  `tbl_department_dept_id` int(11) NOT NULL,
  `tbl_role_role_id` int(11) NOT NULL,
  `tbl_rud_deleted` tinyint(1) DEFAULT '0',
  KEY `fk_tbl_rud_tbl_user1` (`tbl_user_user_id`),
  KEY `fk_tbl_rud_tbl_department1_idx` (`tbl_department_dept_id`),
  KEY `fk_tbl_rud_tbl_role1_idx` (`tbl_role_role_id`),
  CONSTRAINT `fk_tbl_rud_tbl_department1` FOREIGN KEY (`tbl_department_dept_id`) REFERENCES `tbl_department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_rud_tbl_role1` FOREIGN KEY (`tbl_role_role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_rud_tbl_user1` FOREIGN KEY (`tbl_user_user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_rud: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_rud` DISABLE KEYS */;
INSERT INTO `tbl_rud` (`tbl_user_user_id`, `tbl_department_dept_id`, `tbl_role_role_id`, `tbl_rud_deleted`) VALUES
	(1, 1, 1, 0),
	(2, 1, 4, 0);
/*!40000 ALTER TABLE `tbl_rud` ENABLE KEYS */;


-- Dumping structure for table upleavingrequest.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(45) DEFAULT NULL,
  `user_lname` varchar(45) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_photo` varchar(45) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_country` varchar(45) DEFAULT NULL,
  `user_city` varchar(45) DEFAULT NULL,
  `user_phone` varchar(45) DEFAULT NULL,
  `user_address` text,
  `user_experience` text,
  `user_interest` text,
  `user_deleted` tinyint(4) DEFAULT '0',
  `subordinateofuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_tbl_user_tbl_user_idx` (`subordinateofuser`),
  CONSTRAINT `FK_tbl_user_sub` FOREIGN KEY (`subordinateofuser`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table upleavingrequest.tbl_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_photo`, `user_dob`, `user_country`, `user_city`, `user_phone`, `user_address`, `user_experience`, `user_interest`, `user_deleted`, `subordinateofuser`) VALUES
	(1, 'solak', 'lann', 'lannsolak@gmail.com', '12345678', 'solaklann.jpg', '1991-10-01', 'Cambodia', 'Phnom Penh, Kampong chhnang, srepring village', '0884790110', '#17, 604, toulkork', 'belatel internship, codingate employee', 'like doing work, go sightseeing, historical visiting', 0, NULL),
	(2, 'bora', 'lann', 'lannbora@gmail.com', '12345678', 'solaklann.jpg', '1991-10-01', 'Cambodia', 'Phnom Penh, Kampong chhnang, srepring village', '0884790110', '#17, 604, toulkork', 'belatel internship, codingate employee', 'like doing work, go sightseeing, historical visiting', 0, NULL),
	(3, 'sophea', 'lann', 'lannsophea@gmail.com', '12345678', 'solaklann.jpg', '1991-10-01', 'Cambodia', 'Phnom Penh, Kampong chhnang, srepring village', '0884790110', '#17, 604, toulkork', 'belatel internship, codingate employee', 'like doing work, go sightseeing, historical visiting', 0, NULL),
	(4, 'sophearath', 'lann', 'lannsophearoth@gmail.com', '12345678', 'solaklann.jpg', '1991-10-01', 'Cambodia', 'Phnom Penh, Kampong chhnang, srepring village', '0884790110', '#17, 604, toulkork', 'belatel internship, codingate employee', 'like doing work, go sightseeing, historical visiting', 0, NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
