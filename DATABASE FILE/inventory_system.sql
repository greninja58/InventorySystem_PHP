
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Groceries'),
(2, 'Fresh Produce'),
(3, 'Dairy and Eggs'),
(4, 'Frozen Foods'),
(5, 'Bakery'),
(6, 'Household Items'),
(7, 'Personal Care');


-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) unsigned NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--
INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `date`) VALUES
(1, 'Sugar - 5 lb bag', 50, 2.99, 4.99, 1, '2023-11-08 08:30:00'),
(2, 'Flour - All-Purpose', 40, 1.99, 3.99, 1, '2023-11-10 09:15:00'),
(3, 'Rice - Long Grain', 60, 3.50, 6.99, 1, '2023-11-12 10:00:00'),
(4, 'Pasta - Spaghetti', 80, 1.00, 2.49, 1, '2023-11-14 11:45:00'),
(5, 'Canned Tomatoes', 70, 0.99, 1.99, 1, '2023-11-15 13:30:00'),
(6, 'Cooking Oil - Vegetable', 30, 4.99, 7.99, 1, '2023-11-08 08:30:00'),
(7, 'Coffee - Ground', 50, 6.99, 12.99, 1, '2023-11-10 09:15:00'),
(8, 'Apples - Gala (per lb)', 100, 1.49, 2.49, 2, '2023-11-12 10:00:00'),
(9, 'Bananas (per lb)', 80, 0.69, 1.29, 2, '2023-11-14 11:45:00'),
(10, 'Carrots (per lb)', 60, 0.79, 1.49, 2, '2023-11-15 13:30:00'),
(11, 'Spinach - Fresh Bunch', 40, 1.99, 3.99, 2, '2023-11-08 08:30:00'),
(12, 'Tomatoes - Vine-Ripened (per lb)', 70, 2.49, 3.99, 2, '2023-11-10 09:15:00'),
(13, 'Broccoli - Fresh Bundle', 50, 1.79, 2.99, 2, '2023-11-12 10:00:00'),
(14, 'Milk - Whole Gallon', 30, 2.99, 4.49, 3, '2023-11-14 11:45:00'),
(15, 'Eggs - Large (dozen)', 50, 1.99, 3.29, 3, '2023-11-15 13:30:00'),
(16, 'Butter - Unsalted (1 lb)', 20, 3.49, 5.99, 3, '2023-11-08 08:30:00'),
(17, 'Cheddar Cheese - Block (8 oz)', 40, 2.79, 4.99, 3, '2023-11-10 09:15:00'),
(18, 'Greek Yogurt - Plain (32 oz)', 25, 3.99, 6.49, 3, '2023-11-12 10:00:00'),
(19, 'Cream Cheese (8 oz)', 30, 1.89, 3.29, 3, '2023-11-14 11:45:00'),
(20, 'Frozen Pizza - Margherita', 15, 4.99, 8.99, 4, '2023-11-15 13:30:00'),
(21, 'Chicken Nuggets (2 lbs)', 25, 6.49, 10.99, 4, '2023-11-08 08:30:00'),
(22, 'Frozen Vegetables Mix (16 oz)', 35, 2.79, 4.49, 4, '2023-11-10 09:15:00'),
(23, 'Ice Cream - Vanilla (1.5 qt)', 20, 3.99, 6.99, 4, '2023-11-12 10:00:00'),
(24, 'French Baguette', 50, 1.99, 3.49, 5, '2023-11-14 11:45:00'),
(25, 'Chocolate Chip Cookies (Dozen)', 40, 4.49, 7.99, 5, '2023-11-15 13:30:00'),
(26, 'Cinnamon Rolls (6-pack)', 30, 5.99, 10.99, 5, '2023-11-08 08:30:00'),
(27, 'Croissants (4-pack)', 25, 6.79, 12.99, 5, '2023-11-10 09:15:00'),
(28, 'Cheese Danish (8-pack)', 20, 7.49, 13.99, 5, '2023-11-12 10:00:00'),
(29, 'Paper Towels (12 rolls)', 50, 14.99, 24.99, 6, '2023-11-14 11:45:00'),
(30, 'Toilet Paper (24 rolls)', 40, 18.99, 29.99, 6, '2023-11-15 13:30:00'),
(31, 'Laundry Detergent (1 gallon)', 30, 9.99, 15.99, 6, '2023-11-08 08:30:00'),
(32, 'Dish Soap (3-pack)', 25, 5.49, 9.99, 6, '2023-11-10 09:15:00'),
(33, 'Trash Bags - Large (50 count)', 20, 12.99, 19.99, 6, '2023-11-12 10:00:00'),
(34, 'Shampoo (16 oz)', 50, 6.99, 11.99, 7, '2023-11-14 11:45:00'),
(35, 'Conditioner (16 oz)', 40, 7.49, 12.99, 7, '2023-11-15 13:30:00'),
(36, 'Toothpaste (Pack of 3)', 30, 8.99, 14.99, 7, '2023-11-08 08:30:00'),
(37, 'Body Wash (20 oz)', 25, 5.99, 10.99, 7, '2023-11-10 09:15:00'),
(38, 'Hand Sanitizer (8 oz)', 20, 3.99, 7.99, 7, '2023-11-12 10:00:00');




-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(1, 1, 3, '1500.00', '2023-11-15 14:00:00'),
(2, 3, 5, '25.00', '2023-11-15 15:00:00'),
(3, 10, 8, '2500.00', '2023-11-15 16:00:00'),
(4, 6, 3, '1250.00', '2023-11-15 17:00:00'),
(5, 12, 6, '75.00', '2023-11-15 18:00:00'),
(6, 13, 25, '499.00', '2023-11-15 19:00:00'),
(7, 7, 7, '49.00', '2023-11-15 17:45:00'),
(8, 9, 3, '165.00', '2023-11-15 18:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `last_login`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.png', '2023-05-15 08:30:00'),
(2, 'Parth', 'sup', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', '2023-05-16 09:15:00'),
(3, 'Ravi', 'emp', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', '2023-05-18 10:00:00');



-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`) VALUES
(1, 'Admin', 1),
(2, 'employee', 2),
(3, 'supplier', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `media`
--
-- ALTER TABLE `media`
--  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `media`
-- --
-- ALTER TABLE `media`
-- MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;