-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 juin 2020 à 18:00
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`) VALUES
(13, 'BASTIEN', 'Pierre', 'PBA', 'Pierre.BASTIEN@campus-la-chataigneraie.org'),
(14, 'BAUDUFFE', 'Gabriel', 'GBA', 'Gabriel.BAUDUFFE@campus-la-chataigneraie.org'),
(15, 'BISOGNANI', 'Thibaut', 'TBI', 'Thibaut.BISOGNANI@campus-la-chataigneraie.org'),
(16, 'BLANCHE', 'Quentin', 'QBL', 'Quentin.BLANCHE@campus-la-chataigneraie.org'),
(17, 'CARPENTIER', 'Benjamin', 'BCA', 'Benjamin.CARPENTIER@campus-la-chataigneraie.org'),
(18, 'DEVIN', 'Teddy', 'TDE', 'Teddy.DEVIN@campus-la-chataigneraie.org'),
(19, 'DUPONCHEL', 'Julien', 'JDU', 'Julien.DUPONCHEL@campus-la-chataigneraie.org'),
(20, 'ELHOR', 'Mehdi', 'MEL', 'Mehdi.ELHOR@campus-la-chataigneraie.org'),
(21, 'FRERE ', 'Thibaud', 'TFR', 'Thibaud.FRERE @campus-la-chataigneraie.org'),
(22, 'GOUCHET', 'Theo', 'TGO', 'Theo.GOUCHET@campus-la-chataigneraie.org'),
(23, 'HENRIQUES', 'Sylvio', 'SHE', 'Sylvio.HENRIQUES@campus-la-chataigneraie.org'),
(24, 'LACHENY', 'Baptiste', 'BLA', 'Baptiste.LACHENY@campus-la-chataigneraie.org'),
(25, 'LEJEUNE', 'Thibaud', 'TLE', 'Thibaud.LEJEUNE@campus-la-chataigneraie.org'),
(26, 'LEMOINE', 'Antonin', 'ALE', 'Antonin.LEMOINE@campus-la-chataigneraie.org'),
(27, 'LETERME', 'Matthieu', 'MLE', 'Matthieu.LETERME@campus-la-chataigneraie.org'),
(28, 'LOUET', 'Tom', 'TLO', 'Tom.LOUET@campus-la-chataigneraie.org'),
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
