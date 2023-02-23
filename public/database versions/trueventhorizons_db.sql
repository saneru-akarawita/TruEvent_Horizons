-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 05:44 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trueventhorizons_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpackagedetails`
--

CREATE TABLE `adminpackagedetails` (
  `package_id` int NOT NULL,
  `package_code` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `package_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` text COLLATE utf8mb4_general_ci NOT NULL,
  `band_choice` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `band_sv_id` int NOT NULL DEFAULT '0',
  `deco_choice` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deco_sv_id` int NOT NULL DEFAULT '0',
  `photo_choice` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo_sv_id` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sp_id_string` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminpackagedetails`
--

INSERT INTO `adminpackagedetails` (`package_id`, `package_code`, `package_type`, `package_name`, `price`, `band_choice`, `band_sv_id`, `deco_choice`, `deco_sv_id`, `photo_choice`, `photo_sv_id`, `active`, `sp_id_string`) VALUES
(1, 'P001', 'Birthday', '25th Birthday Package', '50000', 'Wayo Band - Business Gatherings', 2, 'Urban 57 Decorations - Get-Togethers', 4, 'Red Ants Photography - Night Functions', 2, 1, '5,2,6'),
(2, 'P002', 'Anniversary', '10th Anniversary Package', '100000', '', 0, 'Urban 57 Decorations - Anniversary Parties', 1, '', 0, 1, '2'),
(3, 'P003', 'Coparate Event', 'Farewell Party Package', '95000', '', 0, 'Urban 57 Decorations - Night Functions', 3, 'Red Ants Photography - Birthday Parties', 1, 1, '2,6'),
(4, 'P004', 'Coparate Event', '25th Service Celebration Package', '85000', '', 0, 'Urban 57 Decorations - Anniversary Parties', 1, '', 0, 1, '2'),
(5, 'P007', 'Birthday', 'Saneru\'s Package', '340000', 'Wayo Band - Welcome Parties', 1, '', 0, 'Red Ants Photography - Business Gatherings', 3, 1, '5,6'),
(6, 'test package', 'Birthday', 'test test', '12345', 'Wayo Band - Business Gatherings', 2, 'Urban 57 Decorations - Welcome Parties', 2, 'Red Ants Photography - Birthday Parties', 1, 1, '5,2,6'),
(7, 'P334', 'Coparate Event', 'athal ekata', '12399', '', 0, 'Urban 57 Decorations - Night Functions', 3, 'Red Ants Photography - Birthday Parties', 1, 1, '2,6'),
(8, 'P008', 'Coparate Event', 'Pamudi\'s Farewell', '45000', '', 0, 'Urban 57 Decorations - Welcome Parties', 2, 'Red Ants Photography - Night Functions', 2, 1, '2,6'),
(9, 'P010', 'Birthday', 'Null Value Package', '40000', 'Wayo Band - Welcome Parties', 1, 'Urban 57 Decorations - Night Functions', 3, '', 0, 1, '5,2');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `admin_id` int NOT NULL,
  `fname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`admin_id`, `fname`, `lname`, `email`, `acc_name`, `acc_no`, `bank`, `branch`, `join_date`) VALUES
(2, 'Saneru', 'Akarawita', 'saneru.akarawita@gmail.com', 'S. U. Akarawita', '12345678', 'Sampath Bank', 'Homagama', '2022-12-16 15:42:35'),
(3, 'Chamila', 'Amarathunga', 'chamila.amarathunga@gmail.com', 'Chamila Sriyani', '12345555', 'Seylan Bank', 'Kottawa', '2023-01-29 22:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `bandservicedetails`
--

CREATE TABLE `bandservicedetails` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `band_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `other_band_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_of_players` int NOT NULL,
  `price` text COLLATE utf8mb4_general_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bandservicedetails`
--

INSERT INTO `bandservicedetails` (`service_id`, `service_name`, `band_type`, `other_band_type`, `no_of_players`, `price`, `service_provider_id`, `active`) VALUES
(1, 'Welcome Parties', 'Pop, Classic, ', '', 3, '15000', 5, 1),
(2, 'Business Gatherings', 'Classic, EDM, ', 'Kareoke', 4, '20000', 5, 1),
(3, 'General Events', 'Pop, Classic, Hip-Hop, Rap, ', '', 5, '30000', 5, 1),
(4, 'Get-Togethers', 'Pop, Classic, ', '', 2, '10000', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_dates`
--

CREATE TABLE `calendar_dates` (
  `id` int NOT NULL,
  `sp_user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `rv_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_dates`
--

INSERT INTO `calendar_dates` (`id`, `sp_user_id`, `title`, `start`, `end`, `rv_id`) VALUES
(1, 1, 'After Interim 3.0 Party', '2023-02-02', '2023-02-02', 1),
(2, 2, 'kaveesha\'s Farewell Party', '2023-01-23', '2023-01-23', 6),
(3, 1, 'Kaveesha\'s Birthday', '2022-12-30', '2022-12-30', 5),
(4, 4, 'test 2', '2023-02-03', '2023-02-03', 12),
(5, 1, 'temp 4', '2023-02-17', '2023-02-17', 15),
(6, 2, 'temp 5', '2023-02-07', '2023-02-07', 16),
(7, 5, 'test band', '2023-03-02', '2023-03-02', 24),
(8, 6, 'photo test', '2023-02-22', '2023-02-22', 25),
(35, 2, 'kaveesha\'s Farewell Party', '2023-01-24', '2023-01-24', 2),
(39, 5, 'confirm Decline Test 2', '2023-02-24', '2023-02-24', 30),
(40, 6, 'confirm Decline Test 2', '2023-02-24', '2023-02-24', 30);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1460619877, 816865346, 'Hi Kaveesha'),
(2, 816865346, 1460619877, 'Hi Chamila How are you?'),
(3, 816865346, 816865346, 'hi'),
(4, 816865346, 816865346, 'g'),
(5, 1460619877, 816865346, 'test'),
(6, 1460619877, 816865346, 'i am dinushan'),
(7, 1215415318, 816865346, 'set na'),
(8, 1460619877, 816865346, 'hi'),
(9, 1460619877, 816865346, 'hello'),
(10, 1460619877, 1460619877, 'hi'),
(11, 1215415318, 816865346, 'hi there'),
(12, 816865346, 1215415318, 'shape'),
(14, 1460619877, 816865346, 'hey kaveesha '),
(15, 816865346, 1460619877, 'hello chamila'),
(16, 1460619877, 816865346, 'mokada wenne?'),
(17, 816865346, 1460619877, 'chirasi awa'),
(18, 816865346, 1460619877, 'aa'),
(19, 816865346, 1460619877, 'bb'),
(20, 816865346, 1460619877, 'cc'),
(21, 816865346, 1460619877, 'dd'),
(22, 816865346, 1460619877, 'ee'),
(23, 1460619877, 1215415318, 'hi kaveesha'),
(24, 1215415318, 1460619877, 'hey'),
(25, 1460619877, 1215415318, 'boss'),
(26, 1215415318, 1460619877, 'moko wenne'),
(27, 1460619877, 816865346, 'hey kaveesha'),
(28, 816865346, 1460619877, 'hi chamila'),
(29, 1460619877, 1215415318, 'hello'),
(30, 816865346, 277022096, 'hiiii'),
(31, 816865346, 749645829, 'hello'),
(32, 749645829, 960514050, 'hello'),
(33, 1215415318, 370802146, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `user_id` int NOT NULL,
  `unique_id` int NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `img`, `status`) VALUES
(1, 816865346, 'Chamila', 'Amarathunga', 'chamila.amarathunga@gmail.com', NULL, 'Active now'),
(2, 1460619877, 'Kaveesha', 'Muthukuda', '2020cs007@stu.ucsc.cmb.ac.lk', NULL, 'Offline now'),
(3, 1215415318, 'Saneru', 'Akarawita', 'saneru.akarawita@gmail.com', NULL, 'Offline now'),
(4, 277022096, 'Wayo Band', '', 'band321@gmail.com', NULL, 'Offline now'),
(5, 960514050, 'Red Ants Photography', '', 'photo321@gmail.com', NULL, 'Offline now'),
(6, 749645829, 'Urban 57 Decorations', '', 'harinij@gmail.com', NULL, 'Offline now'),
(7, 370802146, 'SHANGRI - LA', '', 'tempemail@gmail.com', NULL, 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `customerrvdetails`
--

CREATE TABLE `customerrvdetails` (
  `rv_id` int NOT NULL,
  `eventName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rvDate` date NOT NULL,
  `rvTime` time NOT NULL,
  `rvType` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `spType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_id` int DEFAULT '0',
  `packageType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `packageName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `payment` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `customer_id` int NOT NULL,
  `sp_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerrvdetails`
--

INSERT INTO `customerrvdetails` (`rv_id`, `eventName`, `rvDate`, `rvTime`, `rvType`, `spType`, `spName`, `service_id`, `packageType`, `packageName`, `status`, `payment`, `price`, `customer_id`, `sp_id`) VALUES
(1, 'After Interim 3.0 Party', '2023-02-02', '20:00:00', 'service', 'Hotel', 'SHANGRI - LA - Shang Palace', 1, NULL, NULL, 'confirm', 'not-paid', '4500.00', 1, '1'),
(2, 'kaveesha\'s Farewell Party', '2023-01-24', '20:00:00', 'package', NULL, NULL, 0, 'Coparate Event', 'Farewell Party Package', 'pending', 'not-paid', '0', 1, '2,3'),
(5, 'Kaveesha\'s Birthday', '2022-12-30', '17:00:00', 'service', 'Hotel', 'SHANGRI - LA - Central Ocean View', 3, NULL, NULL, 'confirm', 'not-paid', '5000.00', 1, '1'),
(6, 'kaveesha\'s Farewell Party', '2023-01-23', '19:00:00', 'service', 'Decoration', 'Urban 57 Decorations - Birthday Parties', 5, NULL, NULL, 'confirm', 'not-paid', '35000', 1, '2'),
(12, 'test 2', '2023-02-03', '15:37:00', 'service', 'Hotel', 'Cinnamon Grand Colombo - Tea Lounge', 6, NULL, NULL, 'pending', 'not-paid', '4500.00', 1, '4'),
(13, 'test3', '2023-03-02', '14:49:00', 'service', 'Decoration', 'Urban 57 Decorations - Welcome Parties', 2, NULL, NULL, 'decline', 'not-paid', '40000', 1, '2'),
(14, 'temp 3', '2023-02-23', '15:39:00', 'service', 'Hotel', 'Cinnamon Grand Colombo - Tea Lounge', 6, NULL, NULL, 'decline', 'not-paid', '4500.00', 1, '4'),
(15, 'temp 4', '2023-02-17', '17:09:00', 'service', 'Hotel', 'SHANGRI - LA - Royal Hall', 7, NULL, NULL, 'decline', 'not-paid', '5000', 1, '1'),
(16, 'temp 5', '2023-02-07', '17:09:00', 'service', 'Decoration', 'Urban 57 Decorations - Get-Togethers', 4, NULL, NULL, 'pending', 'not-paid', '35000', 1, '2'),
(17, 'Temp Package 2', '2023-02-17', '17:09:00', 'package', NULL, NULL, 0, 'Coperate Event', 'abc 1', 'pending', 'not-paid', '124394', 1, '2,3'),
(18, 'temp package 2', '2023-02-09', '17:09:00', 'package', NULL, NULL, 0, 'coperate package', 'test 32', 'decline', 'not-paid', '324500', 1, '2,3,4'),
(19, 'temp package 3', '2023-02-15', '15:44:08', 'package', NULL, NULL, 0, 'Birthday Package', 'athal package 2', 'pending', 'not-paid', '123000', 1, '3,4'),
(20, 'aaaaaaaaaaaaa', '2023-02-24', '17:55:00', 'service', 'Hotel', 'SHANGRI - LA - Central Ocean View', 3, NULL, NULL, 'decline', 'not-paid', '5000.00', 1, '1'),
(21, 'bbbbbbbbbbb', '2023-03-03', '17:56:00', 'service', 'Hotel', 'Cinnamon Grand Colombo - Tea Lounge', 6, NULL, NULL, 'pending', 'not-paid', '4500.00', 1, '4'),
(22, 'ccccccccccccccc', '2023-02-10', '05:56:00', 'service', 'Decoration', 'Urban 57 Decorations - Anniversary Parties', 1, NULL, NULL, 'decline', 'not-paid', '50000', 1, '2'),
(23, 'test 345', '2023-02-10', '07:53:00', 'service', 'Decoration', 'Urban 57 Decorations - Night Functions', 3, NULL, NULL, 'pending', 'not-paid', '60000', 1, '2'),
(24, 'test band', '2023-03-02', '11:09:00', 'service', 'Band', 'Wayo Band - Business Gatherings', 2, NULL, NULL, 'pending', 'not-paid', '20000', 1, '5'),
(25, 'photo test', '2023-02-22', '11:10:00', 'service', 'Photography', 'Red Ants Photography - Night Functions', 2, NULL, NULL, 'pending', 'not-paid', '25000', 1, '6'),
(26, 'test package 999', '2023-02-16', '13:37:00', 'package', NULL, NULL, 2, 'Anniversary', '10th Anniversary Package', 'pending', 'not-paid', '100000', 1, '2'),
(27, 'check Package Confirmation', '2023-02-25', '01:39:00', 'package', NULL, NULL, 5, '', '', 'decline', 'not-paid', '340000', 1, '5,6'),
(28, 'Checking on Package Confirmation', '2023-02-24', '10:30:00', 'package', NULL, NULL, 5, '', '', 'decline', 'not-paid', '340000', 1, '5,6'),
(29, 'confirm Decline Test', '2023-02-24', '17:22:00', 'package', NULL, NULL, 6, '', '', 'decline', 'not-paid', '12345', 1, '5,2,6'),
(30, 'confirm Decline Test 2', '2023-02-24', '17:42:00', 'package', NULL, NULL, 5, '', '', 'confirm', 'not-paid', '340000', 1, '5,6'),
(31, 'service name check', '2023-02-24', '17:44:00', 'service', '', '', 2, NULL, NULL, 'pending', 'not-paid', '40000', 1, '2'),
(32, 'test check name', '2023-02-25', '18:18:00', 'service', 'Band', 'Wayo Band - Business Gatherings', 2, NULL, NULL, 'pending', 'not-paid', '20000', 1, '5'),
(33, 'read only package test', '2023-02-25', '18:26:00', 'package', NULL, NULL, 2, 'Anniversary', '10th Anniversary Package', 'decline', 'not-paid', '100000', 1, '2');

--
-- Triggers `customerrvdetails`
--
DELIMITER $$
CREATE TRIGGER `insert_reservation_to_package_confirmation_trigger` AFTER INSERT ON `customerrvdetails` FOR EACH ROW BEGIN
	IF NEW.rvType = "package" THEN
    -- Insert values into package_confirmation table
    INSERT INTO `package_confirmation` (`rv_id`, `event_name`, `no_of_services`)
    VALUES (NEW.`rv_id`, NEW.`eventName`, (SELECT LENGTH(NEW.`sp_id`) - LENGTH(REPLACE(NEW.`sp_id`, ',', '')) + 1));
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customeruser`
--

CREATE TABLE `customeruser` (
  `customer_id` int NOT NULL,
  `fname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customeruser`
--

INSERT INTO `customeruser` (`customer_id`, `fname`, `lname`, `email`, `contact_no`, `district`, `join_date`) VALUES
(1, 'Kaveesha', 'Muthukuda', '2020cs007@stu.ucsc.cmb.ac.lk', '0762714972', 'Colombo', '2022-12-16 10:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `decoservicedetails`
--

CREATE TABLE `decoservicedetails` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `decoration_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` text COLLATE utf8mb4_general_ci NOT NULL,
  `other_decoration` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoservicedetails`
--

INSERT INTO `decoservicedetails` (`service_id`, `service_name`, `decoration_item`, `theme`, `price`, `other_decoration`, `service_provider_id`, `active`) VALUES
(1, 'Anniversary Parties', 'Fresh flowers, Artificial flowers, Balloons, Candles, Lights, Banners, ', 'Masquerade Ball Theme', '50000', '', 2, 1),
(2, 'Welcome Parties', 'Fresh flowers, Artificial flowers, Balloons, Banners, Table cloths, ', 'Wild West Theme', '40000', '', 2, 1),
(3, 'Night Functions', 'Fresh flowers, Candles, Lights, Table cloths, Chair covers, ', 'Fire and Ice Theme', '60000', '', 2, 1),
(4, 'Get-Togethers', 'Fresh flowers, Artificial flowers, Balloons, Banners, Table cloths, ', 'Heaven Theme', '35000', 'Green Plants', 2, 1),
(5, 'Birthday Parties', 'Fresh flowers, Balloons, Candles, Lights, Table cloths, ', 'disneyland - Pink', '35000', 'Cake Decorations', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int NOT NULL,
  `sp_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sp_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int NOT NULL,
  `eob` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `aos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `qos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cs` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `complaint` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `sp_type`, `sp_name`, `event_name`, `customer_name`, `contact_no`, `eob`, `aos`, `vom`, `qos`, `cs`, `complaint`) VALUES
(1, 'Hotel', 'Shangri - La', 'After Interim 3.0 Party', 'Kaveesha Muthukuda', 762714972, 'Fair', 'Good', 'Excellent', 'Poor', 'Good', 'Test Complaint'),
(2, 'Photography', 'Red Ants Photography', 'kaveesha\'s Farewell Party', 'Kaveesha Muthukuda', 762714972, 'Good', 'Good', 'Good', 'Fair', 'Good', ''),
(3, 'Decoration', 'Urban 57 Decorations', 'Kaveesha\'s Birthday', 'Kaveesha Muthukuda', 762714972, 'Excellent', 'Excellent', 'Excellent', 'Good', 'Good', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotelservicedetails`
--

CREATE TABLE `hotelservicedetails` (
  `service_id` int NOT NULL,
  `service_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hall_image` longblob NOT NULL,
  `hall_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `hall_type` text COLLATE utf8mb4_general_ci NOT NULL,
  `max_crowd` int NOT NULL,
  `ac_status` int NOT NULL,
  `price` text COLLATE utf8mb4_general_ci NOT NULL,
  `other_facilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelservicedetails`
--

INSERT INTO `hotelservicedetails` (`service_id`, `service_type`, `hall_image`, `hall_name`, `location`, `hall_type`, `max_crowd`, `ac_status`, `price`, `other_facilities`, `service_provider_id`, `active`) VALUES
(1, 'Night Functions', 0x322e6a7067, 'Shang Palace', '3rd Floor', 'indoor', 200, 1, '4500.00', '', 1, 1),
(2, 'Business Gatherings', 0x332e6a7067, 'Sapphyr Lounge', '1st floor', 'indoor', 100, 1, '3500.00', 'Audio Facilities', 1, 1),
(3, 'Birthday Parties', 0x322e6a7067, 'Central Ocean View', 'West Wing', 'indoor', 150, 1, '5000.00', '', 1, 0),
(4, 'Get-Togethers', 0x332e6a7067, 'Sky View', 'RoofTop', 'outdoor', 200, 0, '3500.00', 'AC provided if needed', 1, 1),
(5, 'General Events', 0x322e6a7067, 'Harbour Court', 'East Wing', 'indoor', 350, 1, '4500.00', '', 3, 1),
(6, 'Welcome Parties', 0x332e6a7067, 'Tea Lounge', 'Ground Floor', 'indoor', 200, 0, '4500.00', '', 4, 1),
(7, 'Anniversary Parties', 0x332e6a7067, 'Royal Hall', '1st floor', 'indoor', 100, 1, '5000', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `OTP` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_confirmation`
--

CREATE TABLE `package_confirmation` (
  `id` int NOT NULL,
  `rv_id` int NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_of_services` int NOT NULL,
  `no_of_confirmed_services` int NOT NULL DEFAULT '0',
  `no_of_declined_services` int NOT NULL DEFAULT '0',
  `deco_confirmation` int NOT NULL DEFAULT '0',
  `band_confirmation` int NOT NULL DEFAULT '0',
  `photo_confirmation` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_confirmation`
--

INSERT INTO `package_confirmation` (`id`, `rv_id`, `event_name`, `no_of_services`, `no_of_confirmed_services`, `no_of_declined_services`, `deco_confirmation`, `band_confirmation`, `photo_confirmation`) VALUES
(1, 2, 'Kaveesha\'s Farewell Party', 2, 1, 0, 2, 0, 0),
(2, 17, 'Temp Package 2', 2, 0, 0, 0, 0, 0),
(5, 29, 'confirm Decline Test', 3, 1, 1, 0, 5, 0),
(6, 30, 'confirm Decline Test 2', 2, 2, 0, 0, 5, 6);

--
-- Triggers `package_confirmation`
--
DELIMITER $$
CREATE TRIGGER `confirm_status_trigger` AFTER UPDATE ON `package_confirmation` FOR EACH ROW BEGIN
  IF NEW.no_of_services = NEW.no_of_confirmed_services THEN
    UPDATE customerrvdetails SET status = 'confirm' WHERE rv_id = NEW.rv_id;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `decline_status_trigger` AFTER UPDATE ON `package_confirmation` FOR EACH ROW BEGIN
  IF NEW.no_of_declined_services <> 0 THEN
    UPDATE customerrvdetails SET status = 'decline' WHERE rv_id = NEW.rv_id;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `rv_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `ad_price` text COLLATE utf8mb4_general_ci NOT NULL,
  `full_price` text COLLATE utf8mb4_general_ci NOT NULL,
  `ad_flag` int NOT NULL DEFAULT '0',
  `fp_flag` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `rv_id`, `customer_id`, `ad_price`, `full_price`, `ad_flag`, `fp_flag`) VALUES
(1, 5, 1, '1250', '5000.00', 0, 0),
(2, 20, 1, '1250', '5000.00', 0, 0),
(8, 6, 1, '8750', '35000', 0, 0),
(10, 30, 1, '85000', '340000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photographyservicedetails`
--

CREATE TABLE `photographyservicedetails` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo_features` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `other_features` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` text COLLATE utf8mb4_general_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photographyservicedetails`
--

INSERT INTO `photographyservicedetails` (`service_id`, `service_name`, `photo_features`, `other_features`, `price`, `service_provider_id`, `active`) VALUES
(1, 'Birthday Parties', 'Full-day photo shoots, Professional lighting setup, Professional camera and lens kits, Photo editing, color correction and retouching, Multi-shooter, ', 'Transport cost', '35000', 6, 1),
(2, 'Night Functions', 'Professional lighting setup, Professional camera and lens kits, Single-shooter, ', '', '25000', 6, 1),
(3, 'Business Gatherings', 'Full-day photo shoots, Professional camera and lens kits, ', '', '30000', 6, 1),
(4, 'Anniversary Parties', 'Half-day photo shoots, Professional camera and lens kits, Single-shooter, ', '', '12000', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovideruser`
--

CREATE TABLE `serviceprovideruser` (
  `service_provider_id` int NOT NULL,
  `business_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sp_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `account_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `travel_flag` int NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serviceprovideruser`
--

INSERT INTO `serviceprovideruser` (`service_provider_id`, `business_id`, `company_name`, `email`, `contact_no`, `district`, `sp_category`, `account_no`, `account_name`, `bank`, `branch`, `travel_flag`, `join_date`) VALUES
(1, 'H001', 'SHANGRI - LA', 'tempemail@gmail.com', '0711351868', 'Colombo', '4', '87654321', 'SHANGRI - LA Colombo', 'Sampath Bank', 'Pettah', 0, '2022-12-16 10:10:00'),
(2, 'D001', 'Urban 57 Decorations', 'harinij@gmail.com', '0776568595', 'Colombo', '5', '13572468', 'Urban Decorations', 'Bank of Ceylon', 'Thummulla', 1, '2022-12-16 10:20:40'),
(3, 'H002', 'Kingsbury Hotel', 'harij2822@gmail.com', '0775544632', 'Colombo', '4', '11112222', 'Kingsbury Colombo', 'Seylan Bank', 'Colombo 02', 0, '2022-12-16 10:35:05'),
(4, 'H003', 'Cinnamon Grand Colombo', 'cinnamon@gmail.com', '0778899763', 'Colombo', '4', '12343211', 'Cinnamon Colombo', 'Commercial Bank', 'Colombo 07', 0, '2022-12-16 10:40:05'),
(5, 'BND1234', 'Wayo Band', 'band321@gmail.com', '0773739428', 'Colombo', '6', '12345678', 'A. B. Divillers', 'Commercial Bank', 'Kotte', 1, '2023-01-31 08:06:59'),
(6, 'PH1122', 'Red Ants Photography', 'photo321@gmail.com', '0776655453', 'Kaluthara', '7', '12345678', 'Sachin Karunarathne', 'Peoples Bank', 'Maharagama', 0, '2023-01-31 08:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `superadminuser`
--

CREATE TABLE `superadminuser` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadminuser`
--

INSERT INTO `superadminuser` (`email`, `password`) VALUES
('superadmin@gmail.com', 'temp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fail_attempts` int NOT NULL,
  `user_type` int NOT NULL,
  `vstatus` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `fail_attempts`, `user_type`, `vstatus`) VALUES
('2020cs007@stu.ucsc.cmb.ac.lk', '$2y$10$z9DNvu4fdZz8Ett74eiRbu9yUeO.CGOuHM1sn6Vu87C5uQOzv2xIS', 0, 3, 'verified'),
('band321@gmail.com', '$2y$10$kpXZ9CHBqLxoykINVzaJfeuzsTeFGht2xkcRJ6GJp/BXg7ACOBgNa', 0, 6, 'verified'),
('chamila.amarathunga@gmail.com', '$2y$10$g2CrtSkkgJWOqDpPiBdk9OSXrx5J6Q2CAm7PM3tPkiB2Izjj07v2C', 0, 2, 'verified'),
('cinnamon@gmail.com', '$2y$10$CLDMcd1FvoizRrrbsBXz6OZ7ZStyllTHh71ZCIUCDTzPgxBFMsMeu', 0, 4, 'verified'),
('harij2822@gmail.com', '$2y$10$0ZAWtmj9L7hqUSr3jTgVju06bTZXhsmCd3GPmeMSL3ge2UUvE6ZWi', 0, 4, 'verified'),
('harinij@gmail.com', '$2y$10$2T.gBtF5ONrqoPIJJnfJ3eesYKTGcIVvt1LtB5LNt2wkjb/..VJWy', 0, 5, 'verified'),
('photo321@gmail.com', '$2y$10$S8ONl1Fz1O1hyZbEHfUC5u6/ABq13KwrnH/n7DLOwOGA4IRsv38QS', 0, 7, 'verified'),
('saneru.akarawita@gmail.com', '$2y$10$In7W65X.Ezlm9W8drQIq/einjqmplamp9gvaUrgJLGOZoiXGOmKqG', 0, 2, 'verified'),
('superadmin@gmail.com', '$2y$10$VUovZrgw7hNkVBAZ0UyjL.tvyrJy29XIHsqjhLfYeAYpe.4DVSkwa', 0, 1, 'verified'),
('tempemail@gmail.com', '$2y$10$m2uH9.mKdzPzsWMsq2QWfenG83hKKDCXCmJKi0Wqcj0UXvRDH2bSS', 0, 4, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpackagedetails`
--
ALTER TABLE `adminpackagedetails`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `package_code` (`package_code`),
  ADD UNIQUE KEY `package_type` (`package_type`,`package_name`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`admin_id`,`email`),
  ADD KEY `FK on email users-adminuser` (`email`);

--
-- Indexes for table `bandservicedetails`
--
ALTER TABLE `bandservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`,`service_provider_id`),
  ADD KEY `banddeet to service provider user FK on service provider id` (`service_provider_id`);

--
-- Indexes for table `calendar_dates`
--
ALTER TABLE `calendar_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_on_calendar_dates` (`rv_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  ADD PRIMARY KEY (`rv_id`),
  ADD KEY `customer_id FK` (`customer_id`);

--
-- Indexes for table `customeruser`
--
ALTER TABLE `customeruser`
  ADD PRIMARY KEY (`customer_id`,`email`),
  ADD KEY `FK on email users-customeruser` (`email`);

--
-- Indexes for table `decoservicedetails`
--
ALTER TABLE `decoservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name and service provider unique key` (`service_name`,`service_provider_id`),
  ADD KEY `decodeet to service provider user FK on service provider id` (`service_provider_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_type` (`service_type`,`hall_name`,`service_provider_id`),
  ADD KEY `hotel service deet to service provider user FK on SP ID` (`service_provider_id`);

--
-- Indexes for table `otpverification`
--
ALTER TABLE `otpverification`
  ADD PRIMARY KEY (`email`,`type`);

--
-- Indexes for table `package_confirmation`
--
ALTER TABLE `package_confirmation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_on_rv_package_confirmation` (`rv_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_on_payments` (`rv_id`);

--
-- Indexes for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`,`service_provider_id`),
  ADD KEY `photodeet to service provider user FK on service provider id` (`service_provider_id`);

--
-- Indexes for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  ADD PRIMARY KEY (`service_provider_id`,`business_id`,`email`),
  ADD KEY `FK on email users-spuser` (`email`);

--
-- Indexes for table `superadminuser`
--
ALTER TABLE `superadminuser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpackagedetails`
--
ALTER TABLE `adminpackagedetails`
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bandservicedetails`
--
ALTER TABLE `bandservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar_dates`
--
ALTER TABLE `calendar_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `msg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  MODIFY `rv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customeruser`
--
ALTER TABLE `customeruser`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `decoservicedetails`
--
ALTER TABLE `decoservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_confirmation`
--
ALTER TABLE `package_confirmation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  MODIFY `service_provider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD CONSTRAINT `FK on email users-adminuser` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bandservicedetails`
--
ALTER TABLE `bandservicedetails`
  ADD CONSTRAINT `banddeet to service provider user FK on service provider id` FOREIGN KEY (`service_provider_id`) REFERENCES `serviceprovideruser` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calendar_dates`
--
ALTER TABLE `calendar_dates`
  ADD CONSTRAINT `FK_on_calendar_dates` FOREIGN KEY (`rv_id`) REFERENCES `customerrvdetails` (`rv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  ADD CONSTRAINT `customer_id FK` FOREIGN KEY (`customer_id`) REFERENCES `customeruser` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customeruser`
--
ALTER TABLE `customeruser`
  ADD CONSTRAINT `FK on email users-customeruser` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `decoservicedetails`
--
ALTER TABLE `decoservicedetails`
  ADD CONSTRAINT `decodeet to service provider user FK on service provider id` FOREIGN KEY (`service_provider_id`) REFERENCES `serviceprovideruser` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  ADD CONSTRAINT `hotel service deet to service provider user FK on SP ID` FOREIGN KEY (`service_provider_id`) REFERENCES `serviceprovideruser` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_confirmation`
--
ALTER TABLE `package_confirmation`
  ADD CONSTRAINT `FK_on_rv_package_confirmation` FOREIGN KEY (`rv_id`) REFERENCES `customerrvdetails` (`rv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_on_payments` FOREIGN KEY (`rv_id`) REFERENCES `customerrvdetails` (`rv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  ADD CONSTRAINT `photodeet to service provider user FK on service provider id` FOREIGN KEY (`service_provider_id`) REFERENCES `serviceprovideruser` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  ADD CONSTRAINT `FK on email users-spuser` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
