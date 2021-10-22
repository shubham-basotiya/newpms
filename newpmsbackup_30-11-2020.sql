-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 05:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adId` int(11) NOT NULL,
  `adName` varchar(250) NOT NULL,
  `adEmail` varchar(250) NOT NULL,
  `adUsername` varchar(250) NOT NULL,
  `adPassword` varchar(250) NOT NULL,
  `adMob` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adId`, `adName`, `adEmail`, `adUsername`, `adPassword`, `adMob`) VALUES
(1, 'SHUBHAM', 'shubhamsharma@gmail.com', 'shubhamsharma', 'cbc0c43b7014bb5af7f9b3ba2fdc1fcf', 1239938954),
(2, 'KARTIK', 'kartiksharma@gmail.com', 'kartiksharma', '6795ae80522b1e11e36e97c9a5d26ef8', 1234560987),
(3, 'Kartik', 'kartiksharma@gmail.com', 'kartiksharma', '6795ae80522b1e11e36e97c9a5d26ef8', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `mr`
--

CREATE TABLE `mr` (
  `mrId` int(11) NOT NULL,
  `mrName` varchar(250) NOT NULL,
  `mrEmail` varchar(250) NOT NULL,
  `mrUsername` varchar(250) NOT NULL,
  `mrPassword` varchar(250) NOT NULL,
  `mrMob` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr`
--

INSERT INTO `mr` (`mrId`, `mrName`, `mrEmail`, `mrUsername`, `mrPassword`, `mrMob`) VALUES
(1, 'ROMI', 'romimawandia@gmail.com', 'romimawandia', 'cfd037e04124857541955af74c80f42a', 1234657890),
(2, 'keshavsharma', 'keshavsharma@gmail.com', 'keshavchirawa', '5d892f662fdf42e37cb4298908b610ce', 2147483647),
(3, 'Raman', 'ramanmawandia@gmail.com', 'ramanmawandia@gmail.com', 'd1c3d20e8b20c5c21bb47be502959854', 2147483647),
(4, 'kunal', 'kunalsharma@gmail.com', 'kunalsharma', '4d1ef206fc5639dfaa199016dc2b069f', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Id` int(11) NOT NULL,
  `companyName` varchar(250) NOT NULL,
  `tabletName` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `mfDate` date NOT NULL,
  `exDate` date NOT NULL,
  `holsalePrice` decimal(10,2) NOT NULL,
  `retailPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Id`, `companyName`, `tabletName`, `quantity`, `mfDate`, `exDate`, `holsalePrice`, `retailPrice`) VALUES
(1, 'Cipla', 'OMEED', 25, '2018-04-18', '2020-12-12', '25.00', '35.00'),
(2, 'Sun Pharma', 'Oxy', 50, '2019-02-19', '2023-04-02', '45.00', '55.00'),
(3, 'Aris', 'iCure', 10, '2018-10-25', '2021-08-02', '65.00', '75.00'),
(4, 'Respisure', 'CT10', 20, '2018-08-20', '2021-10-08', '42.00', '52.00'),
(5, 'Cipla', 'CM-S', 21, '2020-11-18', '2022-02-09', '25.00', '78.00'),
(6, 'Cipla', 'Sumo', 30, '2020-11-18', '2022-02-09', '5.00', '10.00'),
(7, 'Astro', 'Asthma', 15, '2020-11-11', '2022-06-15', '25.00', '65.00'),
(8, 'Astro', 'Asthma', 15, '2020-11-11', '2022-06-15', '25.00', '65.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adId`);

--
-- Indexes for table `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`mrId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mr`
--
ALTER TABLE `mr`
  MODIFY `mrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
