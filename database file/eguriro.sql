-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2020 at 05:40 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eguriro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(250) NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_lname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_username`, `user_fname`, `user_lname`, `password`) VALUES
(1, 'regis', 'Imuduhe', 'Regis', 'regis');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(250) NOT NULL AUTO_INCREMENT,
  `client_unique` text NOT NULL,
  `client_fname` varchar(250) NOT NULL,
  `client_lname` varchar(250) NOT NULL,
  `client_phone` varchar(250) NOT NULL,
  `client_password` varchar(250) NOT NULL,
  `client_email` varchar(250) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_unique`, `client_fname`, `client_lname`, `client_phone`, `client_password`, `client_email`) VALUES
(4, '396705398e94d0e1b771dbe1258e7b71', 'Regis', 'Safari', '0786115058', 'b6534c68384f205707a8639d4cd9379399457bf2', 'regissaffi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `discount_id` int(250) NOT NULL AUTO_INCREMENT,
  `product_id` int(250) NOT NULL,
  `discount_price` int(250) NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `product_id`, `discount_price`, `end_date`) VALUES
(1, 1, 20, '2020-01-15'),
(2, 4, 10, '2020-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(250) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `client_id` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(250) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `product_description` text NOT NULL,
  `price` int(250) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `quantity`, `product_description`, `price`) VALUES
(1, 'Women Luxury Waterproof Bracelet Watch', 2, 'No description', 300),
(2, 'Microsoft Surface Go 8GB RAM, 128GB', 7, 'No description', 90),
(3, '3D wall LED modern digital clock', 9, 'No description', 80),
(4, 'Security biometric fingerprint smart lock', 8, 'No description', 40),
(5, 'Quantum Lamp Led Modular Touch Sensor', 20, 'No description', 70);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_image_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_image` text NOT NULL,
  `product_id` int(250) NOT NULL,
  PRIMARY KEY (`product_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_image`, `product_id`) VALUES
(1, 'images/product-1.png', 1),
(2, 'images/product-2.png', 2),
(3, 'images/product-3.jpg', 3),
(4, 'images/product-3.png', 4),
(5, 'images/product-4.jpg', 5),
(6, 'images/product-5.png', 5),
(7, 'images/product-6.png', 3),
(8, 'images/product-7.png', 1),
(9, 'images/product-8.png', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
