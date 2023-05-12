-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 06:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unique-events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usname` varchar(50) NOT NULL,
  `pswd` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `usname`, `pswd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `ename` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `edate` date NOT NULL,
  `etime` time NOT NULL,
  `ville` varchar(50) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nbrpersonnes` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `id_organisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `ename`, `description`, `edate`, `etime`, `ville`, `localisation`, `type`, `nbrpersonnes`, `source`, `id_organisateur`) VALUES
(21, 'match de foot', 'metch de foot 5 vs 5', '2023-04-30', '20:50:00', 'marrakech', 'LOT ISSIL RAFIAA BEN KHODIJ APPART N 369', '', 8, 'util-images/f7f77a6c18887d72a0fc9f3c4dd3e34700955443.jpg', 9),
(22, 'match de basket', 'match 5 v 5 merci de bien apporter les bons chaussures', '2023-04-28', '23:08:00', 'agadir', 'Rafik ben Oubada 356', '', 6, 'util-images/85f0f3182f8fbc9ea1e9cb6e4865227106ef50f9.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `bdate` date NOT NULL,
  `uname` varchar(40) NOT NULL,
  `pswd` varchar(40) NOT NULL,
  `rno` varchar(40) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `numtel` varchar(50) NOT NULL,
  `source` varchar(255) NOT NULL,
  `e1` varchar(40) NOT NULL DEFAULT '0',
  `e2` varchar(40) NOT NULL DEFAULT '0',
  `e3` varchar(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `bdate`, `uname`, `pswd`, `rno`, `emailid`, `ville`, `numtel`, `source`, `e1`, `e2`, `e3`) VALUES
(9, 'dallouli', 'zakaria', '0000-00-00', 'dallouli', '123', '', 'ziko.dallouli01@gmail.com', 'RABAT', '0654481676', 'util-images/e238d7edaacdae57f6bd8ab814db3a205f670a3b.jpg', 'Match de foot', '0', '0'),
(10, 'hamid', 'hamadi', '0000-00-00', 'hamid', '123', '', 'hamid@gmail.com', 'agadir', '065659523', 'util-images/95d23bce0e29ea1b905115a53d7be8f0ba0fe976.jpg', 'match de foot', 'match basket', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_10` (`id_organisateur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`id_organisateur`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
