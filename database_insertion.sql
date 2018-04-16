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
(2, 'Les 7 pays les plus puissants'),
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
(7, 1, 'Où se situe la tour de Pharos?', 29.885, 31.2142);

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(1, '<script> alert(\'lol\'); </script>', '04fa28f1f677681d3926ee07083c372d', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(2, '<script> alert(\'loSl\'); </script>', '454f93f3022fe8ce9073da3ce4ae817d', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(3, '<script> alert(\'test\'); </script>', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(4, 'admin', 'admin', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(5, 'azertyuiop', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(6, 'azertyuiope', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(7, 'azertyuioppoiuytreza', '7682fe272099ea26efe39c890b33675b', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(8, 'dinesh', '9c9f1c65b1dc1f79498c9f09eb610e1a', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(9, 'dineshe', 'ab4f63f9ac65152575886860dde480a1', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(10, 'dineshz', '5d793fc5b00a2348c3fb9ab59e5ca98a', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(11, 'dineshze', '4afccb56bfe768f336b7229998f1ea71', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(12, 'poulet', '5337aff4d7c42f4124010fc66bcec881', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(13, 'pouletbraisé', '5337aff4d7c42f4124010fc66bcec881', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(14, 'pouletfris', 'eb4654a6d3f22349582a43bf4ed9c91b', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(15, 'zougoulou', 'c04ebda0ab157539618f8bca3e137955', '2018-03-23 23:55:41');
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`) VALUES(16, 'Sean Paul', 'b9fbeb7e58125ff49f7ff735d839cab5', '2018-03-24 19:59:13');
