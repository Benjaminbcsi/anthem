-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 28 fév. 2019 à 13:37
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anthem`
--
CREATE DATABASE IF NOT EXISTS `anthem` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `anthem`;

-- --------------------------------------------------------

--
-- Structure de la table `armes`
--

DROP TABLE IF EXISTS `armes`;
CREATE TABLE `armes` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `effet` varchar(255) COLLATE utf8_bin NOT NULL,
  `degat` int(11) DEFAULT NULL,
  `degat_explosion` int(255) DEFAULT NULL,
  `cpm` int(11) DEFAULT NULL,
  `munitions` int(11) DEFAULT NULL,
  `porte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `armes`
--

INSERT INTO `armes` (`id`, `id_type`, `nom`, `description`, `effet`, `degat`, `degat_explosion`, `cpm`, `munitions`, `porte`) VALUES
(1, 1, 'Point de Stral', 'Averse de balle améliorée : excellente cadence de tir.', 'Fureur de l\'attaquant : Toucher un ennemi augmente les dégâts de l\'arme de 10% pendant 5 secondes. Se cumule jusqu\'à 10 fois.', 212, NULL, 1000, 150, 35),
(2, 1, 'Le dernier rempart', 'Lacérateur amélioré : frappe plus fort que tout les autres canons automatiques', 'Colère du flambeur : Lorsque la santé du Javelin diminue, tous les dégâts causés par l\'arme augmentent de 75% pendant 10 secondes.', 268, NULL, 800, 100, 35),
(3, 1, 'Siège éternel', '', 'Torrent : La taille du chargeur de base et les dégâts de base sont augmentés de 100%.', 0, NULL, 0, 0, 0),
(4, 2, 'Vengeance de la sentinelle', 'Contrecoup amélioré : la grenade se colle à l\'ennemi.', 'Contrecoup : La grenade colle a un ennemi. Déclenche un effet acide de zone après une petite série de tirs réussis.', 407, 1221, 300, 9, NULL),
(5, 2, 'Injure et blessure', 'Artificier amélioré : Les grenades rebondissent avant d\'exploser.', 'Le rempart de Victor : Vaincre un ennemi retire tous les effets de statut néfastes et augmente les résistances aux effets de 75% pendant 10 secondes.', 1791, NULL, 120, 8, 25),
(6, 2, 'Baume de Gavinicius', 'Rôdeur amélioré : fait exploser des mines manuellement au lieu de viser un point d\'impact précis.', 'Rôdeur : Déclenche les mines manuellement. Toucher 2 ennemis restaure 25% d\'armure.', 14, 1992, 120, 6, NULL),
(7, 3, 'Héraut vengeur', 'Souffleur amélioré : une arme de poing à la grande puissance de frappe.', 'Précision du raptor : Le survol augmente les dégâts de l\'arme de 200%.', 1044, NULL, 240, 9, 35),
(8, 3, 'Glorieux dénouement', 'Résolution : tire deux coups successifs puissants.', 'Furie du pistolero : toucher 2 points faibles ennemis augmente les dégâts de toutes les armes de 150% pendant 5 secondes.', 821, NULL, 450, 16, 25),
(9, 3, 'Combat rapproché', 'Barrage amélioré : propose une excellente cadence de tir', 'Force de l\'éclaireur : Les esquives augmentent les dégâts d\'arme de 75% pendant 10 secondes.', 270, NULL, 500, 20, 25),
(10, 5, 'Foudre d\'Yvenia', 'Éclaireur amélioré : fusil semi-automatique basique.', 'Probabilité de 33% d\'infliger de lourds dégâts électriques.', NULL, NULL, 240, 16, 45),
(11, 5, 'Lumière de la Légion', 'Éclaireur amélioré : fusil semi-automatique basique.', 'Vider le chargeur permet de recharger le bouclier.', NULL, NULL, 240, 16, 45),
(13, 5, 'Mort venue du ciel', 'Gardien amélioré : délivre une rafale puissante de trois balles', 'Sens du rapace : augmente les dégâts sur point faibles de 65% en survol.', 571, NULL, 700, 24, 35),
(14, 5, 'Toucher apaisant', 'Enclume améliorée : frappe fort avec un léger recul.', 'Équilibre de l\'attaquant : toucher une cible réduit le recul de -50% pendant 5 secondes. Cet effet est cumulable jusqu\'à 3 fois.', 907, NULL, 180, 12, 45),
(15, 6, 'Forteresse radieuse', 'Constricteur : maintenir la gâchette améliore la visée.', 'Réussir 8 tirs lors d\'une rafale recharge les boucliers de 35%.', 303, NULL, 75, 8, 25),
(17, 6, 'Papa Pompe', 'Dispersion améliorée : modèle standard de fusil à pompe.', 'Recharger augmente la puissance et inflige un bonus de dégâts de 150% pendant 5 secondes. Cet effet est cumulable jusqu\'à 2 fois.', NULL, NULL, 75, 5, 15),
(18, 6, 'Carnage déferlant', 'Vengeance améliorée : des tirs à deux obus très puissants.', 'Avantage de l\'éclaireur : les esquives augmentent les dégâts de vos armes de 50% pendant 20 secondes. Cet effet est cumulable jusqu\'à 3 fois.', 192, NULL, 500, 6, 15),
(19, 7, 'Blitz de la wyverne', 'Œil de lynx amélioré : un fusil équilibré et efficace à longue portée.', 'Sens du raptor : survoler tout en tirant augmente les dégâts aux points faibles de cette arme de 40%.', 3582, NULL, 45, 5, 80),
(20, 7, 'Brise-siège', 'Tourbillon amélioré : combinaison de fusil d\'assaut et de fusil à lunette.', ' Gèle la cible après une série de (3) coups réussis.', 1089, NULL, 300, 12, 45),
(22, 7, 'Vérité de Tarsis', 'Dévastateur : Les munitions explosent au contact', 'Les impacts sur les points faibles des ennemis affectés par un effet d\'état déclenchent un combo enchaîné.', 2189, 6549, 45, 1, 80),
(23, 8, 'Brasier de Ralner', 'Marteleur amélioré : la plus grande puissance de frappe des fusils d\'assaut. ', 'Met le feu à la cible après une série de (5) coups réussis.', 359, NULL, 425, 30, 25),
(24, 8, 'Rage élémentaire', 'Défenseur amélioré : modèle standard, fusil de freelancer.', 'Fureur du vétéran : atteindre des ennemis d\'élite augmente tous les dégâts élémentaires de 5% pendant 10 secondes. Se cumule jusqu\'à 20 fois.', 274, NULL, 500, 40, 35),
(25, 8, 'Vengeance divine', 'Veilleur amélioré : tire des rafales de quatre balles', 'Déclenche d\'importantes explosions de feu tous les trois impacts sur point faible.', 323, NULL, 600, 36, 45),
(26, 4, 'Combat éternel', 'Pivot amélioré : une cadence de tir améliorée et une puissance de feu décente. ', 'Colère du gladiateur : atteindre un ennemi à bout portant augmente les dégâts de l\'arme et de corps-à-corps de 110% pendant 5 secondes.', 132, NULL, 1000, 40, 15),
(27, 4, 'Surprise de Vassa', 'Tempête de grêle : pistolet mitrailleur la plus rapide, mais la moins précis.', 'Une frappe réussi au corps-à-corps augmente de 25% le nombre de munitions dans le chargeur.', 103, NULL, 1200, 50, 15),
(28, 4, 'Vengeance de Garretus', 'Trajector : une longue portée au prix d\'une cadence de tir plus faible.', 'Fureur du Gunslinger : Toucher deux points faibles rapidement de l\'ennemi augmente les dégâts de toutes les armes de 150% pendant 5 secondes', 213, NULL, 700, 26, 25),
(30, 9, 'Courage retrouvé', 'Ravageur : le fusil mitrailleur possédant la cadence de tir la plus élevée', 'Équilibre du survivant : le dernier tir réduit le recul de -50% durant les 20 prochaines secondes. Cet effet est cumulable jusqu\'à 2 fois.', 220, NULL, 850, 75, 25),
(31, 9, 'Cycle de douleur', 'Massue : cadence de tir réduite et puissance de frappe maximale.', 'Agilité du tireur d\'élite : atteindre les points faible augmente la cadence de tir de l\'arme de 10% pendant 10 secondes. Se cumule jusqu\'à 10 fois.', 425, NULL, 300, 50, 45),
(32, 9, 'Gambit d\'Artinia', 'Implacable amélioré : l\'arme la plus équilibré de sa catégorie.', 'En rechargeant, déclenche un combo explosif dans la zone.', 282, NULL, 500, 100, 35);

-- --------------------------------------------------------

--
-- Structure de la table `builds`
--

DROP TABLE IF EXISTS `builds`;
CREATE TABLE `builds` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soutient` int(11) NOT NULL,
  `id_explosion` int(11) NOT NULL,
  `id_concentration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `build_armes`
--

DROP TABLE IF EXISTS `build_armes`;
CREATE TABLE `build_armes` (
  `id` int(11) NOT NULL,
  `id_build` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `id_rarete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `build_composant`
--

DROP TABLE IF EXISTS `build_composant`;
CREATE TABLE `build_composant` (
  `id` int(11) NOT NULL,
  `id_build` int(11) NOT NULL,
  `id_composant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

DROP TABLE IF EXISTS `composant`;
CREATE TABLE `composant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `pouvoir` int(11) NOT NULL,
  `id_rarete` int(11) NOT NULL,
  `data1` int(11) NOT NULL,
  `data2` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `effet` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `rarete`
--

DROP TABLE IF EXISTS `rarete`;
CREATE TABLE `rarete` (
  `id` int(11) NOT NULL,
  `niveau_rarete` varchar(255) COLLATE utf8_bin NOT NULL,
  `pouvoir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rarete`
--

INSERT INTO `rarete` (`id`, `niveau_rarete`, `pouvoir`) VALUES
(1, 'Epique', 36),
(2, 'Magistral', 45),
(3, 'Legendaire', 47);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `data` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `data`) VALUES
(1, 'Canons automatiques'),
(2, 'Lance-grenade'),
(3, 'Pistolets lourds'),
(4, 'Pistolet mitrailleurs'),
(5, 'Fusils de précision'),
(6, 'Fusil à pompe'),
(7, 'Fusils à lunette'),
(8, 'Fusils d\'assaut'),
(9, 'Fusils mitrailleurs');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `gamertag` varchar(255) COLLATE utf8_bin NOT NULL,
  `playstation_network` varchar(255) COLLATE utf8_bin NOT NULL,
  `origin_pc` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `email`, `gamertag`, `playstation_network`, `origin_pc`) VALUES
(1, 'osirias', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'benjamins.bcsi@gmail.com', 'Benjaminsin', '', 'Osiriasse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `armes`
--
ALTER TABLE `armes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_soutient`),
  ADD KEY `id_explosion` (`id_explosion`),
  ADD KEY `id_concentration` (`id_concentration`);

--
-- Index pour la table `build_armes`
--
ALTER TABLE `build_armes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arme` (`id_arme`),
  ADD KEY `id_rarete` (`id_rarete`),
  ADD KEY `id_build` (`id_build`);

--
-- Index pour la table `build_composant`
--
ALTER TABLE `build_composant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_build` (`id_build`),
  ADD KEY `id_composant` (`id_composant`);

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rarete` (`id_rarete`);

--
-- Index pour la table `rarete`
--
ALTER TABLE `rarete`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `armes`
--
ALTER TABLE `armes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `builds`
--
ALTER TABLE `builds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `build_armes`
--
ALTER TABLE `build_armes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `build_composant`
--
ALTER TABLE `build_composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rarete`
--
ALTER TABLE `rarete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `armes`
--
ALTER TABLE `armes`
  ADD CONSTRAINT `armes_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `build_composant`
--
ALTER TABLE `build_composant`
  ADD CONSTRAINT `build_composant_ibfk_1` FOREIGN KEY (`id_build`) REFERENCES `builds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `build_composant_ibfk_2` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_ibfk_1` FOREIGN KEY (`id_rarete`) REFERENCES `rarete` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
