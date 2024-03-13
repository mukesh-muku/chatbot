-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2024 at 04:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatb`
--

CREATE TABLE `chatb` (
  `id` int(6) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatb`
--

INSERT INTO `chatb` (`id`, `text`, `response`) VALUES
(1, 'Introduce your self', 'I am mukesh kumar, it\'s demo prototype of chat bot.<br>I am a seasoned professional with a diverse skill set and a passion for driving projects to success. With a keen eye for detail, I analyze project requirements meticulously and engage in system architecture, project planning, and management to ensure seamless execution. Collaborating closely with stakeholders, I discuss database structures and make sound technical decisions. My approach involves assigning modules to team members based on their strengths and tracking project progress diligently. I conduct thorough code reviews, test modules rigorously, and interact with clients through various channels to ensure their satisfaction. Committed to excellence, I follow established processes and frameworks, contributing to organizational success with every endeavor.'),
(2, 'who are you', 'I am mukesh kumar, it\'s demo prototype of chat bot.<br>I am a seasoned professional with a diverse skill set and a passion for driving projects to success. With a keen eye for detail, I analyze project requirements meticulously and engage in system architecture, project planning, and management to ensure seamless execution. Collaborating closely with stakeholders, I discuss database structures and make sound technical decisions. My approach involves assigning modules to team members based on their strengths and tracking project progress diligently. I conduct thorough code reviews, test modules rigorously, and interact with clients through various channels to ensure their satisfaction. Committed to excellence, I follow established processes and frameworks, contributing to organizational success with every endeavor.'),
(3, 'about yourself', 'I am mukesh kumar, it\'s demo prototype of chat bot.<br>I am a seasoned professional with a diverse skill set and a passion for driving projects to success. With a keen eye for detail, I analyze project requirements meticulously and engage in system architecture, project planning, and management to ensure seamless execution. Collaborating closely with stakeholders, I discuss database structures and make sound technical decisions. My approach involves assigning modules to team members based on their strengths and tracking project progress diligently. I conduct thorough code reviews, test modules rigorously, and interact with clients through various channels to ensure their satisfaction. Committed to excellence, I follow established processes and frameworks, contributing to organizational success with every endeavor.'),
(4, 'help', 'Virtual Assistance .. About Weather, Current time of Asia/Calcutta  TimeZone ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatb`
--
ALTER TABLE `chatb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatb`
--
ALTER TABLE `chatb`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
