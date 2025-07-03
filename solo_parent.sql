-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 10:03 AM
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
-- Database: `solo_parent`
--

-- --------------------------------------------------------

--
-- Table structure for table `familymembers`
--

CREATE TABLE `familymembers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `civil_status` enum('Single','Married','Widowed','Divorced') NOT NULL,
  `educational_attainment` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `monthly_income` decimal(10,2) DEFAULT NULL,
  `solo_parent_reason` longtext NOT NULL,
  `solo_parent_needs` longtext NOT NULL,
  `emer_name` varchar(20) NOT NULL,
  `emer_relationship` varchar(20) NOT NULL,
  `emer_address` varchar(20) NOT NULL,
  `emer_contact_num` int(11) NOT NULL,
  `solo_parent_card_number` varchar(30) NOT NULL,
  `date_issuances` date NOT NULL,
  `solo_parent_category` varchar(20) NOT NULL,
  `beneficiary_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familymembers`
--

INSERT INTO `familymembers` (`id`, `user_id`, `name`, `sex`, `relationship`, `age`, `birthdate`, `civil_status`, `educational_attainment`, `occupation`, `monthly_income`, `solo_parent_reason`, `solo_parent_needs`, `emer_name`, `emer_relationship`, `emer_address`, `emer_contact_num`, `solo_parent_card_number`, `date_issuances`, `solo_parent_category`, `beneficiary_code`) VALUES
(80, 74, 'Clark Garrett', 'Male', 'son', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, '123', 'qweqweh', 'Bellamy Clements', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(81, 75, 'Clark Garrett', 'Male', 'son', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'asdasd', 'asdasd asd', 'Bellamy Clements', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(82, 76, 'james', 'Male', 'brother', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'fgjfjfg ', 'dfhsrgh adfhdfh', 'james lagnas', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(83, 77, 'james', 'Male', 'brother', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'thjkghnsfgh adfhdf', ' sfgjhfgh sfghsfghsah', 'james lagnas', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(84, 78, 'james', 'Female', 'brother', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'uyjkfhjdghjs aerhaerg', 'aertart aertserte f', 'james lagnas', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(85, 79, 'james', 'Female', 'brother', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'urthsfg afd', ' afhsdfg sdfgsdfg', 'james lagnas', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141'),
(86, 80, 'james', 'Female', 'brother', 9, '2014-06-29', 'Single', 'elementary', 'student', 0.00, 'asdasd', 'asdasd', 'james lagnas', 'father', 'lower south hills ti', 909564585, '32132165', '2022-06-29', 'yes', '123456789141');

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
(10, 8, 'marben', 'friend', 25, '2025-02-27', 'developer'),
(11, 9, 'Anita', 'daughter', 10, '2025-03-17', 'none'),
(12, 10, '', '', 0, '0000-00-00', ''),
(13, 11, '', '', 0, '0000-00-00', ''),
(14, 12, '', '', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `workplace` varchar(100) DEFAULT NULL,
  `validate` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `idno`, `name`, `age`, `sex`, `status`, `date_of_birth`, `place_of_birth`, `home_address`, `occupation`, `religion`, `contact_no`, `icoe`, `icoecontact_no`, `pantawid`, `elementary`, `high_school`, `vocational`, `college`, `others`, `school`, `civic`, `community`, `workplace`, `validate`) VALUES
(8, 88988, 'Jerry gamboa', 24, 'Male', 'single', '2000-12-21', 'Tabaco Albay', 'cebu city', 'developer', 'roman catholic', '911211', 'Remedios Gamboa', 988988, 'yes', 'bagong lipunan elementary school', 'malate national highschool', 'dasma school', 'university of manila', '', 'barado', '', '', '', 'approved'),
(9, 201990, 'Mharben Rey Pude', 31, 'Male', 'single', '1999-11-02', 'Ceby', 'Tres de Abril', 'Developer', 'Roman Catholic', '+63 09123456789', 'Christopher De Leon', 63, 'yes', '', '', '', '', '', '', '', '', '', 'approved'),
(10, 1236, 'wilmar', 22, 'Male', 'single', '2003-01-09', 'Cebu city', 'lower south hills tisa', '', '', '0', 'asdasd', 154643, 'yes', '', '', '', '', '', '', '', '', '', 'approved'),
(11, 1236, 'cabigas', 23, 'Male', 'single', '0200-01-09', '', '', '', '', '09223464851', 'james', 928947315, 'yes', '', '', '', '', '', '', '', '', '', 'approved'),
(12, 1253, 'wilmar2', 12, 'Male', 'single', '2025-06-09', 'Cebu city', 'lower south hills tisa', 'student', 'catholic', '9223464851', 'kenjie', 928947315, 'yes', '', '', '', '', '', '', '', '', '', 'pending');

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

-- --------------------------------------------------------

--
-- Table structure for table `solo_parent`
--

CREATE TABLE `solo_parent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `id_no` int(20) NOT NULL,
  `philsys_card_number` int(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `address` varchar(50) NOT NULL,
  `civil_status` varchar(8) NOT NULL,
  `educational_attainment` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `company_agency` varchar(20) NOT NULL,
  `monthly_income` varchar(10) NOT NULL,
  `employment_status` varchar(10) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `pantawid_beneficiary` varchar(5) NOT NULL,
  `indigenous_person` varchar(5) NOT NULL,
  `are_you_a_migrant_worker` varchar(5) NOT NULL,
  `lgbtq` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `date_registered` date NOT NULL DEFAULT curdate(),
  `approved_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solo_parent`
--

INSERT INTO `solo_parent` (`id`, `user_id`, `fullname`, `id_no`, `philsys_card_number`, `date_of_birth`, `age`, `place_of_birth`, `sex`, `address`, `civil_status`, `educational_attainment`, `occupation`, `religion`, `company_agency`, `monthly_income`, `employment_status`, `contact_number`, `email_address`, `pantawid_beneficiary`, `indigenous_person`, `are_you_a_migrant_worker`, `lgbtq`, `status`, `date_registered`, `approved_by`) VALUES
(74, 25, 'Raiden Jones', 5749830, 23165732, '1997-05-01', 29, 'Cebu city', '', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '25000', '', '2147483647', 'RaidenJones@gmail.com', 'none', '', '', '', 'approved', '2025-07-03', '24'),
(75, 23, 'Raiden Jones', 5749830, 23165732, '1997-05-01', 29, 'Cebu city', '', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '25000', '', '2147483647', 'RaidenJones@gmail.com', 'none', 'no', 'no', 'no', 'pending', '2025-07-03', NULL),
(76, 23, 'Joelle Kramer', 5749830, 23165732, '1997-05-01', 29, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '25000', '', '2147483647', 'JoelleKramer@gmail.com', 'none', 'no', 'no', 'no', 'approved', '2025-07-03', '24'),
(77, 23, 'Bailee Lucero', 45753453, 2147483647, '1997-05-01', 29, 'Cebu city', 'female', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '40000', '', '2147483647', 'BaileeLucero@gmail.com', 'none', 'no', 'no', 'no', 'pending', '2025-07-03', NULL),
(78, 25, 'Raiden Jones', 5327537, 2147483647, '1997-05-01', 29, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '40000', '', '2147483647', 'RaidenJones@gmail.com', 'none', 'no', 'no', 'no', 'pending', '2025-07-03', NULL),
(79, 23, 'Sophia Calderon', 5327537, 2147483647, '1997-05-01', 29, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '40000', '', '09289479044', 'SophiaCalderon@gmail.com', '', '', 'no', 'no', 'pending', '2025-07-03', NULL),
(80, 23, 'Ryder Lowe', 2626, 985662, '2025-07-28', 23, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'high school ', 'student', 'catholic', 'None', '40000', '', '09223765285', 'RyderLowe@gmail.com', 'none', 'no', 'no', 'no', 'pending', '2025-07-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `role`) VALUES
(23, NULL, 'char', 'c@gmail.com', '$2y$10$t/PhZhm/lQCQoE5Swfmoi.PiurzbwEKV6TF2LaYxuD6eciIre70J6', 'user'),
(24, NULL, 'admin', 'ad@gmail.com', '$2y$10$6JltGmu4FjfLoPW0c.iKhuaNV2TlVeRHwvkCwvos/Iy14dDEL0.HW', 'admin'),
(25, NULL, 'user', 'k@gmail.com', '$2y$10$9aglBJEbCgdDHy1iOjVC/Oo2OwGN/yKq8kQSWtljtGiqhk6JYnSNm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familymembers`
--
ALTER TABLE `familymembers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `solo_parent`
--
ALTER TABLE `solo_parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seminars_members`
--
ALTER TABLE `seminars_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solo_parent`
--
ALTER TABLE `solo_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familymembers`
--
ALTER TABLE `familymembers`
  ADD CONSTRAINT `familymembers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `solo_parent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `solo_parent`
--
ALTER TABLE `solo_parent`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
