-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 juil. 2021 à 07:08
-- Version du serveur :  5.5.20
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pronostic`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'sdefsd', 'sdfsd', 'sdfsdfsdf'),
(2, 'sdefsd', 'sdfsd', 'sdfsdfsdfsdfsdqsd'),
(3, 'Julien', 'julienlecat@live.fr', 'Bonjour, Je trouve votre site super génial');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210708120805', '2021-07-08 12:08:11', 28),
('DoctrineMigrations\\Version20210708153505', '2021-07-08 15:35:18', 29),
('DoctrineMigrations\\Version20210709143317', '2021-07-09 14:33:22', 57);

-- --------------------------------------------------------

--
-- Structure de la table `pari`
--

DROP TABLE IF EXISTS `pari`;
CREATE TABLE IF NOT EXISTS `pari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score_d` int(11) NOT NULL,
  `score_e` int(11) NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_match` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pari`
--

INSERT INTO `pari` (`id`, `score_d`, `score_e`, `id_user`, `id_match`) VALUES
(1, 1, 1, '1', 3),
(2, 1, 2, '1', 3),
(3, 1, 2, '1', 2),
(13, 0, 1, '1', 2),
(14, 1, 2, '3', 2),
(15, 0, 0, '1', 3),
(16, 600, 10, '1', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'julienlecat@live.fr', '$2y$13$he.v02dNIZ4SgamQtSWOceQOh72kp2j71sgeajj/3unXAmWrwIC3i'),
(2, 'test@test.fr', '$2y$13$2MyHG7CtFx8XmmMMX.mZ.O6XPGQAX6fBtrSoq7sD2aCZxFh6l4d9e'),
(3, 'test1@test.fr', '$2y$13$MEl5M9BiB2oVe.BRpbefhumo5wuNWc4OJpwTu0pdYP10N2Bda8pua');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
