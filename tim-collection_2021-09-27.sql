# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: tim-collection
# Generation Time: 2021-09-27 13:18:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table first-editions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `first-editions`;

CREATE TABLE `first-editions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(255) NOT NULL DEFAULT '',
  `published` int(4) NOT NULL,
  `covertype` enum('Hardback','Softback') NOT NULL DEFAULT 'Hardback',
  `condition` enum('Mint','Good','Fair','Poor') NOT NULL DEFAULT 'Good',
  `signed` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `first-editions` WRITE;
/*!40000 ALTER TABLE `first-editions` DISABLE KEYS */;

INSERT INTO `first-editions` (`id`, `title`, `author`, `published`, `covertype`, `condition`, `signed`, `image`)
VALUES
	(1,'Doctor Zhivago','Boris Pasternak',1957,'Hardback','Fair',0,'doctorzhivago.jpg'),
	(2,'Schindler\'s Ark','Thomas Keneally',1982,'Hardback','Good',0,'schindlersark.jpg'),
	(3,'Firestarter','Stephen King',1980,'Hardback','Good',0,'firestarter.jpg'),
	(4,'Elephant Song','Wilbur Smith',1991,'Hardback','Good',0,'elephantsong.jpg'),
	(5,'The Honourable Schoolboy','John Le Carre',1977,'Hardback','Good',0,'thehonourableschoolboy.jpg'),
	(6,'The Monogram Murders','Sophie Hannah ',2014,'Hardback','Good',1,'themonogrammurders.jpg');

/*!40000 ALTER TABLE `first-editions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
