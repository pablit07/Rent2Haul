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
-- Table structure for table `ufirst_meta_general`
--

CREATE TABLE IF NOT EXISTS `ufirst_meta_general` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_page_title` varchar(255) NOT NULL,
  `meta_tag` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `page_id` int(11) NOT NULL,
  `meta_date` datetime NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ufirst_meta_general`
--

INSERT INTO `ufirst_meta_general` (`meta_id`, `meta_page_title`, `meta_tag`, `meta_keywords`, `page_id`, `meta_date`) VALUES
(1, '', '', '', 1, '0000-00-00 00:00:00'),
(2, '', '', '', 2, '0000-00-00 00:00:00'),
(3, '', '', '', 3, '0000-00-00 00:00:00'),
(5, 'LTL FREIGHT WHAT IS LTL', 'LTL FREIGHT WHAT IS LTL', 'LTL FREIGHT WHAT IS LTL', 5, '0000-00-00 00:00:00'),
(6, 'Welcome to Freedom Trailers! / Inventory', 'Welcome to Freedom Trailers! / Inventory', 'Welcome to Freedom Trailers! / Inventory', 6, '0000-00-00 00:00:00'),
(7, 'DUMP TRAILERS', 'DUMP TRAILERS', 'DUMP TRAILERS', 7, '0000-00-00 00:00:00'),
(8, 'ENCLOSED CAR TRAILERS', 'ENCLOSED CAR TRAILERS', 'ENCLOSED CAR TRAILERS', 8, '0000-00-00 00:00:00'),
(9, 'ENCLOSED CARGO TRAILERS double door models', 'ENCLOSED CARGO TRAILERS double door models', 'ENCLOSED CARGO TRAILERS double door models', 9, '0000-00-00 00:00:00'),
(10, 'ENCLOSED CARGO TRAILERS ramp door models', 'ENCLOSED CARGO TRAILERS ramp door models', 'ENCLOSED CARGO TRAILERS ramp door models', 10, '0000-00-00 00:00:00'),
(11, 'Equipment Trailers', 'Equipment Trailers', 'Equipment Trailers', 11, '0000-00-00 00:00:00'),
(12, 'Open Car Trailers', 'Open Car Trailers', 'Open Car Trailers', 12, '0000-00-00 00:00:00'),
(13, 'TOYHAULERS', 'TOYHAULERS', 'TOYHAULERS', 13, '0000-00-00 00:00:00'),
(14, 'TRAILER, MOTORCYCLE & GARAGE PARTS & ACCESSOR', 'TRAILER, MOTORCYCLE & GARAGE PARTS & ACCESSOR', 'TRAILER, MOTORCYCLE & GARAGE PARTS & ACCESSOR', 14, '0000-00-00 00:00:00'),
(15, 'VENDING AND CONCESSION TRAILERS', 'VENDING AND CONCESSION TRAILERS', 'VENDING AND CONCESSION TRAILERS', 15, '0000-00-00 00:00:00');
