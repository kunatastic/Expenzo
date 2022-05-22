-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 02:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenzo`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `eid` int(11) NOT NULL,
  `grp_name` varchar(20) NOT NULL,
  `mem_exp_name` varchar(20) NOT NULL,
  `exp_desc` text NOT NULL,
  `exp_amt` int(7) NOT NULL,
  `exp_split_num` int(3) NOT NULL,
  `mem_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`eid`, `grp_name`, `mem_exp_name`, `exp_desc`, `exp_amt`, `exp_split_num`, `mem_name`) VALUES
(1, 'Pondi', 'Anova', 'dyd', 50, 4, 'Sanjana,Soumyarup,Anova,Kunal'),
(2, 'Pondi', 'Kunal', 'gfdg', 200, 3, 'Sanjana,Anova,Kunal'),
(3, 'pondi', 'Sanjana', 'Bus', 200, 4, 'Sanjana,Soumyarup,Anova,Kunal'),
(4, 'Neh', ' cde', 'Bus Fare', 3000, 2, ' cde, edf');

-- --------------------------------------------------------

--
-- Table structure for table `group_details`
--

CREATE TABLE `group_details` (
  `grp_name` varchar(20) NOT NULL,
  `grp_desc` text NOT NULL,
  `no_of_mem` int(3) NOT NULL,
  `mem_name` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_details`
--

INSERT INTO `group_details` (`grp_name`, `grp_desc`, `no_of_mem`, `mem_name`, `password`) VALUES
('Group2', 'random group', 2, 'Sanjana,Anova', 'abcd'),
('Group3', 'random group', 2, 'Kunal,Sou', '1234'),
('Group4', 'random group', 2, 'Sanjana,Anova', '123456'),
('jigow', 'jiogjrjroe', 2, 'a,b', '12345'),
('kunal', 'oifwowj', 2, 'a,b', '12345'),
('Neh', 'yes', 3, 'abc, cde, edf', '123'),
('Pondi', 'Fun group', 4, 'Sanjana,Soumyarup,Anova,Kunal', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `grp_name` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `exp_desc` text NOT NULL,
  `amt_share` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `grp_name`, `name`, `exp_desc`, `amt_share`) VALUES
(18, 'Pondi', 'Sanjana', 'dyd', 50),
(19, 'Pondi', 'Soumyarup', 'dyd', 50),
(20, 'Pondi', 'Anova', 'dyd', 50),
(21, 'Pondi', 'Kunal', 'dyd', 50),
(22, 'Pondi', 'Sanjana', 'gfdg', 67),
(23, 'Pondi', 'Anova', 'gfdg', 67),
(24, 'Pondi', 'Kunal', 'gfdg', 67),
(25, 'pondi', 'Sanjana', 'Bus', 50),
(26, 'pondi', 'Soumyarup', 'Bus', 50),
(27, 'pondi', 'Anova', 'Bus', 50),
(28, 'pondi', 'Kunal', 'Bus', 50),
(29, 'Neh', ' cde', 'Bus Fare', 1500),
(30, 'Neh', ' edf', 'Bus Fare', 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `group_details`
--
ALTER TABLE `group_details`
  ADD PRIMARY KEY (`grp_name`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
