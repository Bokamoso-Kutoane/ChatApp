-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2026 at 12:52 PM
-- Server version: 12.2.2-MariaDB
-- PHP Version: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ChatApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT current_timestamp(),
  `scheduled_arrival` timestamp NULL DEFAULT NULL,
  `transportation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `receiver`, `message`, `time_sent`, `scheduled_arrival`, `transportation`) VALUES
(1, 'Kyle', 'Bok', '#3@3h@h$ Bo?0?!$ ho!$#!H#w %*e y1u ?an.*#ovi4g *h$0 a#$ b44t1! *?%', '2026-04-30 11:50:04', '2026-04-30 11:55:04', 'redbull-athlete'),
(2, 'Bok', 'Kyle', 'what?', '2026-04-30 11:56:21', '2026-04-30 12:07:21', 'redbull-athlete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `onboarding_complete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `onboarding_complete`) VALUES
(2, 'Kyle', '$2y$12$nAqbRLFOciqndIMMfWCmGe/hWa5P7LNAjFsuYn2MJEfUx1qzV2nRy', 1),
(3, 'Jeff', '$2y$12$YawaGj8Mr9TvpQUmLk3a5.F5mF8bN7HWIFYLQiv9rXFOFIx0c5sHm', 0),
(4, 'Bok', '$2y$12$WgfJ0COSvsh85laI3NmWe.2rnC7t33zpt/I3.jnMOTR.it2844XHe', 1),
(5, 'Linda', '$2y$12$6nB4sOLB/5O1EnZuAH9Lauxwzu7e/AkSJT695qOAypTIfKUd43hHy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
