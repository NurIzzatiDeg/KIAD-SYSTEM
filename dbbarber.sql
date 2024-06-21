-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 04:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbarber`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_ID` int(2) NOT NULL,
  `emp_address` varchar(80) NOT NULL,
  `city_ID` int(2) NOT NULL,
  `areaCode` int(6) NOT NULL,
  `state_ID` int(2) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_ID`, `emp_address`, `city_ID`, `areaCode`, `state_ID`, `country`) VALUES
(1, 'NO.7 LOTONG 4 TAMAN BUNGA SEROJA', 1000, 1000, 9, 'MALAYSIA'),
(2, 'JALAN MALINJA , NO.28 TAMAN BUNGA PADI', 1000, 1000, 9, 'MALAYSIA');

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `barber_id` int(2) NOT NULL,
  `barber_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`barber_id`, `barber_name`) VALUES
(16, 'SHUKRI YAHYA'),
(17, 'ADI PUTRA'),
(18, 'MEERQEEN');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_ID` int(2) NOT NULL,
  `cityName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_ID`, `cityName`) VALUES
(1000, 'KANGAR');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `username`, `password`, `email`) VALUES
(129, 'eman', 'eman1234', 'emanwon@gmail.com'),
(138, 'alif', 'alifirfan', 'aliframzi2110@gmail.com'),
(139, 'kimi', 'kimi1234', '2021467482@student.uitm.edu.my'),
(140, 'dini', 'dini1234', 'dini236@gmail.com'),
(141, 'irfan', 'irfan1234', 'irfan1234@gmail.com'),
(142, 'aiiman', 'aiman1234', 'aiman1234@gmail.com'),
(143, 'aiman', 'aiman1234', 'aiman@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `date_time`
--

CREATE TABLE `date_time` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_ID` int(4) NOT NULL,
  `employeeType_ID` int(2) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `emp_IC` varchar(12) NOT NULL,
  `address_ID` int(2) NOT NULL,
  `emp_numPhone` varchar(12) NOT NULL,
  `emp_image` varchar(30) NOT NULL,
  `emp_status` varchar(10) NOT NULL,
  `emp_username` varchar(10) NOT NULL,
  `emp_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_ID`, `employeeType_ID`, `emp_name`, `emp_IC`, `address_ID`, `emp_numPhone`, `emp_image`, `emp_status`, `emp_username`, `emp_password`) VALUES
(101, 1, 'aiman', '031021090167', 1, '019-4459910', '', 'SINGLE', 'aimanino', 'aiman1234'),
(203, 1, 'fitri', '031026090047', 2, '019-5666888', '', 'SINGLE', 'fitriyes03', 'fitridc123'),
(204, 1, 'talhah', '031004090067', 2, '019-9997782', '', 'SINGLE', 'talhah32', 'talhah1234'),
(206, 1, 'reza', '030607090187', 1, '019-3256100', '', 'SINGLE', 'reza72', 'reza1234');

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE `employeetype` (
  `employeeType_ID` int(2) NOT NULL,
  `employee_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`employeeType_ID`, `employee_type`) VALUES
(1, 'barber'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_ID` int(3) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `service_ID` int(4) NOT NULL,
  `barber_id` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_ID` int(4) NOT NULL,
  `price` double(15,2) NOT NULL,
  `serv_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_ID`, `price`, `serv_Type`) VALUES
(101, 20.00, 'HAIRCUT'),
(102, 35.00, 'HAIRCUT & WASH'),
(103, 28.00, 'HAIRCUT & BEARD TRIM'),
(104, 50.00, 'HAIRCUT & WASH + BEARD TRIM');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_ID` int(2) NOT NULL,
  `state_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_ID`, `state_Name`) VALUES
(1, 'JOHOR'),
(2, 'KEDAH'),
(3, 'KELANTAN'),
(4, 'MELAKA'),
(5, 'NEGERI SEMBILAN'),
(6, 'PAHANG'),
(7, 'PULAU PINANG'),
(8, 'PERAK'),
(9, 'PERLIS'),
(10, 'SELANGOR'),
(11, 'TERENGGANU'),
(12, 'SABAH'),
(13, 'SARAWAK'),
(14, 'KUALA LUMPUR'),
(15, 'LABUAN'),
(16, 'PUTRAJAYA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_ID`),
  ADD KEY `city_ID` (`city_ID`),
  ADD KEY `state_ID` (`state_ID`);

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`barber_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `date_time`
--
ALTER TABLE `date_time`
  ADD UNIQUE KEY `date` (`date`,`time`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_ID`),
  ADD KEY `employeeType_ID` (`employeeType_ID`),
  ADD KEY `address_ID` (`address_ID`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`employeeType_ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_ID`),
  ADD UNIQUE KEY `date` (`date`,`time`),
  ADD UNIQUE KEY `cust_id` (`cust_id`,`service_ID`,`barber_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`city_ID`) REFERENCES `city` (`city_ID`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`state_ID`) REFERENCES `state` (`state_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employeeType_ID`) REFERENCES `employeetype` (`employeeType_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`address_ID`) REFERENCES `address` (`address_ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`service_ID`) REFERENCES `service` (`service_ID`),
  ADD CONSTRAINT `receipt_ibfk_3` FOREIGN KEY (`barber_id`) REFERENCES `barber` (`barber_id`),
  ADD CONSTRAINT `receipt_ibfk_4` FOREIGN KEY (`date`) REFERENCES `date_time` (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
