-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 08:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sciencecorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CID` int(11) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Medium` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CID`, `Class`, `Medium`) VALUES
(24, 'Grade 7', 'Tamil'),
(25, 'Grade 7', 'English'),
(26, 'Grade 8', 'Tamil'),
(27, 'Grade 8', 'English'),
(28, 'Grade 9', 'Tamil'),
(29, 'Grade 9', 'English'),
(30, 'Grade 10', 'Tamil'),
(31, 'Grade 11', 'Tamil'),
(33, 'Grade 10', 'English'),
(34, 'Grade 6', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `ENAME` varchar(150) NOT NULL,
  `EDATE` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `CID` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `EDATE`, `startTime`, `endTime`, `CID`, `Subject`) VALUES
(24, 'Probability', '2022-09-01', '15:00:00', '17:00:00', 28, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `MID` int(11) NOT NULL,
  `REGNO` int(11) NOT NULL,
  `SUB` varchar(150) NOT NULL,
  `MARK` varchar(150) NOT NULL,
  `ENAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `TID` int(11) NOT NULL,
  `TNAME` varchar(150) NOT NULL,
  `TPASS` varchar(150) NOT NULL,
  `QUAL` varchar(150) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `SAL` varchar(150) NOT NULL,
  `PNO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `PADDR` text NOT NULL,
  `IMG` varchar(150) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `SUBJECT`, `SAL`, `PNO`, `MAIL`, `PADDR`, `IMG`, `isAdmin`) VALUES
(1, 'Admin', '$2y$10$y0Zbh.eKHFl/LVvKgRwEPuvkgZcYv5mug7Mzsi8Ub.bR1af0Axdye', '', '', '', '', 'admin1234@gmail.com', '', '', 1),
(14, 'Thakshan', '$2y$10$7IRO.GmAoUf0R7Q.Zq7TGubwaZP4WeJ0VH57MHA7nCE7LcUyIv4j2', 'B.SC', 'Maths', '70000', '', 'thakshan98@gmail.com', '', '', 0),
(15, 'Malar', '$2y$10$qmKQ..q25X6xJ3Ups8nM/.t79/JQNaLJb79xK.qaKBXdtjLx40EhO', 'B.SC', 'Science', '60000', '077-6986587', 'Sarmini99@gmail.com', 'Matale', 'staff/t8.jpg', 0),
(16, 'raja', '$2y$10$Kqi/TQAGURj7WyuQk/h2ce6j6vBaxnXC4NNB.GdSkwRLyjaSzT6/S', 'B.SC', 'Maths', '70000', '077-9475996', 'raja34@gmail.com', 'Manipai,Jaffna', 'staff/t2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RNO` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `DOB` date NOT NULL,
  `GEN` varchar(150) NOT NULL,
  `PHO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `ADDR` text NOT NULL,
  `SIMG` varchar(150) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RNO`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SIMG`, `CID`) VALUES
(1, 'Nirushan', 'Rajasegar', '2001-09-26', 'Male', '0779475567', 'nirushan26@gmail.com', 'No.36, Main Street, Jaffna', '', 31),
(2, 'Parmilan', 'Murugamoorthy', '2007-11-14', 'Male', '0778475996', 'parmilan5@gmail.com', 'Kokuvil,Jaffna', 'student/s2.jpg', 30),
(3, 'ram', 'Shiva', '2012-01-31', 'Male', '0779475678', 'Mithu97@gmail.com', 'Kopai, Jaffna', 'student/s1.jpg', 28),
(4, 'ram', 'Murugamoorthy', '2012-01-31', 'Male', '0779475567', 'parmilan@gmail.com', 'Jaffna', 'student/s1.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subID` int(11) NOT NULL,
  `SNAME` varchar(255) NOT NULL,
  `CID` int(11) NOT NULL,
  `TID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subID`, `SNAME`, `CID`, `TID`) VALUES
(8, 'Maths', 30, 14),
(9, 'Maths', 31, 14),
(10, 'Science', 27, 15),
(11, 'Science', 26, 15),
(12, 'Science', 28, 15),
(13, 'Science', 29, 15),
(14, 'Maths', 24, 16),
(17, 'Maths', 29, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `cls` (`CID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `std` (`REGNO`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RNO`),
  ADD KEY `class` (`CID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subID`),
  ADD KEY `classes` (`CID`),
  ADD KEY `teachers` (`TID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `cls` FOREIGN KEY (`CID`) REFERENCES `class` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `std` FOREIGN KEY (`REGNO`) REFERENCES `student` (`RNO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `class` FOREIGN KEY (`CID`) REFERENCES `class` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `classes` FOREIGN KEY (`CID`) REFERENCES `class` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers` FOREIGN KEY (`TID`) REFERENCES `staff` (`TID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
