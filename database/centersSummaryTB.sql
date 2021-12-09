-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 09, 2021 at 05:49 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `JB1`
--

-- --------------------------------------------------------

--
-- Table structure for table `centersSummaryTB`
--

CREATE TABLE `centersSummaryTB`
(
  `id` int
(11) NOT NULL,
  `ang1_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00',
  `ang2_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00',
  `ang3_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00',
  `ang4_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00',
  `ang5_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00',
  `ang6_Pay` decimal
(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centersSummaryTB`
--

INSERT INTO `centersSummaryTB` (`
id`,
`ang1_Pay
`, `ang2_Pay`, `ang3_Pay`, `ang4_Pay`, `ang5_Pay`, `ang6_Pay`) VALUES
(1, '0.00', '5.00', '5.00', '5.00', '5.00', '5.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centersSummaryTB`
--
ALTER TABLE `centersSummaryTB`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centersSummaryTB`
--
ALTER TABLE `centersSummaryTB`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
