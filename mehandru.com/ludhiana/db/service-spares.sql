-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sg2nlmysql59plsk.secureserver.net:3306
-- Generation Time: Nov 26, 2021 at 07:12 AM
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
-- Database: `service-spares`
--

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

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`Id`, `cat`, `name`, `partcode`, `price`, `MRP`, `details`, `model`) VALUES
(14, 'CR MOTOR', 'Motor Assy CR', '2189475', 289, 289, '', 'L3110'),
(15, 'SCANNER', 'SCANNER UNIT.', '2193173', 8579, 8579, '', 'L3110'),
(13, 'CR SCALE', 'CABLE,ENCODER,CR', '2189473', 579, 579, '', 'L3110'),
(12, 'MOTOR', 'MOTOR,ASSY,PF', '2189470', 389, 389, '', 'L3110'),
(10, 'ENCODER CABLE', 'BOARD ASSY.,ENCODER', '2181518', 159, 159, '', 'L3110'),
(11, 'PANEL CABLE', 'BOARD ASSY.,PANEL', '2188779', 539, 539, '', 'L3110'),
(9, 'PICK UP', 'HOLDER RETARD ASSY.', '1767062', 129, 129, '', 'L3110'),
(8, 'PAPER GUIDE', 'PAPER GUIDE UPPER RIGHT ASSY.', '1763610', 69, 69, '', 'L3110'),
(7, 'PAPER GUIDE', 'PAPER GUIDE UPPER LEFT ASSY.', '1763609', 69, 69, '', 'L3110'),
(5, 'GENERAL', 'ADAPTER BK ASSY.', '1758384', 79, 79, '', 'L3110'),
(6, 'PAPER GUIDE', 'PAPER GUIDE UPPER CENTER ASSY.', '1763608', 89, 89, '', 'L3110'),
(4, 'GENERAL', 'ADAPTER ASSY CL', '1758383', 79, 79, '', 'L3110'),
(3, 'GENERAL', 'HOPPER ASSY.', '1756598', 279, 279, '', 'L3110'),
(2, 'CARRIAGE', 'CARRIAGE ASSY.', '1756596', 129, 129, '', 'L3110'),
(1, 'PUMP', 'INK SYSTEM ASSY.', '1756593', 349, 349, '', 'L3110'),
(17, 'MAIN BOARD', 'BOARD ASSY.,MAIN', '2195955', 2009, 2009, '', 'L3110'),
(18, 'HEAD', 'PRINT HEAD', 'FA04000', 4103, 4103, '', 'L3110');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
