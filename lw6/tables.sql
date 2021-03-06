DROP TABLE IF EXISTS `dvd`;
CREATE TABLE IF NOT EXISTS `dvd` (
  `dvd_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) DEFAULT NULL,
  `production_year` YEAR DEFAULT NULL,
  PRIMARY KEY (`dvd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `passport_code` VARCHAR(100) DEFAULT NULL,
  `registration_date` DATE DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `offer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `dvd_id` INT(11) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  `offer_date` DATE DEFAULT NULL,
  `return_date` DATE DEFAULT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;