-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 28 fév. 2019 à 15:43
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

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
-- Structure de la table `assaut`
--

DROP TABLE IF EXISTS `assaut`;
CREATE TABLE `assaut` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `effet` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_javelin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `assaut`
--

INSERT INTO `assaut` (`id`, `nom`, `effet`, `id_type`, `id_javelin`) VALUES
(1, 'Mortier à fragmentation', 'Lance une série de petits éclats de mortier pour tout détruire sur une large zone ciblée.', 1, 2),
(2, 'Mortier pare-feu', 'Embrasez le champ de bataille avec un gigantesque mur de flammes.', 1, 2),
(3, 'Bobine foudroyante', 'Électrocutez vos adversaires avec un arc électrique qui cible un ennemi aléatoire.', 1, 2),
(4, 'Bobine de choc', 'Inflige une vague d\'électricité à tous les ennemis autour de vous.', 1, 2),
(5, 'Artillerie de siège', 'Équipez-vous de cette fameuse arme pour lancer des roquettes dévastatrices sur vos ennemis.', 2, 2),
(6, 'Lance-flamme', 'Faites monter la température avec un torrent de flammes.', 2, 2),
(7, 'Canon Flak', 'Abattez vos ennemis avec cette arme à dispersion à courte portée.', 2, 2),
(8, 'Canon électrique', 'Lance un puissant projectile d\'énergie cinétique sur un ennemi.', 2, 2),
(9, 'Crache-venin', 'Envoyez plusieurs salves de projectiles d\'acide en cloche sur vos adversaires.', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `bonus`
--

DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `effet` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bonus`
--

INSERT INTO `bonus` (`id`, `nom`, `effet`) VALUES
(1, '+% bonus récolte', 'Augmente la chance de trouver des items de meilleure qualité'),
(2, '+% boucl. max.', 'Augmente le niveau du bouclier'),
(3, '+% chance soutien', 'Augmente le taux de loot de rareté'),
(4, '+% dég.', ''),
(5, '+% dég. acide', ''),
(6, '+% dég. armes', ''),
(7, '+% dég. canon auto.', 'Augmente les dégâts du canon automatique'),
(8, '+% dég. élec.', ''),
(9, '+% dég. fusil à lun.', 'Augmente les dégâts du fusil à lunette'),
(10, '+% dég. fusil à p.', 'Augmente les dégâts du fusil à pompe'),
(11, '+% dég. fusil assaut.', 'Augmente les dégâts du fusil d\'assaut'),
(12, '+% dég. fusil mitra.', 'Augmente les dégâts du fusil mitrailleur'),
(13, '+% dég. fusil préc.', 'Augmente les dégâts du fusil de précision'),
(14, '+% dég. glace', ''),
(15, '+% dég. impact', ''),
(16, '+% dég. lance-gren.', 'Augmente les dégâts du lance-grenades'),
(17, '+% dég. pist. lourd.', 'Augmente les dégâts du pistolet lourd'),
(18, '+-% délai bouclier', 'Modifie la vitesse de rechargement du bouclier lorsqu\'il se charge'),
(19, '+% mun. armes', ''),
(20, '+% mun. canon auto', 'Augmente la quantité de munitions du canon automatique'),
(21, '+% mun. fusil à lun.', 'Augmente la quantité de munitions du fusil à lunette'),
(22, '+% mun. fusil à p.', 'Augmente la quantité de munitions du fusil à pompe'),
(23, '+% mun. fusil assaut', 'Augmente la quantité de munitions du fusil d\'assaut'),
(24, '+% mun. fusil mitra.', 'Augmente la quantité de munitions du fusil mitrailleur'),
(25, '+% mun. fusil préc.', 'Augmente la quantité de munitions du fusil de précison'),
(26, '+% mun. pist. mitra.', 'Augmente la quantité de munitions du pistolet mitrailleur'),
(27, '+% mun. pistolet', 'Augmente la quantité de munitions du pistolet lourd'),
(28, '+% puissance', ''),
(29, '+% qté kits mun.', ''),
(30, '+% qté répar.', ''),
(31, '+% rayon de kits', ''),
(32, '+% recharge boucl.', ''),
(33, '+% récup. munitions', ''),
(34, '+% récup. répar.', ''),
(35, '+% résist. élec.', ''),
(36, '+% résist. feu', ''),
(37, '+% taille chargeur', ''),
(38, '+% vit.', ''),
(39, '+% vit. équip.', ''),
(40, '+% vit. soutien', '');

-- --------------------------------------------------------

--
-- Structure de la table `builds`
--

DROP TABLE IF EXISTS `builds`;
CREATE TABLE `builds` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_javelin` int(11) NOT NULL,
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
-- Structure de la table `build_bonus`
--

DROP TABLE IF EXISTS `build_bonus`;
CREATE TABLE `build_bonus` (
  `id` int(11) NOT NULL,
  `id_build` int(11) NOT NULL,
  `id_bonus` int(11) NOT NULL
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
  `armure` int(11) DEFAULT NULL,
  `bouclier` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `effet` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`id`, `nom`, `armure`, `bouclier`, `description`, `effet`) VALUES
(1, 'Munitions fusil à lunette', NULL, NULL, NULL, NULL),
(2, 'Munitions fusil à pompe', NULL, NULL, NULL, NULL),
(3, 'Munitions fusil d\'assaut', NULL, NULL, NULL, NULL),
(4, 'Munitions fusil de précision', NULL, NULL, NULL, NULL),
(5, 'Munitions fusil mitrailleur', NULL, NULL, NULL, NULL),
(6, 'Munitions pistolet lourd', NULL, NULL, NULL, NULL),
(7, 'Munitions pistolet mitrailleur', NULL, NULL, NULL, NULL),
(8, 'Munitions spéciales', NULL, NULL, NULL, NULL),
(9, 'Compartiment à munitions', NULL, NULL, NULL, NULL),
(10, 'Baisse thermique', NULL, NULL, NULL, NULL),
(11, 'Gravure de corps-à-corps', NULL, NULL, NULL, NULL),
(12, 'Gravure ultime', NULL, NULL, NULL, NULL),
(13, 'Renforcement d\'armure', NULL, NULL, NULL, NULL),
(14, 'Renforcement de bouclier', NULL, NULL, NULL, NULL),
(15, 'Avantage tactique', 2486, 2486, NULL, NULL),
(16, 'Bras combinés', 2486, 2486, NULL, NULL),
(17, 'Détermination du vainqueur\r\n', 2486, 2486, NULL, NULL),
(18, 'Distinction de l\'avant-garde', 2486, 2486, 'Augmente les dégâts au corps-à-corps de 30% et l\'effet électrique de 30%.', NULL),
(19, 'Distinction de la dévastation', 2486, 2486, NULL, NULL),
(20, 'Faveur des aéroportés', 2486, 2486, NULL, NULL),
(21, 'Faveur du général', 2486, 2486, NULL, NULL),
(22, 'Fer de la lance', 2486, 2486, NULL, NULL),
(23, 'Rempart défensif', 2486, 2486, NULL, NULL),
(24, 'Résolution du vainqueur', 2486, 2486, 'Augmente les dégâts d\'explosion de 50% et réduit les dégâts d\'impact de -20%.', 'Effectuer une petite élimination multiple (3) restaure instantanément 25% de l\'armure maximale.\r\n'),
(25, 'Argument percutant', NULL, NULL, NULL, NULL),
(26, 'Cadre synchronisé', NULL, NULL, NULL, NULL),
(27, 'Coque renforcée', NULL, NULL, NULL, NULL),
(28, 'Distinction du fidèle', NULL, NULL, NULL, NULL),
(29, 'Emblème de destruction', NULL, NULL, NULL, NULL),
(30, 'Emblème de l\'avant-garde', NULL, NULL, NULL, NULL),
(31, 'Entrée fracassante', NULL, NULL, NULL, NULL),
(32, 'Protection de bouclier ablative', NULL, NULL, NULL, NULL),
(33, 'Surcharge catalytique', NULL, NULL, NULL, NULL),
(34, 'Traitement de choc', NULL, NULL, NULL, NULL),
(35, 'Gravure de feu', NULL, NULL, NULL, NULL),
(36, 'Gravure de foudre', NULL, NULL, NULL, NULL),
(37, 'Gravure de glace', NULL, NULL, NULL, NULL),
(38, 'Gravure de lame', NULL, NULL, NULL, NULL),
(39, 'Système d\'assaut amélioré', NULL, NULL, NULL, NULL),
(40, 'Système de frappe amélioré', NULL, NULL, NULL, NULL),
(41, 'Circuit d\'énergie détourné', NULL, NULL, NULL, NULL),
(42, 'Combo d\'Intercepteur amélioré', NULL, NULL, NULL, NULL),
(43, 'Talisman insaisissable', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `javelin`
--

DROP TABLE IF EXISTS `javelin`;
CREATE TABLE `javelin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `javelin`
--

INSERT INTO `javelin` (`id`, `nom`) VALUES
(1, 'Commando'),
(2, 'Colosse'),
(3, 'Tempête'),
(4, 'Intercepteur');

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
-- Structure de la table `soutient`
--

DROP TABLE IF EXISTS `soutient`;
CREATE TABLE `soutient` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_javelin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `soutient`
--

INSERT INTO `soutient` (`id`, `nom`, `description`, `id_javelin`) VALUES
(1, 'Point de rempart', 'Gardez l\'ennemi à distance et protégez votre escouade avec un bouclier sphérique.', 1),
(2, 'Ralliement', 'Protégez vos coéquipiers avec un bouclier sphérique qui augmente les dégâts de leurs armes.', 1),
(3, 'Cri de guerre', 'Incitez les ennemis à vous attaquer et diminuez leur résistance élémentaire.', 2),
(4, 'Impulsion de bouclier', 'Confère un bonus de résistance aux dégâts à vos alliés.', 2),
(5, 'Balise cible', 'Marquez un ennemi pour permettre à vos alliés de lui infliger des dégâts accrus.', 4),
(6, 'Cri de ralliement', 'Dissipez les effets nocifs infligés à l\'ensemble de votre équipe.', 4),
(7, 'Mur de vent', 'Crée un mur transparent capable de bloquer les projectiles ennemis.', 3),
(8, 'Terrain glissant', 'Crée un champ qui réduit le délai des capacités des alliés qui pénètrent à l\'intérieur.', 3);

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
-- Structure de la table `type_assaut`
--

DROP TABLE IF EXISTS `type_assaut`;
CREATE TABLE `type_assaut` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_assaut`
--

INSERT INTO `type_assaut` (`id`, `designation`) VALUES
(1, 'lanceur d\'obus'),
(2, 'lanceur d\'assaut lourd');

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
-- Index pour la table `assaut`
--
ALTER TABLE `assaut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_javelin` (`id_javelin`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_soutient`),
  ADD KEY `id_explosion` (`id_explosion`),
  ADD KEY `id_concentration` (`id_concentration`),
  ADD KEY `id_javelin` (`id_javelin`);

--
-- Index pour la table `build_armes`
--
ALTER TABLE `build_armes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arme` (`id_arme`),
  ADD KEY `id_rarete` (`id_rarete`),
  ADD KEY `id_build` (`id_build`);

--
-- Index pour la table `build_bonus`
--
ALTER TABLE `build_bonus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_build` (`id_build`),
  ADD KEY `id_bonus` (`id_bonus`);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `javelin`
--
ALTER TABLE `javelin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rarete`
--
ALTER TABLE `rarete`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `soutient`
--
ALTER TABLE `soutient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_javelin` (`id_javelin`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_assaut`
--
ALTER TABLE `type_assaut`
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
-- AUTO_INCREMENT pour la table `assaut`
--
ALTER TABLE `assaut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- AUTO_INCREMENT pour la table `build_bonus`
--
ALTER TABLE `build_bonus`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `javelin`
--
ALTER TABLE `javelin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rarete`
--
ALTER TABLE `rarete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `soutient`
--
ALTER TABLE `soutient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_assaut`
--
ALTER TABLE `type_assaut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Contraintes pour la table `assaut`
--
ALTER TABLE `assaut`
  ADD CONSTRAINT `assaut_ibfk_1` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assaut_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_assaut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `builds_ibfk_2` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`);

--
-- Contraintes pour la table `build_composant`
--
ALTER TABLE `build_composant`
  ADD CONSTRAINT `build_composant_ibfk_1` FOREIGN KEY (`id_build`) REFERENCES `builds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `build_composant_ibfk_2` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `soutient`
--
ALTER TABLE `soutient`
  ADD CONSTRAINT `soutient_ibfk_1` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
