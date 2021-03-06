-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 07 mars 2019 à 14:36
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
  `degat_explosion` int(11) DEFAULT NULL,
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
(3, 1, 'Siège éternel', '', 'Torrent : La taille du chargeur de base et les dégâts de base sont augmentés de 100%.', 331, NULL, 900, 400, 35),
(4, 2, 'Vengeance de la sentinelle', 'Contrecoup amélioré : la grenade se colle à l\'ennemi.', 'Contrecoup : La grenade colle a un ennemi. Déclenche un effet acide de zone après une petite série de tirs réussis.', 407, 1221, 300, 9, NULL),
(5, 2, 'Injure et blessure', 'Artificier amélioré : Les grenades rebondissent avant d\'exploser.', 'Le rempart de Victor : Vaincre un ennemi retire tous les effets de statut néfastes et augmente les résistances aux effets de 75% pendant 10 secondes.', 1791, NULL, 120, 8, 25),
(6, 2, 'Baume de Gavinicius', 'Rôdeur amélioré : fait exploser des mines manuellement au lieu de viser un point d\'impact précis.', 'Rôdeur : Déclenche les mines manuellement. Toucher 2 ennemis restaure 25% d\'armure.', 14, 1992, 120, 6, NULL),
(7, 3, 'Héraut vengeur', 'Souffleur amélioré : une arme de poing à la grande puissance de frappe.', 'Précision du raptor : Le survol augmente les dégâts de l\'arme de 200%.', 1044, NULL, 240, 9, 35),
(8, 3, 'Glorieux dénouement', 'Résolution : tire deux coups successifs puissants.', 'Furie du pistolero : toucher 2 points faibles ennemis augmente les dégâts de toutes les armes de 150% pendant 5 secondes.', 821, NULL, 450, 16, 25),
(9, 3, 'Combat rapproché', 'Barrage amélioré : propose une excellente cadence de tir', 'Force de l\'éclaireur : Les esquives augmentent les dégâts d\'arme de 75% pendant 10 secondes.', 270, NULL, 500, 20, 25),
(10, 5, 'Foudre d Yvenia', 'Éclaireur amélioré : fusil semi-automatique basique.', 'Probabilité de 33% d\'infliger de lourds dégâts électriques.', 625, NULL, 240, 16, 45),
(11, 5, 'Lumière de la Légion', 'Éclaireur amélioré : fusil semi-automatique basique.', 'Vider le chargeur permet de recharger le bouclier.', 50, NULL, 240, 16, 45),
(13, 5, 'Mort venue du ciel', 'Gardien amélioré : délivre une rafale puissante de trois balles', 'Sens du rapace : augmente les dégâts sur point faibles de 65% en survol.', 571, NULL, 700, 24, 35),
(14, 5, 'Toucher apaisant', 'Enclume améliorée : frappe fort avec un léger recul.', 'Équilibre de l\'attaquant : toucher une cible réduit le recul de -50% pendant 5 secondes. Cet effet est cumulable jusqu\'à 3 fois.', 907, NULL, 180, 12, 45),
(15, 6, 'Forteresse radieuse', 'Constricteur : maintenir la gâchette améliore la visée.', 'Réussir 8 tirs lors d\'une rafale recharge les boucliers de 35%.', 303, NULL, 75, 8, 25),
(17, 6, 'Papa Pompe', 'Dispersion améliorée : modèle standard de fusil à pompe.', 'Recharger augmente la puissance et inflige un bonus de dégâts de 150% pendant 5 secondes. Cet effet est cumulable jusqu\'à 2 fois.', 284, NULL, 75, 5, 15),
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
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `effet` varchar(255) COLLATE utf8_bin NOT NULL,
  `degat` int(11) NOT NULL,
  `id_statut` int(11) DEFAULT NULL,
  `rayon` int(11) NOT NULL,
  `degat_statut` int(11) NOT NULL,
  `recharge` float NOT NULL,
  `charges` int(11) NOT NULL,
  `id_combo` int(11) DEFAULT NULL,
  `id_type` int(11) NOT NULL,
  `id_javelin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `assaut`
--

INSERT INTO `assaut` (`id`, `nom`, `description`, `effet`, `degat`, `id_statut`, `rayon`, `degat_statut`, `recharge`, `charges`, `id_combo`, `id_type`, `id_javelin`) VALUES
(1, 'Averse du titan', 'Lance une série de petits éclats de mortier pour tout détruire sur une large zone ciblée.', 'Le mortier à fragmentation peut désormais déclencher des combos explosifs.', 2486, NULL, 3, 0, 10, 1, NULL, 1, 2),
(2, 'Fourneau en rubidium', 'Embrasez le champ de bataille avec un gigantesque mur de flammes.', 'Appliquer un effet de feu à deux ennemis remplit une charge. Peut se produire une fois toutes les 20 secondes.', 171, 2, 0, 60, 14, 0, 1, 1, 2),
(3, 'Arc de Vassa', 'Électrocutez vos adversaires avec un arc électrique qui cible un ennemi aléatoire.', 'Une série d\'impacts (3) provoque une large explosion électrique.', 0, 4, 30, 60, 2, 0, 2, 1, 2),
(4, 'Dôme voltaïque', 'Inflige une vague d\'électricité à tous les ennemis autour de vous.', 'Les ennemis touchés sont ensuite gelés.', 1286, 4, 5, 13, 1.5, 10, 1, 1, 2),
(5, 'Meilleure défense', 'Équipez-vous de cette fameuse arme pour lancer des roquettes dévastatrices sur vos ennemis.', 'Frapper un ennemi avec une roquette restaure 35% de l\'armure.', 6001, NULL, 5, 0, 15, 1, 2, 2, 2),
(6, 'Poing du creuset', 'Faites monter la température avec un torrent de flammes.', 'Avantage du vainqueur : vaincre un ennemi augmente les dégâts du lance-flamme de % pendant X secondes. Cet effet est cumulable jusqu\'à X fois', 342, 2, 0, 0, 0, 0, 1, 2, 2),
(7, 'Poudre noire', 'Abattez vos ennemis avec cette arme à dispersion à courte portée.', 'Redonne une charge après avoir éliminé un ennemi. Peut se produire une fois toutes les 4 secondes.', 514, NULL, 0, 0, 4, 2, NULL, 2, 2),
(8, 'Marteau de Garred', 'Lance un puissant projectile d\'énergie cinétique sur un ennemi.', 'Le canon électromagnétique gagne en permanence une charge supplémentaire.', 9431, NULL, 0, 0, 10, 1, 2, 2, 2),
(9, 'Solvant vert', 'Envoyez plusieurs salves de projectiles d\'acide en cloche sur vos adversaires.', 'Une fois équipé, les combos infligent 200% de dégâts.', 1114, 3, 0, 8, 1, 10, 1, 2, 2),
(10, 'Dernier argument', 'Infligez de lourds dégâts à vos adversaires sur une large zone.', 'Atteindre des ennemis ajoute 700% de charge de capacité ultime.', 4286, NULL, 5, 0, 12, 1, 2, 3, 1),
(11, 'Brasier explosif', 'Enflammez vos ennemis pour leur infliger des dégâts immédiats et continus.', 'Provoque une explosion de feu après avoir appliqué l\'effet de feu à (2) ennemis.', 3000, 2, 4, 60, 12, 1, 1, 3, 1),
(12, 'Sang-froid', 'Gelez vos adversaires jusqu\'à la moelle.', 'Rigueur hivernale : le fait d\'appliquer l\'effet de glace à un ennemi augmente les dégâts au corps-à-corps de 135% pendant 10 secondes.', 0, 1, 4, 60, 12, 1, 1, 3, 1),
(13, 'Grande première', 'Lancez une grenade qui se divise ensuite en plusieurs missiles à tête chercheuse.', 'Furie de l\'embusqué : vaincre des ennemis du dessus octroie 75% de dégâts d\'arme supplémentaires pendant 20 secondes.', 1886, NULL, 2, 0, 12, 1, NULL, 3, 1),
(14, 'Le Gambit', 'Attaquez votre adversaire avec une grenade qui se fixe sur lui et lui inflige de lourds dégâts.', 'Toucher un ennemi avec cette grenade déclenche une explosion de glace.', 5229, NULL, 2, 0, 7.5, 1, 2, 3, 1),
(15, 'Vengeance récurrente', 'Tirez un projectile qui traque une cible unique et touche également les adversaires à proximité.', 'A l\'élimination d\'un ennemi, récupère instantanément 100% de charge. Peut se produire une fois toute les 7,5 secondes.', 4715, NULL, 0, 0, 7.5, 1, 2, 4, 1),
(16, 'Récompense du vengeur', 'Frappez une cible unique d\'une puissante explosion énergétique.', 'Force de l\'attaquant : atteindre un ennemi augmente les dégâts au corps-à-corps de 110% pendant 20 secondes', 5144, NULL, 0, 0, 6, 1, 2, 4, 1),
(17, 'Lance de braise', 'Lancez un rayon d\'énergie qui inflige des dégâts continus à tout ce qu\'il touche.', 'Après une petite série d\'impacts (3), déclenche une explosion de feu.', 1457, 2, 0, 0, 1, 10, NULL, 4, 1),
(18, 'Assaut tactique', 'Infligez des dégâts acides à vos cibles avec une salve de fléchettes.', 'Les fléchettes empoisonnées gagnent une charge supplémentaire permanente.', 600, 3, 0, 15, 6, 2, NULL, 4, 1),
(19, 'Masse d\'Argo', 'Déblayez le champ de bataille avec un missile qui inflige des dégâts sur une large zone autour du point d\'impact.', 'Après l\'élimination d\'un ennemi, déclenche une explosion électrique.', 3772, NULL, 0, 0, 7, 3, NULL, 4, 1),
(20, 'Stalker impitoyable', 'Lancez un glaive à tête chercheuse.', 'Frapper un ennemi augmente les dégâts de l\'arme de _% pendant _ secondes.', 9431, NULL, 0, 0, 15, 1, NULL, 5, 4),
(21, '\r\nVoile de serpent', 'Lancez une grenade qui inflige des dégâts acides à tous les ennemis à proximité.', ' Les défaites d’armes de mêlée augmentent tous les dégâts acides de _% pendant _ secondes.', 171, 3, 6, 60, 7.5, 1, 1, 4, 4),
(22, 'Zéro absolu', 'Cible jusqu\'à deux ennemis à proximité qui gèleront à l\'impact.', ' Frapper un ennemi d\'en haut provoque une explosion de glace.', 857, 1, 0, 60, 20, 1, 1, 5, 4),
(23, '\r\nMoisson amère', 'Lancez une salve de mines sur la zone ciblée.', 'Gagne une charge constamment', 3429, NULL, 2, 0, 12, 2, NULL, 5, 4),
(24, '\r\nCharge de Raneri', 'Ruez-vous en avant en laissant un dangereux flux d\'électricité derrière vous.', ' Vaincre un ennemi recharge Ruée éclair. Peut se produire une fois toutes les _ secondes.', 4972, 4, 0, 0, 7.5, 1, 2, 5, 4),
(25, 'Talon de Cariff', 'Une attaque au corps à corps qui charge l\'ennemi d\'énergie électrique. S\'il meurt en étant chargé d\'énergie, l\'ennemi explose et inflige des dégâts autour de lui.', ' Restaure instantanément _% de santé après avoir vaincu un ennemi.', 1714, 4, 5, 60, 12, 1, 1, 6, 4),
(26, 'Répit de sanadeen', 'Jetez une étoile de ninja chargée de plasma en direction d’une cible unique ; efficace à grande distance.', 'Frapper les points faibles de l\'ennemi rétablit instantanément _% de boucliers.', 1886, NULL, 0, 0, 2, 4, NULL, 6, 4),
(27, '\r\nGriffe de l\'ombre', 'Générez une projection de l\'Intercepteur pour attaquer vos ennemis.', 'Reprendre instantanément les charges sur une petite série de meurtres (_).', 3429, NULL, 10, 0, 7.5, 1, NULL, 6, 4),
(28, '\r\nMort subite', 'Une puissante attaque au corps à corps qui inflige d\'importants dégâts physiques.', 'Frapper un ennemi provoque une explosion de feu.', 6258, NULL, 0, 0, 7.5, 1, 2, 6, 4),
(29, 'Morsure de vipère', 'Projetez un acide corrosif qui inflige des dégâts à tous les ennemis touchés.', ' Frapper un ennemi ajoute _% de charge ultime.', 5744, 3, 0, 15, 12, 1, 1, 6, 4),
(30, 'Méditation infini', 'Une frappe ciblée qui inflige des dégâts dans une zone.', ' En vol stationnaire, les dégâts électriques sont augmentés de _%', 4887, 4, 6, 0, 10, 1, 2, 7, 3),
(31, 'Colére hivernale', 'Génère des champs de glace à l\'endroit visé. En explosant, ils infligent des dégâts de glace et gèlent les ennemis.', 'Vaincre un ennemi du dessus remplit les charges. Peut se produire une fois toutes les 5 secondes', 2229, 1, 6, 60, 4.5, 3, 1, 7, 3),
(32, '\r\nFlamme venimeuse', 'Une explosion rapide qui inflige des dégâts de feu à l’emplacement d’une cible.', 'Les dégâts acides sont appliqués aux ennemis après _ frappes consécutives.', 2572, 2, 5, 0, 4.5, 5, NULL, 7, 3),
(33, 'Renouveau de tempête de grêle', 'Projette de gros morceaux de glace qui infligent de lourds dégâts et gèlent les ennemis situés à courte distance.', ' Vaincre un ennemi d\'en haut restitue instantanément _% en énergie de bouclier.', 1457, 1, 0, 15, 7.5, 1, NULL, 7, 3),
(34, '\r\nÉtoile binaire', 'Une explosion d’énergie brûlante qui traque les cibles pour y mettre le feu.', ' Lance deux projectiles de flammes vivants qui brûlent les ennemis.', 1028, 2, 0, 60, 20, 1, NULL, 7, 3),
(35, 'Rime Chaotique', 'Tirs rapides d’éclats de glace qui figent lentement une cible sur place.', ' Après avoir gelé un ennemi, augmente _ les dégâts de l\'emplacement de _% pendant _ secondes.', 257, 1, 0, 8, 0.3, 10, 1, 8, 3),
(36, 'Dix-mille soleils', 'Polyvalente, cette capacité de feu peut être utilisée pour effectuer des petits tirs rapides, ou chargée afin de tirer un gros projectile explosif.', 'Après avoir touché un ennemi, gagne 5% de bonus de dégâts pendant 5 secondes. Se cumule jusqu\'à 20.', 1865, 2, 0, 0, 3, 5, 2, 8, 3),
(37, '\r\nSceau de l\'esprit ouvert', 'Une décharge d’énergie électrique capable de rebondir sur les murs pour atteindre des cibles à couvert.', ' Frapper un ennemi d\'en haut recharge une charge. Peut se produire une fois toutes les 5 secondes.', 3858, 4, 0, 60, 6, 1, 1, 8, 3),
(38, '\r\nGlace noir', 'Envoie un puissant rayon d\'énergie de glace dans une direction choisie.', ' Vaincre un ennemi en gèle d\'autres à proximité.', 2057, 1, 0, 0, 6, 1, 2, 8, 3),
(39, '\r\nChaîne de stase', 'Libère une explosion de foudre qui s’abat sur les cibles à proximité, leur infligeant de lourds dégâts.', ' Frapper les ennemis fait provoque des explosions électriques.', 5144, 4, 0, 0, 10, 1, NULL, 8, 3),
(40, 'Jugement dernier', 'Explosez tout sur votre passage avec un projectile explosif qui inflige de lourds dégâts sur une petite zone ciblée.', 'Colère du démolisseur : frapper un ennemi deux fois augmente tous les dégâts de 35% pendant 20 secondes.', 5572, NULL, 4, 0, 15, 1, 2, 1, 2);

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
  `id_assaut` int(11) NOT NULL,
  `id_concentration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `builds`
--

INSERT INTO `builds` (`id`, `nom`, `id_user`, `id_javelin`, `id_soutient`, `id_assaut`, `id_concentration`) VALUES
(13, 'TEST soutien', 1, 2, 3, 5, 1),
(14, 'TEST ASSAUT2', 1, 2, 3, 6, 40);

-- --------------------------------------------------------

--
-- Structure de la table `build_armes`
--

DROP TABLE IF EXISTS `build_armes`;
CREATE TABLE `build_armes` (
  `id` int(11) NOT NULL,
  `id_build` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `build_armes`
--

INSERT INTO `build_armes` (`id`, `id_build`, `id_arme`) VALUES
(25, 13, 10),
(26, 13, 5),
(27, 14, 2),
(28, 14, 5);

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
  `description` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `effet` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_javelin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`id`, `nom`, `armure`, `bouclier`, `description`, `effet`, `id_javelin`) VALUES
(1, 'Agent élémentaire', 2486, 2486, 'Augmente les dégâts de feu et la capacité thermique maximum de 20% et la résistance au feu de 20%.', 'Augmente les effets élémentaires appliqués aux ennemis de 20%', 1),
(2, 'Avantage tactique', 2486, 2486, 'Augmente le seuil de surchauffe de 35%', NULL, 1),
(3, 'Bras combinés', 2486, 2486, 'Augmente les dégâts de grenade de 5%.', '', 1),
(4, 'Distinction de l\'avant-garde', 2486, 2486, 'Augmente les dégâts au corps-à-corps de 30% et l\'effet électrique de 30%.', NULL, 1),
(5, 'Distinction de la dévastation', 2486, 2486, 'Augmente les dégâts du lanceur d\'assaut de 5%.', '', 1),
(6, 'Faveur des aéroportés', 2486, 2486, 'Augmente les dégâts d\'impacts de 50%, mais réduit les dégâts d\'explosion de -20%.', 'Le survol augmente toutes les résistances de 10%.', 1),
(7, 'Faveur du général', 2486, 2486, 'Augmente la vitesse de rechargement du lanceur d\'assaut de 35%', 'Vaincre un ennemi au corps-à-corps augmente les dégâts de (A) de 50% pendant 10 secondes.', 1),
(8, 'Fer de la lance', 2486, 2486, 'Augmente les dégâts de combo de 50%', 'Réussir un combo restaure 40% de l\'armure des alliés proches.', 1),
(9, 'Rempart défensif', 2486, 2486, 'Augmente les dégâts de toutes les armes de 25%.', '', 1),
(10, 'Résolution du vainqueur', 2486, 2486, 'Augmente les dégâts d\'explosion de 50% et réduit les dégâts d\'impact de -20%.', 'Effectuer une petite élimination multiple (3) restaure instantanément 25% de l\'armure maximale.', 1),
(11, 'Argument percutant', 2486, 2486, 'Augmente les dégâts du bouclier du Colosse lors d\'un sprint de 300%.', 'Éliminer un ennemie avec une arme corps-à-corps augmente instantanément l\'armure de 20%.', 2),
(12, 'Cadre synchronisé', 2486, 2486, 'Augmente les dégâts du lanceur d\'assaut lourd de 5%.', 'Éliminer un ennemi augmente les dégâts du lanceur d\'assaut lourd de 60% pendant 5 secondes.', 2),
(13, 'Coque renforcée', 2486, 2486, 'Augmente la capacité du chargeur de toutes les armes de 5%.', 'Quand l\'effet prend fin, les dégâts augmentent de 20%. Peut se produire toutes les 10 secondes.', 2),
(14, 'Distinction du fidèle', 2486, 2486, 'Augmente la capacité maximale de munitions de 35%.', 'Une rupture de bouclier augmente les dégâts de toutes les capacités de 40% pendant 5 secondes.', 2),
(15, 'Emblème de destruction', 2486, 2486, 'Augmente tous les dégâts d\'explosion de 15%.', 'Effectuer une élimination multiple (5) avec votre capacité ultime augmente la charge de 3300%.', 2),
(16, 'Emblème de l\'avant-garde', 2486, 2486, 'Augmente les dégâts d\'électricité et de feu de 35%.', 'Une rupture de bouclier crée une explosion autour de vous.', 2),
(17, 'Entrée fracassante', 2486, 2486, 'Augmente la durée des capacités de soutien de 50%.', 'En atterrissant brutalement, crée une explosion au point d\'impact.', 2),
(18, 'Protection de bouclier ablative', 2486, 2486, 'Renforce énormément l\'armure et le bouclier du Colosse.', 'Une rupture de bouclier augmente la résistance aux dégâts de 25% pendant 5 secondes.\r\n', 2),
(19, 'Surcharge catalytique\r\n', 2486, 2486, 'Augmente les dégâts des combos de 50%.', 'Déclencher un combo augmente les dégâts de la capacité de 40% pendant 20 secondes.', 2),
(20, 'Traitement de choc', 2486, 2486, 'Augmente les dégâts du lanceur d\'artillerie de 5%.', 'Toute utilisation réussie du lanceur d\'artillerie augmente la dissipation thermique de 30% pendant 5 secondes.', 2),
(21, 'Gravure de feu', 2486, 2486, NULL, NULL, 3),
(22, 'Gravure de foudre', 2486, 2486, NULL, NULL, 3),
(23, 'Gravure de glace', 2486, 2486, NULL, NULL, 3),
(24, 'Gravure de lame', 2486, 2486, NULL, NULL, 4),
(25, 'Système d\'assaut amélioré', 2486, 2486, NULL, NULL, 4),
(26, 'Système de frappe amélioré', 2486, 2486, NULL, NULL, 4),
(27, 'Circuit d\'énergie détourné', 2486, 2486, NULL, NULL, 4),
(28, 'Combo d\'Intercepteur amélioré', 2486, 2486, NULL, NULL, 4),
(29, 'Talisman insaisissable', 2486, 2486, NULL, NULL, 4),
(30, 'Baisse thermique', 2486, 2486, NULL, NULL, NULL),
(31, 'Gravure de corps-à-corps', 2486, 2486, NULL, NULL, NULL),
(32, 'Gravure ultime', 2486, 2486, NULL, NULL, NULL),
(33, 'Renforcement d\'armure', 2486, 2486, NULL, NULL, NULL),
(34, 'Renforcement de bouclier', 2486, 2486, NULL, NULL, NULL);

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
  `puissance` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `charges` int(11) NOT NULL,
  `recharge` int(11) NOT NULL,
  `rayon` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `id_javelin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `soutient`
--

INSERT INTO `soutient` (`id`, `nom`, `description`, `puissance`, `damage`, `charges`, `recharge`, `rayon`, `duree`, `id_javelin`) VALUES
(1, 'Point de rempart', 'Gardez l\'ennemi à distance et protégez votre escouade avec un bouclier sphérique.', 36, 0, 1, 60, 0, 0, 1),
(2, 'Ralliement', 'Protégez vos coéquipiers avec un bouclier sphérique qui augmente les dégâts de leurs armes.', 36, 0, 1, 60, 0, 10, 1),
(3, 'Cri de guerre', 'Incitez les ennemis à vous attaquer et diminuez leur résistance élémentaire.', 36, 0, 1, 30, 40, 10, 2),
(4, 'Impulsion de bouclier', 'Confère un bonus de résistance aux dégâts à vos alliés.', 36, 0, 1, 45, 0, 10, 2),
(5, 'Balise cible', 'Marquez un ennemi pour permettre à vos alliés de lui infliger des dégâts accrus.', 36, 0, 1, 30, 20, 15, 4),
(6, 'Cri de ralliement', 'Dissipez les effets nocifs infligés à l\'ensemble de votre équipe.', 36, 0, 1, 60, 0, 0, 4),
(7, 'Mur de vent', 'Crée un mur transparent capable de bloquer les projectiles ennemis.', 36, 0, 1, 30, 0, 60, 3),
(8, 'Terrain glissant', 'Crée un champ qui réduit le délai des capacités des alliés qui pénètrent à l\'intérieur.', 36, 0, 1, 72, 0, 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `element` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `element`) VALUES
(1, 'Gel'),
(2, 'Feu'),
(3, 'Acide'),
(4, 'Foudre');

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
(5, 'Fusil de précision'),
(6, 'Fusil à pompe'),
(7, 'Fusils à lunette'),
(8, 'Fusils d\'assaut'),
(9, 'Fusil mitrailleurs');

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
(1, 'Lanceur d\'obus'),
(2, 'Lanceur d\'assaut lourd'),
(3, 'Grenades'),
(4, 'Lanceur d\'assaut'),
(5, 'Système d\'assaut'),
(6, 'Système d\'attaque'),
(7, 'Sceaux d\'explosion'),
(8, 'Sceaux de concentration');

-- --------------------------------------------------------

--
-- Structure de la table `type_combo`
--

DROP TABLE IF EXISTS `type_combo`;
CREATE TABLE `type_combo` (
  `id` int(11) NOT NULL,
  `combo_data` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_combo`
--

INSERT INTO `type_combo` (`id`, `combo_data`) VALUES
(1, 'Amorceur'),
(2, 'Detonateur');

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
  ADD KEY `id_type` (`id_type`),
  ADD KEY `assaut_ibfk_4` (`id_statut`),
  ADD KEY `id_combo` (`id_combo`);

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
  ADD KEY `id_explosion` (`id_assaut`),
  ADD KEY `id_concentration` (`id_concentration`),
  ADD KEY `id_javelin` (`id_javelin`),
  ADD KEY `id_soutient` (`id_soutient`);

--
-- Index pour la table `build_armes`
--
ALTER TABLE `build_armes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arme` (`id_arme`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_javelin` (`id_javelin`);

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
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `type_combo`
--
ALTER TABLE `type_combo`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `builds`
--
ALTER TABLE `builds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `build_armes`
--
ALTER TABLE `build_armes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_assaut`
--
ALTER TABLE `type_assaut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_combo`
--
ALTER TABLE `type_combo`
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
  ADD CONSTRAINT `assaut_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_assaut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assaut_ibfk_4` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `assaut_ibfk_5` FOREIGN KEY (`id_combo`) REFERENCES `type_combo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `builds_ibfk_2` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `builds_ibfk_3` FOREIGN KEY (`id_assaut`) REFERENCES `assaut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `builds_ibfk_4` FOREIGN KEY (`id_soutient`) REFERENCES `soutient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `builds_ibfk_5` FOREIGN KEY (`id_concentration`) REFERENCES `assaut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `build_armes`
--
ALTER TABLE `build_armes`
  ADD CONSTRAINT `build_armes_ibfk_1` FOREIGN KEY (`id_build`) REFERENCES `builds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `build_armes_ibfk_2` FOREIGN KEY (`id_arme`) REFERENCES `armes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `composant_ibfk_1` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `soutient`
--
ALTER TABLE `soutient`
  ADD CONSTRAINT `soutient_ibfk_1` FOREIGN KEY (`id_javelin`) REFERENCES `javelin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
