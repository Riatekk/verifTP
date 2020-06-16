
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
