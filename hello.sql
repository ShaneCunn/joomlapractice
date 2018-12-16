-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for joomla
CREATE DATABASE IF NOT EXISTS `joomla` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `joomla`;

-- Dumping structure for table joomla.fzdb9_hellomodule
CREATE TABLE IF NOT EXISTS `fzdb9_hellomodule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `darkskyAPI` varchar(50) NOT NULL DEFAULT '0',
  `lat` varchar(50) NOT NULL DEFAULT '0',
  `longitude` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table joomla.fzdb9_hellomodule: ~1 rows (approximately)
/*!40000 ALTER TABLE `fzdb9_hellomodule` DISABLE KEYS */;
INSERT INTO `fzdb9_hellomodule` (`id`, `darkskyAPI`, `lat`, `longitude`) VALUES
	(1, '2457a1a06421272ba3217d68bf4f47fa', '53.270962', ' -9.062691');
/*!40000 ALTER TABLE `fzdb9_hellomodule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
