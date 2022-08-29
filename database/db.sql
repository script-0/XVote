
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--- USE `Chu2uV1pit`;

DROP TABLE IF EXISTS `votes`;
DROP TABLE IF EXISTS `candidate`;
DROP TABLE IF EXISTS `postes`;

CREATE TABLE `postes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`class_name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postes`
--

INSERT INTO `postes` VALUES 
(1,'President','president'),
(2,'Vice President 1','vp1'),
(3,'Vice President 2','vp2'),
(4,'General Secretary','sgr'),
(5,'Assistant General Secretary','sga'),
(6,'Auditor','commisaire'),
(7,'Treasurer','tresorier'),
(8,'Censor 1','censeur1'),
(9,'Censor 2','censeur2');

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) ,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`candidate_id`),
  FOREIGN KEY (`position`) REFERENCES `postes`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` VALUES 
(10,6,'Test','test','1st Year','Homme','upload/male3.jpg'),
(11,1,'Isaac','NDEMA','4th Year','Homme','upload/male3.jpg'),
(12,1,'Erica','Njank','4th Year','Femme','upload/female3.jpg'),
(13,2,'Christine','Nouh','3rd Year','Femme','upload/female3.jpg'),
(14,4,'Frank','Lamp','3rd Year','Homme','upload/male3.jpg'),
(15,6,'Isaac','Test','4th Year','Femme','upload/male3.jpg'),
(16,8,'Franklin','Orion','4th Year','Homme','upload/male3.jpg');

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES (1,'admin','admin','Isaac','Ndema');

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
CREATE TABLE `voters` (
  `voters_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  PRIMARY KEY (`voters_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` VALUES 
(11,'17P123','@pass','Isaac','Ndema','4th Year','UnVoted','Active'),
(12,'17P124','@pass','Isaac','Isa','5th Year','UnVoted','Active'),
(13,'17P125','@pass','User','1','3rd Year','UnVoted','Active'),
(14,'17P126','@pass','User','2','1st Year','UnVoted','Active'),
(15,'17P128','@pass','Test','Isaac','4th Year','Unvoted','Active'),
(16,'17P150','@pass','voter','viter','3rd Year','UnVoted','Active'),
(17,'17P160','12345','Isa','Kalaka','4th Year','UnVoted','Active');

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
-- Dump completed on 2021-08-27  9:27:28
