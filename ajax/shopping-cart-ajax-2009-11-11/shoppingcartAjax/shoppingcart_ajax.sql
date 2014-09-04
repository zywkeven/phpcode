-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 21, 2009 at 10:16 AM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `shoppingcart_ajax`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `prod_id` int(4) NOT NULL auto_increment,
  `prod_name` varchar(255) collate latin1_general_ci NOT NULL,
  `prod_price` float(4,2) NOT NULL,
  PRIMARY KEY  (`prod_id`),
  UNIQUE KEY `prod_name` (`prod_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` VALUES (1, 'product one', 20.00);
INSERT INTO `products` VALUES (2, 'product two', 25.50);
INSERT INTO `products` VALUES (3, 'product three', 18.00);
INSERT INTO `products` VALUES (4, 'product four', 20.50);
INSERT INTO `products` VALUES (5, 'product five', 12.50);

-- --------------------------------------------------------

-- 
-- Table structure for table `show_cart`
-- 

CREATE TABLE `show_cart` (
  `sprod_id` int(4) NOT NULL,
  `sprod_name` varchar(255) collate latin1_general_ci NOT NULL,
  `sprod_price` float(4,2) NOT NULL,
  `sprod_quantity` int(4) NOT NULL,
  `total` float(8,2) NOT NULL,
  PRIMARY KEY  (`sprod_id`),
  UNIQUE KEY `sprod_name` (`sprod_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `show_cart`
-- 

INSERT INTO `show_cart` VALUES (4, 'product four', 20.50, 5, 102.50);
INSERT INTO `show_cart` VALUES (2, 'product two', 25.50, 1, 25.50);
