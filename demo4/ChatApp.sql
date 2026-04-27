-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2026 at 05:18 PM
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
  `message` text NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT current_timestamp(),
  `scheduled_arrival` timestamp NULL DEFAULT NULL,
  `transportation` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `message`, `time_sent`, `scheduled_arrival`, `transportation`, `status`) VALUES
(1, 'Bok', 'YOOOOOOOOOOOO, new chat alert!', '2026-04-27 15:56:52', '2026-04-27 16:10:52', 'pidgeon', 'Late!'),
(2, 'Kyle', 'Suh dude. This is like... SOOOOO freaking cool man', '2026-04-27 16:32:00', '2026-04-27 16:45:00', 'redbull-athlete', 'Late!'),
(3, 'Jeff', 'Let me in this peakness, hol on now', '2026-04-27 16:46:37', '2026-04-27 17:12:37', 'dog', 'Late!'),
(4, 'Jeff', 'da$aa_g, i s fancy i4 he~ . Imma name my pidgeo~ Bob', '2026-04-27 16:47:41', '2026-04-27 16:57:41', 'pidgeon', 'On Time!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'Kyle', '$2y$12$nAqbRLFOciqndIMMfWCmGe/hWa5P7LNAjFsuYn2MJEfUx1qzV2nRy'),
(3, 'Jeff', '$2y$12$YawaGj8Mr9TvpQUmLk3a5.F5mF8bN7HWIFYLQiv9rXFOFIx0c5sHm'),
(4, 'Bok', '$2y$12$WgfJ0COSvsh85laI3NmWe.2rnC7t33zpt/I3.jnMOTR.it2844XHe');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
