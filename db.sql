


CREATE DATABASE IF NOT EXISTS pmsdb;

use pmsdb;

CREATE TABLE IF NOT EXISTS admin (
	adId int(5) NOT NULL AUTO_INCREMENT,
	adName varchar(20) NOT NULL,
	adEmail varchar(20) NOT NULL,
	adUsername varchar(20) NOT NULL,
	adPassword varchar(20) NOT NULL,
	adMob int(10) NOT NULL,
	PRIMARY KEY(adId)
	)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS mr(
	mrId int(5) NOT NULL AUTO_INCREMENT,
	mrName varchar(20) NOT NULL,
	mrEmail varchar(20) NOT NULL,
	mrUsername varchar(20) NOT NULL,
	mrPassword varchar(20) NOT NULL,
	mrMob int(10) NOT NULL,
	PRIMARY KEY(mrId)
	)ENGINE=InnoDB DEFAULT CHARSET=latin1;

