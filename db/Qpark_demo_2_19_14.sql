-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2014 at 08:38 PM
-- Server version: 5.6.15
-- PHP Version: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Qpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authentication`
--

CREATE TABLE IF NOT EXISTS `Authentication` (
  `Authentication_usernameid` int(11) NOT NULL,
  `Authentication_password` varchar(128) NOT NULL,
  `Authentication_username` varchar(100) NOT NULL,
  PRIMARY KEY (`Authentication_usernameid`),
  UNIQUE KEY `Authentication_usernameid_2` (`Authentication_usernameid`),
  KEY `Authentication_usernameid` (`Authentication_usernameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Authentication`
--

INSERT INTO `Authentication` (`Authentication_usernameid`, `Authentication_password`, `Authentication_username`) VALUES
(1, 'test', 'test'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Park`
--

CREATE TABLE IF NOT EXISTS `Park` (
  `park_id` int(11) NOT NULL AUTO_INCREMENT,
  `park_date` date NOT NULL,
  `park_time` datetime NOT NULL,
  `park_garage` varchar(25) CHARACTER SET utf8 NOT NULL,
  `park_duration` time NOT NULL,
  `park_price` float NOT NULL,
  `park_status` tinyint(1) NOT NULL,
  `park_time_remaining` time NOT NULL,
  `park_vehicleid` int(11) NOT NULL,
  PRIMARY KEY (`park_id`),
  KEY `park_vehicleid` (`park_vehicleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Park`
--

INSERT INTO `Park` (`park_id`, `park_date`, `park_time`, `park_garage`, `park_duration`, `park_price`, `park_status`, `park_time_remaining`, `park_vehicleid`) VALUES
(1, '2014-02-19', '2014-02-19 09:00:00', 'garage', '01:00:00', 10, 1, '00:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `permission_permissionid` int(11) NOT NULL,
  `permission_name` varchar(45) NOT NULL,
  `persmission_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`permission_permissionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE IF NOT EXISTS `Ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_date` date NOT NULL,
  `ticket_time` time NOT NULL,
  `ticket_price` varchar(45) CHARACTER SET utf8 NOT NULL,
  `ticket_violation` int(5) NOT NULL,
  `ticket_notes` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ticket_employee_id` int(11) NOT NULL,
  `ticket_parkid` int(11) NOT NULL,
  `ticket_isactive` tinyint(4) NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `ticket_parkid` (`ticket_parkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`ticket_id`, `ticket_date`, `ticket_time`, `ticket_price`, `ticket_violation`, `ticket_notes`, `ticket_employee_id`, `ticket_parkid`, `ticket_isactive`) VALUES
(1, '2014-02-19', '09:00:00', '5.00', 15, 'iuiuh;uh;ubfds', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `user_id` int(11) NOT NULL,
  `user_firstnameid` varchar(45) NOT NULL,
  `user_lastname` varchar(45) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_permission` int(11) NOT NULL,
  `user_pawprint` varchar(10) DEFAULT NULL,
  `user_isactive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `user_firstnameid`, `user_lastname`, `user_email`, `user_permission`, `user_pawprint`, `user_isactive`) VALUES
(1, 'test', 'tets1', 'test@mail.com', 1, 'rdtg6', 1),
(2, 'ricky', 'deh', 'test1@mail', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE IF NOT EXISTS `Vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_make` varchar(25) CHARACTER SET utf8 NOT NULL,
  `vehicle_model` varchar(25) CHARACTER SET utf8 NOT NULL,
  `vehicle_year` varchar(4) CHARACTER SET utf8 NOT NULL,
  `vehicle_plate` varchar(7) CHARACTER SET utf8 NOT NULL,
  `vehicle_color` varchar(25) CHARACTER SET utf8 NOT NULL,
  `vehicle_state` varchar(25) CHARACTER SET utf8 NOT NULL,
  `vehicle_userid` int(11) NOT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `vehicle_userid` (`vehicle_userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Vehicle`
--

INSERT INTO `Vehicle` (`vehicle_id`, `vehicle_make`, `vehicle_model`, `vehicle_year`, `vehicle_plate`, `vehicle_color`, `vehicle_state`, `vehicle_userid`) VALUES
(1, 'make', 'model', 'year', 'r243r2', 'brown', 'MO', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Authentication`
--
ALTER TABLE `Authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`Authentication_usernameid`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Park`
--
ALTER TABLE `Park`
  ADD CONSTRAINT `vehicleid` FOREIGN KEY (`park_vehicleid`) REFERENCES `Vehicle` (`vehicle_id`);

--
-- Constraints for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `park_id` FOREIGN KEY (`ticket_parkid`) REFERENCES `Park` (`park_id`);

--
-- Constraints for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD CONSTRAINT `userid` FOREIGN KEY (`vehicle_userid`) REFERENCES `User` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
