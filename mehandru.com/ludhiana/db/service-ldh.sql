-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sg2nlmysql59plsk.secureserver.net:3306
-- Generation Time: Nov 26, 2021 at 07:11 AM
-- Server version: 5.5.51-38.1-log
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service-ldh`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `callid` int(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `callid` int(25) NOT NULL,
  `user` int(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `call`
--

CREATE TABLE `call` (
  `id` int(25) NOT NULL,
  `callid` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `serialno` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `accessory` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `rma` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `carry` varchar(255) NOT NULL,
  `calltype` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `remark` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `cstatus` varchar(255) NOT NULL DEFAULT 'Estimate'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `callid` int(25) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `id` int(20) NOT NULL,
  `callid` int(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `en_call_type`
--

CREATE TABLE `en_call_type` (
  `id` int(20) NOT NULL,
  `call` int(25) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `id` int(25) NOT NULL,
  `callid` int(25) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `spare` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` int(25) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `approval` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_temp`
--

CREATE TABLE `estimate_temp` (
  `id` int(25) NOT NULL,
  `callid` int(25) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `spare` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` int(25) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `approval` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(25) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'frontdesk', '1', 'Front Desk'),
(3, 'engineer', '1', 'Engineer'),
(4, 'Manager', '1', 'Manager'),
(5, 'stock', '1', 'Stock Manager'),
(6, 'cord', '1', 'Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(25) NOT NULL,
  `callid` int(255) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `Id` int(11) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `partcode` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `MRP` int(11) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `id` int(20) NOT NULL,
  `user` varchar(250) NOT NULL,
  `problem` text NOT NULL,
  `solution` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rassign`
--

CREATE TABLE `rassign` (
  `callid` int(25) NOT NULL,
  `user` int(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `repair_date` date NOT NULL,
  `repair_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `Id` int(10) NOT NULL,
  `callid` int(10) NOT NULL,
  `recived` int(10) NOT NULL,
  `repaired` int(10) NOT NULL,
  `resend` int(11) NOT NULL,
  `OTP` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_dt`
--

CREATE TABLE `sms_dt` (
  `callid` int(11) NOT NULL,
  `rep_sms_date` date NOT NULL,
  `rep_sms_time` time NOT NULL,
  `resend_sms_date` date NOT NULL,
  `resend_sms_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(25) NOT NULL,
  `callid` int(25) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(25) NOT NULL,
  `cdate` date NOT NULL,
  `ctime` time NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_hist`
--

CREATE TABLE `stock_hist` (
  `id` int(25) NOT NULL,
  `callid` int(25) NOT NULL,
  `item` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_w`
--

CREATE TABLE `stock_w` (
  `id` int(25) NOT NULL,
  `callid` int(25) NOT NULL,
  `spare` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call`
--
ALTER TABLE `call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`callid`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_call_type`
--
ALTER TABLE `en_call_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_temp`
--
ALTER TABLE `estimate_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_hist`
--
ALTER TABLE `stock_hist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_w`
--
ALTER TABLE `stock_w`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call`
--
ALTER TABLE `call`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `callid` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `en_call_type`
--
ALTER TABLE `en_call_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate_temp`
--
ALTER TABLE `estimate_temp`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_hist`
--
ALTER TABLE `stock_hist`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_w`
--
ALTER TABLE `stock_w`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
