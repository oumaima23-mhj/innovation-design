-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 déc. 2023 à 12:00
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
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `date`, `comment`, `rating`) VALUES
(4, 'oumaimamahjoub', '2023-11-29', 'bonjour', 4),
(5, 'oumaimamahjoub', '2023-11-29', '5edma tayaaraaaaaaaaaaaaaaaaaaa', 5),
(6, 'oumaimamahjoub', '2023-11-29', 'a9ra ala roheeeeeeeeeeeeeek', 1),
(7, '', '2023-11-29', 'oumaima rakez', 4),
(9, '', '2023-11-29', 'super', 5),
(12, '', '2023-12-01', 'semh', 3),
(17, '', '2023-12-01', 'kamel akek', 4),
(18, '', '2023-12-01', 'kamel akek', 4),
(19, 'testtest', '2023-12-02', 'ca marche', 3),
(20, 'testtest', '2023-12-02', 'test', 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
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
(2, 'eggrg', 'rgr', 'grgr', 'test@test.com', 'efezffe', 'efzfefe', 'effeef', '', 'efefzzfefez', '2000-04-22', 'fezzeef', 'efefzfez'),
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
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'formats multiples', 'les logos sont livrés dans différents formats pour une utilisation sur différents supports (web, imprimés, etc.)\r\n', 'img/i2.jpg'),
(2, 'conceptions d\'affiches', 'les clients peuvent commander des affiches professionnelles\r\n', 'img/i1.png'),
(3, 'Conception de cartes de visite', 'les clients peuvent commander des cartes de visite professionnelles utilisant leur nouveau logo\r\n', 'img/i1.png'),
(4, 'Conception de flyers', 'les clients peuvent commander des flyers professionnels pour promouvoir leur entreprise utilisant leur nouveau logo\r\n', 'img/i1.png'),
(5, 'conceptions des publicités ', 'les clients peuvent commander des publicités pour les réseaux sociaux ou les médias en ligne utilisant leur nouveau logo\r\n', 'img/i1.png');

-- --------------------------------------------------------

--
-- Structure de la table `testmoniale`
--

CREATE TABLE `testmoniale` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `e_mail`, `password`, `numero_telephone`, `adresse`, `image`) VALUES
(1, 'test', 'test', 'test@test.com', 'test', '', '', '');

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
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Index pour la table `testmoniale`
--
ALTER TABLE `testmoniale`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `testmoniale`
--
ALTER TABLE `testmoniale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
