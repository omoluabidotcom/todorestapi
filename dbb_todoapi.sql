-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 11:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbb_todoapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `todo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task`, `todo_id`) VALUES
(1, 'wash plate', 8),
(2, 'fetch water', 8),
(3, 'read think big', 9),
(4, 'go see supervisor', 9),
(5, 'code a little', 10),
(6, 'watch tutorials on js', 10),
(7, 'buy bread after work', 11),
(8, 'branch madarasah after prayer', 11),
(9, 'read suratul khaf', 12),
(10, 'take my bath', 12),
(11, 'watch Man United match', 13),
(12, 'go clubbing in the evening', 13),
(13, 'wash cloth', 14),
(14, 'clean house', 14),
(15, 'wake early for work', 16),
(16, 'don\'t miss breakfast', 16),
(17, 'visit granny', 17),
(18, 'take a course on udemy', 17),
(19, 'Go shopping at exclusive', 18),
(20, 'Watch netflix', 18),
(21, 'check mail', 17);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `topic`, `createdat`, `user_id`) VALUES
(8, 'monday todo', '2021-10-16 18:48:27', 10),
(9, 'tuesday todo', '2021-10-16 18:48:42', 9),
(10, 'wednesday todo', '2021-10-16 18:49:02', 8),
(11, 'thursday todo', '2021-10-16 18:49:18', 7),
(12, 'friday todo', '2021-10-16 18:49:38', 6),
(13, 'saturday todo', '2021-10-16 18:49:56', 5),
(14, 'sunday todo', '2021-10-16 18:50:10', 4),
(16, 'second monday todo', '2021-10-16 18:52:29', 3),
(17, 'second tuesday todo', '2021-10-16 18:52:50', 2),
(18, 'second wednesday todo', '2021-10-16 18:53:12', 1),
(19, 'second thursday todo', '2021-10-20 05:16:00', 10),
(20, 'second thursday todo', '2021-10-20 05:16:00', 9),
(26, 'second thursday todo', '2021-10-21 10:16:00', 10),
(27, 'second thursday todo', '2021-10-21 10:16:00', 10),
(28, 'second thursday todo', '2021-10-21 10:16:00', 10),
(30, 'second friday todo', '2021-10-21 11:40:00', 8),
(31, 'second friday todo', '2021-10-21 11:40:00', 10),
(32, 'second friday todo', '2021-10-21 11:40:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `number`) VALUES
(1, 'Yahaya', 'Yusuf', 'pass12', 'yahayayusuf@gmail.com', 816434631),
(2, 'Habib', 'Yusuf', 'pass12', 'hbibyusuf@gmail.com', 908763568),
(3, 'Rashida', 'abdulrasheed', 'pass12', 'rashidaabdul@gmail.com', 728953426),
(4, 'Maryam', 'Abdul', 'pass12', 'maryamabdul@gmail.com', 803452671),
(5, 'Radhiat', 'shams', 'pass12', 'radhia@gmail.com', 907865421),
(6, 'kabir', 'mustapha', 'pass12', 'kabirmusty@gmail.com', 816576876),
(7, 'Abdulmalik', 'yahaya', 'pass12', 'abdulmalik@gmail.com', 815324169),
(8, 'Luqman', 'Abdulrashid', 'pass12', 'luqman@gmail.com', 816523478),
(9, 'Khairat', 'Shams', 'pass12', 'khairat@gmail.com', 705634561),
(10, 'Qasim', 'Sulaiman', 'pass12', 'qasim@gmail.com', 812345789),
(11, 'Yusuf', 'olasunkanmi', 'pass12', 'yusuf@gmail.com', 816434631),
(13, 'Isah', 'Gonagi', 'pass12', 'isah@gmail.com', 90347836),
(14, 'Hajara', 'Yahaya', 'pass12', 'hajo@gmail.com', 90347836);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task` (`todo_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_todo` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `FK_todo` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
