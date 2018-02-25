-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2018 at 07:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IKAdb`
--
CREATE DATABASE IF NOT EXISTS `IKAdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `IKAdb`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `amka` varchar(30) NOT NULL,
  `id_number` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `employer_amka` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`name`, `surname`, `amka`, `id_number`, `category`, `employer_amka`) VALUES
('ÎÎ¹ÎºÏŒÎ»Î±Î¿Ï‚', 'Î—Î»Î¹ÏŒÏ€Î¿Ï…Î»Î¿Ï‚', '455657444', '4566BE', '2', '65346574433');

-- --------------------------------------------------------

--
-- Table structure for table `pension_request`
--

CREATE TABLE `pension_request` (
  `amka` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `amka` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `surname`, `amka`, `type`, `id_number`) VALUES
('ap@gmai.com', '5656', 'Î—Î»Î¯Î±Ï‚', 'Î‘Ï€Î¿ÏƒÏ„ÏŒÎ»Î¿Ï…', '625743245', '4', '6832AN'),
('dim@gmail.com', '1212', 'Î‘Î¸Î±Î½Î¬ÏƒÎ¹Î¿Ï‚', 'Î”Î·Î¼Î·Ï„ÏÎ¯Î¿Ï…', '46346346634', '3', '3546MN'),
('ipapd@gmail.com', '1234', 'Î™ÏƒÎ¼Î®Î½Î·', 'Î Î±Ï€Î±Î´Î¬ÎºÎ·', '64576868548', '1', '5574A'),
('thsid@gmail.com', '1234', 'Î˜Ï‰Î¼Î¬Ï‚', 'Î£Î¹Î´Î­ÏÎ·Ï‚', '65346574433', '2', '4637B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pension_request`
--
ALTER TABLE `pension_request`
  ADD PRIMARY KEY (`amka`),
  ADD UNIQUE KEY `amka` (`amka`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `amka` (`amka`),
  ADD UNIQUE KEY `id_number` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
