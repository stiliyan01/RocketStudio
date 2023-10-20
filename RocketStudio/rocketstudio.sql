-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 20 окт 2023 в 16:19
-- Версия на сървъра: 10.4.27-MariaDB
-- Версия на PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `rocketstudio`
--

-- --------------------------------------------------------

--
-- Структура на таблица `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `technology_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `technologies`
--

INSERT INTO `technologies` (`id`, `technology_name`) VALUES
(1, 'JavaScript'),
(2, 'PHP'),
(3, 'Java'),
(4, 'Laravel'),
(5, 'Sympfony'),
(6, 'C++');

-- --------------------------------------------------------

--
-- Структура на таблица `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `university`
--

INSERT INTO `university` (`id`, `university_name`, `grade`) VALUES
(2, 'Технически Университет - Варна', 4),
(4, 'Икономически Университет', 5),
(5, 'Медицински Университет', 6);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `sure_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `university_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `sure_name`, `date_of_birth`, `university_id`, `technology_id`) VALUES
(2, 'stelio', 'borisov', 'valentinov', '2023-10-10', 2, 2),
(3, 'Stiliyan', 'Valentinov', 'Borisov', '2001-09-14', 2, 2),
(4, 'plami', 'test', 'test', '2005-10-04', 2, 2),
(5, 'Georgi', 'Sava', 'Rakovski', '2000-03-16', 5, 82),
(6, 'test', 'test', 'test', '2001-01-01', 2, 1),
(7, 'test1', 'test', 'test', '2001-01-01', 2, 1),
(8, 'test2', 'test', 'test', '2001-01-01', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
