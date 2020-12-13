-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 13 déc. 2020 à 19:21
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ad_imperatorem`
--

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `id` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id`, `libelle`) VALUES
(1, 'Elfe'),
(2, 'Nain'),
(3, 'Humain'),
(4, 'Orc'),
(5, 'Troll'),
(6, 'Gobelin');

-- --------------------------------------------------------

--
-- Structure de la table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sex`
--

INSERT INTO `sex` (`id`, `libelle`) VALUES
(1, 'Femme'),
(2, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `stufffeet`
--

DROP TABLE IF EXISTS `stufffeet`;
CREATE TABLE IF NOT EXISTS `stufffeet` (
  `id` int NOT NULL,
  `wording` varchar(255) NOT NULL,
  `ptDefense` int NOT NULL,
  `market_value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stufffeet`
--

INSERT INTO `stufffeet` (`id`, `wording`, `ptDefense`, `market_value`) VALUES
(0, 'Rien', 0, 0),
(1, 'Chaussures du péon', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stuffhead`
--

DROP TABLE IF EXISTS `stuffhead`;
CREATE TABLE IF NOT EXISTS `stuffhead` (
  `id` int NOT NULL,
  `wording` varchar(255) NOT NULL,
  `ptDefense` int NOT NULL,
  `market_value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stuffhead`
--

INSERT INTO `stuffhead` (`id`, `wording`, `ptDefense`, `market_value`) VALUES
(0, 'Rien', 0, 0),
(1, 'Chapeau du péon', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stufflegs`
--

DROP TABLE IF EXISTS `stufflegs`;
CREATE TABLE IF NOT EXISTS `stufflegs` (
  `id` int NOT NULL,
  `wording` varchar(255) NOT NULL,
  `ptDefense` int NOT NULL,
  `market_value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stufflegs`
--

INSERT INTO `stufflegs` (`id`, `wording`, `ptDefense`, `market_value`) VALUES
(0, 'Rien', 0, 0),
(1, 'Jambière du péon', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stufftorso`
--

DROP TABLE IF EXISTS `stufftorso`;
CREATE TABLE IF NOT EXISTS `stufftorso` (
  `id` int NOT NULL,
  `wording` varchar(255) NOT NULL,
  `ptDefense` int NOT NULL,
  `market_value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stufftorso`
--

INSERT INTO `stufftorso` (`id`, `wording`, `ptDefense`, `market_value`) VALUES
(0, 'Rien', 0, 0),
(1, 'Armure du Péon', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stuffuser`
--

DROP TABLE IF EXISTS `stuffuser`;
CREATE TABLE IF NOT EXISTS `stuffuser` (
  `idUser` int NOT NULL,
  `idstufffeet` int NOT NULL,
  `idstuffhead` int NOT NULL,
  `idstufflegs` int NOT NULL,
  `idstufftorso` int NOT NULL,
  KEY `idstufffeet` (`idstufffeet`),
  KEY `idstuffhead` (`idstuffhead`),
  KEY `idstufflegs` (`idstufflegs`),
  KEY `idstufftorso` (`idstufftorso`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL,
  `nameUser` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lvl` int DEFAULT '1',
  `idRace` int NOT NULL,
  `idSex` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idRace` (`idRace`),
  KEY `idSex` (`idSex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nameUser`, `pwd`, `lvl`, `idRace`, `idSex`) VALUES
(1, 'test', 'test', 1, 1, 1),
(2, 'try', 'try', 1, 5, 2),
(3, 'Oroko', 'cesthistoiredavoirunmdp', 1, 2, 2),
(4, 'autre', 'autre', 1, 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stuffuser`
--
ALTER TABLE `stuffuser`
  ADD CONSTRAINT `stuffuser_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `stuffuser_ibfk_2` FOREIGN KEY (`idstufftorso`) REFERENCES `stufftorso` (`id`),
  ADD CONSTRAINT `stuffuser_ibfk_3` FOREIGN KEY (`idstufflegs`) REFERENCES `stufflegs` (`id`),
  ADD CONSTRAINT `stuffuser_ibfk_4` FOREIGN KEY (`idstufffeet`) REFERENCES `stufffeet` (`id`),
  ADD CONSTRAINT `stuffuser_ibfk_5` FOREIGN KEY (`idstuffhead`) REFERENCES `stuffhead` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idSex`) REFERENCES `sex` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idRace`) REFERENCES `race` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
