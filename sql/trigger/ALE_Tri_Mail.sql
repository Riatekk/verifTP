CREATE TRIGGER `Tri_ALE_Mail` BEFORE INSERT ON `eleves`
 FOR EACH ROW SET NEW.Mail = CONCAT(NEW.Prenom, '.', NEW.Nom, '@campus-la-chataigneraie.org')