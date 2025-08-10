-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 août 2025 à 17:35
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
-- Base de données : `salonbeauty`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

CREATE TABLE `accueil` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `texte` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accueil`
--

INSERT INTO `accueil` (`id`, `titre`, `texte`, `image`, `section`, `actif`) VALUES
(1, 'eeeee', 'eeeeee', '6890752a9810d.jpg', 'a_propos', 1),
(2, 'eeeee', 'eeeeee', '68907cf474187.jpg', 'a_propos', 1),
(6, 'promo', 'soins', 'promo_6890afdf09154.jpg', 'promo', 1),
(7, 'promo 1', 'AFF', 'promo_6890b69b725bd.jpg', 'promo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`username`, `password_hash`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE `apropos` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `centres`
--

CREATE TABLE `centres` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `adresse` text DEFAULT NULL,
  `tel_contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `horaire` varchar(100) DEFAULT NULL,
  `parking` tinyint(1) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `note` decimal(3,1) DEFAULT NULL,
  `nb_avis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `centres`
--

INSERT INTO `centres` (`id`, `nom`, `ville`, `adresse`, `tel_contact`, `email`, `horaire`, `parking`, `services`, `note`, `nb_avis`) VALUES
(12, 'Centre Wahiba Sousse', 'Sousse', 'Hamem Sousse, Boulevard', '+216 52525004', '', '10h00 - 19h00', 1, 'Coiffure, Soins visage, Maquillage, Épilation, Soins Corps, Soins Cheveux', 4.9, 245),
(13, 'Centre Tunisie', 'Tunis', 'AOUINA', '+216 54 163 121', NULL, '10h00 - 19h00', 1, 'Coiffure, Soins visage, Maquillage, Épilation, Soins Corps, Soins Cheveux', 4.9, 245),
(14, 'Centre Mahdia', 'Mahdia', 'Av. Habib Bourgiba, Mahdia', '+216 56 551 166', NULL, '10h00 - 19h00', 1, 'Coiffure, Soins visage, Maquillage, Épilation, Soins Corps, Soins Cheveux', 4.7, 156),
(27, 'Centre Jammel', 'Jammel', 'Rue Ibn El Jazzar', '+216 22 756 296', NULL, '10h00 - 19h00', 1, 'Coiffure, Soins visage, Maquillage, Épilation, Soins Corps, Soins Cheveux', 4.8, 203),
(28, 'Centre Djerba', 'Djerba ', 'ROND-POINT CHIRAA HOUMT ESSOUK', '+216 53 492 492', NULL, '10h00 - 19h00', 1, 'Coiffure, Soins visage, Maquillage, Épilation, Soins Corps, Soins Cheveux', 4.9, 500);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `email`, `ville`, `tel`, `sujet`, `message`) VALUES
(16, 'amalaaaa', 'bzahlem22@gmail.com', 'Sousse', '+21627524993', 'BRCH', 'MSSMSM');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_envoi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `centre` varchar(50) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` time NOT NULL,
  `notes` text DEFAULT NULL,
  `statut_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `nom`, `tel`, `email`, `centre`, `date_rdv`, `heure_rdv`, `notes`, `statut_id`, `created_at`) VALUES
(1, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-15', '11:24:00', 'eeeeeeeeee', 1, '2025-08-06 09:23:53'),
(2, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-21', '14:09:00', 'hhhhhhhhhh', 1, '2025-08-06 09:43:41'),
(3, 'baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre DJERBA', '2025-08-14', '13:49:00', 'fffffff', 1, '2025-08-06 09:46:26'),
(4, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-14', '14:08:00', 'jjjjjjjjjjjjjj', 1, '2025-08-06 10:08:13'),
(5, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-21', '14:09:00', 'hkkkkkkkkkkkkkkkkkk', 1, '2025-08-06 10:30:20'),
(6, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre JAMMEL', '2025-08-14', '14:08:00', 'jjjjjjjjjjjjjj', 1, '2025-08-06 10:31:59'),
(7, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre JAMMEL', '2025-08-14', '14:08:00', 'jjjjjjjjjjjjjj', 1, '2025-08-06 10:32:19'),
(8, 'baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre MAHDIA', '2025-08-15', '13:49:00', 'hello', 1, '2025-08-06 10:35:48'),
(9, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-21', '13:47:00', 'bbbb', 1, '2025-08-06 10:47:36'),
(10, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-21', '14:09:00', 'hkkkkkkkkkkkkkkkkkk', 1, '2025-08-06 11:08:34'),
(11, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-21', '14:09:00', 'vbbbbbbbbbbbbbbbbbbbbvhjkjhggf', 1, '2025-08-06 11:09:17'),
(12, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-15', '15:06:00', 'nbn', 1, '2025-08-06 13:06:18'),
(13, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre MAHDIA', '2025-08-07', '15:40:00', 'jjjjjjjjjjjjj', 1, '2025-08-06 13:40:30'),
(14, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-14', '17:09:00', ',nnnnnnnnnnnnnnnnnnnnnnnnnn', 1, '2025-08-06 14:09:15'),
(15, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre MAHDIA', '2025-08-15', '15:52:00', 'sHCBQHCDBHQDCB', 1, '2025-08-10 12:52:57'),
(16, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre MAHDIA', '2025-08-15', '15:52:00', 'sHCBQHCDBHQDCB', 1, '2025-08-10 12:59:11'),
(17, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:05:10'),
(18, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:16:19'),
(19, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:19:32'),
(20, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:20:21'),
(21, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:22:13'),
(22, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:23:50'),
(23, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:28:38'),
(24, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:31:12'),
(25, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-13', '16:04:00', 'ccccccccccccccccccccc', 1, '2025-08-10 13:37:12'),
(26, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-16', '16:39:00', 'jhbbbhbhh', 1, '2025-08-10 13:38:06'),
(27, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre TUNISIE', '2025-08-16', '16:39:00', 'jhbbbhbhh', 1, '2025-08-10 13:38:46'),
(28, 'Ahlem Baazaoui', '+21627524993', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-21', '17:39:00', 'frrrrrrrrrrrrr', 1, '2025-08-10 13:39:24'),
(29, 'Baazaoui', '+21655172628', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-27', '17:42:00', 'cccccccccccx', 1, '2025-08-10 13:42:21'),
(30, 'Baazaoui', '+21655172628', 'bzahlem22@gmail.com', 'Centre SOUSSE', '2025-08-27', '17:42:00', 'cccccccccccx', 1, '2025-08-10 14:09:26');

-- --------------------------------------------------------

--
-- Structure de la table `rdv_services`
--

CREATE TABLE `rdv_services` (
  `rdv_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rdv_services`
--

INSERT INTO `rdv_services` (`rdv_id`, `service_id`) VALUES
(16, 12),
(16, 14);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `centre_id` int(11) NOT NULL,
  `nom_service` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `duree_estimee` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `centre_id`, `nom_service`, `description`, `prix`, `duree_estimee`) VALUES
(12, 14, 'Teinture simple court', 'Coiffure', 80.00, '1h à 4h'),
(13, 14, 'Teinture simple moyen', 'Coiffure', 120.00, '1h à 4h'),
(14, 14, 'Teinture simple long', 'Coiffure', 150.00, '1h à 4h'),
(15, 14, 'Ombré court (POSSIBILITÉ)', 'Coiffure', 150.00, '1h à 4h'),
(16, 14, 'Ombré moyen', 'Coiffure', 250.00, '1h à 4h'),
(17, 14, 'Ombré long', 'Coiffure', 350.00, '1h à 4h'),
(18, 14, 'Balayage court', 'Coiffure', 120.00, '1h à 4h'),
(19, 14, 'Balayage moyen', 'Coiffure', 150.00, '1h à 4h'),
(20, 14, 'Balayage long', 'Coiffure', 223.00, '1h à 4h'),
(21, 14, 'Shampoing normal', 'Coiffure', 3.00, '1h à 4h'),
(22, 14, 'Shampoing spécial', 'Coiffure', 5.00, '1h à 4h'),
(23, 14, 'Brushing court', 'Coiffure', 8.00, '1h à 4h'),
(24, 14, 'Brushing moyen', 'Coiffure', 15.00, '1h à 4h'),
(25, 14, 'Brushing long', 'Coiffure', 20.00, '1h à 4h'),
(26, 14, 'Babyliss court', 'Coiffure', 20.00, '1h à 4h'),
(27, 14, 'Babyliss moyen', 'Coiffure', 25.00, '1h à 4h'),
(28, 14, 'Babyliss long', 'Coiffure', 30.00, '1h à 4h'),
(29, 14, 'Wavy court', 'Coiffure', 30.00, '1h à 4h'),
(30, 14, 'Wavy moyen', 'Coiffure', 35.00, '1h à 4h'),
(31, 14, 'Wavy long', 'Coiffure', 45.00, '1h à 4h'),
(32, 14, 'Coupe simple', 'Coiffure', 25.00, '1h à 4h'),
(33, 14, 'Keratine par dose', 'Coiffure', 150.00, '1h à 4h'),
(34, 14, 'Protéine par dose', 'Coiffure', 250.00, '1h à 4h'),
(35, 14, 'Soins cheveux', 'Coiffure', 80.00, '1h à 4h'),
(36, 14, 'Soins cheveux L’Oréal', 'Coiffure', 120.00, '1h à 4h'),
(37, 14, 'Chignon simple', 'Coiffure', 30.00, '1h à 4h'),
(38, 14, 'Chignon chargé', 'Coiffure', 40.00, '1h à 4h'),
(39, 14, 'Foulard simple', 'Coiffure', 20.00, '1h à 4h'),
(40, 14, 'Foulard chargé', 'Coiffure', 30.00, '1h à 4h'),
(41, 14, 'Foulard très chargé', 'Coiffure', 40.00, '1h à 4h'),
(42, 14, 'Microblading', 'Coiffure', 250.00, '1h à 4h'),
(43, 14, 'Maquillage soirée simple', 'Makeup', 100.00, '30 min à 2h'),
(44, 14, 'Maquillage soirée chargé', 'Makeup', 150.00, '30 min à 2h'),
(45, 14, 'Maquillage de jour', 'Makeup', 50.00, '30 min à 2h'),
(46, 14, 'Maquillage enfant', 'Makeup', 10.00, '30 min à 2h'),
(47, 14, 'Maquillage fiançailles simple', 'Makeup', 250.00, '30 min à 2h'),
(48, 14, 'Maquillage fiançailles chargé', 'Makeup', 350.00, '30 min à 2h'),
(49, 14, 'Maquillage fiançailles très chargé', 'Makeup', 450.00, '30 min à 2h'),
(50, 14, 'Maquillage wtiya simple', 'Makeup', 350.00, '30 min à 2h'),
(51, 14, 'Maquillage wtiya chargé', 'Makeup', 500.00, '30 min à 2h'),
(52, 14, 'Massage relaxant', 'Soins Corps', 80.00, '45 min - 1h30'),
(53, 14, 'Massage régulateur de charge', 'Soins Corps', 500.00, '45 min - 1h30'),
(54, 14, 'épilation cire visage + masque', 'Épilation', 25.00, '1h- 1h30'),
(55, 14, 'épilation contour visage', 'Épilation', 15.00, '1h- 1h30'),
(56, 14, 'épilation cire chaude visage', 'Épilation', 20.00, '1h- 1h30'),
(57, 14, 'épilation sucre visage', 'Épilation', 25.00, '1h- 1h30'),
(58, 14, 'épilation fil visage', 'Épilation', 30.00, '1h- 1h30'),
(59, 14, 'épilation corps sucre orientale', 'Épilation', 100.00, '1h- 1h30'),
(60, 14, 'épilation corps cire', 'Épilation', 150.00, '1h- 1h30'),
(61, 14, 'Aisselles', 'Épilation', 15.00, '1h- 1h30'),
(62, 14, 'Bras complète (Sucre)', 'Épilation', 25.00, '1h- 1h30'),
(63, 14, 'Jambes complètes (Sucre)', 'Épilation', 30.00, '1h- 1h30'),
(64, 14, 'Bras complete (cire)', 'Épilation', 30.00, '1h- 1h30'),
(65, 14, 'Demi-jambes (cire)', 'Épilation', 30.00, '1h- 1h30'),
(66, 14, 'Jambes complètes (Cire)', 'Épilation', 40.00, '1h- 1h30'),
(67, 14, 'Faux ongles', 'Manucure', 35.00, '1h - 2h'),
(68, 14, 'Gel naturel', 'Manucure', 50.00, '1h - 2h'),
(69, 14, 'Gel sur capsule', 'Manucure', 70.00, '1h - 2h'),
(70, 14, 'Gel baby boomer', 'Manucure', 85.00, '1h - 2h'),
(71, 14, 'Pose vernis normal', 'Manucure', 10.00, '1h - 2h'),
(72, 14, 'Vernis permanent', 'Manucure', 35.00, '1h - 2h'),
(73, 14, 'Soin des mains', 'Manucure', 35.00, '1h - 2h'),
(74, 14, 'Soin des pieds', 'Manucure', 35.00, '1h - 2h'),
(75, 13, 'Teinture simple court', 'Coiffure', 80.00, '1h à 4h'),
(76, 13, 'Teinture simple moyen', 'Coiffure', 100.00, '1h à 4h'),
(77, 13, 'Teinture simple long', 'Coiffure', 120.00, '1h à 4h'),
(78, 13, 'Ombré court (POSSIBILITÉ)', 'Coiffure', 250.00, '1h à 4h'),
(79, 13, 'Ombré moyen', 'Coiffure', 300.00, '1h à 4h'),
(80, 13, 'Ombré long', 'Coiffure', 400.00, '1h à 4h'),
(81, 13, 'Balayage court', 'Coiffure', 150.00, '1h à 4h'),
(82, 13, 'Balayage moyen', 'Coiffure', 200.00, '1h à 4h'),
(83, 13, 'Balayage long', 'Coiffure', 250.00, '1h à 4h'),
(84, 13, 'Shampoing normal', 'Coiffure', 5.00, '1h à 4h'),
(85, 13, 'Shampoing spécial', 'Coiffure', 15.00, '1h à 4h'),
(86, 13, 'Brushing court', 'Coiffure', 10.00, '1h à 4h'),
(87, 13, 'Brushing moyen', 'Coiffure', 18.00, '1h à 4h'),
(88, 13, 'Brushing long', 'Coiffure', 20.00, '1h à 4h'),
(89, 13, 'Babyliss court', 'Coiffure', 20.00, '1h à 4h'),
(90, 13, 'Babyliss moyen', 'Coiffure', 25.00, '1h à 4h'),
(91, 13, 'Babyliss long', 'Coiffure', 30.00, '1h à 4h'),
(92, 13, 'Wavy court', 'Coiffure', 30.00, '1h à 4h'),
(93, 13, 'Wavy moyen', 'Coiffure', 40.00, '1h à 4h'),
(94, 13, 'Wavy long', 'Coiffure', 60.00, '1h à 4h'),
(95, 13, 'Coupe simple', 'Coiffure', 40.00, '1h à 4h'),
(96, 13, 'Coupe nuque', 'Coiffure', 10.00, '1h à 4h'),
(97, 13, 'Coupe spécifique', 'Coiffure', 45.00, '1h à 4h'),
(98, 13, 'Keratine par dose', 'Coiffure', 150.00, '1h à 4h'),
(99, 13, 'Protéine par dose', 'Coiffure', 250.00, '1h à 4h'),
(100, 13, 'Soins cheveux', 'Coiffure', 80.00, '1h à 4h'),
(101, 13, 'Soins cheveux L’Oréal', 'Coiffure', 140.00, '1h à 4h'),
(102, 13, 'Chignon simple', 'Coiffure', 50.00, '1h à 4h'),
(103, 13, 'Chignon chargé', 'Coiffure', 100.00, '1h à 4h'),
(104, 13, 'Foulard simple', 'Coiffure', 30.00, '1h à 4h'),
(105, 13, 'Foulard chargé', 'Coiffure', 40.00, '1h à 4h'),
(106, 13, 'Foulard très chargé', 'Coiffure', 60.00, '1h à 4h'),
(107, 13, 'Microblading', 'Coiffure', 250.00, '1h à 4h'),
(108, 13, 'Nettoyage visage simple', 'Soins Visage', 40.00, '1h min à 1h30'),
(109, 13, 'coup déclat', 'Soins Visage', 70.00, '1h min à 1h30'),
(110, 13, 'Soin hydrafacial', 'Soins Visage', 60.00, '1h min à 1h30'),
(111, 13, 'Masque purifiant', 'Soins Visage', 35.00, '1h min à 1h30'),
(112, 13, 'Masque éclat', 'Soins Visage', 45.00, '1h min à 1h30'),
(113, 13, 'Massage visage', 'Soins Visage', 30.00, '1h min à 1h30'),
(114, 13, 'hydratant', 'Soins Visage', 100.00, '1h min à 1h30'),
(115, 13, 'Maquillage soirée simple', 'Makeup', 100.00, '30 min à 2h'),
(116, 13, 'Maquillage soirée chargé', 'Makeup', 150.00, '30 min à 2h'),
(117, 13, 'Maquillage de jour', 'Makeup', 80.00, '30 min à 2h'),
(118, 13, 'Maquillage enfant', 'Makeup', 10.00, '30 min à 2h'),
(119, 13, 'Maquillage fiançailles simple', 'Makeup', 250.00, '30 min à 2h'),
(120, 13, 'Maquillage fiançailles chargé', 'Makeup', 350.00, '30 min à 2h'),
(121, 13, 'Maquillage fiançailles très chargé', 'Makeup', 450.00, '30 min à 2h'),
(122, 13, 'Maquillage wtiya simple', 'Makeup', 450.00, '30 min à 2h'),
(123, 13, 'Maquillage wtiya chargé', 'Makeup', 700.00, '30 min à 2h'),
(124, 13, 'Faux ongles', 'Manucure', 50.00, '1h - 2h'),
(125, 13, 'Gel naturel', 'Manucure', 50.00, '1h - 2h'),
(126, 13, 'Gel sur capsule', 'Manucure', 70.00, '1h - 2h'),
(127, 13, 'Gel baby boomer', 'Manucure', 90.00, '1h - 2h'),
(128, 13, 'Pose vernis normal', 'Manucure', 10.00, '1h - 2h'),
(129, 13, 'Vernis permanent', 'Manucure', 35.00, '1h - 2h'),
(130, 13, 'Soin des mains', 'Manucure', 25.00, '1h - 2h'),
(131, 13, 'Soin des pieds', 'Manucure', 35.00, '1h - 2h'),
(132, 13, 'Remplissage 2 semaines', 'Manucure', 50.00, '1h - 2h'),
(133, 13, 'épilation cire visage + masque', 'Épilation', 35.00, '1h- 1h30'),
(134, 13, 'épilation contour visage', 'Épilation', 20.00, '1h- 1h30'),
(135, 13, 'épilation cire chaude visage', 'Épilation', 40.00, '1h- 1h30'),
(136, 13, 'épilation sucre visage', 'Épilation', 25.00, '1h- 1h30'),
(137, 13, 'épilation fil visage', 'Épilation', 25.00, '1h- 1h30'),
(138, 13, 'épilation corps sucre orientale', 'Épilation', 150.00, '1h- 1h30'),
(139, 13, 'épilation corps cire', 'Épilation', 180.00, '1h- 1h30'),
(140, 13, 'Aisselles', 'Épilation', 15.00, '1h- 1h30'),
(141, 13, 'Avant bras (Sucre)', 'Épilation', 15.00, '1h- 1h30'),
(142, 13, 'Bras complète (Sucre)', 'Épilation', 30.00, '1h- 1h30'),
(143, 13, 'Jambes complètes (Sucre)', 'Épilation', 25.00, '1h- 1h30'),
(144, 13, 'Avant bras (cire)', 'Épilation', 20.00, '1h- 1h30'),
(145, 13, 'Bras complete (cire)', 'Épilation', 32.00, '1h- 1h30'),
(146, 13, 'Demi-jambes (cire)', 'Épilation', 20.00, '1h- 1h30'),
(147, 13, 'Jambes complètes (Cire)', 'Épilation', 30.00, '1h- 1h30'),
(148, 13, 'Gommage corps', 'Soins Corps', 40.00, '45 min - 1h30'),
(149, 13, 'Enveloppement algues ou argile', 'Soins Corps', 40.00, '45 min - 1h30'),
(150, 13, 'Massage relaxant', 'Soins Corps', 100.00, '45 min - 1h30'),
(151, 13, 'Massage énergétique', 'Soins Corps', 120.00, '45 min - 1h30'),
(152, 13, 'Massage régulateur de charge', 'Soins Corps', 120.00, '45 min - 1h30'),
(213, 12, 'Teinture simple court', 'Coiffure', 80.00, '1h à 4h'),
(214, 12, 'Teinture simple moyen', 'Coiffure', 100.00, '1h à 4h'),
(215, 12, 'Teinture simple long', 'Coiffure', 120.00, '1h à 4h'),
(216, 12, 'Ombré court (POSSIBILITÉ)', 'Coiffure', 220.00, '1h à 4h'),
(217, 12, 'Ombré moyen', 'Coiffure', 300.00, '1h à 4h'),
(218, 12, 'Ombré long', 'Coiffure', 450.00, '1h à 4h'),
(219, 12, 'Balayage court', 'Coiffure', 150.00, '1h à 4h'),
(220, 12, 'Balayage moyen', 'Coiffure', 180.00, '1h à 4h'),
(221, 12, 'Balayage long', 'Coiffure', 200.00, '1h à 4h'),
(222, 12, 'Shampoing normal', 'Coiffure', 3.00, '1h à 4h'),
(223, 12, 'Shampoing spécial', 'Coiffure', 5.00, '1h à 4h'),
(224, 12, 'Brushing court', 'Coiffure', 10.00, '1h à 4h'),
(225, 12, 'Brushing moyen', 'Coiffure', 15.00, '1h à 4h'),
(226, 12, 'Brushing long', 'Coiffure', 20.00, '1h à 4h'),
(227, 12, 'Babyliss court', 'Coiffure', 20.00, '1h à 4h'),
(228, 12, 'Babyliss moyen', 'Coiffure', 25.00, '1h à 4h'),
(229, 12, 'Babyliss long', 'Coiffure', 30.00, '1h à 4h'),
(230, 12, 'Wavy court', 'Coiffure', 40.00, '1h à 4h'),
(231, 12, 'Wavy moyen', 'Coiffure', 50.00, '1h à 4h'),
(232, 12, 'Wavy long', 'Coiffure', 70.00, '1h à 4h'),
(233, 12, 'Coupe nuque', 'Coiffure', 10.00, '1h à 4h'),
(234, 12, 'Coupe spécifique', 'Coiffure', 50.00, '1h à 4h'),
(235, 12, 'Protéine par dose', 'Coiffure', 250.00, '1h à 4h'),
(236, 12, 'Soins cheveux', 'Coiffure', 80.00, '1h à 4h'),
(237, 12, 'Soins cheveux L’Oréal', 'Coiffure', 120.00, '1h à 4h'),
(238, 12, 'Chignon simple', 'Coiffure', 50.00, '1h à 4h'),
(239, 12, 'Chignon chargé', 'Coiffure', 100.00, '1h à 4h'),
(240, 12, 'Foulard simple', 'Coiffure', 30.00, '1h à 4h'),
(241, 12, 'Foulard chargé', 'Coiffure', 50.00, '1h à 4h'),
(242, 12, 'Microblading', 'Coiffure', 300.00, '1h à 4h'),
(243, 12, 'Nettoyage visage simple', 'Soins Visage', 40.00, '1h min à 1h30'),
(244, 12, 'coup déclat', 'Soins Visage', 70.00, '1h min à 1h30'),
(245, 12, 'Soin hydrafacial', 'Soins Visage', 60.00, '1h min à 1h30'),
(246, 12, 'Soin anti-âge', 'Soins Visage', NULL, '1h min à 1h30'),
(247, 12, 'Masque purifiant', 'Soins Visage', 35.00, '1h min à 1h30'),
(248, 12, 'Masque éclat', 'Soins Visage', 45.00, '1h min à 1h30'),
(249, 12, 'hydratant', 'Soins Visage', 100.00, '1h min à 1h30'),
(250, 12, 'Maquillage soirée simple', 'Makeup', 100.00, '30 min à 2h'),
(251, 12, 'Maquillage soirée chargé', 'Makeup', 150.00, '30 min à 2h'),
(252, 12, 'Maquillage de jour', 'Makeup', 50.00, '30 min à 2h'),
(253, 12, 'Maquillage enfant', 'Makeup', 10.00, '30 min à 2h'),
(254, 12, 'Maquillage fiançailles simple', 'Makeup', 250.00, '30 min à 2h'),
(255, 12, 'Maquillage fiançailles chargé', 'Makeup', 350.00, '30 min à 2h'),
(256, 12, 'Maquillage fiançailles très chargé', 'Makeup', 450.00, '30 min à 2h'),
(257, 12, 'Maquillage wtiya simple', 'Makeup', 350.00, '30 min à 2h'),
(258, 12, 'Maquillage wtiya chargé', 'Makeup', 500.00, '30 min à 2h'),
(259, 12, 'Faux ongles', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(260, 12, 'Gel naturel', 'Soins complets pour vos ongles', 50.00, '1h - 2h'),
(261, 12, 'Gel sur capsule', 'Soins complets pour vos ongles', 70.00, '1h - 2h'),
(262, 12, 'Gel baby boomer', 'Soins complets pour vos ongles', 85.00, '1h - 2h'),
(263, 12, 'Pose vernis normal', 'Soins complets pour vos ongles', 10.00, '1h - 2h'),
(264, 12, 'Vernis permanent', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(265, 12, 'Soin des mains', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(266, 12, 'Soin des pieds', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(267, 12, 'Remplissage 2 semaines', 'Soins complets pour vos ongles', 50.00, '1h - 2h'),
(268, 12, 'épilation cire visage + masque', 'Épilation douce et professionnelle', 25.00, '1h - 1h30'),
(269, 12, 'épilation contour visage', 'Épilation douce et professionnelle', 15.00, '1h - 1h30'),
(270, 12, 'épilation cire chaude visage', 'Épilation douce et professionnelle', 20.00, '1h - 1h30'),
(271, 12, 'épilation sucre visage', 'Épilation douce et professionnelle', 25.00, '1h - 1h30'),
(272, 12, 'épilation fil visage', 'Épilation douce et professionnelle', 30.00, '1h - 1h30'),
(273, 12, 'épilation corps sucre orientale', 'Épilation douce et professionnelle', 100.00, '1h - 1h30'),
(274, 12, 'épilation corps cire', 'Épilation douce et professionnelle', 150.00, '1h - 1h30'),
(275, 12, 'Aisselles', 'Épilation douce et professionnelle', 15.00, '1h - 1h30'),
(276, 12, 'Avant bras (Sucre)', 'Épilation douce et professionnelle', NULL, '1h - 1h30'),
(277, 12, 'Bras complète (Sucre)', 'Épilation douce et professionnelle', 25.00, '1h - 1h30'),
(278, 12, 'Jambes complètes (Sucre)', 'Épilation douce et professionnelle', 30.00, '1h - 1h30'),
(279, 12, 'Avant bras (cire)', 'Épilation douce et professionnelle', NULL, '1h - 1h30'),
(280, 12, 'Bras complete (cire)', 'Épilation douce et professionnelle', 30.00, '1h - 1h30'),
(281, 12, 'Demi-jambes (cire)', 'Épilation douce et professionnelle', 30.00, '1h - 1h30'),
(282, 12, 'Jambes complètes (Cire)', 'Épilation douce et professionnelle', 40.00, '1h - 1h30'),
(283, 12, 'Gommage corps', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(284, 12, 'Enveloppement algues ou argile', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(285, 12, 'Massage relaxant', 'Détente et bien-être pour votre corps', 80.00, '45 min - 1h30'),
(286, 12, 'Massage énergétique', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(287, 12, 'Massage régulateur de charge', 'Détente et bien-être pour votre corps', 500.00, '45 min - 1h30'),
(288, 27, 'Teinture simple court', 'Coiffure', 50.00, '1h à 4h'),
(289, 27, 'Teinture simple moyen', 'Coiffure', 70.00, '1h à 4h'),
(290, 27, 'Teinture simple long', 'Coiffure', 80.00, '1h à 4h'),
(291, 27, 'Ombré court (POSSIBILITÉ)', 'Coiffure', 150.00, '1h à 4h'),
(292, 27, 'Ombré moyen', 'Coiffure', 180.00, '1h à 4h'),
(293, 27, 'Ombré long', 'Coiffure', 200.00, '1h à 4h'),
(294, 27, 'Balayage court', 'Coiffure', 30.00, '1h à 4h'),
(295, 27, 'Balayage moyen', 'Coiffure', 150.00, '1h à 4h'),
(296, 27, 'Balayage long', 'Coiffure', 70.00, '1h à 4h'),
(297, 27, 'Shampoing normal', 'Coiffure', 3.00, '1h à 4h'),
(298, 27, 'Shampoing spécial', 'Coiffure', 5.00, '1h à 4h'),
(299, 27, 'Brushing court', 'Coiffure', 5.00, '1h à 4h'),
(300, 27, 'Brushing moyen', 'Coiffure', 8.00, '1h à 4h'),
(301, 27, 'Brushing long', 'Coiffure', 15.00, '1h à 4h'),
(302, 27, 'Babyliss court', 'Coiffure', 20.00, '1h à 4h'),
(303, 27, 'Babyliss moyen', 'Coiffure', 25.00, '1h à 4h'),
(304, 27, 'Babyliss long', 'Coiffure', 30.00, '1h à 4h'),
(305, 27, 'Wavy court', 'Coiffure', 20.00, '1h à 4h'),
(306, 27, 'Wavy moyen', 'Coiffure', 25.00, '1h à 4h'),
(307, 27, 'Wavy long', 'Coiffure', 30.00, '1h à 4h'),
(308, 27, 'Coupe simple', 'Coiffure', 15.00, '1h à 4h'),
(309, 27, 'Coupe nuque', 'Coiffure', NULL, '1h à 4h'),
(310, 27, 'Coupe spécifique', 'Coiffure', NULL, '1h à 4h'),
(311, 27, 'Keratine par dose', 'Coiffure', 150.00, '1h à 4h'),
(312, 27, 'Protéine par dose', 'Coiffure', 250.00, '1h à 4h'),
(313, 27, 'Soins cheveux', 'Coiffure', 80.00, '1h à 4h'),
(314, 27, 'Soins cheveux L’Oréal', 'Coiffure', 120.00, '1h à 4h'),
(315, 27, 'Chignon simple', 'Coiffure', 30.00, '1h à 4h'),
(316, 27, 'Chignon chargé', 'Coiffure', 40.00, '1h à 4h'),
(317, 27, 'Foulard simple', 'Coiffure', 20.00, '1h à 4h'),
(318, 27, 'Foulard chargé', 'Coiffure', 30.00, '1h à 4h'),
(319, 27, 'Foulard très chargé', 'Coiffure', 40.00, '1h à 4h'),
(320, 27, 'Microblading', 'Coiffure', 250.00, '1h à 4h'),
(321, 27, 'Cil à cil en soie', 'Coiffure', 120.00, '1h à 4h'),
(322, 27, 'Nettoyage visage simple', 'Soins Visage', 40.00, '1h min à 1h30'),
(323, 27, 'coup déclat', 'Soins Visage', 70.00, '1h min à 1h30'),
(324, 27, 'Soin hydrafacial', 'Soins Visage', 60.00, '1h min à 1h30'),
(325, 27, 'Soin anti-âge', 'Soins Visage', NULL, '1h min à 1h30'),
(326, 27, 'Masque purifiant', 'Soins Visage', 35.00, '1h min à 1h30'),
(327, 27, 'Masque éclat', 'Soins Visage', 45.00, '1h min à 1h30'),
(328, 27, 'Massage visage', 'Soins Visage', 30.00, '1h min à 1h30'),
(329, 27, 'hydratant', 'Soins Visage', 100.00, '1h min à 1h30'),
(330, 27, 'Maquillage soirée simple', 'Makeup', 100.00, '30 min à 2h'),
(331, 27, 'Maquillage soirée chargé', 'Makeup', 150.00, '30 min à 2h'),
(332, 27, 'Maquillage de jour', 'Makeup', 50.00, '30 min à 2h'),
(333, 27, 'Maquillage enfant', 'Makeup', 10.00, '30 min à 2h'),
(334, 27, 'Maquillage fiançailles simple', 'Makeup', 250.00, '30 min à 2h'),
(335, 27, 'Maquillage fiançailles chargé', 'Makeup', 350.00, '30 min à 2h'),
(336, 27, 'Maquillage fiançailles très chargé', 'Makeup', 450.00, '30 min à 2h'),
(337, 27, 'Maquillage wtiya simple', 'Makeup', 350.00, '30 min à 2h'),
(338, 27, 'Maquillage wtiya chargé', 'Makeup', 500.00, '30 min à 2h'),
(339, 27, 'Faux ongles', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(340, 27, 'Gel naturel', 'Soins complets pour vos ongles', 50.00, '1h - 2h'),
(341, 27, 'Gel sur capsule', 'Soins complets pour vos ongles', 70.00, '1h - 2h'),
(342, 27, 'Gel baby boomer', 'Soins complets pour vos ongles', 85.00, '1h - 2h'),
(343, 27, 'Pose vernis normal', 'Soins complets pour vos ongles', 10.00, '1h - 2h'),
(344, 27, 'Vernis permanent', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(345, 27, 'Soin des mains', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(346, 27, 'Soin des pieds', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(347, 27, 'Remplissage 2 semaines', 'Soins complets pour vos ongles', 50.00, '1h - 2h'),
(348, 27, 'épilation cire visage + masque', 'Épilation douce et professionnelle', 25.00, '1h- 1h30 min'),
(349, 27, 'épilation contour visage', 'Épilation douce et professionnelle', 15.00, '1h- 1h30 min'),
(350, 27, 'épilation cire chaude visage', 'Épilation douce et professionnelle', 20.00, '1h- 1h30 min'),
(351, 27, 'épilation sucre visage', 'Épilation douce et professionnelle', 25.00, '1h- 1h30 min'),
(352, 27, 'épilation fil visage', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(353, 27, 'épilation corps sucre orientale', 'Épilation douce et professionnelle', 100.00, '1h- 1h30 min'),
(354, 27, 'épilation corps cire', 'Épilation douce et professionnelle', 150.00, '1h- 1h30 min'),
(355, 27, 'Aisselles', 'Épilation douce et professionnelle', 15.00, '1h- 1h30 min'),
(356, 27, 'Avant bras (Sucre)', 'Épilation douce et professionnelle', NULL, '1h- 1h30 min'),
(357, 27, 'Bras complète (Sucre)', 'Épilation douce et professionnelle', 25.00, '1h- 1h30 min'),
(358, 27, 'Jambes complètes (Sucre)', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(359, 27, 'Avant bras (cire)', 'Épilation douce et professionnelle', NULL, '1h- 1h30 min'),
(360, 27, 'Bras complete (cire)', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(361, 27, 'Demi-jambes (cire)', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(362, 27, 'Jambes complètes (Cire)', 'Épilation douce et professionnelle', 40.00, '1h- 1h30 min'),
(363, 27, 'Gommage corps', 'Détente et bien-être pour votre corps', 5.00, '45 min - 1h30'),
(364, 27, 'Enveloppement algues ou argile', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(365, 27, 'Massage relaxant', 'Détente et bien-être pour votre corps', 60.00, '45 min - 1h30'),
(366, 27, 'Massage énergétique', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(367, 27, 'Massage réglEteur de chargin', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(368, 28, 'Teinture simple court', 'Coiffure', 70.00, '1h à 4h'),
(369, 28, 'Teinture simple moyen', 'Coiffure', 90.00, '1h à 4h'),
(370, 28, 'Teinture simple long', 'Coiffure', 120.00, '1h à 4h'),
(371, 28, 'Ombré court (POSSIBILITÉ)', 'Coiffure', 180.00, '1h à 4h'),
(372, 28, 'Ombré moyen', 'Coiffure', 250.00, '1h à 4h'),
(373, 28, 'Ombré long', 'Coiffure', 450.00, '1h à 4h'),
(374, 28, 'Balayage court', 'Coiffure', 80.00, '1h à 4h'),
(375, 28, 'Balayage moyen', 'Coiffure', 100.00, '1h à 4h'),
(376, 28, 'Balayage long', 'Coiffure', 150.00, '1h à 4h'),
(377, 28, 'Shampoing normal', 'Coiffure', 3.00, '1h à 4h'),
(378, 28, 'Shampoing spécial', 'Coiffure', 5.00, '1h à 4h'),
(379, 28, 'Brushing court', 'Coiffure', 10.00, '1h à 4h'),
(380, 28, 'Brushing moyen', 'Coiffure', 15.00, '1h à 4h'),
(381, 28, 'Brushing long', 'Coiffure', 20.00, '1h à 4h'),
(382, 28, 'Babyliss court', 'Coiffure', 20.00, '1h à 4h'),
(383, 28, 'Babyliss moyen', 'Coiffure', 25.00, '1h à 4h'),
(384, 28, 'Babyliss long', 'Coiffure', 30.00, '1h à 4h'),
(385, 28, 'Wavy court', 'Coiffure', 30.00, '1h à 4h'),
(386, 28, 'Wavy moyen', 'Coiffure', 40.00, '1h à 4h'),
(387, 28, 'Wavy long', 'Coiffure', 50.00, '1h à 4h'),
(388, 28, 'Coupe simple', 'Coiffure', 25.00, '1h à 4h'),
(389, 28, 'Coupe nuque', 'Coiffure', 5.00, '1h à 4h'),
(390, 28, 'Coupe spécifique', 'Coiffure', 40.00, '1h à 4h'),
(391, 28, 'Keratine par dose', 'Coiffure', 150.00, '1h à 4h'),
(392, 28, 'Protéine par dose', 'Coiffure', 250.00, '1h à 4h'),
(393, 28, 'Soins cheveux', 'Coiffure', 70.00, '1h à 4h'),
(394, 28, 'Soins cheveux L’Oréal', 'Coiffure', 120.00, '1h à 4h'),
(395, 28, 'Chignon simple', 'Coiffure', 30.00, '1h à 4h'),
(396, 28, 'Chignon chargé', 'Coiffure', 40.00, '1h à 4h'),
(397, 28, 'Foulard simple', 'Coiffure', 20.00, '1h à 4h'),
(398, 28, 'Foulard chargé', 'Coiffure', 30.00, '1h à 4h'),
(399, 28, 'Foulard très chargé', 'Coiffure', 40.00, '1h à 4h'),
(400, 28, 'Microblading', 'Coiffure', 250.00, '1h à 4h'),
(401, 28, 'Nettoyage visage simple', 'Soins Visage', 40.00, '1h min à 1h30'),
(402, 28, 'coup déclat', 'Soins Visage', 70.00, '1h min à 1h30'),
(403, 28, 'Soin hydrafacial', 'Soins Visage', 60.00, '1h min à 1h30'),
(404, 28, 'Soin anti-âge', 'Soins Visage', NULL, '1h min à 1h30'),
(405, 28, 'Masque purifiant', 'Soins Visage', 35.00, '1h min à 1h30'),
(406, 28, 'Masque éclat', 'Soins Visage', 45.00, '1h min à 1h30'),
(407, 28, 'Massage visage', 'Soins Visage', 30.00, '1h min à 1h30'),
(408, 28, 'hydratant', 'Soins Visage', 100.00, '1h min à 1h30'),
(409, 28, 'Maquillage soirée simple', 'Makeup', 100.00, '30 min à 2h'),
(410, 28, 'Maquillage soirée chargé', 'Makeup', 150.00, '30 min à 2h'),
(411, 28, 'Maquillage de jour', 'Makeup', 50.00, '30 min à 2h'),
(412, 28, 'Maquillage enfant', 'Makeup', 10.00, '30 min à 2h'),
(413, 28, 'Maquillage fiançailles simple', 'Makeup', 250.00, '30 min à 2h'),
(414, 28, 'Maquillage fiançailles chargé', 'Makeup', 350.00, '30 min à 2h'),
(415, 28, 'Maquillage fiançailles très chargé', 'Makeup', 450.00, '30 min à 2h'),
(416, 28, 'Maquillage wtiya simple', 'Makeup', 350.00, '30 min à 2h'),
(417, 28, 'Maquillage wtiya chargé', 'Makeup', 500.00, '30 min à 2h'),
(418, 28, 'Faux ongles', 'Soins complets pour vos ongles', 15.00, '1h - 2h'),
(419, 28, 'Gel naturel', 'Soins complets pour vos ongles', 40.00, '1h - 2h'),
(420, 28, 'Gel sur capsule', 'Soins complets pour vos ongles', 50.00, '1h - 2h'),
(421, 28, 'Gel baby boomer', 'Soins complets pour vos ongles', 70.00, '1h - 2h'),
(422, 28, 'Pose vernis normal', 'Soins complets pour vos ongles', 5.00, '1h - 2h'),
(423, 28, 'Vernis permanent', 'Soins complets pour vos ongles', 35.00, '1h - 2h'),
(424, 28, 'Soin des mains', 'Soins complets pour vos ongles', 25.00, '1h - 2h'),
(425, 28, 'Soin des pieds', 'Soins complets pour vos ongles', 25.00, '1h - 2h'),
(426, 28, 'Remplissage 2 semaines', 'Soins complets pour vos ongles', NULL, '1h - 2h'),
(427, 28, 'épilation cire visage + masque', 'Épilation douce et professionnelle', 20.00, '1h- 1h30 min'),
(428, 28, 'épilation contour visage', 'Épilation douce et professionnelle', NULL, '1h- 1h30 min'),
(429, 28, 'épilation cire chaude visage', 'Épilation douce et professionnelle', NULL, '1h- 1h30 min'),
(430, 28, 'épilation sucre visage', 'Épilation douce et professionnelle', 20.00, '1h- 1h30 min'),
(431, 28, 'épilation fil visage', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(432, 28, 'épilation corps sucre orientale', 'Épilation douce et professionnelle', 120.00, '1h- 1h30 min'),
(433, 28, 'épilation corps cire', 'Épilation douce et professionnelle', 150.00, '1h- 1h30 min'),
(434, 28, 'Aisselles', 'Épilation douce et professionnelle', 15.00, '1h- 1h30 min'),
(435, 28, 'Avant bras (Sucre)', 'Épilation douce et professionnelle', 10.00, '1h- 1h30 min'),
(436, 28, 'Bras complète (Sucre)', 'Épilation douce et professionnelle', 15.00, '1h- 1h30 min'),
(437, 28, 'Jambes complètes (Sucre)', 'Épilation douce et professionnelle', 20.00, '1h- 1h30 min'),
(438, 28, 'Avant bras (cire)', 'Épilation douce et professionnelle', 15.00, '1h- 1h30 min'),
(439, 28, 'Bras complete (cire)', 'Épilation douce et professionnelle', 25.00, '1h- 1h30 min'),
(440, 28, 'Demi-jambes (cire)', 'Épilation douce et professionnelle', 20.00, '1h- 1h30 min'),
(441, 28, 'Jambes complètes (Cire)', 'Épilation douce et professionnelle', 30.00, '1h- 1h30 min'),
(442, 28, 'Gommage corps', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(443, 28, 'Enveloppement algues ou argile', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(444, 28, 'Massage relaxant', 'Détente et bien-être pour votre corps', 80.00, '45 min - 1h30'),
(445, 28, 'Massage énergétique', 'Détente et bien-être pour votre corps', NULL, '45 min - 1h30'),
(446, 28, 'Massage régulateur de charge', 'Détente et bien-être pour votre corps', 500.00, '45 min - 1h30'),
(447, 28, 'Modelage aux huiles essentielles', 'Détente et bien-être pour votre corps', 400.00, '45 min - 1h30'),
(448, 28, 'Massage aux pierres chaudes', 'Détente et bien-être pour votre corps', 550.00, '45 min - 1h30'),
(449, 28, 'Drainage lymphatique', 'Détente et bien-être pour votre corps', 600.00, '45 min - 1h30'),
(450, 28, 'Soin anti-cellulite', 'Détente et bien-être pour votre corps', 480.00, '45 min - 1h30'),
(451, 28, 'Soin raffermissant', 'Détente et bien-être pour votre corps', 500.00, '45 min - 1h30'),
(452, 28, 'Massage sportif', 'Détente et bien-être pour votre corps', 420.00, '45 min - 1h30');

-- --------------------------------------------------------

--
-- Structure de la table `statuts_rdv`
--

CREATE TABLE `statuts_rdv` (
  `id` int(11) NOT NULL,
  `statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statuts_rdv`
--

INSERT INTO `statuts_rdv` (`id`, `statut`) VALUES
(1, 'En attente'),
(2, 'Confirmé'),
(3, 'Annulé'),
(4, 'En attente'),
(5, 'Confirmé'),
(6, 'Annulé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accueil`
--
ALTER TABLE `accueil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statut_id` (`statut_id`);

--
-- Index pour la table `rdv_services`
--
ALTER TABLE `rdv_services`
  ADD PRIMARY KEY (`rdv_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centre_id` (`centre_id`);

--
-- Index pour la table `statuts_rdv`
--
ALTER TABLE `statuts_rdv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accueil`
--
ALTER TABLE `accueil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `apropos`
--
ALTER TABLE `apropos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT pour la table `statuts_rdv`
--
ALTER TABLE `statuts_rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`statut_id`) REFERENCES `statuts_rdv` (`id`);

--
-- Contraintes pour la table `rdv_services`
--
ALTER TABLE `rdv_services`
  ADD CONSTRAINT `rdv_services_ibfk_1` FOREIGN KEY (`rdv_id`) REFERENCES `rdv` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rdv_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
