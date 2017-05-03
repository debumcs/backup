-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 04:54 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftshoppee`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `mmp_txn` varchar(50) NOT NULL,
  `mer_txn` varchar(50) NOT NULL,
  `amt` varchar(100) NOT NULL,
  `prod` decimal(10,2) NOT NULL,
  `date` varchar(55) NOT NULL,
  `bank_txn` varchar(100) NOT NULL,
  `f_code` varchar(100) NOT NULL,
  `clientcode` varchar(200) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `merchant_id` varchar(100) NOT NULL,
  `udf9` int(11) NOT NULL,
  `discriminator` varchar(200) NOT NULL,
  `surcharge` varchar(50) NOT NULL,
  `CardNumber` varchar(50) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `promocode` varchar(255) NOT NULL,
  `promocode_amount` decimal(10,2) NOT NULL,
  `udf1` varchar(200) NOT NULL COMMENT 'Customer Name',
  `udf2` varchar(100) NOT NULL COMMENT 'Email ID',
  `udf3` varchar(100) NOT NULL COMMENT 'Mobile No',
  `udf4` varchar(100) NOT NULL COMMENT 'Billing Address',
  `udf5` varchar(100) NOT NULL,
  `udf6` varchar(100) NOT NULL,
  `orderstatus` varchar(50) DEFAULT '1' COMMENT '1=>process, 2=>ready_to_ship, 3=>delevered, 4=>cancelled, 5=>refunded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `mmp_txn`, `mer_txn`, `amt`, `prod`, `date`, `bank_txn`, `f_code`, `clientcode`, `bank_name`, `merchant_id`, `udf9`, `discriminator`, `surcharge`, `CardNumber`, `subtotal`, `promocode`, `promocode_amount`, `udf1`, `udf2`, `udf3`, `udf4`, `udf5`, `udf6`, `orderstatus`) VALUES
(1, '19125636', '552418607802', '17.17', '0.00', 'Sat Jan 07 20:48:39 IST 2017', '123123', 'Ok', '8b1c3ca4d4e911e6', 'ATOM PG', '160', 0, 'CC', '0.0', '534424XXXXXX0104', '0.00', '', '0.00', 'Mohd Bilal', 'mohdmuneer144@rediffmail.com', '9412479347', '12/908 Daud Sarai Saharanpur, Saharanpur 247001', '', '', 'NewOrder'),
(2, '19145260', '932510854614', '115.00', '0.00', 'Wed Jan 18 12:35:32 IST 2017', '191452601', 'Ok', '679842dbdd4c11e6', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '0.00', '', '0.00', 'sakku mishra', 'sakkumishra1995@gmail.com', '8051009447', 'm-1. sombazar mangalapuri,palam manglapuri. delhi delhi 110059', '', '', '5'),
(3, '19145271', '357579089102', '115.00', '0.00', 'Wed Jan 18 12:47:22 IST 2017', '191452711', 'Ok', '679842dbdd4c11e6', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '0.00', '', '0.00', 'sakku mishra', 'sakkumishra1995@gmail.com', '8051009447', 'm-1. sombazar mangalapuri,palam manglapuri. delhi delhi 110059', '', '', '6'),
(4, '19145333', '003573986705', '115.00', '0.00', 'Wed Jan 18 13:46:32 IST 2017', '191453331', 'Ok', '345f2698d17f11e6', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '0.00', '', '0.00', 'DEBA SINHA', 'debumcs@gmail.com', '9401431396', 'C\\\\\\\\O TAPASH DUTTA, Office of the Commissioner Tax and Excise,C-Sector Itanagar 791111', '', '', '1'),
(5, '19146272', '451989542182', '2862.50', '0.00', '2017-01-20 10:53:35 ', '191462721', 'Ok', 'be8d72afded011e6', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '0.00', '', '0.00', 'sachin m', 'sachin.methre@atomtech.in', '9999999999', 'o;ulyk,tyjtyjtjyt tyjtyj 567678', '', '', '1'),
(6, '26112978', '982169970854', '50.50', '0.00', '2017-02-08 11:48:35', '020815370144', 'Ok', '345f2698d17f11e6', 'ATOM PG', '23890', 0, 'DC', '0.0', '401806XXXXXX2848', '0.00', '', '0.00', 'deba prasad sinha', 'debumcs@gmail.com', '9821504876', 'palam,manglapuri New Delhi 110045', '', '', '3'),
(16, '19303309', '321486903654', '3525.45', '0.00', '2017-04-27 13:56:23', '193033091', 'Ok', 'a68d8ea6113311e7', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '0.00', 'FLAT10', '264.50', 'vikrant vats', 'vikrantvats03@gmail.com', '7894561235', 'modinagar,modinagar modinagar 201204', '', '', '3'),
(17, '19303651', '464097789921', '1226.29', '0.00', '2017-04-27 17:36:01', '193036511', 'Ok', 'a68d8ea6113311e7', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '1362.55', 'FLAT10', '136.26', 'vikrant vats', 'vikrantvats03@gmail.com', '7894561235', 'modinagar,modinagar modinagar 201204', '', '', '6'),
(22, '19304147', '290427261302', '1581.81', '0.00', '2017-04-28 15:16:26', '193041471', 'Ok', 'a68d8ea6113311e7', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '1757.58', 'FLAT10', '175.76', 'vikrant vats', 'vikrantvats03@gmail.com', '7894561235', 'modinagar,modinagar modinagar 201204', '', '', '4'),
(23, '19305216', '227024281609', '1603.00', '0.00', '2017-05-02 10:39:24', '193052161', 'Ok', 'a68d8ea6113311e7', 'Atom Bank', '160', 0, 'NB', '0.0', 'null', '1603.00', '', '0.00', 'vikrant vats', 'vikrantvats03@gmail.com', '7894561235', 'modinagar,modinagar modinagar 201204', '', '', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
