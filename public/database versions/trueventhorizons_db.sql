-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 09:53 AM
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
  `package_code` varchar(15) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `band_choice` varchar(255) DEFAULT NULL,
  `deco_choice` varchar(255) DEFAULT NULL,
  `photo_choice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminpackagedetails`
--

INSERT INTO `adminpackagedetails` (`package_id`, `package_code`, `package_type`, `package_name`, `price`, `band_choice`, `deco_choice`, `photo_choice`) VALUES
(1, 'P001', 'Birthday', '25th Birthday Package', '50000', 'Stage Revolution', 'Urban 57 Decorations - Get-Togethers', 'Red Ants Photography'),
(2, 'P002', 'Anniversary', '10th Anniversary Package', '100000', 'Ecstasy Bands', 'Urban 57 Decorations - Anniversary Parties', ''),
(3, 'P003', 'Coparate Event', 'Farewell Party Package', '90000', '', 'Urban 57 Decorations - Night Functions', 'Image Studio'),
(4, 'P004', 'Coparate Event', '25th Birthday Package', '82000', 'Stage Revolution', 'Urban 57 Decorations - Welcome Parties', 'Red Ants Photography');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `admin_id` int NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `service_name` varchar(255) NOT NULL,
  `band_type` varchar(255) NOT NULL,
  `other_band_type` varchar(255) NOT NULL,
  `no_of_players` int NOT NULL,
  `price` text NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(26, 1215415318, 1460619877, 'moko wenne');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `user_id` int NOT NULL,
  `unique_id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `img`, `status`) VALUES
(1, 816865346, 'Chamila', 'Amarathunga', 'chamila.amarathunga@gmail.com', NULL, 'Offline now'),
(2, 1460619877, 'Kaveesha', 'Muthukuda', '2020cs007@stu.ucsc.cmb.ac.lk', NULL, 'Active now'),
(3, 1215415318, 'Saneru', 'Akarawita', 'saneru.akarawita@gmail.com', NULL, 'Offline now'),
(4, 277022096, 'Wayo Band', '', 'band321@gmail.com', NULL, 'Offline now'),
(5, 960514050, 'Red Ants Photography', '', 'photo321@gmail.com', NULL, 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `customerrvdetails`
--

CREATE TABLE `customerrvdetails` (
  `rv_id` int NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `rvDate` date NOT NULL,
  `rvTime` time NOT NULL,
  `rvType` varchar(10) NOT NULL,
  `spType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `spName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `packageType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `packageName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `customer_id` int NOT NULL,
  `sp_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customerrvdetails`
--

INSERT INTO `customerrvdetails` (`rv_id`, `eventName`, `rvDate`, `rvTime`, `rvType`, `spType`, `spName`, `packageType`, `packageName`, `status`, `payment`, `customer_id`, `sp_id`) VALUES
(1, 'After Interim 3.0 Party', '2023-01-25', '19:00:00', 'service', 'Hotel', 'SHANGRI - LA - Shang Palace', NULL, NULL, 'pending', 'not-paid', 1, '1'),
(2, 'kaveesha\'s Farewell Party', '2023-01-24', '20:00:00', 'package', NULL, NULL, 'Coparate Event', 'Farewell Party Package', 'pending', 'not-paid', 1, '2,3'),
(5, 'Kaveesha\'s Birthday', '2022-12-30', '17:00:00', 'service', 'Hotel', 'SHANGRI - LA - Central Ocean View', NULL, NULL, 'pending', 'not-paid', 1, '1'),
(6, 'kaveesha\'s Farewell Party', '2023-01-23', '19:00:00', 'service', 'Decoration', 'Urban 57 Decorations - Birthday Parties', NULL, NULL, 'pending', 'not-paid', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `customeruser`
--

CREATE TABLE `customeruser` (
  `customer_id` int NOT NULL,
  `fname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `district` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `service_name` varchar(255) NOT NULL,
  `decoration_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` text NOT NULL,
  `other_decoration` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `hotelservicedetails`
--

CREATE TABLE `hotelservicedetails` (
  `service_id` int NOT NULL,
  `service_type` text NOT NULL,
  `hall_image` longblob NOT NULL,
  `hall_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location` text NOT NULL,
  `hall_type` text NOT NULL,
  `max_crowd` int NOT NULL,
  `ac_status` int NOT NULL,
  `price` text NOT NULL,
  `other_facilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hotelservicedetails`
--

INSERT INTO `hotelservicedetails` (`service_id`, `service_type`, `hall_image`, `hall_name`, `location`, `hall_type`, `max_crowd`, `ac_status`, `price`, `other_facilities`, `service_provider_id`, `active`) VALUES
(1, 'Night Functions', 0x322e6a7067, 'Shang Palace', '3rd Floor', 'indoor', 200, 1, '4500.00', '', 1, 1),
(2, 'Business Gatherings', 0x332e6a7067, 'Sapphyr Lounge', '1st floor', 'indoor', 100, 1, '3500.00', 'Audio Facilities', 1, 1),
(3, 'Birthday Parties', 0x322e6a7067, 'Central Ocean View', 'West Wing', 'indoor', 150, 1, '5000.00', '', 1, 0),
(4, 'Get-Togethers', 0x332e6a7067, 'Sky View', 'RoofTop', 'outdoor', 200, 0, '3500.00', 'AC provided if needed', 1, 1),
(5, 'General Events', 0x322e6a7067, 'Harbour Court', 'East Wing', 'indoor', 350, 1, '4500.00', '', 3, 1),
(6, 'Welcome Parties', 0x332e6a7067, 'Tea Lounge', 'Ground Floor', 'indoor', 200, 1, '3500.00', '', 4, 1),
(7, 'Anniversary Parties', 0x332e6a7067, 'Royal Hall', '1st floor', 'indoor', 100, 1, '5000', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `email` varchar(255) NOT NULL,
  `OTP` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photographyservicedetails`
--

CREATE TABLE `photographyservicedetails` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `photo_features` varchar(255) NOT NULL,
  `other_features` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `service_provider_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovideruser`
--

CREATE TABLE `serviceprovideruser` (
  `service_provider_id` int NOT NULL,
  `business_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sp_category` varchar(255) NOT NULL,
  `account_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `travel_flag` int NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fail_attempts` int NOT NULL,
  `user_type` int NOT NULL,
  `vstatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD PRIMARY KEY (`package_id`);

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
-- Indexes for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `hotel service deet to service provider user FK on SP ID` (`service_provider_id`);

--
-- Indexes for table `otpverification`
--
ALTER TABLE `otpverification`
  ADD PRIMARY KEY (`email`,`type`);

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
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bandservicedetails`
--
ALTER TABLE `bandservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `msg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  MODIFY `rv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photographyservicedetails`
--
ALTER TABLE `photographyservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT;

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
