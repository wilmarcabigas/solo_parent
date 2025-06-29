-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 03:37 AM
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
  `solo_parent_card_number` int(30) NOT NULL,
  `date_issuances` date NOT NULL,
  `solo_parent_category` varchar(20) NOT NULL,
  `beneficiary_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familymembers`
--

INSERT INTO `familymembers` (`id`, `user_id`, `name`, `sex`, `relationship`, `age`, `birthdate`, `civil_status`, `educational_attainment`, `occupation`, `monthly_income`, `solo_parent_reason`, `solo_parent_needs`, `emer_name`, `emer_relationship`, `emer_address`, `emer_contact_num`, `solo_parent_card_number`, `date_issuances`, `solo_parent_category`, `beneficiary_code`) VALUES
(21, 34, 'gamboa', 'Female', 'fsrfsrf', 5, '2024-10-31', 'Married', 'college Level', 'iT Dev', 433434.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(22, 35, 'marga', 'Female', 'sister', 6, '2024-10-30', 'Married', 'college Level', 'iT Dev', 64.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(23, 35, 'jobert', 'Male', 'father', 3, '2024-10-31', 'Married', 'College Grad', 'N/A', 54.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(24, 35, 'guzman', 'Male', 'son', 2, '2024-11-01', 'Married', 'college Level', 'iT Dev', 34.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(25, 36, 'mharben', 'Male', 'drgdt', 3, '2024-10-31', 'Single', 'college Level', 'N/A', 0.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(26, 36, 'ericson', 'Male', 'vdrg', 5, '2024-10-31', 'Single', 'college Level', 'N/A', 0.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(27, 36, 'mharben', 'Male', 'drgdt', 3, '2024-10-31', 'Single', 'college Level', 'N/A', 0.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(28, 37, 'mmmm', 'Male', 'brother', 1, '2024-11-05', 'Single', 'college Level', 'iT Dev', 53645.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(29, 37, 'aaaa', 'Female', 'sister', 2, '2024-11-06', 'Married', 'College Grad', 'N/A', 0.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(30, 38, 'iiiiii', 'Male', 'fsrfsrf', 5, '2024-11-06', 'Single', 'college Level', 'iT Dev', 1235.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(31, 38, 'pppp', 'Female', 'brother', 6, '2024-11-07', 'Divorced', 'College Grad', 'iT Dev', 34536.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(32, 39, 'layka', 'Female', 'daughter', 4, '2024-10-29', 'Single', 'college Level', 'iT Dev', 343.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(33, 39, 'josh', 'Male', 'father', 7, '2024-10-30', 'Married', 'college Level', 'N/A', 343.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(34, 39, 'janice', 'Female', 'mother', 9, '2024-10-31', 'Married', 'College Grad', 'none', 43445.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(35, 39, 'ethan', 'Male', 'son', 9, '2024-11-01', 'Single', 'College Grad', 'iT Dev', 35345.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0),
(36, 39, 'gabriel', 'Male', 'son', 3, '2024-11-15', 'Single', 'college Level', 'N/A', 3453.00, '', '', '', '', '', 0, 0, '0000-00-00', '', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
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
  `fullname` varchar(20) NOT NULL,
  `philsys_card_number` int(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `address` varchar(50) NOT NULL,
  `civil_status` varchar(8) NOT NULL,
  `educational_attainment` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `company_agency` varchar(20) NOT NULL,
  `monthly_income` varchar(10) NOT NULL,
  `employment_status` varchar(10) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `pantawid_beneficiary` varchar(5) NOT NULL,
  `indigenous_person` varchar(5) NOT NULL,
  `are_you_a_migrant_worker` varchar(5) NOT NULL,
  `lgbtq` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solo_parent`
--

INSERT INTO `solo_parent` (`id`, `fullname`, `philsys_card_number`, `date_of_birth`, `age`, `place_of_birth`, `sex`, `address`, `civil_status`, `educational_attainment`, `occupation`, `religion`, `company_agency`, `monthly_income`, `employment_status`, `contact_number`, `email_address`, `pantawid_beneficiary`, `indigenous_person`, `are_you_a_migrant_worker`, `lgbtq`) VALUES
(26, 'layla', 3453453, '2024-11-07', 23, 'Palompon, Leyte', 'male', 'bato cebu', 'Single', 'College Level', 'IT Developers', 'Catholic', 'cityhall', '2323', 'employed', 9876543, 'jjose@gmail.com', 'no', 'no', 'no', 'no'),
(27, 'Jeremy Gamboa', 2147483647, '2024-11-02', 34, 'Palompon, Leyte', 'female', 'address', 'Single', 'college graduate', 'Student', 'Catholic', 'BGC', '2333454', 'employed', 2147483647, 'barron@gmail.com', 'no', 'no', 'no', 'no'),
(28, 'rer', 3544, '2024-11-14', 34, 'Makawa, Aloran, Misamis, Occidental', 'male', 'bohol', 'Single', 'College grad', 'artist', 'Catholic', 'BGC', '54354', 'employed', 908787, 'jjose@gmail.com', 'no', 'no', 'no', 'no'),
(29, 'gdr', 4234, '2024-11-06', 12, 'Palompon, Leyte', 'male', 'bettrte5', 'Single', 'college', 'singerist', 'Catholic', 'N/A', '4345', 'employed', 987, 'msnfus@gmail.com', 'no', 'no', 'yes', 'no'),
(30, 'fvdgd', 2147483647, '2024-11-08', 34, 'Palompon, Leyte', 'male', 'bohol', 'Single', 'HOKAGE', 'singerist', 'Catholic', 'N/A', '645454', 'employed', 98765, 'uzumaki@gmail.com', 'yes', 'yes', 'no', 'no'),
(31, 'hftbdd', 2147483647, '2024-11-15', 34, 'talisay', 'male', 'bohol', 'Single', 'College grad', 'IT DEV', 'Catholic', 'Crown Regency', '45644', 'employed', 987654, 'jjose@gmail.com', 'no', 'no', 'no', 'no'),
(32, 'sff', 45464345, '2024-11-05', 12, 'Palompon, Leyte', 'male', 'bohol', 'Single', 'College grad', 'artist', 'Catholic', 'N/A', '342', 'employed', 9876, 'barron@gmail.com', 'no', 'yes', 'no', 'no'),
(33, 'hgdgd', 2147483647, '2024-11-05', 34, 'Palompon, Leyte', 'male', '7C F. PACAÑA PUNTA PRINCESA CEBU CITY', 'Single', 'College Level', 'IT DEV', 'Catholic', 'N/A', '34544', 'employed', 2147483647, 'uzumaki@gmail.com', 'no', 'no', 'no', 'no'),
(34, 'mharben', 2147483647, '2024-11-27', 34, 'Makawa, Aloran, Misamis, Occidental', 'male', 'Cebu, City', 'Single', 'College Level', 'Student', 'Catholic', 'BGC', '344545', 'employed', 987654, 'uzumaki@gmail.com', 'no', 'no', 'no', 'no'),
(35, 'marj', 24343, '2024-11-12', 34, 'Washington Hospital', 'female', 'usa', 'Single', 'College Level', 'IT Developers', 'Catholic', 'BGC', '34323', 'employed', 97654, 'uzumaki@gmail.com', '', 'yes', 'yes', 'yes'),
(36, 'Jerico Rosales', 456757, '2024-11-01', 34, 'manila', 'male', 'tondo', 'Single', 'college grad', 'artist', 'Catholic', 'abscbn', '2345435', 'employed', 2147483647, 'msnfus@gmail.com', 'no', 'no', 'yes', 'yes'),
(37, 'ouewer', 786786, '2024-11-14', 23, 'Palompon, Leyte', 'male', '7C F. PACAÑA PUNTA PRINCESA CEBU CITY', 'Single', 'College grad', 'HOKAGE', 'Catholic', 'cityhall', '54675', 'employed', 2147483647, 'uzumaki@gmail.com', 'no', 'yes', 'yes', 'yes'),
(38, 'mike', 1111111112, '2024-11-01', 90, 'canada', 'male', 'new york', 'Single', 'college grad', 'IT Developers', 'Catholic', 'cityhall', '3232323', 'employed', 93333333, 'jjose@gmail.com', 'yes', 'yes', 'yes', 'yes'),
(39, 'Mike Tyson', 2147483647, '2024-10-30', 45, 'Bantayan Island', 'male', 'Cebu, City', 'Single', 'College grad', 'singerist', 'Catholic', 'BGC', '345', 'employed', 2147483647, 'fsfsfs@gmail.com', '32343', 'no', 'yes', 'yes'),
(40, 'ALPHA 1', 563653, '2024-10-31', 34, 'Palompon, Leyte', 'male', '7C F. PACAÑA PUNTA PRINCESA CEBU CITY', 'Single', 'college graduate', 'IT Developers', 'Catholic', 'N/A', '32424', 'employed', 2147483647, 'uzumaki@gmail.com', 'N/A', 'yes', 'no', 'no');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminars_members`
--
ALTER TABLE `seminars_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solo_parent`
--
ALTER TABLE `solo_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
