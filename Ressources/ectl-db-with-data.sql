-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 14 Février 2015 à 05:23
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ectl-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE IF NOT EXISTS `Commentaire` (
`idC` int(11) NOT NULL,
  `dateC` datetime DEFAULT NULL,
  `contenuC` text,
  `idU` int(11) NOT NULL,
  `idD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Document`
--

CREATE TABLE IF NOT EXISTS `Document` (
`idD` int(11) NOT NULL,
  `nomD` varchar(30) DEFAULT NULL,
  `descD` text,
  `contenuD` longtext,
  `urlD` varchar(50) DEFAULT NULL,
  `publication_idp` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Document`
--

INSERT INTO `Document` (`idD`, `nomD`, `descD`, `contenuD`, `urlD`, `publication_idp`) VALUES
(1, 'Nouvel Espace Collaborateur', NULL, 'Nous souhaitons la bienvenue à l''ensemble de nos collaborateurs dans ce tout nouvel espace. Vous y trouverez l''ensemble des documents que nous mettons à la disposition de nos conducteurs, les dernières nouvelles que nous leur faisons parvenir ainsi que nos différents portails sur le web. Bonne visite à tous de la part de toute l''équipe TRACTLUX :', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `DocumentType`
--

CREATE TABLE IF NOT EXISTS `DocumentType` (
`idD` int(11) NOT NULL,
  `idTypeD` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `DocumentType`
--

INSERT INTO `DocumentType` (`idD`, `idTypeD`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Droit`
--

CREATE TABLE IF NOT EXISTS `Droit` (
`idTypeU` int(11) NOT NULL,
  `idTypeD` int(11) NOT NULL,
  `publication` tinyint(1) DEFAULT NULL,
  `modification` tinyint(1) DEFAULT NULL,
  `suppression` tinyint(1) DEFAULT NULL,
  `commentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Inscription`
--

CREATE TABLE IF NOT EXISTS `Inscription` (
`idI` int(11) NOT NULL,
  `codeI` varchar(10) DEFAULT NULL,
  `validiteI` date DEFAULT NULL,
  `idU` int(11) NOT NULL,
  `idTypeU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Modification`
--

CREATE TABLE IF NOT EXISTS `Modification` (
`idM` int(11) NOT NULL,
  `dateM` datetime DEFAULT NULL,
  `commentM` text,
  `idU` int(11) NOT NULL,
  `idD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
`idP` int(11) NOT NULL,
  `dateP` datetime DEFAULT NULL,
  `commentP` text,
  `idU` int(11) NOT NULL,
  `document_idd` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` (`idP`, `dateP`, `commentP`, `idU`, `document_idd`) VALUES
(1, '2015-02-14 00:00:00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Suppression`
--

CREATE TABLE IF NOT EXISTS `Suppression` (
`idS` int(11) NOT NULL,
  `dateS` datetime DEFAULT NULL,
  `commentS` text,
  `idU` int(11) NOT NULL,
  `idD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TypeD`
--

CREATE TABLE IF NOT EXISTS `TypeD` (
`idTypeD` int(11) NOT NULL,
  `nomTypeD` varchar(30) DEFAULT NULL,
  `descTypeD` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeD`
--

INSERT INTO `TypeD` (`idTypeD`, `nomTypeD`, `descTypeD`) VALUES
(1, 'News', 'Dernières nouvelles de la société TRACTLUX.');

-- --------------------------------------------------------

--
-- Structure de la table `TypeU`
--

CREATE TABLE IF NOT EXISTS `TypeU` (
`idTypeU` int(11) NOT NULL,
  `nomTypeU` varchar(30) DEFAULT NULL,
  `descTypeU` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeU`
--

INSERT INTO `TypeU` (`idTypeU`, `nomTypeU`, `descTypeU`) VALUES
(1, 'Administrateur', 'Administrateur de l''espace collaborateur.');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
`idU` int(11) NOT NULL,
  `pseudoU` varchar(20) DEFAULT NULL,
  `mdpU` varchar(20) DEFAULT NULL,
  `nomU` varchar(30) DEFAULT NULL,
  `prenomU` varchar(30) DEFAULT NULL,
  `telU` varchar(30) DEFAULT NULL,
  `emailU` varchar(50) DEFAULT NULL,
  `urlAvatarU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`idU`, `pseudoU`, `mdpU`, `nomU`, `prenomU`, `telU`, `emailU`, `urlAvatarU`) VALUES
(1, 'Antoine', 'totototo1', 'Nosal', 'Antoine', '+33632281849', 'antoine.nosal@gmail.com', 'https://media.licdn.com/mpr/mpr/shrink_500_500/p/3');

-- --------------------------------------------------------

--
-- Structure de la table `UtilisateurType`
--

CREATE TABLE IF NOT EXISTS `UtilisateurType` (
`idU` int(11) NOT NULL,
  `idTypeU` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `UtilisateurType`
--

INSERT INTO `UtilisateurType` (`idU`, `idTypeU`) VALUES
(1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
 ADD PRIMARY KEY (`idC`), ADD KEY `FK_Commentaire_idU` (`idU`), ADD KEY `FK_Commentaire_idD` (`idD`);

--
-- Index pour la table `Document`
--
ALTER TABLE `Document`
 ADD PRIMARY KEY (`idD`), ADD KEY `FK_Document_publication_idp` (`publication_idp`);

--
-- Index pour la table `DocumentType`
--
ALTER TABLE `DocumentType`
 ADD PRIMARY KEY (`idD`,`idTypeD`), ADD KEY `FK_DocumentType_idTypeD` (`idTypeD`);

--
-- Index pour la table `Droit`
--
ALTER TABLE `Droit`
 ADD PRIMARY KEY (`idTypeU`,`idTypeD`), ADD KEY `FK_Droit_idTypeD` (`idTypeD`);

--
-- Index pour la table `Inscription`
--
ALTER TABLE `Inscription`
 ADD PRIMARY KEY (`idI`), ADD KEY `FK_Inscription_idU` (`idU`), ADD KEY `FK_Inscription_idTypeU` (`idTypeU`);

--
-- Index pour la table `Modification`
--
ALTER TABLE `Modification`
 ADD PRIMARY KEY (`idM`), ADD KEY `FK_Modification_idU` (`idU`), ADD KEY `FK_Modification_idD` (`idD`);

--
-- Index pour la table `Publication`
--
ALTER TABLE `Publication`
 ADD PRIMARY KEY (`idP`), ADD KEY `FK_Publication_idU` (`idU`), ADD KEY `FK_Publication_document_idd` (`document_idd`);

--
-- Index pour la table `Suppression`
--
ALTER TABLE `Suppression`
 ADD PRIMARY KEY (`idS`), ADD KEY `FK_Suppression_idU` (`idU`), ADD KEY `FK_Suppression_idD` (`idD`);

--
-- Index pour la table `TypeD`
--
ALTER TABLE `TypeD`
 ADD PRIMARY KEY (`idTypeD`);

--
-- Index pour la table `TypeU`
--
ALTER TABLE `TypeU`
 ADD PRIMARY KEY (`idTypeU`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
 ADD PRIMARY KEY (`idU`);

--
-- Index pour la table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
 ADD PRIMARY KEY (`idU`,`idTypeU`), ADD KEY `FK_UtilisateurType_idTypeU` (`idTypeU`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Document`
--
ALTER TABLE `Document`
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `DocumentType`
--
ALTER TABLE `DocumentType`
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Droit`
--
ALTER TABLE `Droit`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Inscription`
--
ALTER TABLE `Inscription`
MODIFY `idI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Modification`
--
ALTER TABLE `Modification`
MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Publication`
--
ALTER TABLE `Publication`
MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Suppression`
--
ALTER TABLE `Suppression`
MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TypeD`
--
ALTER TABLE `TypeD`
MODIFY `idTypeD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `TypeU`
--
ALTER TABLE `TypeU`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
ADD CONSTRAINT `FK_Commentaire_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Commentaire_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Contraintes pour la table `DocumentType`
--
ALTER TABLE `DocumentType`
ADD CONSTRAINT `FK_DocumentType_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_DocumentType_idTypeD` FOREIGN KEY (`idTypeD`) REFERENCES `TypeD` (`idTypeD`);

--
-- Contraintes pour la table `Inscription`
--
ALTER TABLE `Inscription`
ADD CONSTRAINT `FK_Inscription_idTypeU` FOREIGN KEY (`idTypeU`) REFERENCES `TypeU` (`idTypeU`),
ADD CONSTRAINT `FK_Inscription_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Contraintes pour la table `Modification`
--
ALTER TABLE `Modification`
ADD CONSTRAINT `FK_Modification_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Modification_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Contraintes pour la table `Publication`
--
ALTER TABLE `Publication`
ADD CONSTRAINT `FK_Publication_document_idd` FOREIGN KEY (`document_idd`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Publication_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Contraintes pour la table `Suppression`
--
ALTER TABLE `Suppression`
ADD CONSTRAINT `FK_Suppression_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Suppression_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Contraintes pour la table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
ADD CONSTRAINT `FK_UtilisateurType_idTypeU` FOREIGN KEY (`idTypeU`) REFERENCES `TypeU` (`idTypeU`),
ADD CONSTRAINT `FK_UtilisateurType_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
