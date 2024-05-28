-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 07:26 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iteh2lb1var4`
--

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id_nurse` int NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `department` int NOT NULL,
  `shift` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id_nurse`, `name`, `date`, `department`, `shift`) VALUES
(1, 'ivanova', '2021-12-20', 1, 'First'),
(2, 'petrova', '2022-12-20', 2, 'Third'),
(3, 'sidorova', '2023-12-20', 3, 'Second'),
(4, 'egorova', '2024-12-20', 4, 'First'),
(5, 'fedorivna', '2024-05-28', 1, 'First'),
(6, 'mukolaivna', '2024-05-29', 2, 'Third'),
(7, 'oleksiivna', '2024-05-30', 4, 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_ward`
--

CREATE TABLE `nurse_ward` (
  `fid_nurse` int NOT NULL,
  `fid_ward` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nurse_ward`
--

INSERT INTO `nurse_ward` (`fid_nurse`, `fid_ward`) VALUES
(3, 2),
(3, 3),
(2, 1),
(5, 1),
(5, 2),
(6, 2),
(6, 3),
(1, 1),
(4, 1),
(4, 2),
(5, 4),
(6, 4),
(1, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id_ward` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id_ward`, `name`) VALUES
(1, 'WardFirst'),
(2, 'WardSecond'),
(3, 'WardThird'),
(4, 'WardFourth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id_nurse`),
  ADD UNIQUE KEY `id_nurse` (`id_nurse`);

--
-- Indexes for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  ADD KEY `fid_nurse` (`fid_nurse`),
  ADD KEY `fid_ward` (`fid_ward`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id_ward`),
  ADD UNIQUE KEY `id_ward` (`id_ward`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  ADD CONSTRAINT `nurse_ward_ibfk_1` FOREIGN KEY (`fid_nurse`) REFERENCES `nurse` (`id_nurse`),
  ADD CONSTRAINT `nurse_ward_ibfk_2` FOREIGN KEY (`fid_ward`) REFERENCES `ward` (`id_ward`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
