# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: dienmay
# Generation Time: 2013-10-25 10:28:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lit_news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lit_news`;

CREATE TABLE `lit_news` (
  `u_id` int(11) NOT NULL COMMENT '		',
  `nc_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_image` varchar(255) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_slug` varchar(255) NOT NULL,
  `n_content` text NOT NULL,
  `n_source` varchar(255) NOT NULL,
  `n_seotitle` varchar(255) NOT NULL,
  `n_seokeyword` text NOT NULL,
  `n_seodescription` text NOT NULL,
  `n_metarobot` varchar(100) DEFAULT NULL,
  `n_countview` int(11) NOT NULL,
  `n_countreview` int(11) NOT NULL,
  `n_displayorder` int(11) NOT NULL,
  `n_status` tinyint(4) NOT NULL,
  `n_ipaddress` int(11) NOT NULL,
  `n_resourceserver` tinyint(4) NOT NULL,
  `n_datecreated` int(10) NOT NULL,
  `n_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`n_id`),
  KEY `u_id` (`u_id`),
  KEY `nc_id` (`nc_id`),
  KEY `n_status` (`n_status`),
  KEY `n_countview` (`n_countview`),
  KEY `n_countreview` (`n_countreview`),
  KEY `n_displayorder` (`n_displayorder`),
  KEY `n_datecreated` (`n_datecreated`),
  KEY `n_status_2` (`n_status`),
  KEY `n_datecreated_2` (`n_datecreated`),
  KEY `n_status_3` (`n_status`),
  KEY `n_countview_2` (`n_countview`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
