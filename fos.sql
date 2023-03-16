-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 09:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `created_date`, `updated_date`) VALUES
(1, 'Snacks', 0, '2023-01-30 01:02:50', '2023-01-30 01:02:50'),
(2, 'Drinks', 0, '2023-01-30 07:00:32', '2023-01-30 07:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(21) NOT NULL,
  `user_id` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone_number` bigint(21) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `email`, `phone_number`, `message`, `time`) VALUES
(1, 1, 'zinlin@gmail.com', 9777888999, 'ayan kg dl hee hee', '2023-03-04 14:01:03'),
(2, 3, 'arkar@gmail.com', 9793998369, 'Good job!', '2023-03-07 15:56:05'),
(3, 3, 'arkar@gmail.com', 9793998369, 'အရမ်းစားလို့ကောင်းတယ်', '2023-03-07 21:45:04'),
(4, 3, 'arkar@gmail.com', 9793998369, 'အရမ်းစားလို့ကောင်းတာပဲ', '2023-03-12 09:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `status` enum('0-pick_up','1-delivery_men') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `status`, `created_date`, `updated_date`) VALUES
(1, '0-pick_up', '2023-01-31 08:58:03', '2023-01-31 08:58:03'),
(2, '1-delivery_men', '2023-02-01 08:59:18', '2023-02-01 08:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `paymentMode` enum('0=cash_on_delivery','1=mBanking') NOT NULL,
  `total_balance` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `phone_number` varchar(255) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_info_id`, `delivery_id`, `paymentMode`, `total_balance`, `address`, `status`, `phone_number`, `created_date`, `updated_date`) VALUES
(1, 1, 2, '0=cash_on_delivery', 17000, 'Chan Aye Thar Zan Tsp, Mandalay', '5', '09402543442', '2023-04-04', '2023-03-04'),
(2, 1, 1, '0=cash_on_delivery', 5500, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(3, 1, 2, '0=cash_on_delivery', 16000, 'Mandalay, Chan Aye Thar Zan', '1', '09793798369', '2023-03-07', '2023-03-07'),
(4, 1, 1, '1=mBanking', 8500, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(5, 1, 2, '0=cash_on_delivery', 10000, 'MDY, Aung Myay Thar Zan', '1', '09793798369', '2023-03-07', '2023-03-07'),
(6, 1, 1, '1=mBanking', 12500, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(7, 1, 1, '1=mBanking', 9000, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(8, 3, 2, '1=mBanking', 10500, 'MDY, Aung Myay Thar Zan', '1', '09793798369', '2023-03-07', '2023-03-07'),
(9, 3, 1, '1=mBanking', 7000, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(10, 3, 1, '1=mBanking', 5000, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(11, 3, 1, '1=mBanking', 12000, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(12, 3, 1, '0=cash_on_delivery', 5500, ', ', '2', '09793798369', '2023-03-07', '2023-03-07'),
(13, 2, 1, '0=cash_on_delivery', 9500, ', ', '1', '09793798369', '2023-03-07', '2023-03-07'),
(14, 2, 2, '1=mBanking', 13500, 'MDY, Aung Myay Thar Zan', '2', '09793798369', '2023-03-07', '2023-03-07'),
(15, 2, 1, '0=cash_on_delivery', 4500, ', ', '5', '09793798369', '2023-03-07', '2023-03-07'),
(16, 2, 1, '1=mBanking', 17500, ', ', '4', '09793798369', '2023-03-07', '2023-03-07'),
(17, 2, 2, '0=cash_on_delivery', 7000, 'MDY, Chan Aye Thar Zan', '2', '09793798369', '2023-03-07', '2023-03-07'),
(18, 2, 1, '0=cash_on_delivery', 17000, ', ', '3', '09793798369', '2023-03-07', '2023-03-07'),
(19, 3, 2, '1=mBanking', 9000, 'MDY, Aung Myay Thar Zan', '4', '09793798369', '2023-03-07', '2023-03-07'),
(20, 2, 1, '0=cash_on_delivery', 6000, ', ', '1', '09793798369', '2023-03-11', '2023-03-11'),
(21, 3, 2, '0=cash_on_delivery', 28000, 'MDY, 19*58C Nann Shae', '5', '09793798369', '2023-03-12', '2023-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `created_date`, `updated_date`) VALUES
(1, 1, 6, 2, '2023-03-04 07:27:51', '2023-03-04 07:27:51'),
(2, 1, 16, 16, '2022-03-04 07:27:51', '2023-03-04 07:27:51'),
(3, 2, 1, 4, '2022-03-07 04:49:27', '2023-03-07 04:49:27'),
(4, 2, 2, 5, '2022-02-07 04:49:27', '2023-03-07 04:49:27'),
(5, 2, 3, 20, '2023-04-07 04:49:27', '2023-03-07 04:49:27'),
(6, 3, 2, 1, '2023-03-07 04:50:39', '2023-03-07 04:50:39'),
(7, 3, 3, 4, '2023-05-07 04:50:39', '2023-03-07 04:50:39'),
(8, 3, 4, 4, '2022-03-07 04:50:39', '2023-03-07 04:50:39'),
(9, 4, 3, 10, '2023-03-07 04:51:17', '2023-03-07 04:51:17'),
(10, 4, 4, 10, '2023-03-07 04:51:17', '2023-03-07 04:51:17'),
(11, 4, 8, 1, '2023-03-07 04:51:17', '2023-03-07 04:51:17'),
(12, 5, 14, 25, '2022-03-07 04:52:16', '2023-03-07 04:52:16'),
(13, 5, 3, 2, '2023-03-07 04:52:16', '2023-03-07 04:52:16'),
(14, 6, 2, 3, '2023-03-07 04:52:45', '2023-03-07 04:52:45'),
(15, 6, 3, 1, '2023-06-07 04:52:45', '2023-03-07 04:52:45'),
(16, 6, 8, 1, '2023-03-07 04:52:45', '2023-03-07 04:52:45'),
(17, 7, 13, 30, '2023-03-07 04:53:24', '2023-03-07 04:53:24'),
(18, 7, 2, 1, '2023-03-07 04:53:24', '2023-03-07 04:53:24'),
(19, 8, 3, 1, '2023-03-07 04:54:57', '2023-03-07 04:54:57'),
(20, 8, 4, 1, '2023-03-07 04:54:57', '2023-03-07 04:54:57'),
(21, 8, 6, 1, '2023-03-07 04:54:57', '2023-03-07 04:54:57'),
(22, 8, 7, 1, '2023-03-07 04:54:57', '2023-03-07 04:54:57'),
(23, 9, 13, 2, '2023-03-07 04:55:21', '2023-03-07 04:55:21'),
(24, 10, 3, 2, '2023-03-07 04:55:50', '2023-03-07 04:55:50'),
(25, 10, 4, 1, '2023-03-07 04:55:50', '2023-03-07 04:55:50'),
(26, 11, 14, 3, '2023-03-07 04:56:24', '2023-03-07 04:56:24'),
(27, 11, 3, 1, '2023-03-07 04:56:24', '2023-03-07 04:56:24'),
(28, 12, 2, 2, '2023-03-07 04:56:49', '2023-03-07 04:56:49'),
(29, 12, 3, 1, '2023-03-07 04:56:49', '2023-03-07 04:56:49'),
(30, 13, 2, 3, '2023-03-07 04:57:50', '2023-03-07 04:57:50'),
(31, 13, 3, 1, '2023-03-07 04:57:50', '2023-03-07 04:57:50'),
(32, 13, 4, 1, '2023-03-07 04:57:50', '2023-03-07 04:57:50'),
(33, 14, 14, 1, '2023-03-07 05:02:27', '2023-03-07 05:02:27'),
(34, 14, 13, 1, '2023-03-07 05:02:27', '2023-03-07 05:02:27'),
(35, 14, 3, 1, '2023-03-07 05:02:27', '2023-03-07 05:02:27'),
(36, 14, 8, 1, '2023-03-07 05:02:27', '2023-03-07 05:02:27'),
(37, 15, 3, 3, '2023-03-07 05:03:33', '2023-03-07 05:03:33'),
(38, 16, 15, 4, '2023-03-07 05:04:00', '2023-03-07 05:04:00'),
(39, 16, 16, 1, '2023-03-07 05:04:00', '2023-03-07 05:04:00'),
(40, 17, 14, 2, '2023-03-07 05:04:32', '2023-03-07 05:04:32'),
(41, 18, 6, 2, '2023-03-07 05:05:21', '2023-03-07 05:05:21'),
(42, 18, 7, 1, '2023-03-07 05:05:21', '2023-03-07 05:05:21'),
(43, 18, 8, 1, '2023-03-07 05:05:21', '2023-03-07 05:05:21'),
(44, 19, 2, 1, '2023-03-07 15:12:22', '2023-03-07 15:12:22'),
(45, 19, 3, 2, '2023-03-07 15:12:22', '2023-03-07 15:12:22'),
(46, 19, 4, 2, '2023-03-07 15:12:22', '2023-03-07 15:12:22'),
(47, 20, 1, 1, '2023-03-11 08:26:10', '2023-03-11 08:26:10'),
(48, 20, 2, 2, '2023-03-11 08:26:10', '2023-03-11 08:26:10'),
(49, 21, 1, 2, '2023-03-12 03:12:56', '2023-03-12 03:12:56'),
(50, 21, 5, 1, '2023-03-12 03:12:56', '2023-03-12 03:12:56'),
(51, 21, 11, 1, '2023-03-12 03:12:56', '2023-03-12 03:12:56'),
(52, 21, 20, 2, '2023-03-12 03:12:56', '2023-03-12 03:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('0-small','1-large') NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `status`, `image`, `created_date`, `updated_date`) VALUES
(1, 1, 'Buger White', 2000, 'so delicious', '1-large', '6402ec94c0f43_fomproduct-1.jpg', '2023-03-04 07:00:36', '2023-03-04 07:00:36'),
(2, 1, 'Burger Black', 2000, 'so delicious', '1-large', '6402eca6a71d9_fomproduct-2.jpg', '2023-03-04 07:00:54', '2023-03-04 07:00:54'),
(3, 1, 'Potato French fries', 1500, 'so delicious', '1-large', '6402ecb9032c2_fomproduct-3.jpg', '2023-03-04 07:01:13', '2023-03-04 07:01:13'),
(4, 1, 'Chinese Noodle', 2000, 'so delicious', '1-large', '6402ed1e8edc0_fomproduct-4.jpg', '2023-03-04 07:02:54', '2023-03-04 07:02:54'),
(5, 1, 'Pizza', 2000, 'so delicious', '1-large', '6402ed43b31ae_fomproduct-5.jpg', '2023-03-04 07:03:31', '2023-03-04 07:03:31'),
(6, 1, 'Fried chicken', 5000, 'so delicious', '1-large', '6402ed76e3991_fomproduct-6.jpg', '2023-03-04 07:04:22', '2023-03-04 07:04:22'),
(7, 1, 'Mashed Corn', 2000, 'so delicious', '1-large', '6402ee5e59af6_fomproduct-7.jpg', '2023-03-04 07:08:14', '2023-03-04 07:08:14'),
(8, 1, 'Mashed Squid', 5000, 'so delicious', '1-large', '6402eebd2d1e2_fomproduct-8.jpg', '2023-03-04 07:09:49', '2023-03-04 07:09:49'),
(9, 1, 'Mashed Cuttlefish', 5500, 'so delicious', '1-large', '6402ef1a259b4_fomproduct-9.jpg', '2023-03-04 07:11:22', '2023-03-04 07:11:22'),
(10, 1, 'Mashed Octopus', 5500, 'so delicious', '1-large', '6402ef9025bb5_fomproduct-10.jpg', '2023-03-04 07:13:20', '2023-03-04 07:13:20'),
(11, 1, 'Mashed Seafood', 15000, 'so delicious', '1-large', '6402eff58ceea_fomproduct-11.jpg', '2023-03-04 07:15:01', '2023-03-04 07:15:01'),
(12, 1, 'Sandwiches', 2000, 'so delicious', '1-large', '6402f03abe6a5_fomproduct-12.jpg', '2023-03-04 07:16:10', '2023-03-04 07:16:10'),
(13, 2, 'Taro milk tea', 3500, 'so delicious', '1-large', '6402f08bb0975_fomproduct-13.jpg', '2023-03-04 07:17:31', '2023-03-04 07:17:31'),
(14, 2, 'Taiwan milk tea', 3500, 'so delicious', '1-large', '6402f0fe521bf_fomproduct-14.jpg', '2023-03-04 07:19:26', '2023-03-04 07:19:26'),
(15, 2, 'Kiwi milk tea', 3500, 'so delicious', '1-large', '6402f121e3586_fomproduct-15.jpg', '2023-03-04 07:20:01', '2023-03-04 07:20:01'),
(16, 2, 'Strawberry milk tea', 3500, 'so delicious', '1-large', '6402f14f0fbd1_fomproduct-16.jpg', '2023-03-04 07:20:47', '2023-03-04 07:20:47'),
(17, 2, 'Chocolate milk tea', 3500, 'so delicious', '1-large', '6402f1707542c_fomproduct-17.jpg', '2023-03-04 07:21:20', '2023-03-04 07:21:20'),
(18, 2, 'Mango milk tea', 3500, 'so delicious', '1-large', '6402f19566b42_fomproduct-18.jpg', '2023-03-04 07:21:57', '2023-03-04 07:21:57'),
(19, 2, 'Thai milk tea', 3500, 'so delicious', '1-large', '6402f1eeaa56c_fomproduct-19.jpg', '2023-03-04 07:23:26', '2023-03-04 07:23:26'),
(20, 2, 'Blueberry milk tea', 3500, 'so delicious', '1-large', '6402f229416f2_fomproduct-20.jpg', '2023-03-04 07:24:25', '2023-03-04 07:24:25'),
(21, 2, 'Brown sugar milk tea', 3500, 'so delicious', '1-large', '6402f2952643f_fomproduct-21.jpg', '2023-03-04 07:26:13', '2023-03-04 07:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_date`, `updated_date`) VALUES
(1, 'admin@gmail.com', '912ec803b2ce49e4a541068d495ab570', '2023-01-30 00:50:51', '2023-01-30 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_session_id` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `name`, `email`, `address`, `phone_number`, `password`, `user_session_id`, `created_date`, `updated_date`) VALUES
(1, 'Zin Lin Htet', 'zinlin@gmail.com', 'MDY', '09777888999', '912ec803b2ce49e4a541068d495ab570', 'p1oqkrg7e9spelq27ldmhurb4j', '2023-03-04 05:40:33', '2023-03-04 05:40:33'),
(2, 'userDefault', 'userdefault@gmail.com', 'Mandalay', '09793798369', '912ec803b2ce49e4a541068d495ab570', 'ljj7jasrjuv4kr3ks9952v6vt4', '2023-03-07 04:47:16', '2023-03-07 04:47:16'),
(3, 'Arkar Nyein', 'arkar@gmail.com', 'Mandalay', '09793998369', '912ec803b2ce49e4a541068d495ab570', 'ktteqtj8eecn5dp3bgjclpts2i', '2023-03-07 04:54:23', '2023-03-07 04:54:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `user_info_id` (`user_info_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_info` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_info_id`) REFERENCES `users_info` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
