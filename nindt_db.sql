-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2024 at 03:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nindt`
--
CREATE DATABASE IF NOT EXISTS `nindt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nindt`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl05_user`
--

DROP TABLE IF EXISTS `tbl05_user`;
CREATE TABLE IF NOT EXISTS `tbl05_user` (
  `user_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(250) NOT NULL COMMENT 'user name',
  `user_psw` varchar(75) NOT NULL,
  `user_role` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:active 0:inactive',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl05_user`
--

INSERT INTO `tbl05_user` (`user_id_pk`, `user_email`, `user_psw`, `user_role`, `user_status`, `last_login`) VALUES
(1, 'staff@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'staff', 1, '2024-04-15 21:04:17'),
(2, 'admin@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'admin', 1, '2024-04-15 21:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl06_log`
--

DROP TABLE IF EXISTS `tbl06_log`;
CREATE TABLE IF NOT EXISTS `tbl06_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `log_stamp` datetime NOT NULL,
  `log_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id_fk` (`user_id_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(9, 2, '2024-04-15 21:10:18', 'signed-in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl10_patient`
--

DROP TABLE IF EXISTS `tbl10_patient`;
CREATE TABLE IF NOT EXISTS `tbl10_patient` (
  `p_id_pk` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(500) NOT NULL,
  `p_gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:male 1:female',
  `p_status` enum('Current','Live','Dead') NOT NULL DEFAULT 'Current',
  PRIMARY KEY (`p_id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl10_patient`
--

INSERT INTO `tbl10_patient` (`p_id_pk`, `p_name`, `p_gender`, `p_status`) VALUES
(1, 'ABC DEF', 0, 'Current'),
(2, 'PQR STU', 0, 'Dead'),
(3, 'LMN STU', 1, 'Current');

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
