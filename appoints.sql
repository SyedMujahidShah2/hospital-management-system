-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2025 at 12:45 PM
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
-- Database: `h_m_s`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoints`
--

CREATE TABLE `appoints` (
  `sno` int(11) NOT NULL,
  `doctor` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoints`
--

INSERT INTO `appoints` (`sno`, `doctor`, `date`, `time`) VALUES
(2, 'Dr. Ali - Cardiologist', '2025-08-04', '17:09:00'),
(6, 'Dr. Sara - Dentist', '2025-08-13', '16:23:00'),
(7, 'Dr. Khan - Neurologist', '2025-08-26', '19:28:00'),
(12, 'Dr. Ali - Cardiologist', '2025-08-04', '23:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoints`
--
ALTER TABLE `appoints`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoints`
--
ALTER TABLE `appoints`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
