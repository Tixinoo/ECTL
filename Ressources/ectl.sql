-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2015 at 04:10 
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ectl-db-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Commentaire`
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
-- Table structure for table `Document`
--

CREATE TABLE IF NOT EXISTS `Document` (
`idD` int(11) NOT NULL,
  `nomD` varchar(30) DEFAULT NULL,
  `descD` text,
  `contenuD` longtext,
  `urlD` varchar(50) DEFAULT NULL,
  `publication_idp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DocumentType`
--

CREATE TABLE IF NOT EXISTS `DocumentType` (
`idD` int(11) NOT NULL,
  `idTypeD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Droit`
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
-- Table structure for table `Inscription`
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
-- Table structure for table `Modification`
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
-- Table structure for table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
`idP` int(11) NOT NULL,
  `dateP` datetime DEFAULT NULL,
  `commentP` text,
  `idU` int(11) NOT NULL,
  `document_idd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Suppression`
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
-- Table structure for table `TypeD`
--

CREATE TABLE IF NOT EXISTS `TypeD` (
`idTypeD` int(11) NOT NULL,
  `nomTypeD` varchar(30) DEFAULT NULL,
  `descTypeD` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TypeU`
--

CREATE TABLE IF NOT EXISTS `TypeU` (
`idTypeU` int(11) NOT NULL,
  `nomTypeU` varchar(30) DEFAULT NULL,
  `descTypeU` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `UtilisateurType`
--

CREATE TABLE IF NOT EXISTS `UtilisateurType` (
`idU` int(11) NOT NULL,
  `idTypeU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Commentaire`
--
ALTER TABLE `Commentaire`
 ADD PRIMARY KEY (`idC`), ADD KEY `FK_Commentaire_idU` (`idU`), ADD KEY `FK_Commentaire_idD` (`idD`);

--
-- Indexes for table `Document`
--
ALTER TABLE `Document`
 ADD PRIMARY KEY (`idD`), ADD KEY `FK_Document_publication_idp` (`publication_idp`);

--
-- Indexes for table `DocumentType`
--
ALTER TABLE `DocumentType`
 ADD PRIMARY KEY (`idD`,`idTypeD`), ADD KEY `FK_DocumentType_idTypeD` (`idTypeD`);

--
-- Indexes for table `Droit`
--
ALTER TABLE `Droit`
 ADD PRIMARY KEY (`idTypeU`,`idTypeD`), ADD KEY `FK_Droit_idTypeD` (`idTypeD`);

--
-- Indexes for table `Inscription`
--
ALTER TABLE `Inscription`
 ADD PRIMARY KEY (`idI`), ADD KEY `FK_Inscription_idU` (`idU`), ADD KEY `FK_Inscription_idTypeU` (`idTypeU`);

--
-- Indexes for table `Modification`
--
ALTER TABLE `Modification`
 ADD PRIMARY KEY (`idM`), ADD KEY `FK_Modification_idU` (`idU`), ADD KEY `FK_Modification_idD` (`idD`);

--
-- Indexes for table `Publication`
--
ALTER TABLE `Publication`
 ADD PRIMARY KEY (`idP`), ADD KEY `FK_Publication_idU` (`idU`), ADD KEY `FK_Publication_document_idd` (`document_idd`);

--
-- Indexes for table `Suppression`
--
ALTER TABLE `Suppression`
 ADD PRIMARY KEY (`idS`), ADD KEY `FK_Suppression_idU` (`idU`), ADD KEY `FK_Suppression_idD` (`idD`);

--
-- Indexes for table `TypeD`
--
ALTER TABLE `TypeD`
 ADD PRIMARY KEY (`idTypeD`);

--
-- Indexes for table `TypeU`
--
ALTER TABLE `TypeU`
 ADD PRIMARY KEY (`idTypeU`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
 ADD PRIMARY KEY (`idU`);

--
-- Indexes for table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
 ADD PRIMARY KEY (`idU`,`idTypeU`), ADD KEY `FK_UtilisateurType_idTypeU` (`idTypeU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Commentaire`
--
ALTER TABLE `Commentaire`
MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Document`
--
ALTER TABLE `Document`
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DocumentType`
--
ALTER TABLE `DocumentType`
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Droit`
--
ALTER TABLE `Droit`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Inscription`
--
ALTER TABLE `Inscription`
MODIFY `idI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Modification`
--
ALTER TABLE `Modification`
MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Publication`
--
ALTER TABLE `Publication`
MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Suppression`
--
ALTER TABLE `Suppression`
MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TypeD`
--
ALTER TABLE `TypeD`
MODIFY `idTypeD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TypeU`
--
ALTER TABLE `TypeU`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commentaire`
--
ALTER TABLE `Commentaire`
ADD CONSTRAINT `FK_Commentaire_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Commentaire_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Constraints for table `Document`
--
ALTER TABLE `Document`
ADD CONSTRAINT `FK_Document_publication_idp` FOREIGN KEY (`publication_idp`) REFERENCES `Publication` (`idP`);

--
-- Constraints for table `DocumentType`
--
ALTER TABLE `DocumentType`
ADD CONSTRAINT `FK_DocumentType_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_DocumentType_idTypeD` FOREIGN KEY (`idTypeD`) REFERENCES `TypeD` (`idTypeD`);

--
-- Constraints for table `Droit`
--
ALTER TABLE `Droit`
ADD CONSTRAINT `FK_Droit_idTypeD` FOREIGN KEY (`idTypeD`) REFERENCES `TypeD` (`idTypeD`),
ADD CONSTRAINT `FK_Droit_idTypeU` FOREIGN KEY (`idTypeU`) REFERENCES `TypeU` (`idTypeU`);

--
-- Constraints for table `Inscription`
--
ALTER TABLE `Inscription`
ADD CONSTRAINT `FK_Inscription_idTypeU` FOREIGN KEY (`idTypeU`) REFERENCES `TypeU` (`idTypeU`),
ADD CONSTRAINT `FK_Inscription_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Constraints for table `Modification`
--
ALTER TABLE `Modification`
ADD CONSTRAINT `FK_Modification_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Modification_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Constraints for table `Publication`
--
ALTER TABLE `Publication`
ADD CONSTRAINT `FK_Publication_document_idd` FOREIGN KEY (`document_idd`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Publication_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Constraints for table `Suppression`
--
ALTER TABLE `Suppression`
ADD CONSTRAINT `FK_Suppression_idD` FOREIGN KEY (`idD`) REFERENCES `Document` (`idD`),
ADD CONSTRAINT `FK_Suppression_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

--
-- Constraints for table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
ADD CONSTRAINT `FK_UtilisateurType_idTypeU` FOREIGN KEY (`idTypeU`) REFERENCES `TypeU` (`idTypeU`),
ADD CONSTRAINT `FK_UtilisateurType_idU` FOREIGN KEY (`idU`) REFERENCES `Utilisateur` (`idU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
