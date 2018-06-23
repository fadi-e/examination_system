-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 02:58 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(10) UNSIGNED NOT NULL,
  `login_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `login_ID`) VALUES
(11, 54);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_ID` int(10) UNSIGNED NOT NULL,
  `className` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_ID`, `className`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `user_type`, `email`, `password`) VALUES
(1, 'student', 'fadi@yahoo.com', '$2y$10$3dnOzNo1QRzmIdh2ifdsvOTBGr/a1Xs4w/C4mpAlnRgmSYrm9WE.u'),
(2, 'teacher', 'john@yahoo.com', '$2y$10$gyal30zx/QgODBlJrMu5PuRztiLr6L7p9hnNCQCXL6ZYdKj31/pHe'),
(54, 'admin', 'fadi@admin.com', '$2y$10$w0ctjN3HLDEaganC8UzZk.6uGNcL9vAs2nzGnnkJVwKYZZy40nMfq'),
(55, 'teacher', 'salam@yahoo.com', '$2y$10$PjTKbjcR/mD46gEOCRhy.uGQVz3/6ZuTtROBtVHGTi6tQLzosOV36'),
(92, 'student', 'ameer@yahoo.com', '$2y$10$9vEciXGoWuC7mOmr6sNKK.SQ2ixkVw0qFpET95wmda9AZEwiVGKmy'),
(96, 'student', 'test@test.com', '$2y$10$iT9YPeEaBwp.cNNC9UOk6u4qZK/xdNX614vLWwp/tr39TYww14JYG');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_ID` int(10) UNSIGNED NOT NULL,
  `question_number` int(10) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL,
  `C` varchar(255) NOT NULL,
  `D` varchar(255) NOT NULL,
  `teacher_ID` int(10) UNSIGNED NOT NULL,
  `test_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_ID`, `question_number`, `question`, `answer`, `A`, `B`, `C`, `D`, `teacher_ID`, `test_ID`) VALUES
(1, 1, '2 + 2', 'B', '2', '4', '6', '8', 1, 1),
(2, 2, '3 + 3', 'B', '3', '6', '9', '12', 1, 1),
(3, 3, '3 + 4', 'C', '3', '4', '7', '9', 1, 1),
(4, 1, 'Which of the following makeup products do you use at least once a week?', 'A,B,C', 'Foundation', 'Blush, rouge, or bronzer', 'Eyeliner', 'Concealer', 1, 2),
(6, 1, 'welcomw', 'A,B', 'A', 'B', 'C', 'D', 1, 2),
(18, 1, '1 + 1 = ?', 'A', '2', '3', '4', '5', 1, 23),
(19, 2, 'Does Suraiser a real cockroach?', 'B', 'Yes', 'No', 'Maybe', 'certainly', 1, 23),
(20, 31, 'Does Sarab always angry?', 'A', 'Always', 'No', 'He is quiet', 'He is poor fellow', 1, 23),
(24, 9, 'ds', 'd', 's', 'd', 'd', 'd', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_ID` int(10) UNSIGNED NOT NULL,
  `student_ID` int(10) UNSIGNED NOT NULL,
  `test_ID` int(10) UNSIGNED NOT NULL,
  `result_status` varchar(20) DEFAULT NULL,
  `submissiondate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_questions`
--

CREATE TABLE `result_questions` (
  `result_questions_ID` int(10) UNSIGNED NOT NULL,
  `result_ID` int(10) UNSIGNED NOT NULL,
  `student_ID` int(10) UNSIGNED NOT NULL,
  `question_ID` int(10) UNSIGNED NOT NULL,
  `answer` text NOT NULL,
  `result_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `login_ID` int(10) UNSIGNED NOT NULL,
  `class_ID` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `fName`, `lName`, `login_ID`, `class_ID`, `profile_image`) VALUES
(46, 'Ameer', 'Akrem', 92, 4, '20180531084257Ù¢Ù Ù¡Ù¨Ù Ù£Ù¢Ù£_Ù¡Ù¢Ù¤Ù¨Ù£Ù§.jpg'),
(50, 'test', 'test', 96, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_ID` int(10) UNSIGNED NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `login_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_ID`, `fName`, `lName`, `login_ID`) VALUES
(1, 'john', 'perry', 2),
(7, 'salam', 'alsharma', 55);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_ID` int(10) UNSIGNED NOT NULL,
  `testName` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `examdate` date NOT NULL,
  `teacher_ID` int(10) UNSIGNED NOT NULL,
  `class_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_ID`, `testName`, `subject`, `examdate`, `teacher_ID`, `class_ID`) VALUES
(1, 'Maths Test', 'Math', '0000-00-00', 1, 1),
(2, 'Makeupq', 'Makeup', '0000-00-00', 1, 3),
(23, 'Sarab and Sahar Test', 'Test for Sarab and Sahar', '2018-05-20', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `login_ID` (`login_ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`),
  ADD KEY `test_ID` (`test_ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_ID`),
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `test_ID` (`test_ID`) USING BTREE;

--
-- Indexes for table `result_questions`
--
ALTER TABLE `result_questions`
  ADD PRIMARY KEY (`result_questions_ID`) USING BTREE,
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `question_ID` (`question_ID`),
  ADD KEY `result_ID` (`result_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `login_ID` (`login_ID`),
  ADD KEY `class_ID` (`class_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD KEY `login_ID` (`login_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`),
  ADD KEY `class_ID` (`class_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `result_questions`
--
ALTER TABLE `result_questions`
  MODIFY `result_questions_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`test_ID`) REFERENCES `test` (`test_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`test_ID`) REFERENCES `test` (`test_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_questions`
--
ALTER TABLE `result_questions`
  ADD CONSTRAINT `result_questions_ibfk_1` FOREIGN KEY (`result_ID`) REFERENCES `result` (`result_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_questions_ibfk_2` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
