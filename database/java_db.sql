-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 10:18 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `java_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(11) NOT NULL,
  `center_code` varchar(50) NOT NULL,
  `center_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `center_code`, `center_name`) VALUES
(1, 'C001', 'Colombo'),
(2, 'C002', 'Yatadola');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `centerID` int(11) NOT NULL,
  `li_date` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `tot_collection` decimal(10,2) NOT NULL,
  `tot_arrears` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `centerID`, `li_date`, `year`, `month`, `tot_collection`, `tot_arrears`) VALUES
(1, 1, '2021-06-16', '2021', '06', '26450.00', '2958.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '100.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `memberID`, `name`, `NIC`, `address`, `contact`, `contact2`, `image`) VALUES
(1, 'JI-00001', 'anne fernando', '984567892V', 'Nuwara road, Kadawatha', '771234567', '117897897', '100.jpg'),
(2, 'JI-00002', 'Imashi Bhagya', '928578954V', 'Bambalapitiya', '9477123400', '', '100.jpg'),
(4, 'JI-00003', 'Indunil Sanjeewa', '988746892V', 'No.43/D/4, 3rd Lane, Galwarusa, Korathota, Kaduwela.', '0766652982', '', '100.jpg'),
(5, 'JI-00005', 'Janith Lakshan', '964789458V', 'No:01,Karathota, Kaduwela.', '117894568', '774854855', 'JI-00005.jpg'),
(6, 'JI-00006', 'Sachintha', '936547892V', 'Aluthgama', '0771234567', '', '100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_no` int(7) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `centerID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `loanType` varchar(10) NOT NULL DEFAULT 'weekly',
  `contractNo` varchar(50) NOT NULL,
  `loanAmt` double(10,2) NOT NULL,
  `terms` int(11) NOT NULL,
  `interestRate` double(10,2) NOT NULL,
  `rental` double(10,2) NOT NULL,
  `daily_rental` decimal(10,2) NOT NULL,
  `inspectionDate` varchar(20) NOT NULL,
  `disburseDate` varchar(20) NOT NULL,
  `gurantee1` varchar(250) NOT NULL,
  `gurantee2` varchar(250) NOT NULL,
  `loanStep` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `branch`, `centerID`, `customerID`, `loanType`, `contractNo`, `loanAmt`, `terms`, `interestRate`, `rental`, `daily_rental`, `inspectionDate`, `disburseDate`, `gurantee1`, `gurantee2`, `loanStep`, `status`) VALUES
(1, 'Nugegoda', 2, 1, 'weekly', 'YT00001', 20000.00, 16, 5.00, 1500.00, '200.00', '2021-05-01', '2021-05-01', 'Sarath,\r\n897845787V,\r\nKarathota', 'Sumanasiri,,\r\n784541741V,\r\nKaduwela', 1, 1),
(2, 'Nugegoda', 2, 2, 'weekly', 'YT00002', 10000.00, 12, 5.00, 958.00, '128.00', '2021-05-01', '2021-05-02', '', '', 2, 1),
(3, 'Nugegoda', 1, 4, 'monthly', 'CL00003', 25000.00, 16, 6.00, 7750.00, '258.00', '2021-04-20', '2021-04-21', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_installement`
--

CREATE TABLE `loan_installement` (
  `id` int(7) NOT NULL,
  `collectionID` int(11) NOT NULL,
  `li_date` varchar(25) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `arrears` double(10,2) NOT NULL,
  `total_paid` double(10,2) NOT NULL,
  `outstanding` decimal(10,2) NOT NULL DEFAULT '0.00',
  `loanNo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_installement`
--

INSERT INTO `loan_installement` (`id`, `collectionID`, `li_date`, `paid`, `arrears`, `total_paid`, `outstanding`, `loanNo`) VALUES
(1, 1, '2021-06-16', 8000.00, 1200.00, 8000.00, '16000.00', 1),
(2, 1, '2021-06-16', 4000.00, 1760.00, 4000.00, '7496.00', 2),
(3, 1, '2021-06-16', 14450.00, -2.00, 14450.00, '16550.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL,
  `year` varchar(500) NOT NULL,
  `month` varchar(500) NOT NULL,
  `loanAMT` decimal(18,2) NOT NULL DEFAULT '0.00',
  `debtAMT` decimal(18,2) NOT NULL DEFAULT '0.00',
  `createDate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `year`, `month`, `loanAMT`, `debtAMT`, `createDate`) VALUES
(1, '2021', '06', '55000.00', '26450.00', '2021-06-16'),
(2, '2021', '01', '0.00', '0.00', '2021-06-16'),
(3, '2021', '02', '0.00', '0.00', '2021-06-16'),
(4, '2021', '03', '0.00', '0.00', '2021-06-16'),
(5, '2021', '04', '0.00', '0.00', '2021-06-16'),
(6, '2021', '05', '0.00', '0.00', '2021-06-16'),
(7, '2021', '07', '0.00', '0.00', '2021-06-16'),
(8, '2021', '08', '0.00', '0.00', '2021-06-16'),
(9, '2021', '09', '0.00', '0.00', '2021-06-16'),
(10, '2021', '10', '0.00', '0.00', '2021-06-16'),
(11, '2021', '11', '0.00', '0.00', '2021-06-16'),
(12, '2021', '12', '0.00', '0.00', '2021-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `id` int(7) NOT NULL,
  `li_date` varchar(25) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `arrears` double(10,2) NOT NULL DEFAULT '0.00',
  `total_paid` double(10,2) NOT NULL DEFAULT '0.00',
  `outstanding` decimal(10,2) NOT NULL DEFAULT '0.00',
  `loanNo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `user_role` int(5) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_role`, `center_id`) VALUES
(1, 'Nmc', '21232f297a57a5a743894a0e4a801fc3', 0, 0),
(2, 'sa', '698d51a19d8a121ce581499d7b701668', 1, 1),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_no`);

--
-- Indexes for table `loan_installement`
--
ALTER TABLE `loan_installement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loan_installement`
--
ALTER TABLE `loan_installement`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
