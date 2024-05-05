-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 mai 2024 à 23:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `client`
--

-- --------------------------------------------------------

--
-- Structure de la table `inserer`
--

CREATE TABLE `inserer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `interests` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inserer`
--

INSERT INTO `inserer` (`id`, `fullname`, `username`, `email`, `phone`, `password`, `gender`, `interests`) VALUES
(2, 'Chaouch ', 'malak', 'malak.chaoouch@ensi-uma.tn', '93029668', '11111111', 'Femme', 'femme'),
(4, 'Chaouch malak', 'ùmm', 'chaouchmalak5@gmail.com', '9302966845', '11111111', 'Femme', 'femme'),
(5, 'Malak Chaouch', 'malak.chaooukch@ensi-uma.tn', 'chaouchmalaak5@gmail.com', '55581940', '11111111', 'Femme', 'femme, enfant'),
(6, 'nourchen', 'romdnhbchb', 'nhhhjb@gmail.com', '9999999', '11111111', 'Homme', 'homme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inserer`
--
ALTER TABLE `inserer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inserer`
--
ALTER TABLE `inserer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
