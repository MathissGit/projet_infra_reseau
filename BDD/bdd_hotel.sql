-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 avr. 2024 à 14:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `idChambre` int NOT NULL,
  `nomChambre` varchar(100) NOT NULL,
  `nbPlaces` int NOT NULL,
  `prixChambre` decimal(15,2) NOT NULL,
  PRIMARY KEY (`idChambre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`idChambre`, `nomChambre`, `nbPlaces`, `prixChambre`) VALUES
(1, 'Standard', 2, '100.00'),
(2, 'Familiale', 4, '200.00'),
(3, 'Luxueuse', 2, '300.00');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `emailUser` varchar(100) NOT NULL,
  `idChambre` int NOT NULL,
  `dateReservation` date NOT NULL,
  `nomReservation` varchar(100) NOT NULL,
  PRIMARY KEY (`emailUser`,`idChambre`),
  KEY `idChambre` (`idChambre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`emailUser`, `idChambre`, `dateReservation`, `nomReservation`) VALUES
('test@test.com', 1, '2024-04-19', 'nomTest');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `emailUser` varchar(100) NOT NULL,
  `nomUser` varchar(100) NOT NULL,
  `passwordUser` varchar(300) NOT NULL,
  PRIMARY KEY (`emailUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`emailUser`, `nomUser`, `passwordUser`) VALUES
('test@test.com', 'test', '$2y$10$5lVZJ80OokDwOnAT6IFXauXpZn9sz0q70FG8aAv0uDr2wpHSWXWZW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
