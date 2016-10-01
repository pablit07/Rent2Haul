-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2014 at 01:47 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joydeep_ufirst_moving`
--

-- --------------------------------------------------------

--
-- Table structure for table `ufirst_page_name`
--

CREATE TABLE IF NOT EXISTS `ufirst_page_name` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ufirst_page_name`
--

INSERT INTO `ufirst_page_name` (`pages_id`, `page_name`) VALUES
(1, 'About-Us'),
(2, 'FAQ'),
(3, 'THE BEST PROFESSIONAL SERVICES'),
(4, 'Delivery Requirements & Regulations'),
(5, 'LTL FREIGHT WHAT IS LTL'),
(6, 'Welcome to Freedom Trailers! / Inventory.'),
(7, 'DUMP TRAILERS'),
(8, 'ENCLOSED CAR TRAILERS'),
(9, 'ENCLOSED CARGO TRAILERS double door models'),
(10, 'ENCLOSED CARGO TRAILERS ramp door models'),
(11, 'Equipment Trailers'),
(12, 'Open Car Trailers'),
(13, 'TOYHAULERS'),
(14, 'TRAILER, MOTORCYCLE & GARAGE PARTS & ACCESSOR'),
(15, 'VENDING AND CONCESSION TRAILERS');
