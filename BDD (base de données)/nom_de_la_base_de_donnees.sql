-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 nov. 2020 à 10:59
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nom_de_la_base_de_donnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(10) DEFAULT NULL,
  `marque_voiture` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modele_voiture` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `email`, `password`, `telephone`, `marque_voiture`, `modele_voiture`) VALUES
(1, 'new', 'version', 'new@version.fr', '5ca4f3850ccc331aaf8a257d6086e526a3b42a63e18cb11d020847985b31d188', NULL, NULL, NULL),
(2, 'cc', 'vv', 'cc@vv.fr', '29cdee48e28d8104186513c96be32955f6203cffa61833e36a88a37ecbff7989', NULL, NULL, NULL),
(3, 'bb', 'nn', 'bb@nn.fr', 'c81b021331344adcdd57a84413824fe14faa33769d9982e13d00c260e643b0f7', NULL, NULL, NULL),
(4, 'aa', 'bb', 'aa@bb.fr', 'fb8e20fc2e4c3f248c60c39bd652f3c1347298bb977b8b4d5903b85055620603', NULL, NULL, NULL),
(5, 'tt', 'uu', 'tt@uu.fr', '764c4c7b78d6fd3b7bf72e531e81b2304ff57df646d084f9b4bdd51b8e350955', NULL, NULL, NULL),
(6, 'ff', 'gg', 'ff@gg.fr', 'c380779f6175766fdbe90940851fff3995d343c63bbb82f816843c1d5100865e', NULL, NULL, NULL),
(7, 'qq', 'ss', 'qq@ss.fr', '351573d8d5d08010146c74bbec7ad56d9b6aea43eca703848e0a56045f27ee93', NULL, NULL, NULL),
(8, 'tr', 'rt', 'tr@rt.fr', '7817bb812e82168bd48fe1ea6783078d42be37e8db9bdaafdac5c45804aca64f', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
