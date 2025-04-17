-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 08:50 AM
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
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `answer` varchar(300) NOT NULL,
  `question_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES
(1, 'Frontend development refers to the creation of the user-facing part of a website or web application. It encompasses everything that users interact with directly, including the layout, design, and functionality of the site. This involves working with various technologies and tools to ensure that the ', 1, 6),
(2, ' Core Skills\r\nProgramming Language: PHP, Python, Node.js, Java, or Go (choose 1–2)\r\nDatabases: MySQL, PostgreSQL, or MongoDB\r\nAPIs: RESTful APIs, JSON, basic API authentication', 4, 6),
(3, 'Frontend = The face of the website.\r\nWhen you open a webpage — the layout, colors, buttons, images, text, forms, animations — all of that is handled by frontend code.', 1, 6),
(4, 'yes, PhP is a good programming language', 3, 6),
(5, 'yes, PhP is a good programming language', 3, 6),
(6, 'yes, PhP is a good programming language', 3, 6),
(7, 'No, you should invest in assets not in liabilities.', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'What is Frontend Development?', 'can anyone help me to find what should I learn for frontend developer.', 2),
(3, 'Is PHP a good programming language?', 'can anyone help me to find is PHP a good programming language to learn in 2025', 6),
(4, 'What should i learn for a backend developer?', 'can anyone help me to find what should I learn for back end developer.', 7),
(6, 'Full form of PHP?', 'can anyone help me to find what is the full form of PhP?..', 7),
(7, 'what is the full form of OK?', 'can any one help me with the full form of ok .', 6),
(8, 'What is the role of quantum computing in the future of cybersecurity?', 'Quantum computing could either revolutionize cybersecurity with unbreakable encryption or threaten it by breaking current security systems. ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'peter1', 'peter@test.com', '$2y$10$Ys0vTP/EkWg938Nob5zHi.hM8errOb7zMMv4GOQXFBRAq9sTF5JNu'),
(2, 'hrithik', 'Hrithik.choudhary110@gmail.com', '$2y$10$FkenzHjQvLhHVqM2TdEqV.IUXFIims.nBAqcWHGdbABthOk1c/ah2'),
(4, 'hrithik1', 'hrithik@test.com', '$2y$10$PK6gvlH2NTjevZpCjyw0XePqWGHVlAPY0ewudRNDaRdAQQuh3r28q'),
(6, 'rima', 'rima@test.com', '$2y$10$fJwI/nxmx.xaTbSSrih5WecCqCO32RtGY7D2lcRfpbv/LOUcDVlgO'),
(7, 'mahi', 'mahi@test.com', '$2y$10$cApVBQrHyBabRriW/HP0iuTtlLGMgCck.jOwJI5W0P7NlwMrUXmB6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
