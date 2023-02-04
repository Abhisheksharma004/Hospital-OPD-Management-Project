-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 08:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ademg`
--

CREATE TABLE `ademg` (
  `id` int(255) NOT NULL,
  `invoiceid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ptname` varchar(255) NOT NULL,
  `parname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ademg`
--

INSERT INTO `ademg` (`id`, `invoiceid`, `date`, `ptname`, `parname`, `age`, `address`, `contact`) VALUES
(22, 'JIT04EMG0000', '22/01/2023', 'Abhishek', 'shiv ji', '21y', 'garkha', '7894651320');

-- --------------------------------------------------------

--
-- Table structure for table `adminreg`
--

CREATE TABLE `adminreg` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adopd`
--

CREATE TABLE `adopd` (
  `id` int(255) NOT NULL,
  `invoiceid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ptname` varchar(255) NOT NULL,
  `parname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopd`
--

INSERT INTO `adopd` (`id`, `invoiceid`, `date`, `ptname`, `parname`, `age`, `bp`, `address`, `contact`, `gender`, `doctor`, `fees`, `user`) VALUES
(31, 'JIT04OPD0000', '28/01/2023', 'ABHISHEK', 'BP', '21Y', '180/20', 'GARKHA', '7894651320', 'MALE', ' DR. ABHISHEK ', ' 200 ', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `dischargetp`
--

CREATE TABLE `dischargetp` (
  `id` int(255) NOT NULL,
  `invoiceid` varchar(255) NOT NULL,
  `olddate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dischargedate` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dischargetp`
--

INSERT INTO `dischargetp` (`id`, `invoiceid`, `olddate`, `name`, `prname`, `age`, `contact`, `address`, `dischargedate`, `comment`, `user`) VALUES
(1, 'JIT04EMG0000', '22/01/2023', 'Abhishek', 'shiv ji', '21y', '7894651320', 'garkha', '22/01/2023', 'refer', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `drname` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doj`, `drname`, `specialist`, `qualification`, `fees`, `address`, `contact`) VALUES
(1, '2023-01-04', 'DR. ABHISHEK', 'CHILD', 'MBBS MD', '200', 'GARKHA', '7894561230'),
(2, '2023-01-04', 'DR. ABHISHEK SHARMA', 'DEMOTLIGIST', 'MBBS MD AIIMS', '250', 'GARKHA', '7764936310'),
(3, '2023-01-06', 'DR. RUPESH SHARMA', 'NA', 'RMS PATNA', '300', 'GARKHA', '7279937535'),
(4, '2023-01-08', 'DR. RUPESH RANJAN SHARMA', 'GYANOLOGY', 'MBBS MD AIIMS', '500', 'GARKHA', '8529637410'),
(5, '2023-01-19', 'DR DEEPAK', 'NA', 'MBBS MD', '1000', 'SDFS', '894651320');

-- --------------------------------------------------------

--
-- Table structure for table `renewalopd`
--

CREATE TABLE `renewalopd` (
  `id` int(255) NOT NULL,
  `invoiceid` varchar(255) NOT NULL,
  `olddate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renewalopd`
--

INSERT INTO `renewalopd` (`id`, `invoiceid`, `olddate`, `name`, `prname`, `age`, `contact`, `gender`, `doctor`, `fees`, `date`, `user`) VALUES
(1, 'JIT04OPD0001', '17/01/2023', 'ABHISHEK KUMAR RANJAN SHARMA VISHWAKARMA ', 'BHARAT PANDEY VISHWAKARMA', '21Y', '7894561230', 'MALE', ' DR. RUPESH RANJAN SHARMA ', ' 500 ', '20/01/2023', 'aman'),
(2, 'JIT04OPD0002', '17/01/2023', 'SONU KUMAR', 'SINGH JI', '15', '7894561230', 'MALE', ' DR. RUPESH RANJAN SHARMA ', ' 500 ', '20/01/2023', 'aman'),
(3, 'JIT04OPD0000', '17/01/2023', 'ABHISHEK', 'BHARAT PANDEY VISHWAKARMA', '21Y', '7764936310', 'MALE', ' DR. ABHISHEK ', ' 200 ', '20/01/2023', 'ABHISHEK SHARMA'),
(4, 'JIT04OPD0000', '17/01/2023', 'ABHISHEK', 'BHARAT PANDEY VISHWAKARMA', '21Y', '', 'MALE', ' DR. ABHISHEK ', ' 200 ', '20/01/2023', 'ABHISHEK SHARMA'),
(5, 'JIT04OPD0002', '17/01/2023', 'SONU KUMAR', 'SINGH JI', '15', '7894561230', 'MALE', ' DR. RUPESH RANJAN SHARMA ', 'NA', '22/01/2023', 'ABHISHEK SHARMA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `idcard` varchar(255) NOT NULL,
  `isAdmin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `doj`, `fname`, `email`, `mobile`, `password`, `cpassword`, `address`, `idcard`, `isAdmin`) VALUES
(1, 'ABHISHEK SHARMA', '2023-01-05', 'B PANDEY', 'abhi@gmail.com', '7764936310', 'Abhi@2022', '$2y$10$csx1exTZbgY1TSiT7TbLjew3uOgV/PR5SAd1hissEVr4B4o6cXyZG', 'garkha', '623881661860', 0),
(2, 'RUPESH SHARMA', '2023-01-05', 'SHARMA', 'rupesh@gmail.com', '7279937535', 'Abhi@2022', '$2y$10$Y2NJwjPZukmcTBR.BEPok.LZwSiFmHuUiMHbv695wu1xak00Bkw42', 'garkha', '623881661860', 0),
(3, 'aman', '', '', 'aman@gmail.com', '7764936310', 'aman', '$2y$10$GoJBEBczUx/MqLbkZkg68OPzTUv.YTBSraocy7pCm88dkFyGy047G', '', '', 1),
(4, 'ram', '2023-01-13', 'aman', 'aman@ama.com', '7894562130', 'Abhi@2022', '$2y$10$q/6432SziHftRqFXrEUabuI1xagH.PE/yUu2nB/sZV6ow9IxGMmDO', 'garkha', '623881661860', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ademg`
--
ALTER TABLE `ademg`
  ADD PRIMARY KEY (`id`,`invoiceid`);

--
-- Indexes for table `adminreg`
--
ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopd`
--
ALTER TABLE `adopd`
  ADD PRIMARY KEY (`id`,`invoiceid`);

--
-- Indexes for table `dischargetp`
--
ALTER TABLE `dischargetp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewalopd`
--
ALTER TABLE `renewalopd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ademg`
--
ALTER TABLE `ademg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `adminreg`
--
ALTER TABLE `adminreg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `adopd`
--
ALTER TABLE `adopd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dischargetp`
--
ALTER TABLE `dischargetp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `renewalopd`
--
ALTER TABLE `renewalopd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
