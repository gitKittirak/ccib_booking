-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Mar 15, 2023 at 04:14 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int NOT NULL,
  `topic` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `meetingroom` varchar(10) NOT NULL,
  `daybooking` date NOT NULL,
  `timebooking` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_division` varchar(255) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `topic`, `details`, `meetingroom`, `daybooking`, `timebooking`, `user_firstname`, `user_division`, `user_id`, `create_at`) VALUES
(96, 'testtest1', 'testtest1', 'ชั้น19', '2023-03-14', 'ช่วงเช้า', 'กิตติรักษ์', 'เทคโน', '42', '2023-03-09 20:04:04'),
(99, 'testuser1', 'testuser1', 'ชั้น19', '2023-03-15', 'ช่วงเช้า', 'เทสแก้ไขชื่อ1', 'เทสแก้ไขหน่วย', '43', '2023-03-09 20:05:25'),
(101, 'testtable2', 'testtable2', 'ชั้น19', '2023-03-12', 'ช่วงเช้า', 'กิตติรักษ์', 'เทคโน', '42', '2023-03-10 19:01:07'),
(102, 'testtable3', 'testtable3', 'ชั้น19', '2023-03-17', 'ช่วงเช้า', 'กิตติรักษ์', 'เทคโน', '42', '2023-03-10 19:01:34'),
(103, 'testbooking', 'testbooking', 'ชั้น19', '2023-03-10', 'ช่วงเช้า', 'testregister', 'testregister', '45', '2023-03-10 20:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `meetingroom`
--

CREATE TABLE `meetingroom` (
  `id` int NOT NULL,
  `num_room` int NOT NULL,
  `floor` int NOT NULL,
  `building` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `meetingroom`
--

INSERT INTO `meetingroom` (`id`, `num_room`, `floor`, `building`) VALUES
(1, 101, 1, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(3, 201, 2, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(4, 301, 3, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(5, 401, 4, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(6, 501, 5, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(7, 601, 6, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(8, 701, 7, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(9, 801, 8, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(10, 901, 9, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(11, 1001, 10, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(12, 1101, 11, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(13, 1201, 12, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(14, 1301, 13, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(15, 1401, 14, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(16, 1501, 15, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(17, 1601, 16, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(18, 1701, 17, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(19, 1801, 18, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(20, 1901, 19, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)'),
(21, 2001, 20, 'กองบัญชาการตำรวจสืบสวนสอบสวนอาชญากรรมทางเทคโนโลยี (บช.สอท.)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `division` varchar(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `division`, `email`, `line_id`, `password`, `urole`, `created_at`) VALUES
(42, 'กิตติรักษ์', 'วิชชุประสิทธิกร', 'เทคโน', 'kittirakping@gmail.com', 'kittirak', '$2y$10$eUzCW7qOocfrjznB/dy.jOCk42I83WCfOYz6Hb8FhTpyfzNHl9eEq', 'user', '2023-03-03 10:49:55'),
(43, 'เทสแก้ไขชื่อ1', 'เทสแก้ไขนามสกุล1', 'เทสแก้ไขหน่วย', 'test@test.com', 'เทสแก้ไขไอดีไลน์', '$2y$10$XXgidI1x0XhajuvKODy5xu/h8mAq0SbroauI9zT1zhns7BiqfWHM2', 'user', '2023-03-03 10:51:07'),
(44, 'admin', 'admin', 'admin', 'admin@admin.com', 'admin', '$2y$10$Evug21SwsN5hpzccYLFLUuvGi54EBeMqAgoUV61gXDsmZD.tAGf9a', 'admin', '2023-03-03 10:51:32'),
(45, 'testregister', 'testregister', 'testregister', 'test1@gmail.com', 'testregister', '$2y$10$T0cEQdXbqzw.seCuxLpcTOaBAydTeXAIAFoBysKRF3uEqSb9ZfGoa', 'user', '2023-03-10 20:32:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `meetingroom`
--
ALTER TABLE `meetingroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `meetingroom`
--
ALTER TABLE `meetingroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
