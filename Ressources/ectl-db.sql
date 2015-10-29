-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 16 Février 2015 à 00:15
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Document`
--

INSERT INTO `Document` (`idD`, `nomD`, `descD`, `contenuD`, `urlD`, `publication_idp`) VALUES
(1, 'Nouvel Espace Collaborateur', NULL, 'Nous souhaitons la bienvenue à l''ensemble de nos collaborateurs dans ce tout nouvel espace. Vous y trouverez l''ensemble des documents que nous mettons à la disposition de nos conducteurs, les dernières nouvelles que nous leur faisons parvenir ainsi que nos différents portails sur le web. Bonne visite à tous de la part de toute l''équipe TRACTLUX !', '', 1),
(27, 'Manuel Conducteur', 'Ceci est le manuel conducteur délivré par la société.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Manuel-Conducteur.pdf', 27),
(28, 'Protocole Norgal', 'Protocole de sécurité Norgal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Protocole-Norgal.pdf', 28),
(29, 'Protocole Veolia Florange', 'Protocole de sécurité Veolia Florange', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Protocole-Veolia-Florange.pdf', 29),
(30, 'Accès Site STEF Moulin-les-Met', 'Protocole d''accès pour le site STEF Moulin-les-Metz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Accès-Site-STEF-Moulin-les-Metz.pdf', 30),
(31, 'Protocole GPI Florance', 'Protocole de sécurité pour GPI Florange', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Protocole-GPI-Florance.pdf', 31),
(32, 'Protocole Sigalnor', 'Protocole de sécurité pour Sigalnor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Protocole-Sigalnor.pdf', 32),
(33, 'Protocole Lyon Basell Berre', 'Protocole de sécurité pour Lyon Basell Berre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Protocole-Lyon-Basell-Berre.pdf', 33),
(34, 'Flash Info 01/2015', 'Flash Info de janvier 2015', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Flash-Info-01-2015.pdf', 34),
(35, 'Flash Info 02/2015', 'Flash Info de février 2015', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Flash-Info-02-2015.pdf', 35),
(36, 'Réglementation XYZ', 'Réglementation XYZ pour les conducteurs ABCD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Réglementation-XYZ.pdf', 36),
(37, 'Note de Service 12/2014', 'Note de service de décembre 2014', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Note-de-Service-12-2014.pdf', 37),
(38, 'Rapport Hebdomadaire', 'Rapport à remplir par les conducteurs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Rapport-Hebdomadaire.pdf', 38),
(39, 'Fiche Consommation', 'Fiche à remplir systématiquement pour informer la société des consommations des véhicules', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Fiche-Consommation.pdf', 39),
(40, 'Demande CP', 'Document à remplir pour formuler une demande de congé(s) payé(s)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in dignissim sapien. Donec varius mauris a ipsum convallis, id posuere elit pharetra. Sed bibendum ex dui, ac laoreet augue congue et. Aliquam quis justo finibus, viverra dui tempus, cursus ligula. Praesent maximus bibendum turpis eget vulputate. Curabitur et turpis nec ipsum blandit condimentum placerat non urna. Nam non nisl nisi. Aliquam at interdum felis. Maecenas varius sed mi in scelerisque. Quisque consequat dui id ex interdum tempus. Ut volutpat volutpat urna, ut congue justo sagittis ac. Vestibulum in enim vestibulum, scelerisque nisl at, bibendum velit. Phasellus et elementum lorem. Proin dignissim arcu non mi pulvinar porttitor at nec justo. Vivamus dignissim diam sit amet urna interdum, et sollicitudin sapien aliquet.\r\n\r\nDuis euismod vehicula condimentum. Sed non mauris leo. Nulla pharetra libero ut orci imperdiet iaculis. Ut pretium eget nunc ac vestibulum. Nullam vestibulum lacus rhoncus, viverra sem eu, vestibulum justo. Mauris at metus congue erat tincidunt semper. Suspendisse rutrum in purus a porttitor. Nam pulvinar, ante vitae porttitor mollis, metus ante vestibulum justo, nec egestas lacus urna quis est. Curabitur viverra malesuada nibh, ac blandit odio sodales et. Vestibulum ut consectetur lectus. Donec lobortis erat vitae ex eleifend, non mollis nibh molestie. Donec cursus consequat tempor. Vivamus eu consectetur enim. Etiam dui risus, mattis in diam quis, egestas imperdiet augue.', 'Document/Demande-CP.pdf', 40);

-- --------------------------------------------------------

--
-- Structure de la table `DocumentType`
--

CREATE TABLE IF NOT EXISTS `DocumentType` (
`idD` int(11) NOT NULL,
  `idTypeD` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `DocumentType`
--

INSERT INTO `DocumentType` (`idD`, `idTypeD`) VALUES
(1, 1),
(27, 2),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(36, 5),
(34, 6),
(35, 6),
(37, 7),
(38, 8),
(39, 8),
(40, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Inscription`
--

INSERT INTO `Inscription` (`idI`, `codeI`, `validiteI`, `idU`, `idTypeU`) VALUES
(2, '123456', '2015-02-15', 1, 2),
(8, 'abcdegf', '2015-02-20', 1, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` (`idP`, `dateP`, `commentP`, `idU`, `document_idd`) VALUES
(1, '2015-02-14 00:00:00', NULL, 1, 1),
(27, '2015-02-15 19:49:14', '', 1, 27),
(28, '2015-02-15 19:54:28', '', 1, 28),
(29, '2015-02-15 19:57:35', '', 1, 29),
(30, '2015-02-15 19:59:21', '', 1, 30),
(31, '2015-02-15 20:00:41', '', 1, 31),
(32, '2015-02-15 20:01:25', '', 1, 32),
(33, '2015-02-15 20:03:00', '', 1, 33),
(34, '2015-02-15 20:03:43', '', 1, 34),
(35, '2015-02-15 20:04:12', '', 1, 35),
(36, '2015-02-15 20:05:59', '', 1, 36),
(37, '2015-02-15 20:06:37', '', 1, 37),
(38, '2015-02-15 20:07:29', '', 1, 38),
(39, '2015-02-15 20:07:58', '', 1, 39),
(40, '2015-02-15 20:08:55', '', 1, 40);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeD`
--

INSERT INTO `TypeD` (`idTypeD`, `nomTypeD`, `descTypeD`) VALUES
(0, 'Corbeille', 'Documents supprimés.'),
(1, 'News', 'Dernières nouvelles de la société TRACTLUX.'),
(2, 'Références', 'Documents de référence de la société.'),
(4, 'Protocoles de Sécurité', 'Protocoles suivis par les conducteurs.'),
(5, 'Réglementations', 'Réglementations de la société. '),
(6, 'Flash Info', 'Flash Info publiés tous les mois.'),
(7, 'Notes de Services', 'Notes de Services éditées.'),
(8, 'Divers', 'Documents divers de la société.');

-- --------------------------------------------------------

--
-- Structure de la table `TypeU`
--

CREATE TABLE IF NOT EXISTS `TypeU` (
`idTypeU` int(11) NOT NULL,
  `nomTypeU` varchar(30) DEFAULT NULL,
  `descTypeU` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TypeU`
--

INSERT INTO `TypeU` (`idTypeU`, `nomTypeU`, `descTypeU`) VALUES
(1, 'Administrateur', 'Administrateur de l''espace collaborateur.'),
(2, 'Conducteur', 'Conducteur de la société TRACTLUX.'),
(3, 'Client', 'Client de la société TRACTLUX.');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `actifU` tinyint(1) NOT NULL DEFAULT '1',
  `idU` int(11) NOT NULL,
  `pseudoU` varchar(20) DEFAULT NULL,
  `mdpU` varchar(150) DEFAULT NULL,
  `nomU` varchar(30) DEFAULT NULL,
  `prenomU` varchar(30) DEFAULT NULL,
  `telU` varchar(30) DEFAULT NULL,
  `emailU` varchar(50) DEFAULT NULL,
  `urlAvatarU` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`actifU`, `idU`, `pseudoU`, `mdpU`, `nomU`, `prenomU`, `telU`, `emailU`, `urlAvatarU`) VALUES
(1, 1, 'Antoine', '26749d7577019e59a44aaccff22f3ac8', 'Nosal', 'Antoine', '+33632281849', 'antoine.nosal@gmail.com', 'https://media.licdn.com/mpr/mpr/shrink_500_500/p/3/005/09b/372/027fd62.jpg'),
(1, 7, 'Conducteur', 'd21b2a240872243d87161ed82e822a0b', 'Monsieur', 'Conducteur', '+33512345679', 'monsieur.conducteur@mail.com', 'Image/icon-user.png'),
(0, 8, 'Monsieur', '8456818e93c855811de2dd4b571b6fe1', 'Monsieur', 'Monsieur', '+33525349870', 'monsieur@mail.com', 'Image/icon-user.png');

-- --------------------------------------------------------

--
-- Structure de la table `UtilisateurType`
--

CREATE TABLE IF NOT EXISTS `UtilisateurType` (
`idU` int(11) NOT NULL,
  `idTypeU` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `UtilisateurType`
--

INSERT INTO `UtilisateurType` (`idU`, `idTypeU`) VALUES
(1, 1),
(7, 2);

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
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `DocumentType`
--
ALTER TABLE `DocumentType`
MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `Droit`
--
ALTER TABLE `Droit`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Inscription`
--
ALTER TABLE `Inscription`
MODIFY `idI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `Modification`
--
ALTER TABLE `Modification`
MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Publication`
--
ALTER TABLE `Publication`
MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `Suppression`
--
ALTER TABLE `Suppression`
MODIFY `idS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TypeD`
--
ALTER TABLE `TypeD`
MODIFY `idTypeD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `TypeU`
--
ALTER TABLE `TypeU`
MODIFY `idTypeU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `UtilisateurType`
--
ALTER TABLE `UtilisateurType`
MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
