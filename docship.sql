-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2022 at 05:01 AM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` longtext NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_doctor` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `firstname`, `lastname`, `email`, `pwd`, `telephone`) VALUES
(1, 1, 'Dilusha', 'Madushan', 'www@gmail.com', '$2y$10$YcsnmvInUNq8t35h9pcaHuvLhJlJ/l0g3TPKZ2SlOAfG3L.zU1bqa', '1234567890'),
(2, 14, 'Chat', 'Bot', 'www1@gmail.com', '$2y$10$YcsnmvInUNq8t35h9pcaHuvLhJlJ/l0g3TPKZ2SlOAfG3L.zU1bqa', '0779658404');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `receipt_id` varchar(255) NOT NULL,
  `prescription_id` varchar(255) NOT NULL,
  `is_paid` bit(1) NOT NULL,
  `status` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_rated` bit(1) NOT NULL DEFAULT b'0',
  `is_exit` bit(1) NOT NULL,
  `zoom_link` varchar(1000) NOT NULL DEFAULT '"http://localhost/docship/pages/zoom"',
  PRIMARY KEY (`id`),
  KEY `appointment_patient` (`patient_id`),
  KEY `appointment_doctor` (`doctor_id`),
  KEY `appointment_receipt` (`receipt_id`),
  KEY `appointment_perscription` (`prescription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `time`, `date`, `receipt_id`, `prescription_id`, `is_paid`, `status`, `description`, `is_rated`, `is_exit`, `zoom_link`) VALUES
(20, 10, 1, '14:00:00', '2022-01-25', 'ee0220b39d', '41354c421b', b'1', 'CONFIRMED', 'Automatically added.', b'0', b'0', 'https://us04web.zoom.us/j/9140290631?pwd=MWthZUVtalJ5akE2SC9tbmJsMFpLZz09'),
(21, 10, 2, '10:00:00', '2022-01-26', 'c4d48d687c', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'1', '\"http://localhost/docship/pages/zoom\"'),
(22, 10, 1, '14:00:00', '2022-01-26', '3cc8287de2', '4d76deb92a', b'1', 'CONFIRMED', 'Automatically added.', b'1', b'0', 'https://www.google.com/search?client=opera&q=zoom&sourceid=opera&ie=UTF-8&oe=UTF-8'),
(23, 10, 5, '05:00:00', '2022-01-26', '9c64fd7157', '872a9010ef', b'1', 'CONFIRMED', 'Automatically added.', b'1', b'0', 'https://www.youtube.com'),
(24, 10, 2, '08:00:00', '2022-01-22', 'd367a68fac', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'0', '\"http://localhost/docship/pages/zoom\"'),
(25, 10, 2, '08:30:00', '2022-01-22', 'bc4aa315b7', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'0', '\"http://localhost/docship/pages/zoom\"'),
(26, 10, 5, '12:00:00', '2022-01-26', '33ce10c424', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'0', '\"http://localhost/docship/pages/zoom\"'),
(27, 10, 1, '18:00:00', '2022-02-24', '251ca25608', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'1', '\"http://localhost/docship/pages/zoom\"'),
(28, 10, 5, '18:00:00', '2022-02-07', 'af5e48b791', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'1', '\"http://localhost/docship/pages/zoom\"'),
(29, 10, 1, '17:00:00', '2022-02-11', '8cb5601c09', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'0', '\"http://localhost/docship/pages/zoom\"'),
(30, 10, 1, '16:00:00', '2022-02-07', '6dd3987ac1', '0', b'0', 'PENDING', 'Automatically added.', b'0', b'1', '\"http://localhost/docship/pages/zoom\"');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` longtext NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `charge_amount` double NOT NULL,
  `category` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `working_from` time NOT NULL,
  `working_to` time NOT NULL,
  `working_days` varchar(20) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `discount` double NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(25) NOT NULL,
  `bank_acc_no` varchar(20) NOT NULL,
  `total_income` double NOT NULL,
  `current_arrears` double NOT NULL,
  `is_remove` bigint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic` (`nic`) USING BTREE,
  KEY `user_admin` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `firstname`, `lastname`, `email`, `pwd`, `bday`, `gender`, `charge_amount`, `category`, `college`, `working_from`, `working_to`, `working_days`, `nic`, `discount`, `telephone`, `bank_name`, `bank_branch`, `bank_acc_no`, `total_income`, `current_arrears`, `is_remove`) VALUES
(1, 3, 'Bimal', 'Fernando', 'www@gmail.com', '$2y$10$YcsnmvInUNq8t35h9pcaHuvLhJlJ/l0g3TPKZ2SlOAfG3L.zU1bqa', '2021-11-08', 'Male', 2000, 'Dermatologist', 'UoC', '14:00:00', '20:00:00', '12345', '123456782V', 10, '0772651254', 'Bank Of Ceylon', 'Negombo', '123', 3000, 0, 0),
(2, 4, 'Kamala', 'Fernando', 'kamalafernando@gmail.com', '$2y$10$.9GvZX0CaAKbetcxcRnUEuJhxuw8DEXp3yHTZC3Pv3K1dM7.qbv0e', '2021-11-09', 'Male', 1500, 'Cardiologist', 'UoP', '06:00:00', '10:00:00', '236', '133456789V', 15, '0778525852', 'Commercial Bank', 'Colombo', '123', 1000, 0, 0),
(3, 21, 'Jude', 'Benadic', 'www45@gmail.com', '$2y$10$2HboqFXeYABrNKaxVBe.ZupgV.1ujjkuzyi4hPdGy0VnhZDwPqJiy', '2022-01-06', 'Male', 4000, 'Endocrinologist', 'colombo', '06:00:00', '12:00:00', '12345', '123456789V', 20, '0123456789', 'Bank Of Ceylon', 'Gampaha', '121212', 1500, 0, 0),
(5, 24, 'Sankalana', 'Gunapala', 'www69@gmail.com', '$2y$10$H1KETl2zZXkfEP/IBUVPlePoSK0Cnq5RxJ5Qbx7HV4olbglN1Bidi', '2022-01-05', 'Male', 5000, 'Gastroenterologist', 'colombo', '05:00:00', '21:00:00', '7123456', '123456769V', 25, '0123456789', 'Bank Of Ceylon', 'Gampaha', '696969', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender`),
  KEY `receiver_id` (`receiver`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `text`) VALUES
(1, 6, 14, 'Hello'),
(2, 14, 6, 'Hello Sir, How can I help you ?'),
(3, 6, 14, 'Today I transfer money to you account. Can you check it ?'),
(4, 14, 6, 'Yes sir, We got your payment. Thank you!'),
(5, 6, 14, 'Thank you'),
(6, 6, 14, 'hi'),
(7, 14, 6, 'Tell sir'),
(11, 6, 14, 'hi'),
(14, 6, 14, 'hi again'),
(15, 6, 14, 'Hey'),
(16, 6, 14, 'Hi sankalana'),
(17, 14, 6, 'Welcome'),
(18, 14, 3, 'Welcome'),
(19, 3, 14, 'Hey'),
(26, 14, 6, 'Sir'),
(28, 14, 6, 'Hello'),
(29, 3, 14, 'Hi'),
(30, 14, 3, 'Hello'),
(31, 6, 14, 'Sir');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` longtext NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `is_remove` bigint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `firstname`, `lastname`, `email`, `pwd`, `bday`, `gender`, `telephone`, `is_remove`) VALUES
(7, 5, 'Bimsara', 'Bodaragama', 'bimsarabodaragama@gmail.com', '$2y$10$qyfTbbSM1SLZpWtxUIlpIedmaiXjxFtBev.75sqaCb2fm.rhkvM/W', '1999-12-09', 'Male', '0772922757', 0),
(10, 6, 'David', 'Johny', 'www@gmail.com', '$2y$10$YcsnmvInUNq8t35h9pcaHuvLhJlJ/l0g3TPKZ2SlOAfG3L.zU1bqa', '2021-11-16', 'Male', '0123456789', 0),
(12, 7, 'Kasun', 'Panduka', 'dumy@gmail.com', '$2y$10$5R3fEk.OQyfWN9Cy.AI7BuMiIcqs44.gRE3UDCMHRlHXOKp2bMoTW', '2021-11-10', 'Male', '0123456789', 0),
(19, 23, 'Kasun', 'Gunapala', 'www789@gmail.com', '$2y$10$I/WvWNAwe0ossrmEO2Hy1OtG/ff.szfEQaC0TNTH1sEHDMTeHKQS6', '2022-01-02', 'Male', '0123456789', 0),
(20, 25, 'Panduka', 'Abe', 'wwwabe@gmail.com', '$2y$10$FnTkcOIL4M8VRgY7PTSwaOesRGJODUrFGrPVch.oDJRfDpPpQonN.', '2022-01-01', 'Male', '0123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `id` varchar(255) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `issue_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prescription_patient` (`patient_id`),
  KEY `prescription_doctor` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `doctor_id`, `patient_id`, `subject`, `description`, `issue_date`) VALUES
('41354c421b', 1, 10, 'Medicine', 'Zoom uses cookies and similar technologies as strictly necessary to make our site work. We and our partners would also like to set additional cookies to analyze your use of our site, to personalize and enhance your visit to our site and to show you more relevant content and advertising. These will be set only if you accept', '2022-01-21'),
('4d76deb92a', 1, 10, 'Medicine', 'Zoom Video Communications, Inc. is an American communications technology company headquartered in San Jose, California. It provides videotelephony and online chat services through a cloud-based peer-to-peer software platform and is used for teleconferencing', '2022-01-21'),
('872a9010ef', 5, 10, 'Medicine 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '2022-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_rate` (`patient_id`),
  KEY `doctor_rate` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `patient_id`, `doctor_id`, `value`) VALUES
(10, 6, 3, 3),
(11, 6, 24, 5);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `id` varchar(255) NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(25) NOT NULL,
  `bank_acc_no` varchar(20) NOT NULL,
  `discount` double NOT NULL,
  `amount` double NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `is_complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receipt_patient` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `patient_id`, `bank_name`, `bank_branch`, `bank_acc_no`, `discount`, `amount`, `issue_date`, `expiry_date`, `description`, `total`, `is_complete`) VALUES
('33ce10c424', 10, 'BOC', 'Negambo', '0123456789', 0, 5000, '2022-01-21', '2022-01-25', 'This receipt is issued Automatically', 5000, 0),
('3cc8287de2', 10, 'BOC', 'Negambo', '0123456789', 10, 2000, '2022-01-21', '2022-01-25', 'This receipt is issued Automatically', 1800, 0),
('8cb5601c09', 10, 'BOC', 'Negambo', '0123456789', 10, 2000, '2022-02-04', '2022-02-10', 'This receipt is issued Automatically', 1800, 0),
('9c64fd7157', 10, 'BOC', 'Negambo', '0123456789', 0, 5000, '2022-01-21', '2022-01-25', 'This receipt is issued Automatically', 5000, 1),
('bc4aa315b7', 10, 'BOC', 'Negambo', '0123456789', 0, 1500, '2022-01-21', '2022-01-21', 'This receipt is issued Automatically', 1500, 0),
('d367a68fac', 10, 'BOC', 'Negambo', '0123456789', 0, 1500, '2022-01-21', '2022-01-21', 'This receipt is issued Automatically', 1500, 0),
('ee0220b39d', 10, 'BOC', 'Negambo', '0123456789', 10, 2000, '2022-01-21', '2022-01-24', 'This receipt is issued Automatically', 1800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcriber`
--

DROP TABLE IF EXISTS `subcriber`;
CREATE TABLE IF NOT EXISTS `subcriber` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor` (`doctor_id`),
  KEY `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcriber`
--

INSERT INTO `subcriber` (`id`, `patient_id`, `doctor_id`) VALUES
(8, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `firstname`, `lastname`) VALUES
(1, 'admin', 'Dilusha', 'Madushan'),
(3, 'doctor', 'Bimal', 'Perera'),
(4, 'doctor', 'Kamala', 'Fernando'),
(5, 'patient', 'Bimsara', 'Bodaragama'),
(6, 'patient', 'David', 'John'),
(7, 'patient', 'Kasun', 'Panduka'),
(14, 'chat_admin', 'Chat', 'Bot'),
(15, 'patient', 'Amila', 'Gunapala'),
(16, 'patient', 'David', 'Johny'),
(17, 'patient', 'David', 'Johny'),
(18, 'patient', 'David', 'Johny'),
(19, 'patient', 'David', 'Johny'),
(20, 'patient', 'David', 'Johny'),
(21, 'patient', 'Jude', 'Benadic'),
(22, 'patient', 'Ado', 'Fernando'),
(23, 'doctor', 'Kasun', 'Gunapala'),
(24, 'doctor', 'Sankalana', 'Gunapala'),
(25, 'patient', 'Panduka', 'Abe');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `user_admin` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `receiver_id` FOREIGN KEY (`receiver`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sender_id` FOREIGN KEY (`sender`) REFERENCES `user` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `prescription_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `doctor_rate` FOREIGN KEY (`doctor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_rate` FOREIGN KEY (`patient_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `subcriber`
--
ALTER TABLE `subcriber`
  ADD CONSTRAINT `doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
