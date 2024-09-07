-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 juil. 2024 à 19:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fp_insectopedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `insecte`
--

CREATE TABLE `insecte` (
  `id` int(11) NOT NULL,
  `nom_commun` varchar(255) NOT NULL,
  `nom_scientifique` varchar(255) NOT NULL,
  `ordre` varchar(255) NOT NULL,
  `famille` varchar(255) NOT NULL,
  `taille` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `insecte_proche__obs`
--

CREATE TABLE `insecte_proche__obs` (
  `id` int(11) NOT NULL,
  `FK_id_insecte` int(11) NOT NULL,
  `FK_id_observation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `observation`
--

CREATE TABLE `observation` (
  `id` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_observation` date NOT NULL,
  `temperature` decimal(10,0) DEFAULT NULL,
  `taux_humidite` decimal(10,0) DEFAULT NULL,
  `latitude` decimal(10,0) DEFAULT NULL,
  `longitude` decimal(10,0) DEFAULT NULL,
  `organisme_hote` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `FK_id_insecte` int(11) NOT NULL,
  `FK_id_utilisateurice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `obs__photo`
--

CREATE TABLE `obs__photo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `FK_id_observation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurice`
--

CREATE TABLE `utilisateurice` (
  `id` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_edition` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `image_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `insecte`
--
ALTER TABLE `insecte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `insecte_proche__obs`
--
ALTER TABLE `insecte_proche__obs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_insecte__insecte_proche` (`FK_id_insecte`),
  ADD KEY `FK_id_observation__observation` (`FK_id_observation`);

--
-- Index pour la table `observation`
--
ALTER TABLE `observation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_insecte__observation` (`FK_id_insecte`),
  ADD KEY `FK_id_utilisateurice__observation` (`FK_id_utilisateurice`);

--
-- Index pour la table `obs__photo`
--
ALTER TABLE `obs__photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_observation__obs_photo` (`FK_id_observation`);

--
-- Index pour la table `utilisateurice`
--
ALTER TABLE `utilisateurice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `insecte`
--
ALTER TABLE `insecte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `insecte_proche__obs`
--
ALTER TABLE `insecte_proche__obs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `observation`
--
ALTER TABLE `observation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `obs__photo`
--
ALTER TABLE `obs__photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurice`
--
ALTER TABLE `utilisateurice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `insecte_proche__obs`
--
ALTER TABLE `insecte_proche__obs`
  ADD CONSTRAINT `FK_id_insecte__insecte_proche` FOREIGN KEY (`FK_id_insecte`) REFERENCES `insecte` (`id`),
  ADD CONSTRAINT `FK_id_observation__observation` FOREIGN KEY (`FK_id_observation`) REFERENCES `observation` (`id`);

--
-- Contraintes pour la table `observation`
--
ALTER TABLE `observation`
  ADD CONSTRAINT `FK_id_insecte__observation` FOREIGN KEY (`FK_id_insecte`) REFERENCES `insecte` (`id`),
  ADD CONSTRAINT `FK_id_utilisateurice__observation` FOREIGN KEY (`FK_id_utilisateurice`) REFERENCES `utilisateurice` (`id`);

--
-- Contraintes pour la table `obs__photo`
--
ALTER TABLE `obs__photo`
  ADD CONSTRAINT `FK_id_observation__obs_photo` FOREIGN KEY (`FK_id_observation`) REFERENCES `observation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;