-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 05:01 PM
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
-- Database: `journal_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `associative_editor_information`
--

CREATE TABLE `associative_editor_information` (
  `id` int(11) NOT NULL,
  `associative_editor_name` varchar(100) NOT NULL,
  `associative_editor_designation` varchar(30) NOT NULL,
  `associative_editor_university_name` varchar(200) NOT NULL,
  `associative_editor_email` varchar(200) NOT NULL,
  `associative_editor_contact_no` varchar(11) NOT NULL,
  `associative_editor_country` varchar(200) NOT NULL,
  `associative_editor_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `associative_editor_information`
--

INSERT INTO `associative_editor_information` (`id`, `associative_editor_name`, `associative_editor_designation`, `associative_editor_university_name`, `associative_editor_email`, `associative_editor_contact_no`, `associative_editor_country`, `associative_editor_password`) VALUES
(1, 'MK Associative', 'Assistant Professor', 'JKKNIU', 'mehedikhanrakib@gmail.com', '01717875741', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a'),
(2, 'MKR Coding', 'Professor', 'JKKNIU', 'mkrcoding1998@gmail.com', '01787618640', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_designation` varchar(30) NOT NULL,
  `author_university_name` varchar(200) NOT NULL,
  `author_email` varchar(200) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_country` varchar(200) NOT NULL,
  `author_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`id`, `author_name`, `author_designation`, `author_university_name`, `author_email`, `author_contact_no`, `author_country`, `author_password`) VALUES
(2, 'Sumaiya', 'Lecturer', 'Dhaka University', 'supty10@gmail.com', '01686247327', 'Bangladesh', '25f9e794323b453885f5181f1b624d0b'),
(3, 'rejwan', 'Lecturer', 'jkkniu', 'rejwancse10@gmail.com', '016', 'Afghanistan', '25f9e794323b453885f5181f1b624d0b'),
(4, 'Mehedi Khan Rakib', 'Professor', 'JKKNIU', 'mkrakib007@gmail.com', '01727027277', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a');

-- --------------------------------------------------------

--
-- Table structure for table `main_editor_information`
--

CREATE TABLE `main_editor_information` (
  `id` int(11) NOT NULL,
  `main_editor_name` varchar(100) NOT NULL,
  `main_editor_designation` varchar(30) NOT NULL,
  `main_editor_university_name` varchar(200) NOT NULL,
  `main_editor_email` varchar(200) NOT NULL,
  `main_editor_contact_no` varchar(11) NOT NULL,
  `main_editor_country` varchar(200) NOT NULL,
  `main_editor_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_editor_information`
--

INSERT INTO `main_editor_information` (`id`, `main_editor_name`, `main_editor_designation`, `main_editor_university_name`, `main_editor_email`, `main_editor_contact_no`, `main_editor_country`, `main_editor_password`) VALUES
(3, 'MK Rakib', 'Associate Professor', 'JKKNIU', 'mkrakib328@gmail.com', '01643540358', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a');

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_title` varchar(1000) NOT NULL,
  `paper_abstract` varchar(5000) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `paper_type` varchar(50) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_designation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(300) NOT NULL,
  `cover_letter_pdf` varchar(300) NOT NULL,
  `manuscript_image` varchar(300) NOT NULL,
  `supplimentary_file` varchar(300) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_paper`
--

INSERT INTO `new_paper` (`id`, `author_id`, `paper_title`, `paper_abstract`, `paper_keywords`, `paper_type`, `authors_name`, `authors_affiliation`, `authors_designation`, `authors_email`, `manuscript_pdf`, `cover_letter_pdf`, `manuscript_image`, `supplimentary_file`, `paper_status`, `timestamps`) VALUES
(2, 2, 'First Paper', 'This is my first paper about abortion', 'first, adult, abortion', 'original research(full paper)', 'rejwanc,kamal', 'jkkniu,jkkniu', 'student,professor', 'rejwan10@gmail.com,kamal@gmail.com', '1665667739.pdf', '1665667739.pdf', '1665667739.', '1665667739.pdf', 1, '2022-10-13 13:28:59'),
(3, 2, 'asd', 'sfdsf', 'sfs', 'original research(full paper)', '', '', '', '', '1665668029.pdf', '1665668029.pdf', '1665668029.', '1665668029.pdf', 1, '2022-10-13 13:35:49'),
(4, 2, 'second paper', 'dsfksd;lf', 'sfkslf', 'original research(full paper)', '', '', '', '', '1665668103.pdf', '1665668103.pdf', '', '1665668103.pdf', 1, '2022-10-13 13:35:03'),
(5, 3, 'third paper', 'this is my third paper', 'hudai', 'original research(full paper)', '', '', '', '', '1667109474.pdf', '1667109474.pdf', '', '1667109474.pdf', 1, '2022-10-30 05:57:54'),
(6, 4, 'Fourth Paper', 'DSA', 'Data,Structure,Algorithms', 'original research(full paper)', 'Dr. Ujjol Kumar Pradhan,Pranab Mondol,Tushar Kanti Saha', 'JKKNIU,JKKNIU,JKKNIU', 'Professor,Assistant Professor,Professor', 'ujjolkumar@gmail.com,pranabmondol@gmail.com,tusharkantisaha@gmail.com', '1668953648.pdf', '1668953648.pdf', '1668953648.jpg', '1668953648.pdf', 1, '2022-11-20 14:14:08'),
(11, 4, 'Sixth Paper', 'MP', 'micro,processor', 'requested paper', 'Mahbubun Nahar', 'JKKNIU', 'Assistant Professor', 'mahbubunnahar@gmail.com', '1668962552.pdf', '1668962552.pdf', '1668962552.jpg', '1668962552.pdf', 1, '2022-11-20 16:42:32'),
(22, 4, 'Fifth Paper', 'OS', 'Algo,OS', 'original research(short paper)', 'Rubya Shahrin,Dr. Selim Al Mamun', 'JKKNIU,JKKNIU', 'Assistant Professor,Associate Professor', 'rubyashahrin@gmail.com,selimalmamun@gmail.com', '1668974313.pdf', '1668974313.pdf', '1668974313.jpg', '1668974313.pdf', 1, '2022-11-20 19:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_information`
--

CREATE TABLE `reviewer_information` (
  `id` int(11) NOT NULL,
  `reviewer_name` text NOT NULL,
  `reviewer_designation` varchar(30) NOT NULL,
  `reviewer_university_name` varchar(200) NOT NULL,
  `reviewer_email` varchar(200) NOT NULL,
  `reviewer_contact_no` varchar(11) NOT NULL,
  `reviewer_country` varchar(200) NOT NULL,
  `reviewer_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer_information`
--

INSERT INTO `reviewer_information` (`id`, `reviewer_name`, `reviewer_designation`, `reviewer_university_name`, `reviewer_email`, `reviewer_contact_no`, `reviewer_country`, `reviewer_password`) VALUES
(1, 'MK Reviewer', 'Lecturer', 'JKKNIU', 'nazruljournal@gmail.com', '01716778978', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a'),
(2, 'MKR Boss', 'Professor', 'JKKNIU', 'mehedikhanrakib007@gmail.com', '01884534964', 'Bangladesh', '3b0048221dd39dd4a3ea75ac7446b49a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associative_editor_information`
--
ALTER TABLE `associative_editor_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_editor_information`
--
ALTER TABLE `main_editor_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_information`
--
ALTER TABLE `reviewer_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associative_editor_information`
--
ALTER TABLE `associative_editor_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_editor_information`
--
ALTER TABLE `main_editor_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviewer_information`
--
ALTER TABLE `reviewer_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
