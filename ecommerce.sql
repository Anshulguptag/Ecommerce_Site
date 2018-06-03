-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 11:07 AM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.5

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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Lenovo'),
(6, 'Nikon'),
(7, 'Apple'),
(8, 'MI'),
(9, 'Motorola'),
(10, 'Huawei'),
(11, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(5, '::1', 6),
(11, '::1', 6),
(30, '::1', 6),
(26, '::1', 6),
(27, '::1', 6),
(23, '::1', 6),
(34, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'tablets');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_addr`) VALUES
(1, '::1', 'Anshul', 'ganshul917@gmail.com', 'Anshul@13', 'India', 'Delhi', '9650576346', 'profile.jpg', ''),
(2, '::1', 'Anshul Gupta', 'ganshul917@gmail.com', 'Anshul@13', 'India', 'Delhi', '9650576346', 'profile.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(4, 1, 2, 'DELL', 50000, '<p>Dell is a Nice laptop.</p>', 'Dell_Inspiron_3537_L_1.jpg', 'Dell, Laptop, New'),
(5, 5, 7, 'Apple Ipad', 25000, '<p>It is the brand of Apple with Feature touch.</p>', '1.jpg', 'Ipad, Apple'),
(11, 1, 7, 'Mac Book pro', 72000, '<p>It is an Apple Brand.</p>', 'rosegold-macbook-1.jpg', 'MacBook pro, Apple, latest'),
(12, 1, 1, 'HP Laptop', 25000, '<p>It is a HP brand.</p>', 'c05116452.png', 'HP, Laptop'),
(13, 3, 9, 'Moto G4 plus', 14000, '<p>It is a MOTO brand with android Nougat</p>', 'motorola-moto-g4-plus-xt1644-original-imaeteu3f6tcpgjd.jpeg', 'Moto, G4, G4plus'),
(14, 3, 9, 'Moto E4 plus', 7999, '<p>It is a MOTO brand with 5000 MAH battery.</p>', '6132017104528AM_635_motoe4plusdb.jpeg', 'Moto, E4, E4plus'),
(15, 3, 9, 'Moto G5s plus', 16000, '<p>It is a Moto brand with dual camera</p>', 'images.jpg', 'Moto, G5s, G5splus'),
(17, 3, 4, 'Samsung S9', 70000, '<p>It is a Samsung Brand</p>', 'ezgif.com-resize.gif', 'Samsung, S9, Bazzelless'),
(18, 3, 8, 'MI MIX 2', 22000, '<p>It is a MI brand with Bazzel Less Feature</p>', 'mimix.gif', 'MI, bazzelless, MIMIX 2'),
(21, 3, 7, 'IphoneX', 87000, '<p>It is an Apple Brand.</p>', 'IPHONE.gif', 'iphone, Apple'),
(22, 4, 7, 'Apple Computer', 70000, '<p>It is an Apple product.</p>', 'screencast.gif', 'Apple, Computer'),
(23, 2, 4, 'Samsung DSLR', 25000, '<p>It is a smasung brand.</p>', 'NX1-stars.gif', 'Smasung, DSLR, Camera'),
(24, 3, 8, 'Redmi Note 4', 10000, '<p>It is a MI brand</p>', '3wAA6u.gif', 'MI, Redminote 4, mobile, cheap and best'),
(25, 3, 7, 'Iphone 7', 57000, '<p>It is an Apple Brand.</p>', 'e7jOPZQ.gif', 'Apple, Iphone 7'),
(26, 1, 5, 'Lenovo Yoga', 32000, '<p>It is a Lenovo brand.</p>', 'lenovo_900-13_80mk001kph.gif', 'Lenovo, laptop, yoga'),
(27, 2, 6, 'Nikon Camera', 20000, '<p>It is a Nikon brand.</p>', 'giphy.gif', 'Nikon, camera, DSLR'),
(28, 5, 4, 'Samsung Tablets', 15000, '<p>It is a Smasung Brand</p>', 'Samsung_Galaxy_Tab_S2_MoonReader.gif', 'Samsung, tablets, yoga'),
(29, 3, 10, 'Huawei P20', 18999, '<p>It is a Huawei brand.</p>', 'ezgif-5-a83229a4c6.gif', 'Huawei, P20'),
(30, 3, 11, 'Nokia 6', 16000, '<p>It is a Nokia Brand</p>', 'nokia6.gif', 'Nokia, Nokia6'),
(31, 1, 5, 'lenovo Ideapad 510', 42990, '<p>It is a lenovo Brand.</p>', '1-lenovo-ideapad-510-laptop-15.6-inch.gif', 'lenovo, ipad, 510, laptop'),
(32, 1, 2, 'Dell Vostro 5470', 69000, '<p>It is a Dell brand.</p>', 'dell_5470_i5-4200u.gif', 'Dell, Laptop, 5470'),
(33, 3, 8, 'Mi A1', 10000, '<p>It is a MI brand.</p>', '09.06_AndroidOne_Explode-G.gif', 'MI,A1, MI A1, MIA1'),
(34, 3, 7, 'Iphone SE', 19000, '<p>It is an apple brand.</p>', 'apple_iphone_se_16gb.gif', 'iphone, Apple, SE, se');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
