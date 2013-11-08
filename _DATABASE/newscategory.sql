# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: dienmay
# Generation Time: 2013-10-25 10:28:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lit_newscategory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lit_newscategory`;

CREATE TABLE `lit_newscategory` (
  `nc_id` int(11) NOT NULL AUTO_INCREMENT,
  `nc_image` varchar(255) NOT NULL,
  `nc_name` varchar(255) NOT NULL,
  `nc_slug` varchar(255) NOT NULL,
  `nc_summary` text NOT NULL,
  `nc_seotitle` varchar(255) NOT NULL,
  `nc_seokeyword` text NOT NULL,
  `nc_seodescription` text NOT NULL,
  `nc_metarobot` varchar(100) DEFAULT NULL,
  `nc_parentid` int(11) NOT NULL,
  `nc_countitem` int(11) NOT NULL,
  `nc_displayorder` tinyint(4) NOT NULL,
  `nc_status` tinyint(4) NOT NULL,
  `nc_datecreated` int(11) NOT NULL,
  `nc_datemodified` int(11) NOT NULL,
  PRIMARY KEY (`nc_id`),
  KEY `nc_status` (`nc_status`),
  KEY `nc_displayorder` (`nc_displayorder`),
  KEY `nc_parentid` (`nc_parentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
