USE `ale_veriftp`
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
) ENGINE=MyISAM AUTO_INCREMENT=922 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(887, 'ANGOT', 'Jean', 'JAN', 'Jean.ANGOT@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(888, 'ANTIOME', 'Paul', 'PAN', 'Paul.ANTIOME@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(889, 'BLONDEL', 'Martin', 'MBL', 'Martin.BLONDEL@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(890, 'BOUFFAY', 'Arthur', 'ABO', 'Arthur.BOUFFAY@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(891, 'BOUKHATEB', 'Abdel-Illah', 'ABO', 'Abdel-Illah.BOUKHATEB@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(892, 'BULOT', 'Valentin', 'VBU', 'Valentin.BULOT@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(893, 'CANTRELLE', 'Scott', 'SCA', 'Scott.CANTRELLE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(894, 'CARTRON', 'Etienne', 'ECA', 'Etienne.CARTRON@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(895, 'CELIA', 'Victor', 'VCE', 'Victor.CELIA@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(896, 'COURSELLE', 'Dorian', 'DCO', 'Dorian.COURSELLE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(897, 'DECROIX', 'Quentin', 'QDE', 'Quentin.DECROIX@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(898, 'DEVILLERS', 'Matthieu', 'MDE', 'Matthieu.DEVILLERS@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(899, 'DISLAIRE', 'Amandine', 'ADI', 'Amandine.DISLAIRE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(900, 'DUBOIS', 'Nicolas', 'NDU', 'Nicolas.DUBOIS@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(901, 'DUPONCHEL', 'Karl', 'KDU', 'Karl.DUPONCHEL@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(902, 'DUPUIS', 'Maxence', 'MDU', 'Maxence.DUPUIS@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(903, 'DUVAL', 'Florian', 'FDU', 'Florian.DUVAL@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(904, 'FELLER', 'Jacques', 'JFE', 'Jacques.FELLER@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(905, 'FREBERT', 'Julien', 'JFR', 'Julien.FREBERT@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(906, 'GACHET', 'Baptiste', 'BGA', 'Baptiste.GACHET@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(907, 'HAMON', 'Samuel', 'SHA', 'Samuel.HAMON@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(908, 'HAUTEMER', 'Mathieu', 'MHA', 'Mathieu.HAUTEMER@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(909, 'ICARE', 'Nicolas', 'NIC', 'Nicolas.ICARE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(910, 'LAMBERT', 'Antony', 'ALA', 'Antony.LAMBERT@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(911, 'LEFEBVRE', 'Hugo', 'HLE', 'Hugo.LEFEBVRE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(912, 'LEFEBVRE', 'Quentin', 'QLE', 'Quentin.LEFEBVRE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(913, 'MABIRE', 'Nino', 'NMA', 'Nino.MABIRE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(914, 'MANFREDI', 'Adrien', 'AMA', 'Adrien.MANFREDI@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(915, 'MORICE', 'Tom', 'TMO', 'Tom.MORICE@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(916, 'MOUILLARD', 'Xavier', 'XMO', 'Xavier.MOUILLARD@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(917, 'OUELAA', 'Icham', 'IOU', 'Icham.OUELAA@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(918, 'POULAIN', 'Charles', 'CPO', 'Charles.POULAIN@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(919, 'RAFIK', 'Abderahmane', 'ARA', 'Abderahmane.RAFIK@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(920, 'TAHRI', 'Issame', 'ITA', 'Issame.TAHRI@campus-la-chataigneraie.org', 1);
INSERT INTO `eleves` (`id`, `Nom`, `Prenom`, `Trigramme`, `Mail`, `id_classe`) VALUES(921, 'TANGUY', 'Pierrick', 'PTA', 'Pierrick.TANGUY@campus-la-chataigneraie.org', 1);

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
