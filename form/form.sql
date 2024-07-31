-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 05:19 PM
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
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `full_name`, `email`, `password`, `phone`, `Address`) VALUES
(1, 'ramish', 'ramish@gmail.com', '$2y$10$F8PPDiiM0bw2BxCUxrclHeW7H3k4kODNqwG/DgxgBkVluKhCoc.cm', 2147483647, 'fds'),
(3, 'zain shah', 'zainshah@gmail.com', '$2y$10$.JoiE4p3LKfdjY9RYWJ9T.vrjR0FHaR4W5OiRPlMyKBTBFkFd0aKq', 2147483647, 'Gumnam colony'),
(4, 'Haseeb', 'haseeb@gmail.com', '$2y$10$b.8ezGMjd1KrtM750NSfpOpOqboi/N/hdZHfwiteVojfPqCKdwGoC', 2147483647, 'kanewal'),
(5, 'naseeb', 'naseeb@gmail.com', '$2y$10$cBS2ASk6QxBSMI8A7pIJluYe.oziqeAFpgNtz1nm/j3CKdCU/9EaO', 2147483647, 'colonyfree'),
(6, 'Mohsin Shah', 'mohsin1@gmail.com', '12345678', 736482682, 'Lahore'),
(7, 'Admin Admin', 'admin123@gmail.com', '$2y$10$39RZkvLqn2gR.9nxYEy.xePsp8rDBT0YPiLPipRcQYqk3.SFmZ6QO', 3593259, 'Lahore'),
(8, 'Hasham', 'hasham@gmail.com', '$2y$10$MHa2mDMySL.ehg/YfVHEAeYdxeA9711O5wk0LCbXHUib.OJJ8JVje', 2147483647, 'nrrtyuja'),
(9, 'Hasham', 'hasham1@gmail.com', '$2y$10$CF4W0/RhUxSRwZYjtrxK6eoCY0nNPMy0niB03qQwU8OmdRQ011QKi', 2147483647, 'nrrtyuja'),
(10, 'harry', 'harry@gmail.com', '$2y$10$x7XKT7QclHGrirsl0yn10e9hzPeomLSpgooRs/amyW5ZO1ilf1VN6', 2147483647, 'lahore'),
(11, 'nabeel', 'nabeel@gmail.com', '$2y$10$UksiLMSc1YlUZ0oUQdL76eMu.h1zEPusUwgu3GwNe8ZZYmL1eCQBu', 876423111, 'burewala'),
(12, 'shahgee', 'shahg@gmail.com', '$2y$10$pchkUeB9Cb5jaUuTuhfGh.VrpusV1YfNiV0MxvHcKahb1vdKqfXSm', 2147483647, 'calavryge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
