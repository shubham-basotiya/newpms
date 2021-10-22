-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 04:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
(3, 'Kartik', 'kartiksharma@gmail.com', 'kartiksharma', '6795ae80522b1e11e36e97c9a5d26ef8', 2147483647),
(4, 'arun', 'arunsharma@gmail.com', 'arunmishra', 'a4022350c752e9f571c2f680bf6ab19c', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(33, 'Contact Shubham Shar', 'shubhambabai8@gmail.', 'HI, i am from jhunjhunun rajasthan india.'),
(34, 'Contact Shubham Shar', 'shubhambabai8@gmail.', 'Hi, i am romi from rajasthan india.'),
(35, 'Contact Shubham Shar', 'shubhambabai8@gmail.', 'Hello, i am from jhunjhunun rajasthan india.');

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
(5, 'sudhan', 'sudhansharma@gmail.com', 'sudhan', 'db9d9e782dd71ce34c15f2e080b54f11', 2147483647),
(6, 'kunal', 'kunalsharma@gmail.com', 'kunalsharma', '4d1ef206fc5639dfaa199016dc2b069f', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Id` int(11) NOT NULL,
  `companyName` varchar(250) NOT NULL,
  `tabletName` varchar(250) NOT NULL,
  `tabletDiscription` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `mfDate` date NOT NULL,
  `exDate` date NOT NULL,
  `holsalePrice` decimal(10,2) NOT NULL,
  `retailPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Id`, `companyName`, `tabletName`, `tabletDiscription`, `quantity`, `mfDate`, `exDate`, `holsalePrice`, `retailPrice`) VALUES
(1, 'Micro Lab', 'Dolo 650mg Tablet 15\'S', 'Fever', 25, '2018-04-18', '2020-12-12', '25.00', '35.00'),
(2, 'Aristo ', 'Ambrodil XP Capsule 10\'S', 'Asthma/COPD', 50, '2019-02-19', '2023-04-02', '45.00', '55.00'),
(3, 'Alkem', 'OMEE D Capsule 20s', 'Ulcer/Reflux/Flatulence', 10, '2018-10-25', '2021-08-02', '65.00', '75.00'),
(4, 'Cadell', 'ACCUGLIM M1 FORTE Tablet 10\'s', 'Diabetes', 20, '2018-08-20', '2021-10-08', '42.00', '52.00'),
(17, 'Cipla', 'Rotahaler (Cipla) Device 1\'s', 'Asthma/COPD', 30, '2021-02-26', '2023-07-10', '45.00', '65.00'),
(20, 'Cipla', 'Omnigel Gel(Topical) 75gm', 'Pain relief', 2, '2021-02-20', '2021-02-20', '250.00', '410.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `adId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mr`
--
ALTER TABLE `mr`
  MODIFY `mrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
