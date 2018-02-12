-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:06 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs2102`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `airline_code` varchar(3) NOT NULL,
  `name` varchar(64) NOT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`airline_code`, `name`, `logo`) VALUES
('9W', 'Jet Airways', 'some logo');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `flight_id` varchar(16) NOT NULL,
  `departure_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `user_email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_passenger`
--

CREATE TABLE `booking_passenger` (
  `flight_id` varchar(16) NOT NULL,
  `departure_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `passport` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cheapest_flights`
-- (See below for the actual view)
--
CREATE TABLE `cheapest_flights` (
`flight_id` varchar(16)
,`departure` varchar(64)
,`arrival` varchar(64)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` varchar(16) NOT NULL,
  `departure` varchar(64) NOT NULL,
  `arrival` varchar(64) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `passenger_limit` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `status_changed_by` varchar(64) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `airline_code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `departure`, `arrival`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `passenger_limit`, `status`, `status_changed_by`, `price`, `airline_code`) VALUES
('9W343', 'Mumbai', 'Singapore', '2015-05-10', '0000-00-00', '00:20:15', '10:00:00', 200, 'ON TIME', 'anand@something.com', 400, '9W');

-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_flights`
-- (See below for the actual view)
--
CREATE TABLE `latest_flights` (
`flight_id` varchar(16)
,`departure` varchar(64)
,`arrival` varchar(64)
,`price` int(11)
,`departure_date` date
,`departure_time` time
);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `self` char(1) NOT NULL,
  `user_email` varchar(64) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `passport` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `diet` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_user`
--

CREATE TABLE `website_user` (
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `auth_token` varchar(64) NOT NULL,
  `is_admin` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_user`
--

INSERT INTO `website_user` (`email`, `password`, `auth_token`, `is_admin`) VALUES
('anand@something.com', 'password', 'token', '1'),
('habeex@gmail.com', 'habeex11', 'token', '0');

-- --------------------------------------------------------

--
-- Structure for view `cheapest_flights`
--
DROP TABLE IF EXISTS `cheapest_flights`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cheapest_flights`  AS  select `flight`.`flight_id` AS `flight_id`,`flight`.`departure` AS `departure`,`flight`.`arrival` AS `arrival`,`flight`.`price` AS `price` from `flight` order by `flight`.`price` limit 3 ;

-- --------------------------------------------------------

--
-- Structure for view `latest_flights`
--
DROP TABLE IF EXISTS `latest_flights`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_flights`  AS  select `flight`.`flight_id` AS `flight_id`,`flight`.`departure` AS `departure`,`flight`.`arrival` AS `arrival`,`flight`.`price` AS `price`,`flight`.`departure_date` AS `departure_date`,`flight`.`departure_time` AS `departure_time` from `flight` order by `flight`.`departure_date` desc,`flight`.`departure_time` desc limit 3 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`airline_code`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`flight_id`,`departure_date`,`user_email`,`booking_time`);

--
-- Indexes for table `booking_passenger`
--
ALTER TABLE `booking_passenger`
  ADD PRIMARY KEY (`flight_id`,`departure_date`,`user_email`,`booking_time`,`passport`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`,`departure_date`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passport`);

--
-- Indexes for table `website_user`
--
ALTER TABLE `website_user`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`flight_id`,`departure_date`) REFERENCES `flight` (`flight_id`, `departure_date`);

--
-- Constraints for table `booking_passenger`
--
ALTER TABLE `booking_passenger`
  ADD CONSTRAINT `booking_passenger_ibfk_1` FOREIGN KEY (`flight_id`,`departure_date`) REFERENCES `flight` (`flight_id`, `departure_date`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
