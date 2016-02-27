CREATE DATABASE `courseware` DEFAULT CHARACTER SET = `utf8`;
USE `courseware`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(8) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `code`, `title`)
VALUES
	(1,'FOUN1001','English'),
	(2,'INFO3410','Web Systems'),
	(3,'INFO1001','Introduction to IT');

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `courseid` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `content` text,
  `editdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `courseid`, `title`, `content`, `editdate`)
VALUES
	(1,1,'Punctuations','Punctuation is important','2016-02-17 15:32:23'),
	(2,1,'Subject-Verb Agreement','The verb must match the subject.','2016-02-17 15:33:04'),
	(3,2,'The relational model','Data redundancy, Physical data independence Logical data independence, High level language','2016-02-17 15:33:45'),
	(4,2,'Extreme requirements and absurd development schedules','If you have not done any Web development already and therefore aren\'t familiar with any of the standard tools, we can suggest some ways to configure your development server based on our past experience. ','2016-02-17 15:35:25'),
	(5,2,'Concurrency','1000 people might be using the system at the same time. 100,000 users might show up tomorrow even if only 100 are using the system today','2016-02-17 15:36:46'),
	(6,3,'Pair Programming','Research on programmer productivity has demonstrated that pair programming, where two programmers sit together during coding, produces better quality code faster than two programmers coding on their own. For group projects, we encourage you to do pair programming.','2016-02-17 15:37:51');

/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
