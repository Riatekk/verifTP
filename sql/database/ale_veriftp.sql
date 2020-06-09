-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 juin 2020 à 15:36
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ale_veriftp`
--
CREATE DATABASE IF NOT EXISTS `ale_veriftp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ale_veriftp`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `PSD_SuppressionEleves`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSD_SuppressionEleves` (IN `unId` INT)  MODIFIES SQL DATA
DELETE FROM eleves WHERE id = unId$$

DROP PROCEDURE IF EXISTS `PSI_AjoutEleve`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSI_AjoutEleve` (IN `unNom` VARCHAR(255), IN `unPrenom` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO eleves (Nom, Prenom) VALUES (unNom, unPrenom)$$

DROP PROCEDURE IF EXISTS `PSS_ListeEleve`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSS_ListeEleve` ()  SELECT id, Nom, Prenom, Trigramme, Mail FROM eleves$$

DROP PROCEDURE IF EXISTS `PSU_ModificationEleves`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSU_ModificationEleves` (IN `unId` INT, IN `unNom` VARCHAR(255), IN `unPrenom` VARCHAR(255))  MODIFIES SQL DATA
UPDATE eleves SET Nom=unNom,Prenom=unPrenom WHERE id = unId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Trigramme` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`) VALUES
(18, 'DEVIN', 'Teddy', 'TDE', 'Teddy.DEVIN@campus-la-chataigneraie.org'),
(19, 'DUPONCHEL', 'Julien', 'JDU', 'Julien.DUPONCHEL@campus-la-chataigneraie.org'),
(22, 'GOUCHET', 'Theo', 'TGO', 'Theo.GOUCHET@campus-la-chataigneraie.org'),
(23, 'HENRIQUES', 'Sylvio', 'SHE', 'Sylvio.HENRIQUES@campus-la-chataigneraie.org'),
(24, 'LACHENY', 'Baptiste', 'BLA', 'Baptiste.LACHENY@campus-la-chataigneraie.org'),
(25, 'LEJEUNE', 'Thibaud', 'TLE', 'Thibaud.LEJEUNE@campus-la-chataigneraie.org'),
(26, 'LEMOINE', 'Antonin', 'ALE', 'Antonin.LEMOINE@campus-la-chataigneraie.org'),
(27, 'LETERME', 'Matthieu', 'MLE', 'Matthieu.LETERME@campus-la-chataigneraie.org'),
(29, 'MULLER ', 'Lucien', 'LMU', 'Lucien.MULLER @campus-la-chataigneraie.org'),
(30, 'PETIT', 'Alexandre', 'APE', 'Alexandre.PETIT@campus-la-chataigneraie.org'),
(31, 'QUINTANEL', 'Maxime', 'MQU', 'Maxime.QUINTANEL@campus-la-chataigneraie.org'),
(32, 'REIX', 'Elodie', 'ERE', 'Elodie.REIX@campus-la-chataigneraie.org');

--
-- Déclencheurs `eleves`
--
DROP TRIGGER IF EXISTS `Tri_ALE_Mail`;
DELIMITER $$
CREATE TRIGGER `Tri_ALE_Mail` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_ALE_Trigramme`;
DELIMITER $$
CREATE TRIGGER `Tri_ALE_Trigramme` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Trigramme = UPPER(CONCAT(LEFT( NEW.Prenom, 1), LEFT( NEW.Nom,2 )))
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
