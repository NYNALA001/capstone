-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2018 at 11:00 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

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

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `article_author` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_author`, `article_content`, `article_timestamp`) VALUES
(1, 'Number one article', 'admin', 'I am currently learning PHP for capstone project!!', 1533499876),
(2, '', 'Alan', '', 15334998),
(6, 'Third', 'Keegn', ' Working now with coders.', 1534277926),
(7, 'Something', 'ret', 'Something good is cooking ', 1534278070);

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

DROP TABLE IF EXISTS `nodes`;
CREATE TABLE IF NOT EXISTS `nodes` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(255) NOT NULL,
  `node_description` text NOT NULL,
  `node_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dp_url` varchar(255) NOT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_permission` int(10) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `node_id` int(11) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_permission`, `user_name`, `user_surname`, `user_email`, `user_password`, `node_id`, `date_joined`) VALUES
(1, 3, 'admin', 'Surname', 'admin@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58'),
(2, 1, 'Alan', 'Nyanhete', 'alanabove@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58'),
(4, 3, 'Keegan', 'Naidoo', 'keegan@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 0, '2018-08-14 21:45:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
