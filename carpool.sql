-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 03:26 AM
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
-- Database: `carpool`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `booking_history` (IN `user` VARCHAR(255))  BEGIN
select * FROM booking_history where passenger_id = (SELECT id from user where username = user);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ad_details`
--

CREATE TABLE `ad_details` (
  `ad_id` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `phno` varchar(10) NOT NULL,
  `open_for_booking` char(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_details`
--

INSERT INTO `ad_details` (`ad_id`, `id`, `post_time`, `phno`, `open_for_booking`) VALUES
(67, 45, '2019-11-29 11:01:35', '8796541235', 'y'),
(68, 46, '2019-11-29 11:03:41', '7896541230', 'y'),
(69, 47, '2019-11-29 11:06:18', '7896541235', 'y'),
(70, 48, '2019-11-29 11:08:16', '9654871230', 'y'),
(71, 49, '2019-11-29 11:09:46', '7896541237', 'y'),
(72, 50, '2019-11-29 11:12:02', '6587941234', 'y'),
(73, 51, '2019-11-29 11:15:25', '7865491230', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `booking_history`
--

CREATE TABLE `booking_history` (
  `ad_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `book_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE `passenger_details` (
  `ad_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `book_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `passenger_details`
--
DELIMITER $$
CREATE TRIGGER `close_booking` AFTER INSERT ON `passenger_details` FOR EACH ROW UPDATE ad_details set open_for_booking='n' where ad_id = NEW.ad_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE `route_details` (
  `ad_id` int(10) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `departure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`ad_id`, `origin`, `destination`, `departure_time`) VALUES
(67, 'DSATM', 'Banashankari', '2019-11-12 14:00:00'),
(68, 'Trinity', 'RV Road', '2019-11-30 06:00:00'),
(69, 'Jayanagar', 'Lalbagh', '2019-12-21 09:00:00'),
(70, 'Lalbagh', 'DSATM', '2019-12-12 15:00:00'),
(71, 'DSATM', 'Ulsoor', '2019-02-11 06:00:00'),
(72, 'DSATM', 'MG Road', '2019-12-12 13:00:00'),
(73, 'Nice Road', 'JP Nagar ', '2019-12-31 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`) VALUES
(45, 'rohan', 'Rohan Purandhar', 'aaa'),
(46, 'carl', 'Carl Johnson', 'aaa'),
(47, 'john', 'John Doe', 'aaa'),
(48, 'mary', 'Mary Jane', 'aaa'),
(49, 'peter', 'Peter Parker', 'aaa'),
(50, 'tony', 'Tony Stark', 'aaa'),
(51, 'lisa', 'Lisa Carter', 'aaa'),
(52, 'jack', 'Jack Anderson', 'aaa'),
(53, 'soumita', 'Soumita Das', 'aaa'),
(54, 'sheldon', 'Sheldon Green', 'aaa'),
(55, 'robert', 'Robert Green', 'aaa'),
(56, 'michael', 'Michael Jackson', 'aaa'),
(57, 'anna', 'Anna James', 'aaa'),
(58, 'pooja', 'Pooja K', 'aaa'),
(61, 'yash', 'Yash', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `ad_id` int(10) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `seats` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`ad_id`, `vehicle_type`, `vehicle_name`, `vehicle_no`, `seats`) VALUES
(67, 'Bike', 'KTM RC', 'KA02 3322', 1),
(68, 'Car', 'Verna', 'KA02 4325', 2),
(69, 'Car', 'i10', 'kA11 6548', 2),
(70, 'Car', 'Tiago', 'KA02 4325', 2),
(71, 'Bike', 'Royal Enfield', 'KA02 4325', 1),
(72, 'Car', 'Swift Dezire', 'KA02 4325', 2),
(73, 'Car', 'Innova', 'KA02 3322', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_details`
--
ALTER TABLE `ad_details`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `booking_history`
--
ALTER TABLE `booking_history`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `passenger_details`
--
ALTER TABLE `passenger_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `route_details`
--
ALTER TABLE `route_details`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`ad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_details`
--
ALTER TABLE `ad_details`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `booking_history`
--
ALTER TABLE `booking_history`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_details`
--
ALTER TABLE `ad_details`
  ADD CONSTRAINT `ad_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_history`
--
ALTER TABLE `booking_history`
  ADD CONSTRAINT `booking_history_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad_details` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_history_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_history_ibfk_3` FOREIGN KEY (`passenger_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passenger_details`
--
ALTER TABLE `passenger_details`
  ADD CONSTRAINT `passenger_details_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad_details` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passenger_details_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `route_details`
--
ALTER TABLE `route_details`
  ADD CONSTRAINT `route_details_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad_details` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD CONSTRAINT `vehicle_details_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad_details` (`ad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
