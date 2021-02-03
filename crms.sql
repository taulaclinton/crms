-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 01:28 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `idno` int(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `status` int(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `email`, `idno`, `phone`, `status`, `password`, `level`) VALUES
(1, 'Super Admin', 'admin', 'admin@admin.com', 30660900, 700633087, 1, '21232f297a57a5a743894a0e4a801fc3', 20),
(3, 'Jacob Mwangangi', 'Kimwele', 'jacob@gmail.com', 29100200, 710000000, 1, '2d0e88a0c91399493596004c796ca5b4', 1),
(4, 'Agnes Chege', 'Wamucii', 'agnes@gmail.com', 30500600, 712000000, 1, '7067821a488137b801cd31ee38fcce05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(10) NOT NULL,
  `classname` varchar(50) NOT NULL,
  `year_admitted` int(10) NOT NULL,
  `period` text NOT NULL,
  `class_status` text NOT NULL,
  `year_of_study` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `classname`, `year_admitted`, `period`, `class_status`, `year_of_study`) VALUES
(1, '2016 summer', 2016, 'January intake', 'In session', '1'),
(2, '2017 winter class', 2017, 'September intake', 'In session', '2'),
(3, '2016 winter class', 2016, 'September intake', 'In session', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `department_id`) VALUES
(1, 'Information Technology', 1),
(2, 'Computer Science', 1),
(3, 'Journalism and mass media', 4),
(4, 'Graphics communication', 4),
(5, 'Telecommunication Engineering', 3),
(6, 'Project management', 2),
(7, 'Computing and statistics', 1),
(8, 'Electronics engineering', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `name`, `description`) VALUES
(1, 'Computing & Information Technology', 'Networking, programming, aritificial intelligence, databases, security etc'),
(3, 'Engineering ', ' Thermodynamics, electronics, Mechanics of materials, etc  '),
(4, 'Publishing and media studies', '  Publishing, Broadcast journalism, photography etc  '),
(5, 'Business management', 'Leadership, economics, marketing, business management etc ');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(5) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `description`) VALUES
(1, 'system name', 'RMS'),
(2, 'college name', 'I~Net Institute of Computer & Technology '),
(3, 'college', 'I~Net'),
(4, 'slogan', 'The best institute in training IT skills');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) NOT NULL,
  `student_name` text NOT NULL,
  `regno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL,
  `form4grade` varchar(15) NOT NULL,
  `program` text NOT NULL,
  `class` text NOT NULL,
  `year_of_study` int(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `regno`, `email`, `phone`, `dob`, `sex`, `form4grade`, `program`, `class`, `year_of_study`, `password`) VALUES
(1, 'Mwanaisha Abdi', 'COM/01/17', 'mwanaisha@gmail.com', '0700651238', '2001-01-15', 'Female', 'B+', '2', '2', 1, '89179c6f10608b25b6dc3bf4434bdf09'),
(2, 'Travas Akello', 'COM/02/17', 'travas@gmail.com', '0701057810', '2000-10-02', 'Male', 'A', '2', '2', 1, 'e060b7da460ba42b7afedffafd4830a3'),
(3, 'Nelson Chege', 'COM/10/17', 'nelson@gmail.com', '0711435190', '1995-07-13', 'Male', 'B', '2', '2', 1, '993457eae95168a1d54fed3757a42bc0'),
(4, 'Bramwel Kiptanui', 'COM/20/17', 'bramwel@gmail.com', '0712312312', '1999-12-31', 'Male', 'A-', '2', '2', 1, '26ca2dc4de0328dc79dec2c93ebffa11'),
(5, 'Robert Katana', 'COM/19/17', 'robert@gmail.com', '0745015437', '1998-10-12', 'Male', 'B', '2', '2', 1, 'f052ffc5e9a98abfa29d33f7eaa88eb0'),
(6, 'Francis Makokha', 'COM/21/17', 'francis@gmail.com', '0720435629', '1998-06-09', 'Male', 'A-', '2', '2', 1, '0ac0c4f332de7f321e8ee5868e7eb99c'),
(7, 'Patricia Muthoni', 'COM/23/17', 'patricia@gmail.com', '0700123654', '2000-10-04', 'Female', 'B+', '2', '2', 1, '3baca78153ad92c8805e465cad14802e'),
(8, 'Christine Mwende', 'COM/24/17', 'christine@gmail.com', '0741245687', '1999-04-21', 'Female', 'B+', '2', '2', 1, '9c44163c17a3c3bb4614ecb620a6951b');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `subject_name` text NOT NULL,
  `department` text NOT NULL,
  `course_of_study` int(11) NOT NULL,
  `year_of_study` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `department`, `course_of_study`, `year_of_study`, `semester`) VALUES
(1, 'COM 101 Introduction to Computer Science', '1', 2, 1, 1),
(2, 'COM 102 Discrete Mathematics', '1', 2, 1, 1),
(3, 'COM 103 Introduction to electronics', '1', 2, 1, 1),
(4, 'COM 104 Mathematics for Computer Scientists', '1', 2, 1, 1),
(5, 'COM 105 Computer Applications', '1', 2, 1, 1),
(6, 'COM 106 Fundamentals of computer hardware', '1', 2, 1, 1),
(7, 'IT 101 Introduction to Information Technology', '1', 1, 1, 1),
(8, 'IT 102 Computer Applications', '1', 1, 1, 1),
(9, 'IT 103 Mathematics for Information Technologists', '1', 1, 1, 1),
(10, 'IT 104 Computer software ', '1', 1, 1, 1),
(11, 'IT 105 Discrete mathematics', '1', 1, 1, 1),
(12, 'IT 106 Introduction to management in IT', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(5) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idno` int(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `title` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `username`, `email`, `idno`, `phone`, `title`, `department`, `status`, `password`) VALUES
(1, 'Jackson Omwoma', 'Omwoma', 'jackson@gmail.com', 30100200, 710110110, 'teacher', '1', '1', '22a5d2be57a2eef892f12debd07bb4cc'),
(2, 'Titus Mbuvi', 'Mbuvi', 'titus@gmail.com', 29100100, 712300000, 'teacher', '1', '1', '3172c5171ed244453e9be7cc29a5ada8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
