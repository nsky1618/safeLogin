-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2020 at 02:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `token` varchar(70) NOT NULL,
  `confirmation` varchar(1) NOT NULL DEFAULT '0',
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registerDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `token`, `confirmation`, `fname`, `lname`, `email`, `username`, `password`, `registerDate`) VALUES
(27, 'user17050', '76db511ae1cb29746fb2cf9cf098d436', '1', 'ff', 'ff', 'f@f.com', 'ff', '$2y$12$M47an/DF70fFN153AfwHfeUcyIDbRXYGMjScPY516n3ixIiRJ83bC', '2020-11-09'),
(28, 'user51495', 'ac4671c92e6d1ba3591e26209a34e508', '0', 'tt', 'tt', 't@t.com', 'tt', '$2y$12$vQXdd0wS1/kEbM2vKWpqNebQbUySQJ/yUXsP8AEWRMMnL/DvaSpWy', '2020-11-13'),
(29, 'user99349', '771680071227e02839893ea622d63987', '1', 'r', 'r', 'r@r.com', 'rr', '$2y$12$KT8TrkRRQ//vYECNq2ppGuycRp4hOW/mYrpqTQneyCY8MAXYR.9tS', '2020-11-20'),
(30, 'user78952', '9c9ee1a5054851660dd00d6d0271a652', '0', 'yy', 'y', 'y@y.com', 'yy', '$2y$12$moGLMTNxWKloXngNTi45IeI7uWPInp43QqZOKAYQGgDLjf9Lj5QTO', '2020-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
