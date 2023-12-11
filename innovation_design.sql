-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 déc. 2023 à 22:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `innovation_design`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Lib` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `Lib`) VALUES
(1, 'logo'),
(2, 'flayer'),
(3, 'affiche'),
(4, 'publicite'),
(5, 'carte visite');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `reponse` int(11) DEFAULT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `date`, `comment`, `reponse`, `id_service`) VALUES
(1, 'testtest', '2023-12-06', 'test final', NULL, 1),
(2, 'testtest', '2023-12-06', 'bonjour', NULL, 1),
(3, 'testtest', '2023-12-06', 'hello ya khaled', 1, 1),
(4, 'testtest', '2023-12-06', 'test', NULL, 0),
(5, 'testtest', '2023-12-06', 'test session', 1, 0),
(6, 'testtest', '2023-12-06', 'test session', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande_affiche`
--

CREATE TABLE `demande_affiche` (
  `id` int(11) NOT NULL,
  `nom_demandeur` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `titre_affiche` varchar(100) NOT NULL,
  `objectif_affiche` varchar(255) NOT NULL,
  `public_cible` varchar(255) NOT NULL,
  `format_affiche` varchar(100) NOT NULL,
  `texte_principal` text NOT NULL,
  `date_livraison` date NOT NULL,
  `remarques` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_affiche`
--

INSERT INTO `demande_affiche` (`id`, `nom_demandeur`, `telephone`, `email`, `titre_affiche`, `objectif_affiche`, `public_cible`, `format_affiche`, `texte_principal`, `date_livraison`, `remarques`) VALUES
(2, 'sdgjsck', '51125770', 'test@test.com', 'scjkd', 'kclnj', 'dk,cn', 'nclk,dl;', 'dkb,', '2023-04-05', 'kdjc');

-- --------------------------------------------------------

--
-- Structure de la table `demande_carte_visite`
--

CREATE TABLE `demande_carte_visite` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `nom_personne_contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `exemple_1` varchar(255) NOT NULL,
  `exemple_2` varchar(255) NOT NULL,
  `notes_supplementaires` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_carte_visite`
--

INSERT INTO `demande_carte_visite` (`id`, `nom_entreprise`, `nom_personne_contact`, `email`, `telephone`, `adresse`, `exemple_1`, `exemple_2`, `notes_supplementaires`) VALUES
(3, 'oumaima', 'mahjoub', 'test@test.com', '51125770', 'djnvjdnlv', 'CV-Fr.pdf', '2.1 - Tableaux 2D.pdf', ',kvmldkvnmf,v');

-- --------------------------------------------------------

--
-- Structure de la table `demande_flyer`
--

CREATE TABLE `demande_flyer` (
  `id` int(11) NOT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `contact_principal` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `objectif_flyer` varchar(255) NOT NULL,
  `public_cible` varchar(255) NOT NULL,
  `format_flyer` varchar(255) NOT NULL,
  `couleurs` varchar(255) NOT NULL,
  `texte_principal` text NOT NULL,
  `date_distribution` date NOT NULL,
  `budget_flyer` varchar(255) NOT NULL,
  `remarques` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_flyer`
--

INSERT INTO `demande_flyer` (`id`, `nom_evenement`, `contact_principal`, `telephone`, `email`, `objectif_flyer`, `public_cible`, `format_flyer`, `couleurs`, `texte_principal`, `date_distribution`, `budget_flyer`, `remarques`) VALUES
(1, 'eggrg', 'rgr', 'grgr', 'test@test.com', 'efezffe', 'efzfefe', 'effeef', '', 'efefzzfefez', '2000-04-22', 'fezzeef', 'efefzfez'),
(3, 'eggrg', 'rgr', 'grgr', 'test@test.com', 'efezffe', 'efzfefe', 'effeef', '', 'kckdd', '2023-06-25', 'fezzeef', 'sxsqcv');

-- --------------------------------------------------------

--
-- Structure de la table `demande_logo`
--

CREATE TABLE `demande_logo` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `couleurs` varchar(255) DEFAULT NULL,
  `description_entreprise` text NOT NULL,
  `exemple_1` varchar(255) NOT NULL,
  `exemple_2` varchar(255) NOT NULL,
  `notes_supplementaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_logo`
--

INSERT INTO `demande_logo` (`id`, `nom_entreprise`, `couleurs`, `description_entreprise`, `exemple_1`, `exemple_2`, `notes_supplementaires`) VALUES
(1, 'fefef', 'Array', 'feeffefe', 'CV-Fr.pdf', '2d91ac60-7f43-44a6-a5a8-c85abad50b79.pdf', 'fezefe'),
(2, 'bvhgh', NULL, 'vbfb', 'Bases_du_langage_2.pdf', 'b323ccdabc0c39b8b32b258b84c5757a.pdf', 'sfgvrsbg<'),
(3, 'oumaima mahjoub', NULL, 'jnjdlvdjlvn', '2.1 - Tableaux 2D.pdf', 'b323ccdabc0c39b8b32b258b84c5757a.pdf', 'vvdv'),
(4, '', NULL, '', 'Bases_du_langage_2.pdf', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `demande_publicite`
--

CREATE TABLE `demande_publicite` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `contact_principal` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type_publicite` varchar(255) NOT NULL,
  `objectif_publicite` varchar(255) NOT NULL,
  `public_cible` varchar(255) NOT NULL,
  `format_publicite` varchar(255) NOT NULL,
  `texte_principal` text NOT NULL,
  `date_diffusion` date NOT NULL,
  `budget_publicite` varchar(255) NOT NULL,
  `canal_diffusion` varchar(255) NOT NULL,
  `remarques` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_publicite`
--

INSERT INTO `demande_publicite` (`id`, `nom_entreprise`, `contact_principal`, `telephone`, `email`, `type_publicite`, `objectif_publicite`, `public_cible`, `format_publicite`, `texte_principal`, `date_diffusion`, `budget_publicite`, `canal_diffusion`, `remarques`) VALUES
(1, 'dzdzdz', 'dzdzdz', '51125770', 'test@test.com', 'dzddz', 'dzdzdz', 'dzdzdz', 'dzdzdz', 'dzdzzddzdz', '2023-02-15', 'zddzz', 'dzzddz', 'dzdzdz'),
(2, 'hfkjld,qm;,vn ,fd', 'vsk,l', 'BVHKS?q', 'oumaymamhj83@gmail.com', 'bhqc,sx<!:q', 'bckd,lqs;m<:', 'dkjql,s;m', 'vgcjqksl,m', 'chjkqx,ls;w!:', '2023-11-21', 'cbwjksl,', 'c, nbw<', 'chwjxbl<');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `service_id`, `value`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 0),
(3, 1, 2, 3),
(4, 1, 2, 3),
(5, 1, 5, 5),
(6, 1, 5, 1),
(7, 1, 4, 4),
(8, 1, 4, 1),
(9, 1, 4, 1),
(10, 1, 4, 5),
(11, 1, 4, 5),
(12, 1, 4, 5),
(13, 1, 4, 3),
(14, 1, 4, 4),
(15, 1, 4, 2),
(16, 1, 4, 5),
(17, 1, 4, 5),
(18, 1, 4, 5),
(19, 1, 4, 5),
(20, 1, 4, 5),
(21, 1, 4, 5),
(22, 1, 1, 4),
(23, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`service_id`, `title`, `description`, `image`) VALUES
(1, 'formats multiples', 'Les logos sont livrés dans une variété de formats adaptés à divers supports, comme le web, l\'impression et d\'autres médias. Les fichiers fournis incluent généralement des versions vectorielles pour une redimension facile sans perte de qualité, ', 'img/i2.jpg'),
(2, 'conceptions des affiches', '\r\nUn service professionnel de création d\'affiches offre des designs personnalisés et percutants adaptés aux besoins marketing spécifiques. Les designers collaborent étroitement avec les clients pour saisir leur vision ', 'img/i1.png'),
(3, 'Conceptions des cartes visites', '\r\nUn service professionnel de cartes de visite offre des designs uniques et personnalisés qui incarnent l\'identité d\'une entreprise, avec des options de papier, de finitions et de styles pour créer des cartes mémorables et professionnelles', 'img/i1.png'),
(4, 'Conceptions des flyers', 'Un service de création de flyers propose des designs percutants et personnalisés pour promouvoir des événements, produits ou services, avec une variété d\'options de format, de visuels et de messages accrocheurs adaptés à chaque besoin spécifique.', 'img/i1.png'),
(5, 'conceptions des publicités ', 'Un service publicitaire professionnel offre des stratégies de communication ciblées et des créations visuelles captivantes, adaptées à divers médias et plateformes, visant à accroître la visibilité.', 'img/i1.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero_telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `e_mail`, `password`, `numero_telephone`, `adresse`, `image`, `status`) VALUES
(1, 'test', 'test', 'test@test.com', 'test', '', '', '', '1'),
(15, 'malek', 'chebil', 'test@test.com', 'test', '55445655', '', '', ''),
(16, 'patati', 'patata', 'patati@yahoo.fr', '123++', '45546654', '', '', ''),
(17, 'oumaima', 'mahjoub', 'oumaymamhj83@gmail.com', '123456', '51125770', '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CommentaireReply` (`reponse`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_affiche`
--
ALTER TABLE `demande_affiche`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_carte_visite`
--
ALTER TABLE `demande_carte_visite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_flyer`
--
ALTER TABLE `demande_flyer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_logo`
--
ALTER TABLE `demande_logo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_publicite`
--
ALTER TABLE `demande_publicite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserRating` (`user_id`),
  ADD KEY `FK_ServiceRating` (`service_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demande_affiche`
--
ALTER TABLE `demande_affiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `demande_carte_visite`
--
ALTER TABLE `demande_carte_visite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `demande_flyer`
--
ALTER TABLE `demande_flyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `demande_logo`
--
ALTER TABLE `demande_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `demande_publicite`
--
ALTER TABLE `demande_publicite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_CommentaireReply` FOREIGN KEY (`reponse`) REFERENCES `commentaire` (`id`);

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_ServiceRating` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `FK_UserRating` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
