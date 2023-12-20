DROP DATABASE if EXISTS db_location;

CREATE DATABASE if NOT EXISTS db_location;

USE db_location;

 CREATE TABLE IF NOT EXISTS utilisateurs (
 id_user int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
 lastname_user varchar(50) NOT NULL,
 firstname_user varchar(50) NOT NULL,
 mail_user varchar(150) NOT NULL,
 pass_user varchar(400) NOT NULL,
 level_user int(10) UNSIGNED NOT NULL,
 PRIMARY KEY (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO utilisateurs (id_user, lastname_user, firstname_user, mail_user, pass_user, level_user) VALUES 
(1, "CASTAFIORE", "Bianca", "b.castafiore@gmail.com", "Rossignol", 2),
(2, "TOURNESOL", "Tryphon", "t.tournesol@gmail.com", "Tournedisque", 1);
