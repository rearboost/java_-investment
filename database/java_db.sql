-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 01:55 AM
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
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `cheque_id` int(7) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `valid_date` date NOT NULL,
  `exchange_date` date NOT NULL,
  `cheque_value` double(10,2) NOT NULL,
  `interest` int(5) NOT NULL,
  `exchange_amt` double(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cust_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'JI-00001', 'anne fernando', '984567892V', 'Nuwara road, Kadawatha', '0771234567', '', ''),
(2, 'JI-00002', 'Imashi Bhagya', '928578954V', 'Bambalapitiya', '9477123400', '', ''),
(4, 'JI-00003', 'Indunil Sanjeewa', '984567892V', 'No.43/D/4, 3rd Lane, Galwarusa, Korathota, Kaduwela.', '0766652982', '', ''),
(5, 'JI-00005', 'Janith Lakshan', '964789458V', 'Karathota, Kaduwela.', '0117894562', '0774854854', 'JI-00005.jpg'),
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

INSERT INTO `loan` (`loan_no`, `branch`, `centerID`, `customerID`, `loanType`, `contractNo`, `loanAmt`, `terms`, `interestRate`, `rental`, `inspectionDate`, `disburseDate`, `gurantee1`, `gurantee2`, `loanStep`, `status`) VALUES
(1, 'Kalutara', 2, 4, 'weekly', 'YT00001', 15000.00, 16, 5.00, 1125.00, '2021-06-02', '2021-06-04', '', '', 1, 1),
(2, 'Kalutara', 2, 2, 'weekly', 'YT00004', 5000.00, 8, 6.00, 700.00, '2021-04-24', '2021-04-26', '', '', 1, 0),
(3, 'Colombo', 1, 1, 'weekly', 'CL00003', 10000.00, 16, 9.00, 850.00, '2021-04-30', '2021-05-01', '', '', 1, 1),
(4, 'Kalutara', 2, 2, 'weekly', 'YT00002', 10000.00, 16, 6.00, 775.00, '2021-06-01', '2021-06-04', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_installement`
--

CREATE TABLE `loan_installement` (
  `id` int(7) NOT NULL,
  `li_date` varchar(25) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `arrears` double(10,2) NOT NULL,
  `total_paid` double(10,2) NOT NULL,
  `outstanding` decimal(10,2) NOT NULL DEFAULT '0.00',
  `loanNo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_installement`
--

INSERT INTO `loan_installement` (`id`, `li_date`, `month`, `year`, `paid`, `arrears`, `total_paid`, `outstanding`, `loanNo`) VALUES
(1, '2021-05-03', '06', '2021', 700.00, 0.00, 700.00, '4900.00', 2),
(2, '2021-05-10', '06', '2021', 600.00, 100.00, 1300.00, '4300.00', 2),
(3, '2021-05-24', '06', '2021', 1400.00, 100.00, 2700.00, '2900.00', 2),
(4, '2021-05-31', '06', '2021', 1000.00, -200.00, 3700.00, '1900.00', 2),
(5, '2021-06-07', '06', '2021', 500.00, 0.00, 4200.00, '1400.00', 2),
(6, '2021-06-14', '06', '2021', 700.00, 0.00, 4900.00, '700.00', 2),
(8, '2021-06-21', '06', '2021', 700.00, 0.00, 5600.00, '0.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `special_days`
--

CREATE TABLE `special_days` (
  `id` int(11) NOT NULL,
  `poyaday` varchar(50) NOT NULL,
  `day_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_days`
--

INSERT INTO `special_days` (`id`, `poyaday`, `day_index`) VALUES
(1, '2021-01-28', 4),
(2, '2021-02-26', 5),
(3, '2021-03-28', 0),
(4, '2021-04-26', 1),
(5, '2021-05-26', 3),
(6, '2021-06-24', 4),
(7, '2021-07-23', 5),
(8, '2021-08-22', 0),
(9, '2021-09-20', 1),
(10, '2021-10-20', 3),
(11, '2021-11-18', 4),
(12, '2021-12-18', 6);

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
(1, '2021', '06', '40000.00', '6300.00', '2021-06-04'),
(2, '2021', '01', '0.00', '0.00', '2021-06-04'),
(3, '2021', '02', '0.00', '0.00', '2021-06-04'),
(4, '2021', '03', '0.00', '0.00', '2021-06-04'),
(5, '2021', '04', '0.00', '0.00', '2021-06-04'),
(6, '2021', '05', '0.00', '0.00', '2021-06-04'),
(7, '2021', '07', '0.00', '0.00', '2021-06-04'),
(8, '2021', '08', '0.00', '0.00', '2021-06-04'),
(9, '2021', '09', '0.00', '0.00', '2021-06-04'),
(10, '2021', '10', '0.00', '0.00', '2021-06-04'),
(11, '2021', '11', '0.00', '0.00', '2021-06-04'),
(12, '2021', '12', '0.00', '0.00', '2021-06-04');

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
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`cheque_id`);

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
-- Indexes for table `special_days`
--
ALTER TABLE `special_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
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
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `cheque_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `loan_installement`
--
ALTER TABLE `loan_installement`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `special_days`
--
ALTER TABLE `special_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
