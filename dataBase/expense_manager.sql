-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 29 juin 2019 à 08:54
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `expense_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siret` varchar(255) NOT NULL,
  `raisonSociale` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `siret`, `raisonSociale`, `adresse`, `ville`, `codePostal`) VALUES
(1, '100 035 400 68901', 'l\'entreprise sa', '12 rue de la rue', 'firestone', 12540),
(2, '502 433 100 54620', 'taupinembourg inc', '65 avenue petain', 'montigny', 54200),
(3, '412 002 320 11200', 'cacahuete international', '15 rue plouchy', 'mare en sac', 72520),
(4, '300 121 321 56400', 'lasagne sa', '36 boulevard de la teigne', 'tuille', 23600),
(5, '369 258 147 79135', 'trololo', '45 rue delpi', 'freming', 67650),
(8, '231 462 321 02584', 'trilili', '62 rue delpi', 'new haven', 64450),
(7, '325 654 852 01236', 'tratala', '45 rue delpi', 'freming', 67650);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `commentaire` text,
  `statut` varchar(255) NOT NULL,
  `fkCommercial` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notedefrais`
--

DROP TABLE IF EXISTS `notedefrais`;
CREATE TABLE IF NOT EXISTS `notedefrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison` varchar(255) NOT NULL,
  `dateNDF` date NOT NULL,
  `comCommercial` text,
  `remboursement` int(11) NOT NULL DEFAULT '0',
  `comComptable` text,
  `distance` int(11) DEFAULT NULL,
  `depTrajet` varchar(255) DEFAULT NULL,
  `arrTrajet` varchar(255) DEFAULT NULL,
  `Montant` int(11) DEFAULT NULL,
  `photo` blob,
  `fkMission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `telephone` int(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `fkEntreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailPers` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `telephone`, `email`, `mdp`, `type`, `fonction`, `fkEntreprise`) VALUES
(1, 'chirac', 'patrick', 123456789, 'patoune@gmail.fr', 'patoche', 'commercial', NULL, 2),
(2, 'fernand', 'lionel', 536489655, 'yoyo@yahoo.com', 'password', 'commercial', NULL, 2),
(3, 'connerie', 'shawn', 213649758, 'shawny@mouton.net', 'mouton', 'commercial', NULL, 1),
(4, 'retuire', 'rene', 645213987, 'chiffre@comptable.net', 'nombre', 'comptable', NULL, 3),
(5, 'claptrap', 'giorgi', 452138745, 'solitude@amis.com', 'maiseuh', 'commercial', NULL, 3),
(6, 'perdu', 'constance', 236568555, 'kiki@roux.fr', 'ohvevrrouv', 'comptable', NULL, 1),
(7, 'coach', 'daniela', 452145824, 'daniela@copine.net', 'oijeoifj', 'commercial', NULL, 1),
(8, 'treflo', 'marie', 645123987, 'treflo@mail.fr', 'azerty', 'comptable', NULL, 2),
(9, 'foudavies', 'david', 152634133, 'foudavies@gmail.com', 'rugby', 'commercial', NULL, 4),
(10, 'gyonolo', 'hubert', 236854952, 'tropist@bibine.net', 'biere', 'commercial', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `portefeuille`
--

DROP TABLE IF EXISTS `portefeuille`;
CREATE TABLE IF NOT EXISTS `portefeuille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkCommercial` int(11) NOT NULL,
  `fkClient` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

DROP TABLE IF EXISTS `rencontre`;
CREATE TABLE IF NOT EXISTS `rencontre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkClient` int(11) NOT NULL,
  `fkNoteDeFrais` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
