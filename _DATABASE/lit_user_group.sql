-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2013 at 08:43 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mywork`
--

-- --------------------------------------------------------

--
-- Table structure for table `lit_user_group`
--

CREATE TABLE `lit_user_group` (
  `ug_id` int(11) NOT NULL AUTO_INCREMENT,
  `ug_value` tinyint(4) NOT NULL,
  `ug_name` varchar(255) NOT NULL,
  `ug_datecreated` int(10) NOT NULL,
  `ug_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`ug_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lit_user_group`
--

INSERT INTO `lit_user_group` (`ug_id`, `ug_value`, `ug_name`, `ug_datecreated`, `ug_datemodified`) VALUES
(1, 0, 'Guest', 1383481534, 0),
(2, 1, 'Administrator', 1383481555, 0),
(3, 5, 'Moderator', 1383481571, 0),
(4, 20, 'Member', 1383481583, 0);
