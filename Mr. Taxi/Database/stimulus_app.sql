-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2019 at 06:28 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stimulus_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dailycashout`
--

CREATE TABLE `dailycashout` (
  `c_id` int(11) NOT NULL,
  `c_dshift` varchar(100) NOT NULL,
  `c_d_id` int(11) NOT NULL,
  `c_c_name` varchar(200) NOT NULL,
  `c_cost` varchar(200) NOT NULL,
  `c_cash` varchar(200) NOT NULL,
  `c_gascredit` varchar(200) NOT NULL,
  `c_gascash` varchar(200) NOT NULL,
  `c_maintenance` varchar(200) NOT NULL,
  `c_commission` varchar(200) NOT NULL,
  `c_gst` varchar(200) NOT NULL,
  `c_cashleft` varchar(200) NOT NULL,
  `c_total` varchar(200) NOT NULL,
  `c_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailycashout`
--

INSERT INTO `dailycashout` (`c_id`, `c_dshift`, `c_d_id`, `c_c_name`, `c_cost`, `c_cash`, `c_gascredit`, `c_gascash`, `c_maintenance`, `c_commission`, `c_gst`, `c_cashleft`, `c_total`, `c_date`) VALUES
(1, 'Day', 1, 'Kids First,Social Service', '100.50,50.80', '50', '80', '20', '10', '100.4', '10.07', '-70.4', '211.37', '2019-06-19'),
(2, 'Day', 5, 'Madical', '132.48', '5', '0', '0', '0', '54.86', '6.88', '-49.86', '144.36', '2019-06-23'),
(3, 'Day', 5, 'Madical', '132.48', '0', '40', '0', '0', '52.86', '6.63', '-52.86', '139.11', '2019-06-24'),
(4, 'Day', 1, 'Kids First,Social Service', '100,200', '20', '20', '80', '100', '159.61', '16', '-219.61', '336', '2019-07-07'),
(5, 'Day', 1, 'Kids First,Social Service,Detox', '100,50,50', '20', '80', '20', '200', '109.73', '11', '-109.73', '231', '2019-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `d_licenceno` varchar(200) NOT NULL,
  `d_gst` int(11) NOT NULL,
  `d_commission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `d_name`, `d_licenceno`, `d_gst`, `d_commission`) VALUES
(1, 'Zabrina 50', '1234', 5, 50),
(2, 'zabrina 60', '1234', 5, 60),
(3, 'Brandon ', '2345', 5, 30),
(4, 'Zabrina Medical ', '1234', 5, 30),
(5, 'Viral', '4567', 5, 40),
(6, 'Other', '1234', 5, 40);

-- --------------------------------------------------------

--
-- Table structure for table `oilchange`
--

CREATE TABLE `oilchange` (
  `o_id` int(11) NOT NULL,
  `o_v_id` int(11) NOT NULL,
  `o_v_kilometer` varchar(100) NOT NULL,
  `o_cost` varchar(100) NOT NULL,
  `o_maintenance` varchar(100) NOT NULL,
  `o_m_cost` varchar(100) NOT NULL,
  `o_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oilchange`
--

INSERT INTO `oilchange` (`o_id`, `o_v_id`, `o_v_kilometer`, `o_cost`, `o_maintenance`, `o_m_cost`, `o_date`) VALUES
(1, 1, '120300', '78', '', '', '2019-06-17'),
(2, 2, '1000', '50.70', '', '', '2019-06-20'),
(6, 4, '127000', '78.89', '', '', '2019-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `v_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_name`, `v_no`) VALUES
(3, 'Lancer', '1'),
(4, 'Black Van ', '943 LAC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `dailycashout`
--
ALTER TABLE `dailycashout`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `oilchange`
--
ALTER TABLE `oilchange`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailycashout`
--
ALTER TABLE `dailycashout`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oilchange`
--
ALTER TABLE `oilchange`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
