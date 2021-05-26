-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2021 at 09:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_CODE` varchar(30) NOT NULL,
  `COURSE_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_CODE`, `COURSE_DESCRIPTION`) VALUES
(3, 'Math', 'test'),
(4, 'Français', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `DOC_ID` int(11) NOT NULL,
  `DOC_NAME` varchar(255) NOT NULL,
  `DOC_SIZE` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `GRADE_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `FIRST` int(11) NOT NULL,
  `SECOND` int(11) NOT NULL,
  `AVE` float NOT NULL,
  `REMARKS` text NOT NULL,
  `S_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`GRADE_ID`, `COURSE_ID`, `FIRST`, `SECOND`, `AVE`, `REMARKS`, `S_ID`) VALUES
(2, 3, 18, 15, 17, 'Validé', 58);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` int(11) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_ID`, `FNAME`, `LNAME`, `SEX`, `BDAY`, `NATIONALITY`, `HOME_ADD`, `EMAIL`, `STATUS`) VALUES
(58, 'TEST ETU', 'TEST ETU', 'M', '2021-03-13', 'FR', 'bblablabl', 'student@gmail.com', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TEACH_ID` int(30) NOT NULL,
  `TEACH_FULLNAME` varchar(255) NOT NULL,
  `TEACH_ADDRESS` varchar(255) NOT NULL,
  `TEACH_SEX` varchar(20) NOT NULL DEFAULT 'Male',
  `TEACH_STATUS` varchar(20) NOT NULL DEFAULT 'Single',
  `TEACH_EMAIL` varchar(255) NOT NULL,
  `COURSE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TEACH_ID`, `TEACH_FULLNAME`, `TEACH_ADDRESS`, `TEACH_SEX`, `TEACH_STATUS`, `TEACH_EMAIL`, `COURSE_ID`) VALUES
(3, 'Teacher', 'adresse test', 'M', 'Single', 'teacher@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`) VALUES
(1, 'esther bergman', 'estherbergman16@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Administrator'),
(4, 'Teacher', 'teacher@gmail.com', '8635fc4e2a0c7d9d2d9ee40ea8bf2edd76d5757e', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`DOC_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`GRADE_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TEACH_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`ACCOUNT_ID`),
  ADD UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `DOC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TEACH_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`S_ID`) REFERENCES `student` (`S_ID`) ON DELETE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE SET NULL;
