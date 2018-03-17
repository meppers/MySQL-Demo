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
-- Table structure for table `Videos`
--

CREATE TABLE `Videos` (
  `VidID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `StatusID` tinyint(4) NOT NULL,
  `Teaser` varchar(255) NOT NULL,
  `Conf` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Videos`
--

INSERT INTO `Videos` (`VidID`, `Title`, `StatusID`, `Teaser`, `Conf`) VALUES
(1, 'Samsung phone review', 1, 'We\'re reviewing the new flagship phone from samsung, the Galaxy S6', 1),
(2, 'Oculus Rift', 4, 'It\'s finally here! After 3 years of hype, we finally got a review sample of the Oculus rift', 1),
(3, 'Asus PB287Q monitor review', 5, '4K at $400? What corners did they cut to reach this price?', 1),
(31, 'Apple Watch 2 review', 2, 'Did apple fix everything?', 2),
(42, '.Don\'t worry if you delete everything', 5, 'I have a backup of all this', 2),
(43, 'Surface Pro 4 review', 3, 'A review from a latecomer\'s perspective', 1),
(44, 'Tour of MKBHD\'s office', 2, 'See how the man run things in this behind-the-scenes perspective', 2),
(45, 'RED Weapon camera unboxing', 4, 'Why did I spend so much money on this?????', 1),
(46, 'Does ram speed matter?', 1, 'Do those higher numbers printed on ram modules mean you get better FPS in games?', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Videos`
--
ALTER TABLE `Videos`
  ADD PRIMARY KEY (`VidID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Videos`
--
ALTER TABLE `Videos`
  MODIFY `VidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
