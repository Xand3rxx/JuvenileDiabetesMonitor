-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2019 at 08:08 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juvenilediabetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_09_103854_tbl_physician_information', 1),
(2, '2019_05_09_113749__tbl_physician_appointment', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_glucose_measurement`
--

DROP TABLE IF EXISTS `tbl_blood_glucose_measurement`;
CREATE TABLE IF NOT EXISTS `tbl_blood_glucose_measurement` (
  `BG_measure_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Medical_Record_No` bigint(20) NOT NULL,
  `BG_Date` varchar(20) NOT NULL,
  `BG_Time` varchar(20) NOT NULL,
  `Glucose_Measurement` int(10) NOT NULL,
  `Patient_Stated_Reason` varchar(1024) DEFAULT NULL,
  UNIQUE KEY `BG_measure_ID` (`BG_measure_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood_glucose_measurement`
--

INSERT INTO `tbl_blood_glucose_measurement` (`BG_measure_ID`, `Medical_Record_No`, `BG_Date`, `BG_Time`, `Glucose_Measurement`, `Patient_Stated_Reason`) VALUES
(1, 100100, '10/10/2018', '8:00', 149, ''),
(2, 100100, '10/10/2018', '12:00', 116, ''),
(3, 100100, '10/10/2018', '18:00', 304, ''),
(4, 100100, '10/10/2018', '22:00', 63, 'I was ill'),
(5, 100100, '10/11/2018', '8:00', 171, ''),
(6, 100100, '10/11/2018', '12:00', 148, ''),
(7, 100100, '10/11/2018', '18:00', 115, ''),
(8, 100100, '10/11/2018', '22:00', 130, ''),
(9, 100100, '10/12/2018', '8:00', 220, ''),
(10, 100100, '10/12/2018', '18:00', 125, ''),
(11, 100100, '10/12/2018', '22:00', 110, ''),
(12, 100100, '10/13/2018', '8:00', 288, ''),
(13, 100100, '10/13/2018', '12:00', 284, ''),
(14, 100100, '10/13/2018', '18:00', 47, 'I don\'t know'),
(15, 100100, '10/13/2018', '22:00', 288, ''),
(16, 100100, '10/14/2018', '8:00', 201, ''),
(17, 100100, '10/14/2018', '12:00', 141, ''),
(18, 100100, '10/14/2018', '18:00', 170, ''),
(19, 100100, '10/14/2018', '22:00', 131, ''),
(20, 100100, '10/15/2018', '8:00', 206, 'I ate too much junk food'),
(21, 100100, '10/15/2018', '12:00', 168, 'I ate too much junk food'),
(22, 100100, '10/15/2018', '18:00', 176, 'I don’t know'),
(23, 100100, '10/15/2018', '22:00', 263, ''),
(24, 100100, '10/16/2018', '8:00', 344, ''),
(25, 100100, '10/16/2018', '12:00', 248, ''),
(26, 100100, '10/16/2018', '18:00', 146, ''),
(27, 100100, '10/16/2018', '22:00', 247, ''),
(28, 100100, '10/17/2018', '8:00', 124, ''),
(29, 100100, '10/17/2018', '12:00', 188, ''),
(30, 100100, '10/17/2018', '18:00', 205, ''),
(31, 100100, '10/17/2018', '22:00', 208, ''),
(32, 100100, '10/18/2018', '8:00', 313, ''),
(33, 100100, '10/18/2018', '12:00', 148, ''),
(34, 100100, '10/18/2018', '18:00', 325, ''),
(35, 100100, '10/18/2018', '22:00', 134, ''),
(36, 100100, '10/19/2018', '8:00', 90, ''),
(37, 100100, '10/19/2018', '12:00', 192, ''),
(38, 100100, '10/19/2018', '18:00', 57, 'haven\'t had a meal'),
(39, 100100, '10/19/2018', '22:00', 99, ''),
(40, 100100, '10/20/2018', '8:00', 153, ''),
(41, 100100, '10/20/2018', '12:00', 169, ''),
(42, 100100, '10/20/2018', '18:00', 84, ''),
(43, 100100, '10/20/2018', '22:00', 144, ''),
(44, 100100, '10/21/2018', '8:00', 261, ''),
(45, 100100, '10/21/2018', '12:00', 306, ''),
(46, 100100, '10/21/2018', '18:00', 206, ''),
(47, 100100, '10/21/2018', '22:00', 192, ''),
(48, 100100, '10/22/2018', '8:00', 216, ''),
(49, 100100, '10/22/2018', '12:00', 296, ''),
(50, 100100, '10/22/2018', '18:00', 94, ''),
(51, 100100, '10/22/2018', '22:00', 212, ''),
(52, 100100, '10/23/2018', '8:00', 249, ''),
(53, 100100, '10/23/2018', '12:00', 209, ''),
(54, 100100, '10/23/2018', '18:00', 174, ''),
(55, 100100, '10/23/2018', '22:00', 182, ''),
(56, 100100, '10/24/2018', '8:00', 150, ''),
(57, 100100, '10/24/2018', '12:00', 70, ''),
(58, 100100, '10/24/2018', '18:00', 253, ''),
(59, 100100, '10/24/2018', '22:00', 128, ''),
(60, 100100, '10/25/2018', '8:00', 180, ''),
(61, 100100, '10/25/2018', '12:00', 223, ''),
(62, 100100, '10/25/2018', '18:00', 286, ''),
(63, 100100, '10/25/2018', '22:00', 182, ''),
(64, 100100, '10/26/2018', '8:00', 285, ''),
(65, 100100, '10/26/2018', '12:00', 220, ''),
(66, 100100, '10/26/2018', '18:00', 141, ''),
(67, 100100, '10/26/2018', '22:00', 140, ''),
(68, 100100, '10/27/2018', '8:00', 217, ''),
(69, 100100, '10/27/2018', '12:00', 212, ''),
(70, 100100, '10/27/2018', '18:00', 288, ''),
(71, 100100, '10/27/2018', '22:00', 236, ''),
(72, 100100, '10/28/2018', '8:00', 193, ''),
(73, 100100, '10/28/2018', '12:00', 85, ''),
(74, 100100, '10/28/2018', '18:00', 156, ''),
(75, 100100, '10/28/2018', '22:00', 236, ''),
(76, 100100, '10/29/2018', '8:00', 237, ''),
(77, 100100, '10/29/2018', '12:00', 145, ''),
(78, 100100, '10/29/2018', '18:00', 141, ''),
(79, 100100, '10/29/2018', '22:00', 388, ''),
(80, 100100, '10/30/2018', '8:00', 274, ''),
(81, 100100, '10/30/2018', '12:00', 201, ''),
(82, 100100, '10/30/2018', '18:00', 365, ''),
(83, 100100, '10/30/2018', '22:00', 223, ''),
(84, 100100, '10/31/2018', '8:00', 275, ''),
(85, 100100, '10/31/2018', '12:00', 90, ''),
(86, 100100, '10/31/2018', '18:00', 137, ''),
(87, 100100, '10/31/2018', '22:00', 166, ''),
(88, 100100, '11/1/2018', '8:00', 127, ''),
(89, 100100, '11/1/2018', '12:00', 173, ''),
(90, 100100, '11/1/2018', '18:00', 225, ''),
(91, 100100, '11/1/2018', '22:00', 184, ''),
(92, 100100, '11/2/2018', '8:00', 262, ''),
(93, 100100, '11/2/2018', '12:00', 376, ''),
(94, 100100, '11/2/2018', '18:00', 250, ''),
(95, 100100, '11/2/2018', '22:00', 119, ''),
(96, 100100, '11/3/2018', '8:00', 194, ''),
(97, 100100, '11/3/2018', '12:00', 259, ''),
(98, 100100, '11/3/2018', '18:00', 221, ''),
(99, 100100, '11/3/2018', '22:00', 297, ''),
(100, 100100, '11/4/2018', '8:00', 223, ''),
(101, 100100, '11/4/2018', '12:00', 325, ''),
(102, 100100, '11/4/2018', '18:00', 90, ''),
(103, 100100, '11/4/2018', '22:00', 393, ''),
(104, 100100, '11/5/2018', '8:00', 246, ''),
(105, 100100, '11/5/2018', '12:00', 90, ''),
(106, 100100, '11/5/2018', '18:00', 361, ''),
(107, 100100, '11/5/2018', '22:00', 348, ''),
(108, 100100, '11/6/2018', '8:00', 262, ''),
(109, 100100, '11/6/2018', '12:00', 90, ''),
(110, 100100, '11/6/2018', '18:00', 330, ''),
(111, 100100, '11/6/2018', '22:00', 90, ''),
(112, 100100, '11/7/2018', '8:00', 240, ''),
(113, 100100, '11/7/2018', '12:00', 317, ''),
(114, 100100, '11/7/2018', '18:00', 156, ''),
(115, 100100, '11/7/2018', '22:00', 158, ''),
(116, 100100, '11/8/2018', '8:00', 221, ''),
(117, 100100, '11/8/2018', '12:00', 225, ''),
(118, 100100, '11/8/2018', '22:00', 97, ''),
(119, 100100, '11/9/2018', '8:00', 225, ''),
(120, 100100, '11/9/2018', '12:00', 274, ''),
(121, 100100, '11/9/2018', '18:00', 175, ''),
(122, 100100, '11/9/2018', '22:00', 147, ''),
(123, 100100, '11/10/2018', '8:00', 156, ''),
(124, 100100, '11/10/2018', '12:00', 205, ''),
(125, 100100, '11/10/2018', '18:00', 251, ''),
(126, 100100, '11/10/2018', '22:00', 160, ''),
(127, 100100, '11/11/2018', '8:00', 196, ''),
(128, 100100, '11/11/2018', '12:00', 97, ''),
(129, 100100, '11/11/2018', '18:00', 166, ''),
(130, 100100, '11/11/2018', '22:00', 224, ''),
(131, 100100, '11/12/2018', '8:00', 269, ''),
(132, 100100, '11/12/2018', '12:00', 167, ''),
(133, 100100, '11/12/2018', '18:00', 251, ''),
(134, 100100, '11/12/2018', '22:00', 279, ''),
(135, 100100, '11/13/2018', '8:00', 303, ''),
(136, 100100, '11/13/2018', '12:00', 249, ''),
(137, 100100, '11/13/2018', '18:00', 117, ''),
(138, 100100, '11/13/2018', '22:00', 222, ''),
(139, 100100, '11/14/2018', '8:00', 104, ''),
(140, 100100, '11/14/2018', '12:00', 55, ''),
(141, 100100, '11/14/2018', '18:00', 193, ''),
(142, 100100, '11/14/2018', '22:00', 264, ''),
(143, 100100, '11/15/2018', '8:00', 195, ''),
(144, 100100, '11/15/2018', '12:00', 249, ''),
(145, 100100, '11/15/2018', '18:00', 153, ''),
(146, 100100, '11/15/2018', '22:00', 92, ''),
(147, 100100, '11/16/2018', '8:00', 125, ''),
(148, 100100, '11/16/2018', '12:00', 160, ''),
(149, 100100, '11/16/2018', '18:00', 292, ''),
(150, 100100, '11/16/2018', '22:00', 183, ''),
(151, 100100, '11/17/2018', '8:00', 137, ''),
(152, 100100, '11/17/2018', '12:00', 86, ''),
(153, 100100, '11/17/2018', '18:00', 281, ''),
(154, 100100, '11/17/2018', '22:00', 105, ''),
(155, 100100, '11/18/2018', '8:00', 88, ''),
(156, 100100, '11/18/2018', '12:00', 61, ''),
(157, 100100, '11/18/2018', '18:00', 178, ''),
(158, 100100, '11/18/2018', '22:00', 348, ''),
(159, 100100, '11/19/2018', '8:00', 252, ''),
(160, 100100, '11/19/2018', '12:00', 66, ''),
(161, 100100, '11/19/2018', '18:00', 217, ''),
(162, 100100, '11/19/2018', '22:00', 191, ''),
(163, 100100, '11/20/2018', '8:00', 173, ''),
(164, 100100, '11/20/2018', '12:00', 57, ''),
(165, 100100, '11/20/2018', '18:00', 195, ''),
(166, 100100, '11/20/2018', '22:00', 209, ''),
(167, 100100, '11/21/2018', '8:00', 239, ''),
(168, 100100, '11/21/2018', '12:00', 235, ''),
(169, 100100, '11/21/2018', '18:00', 173, ''),
(170, 100100, '11/21/2018', '22:00', 142, ''),
(171, 100100, '11/22/2018', '8:00', 326, ''),
(172, 100100, '11/22/2018', '12:00', 263, ''),
(173, 100100, '11/22/2018', '18:00', 140, ''),
(174, 100100, '11/22/2018', '22:00', 169, ''),
(175, 100100, '11/23/2018', '8:00', 224, ''),
(176, 100100, '11/23/2018', '12:00', 247, ''),
(177, 100100, '11/23/2018', '18:00', 192, ''),
(178, 100100, '11/24/2018', '8:00', 307, ''),
(179, 100100, '11/24/2018', '12:00', 208, ''),
(180, 100100, '11/24/2018', '18:00', 300, ''),
(181, 100100, '11/24/2018', '22:00', 364, ''),
(182, 100100, '11/25/2018', '8:00', 253, ''),
(183, 100100, '11/25/2018', '12:00', 254, ''),
(184, 100100, '11/25/2018', '18:00', 273, ''),
(185, 100100, '11/25/2018', '22:00', 276, ''),
(186, 100100, '11/26/2018', '8:00', 285, ''),
(187, 100100, '11/26/2018', '12:00', 238, ''),
(188, 100100, '11/26/2018', '18:00', 226, ''),
(189, 100100, '11/26/2018', '22:00', 279, ''),
(190, 100100, '11/27/2018', '8:00', 285, ''),
(191, 100100, '11/27/2018', '12:00', 108, ''),
(192, 100100, '11/27/2018', '18:00', 209, ''),
(193, 100100, '11/27/2018', '22:00', 197, ''),
(194, 100100, '11/28/2018', '8:00', 144, ''),
(195, 100100, '11/28/2018', '12:00', 133, ''),
(196, 100100, '11/28/2018', '18:00', 53, ''),
(197, 100100, '11/28/2018', '22:00', 101, ''),
(198, 100100, '11/29/2018', '8:00', 282, ''),
(199, 100100, '11/29/2018', '12:00', 192, ''),
(200, 100100, '11/29/2018', '18:00', 344, ''),
(201, 100100, '11/29/2018', '22:00', 245, ''),
(202, 100100, '11/30/2018', '8:00', 191, ''),
(203, 100100, '11/30/2018', '12:00', 71, ''),
(204, 100100, '11/30/2018', '18:00', 254, ''),
(205, 100100, '11/30/2018', '22:00', 193, ''),
(206, 100100, '12/1/2018', '8:00', 185, ''),
(207, 100100, '12/1/2018', '12:00', 161, ''),
(208, 100100, '12/1/2018', '18:00', 179, ''),
(209, 100100, '12/1/2018', '22:00', 203, ''),
(210, 100100, '12/2/2018', '8:00', 216, ''),
(211, 100100, '12/2/2018', '12:00', 275, ''),
(212, 100100, '12/2/2018', '18:00', 65, ''),
(213, 100100, '12/2/2018', '22:00', 121, ''),
(214, 100100, '12/3/2018', '8:00', 163, ''),
(215, 100100, '12/3/2018', '12:00', 169, ''),
(216, 100100, '12/3/2018', '18:00', 67, ''),
(217, 100100, '12/3/2018', '22:00', 161, ''),
(218, 100100, '12/4/2018', '8:00', 106, ''),
(219, 100100, '12/4/2018', '12:00', 56, ''),
(220, 100100, '12/4/2018', '18:00', 72, ''),
(221, 100100, '12/4/2018', '22:00', 143, ''),
(222, 100100, '12/5/2018', '8:00', 119, ''),
(223, 100100, '12/5/2018', '12:00', 53, ''),
(224, 100100, '12/5/2018', '18:00', 176, ''),
(225, 100100, '12/5/2018', '22:00', 284, ''),
(226, 100100, '12/6/2018', '8:00', 302, ''),
(227, 100100, '12/6/2018', '12:00', 134, ''),
(228, 100100, '12/6/2018', '18:00', 164, ''),
(229, 100100, '12/6/2018', '22:00', 65, ''),
(230, 100100, '12/7/2018', '8:00', 110, ''),
(231, 100100, '12/7/2018', '12:00', 49, ''),
(232, 100100, '12/7/2018', '18:00', 206, ''),
(233, 100100, '12/7/2018', '22:00', 252, ''),
(234, 100100, '12/8/2018', '8:00', 154, ''),
(235, 100100, '12/8/2018', '12:00', 138, ''),
(236, 100100, '12/8/2018', '18:00', 180, ''),
(237, 100100, '12/8/2018', '22:00', 224, ''),
(238, 100100, '12/9/2018', '8:00', 228, ''),
(239, 100100, '12/9/2018', '12:00', 52, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insulin_injection_values`
--

DROP TABLE IF EXISTS `tbl_insulin_injection_values`;
CREATE TABLE IF NOT EXISTS `tbl_insulin_injection_values` (
  `Insulin_injection_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Medical_Record_No` bigint(15) NOT NULL,
  `Insulin_Date` varchar(15) NOT NULL,
  `Insulin_Time` varchar(10) NOT NULL,
  `Insulin_injection_value` decimal(10,0) NOT NULL,
  UNIQUE KEY `Insulin_injection_ID` (`Insulin_injection_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_insulin_injection_values`
--

INSERT INTO `tbl_insulin_injection_values` (`Insulin_injection_ID`, `Medical_Record_No`, `Insulin_Date`, `Insulin_Time`, `Insulin_injection_value`) VALUES
(1, 100100, '10/10/2018', '8:00', '10'),
(2, 100100, '10/10/2018', '12:00', '4'),
(3, 100100, '10/10/2018', '18:00', '10'),
(4, 100100, '10/10/2018', '22:00', '14'),
(5, 100100, '10/11/2018', '8:00', '10'),
(6, 100100, '10/11/2018', '12:00', '4'),
(7, 100100, '10/11/2018', '18:00', '10'),
(8, 100100, '10/11/2018', '22:00', '14'),
(9, 100100, '10/12/2018', '8:00', '10'),
(10, 100100, '10/12/2018', '18:00', '10'),
(11, 100100, '10/12/2018', '22:00', '14'),
(12, 100100, '10/13/2018', '8:00', '10'),
(13, 100100, '10/13/2018', '12:00', '4'),
(14, 100100, '10/13/2018', '18:00', '10'),
(15, 100100, '10/13/2018', '22:00', '14'),
(16, 100100, '10/14/2018', '8:00', '10'),
(17, 100100, '10/14/2018', '12:00', '4'),
(18, 100100, '10/14/2018', '18:00', '10'),
(19, 100100, '10/14/2018', '22:00', '14'),
(20, 100100, '10/15/2018', '8:00', '10'),
(21, 100100, '10/15/2018', '12:00', '4'),
(22, 100100, '10/15/2018', '18:00', '10'),
(23, 100100, '10/15/2018', '22:00', '14'),
(24, 100100, '10/16/2018', '8:00', '12'),
(25, 100100, '10/16/2018', '12:00', '6'),
(26, 100100, '10/16/2018', '18:00', '10'),
(27, 100100, '10/16/2018', '22:00', '14'),
(28, 100100, '10/17/2018', '8:00', '10'),
(29, 100100, '10/17/2018', '12:00', '4'),
(30, 100100, '10/17/2018', '18:00', '10'),
(31, 100100, '10/17/2018', '22:00', '14'),
(32, 100100, '10/18/2018', '8:00', '14'),
(33, 100100, '10/18/2018', '12:00', '4'),
(34, 100100, '10/18/2018', '18:00', '12'),
(35, 100100, '10/18/2018', '22:00', '14'),
(36, 100100, '10/19/2018', '8:00', '10'),
(37, 100100, '10/19/2018', '12:00', '4'),
(38, 100100, '10/19/2018', '18:00', '10'),
(39, 100100, '10/19/2018', '22:00', '14'),
(40, 100100, '10/20/2018', '8:00', '10'),
(41, 100100, '10/20/2018', '12:00', '4'),
(42, 100100, '10/20/2018', '18:00', '10'),
(43, 100100, '10/20/2018', '22:00', '14'),
(44, 100100, '10/21/2018', '8:00', '12'),
(45, 100100, '10/21/2018', '12:00', '6'),
(46, 100100, '10/21/2018', '18:00', '10'),
(47, 100100, '10/21/2018', '22:00', '14'),
(48, 100100, '10/22/2018', '8:00', '10'),
(49, 100100, '10/22/2018', '12:00', '6'),
(50, 100100, '10/22/2018', '18:00', '10'),
(51, 100100, '10/22/2018', '22:00', '14'),
(52, 100100, '10/23/2018', '8:00', '10'),
(53, 100100, '10/23/2018', '12:00', '4'),
(54, 100100, '10/23/2018', '18:00', '10'),
(55, 100100, '10/23/2018', '22:00', '14'),
(56, 100100, '10/24/2018', '8:00', '10'),
(57, 100100, '10/24/2018', '12:00', '4'),
(58, 100100, '10/24/2018', '18:00', '10'),
(59, 100100, '10/24/2018', '22:00', '14'),
(60, 100100, '10/25/2018', '8:00', '10'),
(61, 100100, '10/25/2018', '12:00', '4'),
(62, 100100, '10/25/2018', '18:00', '14'),
(63, 100100, '10/25/2018', '22:00', '14'),
(64, 100100, '10/26/2018', '8:00', '14'),
(65, 100100, '10/26/2018', '12:00', '4'),
(66, 100100, '10/26/2018', '18:00', '10'),
(67, 100100, '10/26/2018', '22:00', '14'),
(68, 100100, '10/27/2018', '8:00', '14'),
(69, 100100, '10/27/2018', '8:00', '10'),
(70, 100100, '10/27/2018', '12:00', '4'),
(71, 100100, '10/27/2018', '18:00', '12'),
(72, 100100, '10/27/2018', '22:00', '14'),
(73, 100100, '10/28/2018', '8:00', '10'),
(74, 100100, '10/28/2018', '12:00', '4'),
(75, 100100, '10/28/2018', '18:00', '10'),
(76, 100100, '10/28/2018', '22:00', '14'),
(77, 100100, '10/29/2018', '8:00', '10'),
(78, 100100, '10/29/2018', '12:00', '4'),
(79, 100100, '10/29/2018', '18:00', '14'),
(80, 100100, '10/29/2018', '22:00', '18'),
(81, 100100, '10/30/2018', '8:00', '12'),
(82, 100100, '10/30/2018', '12:00', '4'),
(83, 100100, '10/30/2018', '18:00', '14'),
(84, 100100, '10/30/2018', '22:00', '14'),
(85, 100100, '10/31/2018', '8:00', '12'),
(86, 100100, '10/31/2018', '12:00', '8'),
(87, 100100, '10/31/2018', '18:00', '10'),
(88, 100100, '10/31/2018', '22:00', '14'),
(89, 100100, '11/1/2018', '8:00', '10'),
(90, 100100, '11/1/2018', '12:00', '4'),
(91, 100100, '11/1/2018', '18:00', '10'),
(92, 100100, '11/1/2018', '22:00', '14'),
(93, 100100, '11/2/2018', '8:00', '12'),
(94, 100100, '11/2/2018', '12:00', '8'),
(95, 100100, '11/2/2018', '18:00', '12'),
(96, 100100, '11/2/2018', '22:00', '14'),
(97, 100100, '11/3/2018', '8:00', '10'),
(98, 100100, '11/3/2018', '12:00', '6'),
(99, 100100, '11/3/2018', '18:00', '10'),
(100, 100100, '11/3/2018', '22:00', '16'),
(101, 100100, '11/4/2018', '8:00', '10'),
(102, 100100, '11/4/2018', '12:00', '8'),
(103, 100100, '11/4/2018', '18:00', '14'),
(104, 100100, '11/4/2018', '22:00', '18'),
(105, 100100, '11/5/2018', '8:00', '10'),
(106, 100100, '11/5/2018', '12:00', '8'),
(107, 100100, '11/5/2018', '18:00', '12'),
(108, 100100, '11/5/2018', '22:00', '18'),
(109, 100100, '11/6/2018', '8:00', '12'),
(110, 100100, '11/6/2018', '12:00', '8'),
(111, 100100, '11/6/2018', '18:00', '12'),
(112, 100100, '11/6/2018', '22:00', '18'),
(113, 100100, '11/7/2018', '8:00', '10'),
(114, 100100, '11/7/2018', '12:00', '8'),
(115, 100100, '11/7/2018', '18:00', '10'),
(116, 100100, '11/7/2018', '22:00', '14'),
(117, 100100, '11/8/2018', '8:00', '10'),
(118, 100100, '11/8/2018', '12:00', '4'),
(119, 100100, '11/8/2018', '18:00', '4'),
(120, 100100, '11/8/2018', '22:00', '10'),
(121, 100100, '11/9/2018', '8:00', '10'),
(122, 100100, '11/9/2018', '12:00', '8'),
(123, 100100, '11/9/2018', '18:00', '10'),
(124, 100100, '11/9/2018', '22:00', '14'),
(125, 100100, '11/10/2018', '8:00', '10'),
(126, 100100, '11/10/2018', '12:00', '4'),
(127, 100100, '11/10/2018', '18:00', '12'),
(128, 100100, '11/10/2018', '22:00', '14'),
(129, 100100, '11/11/2018', '8:00', '10'),
(130, 100100, '11/11/2018', '12:00', '4'),
(131, 100100, '11/11/2018', '18:00', '10'),
(132, 100100, '11/11/2018', '22:00', '14'),
(133, 100100, '11/12/2018', '8:00', '10'),
(134, 100100, '11/12/2018', '12:00', '4'),
(135, 100100, '11/12/2018', '18:00', '12'),
(136, 100100, '11/12/2018', '22:00', '14'),
(137, 100100, '11/13/2018', '8:00', '14'),
(138, 100100, '11/13/2018', '12:00', '6'),
(139, 100100, '11/13/2018', '18:00', '10'),
(140, 100100, '11/13/2018', '22:00', '14'),
(141, 100100, '11/14/2018', '8:00', '10'),
(142, 100100, '11/14/2018', '12:00', '4'),
(143, 100100, '11/14/2018', '18:00', '10'),
(144, 100100, '11/14/2018', '22:00', '16'),
(145, 100100, '11/15/2018', '8:00', '10'),
(146, 100100, '11/15/2018', '12:00', '6'),
(147, 100100, '11/15/2018', '18:00', '10'),
(148, 100100, '11/15/2018', '22:00', '10'),
(149, 100100, '11/16/2018', '8:00', '10'),
(150, 100100, '11/16/2018', '12:00', '4'),
(151, 100100, '11/16/2018', '18:00', '12'),
(152, 100100, '11/16/2018', '22:00', '14'),
(153, 100100, '11/17/2018', '8:00', '10'),
(154, 100100, '11/17/2018', '12:00', '4'),
(155, 100100, '11/17/2018', '18:00', '12'),
(156, 100100, '11/17/2018', '22:00', '14'),
(157, 100100, '11/18/2018', '8:00', '10'),
(158, 100100, '11/18/2018', '12:00', '4'),
(159, 100100, '11/18/2018', '18:00', '10'),
(160, 100100, '11/18/2018', '22:00', '18'),
(161, 100100, '11/19/2018', '8:00', '12'),
(162, 100100, '11/19/2018', '12:00', '4'),
(163, 100100, '11/19/2018', '18:00', '10'),
(164, 100100, '11/19/2018', '22:00', '14'),
(165, 100100, '11/20/2018', '8:00', '10'),
(166, 100100, '11/20/2018', '12:00', '4'),
(167, 100100, '11/20/2018', '18:00', '10'),
(168, 100100, '11/20/2018', '22:00', '14'),
(169, 100100, '11/21/2018', '8:00', '10'),
(170, 100100, '11/21/2018', '12:00', '6'),
(171, 100100, '11/21/2018', '18:00', '10'),
(172, 100100, '11/21/2018', '22:00', '14'),
(173, 100100, '11/22/2018', '8:00', '14'),
(174, 100100, '11/22/2018', '12:00', '6'),
(175, 100100, '11/22/2018', '18:00', '10'),
(176, 100100, '11/22/2018', '22:00', '14'),
(177, 100100, '11/23/2018', '8:00', '14'),
(178, 100100, '11/23/2018', '12:00', '4'),
(179, 100100, '11/23/2018', '18:00', '10'),
(180, 100100, '11/24/2018', '8:00', '12'),
(181, 100100, '11/24/2018', '12:00', '4'),
(182, 100100, '11/24/2018', '18:00', '14'),
(183, 100100, '11/24/2018', '22:00', '18'),
(184, 100100, '11/25/2018', '8:00', '10'),
(185, 100100, '11/25/2018', '12:00', '6'),
(186, 100100, '11/25/2018', '18:00', '12'),
(187, 100100, '11/25/2018', '22:00', '16'),
(188, 100100, '11/26/2018', '8:00', '12'),
(189, 100100, '11/26/2018', '12:00', '4'),
(190, 100100, '11/26/2018', '18:00', '10'),
(191, 100100, '11/26/2018', '22:00', '16'),
(192, 100100, '11/27/2018', '8:00', '12'),
(193, 100100, '11/27/2018', '12:00', '4'),
(194, 100100, '11/27/2018', '18:00', '10'),
(195, 100100, '11/27/2018', '22:00', '14'),
(196, 100100, '11/28/2018', '8:00', '10'),
(197, 100100, '11/28/2018', '12:00', '4'),
(198, 100100, '11/28/2018', '18:00', '10'),
(199, 100100, '11/28/2018', '22:00', '11'),
(200, 100100, '11/29/2018', '8:00', '12'),
(201, 100100, '11/29/2018', '12:00', '4'),
(202, 100100, '11/29/2018', '18:00', '10'),
(203, 100100, '11/29/2018', '22:00', '16'),
(204, 100100, '11/30/2018', '8:00', '10'),
(205, 100100, '11/30/2018', '12:00', '4'),
(206, 100100, '11/30/2018', '18:00', '12'),
(207, 100100, '11/30/2018', '22:00', '14'),
(208, 100100, '12/1/2018', '8:00', '10'),
(209, 100100, '12/1/2018', '12:00', '4'),
(210, 100100, '12/1/2018', '18:00', '10'),
(211, 100100, '12/1/2018', '22:00', '14'),
(212, 100100, '12/2/2018', '8:00', '10'),
(213, 100100, '12/2/2018', '12:00', '6'),
(214, 100100, '12/2/2018', '18:00', '10'),
(215, 100100, '12/2/2018', '22:00', '10'),
(216, 100100, '12/3/2018', '8:00', '10'),
(217, 100100, '12/3/2018', '12:00', '4'),
(218, 100100, '12/3/2018', '18:00', '10'),
(219, 100100, '12/3/2018', '22:00', '14'),
(220, 100100, '12/4/2018', '8:00', '10'),
(221, 100100, '12/4/2018', '12:00', '4'),
(222, 100100, '12/4/2018', '18:00', '10'),
(223, 100100, '12/4/2018', '22:00', '14'),
(224, 100100, '12/5/2018', '8:00', '10'),
(225, 100100, '12/5/2018', '12:00', '4'),
(226, 100100, '12/5/2018', '18:00', '10'),
(227, 100100, '12/5/2018', '22:00', '16'),
(228, 100100, '12/6/2018', '8:00', '12'),
(229, 100100, '12/6/2018', '12:00', '4'),
(230, 100100, '12/6/2018', '18:00', '10'),
(231, 100100, '12/6/2018', '22:00', '10'),
(232, 100100, '12/7/2018', '8:00', '10'),
(233, 100100, '12/7/2018', '12:00', '4'),
(234, 100100, '12/7/2018', '18:00', '10'),
(235, 100100, '12/7/2018', '22:00', '16'),
(236, 100100, '12/8/2018', '8:00', '10'),
(237, 100100, '12/8/2018', '12:00', '4'),
(238, 100100, '12/8/2018', '18:00', '10'),
(239, 100100, '12/8/2018', '22:00', '14'),
(240, 100100, '12/9/2018', '8:00', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_information`
--

DROP TABLE IF EXISTS `tbl_patient_information`;
CREATE TABLE IF NOT EXISTS `tbl_patient_information` (
  `Medical_Record_No` bigint(6) NOT NULL,
  `Physician_ID` bigint(9) NOT NULL,
  `id` int(10) NOT NULL,
  `First_Name` varchar(1024) NOT NULL,
  `Middle_Name` varchar(1024) NOT NULL,
  `Last_Name` varchar(1024) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Guardian1_Name` varchar(1024) NOT NULL,
  `Guardian2_Name` varchar(1024) DEFAULT NULL,
  `Guardian1_mobile_No` varchar(15) NOT NULL,
  `Guardian2_mobile_No` varchar(15) DEFAULT NULL,
  `Guardian1_Email` varchar(1024) NOT NULL,
  `Guardian2_Email` varchar(1024) DEFAULT NULL,
  `Avatar` varchar(191) DEFAULT 'user_avatar.jpg',
  PRIMARY KEY (`Medical_Record_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient_information`
--

INSERT INTO `tbl_patient_information` (`Medical_Record_No`, `Physician_ID`, `id`, `First_Name`, `Middle_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Guardian1_Name`, `Guardian2_Name`, `Guardian1_mobile_No`, `Guardian2_mobile_No`, `Guardian1_Email`, `Guardian2_Email`, `Avatar`) VALUES
(100100, 995682250, 2, 'Andrew', 'Mark', 'Davidson', '2014-10-15', 'Male', 'Esther Davidson', 'Bryan Davidson', '+6788542510168', '+15855551208646', 'esther@fakeemail.com', 'bryan@fakeemail.com', '907392738.png'),
(962671218, 8759375905, 4, 'Garfield', 'Steven', 'James', '2014-12-15', 'Male', 'Diana Garfield', 'Frederick Garfield', '+1322288780587', '+2117466134573', 'diana@realgmail.com', 'frederick@realgmail.com', '2036220974.jpg'),
(3292205816, 5159142180, 6, 'Kattie', 'Kiehn', 'Corwin', '2009-06-30', 'Female', 'Damaris Hills PhD', 'Theresa Russel', '+2118005262498', '+4585557958646', 'ladarius.hagenes@example.com', 'amely.wehner@example.org', '4567890123.png'),
(7381007481, 1266123909, 8, 'Lavon', 'Ebert', 'Schowalter', '2014-06-08', 'Male', 'Vidal Waters', 'Madalyn Cormier', '+1324253120567', '+1322288780587', 'isabel.blanda@example.org', 'yschaefer@example.com', '321270326.jpg'),
(2976084722, 8490302731, 10, 'Myriam', 'Roberts', 'Crist', '2008-10-23', 'Female', 'Mr. Xavier Hammes PhD', 'Zane Mante', '+9556998918251', '+2168225872623', 'dallin44@example.com', 'skonopelski@example.org', '345678912.jpg'),
(2757128552, 2244489743, 12, 'Joannie', 'Vandervort', 'Denesik', '2009-03-02', 'Female', 'Prof. Albin Abbott MD', 'Soledad Kunde PhD', '+1787022290561', '+2600011546092', 'jadon80@example.com', 'schmidt.loma@example.com', '440494984.jpg'),
(5655064793, 8658668937, 14, 'Cesar', 'Wilkinson', 'Kuphal', '2010-12-21', 'Male', 'Amiya Thiel', 'Ryder Sawayn PhD', '+7696364501232', '+1156164913471', 'kessler.jamison@example.org', 'cynthia60@example.net', '1226540365.jpg'),
(4968805396, 5584777139, 16, 'Queen', 'Mitchell', 'Sanford', '2013-03-19', 'Female', 'Demond Corkery', 'Obie Olson', '+9748805318521', '+3117466182146', 'olga.anderson@example.org', 'adelbert.raynor@example.com', '234567891.png'),
(4450036668, 9435552631, 18, 'Keegan', 'O\'Keefe', 'Moen', '2012-07-06', 'Male', 'Kristoffer Cole', 'Wilber Grady', '+7630706341094', '+8547420098748', 'rjacobs@example.org', 'josefina.stehr@example.org', '464950338.jpg'),
(6193501181, 3938297255, 20, 'Hailey', 'Bartell', 'Pacocha', '2011-07-20', 'Female', 'Dr. Nettie Kiehn', 'Ryan Stokes', '+7748536235992', '+6788542510168', 'hrippin@example.org', 'klein.edwardo@example.org', '123456789.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_physician_messages`
--

DROP TABLE IF EXISTS `tbl_patient_physician_messages`;
CREATE TABLE IF NOT EXISTS `tbl_patient_physician_messages` (
  `Message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Medical_Record_No` bigint(6) NOT NULL,
  `Physician_ID` bigint(9) NOT NULL,
  `Message_Title` varchar(100) NOT NULL,
  `Message_Body` text NOT NULL,
  `Status` int(1) NOT NULL,
  `SentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RepliedDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Message_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient_physician_messages`
--

INSERT INTO `tbl_patient_physician_messages` (`Message_ID`, `Medical_Record_No`, `Physician_ID`, `Message_Title`, `Message_Body`, `Status`, `SentDate`, `RepliedDate`) VALUES
(1, 100100, 995682250, 'Severe Tummy Ache', 'Hi Doc, \r\nI\'ve been feeling some tummy ache since I woke up this morning. Is it possible to schedule an immediate checkup, cause I don\'t feel so good. Thanks', 0, '2019-05-20 15:04:45', NULL),
(2, 100100, 995682250, 'Patient-doctor communication', 'Patient-doctor communication is a complex interpersonal interaction that requires an understanding of each party׳s emotional state. We identified important but overlooked communication lapses such as non-verbal paralinguistic elements that should be incorporated into communications curriculum, with an emphasis on dialectical learning.', 0, '2019-08-12 23:00:00', '2019-05-23 11:08:48'),
(3, 100100, 995682250, 'Indigestion', 'Did you know that one of the top reasons children complain about chest pain is because they actually have heartburn? I think a lot of people believe that adults are the only ones who get it, but I have been seeing more and more children complain about heartburn, and there are some common reasons why. Heartburn often creates an uncomfortable burning feeling behind the breastbone. It has nothing to do with your heart, but everything to do with your stomach and esophagus.', 0, '2019-03-17 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_reason`
--

DROP TABLE IF EXISTS `tbl_patient_reason`;
CREATE TABLE IF NOT EXISTS `tbl_patient_reason` (
  `Patient_Reason_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Patient_Reason` char(255) NOT NULL,
  `Other_Reason` varchar(1024) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Patient_Reason_ID`),
  UNIQUE KEY `Patient_Reason_ID` (`Patient_Reason_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_physician_appointment`
--

DROP TABLE IF EXISTS `tbl_physician_appointment`;
CREATE TABLE IF NOT EXISTS `tbl_physician_appointment` (
  `Appintment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` bigint(20) UNSIGNED NOT NULL,
  `Physician_ID` bigint(9) UNSIGNED NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `DateCreated` timestamp NOT NULL,
  PRIMARY KEY (`Appintment_ID`),
  KEY `tbl_physician_appointment_id_index` (`id`),
  KEY `tbl_physician_appointment_physician_id_index` (`Physician_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_physician_appointment`
--

INSERT INTO `tbl_physician_appointment` (`Appintment_ID`, `id`, `Physician_ID`, `Appointment_Date`, `Appointment_Time`, `DateCreated`) VALUES
(1, 4, 995682250, '2019-05-05', '00:08:30', '2019-05-04 23:08:00'),
(2, 2, 995682250, '2019-05-05', '00:11:00', '2019-05-04 23:11:00'),
(3, 6, 995682250, '2019-04-02', '09:15:00', '2019-04-30 23:00:00'),
(4, 8, 995682250, '2019-05-10', '16:30:00', '2019-05-09 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_physician_information`
--

DROP TABLE IF EXISTS `tbl_physician_information`;
CREATE TABLE IF NOT EXISTS `tbl_physician_information` (
  `Physician_ID` bigint(9) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `First_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Middle_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile_No` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user_avatar.jpg',
  PRIMARY KEY (`Physician_ID`),
  UNIQUE KEY `tbl_physician_information_mobile_no_unique` (`Mobile_No`),
  KEY `tbl_physician_information_id_index` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_physician_information`
--

INSERT INTO `tbl_physician_information` (`Physician_ID`, `id`, `First_Name`, `Middle_Name`, `Last_Name`, `Mobile_No`, `Gender`, `Avatar`) VALUES
(995682250, 1, 'Margaret', 'Padberg', 'Maggio', '+8255802029733', 'Female', '325235235.jpg'),
(8759375905, 3, 'Phyllis', 'Crist', 'Okuneva', '+5888001741238', 'Female', NULL),
(5159142180, 5, 'Gust', 'Volkman', 'Rodriguez', '+8794253425131', 'Male', NULL),
(1266123909, 7, 'Steve', 'Weissnat', 'Durgan', '+3976410668379', 'Male', NULL),
(8490302731, 9, 'Andria', 'Monahan', 'Schaefer', '+4914111202673', 'Female', NULL),
(2244489743, 11, 'Litzy', 'Schmeler', 'Hammes', '+6997102798902', 'Female', NULL),
(8658668937, 13, 'Mohamed', 'Graham', 'Herzog', '+8664495371522', 'Male', NULL),
(5584777139, 15, 'Thelma', 'Conn', 'Schaden', '+4027107615369', 'Female', NULL),
(9435552631, 17, 'Xzavier', 'Wiza', 'Thiel', '+2567107830188', 'Male', NULL),
(3938297255, 19, 'Cydney', 'Bayer', 'Bauch', '+6493689808082', 'Female', NULL),
(1234567743, 26, 'John', 'O.', 'Mark', '09035547107', 'Male', 'user_avatar.jpg'),
(1234567890, 25, 'Anthony', 'O.', 'Joboy', '+123678349348', 'Male', '2036220974.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `DateCreated`, `DateUpdated`) VALUES
(1, 'dwight.friesen@example.com', '$2y$10$MW2IvsjfYhX20AFR3S0fBOXCQLvxzfOe9JTR9OiM6bkotPfWetWBm', 'Physician', '1982-10-02 14:17:31', NULL),
(2, 'lueilwitz.thad@example.net', '$2y$10$Xgist5oOaNsIBYThKq5IYeKbR0MTCWKtgU7lDTneYfNGTnZL.4m4O', 'Patient', '1982-12-19 11:23:43', NULL),
(3, 'johns.dock@example.net', '$2y$10$EuI1nUPTmfaihsJbV27mbOxXR8hfm.Nh2LzMzS2Rn.xDVLPEZGyYq', 'Physician', '1994-06-20 03:24:10', NULL),
(4, 'trinity10@example.com', '$2y$10$VJHPxiR4FWxwZ1i2CtVNlO7ZeZwLMvvmoy8lL3sIYb89o8gT6oKHm', 'Patient', '2015-01-15 14:41:33', NULL),
(5, 'xander.oconner@example.com', '$2y$10$m9INu2z0JzCV4rFgTeOUr.z5QT9pIkott/dMb6gsUC/MBINrbshBm', 'Physician', '1982-09-07 01:26:47', NULL),
(6, 'gbrekke@example.com', '$2y$10$ebWg2zC2xux8Wb.oyZovZOS.mGrmoVygp6aPofsmp7RKr7ePA6c6.', 'Patient', '1986-01-08 10:44:09', NULL),
(7, 'terry.aurore@example.net', '$2y$10$rUBH38huWr1O6AuMbEfiae8uK3LxGizdA/EasojTV2vCP2GmSVYx6', 'Physician', '2016-03-01 20:11:28', NULL),
(8, 'winnifred78@example.org', '$2y$10$Tqij9UoN.smqfyEhgjHazeXxj5ye24qqomOBp/uC9edYI.anLvs46', 'Patient', '2002-02-22 16:07:24', NULL),
(9, 'grady.pedro@example.org', '$2y$10$NTyH8OJhdGHu/HrXypizvOlJIl/AW0CEkZvP06KufDZcRTMfSCBGS', 'Physician', '1998-07-09 08:11:41', NULL),
(10, 'eli41@example.net', '$2y$10$Y36jBFo873VECkUSbxn19.FSQwXUW7ZIsUbbvsIARMwpy7dt2jR1y', 'Patient', '2012-01-19 17:46:56', NULL),
(11, 'margaretta.kilback@example.com', '$2y$10$I0V3nnTbmArUAsChqG7/kOlkFm4m0mblDfkvNEgXgF1ub1XLjBJW6', 'Physician', '2006-10-17 15:27:07', NULL),
(12, 'mcclure.reyes@example.com', '$2y$10$3.4QmGakfOtTnGp54vP/DuihWRGzz8DdaXn1uFGayly2iXGx/.Msm', 'Patient', '1980-11-27 00:40:27', NULL),
(13, 'sibyl66@example.net', '$2y$10$2JAd684o1/MGC9Ilu6NyOOwmd44fcz6kmPGV12EmBdN4lDwqy8CZu', 'Physician', '1990-06-16 21:58:10', NULL),
(14, 'justen54@example.com', '$2y$10$n.qgj0A9Y1LkMepPoNZKUONEB9FfgNaavzcJM8feGvGpV5mBX2MBu', 'Patient', '1985-08-25 15:00:22', NULL),
(15, 'brant24@example.net', '$2y$10$Yqf0nVxG9b0gpSe88xT1nuKNUChWtAq3lXf4Un.kic/RIPhljewhG', 'Physician', '2000-01-24 14:49:36', NULL),
(16, 'sklein@example.org', '$2y$10$7XjZUH57KXMEKvU4vRKKNu0De2yMYHyCvSj7YKnbWGonjngeTvwPu', 'Patient', '1995-10-05 13:52:22', NULL),
(17, 'wlarson@example.org', '$2y$10$Vpzsl/topVSrYlyZS55U.OI6U97inQzv0nh79MPLUz/CiNfvNaFgq', 'Physician', '2016-10-30 19:35:20', NULL),
(18, 'christiansen.adele@example.org', '$2y$10$oaGrFSxKrqEROHl53am4DuDP2mFuCkDLXGbhhoog7h3I2yTp7jEdq', 'Patient', '1991-06-17 08:54:12', NULL),
(19, 'smith.baby@example.org', '$2y$10$qD7RuYrhVXei7o4kxApYMugWkSJiDdZxF6G/okMCDcXPChQjsiXza', 'Physician', '2014-03-21 12:24:20', NULL),
(20, 'samir14@example.org', '$2y$10$dSbTyhDnI25U6CjOq/LQcuQjdFPD9rbOepb9/GJjHTF4laNs3y6Ja', 'Patient', '1994-05-09 04:43:34', NULL),
(25, 'anthonyjoboy2016@gmail.com', '$2y$10$pETgz5i9zL9Hk3FnRgrYJ.0rDDVZCxNjl0niOYkS4GI6i4Ew3thTO', 'Physician', '2019-05-10 18:17:20', NULL),
(26, 'jmark@hotmail.com', '$2y$10$iwf3zxHoqY3ZP0c2DzH6L.PxNdAOxNJ7L0NitSlYXaXoiEi33z9/m', 'Physician', '2019-05-10 18:20:11', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
