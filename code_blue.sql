-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2018 at 08:45 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


drop database if exists `code_blue`;
CREATE DATABASE IF NOT EXISTS `code_blue` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `code_blue`;

--
-- Database: `code_blue`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `acceptuser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `acceptuser` (`uid` INT)  begin
	
update users set role='user'
where id=uid;

end$$

DROP PROCEDURE IF EXISTS `admincount`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `admincount` ()  begin
declare x1 int ;
declare x2 int ;
declare x3 int ;
declare x4 int ;
set x1= (select count(1) from code_blue_live where age='Adult');
set x2=(select count(1) from code_blue_live where age='Pediatric');
set x3=(select count(1) from code_blue_adult_test);
set x4=(select count(1) from code_blue_pediatric_test);
select x1+x3,x2+x4;

end$$

DROP PROCEDURE IF EXISTS `deleteannoun`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteannoun` (`aid` INT)  begin
	
delete from announcment_users
where announ_id=aid;
delete from announcment
where id=aid;

end$$

DROP PROCEDURE IF EXISTS `getannouncementhistory`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getannouncementhistory` (`uid` INT)  BEGIN
select  a.content,a.img,a.announ_date
from announcment a join announcment_users au 
on a.id=au.announ_id
where au.user_id=uid
order by a.announ_date DESC ;

END$$

DROP PROCEDURE IF EXISTS `newuser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `newuser` (IN `un` VARCHAR(50), IN `pw` VARCHAR(50), IN `nm` VARCHAR(50), IN `em` VARCHAR(50))  begin 
if(exists(select * from users where user_name=un))
	then select 0;
else 
begin
insert into users values(null,un,pw,'pendding','',nm,em);
select 1;
end;
end if;


end$$

DROP PROCEDURE IF EXISTS `userannouncement`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userannouncement` (IN `uid` INT)  BEGIN
select  au.id,a.content,au.is_opened
from announcment a join announcment_users au 
on a.id=au.announ_id
where au.user_id=uid
order by a.announ_date DESC limit 5;

END$$

DROP PROCEDURE IF EXISTS `viewannouncement`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `viewannouncement` (`aid` INT)  BEGIN
update announcment_users set is_opened=1 where id=aid;
select  au.id,a.content,au.is_opened,a.announ_date,a.img
from announcment a join announcment_users au 
on a.id=au.announ_id
where au.id=aid;
END$$

--
-- Functions
--
DROP FUNCTION IF EXISTS `check_login`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `check_login` (`un` VARCHAR(52), `pw` VARCHAR(52)) RETURNS INT(11) BEGIN
    if EXISTS (SELECT user_name FROM users WHERE un = user_name AND pw = users.password and role  like 'admin')
		then  return 1 ;
	elseif EXISTS (SELECT user_name FROM users WHERE un = user_name AND pw = users.password and role  like 'user')
		then return 2;
	elseif EXISTS (SELECT user_name FROM users WHERE un = user_name AND pw = users.password and role  like 'pendding')
		then return 3;
	else return 0;
    end if;
END$$

DROP FUNCTION IF EXISTS `getnewannouncount`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `getnewannouncount` (`uid` INT) RETURNS INT(11) begin 

return(select count(*) from announcment_users
where is_opened=0 and user_id=uid);

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `announcment`
--

DROP TABLE IF EXISTS `announcment`;
CREATE TABLE IF NOT EXISTS `announcment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'img/def.png',
  `announ_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcment`
--

INSERT INTO `announcment` (`id`, `content`, `img`, `announ_date`) VALUES
(4, 'announcement 1', 'img/20181031050128.gif', '2018-10-31 19:01:28'),
(5, 'announcement default', 'img/def.png', '2018-10-31 18:33:25');

--
-- Triggers `announcment`
--
DROP TRIGGER IF EXISTS `annountoall`;
DELIMITER $$
CREATE TRIGGER `annountoall` AFTER INSERT ON `announcment` FOR EACH ROW insert into announcment_users (announ_id, user_id, is_opened)
select DISTINCT NEW.id,id ,false from users
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `announcment_users`
--

DROP TABLE IF EXISTS `announcment_users`;
CREATE TABLE IF NOT EXISTS `announcment_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announ_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_opened` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `announ_id` (`announ_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcment_users`
--

INSERT INTO `announcment_users` (`id`, `announ_id`, `user_id`, `is_opened`) VALUES
(4, 4, 1, b'0'),
(5, 4, 3, b'0'),
(6, 4, 2, b'1'),
(7, 5, 1, b'1'),
(8, 5, 4, b'0'),
(9, 5, 3, b'0'),
(10, 5, 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `codeblue_schedule`
--

DROP TABLE IF EXISTS `codeblue_schedule`;
CREATE TABLE IF NOT EXISTS `codeblue_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_day` date DEFAULT NULL,
  `t_from` time DEFAULT NULL,
  `t_to` time DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `codeblue_schedule`
--

INSERT INTO `codeblue_schedule` (`id`, `t_day`, `t_from`, `t_to`, `emp_id`) VALUES
(2, '2018-11-17', '09:00:00', '21:00:00', 17),
(3, '2018-11-17', '09:00:00', '21:00:00', 18),
(4, '2018-11-18', '02:00:00', '15:00:00', 16);

-- --------------------------------------------------------

--
-- Table structure for table `code_blue_adult_test`
--

DROP TABLE IF EXISTS `code_blue_adult_test`;
CREATE TABLE IF NOT EXISTS `code_blue_adult_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pager1` bit(1) DEFAULT NULL,
  `pager2` bit(1) DEFAULT NULL,
  `pager3` bit(1) DEFAULT NULL,
  `pager4` bit(1) DEFAULT NULL,
  `pager5` bit(1) DEFAULT NULL,
  `pager6` bit(1) DEFAULT NULL,
  `pager7` bit(1) DEFAULT NULL,
  `pager8` bit(1) DEFAULT NULL,
  `pager9` bit(1) DEFAULT NULL,
  `pager10` bit(1) DEFAULT NULL,
  `pager11` bit(1) DEFAULT NULL,
  `pager12` bit(1) DEFAULT NULL,
  `pager13` bit(1) DEFAULT NULL,
  `pager14` bit(1) DEFAULT NULL,
  `pager15` bit(1) DEFAULT NULL,
  `pager16` bit(1) DEFAULT NULL,
  `pager17` bit(1) DEFAULT NULL,
  `pager18` bit(1) DEFAULT NULL,
  `iphone1` bit(1) DEFAULT NULL,
  `iphone2` bit(1) DEFAULT NULL,
  `iphone3` bit(1) DEFAULT NULL,
  `iphone4` bit(1) DEFAULT NULL,
  `iphone5` bit(1) DEFAULT NULL,
  `iphone6` bit(1) DEFAULT NULL,
  `iphone7` bit(1) DEFAULT NULL,
  `iphone8` bit(1) DEFAULT NULL,
  `iphone9` bit(1) DEFAULT NULL,
  `iphone10` bit(1) DEFAULT NULL,
  `iphone11` bit(1) DEFAULT NULL,
  `iphone12` bit(1) DEFAULT NULL,
  `iphone13` bit(1) DEFAULT NULL,
  `iphone14` bit(1) DEFAULT NULL,
  `iphone15` bit(1) DEFAULT NULL,
  `iphone16` bit(1) DEFAULT NULL,
  `iphone17` bit(1) DEFAULT NULL,
  `iphone18` bit(1) DEFAULT NULL,
  `test_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_blue_adult_test`
--

INSERT INTO `code_blue_adult_test` (`id`, `pager1`, `pager2`, `pager3`, `pager4`, `pager5`, `pager6`, `pager7`, `pager8`, `pager9`, `pager10`, `pager11`, `pager12`, `pager13`, `pager14`, `pager15`, `pager16`, `pager17`, `pager18`, `iphone1`, `iphone2`, `iphone3`, `iphone4`, `iphone5`, `iphone6`, `iphone7`, `iphone8`, `iphone9`, `iphone10`, `iphone11`, `iphone12`, `iphone13`, `iphone14`, `iphone15`, `iphone16`, `iphone17`, `iphone18`, `test_date`, `feedback`) VALUES
(1, b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'0', b'1', b'1', b'0', b'0', b'0', b'1', b'0', b'1', b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'1', b'0', b'0', b'1', b'0', b'0', '2018-11-16 13:51:57', ''),
(2, b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'0', b'1', b'1', b'0', b'0', b'0', b'1', b'0', b'1', b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'1', b'0', b'0', b'1', b'0', b'0', '2018-11-16 13:53:27', ''),
(3, b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'0', b'1', b'1', b'0', b'0', b'0', b'1', b'0', b'1', b'1', b'1', b'1', b'0', b'1', b'0', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'1', b'0', b'0', b'1', b'0', b'1', '2018-11-16 13:56:01', ''),
(4, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-16 14:14:04', ''),
(5, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-16 14:15:55', ''),
(6, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-20 12:04:35', 'tttt'),
(7, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-20 12:04:46', 'tttt'),
(8, b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-20 12:05:10', 'adsasd'),
(9, b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-20 12:05:30', 'adsasd');

-- --------------------------------------------------------

--
-- Table structure for table `code_blue_live`
--

DROP TABLE IF EXISTS `code_blue_live`;
CREATE TABLE IF NOT EXISTS `code_blue_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator` varchar(50) DEFAULT NULL,
  `age` enum('Adult','Pediatric') DEFAULT NULL,
  `hospital` enum('Main','Pediatric/Children','Maternity','Rehabilitation/Rehab.','Ambulatory/New OPD') DEFAULT NULL,
  `floor` enum('Basement','Ground','1st','2nd','3rd','4th','5th','6th','7th') DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `location_number` int(11) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_number` (`location_number`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_blue_live`
--

INSERT INTO `code_blue_live` (`id`, `operator`, `age`, `hospital`, `floor`, `place`, `location_number`, `date`, `feedback`) VALUES
(1, 'ahmed', 'Adult', 'Rehabilitation/Rehab.', 'Basement', 'ward', 16, '2018-11-16 13:20:34', NULL),
(2, 'mohamed', 'Pediatric', 'Main', '1st', 'clinic', 21, NULL, NULL),
(4, 'ffgg', 'Pediatric', 'Maternity', '2nd', '88', 4, '2018-11-16 13:27:59', NULL),
(5, 'fafa', 'Pediatric', 'Main', '1st', 'ffaf', 3, '2018-11-17 01:58:02', NULL),
(6, 'ahmed', 'Adult', 'Pediatric/Children', '1st', 'asdad', 2, '2018-11-19 05:19:32', NULL),
(7, 'kkkkkkkk', 'Pediatric', 'Pediatric/Children', 'Ground', 'gggg', 3, '2018-11-19 05:22:07', NULL),
(8, 'fff', 'Pediatric', 'Pediatric/Children', 'Ground', 'gg', 2, '2018-11-19 05:30:25', NULL),
(9, 'test', 'Pediatric', 'Maternity', '1st', 'testst', 2, '2018-11-20 13:47:41', 'feeeedbaaack');

-- --------------------------------------------------------

--
-- Table structure for table `code_blue_locations`
--

DROP TABLE IF EXISTS `code_blue_locations`;
CREATE TABLE IF NOT EXISTS `code_blue_locations` (
  `number` int(11) NOT NULL,
  `message` varchar(50) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_blue_locations`
--

INSERT INTO `code_blue_locations` (`number`, `message`, `comment`) VALUES
(2, '\"G 1 Stroke Unit\"', ''),
(3, '\"G 1 Operating Theater\"', ''),
(4, '\"G 2 CV-OR\"', ''),
(5, '\"G 2 CA. CATH LAB.\"', ''),
(6, '\"G 2 DIALYSIS\"', ''),
(7, '\"G 2 CARDIAC WARD 2', ''),
(8, '\"G 2 MALE SURGERY WARD 3+4\"', ''),
(9, '\"G 2 CARDIAC SURGERY WARD 5', ''),
(10, '\"G 2 CARDIAC TELEMETRY', ''),
(11, '\"G 3  MALE/MEDICAL WARD 5\"', ''),
(12, '\"G 3 FEMALE MEDICAL WARD-8 \"', ''),
(13, '\"G 3  MALE/MEDICAL WARD 6\"', ''),
(14, '\"G 3 MALE/SURG WARD 7\"', ''),
(15, '\"R 2 NEUROLOGY WARD 5', ''),
(16, '\"G 4 NEURO/SURG W-3 FEMALE\"', ''),
(17, '\"G 0 CLINIC 1 ENDOSCOPY\"', ''),
(18, '\"G 0 CLINIC 2 GENERAL SURGERY\"', ''),
(19, '\"G 0 CLINIC 3 CARDIO/NEURO\"', ''),
(20, '\"G 0 CLINIC 4 HEMA/ONCOLOGY\"', ''),
(21, '\"G 0 CLINIC 5 INTERNAL MEDICINE\"', ''),
(22, '\"G 0 CLINIC 6 ORTHOPEDIC\"', ''),
(23, '\"G 0 CLINIC 7 ENT\"', ''),
(24, '\"G 0 CLINIC 8 PLASTIC SURGERY\"', ''),
(25, '\"G 0 E.R.\"', ''),
(26, '\"Diabetes Center 0 Clinic 1\"', ''),
(27, '\"Diabetes Center 0 Clinic 2\"', ''),
(28, '\"G 0 STAFF CLINIC\"', ''),
(29, '\"G 0 Administration Office\"', ''),
(30, '\"G 0 Radiology\"', ''),
(31, '\"G 0 Radiotion Therapy Unit\"', ''),
(32, '\"G 1 Neurology\"', ''),
(33, '\"M 1 Step-Down Unit\"', ''),
(34, '\"G 1 Recovery Room\"', ''),
(35, '\"G 1 Spinal Ward\"', ''),
(36, '\"G 4 NEURO WARD 5\"', ''),
(37, '\"G 2 CVICU\"', ''),
(38, '\"G 0 Diabetic Center\" ', ''),
(39, '\"G 0 Phlebotomy Day Care\"', ''),
(40, '\"G 0 Oncology Treatment Unit\"', ''),
(41, '\"G 0 Dental Care\"', ''),
(42, '\"G 0 Radio Therapy Treat. Unit\"', ''),
(43, '\"C 2 Cardiology Ward 1\"', ''),
(44, '\"C 1 Operating Room\"', ''),
(45, '\"C 1 Recovery Room\"', ''),
(46, '\"C 1 Day care area\"', ''),
(47, '\"C 0 OPD\"', ''),
(48, '\"C 4 Ward 1 (pulmonary)\"', ''),
(49, '\"C 4 Ward 2 (GI)\"', ''),
(50, '\"C 2 Surgical Ward2\"', ''),
(51, '\"C 3 Oncology Ward\"', ''),
(52, '\"C 3 Medical Ward1\"', ''),
(53, '\"C 3 Medical Ward2\"', ''),
(54, '\"C 2 Medical Ward3\"', ''),
(55, '\"C 3 Medical Ward4\"', ''),
(56, '\"C 4 Ward 3 (Peds neuroscience)\"', ''),
(57, '\"M 0 ER\"', ''),
(58, '\"M 0 OPD\"', ''),
(59, '\"M 1 ICU\"', ''),
(60, '\"M 1 HIGH RISK\"', ''),
(61, '\"M 1 O.R\"', ''),
(62, '\"M 1 LABOUR ROOM\"', ''),
(63, '\"M 2 Ward 1 (Antenatal)\"', ''),
(64, '\"M 2 Ward 2 (Gyne)\"', ''),
(65, '\"M 2 Ward 3 (Post) C/S\"', ''),
(66, '\"M 2 Ward 4 (Postnatal)\"', ''),
(67, '\"M 3 Ward 2 VIP BC\"', ''),
(68, '\"M 3 Nursery BC\"', ''),
(69, '\"M 1 NICU\"', ''),
(70, '\"M 3 Ward 3 female Surgical\"', ''),
(71, '\"M 0 Reproduction Medicine Unit\"', ''),
(72, '\"M 0 Mother Craft\"', ''),
(73, '\"M 0 Urogynecology Unit\"', ''),
(74, '\"M 1 Emergency Recovery Room\"', ''),
(75, '\"M 1 Elective Operating Room\"', ''),
(76, '\"M 1 Elective Recovery Room\"', ''),
(77, '\"M 2 Nursery\"', ''),
(78, '\"M 3 ward1 BC\"', ''),
(79, '\"G 3 Ward 3 Hematology Oncology\"', ''),
(80, '\"R 0 OPD\"', ''),
(81, '\"R 1 Ward 1 GENERAL REHAB\"', ''),
(82, '\"R 1 Ward 2 GENERAL REHAB\"', ''),
(83, '\"R 2 WARD 4 Pediatric\"', ''),
(84, '\"G 1 New Adult ICU\"', ''),
(85, '\"R 1 Ward 3 Spinal Cord Injury\"', ''),
(86, '\"R 2 Ward 4 Brain Injury\"', ''),
(87, '\"G 4 Ward2 /Stroke Unit\"', ''),
(88, '\"R 2 Ward 3 Pulmonary/Cardiac Re', ''),
(89, '\"R 1 Comprehensive Rehabilitatio', ''),
(90, '\"G3 Ward 4 Hema Oncology Centre\"', ''),
(92, 'G 3 Ward 2 Haematology Oncology', ''),
(93, '\"G 2 Ward 1 Cardiac Intervention', ''),
(94, '\"R 0 Physical Therapy Male\"', ''),
(95, '\"R 0 Physical Therapy Female.\"', ''),
(96, '\"R 0 Prosthetics & Orthotics\"', ''),
(97, '\"G 2 Non-Invasive Lab\"', ''),
(98, '\"G 2 HDU\"', ''),
(99, '\"G 1 ICU\"', ''),
(100, '\"test\"', ''),
(101, '\"G 1 CCU\"', ''),
(102, '\"G 2 CCU Zone 4\"', ''),
(103, '\" COMMUNICATION \"', ''),
(104, 'digits =3', ''),
(105, '\"C 0 Pedia Radiology\"', ''),
(106, '\"P 0 Blood Bank Donor Area\"', ''),
(107, '\" G 2 STEMI CODE\"', ''),
(109, '\"C 2 PCVOR\"', 'DUPLICEATE '),
(110, '\"C 2 PCCL\"', 'DUPLICEATE '),
(112, '\"C 2 PCVICU\"', ''),
(113, '\"G 1 Blood Bank\"', ''),
(114, '\"C B MEG unit\"', ''),
(115, '\"C 2 PCCL\"', 'DUPLICEATE '),
(116, '\"C 2 PCVOR\"', 'DUPLICEATE '),
(117, '\"G4 NNI-HDU\"', ''),
(118, '\"G 0  CCC- Recovery Room \"', ''),
(119, '\"G B new MRI suite\"', ''),
(120, '\"G 3 Bronchoscopy\"', ''),
(121, '\"C 1 Pediatric OR\"', ''),
(122, '\"G 4 WARD 6 - EPILEPSY\"', ''),
(124, '\"G 1 ICU C\"', ''),
(125, '\"G 1 NCCU\"', ''),
(126, '\"A 1 WSH OPD\"', ''),
(127, '\"A 2 Cardiac Adult OPD\"', ''),
(128, '\"A 2 Cardiac Pedia OPD\"', ''),
(129, '\"A 3 CCC Adult OPD\"', ''),
(130, '\"A 3 CCC Pedia OPD\"', ''),
(131, '\"A 4 Neuro Adult OPD\"', ''),
(132, '\"A 4 Neuro Pedia OPD\"', ''),
(133, '\"A 5 Peads OPD\"', ''),
(134, '\"A 6 Adult OPD\"', ''),
(135, '\"A 7 IM OPD\"', ''),
(136, '\"A 7 OEMC OPD\"', ''),
(137, '\"A 6 surgical peds OPD\"', ''),
(138, '\"G1 Ward H2\"', ''),
(139, '\"MH Med Specialties Resident\"', ''),
(140, '\"CC Medical Specialties Staff\"', ''),
(142, '\"G4 Ward4 Spinal Unit\"', ''),
(143, '\"R 0 CSD\"    (Communication & Swallowing Disorder)', ''),
(144, '\"A B Neurophysiology Lab OPD\"       ', 'ADULT/PEDIA '),
(145, '\"G 0 Adult Day Care Unit\"', ''),
(146, '\"G 0 Pediatric Day Care Unit\"', ''),
(147, '\"M 1  ICU  D\"', ''),
(148, '\"A B  X-ray OPD', ''),
(149, 'G3 Sleep Laboratory Room 353\"', ''),
(150, '\"G1 Ward 1\"', ''),
(151, '\"C4 Ward 4 Surgical Pediatric\"', ''),
(152, 'C4 Ward 4 Surgical Adult\"', '');

-- --------------------------------------------------------

--
-- Table structure for table `code_blue_pediatric_test`
--

DROP TABLE IF EXISTS `code_blue_pediatric_test`;
CREATE TABLE IF NOT EXISTS `code_blue_pediatric_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pager1` bit(1) DEFAULT NULL,
  `pager2` bit(1) DEFAULT NULL,
  `pager3` bit(1) DEFAULT NULL,
  `pager4` bit(1) DEFAULT NULL,
  `pager5` bit(1) DEFAULT NULL,
  `pager6` bit(1) DEFAULT NULL,
  `pager7` bit(1) DEFAULT NULL,
  `pager8` bit(1) DEFAULT NULL,
  `pager9` bit(1) DEFAULT NULL,
  `pager10` bit(1) DEFAULT NULL,
  `pager11` bit(1) DEFAULT NULL,
  `pager12` bit(1) DEFAULT NULL,
  `pager13` bit(1) DEFAULT NULL,
  `pager14` bit(1) DEFAULT NULL,
  `pager15` bit(1) DEFAULT NULL,
  `pager16` bit(1) DEFAULT NULL,
  `pager17` bit(1) DEFAULT NULL,
  `pager18` bit(1) DEFAULT NULL,
  `pager19` bit(1) DEFAULT NULL,
  `pager20` bit(1) DEFAULT NULL,
  `pager21` bit(1) DEFAULT NULL,
  `iphone1` bit(1) DEFAULT NULL,
  `iphone2` bit(1) DEFAULT NULL,
  `iphone3` bit(1) DEFAULT NULL,
  `iphone4` bit(1) DEFAULT NULL,
  `iphone5` bit(1) DEFAULT NULL,
  `iphone6` bit(1) DEFAULT NULL,
  `iphone7` bit(1) DEFAULT NULL,
  `iphone8` bit(1) DEFAULT NULL,
  `iphone9` bit(1) DEFAULT NULL,
  `iphone10` bit(1) DEFAULT NULL,
  `iphone11` bit(1) DEFAULT NULL,
  `iphone12` bit(1) DEFAULT NULL,
  `iphone13` bit(1) DEFAULT NULL,
  `iphone14` bit(1) DEFAULT NULL,
  `iphone15` bit(1) DEFAULT NULL,
  `iphone16` bit(1) DEFAULT NULL,
  `iphone17` bit(1) DEFAULT NULL,
  `iphone18` bit(1) DEFAULT NULL,
  `iphone19` bit(1) DEFAULT NULL,
  `iphone20` bit(1) DEFAULT NULL,
  `iphone21` bit(1) DEFAULT NULL,
  `code_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_blue_pediatric_test`
--

INSERT INTO `code_blue_pediatric_test` (`id`, `pager1`, `pager2`, `pager3`, `pager4`, `pager5`, `pager6`, `pager7`, `pager8`, `pager9`, `pager10`, `pager11`, `pager12`, `pager13`, `pager14`, `pager15`, `pager16`, `pager17`, `pager18`, `pager19`, `pager20`, `pager21`, `iphone1`, `iphone2`, `iphone3`, `iphone4`, `iphone5`, `iphone6`, `iphone7`, `iphone8`, `iphone9`, `iphone10`, `iphone11`, `iphone12`, `iphone13`, `iphone14`, `iphone15`, `iphone16`, `iphone17`, `iphone18`, `iphone19`, `iphone20`, `iphone21`, `code_date`, `feedback`) VALUES
(1, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-16 14:16:34', NULL),
(2, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-20 11:59:14', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','pendding') DEFAULT 'pendding',
  `note` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `role`, `note`, `name`, `email`) VALUES
(1, 'admin', '123', 'admin', 'update\r\nnote \' \'\'\'\'\r\ntest', 'Admin', 'Admin@kfmc.med.sa'),
(2, 'user', '123', 'user', '', 'User', 'User@kfmc.med.sa'),
(3, 'user1', '123', 'user', '', 'User1', 'User1@kfmc.med.sa'),
(4, 'pending', '123', 'pendding', '', 'pending', 'pending@kfmc.med.sa'),
(16, 'falselham', 'falselham', 'admin', '', 'Fahad A. Alselham', 'falselham@kfmc.med.sa'),
(17, 'amafaqihi', 'amafaqihi', 'admin', '', 'Ali Mohammed Ali Faqilhhi', 'amafaqihi@kfmc.med.sa'),
(18, 'mdtaguidid', 'mdtaguidid', 'admin', '', 'Drieza Taguidid Mostafa', 'mgtaguidid@kfmc.med.sa'),
(19, 'rpanimdim', 'rpanimdim', 'user', '', 'Panimdim Romeo Noel M.', 'rpanimdim@kfmc.med.sa'),
(20, 'jamud', 'jamud', 'user', '', 'Jamaluddin Jar-Auna Amud', 'jamud@kfmc.med.sa'),
(21, 'hmangkabong', 'hmangkabong', 'pendding', '', 'Mangkabong Hartina', 'hmangkabong@kfmc.med.sa'),
(22, 'jabdurahman', 'jabdurahman', 'pendding', '', 'Abdulrahman Julmiradz', 'jabdurahman@kfmc.med.sa'),
(23, 'penndding', '123', 'pendding', '', 'pend', 'pend@kfmc.med.sa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcment_users`
--
ALTER TABLE `announcment_users`
  ADD CONSTRAINT `announcment_users_ibfk_1` FOREIGN KEY (`announ_id`) REFERENCES `announcment` (`id`),
  ADD CONSTRAINT `announcment_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `codeblue_schedule`
--
ALTER TABLE `codeblue_schedule`
  ADD CONSTRAINT `codeblue_schedule_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
