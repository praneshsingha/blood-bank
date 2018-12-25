-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 03:30 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital_reg`
--

CREATE TABLE `hospital_reg` (
  `h_id` varchar(100) NOT NULL,
  `h_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pss_reset` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_reg`
--

INSERT INTO `hospital_reg` (`h_id`, `h_name`, `email`, `phone`, `password`, `pss_reset`, `type`, `question`, `answer`) VALUES
('hos001', 'narayana', 'narayanahospital@narayana.com', 7894561234, 'pkw8t3XM8A9jg', '5c14d707239ca', 'hospital', 'What was the name of your first school', 'jnv'),
('hos002', 'hospital1', 'hospitan2@hs.com', 7894567894, 'pkwRmTy3Q5UxI', NULL, 'hospital', 'what is your pet name', 'tom'),
('hos003', 'hospital3', 'hospitan3@hs.com', 7894567894, 'pk.gbonyPEJRA', NULL, 'hospital', 'What is your car name', 'lambo');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` varchar(100) NOT NULL,
  `b_id` varchar(100) NOT NULL,
  `hosptl_id` varchar(100) NOT NULL,
  `hosptl_name` varchar(200) NOT NULL,
  `blg_grp` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `b_id`, `hosptl_id`, `hosptl_name`, `blg_grp`, `email`, `full_name`, `phone`, `date`, `time`, `status`) VALUES
('5c151d3413681', '5c151c6cae4fd', 'hos003', 'HOSPITAL3', 'O pos', 'ram@gmail.com', 'ram', 7897485745, '2018-12-15', '08:56:44', 'pending'),
('5c151de0a184d', '5c151bc5cc95e', 'hos001', 'NARAYANA', 'A', 'customer2@gmail.com', 'customer 2', 7825654354, '2018-12-15', '08:59:36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `upload_blood`
--

CREATE TABLE `upload_blood` (
  `b_id` varchar(100) NOT NULL,
  `h_id` varchar(100) NOT NULL,
  `h_name` varchar(100) NOT NULL,
  `b_group` varchar(10) NOT NULL,
  `sample` varchar(400) NOT NULL,
  `qnty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_blood`
--

INSERT INTO `upload_blood` (`b_id`, `h_id`, `h_name`, `b_group`, `sample`, `qnty`) VALUES
('5c151bc5cc95e', 'hos001', 'NARAYANA', 'A', 'upload/5c151bc5cc977.jpg', 12),
('5c151bd06ce8a', 'hos001', 'NARAYANA', 'A nag', 'upload/5c151bd06ceb0.jpg', 5),
('5c151be642ef3', 'hos001', 'NARAYANA', 'A pos', 'upload/5c151be642f17.jpg', 7),
('5c151bef756fe', 'hos001', 'NARAYANA', 'B pos', 'upload/5c151bef75723.jpg', 4),
('5c151c20e7611', 'hos002', 'HOSPITAL1', 'O pos', 'upload/5c151c20e762b.jpg', 4),
('5c151c29070f6', 'hos002', 'HOSPITAL1', 'AB pos', 'upload/5c151c2907123.jpg', 5),
('5c151c2f76f5e', 'hos002', 'HOSPITAL1', 'AB', 'upload/5c151c2f76f75.jpg', 6),
('5c151c3702afa', 'hos002', 'HOSPITAL1', 'O pos', 'upload/5c151c3702b1d.jpg', 10),
('5c151c5e1bb34', 'hos003', 'HOSPITAL3', 'AB', 'upload/5c151c5e1bb51.jpg', 12),
('5c151c64b43af', 'hos003', 'HOSPITAL3', 'B', 'upload/5c151c64b43c7.jpg', 5),
('5c151c6cae4fd', 'hos003', 'HOSPITAL3', 'O pos', 'upload/5c151c6cae513.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `reg_id` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pss_reset` varchar(100) DEFAULT NULL,
  `blood_type` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` varchar(200) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`reg_id`, `name`, `email`, `phone`, `password`, `pss_reset`, `blood_type`, `gender`, `type`, `question`, `answer`) VALUES
('5c151966da960', 'ram', 'ram@gmail.com', 7897485745, 'pk2lBax.8mw4s', NULL, 'O pos', 'male', 'receiver', 'What was the name of your first school', 'abcd'),
('5c151d7775121', 'customer1', 'customer1@gmail.com', 7894789557, 'pklVONiku9xP2', NULL, 'AB pos', 'male', 'receiver', 'what is your pet name', 'tom'),
('5c151ddb1298c', 'customer 2', 'customer2@gmail.com', 7825654354, 'pkPsnyEGNZM9.', NULL, 'A', 'female', 'receiver', 'What is your car name', 'lambo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital_reg`
--
ALTER TABLE `hospital_reg`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `upload_blood`
--
ALTER TABLE `upload_blood`
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`reg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
