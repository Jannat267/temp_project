-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 05:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `modify_date` date DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `modify_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(24, 'rupali', 'rupali', 'rupali_rupali', 'rupali123@gmail.com', 'ebe775d6b27e9d1ec1856b155d28a30f', '2020-11-21', NULL, ' ', 0, 0, 'no', ','),
(25, 'abc', 'srfcfregv', 'abc_srfcfregv', 'abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', '2020-11-21', '2020-12-10', ' ', 0, 0, 'no', ','),
(28, 'xcvth', 'rtgvr', 'xcvth_rtgvr', 'cvfd@bnfkj.xsdc', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-21', NULL, ' ', 0, 0, 'no', ','),
(29, 'scefrc', 'rfdc', 'scefrc_rfdc', 'fggtv@rgv.gvr', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-21', NULL, ' ', 0, 0, 'no', ','),
(30, 'sdvfv ', 'ervreg', 'sdvfv _ervreg', 'nasfcver@dfgb.uyjn', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '2020-11-21', NULL, ' ', 0, 0, 'no', ','),
(33, 'ashraful', 'islam', 'ashraful islam', 'ashraful@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-11-24', NULL, ' ', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
