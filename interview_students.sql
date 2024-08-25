-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2024 at 05:22 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_students`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

DROP TABLE IF EXISTS `city_master`;
CREATE TABLE IF NOT EXISTS `city_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Surat'),
(3, 'Baroda'),
(4, 'Rajkot'),
(5, 'Mehsana'),
(6, 'Palanpur');

-- --------------------------------------------------------

--
-- Table structure for table `class_master`
--

DROP TABLE IF EXISTS `class_master`;
CREATE TABLE IF NOT EXISTS `class_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_master`
--

INSERT INTO `class_master` (`id`, `class_name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

-- --------------------------------------------------------

--
-- Table structure for table `marks_master`
--

DROP TABLE IF EXISTS `marks_master`;
CREATE TABLE IF NOT EXISTS `marks_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `marks` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_master`
--

INSERT INTO `marks_master` (`id`, `student_id`, `subject_id`, `marks`) VALUES
(1, 1, 1, 56),
(2, 1, 2, 55),
(3, 1, 3, 81),
(4, 1, 4, 40),
(5, 2, 1, 42),
(6, 2, 2, 2),
(7, 2, 3, 63),
(8, 2, 4, 30),
(9, 3, 1, 9),
(10, 3, 2, 46),
(11, 3, 3, 14),
(12, 3, 4, 68),
(13, 4, 1, 46),
(14, 4, 2, 55),
(15, 4, 3, 84),
(16, 4, 4, 33),
(17, 5, 1, 73),
(18, 5, 2, 6),
(19, 5, 3, 38),
(20, 5, 4, 85),
(21, 6, 1, 72),
(22, 6, 2, 70),
(23, 6, 3, 77),
(24, 6, 4, 24),
(25, 7, 1, 33),
(26, 7, 2, 5),
(27, 7, 3, 97),
(28, 7, 4, 0),
(29, 8, 1, 8),
(30, 8, 2, 24),
(31, 8, 3, 59),
(32, 8, 4, 57),
(33, 9, 1, 75),
(34, 9, 2, 82),
(35, 9, 3, 19),
(36, 9, 4, 13),
(37, 10, 1, 83),
(38, 10, 2, 87),
(39, 10, 3, 35),
(40, 10, 4, 57),
(41, 11, 1, 31),
(42, 11, 2, 82),
(43, 11, 3, 33),
(44, 11, 4, 44),
(45, 12, 1, 52),
(46, 12, 2, 71),
(47, 12, 3, 59),
(48, 12, 4, 46),
(49, 13, 1, 49),
(50, 13, 2, 18),
(51, 13, 3, 50),
(52, 13, 4, 2),
(53, 14, 1, 63),
(54, 14, 2, 31),
(55, 14, 3, 60),
(56, 14, 4, 100),
(57, 15, 1, 57),
(58, 15, 2, 11),
(59, 15, 3, 86),
(60, 15, 4, 33),
(61, 16, 1, 42),
(62, 16, 2, 40),
(63, 16, 3, 8),
(64, 16, 4, 22);

-- --------------------------------------------------------

--
-- Table structure for table `section_master`
--

DROP TABLE IF EXISTS `section_master`;
CREATE TABLE IF NOT EXISTS `section_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_master`
--

INSERT INTO `section_master` (`id`, `section_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

DROP TABLE IF EXISTS `student_master`;
CREATE TABLE IF NOT EXISTS `student_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class_id` int NOT NULL,
  `section_id` int NOT NULL,
  `city_id` int NOT NULL,
  `address` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `student_name`, `class_id`, `section_id`, `city_id`, `address`) VALUES
(1, 'Ramesh', 1, 1, 5, NULL),
(2, 'Kamlesh', 1, 1, 3, NULL),
(3, 'Haresh', 1, 2, 1, NULL),
(4, 'Soniya', 1, 3, 4, NULL),
(5, 'Priti', 2, 1, 1, NULL),
(6, 'Shayam', 2, 2, 3, NULL),
(7, 'Kishan', 3, 1, 1, NULL),
(8, 'Mariyam', 3, 3, 4, NULL),
(9, 'Piyush', 1, 2, 3, NULL),
(10, 'Soheb', 2, 3, 3, NULL),
(11, 'Razia', 2, 4, 1, NULL),
(12, 'Kelly', 2, 1, 3, NULL),
(13, 'Joseph', 4, 4, 1, NULL),
(14, 'Jasmin', 4, 2, 3, NULL),
(15, 'Rahul', 4, 1, 1, NULL),
(16, 'Farhin', 4, 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

DROP TABLE IF EXISTS `subject_master`;
CREATE TABLE IF NOT EXISTS `subject_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`id`, `subject_name`) VALUES
(1, 'English'),
(2, 'Maths'),
(3, 'Science'),
(4, 'Hindi'),
(5, 'Biology');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
