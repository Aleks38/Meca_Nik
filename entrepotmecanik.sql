-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 oct. 2022 à 09:26
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `entrepotmecanik`
--

-- --------------------------------------------------------

--
-- Structure de la table `correspond`
--

CREATE TABLE `correspond` (
  `idProduit` int(11) NOT NULL,
  `idMotCles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fourni`
--

CREATE TABLE `fourni` (
  `idProduit` int(11) NOT NULL,
  `idFournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `idFournisseur` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `adresseMail` varchar(50) DEFAULT NULL,
  `numTelephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `motcles`
--

CREATE TABLE `motcles` (
  `idMotCles` int(11) NOT NULL,
  `motsCles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `batiment` varchar(50) DEFAULT NULL,
  `allee` int(11) DEFAULT NULL,
  `rayon` int(11) DEFAULT NULL,
  `rangee` varchar(50) DEFAULT NULL,
  `seuilCritique` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `batiment`, `allee`, `rayon`, `rangee`, `seuilCritique`, `stock`) VALUES
(1, 'Pneus', 'A', 1, 11, 'y', 25, 50),
(2, 'Bielle', 'A', 2, 22, 'y', 30, 20),
(3, 'Cage de roulement', 'A', 6, 46, 'y', 90, 100),
(4, 'Carter de pompe', 'A', 5, 85, 'y', 100, 110),
(5, 'Collerette dentelée', 'A', 1, 61, 'y', 15, 5),
(6, 'Courroie', 'A', 1, 41, 'u', 80, 76),
(7, 'Huiles et fluides', 'A', 3, 73, 'u', 70, 58),
(8, 'Freins', 'A', 3, 43, 'u', 15, 20),
(9, 'Filtre', 'A', 4, 14, 'u', 30, 50),
(10, 'Moteur', 'A', 6, 76, 'u', 15, 20),
(11, 'Système d’essuie-glaces', 'A', 4, 44, 'u', 90, 120),
(12, 'Allumage et préchauffage', 'A', 2, 54, 'u', 100, 130),
(13, 'Suspension', 'A', 3, 54, 'v', 70, 87),
(14, 'Electricité', 'A', 5, 63, 'v', 50, 38),
(15, 'Recirculation des gaz d\'échappement', 'A', 4, 24, 'v', 40, 25),
(16, 'Amortissement', 'A', 3, 75, 'v', 70, 73),
(17, 'Composants pour la suralimentation', 'A', 4, 54, 'v', 60, 50),
(18, 'Courroies, chaînes, galets', 'A', 2, 54, 'v', 35, 9),
(19, 'Refroidissement moteur', 'A', 5, 45, 'v', 15, 3),
(20, 'Carrosserie', 'A', 1, 54, 'v', 20, 25),
(21, 'Chauffage et ventilation', 'A', 6, 47, 'v', 70, 38),
(22, 'Joints et bagues d\'étanchéité', 'B', 8, 75, 'p', 65, 85),
(23, 'Échappement', 'B', 7, 46, 'p', 55, 60),
(24, 'Intérieur', 'B', 6, 68, 'p', 70, 45),
(25, 'Système d\'alimentation', 'B', 6, 75, 'p', 35, 12),
(26, 'Direction', 'B', 5, 65, 'p', 65, 70),
(27, 'Embrayage', 'B', 4, 49, 'p', 45, 80),
(28, 'Suspension pneumatique', 'B', 2, 84, 'p', 85, 95),
(29, 'Cardan de transmission et joint homocinétique', 'B', 3, 44, 'p', 90, 110),
(30, 'Dispositif d\'attelage / accessoires', 'B', 4, 46, 'o', 85, 67),
(31, 'Boîte de vitesse', 'B', 5, 47, 'o', 50, 62),
(32, 'Climatisation', 'B', 6, 46, 'o', 70, 85),
(33, 'Roulements', 'B', 7, 48, 'o', 90, 150),
(34, 'Arbres de transmission et différentiels', 'B', 1, 75, 'o', 25, 37),
(35, 'Capteurs, relais, unités de commande', 'B', 2, 78, 'o', 30, 22),
(36, 'Accessoires voiture', 'B', 1, 64, 'i', 90, 300),
(37, 'Kits de réparation', 'B', 4, 75, 'i', 100, 98),
(38, 'Produits de nettoyage et d\'entretien du véhicule', 'B', 5, 24, 'i', 15, 50),
(39, 'Tuyaux et conduites', 'B', 8, 56, 'i', 80, 153),
(40, 'Tuning', 'C', 1, 71, 'j', 70, 57),
(41, 'Fixations', 'C', 1, 57, 'j', 15, 22),
(42, 'Éclairage', 'C', 2, 43, 'j', 30, 38),
(43, 'turbo', 'C', 2, 95, 'k', 15, 20),
(44, 'Vis à tête hexagonale Acier, M8 x 30mm', 'C', 1, 66, 'k', 90, 150),
(45, 'Vis à tête hexagonale acier zingué blanc 8.8 filet', 'C', 3, 45, 'k', 100, 13),
(46, 'M3 6mm Vis cylindrique Self-Tapping Tête Ronde Cru', 'D', 1, 64, 'L', 70, 55),
(47, 'le ressort de soupape', 'D', 1, 54, 'L', 50, 67),
(48, 'l’allumeur', 'D', 2, 38, 'L', 40, 35),
(49, 'l’alternateur', 'D', 2, 62, 'L', 70, 85),
(50, 'la courroie de ventilation', 'E', 1, 64, 'm', 60, 90),
(51, 'la pompe à eau', 'E', 2, 25, 'm', 35, 25),
(52, 'la poulie', 'E', 1, 46, 'm', 15, 6),
(53, 'la durite du radiateur', 'E', 1, 64, 'm', 20, 22),
(54, 'les chambres de combustion', 'E', 3, 46, 'g', 70, 47),
(55, 'les bouchons de remplissage et de vidange d’huile', 'E', 3, 46, 'g', 65, 80),
(56, 'la jauge d’huile', 'E', 2, 58, 'g', 55, 55),
(57, 'la pompe à essence', 'E', 2, 96, 'g', 70, 25),
(58, 'le système de canalisation du carburant', 'E', 4, 87, 'g', 35, 84),
(59, 'le bloc d’admission', 'E', 4, 47, 'g', 65, 69),
(60, 'le couvercle de culasse', 'F', 9, 41, 'q', 45, 52),
(61, 'les bougies, avec leurs câbles et leurs gaines', 'F', 8, 26, 'q', 85, 150),
(62, 'le volant', 'F', 7, 31, 'q', 90, 100),
(63, 'le bloc moteur', 'F', 7, 24, 'q', 85, 95),
(64, 'vilebrequin', 'F', 8, 26, 'q', 50, 69),
(65, 'accoudoirs', 'F', 8, 31, 'w', 70, 57),
(66, 'Pommeau de vitesse', 'F', 9, 54, 'w', 90, 113),
(67, 'porte-goblet', 'F', 9, 21, 'w', 25, 12),
(68, 'pare-choc avant arriére', 'F', 7, 23, 'w', 30, 35),
(69, 'pare-choc avant avant', 'F', 8, 15, 'w', 90, 45),
(70, 'pompe lave glace', 'F', 9, 25, 'w', 100, 87),
(71, 'pare brise', 'F', 7, 21, 'w', 15, 6),
(72, 'rétroviseur gauche', 'G', 1, 87, 't', 80, 86),
(73, 'glace rétroviseur gauche', 'G', 2, 89, 't', 70, 74),
(74, 'optique', 'G', 6, 54, 't', 15, 19),
(75, 'clignotant', 'G', 8, 56, 't', 30, 67),
(76, 'antibrouillard', 'G', 5, 25, 't', 15, 35),
(77, 'grille antibrouillard', 'G', 4, 65, 't', 90, 58),
(78, 'Armature', 'G', 7, 46, 't', 100, 22),
(79, 'Cache moteur', 'G', 8, 54, 't', 70, 58),
(80, 'grillepare choc avant', 'G', 7, 25, 't', 50, 34),
(81, 'traverse supérieure', 'G', 5, 26, 'x', 40, 44),
(82, 'renfort pare choc avant', 'G', 4, 34, 'x', 70, 78),
(83, 'calanndre', 'G', 6, 15, 'x', 60, 80),
(84, 'aile avant', 'G', 1, 95, 'x', 35, 34),
(85, 'aile arrière', 'G', 3, 64, 'x', 15, 18),
(86, 'capot', 'G', 2, 78, 'x', 20, 38),
(87, 'rétroviseur droit', 'G', 1, 59, 'x', 70, 88),
(88, 'glace rétroviseur droit', 'H', 1, 35, 's', 65, 54),
(89, 'antenne', 'H', 2, 51, 's', 55, 64),
(90, 'feu arrière principal', 'H', 3, 25, 's', 70, 55),
(91, 'feu arrière secondaire', 'H', 4, 34, 's', 35, 70),
(92, 'platine feu arriére', 'H', 5, 51, 's', 65, 34),
(93, 'catadiodtre arrière', 'H', 6, 17, 's', 45, 85),
(94, 'feu brouillard arrière', 'H', 2, 26, 's', 85, 34),
(95, 'réservoir', 'H', 4, 15, 'e', 90, 80),
(96, 'attelage', 'H', 6, 24, 'e', 85, 150),
(97, 'feu de recul', 'H', 3, 26, 'e', 50, 60),
(98, 'hayon', 'H', 2, 37, 'e', 70, 80),
(99, 'porte arrière', 'H', 1, 15, 'e', 90, 35),
(100, 'porte avant', 'H', 5, 29, 'e', 90, 110);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD PRIMARY KEY (`idProduit`,`idMotCles`),
  ADD KEY `idMotCles` (`idMotCles`);

--
-- Index pour la table `fourni`
--
ALTER TABLE `fourni`
  ADD PRIMARY KEY (`idProduit`,`idFournisseur`),
  ADD KEY `idFournisseur` (`idFournisseur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Index pour la table `motcles`
--
ALTER TABLE `motcles`
  ADD PRIMARY KEY (`idMotCles`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD CONSTRAINT `correspond_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `correspond_ibfk_2` FOREIGN KEY (`idMotCles`) REFERENCES `motcles` (`idMotCles`);

--
-- Contraintes pour la table `fourni`
--
ALTER TABLE `fourni`
  ADD CONSTRAINT `fourni_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `fourni_ibfk_2` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`idFournisseur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
