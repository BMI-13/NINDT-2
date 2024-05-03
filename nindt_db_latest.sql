-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2024 at 01:02 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('svu7d7c21k46e32h3bvdheghkmjr3av5', '::1', 1714687647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638373634373b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('653u04ltsk5jefl51tn0dneatlka6c3n', '::1', 1714687973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638373937333b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('j255991vj8mc1ie3rhq16mquj4vuu729', '::1', 1714688398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638383339383b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('e912dgmfrst5kpr2gt6uv7lfug6kigak', '::1', 1714687309, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638373330393b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('rrv8dk93r4t70icejb1m1lmoev0g6j8g', '::1', 1714686933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638363933333b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('ir6ue25fp34d8p2sq26hqvsa4u92nkq0', '::1', 1714685965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638353936353b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('pnj8r3cil33cpdf8q6trbpq92038lm1t', '::1', 1714686297, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638363239373b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b70617469656e74735f69735f7365617263687c623a313b70617469656e74735f7365617263685f6b65797c4e3b70617469656e74735f7365617263685f76616c75657c733a323a22554e223b),
('6ss2eel3t21rna565b0iop5g6l93jlct', '::1', 1714686618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638363631383b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b70617469656e74735f69735f7365617263687c623a313b70617469656e74735f7365617263685f6b65797c733a31353a22705f6f6c645f6e696e64745f696420223b70617469656e74735f7365617263685f76616c75657c733a343a22612d3236223b),
('ijfl597n6r69v9euqh413djmep5adkg3', '::1', 1714697050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639373035303b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('bqfdo0u4ar7l9r3gimqcps0bb9e0rov5', '::1', 1714697263, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639373035303b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('25iv4i58f1obec24skau18iguq09behb', '::1', 1714696746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639363734363b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('0ap5cpqafbq2bpbo49mhco0rcrau82fl', '::1', 1714694827, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639343832373b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('i6pose0tbp2m11gt306hklj74a8352cl', '::1', 1714695134, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639353133343b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('hkdt4l0f5ga40p4i1ro8l1mb85hbkv13', '::1', 1714695481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639353438313b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('tqoep5jq90ailq710sg30ggntrinc5cu', '::1', 1714696426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639363432363b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('kairjqh32gjcrmufnp40j2l3c5pk2hjf', '::1', 1714692410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639323431303b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('m9is64089pba90qqq80hk42tpv9pgjvm', '::1', 1714692065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639323036353b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('ssf5e7g9710rj12v5vvkq37tchk0gimt', '::1', 1714691658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639313635383b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('kanvdi5vd7vljta1t09c399btcqc4plu', '::1', 1714690616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639303631363b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('n6i4fo8hu6bhsdc4o8k6tv9najqq3ock', '::1', 1714690923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639303932333b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('e33lph6a7mc8tnj25ujdkfsv4lb8icbu', '::1', 1714691224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639313232343b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('7s2hpcb59v7dnv4jnngclj6q9ain40if', '::1', 1714689645, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638393634353b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('qrrlul5edbi7kt31p0csu9msucer8foo', '::1', 1714689987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638393938373b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('mkhea5tkuhnorhr0cor2p9daekjcle92', '::1', 1714690300, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343639303330303b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('6hglr8pvp243lo4cot305plf9odrjhao', '::1', 1714689010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638393031303b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('81sq93bi0hhap6086bp17bia4ip52ccp', '::1', 1714689326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638393332363b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b),
('kl388beuio9kq4fmkn60t0cud05u26os', '::1', 1714688708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731343638383730383b69735f7369676e696e7c623a313b757365725f69647c733a313a2231223b757365725f726f6c657c733a353a227374616666223b);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl05_user`
--

INSERT INTO `tbl05_user` (`user_id_pk`, `user_name`, `user_email`, `user_psw`, `user_role`, `user_unit_name`, `user_nic`, `user_tpnumber`, `user_gender`, `user_photo`, `last_login`, `user_status`) VALUES
(1, 'John Doe', 'staff@nindt.lk', '$2y$10$X90yDZL5nFWvyN5XQr9XSe5iWdbOFkLu1NApAVUp.ZwzMBoW5efSq', 'staff', NULL, NULL, NULL, NULL, NULL, '2024-05-03 03:03:50', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
(24, 1, '2024-05-03 03:03:50', 'signed-in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl08_units`
--

DROP TABLE IF EXISTS `tbl08_units`;
CREATE TABLE IF NOT EXISTS `tbl08_units` (
  `unit_id_pk` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(250) NOT NULL,
  `unit_hospital` varchar(250) NOT NULL,
  `unit_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`unit_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl08_units`
--

INSERT INTO `tbl08_units` (`unit_id_pk`, `unit_name`, `unit_hospital`, `unit_active`) VALUES
(1, 'Unit 01', 'NINDT', 1),
(2, '436643', '46346336', 0);

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
  `p_assignedcategory` tinyint DEFAULT NULL,
  PRIMARY KEY (`p_id_pk`),
  UNIQUE KEY `p_old_nindt_id` (`p_old_nindt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl10_patient`
--

INSERT INTO `tbl10_patient` (`p_id_pk`, `p_nindt_id`, `p_old_nindt_id`, `p_name`, `p_gender`, `p_status`, `p_unit`, `p_nic`, `p_contact_person_name`, `p_tpnumber`, `p_email`, `p_birthDate`, `p_address`, `p_assignedcategory`) VALUES
(1, 'UN1-0001', 'A-25', 'ABC DEF', 0, 'Current', 'Unit 001', '154545789v', 'John DOe', '0174747474,2121212121,5698563258', 'jd@kgladg.dg', '1977-01-05', 'fhsfhsfh', 0),
(2, '123', 'A-26', 'PQR STU', 0, 'Dead', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '', 'A27', 'LMN STU', 1, 'Current', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'utete', 'tueuet', 'utetue', 0, '', '', 'tueute', NULL, '7574', '5775474@hsf', '2020-12-29', '8y8\'', 0),
(9, 'utete788', 'tueuet77', 'utetue', 0, 'Dead', '', 'tueute', NULL, '75748', '5775474@hsf', '2020-12-29', '8y8\'', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl15_machines`
--

DROP TABLE IF EXISTS `tbl15_machines`;
CREATE TABLE IF NOT EXISTS `tbl15_machines` (
  `machine_id_pk` bigint NOT NULL AUTO_INCREMENT,
  `machine_public_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `machine_serial` varchar(100) NOT NULL,
  `machine_unit` char(50) DEFAULT NULL,
  `machine_manufacturer` text,
  `machine_model` varchar(150) NOT NULL,
  `machine_active` tinyint(1) DEFAULT NULL,
  `machine_starting_date` date DEFAULT NULL,
  `machine_cautions` text,
  `machine_notes` text,
  PRIMARY KEY (`machine_id_pk`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl15_machines`
--

INSERT INTO `tbl15_machines` (`machine_id_pk`, `machine_public_id`, `machine_serial`, `machine_unit`, `machine_manufacturer`, `machine_model`, `machine_active`, `machine_starting_date`, `machine_cautions`, `machine_notes`) VALUES
(1, 'UN01_Row_01', '23-99-74-E3-09-B6\n', 'Unit 01', 'Fresenuis', ' 4008 S-NG', 1, '2024-04-01', 'Fusce placerat diam malesuada libero lobortis gravida. Aliquam erat volutpat. Nullam ultrices arcu tortor, ac pellentesque purus placerat eget. Cras accumsan sit amet dolor non maximus. Suspendisse potenti. Sed vel libero et metus accumsan sodales. Quisque tempor tortor ac lorem pharetra, vitae eleifend augue semper. Ut nec quam mollis, commodo neque eu, rhoncus diam. Vestibulum tristique feugiat dui, vel vulputate ipsum luctus eu. Fusce suscipit id dolor in varius. Duis vel nunc ullamcorper, facilisis lacus vel, egestas lectus. Nulla facilisi. Phasellus ut risus mauris. Sed purus purus, mollis ut enim vel, imperdiet tempus sapien. Etiam vulputate odio nec erat vestibulum semper. Pellentesque auctor hendrerit ex quis hendrerit.', 'Quisque suscipit turpis interdum urna molestie porttitor. Donec auctor turpis lorem, id commodo urna ultrices et. Morbi ultrices ut quam in congue. Duis risus nisl, fringilla ut placerat quis, efficitur a nisi. Aliquam fringilla aliquam varius. Vivamus at mattis risus. Proin ex augue, cursus vel libero in, molestie mattis lectus. Aliquam sed cursus orci. Mauris ornare, ante a vulputate convallis, purus nisl imperdiet nisi, vitae semper orci mi at ipsum.'),
(2, 'UN01_Row_02', '4B-90-92-EC-5D-E8\n', 'Unit 01', 'Fresenuis', ' 4009 S-NG', 1, '2024-04-02', '', ''),
(3, 'etutuet78888888888888', 'etuuetuet77777777777888', 'teutetu77777777777788888888', '', 'te777777777888', 1, '2024-08-08', '9[\r\n=9777888877777777777\r\n', '9\r\n9-\\9-\\-8888\\9777777777777777'),
(4, 'etutuet', 'etuuetuet', 'teutetu', 'euteutetu', 'teuetueut', 1, '2024-04-03', '9[\r\n=9\r\n', '9\r\n9-\\9-\\-\\9'),
(5, 'etutuet', 'etuuetuet', 'teutetu', 'euteutetu', 'teuetueut8', 1, '2024-04-03', '9[\r\n=9\r\n', '9\r\n9-\\9-\\-\\9\r\n\r\n\r\n666\r\n\r\n333\r\n\r\n3333'),
(6, 'etutuet', 'etuuetuet', 'teutetu', 'euteutetu', 'teuetueut', 1, '2024-04-03', '9[\r\n=9\r\n', '9\r\n9-\\9-\\-\\9'),
(7, 'etutuet', 'etuuetuet', 'teutetu', 'euteutetu', 'teuetueut', 1, '2024-04-03', '9[\r\n=9\r\n', '9\r\n9-\\9-\\-\\9'),
(8, 'rykiryiry', 'rrrttrutu', 'riirir', 'eyry', 'ryyrerye', 1, '2024-04-24', 'fnfdhhfd', 'hfdhdfhdf'),
(9, 'rykiryiry', 'rrrttrutu', 'riirir', 'eyry', 'ryyrerye', 1, '2024-04-24', 'fnfdhhfd', 'hfdhdfhdf'),
(10, 'rykiryiry', 'rrrttrutu', 'riirir', 'eyry', 'ryyrerye', 1, '2024-04-24', 'fnfdhhfd', 'hfdhdfhdf'),
(11, 'UN02_Row_01', '4U-90-92-EC-5D-78', 'UN02', 'Abbort', 'JK-789-55', 0, '2024-04-02', 'sdhhsrhs', 'hsfffhshsff'),
(12, 'otutul', 'toutoytyo', 'toutouto', 'ytoyottyo', 'tytoutuo', 0, '2024-05-08', 'uycp', 'lyuilp8lop'),
(13, 'a68', '753573537', '856856', '573573573', '573537573', 1, '2024-04-10', 'w5757', '57aa5ae5'),
(14, 'ueut', 'uteuteu', 'utut', 'ututut', 'uteuteute', 1, '2023-11-11', '664uu', 'ury');

-- --------------------------------------------------------

--
-- Table structure for table `tbl20_hemodialysis_sessions`
--

DROP TABLE IF EXISTS `tbl20_hemodialysis_sessions`;
CREATE TABLE IF NOT EXISTS `tbl20_hemodialysis_sessions` (
  `hds_id_pk` bigint NOT NULL AUTO_INCREMENT,
  `hds_id_public` varchar(50) NOT NULL,
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
  PRIMARY KEY (`hds_id_pk`),
  UNIQUE KEY `hds_id_public` (`hds_id_public`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
