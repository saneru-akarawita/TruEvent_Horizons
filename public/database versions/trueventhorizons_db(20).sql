-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: second-year-project-database.cua1qjpx4s4g.ap-southeast-1.rds.amazonaws.com:3306
-- Generation Time: May 16, 2023 at 05:47 AM
-- Server version: 8.0.28
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
  `package_code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `package_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `package_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `band_choice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `band_sv_id` int NOT NULL DEFAULT '0',
  `deco_choice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deco_sv_id` int NOT NULL DEFAULT '0',
  `photo_choice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo_sv_id` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sp_id_string` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminpackagedetails`
--

INSERT INTO `adminpackagedetails` (`package_id`, `package_code`, `package_type`, `package_name`, `price`, `band_choice`, `band_sv_id`, `deco_choice`, `deco_sv_id`, `photo_choice`, `photo_sv_id`, `active`, `sp_id_string`) VALUES
(1, 'P001', 'Birthday', 'Birthday Package', '125000.00', 'Yaka Crew - Birthday Parties', 6, 'URBAN 57 Decorations - Birthday Parties', 1, 'Shutter time studio - Birthday Parties', 2, 1, '8,3,4'),
(2, 'P002', 'Anniversary', 'Anniversary Package', '90000.00', '', 0, 'URBAN 57 Decorations - Anniversary Parties', 4, 'Shutter time studio - Anniversary Parties', 1, 1, '3,4'),
(3, 'P003', 'Coparate Event', 'Farewell Package', '200000.00', 'Wayo Band - Business Gatherings', 3, '', 0, 'ZoomIt Photography - Business Gatherings', 5, 1, '2,10'),
(4, 'P004', 'Graduation Party', 'Graduation Package', '120000.00', 'Yaka Crew - Get-Togethers', 5, 'URBAN 57 Decorations - Get-Togethers', 3, '', 0, 1, '8,3'),
(5, 'P005', 'General Event', 'General Event Package', '225000.00', 'Wayo Band - General Events', 4, 'Decor My Way - Night Functions', 8, '', 0, 1, '2,9'),
(6, 'P006', 'Get-Together', 'Family Gathering Package', '180000.00', 'Wayo Band - Night Functions', 1, '', 0, 'ZoomIt Photography - Night Functions', 4, 1, '2,10'),
(7, 'P007', 'Birthday', '21st Birthday Package', '60000.00', 'Yaka Crew - Birthday Parties', 6, 'URBAN 57 Decorations - Birthday Parties', 1, '', 0, 1, '8,3'),
(9, 'P008', 'Anniversary', 'Wedding Anniversary Package', '65000.00', 'Wayo Band - Anniversary Parties', 2, 'URBAN 57 Decorations - Anniversary Parties', 4, '', 0, 1, '2,3'),
(10, 'p035', 'Anniversary', 'BlissfulEvents', '60000.00', 'Wayo Band - Anniversary Parties', 2, 'URBAN 57 Decorations - Anniversary Parties', 4, '', 0, 1, '2,3');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `admin_id` int NOT NULL,
  `fname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `acc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `acc_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`admin_id`, `fname`, `lname`, `email`, `acc_name`, `acc_no`, `bank`, `branch`, `join_date`) VALUES
(1, 'Saneru', 'Akarawita', '2020cs007@stu.ucsc.cmb.ac.lk', 'S. U. Akarawita', '12345576', 'Sampath Bank', 'Homagama', '2023-05-10 14:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `bandservicedetails`
--

CREATE TABLE `bandservicedetails` (
  `service_id` int NOT NULL,
  `band_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `band_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `other_band_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_of_players` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bandservicedetails`
--

INSERT INTO `bandservicedetails` (`service_id`, `band_img`, `service_name`, `band_type`, `other_band_type`, `no_of_players`, `price`, `duration`, `service_provider_id`, `active`) VALUES
(1, 'band - view services welcome party1683886482.jpg', 'Night Functions', 'Pop, Classic, ', 'None', 5, '55000.00', '3', 2, 1),
(2, 'band view services anniversary1683886580.jpg', 'Anniversary Parties', 'Pop, Classic, Hip-Hop, ', 'None', 5, '100000.00', '5', 2, 1),
(3, 'for-birthday party-band1683886653.jpg', 'Business Gatherings', 'Pop, Hip-Hop, ', 'None', 3, '150000.00', '4', 2, 1),
(4, 'band- view services bussiness party1683886701.jpg', 'General Events', 'Pop, Classic, Hip-Hop, ', 'Provide Dancing team', 5, '250000.00', '3', 2, 1),
(5, 'aleksandr-popov-hTv8aaPziOQ-unsplash1683887136.jpg', 'Get-Togethers', 'Pop, Hip-Hop, EDM, ', '', 4, '60000.00', '5', 8, 1),
(6, 'mitchell-orr---LyFIjXoFY-unsplash1683887244.jpg', 'Birthday Parties', 'Pop, Classic, Hip-Hop, ', '', 3, '50000.00', '4', 8, 1),
(7, 'band - view services get - togathers1684086887.jpg', 'Night Functions', 'Rap, EDM, ', 'Provide Dancing team', 5, '800000.00', '6', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_dates`
--

CREATE TABLE `calendar_dates` (
  `id` int NOT NULL,
  `sp_user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `rv_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_dates`
--

INSERT INTO `calendar_dates` (`id`, `sp_user_id`, `title`, `start`, `end`, `rv_id`) VALUES
(3, 4, 'Harini and Rusiru Anniversary', '2023-07-02', '2023-07-02', 5),
(4, 10, 'Mom\'s 50th Birthday', '2023-06-01', '2023-06-01', 8),
(10, 8, 'Oshadhi\'s 21st Birthday', '2023-04-27', '2023-04-27', 14),
(11, 3, 'Oshadhi\'s 21st Birthday', '2023-04-27', '2023-04-27', 14),
(12, 2, 'Seylan Bank Musical Eve', '2023-06-03', '2023-06-03', 7),
(15, 3, 'Chirasi\'s 21st Birthday', '2023-06-01', '2023-06-01', 15),
(16, 8, 'Chirasi\'s 21st Birthday', '2023-06-01', '2023-06-01', 15),
(17, 2, 'Cambio Gathering Night', '2023-07-12', '2023-07-12', 18),
(18, 2, 'Devin\'s 10th anniversary', '2023-08-12', '2023-08-12', 17),
(19, 2, 'Saduni\'s Farewell party', '2023-08-05', '2023-08-05', 20),
(20, 2, 'unavailable', '2023-05-17', '2023-05-17', 0),
(23, 1, 'Punara\'s Farewell Party', '2023-06-16', '2023-06-16', 24),
(24, 2, 'A Royal Affair', '2023-06-05', '2023-06-05', 30),
(25, 3, 'A Royal Affair', '2023-06-05', '2023-06-05', 30),
(26, 2, 'unavailable', '2023-05-18', '2023-05-18', 0),
(27, 1, 'Chamila\'s Business Meeting', '2023-06-01', '2023-06-01', 32),
(28, 1, 'Company 50th Anniversary', '2023-05-24', '2023-05-24', 0),
(29, 2, 'Hotel closed', '2023-05-15', '2023-05-15', 0),
(30, 1, 'Roshan Sir\'s Birthday', '2023-05-30', '2023-05-30', 34),
(31, 2, 'unavailable band', '2023-05-19', '2023-05-19', 0),
(32, 1, 'Pasindu Sir\'s Birthday', '2023-08-15', '2023-08-15', 35);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1517890692, 196903209, 'hey, Can I clarify few details about my reservation?'),
(2, 196903209, 1517890692, 'Yes, Sure!'),
(3, 1517890692, 196903209, 'can we change the booking date?'),
(4, 196903209, 1517890692, 'Yes, You can do it.'),
(5, 1388237349, 196903209, 'hey, are you available on 5th of May?'),
(6, 196903209, 1388237349, 'yes we are available!'),
(7, 401973224, 196903209, 'when I try to login from my friends account, it says \\\"currently deactivated\\\" please help!'),
(8, 196903209, 401973224, 'wait, I\\\'ll activate it.');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `user_id` int NOT NULL,
  `unique_id` int NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userstatus` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `img`, `status`, `userstatus`) VALUES
(1, 196903209, 'Kaveesha', 'Muthukuda', '2020cs118@stu.ucsc.cmb.ac.lk', '645e1556e3cc8.jpg', 'Active now', 'verified'),
(2, 401973224, 'Saneru', 'Akarawita', '2020cs007@stu.ucsc.cmb.ac.lk', '6461d1c6a85d0.jpg', 'Offline now', 'verified'),
(3, 1517890692, 'SHANGRI-LA', '', '2020cs197@stu.ucsc.cmb.ac.lk', '645e0c439015f.jpg', 'Active now', 'verified'),
(4, 1388237349, 'Wayo Band', '', 'chirasiamaya99@gmail.com', '645e1a5e9ac97.jpg', 'Offline now', 'verified'),
(5, 949494589, 'URBAN 57 Decorations', '', '2020cs088@stu.ucsc.cmb.ac.lk', '645e151a2cc45.png', 'Offline now', 'verified'),
(6, 1395858436, 'Shutter time studio', '', 'harij2822@gmail.com', '645e1675c216c.png', 'Offline now', 'verified'),
(8, 173161740, 'Mt. Lavenia Hotel', '', 'mountlv@gmail.com', '645e0c8ed4890.png', 'Offline now', 'verified'),
(9, 1009612998, 'Yaka Crew', '', 'yakacrew@gmail.com', '645e140b2c1dc.jpg', 'Offline now', 'verified'),
(10, 768672929, 'Decor My Way', '', 'decomyway@gmail.com', '645e19bee180d.jpg', 'Active now', 'disable'),
(11, 243852662, 'ZoomIt Photography', '', 'zoomIT@gmail.com', '645e1973697d1.png', 'Offline now', 'verified'),
(12, 145573555, 'Chamila', 'Amarathunga', 'chamila.amarathunga@gmail.com', NULL, 'Offline now', 'verified'),
(13, 1597061400, 'Harini', 'Kumudika', 'harnij@gmail.com', '645f0c5ed6d6d.jpg', 'Offline now', 'verified'),
(14, 1344446640, 'Jetwing', '', 'saneru.rotaract3220@gmail.com', NULL, 'Active now', 'verified'),
(15, 1333176174, 'Galadari Hotel', '', 'saneru.akarawita@icloud.com', NULL, 'Active now', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `customerrvdetails`
--

CREATE TABLE `customerrvdetails` (
  `rv_id` int NOT NULL,
  `eventName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rvDate` date NOT NULL,
  `rvTime` time NOT NULL,
  `rvType` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `spType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_id` int DEFAULT '0',
  `packageType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `packageName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `no_of_people` int DEFAULT NULL,
  `customer_id` int NOT NULL,
  `sp_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `remarks` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerrvdetails`
--

INSERT INTO `customerrvdetails` (`rv_id`, `eventName`, `rvDate`, `rvTime`, `rvType`, `spType`, `spName`, `service_id`, `packageType`, `packageName`, `status`, `payment`, `price`, `no_of_people`, `customer_id`, `sp_id`, `remarks`) VALUES
(0, 'Zeroth Event', '2013-12-31', '00:00:00', 'null', NULL, NULL, NULL, NULL, NULL, 'canceled', 'null', '0.00', NULL, 2, '0', NULL),
(2, 'Chirasi\'s Bridal Shower', '2023-05-31', '18:00:00', 'service', 'Hotel', 'Mt. Lavenia Hotel - Empire Ballroom', 5, NULL, NULL, 'decline', 'not-paid', '540000.00', 120, 1, '7', NULL),
(3, 'Nehan\'s Farewell', '2023-04-26', '18:00:00', 'service', 'Decoration', 'URBAN 57 Decorations - Night Functions', 2, NULL, NULL, 'canceled', 'not-paid', '35000.00', NULL, 1, '3', 'advance payment time out'),
(4, 'UOC Colors Night', '2023-05-14', '19:00:00', 'service', 'Band', 'Wayo Band - Night Functions', 1, NULL, NULL, 'canceled', 'ad-paid', '80000.00', NULL, 1, '2', 'full payment time out'),
(5, 'Harini and Rusiru Anniversary', '2023-07-02', '17:00:00', 'service', 'Photography', 'Shutter time studio - Anniversary Parties', 1, NULL, NULL, 'confirm', 'paid', '50000.00', NULL, 1, '4', NULL),
(6, 'Chirasi\'s Bridal Shower', '2023-05-03', '18:00:00', 'service', 'Hotel', 'Mt. Lavenia Hotel - Empire Ballroom', 5, NULL, NULL, 'canceled', 'not-paid', '540000.00', 120, 1, '7', 'confirmation time out'),
(7, 'Seylan Bank Musical Eve', '2023-06-03', '18:30:00', 'service', 'Band', 'Wayo Band - Business Gatherings', 3, NULL, NULL, 'confirm', 'not-paid', '150000.00', NULL, 3, '2', NULL),
(8, 'Mom\'s 50th Birthday', '2023-06-01', '19:00:00', 'service', 'Photography', 'ZoomIt Photography - Night Functions', 4, NULL, NULL, 'confirm', 'paid', '48000.00', NULL, 1, '10', NULL),
(9, 'Rusiru 20th Anniversary', '2023-04-11', '14:00:00', 'service', 'Band', 'Wayo Band - Anniversary Parties', 2, NULL, NULL, 'canceled', 'ad-paid', '100000.00', NULL, 4, '2', 'full payment time out'),
(10, 'Harini\'s 31st Birthday', '2023-04-08', '22:00:00', 'service', 'Band', 'Wayo Band - General Events', 4, NULL, NULL, 'canceled', 'not-paid', '250000.00', NULL, 4, '2', 'advance payment time out'),
(11, 'Jantih\'s farewall party', '2023-03-09', '20:00:00', 'service', 'Band', 'Wayo Band - Night Functions', 1, NULL, NULL, 'canceled', 'ad-paid', '80000.00', NULL, 4, '2', 'full payment time out'),
(12, 'Harini Deco 22nd Annual Celebration', '2023-03-22', '10:00:00', 'package', NULL, NULL, 5, 'General Event', 'General Event Package', 'canceled', 'not-paid', '225000.00', NULL, 4, '2,9', 'advance payment time out'),
(13, 'Dilmi\'s 21st birthday', '2023-03-01', '21:00:00', 'package', NULL, NULL, 3, 'Coparate Event', 'Farewell Package', 'canceled', 'not-paid', '200000.00', NULL, 4, '2,10', 'advance payment time out'),
(14, 'Oshadhi\'s 21st Birthday', '2023-04-27', '22:00:00', 'package', NULL, NULL, 7, 'Birthday', '21st Birthday Package', 'confirm', 'paid', '60000.00', NULL, 4, '8,3', NULL),
(15, 'Chirasi\'s 21st Birthday', '2023-06-01', '14:30:00', 'package', NULL, NULL, 7, 'Birthday', '21st Birthday Package', 'confirm', 'paid', '60000.00', NULL, 4, '8,3', NULL),
(16, 'Cambio Gathering Night', '2023-07-14', '11:00:00', 'service', 'Band', 'Wayo Band - Business Gatherings', 3, NULL, NULL, 'decline', 'not-paid', '150000.00', NULL, 4, '2', NULL),
(17, 'Devin\'s 10th anniversary', '2023-08-12', '19:00:00', 'service', 'Band', 'Wayo Band - Anniversary Parties', 2, NULL, NULL, 'confirm', 'not-paid', '100000.00', NULL, 1, '2', NULL),
(18, 'Cambio Gathering Night', '2023-07-12', '11:00:00', 'service', 'Band', 'Wayo Band - Night Functions', 1, NULL, NULL, 'confirm', 'paid', '55000.00', NULL, 4, '2', NULL),
(19, 'Pasindu\'s 25th birthday', '2023-08-10', '16:00:00', 'service', 'Band', 'Yaka Crew - Birthday Parties', 6, NULL, NULL, 'decline', 'not-paid', '50000.00', NULL, 1, '8', NULL),
(20, 'Saduni\'s Farewell party', '2023-08-05', '17:00:00', 'service', 'Band', 'Wayo Band - General Events', 4, NULL, NULL, 'confirm', 'not-paid', '250000.00', NULL, 1, '2', NULL),
(21, 'Thilini\'s 20th Birthday', '2023-05-31', '17:00:00', 'service', 'Hotel', 'SHANGRI-LA - Shang Hi Palace', 1, NULL, NULL, 'pending', 'not-paid', '800000.00', 100, 1, '1', NULL),
(22, 'Sanduni\'s Wedding', '2023-05-20', '22:00:00', 'service', 'Band', 'Wayo Band - Night Functions', 1, NULL, NULL, 'canceled', 'not-paid', '55000.00', NULL, 3, '2', 'advance payment time out'),
(23, 'Yasasmi\'s OC meeting', '2023-05-14', '10:00:00', 'service', 'Band', 'Wayo Band - Business Gatherings', 3, NULL, NULL, 'canceled', 'not-paid', '150000.00', NULL, 3, '2', 'advance payment time out'),
(24, 'Punara\'s Farewell Party', '2023-06-16', '16:00:00', 'service', 'Hotel', 'SHANGRI-LA - London Eye Hall', 4, NULL, NULL, 'confirm', 'not-paid', '325000.00', 50, 1, '1', NULL),
(25, 'Roshan\'s Wedding', '2023-05-15', '17:00:00', 'service', 'Band', 'Yaka Crew - Birthday Parties', 6, NULL, NULL, 'canceled', 'not-paid', '50000.00', NULL, 3, '8', 'confirmation time out'),
(26, 'Sehansa\'s 21st Birthday', '2023-06-10', '15:30:00', 'service', 'Hotel', 'SHANGRI-LA - Grand Kandian Hall', 7, NULL, NULL, 'decline', 'not-paid', '75000.00', 25, 1, '1', NULL),
(27, 'Sachin\'s 5th Anniversary', '2023-05-31', '16:00:00', 'package', NULL, NULL, 2, 'Anniversary', 'Anniversary Package', 'pending', 'not-paid', '90000.00', NULL, 1, '3,4', NULL),
(28, 'Untamed Night', '2023-06-08', '17:30:00', 'package', NULL, NULL, 6, 'Get-Together', 'Family Gathering Package', 'pending', 'not-paid', '180000.00', NULL, 1, '2,10', NULL),
(29, 'A Fright Night', '2023-06-03', '18:30:00', 'package', NULL, NULL, 5, 'General Event', 'General Event Package', 'pending', 'not-paid', '225000.00', NULL, 1, '2,9', NULL),
(30, 'A Royal Affair', '2023-06-05', '18:30:00', 'package', NULL, NULL, 9, 'Anniversary', 'Wedding Anniversary Package', 'confirm', 'paid', '65000.00', NULL, 1, '2,3', NULL),
(31, 'Pasindu Sir\'s Birthday', '2023-08-15', '17:57:00', 'service', 'Hotel', 'SHANGRI-LA - Shang Hi Palace', 1, NULL, NULL, 'decline', 'not-paid', '400000.00', 50, 1, '1', NULL),
(32, 'Chamila\'s Business Meeting', '2023-06-01', '14:45:00', 'service', 'Hotel', 'SHANGRI-LA - Accavate Hall', 8, NULL, NULL, 'confirm', 'not-paid', '75000.00', 25, 3, '1', NULL),
(33, 'YourPartyHost', '2023-06-10', '12:41:00', 'service', 'Hotel', 'SHANGRI-LA - Shang Lagune Palace', 9, NULL, NULL, 'pending', 'not-paid', '250000.00', 50, 1, '1', NULL),
(34, 'Roshan Sir\'s Birthday', '2023-05-30', '10:20:00', 'service', 'Hotel', 'SHANGRI-LA - Shang Hi Palace', 1, NULL, NULL, 'confirm', 'not-paid', '400000.00', 50, 1, '1', NULL),
(35, 'Pasindu Sir\'s Birthday', '2023-08-15', '17:00:00', 'service', 'Hotel', 'SHANGRI-LA - Shang Hi Palace', 1, NULL, NULL, 'confirm', 'not-paid', '350000.00', 50, 1, '1', NULL);

--
-- Triggers `customerrvdetails`
--
DELIMITER $$
CREATE TRIGGER `delete_payments_and_calendar_dates_based_on_canceled` AFTER UPDATE ON `customerrvdetails` FOR EACH ROW BEGIN
  IF NEW.status = 'canceled' THEN
    DELETE FROM payments WHERE rv_id = NEW.rv_id;
    DELETE FROM calendar_dates WHERE rv_id = NEW.rv_id;
  END IF;
END
$$
DELIMITER ;
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
-- Stand-in structure for view `customerrvdetails_with_prices`
-- (See below for the actual view)
--
CREATE TABLE `customerrvdetails_with_prices` (
`rv_id` int
,`eventName` varchar(255)
,`rvDate` date
,`rvTime` time
,`rvType` varchar(10)
,`spType` varchar(20)
,`spName` varchar(255)
,`service_id` int
,`packageType` varchar(255)
,`packageName` varchar(255)
,`status` varchar(10)
,`payment` varchar(10)
,`price` decimal(10,2)
,`customer_id` int
,`sp_id` varchar(255)
,`band_sv_id` int
,`deco_sv_id` int
,`photo_sv_id` int
,`price_band` decimal(26,8)
,`price_deco` decimal(26,8)
,`price_photo` decimal(26,8)
);

-- --------------------------------------------------------

--
-- Table structure for table `customeruser`
--

CREATE TABLE `customeruser` (
  `customer_id` int NOT NULL,
  `fname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customeruser`
--

INSERT INTO `customeruser` (`customer_id`, `fname`, `lname`, `email`, `contact_no`, `district`, `join_date`) VALUES
(1, 'Kaveesha', 'Muthukuda', '2020cs118@stu.ucsc.cmb.ac.lk', '0774433213', 'Colombo', '2023-05-10 14:08:45'),
(2, 'Customer', 'SuperAdmin', 'supercus@gmail.com', '0775566876', 'Colombo', '2023-05-11 14:58:50'),
(3, 'Chamila', 'Amarathunga', 'chamila.amarathunga@gmail.com', '0770581908', 'Colombo', '2023-05-13 07:02:18'),
(4, 'Harini', 'Kumudika', 'harnij@gmail.com', '0751239654', 'Galle', '2023-05-13 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `decoservicedetails`
--

CREATE TABLE `decoservicedetails` (
  `service_id` int NOT NULL,
  `deco_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `decoration_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `other_decoration` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoservicedetails`
--

INSERT INTO `decoservicedetails` (`service_id`, `deco_img`, `service_name`, `decoration_item`, `theme`, `price`, `other_decoration`, `service_provider_id`, `active`) VALUES
(1, 'zachary-spears-6Xjqdd3eI7o-unsplash1683885309.jpg', 'Birthday Parties', 'Fresh flowers, Artificial flowers, Balloons, Candles, Lights, Banners, ', 'Alice in wonderland', '50000.00', '', 3, 1),
(2, 'clint-patterson-LuvEj39BEq4-unsplash1683885514.jpg', 'Night Functions', 'Candles, Lights, Banners, ', 'halloween', '35000.00', 'Pumpkins, devil faces', 3, 1),
(3, 'dave-lastovskiy-RygIdTavhkQ-unsplash1683885665.jpg', 'Get-Togethers', 'Fresh flowers, Lights, Banners, Table cloths, Chair covers, ', 'hollywood', '45000.00', '', 3, 1),
(4, 'roman-kraft-dRgf7doee-o-unsplash1683885866.jpg', 'Anniversary Parties', 'Fresh flowers, Balloons, Candles, Lights, Banners, Table cloths, Chair covers, ', 'Love is sweet', '50000.00', 'silk rose petals, hearts garland', 3, 1),
(5, 'annivasary - deco1683888118.jpg', 'Anniversary Parties', 'Fresh flowers, Artificial flowers, ', 'disneyland - Pink', '250000.00', 'Cake Decorations, Disco Light, Party Ribbons', 9, 1),
(6, 'bdy - photo1683888191.jpg', 'Birthday Parties', 'Artificial flowers, Balloons, Candles, Table cloths, ', 'Masquerade Ball Theme', '50000.00', 'Cake Decorations', 9, 1),
(7, 'bdy-deco1683888280.jpg', 'Welcome Parties', 'Fresh flowers, Balloons, Candles, Lights, ', 'Heaven Theme', '500000.00', 'Disco Light, Party Ribbons', 9, 1),
(8, 'band1683888371.jpg', 'Night Functions', 'Fresh flowers, Candles, Lights, Banners, ', 'Wild West Theme', '165000.00', 'Disco Light', 9, 1),
(9, 'annivasary - deco1684087004.jpg', 'Anniversary Parties', 'Fresh flowers, Artificial flowers, Candles, Table cloths, ', 'Heaven Theme', '150000.00', 'Cake Decorations', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int NOT NULL,
  `sp_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sp_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int NOT NULL,
  `eob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `complaint` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `sp_type`, `sp_name`, `event_name`, `customer_name`, `contact_no`, `eob`, `aos`, `vom`, `qos`, `cs`, `complaint`) VALUES
(1, 'Hotel', 'Hotel SHANGRI-LA', 'Thilini\'s 20th Birthday', 'Kaveesha Muthukuda', 774433213, 'Fair', 'Good', 'Good', 'Excellent', 'Excellent', 'None'),
(2, 'Band', 'WAYO band', 'A Royal Affair', 'Kaveesha Muthukuda', 774433213, 'Good', 'Good', 'Good', 'Excellent', 'Excellent', 'None'),
(3, 'Band', 'WaYO band', 'YourPartyHost', 'Kaveesha Muthukuda', 774433213, 'Poor', 'Fair', 'Good', 'Excellent', 'Fair', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotelservicedetails`
--

CREATE TABLE `hotelservicedetails` (
  `service_id` int NOT NULL,
  `service_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hall_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hall_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hall_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `max_crowd` int NOT NULL,
  `ac_status` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `other_facilities` text COLLATE utf8mb4_general_ci,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelservicedetails`
--

INSERT INTO `hotelservicedetails` (`service_id`, `service_type`, `hall_image`, `hall_name`, `location`, `hall_type`, `max_crowd`, `ac_status`, `price`, `other_facilities`, `service_provider_id`, `active`) VALUES
(1, 'Birthday Parties', 'anniversary - hotel1683884501.jpg', 'Shang Hi Palace', '5th floor', 'indoor', 250, 1, '6000.00', 'None', 1, 1),
(2, 'Anniversary Parties', 'hotel1683884584.jpg', 'Shang Palace', '4th Floor', 'indoor', 250, 0, '50000.00', 'None', 1, 1),
(3, 'Welcome Parties', 'bdy - hotel1683884647.jpg', 'Liberty Hall', '2nd floor', 'indoor', 150, 0, '5000.00', 'None', 1, 1),
(4, 'Get-Togethers', 'get-togathers-hotel1683884834.jpg', 'London Eye Hall', 'Ground Floor', 'indoor', 150, 1, '6500.00', 'providing DJ facility', 1, 1),
(5, 'Night Functions', '31683885535.jpg', 'Empire Ballroom', '1st Floor', 'indoor', 150, 1, '4500.00', '', 7, 1),
(6, 'Business Gatherings', '31683885862.jpg', 'Conference Room', '4th Floor East Wing', 'indoor', 50, 1, '4000.00', 'Dance Floor available', 7, 1),
(7, 'Birthday Parties', 'b1683961266.jpg', 'Grand Kandian Hall', '4th Floor East Wing', 'indoor', 100, 1, '3000.00', '', 1, 1),
(8, 'Get-Togethers', '41683980215.jpg', 'Accavate Hall', '1th Floor West Wing', 'indoor', 100, 1, '3000.00', 'DJ Included', 1, 1),
(9, 'Business Gatherings', 'hotel-view service main pic1684086593.jpg', 'Shang Lagune Palace', 'Ground Floor', 'outdoor', 150, 0, '5000.00', 'None', 1, 1),
(10, 'Anniversary Parties', '31684123087.jpg', 'Grand South Hall', 'Ground Floor', 'indoor', 50, 1, '3000.00', '', 1, 1),
(11, 'Night Functions', 'night - hotel1684131774.jpg', 'Empire Ballroom', 'Ground Floor', 'indoor', 50, 1, '3000.00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `OTP` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otpverification`
--

INSERT INTO `otpverification` (`email`, `OTP`, `timestamp`, `type`) VALUES
('2020cs158@stu.ucsc.cmb.ac.lk', '827344', '2023-05-15 08:30:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_confirmation`
--

CREATE TABLE `package_confirmation` (
  `id` int NOT NULL,
  `rv_id` int NOT NULL,
  `event_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(1, 12, 'Harini Deco 22nd Annual Celebration', 2, 2, 0, 9, 2, 0),
(2, 13, 'Dilmi\'s 21st birthday', 2, 2, 0, 0, 2, 10),
(3, 14, 'Oshadhi\'s 21st Birthday', 2, 2, 0, 3, 8, 0),
(4, 15, 'Chirasi\'s 21st Birthday', 2, 2, 0, 3, 8, 0),
(5, 27, 'Sachin\'s 5th Anniversary', 2, 0, 0, 0, 0, 0),
(6, 28, '1st Annual Uncanny Hootenanny', 2, 0, 0, 0, 0, 0),
(7, 29, 'A Fright Night', 2, 0, 0, 0, 0, 0),
(8, 30, 'A Royal Affair', 2, 2, 0, 3, 2, 0);

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
  `ad_price` int NOT NULL,
  `full_price` int NOT NULL,
  `rem_price` int NOT NULL DEFAULT '0',
  `ad_flag` int NOT NULL DEFAULT '0',
  `fp_flag` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `rv_id`, `customer_id`, `ad_price`, `full_price`, `rem_price`, `ad_flag`, `fp_flag`) VALUES
(3, 5, 1, 12500, 50000, 0, 1, 1),
(4, 8, 1, 12000, 48000, 0, 1, 1),
(8, 14, 4, 15000, 60000, 0, 1, 1),
(9, 7, 3, 37500, 150000, 150000, 0, 0),
(12, 15, 4, 15000, 60000, 0, 1, 1),
(13, 18, 4, 13750, 55000, 0, 1, 1),
(14, 17, 1, 25000, 100000, 100000, 0, 0),
(15, 20, 1, 62500, 250000, 250000, 0, 0),
(18, 24, 1, 81250, 325000, 325000, 0, 0),
(19, 30, 1, 16250, 65000, 0, 1, 1),
(20, 32, 3, 18750, 75000, 75000, 0, 0),
(21, 34, 1, 100000, 400000, 400000, 0, 0),
(22, 35, 1, 87500, 350000, 350000, 0, 0);

--
-- Triggers `payments`
--
DELIMITER $$
CREATE TRIGGER `update_customerrvdetails_on_ad_flag` AFTER UPDATE ON `payments` FOR EACH ROW BEGIN
  IF NEW.ad_flag = 1 THEN
    UPDATE customerrvdetails SET payment = 'ad-paid' WHERE rv_id = NEW.rv_id;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_customerrvdetails_on_fp_flag` AFTER UPDATE ON `payments` FOR EACH ROW BEGIN
  IF NEW.fp_flag = 1 THEN
    UPDATE customerrvdetails SET payment = 'paid' WHERE rv_id = NEW.rv_id;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
  `log_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `PayHere_Payment_ID` int NOT NULL,
  `Booking_ID` int NOT NULL,
  `Mode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Amount` int NOT NULL,
  `Success_Flag` int NOT NULL,
  `Status_Message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_log`
--

INSERT INTO `payment_log` (`log_id`, `payment_id`, `PayHere_Payment_ID`, `Booking_ID`, `Mode`, `Amount`, `Success_Flag`, `Status_Message`) VALUES
(1, 2, 2147483647, 4, 'VISA', 20000, 2, 'Successfully received the VISA payment'),
(2, 3, 2147483647, 5, 'VISA', 50000, 2, 'Successfully received the VISA payment'),
(3, 1, 0, 3, 'VISA', 8750, -2, 'Unknown card'),
(4, 1, 0, 3, 'MASTER', 35000, -2, 'Unknown card'),
(5, 5, 2147483647, 9, 'MASTER', 25000, 2, 'Successfully received the MASTER payment'),
(6, 8, 2147483647, 14, 'VISA', 15000, 2, 'Successfully received the VISA payment'),
(7, 8, 2147483647, 14, 'VISA', 45000, 2, 'Successfully received the VISA payment'),
(8, 11, 2147483647, 11, 'MASTER', 20000, 2, 'Successfully received the MASTER payment'),
(9, 12, 2147483647, 15, 'MASTER', 15000, 2, 'Successfully received the MASTER payment'),
(10, 12, 2147483647, 15, 'VISA', 45000, 2, 'Successfully received the VISA payment'),
(11, 13, 2147483647, 18, 'VISA', 13750, 2, 'Successfully received the VISA payment'),
(12, 13, 2147483647, 18, 'VISA', 41250, 2, 'Successfully received the VISA payment'),
(13, 19, 2147483647, 30, 'VISA', 16250, 2, 'Successfully received the VISA payment'),
(14, 19, 2147483647, 30, 'MASTER', 48750, 2, 'Successfully received the MASTER payment'),
(15, 4, 2147483647, 8, 'VISA', 12000, 2, 'Successfully received the VISA payment'),
(16, 4, 2147483647, 8, 'VISA', 36000, 2, 'Successfully received the VISA payment');

-- --------------------------------------------------------

--
-- Table structure for table `photographyservicedetails`
--

CREATE TABLE `photographyservicedetails` (
  `service_id` int NOT NULL,
  `photo_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `other_features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photographyservicedetails`
--

INSERT INTO `photographyservicedetails` (`service_id`, `photo_img`, `service_name`, `photo_features`, `other_features`, `price`, `service_provider_id`, `active`) VALUES
(1, 'carly-rae-hobbins-zNHOIzjJiyA-unsplash1683886845.jpg', 'Anniversary Parties', 'Full-day photo shoots, Professional lighting setup, Single-shooter, Multi-shooter, ', '', '50000.00', 4, 1),
(2, 'brooke-lark-pGM4sjt_BdQ-unsplash1683886923.jpg', 'Birthday Parties', 'Half-day photo shoots, Professional lighting setup, Multi-shooter, ', '', '40000.00', 4, 1),
(3, 'al-elmes-ULHxWq8reao-unsplash1683888146.jpg', 'Welcome Parties', 'Half-day photo shoots, Single-shooter, Multi-shooter, ', '', '45000.00', 10, 1),
(4, 'georgiana-avram-gASJ-p0Mblw-unsplash1683888248.jpg', 'Night Functions', 'Half-day photo shoots, Professional lighting setup, Single-shooter, ', '', '48000.00', 10, 1),
(5, 'louis-hansel-hTUyrn0UHZw-unsplash1683888348.jpg', 'Business Gatherings', 'Full-day photo shoots, Professional camera and lens kits, Multi-shooter, ', '', '55000.00', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovideruser`
--

CREATE TABLE `serviceprovideruser` (
  `service_provider_id` int NOT NULL,
  `business_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sp_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(1, 'H001', 'SHANGRI-LA', '2020cs197@stu.ucsc.cmb.ac.lk', '0711325698', 'Colombo', '4', '87654321', 'SHANGRILA', 'Sampath Bank', 'Pettah', 0, '2023-05-10 14:29:10'),
(2, 'B001', 'Wayo Band', 'chirasiamaya99@gmail.com', '0711368925', 'Gampaha', '6', '12345678', 'C.Walpola', 'BOC Bank', 'Colombo 5', 0, '2023-05-10 14:41:43'),
(3, 'DEC0016', 'URBAN 57 Decorations', '2020cs088@stu.ucsc.cmb.ac.lk', '0776568595', 'Galle', '5', '13572468', 'Urban Decorations', 'NSB Bank', 'Galle', 0, '2023-05-10 14:46:03'),
(4, 'PHO0012', 'Shutter time studio', 'harij2822@gmail.com', '0718956233', 'Jaffna', '7', '15678942', 'H.Kumudika', 'BOC Bank', 'Jaffna', 0, '2023-05-10 15:16:28'),
(7, 'HOT1234', 'Mt. Lavenia Hotel', 'mountlv@gmail.com', '0711351868', 'Colombo', '4', '56879765', 'Mt. Lavenia Hotel', 'Sampath Bank', 'Mt. Lavenia', 0, '2023-05-11 10:01:41'),
(8, 'BND4532', 'Yaka Crew', 'yakacrew@gmail.com', '0776519811', 'Colombo', '6', '56892314', 'Yaka Crew', 'Peoples Bank', 'Colombo 07', 0, '2023-05-12 15:46:54'),
(9, 'DEC002', 'Decor My Way', 'decomyway@gmail.com', '0711562389', 'Matale', '5', '123789456', 'C.Amaya', 'Sampath Bank', 'Matara', 0, '2023-05-12 15:58:40'),
(10, 'P0002', 'ZoomIt Photography', 'zoomIT@gmail.com', '0774433211', 'Hambantota', '7', '45678912', 'Saneru Udana Akarawita', 'BOC Bank', 'Hambantota', 0, '2023-05-12 16:08:46'),
(11, 'HOT5644', 'Jetwing', 'saneru.rotaract3220@gmail.com', '0773739428', 'Colombo', '4', '4326423423', 'Jetwing hotel', 'Sampath Bank', 'Kaluthara', 0, '2023-05-15 09:23:23'),
(12, 'HOT5643', 'Galadari Hotel', 'saneru.akarawita@icloud.com', '0711351868', 'Colombo', '4', '32432432', 'Galadari Hotel', 'Sampath Bank', 'Colombo 07', 0, '2023-05-15 11:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `spverifydoc`
--

CREATE TABLE `spverifydoc` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spverifydoc`
--

INSERT INTO `spverifydoc` (`email`, `img`) VALUES
('decomyway@gmail.com', 'Group Member Details1683887320.pdf'),
('mountlv@gmail.com', 'DB1683779501.png'),
('saneru.akarawita@icloud.com', 'business reg1684131642.jpg'),
('saneru.rotaract3220@gmail.com', 'business reg1684122803.jpg'),
('yakacrew@gmail.com', 'DB1683886613.png'),
('zoomIT@gmail.com', 'Screenshot_20221023_0129581683887926.png');

-- --------------------------------------------------------

--
-- Table structure for table `superadminuser`
--

CREATE TABLE `superadminuser` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadminuser`
--

INSERT INTO `superadminuser` (`email`, `password`) VALUES
('superadmin@gmail.com', 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fail_attempts` int NOT NULL,
  `user_type` int NOT NULL,
  `vstatus` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `fail_attempts`, `user_type`, `vstatus`, `img`) VALUES
('2020cs007@stu.ucsc.cmb.ac.lk', '$2y$10$dbxyYOge0xl0o5gtHBvS.OD6QtaEzzafCoedVFajdix3..wIqMliS', 0, 2, 'verified', '6461d1c6a85d0.jpg'),
('2020cs088@stu.ucsc.cmb.ac.lk', '$2y$10$JLYaI5K5.lYxnAeoHz19se8MUqB2TEAF5D1yqtaGUG.cHLD4PXr.C', 0, 5, 'verified', '645e151a2cc45.png'),
('2020cs118@stu.ucsc.cmb.ac.lk', '$2y$10$lOvnbG5RW1q5.hGDuGq./ehDe2DfFEk7hPuH0cNUQUEoHk2Gfuby.', 0, 3, 'verified', '645e1556e3cc8.jpg'),
('2020cs197@stu.ucsc.cmb.ac.lk', '$2y$10$80n9pzQIuiftCkZ4wx0Vzu0Rq6CCHQi5etAfHFs5TAt.WYEIeoAtm', 0, 4, 'verified', '645e0c439015f.jpg'),
('chamila.amarathunga@gmail.com', '$2y$10$UZUjnrHMVBIezHNODKqNXOzjw4Qp3TP33OA36M3y8mNbk5NPxiSYK', 0, 3, 'verified', NULL),
('chirasiamaya99@gmail.com', '$2y$10$Go9XkSYj8CZnsHZo6H.fLeiXYlZnD32RGICecvcb2Yv.gNMoomvV.', 0, 6, 'verified', '645e1a5e9ac97.jpg'),
('decomyway@gmail.com', '$2y$10$fXjdenWh1wRhtJpgH7b2mORjwzpFPxHdN41BqFRcVa4HxQFXzZZJq', 0, 5, 'disable', '645e19bee180d.jpg'),
('harij2822@gmail.com', '$2y$10$weSkcLtOeXuGfNmbW5FGduKBIRJgHWyFyAocZNagUy0A6gr77Va1.', 0, 7, 'verified', '645e1675c216c.png'),
('harnij@gmail.com', '$2y$10$JkVpVObNchplVCCobeEFCuaTNnVXT18GNc2l2vxbJdya03ScJtmMa', 0, 3, 'verified', '645f0c5ed6d6d.jpg'),
('mountlv@gmail.com', '$2y$10$UoSbkiOq6NAJkMrcp7dLt.ubw8IDMIAkdLJca/nZLNyuM9VljyTwu', 0, 4, 'verified', '645e0c8ed4890.png'),
('saneru.akarawita@icloud.com', '$2y$10$dm.ZXZmJaZ1DiyvSIC2FsegU0cfa4SE.F1mTitvXuk.uAuQUhB55q', 0, 4, 'verified', NULL),
('saneru.rotaract3220@gmail.com', '$2y$10$PWN.NT/pUbPo1wvwhVLpQekm7bPkqJ5tFcaqWs7JK6ZDre8fq.f62', 0, 4, 'verified', NULL),
('superadmin@gmail.com', '$2y$10$lFs/frrw7GeoJt7f60RC1upq9ijVg6k1cuF3.8t5x19xOiHAopUHS', 0, 1, 'verified', NULL),
('supercus@gmail.com', '$2y$10$tLMdGSiHbfcnKfftArSoYu8KR9xy5qWIBj61o/1wKSNfxYMpWJi0q', 0, 3, 'pending', NULL),
('yakacrew@gmail.com', '$2y$10$peFa/5YYDijX95I8L/9sJu54B1g8URNkXawPCm4blLBhFBsWICqg.', 0, 6, 'verified', '645e140b2c1dc.jpg'),
('zoomIT@gmail.com', '$2y$10$98oiaO7kWc25Vdw/dFacWuPY.wleDtwpsbKf9ZHXh4mJh9PlZTs8K', 0, 7, 'verified', '645e1973697d1.png');

-- --------------------------------------------------------

--
-- Structure for view `customerrvdetails_with_prices`
--
DROP TABLE IF EXISTS `customerrvdetails_with_prices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `customerrvdetails_with_prices`  AS SELECT `crv`.`rv_id` AS `rv_id`, `crv`.`eventName` AS `eventName`, `crv`.`rvDate` AS `rvDate`, `crv`.`rvTime` AS `rvTime`, `crv`.`rvType` AS `rvType`, `crv`.`spType` AS `spType`, `crv`.`spName` AS `spName`, `crv`.`service_id` AS `service_id`, `crv`.`packageType` AS `packageType`, `crv`.`packageName` AS `packageName`, `crv`.`status` AS `status`, `crv`.`payment` AS `payment`, `crv`.`price` AS `price`, `crv`.`customer_id` AS `customer_id`, `crv`.`sp_id` AS `sp_id`, `adp`.`band_sv_id` AS `band_sv_id`, `adp`.`deco_sv_id` AS `deco_sv_id`, `adp`.`photo_sv_id` AS `photo_sv_id`, (`crv`.`price` * (ifnull(`bsd`.`price`,0) / ((ifnull(`bsd`.`price`,0) + ifnull(`dsd`.`price`,0)) + ifnull(`psd`.`price`,0)))) AS `price_band`, (`crv`.`price` * (ifnull(`dsd`.`price`,0) / ((ifnull(`bsd`.`price`,0) + ifnull(`dsd`.`price`,0)) + ifnull(`psd`.`price`,0)))) AS `price_deco`, (`crv`.`price` * (ifnull(`psd`.`price`,0) / ((ifnull(`bsd`.`price`,0) + ifnull(`dsd`.`price`,0)) + ifnull(`psd`.`price`,0)))) AS `price_photo` FROM ((((`customerrvdetails` `crv` left join `adminpackagedetails` `adp` on((`crv`.`service_id` = `adp`.`package_id`))) left join `bandservicedetails` `bsd` on((`adp`.`band_sv_id` = `bsd`.`service_id`))) left join `decoservicedetails` `dsd` on((`adp`.`deco_sv_id` = `dsd`.`service_id`))) left join `photographyservicedetails` `psd` on((`adp`.`photo_sv_id` = `psd`.`service_id`))) WHERE (`crv`.`rvType` = 'package')  ;

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
  ADD UNIQUE KEY `service_name` (`service_name`,`service_provider_id`,`band_type`,`other_band_type`,`no_of_players`) USING BTREE,
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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD UNIQUE KEY `service_name and service provider unique key` (`service_name`,`service_provider_id`,`decoration_item`,`theme`) USING BTREE,
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
  ADD UNIQUE KEY `service_type` (`service_type`,`hall_name`,`service_provider_id`,`max_crowd`,`ac_status`) USING BTREE,
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
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`,`service_provider_id`,`photo_features`,`other_features`,`price`) USING BTREE,
  ADD KEY `photodeet to service provider user FK on service provider id` (`service_provider_id`);

--
-- Indexes for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  ADD PRIMARY KEY (`service_provider_id`,`business_id`,`email`),
  ADD KEY `FK on email users-spuser` (`email`);

--
-- Indexes for table `spverifydoc`
--
ALTER TABLE `spverifydoc`
  ADD PRIMARY KEY (`email`);

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
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bandservicedetails`
--
ALTER TABLE `bandservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `calendar_dates`
--
ALTER TABLE `calendar_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `msg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  MODIFY `rv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customeruser`
--
ALTER TABLE `customeruser`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `decoservicedetails`
--
ALTER TABLE `decoservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_confirmation`
--
ALTER TABLE `package_confirmation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  MODIFY `service_provider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`%` EVENT `ad_payment_time_out_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-04-27 00:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
   UPDATE customerrvdetails
SET status = 'canceled', remarks = 'advance payment time out'
WHERE status = 'confirm' AND payment = 'not-paid'  AND DATEDIFF(rvDate, NOW()) <= 6;
END$$

CREATE DEFINER=`root`@`%` EVENT `confirmation_time_out_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-04-27 00:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
   UPDATE customerrvdetails
SET status = 'canceled', remarks = 'confirmation time out'
WHERE status = 'pending' AND DATEDIFF(rvDate, NOW()) <= 9;
END$$

CREATE DEFINER=`root`@`%` EVENT `full_payment_time_out_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-04-27 00:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
   UPDATE customerrvdetails
SET status = 'canceled', remarks = 'full payment time out'
WHERE status = 'confirm' AND payment = 'ad-paid' AND DATEDIFF(rvDate, NOW()) <= 2;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
