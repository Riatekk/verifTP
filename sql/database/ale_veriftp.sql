-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 juin 2020 à 15:20
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

INSERT INTO `classe` (`id`, `classe_libelle`) VALUES
(1, '1SIO'),
(2, '2SIO');

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
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES
(886, 'REIX', 'Elodie', 'ERE', 'Elodie.REIX@campus-la-chataigneraie.org', 2),
(885, 'QUINTANEL', 'Maxime', 'MQU', 'Maxime.QUINTANEL@campus-la-chataigneraie.org', 2),
(884, 'PETIT', 'Alexandre', 'APE', 'Alexandre.PETIT@campus-la-chataigneraie.org', 2),
(883, 'MULLER ', 'Lucien', 'LMU', 'Lucien.MULLER @campus-la-chataigneraie.org', 2),
(882, 'LOUET ', 'Tom', 'TLO', 'Tom.LOUET @campus-la-chataigneraie.org', 2),
(881, 'LETERME', 'Matthieu', 'MLE', 'Matthieu.LETERME@campus-la-chataigneraie.org', 2),
(880, 'LEMOINE', 'Antonin', 'ALE', 'Antonin.LEMOINE@campus-la-chataigneraie.org', 2),
(879, 'LEJEUNE', 'Thibaud', 'TLE', 'Thibaud.LEJEUNE@campus-la-chataigneraie.org', 2),
(878, 'LACHENY', 'Baptiste', 'BLA', 'Baptiste.LACHENY@campus-la-chataigneraie.org', 2),
(877, 'HENRIQUES', 'Sylvio', 'SHE', 'Sylvio.HENRIQUES@campus-la-chataigneraie.org', 2),
(876, 'GOUCHET', 'Theo', 'TGO', 'Theo.GOUCHET@campus-la-chataigneraie.org', 2),
(875, 'FRERE ', 'Thibaud', 'TFR', 'Thibaud.FRERE @campus-la-chataigneraie.org', 2),
(874, 'ELHOR', 'Mehdi', 'MEL', 'Mehdi.ELHOR@campus-la-chataigneraie.org', 2),
(873, 'DUPONCHEL', 'Julien', 'JDU', 'Julien.DUPONCHEL@campus-la-chataigneraie.org', 2),
(872, 'DEVIN', 'Teddy', 'TDE', 'Teddy.DEVIN@campus-la-chataigneraie.org', 2),
(871, 'CARPENTIER', 'Benjamin', 'BCA', 'Benjamin.CARPENTIER@campus-la-chataigneraie.org', 2),
(870, 'BLANCHE', 'Quentin', 'QBL', 'Quentin.BLANCHE@campus-la-chataigneraie.org', 2),
(869, 'BISOGNANI', 'Thibaut', 'TBI', 'Thibaut.BISOGNANI@campus-la-chataigneraie.org', 2),
(868, 'BAUDUFFE', 'Gabriel', 'GBA', 'Gabriel.BAUDUFFE@campus-la-chataigneraie.org', 2),
(867, 'BASTIEN', 'Pierre', 'PBA', 'Pierre.BASTIEN@campus-la-chataigneraie.org', 2),
(866, 'TANGUY', 'Pierrick', 'PTA', 'Pierrick.TANGUY@campus-la-chataigneraie.org', 1),
(865, 'TAHRI', 'Issame', 'ITA', 'Issame.TAHRI@campus-la-chataigneraie.org', 1),
(864, 'RAFIK', 'Abderahmane', 'ARA', 'Abderahmane.RAFIK@campus-la-chataigneraie.org', 1),
(863, 'POULAIN', 'Charles', 'CPO', 'Charles.POULAIN@campus-la-chataigneraie.org', 1),
(862, 'OUELAA', 'Icham', 'IOU', 'Icham.OUELAA@campus-la-chataigneraie.org', 1),
(861, 'MOUILLARD', 'Xavier', 'XMO', 'Xavier.MOUILLARD@campus-la-chataigneraie.org', 1),
(860, 'MORICE', 'Tom', 'TMO', 'Tom.MORICE@campus-la-chataigneraie.org', 1),
(859, 'MANFREDI', 'Adrien', 'AMA', 'Adrien.MANFREDI@campus-la-chataigneraie.org', 1),
(858, 'MABIRE', 'Nino', 'NMA', 'Nino.MABIRE@campus-la-chataigneraie.org', 1),
(857, 'LEFEBVRE', 'Quentin', 'QLE', 'Quentin.LEFEBVRE@campus-la-chataigneraie.org', 1),
(856, 'LEFEBVRE', 'Hugo', 'HLE', 'Hugo.LEFEBVRE@campus-la-chataigneraie.org', 1),
(855, 'LAMBERT', 'Antony', 'ALA', 'Antony.LAMBERT@campus-la-chataigneraie.org', 1),
(854, 'ICARE', 'Nicolas', 'NIC', 'Nicolas.ICARE@campus-la-chataigneraie.org', 1),
(853, 'HAUTEMER', 'Mathieu', 'MHA', 'Mathieu.HAUTEMER@campus-la-chataigneraie.org', 1),
(852, 'HAMON', 'Samuel', 'SHA', 'Samuel.HAMON@campus-la-chataigneraie.org', 1),
(851, 'GACHET', 'Baptiste', 'BGA', 'Baptiste.GACHET@campus-la-chataigneraie.org', 1),
(850, 'FREBERT', 'Julien', 'JFR', 'Julien.FREBERT@campus-la-chataigneraie.org', 1),
(849, 'FELLER', 'Jacques', 'JFE', 'Jacques.FELLER@campus-la-chataigneraie.org', 1),
(848, 'DUVAL', 'Florian', 'FDU', 'Florian.DUVAL@campus-la-chataigneraie.org', 1),
(847, 'DUPUIS', 'Maxence', 'MDU', 'Maxence.DUPUIS@campus-la-chataigneraie.org', 1),
(846, 'DUPONCHEL', 'Karl', 'KDU', 'Karl.DUPONCHEL@campus-la-chataigneraie.org', 1),
(845, 'DUBOIS', 'Nicolas', 'NDU', 'Nicolas.DUBOIS@campus-la-chataigneraie.org', 1),
(844, 'DISLAIRE', 'Amandine', 'ADI', 'Amandine.DISLAIRE@campus-la-chataigneraie.org', 1),
(843, 'DEVILLERS', 'Matthieu', 'MDE', 'Matthieu.DEVILLERS@campus-la-chataigneraie.org', 1),
(842, 'DECROIX', 'Quentin', 'QDE', 'Quentin.DECROIX@campus-la-chataigneraie.org', 1),
(841, 'COURSELLE', 'Dorian', 'DCO', 'Dorian.COURSELLE@campus-la-chataigneraie.org', 1),
(840, 'CELIA', 'Victor', 'VCE', 'Victor.CELIA@campus-la-chataigneraie.org', 1),
(839, 'CARTRON', 'Etienne', 'ECA', 'Etienne.CARTRON@campus-la-chataigneraie.org', 1),
(838, 'CANTRELLE', 'Scott', 'SCA', 'Scott.CANTRELLE@campus-la-chataigneraie.org', 1),
(837, 'BULOT', 'Valentin', 'VBU', 'Valentin.BULOT@campus-la-chataigneraie.org', 1),
(836, 'BOUKHATEB', 'Abdel-Illah', 'ABO', 'Abdel-Illah.BOUKHATEB@campus-la-chataigneraie.org', 1),
(835, 'BOUFFAY', 'Arthur', 'ABO', 'Arthur.BOUFFAY@campus-la-chataigneraie.org', 1),
(834, 'BLONDEL', 'Martin', 'MBL', 'Martin.BLONDEL@campus-la-chataigneraie.org', 1),
(833, 'ANTIOME', 'Paul', 'PAN', 'Paul.ANTIOME@campus-la-chataigneraie.org', 1),
(832, 'ANGOT', 'Jean', 'JAN', 'Jean.ANGOT@campus-la-chataigneraie.org', 1);

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
