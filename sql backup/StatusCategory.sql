-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2017 at 12:09 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MySQL_Demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `StatusCategory`
--

CREATE TABLE `StatusCategory` (
  `Name` varchar(255) NOT NULL,
  `StatusID` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StatusCategory`
--

INSERT INTO `StatusCategory` (`Name`, `StatusID`) VALUES
('Advertising Negotiations', 1),
('Research', 2),
('Script Writing', 3),
('Filming', 4),
('Editing', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `StatusCategory`
--
ALTER TABLE `StatusCategory`
  ADD PRIMARY KEY (`StatusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `StatusCategory`
--
ALTER TABLE `StatusCategory`
  MODIFY `StatusID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
