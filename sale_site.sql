-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 08:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quentity` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`, `visible`) VALUES
(1, ' Electronics', 1),
(2, 'Vehicles', 1),
(3, 'Lands', 1),
(4, 'Furnitures', 1),
(5, 'Kids Toys', 1),
(6, 'Wears', 1),
(7, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `insert_product`
--

CREATE TABLE `insert_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_categorie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insert_product`
--

INSERT INTO `insert_product` (`product_id`, `product_name`, `product_price`, `product_categorie`, `product_comment`, `product_img`, `views`, `visible`, `date`) VALUES
(1, 'Apple 6S', 26000, '1', 'Brand new\r\nwarrenty', 'iphone.jpg', 0, 0, ''),
(2, 'Samsung S5', 17500, '1', 'Brand new\r\nPink color', 'samsung phoe.jpg', 0, 0, ''),
(3, 'Ring', 350, '6', 'Couple', 'ring.jpg', 0, 0, ''),
(4, 'Shows', 3500, '6', 'Branded', 'shoes.jpeg', 0, 0, ''),
(5, 'Cap', 750, '6', 'White', 'cap.jpg', 0, 0, ''),
(6, 'Camera', 13000, '1', 'Canon  Brand new\r\n1 year warrenty\r\n', 'camera.jpg', 0, 0, ''),
(7, 'flowers', 2560, '7', 'Booganwila', 'pro-big-4.jpg', 0, 0, ''),
(8, 'iMac', 180000, '1', 'Brand new\r\n1 year Company Warrenty\r\n2 year  Service Warrenty\r\nWhite color\r\nAir', 'macbook.jpg', 0, 0, ''),
(9, 'ipod', 1900, '1', 'apple', 'apple-earpod.jpg', 0, 0, ''),
(10, 'Dugati', 8950000, '2', 'Wow sexy car amozon', 'ford_mustang.jpg', 0, 0, ''),
(12, 'Chair', 4800, '4', 'Kos wood\r\ncan exchange it\r\nhave some warrenty', 'chair.jpg', 0, 0, ''),
(13, 'Doll', 1000, '5', '  Barbidool\r\nPink color\r\nBlue color', 'Doll.jpg', 0, 0, 'March 25, 2020'),
(14, 'Lamp', 3500, '1', '   25V lamp\r\n5 A\r\nHAve Casing', 'product6.jpg', 0, 0, 'March 25, 2020'),
(16, 'Toy Car', 3900, '5', '  Red color\r\n1 year warrenty\r\n', 'Toycar.jpg', 0, 0, 'March 25, 2020'),
(17, 'Guitar', 17000, '1', '  Electric Guitar\r\n2 year service Warrenty', 'guitar.jpg', 0, 0, 'March 25, 2020'),
(18, 'Dugati Bycke', 985000, '2', '  Red color\r\ndugati\r\nBrand new', 'ducati.png', 0, 0, 'March 25, 2020'),
(19, 'Gun', 11500, '7', '    Pistol and sniper\r\nbrandnew\r\nlicence', 'gun.jpg', 0, 0, 'March 25, 2020'),
(32, 'Sword', 15000, '7', 'ex', 'samurai-sword.jpg', 0, 1, ''),
(33, 'Nunchak', 900, '7', 'ex', 'Nunchaku_(Parts).jpg', 0, 1, ''),
(34, 'Chain Wip', 1350, '7', 'Wushu Wepon', 'chiljin.01.jpg', 0, 1, ''),
(35, 'Blade Out', 1750, '7', '  Ninja Wepon', '000026_bladeout.jpg', 0, 1, 'March 26, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fristname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `ip_address`, `fristname`, `lastname`, `email`, `country`, `user_address`, `city`, `zip_code`, `phone_number`, `comment`, `password`, `image`, `role`, `visible`) VALUES
(6, '::1', 'Kaushalya jayasingha', 'Udani', 'Kaushalyaud100@gmail.com', 'slk', '7th street Ambagasdowa', 'Weliada', '10400', '0710590586', 'hiiii', '19201fb6f23b3f6718321bef58a08a3a', 'jj.jpg', 'guest', 1),
(7, '::1', 'Dimuthu', 'Lakshan', 'dimuthulakshan2012@gmail.com', 'slk', '1A 1/1 School Lane', 'Piliyandala Colombo', '10300', '0710590591', 'Fuck in days now..........', '141308be2d389d8e2fd51f1839e9d872', 'IMG_20200228_120439.jpg', 'admin', 1),
(10, '::1', 'kamal', 'kumara', 'kamal@gmail.com', 'slk', '1A 1/1 School Lane', 'Piliyandala Colombo', '10300', '0710590591', 'hiiiii', 'b59c67bf196a4758191e42f76670ceba', 'IMG_20200228_070504.jpg', 'guest', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `insert_product`
--
ALTER TABLE `insert_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `insert_product`
--
ALTER TABLE `insert_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
