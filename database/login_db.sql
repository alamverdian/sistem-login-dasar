-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 09:16 AM
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
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'alam', 'alam@example.com', '$2y$10$UuB5R7S9DqX7wDq6yfl6TOJKoZxP1e9DReKnX7bWkZDnIDfG9h7r6'),
(7, 'nanda', 'nanda@example.com', '$2y$10$eM5xJdrOfk4IMV0gxrqXgOTh2kCzIUVdscqavf4RmvJzFD3DEmTVW'),
(8, 'dina', 'dina@example.com', '$2y$10$7H5S1LUSc1xqErD3UpPzHuH7sXZtHrbTkM4E.5xovFg8c03RqkUhe'),
(9, 'budi', 'budi@example.com', '$2y$10$FvQ5BnyQ7M7Y6PiZqkXcneP5rEMwXBVr3uMebtqE3/4V5aIUt1xwy'),
(10, 'sari', 'sari@example.com', '$2y$10$k4mQ1WkGkGB/FfKX0E1RuOK0XG2DZnByBzRrKSTBZU7kzU7Rzqk6C'),
(11, 'verdian', 'verdian@gmail.com', '$2y$10$8uA/Liv4fhvfZGJeRO/uUe9YdQE6W/RXW19xRAR58I/Neg5ttClA6');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
