-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 07:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rannaghor`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` text NOT NULL,
  `userid` text NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `body` text NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `userid`, `image`, `name`, `body`, `ingredients`, `instructions`, `approved`, `views`, `genre`) VALUES
('6431930c0018b', '64318c7140bdf', '', 'meow', 'meow', 'gheu; gheu; gheu', 'gheu er sathe gheu mishaya kutta banabo', 1, 1, ''),
('645fb85b609db', '64305ff50623d', 'Image645fb85b609e2.jpg', 'meow', 'ssssssssssssssssssssssssss', 'ssssssssssss;ssssssssssssssssssssssssssssssss;sssssssss;sssssss;', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 6, 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
('64305ff50623d', 'BM Monjur', 'Morshed', 'meow', 'bmqube0@gmail.com', '$2y$10$FdYbVecdnofQjKq9Kpu8ke7eep3YA.yq1tTUDl7upN6bBtmx8sIji'),
('6431452ae8d19', 'BM Monjur', 'Morshed', 'meow2', 'bmqube1@gmail.com', '$2y$10$P8FdE7bbK5kgJPv3hsjtDeyiopoamic46XxViMb62EZNOockxDOCi'),
('64318c7140bdf', 'BM Monjur', 'Morshed', 'meow6', 'bmqube3@gmail.com', '$2y$10$PPVedXSNqg/LzNnF2Ml0Uu/nBin6Jcy3zFj3uAHeX/P3UeP/AuW1K');

-- --------------------------------------------------------

--
-- Table structure for table `user_fav`
--

CREATE TABLE `user_fav` (
  `id` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `recipe_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD UNIQUE KEY `unq_id` (`id`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`(100)) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD UNIQUE KEY `username` (`username`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
