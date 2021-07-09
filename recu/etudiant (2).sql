-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Juillet 2021 à 09:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `srms`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(30) NOT NULL,
  `montant` int(11) NOT NULL,
  `filiere` varchar(30) NOT NULL,
  `fourniture` int(11) NOT NULL,
  `examen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `sexe`, `date`, `lieu`, `montant`, `filiere`, `fourniture`, `examen`) VALUES
(1, 'nom', 'prenom', 'Masculin', '2003-06-02', 'djoum', 50000, 'web master', 0, 0),
(2, 'jean', 'paul', 'Masculin', '2018-05-07', 'sangmelima', 10000, '', 10000, 0),
(3, 'paul', 'pierre', 'Feminin', '2018-05-08', 'yaoundé', 10000, '', 10000, 0),
(4, 'hd', 'hd', 'Masculin', '2019-06-08', 'yaoundé', 10000, '', 10000, 0),
(5, 'ddd', 'fdf', 'Masculin', '2019-05-07', 'yaoundé', 10000, '', 10000, 0),
(6, 'aza', 'azaz', 'Feminin', '2019-05-08', 'yaoundé', 50000, 'web master', 10000, 0),
(7, 'aza', 'azaza', 'Masculin', '2019-05-07', 'djoum', 35000, 'web master', 10000, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
