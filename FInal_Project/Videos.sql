-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: omega.uta.edu
-- Generation Time: Dec 14, 2015 at 02:16 PM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `emw9240`
--

-- --------------------------------------------------------

--
-- Table structure for table `Videos`
--

CREATE TABLE `Videos` (
  `VidID` int(11) NOT NULL auto_increment,
  `Title` varchar(255) NOT NULL,
  `StatusID` tinyint(4) NOT NULL,
  `Teaser` varchar(255) NOT NULL,
  `Conf` tinyint(2) NOT NULL,
  PRIMARY KEY  (`VidID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Videos`
--

INSERT INTO `Videos` VALUES(1, 'Samsung phone review', 5, 'We''re reviewing the new flagship phone from samsung, the Galaxy S6', 1);
INSERT INTO `Videos` VALUES(2, 'Oculus Rift', 4, 'It''s finally here! After 3 years of hype, we finally got a review sample of the Oculus rift', 1);
INSERT INTO `Videos` VALUES(3, 'Asus PB287Q monitor review', 3, '4K at $400? What corners did they cut to reach this price?', 1);
INSERT INTO `Videos` VALUES(31, 'Apple Watch 2 review', 2, 'Did apple fix everything?', 2);
