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
(55, 48, 'joji', 'Female', 'daughter', 2, '2024-10-16', 'Single', 'N/A', 'N/A', 0.00, 'sssssasdawdacsfgsvcaefasefasfasef', 'fsaefsrgetgsrgssethssdgsdrgsfdgsdgr', 'ako si amssuiaudfgha', 'Mother', 'bdgdrf', 2147483647, '0', '2024-11-26', 'Poor', '2147483647'),
(56, 49, 'Ron', 'Male', 'Brother', 12, '2024-11-29', 'Single', 'college Level', 'N/A', 23435.00, 'N/A', 'N/A', 'mom', 'mother', 'cebu city', 956854342, '0', '2024-11-29', 'Rich Poor', '876565645'),
(57, 52, 'ran', 'Male', 'Brother', 53, '2024-12-05', 'Divorced', 'mcefj', 'acdde', 1244.00, 'sdsfm aosfsirfnnfsr', 'nvjsdbvusrs', 'njbuse', 'mother', 'nkamwdani ', 998679867, '0', '2024-12-27', 'uyrtu', '5675656'),
(58, 53, 'Ron', 'Male', 'Brother', 43, '2024-12-04', 'Single', 'dcdv', 'sfsrf', 23234.00, 'ndvsfrvnsdjkfvsnjivr', 'xfdrgdg', 'bfbdfvnsdrsgk', 'mother', 'sdjcbsjhf', 98765432, '0', '2024-12-30', 'uyrtu', '53455646'),
(59, 54, 'nay', 'Female', 'daughter', 12, '2024-12-10', 'Single', 'mcefj', 'iT Dev', 1234243.00, 'asasdsdg', 'fsfsf', 'sdrg', 'mother', 'mknsiudrhgd', 99826347, '0', '2024-12-20', 'poor', '988765'),
(60, 55, 'gay-gay', 'Female', 'daughter', 4, '2022-11-30', 'Single', 'N/A', 'N/A', 0.00, 'amkmsoanrvnjvurbdjvnjrnfur', 'nvjndrjvbjdvnbjfv', 'Emilda', 'Mother', 'Danao, Cebu City', 2147483647, '0', '2024-12-10', 'Mid Category', '55555'),
(61, 55, 'ron-ron', 'Male', 'Son', 2, '2024-12-04', 'Single', 'N/A', 'N/A', 0.00, 'amkmsoanrvnjvurbdjvnjrnfur', 'nvjndrjvbjdvnbjfv', 'Emilda', 'Mother', 'Danao, Cebu City', 2147483647, '0', '2024-12-10', 'Mid Category', '55555'),
(62, 56, 'carla', 'Female', 'daughter', 12, '2024-12-10', 'Single', 'Elementary', 'N/A', 0.00, 'csefsfsf', 'fsfaefcda', 'Jessa', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-10', 'Poor', '660000'),
(63, 57, 'carlo', 'Male', 'Son', 3, '2024-12-10', 'Single', 'N/A', 'N/A', 0.00, 'casdasd', 'zsdzed', 'Jessa', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-10', '23424', '43535'),
(64, 58, 'carlo', 'Female', 'Brother', 1, '2024-12-05', 'Single', 'N/A', 'N/A', 0.00, 'vsdd', 'sdg', 'Jessa', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-04', 'Poor', '45674567'),
(65, 59, 'carlo1', 'Male', 'Brother', 2, '2024-12-10', 'Single', 'N/A', 'N/A', 0.00, 'ddr', 'drgdrg', 'Jessa1', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-10', 'Poor', '5454545'),
(67, 61, 'mochacha', 'Female', 'daughter', 2, '2024-12-11', 'Single', 'N/A', 'N/A', 0.00, 'abcdefghijklmnopqrstuvwxyz', 'nksnddbneubdsjandsjafshf', 'jason', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-12', '67655645', '456544'),
(68, 62, 'Von von', 'Male', 'Son', 2, '2022-12-12', 'Single', 'N/A', 'N/A', 0.00, 'mksmfijjsbuvyrd', 'bsjdvbsjrhbf', 'Michelle', 'Mother', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-16', 'Poor', '984637464'),
(69, 63, 'Von von', 'Male', 'Son', 2, '2024-12-16', 'Single', 'N/A', 'N/A', 0.00, 'abcdefghijklmnopqrstuvwxyz', 'mkanefbhwefweafa', 'Michelle', 'Sister', 'Mabolo, Cebu City', 2147483647, '0', '2024-12-16', 'Poor', '44444444'),
(70, 64, 'Ron-ron', 'Male', 'Son', 3, '2022-06-27', 'Single', 'N/A', 'N/A', 0.00, 'csdcasecasgdhbdfh erdv', 'gtgdgdtrhdbdfhhdt w5eggwgwg', 'Joselito D. Tolentin', 'Brother', 'Tisa, Labangon, Cebu', 2147483647, '0', '2024-12-02', '5455654', '435456'),
(71, 65, 'ethan co', 'Male', 'Son', 4, '2024-12-02', 'Single', 'N/A', 'N/A', 0.00, 'ndusaussnhrsr', 'ndvjsbrvhjbseruhbesb fbfshj', 'rapl', 'father', 'Tisa, Labangon, Cebu', 2147483647, '0', '2024-12-18', 'C', '767'),
(72, 67, 'jes', 'Female', 'Daughter', 17, '2024-02-13', 'Single', 'N/A', 'N/A', 0.00, 'Divorce', 'Financial Stability', 'Wa-El', 'Brother', 'BLK 1 Belgium St., B', 2147483647, '0', '2025-02-05', 'C', '0'),
(73, 67, 'jes', 'Female', 'Daughter', 17, '2024-02-13', 'Single', 'N/A', 'N/A', 0.00, 'Divorce', 'Financial Stability', 'Wa-El', 'Brother', 'BLK 1 Belgium St., B', 2147483647, '0', '2025-02-05', 'C', '0'),
(76, 70, 'jack', 'Male', 'Son2', 2, '2025-01-30', 'Single', 'N/A', 'N/A', 0.00, 'adsdawdasdawedwa ads  fsefsd  s', 'asdfas gfdas  sdfse sdfse', 'raymond', 'Brother', 'Cebu City', 2147483647, '323423432', '2025-02-18', 'C', 'AB'),
(77, 71, 'tomorrow', 'Male', 'son', 2, '2025-02-21', 'Single', 'n/a', 'n/a', 0.00, 'vshiusheffsef', 'sefsdvsgshdhr', 'mhbxyvhs', 'brother', 'cebu', 2147483647, '09678', '2025-02-21', 'C', 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `solo_parent`
--

CREATE TABLE `solo_parent` (
  `id` int(11) NOT NULL,
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

INSERT INTO `solo_parent` (`id`, `fullname`, `id_no`, `philsys_card_number`, `date_of_birth`, `age`, `place_of_birth`, `sex`, `address`, `civil_status`, `educational_attainment`, `occupation`, `religion`, `company_agency`, `monthly_income`, `employment_status`, `contact_number`, `email_address`, `pantawid_beneficiary`, `indigenous_person`, `are_you_a_migrant_worker`, `lgbtq`) VALUES
(48, 'marilyn', 0, 2147483647, '2024-10-31', 56, 'oroquita', 'female', 'Cebu, City', 'Single', 'College Level', 'Student', 'Catholic', 'N/A', '321212', 'self_emplo', 90987654, 'marilyn@gmail.com', 'N/A', 'no', '', 'no'),
(49, 'Jake Gwapo', 0, 2147483647, '2024-11-29', 18, 'Cebu', 'male', 'Cebu, City', 'Single', 'College Level', 'Student', 'Catholic', 'N/A', '90000', 'self_emplo', 2147483647, 'jake@gmail.com', '98897', 'yes', 'no', 'no'),
(50, 'ako', 0, 2147483647, '2024-12-05', 26, 'danao', 'male', 'asdds', 'zrdf', 'dvdv', 'zsvev', 'svr', 'szef', '10813', 'employed', 99284863, 'mkahdha@gmail.com', '83957', 'no', 'yes', 'yes'),
(51, 'AAA', 0, 875456, '2024-12-06', 23, 'danao', 'male', 'szvcc', 'zsfsrf', 'aefsf', 'sdvsdr', 'vsrfr', 'csrfsr', '121038', 'self_emplo', 98765432, 'mkahdha@gmail.com', '83957', 'no', 'no', 'no'),
(52, 'eyy', 0, 86324, '2024-12-20', 56, 'CEBU', 'male', 'asdds', 'zsfsrf', 'dvdv', 'zsvev', 'svr', 'lsclsme', '6348564', 'not_employ', 97655678, 'makhgd@gmail.com', '98867', 'yes', 'no', 'no'),
(53, 'werew', 43545, 453545, '2025-01-11', 34, 'danao', 'male', 'asdds', 'zsfsrf', 'aefsf', 'zsvev', 'svr', '34322', '343435', 'self_emplo', 987654, 'example@gmail.com', '45342', 'no', 'no', 'no'),
(54, 'sndflkudr', 3456, 563453656, '2024-12-08', 1, 'danao', 'male', 'asdds', 'hbjhg', 'u7657', 'bhgv', 'jhbjh', 'rewt', '32143', 'self_emplo', 987654, 'mkahdha@gmail.com', '98867', 'no', 'no', 'no'),
(55, 'Girly', 1234567, 93939393, '2024-12-10', 29, 'Mawaka, Aloran, Misamis Occidental', 'female', 'Cebu City', 'Single', 'University of Cebu', 'Maid', 'Roman Cath', 'N/A', '10000', 'not_employ', 952627813, 'girly@gmail.com', '43254', 'yes', 'no', 'no'),
(56, 'Boy', 0, 444444, '2024-12-31', 45, 'Cebu City', 'male', 'Careta, Cebu City', 'Single', 'N/A', 'Driver', 'Roman Cath', 'N/A', '8000', 'not_employ', 2147483647, 'boy@gmail.com', 'N/A', 'no', 'no', 'no'),
(57, 'Boy Tapang', 0, 99999, '2024-12-10', 34, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', 'Roman Catholic', 'N/A', '10000', 'not_employ', 999922221, 'boytapang@gmail.com', 'N/A', 'no', 'no', 'no'),
(58, 'Boy Tapang2', 1111111111, 34234, '2024-12-10', 6, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', '', 'N/A', '3454', 'not_employ', 98763423, 'boytapang@gmail.com', 'N/A', 'no', 'no', 'no'),
(59, 'Boy Tapang3', 2147483647, 6565656, '2024-12-13', 23, 'Cebu City', 'male', 'Careta, Cebu City', 'Single', 'N/A', 'Fishermen', 'Catholic', 'N/A', '3455', 'not_employ', 987654321, 'boytapang@gmail.com', '43254', 'no', '', 'no'),
(61, 'Nathan', 96544321, 9898776, '2024-12-12', 34, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', 'Roman Catholic', 'N/A', '34567', 'not_employ', 987654321, 'nathan@gmail.com', 'N/A', 'no', 'no', 'no'),
(62, 'Jesel', 1122334455, 723647234, '1998-10-16', 26, 'Mawaka, Aloran, Misamis Occidental', 'male', 'Tres de Abril, Labangon , Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '18000', '', 2147483647, 'Jesel@gmail.com', '', 'no', 'no', 'no'),
(63, 'Jesel', 0, 1212121212, '2024-12-16', 322, 'Cebu City', 'male', 'address', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '18000', '', 2147483647, 'Jesel1234@gmail.com', '', 'no', 'no', 'yes'),
(64, 'Kate D. Tolentino', 2147483647, 12121212, '2024-12-16', 25, 'Barili, Cebu City', 'female', 'Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '15000', '', 988888888, 'katedtolentino@gmail.com', 'yes', 'no', 'no', 'no'),
(65, 'AJ', 9989898, 2147483647, '2024-12-19', 76, 'Barili, Cebu City', 'male', 'Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Roman Catholic', 'N/A', '8000', '', 2147483647, 'jerichorosales@gmail.com', 'no', 'no', 'no', 'no'),
(67, 'Rosemarie Suson', 24, 121212121, '2002-03-05', 22, 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'female', 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'Single', 'College Graduate', 'N/A', 'Catholic', 'N/A', '10000', 'employed', 2147483647, 'example@gmail.com', 'N/A', 'no', 'no', 'no'),
(68, 'Jiji', 23, 234, '2025-02-05', 32, 'Cebu, City', 'female', 'Cebu, City', 'Single', 'College Graduate', 'N/A', 'Roman Catholic', 'N/A', '20000', 'self_emplo', 2147483647, 'example@gmail.com', 'N/A', 'no', 'no', 'no'),
(70, 'Ericson', 909734, 3423212, '2025-01-29', 12, 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'male', 'Cebu, City', 'Single', 'College Graduate', 'N/A', 'Catholic', 'N/A', '9000', '', 2147483647, 'example@gmail.com', '', 'no', 'no', 'no'),
(71, 'ncjesncubaes', 887676, 78, '2025-02-21', 23, 'albay,Bicol', 'male', 'cebu', 'single', 'college grad', 'N/A', 'catholic', 'N/A', '8000', 'self_emplo', 2147483647, 'weqwd@sefsdf', '213', 'no', 'no', 'no');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `solo_parent`
--
ALTER TABLE `solo_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familymembers`
--
ALTER TABLE `familymembers`
  ADD CONSTRAINT `familymembers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `solo_parent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
