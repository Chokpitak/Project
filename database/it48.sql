-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2025 at 11:11 AM
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
-- Database: `it48`
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
(8, '                                        Mullet Cut', NULL, 120.00, 'growth01.gif', '2025-09-14 18:40:09'),
(9, 'Buzz Cut', NULL, 80.00, 'buzzcut.png', '2025-09-14 18:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'รอดำเนินการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `branch`, `fullname`, `phone`, `date`, `time`, `created_at`, `status`) VALUES
(14, 0, 'Big Boss สาขาสามแยกกระจับ', 'Chokpitak T', '6666666662', '2025-09-26', '12:25:00', '2025-09-13 17:04:18', 'รอดำเนินการ'),
(15, 0, 'Big Boss สาขาต้นสน', 'Chokpitak T', '6667666766', '2025-09-26', '19:45:00', '2025-09-13 18:20:42', 'รอดำเนินการ'),
(16, 0, 'Big Boss สาขาสามแยกกระจับ', 'Chokpitak T', '3333333333', '2025-09-17', '13:00:00', '2025-09-13 19:05:46', 'รอดำเนินการ'),
(17, 0, 'Big Boss สาขาสามแยกกระจับ', 'Player 456', '4564564560', '2025-09-15', '14:15:00', '2025-09-14 10:17:02', 'ยกเลิกแล้ว'),
(18, 0, 'Big Boss สาขาต้นสน', 'Player 456', '4564564560', '2025-09-15', '12:50:00', '2025-09-14 10:18:10', 'ยกเลิกแล้ว'),
(19, 0, 'Big Boss สาขาสามแยกกระจับ', 'Player 456', '4564564560', '2025-09-19', '14:15:00', '2025-09-14 10:19:26', 'รอดำเนินการ'),
(20, 0, 'Big Boss สาขามาลัยแมน', 'Player 456', '4564564560', '2025-09-15', '14:15:00', '2025-09-14 10:20:39', 'ยกเลิกแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at`, `profile_image`, `role`) VALUES
(1, 'Chokpitak', '(Developer) ', NULL, '1234567890', 'cpk@gmail.com', '$2y$10$X4YdnlAkrGTNQ15oUxHbA.84ZSg5c6GI9v8tRAGOCVbYTVJyWOqdi', '2025-09-14 10:01:59', 'profile_68c826a012b370.18045850.png', 'admin'),
(2, 'Player', '457', NULL, '4564564560', 'IT@gmail.com', '$2y$10$lKXaQlP5lcx0akQZ1KHDMOTJc4Q8uow1RG0dwAFKkEzCiwCXGJ226', '2025-09-14 10:16:02', 'profile_68c826dd4c5ca5.51718390.png', 'customer'),
(3, 'Player', '001', NULL, '0000000001', 'FM@gmail.com', '$2y$10$CIYlO0aJwpI8aEoMjuiQRuBLt2tdEJ.1BZuJNDvhkR.M9e.gI0zaW', '2025-09-14 10:21:33', 'profile_68c8270d509068.74040547.png', 'customer'),
(4, 'Worawarun', 'Buakum', NULL, '0323236645', 'asriw12987c@gmail.com', '$2y$10$Dn.xVUb2V2N6f0uVz/l7DuPOnOxxmrNQnUAiNxA2ITLGfZ9IqQ9h2', '2025-09-16 05:11:18', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haircuts`
--
ALTER TABLE `haircuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
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
-- AUTO_INCREMENT for table `haircuts`
--
ALTER TABLE `haircuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
