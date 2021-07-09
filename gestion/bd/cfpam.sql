-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Juin 2021 à 05:51
-- Version du serveur :  5.6.17-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cfpam`
--

-- --------------------------------------------------------

--
-- Structure de la table `associer`
--

CREATE TABLE IF NOT EXISTS `associer` (
  `idFiliere` int(11) NOT NULL,
  `Num_Module` int(11) NOT NULL,
  `coefficient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `idEtudiant` int(11) NOT NULL,
  `idblame` int(11) NOT NULL,
  `blame` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`idEtudiant`, `idblame`, `blame`) VALUES
(2, 1, 'exclusion'),
(6, 1, 'exclusion temporaire'),
(9, 1, 'HEURES D4ABSENCE');

-- --------------------------------------------------------

--
-- Structure de la table `blame`
--

CREATE TABLE IF NOT EXISTS `blame` (
  `idblame` int(11) NOT NULL AUTO_INCREMENT,
  `nomBlame` varchar(100) NOT NULL,
  PRIMARY KEY (`idblame`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `blame`
--

INSERT INTO `blame` (`idblame`, `nomBlame`) VALUES
(1, 'Absence'),
(2, 'Retard');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `dateN` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `numeroVersement` varchar(200) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `groupe` varchar(100) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `Numero` int(11) NOT NULL,
  PRIMARY KEY (`idEtudiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `matricule`, `nom`, `prenom`, `dateN`, `lieu`, `email`, `phone`, `numeroVersement`, `sexe`, `code`, `groupe`, `filiere`, `pseudo`, `pass`, `photo`, `Numero`) VALUES
(1, '', 'jean', 'loic', '1989-05-09', 'yaoundÃ©', 'bertrand@gmail.com', '655220262', 'azazazaz', 'Masculin', 'k575', 'Groupe A', 'web master', 'baba', 'baba', '66797164_2191141020998260_6520963281178329088_n.jpg', 4),
(2, 'WEB1021-A07', 'bertrand', 'loick', '1990-05-09', 'yaoundÃ©', 'bert@gmail.com', '655221092', 'AAZAZAZA121', 'Masculin', 'k822', 'Groupe A', 'web master', 'azerty', 'azerty', 'bordero akame.docx', 7),
(3, 'MRI1021-A01', 'loick', 'azerty', '2004-05-05', 'yaoundÃ©', 'bertrand@gmail.com', '655221092', 'azert122121', 'Masculin', 'eBnX', 'Groupe A', 'Maintenance et rÃ©seaux informatiquqes', 'azert', 'azert', '1.pdf', 1),
(4, '', 'AA', 'AA', '2003-05-01', 'SS', 'bertrand@gmail.com', '222228888', 'AZAZZA', 'Masculin', '6Uy0', '', 'web master', 'baba', 'baba', '20200413(1).pdf', 0),
(5, '', 'AA', 'AA', '2003-05-01', 'SS', 'bertrand@gmail.com', '222228888', 'AZAZZA', 'Masculin', 'fNfI', '', 'web master', 'baba', 'baba', '20200413(1).pdf', 0),
(6, 'WEB1021-A05', 'loick', 'bobo', '1986-05-14', 'yaoundÃ©', 'bertrand@gmail.com', '677238888', '1323Ds', 'Masculin', 'm8fN', 'Groupe A', 'web master', 'bobo', 'bobo', '1.pdf', 5),
(7, 'WEB1021-A06', 'jeune', 'etudiant', '1986-05-07', 'yaoundÃ©', 'bert@gmail.com', '655221092', 'UBA', 'Masculin', 'wR1W', 'Groupe A', 'web master', 'JEUNE', 'JEUNE', '1.pdf', 6),
(8, '', 'LOICK', 'LOICK', '1993-05-19', 'yaoundÃ©', 'bertrand@gmail.com', '655232329', '12112', 'Masculin', 'tQgV', '', 'web master', 'AZERTY', 'AZERTY', 'payroll.sql', 0),
(9, 'WEB1021-A08', 'hassoumi', 'deleguÃ©', '2003-06-19', 'yaoundÃ©', 'hassoumi@gmail.com', '655221092', '12323434', 'Masculin', 'dC6I', 'Groupe A', 'web master', 'HASSOUMI', 'AZERTY', 'payroll.sql', 8);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `nofiliere` varchar(200) NOT NULL,
  `code` char(10) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nofiliere`, `code`) VALUES
(1, 'web master', 'WEB'),
(2, 'ComptabilitÃ© informatisÃ©e et gestion', 'CIG'),
(3, 'DÃ©vÃ©loppeur d''application', 'DVA'),
(4, 'Gestion des ressources humaines', 'GRH'),
(5, 'Graphisme de production', 'GRP'),
(6, 'Maintenance et rÃ©seaux informatiquqes', 'MRI');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `idgroupe` int(11) NOT NULL AUTO_INCREMENT,
  `nomgroupe` varchar(30) NOT NULL,
  `idfiliere` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`idgroupe`, `nomgroupe`, `idfiliere`) VALUES
(1, 'Groupe A', 1),
(2, 'Groupe B', 1),
(3, 'Groupe C', 1),
(4, 'Groupe D', 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE IF NOT EXISTS `inscrire` (
  `idEtudiant` int(11) NOT NULL,
  `idgroupe` int(11) NOT NULL,
  `session` varchar(200) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrire`
--

INSERT INTO `inscrire` (`idEtudiant`, `idgroupe`, `session`, `annee`) VALUES
(1, 1, 'Octobre', 2021),
(2, 1, 'Octobre', 2021),
(3, 1, 'Octobre', 2021),
(1, 1, 'Octobre', 2021),
(1, 1, 'Octobre', 2021),
(6, 1, 'Octobre', 2021),
(7, 1, 'Octobre', 2021),
(2, 1, 'Octobre', 2021),
(9, 1, 'Octobre', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `Num_Module` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Module` varchar(20) NOT NULL,
  `idfiliere` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Num_Module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`Num_Module`, `Nom_Module`, `idfiliere`) VALUES
(1, 'base de donnÃ©e', '1');

-- --------------------------------------------------------

--
-- Structure de la table `obtenir`
--

CREATE TABLE IF NOT EXISTS `obtenir` (
  `idEtudiant` int(11) NOT NULL,
  `Num_Module` int(11) NOT NULL,
  `note` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `obtenir`
--

INSERT INTO `obtenir` (`idEtudiant`, `Num_Module`, `note`) VALUES
(2, 1, '13'),
(3, 0, '16'),
(6, 1, '19'),
(2, 1, '16'),
(1, 1, '12'),
(9, 1, '19');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `type`) VALUES
(1, 'cfpam', 'cfpam1234', 'admin'),
(2, 'mefimbi', 'web', 'professeur'),
(3, 'mefimbi', 'webmaster', 'formateur'),
(4, 'mefimbi', 'webmaster', 'enseignant'),
(5, 'baba', 'baba', 'etudiant'),
(6, 'rr', 'rr', 'enseignant'),
(7, 'azerty', 'azerty', 'etudiant'),
(8, 'papa', 'papa', 'enseignant'),
(9, 'azert', 'azert', 'etudiant'),
(10, 'baba', 'baba', 'etudiant'),
(11, 'baba', 'baba', 'etudiant'),
(12, 'bobo', 'bobo', 'etudiant'),
(13, 'JEUNE', 'JEUNE', 'etudiant'),
(14, 'AZERTY', 'AZERTY', 'etudiant'),
(15, 'HASSOUMI', 'AZERTY', 'etudiant');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
