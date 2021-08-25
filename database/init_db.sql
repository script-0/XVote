SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cesa_vote`
--

-- --------------------------------------------------------

--
-- Drop Database if exists and reCreate Database 
--
-- DROP DATABASE IF EXISTS `cesa_vote`;
-- CREATE DATABASE IF NOT EXISTS `cesa_vote`;

--
-- Select database
--

-- USE `cesa_vote`;

USE `Chu2uV1pit`;
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
(4, 'Secrétaire Général', 'sgr'),
(5, 'Secrétaire Général Adjoint', 'sga'),
(6, 'Commisaire aux comptes', 'commisaire'),
(7, 'Trésorier', 'tresorier'),
(8, 'Censeur 1', 'censeur1'),
(9, 'Censeur 2', 'censeur2');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) ,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`candidate_id`),
  FOREIGN KEY (`position`) REFERENCES `postes`(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `position`, `firstname`, `lastname`, `year_level`, `gender`, `img`) VALUES
(3, 4, 'Mouen', 'Kevin', '4th Year', 'Homme', 'upload/male3.jpg');

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
(1, 'admin', 'admin', 'Isaac', 'Ndema');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voters_id`, `id_number`, `password`, `firstname`, `lastname`, `year_level`, `status`, `account`) VALUES
(11, '17P123', '@pass', 'Isaac', 'Ndema', '4th Year', 'UnVoted', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int(255) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11),
  `voters_id` int(11),
  `poste_id` int(11),
  PRIMARY KEY (`vote_id`),
  FOREIGN KEY (`voters_id`) REFERENCES `voters`(`voters_id`),
  FOREIGN KEY (`candidate_id`) REFERENCES `candidate`(`candidate_id`),
  FOREIGN KEY (`poste_id`) REFERENCES `postes`(`id`)
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
