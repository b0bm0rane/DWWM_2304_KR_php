-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour db_countries
DROP DATABASE IF EXISTS `db_countries`;
CREATE DATABASE IF NOT EXISTS `db_countries` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_countries`;

-- Listage de la structure de table db_countries. doctrine_migration_versions
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table db_countries.doctrine_migration_versions : ~1 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20240215081624', '2024-02-15 08:16:33', 23),
	('DoctrineMigrations\\Version20240215084204', '2024-02-15 08:43:20', 70),
	('DoctrineMigrations\\Version20240215084605', '2024-02-15 08:46:11', 40);

-- Listage de la structure de table db_countries. pays
DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_pays` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_349F3CAE274566F` (`code_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table db_countries.pays : ~0 rows (environ)
INSERT INTO `pays` (`id`, `code_pays`, `nom_pays`) VALUES
	(1, 'FR', 'France'),
	(2, 'BE', 'Belgium'),
	(3, 'US', 'United States'),
	(4, 'RU', 'Russian Federation'),
	(5, 'GB', 'United Kingdom'),
	(6, 'NL', 'Netherlands'),
	(7, 'DE', 'Germany'),
	(8, 'IT', 'Italy'),
	(9, 'ES', 'Spain'),
	(10, 'CH', 'Switzerland');

-- Listage de la structure de table db_countries. ville
DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pays_id` int NOT NULL,
  `code_postal_ville` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43C3D9C37879EB34` (`id_pays_id`),
  CONSTRAINT `FK_43C3D9C37879EB34` FOREIGN KEY (`id_pays_id`) REFERENCES `pays` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table db_countries.ville : ~0 rows (environ)
INSERT INTO `ville` (`id`, `id_pays_id`, `code_postal_ville`, `nom_ville`) VALUES
	(1, 1, '75000', 'Paris'),
	(2, 1, '59000', 'Lille'),
	(3, 1, '68100', 'Mulhouse'),
	(4, 1, '31000', 'Toulouse'),
	(5, 1, '69000', 'Lyon'),
	(6, 1, '13000', 'Marseille'),
	(7, 1, '67000', 'Strasbourg'),
	(8, 1, '34000', 'Montpellier'),
	(9, 1, '44000', 'Nantes'),
	(10, 1, '29200', 'Brest'),
	(11, 1, '45000', 'Orléans'),
	(12, 1, '51100', 'Reims'),
	(13, 1, '83000', 'Toulon'),
	(14, 1, '06100', 'Nice'),
	(15, 1, '33800', 'Bordeaux'),
	(16, 2, '1000', 'Bruxelles'),
	(17, 2, '5004', 'Namur'),
	(18, 2, '8200', 'Brugges'),
	(19, 3, '90001', 'Los Angeles'),
	(20, 3, '20001', 'Washington'),
	(21, 3, '10001', 'New-York'),
	(22, 3, '02110', 'Boston'),
	(23, 4, '102301', 'Moscou'),
	(24, 4, '187015', 'Saint-Pétersbourg'),
	(25, 5, 'WC1B', 'London'),
	(26, 5, 'L73', 'Liverpool'),
	(27, 6, '1058', 'Amsterdam'),
	(28, 7, '10115', 'Berlin'),
	(29, 8, '00042', 'Rome'),
	(30, 9, '28001', 'Madrid'),
	(31, 9, '08001', 'Barcelone'),
	(32, 10, '1201', 'Genève');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
