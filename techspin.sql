-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2013 at 02:39 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techspin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bollywood`
--

CREATE TABLE `bollywood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `actors` char(200) NOT NULL,
  `directors` char(200) NOT NULL,
  `copies` int(3) NOT NULL,
  `musicdirector` char(200) NOT NULL,
  `rentalcost` int(11) NOT NULL,
  `genres` char(30) NOT NULL,
  `mostviewed` int(11) NOT NULL,
  `imagelocation` varchar(100) NOT NULL,
  `totalcopies` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bollywood`
--

INSERT INTO `bollywood` VALUES(4, '3idiots', 'Hrithick,Sharku', 'Anarug', 2, 'Shankar', 20, 'action', 6, 'bollywoodImages/3-idiots-poster.jpg', 2);
INSERT INTO `bollywood` VALUES(3, 'Doom3', 'Hrithick,Sharku', 'Anarug', 4, 'Shankar', 35, 'action', 9, 'bollywoodImages/211295dhoom2cover.jpg', 4);
INSERT INTO `bollywood` VALUES(6, 'Rab ne Ban Na De Jodi', 'SrK,Anushka', 'Poori', 1, 'loy', 33, 'drama', 9, 'bollywoodImages/Rab_Ne_Bana_Di_Jodi_Movie_BollywoodSargam_hot_558624.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hollywood`
--

CREATE TABLE `hollywood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `actors` char(200) NOT NULL,
  `directors` char(200) NOT NULL,
  `copies` int(3) NOT NULL,
  `musicdirector` char(200) NOT NULL,
  `rentalcost` int(11) NOT NULL,
  `genres` char(30) NOT NULL,
  `mostviewed` int(11) NOT NULL,
  `imagelocation` varchar(100) NOT NULL,
  `totalcopies` int(11) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `hollywood`
--

INSERT INTO `hollywood` VALUES(16, 'Sherlock Holmesman', 'surya,thamana,jack', 'David,leo', 4, 'sharma,shankar', 40, 'action', 15, 'hollywoodImages/MV5BMTg0NjEwNjUxM15BMl5BanBnXkFtZTcwMzk0MjQ5Mg@@._V1._SX640_SY956_.jpg', 4);
INSERT INTO `hollywood` VALUES(17, 'Iron Man', 'surya,thamana,jack', 'David,leo', 4, 'Ramsharma', 20, 'art', 13, 'hollywoodImages/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1._SX640_SY948_.jpg', 4);
INSERT INTO `hollywood` VALUES(18, 'Rampart', 'xyz', 'Michal', 2, 'Roy Brothers', 40, 'drama', 11, 'hollywoodImages/MV5BMTk4MjAxNzU2MV5BMl5BanBnXkFtZTcwMDA5NTAwNw@@._V1._SX640_SY948_.jpg', 2);
INSERT INTO `hollywood` VALUES(19, 'Ghost Rider 2', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'kfsdjkkkd', 2, 'fksd,fsdf, fsdaf, fsdafk,', 100, 'action', 20, 'hollywoodImages/MV5BMTkwNDM5MDEzOF5BMl5BanBnXkFtZTcwNDEyNTUxNw@@._V1._SX640_SY948_.jpg', 2);
INSERT INTO `hollywood` VALUES(20, 'Avatar', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'fas, fasd, fasdfe, fsad', 3, 'fksd,fsdf, fsdaf, fsdafk,', 80, 'art', 25, 'hollywoodImages/MV5BMTc3MDcwMTc1MV5BMl5BanBnXkFtZTcwMzk4NTU3Mg@@._V1._SX505_SY755_.jpg', 3);
INSERT INTO `hollywood` VALUES(21, 'The Dark Knight', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'fas, fasd, fasdfe, fsad', 4, 'fksd,fsdf, fsdaf, fsdafk,', 60, 'action', 24, 'hollywoodImages/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1._SX640_SY948_.jpg', 4);
INSERT INTO `hollywood` VALUES(22, 'The Usual Suspected', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'fas, fasd, fasdfe, fsad', 3, 'fksd,fsdf, fsdaf, fsdafk,', 25, 'comedy', 17, 'hollywoodImages/MV5BMzI1MjI5MDQyOV5BMl5BanBnXkFtZTcwNzE4Mjg3NA@@._V1._SX640_SY960_.jpg', 3);
INSERT INTO `hollywood` VALUES(23, 'The Silence Of the Lambs', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'fas, fasd, fasdfe, fsad', 2, 'fksd,fsdf, fsdaf, fsdafk,', 40, 'drama', 70, 'hollywoodImages/MV5BMTQ2NzkzMDI4OF5BMl5BanBnXkFtZTcwMDA0NzE1NA@@._V1._SX640_SY960_.jpg', 2);
INSERT INTO `hollywood` VALUES(24, 'Undefeated', 'fsdkjf, fsdf, fksdjafd, fjsdkfa,', 'fas, fasd, fasdfe, fsad', 3, 'fksd,fsdf, fsdaf, fsdafk,', 70, 'drama', 64, 'hollywoodImages/MV5BMjE0NTE5ODI2MV5BMl5BanBnXkFtZTcwNDA1MDA0Nw@@._V1._SX640_SY948_.jpg', 3);
INSERT INTO `hollywood` VALUES(25, 'Death Note 2', 'L, Kira, ShinaGami', 'Chink-Ku', 3, 'Sony-BMG', 30, 'drama', 16, 'hollywoodImages/MV5BMTQyNDE5OTc2MF5BMl5BanBnXkFtZTcwMzc1MDU1MQ@@._V1._SX355_SY500_.jpg', 3);
INSERT INTO `hollywood` VALUES(26, 'Matrix', 'xyz, Kool, Hol', 'Michael', 1, 'Warner Bro', 30, 'action', 17, 'hollywoodImages/MV5BMjEzNjg1NTg2NV5BMl5BanBnXkFtZTYwNjY3MzQ5._V1._SX338_SY475_.jpg', 1);
INSERT INTO `hollywood` VALUES(27, 'Inception', 'Leonardo', 'Michael', 2, 'Kenny G', 50, 'drama', 5, 'hollywoodImages/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1._SX640_SY948_.jpg', 2);
INSERT INTO `hollywood` VALUES(28, 'Tom Hank is forest gump', 'surya', 'Sukul', 2, 'Sameer', 30, 'drama', 10, 'hollywoodImages/MV5BMTgzMzUyMTQ4MF5BMl5BanBnXkFtZTYwMzE1MjE5._V1._SX331_SY475_.jpg', 3);
INSERT INTO `hollywood` VALUES(29, 'Paris,Jet', 'balaji', 'chiru', 9, 'yogesh', 105, 'drama', 24, 'hollywoodImages/MV5BMTc1MDgwNDE4MF5BMl5BanBnXkFtZTcwMTQzMzc0MQ@@._V1._SX450_SY676_.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `issues`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `noofcopies` int(11) NOT NULL,
  `deliverdate` date NOT NULL,
  `returndate` date NOT NULL,
  `phonenum` double NOT NULL,
  `totalcost` int(11) NOT NULL,
  `returned` int(1) NOT NULL DEFAULT '0',
  `perdaycost` int(11) NOT NULL DEFAULT '0',
  `type` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` VALUES(20, 'Doom3', 1, '2012-02-19', '2012-02-20', 9591111173, 35, 1, 35, 'bollywood');
INSERT INTO `orders` VALUES(21, 'Undefeated', 1, '2012-02-19', '2012-02-23', 9591111173, 280, 1, 70, 'hollywood');
INSERT INTO `orders` VALUES(22, 'Avatar', 1, '2012-02-19', '2012-02-21', 9591111172, 160, 1, 80, 'hollywood');
INSERT INTO `orders` VALUES(23, 'The Dark Knight', 1, '2012-02-20', '2012-02-22', 9591111170, 120, 1, 60, 'hollywood');
INSERT INTO `orders` VALUES(24, 'Undefeated', 1, '2012-02-20', '2012-02-21', 9591111173, 70, 1, 70, 'hollywood');
INSERT INTO `orders` VALUES(25, 'Avatar', 1, '2012-02-20', '2012-02-21', 9591111173, 80, 1, 80, 'hollywood');
INSERT INTO `orders` VALUES(26, 'Ghost Rider 2', 1, '2012-02-20', '2012-02-21', 9591111173, 100, 1, 100, 'hollywood');
INSERT INTO `orders` VALUES(27, 'Rab ne Ban Na De Jodi', 1, '2012-02-20', '2012-02-21', 9591111173, 33, 1, 33, 'bollywood');
INSERT INTO `orders` VALUES(28, 'Death Note 2', 1, '2012-02-23', '2012-02-25', 9480659313, 60, 1, 30, 'hollywood');
INSERT INTO `orders` VALUES(29, 'Inception', 1, '2012-02-23', '2012-02-29', 9480659313, 350, 1, 50, 'hollywood');
INSERT INTO `orders` VALUES(30, 'Matrix', 1, '2012-02-23', '2012-02-24', 9591111173, 30, 1, 30, 'hollywood');
INSERT INTO `orders` VALUES(31, '3idiots', 1, '2012-02-23', '2012-02-25', 9844224405, 40, 1, 20, 'bollywood');
INSERT INTO `orders` VALUES(32, 'Tom Hank is forest gump', 1, '2012-02-23', '2012-02-24', 9844224405, 30, 0, 30, 'hollywood');
INSERT INTO `orders` VALUES(33, 'Matrix', 1, '2012-02-23', '2012-02-24', 123456, 30, 1, 30, 'hollywood');
INSERT INTO `orders` VALUES(35, 'Titanic', 1, '2012-02-29', '2012-03-02', 959, 60, 1, 20, 'hollywood');
INSERT INTO `orders` VALUES(36, 'Titanic', 1, '2012-02-29', '2012-02-29', 0, 20, 1, 20, 'hollywood');
INSERT INTO `orders` VALUES(37, 'Paris,Jet', 1, '2012-02-29', '2012-03-02', 959, 300, 1, 100, 'hollywood');
INSERT INTO `orders` VALUES(38, 'Titanic', 1, '2012-02-29', '2012-03-01', 959, 40, 1, 20, 'hollywood');
INSERT INTO `orders` VALUES(39, 'Matrix', 1, '2012-02-29', '2012-03-01', 999, 60, 1, 30, 'hollywood');
INSERT INTO `orders` VALUES(40, 'Undefeated', 1, '2012-03-07', '2012-03-08', 959, 70, 1, 70, 'hollywood');
INSERT INTO `orders` VALUES(41, 'Paris,Jet', 1, '2012-04-03', '2012-04-04', 959, 100, 1, 100, 'hollywood');
