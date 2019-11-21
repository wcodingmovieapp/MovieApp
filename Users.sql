-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2019 at 02:04 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `gmail` tinyint(1) DEFAULT NULL,
  `facebook` tinyint(1) DEFAULT NULL,
  `normal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `password`, `image`, `gmail`, `facebook`, `normal`) VALUES
(1, 'test12', 'steven.roe@outlook.com', 'wcoding', 'default.jpg', 0, 0, 1),
(2, 'Steve', 'steven.roe@outlook.com', '$2y$10$20mrXu05xIcdRAMHMIe5vecFKglUFzifn7NTonc2VOXV1tuTq529W', 'default.jpg', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
