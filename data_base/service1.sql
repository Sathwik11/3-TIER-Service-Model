-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2015 at 06:47 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `service1`
--

-- --------------------------------------------------------

--
-- Table structure for table `io`
--

CREATE TABLE IF NOT EXISTS `io` (
  `io_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_count` int(11) NOT NULL DEFAULT '0',
  `ip_types` varchar(1000) DEFAULT NULL,
  `op_count` int(11) NOT NULL DEFAULT '0',
  `op_types` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`io_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `io`
--

INSERT INTO `io` (`io_id`, `ip_count`, `ip_types`, `op_count`, `op_types`) VALUES
(1, 2, 'int,int', 1, 'int'),
(2, 3, 'int,int,int', 1, 'int'),
(3, 4, 'int,int,int,int', 1, 'int'),
(4, 2, 'int,int', 1, 'int'),
(5, 3, 'int,int,int', 1, 'int'),
(25, 3, 'int,int,int', 1, 'int'),
(27, 5, 'int,int,int,int,int', 1, 'int'),
(28, 1, 'float', 1, 'float'),
(29, 1, 'float', 1, 'float'),
(30, 1, 'float', 1, 'float'),
(31, 1, 'float', 1, 'float'),
(32, 1, 'float', 1, 'float');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `add_wsdl` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `sname`, `type`, `add_wsdl`) VALUES
(1, 'add2', 0, 'http://localhost/providingservice/UDDI/add2.wsdl'),
(2, 'add3', 0, 'http://localhost/providingservice/UDDI/add3.wsdl'),
(3, 'add4', 0, 'http://localhost/providingservice/UDDI/add4.wsdl'),
(4, 'mul2', 0, 'http://localhost/providingservice/UDDI/mul2.wsdl'),
(5, 'mul3', 0, 'http://localhost/providingservice/UDDI/mul3.wsdl'),
(25, 'add5', 1, 'http://localhost/providingservice/UDDI/add5.wsdl'),
(27, 'mul5', 1, 'http://localhost/providingservice/UDDI/mul5.wsdl'),
(28, 'rupee_dollar_converter', 0, 'http://localhost/providingservice/UDDI/rupee_dollar_converter.wsdl'),
(29, 'farenheat_celcius_converter', 0, 'http://localhost/providingservice/UDDI/farenheat_celcius_converter.wsdl'),
(30, 'celcius_farenheat_converter', 0, 'http://localhost/providingservice/UDDI/celcius_farenheat_converter.wsdl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
