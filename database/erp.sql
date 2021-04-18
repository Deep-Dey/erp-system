-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 04:30 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1111, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Deep', 'd@gmail.com', '5555555555'),
(2, 'Dep', '12@gmail.com', '5000000000'),
(7, 'deep20998', 'deep@gmail.com', '8697448896'),
(9, 'Deep Dey', 'deepdey20998@gmail.com', '8697448896');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(1, 'Programming in C'),
(2, 'Programming in C++'),
(3, 'Programming in Python');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` varchar(10) NOT NULL,
  `candidate_email` varchar(40) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `total_amount` int(5) NOT NULL,
  `installmet_amount` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `candidate_email`, `course_name`, `total_amount`, `installmet_amount`, `date`) VALUES
('AKPsR9Vfpc', 'deepdey20998@gmail.com', 'Programming in C', 200, 200, '2021-04-25'),
('bsgnIkXomR', 'deep@gmail.com', '', 500, 500, '2021-04-22'),
('fCtZibeO4F', 'deep@gmail.com', 'Programming in C', 500, 500, '2021-04-28'),
('FMe9DIkEa2', 'deepdey20998@gmail.com', 'Programming in Python', 500, 500, '2021-04-24'),
('fswTDLmbWj', 'deepdey20998@gmail.com', 'Programming in Python', 500, 500, '2021-04-17'),
('M13Yb9A7cT', 'deep@gmail.com', 'Programming in Python', 500, 500, '2021-04-24'),
('uRw36GZQE5', 'deepdey20998@gmail.com', 'Programming in C++', 500, 500, '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` varchar(10) NOT NULL,
  `candidate_email` varchar(40) NOT NULL,
  `enrollment_id` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `candidate_email`, `enrollment_id`, `amount`, `date`, `reason`) VALUES
('3eVjvyqUsz', 'deep@gmail.com', 'bsgnIkXomR', 500, '2021-04-30', 'IHelo'),
('bLShoEUGfN', 'deepdey20998@gmail.com', 'FMe9DIkEa2', 500, '2021-04-30', 'asfsgb'),
('CIvgcnEx02', 'deepdey20998@gmail.com', 'AKPsR9Vfpc', 500, '2021-04-30', '500'),
('qILxHQ7BJ0', 'deep@gmail.com', 'fCtZibeO4F', 500, '2021-04-29', 'dawfef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
