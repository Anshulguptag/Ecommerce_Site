-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 08:25 AM
-- Server version: 10.1.32-MariaDB
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `acc_holder` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `acc_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `card_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(100) NOT NULL,
  `cvv` int(10) NOT NULL,
  `expirey_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`acc_holder`, `acc_no`, `card_no`, `amount`, `cvv`, `expirey_date`, `password`) VALUES
('', '358618509', '5286374344711071', 100000, 290, '17.07.2023', 'Anshul@13'),
('', '413351878', '9266587830877148', 81002, 633, '25.07.2023', 'Anshul@13'),
('', '517991247', '2811642792846611', 100000, 878, '23.10.2023', 'dfghj'),
('', '557355151', '8404835797367143', 100000, 676, '20.06.2023', 'Anshul@13'),
('', '742864058', '4987419537773017', 100000, 368, '17.07.2023', 'Anshul@13'),
('', '750598824', '6008599010444962', 100000, 642, '25.07.2023', 'Anshul@13'),
('', '852100683', '4909053741095958', 100000, 315, '25.07.2023', 'Anshul@13');

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
(13, '192.168.0.100', 1),
(14, '192.168.0.100', 1),
(30, '192.168.0.100', 1),
(24, '192.168.0.100', 1),
(11, '::1', 1),
(20, '::1', 1),
(2, '::1', 2),
(1, '::1', 1);

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
  `customer_addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_addr`) VALUES
(1, '::1', 'Anshul Gupta', 'ganshul917@gmail.com', 'Anshul@13', 'India', 'Delhi', '9650576346', '8B Shyam Colony Budh Vihar\r\nAbhi'),
(2, '::1', 'Anshul Gupta', 'gauravbindal20@gmail.com', 'Anshul@13', 'India', 'Delhi', '9990177399', 'bebfhjewbf'),
(3, '::1', 'Anshul Gupta', 'ganshul917@gmail.com', 'Anshul@13', 'India', 'Delhi', '9650576346', '8B Shyam Colony Budh Vihar\r\nAbhi'),
(4, '::1', 'Anshul Gupta', 'ganshul917@gmail.com', 'Anshul@13', 'India', 'Delhi', '9650576346', '8B Shyam Colony Budh Vihar\r\nAbhi'),
(5, '::1', 'Rahul gupta', 'ganshul917@gmail.com', 'dfghj', 'India', 'Delhi', '9650576346', '8B Shyam Colony Budh Vihar\r\nAbhi');

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
(1, 3, 8, 'RedMi note 5 pro', 14999, '<ul>\r\n<li>4&nbsp;GB RAM | 64 GB ROM | Expandable Upto 128 GB</li>\r\n<li>5.99 inch Full HD+ Display</li>\r\n<li>12MP + 5MP Dual Rear Camera | 20MP Front Camera</li>\r\n<li>4000 mAh Li Polymer Battery</li>\r\n<li>Qualcomm Snapdragon 636 Processor</li>\r\n</ul>', 'XIAOMI-OK.gif', 'Re'),
(2, 1, 5, 'lenovo Ideapad 510', 57309, '<ul>\r\n<li>Pre-installed Genuine Windows 10 Operating System (Includes Built-in Security, Free Automated Updates, Latest Features)</li>\r\n<li>Intel Core i5 Processor (7th Gen)</li>\r\n<li>8 GB DDR4 RAM</li>\r\n<li>64 bit Windows 10 Operating System</li>\r\n<li>1&nbsp;TB HDD</li>\r\n<li>15.6 inch Display</li>\r\n</ul>', '1-lenovo-ideapad-510-laptop-15.6-inch.gif', 'Lenovo, laptop, ideapad, 7th gen'),
(3, 3, 8, 'Redmi Note 4', 10999, '<ul>\r\n<li>4 GB RAM | 64 GB ROM | Expandable Upto 128 GB</li>\r\n<li>5.5 inch Full HD Display</li>\r\n<li>13MP Rear Camera | 5MP Front Camera</li>\r\n<li>4100 mAh Li-Polymer Battery</li>\r\n<li>Qualcomm Snapdragon 625 64-bit Octa Core 2GHz Processor</li>\r\n</ul>', '3wAA6u.gif', 'redmi note 4, mi, cheap and best'),
(4, 3, 8, 'Mi A1', 15525, '<ul>\r\n<li>4GB RAM | 64 GB ROM | Expandable Upto 128 GB</li>\r\n<li>5.5 inch Full HD Display</li>\r\n<li>12MP + 12MP Dual Rear Camera | 5MP Front Camera</li>\r\n<li>3080 mAh Li-polymer Battery</li>\r\n<li>Qualcomm Snapdragon 625 64 bit Octa Core 2GHz Processor</li>\r\n<li>Android Nougat 7.1.2 | Stock Android Version</li>\r\n<li>Android One Smartphone - With Android Oreo now available</li>\r\n</ul>', '09.06_AndroidOne_Explode-G.gif', 'Mi, MiA1, android nougat, Android N, Android 7.1'),
(5, 3, 7, 'Iphone SE', 16999, '<ul>\r\n<li>32 GB ROM |</li>\r\n<li>4&nbsp;inch Retina Display</li>\r\n<li>12MP Rear Camera | 1.2MP Front Camera</li>\r\n<li>Li-Ion Battery</li>\r\n<li>Apple A9 64-bit processor and Embedded M9 Motion Co-processor</li>\r\n</ul>', 'apple_iphone_se_16gb.gif', 'Apple, Iphone SE'),
(6, 3, 9, 'Moto E4 plus', 7999, '<ul>\r\n<li>3&nbsp;GB RAM | 32 GB ROM | Expandable Upto 128 GB</li>\r\n<li>5.5 inch HD Display</li>\r\n<li>13MP Rear Camera | 5MP Front Camera</li>\r\n<li>5000 mAh Li-Ion Polymer Battery</li>\r\n<li>MediaTek MTK6737 1.3GHz Processor</li>\r\n<li>Android Nougat 7.1.1 | Stock Android Version</li>\r\n<li>Front Fingerprint Sensor</li>\r\n<li>Dedicated SD Card Slot</li>\r\n<li>Front and Rear Flash</li>\r\n</ul>', '6132017104528AM_635_motoe4plusdb.jpeg', 'Moto, E4, E4plus'),
(7, 1, 2, 'Dell Vostro 15', 45990, '<ul>\r\n<li>Intel Core i5 Processor (8th Gen)</li>\r\n<li>8 GB DDR4 RAM</li>\r\n<li>64 bit Windows 10 Operating System</li>\r\n<li>1 TB HDD</li>\r\n<li>15.6 inch Display</li>\r\n</ul>', 'dell.jpg', 'Dell, Laptop, i5'),
(8, 1, 2, 'Dell Inspiron Core i3 6th Gen', 23990, '<ul>\r\n<li>Intel Core i3 Processor (6th Gen)</li>\r\n<li>4 GB DDR4 RAM</li>\r\n<li>Linux/Ubuntu Operating System</li>\r\n<li>1 TB HDD</li>\r\n<li>14 inch Display</li>\r\n</ul>', 'Dell_Inspiron_3537_L_1.gif', 'Dell, Laptop, i3, inspiron'),
(9, 3, 7, 'Apple Iphone 7', 44999, '<ul>\r\n<li>32 GB ROM |</li>\r\n<li>4.7 inch Retina HD Display</li>\r\n<li>12MP Rear Camera | 7MP Front Camera</li>\r\n<li>Li-Ion Battery</li>\r\n<li>Apple A10 Fusion 64-bit processor and Embedded M10 Motion Co-processor</li>\r\n</ul>', 'e7jOPZQ.gif', 'Apple, Iphone 7'),
(10, 4, 7, 'Apple Desktop', 91900, '<ul>\r\n<li>Mac OS X Sierra</li>\r\n<li>Intel Core i5 (5th Gen)</li>\r\n<li>HDD Capacity 1 TB</li>\r\n<li>RAM 8 GB DDR3</li>\r\n<li>21.5 inch Display</li>\r\n</ul>', 'e9c084005fa39c691b3e58bae4aeaa65.jpg', 'Apple, Computer, Desktop'),
(11, 3, 4, 'Samsung Galaxy S9 (64 GB)', 57900, '<ul>\r\n<li>4GB RAM | 64 GB ROM | Expandable Upto 400 GB</li>\r\n<li>5.8 inch Quad HD+ Display</li>\r\n<li>12MP Rear Camera | 8MP Front Camera</li>\r\n<li>3000 mAh Battery</li>\r\n<li>Exynos 9810 Processor</li>\r\n</ul>', 'ezgif.com-resize.gif', 'Samsung, S9, Bazzelless'),
(12, 3, 10, 'Honor 10', 29999, '<ul>\r\n<li>6 GB RAM | 128 GB ROM |</li>\r\n<li>5.84 inch Full HD+ Display</li>\r\n<li>24MP + 16MP Dual Rear Camera | 24MP Front Camera</li>\r\n<li>3400 mAh Lithium Polymer Battery</li>\r\n<li>Huawei Kirin 970 Processor</li>\r\n</ul>', 'ezgif-5-a83229a4c6.gif', 'Huawei, Honor P10'),
(13, 2, 6, 'Nikon D3400 DSLR', 33990, '<ul>\r\n<li>Effective Pixels: 24.2 MP</li>\r\n<li>Sensor Type: CMOS</li>\r\n<li>HD, Full HD</li>\r\n</ul>', 'giphy.gif', 'Nikon, camera, DSLR'),
(14, 3, 9, 'Moto E5 plus', 15500, '<ul>\r\n<li>3 GB RAM | 32 GB ROM |</li>\r\n<li>6.0 inch HD+ Display</li>\r\n<li>12MP Rear Camera | 5MP Front Camera</li>\r\n<li>5000 mAh Battery</li>\r\n<li>Qualcomm&reg; Snapdragon&trade; 430 processor Processor</li>\r\n</ul>', 'dims.jpg', 'Moto, E5, E5plus'),
(15, 3, 7, 'Apple Iphone X', 89990, '<ul>\r\n<li>64 GB ROM |</li>\r\n<li>5.8 inch Super Retina HD Display</li>\r\n<li>12MP + 12MP Dual Rear Camera | 7MP Front Camera</li>\r\n<li>lithium-ion Battery</li>\r\n<li>A11 Bionic Chip with 64-bit Architecture, Neural Engine, Embedded M11 Motion Coprocessor Processor</li>\r\n</ul>', 'source.gif', 'Apple, Iphone X,Iphone 10'),
(16, 3, 8, 'Mi Mix 2', 27999, '<ul>\r\n<li>6&nbsp;GB RAM | 128 GB ROM |</li>\r\n<li>5.99 inch Full HD+ Display</li>\r\n<li>12MP Rear Camera | 5MP Front Camera</li>\r\n<li>3400 mAh Li-polymer Battery</li>\r\n<li>Qualcomm Snapdragon 835 Octa Core 2.5 GHz Processor</li>\r\n</ul>', 'mimix.gif', 'MI, bazzelless, MIMIX 2'),
(17, 3, 9, 'Moto G4 plus', 9999, '<ul>\r\n<li>2&nbsp;GB RAM | 16 GB ROM |</li>\r\n<li>5.5 inch Display</li>\r\n<li>5MP Rear Camera</li>\r\n<li>3000 mAh Battery</li>\r\n<li>Qualcomm Octa Core 1.5GHz Processor</li>\r\n</ul>', 'motorola-moto-g4-plus-xt1644-original-imaeteu3f6tcpgjd.jpeg', 'Moto, G4, G4plus'),
(18, 3, 11, 'Nokia 6', 16499, '<ul>\r\n<li>3&nbsp;GB RAM | 32 GB ROM | Expandable Upto 128 GB</li>\r\n<li>5.5 inch Full HD Display</li>\r\n<li>16MP Rear Camera | 8MP Front Camera</li>\r\n<li>3000 mAh Battery</li>\r\n<li>Qualcomm Snapdragon 430 Processor</li>\r\n</ul>', 'nokia6.gif', 'Nokia, Nokia6'),
(19, 2, 4, 'Samsung Dslr', 34221, '<ul>\r\n<li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: #111111;\">Lens: Type - Samsung Lens</span></li>\r\n<li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: #111111;\">Focusing: Modes - Single AF, Continuous AF, MF</span></li>\r\n<li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: #111111;\">Optical Image Stabilization: OIS Mode1/Mode2/OFF</span></li>\r\n<li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: #111111;\">Dust Reduction: Type - Supersonic drive</span></li>\r\n</ul>', 'NX1-stars.gif', 'Smasung, DSLR, Camera'),
(20, 1, 7, 'Apple MacBook Air', 54990, '<ul>\r\n<li>Intel Core i5 Processor (5th Gen)</li>\r\n<li>8 GB DDR3 RAM</li>\r\n<li>64 bit Mac OS Operating System</li>\r\n<li>128 GB SSD</li>\r\n<li>13.3 inch Display</li>\r\n</ul>', 'rosegold-macbook-1.jpg', 'MacBook air, Apple, latest'),
(21, 5, 4, 'Samsung Galaxy Tab', 9490, '<ul>\r\n<li>1.5 GB RAM | 8 GB ROM</li>\r\n<li>Expandable Upto 200 GB</li>\r\n<li>5 MP Primary Camera | 2 MP Front</li>\r\n<li>Android 5.1 (Lollipop)</li>\r\n<li>battery: 4000 mAh Lithium Polymer</li>\r\n<li>Voice Call (Single Sim, LTE)</li>\r\n<li>Processor: Qualcomm Snapdragon Quad Core Processor</li>\r\n</ul>', 'Samsung_Galaxy_Tab_S2_MoonReader.gif', 'Samsung, tablets, galaxy'),
(22, 3, 7, 'iphone 5s', 19999, '<ul>\r\n<li>16 GB ROM |</li>\r\n<li>4 inch Retina Display</li>\r\n<li>8MP Rear Camera | 1.2MP Front Camera</li>\r\n<li>Li-Ion Battery</li>\r\n<li>Apple A7 64-bit processor and M7 Motion Co-processor</li>\r\n</ul>', 'TkpNQvFZCMHyJCKj.jpg', 'Iphone, 5s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`acc_no`,`card_no`,`cvv`);

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
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
