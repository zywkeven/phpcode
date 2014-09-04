-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 15, 2006 at 11:25 PM
-- Server version: 4.1.12
-- PHP Version: 5.0.4
-- 
-- Database: `test`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `graph`
-- 

CREATE TABLE `graph` (
  `vertex` int(11) NOT NULL default '0',
  `connected_to` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `graph`
-- 

INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (1, 2);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (1, 3);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (2, 3);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (2, 4);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (3, 4);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (4, 5);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (4, 6);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (5, 7);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (5, 9);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (6, 7);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (7, 8);
INSERT INTO `graph` (`vertex`, `connected_to`) VALUES (8, 9);
