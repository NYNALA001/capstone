-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 02:04 PM
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
(32, 'Some title 3', 'mabasodaniel@gmail.com,alanabove@gmail.com', 'time', 1534768314, './assets/uploads/Booking Confirmation28Nov.pdf'),
(27, 'Article 1', 'mabasodaniel@gmail.com', 'This is a test', 1534627448, ''),
(28, 'Article 3', 'alanabove@gmail.com', 'asdfsadfsda', 1534631412, './assets/uploads/CV as at 18_11_2016-.pdf'),
(29, 'some title', 'alanabove@gmail.com', 'blajkldsfjdfsa', 1534762149, ''),
(30, 'Hello', 'alanabove@gmail.com', 'Goodbye', 1534762734, ''),
(31, 'something\'s cooking', 'alanabove@gmail.com', 'added xo \' boy', 1534762964, './assets/uploads/eBallot.pdf'),
(23, 'Artificial Intelligence - the uprising', 'alanabove@gmail.com', 'Artificial intelligence is on the rise. Beware! For real', 1534513957, './assets/uploads/CV as at 18_11_2016-.pdf'),
(35, 'Admin And alan publication', 'alanabove@gmail.com,admin@gmail.com', 'Admin And alan publication', 1536279032, './assets/uploads/TD_Mabaso_CV_as_at_15_06_2017.pdf'),
(34, 'Contributor test', 'alanabove@gmail.com,admin@gmail.com', 'This is the contributor test', 1536276464, './assets/uploads/IMG_20170730_0001.pdf'),
(36, 'My admin article', 'admin@gmail.com', 'some article', 1536279796, './assets/uploads/Booking Confirmation28Nov.pdf'),
(37, 'Alan Admin test', 'admin@gmail.com,alanabove@gmail.com', 'Alan times 2', 1536279854, './assets/uploads/CSC3002F_2017_test2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(11) NOT NULL,
  `node_name` varchar(255) NOT NULL,
  `research_focus` text NOT NULL,
  `node_date` int(11) NOT NULL,
  `dp_url` varchar(255) NOT NULL,
  `research_focus_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`node_id`, `node_name`, `research_focus`, `node_date`, `dp_url`, `research_focus_description`) VALUES
(4, 'University of Cape Town', 'Knowledge Representation and Reasoning', 1536256787, 'assets/images/placeholder.jpg', 'Submitted by admin on Thu, 2012-06-21 21:33\r\nKRR is a research group within the Centre for Artificial Intelligence Research focusing on modelling and reasoning with formal ontologies based on description logics. We also conduct research on the following related aspects of knowledge representation and reasoning:\r\n\r\nbelief revision;\r\ncognitive robotics;\r\nconstraint solving;\r\ninformation integration;\r\nnonmonotonic and non-classical reasoning;\r\nontology construction;\r\nreasoning about actions.'),
(5, 'University of Kwazulu-natal', 'Adaptive and Cognitive Systems Lab', 1536258688, 'assets/images/placeholder.jpg', 'The Adaptive and Cognitive Systems Lab investigates architectures and frameworks for self-learning cognitive systems that are able to adapt to an evolving environment.'),
(6, 'Stellenbosch University', 'Knowledge Acquisition', 1536258834, 'assets/images/placeholder.jpg', 'Knowledge Acquisition entails a range of techniques used to obtain domain knowledge. The CAIR node at Stellenbosch University conducts research in Knowledge Acquisition as it relates to Artificial Intelligence. Our focus is therefore on the study and use of AI techniques in Knowledge Acquisition, both within the host Department of Information Science and across departments and faculties at the University. At present, CAIRÂ­-SU conducts research in the the following fields:\r\n\r\n- Algorithmics â€” the study and invention of accurate, efficient and correct algorithms;\r\n\r\n- Data Analysis â€” the transformation of data into useful information to support decisionÂ­making;\r\n\r\n- Knowledge Representation â€” the study of formal representation of and reasoning over information;\r\n\r\n- Machine Learning â€” the study of algorithms that can learn from and make predictions on data;\r\n\r\n- Visualization â€” the study of visual representations of abstract data to reinforce human cognition.'),
(7, 'UP Philosophy', '', 1536263408, 'assets/images/placeholder.jpg', 'Members of the Philosophy node of CAIR at UP (PHIL@CAIR-UP) conduct research in the broad context of Knowledge Representation and Reasoning in the fields of:\r\n\r\nPhilosophy of AI\r\nEpistemology\r\nPhilosophy of Science\r\nFormal Logic\r\nPhilosophy of Mind'),
(8, 'Daniel Super Node', 'Litness', 1537479481, 'assets/images/placeholder.jpg', 'Level 100 boy');

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
(1, 2, 'admin', 'Surname', 'admin@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 5, '2018-08-14 21:45:58'),
(2, 1, 'Alan', 'Nyanhete', 'alanabove@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 5, '2018-08-14 21:45:58'),
(4, 3, 'Keegan', 'Naidoo', 'keegan@gmail.com', '$2y$11$DQDasNeltcn0gG430OLS8ONXyi54qL68yBp8vXYrA.XcmB4OFdn1C', 4, '2018-08-14 21:45:58'),
(5, 1, 'Daniel', 'Mabaso', 'mabasodaniel@gmail.com', '$2y$11$MZynkpYVDLUgd3Z9nhKdP.5prhg4twwXCsa0FNTLz3QcrgEp/DCg2', 4, '2018-08-15 11:22:37'),
(6, 0, 'Tumelo', 'Lephadi', 'tums@gmail.com', '$2y$11$zVMoclU4qm8acXoRQyhuauqT3QFHXZPf6cvcd..rbvNp0rX.k8wVS', 0, '2018-08-18 22:28:22'),
(7, 3, 'Tommie', 'Meyer', 'tmeyer@cs.uct.ac.za', '$2y$11$BiNhtGa2hQCWYKDFe4l38eK2kJHHAEqkO7aAqPQ.Z5Sjg4TgpARci', 0, '2018-09-06 19:31:23'),
(8, 1, 'Vutivi', 'Hlungwani', 'vking@gmail.com', '$2y$11$ZOxIddtv7rAEvKimaMin4ex4xiNmnHlQJdVOmTHohsrGRUvSJgRZy', 7, '2018-09-06 22:48:27'),
(9, 1, 'Daniel', 'Zoro', 'zoro@gmail.com', '$2y$11$mjYCXQCaPs/a5nlkQClqs.XdaCayCSOFMYLVlkZF7hB3Bmbs8lI1C', 6, '2018-09-20 13:58:27'),
(10, 4, 'Guy', 'Timzon', 'timzon@gmail.com', '$2y$11$I5HN53Yi1oPDswcApt8nVOhkswFxt3N4pRuRCSfSArMXwHPBkhfpy', 4, '2018-09-20 14:04:29'),
(11, 0, 'Emily', 'Boysen', 'emily@gmail.com', '$2y$11$X76csgCzlKF7jrdtI9XHweCig/e2KnMJv9QF5NT17NyE7DDPNGsJu', 6, '2018-09-20 21:39:44');

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
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
