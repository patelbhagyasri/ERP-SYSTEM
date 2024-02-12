-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 10:11 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fullName`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
(47, 'ENGNEERING MAIN BUILDING', 'admin.hod@ssagrawal.org', 2147483647, 0, 'Main building include Engineering, MBA, MCA, Admin Dept.', '', '', '', 'Active', '2023-01-17 04:41:10'),
(48, 'SSA Building', 'principal.ssa@ssagrawal.org', 2147483647, 2147483647, '-', '', '', '', 'Active', '2023-01-17 04:49:05'),
(49, 'Nursing and physio Building', 'principal.nursing@ssagrawal.org', 2147483647, 2147483647, '-', '', '', '', 'Active', '2023-01-17 04:56:07'),
(50, 'Homeopathy', 'homeopathy@ssagrawal.org', 2147483647, 2147483647, '-', '', '', '', 'Active', '2023-01-17 05:00:48'),
(51, 'School building', 'schooldirector@ssagrawal.org', 2147483647, 2147483647, '-', '', '', '', 'Active', '2023-01-17 05:05:12'),
(52, 'Workshop leb building', 'principal.ssa@ssagrawal.org', 2147483647, 0, '-', '', '', '', 'Active', '2023-01-17 05:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `saleID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `saleDate` date NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unitPrice` float(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`saleID`, `itemNumber`, `customerID`, `customerName`, `itemName`, `saleDate`, `discount`, `quantity`, `unitPrice`) VALUES
(0, '01', 47, 'ENGNEERING MAIN BUILDING', 'Benches', '2023-01-27', 0, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `productID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `unitPrice` float NOT NULL DEFAULT '0',
  `imageURL` varchar(255) NOT NULL DEFAULT 'imageNotAvailable.jpg',
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productID`, `itemNumber`, `itemName`, `discount`, `stock`, `unitPrice`, `imageURL`, `status`, `description`) VALUES
(51, '01', 'Benches', 0, 100, 0, '1669447956_benches.jpg', 'Active', ''),
(52, '02', 'Table', 0, 0, 0, '1671424858_02 table.jpg', 'Active', 'table for students'),
(53, '03', 'White Board', 0, 0, 0, '1671421705_White board.jpg', 'Active', ''),
(54, '04', 'Computer', 0, 0, 0, '1671593664_04 Computer.jpg', 'Active', 'computer '),
(56, '05', 'Xerox machine', 0, 0, 0, '1671594417_05 Xerox  Machine.jpg', 'Active', ''),
(57, '06', 'Router', 0, 0, 0, '1671594568_06 Router.jpg', 'Active', 'wifi'),
(58, '07', 'TV', 0, 0, 0, '1671594635_07 TV.jpg', 'Active', 'Television'),
(59, '08', 'DVR', 0, 0, 0, '1671594688_08 DVR.jpg', 'Active', ''),
(60, '09', 'Wooden chair', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(61, '10', 'Table with drawer', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(62, '11', 'Revolving chair', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(63, '12', 'Plastic chair', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(64, '13', 'Cupboard', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(65, '14', 'Green board', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(66, '15', 'Printer', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(67, '16', 'Scanner', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(68, '17', 'Projector', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(69, '18', 'Projector screen', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(70, '19', 'Sofa', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(71, '20', 'Curtain', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(72, '21', 'Fan', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(73, '22', 'Tubelight', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(74, '23', 'AC', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(75, '24', 'Bed', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(76, '25', 'Metress', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(77, '26', 'Wooden stool', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(78, '27', 'Steel stool', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(79, '28', 'Ceiling light', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(80, '29', 'Coffee table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(81, '30', 'Reception table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(82, '31', 'Fixed table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(83, '32', 'Fixed table with drawer', 0, 1, 0, 'imageNotAvailable.jpg', 'Active', ''),
(84, '33', 'Ovan', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(85, '34', 'Gas with stove', 0, 2, 0, 'imageNotAvailable.jpg', 'Active', ''),
(86, '35', 'Printer with scanner', 0, 19, 0, 'imageNotAvailable.jpg', 'Active', ''),
(87, '36', 'UPS', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(88, '37', 'Cash counting machine', 0, 2, 0, 'imageNotAvailable.jpg', 'Active', ''),
(89, '38', 'Telephone', 0, 4, 0, 'imageNotAvailable.jpg', 'Active', ''),
(90, '39', 'Fire bottle', 0, 36, 0, 'imageNotAvailable.jpg', 'Active', ''),
(91, '40', 'Wheelchair', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(92, '41', 'Stand fan', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(93, '42', 'Practical table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(94, '43', 'Cooler', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(95, '44', 'White board with stand', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(96, '45', 'Rack', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(97, '46', 'Marble table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(98, '47', 'Speaker', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(99, '48', 'Notice Board', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(100, '49', 'Platic stool', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(101, '50', 'Bulb', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(102, '51', 'Computer monitor', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(103, '52', 'Locker', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(104, '53', 'Book rack', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(105, '54', 'Drawing table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(106, '55', 'News paper stand', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(107, '56', 'News paper reading table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(108, '57', 'Plenth with step', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(109, '58', 'Pilow', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(110, '59', 'Lamp', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(112, '60', 'Trolly', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(113, '61', '2*3 Table', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(114, '62', 'Walker', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(115, '63', 'Parrerar bar with mirror', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(116, '64', 'Home theater', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(117, '65', 'Waiting chair', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(118, '66', 'Freeze', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(119, '67', 'Weight machine', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(120, '68', 'Rope bed', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(121, '69', 'Bed side locker', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(122, '70', 'Wooden rack', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(123, '71', 'Small bench', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(124, '72', '3 Panel bed side screen', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(125, '73', 'Oxigen cylinder', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(126, '74', 'Stretcher', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(127, '75', 'Yoga mat', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(128, '76', 'X ray machine', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', ''),
(129, '77', 'Auto clave', 0, 0, 0, 'imageNotAvailable.jpg', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest`
--

CREATE TABLE `itemrequest` (
  `id` int(100) NOT NULL,
  `itemNo` varchar(100) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `customerID` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `status` varchar(11) DEFAULT '1',
  `email` varchar(100) NOT NULL,
  `approveQuantity` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemrequest`
--

INSERT INTO `itemrequest` (`id`, `itemNo`, `itemName`, `quantity`, `customerID`, `fullName`, `status`, `email`, `approveQuantity`) VALUES
(1, '1', 'Benches', '5', '47', 'ENGNEERING MAIN BUILDING', '1', 'admin.hod@ssagrawal.org', '1'),
(2, '02', 'Table', '6', '48', 'SSA Building', '0', 'principal.ssa@ssagrawal.org', '3'),
(3, '03', 'White Board', '10', '50', 'Homeopathy', '0', 'homeopathy@ssagrawal.org', NULL),
(5, '05', 'Xerox machine', '1', '49', 'Nursing and physio Building', '1', 'principal.nursing@ssagrawal.org', '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `vendorName` varchar(255) NOT NULL DEFAULT 'Test Vendor',
  `vendorID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `itemNumber`, `purchaseDate`, `itemName`, `unitPrice`, `quantity`, `vendorName`, `vendorID`) VALUES
(66, '01', '2023-01-17', 'Benches', 0, 2997, 'Jindal Furniture', 10),
(67, '09', '2023-01-17', 'Wooden chair', 0, 393, 'Jindal Furniture', 10),
(68, '10', '2023-01-17', 'Table with drawer', 0, 199, 'Jindal Furniture', 10),
(69, '02', '2023-01-17', 'Table', 0, 284, 'Jindal Furniture', 10),
(70, '11', '2023-01-17', 'Revolving chair', 0, 124, 'Jindal Furniture', 10),
(71, '12', '2023-01-17', 'Plastic chair', 0, 897, 'Jindal Furniture', 10),
(73, '13', '2023-01-17', 'Cupboard', 0, 129, 'Jindal Furniture', 10),
(74, '03', '2023-01-17', 'White Board', 0, 66, 'Jindal Furniture', 10),
(75, '14', '2023-01-17', 'Green board', 0, 98, 'Jindal Furniture', 10),
(76, '19', '2023-01-17', 'Sofa', 0, 34, 'Jindal Furniture', 10),
(77, '23', '2023-01-17', 'AC', 0, 105, 'Jindal Furniture', 10),
(78, '26', '2023-01-17', 'Wooden stool', 0, 302, 'Jindal Furniture', 10),
(79, '27', '2023-01-17', 'Steel stool', 0, 811, 'Jindal Furniture', 10),
(80, '04', '2023-01-19', 'Computer', 0, 116, 'ABC', 11),
(81, '15', '2023-01-19', 'Printer', 0, 31, 'Jindal Furniture', 10),
(82, '05', '2023-01-19', 'Xerox machine', 0, 2, 'Jindal Furniture', 10),
(83, '06', '2023-01-19', 'Router', 0, 14, 'Jindal Furniture', 10),
(84, '07', '2023-01-19', 'TV', 0, 4, 'Jindal Furniture', 10),
(85, '08', '2023-01-19', 'DVR', 0, 28, 'Jindal Furniture', 10),
(86, '16', '2023-01-19', 'Scanner', 0, 3, 'Jindal Furniture', 10),
(87, '36', '2023-01-19', 'UPS', 0, 15, 'Jindal Furniture', 10),
(88, '17', '2023-01-19', 'Projector', 0, 42, 'Jindal Furniture', 10),
(89, '18', '2023-01-20', 'Projector screen', 0, 12, 'Jindal Furniture', 10),
(90, '20', '2023-01-20', 'Curtain', 0, 849, 'Jindal Furniture', 10),
(91, '21', '2023-01-20', 'Fan', 0, 1202, 'Jindal Furniture', 10),
(92, '22', '2023-01-20', 'Tubelight', 0, 1748, 'Jindal Furniture', 10),
(94, '24', '2023-01-20', 'Bed', 0, 76, 'Jindal Furniture', 10),
(95, '25', '2023-01-20', 'Metress', 0, 54, 'Jindal Furniture', 10),
(96, '28', '2023-01-20', 'Ceiling light', 0, 252, 'Jindal Furniture', 10),
(97, '29', '2023-01-20', 'Coffee table', 0, 9, 'Jindal Furniture', 10),
(98, '33', '2023-01-21', 'Ovan', 0, 1, 'ABC', 11),
(99, '30', '2023-01-21', 'Reception table', 0, 2, 'ABC', 11),
(100, '31', '2023-01-21', 'Fixed table', 0, 17, 'ABC', 11),
(101, '32', '2023-01-21', 'Fixed table with drawer', 0, 1, 'ABC', 11),
(102, '34', '2023-01-21', 'Gas with stove', 0, 2, 'ABC', 11),
(103, '35', '2023-01-21', 'Printer with scanner', 0, 19, 'ABC', 11),
(104, '37', '2023-01-21', 'Cash counting machine', 0, 2, 'ABC', 11),
(105, '38', '2023-01-21', 'Telephone', 0, 4, 'ABC', 11),
(106, '39', '2023-01-21', 'Fire bottle', 0, 36, 'ABC', 11),
(107, '01', '2023-01-27', 'Benches', 0, 200, 'Jindal Furniture', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `saleID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `saleDate` date NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unitPrice` float(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`saleID`, `itemNumber`, `customerID`, `customerName`, `itemName`, `saleDate`, `discount`, `quantity`, `unitPrice`) VALUES
(33, '01', 47, 'ENGNEERING MAIN BUILDING', 'Benches', '2023-01-17', 0, 799, 0),
(34, '01', 48, 'SSA Building', 'Benches', '2023-01-17', 0, 824, 0),
(35, '01', 49, 'Nursing and physio Building', 'Benches', '2023-01-17', 0, 411, 0),
(36, '01', 50, 'Homeopathy', 'Benches', '2023-01-17', 0, 320, 0),
(37, '01', 51, 'School building', 'Benches', '2023-01-17', 0, 643, 0),
(38, '09', 47, 'ENGNEERING MAIN BUILDING', 'Wooden chair', '2023-01-17', 0, 79, 0),
(39, '09', 48, 'SSA Building', 'Wooden chair', '2023-01-17', 0, 39, 0),
(40, '09', 49, 'Nursing and physio Building', 'Wooden chair', '2023-01-17', 0, 56, 0),
(41, '09', 50, 'Homeopathy', 'Wooden chair', '2023-01-17', 0, 40, 0),
(42, '09', 51, 'School building', 'Wooden chair', '2023-01-17', 0, 172, 0),
(43, '09', 52, 'Workshop leb building', 'Wooden chair', '2023-01-17', 0, 7, 0),
(44, '10', 47, 'ENGNEERING MAIN BUILDING', 'Table with drawer', '2023-01-17', 0, 76, 0),
(45, '10', 48, 'SSA Building', 'Table with drawer', '2023-01-17', 0, 27, 0),
(46, '10', 49, 'Nursing and physio Building', 'Table with drawer', '2023-01-17', 0, 20, 0),
(47, '10', 50, 'Homeopathy', 'Table with drawer', '2023-01-17', 0, 38, 0),
(48, '10', 51, 'School building', 'Table with drawer', '2023-01-17', 0, 37, 0),
(49, '10', 52, 'Workshop leb building', 'Table with drawer', '2023-01-17', 0, 1, 0),
(50, '02', 47, 'ENGNEERING MAIN BUILDING', 'Table', '2023-01-17', 0, 95, 0),
(51, '02', 48, 'SSA Building', 'Table', '2023-01-17', 0, 25, 0),
(52, '02', 49, 'Nursing and physio Building', 'Table', '2023-01-17', 0, 34, 0),
(53, '02', 50, 'Homeopathy', 'Table', '2023-01-17', 0, 59, 0),
(54, '02', 51, 'School building', 'Table', '2023-01-17', 0, 60, 0),
(55, '02', 52, 'Workshop leb building', 'Table', '2023-01-17', 0, 11, 0),
(56, '11', 47, 'ENGNEERING MAIN BUILDING', 'Revolving chair', '2023-01-17', 0, 48, 0),
(57, '11', 48, 'SSA Building', 'Revolving chair', '2023-01-17', 0, 10, 0),
(58, '11', 49, 'Nursing and physio Building', 'Revolving chair', '2023-01-17', 0, 21, 0),
(59, '11', 50, 'Homeopathy', 'Revolving chair', '2023-01-17', 0, 24, 0),
(60, '11', 51, 'School building', 'Revolving chair', '2023-01-17', 0, 21, 0),
(61, '12', 47, 'ENGNEERING MAIN BUILDING', 'Plastic chair', '2023-01-17', 0, 254, 0),
(62, '12', 48, 'SSA Building', 'Plastic chair', '2023-01-17', 0, 142, 0),
(63, '12', 49, 'Nursing and physio Building', 'Plastic chair', '2023-01-17', 0, 96, 0),
(64, '12', 50, 'Homeopathy', 'Plastic chair', '2023-01-17', 0, 190, 0),
(65, '12', 51, 'School building', 'Plastic chair', '2023-01-17', 0, 198, 0),
(66, '12', 52, 'Workshop leb building', 'Plastic chair', '2023-01-17', 0, 17, 0),
(67, '13', 47, 'ENGNEERING MAIN BUILDING', 'Cupboard', '2023-01-17', 0, 41, 0),
(68, '13', 48, 'SSA Building', 'Cupboard', '2023-01-17', 0, 7, 0),
(69, '13', 49, 'Nursing and physio Building', 'Cupboard', '2023-01-17', 0, 25, 0),
(70, '13', 50, 'Homeopathy', 'Cupboard', '2023-01-17', 0, 22, 0),
(71, '13', 51, 'School building', 'Cupboard', '2023-01-17', 0, 16, 0),
(72, '13', 52, 'Workshop leb building', 'Cupboard', '2023-01-17', 0, 18, 0),
(73, '03', 47, 'ENGNEERING MAIN BUILDING', 'White Board', '2023-01-17', 0, 15, 0),
(74, '03', 48, 'SSA Building', 'White Board', '2023-01-17', 0, 24, 0),
(75, '03', 49, 'Nursing and physio Building', 'White Board', '2023-01-17', 0, 17, 0),
(76, '03', 50, 'Homeopathy', 'White Board', '2023-01-17', 0, 3, 0),
(77, '03', 51, 'School building', 'White Board', '2023-01-17', 0, 6, 0),
(78, '03', 52, 'Workshop leb building', 'White Board', '2023-01-17', 0, 1, 0),
(79, '14', 47, 'ENGNEERING MAIN BUILDING', 'Green board', '2023-01-17', 0, 30, 0),
(80, '14', 48, 'SSA Building', 'Green board', '2023-01-17', 0, 3, 0),
(81, '14', 49, 'Nursing and physio Building', 'Green board', '2023-01-17', 0, 8, 0),
(82, '14', 50, 'Homeopathy', 'Green board', '2023-01-17', 0, 10, 0),
(83, '14', 51, 'School building', 'Green board', '2023-01-17', 0, 37, 0),
(84, '14', 52, 'Workshop leb building', 'Green board', '2023-01-17', 0, 10, 0),
(85, '19', 47, 'ENGNEERING MAIN BUILDING', 'Sofa', '2023-01-17', 0, 18, 0),
(86, '19', 48, 'SSA Building', 'Sofa', '2023-01-17', 0, 3, 0),
(87, '19', 49, 'Nursing and physio Building', 'Sofa', '2023-01-17', 0, 3, 0),
(88, '19', 50, 'Homeopathy', 'Sofa', '2023-01-17', 0, 2, 0),
(89, '19', 51, 'School building', 'Sofa', '2023-01-17', 0, 8, 0),
(90, '23', 47, 'ENGNEERING MAIN BUILDING', 'AC', '2023-01-17', 0, 20, 0),
(91, '23', 48, 'SSA Building', 'AC', '2023-01-17', 0, 6, 0),
(92, '23', 49, 'Nursing and physio Building', 'AC', '2023-01-17', 0, 3, 0),
(93, '23', 50, 'Homeopathy', 'AC', '2023-01-17', 0, 1, 0),
(94, '23', 51, 'School building', 'AC', '2023-01-17', 0, 75, 0),
(95, '26', 47, 'ENGNEERING MAIN BUILDING', 'Wooden stool', '2023-01-17', 0, 31, 0),
(96, '26', 49, 'Nursing and physio Building', 'Wooden stool', '2023-01-17', 0, 18, 0),
(97, '26', 50, 'Homeopathy', 'Wooden stool', '2023-01-17', 0, 121, 0),
(98, '26', 52, 'Workshop leb building', 'Wooden stool', '2023-01-17', 0, 132, 0),
(99, '27', 47, 'ENGNEERING MAIN BUILDING', 'Steel stool', '2023-01-17', 0, 204, 0),
(100, '27', 49, 'Nursing and physio Building', 'Steel stool', '2023-01-17', 0, 108, 0),
(101, '27', 50, 'Homeopathy', 'Steel stool', '2023-01-17', 0, 207, 0),
(102, '27', 51, 'School building', 'Steel stool', '2023-01-17', 0, 173, 0),
(103, '27', 52, 'Workshop leb building', 'Steel stool', '2023-01-17', 0, 119, 0),
(104, '04', 51, 'School building', 'Computer', '2023-01-19', 0, 48, 0),
(105, '04', 47, 'ENGNEERING MAIN BUILDING', 'Computer', '2023-01-19', 0, 23, 0),
(106, '04', 48, 'SSA Building', 'Computer', '2023-01-19', 0, 8, 0),
(107, '04', 50, 'Homeopathy', 'Computer', '2023-01-19', 0, 29, 0),
(108, '04', 49, 'Nursing and physio Building', 'Computer', '2023-01-19', 0, 8, 0),
(109, '15', 51, 'School building', 'Printer', '2023-01-19', 0, 4, 0),
(110, '15', 47, 'ENGNEERING MAIN BUILDING', 'Printer', '2023-01-19', 0, 13, 0),
(111, '15', 48, 'SSA Building', 'Printer', '2023-01-19', 0, 3, 0),
(112, '15', 50, 'Homeopathy', 'Printer', '2023-01-19', 0, 4, 0),
(113, '15', 49, 'Nursing and physio Building', 'Printer', '2023-01-19', 0, 7, 0),
(114, '05', 51, 'School building', 'Xerox machine', '2023-01-19', 0, 1, 0),
(115, '05', 47, 'ENGNEERING MAIN BUILDING', 'Xerox machine', '2023-01-19', 0, 1, 0),
(116, '06', 51, 'School building', 'Router', '2023-01-19', 0, 3, 0),
(117, '06', 47, 'ENGNEERING MAIN BUILDING', 'Router', '2023-01-19', 0, 8, 0),
(118, '06', 48, 'SSA Building', 'Router', '2023-01-19', 0, 1, 0),
(119, '06', 49, 'Nursing and physio Building', 'Router', '2023-01-19', 0, 2, 0),
(120, '07', 51, 'School building', 'TV', '2023-01-19', 0, 4, 0),
(121, '08', 51, 'School building', 'DVR', '2023-01-19', 0, 7, 0),
(122, '08', 47, 'ENGNEERING MAIN BUILDING', 'DVR', '2023-01-19', 0, 8, 0),
(123, '08', 48, 'SSA Building', 'DVR', '2023-01-19', 0, 5, 0),
(124, '08', 50, 'Homeopathy', 'DVR', '2023-01-19', 0, 3, 0),
(125, '08', 49, 'Nursing and physio Building', 'DVR', '2023-01-19', 0, 5, 0),
(126, '16', 48, 'SSA Building', 'Scanner', '2023-01-19', 0, 1, 0),
(127, '16', 50, 'Homeopathy', 'Scanner', '2023-01-19', 0, 1, 0),
(128, '16', 49, 'Nursing and physio Building', 'Scanner', '2023-01-19', 0, 1, 0),
(129, '36', 47, 'ENGNEERING MAIN BUILDING', 'UPS', '2023-01-19', 0, 11, 0),
(130, '36', 48, 'SSA Building', 'UPS', '2023-01-19', 0, 1, 0),
(131, '36', 50, 'Homeopathy', 'UPS', '2023-01-19', 0, 1, 0),
(132, '36', 49, 'Nursing and physio Building', 'UPS', '2023-01-19', 0, 2, 0),
(133, '17', 47, 'ENGNEERING MAIN BUILDING', 'Projector', '2023-01-19', 0, 17, 0),
(134, '17', 48, 'SSA Building', 'Projector', '2023-01-19', 0, 9, 0),
(135, '17', 50, 'Homeopathy', 'Projector', '2023-01-19', 0, 5, 0),
(136, '17', 49, 'Nursing and physio Building', 'Projector', '2023-01-19', 0, 11, 0),
(137, '18', 47, 'ENGNEERING MAIN BUILDING', 'Projector screen', '2023-01-20', 0, 5, 0),
(138, '18', 49, 'Nursing and physio Building', 'Projector screen', '2023-01-20', 0, 3, 0),
(139, '18', 50, 'Homeopathy', 'Projector screen', '2023-01-20', 0, 4, 0),
(140, '20', 47, 'ENGNEERING MAIN BUILDING', 'Curtain', '2023-01-20', 0, 295, 0),
(141, '20', 48, 'SSA Building', 'Curtain', '2023-01-20', 0, 6, 0),
(142, '20', 49, 'Nursing and physio Building', 'Curtain', '2023-01-20', 0, 213, 0),
(143, '20', 50, 'Homeopathy', 'Curtain', '2023-01-20', 0, 159, 0),
(144, '20', 51, 'School building', 'Curtain', '2023-01-20', 0, 175, 0),
(145, '21', 47, 'ENGNEERING MAIN BUILDING', 'Fan', '2023-01-20', 0, 273, 0),
(146, '21', 48, 'SSA Building', 'Fan', '2023-01-20', 0, 171, 0),
(147, '21', 49, 'Nursing and physio Building', 'Fan', '2023-01-20', 0, 241, 0),
(148, '21', 50, 'Homeopathy', 'Fan', '2023-01-20', 0, 237, 0),
(149, '21', 51, 'School building', 'Fan', '2023-01-20', 0, 235, 0),
(150, '22', 47, 'ENGNEERING MAIN BUILDING', 'Tubelight', '2023-01-20', 0, 447, 0),
(151, '22', 48, 'SSA Building', 'Tubelight', '2023-01-20', 0, 219, 0),
(152, '22', 49, 'Nursing and physio Building', 'Tubelight', '2023-01-20', 0, 294, 0),
(153, '22', 50, 'Homeopathy', 'Tubelight', '2023-01-20', 0, 386, 0),
(154, '22', 51, 'School building', 'Tubelight', '2023-01-20', 0, 330, 0),
(155, '20', 52, 'Workshop leb building', 'Curtain', '2023-01-20', 0, 1, 0),
(156, '21', 52, 'Workshop leb building', 'Fan', '2023-01-20', 0, 45, 0),
(157, '22', 52, 'Workshop leb building', 'Tubelight', '2023-01-20', 0, 72, 0),
(161, '24', 49, 'Nursing and physio Building', 'Bed', '2023-01-21', 0, 18, 0),
(162, '24', 50, 'Homeopathy', 'Bed', '2023-01-21', 0, 58, 0),
(163, '25', 49, 'Nursing and physio Building', 'Metress', '2023-01-21', 0, 40, 0),
(164, '25', 50, 'Homeopathy', 'Metress', '2023-01-21', 0, 14, 0),
(165, '28', 47, 'ENGNEERING MAIN BUILDING', 'Ceiling light', '2023-01-21', 0, 131, 0),
(166, '28', 48, 'SSA Building', 'Ceiling light', '2023-01-21', 0, 24, 0),
(167, '28', 49, 'Nursing and physio Building', 'Ceiling light', '2023-01-21', 0, 45, 0),
(168, '28', 51, 'School building', 'Ceiling light', '2023-01-21', 0, 52, 0),
(169, '29', 47, 'ENGNEERING MAIN BUILDING', 'Coffee table', '2023-01-21', 0, 7, 0),
(170, '29', 48, 'SSA Building', 'Coffee table', '2023-01-21', 0, 1, 0),
(171, '29', 50, 'Homeopathy', 'Coffee table', '2023-01-21', 0, 1, 0),
(172, '33', 47, 'ENGNEERING MAIN BUILDING', 'Ovan', '2023-01-21', 0, 1, 0),
(173, '30', 47, 'ENGNEERING MAIN BUILDING', 'Reception table', '2023-01-21', 0, 1, 0),
(174, '30', 51, 'School building', 'Reception table', '2023-01-21', 0, 1, 0),
(175, '31', 47, 'ENGNEERING MAIN BUILDING', 'Fixed table', '2023-01-21', 0, 17, 0),
(176, '01', 47, 'ENGNEERING MAIN BUILDING', 'Benches', '2023-01-27', 0, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `username`, `password`, `status`) VALUES
(8, 'S S Agrawal College', 'admin', '9580ab5d9db022c73d6678b07c86c9db', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `fullName`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
(10, 'Jindal Furniture', 'ssa@gmail.com', 2147483647, 0, 'Navsari', 'Navsari', 'Navsari', 'Badulla', 'Active', '2022-10-17 15:51:25'),
(11, 'ABC', '', 1234567898, 0, 'Surat', '', '', 'Colombo', 'Active', '2022-10-30 06:53:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
