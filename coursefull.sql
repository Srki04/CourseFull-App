-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 04:08 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursefull`
--

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `componentid` int(25) NOT NULL,
  `componentname` varchar(50) NOT NULL,
  `courseofcomponentid` int(25) NOT NULL,
  `coursemark` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `target` int(3) NOT NULL,
  `actual` int(3) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseid` int(25) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `hubofcourseid` int(25) NOT NULL,
  `currentmark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupid` int(50) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `groupcreator` int(50) NOT NULL,
  `groupleader` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE `hubs` (
  `hubid` int(25) NOT NULL,
  `hubname` varchar(50) NOT NULL,
  `usercreatorid` int(50) NOT NULL,
  `averagemark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messengers`
--

CREATE TABLE `messengers` (
  `messageid` int(50) NOT NULL,
  `groupid` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailadress` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `goal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`componentid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`hubid`);

--
-- Indexes for table `messengers`
--
ALTER TABLE `messengers`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `componentid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
  MODIFY `hubid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messengers`
--
ALTER TABLE `messengers`
  MODIFY `messageid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
