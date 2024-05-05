-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2024 at 03:23 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `nindt`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) :


--
-- Table structure for table `tbl05_user`
--

DROP TABLE IF EXISTS `tbl05_user`;
CREATE TABLE IF NOT EXISTS `tbl05_user` (
  `user_id_pk` int NOT NULL AUTO_INCREMENT,
  `user_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_email` varchar(250) NOT NULL COMMENT 'user name',
  `user_psw` varchar(75) NOT NULL,
  `user_role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `user_unit_name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_nic` char(13) DEFAULT NULL,
  `user_tpnumber` char(40) DEFAULT NULL,
  `user_gender` tinyint DEFAULT NULL,
  `user_photo` text,
  `last_login` datetime DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:active 0:inactive',
  PRIMARY KEY (`user_id_pk`)
) ;

--
-- Dumping data for table `tbl05_user`
--

INSERT INTO `tbl05_user` (`user_id_pk`, `user_name`, `user_email`, `user_psw`, `user_role`, `user_unit_name`, `user_nic`, `user_tpnumber`, `user_gender`, `user_photo`, `last_login`, `user_status`) VALUES
(1, 'John Doe', 'staff@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'staff', NULL, NULL, NULL, NULL, NULL, '2024-05-04 07:41:37', 1),
(2, 'Jane Doe', 'admin@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'admin', NULL, NULL, NULL, NULL, NULL, '2024-04-15 21:10:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl06_log`
--

DROP TABLE IF EXISTS `tbl06_log`;
CREATE TABLE IF NOT EXISTS `tbl06_log` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `user_id_fk` int NOT NULL,
  `log_stamp` datetime NOT NULL,
  `log_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id_fk` (`user_id_fk`)
) ;
DROP TABLE IF EXISTS `tbl06_log`;
CREATE TABLE IF NOT EXISTS `tbl06_log` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `user_id_fk` int NOT NULL,
  `log_stamp` datetime NOT NULL,
  `log_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id_fk` (`user_id_fk`)
) ;

--
-- Dumping data for table `tbl06_log`
--

INSERT INTO `tbl06_log` (`log_id`, `user_id_fk`, `log_stamp`, `log_desc`) VALUES
(1, 1, '2024-04-15 19:11:48', 'signed-in'),
(2, 1, '2024-04-15 19:13:21', 'signed-out'),
(3, 1, '2024-04-15 19:47:21', 'signed-in'),
(4, 1, '2024-04-15 19:47:35', 'signed-out'),
(5, 1, '2024-04-15 19:47:39', 'signed-in'),
(6, 1, '2024-04-15 21:04:05', 'signed-out'),
(7, 1, '2024-04-15 21:04:17', 'signed-in'),
(8, 1, '2024-04-15 21:10:03', 'signed-out'),
(9, 2, '2024-04-15 21:10:18', 'signed-in'),
(10, 1, '2024-04-29 22:43:27', 'signed-in'),
(11, 1, '2024-04-30 06:16:18', 'signed-in'),
(12, 1, '2024-04-30 08:03:21', 'signed-in'),
(13, 1, '2024-04-30 08:34:00', 'signed-in'),
(14, 1, '2024-04-30 08:34:07', 'signed-out'),
(15, 1, '2024-04-30 08:34:10', 'signed-in'),
(16, 1, '2024-04-30 10:15:44', 'signed-out'),
(17, 1, '2024-04-30 10:16:17', 'signed-in'),
(18, 1, '2024-04-30 10:27:11', 'signed-in'),
(19, 1, '2024-04-30 15:10:26', 'signed-in'),
(20, 1, '2024-05-01 04:46:49', 'signed-in'),
(21, 1, '2024-05-01 05:37:45', 'signed-out'),
(22, 1, '2024-05-01 05:37:49', 'signed-in'),
(23, 1, '2024-05-02 19:10:30', 'signed-in'),
(24, 1, '2024-05-03 03:03:50', 'signed-in'),
(25, 1, '2024-05-03 17:08:02', 'signed-in'),
(27, 1, '2024-05-03 19:09:57', 'signed-in'),
(29, 1, '2024-05-03 19:10:25', 'signed-in'),
(30, 1, '2024-05-03 23:04:47', 'signed-in'),
(31, 1, '2024-05-04 05:03:42', 'signed-in'),
(32, 1, '2024-05-04 07:41:37', 'signed-in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl08_units`
--

DROP TABLE IF EXISTS `tbl08_units`;
CREATE TABLE IF NOT EXISTS `tbl08_units` (
  `unit_id_pk` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(250) NOT NULL,
  `u_public_name` varchar(5) NOT NULL,
  `unit_hospital` varchar(250) NOT NULL,
  `unit_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`unit_id_pk`),
  UNIQUE KEY `unit_name` (`unit_name`)
) ;

--
-- Dumping data for table `tbl08_units`
--

INSERT INTO `tbl08_units` (`unit_id_pk`, `unit_name`, `u_public_name`, `unit_hospital`, `unit_active`) VALUES
(1, 'Unit 01', 'un_01', 'NINDT', 1),
(2, 'Unit_022', 'un_02', 'NINDT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl10_patient`
--

DROP TABLE IF EXISTS `tbl10_patient`;
CREATE TABLE IF NOT EXISTS `tbl10_patient` (
  `p_id_pk` int NOT NULL AUTO_INCREMENT,
  `p_nindt_id` varchar(20) NOT NULL,
  `p_old_nindt_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:male 1:female',
  `p_status` enum('Current','Live','Dead') NOT NULL DEFAULT 'Current',
  `p_unit` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_nic` char(13) DEFAULT NULL,
  `p_contact_person_name` text,
  `p_tpnumber` char(40) DEFAULT NULL,
  `p_email` char(50) DEFAULT NULL,
  `p_birthDate` date DEFAULT NULL,
  `p_address` text,
  `p_assignedcategory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`p_id_pk`),
  UNIQUE KEY `p_old_nindt_id` (`p_old_nindt_id`)
) ;

--
-- Dumping data for table `tbl10_patient`
--

INSERT INTO `tbl10_patient` (`p_id_pk`, `p_nindt_id`, `p_old_nindt_id`, `p_name`, `p_gender`, `p_status`, `p_unit`, `p_nic`, `p_contact_person_name`, `p_tpnumber`, `p_email`, `p_birthDate`, `p_address`, `p_assignedcategory`) VALUES
(1, 'UN1-0001', 'A-25', 'ABC DEF', 0, 'Current', 'un_01', '154545789v', 'John DOe', '0174747474,2121212121,5698563258', 'jd@kgladg.dg', '1977-01-05', 'fhsfhsfh', 'KT Waiting'),
(2, 'UN1-0002', 'A-26', 'PQR STU', 0, 'Dead', 'un_01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'UN2-0001', 'A27', 'LMN STU', 1, 'Current', 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_machines`
--

DROP TABLE IF EXISTS `tbl15_machines`;
CREATE TABLE IF NOT EXISTS `tbl15_machines` (
  `machine_id_pk` bigint NOT NULL AUTO_INCREMENT,
  `machine_public_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `machine_serial` varchar(100) NOT NULL,
  `machine_unit` char(50) DEFAULT NULL,
  `machine_manufacturer` text,
  `machine_model` varchar(150) NOT NULL,
  `machine_active` tinyint(1) DEFAULT NULL,
  `machine_starting_date` date DEFAULT NULL,
  `machine_cautions` text,
  `machine_notes` text,
  PRIMARY KEY (`machine_id_pk`)
) ;

--
-- Dumping data for table `tbl15_machines`
--

INSERT INTO `tbl15_machines` (`machine_id_pk`, `machine_public_id`, `machine_serial`, `machine_unit`, `machine_manufacturer`, `machine_model`, `machine_active`, `machine_starting_date`, `machine_cautions`, `machine_notes`) VALUES
(1, 'UN01_Row_01', '23-99-74-E3-09-B6\n', 'Unit 01', 'Fresenuis', ' 4008 S-NG', 1, '2024-04-01', 'Fusce placerat diam malesuada libero lobortis gravida. Aliquam erat volutpat. Nullam ultrices arcu tortor, ac pellentesque purus placerat eget. Cras accumsan sit amet dolor non maximus. Suspendisse potenti. Sed vel libero et metus accumsan sodales. Quisque tempor tortor ac lorem pharetra, vitae eleifend augue semper. Ut nec quam mollis, commodo neque eu, rhoncus diam. Vestibulum tristique feugiat dui, vel vulputate ipsum luctus eu. Fusce suscipit id dolor in varius. Duis vel nunc ullamcorper, facilisis lacus vel, egestas lectus. Nulla facilisi. Phasellus ut risus mauris. Sed purus purus, mollis ut enim vel, imperdiet tempus sapien. Etiam vulputate odio nec erat vestibulum semper. Pellentesque auctor hendrerit ex quis hendrerit.', 'Quisque suscipit turpis interdum urna molestie porttitor. Donec auctor turpis lorem, id commodo urna ultrices et. Morbi ultrices ut quam in congue. Duis risus nisl, fringilla ut placerat quis, efficitur a nisi. Aliquam fringilla aliquam varius. Vivamus at mattis risus. Proin ex augue, cursus vel libero in, molestie mattis lectus. Aliquam sed cursus orci. Mauris ornare, ante a vulputate convallis, purus nisl imperdiet nisi, vitae semper orci mi at ipsum.'),
(2, 'UN01_Row_02', '4B-90-92-EC-5D-E8\n', 'Unit 01', 'Fresenuis', ' 4009 S-NG', 1, '2024-04-02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl20_hemodialysis_sessions`
--

DROP TABLE IF EXISTS `tbl20_hemodialysis_sessions`;
CREATE TABLE IF NOT EXISTS `tbl20_hemodialysis_sessions` (
  `hds_id_pk` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hds_id_public` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `hds_status` tinyint NOT NULL DEFAULT '0',
  `hds_patientid` varchar(10) DEFAULT NULL,
  `hds_age` tinyint DEFAULT NULL,
  `hds_type` tinyint DEFAULT NULL COMMENT '0: Haemodialysis,1: Peritoneal Dialysis',
  `hds_createddt` datetime NOT NULL,
  `hds_created_user_id_pk` int NOT NULL,
  `hds_startdt` datetime DEFAULT NULL,
  `hds_unit_public_id` varchar(5) DEFAULT NULL,
  `hds_bednumber` varchar(50) DEFAULT NULL,
  `hds_started_user_id_pk` bigint DEFAULT NULL,
  `hds_machine_id` bigint DEFAULT NULL,
  `hds_prehdweight` float(6,2) DEFAULT NULL,
  `hds_prehdbp` varchar(10) DEFAULT NULL,
  `hds_heparinloading` varchar(50) DEFAULT NULL,
  `hds_stopdt` datetime DEFAULT NULL,
  `hds_stop_user_id_pk` bigint DEFAULT NULL,
  `hds_heparinmaintenance` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8_general_ci DEFAULT NULL,
  `hds_posthdweight` float(6,2) DEFAULT NULL,
  `hds_posthdbp` varchar(10) DEFAULT NULL,
  `hds_bloodflowrate` float(6,3) DEFAULT NULL,
  `hds_uf` float(6,3) DEFAULT NULL,
  `hds_erythropoietindose` varchar(30) DEFAULT NULL,
  `hds_remarks` text,
  `hds_enddt` datetime DEFAULT NULL,
  `hds_end_user_id_pk` int DEFAULT NULL,
  PRIMARY KEY (`hds_id_pk`),
  UNIQUE KEY `hds_id_public` (`hds_id_public`) USING BTREE
) ;

--
-- Dumping data for table `tbl20_hemodialysis_sessions`
--

INSERT INTO `tbl20_hemodialysis_sessions` (`hds_id_pk`, `hds_id_public`, `hds_status`, `hds_patientid`, `hds_age`, `hds_type`, `hds_createddt`, `hds_created_user_id_pk`, `hds_startdt`, `hds_unit_public_id`, `hds_bednumber`, `hds_started_user_id_pk`, `hds_machine_id`, `hds_prehdweight`, `hds_prehdbp`, `hds_heparinloading`, `hds_stopdt`, `hds_stop_user_id_pk`, `hds_heparinmaintenance`, `hds_posthdweight`, `hds_posthdbp`, `hds_bloodflowrate`, `hds_uf`, `hds_erythropoietindose`, `hds_remarks`, `hds_enddt`, `hds_end_user_id_pk`) VALUES
(1, '20240504-un_01-00001', 1, 'UN1-0002', 0, 1, '2024-05-04 07:31:17', 1, '2024-05-04 07:41:16', 'un_01', '  7        ', 1, 3, 77.00, '88', '777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '20240504-un_01-00002', 4, 'UN1-0002', 0, 0, '2024-05-04 07:31:32', 1, '2024-05-04 07:31:42', 'un_01', '  33', 1, 3, 33.00, '333', '33', '2024-05-04 07:32:28', 1, '888', 888.00, '888', 788.000, 88.000, '888', '887575\r\n675\r\n34\r\n354\r\n3\r\n43\r\n45\r\n354\r\n3\r\n453\r\n\r\n3\r\n43\r\n4\r\n4\r\n\r\n43\r\n453', '2024-05-04 07:35:29', 1),
(3, '20240504-un_01-00003', 4, 'UN1-0002', 0, 0, '2024-05-04 07:36:27', 1, '2024-05-04 07:37:17', 'un_01', '  gsdg', 1, 2, 0.00, 'sdgsdg', 'sdgsdg', '2024-05-04 07:37:46', 1, 'dadgadgdg', 0.00, 'gaddgadga', 0.000, 0.000, 'gdagdgadg', 'kghdgmdgdjjdgdjg', '2024-05-04 07:38:05', 1),
(4, '20240504-un_01-00004', 4, 'UN1-0002', 0, 0, '2024-05-04 07:42:31', 1, '2024-05-04 07:42:47', 'un_01', '  575', 1, 1, 9999.99, '757857', '6575', '2024-05-04 07:42:58', 1, '73', 7375.00, '3573753', 999.999, 999.999, '73753', '753753\r\n737\r\n37\r\n53\r\n73\r\n75\r\n37\r\n375\r\n3\r\n543\r\n', '2024-05-04 07:43:25', 1),
(5, '20240504-un_02-00001', 1, 'UN2-0001', 0, 0, '2024-05-04 07:53:34', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '20240504-un_02-00002', 1, 'UN2-0001', 0, 0, '2024-05-04 08:00:45', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '20240504-un_02-00003', 1, 'UN2-0001', 0, 1, '2024-05-04 08:00:56', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '20240504-un_02-00004', 1, 'UN2-0001', 0, 1, '2024-05-04 08:01:02', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '20240504-un_02-00005', 1, 'UN2-0001', 0, 1, '2024-05-04 08:01:10', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '20240504-un_02-00006', 1, 'UN2-0001', 0, 0, '2024-05-04 08:01:16', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '20240504-un_02-00007', 1, 'UN2-0001', 0, 0, '2024-05-04 08:01:35', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '20240504-un_02-00008', 1, 'UN2-0001', 0, 0, '2024-05-04 08:01:42', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '20240504-un_02-00009', 1, 'UN2-0001', 0, 0, '2024-05-04 08:01:52', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '20240504-un_02-00010', 1, 'UN2-0001', 0, 0, '2024-05-04 08:02:27', 1, NULL, 'un_02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl06_log`
--
ALTER TABLE `tbl06_log`
  ADD CONSTRAINT `tbl06_log_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `tbl05_user` (`user_id_pk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
