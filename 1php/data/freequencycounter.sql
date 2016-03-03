CREATE DATABASE `frequencycounter`;
USE `frequencycounter`;
DROP TABLE IF EXISTS `wordfrequency`;
CREATE TABLE `wordfrequency` (`id` int(11) NOT NULL AUTO_INCREMENT, `word` varchar(128) NOT NULL DEFAULT '', `frequency` int(11) NOT NULL DEFAULT 0, PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `wordfrequency` (`word`, `frequency`) VALUES ('database', 4);