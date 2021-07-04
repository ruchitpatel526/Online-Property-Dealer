-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 05:45 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `name` varchar(40) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `email_address` varchar(20) NOT NULL,
  `query` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`name`, `contact_no`, `email_address`, `query`) VALUES
('tej', 1234567890, 'rds@gmail.com', 'why is this so'),
('riddhi', 1234567890, 'ridsnv96@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `dealer_info`
--

CREATE TABLE `dealer_info` (
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dealer_id` int(20) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `accountno` int(40) NOT NULL,
  `pin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer_info`
--

INSERT INTO `dealer_info` (`username`, `password`, `dealer_id`, `contact_no`, `emailid`, `accountno`, `pin`) VALUES
('riddhi', 'vaishali', 4, 1234567890, 'ridsnv96@gmail.com', 0, 0),
('vaishali', 'riddhi', 5, 1020304050, 'ridsnv96@gmail.com', 0, 0),
('admin', 'ridvaish', 6, 0, '', 0, 0),
('reddy', 'vaishali', 9, 2147483647, 'reddy@gmail.com', 4567, 4567),
('priya', 'vaishali', 10, 2147483647, 'priya@gmail.com', 7412, 7412),
('vaishu', 'riddhi', 11, 2147483647, 'vaishu@gmail.com', 4561, 4561),
('vora', 'riddhi', 12, 2147483647, 'vora@gmail.com', 1230, 1230),
('dffd', 'dsfdf', 13, 2313, 'dffaf', 34324, 2342),
('abcd', 'asdf', 14, 123213, 'sjdhjsah', 13123, 2313),
('priyanka', 'asdf', 15, 1334978, 'ridsnv96@gmail.com', 1234, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `keywordlist`
--

CREATE TABLE `keywordlist` (
  `keyword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywordlist`
--

INSERT INTO `keywordlist` (`keyword`) VALUES
('2BHK'),
('3BHK'),
('1BHK'),
('Farmhouse'),
('Commercial'),
('Residential Apartmen'),
('Independent House'),
('below 5 lac'),
('below 10 lac');

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE `property_info` (
  `dealer_id` int(10) NOT NULL,
  `property_id` int(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `type` varchar(40) NOT NULL,
  `price` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `amenites` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`dealer_id`, `property_id`, `location`, `area`, `type`, `price`, `name`, `image`, `amenites`) VALUES
(4, 7, 'Delhi', '', 'Commercial', 5000, 'High Street Retail Shop', 'property9.jpg', ''),
(4, 8, 'Surat', '', 'Residential Apartment', 12000, 'VSR Park Street', 'property6.jpg', ''),
(4, 9, 'Mumbai', '', 'Commercial', 100000000, 'Imperial Mindspace', 'property2.jpg', ''),
(4, 10, 'Chennai', '2', 'Residential Apartment', 7000000, 'Pantha Niwas', 'property6.jpg', ''),
(10, 12, 'Hyderabad', '2BHK', 'Farmhouse', 4100000, 'VSR Park Street', 'farmhouse.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer_info`
--
ALTER TABLE `dealer_info`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `property_info`
--
ALTER TABLE `property_info`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `dealer_id` (`dealer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer_info`
--
ALTER TABLE `dealer_info`
  MODIFY `dealer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `property_info`
--
ALTER TABLE `property_info`
  MODIFY `property_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_info`
--
ALTER TABLE `property_info`
  ADD CONSTRAINT `property_info_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer_info` (`dealer_id`),
  ADD CONSTRAINT `property_info_ibfk_2` FOREIGN KEY (`dealer_id`) REFERENCES `dealer_info` (`dealer_id`),
  ADD CONSTRAINT `property_info_ibfk_3` FOREIGN KEY (`dealer_id`) REFERENCES `dealer_info` (`dealer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_info_ibfk_4` FOREIGN KEY (`dealer_id`) REFERENCES `dealer_info` (`dealer_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
