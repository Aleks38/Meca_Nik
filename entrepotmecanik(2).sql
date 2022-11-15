-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 nov. 2022 à 11:16
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
  `codebarre` int(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `batiment` varchar(50) DEFAULT NULL,
  `allee` int(11) DEFAULT NULL,
  `rangee` varchar(50) DEFAULT NULL,
  `seuilCritique` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `codebarre`, `nom`, `batiment`, `allee`, `rangee`, `seuilCritique`, `stock`) VALUES
(1, 0, 'Pneus', 'A', 1, 'y', 25, 50),
(2, 0, 'Bielle', 'A', 2, 'y', 30, 20),
(3, 0, 'Cage de roulement', 'A', 6, 'y', 90, 100),
(4, 0, 'Carter de pompe', 'A', 5, 'y', 100, 110),
(5, 0, 'Collerette dentelée', 'A', 1, 'y', 15, 5),
(6, 0, 'Courroie', 'A', 1, 'u', 80, 76),
(7, 0, 'Huiles et fluides', 'A', 3, 'u', 70, 58),
(8, 0, 'Freins', 'A', 3, 'u', 15, 20),
(9, 0, 'Filtre', 'A', 4, 'u', 30, 50),
(10, 0, 'Moteur', 'A', 6, 'u', 15, 20),
(11, 0, 'Système d’essuie-glaces', 'A', 4, 'u', 90, 120),
(12, 0, 'Allumage et préchauffage', 'A', 2, 'u', 100, 130),
(13, 0, 'Suspension', 'A', 3, 'v', 70, 87),
(14, 0, 'Electricité', 'A', 5, 'v', 50, 38),
(15, 0, 'Recirculation des gaz d\'échappement', 'A', 4, 'v', 40, 25),
(16, 0, 'Amortissement', 'A', 3, 'v', 70, 73),
(17, 0, 'Composants pour la suralimentation', 'A', 4, 'v', 60, 50),
(18, 0, 'Courroies, chaînes, galets', 'A', 2, 'v', 35, 9),
(19, 0, 'Refroidissement moteur', 'A', 5, 'v', 15, 3),
(20, 0, 'Carrosserie', 'A', 1, 'v', 20, 25),
(21, 0, 'Chauffage et ventilation', 'A', 6, 'v', 70, 38),
(22, 0, 'Joints et bagues d\'étanchéité', 'B', 8, 'p', 65, 85),
(23, 0, 'Échappement', 'B', 7, 'p', 55, 60),
(24, 0, 'Intérieur', 'B', 6, 'p', 70, 45),
(25, 0, 'Système d\'alimentation', 'B', 6, 'p', 35, 12),
(26, 0, 'Direction', 'B', 5, 'p', 65, 70),
(27, 0, 'Embrayage', 'B', 4, 'p', 45, 80),
(28, 0, 'Suspension pneumatique', 'B', 2, 'p', 85, 95),
(29, 0, 'Cardan de transmission et joint homocinétique', 'B', 3, 'p', 90, 110),
(30, 0, 'Dispositif d\'attelage / accessoires', 'B', 4, 'o', 85, 67),
(31, 0, 'Boîte de vitesse', 'B', 5, 'o', 50, 62),
(32, 0, 'Climatisation', 'B', 6, 'o', 70, 85),
(33, 0, 'Roulements', 'B', 7, 'o', 90, 150),
(34, 0, 'Arbres de transmission et différentiels', 'B', 1, 'o', 25, 37),
(35, 0, 'Capteurs, relais, unités de commande', 'B', 2, 'o', 30, 22),
(36, 0, 'Accessoires voiture', 'B', 1, 'i', 90, 300),
(37, 0, 'Kits de réparation', 'B', 4, 'i', 100, 98),
(38, 0, 'Produits de nettoyage et d\'entretien du véhicule', 'B', 5, 'i', 15, 50),
(39, 0, 'Tuyaux et conduites', 'B', 8, 'i', 80, 153),
(40, 0, 'Tuning', 'C', 1, 'j', 70, 57),
(41, 0, 'Fixations', 'C', 1, 'j', 15, 22),
(42, 0, 'Éclairage', 'C', 2, 'j', 30, 38),
(43, 0, 'turbo', 'C', 2, 'k', 15, 20),
(44, 0, 'Vis à tête hexagonale Acier, M8 x 30mm', 'C', 1, 'k', 90, 150),
(45, 0, 'Vis à tête hexagonale acier zingué blanc 8.8 filet', 'C', 3, 'k', 100, 13),
(46, 0, 'M3 6mm Vis cylindrique Self-Tapping Tête Ronde Cru', 'D', 1, 'L', 70, 55),
(47, 0, 'le ressort de soupape', 'D', 1, 'L', 50, 67),
(48, 0, 'l’allumeur', 'D', 2, 'L', 40, 35),
(49, 0, 'l’alternateur', 'D', 2, 'L', 70, 85),
(50, 0, 'la courroie de ventilation', 'E', 1, 'm', 60, 90),
(51, 0, 'la pompe à eau', 'E', 2, 'm', 35, 25),
(52, 0, 'la poulie', 'E', 1, 'm', 15, 6),
(53, 0, 'la durite du radiateur', 'E', 1, 'm', 20, 22),
(54, 0, 'les chambres de combustion', 'E', 3, 'g', 70, 47),
(55, 0, 'les bouchons de remplissage et de vidange d’huile', 'E', 3, 'g', 65, 80),
(56, 0, 'la jauge d’huile', 'E', 2, 'g', 55, 55),
(57, 0, 'la pompe à essence', 'E', 2, 'g', 70, 25),
(58, 0, 'le système de canalisation du carburant', 'E', 4, 'g', 35, 84),
(59, 0, 'le bloc d’admission', 'E', 4, 'g', 65, 69),
(60, 0, 'le couvercle de culasse', 'F', 9, 'q', 45, 52),
(61, 0, 'les bougies, avec leurs câbles et leurs gaines', 'F', 8, 'q', 85, 150),
(62, 0, 'le volant', 'F', 7, 'q', 90, 100),
(63, 0, 'le bloc moteur', 'F', 7, 'q', 85, 95),
(64, 0, 'vilebrequin', 'F', 8, 'q', 50, 69),
(65, 0, 'accoudoirs', 'F', 8, 'w', 70, 57),
(66, 0, 'Pommeau de vitesse', 'F', 9, 'w', 90, 113),
(67, 0, 'porte-goblet', 'F', 9, 'w', 25, 12),
(68, 0, 'pare-choc avant arriére', 'F', 7, 'w', 30, 35),
(69, 0, 'pare-choc avant avant', 'F', 8, 'w', 90, 45),
(70, 0, 'pompe lave glace', 'F', 9, 'w', 100, 87),
(71, 0, 'pare brise', 'F', 7, 'w', 15, 6),
(72, 0, 'rétroviseur gauche', 'G', 1, 't', 80, 86),
(73, 0, 'glace rétroviseur gauche', 'G', 2, 't', 70, 74),
(74, 0, 'optique', 'G', 6, 't', 15, 19),
(75, 0, 'clignotant', 'G', 8, 't', 30, 67),
(76, 0, 'antibrouillard', 'G', 5, 't', 15, 35),
(77, 0, 'grille antibrouillard', 'G', 4, 't', 90, 58),
(78, 0, 'Armature', 'G', 7, 't', 100, 22),
(79, 0, 'Cache moteur', 'G', 8, 't', 70, 58),
(80, 0, 'grillepare choc avant', 'G', 7, 't', 50, 34),
(81, 0, 'traverse supérieure', 'G', 5, 'x', 40, 44),
(82, 0, 'renfort pare choc avant', 'G', 4, 'x', 70, 78),
(83, 0, 'calanndre', 'G', 6, 'x', 60, 80),
(84, 0, 'aile avant', 'G', 1, 'x', 35, 34),
(85, 0, 'aile arrière', 'G', 3, 'x', 15, 18),
(86, 0, 'capot', 'G', 2, 'x', 20, 38),
(87, 0, 'rétroviseur droit', 'G', 1, 'x', 70, 88),
(88, 0, 'glace rétroviseur droit', 'H', 1, 's', 65, 54),
(89, 0, 'antenne', 'H', 2, 's', 55, 64),
(90, 0, 'feu arrière principal', 'H', 3, 's', 70, 55),
(91, 0, 'feu arrière secondaire', 'H', 4, 's', 35, 70),
(92, 0, 'platine feu arriére', 'H', 5, 's', 65, 34),
(93, 0, 'catadiodtre arrière', 'H', 6, 's', 45, 85),
(94, 0, 'feu brouillard arrière', 'H', 2, 's', 85, 34),
(95, 0, 'réservoir', 'H', 4, 'e', 90, 80),
(96, 0, 'attelage', 'H', 6, 'e', 85, 150),
(97, 0, 'feu de recul', 'H', 3, 'e', 50, 60),
(98, 0, 'hayon', 'H', 2, 'e', 70, 80),
(99, 0, 'porte arrière', 'H', 1, 'e', 90, 35),
(100, 0, 'porte avant', 'H', 5, 'e', 90, 110);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL,
  `nomRole` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `nomRole`) VALUES
(1, 'Administrateur'),
(2, 'Employé');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `adresseMail` varchar(100) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `userName`, `adresseMail`, `password`, `idRole`) VALUES
(19, 'Alexy', 'Da Silva', 'aleks', 'alexy.dasilva@icloud.com', '$2y$12$UfJo0X7HBCXIBPU0cbNmr.YAAFcIS3XYAAvddvwUBEAuEmNnXPzP2', 1),
(22, 'hugo', 'Duperthuy', 'Hogu', 'test@gmail.com', '$2y$12$I2VbeFGmOEIpFQDd.sjweuyvE9p2rxVHShbS.fJNcK28HrNyviBE2', 2),
(23, 'Moi', 'monsieur', 'MOImONSIEUR', 'bengbengdanstaschnek@gmail.com', '$2y$12$4dhfBoob4WxW1TY.WSuNZucp9RP7.seuW5E2D1PAtmpcnojq4B2XC', 2);

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
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
