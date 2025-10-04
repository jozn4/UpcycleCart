-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 05:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zerowastenew`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `loginid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`loginid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `customer_id`, `product_id`, `quantity`) VALUES
(13, 5, 4, 1),
(16, 5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` varchar(125) NOT NULL,
  `category_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(8, 'Metal', 'Strong ', 'cat1.png'),
(10, 'Glass', 'Breakable', 'cat2.jpg'),
(11, 'Plastic', 'Recycled', 'cat3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collector`
--

CREATE TABLE `tbl_collector` (
  `collector_id` int(11) NOT NULL,
  `collector_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_collector`
--

INSERT INTO `tbl_collector` (`collector_id`, `collector_name`, `email`, `phone_no`, `address`, `ward_id`, `username`, `password`) VALUES
(1, 'Febin Bovas ', 'febin123@gmail.com', 9633196948, 'Vattakkunnel(h)\r\nMuttambalam P.O\r\nIdukki', 2, 'febin', 'febin'),
(3, 'Jesvin vincent', 'jesvin123@gmail.com', 7025294432, 'Vattakkuzhy (h)\r\nMuththaaramkunnu P.O\r\nThodupuzha', 1, 'jesvin', 'jesvin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collectorlogin`
--

CREATE TABLE `tbl_collectorlogin` (
  `login_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_collectorlogin`
--

INSERT INTO `tbl_collectorlogin` (`login_id`, `username`, `password`) VALUES
(1, 'febincollectoridukki', 'collector1'),
(2, 'jesvincollectoridukkki', 'collector2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `email`, `phone_no`, `address`, `ward_id`, `username`, `password`, `wallet_id`) VALUES
(5, 'Ajay', 'ajay1234@gmail.com', 12345678, 'Vattakkuzhy (h)', 2, 'ajay1234', 'aj1234', 0),
(6, 'Triston K Issac', 'tristonissac3492@gmail.com', 9633196948, 'Kattakkayam House Kattampack', 1, 'triston123', 'triston123', 0),
(8, 'Sandra Sukumaran', 'sandra@gmail.com', 1234567891, 'maarika', 2, 'sandra', 'sandra', 3),
(9, 'Josna', 'josnag481@gmail.com', 8129483112, 'Vazhakulam', 1, 'josna', 'josna', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `ordered_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `customer_id`, `total_amount`, `ordered_date`, `status`, `total_quantity`, `total_coin`) VALUES
(21, 9, 1500, '2025-10-03', 'Paid', 1, 3000),
(22, 9, 1350, '2025-10-03', 'Paid', 3, 2700);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`, `coin`) VALUES
(11, 21, 2, 1, 1500, 3000),
(12, 22, 4, 2, 400, 800),
(13, 22, 5, 1, 550, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `total_coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `total_amount`, `payment_date`, `status`, `total_coin`) VALUES
(12, 21, 1500, '2025-10-03', 'Card', 0),
(13, 21, 1350, '2025-10-03', 'Card', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(125) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_coin` int(11) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_price`, `product_coin`, `product_image`, `product_stock`) VALUES
(2, 11, 'Bag', 'Easy to carry', 1500, 3000, 'a2.jpg', 6),
(3, 10, 'Glass container    ', 'Transparent    ', 2000, 4000, 'a2.jpg', 0),
(4, 10, 'aaaa', 'ssss', 400, 800, 'a4.jpg', 20),
(5, 8, 'ttt', 'bbbb', 550, 1100, 'a6.jpg', 15),
(6, 11, 'vvvv', 'gggg', 250, 500, 'a3.jpg', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `coin` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `collector_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `collection_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `customer_id`, `subcategory_id`, `item_quantity`, `status`, `coin`, `request_date`, `collector_id`, `category_id`, `collection_date`) VALUES
(1, 5, 9, 10, 'Collected', 0, '2025-08-26', 1, 8, '2025-09-09'),
(5, 5, 8, 3, 'Collected', 0, '2025-09-02', 1, 11, '0000-00-00'),
(7, 5, 10, 6, 'Collected', 0, '2025-09-02', 1, 10, '2025-09-07'),
(11, 5, 12, 99, 'Collected', 0, '2025-09-02', 1, 11, '1970-01-01'),
(12, 6, 10, 3, 'Assigned', 0, '2025-09-02', 3, 10, '2025-09-07'),
(13, 5, 10, 94, 'Collected', 0, '2025-09-12', 1, 10, '2025-09-15'),
(14, 5, 12, 0, 'Collected', 0, '2025-09-16', 1, 11, '2025-09-25'),
(15, 5, 11, 5, 'Collected', 0, '2025-09-16', 1, 11, '2025-09-25'),
(16, 5, 11, 8, 'Collected', 0, '2025-09-16', 1, 11, '2025-09-25'),
(17, 5, 8, 5, 'Collected', 0, '2025-09-16', 1, 11, '2025-09-25'),
(18, 5, 9, 55, 'Collected', 0, '2025-09-16', 1, 8, '2025-09-25'),
(19, 5, 11, 5, 'Accepted', 0, '2025-09-16', 1, 11, '2025-09-25'),
(20, 5, 9, 6, 'Accepted', 0, '2025-09-16', 1, 8, '2025-09-25'),
(21, 5, 9, 6, 'Assigned', 0, '2025-09-16', 1, 8, '2025-09-25'),
(22, 5, 9, 6, 'Collected', 0, '2025-09-16', 1, 8, '2025-09-25'),
(23, 5, 9, 6, 'Assigned', 0, '2025-09-16', 1, 8, '2025-09-25'),
(24, 5, 10, 5, 'Assigned', 0, '2025-09-16', 1, 10, '2025-09-25'),
(25, 5, 10, 5, 'Assigned', 0, '2025-09-16', 1, 10, '2025-09-25'),
(26, 5, 9, 6, 'Assigned', 0, '2025-09-16', 1, 8, '2025-09-25'),
(27, 6, 9, 3, 'Assigned', 0, '2025-09-16', 3, 8, '2025-09-21'),
(28, 8, 8, 8, 'Collected', 0, '2025-09-20', 1, 11, '2025-09-25'),
(29, 8, 12, 3, 'Assigned', 0, '2025-09-20', 1, 11, '2025-09-25'),
(30, 6, 10, 20, 'Collected', 0, '2025-09-30', 3, 10, '2025-10-06'),
(31, 6, 10, 10, 'Collected', 0, '2025-10-01', 3, 10, '2025-10-06'),
(32, 6, 12, 30, 'Collected', 150, '2025-10-01', 3, 11, '2025-10-06'),
(33, 9, 10, 15, 'Collected', 75, '2025-10-01', 3, 10, '2025-10-06'),
(34, 9, 9, 14, 'Rescheduled', 0, '2025-10-01', 3, 8, '2025-10-07'),
(35, 9, 11, 40, 'Assigned', 0, '2025-10-01', 3, 11, '2025-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL,
  `subcategory_image` varchar(300) NOT NULL,
  `coin` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_image`, `coin`, `quantity`, `category_id`) VALUES
(8, 'bottle', 'a1.jpg', 2, 1, 11),
(9, 'container', 'a6.jpg', 10, 1, 8),
(10, 'bowl', 'about-1.jpg', 5, 1, 10),
(11, 'aaaa', 'a3.jpg', 2, 1, 11),
(12, 'dewvev', 'a2.jpg', 5, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `customer_id`, `coin`) VALUES
(1, 4, 0),
(2, 5, 0),
(3, 8, 0),
(4, 6, 150),
(5, 9, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

CREATE TABLE `tbl_ward` (
  `ward_id` int(11) NOT NULL,
  `ward_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`ward_id`, `ward_name`) VALUES
(1, 'Vengalloor'),
(2, 'Guru I.T.C'),
(3, 'Vengathanam'),
(4, 'Madathikkandom'),
(5, 'Muncipal UP School'),
(6, 'Ambalam'),
(7, 'hh'),
(8, 'jhhg'),
(9, 'lh'),
(10, 'aa'),
(11, 'jhgkj'),
(12, 'oiyyug'),
(13, 'dss'),
(15, 'fhdyr'),
(16, 'lgkf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_collector`
--
ALTER TABLE `tbl_collector`
  ADD PRIMARY KEY (`collector_id`);

--
-- Indexes for table `tbl_collectorlogin`
--
ALTER TABLE `tbl_collectorlogin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_collector`
--
ALTER TABLE `tbl_collector`
  MODIFY `collector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_collectorlogin`
--
ALTER TABLE `tbl_collectorlogin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
