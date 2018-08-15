-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 02:59 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbib`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_author` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_timestamp` int(11) NOT NULL,
  `article_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_author`, `article_content`, `article_timestamp`, `article_url`) VALUES
(1, 'Number one article', 'admin', 'I am currently learning PHP for capstone project!!', 1533499876, ''),
(2, 'Article 3', 'Alan', 'some content here bro', 15334998, ''),
(6, 'Third', 'Keegn', ' Working now with coders.', 1534277926, ''),
(7, 'Something', 'ret', 'Something good is cooking ', 1534278070, ''),
(9, 'Test 2', '', 'Hello world', 0, ''),
(10, 'Test 2', 'alanabove@gmail.com', 'Hello world', 0, ''),
(11, 'Article 15', 'alanabove@gmail.com', 'Test', 1534336380, ''),
(12, 'Atificial intelligence in Africa', 'alanabove@gmail.com', 'Written by Daniel M', 1534336498, ''),
(14, 'Uprising', ',alanabove@gmail.com,mabasodaniel@gmail.com', 'The uprising is here', 1534337466, ''),
(15, 'The second uprising', 'alanabove@gmail.com,camadams@gmail.com', 'We are back. This time we are way better and faster!', 1534337764, '');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(11) NOT NULL,
  `node_name` varchar(255) NOT NULL,
  `node_description` text NOT NULL,
  `node_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dp_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_permission` int(10) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `node_id` int(11) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_permission`, `user_name`, `user_surname`, `user_email`, `user_password`, `node_id`, `date_joined`) VALUES
(1, 3, 'admin', 'Surname', 'admin@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58'),
(2, 1, 'Alan', 'Nyanhete', 'alanabove@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58'),
(4, 3, 'Keegan', 'Naidoo', 'keegan@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58'),
(5, 0, 'Daniel', 'Mabaso', 'mabasodaniel@gmail.com', '$2y$11$MZynkpYVDLUgd3Z9nhKdP.5prhg4twwXCsa0FNTLz3QcrgEp/DCg2', 0, '2018-08-15 11:22:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
