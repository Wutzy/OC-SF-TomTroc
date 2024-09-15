-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 15 sep. 2024 à 07:48
-- Version du serveur : 10.3.16-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `forname` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `name`, `forname`) VALUES
(1, 'Alabaster', ''),
(2, 'Nathan', 'Williams'),
(3, 'Beth', 'Kempton'),
(4, 'Rupi', 'Kaur'),
(5, 'Justin', 'Rossow'),
(6, 'Elder', 'Cooper Low'),
(7, 'Julia', 'Schonlau'),
(8, 'Matt', 'Ridley'),
(9, 'Meik', 'Wiking'),
(10, 'Daniel', 'Kahneman'),
(11, 'Mark', 'Manson'),
(12, 'C.S', 'Lewis'),
(13, 'J.R.R', 'Tolkien'),
(14, 'Paul', 'Jarvis');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `image`, `description`, `date_creation`, `author_id`, `owner_id`, `availability`) VALUES
(1, 'Esther', 'esther.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', '2024-05-29 15:29:11', 1, 1, 1),
(2, 'The Kinfolk Table', 'kinfolk.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:53:44', 2, 1, 1),
(3, 'Wabi Sabi', 'wabisabi.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:10', 3, 1, 1),
(4, 'Milk & honey', 'milkandhoney.jpg', 'Un livre écrit avec l\'assistance d\'une IAA.', '2024-06-12 11:54:54', 4, 2, 0),
(5, 'Delight!', 'delight.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 5, 2, 0),
(6, 'Milwaukee Mission', 'milwokee.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-05-29 15:29:11', 6, 2, 0),
(7, 'Minimalist Graphics', 'minimalist.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:53:44', 7, 1, 0),
(8, 'Hygge', 'hygge.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:10', 9, 1, 0),
(9, 'Innovation', 'innovation.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 8, 2, 0),
(10, 'Psalms', 'psalms.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 1, 0),
(11, 'Thinking, Fast & Slow', 'thinking.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 10, 2, 0),
(12, 'A Book Full Of Hope', 'fullHope.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 4, 2, 0),
(13, 'The Subtle Art Of...', 'subtle.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 11, 2, 0),
(14, 'Narnia', 'narnia.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 12, 2, 0),
(15, 'Company Of One', 'company.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 14, 1, 0),
(16, 'The Two Towers', 'twotower.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 13, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `recipient_id`, `content`, `created_at`) VALUES
(1, 1, 2, 'Hello World', '2024-07-31 09:48:38'),
(2, 3, 2, 'Salut', '2024-07-31 11:54:07'),
(3, 1, 2, 'Encore hello', '2024-07-31 11:54:25'),
(10, 2, 1, 'coucou', '2024-08-30 21:28:14'),
(12, 2, 3, 'yo', '2024-08-30 21:28:51'),
(14, 2, 3, 'ett toi ?', '2024-08-30 21:31:41'),
(17, 2, 1, 'cava', '2024-09-15 07:09:36');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `img_link` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `login`, `password`, `img_link`, `registration_date`) VALUES
(1, 'HannibalLecteur', 'user1@gmail.com', '$2y$10$yf3VcguJJn7k27gkrU3fL.6qsuZZdR915AvLMjgV/s2fw3XkANOWu', 'hanibal.jpg', '2024-06-30 22:03:58'),
(2, 'The_User22', 'user2@gmail.com', '$2y$10$70wwLGR51PfraJz1hDESaOKg/0b1KTixM/LrUwurZTFRQFlUd/C9a', 'aic-home.jpg', '2024-09-29 22:04:29'),
(3, 'User3', 'user3', 'user3', 'user1.jpg', '2024-09-17 22:04:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
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
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
