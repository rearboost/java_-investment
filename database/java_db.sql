-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 10, 2021 at 05:58 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `JB1`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(11) NOT NULL,
  `center_code` varchar(50) NOT NULL,
  `center_name` varchar(150) NOT NULL,
  `center_date` varchar(100) NOT NULL,
  `leader` varchar(250) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `center_code`, `center_name`, `center_date`, `leader`, `contact`) VALUES
(1, 'ANG001', 'THELAWALA ', 'Thursday', 'ROSHINI KUMARI', 783877085),
(2, 'ANG002', 'KOSWATTA', 'Thursday', 'WEERAKOONGE CHAMIKA JANANI', 761804430),
(3, 'ANG003', 'THELAWALA 02', 'Thursday', 'KUMARI', 755539509),
(4, 'ANG004', 'MATTAKKULIYA', 'Thursday', 'DINUSHA HARSHANI', 766889516),
(5, 'ANG005', 'SWARNA ROAD', 'Thursday', 'MADUKA DARSHINI', 775690878),
(6, 'ANG006', 'SWARNA ROAD 02', 'Thursday', 'SHYAMALI UDAYANGANI', 740662229),
(7, 'ANG007', 'AKURAGODA', 'Thursday', 'CHAMILA NIROSHANI', 702548925);

-- --------------------------------------------------------

--
-- Table structure for table `centersSummaryTB`
--

CREATE TABLE `centersSummaryTB` (
  `id` int(11) NOT NULL,
  `ang1_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang2_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang3_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang4_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang5_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang6_Pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ang7_Pay` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centersSummaryTB`
--

INSERT INTO `centersSummaryTB` (`id`, `ang1_Pay`, `ang2_Pay`, `ang3_Pay`, `ang4_Pay`, `ang5_Pay`, `ang6_Pay`, `ang7_Pay`) VALUES
(1, '2.20', '5.00', '5.00', '5.00', '5.00', '5.00', '10.00');

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
(4, 6, '2021-08-27', '2021', '08', '26400.00', '18860.00', '1117100.00'),
(5, 2, '2021-08-27', '2021', '08', '116059.00', '235526.00', '305643.00'),
(6, 6, '2021-08-27', '2021', '08', '313950.00', '-295090.00', '533150.00'),
(7, 5, '2021-08-27', '2021', '08', '327600.00', '232456.00', '582400.00'),
(8, 6, '2021-08-27', '2021', '08', '0.00', '0.00', '0.00'),
(9, 4, '2021-08-27', '2021', '08', '185300.00', '287093.00', '107620.00'),
(10, 4, '2021-08-27', '2021', '08', '200.00', '286893.00', '107420.00'),
(11, 3, '2021-08-27', '2021', '08', '14250.00', '294674.00', '53000.00'),
(12, 5, '2021-09-01', '2021', '09', '2200.00', '232444.00', '580200.00'),
(13, 6, '2021-09-24', '2021', '09', '9800.00', '-304015.00', '523350.00'),
(14, 6, '2021-09-24', '2021', '09', '4800.00', '-3925.00', '5000.00'),
(15, 6, '2021-09-25', '2021', '09', '0.00', '-1750.00', '29050.00'),
(16, 6, '2021-09-25', '2021', '09', '4800.00', '-2175.00', '31250.00'),
(17, 2, '2021-09-25', '2021', '09', '0.00', '235526.00', '305623.00'),
(18, 6, '2021-09-25', '2021', '09', '9800.00', '-300515.00', '523350.00'),
(19, 2, '2021-10-05', '2021', '10', '3000.00', '243315.00', '302643.00'),
(20, 5, '2021-10-05', '2021', '10', '2200.00', '232444.00', '580200.00'),
(21, 2, '2021-10-07', '2021', '10', '10500.00', '243604.00', '292143.00'),
(22, 5, '2021-10-11', '2021', '10', '52800.00', '234344.00', '527400.00'),
(23, 6, '2021-10-11', '2021', '10', '36350.00', '-300675.00', '487000.00'),
(24, 5, '2021-10-15', '2021', '10', '55900.00', '467464.00', '994500.00'),
(25, 2, '2021-10-15', '2021', '10', '4000.00', '243191.00', '288143.00'),
(26, 6, '2021-10-20', '2021', '10', '53450.00', '-307434.00', '433550.00'),
(27, 2, '2021-10-20', '2021', '10', '4000.00', '242778.00', '284143.00'),
(28, 6, '2021-10-27', '2021', '10', '45200.00', '-291018.00', '388650.00'),
(29, 5, '2021-10-22', '2021', '10', '49800.00', '235856.00', '421700.00'),
(30, 5, '2021-11-04', '2021', '11', '52100.00', '238456.00', '369600.00'),
(31, 6, '2021-10-29', '2021', '10', '50200.00', '-293965.00', '338450.00'),
(32, 2, '2021-10-31', '2021', '10', '5500.00', '240865.00', '278643.00'),
(33, 6, '2021-11-05', '2021', '11', '36400.00', '-186071.00', '302850.00'),
(34, 5, '2021-11-05', '2021', '11', '37000.00', '238652.00', '332600.00'),
(35, 2, '2021-11-07', '2021', '11', '3600.00', '240852.00', '275043.00'),
(36, 6, '2021-11-12', '2021', '11', '34200.00', '-129933.00', '374500.00'),
(37, 5, '2021-11-12', '2021', '11', '58100.00', '233064.00', '274500.00'),
(38, 7, '2021-11-19', '2021', '11', '16200.00', '-444.00', '235800.00'),
(39, 6, '2021-11-19', '2021', '11', '36850.00', '-68780.00', '407650.00'),
(40, 5, '2021-11-19', '2021', '11', '51000.00', '322912.00', '696400.00'),
(41, 2, '2021-11-19', '2021', '11', '5000.00', '239439.00', '270043.00'),
(42, 7, '2021-11-25', '2021', '11', '16200.00', '-888.00', '219600.00'),
(43, 6, '2021-11-25', '2021', '11', '34200.00', '-24702.00', '373850.00'),
(44, 5, '2021-11-26', '2021', '11', '58400.00', '94524.00', '413700.00'),
(45, 2, '2021-11-26', '2021', '11', '4118.00', '734849.00', '797937.00'),
(46, 7, '2021-12-03', '2021', '12', '16200.00', '-1332.00', '203400.00'),
(47, 6, '2021-12-03', '2021', '12', '34200.00', '-24774.00', '339650.00'),
(48, 5, '2021-12-03', '2021', '12', '45300.00', '112048.00', '991700.00');

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
(57, 2, 'JI-00057', 'WEERAKOONGE CHAMIKA JANANI', '866612099V', 'NO:190/A4,GODALLAWATHTHA', 'THALANGAMA SOUTH', '', '0761804430', '', '100.jpg', '100.jpg'),
(58, 3, 'JI-00058', 'YASHODA SANDAMALI', '655883747V', 'NO:62/18,YOGASHRAMA MW', 'THELAWALA', 'MOUNT LV', '0763887663', '0766104989', '100.jpg', '100.jpg'),
(59, 6, 'JI-00059', 'MUDALIGE HARSHIKA MADUSHANI', '867820248V', 'NO:110/03,SRI SIDDARTHA RD', 'KIRULAPONA ', 'COLOMBO 06', '0776091656', '', '100.jpg', '100.jpg'),
(60, 6, 'JI-00060', 'POLWATTA GALLAGE SUJEEWA', '695123892V', 'C/1/4,SRI SIDDARTHA RD', 'KIRULAPONA ', 'COLOMBO 05', '0760447866', '', '100.jpg', '100.jpg'),
(61, 6, 'JI-00061', 'RAMACHANDRAN SATHYAWANI', '707110473V', 'NO:70/37,1/1,SRI SIDDARTHA RD', 'KIRULAPONA ', 'COLOMBO 06', '0775082713', '', '100.jpg', '100.jpg'),
(62, 6, 'JI-00062', 'SURESH KUMAR SELWAMALAR', '198379602838', 'NO:70/35,SRI SIDARTHA RD', 'KIRULAPONA ', 'COLOMBO 06', '0765609875', '', '100.jpg', '100.jpg'),
(63, 7, 'JI-00063', 'WALISUNDARA MUDIYANSELAGE CHAMILA SAROJANI', '808004070V', 'NO:200/P/5,DEWALA RD', 'THALANGAMA SOUTH', 'BATTARAMULLA', '0702548925', '', '100.jpg', '100.jpg'),
(64, 7, 'JI-00064', 'SAVUNDA HANNADIGE SUJATHA', '716131602V', 'NO:200/P/3,2 ND LANE', 'DEWALA RD', 'BATTARAMULLA', '0771327561', '', '100.jpg', '100.jpg'),
(65, 7, 'JI-00065', 'HOLLUPATHIRAGE RAMANI WIMALASILI KALDERA', '758363821V', 'NO:200/P/10,2 ND LANE', 'DEWALA RD', 'BATTARAMULLA', '0729112763', '', '100.jpg', '100.jpg'),
(66, 7, 'JI-00066', 'GALPOTHTHAGE DILRUKSHI NIRANJALA KUMARI', '745543073V', 'N0:172/B,ROBERT GUNEWARDANA MW', 'THALNGAMA SOUTH ', 'BATTARAMULLA', '0722091446', '', '100.jpg', '100.jpg'),
(68, 7, 'JI-00067', 'AROSHA NISANSALA KUMARI SAYAKKARA', '198763300482', 'NO:293/B,THALANGAMA SOUTH', 'BATAPOTHA', 'BATTARAMULLA', '0761263028', '', '100.jpg', '100.jpg'),
(69, 7, 'JI-00069', 'ADAMBARAGE PRASANGIKA ALWIS', '786581273V', 'NO:200/A', 'ROBERTGUNAWARDANA MW', 'BATTARAMULLA', '0712351947', '', '100.jpg', '100.jpg'),
(70, 7, 'JI-00070', 'KUDABALAGE CHANDANI PUSHPA', '777561430V', 'NO:205/E/2,DEWALA RD', 'THALANGAMA SOUTH', 'BATTARAMULLA', '0759180957', '', '100.jpg', '100.jpg'),
(71, 7, 'JI-00071', 'MUDALI BERUGE UDENI JAYAWARDANA', '785180712V', 'NO:219,DEWALA RD,THALANGAMA SOUTH', 'BATAPOTHA', 'BATTARAMULLA', '0787987407', '', '100.jpg', '100.jpg'),
(72, 7, 'JI-00072', 'GOLLAHINNAGE NILANTHI GOLLAHINNAGE ', '197959802523', 'NO:217/2,DEWALA RD ', 'THALANGAMA SOUTH', 'BATTARAMULLA', '0779192714', '', '100.jpg', '100.jpg'),
(73, 7, 'JI-00073', 'GAMARALALAGE GEDARA DINGIRI AMMA', '805780169V', 'NO:153,ROBERT GUNEWARDANA RD', 'THALANGAMA SOUTH', 'BATTARAMULLA', '0752804186', '0761238716', '100.jpg', '100.jpg'),
(74, 7, 'JI-00074', 'KARIYAWASAM WADDUWAGE CHANDRALATHA', '645573242V', 'NO:153,1/1', 'ROBERTGUNAWARDANA MW', 'BATTARAMULLA', '0729574260', '', '100.jpg', '100.jpg'),
(75, 7, 'JI-00075', 'AGARA JAYASINHAGE SWARNALATHA', '726922861V', 'NO:243/9,BATAPOTHA,THALANGAMA SOUTH', 'BATAPOTHA', 'BATTARAMULLA', '0716288722', '', '100.jpg', '100.jpg'),
(76, 5, 'JI-00076', 'MAHARANSEELAGE DILHARA KUMARI GUNATHILAKE', '886922531V', 'NO:46/8,SOMADEWI PLACE', 'KIRULAPONA ', 'COLOMBO 06', '0765619064', '', '100.jpg', '100.jpg');

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
  `gurantee1ad1` varchar(200) NOT NULL,
  `gurantee1ad2` varchar(200) NOT NULL,
  `gurantee2Name` varchar(250) NOT NULL,
  `gurantee2NIC` varchar(100) NOT NULL,
  `gurantee2ContactNo` varchar(100) NOT NULL,
  `gurantee2ad1` varchar(200) NOT NULL,
  `gurantee2ad2` varchar(200) NOT NULL,
  `loanStep` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `createDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `loanID`, `branch`, `centerID`, `customerID`, `loanType`, `contractNo`, `loanAmt`, `terms`, `interestRate`, `rental`, `daily_rental`, `totalAmt`, `inspectionDate`, `disburseDate`, `gurantee1Name`, `gurantee1NIC`, `gurantee1ContactNo`, `gurantee1ad1`, `gurantee1ad2`, `gurantee2Name`, `gurantee2NIC`, `gurantee2ContactNo`, `gurantee2ad1`, `gurantee2ad2`, `loanStep`, `status`, `reason`, `year`, `month`, `createDate`) VALUES
(1, 'LON-00059', 'Nugegoda', 6, 1, 'weekly', 'SA00001', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-03-03', '2021-03-25', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(2, 'LON-00002', 'Nugegoda', 2, 57, 'monthly', 'KS00002', 101150.00, 96, 6.50, 10789.00, '360.00', '258944.00', '2021-05-01', '2021-05-01', '', '', '', '', '', '', '', '', '', '', 4, 1, '', '', '', ''),
(3, 'LON-00003', 'Nugegoda', 2, 56, 'weekly', 'KS00003', 98200.00, 36, 3.50, 3587.00, '479.00', '129133.00', '2021-01-20', '2021-01-20', '', '', '', '', '', '', '', '', '', '', 4, 1, '', '', '', ''),
(4, 'LON-00004', 'Nugegoda', 2, 55, 'weekly', 'KS00004', 25000.00, 12, 11.50, 2802.00, '374.00', '33625.00', '2020-02-28', '2020-02-28', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(5, 'LON-00005', 'Nugegoda', 4, 52, 'weekly', 'MT00005', 30000.00, 16, 10.00, 2625.00, '350.00', '42000.00', '2021-02-01', '2021-02-01', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(6, 'LON-00006', 'Nugegoda', 4, 51, 'weekly', 'MT00006', 30000.00, 16, 10.00, 2625.00, '350.00', '42000.00', '2021-02-01', '2021-02-01', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(7, 'LON-00007', 'Nugegoda', 4, 49, 'weekly', 'MT00007', 100000.00, 48, 3.34, 2917.00, '389.00', '140020.00', '2020-09-05', '2020-09-05', '', '', '', '', '', '', '', '', '', '', 4, 1, '', '', '', ''),
(8, 'LON-00008', 'Nugegoda', 4, 48, 'weekly', 'MT00008', 20000.00, 12, 11.50, 2242.00, '299.00', '26900.00', '2020-08-01', '2020-08-01', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(9, 'LON-00009', 'Nugegoda', 4, 50, 'weekly', 'MT00009', 30000.00, 16, 10.00, 2625.00, '350.00', '42000.00', '2021-02-02', '2021-02-02', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(10, 'LON-00010', 'Nugegoda', 5, 22, 'weekly', 'SA00010', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(11, 'LON-00011', 'Nugegoda', 5, 23, 'weekly', 'SA00011', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(12, 'LON-00012', 'Nugegoda', 5, 24, 'weekly', 'SA00012', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(13, 'LON-00013', 'Nugegoda', 5, 25, 'weekly', 'SA00013', 25000.00, 16, 10.00, 2188.00, '292.00', '0.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, 'settled', '', '', ''),
(14, 'LON-00014', 'Nugegoda', 5, 26, 'weekly', 'SA00014', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(15, 'LON-00015', 'Nugegoda', 5, 27, 'weekly', 'SA00015', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(16, 'LON-00016', 'Nugegoda', 5, 28, 'weekly', 'SA00016', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(17, 'LON-00017', 'Nugegoda', 5, 29, 'weekly', 'SA00017', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(18, 'LON-00018', 'Nugegoda', 5, 30, 'weekly', 'SA00018', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(19, 'LON-00019', 'Nugegoda', 5, 31, 'weekly', 'SA00019', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(20, 'LON-00020', 'Nugegoda', 5, 32, 'weekly', 'MT00020', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(21, 'LON-00021', 'Nugegoda', 5, 33, 'weekly', 'SA00021', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(23, 'LON-00023', 'Nugegoda', 5, 34, 'weekly', 'SA00023', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(24, 'LON-00024', 'Nugegoda', 5, 35, 'weekly', 'SA00024', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-30', '2021-04-30', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(25, 'LON-00025', 'Nugegoda', 5, 36, 'weekly', 'SA00025', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(26, 'LON-00026', 'Nugegoda', 5, 37, 'weekly', 'SA00026', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(27, 'LON-00027', 'Nugegoda', 5, 38, 'weekly', 'SA00027', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(28, 'LON-00028', 'Nugegoda', 5, 39, 'weekly', 'SA00028', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(29, 'LON-00029', 'Nugegoda', 5, 40, 'weekly', 'SA00029', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(30, 'LON-00030', 'Nugegoda', 5, 41, 'weekly', 'SA00030', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(31, 'LON-00031', 'Nugegoda', 5, 42, 'weekly', 'SA00031', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(32, 'LON-00032', 'Nugegoda', 5, 43, 'weekly', 'SA00032', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(33, 'LON-00033', 'Nugegoda', 5, 44, 'weekly', 'SA00033', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(34, 'LON-00034', 'Nugegoda', 5, 45, 'weekly', 'SA00034', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(35, 'LON-00035', 'Nugegoda', 5, 46, 'weekly', 'SA00035', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(36, 'LON-00036', 'Nugegoda', 5, 47, 'weekly', 'SA00036', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-06', '2021-08-06', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(37, 'LON-00037', 'Nugegoda', 6, 2, 'weekly', 'SA00037', 50000.00, 16, 10.00, 4375.00, '584.00', '0.00', '2021-03-23', '2021-03-23', '', '', '', '', '', '', '', '', '', '', 3, 0, 'settled', '', '', ''),
(38, 'LON-00038', 'Nugegoda', 6, 3, 'weekly', 'SA00038', 15000.00, 12, 10.00, 1625.00, '217.00', '19500.00', '2021-04-08', '2021-04-08', '', '', '', '', '', '', '', '', '', '', 3, 0, '', '', '', ''),
(39, 'LON-00039', 'Nugegoda', 6, 4, 'weekly', 'SA00039', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-08', '2021-04-08', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(40, 'LON-00040', 'Nugegoda', 6, 5, 'weekly', 'SA00040', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2121-04-08', '2021-04-08', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(41, 'LON-00041', 'Nugegoda', 6, 6, 'weekly', 'SA00041', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-08', '2021-04-08', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(42, 'LON-00042', 'Nugegoda', 6, 7, 'weekly', 'SA00042', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-08', '2021-04-08', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(43, 'LON-00043', 'Nugegoda', 6, 8, 'weekly', 'SA00043', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-04-09', '2021-04-09', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(44, 'LON-00044', 'Nugegoda', 6, 9, 'weekly', 'SA00044', 50000.00, 16, 10.00, 4375.00, '584.00', '70000.00', '2021-04-23', '2021-04-23', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(45, 'LON-00045', 'Nugegoda', 6, 10, 'weekly', 'SA00045', 50000.00, 16, 10.00, 4375.00, '584.00', '70000.00', '2021-04-23', '2021-04-23', '', '', '', '', '', '', '', '', '', '', 2, 0, '', '', '', ''),
(46, 'LON-00046', 'Nugegoda', 6, 11, 'weekly', 'SA00046', 20000.00, 16, 10.00, 1750.00, '234.00', '28000.00', '2021-08-05', '2021-08-05', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(47, 'LON-00047', 'Nugegoda', 6, 12, 'weekly', 'SA00047', 20000.00, 16, 10.00, 1750.00, '234.00', '28000.00', '2021-08-05', '2021-08-05', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(48, 'LON-00048', 'Nugegoda', 6, 13, 'weekly', 'SA00048', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(49, 'LON-00049', 'Nugegoda', 6, 14, 'weekly', 'SA00049', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(50, 'LON-00050', 'Nugegoda', 6, 15, 'weekly', 'SA00050', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(51, 'LON-00051', 'Nugegoda', 6, 16, 'weekly', 'SA00051', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(53, 'LON-00052', 'Nugegoda', 6, 17, 'weekly', 'SA00052', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(54, 'LON-00054', 'Nugegoda', 6, 18, 'weekly', 'SA00054', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(60, 'LON-00060', 'Nugegoda', 6, 19, 'weekly', 'SA00060', 30000.00, 20, 10.00, 2250.00, '300.00', '45000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(61, 'LON-00061', 'Nugegoda', 6, 20, 'weekly', 'SA00061', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(62, 'LON-00062', 'Nugegoda', 6, 21, 'weekly', 'SA00062', 20000.00, 16, 10.00, 1750.00, '234.00', '28000.00', '2021-08-12', '2021-08-12', '', '', '', '', '', '', '', '', '', '', 3, 1, '', '', '', ''),
(63, 'LON-00063', 'Nugegoda', 3, 54, 'weekly', 'TE00063', 25000.00, 12, 11.50, 2802.00, '374.00', '33625.00', '2020-01-04', '2020-01-04', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(64, 'LON-00064', 'Nugegoda', 3, 58, 'weekly', 'TE00064', 25000.00, 12, 11.50, 2802.00, '374.00', '0.00', '2021-01-14', '2021-01-14', '', '', '', '', '', '', '', '', '', '', 2, 1, '', '', '', ''),
(65, 'LON-00065', 'Nugegoda', 6, 59, 'weekly', 'SA00065', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-05', '2021-11-05', '', '', '', '', '', '', '695123892V', '', '', '', 1, 1, '', '2021', '11', '2021-11-09'),
(66, 'LON-00066', 'Nugegoda', 6, 60, 'weekly', 'SA00066', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-05', '2021-11-05', '', '67228179X', '', '', '', 'MUDALIGE HARSHIKA MADUSHANI', '867820248V', '0776091656', 'NO:110/03,SRI SIDDARTHA RD', 'KIRULAPONA ', 1, 1, '', '2021', '11', '2021-11-10'),
(67, 'LON-00067', 'Nugegoda', 6, 5, 'weekly', 'SA00067', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-05', '2021-11-05', '', '194758910046', '', '', '', 'HETTIARACHCHIGE SHYAMALI UDAYANGANI', '198480600283', '0740662229', 'NO:70/27SRI SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-10'),
(68, 'LON-00068', 'Nugegoda', 6, 62, 'weekly', 'SA00068', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-12', '2021-11-12', 'WEERAMUTTU SURESH KUMARA', '770332036V', '', 'NO:70/35,SRI SIDDARTHA RD,KIRULAPONA', 'COLOMBO 06', 'RAMACHANDRAN SATHYAWANI', '707110473V', '0775082713', 'NO:70/37,1/1,SRI SIDDARTHA RD', 'KIRULAPONA ', 1, 1, '', '2021', '11', '2021-11-12'),
(69, 'LON-00069', 'Nugegoda', 6, 61, 'weekly', 'SA00069', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-12', '2021-11-12', '', '69042327V', '', 'NO:70/37,1/1,SIDDARTHA RD,KIRULAPONA ', 'COLOMBO 06', 'SURESH KUMAR SELWAMALAR', '198379602838', '0765609875', 'NO:70/35,SRI SIDARTHA RD', 'KIRULAPONA ', 1, 1, '', '2021', '11', '2021-11-12'),
(70, 'LON-00070', 'Nugegoda', 7, 63, 'weekly', 'AU00070', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '198103201946', '', 'NO:200P,DEWALA RD,2ND LANE ', 'BATTARAMULLA', 'SAVUNDA HANNADIGE SUJATHA', '716131602V', '0771327561', 'NO:200/P/3,2 ND LANE', 'DEWALA RD', 1, 1, '', '2021', '11', '2021-11-13'),
(71, 'LON-00071', 'Nugegoda', 7, 64, 'weekly', 'AU00071', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', 'URALA GAMAGE ANANDA', '670983692V', '', 'NO:200P3,DEWALA RD,2ND LANE ', 'BATTARAMULLA', 'WALISUNDARA MUDIYANSELAGE CHAMILA SAROJANI', '808004070V', '0702548925', 'NO:200/P/5,DEWALA RD', 'THALANGAMA SOUTH', 1, 1, '', '2021', '11', '2021-11-13'),
(72, 'LON-00072', 'Nugegoda', 7, 65, 'weekly', 'AU00072', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '712671254V', '', 'NO:200P/10,DEWALA RD,2ND LANE ', 'BATTARAMULLA', 'AGARA JAYASINHAGE SWARNALATHA', '726922861V', '0716288722', 'NO:243/9,BATAPOTHA,THALANGAMA SOUTH', 'BATAPOTHA', 1, 1, '', '2021', '11', '2021-11-13'),
(73, 'LON-00073', 'Nugegoda', 7, 75, 'weekly', 'AU00073', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '945070455V', '', '1/A,PAHATHBIM NIWASA,THALANGAMA', 'BATTARAMULLA', 'HOLLUPATHIRAGE RAMANI WIMALASILI KALDER', '758363821V', '0729112763', 'NO:200/P/10,2 ND LANE', 'DEWALA RD', 1, 1, '', '2021', '11', '2021-11-13'),
(74, 'LON-00074', 'Nugegoda', 7, 66, 'weekly', 'AU00074', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '760013978V', '', 'NO:172/B/1,ROBERT GUNEWARDANA MW,THALANGAMA SOUTH', 'BATTARAMULLA', 'KUDABALAGE CHANDANI PUSHPA', '777561430V', '0759180957', 'NO:205/E/2,DEWALA RD', 'THALANGAMA SOUTH', 1, 1, '', '2021', '11', '2021-11-13'),
(75, 'LON-00075', 'Nugegoda', 7, 70, 'weekly', 'AU00075', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '712611960V', '', 'NO:205/E/2,DEWALA RD,THALANGAMA SOUTH', 'BATTARAMULLA', 'GALPOTHTHAGE DILRUKSHI NIRANJALA KUMARI', '745543073V', '0722091446', 'N0:172/B,ROBERT GUNEWARDANA MW', 'THALNGAMA SOUTH ', 1, 1, '', '2021', '11', '2021-11-13'),
(76, 'LON-00076', 'Nugegoda', 7, 68, 'weekly', 'AU00076', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '862791924V', '', 'NO:293/B,THALANGAMA SOUTH,BATAPOTHA', 'BATTARAMULLA', 'ADAMBARAGE PRASANGIKA ALWIS', '786581273V', '0712351947', 'NO:200/A', 'ROBERTGUNAWARDANA MW', 1, 1, '', '2021', '11', '2021-11-13'),
(77, 'LON-00077', 'Nugegoda', 7, 69, 'weekly', 'AU00077', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '791451280V', '', 'NO:177/03/E,ROBERT GUNEWARDANA RD,THALANGAMA SOUTH', 'BATTARAMULLA', 'AROSHA NISANSALA KUMARI SAYAKKARA', '198763300482', '0761263028', 'NO:293/B,THALANGAMA SOUTH', 'BATAPOTHA', 1, 1, '', '2021', '11', '2021-11-13'),
(78, 'LON-00078', 'Nugegoda', 7, 72, 'weekly', 'AU00078', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '197503700934', '', 'NO:217,DEWALA RD,THALANGAMA SOUTH', 'BATTARAMULLA', 'MUDALI BERUGE UDENI JAYAWARDANA', '785180712V', '0787987407', 'NO:219,DEWALA RD,THALANGAMA SOUTH', 'BATAPOTHA', 1, 1, '', '2021', '11', '2021-11-13'),
(79, 'LON-00079', 'Nugegoda', 7, 71, 'weekly', 'AU00079', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '723001161V', '', 'NO:219,DEWALA RD,THALANGAMA SOUTH', 'BATTARAMULLA', 'GOLLAHINNAGE NILANTHI GOLLAHINNAGE ', '197959802523', '0779192714', 'NO:217/2,DEWALA RD ', 'THALANGAMA SOUTH', 1, 1, '', '2021', '11', '2021-11-13'),
(80, 'LON-00080', 'Nugegoda', 7, 74, 'weekly', 'AU00080', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '552461956V', '', 'NO:207,DEWALA RD.BATAPOTHA', 'BATTARAMULLA', 'GAMARALALAGE GEDARA DINGIRI AMMA', '805780169V', '0752804186', 'NO:153,ROBERT GUNEWARDANA RD', 'THALANGAMA SOUTH', 1, 1, '', '2021', '11', '2021-11-13'),
(81, 'LON-00081', 'Nugegoda', 7, 73, 'weekly', 'AU00081', 15000.00, 16, 10.00, 1313.00, '175.00', '21000.00', '2021-11-08', '2021-11-08', '', '701862651V', '', 'NO:153,ROBERT GUNEWARDANA MW,THALANGAMA SOUTH', 'BATTARAMULLA', 'KARIYAWASAM WADDUWAGE CHANDRALATHA', '645573242V', '0729574260', 'NO:153,1/1', 'ROBERTGUNAWARDANA MW', 1, 1, '', '2021', '11', '2021-11-13'),
(82, 'LON-00082', 'Nugegoda', 5, 24, 'weekly', 'SA00082', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', 'RAMANADAN YOGANADAN', '592553309V', '', 'NO:43/12,B,SRI SIDDARTHA RD,KIRULAPONA', 'COLOMBO 06', 'SENADEERAGE MADUKA DARSHINI PERIS', '198679003496', '0775690878', 'NO:44/2,SRI SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(83, 'LON-00083', 'Nugegoda', 5, 22, 'weekly', 'SA00083', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', 'WADENA KONDA ARACHCHILAGE DEEPANI FERNANDO', '197178901619', '0762927103', 'NO:44/2,SRI SIDDHARTHA RD', 'KIRULAPONA', 'DOREYISAMI SULOCHANA', '655301780V', '0723263451', 'NO:43/12/B,SRI SIDDHARTHA PASAGE', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(84, 'LON-00084', 'Nugegoda', 5, 29, 'weekly', 'SA00084', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', '', '', '', '', '', 'WITHANAGE PRIYANGA UDESHIKA', '838440576V', '0758362585', 'NO:104/2/J,SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(85, 'LON-00085', 'Nugegoda', 5, 33, 'weekly', 'SA00085', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', '', '197125602137', '', 'NO:104/2J,SIDDARTHA RD,KIRULAPONA', 'COLOMBO 06', 'WEERAN RUBINI', '876835177V', '0778122995', 'NO:128/61/A8,SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(86, 'LON-00086', 'Nugegoda', 5, 27, 'weekly', 'SA00086', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', '', '821760976V', '', 'NO:46/7,SOMADEWI PLACE,KIRULAPONA', 'COLOMBO 06', '', '857252845V', '', '', '', 1, 1, '', '2021', '11', '2021-11-19'),
(87, 'LON-00087', 'Nugegoda', 5, 30, 'weekly', 'SA00087', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', '', '833230719V', '', 'NO:47/14,SOMADEWI PLACE,KIRULAPONA', 'COLOMBO 06', 'MUTHUGALAGE SADATHARAKA SITHUMINI RATHNAYAKA', '867303219V', '0701697414', 'NO:40/7,SOMADEWI PLACE', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(88, 'LON-00088', 'Nugegoda', 5, 26, 'weekly', 'SA00088', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-19', '2021-11-19', '', '651142334V', '', 'NO:104/2-I,SRI SIDDARTHA RD,KIRULAPONA', 'COLOMBO 06', 'WEERAN SHANTHI', '857895231V', '0754519293', 'NO:104/2/M,SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-19'),
(89, 'LON-00089', 'Nugegoda', 5, 35, 'weekly', 'SA00089', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-26', '2021-11-26', '', '810211350V', '', 'NO:46/10,SOMADEWI PLACE,KIRULAPONA', 'COLOMBO 05', 'YOGANANDAN SARDADEWI', '705854491V', '0769165049', 'NO:104/2/I,SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-26'),
(90, 'LON-00090', 'Nugegoda', 5, 34, 'weekly', 'SA00090', 20000.00, 16, 10.00, 1750.00, '234.00', '28000.00', '2021-11-26', '2021-11-26', '', '862313259V', '', 'N0:483/23,HAWLOCK RD,PAMANKADA', 'COLOMBO 06', 'HOLLU PATHIRAGE NIROSHANI PRIYANTHI KALDERA', '786054117V', '0740899789', 'NO:46/12,SOMADEWI PLACE', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-26'),
(91, 'LON-00091', 'Nugegoda', 5, 76, 'weekly', 'SA00091', 20000.00, 16, 10.00, 1750.00, '234.00', '28000.00', '2021-11-26', '2021-11-26', '', '806223549V', '', 'NO:110/49,SRI SIDDARTHA RD', 'KIRULAPONA', 'DEHIWALA LIYANAGE PREETHI NALIKA SILVA', '916373627V', '0752836848', 'NO:68/46,SRI SIDDHARTHA RD', 'KIRULAPONA', 1, 1, '', '2021', '11', '2021-11-26'),
(92, 'LON-00092', 'Nugegoda', 5, 31, 'weekly', 'SA00092', 25000.00, 16, 10.00, 2188.00, '292.00', '35000.00', '2021-11-26', '2021-11-25', '', '902650601V', '', 'NO:70/31,SRI SIDDARTHA RD,KIRULAPONA', 'COLOMBO 06', 'MAHARANSEELAGE DILHARA KUMARI GUNATHILAKE', '886922531V', '0765619064', 'NO:46/8,SOMADEWI PLACE', 'KIRULAPONA ', 1, 1, '', '2021', '11', '2021-11-26');

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
(1, 4, '2021-08-27', 26400.00, 18860.00, '8600.00', 1),
(2, 4, '2021-08-27', 0.00, 0.00, '70000.00', 37),
(3, 4, '2021-08-27', 0.00, 0.00, '19500.00', 38),
(4, 4, '2021-08-27', 0.00, 0.00, '35000.00', 39),
(5, 4, '2021-08-27', 0.00, 0.00, '35000.00', 40),
(6, 4, '2021-08-27', 0.00, 0.00, '35000.00', 41),
(7, 4, '2021-08-27', 0.00, 0.00, '35000.00', 42),
(8, 4, '2021-08-27', 0.00, 0.00, '35000.00', 43),
(9, 4, '2021-08-27', 0.00, 0.00, '70000.00', 44),
(10, 4, '2021-08-27', 0.00, 0.00, '70000.00', 45),
(11, 4, '2021-08-27', 0.00, 0.00, '28000.00', 46),
(12, 4, '2021-08-27', 0.00, 0.00, '28000.00', 47),
(13, 4, '2021-08-27', 0.00, 0.00, '45000.00', 48),
(14, 4, '2021-08-27', 0.00, 0.00, '45000.00', 49),
(15, 4, '2021-08-27', 0.00, 0.00, '45000.00', 50),
(16, 4, '2021-08-27', 0.00, 0.00, '45000.00', 51),
(17, 4, '2021-08-27', 0.00, 0.00, '45000.00', 52),
(18, 4, '2021-08-27', 0.00, 0.00, '45000.00', 53),
(19, 4, '2021-08-27', 0.00, 0.00, '45000.00', 54),
(20, 4, '2021-08-27', 0.00, 0.00, '45000.00', 55),
(21, 4, '2021-08-27', 0.00, 0.00, '45000.00', 56),
(22, 4, '2021-08-27', 0.00, 0.00, '45000.00', 57),
(23, 4, '2021-08-27', 0.00, 0.00, '45000.00', 58),
(24, 4, '2021-08-27', 0.00, 0.00, '45000.00', 59),
(25, 4, '2021-08-27', 0.00, 0.00, '45000.00', 60),
(26, 4, '2021-08-27', 0.00, 0.00, '35000.00', 61),
(27, 4, '2021-08-27', 0.00, 0.00, '28000.00', 62),
(28, 5, '2021-08-27', 42700.00, -220.00, '216244.00', 2),
(29, 5, '2021-08-27', 50559.00, 54342.00, '78574.00', 3),
(30, 5, '2021-08-27', 22800.00, 181404.00, '10825.00', 4),
(31, 6, '2021-08-27', 0.00, 18860.00, '8600.00', 1),
(32, 6, '2021-08-27', 55200.00, -55200.00, '14800.00', 37),
(33, 6, '2021-08-27', 16500.00, -16500.00, '3000.00', 38),
(34, 6, '2021-08-27', 26400.00, -26400.00, '8600.00', 39),
(35, 6, '2021-08-27', 26400.00, -26400.00, '8600.00', 40),
(36, 6, '2021-08-27', 24200.00, -24200.00, '10800.00', 41),
(37, 6, '2021-08-27', 26400.00, -26400.00, '8600.00', 42),
(38, 6, '2021-08-27', 26400.00, -26400.00, '8600.00', 43),
(39, 6, '2021-08-27', 48400.00, -48400.00, '21600.00', 44),
(40, 6, '2021-08-27', 39600.00, -39600.00, '30400.00', 45),
(41, 6, '2021-08-27', 3500.00, -3500.00, '24500.00', 46),
(42, 6, '2021-08-27', 3500.00, -3500.00, '24500.00', 47),
(43, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 48),
(44, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 49),
(45, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 50),
(46, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 51),
(47, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 53),
(48, 6, '2021-08-27', 2250.00, -2250.00, '42750.00', 54),
(49, 6, '2021-08-27', 0.00, 0.00, '45000.00', 60),
(50, 6, '2021-08-27', 2200.00, -2200.00, '32800.00', 61),
(51, 6, '2021-08-27', 1750.00, -1750.00, '26250.00', 62),
(52, 7, '2021-08-27', 15400.00, 19348.00, '19600.00', 10),
(53, 7, '2021-08-27', 22000.00, 12748.00, '13000.00', 11),
(54, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 12),
(55, 7, '2021-08-27', 17600.00, 17148.00, '17400.00', 13),
(56, 7, '2021-08-27', 22000.00, 12748.00, '13000.00', 14),
(57, 7, '2021-08-27', 22000.00, 12748.00, '13000.00', 15),
(58, 7, '2021-08-27', 20800.00, 13948.00, '14200.00', 16),
(59, 7, '2021-08-27', 22000.00, 12748.00, '13000.00', 17),
(60, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 18),
(61, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 19),
(62, 7, '2021-08-27', 18600.00, 16148.00, '16400.00', 20),
(63, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 21),
(64, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 23),
(65, 7, '2021-08-27', 19800.00, 14948.00, '15200.00', 24),
(66, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 25),
(67, 7, '2021-08-27', 2200.00, 3932.00, '32800.00', 26),
(68, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 27),
(69, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 28),
(70, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 29),
(71, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 30),
(72, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 31),
(73, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 32),
(74, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 33),
(75, 7, '2021-08-27', 2200.00, 3932.00, '32800.00', 34),
(76, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 35),
(77, 7, '2021-08-27', 4400.00, 1732.00, '30600.00', 36),
(99, 9, '2021-08-27', 39750.00, 32700.00, '2250.00', 5),
(100, 9, '2021-08-27', 37100.00, 35350.00, '4900.00', 6),
(101, 9, '2021-08-27', 54000.00, 84484.00, '86020.00', 7),
(102, 9, '2021-08-27', 20000.00, 96909.00, '6900.00', 8),
(103, 9, '2021-08-27', 34450.00, 37650.00, '7550.00', 9),
(104, 10, '2021-08-27', 0.00, 32700.00, '2250.00', 5),
(105, 10, '2021-08-27', 0.00, 35350.00, '4900.00', 6),
(106, 10, '2021-08-27', 200.00, 84284.00, '85820.00', 7),
(107, 10, '2021-08-27', 0.00, 96909.00, '6900.00', 8),
(108, 10, '2021-08-27', 0.00, 37650.00, '7550.00', 9),
(109, 11, '2021-08-27', 5700.00, 219074.00, '27925.00', 63),
(110, 11, '2021-08-27', 8550.00, 75600.00, '25075.00', 64),
(198, 18, '2021-09-25', 0.00, 18860.00, '8600.00', 1),
(199, 18, '2021-09-25', 9800.00, -60625.00, '5000.00', 37),
(200, 18, '2021-09-25', 0.00, -16500.00, '3000.00', 38),
(201, 18, '2021-09-25', 0.00, -26400.00, '8600.00', 39),
(202, 18, '2021-09-25', 0.00, -26400.00, '8600.00', 40),
(203, 18, '2021-09-25', 0.00, -24200.00, '10800.00', 41),
(204, 18, '2021-09-25', 0.00, -26400.00, '8600.00', 42),
(205, 18, '2021-09-25', 0.00, -26400.00, '8600.00', 43),
(206, 18, '2021-09-25', 0.00, -48400.00, '21600.00', 44),
(207, 18, '2021-09-25', 0.00, -39600.00, '30400.00', 45),
(208, 18, '2021-09-25', 0.00, -3500.00, '24500.00', 46),
(209, 18, '2021-09-25', 0.00, -3500.00, '24500.00', 47),
(210, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 48),
(211, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 49),
(212, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 50),
(213, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 51),
(214, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 53),
(215, 18, '2021-09-25', 0.00, -2250.00, '42750.00', 54),
(216, 18, '2021-09-25', 0.00, 0.00, '45000.00', 60),
(217, 18, '2021-09-25', 0.00, -2200.00, '32800.00', 61),
(218, 18, '2021-09-25', 0.00, -1750.00, '26250.00', 62),
(219, 19, '2021-10-05', 3000.00, 7569.00, '213244.00', 2),
(220, 19, '2021-10-05', 0.00, 54342.00, '78574.00', 3),
(221, 19, '2021-10-05', 0.00, 181404.00, '10825.00', 4),
(222, 20, '2021-10-05', 0.00, 19348.00, '19600.00', 10),
(223, 20, '2021-10-05', 0.00, 12748.00, '13000.00', 11),
(224, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 12),
(225, 20, '2021-10-05', 2200.00, 17136.00, '15200.00', 13),
(226, 20, '2021-10-05', 0.00, 12748.00, '13000.00', 14),
(227, 20, '2021-10-05', 0.00, 12748.00, '13000.00', 15),
(228, 20, '2021-10-05', 0.00, 13948.00, '14200.00', 16),
(229, 20, '2021-10-05', 0.00, 12748.00, '13000.00', 17),
(230, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 18),
(231, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 19),
(232, 20, '2021-10-05', 0.00, 16148.00, '16400.00', 20),
(233, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 21),
(234, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 23),
(235, 20, '2021-10-05', 0.00, 14948.00, '15200.00', 24),
(236, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 25),
(237, 20, '2021-10-05', 0.00, 3932.00, '32800.00', 26),
(238, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 27),
(239, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 28),
(240, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 29),
(241, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 30),
(242, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 31),
(243, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 32),
(244, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 33),
(245, 20, '2021-10-05', 0.00, 3932.00, '32800.00', 34),
(246, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 35),
(247, 20, '2021-10-05', 0.00, 1732.00, '30600.00', 36),
(248, 21, '2021-10-07', 10500.00, 7858.00, '202744.00', 2),
(249, 21, '2021-10-07', 0.00, 54342.00, '78574.00', 3),
(250, 21, '2021-10-07', 0.00, 181404.00, '10825.00', 4),
(251, 22, '2021-10-11', 2200.00, 19336.00, '17400.00', 10),
(252, 22, '2021-10-11', 2200.00, 12736.00, '10800.00', 11),
(253, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 12),
(254, 22, '2021-10-11', 2000.00, 17324.00, '13200.00', 13),
(255, 22, '2021-10-11', 2200.00, 12736.00, '10800.00', 14),
(256, 22, '2021-10-11', 2200.00, 12736.00, '10800.00', 15),
(257, 22, '2021-10-11', 2200.00, 13936.00, '12000.00', 16),
(258, 22, '2021-10-11', 2200.00, 12736.00, '10800.00', 17),
(259, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 18),
(260, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 19),
(261, 22, '2021-10-11', 2200.00, 16136.00, '14200.00', 20),
(262, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 21),
(263, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 23),
(264, 22, '2021-10-11', 2200.00, 14936.00, '13000.00', 24),
(265, 22, '2021-10-11', 1200.00, 2720.00, '29400.00', 25),
(266, 22, '2021-10-11', 0.00, 3932.00, '32800.00', 26),
(267, 22, '2021-10-11', 1200.00, 2720.00, '29400.00', 27),
(268, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 28),
(269, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 29),
(270, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 30),
(271, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 31),
(272, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 32),
(273, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 33),
(274, 22, '2021-10-11', 2200.00, 3920.00, '30600.00', 34),
(275, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 35),
(276, 22, '2021-10-11', 2200.00, 1720.00, '28400.00', 36),
(277, 23, '2021-10-11', 0.00, 18860.00, '8600.00', 1),
(278, 23, '2021-10-11', 0.00, -60625.00, '5000.00', 37),
(279, 23, '2021-10-11', 1650.00, -16525.00, '1350.00', 38),
(280, 23, '2021-10-11', 2250.00, -26462.00, '6350.00', 39),
(281, 23, '2021-10-11', 2200.00, -26412.00, '6400.00', 40),
(282, 23, '2021-10-11', 2200.00, -24212.00, '8600.00', 41),
(283, 23, '2021-10-11', 0.00, -26400.00, '8600.00', 42),
(284, 23, '2021-10-11', 2200.00, -26412.00, '6400.00', 43),
(285, 23, '2021-10-11', 4400.00, -48425.00, '17200.00', 44),
(286, 23, '2021-10-11', 0.00, -39600.00, '30400.00', 45),
(287, 23, '2021-10-11', 1750.00, -3500.00, '22750.00', 46),
(288, 23, '2021-10-11', 1750.00, -3500.00, '22750.00', 47),
(289, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 48),
(290, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 49),
(291, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 50),
(292, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 51),
(293, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 53),
(294, 23, '2021-10-11', 2250.00, -2250.00, '40500.00', 54),
(295, 23, '2021-10-11', 2250.00, 0.00, '42750.00', 60),
(296, 23, '2021-10-11', 2200.00, -2212.00, '30600.00', 61),
(297, 23, '2021-10-11', 0.00, -1750.00, '26250.00', 62),
(298, 24, '2021-10-15', 0.00, 19336.00, '17400.00', 10),
(299, 24, '2021-10-15', 0.00, 12736.00, '10800.00', 11),
(300, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 12),
(301, 24, '2021-10-15', 0.00, 17324.00, '13200.00', 13),
(302, 24, '2021-10-15', 0.00, 12736.00, '10800.00', 14),
(303, 24, '2021-10-15', 0.00, 12736.00, '10800.00', 15),
(304, 24, '2021-10-15', 0.00, 13936.00, '12000.00', 16),
(305, 24, '2021-10-15', 0.00, 12736.00, '10800.00', 17),
(306, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 18),
(307, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 19),
(308, 24, '2021-10-15', 0.00, 16136.00, '14200.00', 20),
(309, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 21),
(310, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 23),
(311, 24, '2021-10-15', 0.00, 14936.00, '13000.00', 24),
(312, 24, '2021-10-15', 0.00, 2720.00, '29400.00', 25),
(313, 24, '2021-10-15', 4400.00, 1720.00, '28400.00', 26),
(314, 24, '2021-10-15', 0.00, 2720.00, '29400.00', 27),
(315, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 28),
(316, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 29),
(317, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 30),
(318, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 31),
(319, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 32),
(320, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 33),
(321, 24, '2021-10-15', 0.00, 3920.00, '30600.00', 34),
(322, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 35),
(323, 24, '2021-10-15', 0.00, 1720.00, '28400.00', 36),
(324, 25, '2021-10-15', 0.00, 7858.00, '202744.00', 2),
(325, 25, '2021-10-15', 4000.00, 53929.00, '74574.00', 3),
(326, 25, '2021-10-15', 0.00, 181404.00, '10825.00', 4),
(327, 25, '2021-10-15', 2200.00, 19324.00, '15200.00', 10),
(328, 25, '2021-10-15', 2200.00, 12724.00, '8600.00', 11),
(329, 25, '2021-10-15', 2200.00, 14924.00, '10800.00', 12),
(330, 25, '2021-10-15', 1000.00, 18512.00, '12200.00', 13),
(331, 25, '2021-10-15', 2200.00, 12724.00, '8600.00', 14),
(332, 25, '2021-10-15', 2200.00, 12724.00, '8600.00', 15),
(333, 25, '2021-10-15', 1600.00, 14524.00, '10400.00', 16),
(334, 25, '2021-10-15', 2200.00, 12724.00, '8600.00', 17),
(335, 25, '2021-10-15', 2200.00, 14924.00, '10800.00', 18),
(336, 25, '2021-10-15', 0.00, 14936.00, '13000.00', 19),
(337, 25, '2021-10-15', 2200.00, 16124.00, '12000.00', 20),
(338, 25, '2021-10-15', 2200.00, 14924.00, '10800.00', 21),
(339, 25, '2021-10-15', 2200.00, 14924.00, '10800.00', 23),
(340, 25, '2021-10-15', 2200.00, 14924.00, '10800.00', 24),
(341, 25, '2021-10-15', 1400.00, 3508.00, '28000.00', 25),
(342, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 26),
(343, 25, '2021-10-15', 2000.00, 2908.00, '27400.00', 27),
(344, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 28),
(345, 25, '2021-10-15', 1500.00, 2408.00, '26900.00', 29),
(346, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 30),
(347, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 31),
(348, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 32),
(349, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 33),
(350, 25, '2021-10-15', 2200.00, 3908.00, '28400.00', 34),
(351, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 35),
(352, 25, '2021-10-15', 2200.00, 1708.00, '26200.00', 36),
(353, 26, '2021-10-20', 2200.00, 18848.00, '6400.00', 1),
(354, 26, '2021-10-20', 0.00, -60625.00, '5000.00', 37),
(355, 26, '2021-10-20', 1650.00, -16550.00, '-300.00', 38),
(356, 26, '2021-10-20', 2200.00, -26474.00, '4150.00', 39),
(357, 26, '2021-10-20', 2200.00, -26424.00, '4200.00', 40),
(358, 26, '2021-10-20', 2200.00, -24224.00, '6400.00', 41),
(359, 26, '2021-10-20', 4400.00, -28612.00, '4200.00', 42),
(360, 26, '2021-10-20', 2200.00, -26424.00, '4200.00', 43),
(361, 26, '2021-10-20', 4400.00, -48450.00, '12800.00', 44),
(362, 26, '2021-10-20', 8800.00, -44025.00, '21600.00', 45),
(363, 26, '2021-10-20', 1750.00, -3500.00, '21000.00', 46),
(364, 26, '2021-10-20', 1750.00, -3500.00, '21000.00', 47),
(365, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 48),
(366, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 49),
(367, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 50),
(368, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 51),
(369, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 53),
(370, 26, '2021-10-20', 2250.00, -2250.00, '38250.00', 54),
(371, 26, '2021-10-20', 2250.00, 0.00, '40500.00', 60),
(372, 26, '2021-10-20', 2200.00, -2224.00, '28400.00', 61),
(373, 26, '2021-10-20', 1750.00, -1750.00, '24500.00', 62),
(374, 27, '2021-10-20', 0.00, 7858.00, '202744.00', 2),
(375, 27, '2021-10-20', 4000.00, 53516.00, '70574.00', 3),
(376, 27, '2021-10-20', 0.00, 181404.00, '10825.00', 4),
(377, 28, '2021-10-27', 2200.00, 18836.00, '4200.00', 1),
(378, 28, '2021-10-27', 0.00, -60625.00, '5000.00', 37),
(379, 28, '2021-10-27', 2200.00, -26486.00, '1950.00', 39),
(380, 28, '2021-10-27', 2200.00, -26436.00, '2000.00', 40),
(381, 28, '2021-10-27', 2200.00, -24236.00, '4200.00', 41),
(382, 28, '2021-10-27', 2200.00, -28624.00, '2000.00', 42),
(383, 28, '2021-10-27', 2200.00, -26436.00, '2000.00', 43),
(384, 28, '2021-10-27', 4400.00, -48475.00, '8400.00', 44),
(385, 28, '2021-10-27', 4400.00, -44050.00, '17200.00', 45),
(386, 28, '2021-10-27', 1750.00, -3500.00, '19250.00', 46),
(387, 28, '2021-10-27', 1750.00, -3500.00, '19250.00', 47),
(388, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 48),
(389, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 49),
(390, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 50),
(391, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 51),
(392, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 53),
(393, 28, '2021-10-27', 2250.00, -2250.00, '36000.00', 54),
(394, 28, '2021-10-27', 2250.00, 0.00, '38250.00', 60),
(395, 28, '2021-10-27', 2200.00, -2236.00, '26200.00', 61),
(396, 28, '2021-10-27', 1750.00, -1750.00, '22750.00', 62),
(397, 29, '2021-10-22', 2200.00, 19312.00, '13000.00', 10),
(398, 29, '2021-10-22', 1100.00, 13812.00, '7500.00', 11),
(399, 29, '2021-10-22', 2200.00, 14912.00, '8600.00', 12),
(400, 29, '2021-10-22', 3000.00, 17700.00, '9200.00', 13),
(401, 29, '2021-10-22', 2200.00, 12712.00, '6400.00', 14),
(402, 29, '2021-10-22', 2200.00, 12712.00, '6400.00', 15),
(403, 29, '2021-10-22', 2200.00, 14512.00, '8200.00', 16),
(404, 29, '2021-10-22', 0.00, 12724.00, '8600.00', 17),
(405, 29, '2021-10-22', 2200.00, 14912.00, '8600.00', 18),
(406, 29, '2021-10-22', 2200.00, 14924.00, '10800.00', 19),
(407, 29, '2021-10-22', 1000.00, 17312.00, '11000.00', 20),
(408, 29, '2021-10-22', 2200.00, 14912.00, '8600.00', 21),
(409, 29, '2021-10-22', 2200.00, 14912.00, '8600.00', 23),
(410, 29, '2021-10-22', 2200.00, 14912.00, '8600.00', 24),
(411, 29, '2021-10-22', 3000.00, 2696.00, '25000.00', 25),
(412, 29, '2021-10-22', 0.00, 1708.00, '26200.00', 26),
(413, 29, '2021-10-22', 2200.00, 2896.00, '25200.00', 27),
(414, 29, '2021-10-22', 2200.00, 1696.00, '24000.00', 28),
(415, 29, '2021-10-22', 2200.00, 2396.00, '24700.00', 29),
(416, 29, '2021-10-22', 2200.00, 1696.00, '24000.00', 30),
(417, 29, '2021-10-22', 0.00, 1708.00, '26200.00', 31),
(418, 29, '2021-10-22', 2200.00, 1696.00, '24000.00', 32),
(419, 29, '2021-10-22', 2200.00, 1696.00, '24000.00', 33),
(420, 29, '2021-10-22', 2200.00, 3896.00, '26200.00', 34),
(421, 29, '2021-10-22', 2100.00, 1796.00, '24100.00', 35),
(422, 29, '2021-10-22', 2200.00, 1696.00, '24000.00', 36),
(423, 30, '2021-11-04', 2200.00, 19300.00, '10800.00', 10),
(424, 30, '2021-11-04', 2200.00, 13800.00, '5300.00', 11),
(425, 30, '2021-11-04', 2200.00, 14900.00, '6400.00', 12),
(426, 30, '2021-11-04', 2200.00, 17688.00, '7000.00', 13),
(427, 30, '2021-11-04', 2200.00, 12700.00, '4200.00', 14),
(428, 30, '2021-11-04', 2200.00, 12700.00, '4200.00', 15),
(429, 30, '2021-11-04', 2200.00, 14500.00, '6000.00', 16),
(430, 30, '2021-11-04', 2200.00, 12712.00, '6400.00', 17),
(431, 30, '2021-11-04', 2200.00, 14900.00, '6400.00', 18),
(432, 30, '2021-11-04', 2200.00, 14912.00, '8600.00', 19),
(433, 30, '2021-11-04', 700.00, 18800.00, '10300.00', 20),
(434, 30, '2021-11-04', 2200.00, 14900.00, '6400.00', 21),
(435, 30, '2021-11-04', 2200.00, 14900.00, '6400.00', 23),
(436, 30, '2021-11-04', 1200.00, 15900.00, '7400.00', 24),
(437, 30, '2021-11-04', 2200.00, 2684.00, '22800.00', 25),
(438, 30, '2021-11-04', 0.00, 1708.00, '26200.00', 26),
(439, 30, '2021-11-04', 2000.00, 3084.00, '23200.00', 27),
(440, 30, '2021-11-04', 2200.00, 1684.00, '21800.00', 28),
(441, 30, '2021-11-04', 2000.00, 2584.00, '22700.00', 29),
(442, 30, '2021-11-04', 2200.00, 1684.00, '21800.00', 30),
(443, 30, '2021-11-04', 2200.00, 1696.00, '24000.00', 31),
(444, 30, '2021-11-04', 2200.00, 1684.00, '21800.00', 32),
(445, 30, '2021-11-04', 2200.00, 1684.00, '21800.00', 33),
(446, 30, '2021-11-04', 2200.00, 3884.00, '24000.00', 34),
(447, 30, '2021-11-04', 2200.00, 1784.00, '21900.00', 35),
(448, 30, '2021-11-04', 2200.00, 1684.00, '21800.00', 36),
(449, 31, '2021-10-29', 2200.00, 18824.00, '2000.00', 1),
(450, 31, '2021-10-29', 5000.00, -61250.00, '0.00', 37),
(451, 31, '2021-10-29', 0.00, -26486.00, '1950.00', 39),
(452, 31, '2021-10-29', 2200.00, -26448.00, '-200.00', 40),
(453, 31, '2021-10-29', 4400.00, -26448.00, '-200.00', 41),
(454, 31, '2021-10-29', 2200.00, -28636.00, '-200.00', 42),
(455, 31, '2021-10-29', 2200.00, -26448.00, '-200.00', 43),
(456, 31, '2021-10-29', 4400.00, -48500.00, '4000.00', 44),
(457, 31, '2021-10-29', 4400.00, -44075.00, '12800.00', 45),
(458, 31, '2021-10-29', 1750.00, -3500.00, '17500.00', 46),
(459, 31, '2021-10-29', 1750.00, -3500.00, '17500.00', 47),
(460, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 48),
(461, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 49),
(462, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 50),
(463, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 51),
(464, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 53),
(465, 31, '2021-10-29', 2250.00, -2250.00, '33750.00', 54),
(466, 31, '2021-10-29', 2250.00, 0.00, '36000.00', 60),
(467, 31, '2021-10-29', 2200.00, -2248.00, '24000.00', 61),
(468, 31, '2021-10-29', 1750.00, -1750.00, '21000.00', 62),
(469, 32, '2021-10-31', 0.00, 7858.00, '202744.00', 2),
(470, 32, '2021-10-31', 5500.00, 51603.00, '65074.00', 3),
(471, 32, '2021-10-31', 0.00, 181404.00, '10825.00', 4),
(472, 33, '2021-11-05', 2200.00, 18812.00, '-200.00', 1),
(473, 33, '2021-11-05', 0.00, -61250.00, '0.00', 37),
(474, 33, '2021-11-05', 2200.00, -26498.00, '-250.00', 39),
(475, 33, '2021-11-05', 4400.00, -48525.00, '-400.00', 44),
(476, 33, '2021-11-05', 4400.00, -44100.00, '8400.00', 45),
(477, 33, '2021-11-05', 1750.00, -3500.00, '15750.00', 46),
(478, 33, '2021-11-05', 1750.00, -3500.00, '15750.00', 47),
(479, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 48),
(480, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 49),
(481, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 50),
(482, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 51),
(483, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 53),
(484, 33, '2021-11-05', 2250.00, -2250.00, '31500.00', 54),
(485, 33, '2021-11-05', 2250.00, 0.00, '33750.00', 60),
(486, 33, '2021-11-05', 2200.00, -2260.00, '21800.00', 61),
(487, 33, '2021-11-05', 1750.00, -1750.00, '19250.00', 62),
(488, 34, '2021-11-05', 2200.00, 19288.00, '8600.00', 10),
(489, 34, '2021-11-05', 0.00, 13800.00, '5300.00', 11),
(490, 34, '2021-11-05', 2200.00, 14888.00, '4200.00', 12),
(491, 34, '2021-11-05', 2200.00, 17676.00, '4800.00', 13),
(492, 34, '2021-11-05', 2200.00, 12688.00, '2000.00', 14),
(493, 34, '2021-11-05', 0.00, 12700.00, '4200.00', 15),
(494, 34, '2021-11-05', 0.00, 14500.00, '6000.00', 16),
(495, 34, '2021-11-05', 0.00, 12712.00, '6400.00', 17),
(496, 34, '2021-11-05', 0.00, 14900.00, '6400.00', 18),
(497, 34, '2021-11-05', 2200.00, 14900.00, '6400.00', 19),
(498, 34, '2021-11-05', 2200.00, 18788.00, '8100.00', 20),
(499, 34, '2021-11-05', 2200.00, 14888.00, '4200.00', 21),
(500, 34, '2021-11-05', 0.00, 14900.00, '6400.00', 23),
(501, 34, '2021-11-05', 2200.00, 15888.00, '5200.00', 24),
(502, 34, '2021-11-05', 2200.00, 2672.00, '20600.00', 25),
(503, 34, '2021-11-05', 0.00, 1708.00, '26200.00', 26),
(504, 34, '2021-11-05', 0.00, 3084.00, '23200.00', 27),
(505, 34, '2021-11-05', 0.00, 1684.00, '21800.00', 28),
(506, 34, '2021-11-05', 2200.00, 2572.00, '20500.00', 29),
(507, 34, '2021-11-05', 2000.00, 1872.00, '19800.00', 30),
(508, 34, '2021-11-05', 2200.00, 1684.00, '21800.00', 31),
(509, 34, '2021-11-05', 2000.00, 1872.00, '19800.00', 32),
(510, 34, '2021-11-05', 2200.00, 1672.00, '19600.00', 33),
(511, 34, '2021-11-05', 2200.00, 3872.00, '21800.00', 34),
(512, 34, '2021-11-05', 2200.00, 1772.00, '19700.00', 35),
(513, 34, '2021-11-05', 2200.00, 1672.00, '19600.00', 36),
(514, 35, '2021-11-07', 0.00, 7858.00, '202744.00', 2),
(515, 35, '2021-11-07', 3600.00, 51590.00, '61474.00', 3),
(516, 35, '2021-11-07', 0.00, 181404.00, '10825.00', 4),
(517, 36, '2021-11-12', 0.00, -61250.00, '0.00', 37),
(518, 36, '2021-11-12', 4400.00, -44125.00, '4000.00', 45),
(519, 36, '2021-11-12', 1750.00, -3500.00, '14000.00', 46),
(520, 36, '2021-11-12', 1750.00, -3500.00, '14000.00', 47),
(521, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 48),
(522, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 49),
(523, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 50),
(524, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 51),
(525, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 53),
(526, 36, '2021-11-12', 2250.00, -2250.00, '29250.00', 54),
(527, 36, '2021-11-12', 2250.00, 0.00, '31500.00', 60),
(528, 36, '2021-11-12', 2200.00, -2272.00, '19600.00', 61),
(529, 36, '2021-11-12', 1750.00, -1750.00, '17500.00', 62),
(530, 36, '2021-11-12', 2200.00, -12.00, '32800.00', 65),
(531, 36, '2021-11-12', 2200.00, -12.00, '32800.00', 66),
(532, 36, '2021-11-12', 2200.00, -12.00, '32800.00', 67),
(533, 37, '2021-11-12', 2200.00, 19276.00, '6400.00', 10),
(534, 37, '2021-11-12', 2200.00, 13788.00, '3100.00', 11),
(535, 37, '2021-11-12', 2200.00, 14876.00, '2000.00', 12),
(536, 37, '2021-11-12', 2200.00, 17664.00, '2600.00', 13),
(537, 37, '2021-11-12', 2200.00, 12676.00, '-200.00', 14),
(538, 37, '2021-11-12', 4400.00, 10488.00, '-200.00', 15),
(539, 37, '2021-11-12', 2200.00, 14488.00, '3800.00', 16),
(540, 37, '2021-11-12', 3000.00, 11900.00, '3400.00', 17),
(541, 37, '2021-11-12', 4400.00, 12688.00, '2000.00', 18),
(542, 37, '2021-11-12', 2200.00, 14888.00, '4200.00', 19),
(543, 37, '2021-11-12', 2200.00, 18776.00, '5900.00', 20),
(544, 37, '2021-11-12', 2200.00, 14876.00, '2000.00', 21),
(545, 37, '2021-11-12', 0.00, 14900.00, '6400.00', 23),
(546, 37, '2021-11-12', 3200.00, 14876.00, '2000.00', 24),
(547, 37, '2021-11-12', 2200.00, 2660.00, '18400.00', 25),
(548, 37, '2021-11-12', 2500.00, 1396.00, '23700.00', 26),
(549, 37, '2021-11-12', 1000.00, 4272.00, '22200.00', 27),
(550, 37, '2021-11-12', 0.00, 1684.00, '21800.00', 28),
(551, 37, '2021-11-12', 2200.00, 2560.00, '18300.00', 29),
(552, 37, '2021-11-12', 2200.00, 1860.00, '17600.00', 30),
(553, 37, '2021-11-12', 2200.00, 1672.00, '19600.00', 31),
(554, 37, '2021-11-12', 2200.00, 1860.00, '17600.00', 32),
(555, 37, '2021-11-12', 2200.00, 1660.00, '17400.00', 33),
(556, 37, '2021-11-12', 2200.00, 3860.00, '19600.00', 34),
(557, 37, '2021-11-12', 2200.00, 1760.00, '17500.00', 35),
(558, 37, '2021-11-12', 2200.00, 1660.00, '17400.00', 36),
(559, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 70),
(560, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 71),
(561, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 72),
(562, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 73),
(563, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 74),
(564, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 75),
(565, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 76),
(566, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 77),
(567, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 78),
(568, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 79),
(569, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 80),
(570, 38, '2021-11-19', 1350.00, -37.00, '19650.00', 81),
(571, 39, '2021-11-19', 4400.00, -44150.00, '-400.00', 45),
(572, 39, '2021-11-19', 1750.00, -3500.00, '12250.00', 46),
(573, 39, '2021-11-19', 1750.00, -3500.00, '12250.00', 47),
(574, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 48),
(575, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 49),
(576, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 50),
(577, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 51),
(578, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 53),
(579, 39, '2021-11-19', 2250.00, -2250.00, '27000.00', 54),
(580, 39, '2021-11-19', 2250.00, 0.00, '29250.00', 60),
(581, 39, '2021-11-19', 2200.00, -2284.00, '17400.00', 61),
(582, 39, '2021-11-19', 0.00, -1750.00, '17500.00', 62),
(583, 39, '2021-11-19', 2200.00, -24.00, '30600.00', 65),
(584, 39, '2021-11-19', 2200.00, -24.00, '30600.00', 66),
(585, 39, '2021-11-19', 2200.00, -24.00, '30600.00', 67),
(586, 39, '2021-11-19', 2200.00, -12.00, '32800.00', 68),
(587, 39, '2021-11-19', 2200.00, -12.00, '32800.00', 69),
(588, 40, '2021-11-19', 6600.00, 14864.00, '-200.00', 10),
(589, 40, '2021-11-19', 0.00, 13788.00, '3100.00', 11),
(590, 40, '2021-11-19', 2200.00, 14864.00, '-200.00', 12),
(591, 40, '2021-11-19', 2200.00, 17652.00, '400.00', 13),
(592, 40, '2021-11-19', 2200.00, 14476.00, '1600.00', 16),
(593, 40, '2021-11-19', 5600.00, 8488.00, '-2200.00', 17),
(594, 40, '2021-11-19', 2200.00, 12676.00, '-200.00', 18),
(595, 40, '2021-11-19', 0.00, 14888.00, '4200.00', 19),
(596, 40, '2021-11-19', 0.00, 18776.00, '5900.00', 20),
(597, 40, '2021-11-19', 2200.00, 14864.00, '-200.00', 21),
(598, 40, '2021-11-19', 4400.00, 12688.00, '2000.00', 23),
(599, 40, '2021-11-19', 2200.00, 14864.00, '-200.00', 24),
(600, 40, '2021-11-19', 2200.00, 2648.00, '16200.00', 25),
(601, 40, '2021-11-19', 0.00, 1396.00, '23700.00', 26),
(602, 40, '2021-11-19', 1200.00, 5260.00, '21000.00', 27),
(603, 40, '2021-11-19', 0.00, 1684.00, '21800.00', 28),
(604, 40, '2021-11-19', 2200.00, 2548.00, '16100.00', 29),
(605, 40, '2021-11-19', 2000.00, 2048.00, '15600.00', 30),
(606, 40, '2021-11-19', 2200.00, 1660.00, '17400.00', 31),
(607, 40, '2021-11-19', 2200.00, 1848.00, '15400.00', 32),
(608, 40, '2021-11-19', 2200.00, 1648.00, '15200.00', 33),
(609, 40, '2021-11-19', 2200.00, 3848.00, '17400.00', 34),
(610, 40, '2021-11-19', 2200.00, 1748.00, '15300.00', 35),
(611, 40, '2021-11-19', 2200.00, 1648.00, '15200.00', 36),
(612, 41, '2021-11-19', 0.00, 7858.00, '202744.00', 2),
(613, 41, '2021-11-19', 5000.00, 50177.00, '56474.00', 3),
(614, 41, '2021-11-19', 0.00, 181404.00, '10825.00', 4),
(615, 41, '2021-11-19', 0.00, 13788.00, '3100.00', 11),
(616, 41, '2021-11-19', 400.00, 19440.00, '0.00', 13),
(617, 41, '2021-11-19', 0.00, 14476.00, '1600.00', 16),
(618, 41, '2021-11-19', 0.00, 14888.00, '4200.00', 19),
(619, 41, '2021-11-19', 0.00, 18776.00, '5900.00', 20),
(620, 41, '2021-11-19', 0.00, 12688.00, '2000.00', 23),
(621, 41, '2021-11-19', 0.00, 2648.00, '16200.00', 25),
(622, 41, '2021-11-19', 0.00, 1396.00, '23700.00', 26),
(623, 41, '2021-11-19', 0.00, 5260.00, '21000.00', 27),
(624, 41, '2021-11-19', 0.00, 1684.00, '21800.00', 28),
(625, 41, '2021-11-19', 0.00, 2548.00, '16100.00', 29),
(626, 41, '2021-11-19', 0.00, 2048.00, '15600.00', 30),
(627, 41, '2021-11-19', 0.00, 1660.00, '17400.00', 31),
(628, 41, '2021-11-19', 0.00, 1848.00, '15400.00', 32),
(629, 41, '2021-11-19', 0.00, 1648.00, '15200.00', 33),
(630, 41, '2021-11-19', 0.00, 3848.00, '17400.00', 34),
(631, 41, '2021-11-19', 0.00, 1748.00, '15300.00', 35),
(632, 41, '2021-11-19', 0.00, 1648.00, '15200.00', 36),
(633, 41, '2021-11-19', 0.00, 0.00, '35000.00', 82),
(634, 41, '2021-11-19', 0.00, 0.00, '35000.00', 83),
(635, 41, '2021-11-19', 0.00, 0.00, '35000.00', 84),
(636, 41, '2021-11-19', 0.00, 0.00, '35000.00', 85),
(637, 41, '2021-11-19', 0.00, 0.00, '35000.00', 86),
(638, 41, '2021-11-19', 0.00, 0.00, '35000.00', 87),
(639, 41, '2021-11-19', 0.00, 0.00, '35000.00', 88),
(640, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 70),
(641, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 71),
(642, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 72),
(643, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 73),
(644, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 74),
(645, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 75),
(646, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 76),
(647, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 77),
(648, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 78),
(649, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 79),
(650, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 80),
(651, 42, '2021-11-25', 1350.00, -74.00, '18300.00', 81),
(652, 43, '2021-11-25', 1750.00, -3500.00, '10500.00', 46),
(653, 43, '2021-11-25', 1750.00, -3500.00, '10500.00', 47),
(654, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 48),
(655, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 49),
(656, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 50),
(657, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 51),
(658, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 53),
(659, 43, '2021-11-25', 2250.00, -2250.00, '24750.00', 54),
(660, 43, '2021-11-25', 2250.00, 0.00, '27000.00', 60),
(661, 43, '2021-11-25', 2200.00, -2296.00, '15200.00', 61),
(662, 43, '2021-11-25', 1750.00, -1750.00, '15750.00', 62),
(663, 43, '2021-11-25', 2200.00, -36.00, '28400.00', 65),
(664, 43, '2021-11-25', 2200.00, -36.00, '28400.00', 66),
(665, 43, '2021-11-25', 2200.00, -36.00, '28400.00', 67),
(666, 43, '2021-11-25', 2200.00, -24.00, '30600.00', 68),
(667, 43, '2021-11-25', 2200.00, -24.00, '30600.00', 69),
(668, 44, '2021-11-26', 2000.00, 13976.00, '1100.00', 11),
(669, 44, '2021-11-26', 2200.00, 14464.00, '-600.00', 16),
(670, 44, '2021-11-26', 4400.00, 12676.00, '-200.00', 19),
(671, 44, '2021-11-26', 5000.00, 15964.00, '900.00', 20),
(672, 44, '2021-11-26', 2200.00, 12676.00, '-200.00', 23),
(673, 44, '2021-11-26', 2200.00, 2636.00, '14000.00', 25),
(674, 44, '2021-11-26', 0.00, 1396.00, '23700.00', 26),
(675, 44, '2021-11-26', 1000.00, 6448.00, '20000.00', 27),
(676, 44, '2021-11-26', 6600.00, -2728.00, '15200.00', 28),
(677, 44, '2021-11-26', 2200.00, 2536.00, '13900.00', 29),
(678, 44, '2021-11-26', 2200.00, 2036.00, '13400.00', 30),
(679, 44, '2021-11-26', 2200.00, 1648.00, '15200.00', 31),
(680, 44, '2021-11-26', 2200.00, 1836.00, '13200.00', 32),
(681, 44, '2021-11-26', 2200.00, 1636.00, '13000.00', 33),
(682, 44, '2021-11-26', 2000.00, 4036.00, '15400.00', 34),
(683, 44, '2021-11-26', 2200.00, 1736.00, '13100.00', 35),
(684, 44, '2021-11-26', 2200.00, 1636.00, '13000.00', 36),
(685, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 82),
(686, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 83),
(687, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 84),
(688, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 85),
(689, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 86),
(690, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 87),
(691, 44, '2021-11-26', 2200.00, -12.00, '32800.00', 88),
(692, 45, '2021-11-26', 0.00, 7858.00, '202744.00', 2),
(693, 45, '2021-11-26', 4000.00, 49764.00, '52474.00', 3),
(694, 45, '2021-11-26', 0.00, 181404.00, '10825.00', 4),
(695, 45, '2021-11-26', 0.00, 7858.00, '202744.00', 2),
(696, 45, '2021-11-26', 74.00, 53277.00, '52400.00', 3),
(697, 45, '2021-11-26', 0.00, 181404.00, '10825.00', 4),
(698, 45, '2021-11-26', 44.00, 18603.00, '202700.00', 2),
(699, 45, '2021-11-26', 0.00, 53277.00, '52400.00', 3),
(700, 45, '2021-11-26', 0.00, 181404.00, '10825.00', 4),
(701, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 70),
(702, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 71),
(703, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 72),
(704, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 73),
(705, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 74),
(706, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 75),
(707, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 76),
(708, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 77),
(709, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 78),
(710, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 79),
(711, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 80),
(712, 46, '2021-12-03', 1350.00, -111.00, '16950.00', 81),
(713, 47, '2021-12-03', 1750.00, -3500.00, '8750.00', 46),
(714, 47, '2021-12-03', 1750.00, -3500.00, '8750.00', 47),
(715, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 48),
(716, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 49),
(717, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 50),
(718, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 51),
(719, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 53),
(720, 47, '2021-12-03', 2250.00, -2250.00, '22500.00', 54),
(721, 47, '2021-12-03', 2250.00, 0.00, '24750.00', 60),
(722, 47, '2021-12-03', 2200.00, -2308.00, '13000.00', 61),
(723, 47, '2021-12-03', 1750.00, -1750.00, '14000.00', 62),
(724, 47, '2021-12-03', 2200.00, -48.00, '26200.00', 65),
(725, 47, '2021-12-03', 2200.00, -48.00, '26200.00', 66),
(726, 47, '2021-12-03', 2200.00, -48.00, '26200.00', 67),
(727, 47, '2021-12-03', 2200.00, -36.00, '28400.00', 68),
(728, 47, '2021-12-03', 2200.00, -36.00, '28400.00', 69),
(729, 48, '2021-12-03', 0.00, 13976.00, '1100.00', 11),
(730, 48, '2021-12-03', 0.00, 15964.00, '900.00', 20),
(731, 48, '2021-12-03', 2200.00, 2624.00, '11800.00', 25),
(732, 48, '2021-12-03', 2200.00, 1384.00, '21500.00', 26),
(733, 48, '2021-12-03', 1500.00, 7136.00, '18500.00', 27),
(734, 48, '2021-12-03', 0.00, -2728.00, '15200.00', 28),
(735, 48, '2021-12-03', 0.00, 2536.00, '13900.00', 29),
(736, 48, '2021-12-03', 2200.00, 2024.00, '11200.00', 30),
(737, 48, '2021-12-03', 2200.00, 1636.00, '13000.00', 31),
(738, 48, '2021-12-03', 2200.00, 1824.00, '11000.00', 32),
(739, 48, '2021-12-03', 2200.00, 1624.00, '10800.00', 33),
(740, 48, '2021-12-03', 2000.00, 4224.00, '13400.00', 34),
(741, 48, '2021-12-03', 2200.00, 1724.00, '10900.00', 35),
(742, 48, '2021-12-03', 2200.00, 1624.00, '10800.00', 36),
(743, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 82),
(744, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 83),
(745, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 84),
(746, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 85),
(747, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 86),
(748, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 87),
(749, 48, '2021-12-03', 2200.00, -24.00, '30600.00', 88),
(750, 48, '2021-12-03', 2200.00, -12.00, '32800.00', 89),
(751, 48, '2021-12-03', 1750.00, 0.00, '26250.00', 90),
(752, 48, '2021-12-03', 1750.00, 0.00, '26250.00', 91),
(753, 48, '2021-12-03', 2200.00, -12.00, '32800.00', 92),
(754, 48, '2021-12-03', 0.00, 13976.00, '1100.00', 11),
(755, 48, '2021-12-03', 900.00, 17252.00, '0.00', 20),
(756, 48, '2021-12-03', 0.00, 2624.00, '11800.00', 25),
(757, 48, '2021-12-03', 0.00, 1384.00, '21500.00', 26),
(758, 48, '2021-12-03', 0.00, 7136.00, '18500.00', 27),
(759, 48, '2021-12-03', 0.00, -2728.00, '15200.00', 28),
(760, 48, '2021-12-03', 0.00, 2536.00, '13900.00', 29),
(761, 48, '2021-12-03', 0.00, 2024.00, '11200.00', 30),
(762, 48, '2021-12-03', 0.00, 1636.00, '13000.00', 31),
(763, 48, '2021-12-03', 0.00, 1824.00, '11000.00', 32),
(764, 48, '2021-12-03', 0.00, 1624.00, '10800.00', 33),
(765, 48, '2021-12-03', 0.00, 4224.00, '13400.00', 34),
(766, 48, '2021-12-03', 0.00, 1724.00, '10900.00', 35),
(767, 48, '2021-12-03', 0.00, 1624.00, '10800.00', 36),
(768, 48, '2021-12-03', 0.00, -24.00, '30600.00', 82),
(769, 48, '2021-12-03', 0.00, -24.00, '30600.00', 83),
(770, 48, '2021-12-03', 0.00, -24.00, '30600.00', 84),
(771, 48, '2021-12-03', 0.00, -24.00, '30600.00', 85),
(772, 48, '2021-12-03', 0.00, -24.00, '30600.00', 86),
(773, 48, '2021-12-03', 0.00, -24.00, '30600.00', 87),
(774, 48, '2021-12-03', 0.00, -24.00, '30600.00', 88),
(775, 48, '2021-12-03', 0.00, -12.00, '32800.00', 89),
(776, 48, '2021-12-03', 0.00, 0.00, '26250.00', 90),
(777, 48, '2021-12-03', 0.00, 0.00, '26250.00', 91),
(778, 48, '2021-12-03', 0.00, -12.00, '32800.00', 92);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `bank` double(10,2) NOT NULL,
  `textOther1` varchar(250) NOT NULL,
  `other1` double(10,2) NOT NULL,
  `textOther2` varchar(250) NOT NULL,
  `other2` double(10,2) NOT NULL,
  `textOther3` varchar(250) NOT NULL,
  `other3` decimal(10,2) NOT NULL,
  `textOther4` varchar(250) NOT NULL,
  `other4` decimal(10,2) NOT NULL,
  `textOther5` varchar(250) NOT NULL,
  `other5` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `bank`, `textOther1`, `other1`, `textOther2`, `other2`, `textOther3`, `other3`, `textOther4`, `other4`, `textOther5`, `other5`) VALUES
(1, 191500.00, 'THELAWALA', 264225.00, 'HARSHINI', 16750.00, 'NIPUN', '50000.00', 'NO', '10.00', 'NO', '10.00');

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
(1, '2021', '06', '155000.00', '34962.00', '2021-06-16'),
(2, '2021', '01', '0.00', '0.00', '2021-06-16'),
(3, '2021', '02', '0.00', '0.00', '2021-06-16'),
(4, '2021', '03', '0.00', '0.00', '2021-06-16'),
(5, '2021', '04', '0.00', '0.00', '2021-06-16'),
(6, '2021', '05', '0.00', '0.00', '2021-06-16'),
(7, '2021', '07', '0.00', '0.00', '2021-06-16'),
(8, '2021', '08', '2173700.00', '983759.00', '2021-06-16'),
(9, '2021', '09', '0.00', '31400.00', '2021-06-16'),
(10, '2021', '10', '0.00', '317200.00', '2021-06-16'),
(11, '2021', '11', '570000.00', '499068.00', '2021-06-16'),
(12, '2021', '12', '0.00', '95700.00', '2021-06-16');

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
(1, 5, 'MT00005', 52, '30000.00', '32700.00', '2250.00', '2625.00', '0.00'),
(2, 6, 'MT00006', 51, '30000.00', '35350.00', '4900.00', '2625.00', '0.00'),
(3, 7, 'MT00007', 49, '100000.00', '84284.00', '85820.00', '2917.00', '0.00'),
(4, 8, 'MT00008', 48, '20000.00', '96909.00', '6900.00', '2242.00', '0.00'),
(5, 9, 'MT00009', 50, '30000.00', '37650.00', '7550.00', '2625.00', '0.00');

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
-- Indexes for table `centersSummaryTB`
--
ALTER TABLE `centersSummaryTB`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `centersSummaryTB`
--
ALTER TABLE `centersSummaryTB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `loan_installement`
--
ALTER TABLE `loan_installement`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=779;

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
