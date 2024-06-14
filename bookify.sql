-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2024 at 10:12 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookify`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(0, 3, '', 0, 1, ''),
(0, 3, 'Harry Potter and The Order Of The Phoenix', 200, 6, '17book.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `number`, `email`, `message`) VALUES
(0, 1, 'PARNIKA', '9899100870', 'parnika155@gmail.com', 'Nice to Visit your website');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_products` varchar(50) NOT NULL,
  `total_price` int NOT NULL,
  `place_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `place_on`, `payment_status`) VALUES
(1, 1, 'PARNIKA', '09870123451', 'parnika155@gmail.com', 'cash on delivery', 'flat no. 1, Gurugram, Gurugram, India - 122017', ', The Perfect Us (1) , Harry Potter and The Goblet', 600, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(20, 'The Perfect Us', 250, '2book.jpg'),
(21, 'Five Feet Apart', 180, '1book.jpg'),
(22, 'Harry Potter and The Half-Blood Prince', 300, '18book.jpg'),
(23, 'Harry Potter and The Order Of The Phoenix', 200, '17book.jpg'),
(24, 'Harry Potter and The Goblet Of Fire', 200, '16book.jpg'),
(25, 'Harry Potter and The Prizoner Of Azkaban', 200, '15book.jpg'),
(26, 'Harry Potter and The Chamber Of Secrets', 200, '14book.jpg'),
(27, 'Harry Potter and The Philosophers Stone', 200, '13book.jpg'),
(28, 'The Alchemist', 225, '20book.jpg'),
(29, 'Ikigai', 200, '3book.jpg'),
(30, 'Atomic Habits', 200, '4book.jpg'),
(31, 'The Power Of Your Subconscious Mind', 250, '5book.jpg'),
(32, 'The Lord Of The Rings: The Fellowship Of The Ring', 200, '6book.jpg'),
(33, 'The Lord Of The Rings: The Two Towers', 200, '7book.jpg'),
(34, 'The Lord Of The Rings: The Return Of The King', 200, '8book.jpg'),
(35, 'The Notebook', 200, '9book.jpg'),
(39, 'Think Like A Monk', 240, '12book.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'PARNIKA', 'parnika155@gmail.com', 'abc123', 'user'),
(2, 'admin01', 'admin01@gmail.com', 'admin', 'admin'),
(3, 'Anuj Sharma', 'anujsharma@gmail.com', '123', 'user'),
(4, 'Saina', 'saina454@gmail.com', '123456', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
