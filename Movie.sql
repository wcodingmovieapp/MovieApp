-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2019 at 02:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `actors` text NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`id`, `title`, `poster`, `director`, `actors`, `release_date`, `movie_id`, `user_id`, `ranking`) VALUES
(1, 'Rush Hour 2', 'http://image.tmdb.org/t/p/w185//kFeK17ZSogSxRxuupTxZ6PGklbj.jpg', 'Brett Ratner', 'Chris Tucker Jackie Chan Zhang Ziyi', '2001-08-03', 5175, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
