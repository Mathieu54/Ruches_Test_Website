-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 06 déc. 2020 à 11:03
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
-- Base de données : `bdd_ruches_tallyos`
--

-- --------------------------------------------------------

--
-- Structure de la table `beehives`
--

DROP TABLE IF EXISTS `beehives`;
CREATE TABLE IF NOT EXISTS `beehives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `beehives`
--

INSERT INTO `beehives` (`id`, `name`, `latitude`, `longitude`) VALUES
(1, 'Ruche Marseille', 43.2961743, 5.3699525),
(2, 'Ruche Paris', 48.8566969, 2.3514616),
(3, 'Ruche Metz', 49.1196964, 6.1763552),
(4, 'Ruche Nancy', 48.6937223, 6.1834097),
(5, 'Ruche Bordeaux', 44.841225, -0.5800364),
(6, 'Ruche Lyon', 45.7578137, 4.8320114),
(7, 'Ruche Calais', 50.9488, 1.87468),
(8, 'Ruche Strasbourg', 48.584614, 7.7507127);

-- --------------------------------------------------------

--
-- Structure de la table `data_beehives`
--

DROP TABLE IF EXISTS `data_beehives`;
CREATE TABLE IF NOT EXISTS `data_beehives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beehives_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weight` float NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beehives_id` (`beehives_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `data_beehives`
--

INSERT INTO `data_beehives` (`id`, `beehives_id`, `date`, `weight`, `temperature`, `humidity`) VALUES
(1, 1, '2020-12-06 11:19:14', 44.5, 21, 55),
(2, 3, '2020-12-06 11:19:14', 40, 18, 80),
(3, 2, '2020-12-06 12:19:18', 45, 15, 70),
(4, 7, '2020-12-06 11:35:46', 38, 10, 90),
(5, 3, '2020-12-06 11:21:09', 80, 17, 75),
(6, 4, '2020-12-06 11:21:09', 50, 15, 80);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@tallyos.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `data_beehives`
--
ALTER TABLE `data_beehives`
  ADD CONSTRAINT `data_beehives_ibfk_1` FOREIGN KEY (`beehives_id`) REFERENCES `beehives` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
