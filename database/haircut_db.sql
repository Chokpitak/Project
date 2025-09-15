-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2025 at 05:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haircut_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `haircuts`
--

CREATE TABLE `haircuts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `haircuts`
--

INSERT INTO `haircuts` (`id`, `name`, `description`, `price`, `profile_image`, `created_at`) VALUES
(3, 'Under Cut', NULL, 100.00, 'undercut.jpg', '2025-09-07 18:52:59'),
(7, 'Two Block', NULL, 100.00, 'twoblock.jpg', '2025-09-13 18:38:49'),
(8, 'Mullet Cut', NULL, 120.00, 'mulletcut.png', '2025-09-14 18:40:09'),
(9, 'Buzz Cut', NULL, 80.00, 'buzzcut.png', '2025-09-14 18:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haircuts`
--
ALTER TABLE `haircuts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `haircuts`
--
ALTER TABLE `haircuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
