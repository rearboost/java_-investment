-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 23, 2021 at 08:49 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `center_name` varchar(150) NOT NULL,
  `leader` varchar(250) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `center_code`, `center_name`, `leader`, `contact`) VALUES
(1, 'C001', 'Colombo', 'leader 1', 111234567),
(2, 'C002', 'Yatadola', 'leader 02', 119874561),
(3, 'ANG003', 'Kalutara', '', 0);

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
  `tot_arrears` decimal(10,2) NOT NULL,
  `tot_outstanding` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `centerID`, `li_date`, `year`, `month`, `tot_collection`, `tot_arrears`, `tot_outstanding`) VALUES
(1, 1, '2021-06-16', '2021', '06', '26450.00', '2958.00', '0.00'),
(2, 2, '2021-06-25', '2021', '06', '2752.00', '3160.00', '20744.00'),
(3, 1, '2021-06-29', '2021', '06', '5760.00', '3000.00', '152790.00'),
(4, 1, '2021-06-30', '2021', '06', '33.00', '9661.00', '158517.00'),
(5, 1, '2021-06-30', '2021', '06', '33.00', '9661.00', '158517.00'),
(6, 2, '2021-06-30', '2021', '06', '46.00', '4594.00', '15954.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `center_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `addLine1` varchar(150) NOT NULL,
  `addLine2` varchar(150) NOT NULL,
  `addLine3` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '100.jpg',
  `image2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `memberID`, `center_id`, `name`, `NIC`, `addLine1`, `addLine2`, `addLine3`, `contact`, `contact2`, `image`, `image2`) VALUES
(1, 'JI-00001', 0, 'I.G JAYANTHI', '667682053v', '', '', '', '0777-7449296', '', '100.jpg', '100.jpg'),
(2, 'JI-00002', 0, 'T.P.G.S PRIYADARSHANI', '196684800691', '', '', '', '077-1267314', '', '100.jpg', '100.jpg'),
(3, 'JI-00003', 2, 'S.CHANDIMA MADANAYAKA', '197756901280', '', '', '', '076-0128646', '', '100.jpg', '100.jpg'),
(4, 'JI-00004', 0, 'B.DULANJILA MADUWANTHI', '926481223v', '', '', '', '075-4904424', '', '100.jpg', '100.jpg'),
(5, 'JI-00005', 0, 'W.K.A DEEPANI', '197178901619', '', '', '', '076-2927103', '', '100.jpg', '100.jpg'),
(6, 'JI-00006', 0, 'M.JAYANTHI MALA', '857440498V', '', '', '', '074-1574952', '', '100.jpg', '100.jpg'),
(7, 'JI-00007', 0, 'W.S RENUKA', '726050899V', '', '', '', '076-1266516', '', '100.jpg', '100.jpg'),
(8, 'JI-00008', 0, 'BALACHANDRAM PUSHPARANI', '957814123V', '', '', '', '075-0395917', '', '100.jpg', '100.jpg'),
(9, 'JI-00009', 0, 'A.KANDIMATHI', '805494808V', '', '', '', '075-5916642', '', '100.jpg', '100.jpg'),
(10, 'JI-00010', 0, 'H.K.NUWANTHIKA PRABASHINI', '', '', '', '', '077-2369414', '', '100.jpg', '100.jpg'),
(11, 'JI-00011', 0, 'M.K SACHI SULOCHANA', '895391425V', '', '', '', '077-6786745', '', '100.jpg', '100.jpg'),
(12, 'JI-00012', 0, 'K.MANJULA DEVI', '197177200423', '', '', '', '076-4980998', '', '100.jpg', '100.jpg'),
(13, 'JI-00013', 0, 'H.SHAMALI UDAYANGANI', '198480600283', '', '', '', '074-0662229', '', '100.jpg', '100.jpg'),
(14, 'JI-00014', 0, 'P.NIRMALI', '665170411V', '', '', '', '075-7271627', '', '100.jpg', '100.jpg'),
(15, 'JI-00015', 0, 'W.DON SUNETHRA', '627071370V', '', '', '', '075-0843821', '', '100.jpg', '100.jpg'),
(16, 'JI-00016', 0, 'RANAWEERAGE CHAMILA', '738102681V', '', '', '', '076-3106118', '', '100.jpg', '100.jpg'),
(17, 'JI-00017', 0, 'B.SUWISHANI MADUWANTHI', '966332700V', '', '', '', '076-7287547', '', '100.jpg', '100.jpg'),
(18, 'JI-00018', 0, 'R.M SUMANAWATHI', '198574404183', '', '', '', '071-1948403', '', '100.jpg', '100.jpg'),
(19, 'JI-00019', 0, 'A.RUKSHALA', '', '', '', '', '077-6377629', '', '100.jpg', '100.jpg'),
(20, 'JI-00020', 0, 'H.A.MADUSHA MADUMALI', '199377701592', '', '', '', '076-6602133', '', '100.jpg', '100.jpg'),
(21, 'JI-00021', 0, 'B.ARUNI SASIKUMAR', '907252264V', '', '', '', '075-7522491', '', '100.jpg', '100.jpg'),
(22, 'JI-00022', 0, 'MADUKA DARSHANI PERIS', '198679003496', '', '', '', '077-5690878', '', '100.jpg', '100.jpg'),
(23, 'JI-00023', 0, 'MANIKAM ROSMARI', '808530031V', '', '', '', '076-8855138', '', '100.jpg', '100.jpg'),
(24, 'JI-00024', 0, 'DOREYISAMI SULOCHANA', '655301780V', '', '', '', '072-3263451', '', '100.jpg', '100.jpg'),
(25, 'JI-00025', 0, 'SAMANTHI DILRUKSHI SILVA', '786150191V', '', '', '', '077-5981822', '', '100.jpg', '100.jpg'),
(26, 'JI-00026', 0, 'YOGANANDAN SARWADEWI', '705854491V', '', '', '', '076-9165049', '', '100.jpg', '100.jpg'),
(27, 'JI-00027', 0, 'SADATHARAKA SITHUMINI', '867303219V', '', '', '', '070-1697414', '', '100.jpg', '100.jpg'),
(28, 'JI-00028', 0, 'RAMACHANDRAN JEEWA INDRANI', '855201900V', '', '', '', '076-6705641', '', '100.jpg', '100.jpg'),
(29, 'JI-00029', 0, 'WEERAN RUBINI', '876835177V', '', '', '', '077-8122995', '', '100.jpg', '100.jpg'),
(30, 'JI-00030', 0, 'SIWANANDAN SIWAKUMAR', '857252845V', '', '', '', '077-8164327', '', '100.jpg', '100.jpg'),
(31, 'JI-00031', 0, 'PREETHI NALIKA', '916373627V', '', '', '', '075-2836848', '', '100.jpg', '100.jpg'),
(32, 'JI-00032', 0, 'NIROSHINI PRIYANTHI', '786054117V', '', '', '', '074-0899789', '', '100.jpg', '100.jpg'),
(33, 'JI-00033', 0, 'PRIYANGA UDESHIKA', '838440576V', '', '', '', '075-8362585', '', '100.jpg', '100.jpg'),
(34, 'JI-00034', 0, 'MUNIYANDI NIROSHINI', '198882500964', '', '', '', '075-7726658', '', '100.jpg', '100.jpg'),
(35, 'JI-00035', 0, 'WEERAN SHANTHI', '857895231V', '', '', '', '075-4519293', '', '100.jpg', '100.jpg'),
(36, 'JI-00036', 0, 'S.N KAMALAWATHI  FERNANDO', '635093889V', '', '', '', '076-3239520', '', '100.jpg', '100.jpg'),
(37, 'JI-00037', 0, 'FILISHIYA FERNANDO', '766503551V', '', '', '', '077-4184508', '', '100.jpg', '100.jpg'),
(38, 'JI-00038', 0, 'M.B DILRUKSHIKA UDAYAKUMARI', '865204272V', '', '', '', '076-9648043', '', '100.jpg', '100.jpg'),
(39, 'JI-00039', 0, 'WEERAN JAYA LECHCHUMI', '818185286V', '', '', '', '071-2779398', '', '100.jpg', '100.jpg'),
(40, 'JI-00040', 0, 'RAJAN ANUSHIYA', '708211958V', '', '', '', '077-9602789', '', '100.jpg', '100.jpg'),
(41, 'JI-00041', 0, 'SHANTHINI CRISTOPER', '828241028V', '', '', '', '076-4477334', '', '100.jpg', '100.jpg'),
(42, 'JI-00042', 0, 'ARUMUGAM KALYANI', '198462900419', '', '', '', '075-8588229', '', '100.jpg', '100.jpg'),
(43, 'JI-00043', 0, 'RAMAIYA KALI AMMA', '746612109V', '', '', '', '076-9431818', '', '100.jpg', '100.jpg'),
(44, 'JI-00044', 0, 'KRISTHAN SUBASINI', '876114976V', '', '', '', '074-1903114', '', '100.jpg', '100.jpg'),
(45, 'JI-00045', 0, 'RATHNAM SEENI AMMA', '665443620V', '', '', '', '075-2131689', '', '100.jpg', '100.jpg'),
(46, 'JI-00046', 0, 'HASITHA DUSHANTHI PERERA', '936483011V', '', '', '', '078-6288983', '', '100.jpg', '100.jpg'),
(47, 'JI-00047', 0, 'Y.P NIROSHIKA', '839304056V', '', '', '', '076-8827484', '', '100.jpg', '100.jpg'),
(48, 'JI-00048', 0, 'RAMANADAN MERI SWARNALATHA', '766731678V', '', '', '', '077-1877594', '', '100.jpg', '100.jpg'),
(49, 'JI-00049', 0, 'DINUSHA HARSHANI', '', '', '', '', '076-6889516', '', '100.jpg', '100.jpg'),
(50, 'JI-00050', 0, 'SITHTHI NASEEMA', '656882611V', '', '', '', '076-4146093', '', '100.jpg', '100.jpg'),
(51, 'JI-00051', 0, 'ANWAR FATHIMA NIROSHA', '806962481V', '', '', '', '076-4202519', '', '100.jpg', '100.jpg'),
(52, 'JI-00052', 0, 'NISHANTHI SAYONARA', '197661710016', '', '', '', '076-9867077', '', '100.jpg', '100.jpg'),
(53, 'JI-00053', 0, 'YASHODA DANDAMALI', '', '', '', '', '077-54434', '', '100.jpg', '100.jpg'),
(54, 'JI-00054', 0, 'G.PRIYANTHI DIAS', '', '', '', '', '077-54434', '', '100.jpg', '100.jpg'),
(55, 'JI-00055', 0, 'RENUKA DABARE', '196773601190', '', '', '', '070-1379345', '', '100.jpg', '100.jpg'),
(56, 'JI-00056', 0, 'HEWAWITHARANA', '816440971V', '', '', '', '078-9445632', '', '100.jpg', '100.jpg'),
(57, 'JI-00057', 0, 'JANANI', '866612099V', '', '', '', '176-1804430', '', '100.jpg', '100.jpg'),
(59, 'JI-00059', 2, 'HHH', '345', 'No1 , Galkaduwa', 'Neboda', '34535', '0704867765', '0704867765', '100.jpg', '100.jpg');

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
  `totalAmt` decimal(10,2) NOT NULL,
  `inspectionDate` varchar(20) NOT NULL,
  `disburseDate` varchar(20) NOT NULL,
  `gurantee1Name` varchar(250) NOT NULL,
  `gurantee1NIC` varchar(250) NOT NULL,
  `gurantee1ContactNo` varchar(250) NOT NULL,
  `gurantee2Name` varchar(250) NOT NULL,
  `gurantee2NIC` varchar(250) NOT NULL,
  `gurantee2ContactNo` varchar(250) NOT NULL,
  `loanStep` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `branch`, `centerID`, `customerID`, `loanType`, `contractNo`, `loanAmt`, `terms`, `interestRate`, `rental`, `daily_rental`, `totalAmt`, `inspectionDate`, `disburseDate`, `gurantee1Name`, `gurantee1NIC`, `gurantee1ContactNo`, `gurantee2Name`, `gurantee2NIC`, `gurantee2ContactNo`, `loanStep`, `status`) VALUES
(1, 'Nugegoda', 2, 1, 'weekly', 'YT00001', 20000.00, 16, 5.00, 1500.00, '200.00', '24000.00', '2021-05-01', '2021-05-01', 'Sarath,\r\n897845787V,\r\nKarathota', '', '', 'Sumanasiri,,\r\n784541741V,\r\nKaduwela', '', '', 1, 1),
(2, 'Nugegoda', 2, 2, 'weekly', 'YT00002', 10000.00, 12, 5.00, 958.00, '128.00', '11500.00', '2021-05-01', '2021-05-02', '', '', '', '', '', '', 2, 0),
(3, 'Nugegoda', 1, 4, 'monthly', 'CL00003', 25000.00, 16, 6.00, 7750.00, '258.00', '31000.00', '2021-04-20', '2021-04-21', '', '', '', '', '', '', 3, 1),
(4, 'Nugegoda', 1, 7, 'monthly', 'CL00004', 100000.00, 28, 6.00, 20286.00, '676.00', '142000.00', '2021-06-20', '2021-06-21', 'Sampath,\r\n0117414141', '', '', 'Wijesekara,\r\n0117474741', '', '', 3, 1),
(5, 'Nugegoda', 3, 15, 'weekly', 'KL00005', 20000.00, 12, 4.00, 1867.00, '249.00', '22400.00', '2021-08-24', '2021-08-23', '01N', '01C', '01D', '02N', '02C', '02D', 2, 1);

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
  `outstanding` decimal(10,2) NOT NULL DEFAULT '0.00',
  `loanNo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_installement`
--

INSERT INTO `loan_installement` (`id`, `collectionID`, `li_date`, `paid`, `arrears`, `outstanding`, `loanNo`) VALUES
(1, 1, '2021-06-16', 8000.00, 1200.00, '16000.00', 1),
(2, 1, '2021-06-16', 4000.00, 1760.00, '7496.00', 2),
(3, 1, '2021-06-16', 14450.00, -2.00, '16550.00', 3),
(4, 2, '2021-06-25', 500.00, 0.00, '0.00', 2),
(5, 5, '2021-06-30', 12.00, 3598.00, '16538.00', 3),
(6, 5, '2021-06-30', 21.00, 6063.00, '141979.00', 4),
(7, 6, '2021-06-30', 23.00, 3977.00, '15977.00', 1),
(8, 6, '2021-06-30', 23.00, 617.00, '-23.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `center_id` int(11) NOT NULL,
  `outstanding` double(10,2) NOT NULL,
  `bank` double(10,2) NOT NULL,
  `other1` double(10,2) NOT NULL,
  `other2` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `date`, `center_id`, `outstanding`, `bank`, `other1`, `other2`, `total`) VALUES
(1, '2021-06-29', 1, 152790.00, 10000.00, 5000.00, 0.00, 167790.00);

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
(1, '2021', '06', '155000.00', '35074.00', '2021-06-16'),
(2, '2021', '01', '0.00', '0.00', '2021-06-16'),
(3, '2021', '02', '0.00', '0.00', '2021-06-16'),
(4, '2021', '03', '0.00', '0.00', '2021-06-16'),
(5, '2021', '04', '0.00', '0.00', '2021-06-16'),
(6, '2021', '05', '0.00', '0.00', '2021-06-16'),
(7, '2021', '07', '0.00', '0.00', '2021-06-16'),
(8, '2021', '08', '20000.00', '0.00', '2021-06-16'),
(9, '2021', '09', '0.00', '0.00', '2021-06-16'),
(10, '2021', '10', '0.00', '0.00', '2021-06-16'),
(11, '2021', '11', '0.00', '0.00', '2021-06-16'),
(12, '2021', '12', '0.00', '0.00', '2021-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `temp_collection`
--

CREATE TABLE `temp_collection` (
  `id` int(11) NOT NULL,
  `loan_no` int(11) NOT NULL,
  `contractNo` varchar(100) NOT NULL,
  `customerID` int(11) NOT NULL,
  `loanAmt` decimal(10,2) NOT NULL,
  `Arrears` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `payable` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_collection`
--
ALTER TABLE `temp_collection`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_installement`
--
ALTER TABLE `loan_installement`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp_collection`
--
ALTER TABLE `temp_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
