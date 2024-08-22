-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 août 2024 à 01:46
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
  `forname` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `name`, `forname`) VALUES
(1, 'Hugo', 'Victor'),
(2, 'Matmati', 'Anis'),
(3, 'Matmatii', 'Anis'),
(4, 'Hugoo', 'Victor'),
(5, 'Matmatiu', 'Anis');

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
(1, 'Premier Livre', 'user-image.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \n\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \n\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \n\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', '2024-05-29 15:29:11', 1, 1, 1),
(2, 'Deuxieme Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:53:44', 2, 1, 0),
(3, 'Troisième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:10', 2, 1, 0),
(4, 'Quatrième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IAA.', '2024-06-12 11:54:54', 5, 2, 0),
(5, 'Cinquième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 2, 0),
(6, 'Sixième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-05-29 15:29:11', 1, 2, 0),
(7, 'Septième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:53:44', 2, 1, 0),
(8, 'Huitième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:10', 2, 1, 0),
(9, 'Neuvième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 1, 2, 0),
(10, 'Dixième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 1, 0),
(11, 'Onzième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 1, 2, 0),
(12, 'Douzième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 2, 0),
(13, 'Treizième Livre', 'user-image.jpg', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 1, 2, 0),
(14, 'Quatorzième Livre', 'https://imgsrv.crunchyroll.com/cdn-cgi/image/fit=contain,format=auto,quality=85,width=1200,height=675/catalog/crunchyroll/36bdc5ea4443cd8e42f22ec7d3884cbb.jpe', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 2, 0),
(15, 'Quinzième Livre', 'https://imgsrv.crunchyroll.com/cdn-cgi/image/fit=contain,format=auto,quality=85,width=1200,height=675/catalog/crunchyroll/36bdc5ea4443cd8e42f22ec7d3884cbb.jpe', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:54:54', 1, 1, 0),
(16, 'Seizième Livre', 'https://imgsrv.crunchyroll.com/cdn-cgi/image/fit=contain,format=auto,quality=85,width=1200,height=675/catalog/crunchyroll/36bdc5ea4443cd8e42f22ec7d3884cbb.jpe', 'Un livre écrit avec l\'assistance d\'une IA.', '2024-06-12 11:55:36', 1, 1, 0);

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
(4, 3, 2, 'Eweeee', '2024-07-31 14:33:53'),
(5, 1, 2, 'tjrs moi', '2024-07-31 15:14:14'),
(6, 2, 1, 'Bien ?', '2024-07-31 16:07:41'),
(7, 3, 2, 'Bien ?!', '2024-07-31 16:07:41');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `img_link` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `login`, `password`, `img_link`) VALUES
(1, 'HannibalLecteur', 'user1', '$2y$10$OgkmY1nczvIj0tcaQH7aPeMqpmBZIelrfX14AmedYe6hOuBQeRRW2', 'https://openseauserdata.com/files/6a15cbec84be6454f793d942e97a2289.jpg'),
(2, 'User2', 'user2', '$2y$10$aDGjGSugFelMymqdciuO..qKLXROTJiP9z6g/V3sNT6zGmhNtg6pS', 'aic-home.jpg'),
(3, 'User3', 'user3', 'user3', 'https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/c7f7fb54-146d-4318-a3ff-be516eb80a83/width=450/00113.jpeg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
