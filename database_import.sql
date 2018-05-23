-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 16 Avril 2018 à 12:57
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `mapgame`
--
DROP DATABASE IF EXISTS `mapgame`;
CREATE DATABASE IF NOT EXISTS `mapgame` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mapgame`;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
CREATE TABLE `questionnaires` (
  `idQuestionnaire` smallint(6) NOT NULL,
  `nomQuestionnaire` tinytext NOT NULL,
  `statut` varchar(50)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `idQuestion` smallint(6) NOT NULL,
  `idQuestionnaire` smallint(6) NOT NULL,
  `nomQuestion` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` smallint NOT NULL,
  `login` varchar(50) NOT NULL,
  `idQuestionnaire` smallint(6) NOT NULL,
  `nomQuestionnaire` tinytext NOT NULL,
  `score` smallint(6) NOT NULL,
  `date_partie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` smallint(6) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `progression` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`idQuestionnaire`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`,`idQuestionnaire`),
  ADD KEY `idQuestionnaire` (`idQuestionnaire`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`,`idQuestionnaire`,`date_partie`),
  ADD KEY `idQuestionnaire` (`idQuestionnaire`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `idQuestionnaire` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `idQuestionnaire` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaires` (`idQuestionnaire`) ON DELETE CASCADE;

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaires` (`idQuestionnaire`);

ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;