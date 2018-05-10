-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mar 27 Mars 2018 à 23:33
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `MapGame`
--

--
-- Contenu de la table `questionnaires`
--

INSERT INTO `questionnaires` (`idQuestionnaire`, `nomQuestionnaire`) VALUES
(1, 'Les 7 Merveilles du Monde'),
(2, 'Les capitales des 7 pays les plus puissants'),
(3, 'Les 7 meilleurs grecs d\'Ile de France');

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `idQuestionnaire`, `nomQuestion`, `longitude`, `latitude`) VALUES
(1, 1, 'Où se situe la pyramide de Kheops?', 31.1339, 29.9789),
(2, 1, 'Où se situent les jardins suspendus de Babylone?', 44.4275, 32.5355),
(3, 1, 'Où se situe la statue chryséléphantine de Zeus?', 21.63, 38.6378),
(4, 1, 'Où se situe le temple d’Artémis?', 27.3639, 37.9497),
(5, 1, 'Où se situe le tombeau de Mausole?', 27.4241, 37.0379),
(6, 1, 'Où se situe le colosse de Rhodes?', 28.2278, 36.4511),
(7, 1, 'Où se situe la tour de Pharos?', 29.885, 31.2142),
(1, 2, 'Où se situe la capitale des Etats-Unis?', -77.0363700, 38.8951100),
(2, 2, 'Où se situe la capitale de la Chine ?', 116.3972300, 39.9075000),
(3, 2, 'Où se situe la capitale du Japon ?', 139.6917100, 35.6895000),
(4, 2, 'Où se situe la capitale de l\'Allemagne?', 13.4105300, 52.5243700),
(5, 2, 'Où se situe la capitale de la France?', 2.333333, 48.866667),
(6, 2, 'Où se situe la capitale du Royaume-Uni ?',-0.1257400, 51.5085300),
(7, 2, 'Où se situe la capitale de l\'Inde?', 77.2244500, 28.6357600);

--
-- Contenu de la table `users`
--
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(1, 'admin', 'admin', '2018-03-23 23:55:41',2);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(2, 'assan', 'bafa1b192396b6aceacd52f5708064b1', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(3, 'azertyuiop', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(4, 'azertyuiope', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(5, 'azertyuioppoiuytreza', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(6, 'dinesh', '9c9f1c65b1dc1f79498c9f09eb610e1a', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(7, 'dineshe', 'ab4f63f9ac65152575886860dde480a1', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(8, 'dineshz', '5d793fc5b00a2348c3fb9ab59e5ca98a', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(9, 'dineshze', '4afccb56bfe768f336b7229998f1ea71', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(10, 'poulet', '5337aff4d7c42f4124010fc66bcec881', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(11, 'pouletbraisé', '5337aff4d7c42f4124010fc66bcec881', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(12, 'pouletfris', 'eb4654a6d3f22349582a43bf4ed9c91b', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(13, 'zougoulou', 'c04ebda0ab157539618f8bca3e137955', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(14, 'Sean Paul', 'b9fbeb7e58125ff49f7ff735d839cab5', '2018-03-24 19:59:13',1);
