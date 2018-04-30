-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 10:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `salary` int(12) NOT NULL,
  `tel` text NOT NULL,
  `dismissed` tinyint(1) NOT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `salary`, `tel`, `dismissed`, `position`) VALUES
('001', 'Yiu Chi', 'Lai', 15000, '29488888', 0, 'Chef');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` varchar(3) NOT NULL,
  `zone_id` varchar(1) NOT NULL,
  `name` text NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `zone_id`, `name`, `quantity`, `price`) VALUES
('A01', 'A', 'BBQ Pork', -9, 25),
('B01', 'B', 'Kung Pao Chicken', -23, 22),
('B02', 'B', 'Poached Sliced Beef in Hot Chili Oil', 6, 40),
('C01', 'C', 'Chicken with curry source', 1, 22),
('C02', 'C', 'Instant Noodles with hams and beef', 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` varchar(12) NOT NULL,
  `name` text NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manage_item`
--

CREATE TABLE `manage_item` (
  `employee_id` varchar(10) NOT NULL,
  `item_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(12) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `employee_id`, `date`, `finished`) VALUES
('201804300002', '001', '2018-04-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_record`
--

CREATE TABLE `orders_record` (
  `food_id` varchar(3) NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `quantity` int(3) NOT NULL,
  `order_date` datetime NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_record`
--

INSERT INTO `orders_record` (`food_id`, `order_id`, `quantity`, `order_date`, `finished`) VALUES
('A01', '201804300002', 1, '2018-04-30 16:06:06', 0),
('B01', '201804300002', 2, '2018-04-30 16:06:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `turnover`
--

CREATE TABLE `turnover` (
  `zone_id` varchar(1) NOT NULL,
  `turnover` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turnover`
--

INSERT INTO `turnover` (`zone_id`, `turnover`) VALUES
('A', 0),
('B', 0),
('C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` char(255) CHARACTER SET utf8 NOT NULL,
  `password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `password`) VALUES
('Jack', 311520);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` varchar(1) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `name`) VALUES
('A', 'BBQ - 燒味'),
('B', 'Chinese Food - 中餐'),
('C', 'Western Food - 西餐');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_item`
--
ALTER TABLE `manage_item`
  ADD PRIMARY KEY (`employee_id`,`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `orders_record`
--
ALTER TABLE `orders_record`
  ADD PRIMARY KEY (`food_id`,`order_id`);

--
-- Indexes for table `turnover`
--
ALTER TABLE `turnover`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
