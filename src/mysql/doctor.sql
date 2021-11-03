-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2021 at 09:34 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docship`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` longtext NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `charge_amount` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `working_from` time NOT NULL,
  `working_to` time NOT NULL,
  `nic` varchar(20) NOT NULL,
  `subcription_discount` float NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstname`, `lastname`, `email`, `pwd`, `bday`, `gender`, `charge_amount`, `category`, `college`, `working_from`, `working_to`, `nic`, `subcription_discount`, `specialization`, `telephone`) VALUES
(1, 'Dilusha', 'Madushan', 'dilushamadushan9912@gmail.com', '$2y$10$afQsiunZnfog6MsLyqAg0uHmWzrf9ht7ImlCM2XPidPjekZJeDA9S', '2021-11-01', 'Male', 2000, 'General', 'University of Peradeniya', '14:00:00', '18:00:00', '123456789V', 10, 'None', '1234567890');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
