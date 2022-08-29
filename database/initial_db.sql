-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `position`, `firstname`, `lastname`, `year_level`, `gender`, `img`) VALUES
(10, '6', 'Test', 'test', '1st Year', 'Homme', 'upload/male3.jpg'),
(11, '1', 'Isaac', 'NDEMA', '4th Year', 'Homme', 'upload/male3.jpg'),
(12, '1', 'Erica', 'Njank', '4th Year', 'Femme', 'upload/female3.jpg'),
(13, '2', 'Christine', 'Nouh', '3rd Year', 'Femme', 'upload/female3.jpg'),
(14, '4', 'Frank', 'Lamp', '3rd Year', 'Homme', 'upload/male3.jpg'),
(15, '6', 'Isaac', 'Test', '4th Year', 'Femme', 'upload/male3.jpg'),
(16, '8', 'Franklin', 'Orion', '4th Year', 'Homme', 'upload/male3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `postes`
--

CREATE TABLE IF NOT EXISTS `postes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`class_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `postes`
--

INSERT INTO `postes` (`id`, `name`, `class_name`) VALUES
(1, 'President', 'president'),
(2, 'Vice President 1', 'vp1'),
(3, 'Vice President 2', 'vp2'),
(4, 'General Secretary', 'sgr'),
(5, 'Assistant General Secretary', 'sga'),
(6, 'Auditor', 'commisaire'),
(7, 'Treasurer', 'tresorier'),
(8, 'Censor 1', 'censeur1'),
(9, 'Censor 2', 'censeur2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', '$2y$10$qHPItGj1whb4MFcCJAqhR.Mq7tQi94TVV0HFQs/hSiwT0twDT04S2', 'Isaac', 'Ndema');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `voters_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  PRIMARY KEY (`voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voters_id`, `id_number`, `password`, `firstname`, `lastname`, `year_level`, `status`, `account`) VALUES
(11, '17P123', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'Isaac', 'Ndema', '4th Year', 'Voted', 'Active'),
(12, '17P124', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'Isaac', 'Isa', '5th Year', 'UnVoted', 'Active'),
(13, '17P125', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'User', '1', '3rd Year', 'UnVoted', 'Active'),
(14, '17P126', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'User', '2', '1st Year', 'UnVoted', 'Active'),
(15, '17P128', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'Test', 'Isaac', '4th Year', 'Unvoted', 'Active'),
(16, '17P150', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'voter', 'viter', '3rd Year', 'Voted', 'Active'),
(17, '17P160', '$2y$10$Kq.s3scJIiFyRW9c9zRom.Uk/qXhfSp4Wqi.pCMkNZd2ajKBkK8h2', 'Isa', 'Kalaka', '4th Year', 'Voted', 'Active'),
(19, '17P201', '$2y$10$WY9QrclADsJRFyTYjVHeq.zbyKEkDsdIJKMsXHdd2AoH3Bp5dRxeC', 'Issaac', 'NDEMA', '1st Year', 'Unvoted', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int(255) NOT NULL AUTO_INCREMENT,
  `candidate_id` varchar(255) NOT NULL,
  `voters_id` varchar(255) NOT NULL,
  `poste_class_name` varchar(20) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `candidate_id`, `voters_id`, `poste_class_name`) VALUES
(94, '11', '11', 'president'),
(95, '13', '11', 'vp1'),
(96, '-1', '11', 'vp2'),
(97, '14', '11', 'sgr'),
(98, '-1', '11', 'sga'),
(99, '10', '11', 'commisaire'),
(100, '-1', '11', 'tresorier'),
(101, '-1', '11', 'censeur1'),
(102, '-1', '11', 'censeur2'),
(103, '11', '16', 'president'),
(104, '13', '16', 'vp1'),
(105, '-1', '16', 'vp2'),
(106, '14', '16', 'sgr'),
(107, '-1', '16', 'sga'),
(108, '10', '16', 'commisaire'),
(109, '-1', '16', 'tresorier'),
(110, '-1', '16', 'censeur1'),
(111, '-1', '16', 'censeur2'),
(112, '12', '17', 'president'),
(113, '13', '17', 'vp1'),
(114, '-1', '17', 'vp2'),
(115, '14', '17', 'sgr'),
(116, '-1', '17', 'sga'),
(117, '15', '17', 'commisaire'),
(118, '-1', '17', 'tresorier'),
(119, '16', '17', 'censeur1'),
(120, '-1', '17', 'censeur2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
