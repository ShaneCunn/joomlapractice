CREATE TABLE IF NOT EXISTS `#__weather_darksky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `darkskyAPI` varchar(50) NOT NULL DEFAULT '0',
  `lat` varchar(50) NOT NULL DEFAULT '0',
  `longitude` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `#__weather_darksky` (`id`, `darkskyAPI`, `lat`, `longitude`) VALUES
  (1, '2457a1a06421272ba3217d68bf4f47fa', '53.270962', ' -9.062691');

