-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2019 at 04:22 AM
-- Server version: 5.6.43-cll-lve
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
-- Database: `relaxio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '2019-07-04 04:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `sound`
--

CREATE TABLE `sound` (
  `s_id` int(11) NOT NULL,
  `s_img` varchar(500) NOT NULL,
  `s_color` varchar(500) NOT NULL,
  `s_sound` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sound`
--

INSERT INTO `sound` (`s_id`, `s_img`, `s_color`, `s_sound`) VALUES
(1, '01.png', '#b366ff', '1%20Airplane%20Landing%20Sound.mp3'),
(2, '02.png', '#d344c4', '2%20Cafe%20Sound.mp3'),
(3, '03.png', '#3399ff', '3%20Creek%20Sound.mp3'),
(4, '04.png', '#33ccff', '4%20Ice%20Sketting%20Sound.mp3'),
(5, '05.png', '#9340b6', '5%20Fan%20Sound.mp3'),
(6, '06.png', '#0077ff', '6%20Heavy%20Rain%20Sound.mp3'),
(7, '07.png', '#404040', '7%20Night%20Sound.mp3'),
(8, '08.png', '#8abd32', '8%20Ocean%20Sound.mp3'),
(9, '09.png', '#275a81', '9%20Car%20driving%20Sound.mp3'),
(10, '10.png', '#e7a206', '10%20Fire%20Sound.mp3'),
(11, '11.png', '#2eb551', '11%20Forest%20Sound.mp3'),
(12, '12.png', '#164ff1', '12%20Rain%20Sound.mp3'),
(13, '13.png', '#fc6e40', '13%20River%20Sound.mp3'),
(14, '14.png', '#2eb551', '14%20Rain%20Forest%20Sound.mp3'),
(15, '15.png', '#0f3c85', '15%20Thunders%20Sound.mp3'),
(16, '16.png', '#12d3ae', '16%20Water%20Sound.mp3'),
(17, '17.png', '#0eb8d4', '17%20Wind%20Sound.mp3'),
(18, '18.png', '#8abd32', '18%20Bird%20Sound.mp3'),
(19, '19.png', '#cb8438', '19%20Tain%20Sound.mp3'),
(20, 'ele.png', '#800040', 'elephant_sounds.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `t_id` int(11) NOT NULL,
  `wifi_mac` varchar(500) NOT NULL,
  `token` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`t_id`, `wifi_mac`, `token`) VALUES
(2, '7C:78:7E:24:86:73', 'eg8BT2SrXWU:APA91bE6IVBFMWQvCH4uMAclvb6-mz6xYKXR5LJjv7SlOEzOgkyvJ2q437dNG6Es8gYEHR0g75rhk4fmOcmNaHEToEV8iGuKwXUvjN9PnFsQ2cb9GeXWxITfSPfq7z2R31Q1B9yBWSFo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `sound`
--
ALTER TABLE `sound`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sound`
--
ALTER TABLE `sound`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
