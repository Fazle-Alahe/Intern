-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2024 at 03:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `roll`, `created_at`, `deleted_at`, `updated_at`, `status`) VALUES
(1, 'Philip Hughes', 'bujy@mailinator.com', '$2y$10$qyanhxdi4S.p8dN0fDQ2lO9tYPn2ZD1ZHV9G6zvsCLPg1NH43Qq9y', 1, NULL, NULL, NULL, 0),
(2, 'Maxwell Sawyer', 'finam@mailinator.com', '$2y$10$hZ453MOd42lYC8vK2gPuSu/gYS5pC6s/vki2K2a7kMCFFWd5g22u6', 3, NULL, NULL, NULL, 0),
(3, 'Ina Swanson', 'mowikiloka@mailinator.com', '$2y$10$8bdEuGevfnKX0LUkBY4ddebTJHiYmtTu9jktb05ZZqCCTRE4r.eHu', 3, NULL, NULL, NULL, 0),
(4, 'Serena Vincent', 'kiretyn@mailinator.com', '$2y$10$EV3niBJPuz8FZdzYAFXFjekU88jjgfGZgxiEocAxqu9TqyvPypbPy', 0, NULL, '2024-11-29', NULL, 0),
(5, 'Fazle Alahe', 'fazlealahe.murad@gmail.com', '$2y$10$MQUG9UJBsD/myddg6E90FeDvZE2fxNY1AMpyUdJfNxzEZRhhB6.zC', 1, NULL, NULL, NULL, 0),
(8, 'George Foster', 'luqovyzyp@mailinator.com', '$2y$10$RQKp5h06n1kVeZt5POfBAOLH4eRgU0JD3LzVvJjKw4df52oP2AgF6', 0, NULL, '2024-11-29', NULL, 0),
(9, 'Murphy England', 'zihe@mailinator.com', '$2y$10$Blv7ke0T0.ABwbTW6cgp5eVW823cGRftzzQDxijSvYqG/gQCE9TEi', 0, '2024-03-13', '2024-03-14', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
