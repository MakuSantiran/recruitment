-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 08:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE `emp_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_status`
--

INSERT INTO `emp_status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(0, '-----', '2015-12-16 13:34:57', '0000-00-00 00:00:00'),
(1, 'CASUAL', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(2, 'CONTRACT OF SERVICE', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(3, 'CONTRACTUAL', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(4, 'EMERGENCY', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(5, 'JOB ORDER', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(6, 'PERMANENT', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(7, 'CO-TERMINUS', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(8, 'PROBATIONAL SUBSTITUTE', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(9, 'PROBATIONARY', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(10, 'REGULAR SUBSTITUTE', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(11, 'SUBSTITUTE', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(12, 'TEMPORARY', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(13, 'VOLUNTEER', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(14, 'PART-TIME', '2015-11-13 05:15:56', '0000-00-00 00:00:00'),
(15, 'REGULAR', '2015-11-13 05:15:56', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
