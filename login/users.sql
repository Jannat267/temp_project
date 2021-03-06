-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 04:16 AM
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
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Jannatul', 'Ferdouse', 'Jannatul_Ferdouse', 'jannatulferdouse@gmail.com', 'abcd', '2020-11-01', 'abc', 1, 1, 'no', ''),
(2, 'Aaaa', 'Bbbb', 'aaaa_bbbb', 'A@b.c', 'ab56b4d92b40713acc5af89985d4b786', '2020-11-06', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(3, 'Rupa', 'Rupa', 'rupa_rupa', 'b@b.c', '594f803b380a41396ed63dca39503542', '2020-11-06', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(7, 'Aaaa', 'Bbbb', 'aaaa_bbbb_1', 'ab@b.c', 'ab56b4d92b40713acc5af89985d4b786', '2020-11-06', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(8, 'Aaa', 'Bbb', 'aaa_bbb', 'abc@b.c', '594f803b380a41396ed63dca39503542', '2020-11-06', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(10, 'Abcde', 'Ab', 'abcde_ab', 'Abb@gmail.com', 'a152e841783914146e4bcd4f39100686', '2020-11-06', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(11, 'Abc', 'Bc', 'abc_bc', 'Abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', '2020-11-06', '', 0, 0, 'no', ','),
(12, 'Abc', 'Bc', 'abc_bc_1', 'Abcd@gmail.com', '594f803b380a41396ed63dca39503542', '2020-11-06', ' ', 0, 0, 'no', ','),
(13, 'Robin', 'Arifa', 'robin_arifa', 'Msmrobin518@gmail.com', '8b161ad81e63e1f58cb64ae300b92a9e', '2020-11-06', ' ', 0, 0, 'no', ',');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
