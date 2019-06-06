-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 07:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `Doctor_name` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `parent_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `Doctor_name`, `Address`, `status`, `parent_cat`) VALUES
(8, 'nikhil', 'sirsa', '1', 0),
(12, 'nimesh', 'thapar', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(24, 'akshta', '2019-05-05', 565, 101.7, 50, 616.7, 616.7, 0, 'Cash'),
(25, 'aaaa', '2019-05-05', 799, 143.82, 50.81999999999999, 892, 892, 0, 'Cash'),
(26, 'asdf', '2019-05-05', 390, 70.2, 0, 460.2, 123, 337.2, 'Cash'),
(27, 'qqwe', '2019-05-05', 35, 6.3, 0, 41.3, 1, 40.3, 'Cash'),
(28, 'as', '2019-05-05', 80, 14.399999999999999, 0, 94.4, 1, 93.4, 'Cash'),
(29, '123', '2019-05-05', 78, 14.04, 0, 92.03999999999999, 11, 81.03999999999999, 'Cash'),
(30, 'rohan', '2019-06-05', 695, 125.1, 20.1, 800, 800, 0, 'Paytm');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(11) NOT NULL,
  `medicine_name` varchar(40) NOT NULL,
  `medicine_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `date` date NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `medicine_name`, `medicine_price`, `product_stock`, `date`, `p_status`) VALUES
(6, 'brufamol', 45, 7, '2020-05-05', 1),
(7, 'paracetamol', 35, 88, '2022-05-05', 1),
(8, 'crocin', 119, 495, '2025-05-05', 1),
(9, 'sigma', 78, 44, '2023-05-05', 1),
(10, 'dispirin', 50, 74, '2020-05-04', 1),
(11, 'citrazin', 50, 78, '2020-08-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `patient_name` varchar(40) NOT NULL,
  `sex` enum('m','f') NOT NULL,
  `problem` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `patient_name`, `sex`, `problem`, `contact`, `did`) VALUES
(12, 'rohan', 'm', 'headache', '9876543210', 8);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presid` int(11) NOT NULL,
  `medicine_name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presid`, `medicine_name`, `price`, `qty`) VALUES
(1, 'paracetamol', 35, 1),
(2, 'paracetamol', 35, 1),
(3, 'brufamol', 45, 1),
(4, 'sigma', 78, 1),
(5, 'citrazin', 50, 2),
(6, 'crocin', 119, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'n', 'n@g.com', '$2y$08$byc6sbJb37Qm5EsCdbQ4fuuIchW7ikqk7Ao3cdfKgCEl6qR6WYvgK', 'Admin', '2019-05-04', '2019-05-05 06:05:44', ''),
(2, 'nikhil', 'a@a.com', '$2y$08$o0yGn5QiIGLXyTdgPAy4zebLE2Qzy0ojMS0bEMDHerVIfg.8EmAce', 'Admin', '2019-05-05', '2019-05-06 06:05:03', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`presid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `presid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
