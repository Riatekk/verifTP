/*
Creation de la base de données
*/

DROP DATABASE IF EXISTS `ale_veriftp`;
CREATE DATABASE IF NOT EXISTS `ale_veriftp`;


USE `ale_veriftp`;

/*
Creation des procédures stockés
*/

DROP PROCEDURE IF EXISTS `PSD_SuppressionEleves`;
CREATE PROCEDURE `PSD_SuppressionEleves` (`unId` INT)
DELETE FROM eleves WHERE id = unId;

DROP PROCEDURE IF EXISTS `PSD_SuppressionElevesParClasse`;
CREATE PROCEDURE `PSD_SuppressionElevesParClasse` (IN `uneClasse` INT)
DELETE FROM eleves WHERE id_classe = uneClasse;

DROP PROCEDURE IF EXISTS `PSI_AjoutClasse`;
CREATE PROCEDURE `PSI_AjoutClasse` (`uneClasse` VARCHAR(255))
INSERT INTO classe (classe_libelle) VALUES (uneClasse);

DROP PROCEDURE IF EXISTS `PSI_AjoutEleve`;
CREATE PROCEDURE `PSI_AjoutEleve` (`unNom` VARCHAR(255),`unPrenom` VARCHAR(255), `IdClasse` INT UNSIGNED ZEROFILL)
INSERT INTO eleves (Nom, Prenom, id_classe) VALUES (unNom, unPrenom,IdClasse);

DROP PROCEDURE IF EXISTS `PSS_ListeClasse`;
CREATE PROCEDURE `PSS_ListeClasse` ()
SELECT classe_libelle
FROM classe;

DROP PROCEDURE IF EXISTS `PSS_ListeEleve`;
CREATE PROCEDURE `PSS_ListeEleve` ()  SELECT E.id, Nom, Prenom, Trigramme, Mail, classe_libelle FROM eleves E INNER JOIN classe C on E.id_classe = C.id;

DROP PROCEDURE IF EXISTS `PSU_ModificationEleves`;
CREATE PROCEDURE `PSU_ModificationEleves` (IN `unId` INT, IN `unNom` VARCHAR(255), IN `unPrenom` VARCHAR(255), IN `uneClasse` INT)
UPDATE eleves SET Nom=unNom,Prenom=unPrenom, id_classe=uneClasse WHERE id = unId;








/*
Creation des tables
*/
DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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


DROP TABLE IF EXISTS `eleves_tp`;
CREATE TABLE IF NOT EXISTS `eleves_tp` (
  `eleves_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  PRIMARY KEY (`eleves_id`,`tp_id`),
  KEY `FK_eleves_tp_tp` (`tp_id`),
  KEY `FK_eleves_tp_eleves` (`eleves_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tp`;
CREATE TABLE IF NOT EXISTS `tp` (
  `id_tp` int(11) NOT NULL,
  `libelle_tp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;










/*
Creation des triggers
*/

DROP TRIGGER IF EXISTS `Tri_INSERT_ALE_Mail`;
CREATE TRIGGER `Tri_INSERT_ALE_Mail` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org');

DROP TRIGGER IF EXISTS `Tri_INSERT_ALE_Trigramme`;

CREATE TRIGGER `Tri_INSERT_ALE_Trigramme` BEFORE INSERT ON `eleves` FOR EACH ROW SET NEW.Trigramme = UPPER(CONCAT(LEFT( NEW.Prenom, 1), LEFT( NEW.Nom,2 )));

DROP TRIGGER IF EXISTS `Tri_UPDATE_ALE_Mail`;

CREATE TRIGGER `Tri_UPDATE_ALE_Mail` BEFORE UPDATE ON `eleves` FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org');

DROP TRIGGER IF EXISTS `Tri_UPDATE_ALE_Trigramme`;

CREATE TRIGGER `Tri_UPDATE_ALE_Trigramme` BEFORE UPDATE ON `eleves` FOR EACH ROW SET NEW.Trigramme = UPPER(CONCAT(LEFT( NEW.Prenom, 1), LEFT( NEW.Nom,2 )));
