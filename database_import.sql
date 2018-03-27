-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 25 Mars 2018 à 16:41
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `MapGame`
--
CREATE DATABASE IF NOT EXISTS `MapGame` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `MapGame`;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaires`
--

DROP TABLE IF EXISTS `questionnaires`;
CREATE TABLE IF NOT EXISTS `questionnaires` (
  `idQuestionnaire` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomQuestionnaire` tinytext NOT NULL,
  PRIMARY KEY (`idQuestionnaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
	`idQuestion` smallint(6) NOT NULL AUTO_INCREMENT,
	`idQuestionnaire` smallint(6) NOT NULL,
	`nomQuestion` text NOT NULL,
	`longitude` float NOT NULL,
	`latitude` float NOT NULL,
	PRIMARY KEY (`idQuestion`,`idQuestionnaire`),
	FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaires`(`idQuestionnaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
	`login` varchar(50) NOT NULL,
	`idQuestionnaire` smallint(6) NOT NULL AUTO_INCREMENT,
	`score` smallint NOT NULL,
	`date_partie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	PRIMARY KEY (`login`),
	FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaires`(`idQuestionnaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
