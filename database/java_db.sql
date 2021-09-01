-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 01, 2021 at 07:29 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jayamag1_db`
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
(1, 'ANG001', 'THELAWALA ', 'ROSHINI KUMARI', 783877085),
(2, 'ANG002', 'KOSWATTA', 'WEERAKOONGE CHAMIKA JANANI', 761804430),
(3, 'ANG003', 'THELAWALA 02', 'KUMARI', 755539509),
(4, 'ANG004', 'MATTAKKULIYA', 'DINUSHA HARSHANI', 766889516),
(5, 'ANG005', 'SWARNA ROAD', 'MANIKAM ROSMARI', 768855138),
(6, 'ANG006', 'SWARNA ROAD 02', 'SHYAMALI UDAYANGANI', 740662229);

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
(3, 1, '2021-06-29', '2021', '06', '5760.00', '3000.00', '152790.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `addLine1` varchar(150) NOT NULL,
  `addLine2` varchar(150) NOT NULL,
  `addLine3` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '100.jpg',
  `image2` varchar(100) NOT NULL DEFAULT '100.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `center_id`, `memberID`, `name`, `NIC`, `addLine1`, `addLine2`, `addLine3`, `contact`, `contact2`, `image`, `image2`) VALUES
(1, 6, 'JI-00001', 'IHALAGADURAGE JAYANTHI', '667682053v', 'NO:70/4/1/1,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0777449296', '', '100.jpg', '100.jpg'),
(2, 6, 'JI-00002', 'THELIKADA PALLIYA GURUGE SUMEDHA PRIYADARSHANI', '196684800691', 'NO:70/4,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 06', '0771267314', '', '100.jpg', '100.jpg'),
(3, 5, 'JI-00003', 'SOORIYA ARACHCHIGE CHANDIMA MADANAYAKA', '197756901280', 'NO:08/1,SRI SIDDHARHA PARC', 'KIRULAPONA', 'COLOMBO 05', '0760128646', '', '100.jpg', '100.jpg'),
(4, 6, 'JI-00004', 'BENTHARAGE DULANJILA MADUWANTHI', '926481223v', 'NO:154/1/1,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0754904424', '', '100.jpg', '100.jpg'),
(5, 6, 'JI-00005', 'WADENA KONDA ARACHCHILAGE DEEPANI FERNANDO', '197178901619', 'NO:44/2,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0762927103', '', '100.jpg', '100.jpg'),
(6, 6, 'JI-00006', 'SUPPAIYA PICHCHA MUTHTHU JAYANTHI MALA', '857440498V', 'NO:149/4,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0741574952', '', '100.jpg', '100.jpg'),
(7, 6, 'JI-00007', 'WEERASAMI SAMISEL RENUKA', '726050899V', 'NO:128/22,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 06', '0761266516', '', '100.jpg', '100.jpg'),
(8, 6, 'JI-00008', 'BALACHANDRAM PUSHPARANI', '957814123V', 'NO:104/2,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0750395917', '', '100.jpg', '100.jpg'),
(9, 6, 'JI-00009', 'ADEYIKALAM KANTHIMATHI', '805494808V', 'NO:70/6,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0755916642', '', '100.jpg', '100.jpg'),
(10, 6, 'JI-00010', 'HETTIARACHCHIGE KANSALA NUWANTHIKA PRABASHINI', '887560390V', 'NO:19/1A,HIGHLEVEL RD', 'KIRULAPONA', 'COLOMBO 05', '0772369414', '', '100.jpg', '100.jpg'),
(11, 6, 'JI-00011', 'MANDAWALA KANKANAMGE SACHI SULOCHANA', '895391425V', 'D/D/1,SRI SIDDHARTHA RD', 'KIRULAPONA', 'C', '0776786745', '', '100.jpg', '100.jpg'),
(12, 6, 'JI-00012', 'KURUSAMI MANJULA DEWI ', '197177200423', 'NO:68/33,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0764980998', '', '100.jpg', '100.jpg'),
(13, 6, 'JI-00013', 'HETTIARACHCHIGE SHYAMALI UDAYANGANI', '198480600283', 'NO:70/27SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0740662229', '', '100.jpg', '100.jpg'),
(14, 6, 'JI-00014', 'PARAKRAMA MUDIYANSELAGE NIRMALI ', '665170411V', 'NO:70/31,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0757271627', '', '100.jpg', '100.jpg'),
(15, 6, 'JI-00015', 'VILPATHAGE DON SUNETHRA', '627071370V', 'NO:46/7,SOMADEVI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0750843821', '', '100.jpg', '100.jpg'),
(16, 6, 'JI-00016', 'RANAWEERAGE CHAMILA', '738102681V', 'NO:128/61/A3,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0763106118', '', '100.jpg', '100.jpg'),
(17, 6, 'JI-00017', 'BENTHARAGE  SUWISANI MADUWANTHI', '966332700V', 'NO:128/61/A3,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0767287547', '', '100.jpg', '100.jpg'),
(18, 6, 'JI-00018', 'RATHNAYAKA MUDIYANSELAGE  SUMANAWATHI', '198574404183', 'NO:128/61/A3,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0711948403', '', '100.jpg', '100.jpg'),
(19, 6, 'JI-00019', 'ANANDA RUKSHALA', '825393951V', 'NO:40,SWARNA RD', 'KIRULAPONA', 'COLOMBO 05', '0776377629', '', '100.jpg', '100.jpg'),
(20, 6, 'JI-00020', 'HETTIARACHCHIGE  MADUSHA MADUMALI', '199377701592', 'NO:141/A,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0766602133', '', '100.jpg', '100.jpg'),
(21, 6, 'JI-00021', 'BALACHANDRAM ARUNI SHSHIKALA', '907252264V', 'NO:70/42,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0757522491', '', '100.jpg', '100.jpg'),
(22, 5, 'JI-00022', 'SENADEERAGE MADUKA DARSHINI PERIS', '198679003496', 'NO:44/2,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0775690878', '', '100.jpg', '100.jpg'),
(23, 5, 'JI-00023', 'MANIKKAN ROSMERI', '808530031V', 'NO:46/14,SOMADEVI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0768855138', '', '100.jpg', '100.jpg'),
(24, 5, 'JI-00024', 'DOREYISAMI SULOCHANA', '655301780V', 'NO:43/12/B,SRI SIDDHARTHA PASAGE', 'KIRULAPONA', 'COLOMBO 05', '0723263451', '', '100.jpg', '100.jpg'),
(25, 5, 'JI-00025', 'DEHIWALA LIYANAGE SAMANTHI DILRUKSHI SILVA', '786150191V', 'NO:100/21,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0775981822', '', '100.jpg', '100.jpg'),
(26, 5, 'JI-00026', 'YOGANANDAN SARDADEWI', '705854491V', 'NO:104/2/I,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0769165049', '', '100.jpg', '100.jpg'),
(27, 5, 'JI-00027', 'MUTHUGALAGE SADATHARAKA SITHUMINI RATHNAYAKA', '867303219V', 'NO:40/7,SOMADEWI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0701697414', '', '100.jpg', '100.jpg'),
(28, 5, 'JI-00028', 'RAMACHANDRAN JEEWA INDRANI', '855201900V', 'NO:128/123,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0766705641', '', '100.jpg', '100.jpg'),
(29, 5, 'JI-00029', 'WEERAN RUBINI', '876835177V', 'NO:128/61/A8,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0778122995', '', '100.jpg', '100.jpg'),
(30, 5, 'JI-00030', 'SIWANANDAN SIWAKUMAR', '857252845V', 'NO:46/14,SOMADEVI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0778164327', '', '100.jpg', '100.jpg'),
(31, 5, 'JI-00031', 'DEHIWALA LIYANAGE PREETHI NALIKA SILVA', '916373627V', 'NO:68/46,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0752836848', '', '100.jpg', '100.jpg'),
(32, 5, 'JI-00032', 'HOLLU PATHIRAGE NIROSHANI PRIYANTHI KALDERA', '786054117V', 'NO:46/12,SOMADEWI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0740899789', '', '100.jpg', '100.jpg'),
(33, 5, 'JI-00033', 'WITHANAGE PRIYANGA UDESHIKA', '838440576V', 'NO:104/2/J,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0758362585', '', '100.jpg', '100.jpg'),
(34, 5, 'JI-00034', 'MUNIYANDI NIROSHINI', '198882500964', 'NO:46/22/A,SOMADEWI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0757726658', '', '100.jpg', '100.jpg'),
(35, 5, 'JI-00035', 'WEERAN SHANTHI', '857895231V', 'NO:104/2/M,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0754519293', '', '100.jpg', '100.jpg'),
(36, 5, 'JI-00036', 'SINGAKKARAGE KAMALAWATHI  FERNANDO', '635093889V', 'NO:105,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0763239520', '', '100.jpg', '100.jpg'),
(37, 5, 'JI-00037', 'FILISHIYA FERNANDO', '766503551V', 'NO:68/34,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0774184508', '', '100.jpg', '100.jpg'),
(38, 5, 'JI-00038', 'MAWUNT BATON DILRUKSHIKA UDAYAKUMARI', '865204272V', 'NO:128/59,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0769648043', '', '100.jpg', '100.jpg'),
(39, 5, 'JI-00039', 'WEERAN VIJAYA LECHCHAMI', '818185286V', 'NO:128/61/A8,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0712779398', '', '100.jpg', '100.jpg'),
(40, 5, 'JI-00040', 'RAJAN ANUSHIYA', '708211958V', 'NO:128/23,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0779602789', '', '100.jpg', '100.jpg'),
(41, 5, 'JI-00041', 'SHANTHINI CRISTOPER', '828241028V', 'NO:128/24,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0764477334', '', '100.jpg', '100.jpg'),
(42, 5, 'JI-00042', 'ARUMUGAM KALYANI', '198462900419', 'NO:36/11,SRI SIDDHARTHA RD ', 'KIRULAPONA', 'COLOMBO 05', '0758588229', '', '100.jpg', '100.jpg'),
(43, 5, 'JI-00043', 'RAMAIYA KALI AMMA', '746612109V', 'NO:36/11/A,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0769431818', '', '100.jpg', '100.jpg'),
(44, 5, 'JI-00044', 'KISNAN SUBASINI', '876114976V', 'NO:128/6/A/3,SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0741903114', '', '100.jpg', '100.jpg'),
(45, 5, 'JI-00045', 'RATHNAM SEENI AMMA', '665443620V', 'NO:46/14/C,SOMADEWI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0752131689', '', '100.jpg', '100.jpg'),
(46, 5, 'JI-00046', 'WAHALA THANTHRILAGE HASITHA DUSHANTHI PERERA', '936483011V', 'NO:157/1,SRI SIDDHARTHA RD', 'KIRULAPONA', 'COLOMBO 05', '0786288983', '', '100.jpg', '100.jpg'),
(47, 5, 'JI-00047', 'YODA PEDIGE NIROSHIKA', '839304056V', 'NO:46/18,SOMADEWI PLACE', 'KIRULAPONA', 'COLOMBO 05', '0768827484', '', '100.jpg', '100.jpg'),
(48, 4, 'JI-00048', 'RAMANADAN MERI SWARNALATHA', '766731678V', 'NO:10/63,SRI KALYANI GANGARAMA RD', 'MATTAKKULIYA', 'COLOMBO 15', '0771877594', '', '100.jpg', '100.jpg'),
(49, 1, 'JI-00049', 'DINUSHA HARSHANI', '885173888V', 'a', '', '', '0766889516', '', '100.jpg', '100.jpg'),
(50, 4, 'JI-00050', 'SEYINUL ABIDEEN SITHTHI NASEEMA', '656882611V', 'NO:10/64/A,SRI KALYANI GANGARAMA MW', 'MATTAKKULIYA', 'COLOMBO 15', '0764146093', '', '100.jpg', '100.jpg'),
(51, 4, 'JI-00051', 'ANWAR FATHIMA NIROSHA', '806962481V', 'NO:45/6F6,SRI KALYANI GANGARAMA MW', 'MATTAKKULIYA', 'COLOMBO 15', '0764202519', '', '100.jpg', '100.jpg'),
(52, 4, 'JI-00052', 'WADISINHAGE NISHANTHI SAYONARA DE SILVA', '197661710016', 'NO:37/10,SRI KALYANI GANGARAMA MW', 'MATTAKKULIYA', 'COLOMBO 15', '0769867077', '', '100.jpg', '100.jpg'),
(53, 1, 'JI-00053', 'YASHODA DANDAMALI', '', '', '', '', '077-54434', '', '100.jpg', '100.jpg'),
(54, 1, 'JI-00054', 'G.PRIYANTHI DIAS', '655883746V', 'NO:62/18,YOGASHRAMA MW', 'THELAWALA', 'MOUNT LV', '07754434', '', '100.jpg', '100.jpg'),
(55, 2, 'JI-00055', 'GANGODAWILAGE  CHANDRA PRIYANGANI DABARE ', '196773601190', 'NO:191/C2,GODALLAWATHTHA,DEWALA ROAD', 'THALANGAMA SOUTH', 'KOSWATTA', '0701379345', '', '100.jpg', '100.jpg'),
(56, 2, 'JI-00056', 'SHIYANI HEWAWITHARANA', '816440971V', 'NO:190,GODALLAWAWATHTHA', 'THALANGAMA SOUTH', 'KOSWATTA', '0789445632', '', '100.jpg', '100.jpg'),
(57, 2, 'JI-00057', 'WEERAKOONGE CHAMIKA JANANI', '866612099V', 'NO:190/A4,GODALLAWATHTHA', 'THALANGAMA SOUTH', '', '0761804430', '', '100.jpg', '100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_no` int(7) NOT NULL,
  `loanID` varchar(100) NOT NULL,
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
  `gurantee1NIC` varchar(100) NOT NULL,
  `gurantee1ContactNo` varchar(100) NOT NULL,
  `gurantee2Name` varchar(250) NOT NULL,
  `gurantee2NIC` varchar(100) NOT NULL,
  `gurantee2ContactNo` varchar(100) NOT NULL,
  `loanStep` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `loanID`, `branch`, `centerID`, `customerID`, `loanType`, `contractNo`, `loanAmt`, `terms`, `interestRate`, `rental`, `daily_rental`, `totalAmt`, `inspectionDate`, `disburseDate`, `gurantee1Name`, `gurantee1NIC`, `gurantee1ContactNo`, `gurantee2Name`, `gurantee2NIC`, `gurantee2ContactNo`, `loanStep`, `status`, `reason`) VALUES
(1, 'LON-00001', 'Nugegoda', 3, 12, 'weekly', 'TE00001', 10000.00, 10, 5.00, 1125.00, '150.00', '0.00', '2021-08-01', '2021-09-30', 'AAA', 'AA', '', 'A', '', '', 0, 0, 'A');

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
(1, 4, '2021-08-27', 0.00, 0.00, '258944.00', 2),
(2, 4, '2021-08-27', 0.00, 0.00, '129133.00', 3),
(3, 4, '2021-08-27', 0.00, 0.00, '33625.00', 4);

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
(1, '2021', '09', '10000.00', '0.00', '2021-09-01'),
(2, '2021', '01', '0.00', '0.00', '2021-09-01'),
(3, '2021', '02', '0.00', '0.00', '2021-09-01'),
(4, '2021', '03', '0.00', '0.00', '2021-09-01'),
(5, '2021', '04', '0.00', '0.00', '2021-09-01'),
(6, '2021', '05', '0.00', '0.00', '2021-09-01'),
(7, '2021', '06', '0.00', '0.00', '2021-09-01'),
(8, '2021', '07', '0.00', '0.00', '2021-09-01'),
(9, '2021', '08', '0.00', '0.00', '2021-09-01'),
(10, '2021', '10', '0.00', '0.00', '2021-09-01'),
(11, '2021', '11', '0.00', '0.00', '2021-09-01'),
(12, '2021', '12', '0.00', '0.00', '2021-09-01');

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

--
-- Dumping data for table `temp_collection`
--

INSERT INTO `temp_collection` (`id`, `loan_no`, `contractNo`, `customerID`, `loanAmt`, `Arrears`, `balance`, `payable`, `paid`) VALUES
(1, 1, 'KS00001', 14, '20.00', '0.00', '21000.00', '4200.00', '0.00'),
(2, 2, 'KS00002', 11, '20.00', '0.00', '258944.00', '6867.00', '0.00'),
(3, 3, 'KS00003', 5, '500000.00', '0.00', '129133.00', '588.00', '0.00'),
(4, 4, 'KS00004', 15, '20000.00', '0.00', '33625.00', '3633.00', '0.00'),
(5, 5, 'KS00005', 10, '20.00', '0.00', '20450.00', '6817.00', '0.00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_installement`
--
ALTER TABLE `loan_installement`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
