-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 03:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooloozedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `prof_extra_data`
--

CREATE TABLE `prof_extra_data` (
  `prof_extra_data_id` int(11) NOT NULL,
  `prof_subject` varchar(25) COLLATE utf8_bin NOT NULL,
  `consultation_time` datetime NOT NULL,
  `years_experiance` int(11) NOT NULL,
  `subject_literature` longtext COLLATE utf8_bin NOT NULL,
  `subject_syllabus` longtext COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Učenik'),
(2, 'Profesor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `surname` varchar(20) COLLATE utf8_bin NOT NULL,
  `birthdate` date NOT NULL,
  `id_number` int(11) NOT NULL,
  `jmbg` varchar(13) COLLATE utf8_bin NOT NULL,
  `gender` enum('male','female') COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin NOT NULL,
  `profile_picture` longtext COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `motto` varchar(128) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `surname`, `birthdate`, `id_number`, `jmbg`, `gender`, `description`, `profile_picture`, `address`, `email`, `username`, `password`, `motto`, `role_id`) VALUES
(1, 'Lebron', 'Džejms', '2000-10-03', 6891763, '0310000710589', 'male', 'LA Laker', 'NULL', 'Salvadora Aljendea 16', 'lebron@gmail.com', 'KingJames', 'lebron123', 'Inspirativni moto', 2),
(2, 'Kajri', 'Irving', '2000-02-11', 4876542, '1102000710165', 'male', 'BKN Net', 'NULL', 'Matice Srpske 60', 'kajri@gmail.com', 'UncleDrew', 'kajri456', 'Inspirativni moto #2', 1),
(3, 'Kevin', 'Lav', '2000-10-16', 8469470, '1610000710879', 'male', 'Cle Cavalier', 'NULL', 'Dr. Nika Miljanica 16', 'kevin@gmail.com', 'KLove', 'kevin123', 'Inspirativni moto #3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prof_extra_data`
--
ALTER TABLE `prof_extra_data`
  ADD PRIMARY KEY (`prof_extra_data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `jmbg` (`jmbg`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prof_extra_data`
--
ALTER TABLE `prof_extra_data`
  MODIFY `prof_extra_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prof_extra_data`
--
ALTER TABLE `prof_extra_data`
  ADD CONSTRAINT `prof_extra_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
