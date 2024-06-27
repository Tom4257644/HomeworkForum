-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2023 at 01:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeworkforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(4) NOT NULL,
  `questionID` int(4) NOT NULL,
  `userID` int(3) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `whenAnswered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `questionID`, `userID`, `answer`, `whenAnswered`) VALUES
(95, 93, 1, 'CO2', '2023-06-06'),
(96, 89, 1, 'a figure of speech involving the comparison of one thing with another thing of a different kind, used to make a description more emphatic or vivid ', '2023-06-06'),
(97, 90, 1, '1939', '2023-06-06'),
(98, 91, 1, 'Mitochondria', '2023-06-06'),
(99, 92, 1, 'M = mass', '2023-06-06'),
(100, 88, 1, 'No.', '2023-06-06'),
(101, 87, 1, 'Expenses, Distribution costs', '2023-06-06'),
(102, 2, 1, 'Argentina', '2023-06-06'),
(104, 1, 1, 'Wellington', '2023-06-06'),
(105, 84, 1, '50 percent\r\n', '2023-06-06'),
(106, 85, 1, 'x', '2023-06-06'),
(107, 86, 1, 'price is elastic and a change in price will lead to a relatively larger movement in quantity demanded', '2023-06-06'),
(108, 93, 4, 'co2', '2023-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(2) NOT NULL,
  `categoryName` varchar(40) NOT NULL DEFAULT 'General'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'General'),
(2, 'Calculas'),
(3, 'Economics'),
(4, 'Accounting'),
(5, 'Business'),
(6, 'English'),
(7, 'History'),
(8, 'Biology'),
(9, 'Physics'),
(10, 'Chemistry'),
(11, 'Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(4) NOT NULL,
  `userID` int(3) NOT NULL,
  `whenAsked` datetime NOT NULL DEFAULT current_timestamp(),
  `question` varchar(1000) NOT NULL,
  `categoryID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `userID`, `whenAsked`, `question`, `categoryID`) VALUES
(1, 1, '2023-03-21 00:00:00', 'what is the capital of New Zealand?', 2),
(2, 2, '2023-03-21 00:00:00', 'who won the 2022 World Cup?', 1),
(3, 3, '2023-03-21 00:00:00', 'how do accrued expenses and accounts payable differ?', 4),
(84, 4, '2023-06-06 11:10:27', 'What percentage is 5/10', 11),
(85, 4, '2023-06-06 11:11:26', 'What is the first derivative of f(x) = x^2', 2),
(86, 4, '2023-06-06 11:11:57', 'What does it mean if PED = 1.2', 3),
(87, 4, '2023-06-06 11:12:55', 'What type of account is shop electricity', 4),
(88, 4, '2023-06-06 11:13:39', 'Should I take business in Y12???', 5),
(89, 4, '2023-06-06 11:14:13', 'What is a simile', 6),
(90, 4, '2023-06-06 11:14:33', 'When did world war 2 begin?', 7),
(91, 4, '2023-06-06 11:15:01', 'What is the powerhouse of the cell?', 8),
(92, 4, '2023-06-06 11:15:31', 'In the equation E=MC^2 what does M stand for?', 9),
(93, 4, '2023-06-06 11:16:07', 'What is the chemical structure of carbon dioxide?', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `yearLevel` int(2) NOT NULL,
  `studentOrTeacher` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `yearLevel`, `studentOrTeacher`) VALUES
(1, 'thm', '$2y$10$sPHLpzM9OotvYEo7Fj5ft.y3VfnkbxPpp5hmJCv4X//f9USBKNVh.', 9, 'student'),
(2, 'tommac', '$2y$10$Tw8K4dodLfqwI.hieRh4M.mNy/h9WQ97axw2QN4z58U6MblHgMRw2', 13, 'student'),
(3, 'thomasmaclean', '$2y$10$5M3PFS2lB6bsXbPzk6e7rOcz/xHlHjqUv5xdaruqCUZ64H6.ZU48m', 10, 'student'),
(4, 'admin', '$2y$10$emFpLp/aZ1eSZ2w46BJxp.bQ2YoqQPHAbPxZeB8xDxD3gjDy7ulPS', 13, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
