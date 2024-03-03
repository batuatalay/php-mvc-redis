-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: uzmanlar_mysql:3306
-- Generation Time: Mar 01, 2024 at 05:41 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIES`
--

CREATE TABLE `CATEGORIES` (
  `id` int NOT NULL,
  `code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `CATEGORIES`
--

INSERT INTO `CATEGORIES` (`id`, `code`, `title`) VALUES
(1, 'mekanik-imalat', 'Mekanik İmalat'),
(2, 'boya', 'Boya'),
(3, 'montaj', 'Montaj'),
(4, 'hidrolik', 'Hidrolik'),
(5, 'elektrik', 'Elektrik');

-- --------------------------------------------------------

--
-- Table structure for table `MANAGERS`
--

CREATE TABLE `MANAGERS` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `MANAGERS`
--

INSERT INTO `MANAGERS` (`id`, `name`, `phone`, `username`, `password`, `status`, `lastLogin`) VALUES
(10, 'batuhan Atalay', '0544', 'batuatalay', '72ab994fa2eb426c051ef59cad617750bfe06d7cf6311285ff79c19c32afd236', 'Active', '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `PROCESSES`
--

CREATE TABLE `PROCESSES` (
  `ID` int NOT NULL,
  `PROJECT_ID` int NOT NULL,
  `CATEGORY_ID` int NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PROJECTS`
--

CREATE TABLE `PROJECTS` (
  `ID` int NOT NULL,
  `CODE` varchar(200) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `MANEGER_ID` int NOT NULL,
  `STARTDATE` date NOT NULL,
  `ENDDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MANAGERS`
--
ALTER TABLE `MANAGERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `PROCESSES`
--
ALTER TABLE `PROCESSES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PROJECTS`
--
ALTER TABLE `PROJECTS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `MANAGERS`
--
ALTER TABLE `MANAGERS`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `PROCESSES`
--
ALTER TABLE `PROCESSES`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PROJECTS`
--
ALTER TABLE `PROJECTS`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
