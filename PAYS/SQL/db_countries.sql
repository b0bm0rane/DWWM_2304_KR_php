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
CREATE DATABASE IF NOT EXISTS `db_countries` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_countries`;

-- Listage de la structure de table db_countries. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table db_countries.doctrine_migration_versions : ~1 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20240214104302', '2024-02-14 10:43:33', 22),
	('DoctrineMigrations\\Version20240214111217', '2024-02-14 11:12:24', 72),
	('DoctrineMigrations\\Version20240214112614', '2024-02-14 11:26:50', 65),
	('DoctrineMigrations\\Version20240214132220', '2024-02-14 13:22:27', 694),
	('DoctrineMigrations\\Version20240214134647', '2024-02-14 13:46:54', 36),
	('DoctrineMigrations\\Version20240214135138', '2024-02-14 13:51:44', 13),
	('DoctrineMigrations\\Version20240214135246', '2024-02-14 13:52:50', 60),
	('DoctrineMigrations\\Version20240214135656', '2024-02-14 13:57:01', 11),
	('DoctrineMigrations\\Version20240214140344', '2024-02-14 14:03:50', 33);

-- Listage de la structure de table db_countries. pays
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_pays` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_349F3CAE274566F` (`code_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table db_countries.pays : ~20 rows (environ)
INSERT INTO `pays` (`id`, `code_pays`, `nom_pays`) VALUES
	(1, 'AD', 'Andorra'),
	(2, 'AE', 'United Arab Emirates'),
	(3, 'AF', 'Afghanistan'),
	(4, 'AG', 'Antigua and Barbuda'),
	(5, 'AI', 'Anguilla'),
	(6, 'AL', 'Albania'),
	(7, 'AM', 'Armenia'),
	(8, 'AO', 'Angola'),
	(9, 'AQ', 'Antarctica'),
	(10, 'AR', 'Argentina'),
	(11, 'FR', 'France'),
	(12, 'BE', 'Belgium'),
	(13, 'US', 'United States'),
	(14, 'RU', 'Russian Federation'),
	(15, 'GB', 'United Kingdom'),
	(16, 'NL', 'Netherlands'),
	(17, 'DE', 'Germany'),
	(18, 'IT', 'Italy'),
	(19, 'ES', 'Spain'),
	(20, 'CH', 'Switzerland');

-- Listage de la structure de table db_countries. ville
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_postal_ville` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_pays` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table db_countries.ville : ~30 rows (environ)
INSERT INTO `ville` (`id`, `code_postal_ville`, `nom_ville`, `code_pays`, `nom_pays`) VALUES
	(1, '75000', 'Paris', 'FR', 'France'),
	(4, '59000', 'Lille', 'FR', 'France'),
	(5, '68100', 'Mulhouse', 'FR', 'France'),
	(6, '31000', 'Toulouse', 'FR', 'France'),
	(7, '69000', 'Lyon', 'FR', 'France'),
	(8, '13000', 'Marseille', 'FR', 'France'),
	(9, '67000', 'Strasbourg', 'FR', 'France'),
	(10, '34000', 'Montpellier', 'FR', 'France'),
	(11, '44000', 'Nantes', 'FR', 'France'),
	(12, '29200', 'Brest', 'FR', 'France'),
	(13, '45000', 'Orléans', 'FR', 'France'),
	(14, '51100', 'Reims', 'FR', 'France'),
	(15, '83000', 'Toulon', 'FR', 'France'),
	(16, '06100', 'Nice', 'FR', 'France'),
	(17, '33800', 'Bordeaux', 'FR', 'France'),
	(18, '1000', 'Bruxelles', 'BE', 'Belgium'),
	(19, '8200', 'Brugges', 'BE', 'Belgium'),
	(20, '90001', 'Los Angeles', 'US', 'United States'),
	(21, '20001', 'Washington', 'US', 'United States'),
	(22, '10001', 'New-York', 'US', 'United States'),
	(23, '02110', 'Boston', 'US', 'United States'),
	(24, '187015', 'Saint-Pétersbourg', 'RU', 'Russian Federation'),
	(25, 'WC1B', 'London', 'GB', 'United Kingdom'),
	(26, 'L73', 'Liverpool', 'GB', 'United Kingdom'),
	(27, '1058', 'Amsterdam', 'NL', 'Netherlands'),
	(28, '10115', 'Berlin', 'DE', 'Germany'),
	(29, '00042', 'Rome', 'IT', 'Italy'),
	(30, '28001', 'Madrid', 'ES', 'Spain'),
	(31, '08001', 'Barcelone', 'ES', 'Spain'),
	(32, '1201', 'Genève', 'CH', 'Switzerland');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
