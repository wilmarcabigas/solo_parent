-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2025 at 07:55 AM
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
(77, 71, 'tomorrow', 'Male', 'son', 2, '2025-02-21', 'Single', 'n/a', 'n/a', 0.00, 'vshiusheffsef', 'sefsdvsgshdhr', 'mhbxyvhs', 'brother', 'cebu', 2147483647, '09678', '2025-02-21', 'C', 'AB'),
(78, 72, 'wilmar', 'Male', 'cabigas', 36, '2025-07-01', 'Single', 'highcho', 'ol123', 0.01, '', '', 'james', 'trocio', 'siotio mohon', 2147483647, '123', '2025-06-30', '123', '123123'),
(79, 73, 'wilmar', 'Male', 'cabigas', 36, '2025-07-01', 'Single', 'highcho', 'ol123', 0.01, 'asdasdsa', 'asdas', 'james', 'trocio', 'siotio mohon', 2147483647, '123', '2025-06-30', '123', '123123');

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
  `lgbtq` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `date_registered` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solo_parent`
--

INSERT INTO `solo_parent` (`id`, `fullname`, `id_no`, `philsys_card_number`, `date_of_birth`, `age`, `place_of_birth`, `sex`, `address`, `civil_status`, `educational_attainment`, `occupation`, `religion`, `company_agency`, `monthly_income`, `employment_status`, `contact_number`, `email_address`, `pantawid_beneficiary`, `indigenous_person`, `are_you_a_migrant_worker`, `lgbtq`, `status`, `date_registered`) VALUES
(48, 'marilyn', 0, 2147483647, '2024-10-31', 56, 'oroquita', 'female', 'Cebu, City', 'Single', 'College Level', 'Student', 'Catholic', 'N/A', '321212', 'self_emplo', 90987654, 'marilyn@gmail.com', 'N/A', 'no', '', 'no', 'approved', '2025-06-12'),
(49, 'Jake Gwapo', 0, 2147483647, '2024-11-29', 18, 'Cebu', 'male', 'Cebu, City', 'Single', 'College Level', 'Student', 'Catholic', 'N/A', '90000', 'self_emplo', 2147483647, 'jake@gmail.com', '98897', 'yes', 'no', 'no', 'pending', '2025-06-12'),
(50, 'ako', 0, 2147483647, '2024-12-05', 26, 'danao', 'male', 'asdds', 'zrdf', 'dvdv', 'zsvev', 'svr', 'szef', '10813', 'employed', 99284863, 'mkahdha@gmail.com', '83957', 'no', 'yes', 'yes', 'pending', '2025-06-12'),
(51, 'AAA', 0, 875456, '2024-12-06', 23, 'danao', 'male', 'szvcc', 'zsfsrf', 'aefsf', 'sdvsdr', 'vsrfr', 'csrfsr', '121038', 'self_emplo', 98765432, 'mkahdha@gmail.com', '83957', 'no', 'no', 'no', 'approved', '2025-06-12'),
(52, 'eyy', 0, 86324, '2024-12-20', 56, 'CEBU', 'male', 'asdds', 'zsfsrf', 'dvdv', 'zsvev', 'svr', 'lsclsme', '6348564', 'not_employ', 97655678, 'makhgd@gmail.com', '98867', 'yes', 'no', 'no', 'approved', '2025-06-12'),
(53, 'werew', 43545, 453545, '2025-01-11', 34, 'danao', 'male', 'asdds', 'zsfsrf', 'aefsf', 'zsvev', 'svr', '34322', '343435', 'self_emplo', 987654, 'example@gmail.com', '45342', 'no', 'no', 'no', 'pending', '2025-06-12'),
(54, 'sndflkudr', 3456, 563453656, '2024-12-08', 1, 'danao', 'male', 'asdds', 'hbjhg', 'u7657', 'bhgv', 'jhbjh', 'rewt', '32143', 'self_emplo', 987654, 'mkahdha@gmail.com', '98867', 'no', 'no', 'no', 'pending', '2025-06-12'),
(55, 'Girly', 1234567, 93939393, '2024-12-10', 29, 'Mawaka, Aloran, Misamis Occidental', 'female', 'Cebu City', 'Single', 'University of Cebu', 'Maid', 'Roman Cath', 'N/A', '10000', 'not_employ', 952627813, 'girly@gmail.com', '43254', 'yes', 'no', 'no', 'pending', '2025-06-12'),
(56, 'Boy', 0, 444444, '2024-12-31', 45, 'Cebu City', 'male', 'Careta, Cebu City', 'Single', 'N/A', 'Driver', 'Roman Cath', 'N/A', '8000', 'not_employ', 2147483647, 'boy@gmail.com', 'N/A', 'no', 'no', 'no', 'approved', '2025-06-12'),
(57, 'Boy Tapang', 0, 99999, '2024-12-10', 34, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', 'Roman Catholic', 'N/A', '10000', 'not_employ', 999922221, 'boytapang@gmail.com', 'N/A', 'no', 'no', 'no', 'approved', '2025-06-12'),
(58, 'Boy Tapang2', 1111111111, 34234, '2024-12-10', 6, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', '', 'N/A', '3454', 'not_employ', 98763423, 'boytapang@gmail.com', 'N/A', 'no', 'no', 'no', 'pending', '2025-06-12'),
(59, 'Boy Tapang3', 2147483647, 6565656, '2024-12-13', 23, 'Cebu City', 'male', 'Careta, Cebu City', 'Single', 'N/A', 'Fishermen', 'Catholic', 'N/A', '3455', 'not_employ', 987654321, 'boytapang@gmail.com', '43254', 'no', '', 'no', 'pending', '2025-06-12'),
(61, 'Nathan', 96544321, 9898776, '2024-12-12', 34, 'Cebu City', 'male', 'Cebu City', 'Single', 'N/A', 'Fishermen', 'Roman Catholic', 'N/A', '34567', 'not_employ', 987654321, 'nathan@gmail.com', 'N/A', 'no', 'no', 'no', 'pending', '2025-06-12'),
(62, 'Jesel', 1122334455, 723647234, '1998-10-16', 26, 'Mawaka, Aloran, Misamis Occidental', 'male', 'Tres de Abril, Labangon , Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '18000', '', 2147483647, 'Jesel@gmail.com', '', 'no', 'no', 'no', 'pending', '2025-06-12'),
(63, 'Jesel', 0, 1212121212, '2024-12-16', 322, 'Cebu City', 'male', 'address', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '18000', '', 2147483647, 'Jesel1234@gmail.com', '', 'no', 'no', 'yes', 'approved', '2025-06-12'),
(64, 'Kate D. Tolentino', 2147483647, 12121212, '2024-12-16', 25, 'Barili, Cebu City', 'female', 'Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Catholic', 'N/A', '15000', '', 988888888, 'katedtolentino@gmail.com', 'yes', 'no', 'no', 'no', 'pending', '2025-06-12'),
(65, 'AJ', 9989898, 2147483647, '2024-12-19', 76, 'Barili, Cebu City', 'male', 'Cebu City', 'Single', 'Univesity of Cebu - ', 'N/A', 'Roman Catholic', 'N/A', '8000', '', 2147483647, 'jerichorosales@gmail.com', 'no', 'no', 'no', 'no', 'pending', '2025-06-12'),
(67, 'Rosemarie Suson', 24, 121212121, '2002-03-05', 22, 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'female', 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'Single', 'College Graduate', 'N/A', 'Catholic', 'N/A', '10000', 'employed', 2147483647, 'example@gmail.com', 'N/A', 'no', 'no', 'no', 'pending', '2025-06-12'),
(68, 'Jiji', 23, 234, '2025-02-05', 32, 'Cebu, City', 'female', 'Cebu, City', 'Single', 'College Graduate', 'N/A', 'Roman Catholic', 'N/A', '20000', 'self_emplo', 2147483647, 'example@gmail.com', 'N/A', 'no', 'no', 'no', 'pending', '2025-06-12'),
(70, 'Ericson', 909734, 3423212, '2025-01-29', 12, 'BLK 1 Belgium St., Barangay Suba, Cebu City', 'male', 'Cebu, City', 'Single', 'College Graduate', 'N/A', 'Catholic', 'N/A', '9000', '', 2147483647, 'example@gmail.com', '', 'no', 'no', 'no', 'pending', '2025-06-12'),
(71, 'ncjesncubaes', 887676, 78, '2025-02-21', 23, 'albay,Bicol', 'male', 'cebu', 'single', 'college grad', 'N/A', 'catholic', 'N/A', '8000', 'self_emplo', 2147483647, 'weqwd@sefsdf', '213', 'no', 'no', 'no', 'pending', '2025-06-12'),
(72, 'wilmar cabigasames', 2147483647, 124, '2025-06-04', 20, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'highshco', 'student', 'catholic', 'None', '1230000', '', 2147483647, 'wcabigas.shs@gmail.com', '', 'no', 'yes', 'yes', 'pending', '2025-06-12'),
(73, 'wilmar cabigasames', 51654, 124, '2025-06-04', 20, 'Cebu city', 'male', 'lower south hills tisa', 'single', 'highshco', 'student', 'catholic', 'None', '1230000', '', 2147483647, 'wcabigas.shs@gmail.com', 'nione', 'no', 'no', 'no', 'pending', '2025-06-13');

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
(1, NULL, 'wilmar', 'w@gmail.com', '$2y$10$d0CFpDoqNsBf.J2rqpesFOAQHdnjoySHnzMVe0NrU23iQszTDmZxK', 'user'),
(3, NULL, 'Admin', 'admin@example.com', '$2y$10$k3pQ2Qw8n1Qw8n1Qw8n1QeQw8n1Qw8n1Qw8n1Qw8n1Qw8n1Qw8n1Q', 'admin'),
(4, NULL, 'Admin', 'admin@gmail.com', '$2y$10$k3pQ2Qw8n1Qw8n1Qw8n1QeQw8n1Qw8n1Qw8n1Qw8n1Qw8n1Qw8n1Q', 'admin'),
(5, NULL, 'james', 'james@gmail.com', '$2y$10$hefMmEapVATGRhOX2AYFPeQkETht0iRDppeiwZFu64f7rvVbQpXHi', 'user'),
(7, NULL, 'james', 'lagnas@gmail.com', '$2y$10$TeCT009XwayRHwlGatW/KehTkjRw1hSuiwvtFxhuekJBexON30l/S', 'user'),
(8, NULL, 'james', '123@gmail.com', '$2y$10$sot1be2JYhJXn5xF8XKHxegHIQm/84sOR2qlsr8jFrkomeVld0RS2', 'user'),
(9, NULL, 'james1', '1234@gmail.com', '$2y$10$m2FMp805xcNu41FIShX47OviLx06i5BtPHO2maFsWVrK3qMIh1EAS', 'user'),
(10, NULL, 'james12', '12345@gmail.com', '$2y$10$IYe1XvtJN5rzYEVJR0GFIuHgPz8BZJ4LlZYdn/DVImXqLiB8.n2.W', 'user'),
(11, NULL, 'james', '123456@gmail.com', '$2y$10$0t3s8rtcj1lq.LbTjKL25uww2QJC8PFbNgWMfaMbgR2diF1DL22ju', 'user'),
(12, NULL, 'jamest', '1234567@gmail.com', '$2y$10$Dm1hOpbaOVV2vDtQOhVrOOVtRl7EUfb8vxNRxdOzQkI/4pJtS.MGC', 'user'),
(13, NULL, '123', '321654@gmai.com', '$2y$10$1WxRQcPAjHqVnmDd5mB9ou2pDNc4E9afvsiV8/kFPzt.WdGytWoz6', 'user'),
(14, NULL, '118391283', '129312893@gmail.com', '$2y$10$M/gPh6FrW85ErxfKqotUceULL8.fqkMu4qFHLY2pr072./WGSpKt2', 'user'),
(15, NULL, '12312312312', '1231232132@gmail.com', '$2y$10$C98IvWR69mIGnxdHcmr83uQ.voHoEqnOGRqAbvaYOl71aevPXbjC2', 'user'),
(16, NULL, '34143254fgf', '1231232131255kfdg@gmail.com', '$2y$10$WEZRA1FDzqsYAFU3APPTBe0TkPAyfGFKvpcB/upkBodsC9FBE4W4S', 'user'),
(17, NULL, 'wilmar1', 'wilmar123@gmail.com', '$2y$10$DDUYcevZ/2GI.TCsQBO9w.UH0zgPv9wYjb2s9QPr6Hzg6qiLgqDmK', 'user'),
(18, NULL, 'james01545', 'jamestrocio@gmail.com', '$2y$10$EK8a58b84VaowOB377R2ouoB/sydl8J8oL5Aq7elsHSxkJ8AYD96e', 'user'),
(19, NULL, '123123123123123', '123123123213@gmail.com', '$2y$10$7U1.xTn/HJGIFNQhNazdpOwsQyZWzlq8NFDLQAftLn9WZbXYtWhia', 'user'),
(20, NULL, 'jameslagnas', 'jamestrocio123@gmail.com', '$2y$10$jfappFV6hpVmwu4LLvGaTudLsxk69NlZnhbhk6ergWC060uxQUf1W', 'user'),
(21, NULL, '1james', '1james@gmail.com', '$2y$10$m0RL1Bepk0nE6VsRB6VJP.XU6U0UZvpb/qxbK6vrhYm3jLHywb8OK', 'user'),
(22, NULL, 'wilmar', 'asd@gmail.com', '$2y$10$uab7JI.Q2ePlZdrv.hhiDusQZ6linQ3IaZnUS/eLCDGR/6N0Oet4i', 'user'),
(23, NULL, 'char', 'c@gmail.com', '$2y$10$t/PhZhm/lQCQoE5Swfmoi.PiurzbwEKV6TF2LaYxuD6eciIre70J6', 'user');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
