
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
