-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 août 2019 à 20:59
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `expensemanager`
--
CREATE DATABASE IF NOT EXISTS `expensemanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `expensemanager`;

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
--

DROP TABLE IF EXISTS `collaborateurs`;
CREATE TABLE `collaborateurs` (
  `Genre` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `collaborateurs`:
--

--
-- Déchargement des données de la table `collaborateurs`
--

INSERT INTO `collaborateurs` (`Genre`, `Nom`, `Prenom`) VALUES
('No comment', 'Bond', 'James'),
('M', 'Chuck', 'Norris'),
('Mme', 'Kent', 'Clark'),
('M', 'Jean-Jacque', 'Lebois');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `siret` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `raisonSociale` varchar(255) NOT NULL,
  `codePostal` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `entreprise`:
--

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `siret`, `ville`, `raisonSociale`, `codePostal`, `adresse`) VALUES
(7, 0, 'Luxembourg', 'la raison est fiscale', '666', 'Rue de l\'argent qui dort');

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `mission`:
--

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id`, `nom`, `status`) VALUES
(7, 'Bond, James Bond', 'En transit je répète l\'oiseau est en transit');

-- --------------------------------------------------------

--
-- Structure de la table `notedefrais`
--

DROP TABLE IF EXISTS `notedefrais`;
CREATE TABLE `notedefrais` (
  `id` int(11) NOT NULL,
  `arrTrajet` varchar(255) DEFAULT NULL,
  `comCommercial` varchar(255) NOT NULL,
  `comComptable` varchar(255) DEFAULT NULL,
  `dateNDF` date NOT NULL,
  `Montant` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `raison` varchar(255) NOT NULL,
  `remboursement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `notedefrais`:
--

-- --------------------------------------------------------

--
-- Structure de la table `tableauresa`
--

DROP TABLE IF EXISTS `tableauresa`;
CREATE TABLE `tableauresa` (
  `collaboResa` varchar(50) NOT NULL,
  `dateResa` date NOT NULL,
  `idResa` int(11) NOT NULL,
  `vehiculeResa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `tableauresa`:
--

--
-- Déchargement des données de la table `tableauresa`
--

INSERT INTO `tableauresa` (`collaboResa`, `dateResa`, `idResa`, `vehiculeResa`) VALUES
('Chuck Norris', '2019-08-07', 10, '0'),
('Michel', '2019-08-04', 46, 'Porche');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE `vehicules` (
  `Couleur` varchar(50) NOT NULL,
  `Immatriculation` varchar(11) NOT NULL,
  `Marque` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `vehicules`:
--

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`Couleur`, `Immatriculation`, `Marque`, `Model`) VALUES
('', '0', 'Ferrari', 'La plus chère'),
('orange fluo', 'AC-112-LA', 'Tesla', 'model S'),
('Bleu', 'IO-545-OP', 'Renault', 'Kangoo'),
('Vert', 'ER-787_OP', 'Peugot', '308 GT');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notedefrais`
--
ALTER TABLE `notedefrais`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tableauresa`
--
ALTER TABLE `tableauresa`
  ADD PRIMARY KEY (`idResa`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notedefrais`
--
ALTER TABLE `notedefrais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tableauresa`
--
ALTER TABLE `tableauresa`
  MODIFY `idResa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
