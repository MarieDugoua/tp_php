-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 17 mai 2020 à 16:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `find_it`
--

-- --------------------------------------------------------

--
-- Structure de la table `applys`
--

CREATE TABLE `applys` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `id_cv` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `applys`
--

INSERT INTO `applys` (`id`, `id_user`, `lastname`, `firstname`, `description`, `id_cv`, `created_at`) VALUES
(1, 6, 'DUGOUA', 'Bertrand', 'gyuggigigiu', 6, '2020-05-16 15:13:26'),
(2, 6, 'DUGOUA', 'Bertrand', 'sdhioqshdizsHDlqshdmozCH', 7, '2020-05-16 15:14:17');

-- --------------------------------------------------------

--
-- Structure de la table `diplomas`
--

CREATE TABLE `diplomas` (
  `id` int(11) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name_school` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `description` text,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplomas`
--

INSERT INTO `diplomas` (`id`, `periode`, `type`, `name_school`, `place`, `description`, `id_user`) VALUES
(1, 'aout 2019 à septembre 2019', 'Piscine de 42', 'Ecole 42', 'Paris', 'Immersion total dans le code pendant 1 moi', 6);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_offer` int(11) DEFAULT NULL,
  `id_apply` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id_offer`, `id_apply`, `id_user`) VALUES
(1, NULL, 6),
(1, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_user_sent` int(11) DEFAULT NULL,
  `id_title` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `id_user_recieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_user_sent`, `id_title`, `text`, `lastname`, `firstname`, `id_user_recieved`) VALUES
(2, 6, 1, 'eocjzejczeùfjùzepf', 'DUGOUA', 'Bertrand', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offers`
--

INSERT INTO `offers` (`id`, `name`, `company_name`, `description`, `created_at`, `id_user`) VALUES
(1, 'menuisier', 'Art bois 24', ';vds,vlmsd,vpsdnvsd,fkez', '2020-05-17 12:52:43', 5);

-- --------------------------------------------------------

--
-- Structure de la table `professionnal_exp`
--

CREATE TABLE `professionnal_exp` (
  `id` int(11) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `description` text,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professionnal_exp`
--

INSERT INTO `professionnal_exp` (`id`, `periode`, `type`, `company_name`, `place`, `description`, `id_user`) VALUES
(1, 'janvier 2019 à mars 2019', 'Préparatrice de commande', 'SDS', 'Blanquefort', 'j,fpzjfpzeojf', 6);

-- --------------------------------------------------------

--
-- Structure de la table `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `name_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titles`
--

INSERT INTO `titles` (`id`, `name_title`) VALUES
(1, 'admin'),
(2, 'company'),
(3, 'candidate');

-- --------------------------------------------------------

--
-- Structure de la table `upload_cv`
--

CREATE TABLE `upload_cv` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `upload_cv`
--

INSERT INTO `upload_cv` (`id`, `name`, `size`, `path`, `id_user`, `created_at`) VALUES
(1, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:08:10'),
(2, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:10:04'),
(3, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:11:47'),
(4, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:11:56'),
(5, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:13:00'),
(6, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:13:26'),
(7, 'Bertrand_Dugoua_CV.pdf', 40101, '/Applications/MAMP/htdocs/cours_php/tp/save_files/Bertrand_Dugoua_CV.pdf', 6, '2020-05-16 15:14:17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `address_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `id_title` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `birth_date`, `address_email`, `password`, `address`, `city`, `zip_code`, `country`, `id_title`, `created_at`) VALUES
(1, 'DUGOUA', 'Marie', '1994-09-21', 'marie.dugoua@gmail.com', 'root', '89 Quai des Chartrons', 'BORDEAUX', 33300, 'FRANCE', 1, '2020-05-14 10:19:01'),
(5, 'DUFFAUD', 'Emmanuelle', '1966-09-17', 'emmanuelle.duffaud@gmail.com', '$2y$10$me6ZATwu5342pH.scL/lLe3x9Um0KCLjudq6LoDKO/CFxG.SYyaBy', '89 quai des chartrons', 'Bordeaux', 33300, 'FRANCE', 2, '2020-05-15 11:42:57'),
(6, 'DUGOUA', 'Bertrand', '1969-02-15', 'bertrand.dugoua@gmail.com', '$2y$10$E6onKdMBhJSvi3HZriGuzeZBVzX/gETpMbaVHp0Ap90Svzpd.r48a', '89 quai des chartrons', 'Bordeaux', 33300, 'France', 3, '2020-05-15 11:43:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applys`
--
ALTER TABLE `applys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cv` (`id_cv`);

--
-- Index pour la table `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_apply` (`id_apply`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_title` (`id_title`),
  ADD KEY `id_user_recieved` (`id_user_recieved`),
  ADD KEY `id_user_sent` (`id_user_sent`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `professionnal_exp`
--
ALTER TABLE `professionnal_exp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `upload_cv`
--
ALTER TABLE `upload_cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_title` (`id_title`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `applys`
--
ALTER TABLE `applys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `professionnal_exp`
--
ALTER TABLE `professionnal_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `upload_cv`
--
ALTER TABLE `upload_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `applys`
--
ALTER TABLE `applys`
  ADD CONSTRAINT `applys_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applys_ibfk_2` FOREIGN KEY (`id_cv`) REFERENCES `upload_cv` (`id`);

--
-- Contraintes pour la table `diplomas`
--
ALTER TABLE `diplomas`
  ADD CONSTRAINT `diplomas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `favoris_ibfk_4` FOREIGN KEY (`id_apply`) REFERENCES `applys` (`id`),
  ADD CONSTRAINT `favoris_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_title`) REFERENCES `titles` (`id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`id_user_recieved`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`id_user_sent`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `professionnal_exp`
--
ALTER TABLE `professionnal_exp`
  ADD CONSTRAINT `professionnal_exp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `upload_cv`
--
ALTER TABLE `upload_cv`
  ADD CONSTRAINT `upload_cv_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_title`) REFERENCES `titles` (`id`);