-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 04:20 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bookclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `id` int(11) NOT NULL,
  `ssn` char(20) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `isbn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `edition number` int(20) NOT NULL,
  `year` year(4) NOT NULL,
  `company` varchar(50) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `author` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`isbn`, `title`, `pages`, `edition number`, `year`, `company`, `reserved`, `author`) VALUES
(9789188, 'Ensam i Paris och andra historier', 286, 1, 2017, 'Printz Publishing', 1, 'Jojo Moyes'),
(97891296, 'Harry Potter och dödsrelikerna', 784, 2, 2014, 'Rabén Sjögren', 0, 'J.K Rowling'),
(258912967, 'Harry Potter och de vises sten', 390, 6, 2010, 'Rabén Sjögren', 0, 'J.K Rowling'),
(978071818, 'Quick & Easy 5-Ingredient Food', 288, 1, 2017, 'Penguin', 0, 'Jamie Oliver'),
(2147483647, 'Som stjärnor i natten', 392, 1, 2016, 'Lilla Piratförlaget', 0, 'Jennifer Niven');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`commentid`, `comment`) VALUES
(1, 'hej'),
(2, '<strong>hej</strong>'),
(3, '&lt;strong&gt;hej&lt;/strong&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userid`, `username`, `userpass`) VALUES
(1, 'lisa123', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

-- --------------------------------------------------------

--
-- Table structure for table `Writes`
--

CREATE TABLE `Writes` (
  `isbn` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `Writes`
--
ALTER TABLE `Writes`
  ADD PRIMARY KEY (`isbn`,`id`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Writes`
--
ALTER TABLE `Writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `Book` (`isbn`),
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`id`) REFERENCES `Book` (`isbn`);
