-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 nov. 2020 à 18:00
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_pseudo` int(100) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` text NOT NULL,
  `titre` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_pseudo`, `nom`, `email`, `numero`, `titre`, `password`) VALUES
(3, 'admin', 'thania.s217gmail.com', '0328220768', 'etudiante', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `id-cap` int(100) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`id-cap`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id-cap`, `type`, `lieu`) VALUES
(1, 'feu', 'Antananarivo'),
(3, 'pollution', 'Majunga'),
(5, 'feu', 'Morondava'),
(7, 'pollution', 'Morondava'),
(10, 'feu', 'Morondava'),
(11, 'feu', 'Majunga'),
(13, 'pollution', 'Majunga'),
(15, 'pollution', 'Antananarivo');

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int(100) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `valeur` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `typecap` varchar(50) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_membre` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `commune` varchar(255) NOT NULL,
  `sex` text NOT NULL,
  `numero` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricule` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_membre`, `nom`, `poste`, `avatar`, `commune`, `sex`, `numero`, `email`, `matricule`, `password`, `date`) VALUES
(10, 'mj', 'manager', 'Captu.JPG', 'Tana', 'Femme', '', 'mj.s217@gmail.com', '   2226666333', 'mj', '2020-11-12 14:01:55'),
(11, 'jose', 'consultant', 'ttttiiikkoooo.jpg', 'Majunga', 'Homme', '0324675425', 'hanitra@gmail.com', ' 555333666', 'jose', '2020-11-12 14:03:17'),
(12, 'nini', 'DG', 'anoushka1.jpg', 'Morodava', 'Homme', '0336475245', 'nini@gmail.comemail', ' 666444222', 'nini', '2020-11-12 14:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `nbr-cap` int(11) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom`, `nbr-cap`) VALUES
(1, 'Antananarivo', 2),
(2, 'Antananarivo', 2),
(3, 'Majunga', 3),
(4, 'Majunga', 3),
(5, 'Morondava', 3),
(6, 'Morondava', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
