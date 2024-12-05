-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 05 déc. 2024 à 15:45
-- Version du serveur : 8.0.40-0ubuntu0.22.04.1
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marios_pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` int NOT NULL,
  `pizza_name` varchar(30) NOT NULL,
  `pizza_size` tinyint(1) NOT NULL,
  `pizza_price_base` int NOT NULL,
  `pizza_price_total` int NOT NULL,
  `pizza_supp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `pizza_name`, `pizza_size`, `pizza_price_base`, `pizza_price_total`, `pizza_supp`) VALUES
(5, 'chorizo', 1, 10, 16, 'olive'),
(8, 'reine', 0, 10, 10, NULL),
(11, 'margherita', 1, 10, 15, NULL),
(12, 'chorizo', 0, 10, 12, 'fromage, kiwi'),
(14, 'reine', 1, 10, 18, 'fromage, olive, vodka'),
(15, 'calzone', 0, 10, 10, NULL),
(16, 'hawaienne', 1, 10, 16, 'kiwi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
