-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2017 at 09:05 AM
-- Server version: 5.6.32
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush00`
--

-- --------------------------------------------------------

--
-- Table structure for table `rush_cart`
--

CREATE TABLE `rush_cart` (
  `cart_id` bigint(20) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_content` mediumblob NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rush_products`
--

CREATE TABLE `rush_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(512) NOT NULL,
  `product_short` varchar(2048) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `product_rating` tinyint(4) NOT NULL,
  `product_category` tinytext NOT NULL,
  `product_subcategory` tinytext NOT NULL,
  `product_stock` tinytext NOT NULL,
  `product_sold_amount` int(11) NOT NULL,
  `product_stock_status` int(11) NOT NULL,
  `product_images` varbinary(4096) NOT NULL,
  `product_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_showcase_img` text NOT NULL,
  `product_release` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rush_products`
--

INSERT INTO `rush_products` (`product_id`, `product_name`, `product_short`, `product_description`, `product_price`, `product_rating`, `product_category`, `product_subcategory`, `product_stock`, `product_sold_amount`, `product_stock_status`, `product_images`, `product_added`, `product_showcase_img`, `product_release`) VALUES
(1, 'Black Coffee - Pieces Of Me', 'CD/DVD', '', 120, 0, '0', '', '200', 0, 0, '', '2017-10-08 14:30:58', '/imgs/BlackCoffeeAlbum.jpg', 'Released 2016');

-- --------------------------------------------------------

--
-- Table structure for table `rush_users`
--

CREATE TABLE `rush_users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_type` text NOT NULL,
  `user_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rush_users`
--

INSERT INTO `rush_users` (`user_id`, `user_firstname`, `user_lastname`, `user_name`, `user_email`, `user_password`, `user_type`, `user_since`) VALUES
(2, 'Richard', 'de Ponte', 'Bridge', 'richard7deponte@gmail.com', '$2y$10$U0NHimHFwYjeahjGbH53KePNT9p/g/sBPIfC7./z14ZdNKE1awLGO', 'consumer', '0000-00-00 00:00:00'),
(3, 'Generic', 'Name', 'genericname', 'generic@name.com', '$2y$10$DiUtUPRxnhslgVxqVProYezELV.xzEyrYt0xLDVE0tu7wGoTbuUxu', 'consumer', '0000-00-00 00:00:00'),
(4, 'apple', 'Microsoft', 'appsoft', 'apple@microsoft.com', '$2y$10$JOmdWY7dTcWriwhS2d6k7.7/I/7jFAhyk51zgmEjLF1AV/WTGz0Iy', 'consumer', '0000-00-00 00:00:00'),
(5, 'testing', 'time', 'testing_time', 'testing@time.com', '$2y$10$dv2NkdlgIN/VEpiEYUyV6.2P8QX5aGwH2G9EYSg8OUsJjTpTLA3T6', 'consumer', '0000-00-00 00:00:00'),
(6, 'one', 'more', 'one_more', 'one@more.com', '$2y$10$LE0v3YKjL7o3QakjW7yXief8dKOAetBbLawwk80lk/56isgiJ0QPq', 'consumer', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rush_cart`
--
ALTER TABLE `rush_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id` (`cart_user_id`) USING BTREE;

--
-- Indexes for table `rush_products`
--
ALTER TABLE `rush_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rush_users`
--
ALTER TABLE `rush_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`(255)),
  ADD UNIQUE KEY `user_email` (`user_email`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rush_cart`
--
ALTER TABLE `rush_cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rush_products`
--
ALTER TABLE `rush_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rush_users`
--
ALTER TABLE `rush_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rush_cart`
--
ALTER TABLE `rush_cart`
  ADD CONSTRAINT `user_cart_link` FOREIGN KEY (`cart_user_id`) REFERENCES `rush_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
