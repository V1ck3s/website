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
