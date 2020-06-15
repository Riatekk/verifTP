-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 juin 2020 à 14:25
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

DROP PROCEDURE IF EXISTS `PSD_SuppressionElevesParClasse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSD_SuppressionElevesParClasse` (IN `uneClasse` INT)  NO SQL
DELETE FROM eleves WHERE id_classe = uneClasse$$

DROP PROCEDURE IF EXISTS `PSI_AjoutClasse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSI_AjoutClasse` (IN `uneClasse` VARCHAR(255))  NO SQL
INSERT INTO classe (classe_libelle) VALUES (uneClasse)$$

DROP PROCEDURE IF EXISTS `PSI_AjoutEleve`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSI_AjoutEleve` (IN `unNom` VARCHAR(255), IN `unPrenom` VARCHAR(255), IN `IdClasse` INT UNSIGNED ZEROFILL)  MODIFIES SQL DATA
INSERT INTO eleves (Nom, Prenom, id_classe) VALUES (unNom, unPrenom,IdClasse)$$

DROP PROCEDURE IF EXISTS `PSS_ListeClasse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSS_ListeClasse` ()  NO SQL
SELECT classe_libelle
FROM classe$$

DROP PROCEDURE IF EXISTS `PSS_ListeEleve`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSS_ListeEleve` ()  SELECT E.id, Nom, Prenom, Trigramme, Mail, classe_libelle FROM eleves E INNER JOIN classe C on E.id_classe = C.id$$

DROP PROCEDURE IF EXISTS `PSU_ModificationEleves`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PSU_ModificationEleves` (IN `unId` INT, IN `unNom` VARCHAR(255), IN `unPrenom` VARCHAR(255), IN `uneClasse` INT)  MODIFIES SQL DATA
UPDATE eleves SET Nom=unNom,Prenom=unPrenom, id_classe=uneClasse WHERE id = unId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `classe_libelle`) VALUES(1, '1SIO');
INSERT INTO `classe` (`id`, `classe_libelle`) VALUES(2, '2SIO');

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
  `id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eleces_classe` (`id_classe`)
) ENGINE=MyISAM AUTO_INCREMENT=887 DEFAULT CHARSET=latin1;

--
-- Déclencheurs `eleves`
--
DROP TRIGGER IF EXISTS `Tri_INSERT_ALE_Mail`;
DELIMITER $$
CREATE TRIGGER `Tri_INSERT_ALE_Mail` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_INSERT_ALE_Trigramme`;
DELIMITER $$
CREATE TRIGGER `Tri_INSERT_ALE_Trigramme` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Trigramme = UPPER(CONCAT(LEFT( NEW.Prenom, 1), LEFT( NEW.Nom,2 )))
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_UPDATE_ALE_Mail`;
DELIMITER $$
CREATE TRIGGER `Tri_UPDATE_ALE_Mail` BEFORE UPDATE ON `eleves` FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Tri_UPDATE_ALE_Trigramme`;
DELIMITER $$
CREATE TRIGGER `Tri_UPDATE_ALE_Trigramme` BEFORE UPDATE ON `eleves` FOR EACH ROW SET NEW.Trigramme = UPPER(CONCAT(LEFT( NEW.Prenom, 1), LEFT( NEW.Nom,2 )))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `eleves_tp`
--

DROP TABLE IF EXISTS `eleves_tp`;
CREATE TABLE IF NOT EXISTS `eleves_tp` (
  `eleves_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  PRIMARY KEY (`eleves_id`,`tp_id`),
  KEY `FK_eleves_tp_tp` (`tp_id`),
  KEY `FK_eleves_tp_eleves` (`eleves_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tp`
--

DROP TABLE IF EXISTS `tp`;
CREATE TABLE IF NOT EXISTS `tp` (
  `id_tp` int(11) NOT NULL,
  `libelle_tp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
