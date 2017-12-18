-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : front-ha-mysql-01.shpv.fr:3306
-- Généré le :  lun. 18 déc. 2017 à 22:23
-- Version du serveur :  5.6.38
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wiyhousp_recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `login`, `mdp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `conforme`
--

CREATE TABLE `conforme` (
  `OuiNon` tinyint(1) NOT NULL,
  `idRec` int(11) NOT NULL,
  `idReg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conforme`
--

INSERT INTO `conforme` (`OuiNon`, `idRec`, `idReg`) VALUES
(1, 1, 1),
(0, 1, 2),
(0, 1, 3),
(0, 3, 1),
(0, 3, 2),
(0, 3, 3),
(1, 8, 1),
(1, 8, 2),
(1, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `quantite` float NOT NULL,
  `idRec` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL
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
(50, 3, 1),
(50, 3, 7),
(6, 3, 15),
(20, 3, 16),
(2, 3, 17),
(5, 3, 18),
(10, 3, 19),
(20, 3, 20),
(20, 3, 21),
(10, 3, 22),
(1, 8, 1),
(100, 8, 8),
(0.5, 8, 9),
(2, 8, 10),
(20, 8, 11),
(1, 8, 12),
(50, 8, 13),
(20, 8, 14);

--
-- Déclencheurs `contenu`
--
DELIMITER $$
CREATE TRIGGER `majNutrition` AFTER INSERT ON `contenu` FOR EACH ROW BEGIN
	DECLARE qteCal FLOAT;
    DECLARE qteProte FLOAT;
    DECLARE qteGlu FLOAT;
    DECLARE qteLip FLOAT;
    DECLARE qteProti FLOAT;
    	
	SET qteCal = (SELECT qteCalories FROM ingredient WHERE ingredient.idIngre = NEW.idIngre);
    SET qteProte = (SELECT qteProteines FROM ingredient WHERE ingredient.idIngre = NEW.idIngre);
    SET qteGlu = (SELECT qteGlucides FROM ingredient WHERE ingredient.idIngre = NEW.idIngre);
    SET qteLip = (SELECT qteLipides FROM ingredient WHERE ingredient.idIngre = NEW.idIngre);
    SET qteProti = (SELECT qteProtides FROM ingredient WHERE ingredient.idIngre = NEW.idIngre);
	
	UPDATE recette
	SET qteCalories = qteCalories+(qteCal*NEW.quantite)
	WHERE idRec = NEW.idRec;
    UPDATE recette
	SET qteProteines = qteProteines+(qteProte*NEW.quantite)
	WHERE idRec = NEW.idRec;
    UPDATE recette
	SET qteGlucides = qteGlucides+(qteGlu*NEW.quantite)
	WHERE idRec = NEW.idRec;
    UPDATE recette
	SET qteLipides = qteLipides+(qteLip*NEW.quantite)
	WHERE idRec = NEW.idRec;
    UPDATE recette
	SET qteProtides = qteProtides+(qteProti*NEW.quantite)
	WHERE idRec = NEW.idRec;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `quantite` int(11) DEFAULT NULL,
  `idListe` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL
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

CREATE TABLE `est_present` (
  `idMen` int(11) NOT NULL,
  `idRec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `est_present`
--

INSERT INTO `est_present` (`idMen`, `idRec`) VALUES
(1, 1),
(2, 1),
(1, 3),
(1, 8),
(2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `est_servi`
--

CREATE TABLE `est_servi` (
  `idMen` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `dateServi` date NOT NULL
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

CREATE TABLE `illustration` (
  `idIllu` int(11) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `idRec` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `illustration`
--

INSERT INTO `illustration` (`idIllu`, `adresse`, `idRec`) VALUES
(1, 'http://www.cavevieilarmand.com/imagesSite/67.jpg', 1),
(3, 'https://image.afcdn.com/recipe/20131102/55590_w420h344c1cx265cy121.jpg', 3),
(4, 'https://image.afcdn.com/recipe/20160425/1491_w420h344c1cx2000cy3000.jpg', 8);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngre` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `mesure` varchar(25) NOT NULL,
  `qteParDefaut` int(11) NOT NULL,
  `qteCalories` float NOT NULL,
  `qteProteines` float NOT NULL,
  `qteGlucides` float NOT NULL,
  `qteLipides` float NOT NULL,
  `qteProtides` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `interdit` (
  `OuiNon` tinyint(1) NOT NULL,
  `idReg` int(11) NOT NULL,
  `idIngre` int(11) NOT NULL
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

CREATE TABLE `liste_achat` (
  `idListe` int(11) NOT NULL,
  `datePrevue` date NOT NULL,
  `archiveON` tinyint(1) NOT NULL,
  `idUtil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste_achat`
--

INSERT INTO `liste_achat` (`idListe`, `datePrevue`, `archiveON`, `idUtil`) VALUES
(1, '2017-12-02', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idMen` int(11) NOT NULL,
  `idUtil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `peut_remplacer` (
  `idIngre` int(11) NOT NULL,
  `idIngre_INGREDIENT` int(11) NOT NULL,
  `idRec` int(11) NOT NULL
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

CREATE TABLE `planning` (
  `idPlan` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `archiveON` tinyint(1) DEFAULT NULL,
  `idUtil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `possede` (
  `quantite` int(11) DEFAULT NULL,
  `idIngre` int(11) NOT NULL,
  `idUtil` int(11) NOT NULL
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

CREATE TABLE `recette` (
  `idRec` int(11) NOT NULL,
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
  `idUtil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRec`, `nom`, `descriptif`, `difficulte`, `prix`, `nbPersonnes`, `dureePreparation`, `dureeCuisson`, `dureeTotale`, `qteCalories`, `qteProteines`, `qteGlucides`, `qteLipides`, `qteProtides`, `idUtil`) VALUES
(1, 'Kougelhopf', 'Gâteau alsacien', 'Facile', 1, 8, 10, 45, 55, 735, 735, 735, 735, 735, 1),
(3, 'Langue de boeuf sauce piquante aux cornichons', 'Ce plat est encore meilleur réchauffé.', 'Difficile', 3, 6, 30, 105, 135, 787, 787, 787, 787, 787, 1),
(8, 'Salade de quinoa', 'Ca ressemble a du taboulé, mais c\'est beaucoup plus léger, et vraiment plus original !! Ca croustille!!!', 'Très facile', 1, 4, 15, 15, 30, 194.5, 194.5, 194.5, 194.5, 194.5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `regime`
--

CREATE TABLE `regime` (
  `idReg` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `utilisateur` (
  `idUtil` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `nom`, `prenom`, `login`, `mail`, `mdp`) VALUES
(1, 'Administrateur', '', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Razowski', 'Bob', 'bob', 'bob@gmail.com', '9f9d51bc70ef21ca5c14f307980a29d8'),
(3, 'De Santa', 'Michael', 'mds', 'mds@hotmail.fr', '60a114c91c41983174b484e188856fb3'),
(6, 'Coffe', 'Jean-Pierre', 'Coffe', 'jpcoffe@ripdouille.fr', '8860aab6453e117ddbc7a373fcd1eb68'),
(12, 'renard', 'gilbert', 'guillaume', 'g@arte.tv', '098f6bcd4621d373cade4e832627b4f6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `conforme`
--
ALTER TABLE `conforme`
  ADD PRIMARY KEY (`idRec`,`idReg`),
  ADD KEY `FK_conforme_idReg` (`idReg`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`idRec`,`idIngre`),
  ADD KEY `FK_contenu_idIngre` (`idIngre`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`idListe`,`idIngre`),
  ADD KEY `FK_contient_idIngre` (`idIngre`);

--
-- Index pour la table `est_present`
--
ALTER TABLE `est_present`
  ADD PRIMARY KEY (`idMen`,`idRec`),
  ADD KEY `FK_est_present_idRec` (`idRec`);

--
-- Index pour la table `est_servi`
--
ALTER TABLE `est_servi`
  ADD PRIMARY KEY (`idMen`,`idPlan`,`dateServi`),
  ADD KEY `FK_est_servi_idPlan` (`idPlan`);

--
-- Index pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD PRIMARY KEY (`idIllu`),
  ADD KEY `FK_ILLUSTRATION_idRec` (`idRec`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngre`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `interdit`
--
ALTER TABLE `interdit`
  ADD PRIMARY KEY (`idReg`,`idIngre`),
  ADD KEY `FK_interdit_idIngre` (`idIngre`);

--
-- Index pour la table `liste_achat`
--
ALTER TABLE `liste_achat`
  ADD PRIMARY KEY (`idListe`),
  ADD KEY `FK_LISTE_ACHAT_idUtil` (`idUtil`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMen`),
  ADD KEY `FK_MENU_idUtil` (`idUtil`);

--
-- Index pour la table `peut_remplacer`
--
ALTER TABLE `peut_remplacer`
  ADD PRIMARY KEY (`idIngre`,`idIngre_INGREDIENT`,`idRec`),
  ADD KEY `FK_peut_remplacer_idIngre_INGREDIENT` (`idIngre_INGREDIENT`),
  ADD KEY `FK_peut_remplacer_idRec` (`idRec`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`idPlan`),
  ADD KEY `FK_PLANNING_idUtil` (`idUtil`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`idIngre`,`idUtil`),
  ADD KEY `FK_possede_idUtil` (`idUtil`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRec`),
  ADD KEY `FK_RECETTE_idUtil` (`idUtil`);

--
-- Index pour la table `regime`
--
ALTER TABLE `regime`
  ADD PRIMARY KEY (`idReg`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtil`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `illustration`
--
ALTER TABLE `illustration`
  MODIFY `idIllu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `liste_achat`
--
ALTER TABLE `liste_achat`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `idPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `regime`
--
ALTER TABLE `regime`
  MODIFY `idReg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
