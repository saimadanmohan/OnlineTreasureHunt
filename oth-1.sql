-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2015 at 02:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oth`
--
CREATE DATABASE IF NOT EXISTS `oth` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oth`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `qid` int(11) NOT NULL,
  `ansno` int(11) NOT NULL,
  `answer` varchar(80) NOT NULL,
  PRIMARY KEY (`qid`,`ansno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`qid`, `ansno`, `answer`) VALUES
(5, 1, 'sai'),
(5, 2, 'kiran');

-- --------------------------------------------------------

--
-- Table structure for table `questionlinks`
--

DROP TABLE IF EXISTS `questionlinks`;
CREATE TABLE IF NOT EXISTS `questionlinks` (
  `qid` int(11) NOT NULL,
  `link` varchar(20) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionlinks`
--

INSERT INTO `questionlinks` (`qid`, `link`) VALUES
(10, 'a2.php'),
(11, 'a1.php');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `Id` int(11) NOT NULL,
  `Answers` int(11) NOT NULL,
  `htmlname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solved`
--

DROP TABLE IF EXISTS `solved`;
CREATE TABLE IF NOT EXISTS `solved` (
  `TeamName` varchar(20) NOT NULL,
  `Solved` int(11) NOT NULL,
  `QuestionPattern` varchar(100) NOT NULL,
  `ChangeQn` int(11) NOT NULL,
  `Skip` int(11) NOT NULL,
  `Recharge` int(11) NOT NULL,
  `currentQ` int(11) NOT NULL,
  PRIMARY KEY (`TeamName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solved`
--

INSERT INTO `solved` (`TeamName`, `Solved`, `QuestionPattern`, `ChangeQn`, `Skip`, `Recharge`, `currentQ`) VALUES
('teamA', 0, '0000001000010101001000000011000000001110010010100001000010000000000010010001101000000010000000111001', -4, 3, 0, 6),
('teams', 0, '0000001000010101001000000011000000001110010010100001000010000000000010010001101000000010000000111001', 1, 3, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `teamprofile`
--

DROP TABLE IF EXISTS `teamprofile`;
CREATE TABLE IF NOT EXISTS `teamprofile` (
  `TeamName` varchar(20) NOT NULL,
  `TeamSize` int(11) NOT NULL,
  `Contestant1Name` varchar(30) NOT NULL,
  `Contestant1Email` varchar(40) NOT NULL,
  `Contestant1Phone` varchar(10) NOT NULL,
  `Contestant1College` varchar(40) NOT NULL,
  `Contestant2Name` varchar(30) DEFAULT NULL,
  `Contestant2Email` varchar(40) NOT NULL DEFAULT '',
  `Contestant2Phone` varchar(10) DEFAULT NULL,
  `Contestant2College` varchar(40) DEFAULT NULL,
  `TeamPassword` varchar(12) NOT NULL,
  PRIMARY KEY (`Contestant1Email`,`Contestant2Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamprofile`
--

INSERT INTO `teamprofile` (`TeamName`, `TeamSize`, `Contestant1Name`, `Contestant1Email`, `Contestant1Phone`, `Contestant1College`, `Contestant2Name`, `Contestant2Email`, `Contestant2Phone`, `Contestant2College`, `TeamPassword`) VALUES
('teamA', 1, 'sai kiran', 'gangidisaikiran@gmail.com', '8886239995', 'vasavi', NULL, '', NULL, NULL, 'qwerty'),
('teams', 2, 'tom', 'tom@gmail.com', '9292929292', 'tom@gmail.com', 'hank', 'hank@gmail.com', '9292929292', 'hank@gmail.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
