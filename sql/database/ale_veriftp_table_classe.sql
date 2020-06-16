
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
