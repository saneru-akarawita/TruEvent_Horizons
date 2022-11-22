-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 06:53 AM
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
(7, 'P002', 'Birthday', 'Birthday Package Lite', '3000', 'Wayo', 'Normad Decorations', ''),
(8, 'P003', 'Birthday', 'Birthday Package', '3000', 'Wayo', '', 'Red Ants'),
(9, 'P005', 'Anniversary', 'Anniversary Package 1', '3000', '', '', 'Red Ants'),
(10, 'P004', 'Coparate Event', 'Coparate Package 2', '5000.00', 'Naadha Gama', 'Cris Deco Company', 'I clicks Captures');

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
(2, 'Saneru', 'Akarawita', 'saneru.akarawita@gmail.com', 'S.U. Akarawita', '12345678', 'Sampath Bank', 'Homagama', '2022-11-13 22:19:25');

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
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customerrvdetails`
--

INSERT INTO `customerrvdetails` (`rv_id`, `eventName`, `rvDate`, `rvTime`, `rvType`, `spType`, `spName`, `packageType`, `packageName`, `status`, `payment`, `customer_id`) VALUES
(11, '25th Birthday - Saneru', '2022-11-25', '21:45:00', 'service', 'Hotel', 'Birthday', NULL, NULL, 'pending', 'not-paid', 1),
(12, '10th Anniversary - Hansika', '2022-11-25', '21:45:00', 'package', NULL, NULL, 'Anniversary', '10th Anniversary Celebration', 'pending', 'not-paid', 1),
(13, 'Get together party', '2022-11-16', '11:30:00', 'service', 'Decoration', 'Harini Deco', NULL, NULL, 'pending', 'not-paid', 2),
(14, 'Perera\'s Farewell Party', '2022-11-30', '18:00:00', 'package', NULL, NULL, 'Coparate Event', 'Farewell Party', 'pending', 'not-paid', 2),
(15, 'High School Graduation batch 19', '2022-12-25', '16:00:00', 'package', NULL, NULL, 'Graduation Party', 'Graduation', 'pending', 'not-paid', 1),
(16, 'Sachin\'s Wedding', '2022-12-05', '09:00:00', 'service', 'Photography', 'Red Ants', NULL, NULL, 'pending', 'not-paid', 2),
(17, 'Pamith\'s Birthday', '2022-11-20', '19:30:00', 'service', 'Photography', 'Red Ants', NULL, NULL, 'pending', 'not-paid', 1),
(22, 'manjula\'s retirement party', '2022-12-12', '18:30:00', 'package', NULL, NULL, 'Coparate Event', 'Farewell Party', 'pending', 'not-paid', 3);

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
(1, 'Chirasi', 'Amaya', 'chirasiamaya99@gmail.com', '0711351868', 'Matara', '2022-11-14 14:47:17'),
(2, 'Saneru', 'Akarawita', '2020cs007@stu.ucsc.cmb.ac.lk', '0770338069', 'Colombo', '2022-11-21 19:58:35'),
(3, 'Chandika', 'Akarawita', 'chandika68@gmail.com', '0777471495', 'Colombo', '2022-11-22 08:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `decoservicedetails`
--

CREATE TABLE `decoservicedetails` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` text NOT NULL,
  `description` longtext NOT NULL,
  `service_provider_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `decoservicedetails`
--

INSERT INTO `decoservicedetails` (`service_id`, `service_name`, `occasion`, `theme`, `price`, `description`, `service_provider_id`) VALUES
(7, 'Get together Celebration', 'Birthday', 'Purple', '3000', 'This is a sample description', 2),
(8, 'Get together Celebration', 'Anniversary', 'Outdoor', '4800.00', 'this is a sample description', 4);

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
  `service_provider_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hotelservicedetails`
--

INSERT INTO `hotelservicedetails` (`service_id`, `service_type`, `hall_image`, `hall_name`, `location`, `hall_type`, `max_crowd`, `ac_status`, `price`, `other_facilities`, `service_provider_id`) VALUES
(21, 'Birthday Parties', 0x696d6167652e6a7067, 'Grand Kandian Hall', '4th Floor East Wing', 'indoor', 250, 1, '4500.00', 'DJ Included', 3),
(22, 'Anniversary Parties', 0x7369676e75702e6a7067, 'Grand South Hall', '1th Floor West Wing', 'outdoor', 100, 0, '3000.00', 'Canapy Cover Included', 3),
(23, 'Welcome Parties', 0x686f6d65207061676520696d6167652e6a7067, 'Margeritta Hall', 'Ground Floor', 'indoor', 500, 0, '2500.00', 'DJ Included', 3),
(24, 'Night Functions', 0x686f6d65207061676520696d6167652e6a7067, 'Margeritta Hall', 'Ground Floor', 'outdoor', 600, 1, '5500.00', 'DJ Included', 3),
(25, 'Night Functions', 0x436c617373204469616772616d2e64726177696f202831292e706e67, 'Golden Crown Hall', 'First floor', 'indoor', 500, 1, '5000.00', 'Dance Floor, Decoration', 5);

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `email` varchar(255) NOT NULL,
  `OTP` mediumint NOT NULL,
  `timestamp` datetime NOT NULL,
  `type` int NOT NULL
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
(1, 'ABC3323', 'Akarawita Pvt.', 'temp2@gmail.com', '0777471495', 'Colombo', '6', '23456789', 'S.U. Akarawita', 'Seylan Bank', 'Kottawa', 1, '2022-11-14 19:35:45'),
(2, 'DECO3343', 'Harini Decoration', 'harinij@gmail.com', '0775511542', 'Galle', '5', '12345678', 'Harini Jayawardhana', 'Peoples bank', 'Galle', 1, '2022-11-16 12:01:40'),
(3, 'STR0025', 'Udawatta Stores', 'tempemail@gmail.com', '0773739428', 'Kaluthara', '4', '12345678', 'Udawatta Stores', 'Sampath Bank', 'Kaluthara', 0, '2022-11-14 19:24:59'),
(4, 'DEC0012', 'Sanduni Decoration', 'sanduni321@gmail.com', '0775566543', 'Colombo', '5', '12348765', 'Sanduni Aaloka', 'Seylan Bank', 'Maharagama', 1, '2022-11-22 11:13:06'),
(5, 'HOT1234', 'Hilton', 'hilton123@gmail.com', '0112456789', 'Colombo', '4', '87654321', 'Hilton Hotels', 'Peoples Bank', 'Colombo 07', 0, '2022-11-22 11:21:24');

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
('2020cs007@stu.ucsc.cmb.ac.lk', '$2y$10$fOi2VY9/XkkkZmflMwAj/OSLzUvm1GDPysjQvT7IdDf0pErrBp23S', 0, 3, 'verified'),
('chandika68@gmail.com', '$2y$10$QkcZGXp1MvsQpVQdtDRuHO0rjFw0tTK88fVIjImc5V7Qfckt12VNi', 0, 3, 'verified'),
('chirasiamaya99@gmail.com', '$2y$10$iuMwgzLyOgIbownFPFRgfea2j0ZSipLlgONX/IZcTxblq3TqZQkhW', 0, 3, 'verified'),
('harinij@gmail.com', '$2y$10$YPNev1P0QBJlK1HnwrP60.E28VfmIM3sJrx//AqALqpHLHtbt11uS', 0, 5, 'verified'),
('hilton123@gmail.com', '$2y$10$ECaoMqD4VKKzzP.B15G9suApUaOSuorKrLBZ94nMgckd1Y/EPagfy', 0, 4, 'verified'),
('sanduni321@gmail.com', '$2y$10$R47aEezHX9mUSShQjLI2E.8.gKORsr./a5q.9GWT.vgYt/hGizXs2', 0, 5, 'verified'),
('saneru.akarawita@gmail.com', '$2y$10$MQCWL4TMo64UnvVn4hTdkutNdrDR6sF/8tQYsTe89vjuIW0B8VATm', 0, 2, 'verified'),
('superadmin@gmail.com', '$2y$10$7Gpx/uJ9Z.IaIFHjuu7y6eBjwMpvDxIExc2NAuhfodK/wHDC86PnG', 0, 1, 'verified'),
('temp2@gmail.com', '$2y$10$6y1UzJIqJ1g4gUM1TfZSeey/.UB/LKC96jpWSd5LkT8oahjtvlgf6', 0, 6, 'verified'),
('tempemail@gmail.com', '$2y$10$JipreH9AoMELKQYcKeL.a.31RmKX0IVqMGyfuAHTd3.dbNe3n/M6q', 0, 4, 'verified');

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
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customerrvdetails`
--
ALTER TABLE `customerrvdetails`
  MODIFY `rv_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customeruser`
--
ALTER TABLE `customeruser`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `decoservicedetails`
--
ALTER TABLE `decoservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotelservicedetails`
--
ALTER TABLE `hotelservicedetails`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  MODIFY `service_provider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD CONSTRAINT `FK on email users-adminuser` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `serviceprovideruser`
--
ALTER TABLE `serviceprovideruser`
  ADD CONSTRAINT `FK on email users-spuser` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
