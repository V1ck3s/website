-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 déc. 2017 à 19:57
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `conforme`
--

DROP TABLE IF EXISTS `conforme`;
CREATE TABLE IF NOT EXISTS `conforme` (
  `OuiNon` tinyint(1) NOT NULL,
  `idRec` int(11) NOT NULL,
  `idReg` int(11) NOT NULL,
  PRIMARY KEY (`idRec`,`idReg`),
  KEY `FK_conforme_idReg` (`idReg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conforme`
--

INSERT INTO `conforme` (`OuiNon`, `idRec`, `idReg`) VALUES
(1, 1, 1),
(0, 1, 2),
(0, 1, 3),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(0, 3, 1),
(0, 3, 2),
(0, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `quantite` float NOT NULL,
  `idRec` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL,
  PRIMARY KEY (`idRec`,`idIngre`),
  KEY `FK_contenu_idIngre` (`idIngre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`quantite`, `idRec`, `idIngre`) VALUES
(1, 1, 1),
(100, 1, 2),
(500, 1, 3),
(30, 1, 4),
(3, 1, 5),
(1, 1, 6),
(100, 1, 7),
(1, 2, 1),
(100, 2, 8),
(0.5, 2, 9),
(2, 2, 10),
(20, 2, 11),
(1, 2, 12),
(50, 2, 13),
(20, 2, 14),
(50, 3, 1),
(50, 3, 7),
(6, 3, 15),
(20, 3, 16),
(2, 3, 17),
(5, 3, 18),
(10, 3, 19),
(20, 3, 20),
(20, 3, 21),
(10, 3, 22);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `quantite` int(11) DEFAULT NULL,
  `idListe` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL,
  PRIMARY KEY (`idListe`,`idIngre`),
  KEY `FK_contient_idIngre` (`idIngre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`quantite`, `idListe`, `idIngre`) VALUES
(500, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `est_present`
--

DROP TABLE IF EXISTS `est_present`;
CREATE TABLE IF NOT EXISTS `est_present` (
  `idMen` int(11) NOT NULL,
  `idRec` int(11) NOT NULL,
  PRIMARY KEY (`idMen`,`idRec`),
  KEY `FK_est_present_idRec` (`idRec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `est_present`
--

INSERT INTO `est_present` (`idMen`, `idRec`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `est_servi`
--

DROP TABLE IF EXISTS `est_servi`;
CREATE TABLE IF NOT EXISTS `est_servi` (
  `idMen` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `dateServi` date NOT NULL,
  PRIMARY KEY (`idMen`,`idPlan`,`dateServi`),
  KEY `FK_est_servi_idPlan` (`idPlan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `est_servi`
--

INSERT INTO `est_servi` (`idMen`, `idPlan`, `dateServi`) VALUES
(1, 1, '2017-11-03'),
(1, 1, '2017-11-04'),
(1, 1, '2017-11-05'),
(2, 2, '2017-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `illustration`
--

DROP TABLE IF EXISTS `illustration`;
CREATE TABLE IF NOT EXISTS `illustration` (
  `idIllu` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(1000) NOT NULL,
  `idRec` int(11) DEFAULT NULL,
  PRIMARY KEY (`idIllu`),
  KEY `FK_ILLUSTRATION_idRec` (`idRec`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `illustration`
--

INSERT INTO `illustration` (`idIllu`, `adresse`, `idRec`) VALUES
(1, 'http://www.cavevieilarmand.com/imagesSite/67.jpg', 1),
(2, 'https://image.afcdn.com/recipe/20160425/1491_w420h344c1cx2000cy3000.jpg', 2),
(3, 'https://image.afcdn.com/recipe/20131102/55590_w420h344c1cx265cy121.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `mesure` varchar(25) NOT NULL,
  `qteParDefaut` int(11) NOT NULL,
  `qteCalories` float NOT NULL,
  `qteProteines` float NOT NULL,
  `qteGlucides` float NOT NULL,
  `qteLipides` float NOT NULL,
  `qteProtides` float NOT NULL,
  PRIMARY KEY (`idIngre`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngre`, `nom`, `mesure`, `qteParDefaut`, `qteCalories`, `qteProteines`, `qteGlucides`, `qteLipides`, `qteProtides`) VALUES
(1, 'Sel', 'Pincée', 1, 1, 1, 1, 1, 1),
(2, 'Sucre', 'g', 1, 1, 1, 1, 1, 1),
(3, 'Farine', 'g', 1, 1, 1, 1, 1, 1),
(4, 'Lait', 'cl', 1, 1, 1, 1, 1, 1),
(5, 'Raisins Secs', 'Unité', 1, 1, 1, 1, 1, 1),
(6, 'Oeuf', 'Unité', 1, 1, 1, 1, 1, 1),
(7, 'Beurre', 'g', 1, 1, 1, 1, 1, 1),
(8, 'Quinoa', 'g', 1, 1, 1, 1, 1, 1),
(9, 'Concombre', 'Unité', 1, 1, 1, 1, 1, 1),
(10, 'Tomates', 'Unité', 1, 1, 1, 1, 1, 1),
(11, 'Feuilles de menthe', 'Unité', 1, 1, 1, 1, 1, 1),
(12, 'Échalote', 'Unité', 1, 1, 1, 1, 1, 1),
(13, 'Huile d\'olive', 'cl', 1, 1, 1, 1, 1, 1),
(14, 'Jus de citron', 'cl', 1, 1, 1, 1, 1, 1),
(15, 'Langue de boeuf', 'Unité', 1, 100, 100, 100, 100, 100),
(16, 'Vinaigre d\'alcool', 'cl', 1, 1, 1, 1, 1, 1),
(17, 'Oignon', 'Unité', 1, 1, 1, 1, 1, 1),
(18, 'Bouillon cube', 'Unité', 1, 1, 1, 1, 1, 1),
(19, 'Branche de thym', 'Unité', 1, 1, 1, 1, 1, 1),
(20, 'Feuille de laurier', 'Unité', 1, 1, 1, 1, 1, 1),
(21, 'Poivre', 'Pincée', 1, 1, 1, 1, 1, 1),
(22, 'Cornichons', 'g', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `interdit`
--

DROP TABLE IF EXISTS `interdit`;
CREATE TABLE IF NOT EXISTS `interdit` (
  `OuiNon` tinyint(1) NOT NULL,
  `idReg` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL,
  PRIMARY KEY (`idReg`,`idIngre`),
  KEY `FK_interdit_idIngre` (`idIngre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interdit`
--

INSERT INTO `interdit` (`OuiNon`, `idReg`, `idIngre`) VALUES
(0, 1, 1),
(0, 1, 2),
(0, 1, 3),
(0, 1, 4),
(0, 1, 5),
(0, 1, 6),
(0, 1, 7),
(0, 1, 8),
(0, 1, 9),
(0, 1, 10),
(0, 1, 11),
(0, 1, 12),
(0, 1, 13),
(0, 1, 14),
(1, 1, 15),
(0, 1, 16),
(0, 1, 17),
(1, 1, 18),
(0, 1, 19),
(0, 1, 20),
(0, 1, 21),
(0, 1, 22),
(0, 2, 1),
(0, 2, 2),
(0, 2, 3),
(1, 2, 4),
(0, 2, 5),
(1, 2, 6),
(1, 2, 7),
(0, 2, 8),
(0, 2, 9),
(0, 2, 10),
(0, 2, 11),
(0, 2, 12),
(0, 2, 13),
(0, 2, 14),
(1, 2, 15),
(0, 2, 16),
(0, 2, 17),
(1, 2, 18),
(0, 2, 19),
(0, 2, 20),
(0, 2, 21),
(0, 2, 22),
(0, 3, 1),
(0, 3, 2),
(0, 3, 3),
(0, 3, 4),
(0, 3, 5),
(0, 3, 6),
(0, 3, 7),
(0, 3, 8),
(0, 3, 9),
(0, 3, 10),
(0, 3, 11),
(0, 3, 12),
(0, 3, 13),
(0, 3, 14),
(0, 3, 15),
(0, 3, 16),
(0, 3, 17),
(0, 3, 18),
(0, 3, 19),
(0, 3, 20),
(0, 3, 21),
(0, 3, 22);

-- --------------------------------------------------------

--
-- Structure de la table `liste_achat`
--

DROP TABLE IF EXISTS `liste_achat`;
CREATE TABLE IF NOT EXISTS `liste_achat` (
  `idListe` int(11) NOT NULL AUTO_INCREMENT,
  `datePrevue` date NOT NULL,
  `archiveON` tinyint(1) NOT NULL,
  `idUtil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idListe`),
  KEY `FK_LISTE_ACHAT_idUtil` (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste_achat`
--

INSERT INTO `liste_achat` (`idListe`, `datePrevue`, `archiveON`, `idUtil`) VALUES
(1, '2017-12-02', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idMen` int(11) NOT NULL AUTO_INCREMENT,
  `idUtil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMen`),
  KEY `FK_MENU_idUtil` (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`idMen`, `idUtil`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `peut_remplacer`
--

DROP TABLE IF EXISTS `peut_remplacer`;
CREATE TABLE IF NOT EXISTS `peut_remplacer` (
  `idIngre` int(11) NOT NULL,
  `idIngre_INGREDIENT` int(11) NOT NULL,
  `idRec` int(11) NOT NULL,
  PRIMARY KEY (`idIngre`,`idIngre_INGREDIENT`,`idRec`),
  KEY `FK_peut_remplacer_idIngre_INGREDIENT` (`idIngre_INGREDIENT`),
  KEY `FK_peut_remplacer_idRec` (`idRec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `peut_remplacer`
--

INSERT INTO `peut_remplacer` (`idIngre`, `idIngre_INGREDIENT`, `idRec`) VALUES
(13, 16, 3);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `archiveON` tinyint(1) DEFAULT NULL,
  `idUtil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `FK_PLANNING_idUtil` (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`idPlan`, `dateDebut`, `dateFin`, `archiveON`, `idUtil`) VALUES
(1, '2017-11-03', '2017-11-05', 1, 1),
(2, '2017-12-06', '2017-12-06', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `quantite` int(11) DEFAULT NULL,
  `idIngre` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL,
  PRIMARY KEY (`idIngre`,`idUtil`),
  KEY `FK_possede_idUtil` (`idUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`quantite`, `idIngre`, `idUtil`) VALUES
(1000, 1, 1),
(1000, 2, 1),
(1000, 3, 1),
(1000, 4, 1),
(1000, 5, 1),
(1000, 6, 1),
(1000, 7, 1),
(1000, 8, 1),
(1000, 9, 1),
(1000, 10, 1),
(1000, 11, 1),
(1000, 12, 1),
(1000, 13, 1),
(1000, 14, 1),
(1000, 15, 1),
(1000, 16, 1),
(1000, 17, 1),
(1000, 18, 1),
(1000, 19, 1),
(1000, 20, 1),
(1000, 21, 1),
(1000, 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRec` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `descriptif` varchar(10000) NOT NULL,
  `difficulte` varchar(25) NOT NULL,
  `prix` int(11) NOT NULL,
  `nbPersonnes` int(11) NOT NULL,
  `dureePreparation` int(11) NOT NULL,
  `dureeCuisson` int(11) NOT NULL,
  `dureeTotale` int(11) NOT NULL,
  `qteCalories` float NOT NULL,
  `qteProteines` float NOT NULL,
  `qteGlucides` float NOT NULL,
  `qteLipides` float NOT NULL,
  `qteProtides` float NOT NULL,
  `idUtil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRec`),
  KEY `FK_RECETTE_idUtil` (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRec`, `nom`, `descriptif`, `difficulte`, `prix`, `nbPersonnes`, `dureePreparation`, `dureeCuisson`, `dureeTotale`, `qteCalories`, `qteProteines`, `qteGlucides`, `qteLipides`, `qteProtides`, `idUtil`) VALUES
(1, 'Kougelhopf', 'Gâteau alsacien', 'Facile', 1, 8, 10, 45, 55, 735, 735, 735, 735, 735, 1),
(2, 'Salade de quinoa', 'Ca ressemble a du taboulé, mais c\'est beaucoup plus léger, et vraiment plus original !! Ca croustille!!!', 'Très facile', 1, 4, 15, 15, 30, 194.5, 194.5, 194.5, 194.5, 194.5, 2),
(3, 'Langue de boeuf sauce piquante aux cornichons', 'Ce plat est encore meilleur réchauffé.', 'Difficile', 3, 6, 30, 105, 135, 787, 787, 787, 787, 787, 1);

-- --------------------------------------------------------

--
-- Structure de la table `regime`
--

DROP TABLE IF EXISTS `regime`;
CREATE TABLE IF NOT EXISTS `regime` (
  `idReg` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`idReg`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regime`
--

INSERT INTO `regime` (`idReg`, `libelle`) VALUES
(3, 'Sans gluten'),
(2, 'Végétalien'),
(1, 'Végétarien');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`idUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `nom`, `prenom`, `login`, `mail`, `mdp`) VALUES
(1, 'Kanawati', 'Samy', 'admin', 'test@gmail.com', 'admin'),
(2, 'Razowski', 'Bob', 'bob', 'bob@gmail.com', 'bob'),
(3, 'De Santa', 'Michael', 'mds', 'mds@hotmail.fr', 'mds');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conforme`
--
ALTER TABLE `conforme`
  ADD CONSTRAINT `FK_conforme_idRec` FOREIGN KEY (`idRec`) REFERENCES `recette` (`idRec`),
  ADD CONSTRAINT `FK_conforme_idReg` FOREIGN KEY (`idReg`) REFERENCES `regime` (`idReg`);

--
-- Contraintes pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `FK_contenu_idIngre` FOREIGN KEY (`idIngre`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_contenu_idRec` FOREIGN KEY (`idRec`) REFERENCES `recette` (`idRec`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `FK_contient_idIngre` FOREIGN KEY (`idIngre`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_contient_idListe` FOREIGN KEY (`idListe`) REFERENCES `liste_achat` (`idListe`);

--
-- Contraintes pour la table `est_present`
--
ALTER TABLE `est_present`
  ADD CONSTRAINT `FK_est_present_idMen` FOREIGN KEY (`idMen`) REFERENCES `menu` (`idMen`),
  ADD CONSTRAINT `FK_est_present_idRec` FOREIGN KEY (`idRec`) REFERENCES `recette` (`idRec`);

--
-- Contraintes pour la table `est_servi`
--
ALTER TABLE `est_servi`
  ADD CONSTRAINT `FK_est_servi_idMen` FOREIGN KEY (`idMen`) REFERENCES `menu` (`idMen`),
  ADD CONSTRAINT `FK_est_servi_idPlan` FOREIGN KEY (`idPlan`) REFERENCES `planning` (`idPlan`);

--
-- Contraintes pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD CONSTRAINT `FK_ILLUSTRATION_idRec` FOREIGN KEY (`idRec`) REFERENCES `recette` (`idRec`);

--
-- Contraintes pour la table `interdit`
--
ALTER TABLE `interdit`
  ADD CONSTRAINT `FK_interdit_idIngre` FOREIGN KEY (`idIngre`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_interdit_idReg` FOREIGN KEY (`idReg`) REFERENCES `regime` (`idReg`);

--
-- Contraintes pour la table `liste_achat`
--
ALTER TABLE `liste_achat`
  ADD CONSTRAINT `FK_LISTE_ACHAT_idUtil` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_MENU_idUtil` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Contraintes pour la table `peut_remplacer`
--
ALTER TABLE `peut_remplacer`
  ADD CONSTRAINT `FK_peut_remplacer_idIngre` FOREIGN KEY (`idIngre`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_peut_remplacer_idIngre_INGREDIENT` FOREIGN KEY (`idIngre_INGREDIENT`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_peut_remplacer_idRec` FOREIGN KEY (`idRec`) REFERENCES `recette` (`idRec`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `FK_PLANNING_idUtil` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `FK_possede_idIngre` FOREIGN KEY (`idIngre`) REFERENCES `ingredient` (`idIngre`),
  ADD CONSTRAINT `FK_possede_idUtil` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `FK_RECETTE_idUtil` FOREIGN KEY (`idUtil`) REFERENCES `utilisateur` (`idUtil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
