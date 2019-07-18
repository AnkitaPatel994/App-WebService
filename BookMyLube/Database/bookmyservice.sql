-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2019 at 04:42 AM
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
-- Database: `bookmyservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'bookmyservices@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(200) NOT NULL,
  `booking_name` varchar(200) NOT NULL,
  `booking_email` varchar(200) NOT NULL,
  `booking_phone` varchar(200) NOT NULL,
  `booking_service_opt` varchar(500) NOT NULL,
  `booking_address` varchar(500) NOT NULL,
  `booking_service_name` varchar(500) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `booking_make` varchar(500) NOT NULL,
  `booking_model` varchar(500) NOT NULL,
  `booking_msgyear` varchar(500) NOT NULL,
  `booking_enginetype` varchar(500) NOT NULL,
  `booking_vanplateno` varchar(500) NOT NULL,
  `booking_comment` varchar(500) NOT NULL,
  `booking_t_id` varchar(200) NOT NULL,
  `block_status` varchar(200) NOT NULL,
  `booking_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `booking_price` int(11) NOT NULL,
  `booking_remind_date` varchar(500) NOT NULL,
  `booking_time` varchar(100) NOT NULL,
  `booking_admin_comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_name`, `booking_email`, `booking_phone`, `booking_service_opt`, `booking_address`, `booking_service_name`, `booking_date`, `booking_make`, `booking_model`, `booking_msgyear`, `booking_enginetype`, `booking_vanplateno`, `booking_comment`, `booking_t_id`, `block_status`, `booking_status`, `booking_price`, `booking_remind_date`, `booking_time`, `booking_admin_comment`) VALUES
(35, 'priyanka', 'priyankapandya57@gmail.com', '9904504473', 'place', '1223', 'name', '15-05-2019', '123', '123', '2019', '123', '123', 'qwerty', '12', '', 'qwe', 0, '', '0000-00-00 00:00:00', ''),
(39, 'Arpit', 'arpitpatelhonda@gmail.com', '9099006911', 'Your Place', 'Ahmedabad', 'Engine Oil Change', '08-06-2019', 'Ford', 'Figo', '2017', '', '', 'Need Synthetic oil', '5', '', 'Conform', 55, '', '0000-00-00 00:00:00', 'testing'),
(41, 'arpit patel', 'arpitpatelhonda@gmail.com', '9999999999', 'Your Place', 'ah', 'Headlight / Taillight Replacements,Transmission Fluid Flush', '09-06-2019', '', '', '', '', '', '', '6', '', 'Pending', 0, '', '0000-00-00 00:00:00', ''),
(43, 'Nikunj Soni', 'iterationtechnology@gmail.com', '8238133200', 'Your Place', 'abad', 'Battery Services,Engine Oil Change,Tire Rotation or Swaps', '08-06-2019', '', '', '', '', '', '', '7', '', 'Pending', 0, '', '0000-00-00 00:00:00', ''),
(44, 'jaydeep', 'iterationtechnology@gmail.com', '8888888888', 'Your Place', 'abad', 'Battery Services', '10-06-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '0000-00-00 00:00:00', ''),
(46, 'abhisar', 'abhisar.wings@gmail.com', '3063153559', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change', '15-06-2019', 'hyundai', 'elentra', '2007', '', '799lbv', '', '2', '', 'Pending', 0, '', '0000-00-00 00:00:00', ''),
(69, 'harpal', 'harpalsinhchauhan12@gmail.com', '7990572386', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change', '13-06-2019', '454545', '454545', '2019', 'pensds', '1331312', 'test', '1', '', '', 0, '', '0000-00-00 00:00:00', ''),
(70, 'abhisar Jayant kalal', 'abhisar.wings@gmail.com', '3063153559', 'Your Place', '23, 180 Pinehouse Dr', 'Array', '28-06-2019', 'hyundai', 'elentra', '2008', '', '', 'need to change engine oil....synthetic', '3', '', 'Pending', 0, '', '', ''),
(71, 'harpal', 'harpalsinhchauhan12@gmail.com', '', 'Your Place', '', 'Engine Oil Change', '01-01-1970', '', '', '', '', '', '', '', '', 'Pending', 0, '', '', ''),
(72, '', 'harpalsinhchauhan12@gmail.com', '', 'Your Place', '', 'Engine Oil Change', '01-01-1970', '', '', '', '', '', '', '', '', 'Pending', 0, '', '', ''),
(74, 'harpal', 'harpalsinhchauhan12@gmail.com', '7990572386', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change,Tire Rotation or Swaps,Headlight / Taillight Replacements,', '20-06-2019', '454545', '454545', '2019', 'pensds', '1331312', '', '1', '', 'Pending', 0, '', '', ''),
(75, 'harpal', 'harpalsinhchauhan12@gmail.com', '7990572386', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change,Battery Services,Transmission Fluid Flush,Air and Engine Filters,Power Steering Flush Service,', '06-06-2019', '454545', '454545', '2019', 'pensds', '1331312', '', '1', '', 'Pending', 0, '', '', ''),
(76, 'testing', 'harpalsinhchauhan12@gmail.com', 'testing', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change,Battery Services,Transmission Fluid Flush,Differential oil Change,', '20-06-2019', '454545', '454545', '2019', 'pensds', '1331312', 'testing', '2', '', 'Pending', 0, '', '20/06/2019 05:00:51 am', ''),
(77, 'Nikunj Soni', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'sdsdsd', 'Transmission Fluid FlushAir and Engine FiltersWindshield Wiper Replacements', '21-06-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '20/06/2019 05:05:40 am', ''),
(78, 'harpal', 'harpalsinhchauhan12@gmail.com', '7990572386', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Air and Engine Filters,Power Steering Flush Service,Fuel System Cleaner,', '02-06-2019', '454545', '454545', '2019', 'pensds', '1331312', '', '', '', 'Pending', 0, '', '20/06/2019 05:34:57 am', ''),
(79, 'testing', 'harpalsinhchauhan12@gmail.com', '7990572388', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change,Headlight / Taillight Replacements,Transmission Fluid Flush,', '15-05-2019', '454545', '454545', '2019', 'pensds', '1331312', 'testing', '3', '', 'Pending', 0, '', '20/06/2019 05:42:41 am', ''),
(80, 'testing', 'harpalsinhchauhan12@gmail.com', '7878787878', 'Our Place', '3903, Millar Avenue, Unit No 10(backside), Saskatoon', 'Engine Oil Change,Battery Services,Headlight / Taillight Replacements,', '20-06-2019', '454545', '454545', '2019', 'test', '12345', 'testing ', '5', '', 'Pending', 0, '', '20/06/2019 05:51:51 am', ''),
(81, 'Abhisar', 'abhisar.wings@gmail.com', '3063153559', 'Your Place', '', 'Engine Oil Change,', '22-06-2019', '', '', '', '', '', '', '4', '', 'Pending', 0, '', '20/06/2019 06:01:31 am', ''),
(106, 'priyanka', 'priyankapandya57@gmail.com', '9904504473', 'place', '1223', 'name', '15-05-2019', '123', '123', '2019', '123', '123', 'qwerty', '12', '', 'qwe', 0, '', '15547893', ''),
(108, 'priyanka', 'priyankapandya57@gmail.com', '9904504473', 'place', '1223', 'name', '15-05-2019', '123', '123', '2019', '123', '123', 'qwerty', '12', '', '1', 0, '', '15547893', ''),
(139, 'gfff', 'priyankapandya57@gmail.com', '2522222222', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Windshield Wiper ReplacementsDifferential oil ChangePower Steering Flush Service', '26-06-2019', 'ftty', 'ggg', 'ttty', 'gggg', 'gghh', 'hhhb', '12', '', 'Pending', 0, '', '26-06-2019 21:00:20', ''),
(140, 'abhisar Jayant kalal', 'abhisar.wings@gmail.com', '3063153559', 'Your Place', '', '', '28-06-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '26/06/2019 08:12:19 pm', ''),
(146, 'name', 'priyankapandya57@gmail.com', '6666666666', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Power Steering Flush ServiceFuel System Cleaner', '29-06-2019', '   bbbnjjjj', 'hjjjjj', 'hjjjjj', 'hjjjj', 'jjjjj', 'jjjjjj', '12', '', 'Pending', 0, '', '29-06-2019 08:49:29', ''),
(147, 'new', 'priyankapandya57@gmail.com', '3333333333', 'Our Places', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', '  Transmission Fluid Flush', '29-06-2019', '444', '444', '444', '444', '4444', '4444', '12', '', 'Pending', 0, '', ' 07:00 pm to 08:00 pm', ''),
(153, 'bvvbb', 'priyankapandya57@gmail.com', '2222222222', 'Your Place', 'vvvvv', 'Engine Oil Change,Transmission Fluid Flush,Air and Engine Filters', '29-06-2019', 'gggg', 'gggg', 'ggvv', 'vvvv', 'vvvv', 'vbbb', '1', '', 'Pending', 0, '', '29-06-2019 11:05:12', ''),
(173, 'hello', 'priyankapandya57@gmail.com', '4444444444', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Air and Engine FiltersWindshield Wiper ReplacementsDifferential oil Change', '30-06-2019', 'dddd', 'dddd', 'gggg', 'hf', 'high', 'duh', '8', '', 'Pending', 0, '', '30-06-2019 08:31:06', ''),
(174, 'dddd', 'priyankapandya57@gmail.com', '3333333333', 'Your Place', 'g', 'Windshield Wiper Replacements', '30-06-2019', 'g', 'hg', 'hg', 'hg', 'g', 'gggg', '10', '', 'Pending', 0, '', '30-06-2019 08:32:31', ''),
(176, 'jghjggjgghgkhkh', 'test1@gmail.com', '0000000000', 'Your Place', 'hgjghj', 'Headlight / Taillight Replacements', '30-06-2019', 'oh', 'kohl', 'hjhjh', 'khkh', 'oh', 'oh', '8', '', 'Pending', 0, '', '30-06-2019 08:37:34', ''),
(177, 'bjjj', 'test1@gmail.com', '7777777777', 'Your Place', 'asdasd', 'Windshield Wiper Replacements', '30-06-2019', 'fhfh', 'hg', 'fhfhfh', 'fhfhf', 'gggg', 'hgjghj', '9', '', 'Pending', 0, '', '30-06-2019 08:43:00', ''),
(178, 'like', 'test1@gmail.com', '9999999999', 'Your Place', 'hgjghj', 'Headlight / Taillight Replacements', '30-06-2019', 'hg', 'h', 'hg', 'hjjh', 'hg', 'hhkhkhkh', '2', '', 'Pending', 0, '', '30-06-2019 08:45:36', ''),
(179, 'bbbbbb', 'priyankapandya57@gmail.com', '2222222222', 'Your Place', 'cccv', 'Engine Oil Change,Headlight / Taillight Replacements,Transmission Fluid Flush', '30-06-2019', 'gggg', 'gghh', 'vgvv', 'bbhh', 'hhhh', 'hhhh', '1', '', 'Pending', 0, '', '30-06-2019 10:43:41', ''),
(180, 'vvv', 'priyankapandya57@gmail.com', '2222222222', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Air and Engine Filters,Windshield Wiper Replacements,Differential oil Change', '30-06-2019', 'bbb', 'hhh', 'bhh', 'hhh', 'bhh', 'bhhh', '3', '', 'Pending', 0, '', '30-06-2019 21:23:54', ''),
(181, 'hhhhvvvvbbbb', 'priyankapandya57@gmail.com', '5555555555', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Battery Services', '30-06-2019', 'hhhhhh', 'hhh', 'njjj', 'hhjj', 'nnnn', 'bbbh', '3', '', 'Pending', 0, '', '30-06-2019 21:24:45', ''),
(182, 'hello newkhk', 'test1@gmail.com', '8888888888', 'Your Place', 'jdfdgd', 'Headlight / Taillight ReplacementsTransmission Fluid Flush', '30-06-2019', 'hgjghj', 'hkhkhk', 'hkh', 'oh', 'oh', 'oh', '7', '', 'Pending', 0, '', '30-06-2019 21:26:22', ''),
(183, 'nikunj', 'iterationtechnology@gmail.com', '8238133288', 'Your Place', 'hhhh', 'Engine Oil Change,Battery Services,Headlight / Taillight Replacements,Tire Rotation or Swaps', '03-07-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '01-07-2019 08:47:46', ''),
(184, 'try', 'priyankapandya57@gmail.com', '5555555555', 'Your Place', ' vvv', 'Engine Oil Change,Transmission Fluid Flush,Air and Engine Filters', '01-07-2019', 'nnnn', 'nnnn', 'nnnn', 'nnnn', 'nnnn', 'nnnn', '1', '', 'Pending', 0, '', '01-07-2019 10:05:59', ''),
(185, 'sbbsb', 'priyankapandya57@gmail.com', '5555555555', 'Your Place', 'bbb', 'Engine Oil Change,Windshield Wiper Replacements', '01-07-2019', 'bbbb', 'nnn', 'nnn', 'nnn', 'nnn', 'nnnn', '7', '', 'Pending', 0, '', '01-07-2019 10:12:26', ''),
(186, 'bb', 'priyankapandya57@gmail.com', '2222222222', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Battery Services', '02-07-2019', 'vvv', 'bvv', 'bbb', 'bbb', 'bbb', 'bbb', '8', '', 'Pending', 0, '', '02-07-2019 14:25:00', ''),
(187, 'hh', 'priyankapandya57@gmail.com', '2222222222', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Tire Rotation or Swaps', '02-07-2019', 'hchc', 'iguf', 'ucuc', 'ufyf', 'ugug', 'ufuuc', '1', '', 'Pending', 0, '', '02-07-2019 23:19:01', ''),
(188, 'abhisar', 'abhisar.wings@gmail.com', '3063153559', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Engine Oil Change', '06-07-2019', '', '', '', '', '', '', '8', '', 'Pending', 0, '', '02-07-2019 14:47:36', ''),
(189, 'abhisar kalal', 'abhisar.wings@gmail.com', '3063153559', 'Your Place', 'bbb', 'Engine Oil Change', '07-07-2019', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'bbb', '12', '', 'Pending', 0, '', '02-07-2019 14:54:09', ''),
(190, 'nikunj', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'bbhb', 'Battery ServicesTire Rotation or SwapsHeadlight / Taillight Replacements', '05-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 07:37:02', ''),
(191, 'iii', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'hhh', 'Air and Engine FiltersWindshield Wiper Replacements', '05-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 07:37:53', ''),
(192, 'nikunj', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'hhhh', 'Tire Rotation or SwapsBattery ServicesEngine Oil Change', '05-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 07:39:53', ''),
(193, 'uuuu', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'juu', 'Tire Rotation or SwapsBattery ServicesEngine Oil Change', '06-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 07:40:45', ''),
(194, 'hkjhkh', 'priyankapandya57@gmail.com', '6666666666', 'Your Place', 'hgjghj', 'Engine Oil ChangeBattery Services', '03-07-2019', 'jhgjgjqb', 'jhjhjhj', 'bnbnqj', 'numbness', 'bmbmb', 'gggg', '10', '', 'Pending', 0, '', '03-07-2019 07:52:17', ''),
(195, 'NikunjSoni', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'vvv', 'Engine Oil ChangeBattery Services', '05-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 08:00:24', ''),
(196, 'eeeeejk', 'priyankapandya57@gmail.com', '3333333333', 'Your Place', 'k', 'Air and Engine Filters', '03-07-2019', 'k', 'Jon', 'oh', 'j', 'oh', 'oh', '12', '', 'Pending', 0, '', '03-07-2019 08:08:18', ''),
(197, 'bzbzbz', 'priyankapandya57@gmail.com', '2222222222', 'Your Place', ' BB', 'Battery Services', '03-07-2019', ' bbb', 'bbbb', 'BB', 'bbbb', 'nbbbn', 'bbbbb', '6', '', 'Pending', 0, '', '03-07-2019 08:28:58', ''),
(198, 'deep', 'nicksoni95@gmail.com', '3333333333', 'Your Place', 'hhh', 'Engine Oil ChangeBattery ServicesTire Rotation or Swaps', '04-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 09:11:22', ''),
(199, 'jay', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'hhh', 'Battery ServicesTire Rotation or Swaps', '04-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 09:11:46', ''),
(200, 'Harpal', 'harpalsinhchauhan12@gmail.com', '8888888888', 'Your Place', 'bbbb', 'Engine Oil Change', '04-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 10:14:16', ''),
(201, 'hhh', 'harpalsinhchauhan12@gmail.com', '6666666666', 'Your Place', 'Hu', 'Air and Engine FiltersWindshield Wiper Replacements', '04-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 10:15:20', ''),
(202, 'iii', 'harpalsinhchauhan12@gmail.com', '5555555555', 'Your Place', 'hhh', 'Tire Rotation or SwapsHeadlight / Taillight Replacements', '04-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '03-07-2019 10:16:08', ''),
(206, 'bbv', 'nicksoni95@gmail.com', '3338888888', 'Your Place', 'hhh', 'Transmission Fluid FlushWindshield Wiper ReplacementsAir and Engine Filters', '06-07-2019', '', '', '', '', '', '', '3', '', 'Pending', 0, '', '04-07-2019 18:56:45', ''),
(207, 'Khoikhoi', 'priyankapandya57@gmail.com', '5555555555', 'Your Place', 'jhjhjhjh', 'Air and Engine Filters', '04-07-2019', '', '', '', '', '', 'jkjk', '10', '', 'Pending', 0, '', '04-07-2019', ''),
(208, 'dads', 'priyankapandya57@gmail.com', '5555555555', 'Your Place', '5555', 'Windshield Wiper Replacements', '05-07-2019', '', '', '', '', '', '', '10', '', 'Pending', 0, '', '04-07-2019 23:27:21', ''),
(209, 'add', 'priyankapandya57@gmail.com', '4444444444', 'Your Place', 'dads dad', 'Air and Engine Filters', '13-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '04-07-2019 23:28:47', ''),
(210, 'asdasd', 'priyankapandya57@gmail.com', '3333333333', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Air and Engine Filters', '05-07-2019', '', '', '', '', '', '', '10', '', 'Pending', 0, '', '04-07-2019 23:37:38', ''),
(211, 'dddd', 'priyankapandya57@gmail.com', '4444444444', 'Your Place', 'asdasd', 'Air and Engine Filters', '05-07-2019', '', '', '', '', '', '', '6', '', 'Pending', 0, '', '04-07-2019 23:39:19', ''),
(212, 'kick', 'priyankapandya57@gmail.com', '9999999999', 'Your Place', 'jhjgug', 'Power Steering Flush Service', '05-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '05-07-2019 21:32:04', ''),
(213, 'hgjghj', 'priyankapandya57@gmail.com', '6666666666', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Windshield Wiper Replacements', '05-07-2019', '', '', '', '', '', '', '9', '', 'Pending', 0, '', '05-07-2019 21:33:12', ''),
(214, 'rrrr', 'priyankapandya57@gmail.com', '5555555555', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Headlight / Taillight ReplacementsTransmission Fluid FlushWindshield Wiper Replacements', '07-07-2019', '', '', '', '', '', '', '10', '', 'Pending', 0, '', '07-07-2019 08:22:49', ''),
(215, 'abhisar Jayant kalal', 'abhisar.wings@gmail.com', '3063153559', 'Your Place', '23, 180 Pinehouse Dr', 'Engine Oil Change,', '10-07-2019', 'hyundai', 'elentra', '2008', 'v6', '', '', '5', '', 'Pending', 0, '', '07/07/2019 03:50:08 am', ''),
(216, 'test', 'bradbach76@gmail.com', '4084066357', 'Your Place', 'djhxjkk', 'Engine Oil Change', '08-09-2019', 'fibbing', 'Chukchi', 'chin', 'cjcch', '', '', '6', '', 'Pending', 0, '', '08-07-2019 17:35:03', ''),
(217, 'Nikunj', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'hhshhd', 'Engine Oil ChangeBattery Services', '10-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '09-07-2019 08:16:14', ''),
(218, 'hshdhs', 'nicksoni95@gmail.com', '88888888888', 'Your Place', 'hbhh', 'Tire Rotation or SwapsBattery Services', '10-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '09-07-2019 08:17:13', ''),
(219, 'hhhh', 'nicksoni95@gmail.com', '5555555555', 'Your Place', 'vbvh', 'Battery ServicesTire Rotation or SwapsHeadlight / Taillight Replacements', '11-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '09-07-2019 08:21:02', ''),
(220, 'hhhh', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'hhh', 'Tire Rotation or SwapsBattery Services', '11-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '09-07-2019 08:21:42', ''),
(221, 'book', 'bookmylube@gmail.com', '7777777777', 'Your Place', 'ssssss', 'Transmission Fluid Flush', '09-07-2019', '', '', '', '', '', '', '6', '', 'Pending', 0, '', '09-07-2019 08:28:23', ''),
(222, 'ssss', 'bookmylube@gmail.com', '3333333333', 'Your Place', 'sss', 'Transmission Fluid Flush', '09-07-2019', '', '', '', '', '', '', '7', '', 'Pending', 0, '', '09-07-2019 08:29:36', ''),
(223, 'ssss', 'bookmylube@gmail.com', '2222222222', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Transmission Fluid Flush', '09-07-2019', 'xxxxxxx', '', '', '', '', '', '5', '', 'Pending', 0, '', '09-07-2019 08:30:23', ''),
(224, 'nikunj', 'nicksoni95@gmail.com', '8888888888', 'Your Place', 'hhhh', 'Engine Oil ChangeBattery Services', '11-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '09-07-2019 13:51:21', ''),
(225, 'nikunj', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'hhh', 'Engine Oil ChangeBattery Services', '11-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '10-07-2019 08:11:17', ''),
(226, 'uuyy', 'nicksoni95@gmail.com', '8888888888', 'Your Place', 'hhhh', 'Headlight / Taillight ReplacementsTransmission Fluid Flush', '11-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '10-07-2019 08:12:17', ''),
(227, 'yyy', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'hhhhh', 'Battery ServicesHeadlight / Taillight Replacements', '11-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '10-07-2019 08:13:01', ''),
(228, 'megha', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'ndndbd', 'Engine Oil ChangeBattery Services', '12-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '10-07-2019 08:17:20', ''),
(229, 'rrrrr', 'priyankapandya57@gmail.com', '2222222222', 'Your Place', 'hhhhh', 'Air and Engine Filters', '10-07-2019', '', '', '', '', '', '', '8', '', 'Pending', 0, '', '10-07-2019 08:31:45', ''),
(231, 'nimunj', 'nicksoni95@gmail.com', '2222222222', 'Your Place', 'fff', 'Engine Oil ChangeBattery Services', '14-07-2019', '', '', '', '', '', '', '12', '', 'Pending', 0, '', '10-07-2019 11:01:26', ''),
(238, 'tttttttt', 'test@gmail.com', '5555555555', 'Your Place', 'ssss', 'Windshield Wiper Replacements', '10-07-2019', '', '', '', '', '', '', '7', '', 'Pending', 0, '', '12', ''),
(239, 'eeeee', 'test@gmail.com', '3333333333', 'Your Place', 'gggg', 'Windshield Wiper Replacements', '08-08-2019', '', '', '', '', '', '', '9', '', 'Pending', 0, '', '3', ''),
(240, 'wwwwwww', 'test@gmail.com', '4444444444', 'Your Place', 'ssss', 'Transmission Fluid Flush', '10-07-2019', '', '', '', '', '', '', '6', '', 'Pending', 0, '', '9', ''),
(241, 'Anita', 'test@gmail.com', '1234567899', 'Your Place', 'fdgfd', 'Engine Oil ChangeBattery Services', '11-07-2019', '', '', '', '', '', '', '5', '', 'Pending', 0, '', '3', ''),
(242, 'bikini', 'test@gmail.com', '9999999999', 'Your Place', 'dad', 'Headlight / Taillight ReplacementsTransmission Fluid Flush', '12-07-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '1', ''),
(243, 'Nikunj', 'test@gmail.com', '9999999999', 'Your Place', 'yyyy', 'Battery ServicesTire Rotation or SwapsHeadlight / Taillight Replacements', '12-07-2019', '', '', '', '', '', '', '3', '', 'Pending', 0, '', '3', ''),
(244, 'nikunj', 'test@gmail.com', '9999999999', 'Our Place', '3903, Milar Avenue, Unit No 10(Backside) Saskatoon', 'Engine Oil ChangeBattery Services', '12-07-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '1', ''),
(248, 'nikunj', 'nicksoni95@gmail.com', '8238133288', 'Your Place', 'hhh', 'Engine Oil ChangeBattery Services', '13-07-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '1', ''),
(249, 'abhisar', 'abhisar.wings@gmail.com', '3863153559', 'Your Place', 'aaaa', 'Engine Oil Change', '12-07-2019', 'aaa', 'aaaa', '2019', ' V3', '', '', '10', '', 'Pending', 0, '', '10', ''),
(255, 'aaaaaa', 'ankita.iterationtechnology@gmail.com', '9429379273', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Battery Services', '12-07-2019', '', '', '', '', '', '', '2', '', 'Pending', 0, '', '11-07-2019 11:59:24', ''),
(256, 'ankita', 'patelankita994@gmail.com', '9999999999', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Battery Services', '14-07-2019', '', '', '', '', '', '', '1', '', 'Pending', 0, '', '11-07-2019 16:08:22', ''),
(257, 'ankita', 'patelankita994@gmail.com', '9999999999', 'Our Place', '3903, Millar Avenue, Unit No 10(backside) Saskatoon', 'Engine Oil Change,Battery Services', '12-07-2019', '', '', '', '', '', '', '3', '', 'Pending', 0, '', '11-07-2019 16:33:26', ''),
(258, 'Arpit Patel', 'arpitpatelhonda@gmail.com', '9099006911', 'Your Place', 'arpitpatelhonda@gmail.com', 'Engine Oil ChangeTransmission Fluid Flush', '14-07-2019', 'Honda', 'Aspire', '2018', '123', '123', '', '1', '', 'Pending', 0, '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(100) NOT NULL,
  `i_email` varchar(500) NOT NULL,
  `i_phone` varchar(20) NOT NULL,
  `i_comment` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`i_id`, `i_name`, `i_email`, `i_phone`, `i_comment`) VALUES
(1, 'fghf', 'ghdf@fgdf.com', '6564564310', 'jkkhkhkhh'),
(2, 'hdd', 'hd@hrj.com', '1325464878', 'gdgrhrhrr'),
(3, 'hehe', 'hdhd@ggh.com', '5464952354', 'gehrdf'),
(4, 'ghjgj', 'hjghj@cghfh.com', '1234567898', 'hjghjgjg'),
(5, 'text', 'text', '1234', 'text'),
(6, 'text', 'text', '1234', 'text'),
(7, 'abhisar', 'abhisar.wings@gmail.com', '3063153559', 'I like your servics'),
(8, 'Bhargav Amin ', 'bhargavamin6458@gmail.com', '8140100964', 'nahhaha\n'),
(9, 'Bhargav Amin ', 'bhargavamin6458@gmail.com', '8140100964', 'Good '),
(10, 'Shah Arpan ', 'arpanshah.arpan834@gmail.com', '7778040157', 'Good'),
(11, 'ghfh', 'ghfh', 'ghfh', 'ghf'),
(12, 'nikunj', 'nicksoni95@gmail.com', '9999999999', 'testing'),
(13, 'test', 'test@gmail.com', '1234567890', 'eggeege'),
(14, 'Nikunj', 'nicksoni95@gmail.com', '9999999999', 'Testing'),
(15, 'TestAnkit', 'patelankita@gmail.com', '9452367854', 'test'),
(16, 'nikunj', 'nicksoni95@gmail.com', '8238133288', 'testing for email '),
(17, 'Nikunj Soni', 'nicksoni95@gmail.com', '8238133200', 'testing mail for contact us form'),
(18, 'Arpit', 'arpitpatell1986@gmail.com', '9099006911', 'test'),
(19, 'abhisar', 'abhisar.wings@gmail.com', '3063153559', 'xyz'),
(20, 'priyanka', 'priyankapandya57@gmail.com', '123456789', 'hello'),
(21, 'gssh', 'priyankapandya57@gmail.com', '9904504473', 'zbbxbx'),
(22, 'dfdfgdfgdf', 'test@gmail.com', '4545454545', 'dfdfdfdf'),
(23, 'cvcvcvbcvbcv', 'cvbc@dfg.mn', '5446456456', 'godhead'),
(24, 'fhfgh', 'fgh@fddfg.kjhjkh', '5676545567', 'ghghg'),
(25, 'fjfjghjg', 'jgjgjh@fg.jhj', '34343434', 'Bibb');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_price` varchar(10) NOT NULL,
  `service_ex_period` varchar(100) NOT NULL DEFAULT '0 days'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`, `service_ex_period`) VALUES
(1, 'Engine Oil Change', '65', '0 days'),
(2, 'Battery Services', '40', '0 days'),
(3, 'Tire Rotation or Swaps', '45', '0 days'),
(4, 'Headlight / Taillight Replacements', '19', '0 days'),
(5, 'Transmission Fluid Flush', '149', '0 days'),
(6, 'Air and Engine Filters', '19', '0 days'),
(7, 'Windshield Wiper Replacements', '19', '0 days'),
(8, 'Differential oil Change', '149', '0 days'),
(9, 'Power Steering Flush Service', '79', '0 days'),
(10, 'Fuel System Cleaner', '39', '0 days');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `s_id` int(11) NOT NULL,
  `s_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`s_id`, `s_img`) VALUES
(3, 'OilChange-1.jpg'),
(4, 'image_06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `t_id` int(11) NOT NULL,
  `t_timeslot` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`t_id`, `t_timeslot`) VALUES
(1, '09:00 am to 10:00 am'),
(2, '10:00 am to 11:00 am'),
(3, '11:00 am to 12:00 pm'),
(4, '12:00 pm to 01:00 pm'),
(5, '01:00 pm to 02:00 pm'),
(6, '02:00 pm to 03:00 pm '),
(7, '03:00 pm to 04:00 pm'),
(8, '04:00 pm to 05:00 pm'),
(9, '05:00 pm to 06:00 pm'),
(10, '06:00 pm to 07:00 pm'),
(11, ' 07:00 pm to 08:00 pm'),
(12, ' 08:00 pm to 09:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `t_id` bigint(20) NOT NULL,
  `device_type` varchar(500) DEFAULT NULL,
  `booking_email` varchar(1000) DEFAULT NULL,
  `wifi_mac` varchar(500) DEFAULT NULL,
  `token` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`t_id`, `device_type`, `booking_email`, `wifi_mac`, `token`) VALUES
(1, 'android', 'patelankita994@gmail.com', '7C:78:7E:24:86:73', 'fPfv2sHEiPY:APA91bHrw4cLbvgWvBxdxCLD6En6Ig6-15e-c_nlkV3-vOasky0pvpJCsc14E5U6HiTykuW46ihBLKMDfuOOou3l7djsDAIQ_3tty12iNapgmcTxxNa9F1Pj_6KAT3ihwh00yg-JVyfz'),
(2, 'android', NULL, '70:5A:AC:AA:78:48', 'fwdaTEgTcOw:APA91bH8fGuzgILpwPdJ4ff9b5lG8o0Xb5U8BN9ZKQ6a08B6rGOLtH987Ui003LpdtYwEBaMCthpkwYw2jQXmrLStoWX5WEwB8XqVxnFWrF1V5IEyg00DNbSxVP8coO_Iy8L2c1tyaUy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `t_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
