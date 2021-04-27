-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 04:14 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access_level` tinyint(1) DEFAULT NULL,
  `activation_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `fullname`, `password`, `access_level`, `activation_status`) VALUES
(1, 'noman', 'Jahidul Islam Noman', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bkash_payment`
--

CREATE TABLE `bkash_payment` (
  `bkash_payment_id` int(11) NOT NULL,
  `bkash_payment_method` varchar(50) NOT NULL,
  `bkash_payment_mobile_number` varchar(100) NOT NULL,
  `bkash_payment_amount` varchar(50) NOT NULL,
  `bkash_payment_transaction_id` varchar(150) NOT NULL,
  `bkash_payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `bkash_payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bkash_payment`
--

INSERT INTO `bkash_payment` (`bkash_payment_id`, `bkash_payment_method`, `bkash_payment_mobile_number`, `bkash_payment_amount`, `bkash_payment_transaction_id`, `bkash_payment_status`, `bkash_payment_date_time`) VALUES
(1, 'bkash', '01521451354', '5.00', 'SDFG1SDSG1', 'pending', '2018-10-31 19:17:50'),
(2, 'bkash', '4454545', '5.00', 'SDFG1SDSG1', 'pending', '2018-10-31 19:44:59'),
(3, 'bkash', '454545', '5.00', 'SDFG1SDSG1', 'pending', '2018-10-31 20:02:42'),
(4, 'bkash', '4524545', '5.00', 'SDFG1SDSG1', 'pending', '2018-10-31 20:04:12'),
(5, 'bkash', '425424', '5.00', 'SDFG1SDSG1', 'pending', '2018-10-31 20:04:54'),
(6, 'bkash', '4545', ' 5,030.00', 'SDFG1SDSG1', 'pending', '2018-10-31 20:06:24'),
(7, 'bkash', '01772068908', ' 2,380.00', 'SDSFSDFS5', 'paid', '2018-11-01 20:13:45'),
(8, 'bkash', '01524145442', ' 1,230.00', 'GDFGDFGDGD', 'paid', '2018-11-04 06:33:43'),
(9, 'bkash', '01571757161', ' 4,940.00', 'FDFSFSFSF', 'paid', '2018-11-06 18:52:41'),
(10, 'bkash', '01772068908', ' 5,510.00', 'H5SD55EEWK', 'paid', '2018-12-06 13:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `category_description` text,
  `publication_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Health & Beauty', 'This Is Beauty Product', 1),
(3, 'Women\'s Fashion', 'All Womens Fashion', 1),
(6, 'Men\'s Fashion', 'This Is Men\'s Fasion', 1),
(10, 'Home & Lifestyle', '.........', 1),
(11, 'TV & Home Appliances', '.......', 1),
(12, 'Watches & Accessories', '.......', 1),
(13, 'Babies & Toys', '.......', 1),
(14, 'TV & Home Appliances', '.........', 1),
(15, 'noman', 'sgfdgdfgdg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cod_payment`
--

CREATE TABLE `cod_payment` (
  `cod_payment_id` int(11) NOT NULL,
  `cod_payment_method` varchar(100) NOT NULL,
  `cod_payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `cod_payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cod_payment`
--

INSERT INTO `cod_payment` (`cod_payment_id`, `cod_payment_method`, `cod_payment_status`, `cod_payment_date_time`) VALUES
(1, 'COD', 'pending', '2018-10-31 19:16:55'),
(2, 'COD', 'pending', '2018-10-31 20:23:43'),
(3, 'COD', 'pending', '2018-10-31 20:24:43'),
(4, 'COD', 'pending', '2018-10-31 20:29:42'),
(5, 'COD', 'pending', '2018-10-31 20:29:53'),
(6, 'COD', 'pending', '2018-10-31 20:29:57'),
(7, 'COD', 'pending', '2018-10-31 20:29:59'),
(8, 'COD', 'pending', '2018-10-31 20:30:02'),
(9, 'COD', 'pending', '2018-10-31 20:30:24'),
(10, 'COD', 'pending', '2018-10-31 20:30:28'),
(11, 'COD', 'pending', '2018-10-31 20:30:30'),
(12, 'COD', 'pending', '2018-10-31 20:30:33'),
(13, 'COD', 'pending', '2018-10-31 20:30:35'),
(14, 'COD', 'pending', '2018-10-31 20:30:38'),
(15, 'COD', 'pending', '2018-10-31 20:30:40'),
(16, 'COD', 'pending', '2018-10-31 20:31:36'),
(17, 'COD', 'pending', '2018-10-31 20:31:39'),
(18, 'COD', 'pending', '2018-10-31 20:31:42'),
(19, 'COD', 'pending', '2018-10-31 20:31:45'),
(20, 'COD', 'pending', '2018-10-31 20:33:48'),
(21, 'COD', 'pending', '2018-10-31 20:33:51'),
(22, 'COD', 'pending', '2018-10-31 20:33:55'),
(23, 'COD', 'pending', '2018-10-31 20:33:57'),
(24, 'COD', 'pending', '2018-10-31 20:34:00'),
(25, 'COD', 'pending', '2018-10-31 20:40:45'),
(26, 'COD', 'pending', '2018-10-31 20:42:29'),
(27, 'COD', 'pending', '2018-11-01 05:59:13'),
(28, 'COD', 'pending', '2018-11-01 06:02:44'),
(29, 'COD', 'pending', '2018-11-01 06:05:25'),
(30, 'COD', 'pending', '2018-11-01 06:18:43'),
(31, 'COD', 'pending', '2018-11-01 06:21:06'),
(32, 'COD', 'pending', '2018-11-01 06:22:54'),
(33, 'COD', 'pending', '2018-11-01 06:23:16'),
(34, 'COD', 'pending', '2018-11-01 06:26:20'),
(35, 'COD', 'pending', '2018-11-01 06:31:18'),
(36, 'COD', 'pending', '2018-11-01 06:31:56'),
(37, 'COD', 'pending', '2018-11-01 06:45:09'),
(38, 'COD', 'pending', '2018-11-01 19:04:14'),
(39, 'COD', 'pending', '2018-11-01 19:05:24'),
(40, 'COD', 'pending', '2018-11-01 19:23:43'),
(41, 'COD', 'pending', '2018-11-01 19:40:31'),
(42, 'COD', 'pending', '2018-11-01 20:17:33'),
(43, 'COD', 'pending', '2018-11-01 20:42:02'),
(44, 'COD', 'pending', '2018-11-01 20:52:12'),
(45, 'COD', 'pending', '2018-11-01 20:55:16'),
(46, 'COD', 'pending', '2018-11-02 04:15:22'),
(47, 'COD', 'pending', '2018-11-03 20:19:00'),
(48, 'COD', 'pending', '2018-11-03 20:20:06'),
(49, 'COD', 'pending', '2018-11-03 20:24:24'),
(50, 'COD', 'pending', '2018-11-03 20:47:46'),
(51, 'COD', 'pending', '2018-11-03 20:50:54'),
(52, 'COD', 'pending', '2018-11-03 21:00:34'),
(53, 'COD', 'pending', '2018-11-03 21:03:52'),
(54, 'COD', 'pending', '2018-11-03 21:09:24'),
(55, 'COD', 'pending', '2018-11-04 05:59:06'),
(56, 'COD', 'pending', '2018-11-04 06:06:23'),
(57, 'COD', 'pending', '2018-11-04 06:09:21'),
(58, 'COD', 'pending', '2018-11-04 07:04:12'),
(59, 'COD', 'pending', '2018-11-04 07:15:30'),
(60, 'COD', 'pending', '2018-11-04 07:18:04'),
(61, 'COD', 'pending', '2018-11-09 05:25:51'),
(62, 'COD', 'pending', '2018-11-21 10:36:49'),
(63, 'COD', 'pending', '2018-11-21 10:50:35'),
(64, 'COD', 'pending', '2018-11-21 10:52:15'),
(65, 'COD', 'pending', '2018-11-21 10:57:04'),
(66, 'COD', 'pending', '2018-11-21 10:57:39'),
(67, 'COD', 'pending', '2018-11-21 10:57:50'),
(68, 'COD', 'pending', '2018-11-21 10:58:10'),
(69, 'COD', 'pending', '2018-11-21 10:58:56'),
(70, 'COD', 'pending', '2018-11-27 12:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_mobile_number` varchar(100) NOT NULL,
  `customer_email_address` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_activation_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_mobile_number`, `customer_email_address`, `customer_password`, `customer_reg_date`, `customer_activation_status`) VALUES
(1, 'Jahidul Islam ', 'Noman', '01521451354', 'noman.cse19@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2018-10-27 07:05:58', 1);


-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `manufacture_id` int(11) NOT NULL,
  `manufacture_name` varchar(50) DEFAULT NULL,
  `manufacture_description` text,
  `manufacture_publication_status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `manufacture_publication_status`) VALUES
(1, 'Frost Cosmetics, LLC ', 'Frost Cosmetic “Private Label” Packages Include: Unit per price, Free selection of tubes, Over 250 Colors in (4 shades) to pick from, Free logo Design, Product labels with logo, Product ingredients, 2 - 6 formula styles to pick from. Frost Cosmetics has NO third party partners. Frost is a USA based company. ', 1),
(2, 'Auraline Beauty ', 'An extensive line of top-quality, chic and non-branded wholesale cosmetics products for professional makeup artists, industry professionals, independent salons and spas and national retailers. Our goal is to provide beauty professionals with unique private label cosmetics to set you apart from the competition. From brushes, brush cases and hipster belts, to customized palettes and makeup for the face, eyes, cheeks and lips, we have the products you need, the quality you expect and the look that matches your style. ', 1),
(4, 'Lakme', 'Lakme Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `custom_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `custom_order_id`, `product_id`, `product_code`, `product_name`, `product_price`, `product_qty`, `date_time`) VALUES
(3, 4, 0, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:02:44'),
(4, 4, 0, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:02:44'),
(5, 5, 0, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:05:25'),
(6, 5, 0, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:05:25'),
(7, 5, 0, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:05:25'),
(8, 5, 0, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:05:25'),
(9, 9, 0, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:23:16'),
(10, 9, 0, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:23:16'),
(11, 9, 0, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:23:16'),
(12, 9, 0, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:23:16'),
(13, 10, 0, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:26:20'),
(14, 10, 0, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:26:20'),
(15, 10, 0, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:26:20'),
(16, 10, 0, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:26:20'),
(17, 11, 33082, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:31:18'),
(18, 11, 33082, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:31:18'),
(19, 11, 33082, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:31:18'),
(20, 11, 33082, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:31:18'),
(21, 12, 56749, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:31:57'),
(22, 12, 56749, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:31:57'),
(23, 12, 56749, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:31:57'),
(24, 12, 56749, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:31:57'),
(25, 13, 59592, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-01 06:45:09'),
(26, 13, 59592, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-01 06:45:09'),
(27, 13, 59592, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 06:45:09'),
(28, 13, 59592, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-01 06:45:09'),
(29, 14, 91955, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 19:04:14'),
(30, 15, 79686, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 19:05:24'),
(31, 16, 85335, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 19:23:43'),
(32, 17, 18113821, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 19:40:31'),
(33, 18, 18119719, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 20:13:46'),
(34, 19, 18118058, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-01 20:17:33'),
(35, 20, 18116248, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-01 20:42:03'),
(36, 21, 18117146, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-01 20:55:16'),
(37, 22, 18114742, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-02 04:15:22'),
(38, 23, 18116642, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-03 20:19:00'),
(39, 23, 18116642, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-03 20:19:00'),
(40, 23, 18116642, 2, '', 'Aloe Vera Soothing Gel Was', 400.00, 1, '2018-11-03 20:19:00'),
(41, 23, 18116642, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-03 20:19:00'),
(42, 24, 18112420, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-03 20:20:06'),
(43, 24, 18112420, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-03 20:20:06'),
(44, 24, 18112420, 2, '', 'Aloe Vera Soothing Gel Was', 400.00, 1, '2018-11-03 20:20:06'),
(45, 24, 18112420, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-03 20:20:06'),
(46, 25, 18118414, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-03 20:24:24'),
(47, 25, 18118414, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-03 20:24:24'),
(48, 25, 18118414, 2, '', 'Aloe Vera Soothing Gel Was', 400.00, 1, '2018-11-03 20:24:24'),
(49, 25, 18118414, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-03 20:24:24'),
(50, 26, 18118930, 6, '', 'Meniya whitening cream ', 480.00, 3, '2018-11-03 20:47:46'),
(51, 26, 18118930, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-03 20:47:46'),
(52, 26, 18118930, 2, '', 'Aloe Vera Soothing Gel Was', 400.00, 6, '2018-11-03 20:47:46'),
(53, 26, 18118930, 7, '', 'Cotton Saree For Women', 2300.00, 1, '2018-11-03 20:47:46'),
(54, 27, 18113945, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-03 20:50:54'),
(55, 28, 18115656, 6, '', 'Meniya whitening cream ', 480.00, 16, '2018-11-03 21:00:35'),
(56, 28, 18115656, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-03 21:00:35'),
(57, 29, 18119885, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-03 21:03:52'),
(58, 30, 18116985, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-03 21:09:24'),
(59, 31, 18112909, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-04 05:59:07'),
(60, 32, 18113378, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-04 06:06:23'),
(61, 33, 18113354, 4, '', 'Oliva Whitening Body Lotion', 320.00, 2, '2018-11-04 06:09:21'),
(62, 33, 18113354, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-04 06:09:21'),
(63, 33, 18113354, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-04 06:09:21'),
(64, 33, 18113354, 7, '', 'Cotton Saree For Women', 2300.00, 2, '2018-11-04 06:09:21'),
(65, 34, 18111633, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-04 06:33:43'),
(66, 34, 18111633, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-04 06:33:43'),
(67, 34, 18111633, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-04 06:33:43'),
(68, 35, 18119879, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-04 07:04:12'),
(69, 35, 18119879, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-04 07:04:12'),
(70, 35, 18119879, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-04 07:04:12'),
(71, 36, 18114607, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-04 07:15:30'),
(72, 36, 18114607, 4, '', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-04 07:15:30'),
(73, 36, 18114607, 5, '', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-04 07:15:30'),
(74, 37, 18111948, 6, '', 'Meniya whitening cream ', 480.00, 1, '2018-11-04 07:18:04'),
(75, 38, 18114199, 4, '', 'Oliva Whitening Body Lotion', 320.00, 2, '2018-11-06 18:52:41'),
(76, 38, 18114199, 3, '', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-06 18:52:41'),
(77, 38, 18114199, 1, '', 'BOOT MOUISRISING CREAM', 380.00, 1, '2018-11-06 18:52:41'),
(103, 49, 18125746, 5, '105767', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-12-06 13:39:58'),
(102, 49, 18125746, 6, '267761', 'Meniya whitening cream ', 480.00, 1, '2018-12-06 13:39:58'),
(101, 49, 18125746, 7, '257626', 'Cotton Saree For Women', 2300.00, 2, '2018-12-06 13:39:58'),
(100, 48, 18113878, 6, '267761', 'Meniya whitening cream ', 480.00, 1, '2018-11-27 12:45:02'),
(99, 48, 18113878, 7, '257626', 'Cotton Saree For Women', 2300.00, 1, '2018-11-27 12:45:02'),
(92, 43, 18114501, 7, '257626', 'Cotton Saree For Women', 2300.00, 1, '2018-11-21 10:57:04'),
(93, 47, 18118384, 7, '257626', 'Cotton Saree For Women', 2300.00, 1, '2018-11-21 10:58:57'),
(94, 47, 18118384, 6, '267761', 'Meniya whitening cream ', 480.00, 1, '2018-11-21 10:58:57'),
(95, 47, 18118384, 5, '105767', 'KYLIE BB BRILLIANT A LEVRe', 350.00, 1, '2018-11-21 10:58:57'),
(96, 47, 18118384, 4, '491827', 'Oliva Whitening Body Lotion', 320.00, 1, '2018-11-21 10:58:57'),
(97, 47, 18118384, 3, '781289', 'BB Cream  London - 70gm', 490.00, 1, '2018-11-21 10:58:57'),
(98, 47, 18118384, 2, '545523', 'Aloe Vera Soothing Gel Was', 400.00, 1, '2018-11-21 10:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` text,
  `product_long_description` text CHARACTER SET utf8 NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_new_price` float DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `product_publication_status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `category_id`, `sub_category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_new_price`, `product_quantity`, `is_featured`, `product_image`, `product_publication_status`, `date`) VALUES
(1, '887692', 'BOOT MOUISRISING CREAM', 1, 8, 1, 'Boots Essentials Cucumber Moisturizing Cream is enriched with soothing', '', 410, 380, 5, 1, 'product_image/1.jpg', 1, '2018-11-09 11:04:00'),
(2, '545523', 'Aloe Vera Soothing Gel Was', 1, 9, 1, '92% Aloe Vera certified by California Certified Organic Farmes (CCOF)', '', 490, 400, 15, 1, 'product_image/2.jpg', 1, '2018-11-09 11:04:07'),
(5, '105767', 'KYLIE BB BRILLIANT A LEVRe', 1, 8, 1, 'Kylie BB Brilliant A Levres Cream. Very Good Product.And Clear Face ', '<p>--</p>', 380, 350, 5, 1, 'product_image/bbbb.jpg', 1, '2018-11-09 11:04:16'),
(6, '267761', 'Meniya whitening cream ', 1, 8, 1, 'Skin care Meiniya cream. Remove Skin Blackish.And Very Helpful Against', '<p>--</p>', 580, 480, 5, 1, 'product_image/china_white.jpg', 1, '2018-11-09 11:04:29'),
(3, '781289', 'BB Cream  London - 70gm', 1, 8, 1, 'BB Cream Covercoco London\r\nMade in UK(London)\r\n8 in 1 Anti-aging Expert.', '', 590, 490, 5, 1, 'product_image/BB+.jpeg', 1, '2018-11-09 11:04:37'),
(4, '491827', 'Oliva Whitening Body Lotion', 1, 8, 4, 'Oliva Whitening Body Lotion\r\n(For permanent fairness) \r\n', '', 350, 320, 9, 1, 'product_image/oliva.jpg', 1, '2018-11-09 11:04:45'),
(7, '257626', 'Cotton Saree For Women', 3, 18, 1, '100% Cotton Pure Saree. With Color Gurrenty. Good Febrics ', '<ul>\r\n<li>\r\n<p><span style=\"font-size: 12pt;\"><strong>আকর্ষণীয় ডিজাইনের কটন শাড়ি</strong></span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-size: 12pt;\"><strong>ফেব্রিক: পিওর কটন</strong></span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-size: 12pt;\"><strong>ম্যাচিং ব্লাউস পিস</strong></span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-size: 12pt;\"><strong>যে কোন উৎসবে মানানসই</strong></span></p>\r\n</li>\r\n</ul>', 2550, 2300, 3, 1, 'product_image/sare.jpg', 1, '2018-11-09 11:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(11) NOT NULL,
  `custom_order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `cod_payment_id` varchar(50) DEFAULT NULL,
  `bkash_payment_id` varchar(50) DEFAULT NULL,
  `order_total` varchar(50) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'pending',
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`order_id`, `custom_order_id`, `customer_id`, `shipping_id`, `cod_payment_id`, `bkash_payment_id`, `order_total`, `order_qty`, `order_status`, `order_date_time`) VALUES
(1, 51783, 12, 4, '25', '0', '5,030.00', 0, 'pending', '2018-10-31 20:40:45'),
(2, 29300, 12, 4, '26', '0', '5,030.00', 0, 'pending', '2018-10-31 20:42:30'),
(3, 17454, 12, 4, '27', '0', '890.00', 0, 'pending', '2018-11-01 05:59:13'),
(4, 10497, 12, 4, '28', '0', '890.00', 0, 'pending', '2018-11-01 06:02:44'),
(5, 56919, 12, 4, '29', '0', '3,570.00', 0, 'pending', '2018-11-01 06:05:25'),
(6, 77337, 12, 4, '30', '0', '3,570.00', 0, 'pending', '2018-11-01 06:18:43'),
(7, 39591, 12, 4, '31', '0', '3,570.00', 0, 'pending', '2018-11-01 06:21:06'),
(8, 97962, 12, 4, '32', '0', '3,570.00', 0, 'pending', '2018-11-01 06:22:54'),
(9, 77705, 12, 4, '33', '0', '3,570.00', 0, 'pending', '2018-11-01 06:23:16'),
(10, 46037, 12, 4, '34', '0', '3,570.00', 0, 'pending', '2018-11-01 06:26:20'),
(11, 33082, 12, 4, '35', '0', '3,570.00', 0, 'pending', '2018-11-01 06:31:18'),
(12, 56749, 12, 4, '36', '0', '3,570.00', 0, 'pending', '2018-11-01 06:31:57'),
(13, 59592, 12, 4, '37', '0', '3,570.00', 0, 'pending', '2018-11-01 06:45:09'),
(14, 91955, 1, 3, '38', '0', '2,380.00', 0, 'pending', '2018-11-01 19:04:14'),
(15, 79686, 1, 3, '39', '0', '2,380.00', 0, 'pending', '2018-11-01 19:05:24'),
(16, 85335, 1, 3, '40', '0', '2,380.00', 0, 'pending', '2018-11-01 19:23:43'),
(17, 18113821, 1, 3, '41', '0', '2,380.00', 0, 'pending', '2018-11-01 19:40:31'),
(18, 18119719, 12, 4, '0', '7', '2,380.00', 0, 'processing', '2018-11-01 20:13:45'),
(19, 18118058, 12, 4, '42', '0', '2,380.00', 0, 'pending', '2018-11-01 20:17:33'),
(20, 18116248, 12, 4, '43', '0', '430.00', 0, 'pending', '2018-11-01 20:42:02'),
(21, 18117146, 12, 4, '45', '0', '560.00', 0, 'pending', '2018-11-01 20:55:16'),
(22, 18114742, 12, 4, '46', '0', '400.00', 0, 'pending', '2018-11-02 04:15:22'),
(23, 18116642, 13, 5, '47', '0', '3,640.00', 0, 'processing', '2018-11-03 20:19:00'),
(24, 18112420, 13, 5, '48', '0', '3,640.00', 0, 'processing', '2018-11-03 20:20:06'),
(25, 18118414, 13, 5, '49', '0', '3,640.00', 0, 'pending', '2018-11-03 20:24:24'),
(26, 18118930, 13, 5, '50', '0', '6,600.00', 0, 'pending', '2018-11-03 20:47:46'),
(27, 18113945, 13, 5, '51', '0', '400.00', 0, 'processing', '2018-11-03 20:50:54'),
(28, 18115656, 13, 5, '52', '0', '8,110.00', 0, 'processing', '2018-11-03 21:00:35'),
(29, 18119885, 13, 5, '53', '0', '430.00', 0, 'processing', '2018-11-03 21:03:52'),
(30, 18116985, 13, 5, '54', '0', '430.00', 0, 'processing', '2018-11-03 21:09:24'),
(31, 18112909, 13, 5, '55', '0', '460.00', 0, 'processing', '2018-11-04 05:59:07'),
(32, 18113378, 13, 5, '56', '0', '460.00', 0, 'processing', '2018-11-04 06:06:23'),
(33, 18113354, 14, 6, '57', '0', '6,050.00', 0, 'processing', '2018-11-04 06:09:21'),
(34, 18111633, 14, 6, '0', '8', '1,230.00', 0, 'processing', '2018-11-04 06:33:43'),
(35, 18119879, 14, 6, '58', '0', '1,230.00', 0, 'processing', '2018-11-04 07:04:12'),
(36, 18114607, 14, 6, '59', '0', '1,230.00', 0, 'processing', '2018-11-04 07:15:30'),
(37, 18111948, 14, 6, '60', '0', '560.00', 0, 'processing', '2018-11-04 07:18:04'),
(38, 18114199, 15, 7, '0', '9', '4,940.00', 0, 'processing', '2018-11-06 18:52:41'),
(39, 18116860, 13, 5, '61', '0', '2,730.00', 0, 'processing', '2018-11-09 05:25:52'),
(40, 18118127, 16, 8, '62', '0', '3,830.00', 0, 'processing', '2018-11-21 10:36:49'),
(41, 18115510, 1, 3, '63', '0', '910.00', 0, 'complete', '2018-11-21 10:50:35'),
(42, 18113796, 1, 3, '64', '0', '3,210.00', 0, 'processing', '2018-11-21 10:52:15'),
(43, 18114501, 1, 3, '65', '0', '4,420.00', 0, 'processing', '2018-11-21 10:57:04'),
(44, 18112304, 1, 3, '66', '0', '4,420.00', 0, 'processing', '2018-11-21 10:57:39'),
(45, 18115657, 1, 3, '67', '0', '4,420.00', 0, 'processing', '2018-11-21 10:57:50'),
(46, 18115363, 1, 3, '68', '0', '4,420.00', 0, 'complete', '2018-11-21 10:58:10'),
(47, 18118384, 1, 3, '69', '0', '4,420.00', 0, 'shipping', '2018-11-21 10:58:57'),
(48, 18113878, 1, 3, '70', '0', '2,860.00', 0, 'pending', '2018-11-27 12:45:02'),
(49, 18125746, 1, 3, '0', '10', '5,510.00', 3, 'complete', '2018-12-06 13:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_full_name` varchar(100) NOT NULL,
  `shipping_mobile_number` varchar(100) NOT NULL,
  `shipping_another_mobile_number` varchar(100) NOT NULL,
  `shipping_email_address` varchar(100) NOT NULL,
  `shipping_details_address` text NOT NULL,
  `shipping_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `customer_id`, `shipping_full_name`, `shipping_mobile_number`, `shipping_another_mobile_number`, `shipping_email_address`, `shipping_details_address`, `shipping_created_date`) VALUES
(1, 9, 'MD. REZWAN NABI', '01452522', '5646454', 'rezwan123@gmail.com', 'dfsdfsdfsf', '2018-10-28 15:31:10'),
(2, 11, 'MD. REZWAN NABI', '01524154254', '0514252252', '19@gmail.com', '7587575757', '2018-10-29 10:49:28'),
(3, 1, 'DFSAFSDF', '754457', '557575', 'noman.cse19@gmail.com', 'FGDFGDFGD', '2018-10-29 14:10:55'),
(4, 12, 'Jahidul Islam Noman', '01521451354', '01772068908', '2znimmy@gmail.com', '19,19/1 D.C Roy Road Mitford,Dhaka-1100', '2018-10-31 18:02:18'),
(5, 13, 'ZAHIDUL ISLAM  Jahid', '01772068908', '01521451354', 'bdnoman7@gmail.com', '19,19/1 D.C Roy Road Mitford,Dhaka-1100', '2018-11-03 19:42:40'),
(6, 14, 'Zannatuj Zeore Nimmy', '01571757161', '0177230565', 'shisirful@gmail.com', 'Dhaka.Bagladesh', '2018-11-04 06:09:06'),
(7, 15, 'Zannatuj Zeore Nimmy', '025495156256', '45454545', 'shisirful@gmail.com', 'sfsf', '2018-11-06 16:53:46'),
(8, 16, 'Ariyan  Tumpa', '015252825825', '0155646', 'tumpakhan6000@gmail.com', '19,19/1 D.C Roy Road,mitford,Dhaka-1100', '2018-11-21 10:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sub_category_description` text,
  `publication_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_description`, `publication_status`) VALUES
(8, 1, 'Cream', 'Just Cream', 1),
(9, 1, 'Face Wash', 'This Is Face Wash', 1),
(10, 6, 'Full Shirt', 'This Is A shirt', 1),
(12, 1, 'Hair Growth Oil', 'this Is A Cream', 1),
(13, 1, 'Bath & Body', '............', 1),
(14, 1, 'Beauty Tools', '............', 1),
(15, 1, 'Hair Care', '............', 1),
(16, 3, 'Women\'s Bag', '...', 1),
(17, 3, 'Women\'s Clothing', '............', 1),
(18, 3, 'Womens Saree', 'This Is Saree', 1);

--
-- Indexes for dumped tables
--





--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bkash_payment`
--
ALTER TABLE `bkash_payment`
  ADD PRIMARY KEY (`bkash_payment_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cod_payment`
--
ALTER TABLE `cod_payment`
  ADD PRIMARY KEY (`cod_payment_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bkash_payment`
--
ALTER TABLE `bkash_payment`
  MODIFY `bkash_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cod_payment`
--
ALTER TABLE `cod_payment`
  MODIFY `cod_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `manufacture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
