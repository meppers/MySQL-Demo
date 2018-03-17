-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 14, 2015 at 02:19 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `emw9240`
--

-- --------------------------------------------------------

--
-- Table structure for table `StatusCategory`
--

CREATE TABLE `StatusCategory` (
  `Name` varchar(255) NOT NULL,
  `StatusID` tinyint(4) NOT NULL auto_increment,
  PRIMARY KEY  (`StatusID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `StatusCategory`
--

INSERT INTO `StatusCategory` VALUES('Advertising Negotiations', 1);
INSERT INTO `StatusCategory` VALUES('Research', 2);
INSERT INTO `StatusCategory` VALUES('Script Writing', 3);
INSERT INTO `StatusCategory` VALUES('Filming', 4);
INSERT INTO `StatusCategory` VALUES('Editing', 5);

