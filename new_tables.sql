CREATE TABLE `hetal_db`.`admin_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `suburb` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1

CREATE TABLE `hetal_db`.`admin_medical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disease` varchar(45) DEFAULT NULL,
  `vaccine_company` varchar(45) DEFAULT NULL,
  `vaccine_duration` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1

CREATE TABLE `hetal_db`.`admin_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(45) DEFAULT NULL,
  `travel_purpose` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `suburb` varchar(45) DEFAULT NULL,
  `restricted_country` varchar(45) DEFAULT NULL,
  `restricted_state` varchar(45) DEFAULT NULL,
  `restricted_city` varchar(45) DEFAULT NULL,
  `restricted_suburb` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1