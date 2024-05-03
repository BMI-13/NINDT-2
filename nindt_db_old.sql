-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2024 at 02:50 AM
-- Server version: 8.0.27
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('qmh66qs9e5sbdubdklbv1h5qq0olgsdf', '::1', 1714445390, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343434353339303b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl05_user`
--

DROP TABLE IF EXISTS `tbl05_user`;
CREATE TABLE IF NOT EXISTS `tbl05_user` (
  `user_id_pk` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(250) NOT NULL COMMENT 'user name',
  `user_psw` varchar(75) NOT NULL,
  `user_role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `user_nic` char(13) DEFAULT NULL,
  `user_tpnumber` char(40) DEFAULT NULL,
  `user_gender` tinyint DEFAULT NULL,
  `user_photo` text,
  `last_login` datetime DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:active 0:inactive',
  PRIMARY KEY (`user_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl05_user`
--

INSERT INTO `tbl05_user` (`user_id_pk`, `user_email`, `user_psw`, `user_role`, `user_nic`, `user_tpnumber`, `user_gender`, `user_photo`, `last_login`, `user_status`) VALUES
(1, 'staff@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'staff', NULL, NULL, NULL, NULL, '2024-04-30 08:03:21', 1),
(2, 'admin@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'admin', NULL, NULL, NULL, NULL, '2024-04-15 21:10:18', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
(12, 1, '2024-04-30 08:03:21', 'signed-in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl10_patient`
--

DROP TABLE IF EXISTS `tbl10_patient`;
CREATE TABLE IF NOT EXISTS `tbl10_patient` (
  `p_id_pk` int NOT NULL AUTO_INCREMENT,
  `p_name` varchar(500) NOT NULL,
  `p_gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:male 1:female',
  `p_status` enum('Current','Live','Dead') NOT NULL DEFAULT 'Current',
  `p_nic` char(13) DEFAULT NULL,
  `p_old_nindt_id` char(10) DEFAULT NULL,
  `p_phn` char(14) DEFAULT NULL,
  `p_bht` char(20) DEFAULT NULL,
  `p_tpnumber` char(40) DEFAULT NULL,
  `p_email` char(50) DEFAULT NULL,
  `p_birthDate` date DEFAULT NULL,
  `p_address` text,
  `p_assignedcategory` tinyint DEFAULT NULL,
  PRIMARY KEY (`p_id_pk`),
  UNIQUE KEY `p_old_nindt_id` (`p_old_nindt_id`),
  UNIQUE KEY `p_phn` (`p_phn`),
  UNIQUE KEY `p_bht` (`p_bht`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl10_patient`
--

INSERT INTO `tbl10_patient` (`p_id_pk`, `p_name`, `p_gender`, `p_status`, `p_nic`, `p_old_nindt_id`, `p_phn`, `p_bht`, `p_tpnumber`, `p_email`, `p_birthDate`, `p_address`, `p_assignedcategory`) VALUES
(1, 'ABC DEF', 0, 'Current', '154545789v', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PQR STU', 0, 'Dead', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'LMN STU', 1, 'Current', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_machines`
--

DROP TABLE IF EXISTS `tbl15_machines`;
CREATE TABLE IF NOT EXISTS `tbl15_machines` (
  `machine_id` bigint NOT NULL AUTO_INCREMENT,
  `machine_serial` varchar(100) NOT NULL,
  `machine_unit` char(50) DEFAULT NULL,
  `machine_manufacturer` text,
  `machine_model` varchar(150) NOT NULL,
  `machine_active` tinyint(1) DEFAULT NULL,
  `machine_starting_date` date DEFAULT NULL,
  `machine_cautions` text,
  `machine_notes` text,
  PRIMARY KEY (`machine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl15_machines`
--

INSERT INTO `tbl15_machines` (`machine_id`, `machine_serial`, `machine_barcode`, `machine_unit`, `machine_manufacturer`, `machine_model`, `machine_active`, `machine_starting_date`, `machine_cautions`, `machine_notes`) VALUES
(1, 'Unit1_001', 'FR- 4008 S-NG-22585eg465ds7845dg8-sfh51hr78hr1fs854wy-hr15sfh4er', 'Unit 01', 'Fresenuis', ' 4008 S-NG', 1, '2024-04-01', '', ''),
(2, 'Unit1_001', 'FR- 4008 S-NG-54sd745sh1h4sf-t468sdg15shd448+sh8+4shf-4ry798/ryh', 'Unit 01', 'Fresenuis', ' 4009 S-NG', 1, '2024-04-02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl20_hemodialysis_sessions`
--

DROP TABLE IF EXISTS `tbl20_hemodialysis_sessions`;
CREATE TABLE IF NOT EXISTS `tbl20_hemodialysis_sessions` (
  `hds_id` bigint NOT NULL AUTO_INCREMENT,
  `hds_patientid` varchar(10) DEFAULT NULL,
  `hds_age` tinyint DEFAULT NULL,
  `hds_type` tinyint DEFAULT NULL,
  `hds_routine_startdt` datetime DEFAULT NULL,
  `hds_ward_startdt` datetime DEFAULT NULL,
  `hds_emergency_startdt` datetime DEFAULT NULL,
  `hds_bednumber` varchar(50) DEFAULT NULL,
  `hds_useridstart` bigint DEFAULT NULL,
  `hds_machine_id` bigint DEFAULT NULL,
  `hds_prehdweight` float(6,2) DEFAULT NULL,
  `hds_prehdbp` varchar(10) DEFAULT NULL,
  `hds_heparinloading` varchar(50) DEFAULT NULL,
  `hds_heparinmaintenance` varchar(50) DEFAULT NULL,
  `hds_enddt` datetime DEFAULT NULL,
  `hds_posthdweight` float(6,2) DEFAULT NULL,
  `hds_posthdbp` varchar(10) DEFAULT NULL,
  `hds_bloodflowrate` float(6,3) DEFAULT NULL,
  `hds_uf` float(6,3) DEFAULT NULL,
  `hds_erythropoietindose` varchar(30) DEFAULT NULL,
  `hds_useridend` bigint DEFAULT NULL,
  `hds_remarks` text,
  PRIMARY KEY (`hds_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

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
