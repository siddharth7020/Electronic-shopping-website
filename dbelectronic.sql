-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 12:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbelectronic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincredentials`
--

CREATE TABLE `admincredentials` (
  `id` int(11) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincredentials`
--

INSERT INTO `admincredentials` (`id`, `phone`, `password`) VALUES
(1, 9999999999, 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `feedback`) VALUES
(1, 'sandesh', 'good product'),
(2, 'mahesh', 'good product'),
(3, 'jamir', 'product was worst');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `o_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `mdetails` varchar(255) NOT NULL,
  `prize` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `oday` int(11) NOT NULL,
  `omonth` varchar(100) NOT NULL,
  `oyear` varchar(100) NOT NULL,
  `deliverydate` int(11) NOT NULL,
  `deliverymonth` int(11) NOT NULL,
  `deliveryyear` int(11) NOT NULL,
  `pmethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`o_id`, `pid`, `name`, `phone`, `mdetails`, `prize`, `path`, `qty`, `orderid`, `oday`, `omonth`, `oyear`, `deliverydate`, `deliverymonth`, `deliveryyear`, `pmethod`) VALUES
(1, 1, 'h', 9922840123, 'Extention wire tumen', 300, 'extention wire tumen.jpg', '2', 1378572499, 31, 'March', '2021', 1, 0, 2021, 'Through Card');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `cardno` bigint(20) NOT NULL,
  `pmethod` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`name`, `phone`, `cardno`, `pmethod`, `pid`) VALUES
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 0),
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 4),
('h', 9922840819, 1111111111111111, 'Through Card', 2),
('h', 9922840819, 1111111111111111, 'Through Card', 1),
('h', 9922840819, 1111111111111111, 'Through Card', 1),
('h', 9922840819, 0, 'Cash On Delivery', 4),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 1111111111111111, 'Through Card', 6),
('h', 9922840819, 1111111111111111, 'Through Card', 0),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 1111111111111112, 'Through Card', 1),
('h', 9922840819, 1111111111111112, 'Through Card', 0),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 1111111111111112, 'Through Card', 6),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 1111111111111112, 'Through Card', 2),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 2),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 0),
('h', 9922840819, 0, 'Cash On Delivery', 1),
('h', 9922840819, 0, 'Cash On Delivery', 5),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 0, 'Cash On Delivery', 6),
('h', 9922840819, 1111111111111111, 'Through Card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pcategory` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `price`, `qty`, `pcategory`, `path`) VALUES
(1, 'Extention wire tumen', 300, 8, 'wires', 'extention wire tumen.jpg'),
(2, 'MI Note Pro', 15999, 20, 'smartphones', 'note8pro.jpg'),
(5, 'Socket Havels', 399, 28, 'sockets', 'Powell.jpg'),
(6, 'A1 Socket', 499, 120, 'sockets', 'mx3in1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `state` int(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `email`, `upass`, `state`, `zipcode`, `address`, `phone`) VALUES
(1, 'soham', 'joshi', 'sohamjoshi@gmail.com', '123456', 0, 123456, 'fff', 9922840123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincredentials`
--
ALTER TABLE `admincredentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admincredentials`
--
ALTER TABLE `admincredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
