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
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `marka_name` varchar(100) NOT NULL,
  `marka` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `vote` int NOT NULL DEFAULT '0',
  `deleted_at` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `district`, `marka_name`, `marka`, `status`, `vote`, `deleted_at`) VALUES
(7, 'Nahid Hasan', 'Chandpur', 'Pine Apple', 'Nahid-Hasan.webp', 0, 1, 0),
(8, 'Arafat Rony', 'Chandpur', 'Truck', 'Arafat-Rony.png', 0, 0, 0),
(9, 'Lionel Messi', 'Rosario', 'Football', 'Lionel-Messi.jpg', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nid_no` varchar(20) DEFAULT NULL,
  `division` varchar(300) NOT NULL,
  `district` varchar(30) NOT NULL,
  `sub_district` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `deleted_at` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id`, `name`, `father_name`, `mother_name`, `email`, `phone`, `nid_no`, `division`, `district`, `sub_district`, `birth_date`, `gender`, `photo`, `status`, `role`, `deleted_at`) VALUES
(4, 'SAFIUL Imtiaj', 'Md Safullah', 'Parvin Sultana', 'siam@gmail.com', '+8801726731283', '202403081842', 'Chittagong', 'Chandpur', 'Gulgula', '2024-03-08', 'male', 'SAFIUL IMTIAJ2024-03-08.JPG', 1, '0', 0),
(7, 'SAFIUL IMTIAJ', 'Blair Russo', 'Ali Rogers', 'kipokuto@mailinator.com', '+1 (476) 659-1056', '199304094029', 'Eu fugiat sed iste a', 'Enim assumenda error', 'Sunt omnis harum vol', '1993-04-09', 'female', 'SAFIUL IMTIAJ1993-04-09.png', 0, '0', 0),
(8, 'Fazle Alahe', 'Bazlur Rashid', 'Shahida Begum', 'fazlealahe.murad@gmail.com', '01863047064', '200005157448', 'Chittagong', 'Chandpur', 'Shahrasti', '2000-05-15', 'male', 'Fazle Alahe2000-05-15.jpeg', 0, 'admin', 0),
(9, 'Walker Myers', 'Magee Sweet', 'Brandon Delgado', 'hufutaceco@mailinator.com', '+1 (248) 399-8769', '201308197411', 'Voluptatum expedita ', 'Commodo nihil a cum ', 'Consequat Iure even', '2013-08-19', 'male', 'Walker Myers2013-08-19.jpg', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `district` varchar(100) DEFAULT NULL,
  `marka` varchar(100) NOT NULL,
  `marka_name` varchar(100) NOT NULL,
  `votes` int NOT NULL DEFAULT '0',
  `candidate_id` int NOT NULL,
  `voter_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `name`, `district`, `marka`, `marka_name`, `votes`, `candidate_id`, `voter_id`) VALUES
(1, 'Yvonne Fulton                                            ', 'Eum qui voluptates e', 'Yvonne-Fulton.jpg', 'Omnis est ullam susc', 0, 2, 4),
(2, 'Yvonne Fulton                                            ', 'Eum qui voluptates e', 'Yvonne-Fulton.jpg', 'Omnis est ullam susc', 0, 2, 9),
(3, 'Nahid Hasan                                            ', 'Chandpur', 'Nahid-Hasan.webp', 'Pine Apple', 0, 7, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
