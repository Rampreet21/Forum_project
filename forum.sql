-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 09:30 AM
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
-- Database: `x_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_des`) VALUES
(1, 'Python', 'Python is a high-level, interpreted language known for its simplicity and readability. It\'s widely used in web development and data science.'),
(2, 'JavaScript', 'JavaScript is the core language of the web. It runs in browsers and allows developers to create interactive websites.'),
(3, 'C++', 'C++ is an extension of the C language with object-oriented features. It is used in game development, operating systems, and high-performance applications.'),
(4, 'PHP', 'PHP (Hypertext Preprocessor) is a server-side scripting language mainly used for web development. It powers many websites and content management systems like WordPress.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(3) NOT NULL,
  `comment_by` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `thread_id` int(3) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comment_by`, `comment`, `thread_id`, `dt`) VALUES
(1, 'herry', 'C++ is a powerful, high-performance programming language used to create software, games, operating systems, browsers, and more.', 16, '2025-08-03 14:35:36'),
(3, 'subh', 'PHP is a best for data base ', 17, '2025-08-03 14:56:56'),
(4, 'jacky', 'python is a programing laguage ', 18, '2025-08-03 15:02:21'),
(5, 'herry', 'you noob you dont no any thing', 18, '2025-08-03 15:02:56'),
(6, 'Rampreet', 'OK', 16, '2025-08-03 16:27:09'),
(8, 'Rampreet', 'its working thanks', 2, '2025-08-03 17:15:16'),
(13, 'Rampreet', 'Make sure the variable is declared before use, and spelling is correct.', 4, '2025-08-04 23:01:25'),
(14, 'Rampreet', 'thanks for helping', 4, '2025-08-04 23:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(3) NOT NULL,
  `thread_by` varchar(20) NOT NULL,
  `titles` varchar(50) NOT NULL,
  `descriptions` text NOT NULL,
  `cat_id` int(4) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_by`, `titles`, `descriptions`, `cat_id`, `dt`) VALUES
(1, 'Rampreet', 'SyntaxError: invalid syntax', 'This usually means you\'ve made a typo or missed a colon : or a closing bracket. Fix: Double-check your code structure, especially after if, for, def, etc.', 1, '0000-00-00 00:00:00'),
(2, 'harry', 'IndentationError: expected an indented block', 'Python relies on indentation. If you miss it, Python gets confused. Fix: Use consistent indentation (usually 4 spaces) and avoid mixing tabs with spaces.', 1, '2025-08-02 00:00:00'),
(4, 'jacky', 'NameError: name \'x\' is not defined', 'You\'re trying to use a variable or function that hasn’t been defined yet.Fix: Make sure the variable is declared before use, and spelling is correct.', 1, '2025-08-02 22:27:19'),
(5, 'lio', 'Uncaught ReferenceError: x is not defined', 'You’re trying to use a variable that hasn’t been declared. <br>\n✅ Fix: Check for typos or make sure the variable is declared using let, const, or var.', 2, '2025-08-02 22:40:56'),
(6, 'subh', 'TypeError: x is not a function', 'You’re trying to call something like a function, but it’s not one. <br>\n✅ Fix: Make sure x is a function and not a number, object, or string.', 2, '2025-08-02 22:43:21'),
(7, 'cheema', 'NaN (Not a Number)', 'Happens when you do math on something that isn’t a number.<br>\n✅ Fix: Use typeof or Number.isNaN() to check values before operations.', 2, '2025-08-02 22:43:21'),
(8, 'VK', 'Uncaught ReferenceError: x is not defined', 'You’re trying to use a variable that hasn’t been declared.<br>\r\n✅ Fix: Check for typos or make sure the variable is declared using let, const, or var.', 2, '2025-08-03 12:45:16'),
(15, 'tamwinder', 'SyntaxError invalid syntax', 'This usually means you have made a typo or missed a colon or a closing bracket.\r\n Fix. Double-check your code structure, especially after if, for, def, etc.', 4, '2025-08-03 13:31:58'),
(16, 'RK', 'C++ basics ', 'tell me about C++ ', 3, '2025-08-03 13:39:56'),
(17, 'gill', 'PHP is database handler', 'please explain php database in detail', 4, '2025-08-03 14:51:23'),
(18, 'subh', 'Python basic', 'what is python tell me about ', 1, '2025-08-03 15:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `titles` (`titles`,`descriptions`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
