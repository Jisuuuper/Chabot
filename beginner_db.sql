-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 09:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beginner_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `responses` varchar(255) NOT NULL,
  `patterns` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `responses`, `patterns`) VALUES
(1, 'hihih', 'HowtocodeJava?'),
(2, 'To get Java library, get somethingblabla', 'How to get Java library?');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `parent_post` varchar(500) NOT NULL,
  `parent_comment` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `student` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `parent_post`, `parent_comment`, `student`, `post`, `date`) VALUES
(15, '71', '0', 'albert', 'some of the possible libraries for python plotting a data are matplotlib, and pandas', '2023-05-15 07:41:34'),
(16, '71', '15', 'albert', 'hello test reply', '2023-05-15 07:41:31'),
(17, '71', '0', 'albert', 'another comment', '2023-05-15 07:42:20'),
(18, '71', '0', 'albert', 'this is another comment lets go', '2023-05-15 07:44:03'),
(27, '72', '0', 'albert', 'fourth', '2023-05-15 07:52:27'),
(28, '72', '0', 'alber', 'fifth', '2023-05-15 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title_post` text NOT NULL,
  `post` text NOT NULL,
  `image` varchar(1024) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title_post`, `post`, `image`, `tag`, `date`) VALUES
(88, 23, 'firts post', 'fisrtpost', '', 'PYTHON', '2023-05-15 17:00:22'),
(89, 23, 'second post', 'second post', '', 'PYTHON', '2023-05-15 17:00:35'),
(90, 23, 'second post', 'second post', '', 'PYTHON', '2023-05-15 17:03:34'),
(91, 23, 'third post', 'third post', '', 'PYTHON', '2023-05-15 17:03:52'),
(92, 31, 'HowtocodeJava?', 'haha', '', 'JAVA', '2023-05-20 07:53:41'),
(93, 31, 'How to get Java library?', 'hihihihhjava', '', 'JAVA', '2023-05-20 08:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `user_type`) VALUES
(23, 'Jireh', 'jirehaguraso@gmail.com', '1234', '2023-05-13 04:39:13', 'uploads/OIP (1).jfif', 'user'),
(24, 'loyd', 'loyd@gmail.com', '1234', '2023-05-13 04:40:36', NULL, 'user'),
(25, 'Albert', 'albert@gmail.com', '1234', '2023-05-13 05:52:41', NULL, 'user'),
(31, 'user', 'user@usls.edu.ph', '123', '2023-05-20 07:46:58', NULL, 'user'),
(32, 'admin', 'admin@usls.edu.ph', '123', '2023-05-20 07:55:20', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
