-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2019 at 02:16 AM
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
(212, 'Drive', 'http://image.tmdb.org/t/p/w185//nu7XIa67cXc2t7frXCE5voXUJcN.jpg', 'Nicolas Winding Refn', 'Ryan Gosling Carey Mulligan Bryan Cranston', '2011-08-06', 64690, 12, 3),
(226, 'Rush Hour', 'http://image.tmdb.org/t/p/w185//jdfxpW5LF36sHsHjyH8CMBEG4TF.jpg', 'Brett Ratner', 'Jackie Chan Chris Tucker Ken Leung', '1998-09-18', 2109, 12, 1),
(229, 'Antz', 'http://image.tmdb.org/t/p/w185//3biVcPu5hrfKUMC73sTFq17dmmS.jpg', 'Tim Johnson', 'Woody Allen Dan Aykroyd Anne Bancroft', '1998-10-02', 8916, 12, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
