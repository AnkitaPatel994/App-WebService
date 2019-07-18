-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2019 at 04:55 AM
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
-- Database: `grwa_gnagar`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_pic` varchar(100) NOT NULL,
  `e_email` varchar(100) NOT NULL,
  `e_mobile` varchar(100) NOT NULL,
  `e_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`e_id`, `e_name`, `e_pic`, `e_email`, `e_mobile`, `e_pass`) VALUES
(1, 'Iteration Technology', 'img/5c7129d319dbd.jpeg', 'itt@gmail.com', '2369857412', '123'),
(2, 'Patel Vikram', 'img/person.png', 'v@gmail.com', '7894561236', 'xyz'),
(3, 'Ankita Patel', 'img/person.png', 'a@gmail.com', '4567893215', 'abc'),
(4, 'Rohit Prajapati', '', 'gandhinagarpropzone@gmail.com', '903381019', '903381019'),
(5, 'Gajendra Limbachiya', '', 'gajendra.limbachiya82@gmail.com', '9824300766', '9824300766'),
(6, 'Chetan Chhaya', '', 'chetanchhaya@gmail.com', '9824503011', '9824503011'),
(7, 'Zala Chandrasinh', '', 'zala7173realestate@gmail.com ', '9712987173', '9712987173'),
(8, 'Milind Raval', '', 'milind81raval@gmail.com', '7202953333', '7202953333'),
(9, 'Anish Thakkar', '', 'info@vagabondestate.com', '9173429063', '9173429063'),
(10, 'Prignesh Makwana', '', 'shreemahakalisolution@gmail.com', '9998890790 ', '9998890790 '),
(11, 'Maulik Vyas', '', 'vyasmaulik45@gmail.com', '8905207179', '8905207179'),
(12, 'Harischandra Pandya', '', 'gtre1977@gmail.com', '9924339179', '9924339179');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(100) NOT NULL,
  `i_phone` varchar(100) NOT NULL,
  `i_email` varchar(100) NOT NULL,
  `i_message` varchar(500) NOT NULL,
  `i_e_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`i_id`, `i_name`, `i_phone`, `i_email`, `i_message`, `i_e_id`) VALUES
(25, 'Patel Vikram', '7894561236', 'v@gmail.com', 'hi', 2),
(26, 'Patel Vikram', '7894561236', 'v@gmail.com', 'ffjju', 2);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `p_id` int(11) NOT NULL,
  `p_pid` varchar(100) NOT NULL,
  `p_pimg_one` varchar(100) NOT NULL,
  `p_pimg_two` varchar(100) NOT NULL,
  `p_pimg_three` varchar(100) NOT NULL,
  `p_prize` int(11) NOT NULL,
  `p_bhk` int(11) NOT NULL,
  `p_type_id` int(11) NOT NULL,
  `p_floor` int(11) NOT NULL,
  `p_block_no` varchar(100) NOT NULL,
  `p_area` varchar(200) NOT NULL,
  `p_yearbuilt` int(11) NOT NULL,
  `p_category` varchar(200) NOT NULL,
  `p_state` varchar(100) NOT NULL,
  `p_city` varchar(100) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_bedroom` int(11) NOT NULL,
  `p_bathroom` int(11) NOT NULL,
  `p_pdes` varchar(1000) NOT NULL,
  `p_e_id` int(11) NOT NULL,
  `p_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`p_id`, `p_pid`, `p_pimg_one`, `p_pimg_two`, `p_pimg_three`, `p_prize`, `p_bhk`, `p_type_id`, `p_floor`, `p_block_no`, `p_area`, `p_yearbuilt`, `p_category`, `p_state`, `p_city`, `p_address`, `p_bedroom`, `p_bathroom`, `p_pdes`, `p_e_id`, `p_date`) VALUES
(2, 'PR138560', 'img/5c7531a666a81.jpeg', 'img/5c7531a666f4c.jpeg', 'img/5c7531a667479.jpeg', 160000000, 5, 2, 0, '', '600', 2009, '', 'Gujarat', 'Surat', 'ffhhhfc', 5, 5, 'ghhjhvc', 2, '26-02-2019'),
(3, 'PR865114', 'img/5c77515072b29.jpeg', 'img/5c7751507458e.jpeg', 'img/5c77515074f20.jpeg', 5500000, 4, 2, 0, '', '255', 2006, '', 'gujarat', 'ahmedabad', 'hdhdhdbd', 3, 3, 'best one', 1, '28-02-2019'),
(4, 'PR252560', 'img/5c8b7ca636b67.jpeg', 'img/5c8b7ca638f6a.jpeg', 'img/5c8b7ca6391a4.jpeg', 1500, 2, 1, 2, '0', '1100', 2019, '', 'gujarat', 'gandhinagar', 'swagat blossom', 2, 2, '2 bhk semifuenished ', 1, '15-03-2019'),
(5, 'PR208742', 'img/5c8b7d2c2b507.jpeg', 'img/5c8b7d2c2baca.jpeg', 'img/5c8b7d2c2bf89.jpeg', 25000000, 6, 3, 0, '', '636', 2004, '', 'Gujarat', 'Gandhinagar', 'Saragasan', 5, 5, 'plot on sell in Sargasan', 2, '15-03-2019'),
(14, 'PR291589', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 200000, 3, 1, 3, '3', '20000', 2015, 'Unfurnished', 'eeeeeee', 'eeeeeee', 'eeeeeeeeeeee', 3, 3, 'eeeeeee', 2, '27-03-2019'),
(15, 'PR930598', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 2000, 3, 1, 3, '7', '20000', 2015, 'Furnished', 'rrrrrrrrr', 'rrrrrrrr', 'rrrrrrrrrrrrr', 3, 3, 'rrrrrrrrr', 2, '27-03-2019'),
(16, 'PR573106', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 5000000, 5, 2, 0, '', 'Carpet Area', 2015, '', 'hhhhh', 'hhhhh', 'hhhhhhhhh', 3, 5, 'hhhhhh', 2, '27-03-2019'),
(17, 'PR626815', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 20000000, 0, 3, 0, '', 'Super Area', 0, '', 'pppp', 'ppppp', 'ppppppppppp', 0, 0, 'ppppp', 2, '27-03-2019'),
(18, 'PR455960', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 5000000, 1, 3, 0, '', '1800', 2015, 'ghghv', 'Gujarat', 'Gandhinagar', 'Raysan Gandhinagar,Gandhinagar,gujarat,382421,6 km from tcs infocity gandhinagar', 3, 3, 'Property Name is 3 bhk apartment in Raysan gandhinagar. Its type is apartment On Sell and Quating price of 4800000. Property Address : raysan gandhinagar. Area Locality : 6 km from tcs infocity gandhinagar.City : gandhinagar And State :gujarat. This Propertys Id is : PR3. Property Area is estimated about 1800 sqft, having 3 Bathrooms And 3 Bedrooms.Garage is 1.', 1, '27-03-2019'),
(19, 'PR204856', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 5000000, 1, 3, 0, '', '1800', 2015, 'ghghv', 'Gujarat', 'Gandhinagar', 'Raysan Gandhinagar,Gandhinagar,gujarat,382421,6 km from tcs infocity gandhinagar', 3, 3, 'Property Name is 3 bhk apartment in Raysan gandhinagar. Its type is apartment On Sell and Quating price of 4800000. Property Address : raysan gandhinagar. Area Locality : 6 km from tcs infocity gandhinagar.City : gandhinagar And State :gujarat. This Propertys Id is : PR3. Property Area is estimated about 1800 sqft, having 3 Bathrooms And 3 Bedrooms.Garage is 1.', 1, '27-03-2019'),
(20, 'PR748298', 'img/noimg.jpg', 'img/noimg.jpg', 'img/noimg.jpg', 4800000, 3, 1, 2, 'a', '165', 5, 'Unfurnished', 'gujarat', 'gandhinagar', 'sargasan', 3, 2, 'very good locality in flat for sale\n3bhk \n3rd floor \n180sq yrd\nmadhuram greens', 1, '27-03-2019'),
(21, 'PR327084', 'img/5cf8f7b6e5408.jpeg', 'img/noimg.jpg', 'img/noimg.jpg', 500000, 3, 2, 0, '', 'Plot Area', 2016, '', 'gggg', 'gggg', 'gggvv', 5, 5, 'vvvvv', 1, '06-06-2019'),
(22, 'PR945068', 'img/5d0add1b4ea5f.jpeg', 'img/noimg.jpg', 'img/noimg.jpg', 9900000, 3, 2, 0, '', 'Plot Area', 90, '', 'Gujarat', 'Gandhinagar', 'sector 5', 3, 2, 'tenament on sale at sector 5 with title clear ', 12, '20-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `prop_type`
--

CREATE TABLE `prop_type` (
  `t_id` int(11) NOT NULL,
  `t_ptname` varchar(100) NOT NULL,
  `t_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_type`
--

INSERT INTO `prop_type` (`t_id`, `t_ptname`, `t_img`) VALUES
(1, 'Flat', 'img/flat.jpg'),
(2, 'House', 'img/house.jpg'),
(3, 'Plot', 'img/plot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prop_view`
--

CREATE TABLE `prop_view` (
  `v_id` int(11) NOT NULL,
  `v_ppid` varchar(100) NOT NULL,
  `v_eid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_view`
--

INSERT INTO `prop_view` (`v_id`, `v_ppid`, `v_eid`) VALUES
(1, 'PR138560', 2),
(2, 'PR138560', 2),
(3, 'PR138560', 2),
(4, 'PR138560', 2),
(5, 'PR731119', 1),
(6, 'PR731119', 1),
(7, 'PR731119', 1),
(8, 'PR731119', 1),
(9, 'PR138560', 2),
(10, 'PR138560', 2),
(11, 'PR138560', 2),
(12, 'PR138560', 2),
(13, 'PR138560', 2),
(14, 'PR138560', 2),
(15, 'PR138560', 2),
(16, 'PR138560', 2),
(17, 'PR138560', 2),
(18, 'PR138560', 2),
(19, 'PR138560', 2),
(20, 'PR138560', 2),
(21, 'PR138560', 2),
(22, 'PR138560', 2),
(23, 'PR138560', 2),
(24, 'PR138560', 2),
(25, 'PR138560', 2),
(26, 'PR731119', 1),
(27, 'PR865114', 1),
(28, 'PR138560', 2),
(29, 'PR138560', 2),
(30, 'PR138560', 2),
(31, 'PR252560', 1),
(32, 'PR208742', 2),
(33, 'PR138560', 2),
(34, 'PR138560', 2),
(35, 'PR865114', 1),
(36, 'PR252560', 1),
(37, 'PR138560', 2),
(38, 'PR291589', 2),
(39, 'PR291589', 2),
(40, 'PR291589', 2),
(41, 'PR930598', 2),
(42, 'PR930598', 2),
(43, 'PR138560', 2),
(44, 'PR252560', 1),
(45, 'PR291589', 2),
(46, 'PR252560', 1),
(47, 'PR252560', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prop_type`
--
ALTER TABLE `prop_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `prop_view`
--
ALTER TABLE `prop_view`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prop_type`
--
ALTER TABLE `prop_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prop_view`
--
ALTER TABLE `prop_view`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
