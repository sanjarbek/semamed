-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2013 at 09:59 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `semamed`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`semamed`@`localhost` PROCEDURE `getTest`(IN manager_id INT, 
IN start_date DATE,
IN end_date DATE )
BEGIN
	DECLARE jan, feb, march, april, may, june, july, aug, sep, oct, nov, december INT DEFAULT 0;

select 
	h.hospital_name, 
	year(p.created_at)  'year',
	month(p.created_at) 'month',
	count(*) 'count'
from 
	patients as p, doctors d, hospitals h
where 
	p.patient_doctor=d.doctor_id 
	and d.doctor_hospital=h.hospital_id
	and h.hospital_manager_id=manager_id
	and p.created_at between start_date and end_date
group by 
	h.hospital_name,
	year(p.created_at),
	month(p.created_at);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '2', NULL, 'N;'),
('Guest', '3', NULL, 'N;'),
('Manager', '4', NULL, 'N;'),
('Manager', '5', NULL, 'N;'),
('Registrator', '6', NULL, 'N;'),
('Registrator', '7', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, 'Администратор', NULL, 'N;'),
('Authenticated', 2, 'Зарегистрированный пользователь', NULL, 'N;'),
('Doctor', 2, 'Доктор', NULL, 'N;'),
('Doctor.*', 1, NULL, NULL, 'N;'),
('Doctor.Admin', 0, NULL, NULL, 'N;'),
('Doctor.Create', 0, NULL, NULL, 'N;'),
('Doctor.Delete', 0, NULL, NULL, 'N;'),
('Doctor.Index', 0, NULL, NULL, 'N;'),
('Doctor.Update', 0, NULL, NULL, 'N;'),
('Doctor.View', 0, NULL, NULL, 'N;'),
('Guest', 2, 'Гость', NULL, 'N;'),
('Hospital.*', 1, NULL, NULL, 'N;'),
('Hospital.Admin', 0, NULL, NULL, 'N;'),
('Hospital.Create', 0, NULL, NULL, 'N;'),
('Hospital.Delete', 0, NULL, NULL, 'N;'),
('Hospital.Index', 0, NULL, NULL, 'N;'),
('Hospital.Update', 0, NULL, NULL, 'N;'),
('Hospital.View', 0, NULL, NULL, 'N;'),
('Manager', 2, 'Менеджер', NULL, 'N;'),
('Mrtscan.*', 1, NULL, NULL, 'N;'),
('Mrtscan.Admin', 0, NULL, NULL, 'N;'),
('Mrtscan.Create', 0, NULL, NULL, 'N;'),
('Mrtscan.Delete', 0, NULL, NULL, 'N;'),
('Mrtscan.GetPrice', 0, NULL, NULL, 'N;'),
('Mrtscan.Index', 0, NULL, NULL, 'N;'),
('Mrtscan.Update', 0, NULL, NULL, 'N;'),
('Mrtscan.View', 0, NULL, NULL, 'N;'),
('Patient.*', 1, NULL, NULL, 'N;'),
('Patient.Admin', 0, NULL, NULL, 'N;'),
('Patient.Create', 0, NULL, NULL, 'N;'),
('Patient.Delete', 0, NULL, NULL, 'N;'),
('Patient.Editable', 0, NULL, NULL, 'N;'),
('Patient.Index', 0, NULL, NULL, 'N;'),
('Patient.Manage', 0, NULL, NULL, 'N;'),
('Patient.ManagerView', 0, NULL, NULL, 'N;'),
('Patient.Report', 0, NULL, NULL, 'N;'),
('Patient.ReportExport', 0, NULL, NULL, 'N;'),
('Patient.Update', 0, NULL, NULL, 'N;'),
('Patient.View', 0, NULL, NULL, 'N;'),
('Registration.*', 1, NULL, NULL, 'N;'),
('Registration.Admin', 0, NULL, NULL, 'N;'),
('Registration.AdminManage', 0, NULL, NULL, 'N;'),
('Registration.Create', 0, NULL, NULL, 'N;'),
('Registration.Delete', 0, NULL, NULL, 'N;'),
('Registration.DoctorReport', 0, NULL, NULL, 'N;'),
('Registration.Editable', 0, NULL, NULL, 'N;'),
('Registration.ExcelTemplate', 0, NULL, NULL, 'N;'),
('Registration.GetTemplate', 0, NULL, NULL, 'N;'),
('Registration.Index', 0, NULL, NULL, 'N;'),
('Registration.Relation', 0, NULL, NULL, 'N;'),
('Registration.Report', 0, NULL, NULL, 'N;'),
('Registration.Update', 0, NULL, NULL, 'N;'),
('Registration.View', 0, NULL, NULL, 'N;'),
('Registrator', 2, 'Регистратор пациентов', NULL, 'N;'),
('Report.*', 1, NULL, NULL, 'N;'),
('Report.Gridview', 0, NULL, NULL, 'N;'),
('Report.Index', 0, NULL, NULL, 'N;'),
('Report.Report', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Registrator', 'Mrtscan.GetPrice'),
('Registrator', 'Patient.*'),
('Registrator', 'Registration.*'),
('Guest', 'Site.Contact'),
('Guest', 'Site.Error'),
('Guest', 'Site.Index'),
('Guest', 'Site.Logout'),
('Guest', 'User.Login.*'),
('Guest', 'User.Logout.*'),
('Authenticated', 'User.Profile.*');

-- --------------------------------------------------------

--
-- Table structure for table `disconts`
--

CREATE TABLE IF NOT EXISTS `disconts` (
  `discont_id` int(11) NOT NULL AUTO_INCREMENT,
  `discont_mriscan` int(11) NOT NULL,
  `discont_name` varchar(45) NOT NULL,
  `discont_type` enum('percent','money') NOT NULL,
  `discont_value` int(11) NOT NULL,
  `discont_description` varchar(100) DEFAULT NULL,
  `discont_enable` bit(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`discont_id`),
  KEY `fk_disconts_mriscan` (`discont_mriscan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_fullname` varchar(45) NOT NULL,
  `doctor_phone` varchar(45) NOT NULL,
  `doctor_hospital` int(11) NOT NULL,
  `doctor_enable` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `fk_doctors_1` (`doctor_hospital`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_fullname`, `doctor_phone`, `doctor_hospital`, `doctor_enable`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(6, 'Калмурзаев Бектемир', '0700 106940', 8, 1, '2012-10-17 06:59:39', '2012-12-27 00:09:16', 1, 1),
(7, 'Доктор Айболит', '0543 294738', 7, 1, '2012-10-26 10:20:52', '2012-12-19 14:09:28', 1, 1),
(8, 'Мансуров Нурсултан', '0543 192912', 10, 1, '2012-12-27 00:07:36', '2013-01-14 14:40:24', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_report`
--
CREATE TABLE IF NOT EXISTS `doctor_report` (
`doctor_fullname` varchar(45)
,`doctor_phone` varchar(45)
,`created_at` date
,`quantity` bigint(21)
,`price` decimal(32,2)
);
-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `hospital_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(45) NOT NULL,
  `hospital_phone` varchar(45) NOT NULL,
  `hospital_manager_id` int(11) NOT NULL,
  `hospital_enable` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospital_name`, `hospital_phone`, `hospital_manager_id`, `hospital_enable`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(7, 'Ошская областная больница', '0222 12129', 4, 1, '2012-10-17 06:57:57', '2012-10-17 06:57:57', 1, 1),
(8, 'Городская больница № 5', '0312 12 12 12', 4, 1, '2012-10-17 06:58:10', '2012-12-16 11:20:10', 1, 1),
(9, 'Городская больница № 69 ', '0700 54 23 31', 4, 1, '2012-10-17 06:59:05', '2012-10-17 06:59:05', 1, 1),
(10, 'Восточная поликлиника №29', '0312 394832', 4, 1, '2012-12-16 09:55:26', '2012-12-16 09:55:26', 1, 1),
(11, 'Хирургическая больница №10', '0312 646464', 5, 1, '2012-12-16 11:04:06', '2012-12-16 11:04:06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mrtscans`
--

CREATE TABLE IF NOT EXISTS `mrtscans` (
  `mrtscan_id` int(11) NOT NULL AUTO_INCREMENT,
  `mrtscan_name` varchar(45) NOT NULL,
  `mrtscan_description` varchar(255) NOT NULL,
  `mrtscan_price` decimal(10,0) NOT NULL,
  `mrtscan_enable` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`mrtscan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mrtscans`
--

INSERT INTO `mrtscans` (`mrtscan_id`, `mrtscan_name`, `mrtscan_description`, `mrtscan_price`, `mrtscan_enable`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(1, 'Голова', 'Снимок головы', 3400, 1, '2012-10-21 06:58:09', '2012-10-21 06:58:09', 1, 1),
(2, 'Шея', 'Снимок шеи', 3500, 1, '2012-10-21 06:58:42', '2012-10-21 06:58:42', 1, 1),
(3, 'Позвоночник', 'Снимок позвоночника', 2800, 1, '2012-10-21 06:59:13', '2012-10-21 06:59:13', 1, 1),
(4, 'Нога', 'Нога', 2300, 1, '2012-12-17 11:52:58', '2012-12-17 11:52:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_fullname` varchar(30) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `patient_birthday` date NOT NULL,
  `patient_sex` tinyint(1) NOT NULL,
  `patient_status` tinyint(1) NOT NULL,
  `patient_doctor` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `fk_patients_1` (`patient_doctor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_fullname`, `patient_phone`, `patient_birthday`, `patient_sex`, `patient_status`, `patient_doctor`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(4, 'Жиндибек Акарович', '0553261515', '1982-04-13', 0, 2, 7, '2012-10-17 07:16:03', '2012-10-26 10:33:53', 1, 1),
(5, 'Владимиров Сергей', '0312 435697', '2007-08-10', 0, 2, 6, '2012-10-18 07:05:06', '2012-10-19 07:27:53', 1, 1),
(6, 'Борончиев Максат', '0777 12 82 01', '1995-12-05', 0, 2, 6, '2012-10-19 06:24:53', '2012-10-26 10:33:03', 1, 1),
(7, 'Киримов Анатолий', '0543 93 84 12', '1964-03-30', 0, 2, 7, '2012-10-20 15:52:59', '2012-10-26 10:33:24', 1, 1),
(31, 'Борончу', '990', '2012-07-12', 0, 2, 6, '2012-10-23 22:46:27', '2012-11-01 21:18:30', 1, 1),
(32, 'Кеминчи', '9399494', '1965-06-14', 0, 2, 7, '2012-10-26 08:53:05', '2012-11-01 21:18:21', 1, 1),
(33, 'Тест Колдонуучу', '939393', '1972-12-12', 0, 2, 6, '2012-10-26 08:59:54', '2012-10-26 11:00:28', 1, 1),
(35, 'TRE', 'ддд', '2005-10-20', 0, 2, 6, '2012-10-26 11:03:50', '2012-11-03 14:14:42', 1, 1),
(36, 'фффф', '0700 291728', '1983-07-07', 0, 2, 7, '2012-10-26 11:06:53', '2012-11-03 23:38:55', 1, 1),
(37, 'kk;k;k', '4945883', '1930-04-10', 0, 2, 6, '2012-10-26 15:12:33', '2012-10-26 18:55:18', 1, 1),
(39, 'tekek', '3849', '2006-10-20', 0, 2, 7, '2012-10-26 15:22:33', '2012-10-26 17:33:53', 1, 1),
(40, 'lll', 'll', '2004-05-11', 0, 2, 6, '2012-10-26 15:28:00', '2012-10-26 17:31:27', 1, 1),
(42, 'fsdfsdf', '95534', '1953-02-18', 0, 2, 6, '2012-10-26 15:50:42', '2012-10-28 13:21:23', 1, 1),
(44, 'jjj', '86754', '1987-04-01', 0, 2, 6, '2012-10-26 17:30:43', '2012-10-26 18:55:31', 1, 1),
(46, 'xsdfsfdsdfwb', '34535', '1969-04-03', 0, 2, 7, '2012-10-26 18:03:48', '2012-10-26 18:55:45', 1, 1),
(47, 'dsfs', 'wer', '1977-10-16', 0, 2, 6, '2012-10-26 18:09:25', '2012-10-28 13:23:02', 1, 1),
(48, 'xvc', '7328', '1964-02-16', 0, 2, 7, '2012-10-26 18:17:34', '2012-10-26 18:18:14', 1, 1),
(49, 'ydike', '34929', '1970-02-25', 0, 2, 7, '2012-10-26 18:57:06', '2012-10-27 06:05:43', 1, 1),
(50, 'bfgdag', '2657', '1960-03-17', 0, 2, 6, '2012-10-27 06:07:01', '2012-10-28 00:00:20', 1, 1),
(51, 'xlsldk', 'fkdk', '1989-04-13', 0, 2, 6, '2012-10-28 00:00:49', '2012-10-28 00:00:49', 1, 1),
(52, 'idlsk', '62828', '2001-10-21', 0, 2, 6, '2012-10-28 10:22:00', '2012-10-29 23:19:33', 1, 1),
(53, 'asdf', 'sdfsdf', '1967-04-10', 0, 2, 7, '2012-10-28 10:31:44', '2012-10-29 22:39:20', 1, 1),
(54, 'Hello World', '0772 298534', '1973-11-21', 0, 2, 7, '2012-10-28 13:51:02', '2012-10-28 22:56:53', 1, 1),
(55, 'Samsung', '0704 122847', '1934-07-06', 0, 2, 6, '2012-10-29 22:40:38', '2012-10-29 22:52:00', 1, 1),
(56, 'TTTTTT', '0703 128291', '1971-03-26', 0, 2, 7, '2012-11-01 19:50:09', '2012-11-01 19:50:09', 1, 1),
(57, 'BMDERD', '0551 912093', '1986-06-16', 0, 2, 7, '2012-11-01 19:51:17', '2012-11-03 22:19:48', 1, 1),
(58, 'OWKK', '0551 912093', '1989-09-17', 0, 2, 6, '2012-11-01 19:52:33', '2012-11-03 22:00:11', 1, 1),
(59, 'Акыркы Тест', '0704 238182', '1973-04-18', 0, 2, 7, '2012-11-03 14:50:39', '2012-11-17 16:55:06', 1, 1),
(60, 'The last one', '0543 571294', '1970-06-13', 0, 2, 7, '2012-11-03 15:30:50', '2012-11-04 21:13:34', 1, 1),
(63, 'DKKE', '039482', '1965-07-15', 0, 2, 7, '2012-11-17 18:27:36', '2012-11-17 18:28:06', 1, 1),
(65, 'Журо берчи', '0558 105570', '1963-04-24', 0, 2, 6, '2012-11-21 23:06:34', '2012-11-25 17:16:12', 1, 1),
(67, 'Апсамат Айтиев', '0703 193828', '1965-07-19', 0, 2, 7, '2012-11-25 19:19:01', '2012-11-25 19:19:01', 1, 1),
(68, 'Курманалиев Тилек', '0553 893828', '1974-07-22', 0, 2, 7, '2012-12-06 22:59:23', '2012-12-06 22:59:23', 1, 1),
(69, 'rtrtr', '393933', '1955-09-24', 0, 2, 7, '2012-12-08 14:17:04', '2012-12-08 14:17:04', 1, 1),
(70, 'FKDKD', '06950494', '1965-07-12', 0, 2, 7, '2012-12-08 14:25:52', '2012-12-08 14:25:52', 1, 1),
(71, 'Saeq', '0543 281821', '1995-10-15', 0, 2, 6, '2012-12-08 15:27:19', '2012-12-08 15:27:53', 1, 1),
(72, 'Токтомаматов Алишер', '0557 238228', '1981-03-10', 0, 2, 7, '2012-12-08 19:09:59', '2012-12-17 10:50:14', 1, 1),
(73, 'FKRK', '0703 129210', '1974-07-23', 0, 2, 7, '2012-12-15 11:28:42', '2012-12-17 16:02:27', 1, 1),
(74, 'testtesrd', 'testtest', '1978-07-23', 0, 2, 6, '2012-12-20 13:41:12', '2012-12-22 17:45:50', 1, 1),
(82, 'test', 'test', '1987-06-21', 0, 2, 6, '2012-12-24 17:39:42', '2012-12-24 17:39:42', 1, 1),
(83, 'Test patient', '83383838', '2012-12-13', 0, 2, 7, '2012-12-26 15:29:31', '2012-12-26 15:29:31', 1, 1),
(84, 'tklrkkf', 'kdkdkdk', '1969-06-12', 0, 2, 7, '2012-12-26 22:44:24', '2012-12-26 22:44:24', 1, 1),
(85, 'aasasa', 'asasa', '1960-03-10', 0, 2, 6, '2012-12-26 23:17:35', '2013-01-15 09:53:48', 1, 1),
(86, 'srsdf', 'asdfasdf', '2012-12-11', 0, 2, 8, '2012-12-29 13:45:18', '2012-12-29 13:45:18', 1, 1),
(87, 'testtesttest', 'test', '1980-06-22', 0, 2, 8, '2012-12-29 14:20:25', '2013-01-02 15:13:42', 1, 1),
(89, 'TESTESTTEST', 'TESTTESTTEST', '1989-06-25', 0, 2, 8, '2013-01-16 15:05:31', '2013-01-16 15:26:16', 1, 1),
(90, 'TESTESTTEST', 'TESTTESTTEST', '1990-06-17', 0, 2, 6, '2013-01-16 15:30:25', '2013-01-16 15:30:25', 1, 1),
(91, 'TESTESTTEST', 'TESTTESTTEST', '1998-10-25', 1, 2, 6, '2013-01-16 16:10:55', '2013-01-16 16:10:55', 1, 1),
(92, 'TESTESTTEST', 'TESTTESTTEST', '2013-01-01', 1, 2, 8, '2013-01-16 16:11:53', '2013-01-16 16:11:53', 1, 1),
(93, 'TESTESTTEST', 'TESTTESTTEST', '2013-01-01', 1, 2, 8, '2013-01-16 16:34:44', '2013-01-18 22:43:56', 1, 1),
(94, 'From France', '949494', '1970-06-18', 1, 2, 8, '2013-01-18 00:31:26', '2013-01-18 22:43:02', 1, 1),
(95, 'Айткулов Б. У.', '0 556 102938', '1976-04-08', 0, 2, 7, '2013-01-19 14:34:39', '2013-01-21 17:31:03', 1, 1),
(96, 'Мансуров Ф. Е.', '0 708 102193', '1966-09-27', 1, 2, 7, '2013-01-19 14:43:19', '2013-01-21 10:16:07', 1, 1),
(98, 'Темиров Ф. В.', '0556 101020', '1990-08-05', 1, 3, 6, '2013-01-19 15:31:03', '2013-01-20 16:22:55', 1, 1),
(99, 'Бердибекова А. С.', '0779 203040', '1989-05-27', 1, 2, 6, '2013-01-20 16:39:19', '2013-01-21 10:33:17', 1, 1),
(101, 'Калмурзаев А. Ц.', '0700 203948', '1973-05-14', 0, 3, 6, '2013-01-21 17:34:11', '2013-01-21 17:36:53', 1, 1),
(102, 'Кимсанов У. М.', '0702 304020', '1991-03-12', 0, 0, 7, '2013-01-21 18:41:34', '2013-01-21 18:41:34', 6, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_count`
--
CREATE TABLE IF NOT EXISTS `patient_count` (
`hospital_name` varchar(45)
,`doctor_fullname` varchar(45)
,`date` date
,`count` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Demo', 'Demo'),
(3, 'Укпатов', 'Сайракан'),
(4, 'Эшмурзаев', 'Бакыт '),
(5, 'Manager 1', 'Test'),
(6, 'Чолпонова', 'Чолпон'),
(7, 'Нурзидова', 'Нурзида');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_patient` int(11) NOT NULL,
  `reg_mrtscan` int(11) NOT NULL,
  `reg_price` decimal(10,2) NOT NULL,
  `reg_discont` int(11) NOT NULL,
  `reg_total_price` decimal(10,2) NOT NULL,
  `reg_status` tinyint(1) NOT NULL,
  `reg_report_status` tinyint(1) NOT NULL,
  `reg_report_text` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `fk_reg_mriscan` (`reg_mrtscan`),
  KEY `fk_registrations_1` (`reg_patient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`reg_id`, `reg_patient`, `reg_mrtscan`, `reg_price`, `reg_discont`, `reg_total_price`, `reg_status`, `reg_report_status`, `reg_report_text`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(8, 5, 1, 3400.00, 400, 3000.00, 0, 0, '', '2012-10-28 13:42:21', '2012-10-28 13:42:21', 1, 1),
(9, 4, 3, 2800.00, 0, 2800.00, 0, 0, '', '2012-10-28 13:48:36', '2012-10-28 13:48:36', 1, 1),
(10, 4, 1, 3400.00, 300, 3100.00, 0, 0, '', '2012-10-28 13:48:55', '2012-10-28 13:48:55', 1, 1),
(11, 6, 2, 3500.00, 1000, 2500.00, 0, 0, '', '2012-10-28 13:49:16', '2012-10-28 13:49:16', 1, 1),
(12, 6, 2, 3500.00, 300, 3200.00, 0, 0, '', '2012-10-28 14:14:49', '2012-10-28 14:14:49', 1, 1),
(13, 6, 2, 3500.00, 400, 3100.00, 0, 0, '', '2012-10-28 14:53:30', '2012-10-28 14:53:30', 1, 1),
(14, 5, 3, 2800.00, 0, 2800.00, 0, 0, '', '2012-10-28 14:54:18', '2012-10-28 14:54:18', 1, 1),
(15, 32, 3, 2800.00, 200, 2600.00, 0, 0, '', '2012-10-28 16:01:42', '2012-10-28 16:01:42', 1, 1),
(16, 36, 2, 3500.00, 400, 3100.00, 0, 0, '', '2012-10-29 23:13:55', '2012-10-29 23:13:55', 1, 1),
(17, 7, 3, 2800.00, 300, 2500.00, 0, 0, '', '2012-10-30 20:37:47', '2012-10-30 20:37:47', 1, 1),
(18, 4, 2, 3500.00, 0, 3500.00, 0, 0, '', '2012-10-30 20:53:10', '2012-10-30 20:53:10', 1, 1),
(19, 54, 1, 3400.00, 100, 3300.00, 0, 0, '', '2012-10-30 20:57:11', '2012-10-30 20:57:11', 1, 1),
(20, 33, 1, 3400.00, 0, 3400.00, 0, 0, '', '2012-10-30 21:04:47', '2012-10-30 21:04:47', 1, 1),
(21, 6, 2, 3500.00, 100, 3400.00, 0, 0, '', '2012-11-01 19:47:00', '2012-11-01 19:47:00', 1, 1),
(22, 4, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-01 20:00:32', '2012-11-01 20:00:32', 1, 1),
(23, 33, 3, 2800.00, 200, 2600.00, 0, 0, NULL, '2012-11-01 20:02:57', '2012-11-01 20:02:57', 1, 1),
(24, 4, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-01 20:03:54', '2012-11-01 20:03:54', 1, 1),
(25, 31, 2, 3500.00, 34, 3466.00, 0, 0, NULL, '2012-11-01 20:04:52', '2012-11-01 20:04:52', 1, 1),
(26, 4, 2, 3500.00, 150, 3350.00, 0, 0, NULL, '2012-11-03 15:20:11', '2012-11-03 15:20:11', 1, 1),
(27, 5, 3, 2800.00, 12, 2788.00, 0, 0, NULL, '2012-11-03 15:32:32', '2012-11-03 15:32:32', 1, 1),
(28, 5, 3, 2800.00, 100, 2700.00, 0, 0, NULL, '2012-11-03 15:37:34', '2012-11-03 15:37:34', 1, 1),
(29, 4, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 15:50:19', '2012-11-03 15:50:19', 1, 1),
(30, 59, 2, 3500.00, 500, 3000.00, 0, 0, NULL, '2012-11-03 21:33:31', '2012-11-03 21:33:31', 1, 1),
(31, 37, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 21:41:27', '2012-11-03 21:41:27', 1, 1),
(32, 37, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 21:41:50', '2012-11-03 21:41:50', 1, 1),
(33, 36, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 21:42:48', '2012-11-03 21:42:48', 1, 1),
(34, 60, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 21:44:35', '2012-11-03 21:44:35', 1, 1),
(35, 60, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 21:44:42', '2012-11-03 21:44:42', 1, 1),
(36, 60, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 21:45:00', '2012-11-03 21:45:00', 1, 1),
(37, 59, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 21:45:20', '2012-11-03 21:45:20', 1, 1),
(38, 59, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 21:47:11', '2012-11-03 21:47:11', 1, 1),
(39, 58, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 21:47:22', '2012-11-03 21:47:22', 1, 1),
(41, 58, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 21:48:00', '2012-11-03 21:48:00', 1, 1),
(42, 58, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 21:48:42', '2012-11-03 21:48:42', 1, 1),
(43, 55, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 22:16:49', '2012-11-03 22:16:49', 1, 1),
(44, 56, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 22:18:20', '2012-11-03 22:18:20', 1, 1),
(47, 55, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 22:22:35', '2012-11-03 22:22:35', 1, 1),
(48, 55, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 22:22:59', '2012-11-03 22:22:59', 1, 1),
(49, 35, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 22:23:21', '2012-11-03 22:23:21', 1, 1),
(50, 54, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 22:37:12', '2012-11-03 22:37:12', 1, 1),
(51, 53, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 22:37:30', '2012-11-03 22:37:30', 1, 1),
(52, 56, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 22:39:12', '2012-11-03 22:39:12', 1, 1),
(53, 56, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 22:39:44', '2012-11-03 22:39:44', 1, 1),
(54, 56, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-03 22:40:06', '2012-11-03 22:40:06', 1, 1),
(55, 36, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-03 22:40:28', '2012-11-03 22:40:28', 1, 1),
(56, 59, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-03 23:01:36', '2012-11-03 23:01:36', 1, 1),
(57, 4, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-04 13:52:46', '2012-11-04 13:52:46', 1, 1),
(58, 4, 2, 3500.00, 140, 3500.00, 0, 0, NULL, '2012-11-04 13:53:05', '2012-11-04 13:53:05', 1, 1),
(59, 4, 3, 2800.00, 80, 2720.00, 0, 0, NULL, '2012-11-04 13:54:18', '2012-11-04 13:54:18', 1, 1),
(60, 59, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-06 22:17:50', '2012-11-06 22:17:50', 1, 1),
(63, 59, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-06 23:29:00', '2012-11-06 23:29:00', 1, 1),
(65, 33, 2, 3500.00, 300, 3200.00, 0, 0, NULL, '2012-11-17 17:48:24', '2012-11-17 17:48:24', 1, 1),
(66, 63, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-17 22:08:00', '2012-11-17 22:08:00', 1, 1),
(67, 63, 3, 2800.00, 300, 2500.00, 0, 0, NULL, '2012-11-21 23:01:01', '2012-11-21 23:01:01', 1, 1),
(69, 65, 2, 3500.00, 12, 3488.00, 0, 0, NULL, '2012-11-21 23:07:14', '2012-11-21 23:07:14', 1, 1),
(70, 65, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-21 23:23:43', '2012-11-21 23:23:43', 1, 1),
(71, 65, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-11-24 06:31:57', '2012-11-24 06:31:57', 1, 1),
(75, 57, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-11-25 19:34:45', '2012-11-25 19:34:45', 1, 1),
(76, 57, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-11-25 19:34:55', '2012-11-25 19:34:55', 1, 1),
(77, 68, 1, 3400.00, 400, 3000.00, 0, 0, NULL, '2012-12-06 23:00:38', '2012-12-06 23:00:38', 1, 1),
(78, 68, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-06 23:00:49', '2012-12-06 23:00:49', 1, 1),
(79, 67, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-07 00:27:11', '2012-12-07 00:27:11', 1, 1),
(80, 67, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-07 00:27:22', '2012-12-07 00:27:22', 1, 1),
(81, 69, 2, 3500.00, 400, 3100.00, 0, 0, NULL, '2012-12-08 14:17:32', '2012-12-08 14:17:32', 1, 1),
(82, 69, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-08 14:17:50', '2012-12-08 14:17:50', 1, 1),
(84, 70, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-08 14:28:03', '2012-12-08 14:28:03', 1, 1),
(85, 71, 2, 3500.00, 100, 3400.00, 0, 1, NULL, '2012-12-08 15:28:37', '2012-12-08 15:28:37', 1, 1),
(90, 72, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-10 15:25:51', '2012-12-10 15:25:51', 1, 1),
(91, 72, 3, 2800.00, 600, 2200.00, 0, 1, NULL, '2012-12-10 15:26:03', '2012-12-10 15:26:03', 1, 1),
(92, 73, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-15 11:29:07', '2012-12-15 11:29:07', 1, 1),
(93, 73, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-12-15 11:29:16', '2012-12-15 11:29:16', 1, 1),
(97, 74, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-20 15:14:27', '2012-12-20 15:14:27', 1, 1),
(98, 74, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-20 16:27:10', '2012-12-20 16:27:10', 1, 1),
(99, 73, 4, 2300.00, 240, 2060.00, 0, 0, NULL, '2012-12-22 13:47:23', '2012-12-22 13:47:23', 1, 1),
(100, 82, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-24 17:39:55', '2012-12-24 17:39:55', 1, 1),
(102, 82, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-25 16:32:20', '2012-12-25 16:32:20', 1, 1),
(103, 82, 1, 3400.00, 500, 3400.00, 0, 0, NULL, '2012-12-25 16:32:35', '2012-12-25 16:32:35', 1, 1),
(104, 82, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2012-12-26 15:29:56', '2012-12-26 15:29:56', 1, 1),
(117, 83, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2012-12-26 17:12:26', '2012-12-26 17:12:26', 1, 1),
(118, 84, 3, 2800.00, 500, 2300.00, 0, 0, NULL, '2012-12-26 22:44:54', '2012-12-26 22:44:54', 1, 1),
(119, 84, 4, 2300.00, 0, 2300.00, 0, 0, NULL, '2012-12-26 22:45:08', '2012-12-26 22:45:08', 1, 1),
(120, 85, 2, 3500.00, 500, 3000.00, 0, 0, NULL, '2012-12-26 23:17:52', '2012-12-26 23:17:52', 1, 1),
(121, 85, 4, 2300.00, 0, 2300.00, 0, 0, NULL, '2012-12-26 23:18:02', '2012-12-26 23:18:02', 1, 1),
(122, 85, 3, 2800.00, 300, 2500.00, 0, 0, NULL, '2012-12-26 23:18:14', '2012-12-26 23:18:14', 1, 1),
(123, 85, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2012-12-26 23:22:16', '2012-12-26 23:22:16', 1, 1),
(136, 87, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2013-01-14 15:07:00', '2013-01-14 15:07:00', 1, 1),
(137, 87, 1, 3400.00, 0, 3400.00, 2, 0, NULL, '2013-01-14 15:07:13', '2013-01-14 15:07:13', 1, 1),
(140, 86, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2013-01-14 15:16:40', '2013-01-14 15:16:40', 1, 1),
(141, 90, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2013-01-16 16:08:35', '2013-01-16 16:08:35', 1, 1),
(142, 93, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2013-01-17 23:56:23', '2013-01-17 23:56:23', 1, 1),
(143, 94, 1, 3400.00, 0, 3400.00, 1, 0, NULL, '2013-01-18 00:32:36', '2013-01-18 00:32:36', 1, 1),
(145, 98, 1, 3400.00, 0, 3400.00, 0, 0, NULL, '2013-01-19 15:32:26', '2013-01-19 15:32:26', 1, 1),
(146, 98, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2013-01-19 15:32:55', '2013-01-19 15:32:55', 1, 1),
(147, 98, 4, 2300.00, 2300, 0.00, 0, 0, NULL, '2013-01-19 15:33:49', '2013-01-19 15:33:49', 1, 1),
(148, 99, 2, 3500.00, 0, 3500.00, 0, 0, NULL, '2013-01-21 09:59:30', '2013-01-21 09:59:30', 1, 1),
(149, 99, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2013-01-21 09:59:46', '2013-01-21 09:59:46', 1, 1),
(150, 95, 3, 2800.00, 0, 2800.00, 0, 0, NULL, '2013-01-21 10:00:50', '2013-01-21 10:00:50', 1, 1),
(151, 95, 4, 2300.00, 500, 1800.00, 0, 0, NULL, '2013-01-21 10:00:59', '2013-01-21 10:00:59', 1, 1),
(152, 101, 2, 3500.00, 600, 2900.00, 0, 0, NULL, '2013-01-21 17:34:44', '2013-01-21 17:34:44', 1, 1),
(153, 102, 2, 3500.00, 400, 3100.00, 0, 0, NULL, '2013-01-21 18:58:42', '2013-01-21 18:58:42', 1, 1),
(154, 102, 3, 2800.00, 600, 2200.00, 0, 0, NULL, '2013-01-21 18:59:31', '2013-01-21 18:59:31', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2012-10-16 23:19:17', '2013-01-21 12:58:07', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2012-10-16 23:19:17', '2012-12-15 06:28:10', 0, 1),
(3, 'sayra', '34f85ca80ec353d3052b8a2d3973a0c5', 'sayra@mail.ru', '617c2373700b63b4649dd0cb1a2bd746', '2012-12-08 10:49:18', '2013-01-04 09:08:49', 0, 1),
(4, 'bakyt', '34f85ca80ec353d3052b8a2d3973a0c5', 'ebakyt@yahoo.com', '472149b54c9209fe3ad0fe84de140eac', '2012-12-10 11:18:54', '2013-01-16 05:35:47', 0, 1),
(5, 'testmanager1', '34f85ca80ec353d3052b8a2d3973a0c5', 'asanjarbek@gmail.com', '2a6a65d6ba2f711e1e4cbec908572ee3', '2012-12-16 05:02:46', '0000-00-00 00:00:00', 0, 1),
(6, 'cholpon', '708a9c84b47404c5524405e5cbd910b8', 'cholpon@mail.ru', '90f5513fbf36f711057a5b2ebf4dbef6', '2013-01-21 12:36:49', '2013-01-21 12:59:09', 0, 1),
(7, 'nurzida', '38a082bc53acfddae0d4600d81c79959', 'nurzida@mail.ru', '2837e0c7c09167d203a32e89e394def4', '2013-01-21 12:37:54', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Structure for view `doctor_report`
--
DROP TABLE IF EXISTS `doctor_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`semamed`@`localhost` SQL SECURITY DEFINER VIEW `doctor_report` AS select `d`.`doctor_fullname` AS `doctor_fullname`,`d`.`doctor_phone` AS `doctor_phone`,cast(`r`.`created_at` as date) AS `created_at`,count(0) AS `quantity`,sum(`r`.`reg_price`) AS `price` from ((`registrations` `r` join `patients` `p`) join `doctors` `d`) where ((`r`.`reg_patient` = `p`.`patient_id`) and (`p`.`patient_doctor` = `d`.`doctor_id`)) group by `d`.`doctor_fullname`,`d`.`doctor_phone`,cast(`r`.`created_at` as date);

-- --------------------------------------------------------

--
-- Structure for view `patient_count`
--
DROP TABLE IF EXISTS `patient_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`semamed`@`localhost` SQL SECURITY DEFINER VIEW `patient_count` AS select `h`.`hospital_name` AS `hospital_name`,`d`.`doctor_fullname` AS `doctor_fullname`,cast(`p`.`created_at` as date) AS `date`,count(0) AS `count` from ((`patients` `p` join `doctors` `d`) join `hospitals` `h`) where ((`h`.`hospital_manager_id` = 4) and (`p`.`patient_doctor` = `d`.`doctor_id`) and (`d`.`doctor_hospital` = `h`.`hospital_id`)) group by `h`.`hospital_name`,`d`.`doctor_fullname`,cast(`p`.`created_at` as date);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disconts`
--
ALTER TABLE `disconts`
  ADD CONSTRAINT `fk_disconts_mriscan` FOREIGN KEY (`discont_mriscan`) REFERENCES `mrtscans` (`mrtscan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_doctors_1` FOREIGN KEY (`doctor_hospital`) REFERENCES `hospitals` (`hospital_id`) ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `fk_patients_1` FOREIGN KEY (`patient_doctor`) REFERENCES `doctors` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `fk_registrations_1` FOREIGN KEY (`reg_patient`) REFERENCES `patients` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reg_mriscan` FOREIGN KEY (`reg_mrtscan`) REFERENCES `mrtscans` (`mrtscan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
