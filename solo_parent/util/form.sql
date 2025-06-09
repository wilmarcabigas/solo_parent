-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 09:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `user_id`, `name`, `relationship`, `age`, `birthday`, `occupation`) VALUES
(6, 5, 'eric', 'son', 10, '2025-02-06', 'na'),
(7, 6, 'Jomar Gamboa', 'Sibling', 28, '1997-10-27', 'English Teacher'),
(8, 6, 'Jose Gamboa Jr', 'Sibling', 25, '1999-07-27', 'Mechanical Engineering'),
(9, 7, 'kakak', '', 0, '0000-00-00', ''),
(10, 8, 'marben', 'friend', 25, '2025-02-27', 'developer'),
(11, 9, 'Anita', 'daughter', 10, '2025-03-17', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `idno` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` enum('Male','Female','Other') DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `icoe` varchar(200) NOT NULL,
  `icoecontact_no` int(20) NOT NULL,
  `pantawid` varchar(50) DEFAULT NULL,
  `elementary` varchar(100) DEFAULT NULL,
  `high_school` varchar(100) DEFAULT NULL,
  `vocational` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `civic` varchar(100) DEFAULT NULL,
  `community` varchar(100) DEFAULT NULL,
  `workplace` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `idno`, `name`, `age`, `sex`, `status`, `date_of_birth`, `place_of_birth`, `home_address`, `occupation`, `religion`, `contact_no`, `icoe`, `icoecontact_no`, `pantawid`, `elementary`, `high_school`, `vocational`, `college`, `others`, `school`, `civic`, `community`, `workplace`) VALUES
(5, 12210, 'Janice De Belen', 54, 'Female', 'married', '0000-00-00', 'Makati', 'Manila Philippines', 'Artist', 'Catholic', '091323222', '0', 987112112, '0', '', '', '', '', '', '', '', '', ''),
(6, 19884618, 'Jeremy Gamboa', 24, 'Male', 'single', '0000-00-00', 'Tabaco Albay', 'cebu city', 'developer', 'roman catholic', '9312089858', 'Remedios Gamboa', 2147483647, 'yes', 'Completed', 'Completed', 'N/A', 'Graduating', 'N/A', 'Forums On HIV/AIDS', 'Forums on UNCRC', 'Forums on VAWC', 'Forums on Computer Ethics'),
(7, 1000, 'Ericson Anuada', 27, 'Male', 'single', '1999-10-29', 'Cebu', 'Cebu', 'Developer', 'Christian', '96676667', 'Jeremy Gamboa- his boss', 2147483647, 'yes', '', '', '', '', '', '', '', '', ''),
(8, 88988, 'Jerry gamboa', 24, 'Male', 'single', '2000-12-21', 'Tabaco Albay', 'cebu city', 'developer', 'roman catholic', '911211', 'Remedios Gamboa', 988988, 'yes', 'bagong lipunan elementary school', 'malate national highschool', 'dasma school', 'university of manila', '', 'barado', '', '', ''),
(9, 201990, 'Mharben Rey Pude', 31, 'Male', 'single', '1999-11-02', 'Ceby', 'Tres de Abril', 'Developer', 'Roman Catholic', '998998989', 'Christopher De Leon', 94454454, 'yes', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seminars_members`
--

CREATE TABLE `seminars_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `organizer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminars_members`
--
ALTER TABLE `seminars_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminars_members`
--
ALTER TABLE `seminars_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_members`
--
ALTER TABLE `family_members`
  ADD CONSTRAINT `family_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seminars_members`
--
ALTER TABLE `seminars_members`
  ADD CONSTRAINT `seminars_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
