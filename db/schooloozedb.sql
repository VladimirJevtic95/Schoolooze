-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 11:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `feeling_status`
--

CREATE TABLE `feeling_status` (
  `status_id` int(11) NOT NULL,
  `status_description` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feeling_status`
--

INSERT INTO `feeling_status` (`status_id`, `status_description`) VALUES
(1, 'Happy'),
(2, 'Okay'),
(3, 'Not great'),
(4, 'Silly'),
(5, 'Upset'),
(6, 'Thoughtful'),
(7, 'Confused'),
(8, 'Worried'),
(9, 'Scared'),
(10, 'Sad'),
(11, 'Annoyed'),
(12, 'Angry'),
(13, 'Peaceful'),
(14, 'Sick'),
(15, 'Tired'),
(16, 'Like A BOSS'),
(17, 'Gucci');

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
  `userid` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `birth_date` date NOT NULL,
  `personal_id_number` int(11) NOT NULL,
  `jmbg` varchar(13) COLLATE utf8_bin NOT NULL,
  `gender` varchar(7) COLLATE utf8_bin DEFAULT NULL,
  `user_description` tinytext COLLATE utf8_bin,
  `profile_image_lq` longtext COLLATE utf8_bin,
  `profile_image_hq` longtext COLLATE utf8_bin,
  `user_address` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(256) COLLATE utf8_bin NOT NULL,
  `motto` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `feeling_status_fk` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `role_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `first_name`, `last_name`, `birth_date`, `personal_id_number`, `jmbg`, `gender`, `user_description`, `profile_image_lq`, `profile_image_hq`, `user_address`, `email`, `username`, `user_password`, `motto`, `feeling_status_fk`, `register_date`, `role_id_fk`) VALUES
(4, 'Vladimir', 'Jevtic', '1995-07-17', 4014, '1707995606425', 'Male', 'pass i user su isti', 'LQ_Vladimir_Jevtic_profile_image_60df71a4bd4796.67290605.jpg', 'Vladimir_Jevtic_profile_image_60df71a4bd4796.67290605.jpg', 'Obchodná 24', 'atomcobra@gmail.com', 'kek123!', '$2y$10$SuD9/3u7egMHo4GYo.y9P.MwvOGnRfIx0a.jMVbD/0z3l5R9bzlUq', 'hovvaaaaaa', 12, '2021-07-02', 2),
(5, 'Marko', 'Markovic', '2005-08-28', 50610, '2808005452685', 'Male', 'student rola boii', 'LQ_MArko_MArkovic_profile_image_60df72a1025df3.86416605.jpg', 'MArko_MArkovic_profile_image_60df72a1025df3.86416605.jpg', 'Makedonska 21', 'email@gmail.com', 'mare2211', '$2y$10$YRjro/0iwFHuZ2JXZsV5muuttLaJgo7v.jo/xkqDfWGprDk3LKmqm', '-.-', 4, '2021-07-02', 1),
(6, 'Ana', 'Anic', '2015-09-17', 77464, '1709015558642', 'Female', 'nesto', 'LQ_Ana_Anic_profile_image_60df7bf2c177a7.05245868.jpg', 'Ana_Anic_profile_image_60df7bf2c177a7.05245868.jpg', 'Trgovacka ulica 532', 'keklara@yahoo.com', 'jos221', '$2y$10$9JwEC5RVgqSrOX384IxouO9hFvKSMlVHldHZT8p0RDFtddu6LmOyC', '.......', 17, '2021-07-02', 1),
(7, 'Barry', 'Allen', '2003-04-19', 43321112, '1904003545782', 'Male', 'das', 'LQ_Barry_Allen_profile_image_60df7db46a00e4.15373877.jpg', 'Barry_Allen_profile_image_60df7db46a00e4.15373877.jpg', 'Obchodná 24', 'atomcobra@gmail.com', 'flash', '$2y$10$n/Jdx0MaEnW.Vttc4Nf/XeLqEeNpH3u.B6G3iPQ4ZRDe3cTnsTOY.', 'run', 2, '2021-07-02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeling_status`
--
ALTER TABLE `feeling_status`
  ADD PRIMARY KEY (`status_id`);

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
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `jmbg` (`jmbg`),
  ADD KEY `role_id` (`role_id_fk`),
  ADD KEY `feeling_status` (`feeling_status_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeling_status`
--
ALTER TABLE `feeling_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prof_extra_data`
--
ALTER TABLE `prof_extra_data`
  ADD CONSTRAINT `prof_extra_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`feeling_status_fk`) REFERENCES `feeling_status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
