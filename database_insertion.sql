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

INSERT INTO `questionnaires` (`idQuestionnaire`, `nomQuestionnaire`,`statut`) VALUES
(1, 'Les 7 Merveilles du Monde', 'active'),
(2, 'Les capitales des 7 pays les plus puissants', 'active');

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `idQuestionnaire`, `nomQuestion`, `latitude`, `longitude`, `description`) VALUES
(1, 1, 'Où se situe la pyramide de Kheops?', 29.9789, 31.1339, 'test'),
(1, 2, 'Où se situe la capitale des Etats-Unis?', 38.8951, -77.0364, 'Washington, la capitale des États-Unis, est une ville dense située sur les rives du Potomac, à la frontière des États du Maryland et de Virginie. Elle se caractérise par ses monuments et bâtiments néoclassiques imposants, dont ceux qui abritent les 3 branches du gouvernement fédéral : le Capitole, la Maison-Blanche et la Cour suprême. Elle comprend également des musées et des salles de spectacle emblématiques comme le John F. Kennedy Memorial Center for the Performing Arts.'),
(2, 1, 'Où se situent les jardins suspendus de Babylone?', 32.5355, 44.4275, NULL),
(2, 2, 'Où se situe la capitale de la Chine ?', 39.9075, 116.397, 'Beijing (ou Pékin), l’immense capitale chinoise, est empreinte d’une histoire de plus de 3 millénaires. Elle est connue aussi bien pour son architecture moderne que pour ses sites anciens tels que le grand palais impérial de la Cité interdite, dont la construction date des dynasties Ming et Qing. Non loin de cette cité impériale se trouve l’immense place piétonne Tian Anmen : elle abrite le mausolée de Mao Zedong et le musée national de Chine, où une vaste collection de vestiges culturels est exposée.'),
(3, 1, 'Où se situe la statue chryséléphantine de Zeus?', 38.6378, 21.63, NULL),
(3, 2, 'Où se situe la capitale du Japon ?', 35.6895, 139.692, 'Capitale animée du Japon, Tokyo associe ultramoderne et traditionnel, gratte-ciels illuminés et temples historiques. L\'opulent sanctuaire shinto Meiji est réputé pour son imposant portail et les bois qui l\'entourent. Le palais impérial (ou Kōkyo) est installé dans de vastes jardins publics. Les nombreux musées de la ville proposent des expositions allant de l\'art classique (musée national de Tokyo) à la reconstitution d\'un théâtre kabuki (musée d\'Edo-Tokyo).'),
(4, 1, 'Où se situe le temple d’Artémis?', 37.9497, 27.3639, NULL),
(4, 2, 'Où se situe la capitale de l\'Allemagne?', 52.5244, 13.4105, 'La capitale allemande, Berlin, est née au XIIIe siècle. Le Mémorial de l’Holocauste et les pans restants du mur de Berlin, sur lesquels des graffitis ont été peints, témoignent de son passé tumultueux. Divisé en deux pendant la guerre froide, le pays a adopté la porte de Brandebourg du XVIIIe siècle comme symbole de sa réunification. La ville est aussi réputée pour sa scène artistique et ses monuments modernes, comme la Philharmonie de Berlin, un bâtiment doré construit en 1963 dont le toit présente une forme géométrique particulière.'),
(5, 1, 'Où se situe le tombeau de Mausole?', 37.0379, 27.4241, NULL),
(5, 2, 'Où se situe la capitale de la France?', 48.8667, 2.33333, 'Paris, capitale de la France, est une grande ville européenne et un centre mondial de l\'art, de la mode, de la gastronomie et de la culture. Son paysage urbain du XIXe siècle est traversé par de larges boulevards et la Seine. Outre les monuments comme la tour Eiffel et la cathédrale gothique Notre-Dame du XIIe siècle, la ville est réputée pour ses cafés et ses boutiques de luxe bordant la rue du Faubourg-Saint-Honoré.'),
(6, 1, 'Où se situe le colosse de Rhodes?', 36.4511, 28.2278, NULL),
(6, 2, 'Où se situe la capitale du Royaume-Uni ?', 51.5085, -0.12574, 'Londres, la capitale de l\'Angleterre et du Royaume-Uni, est une ville moderne dont l\'histoire remonte à l\'époque romaine. En son centre se dressent l\'imposant Parlement, l\'emblématique Big Ben et l\'abbaye de Westminster, lieu de couronnement des monarques britanniques. De l\'autre côté de la Tamise, le London Eye, la grande roue, offre une vue panoramique sur le South Bank Center, et toute la ville.'),
(7, 1, 'Où se situe la tour de Pharos?', 31.2142, 29.885, 'test'),
(7, 2, 'Où se situe la capitale de l\'Inde?', 28.6358, 77.2244, 'New Delhi est la capitale de l\'Inde. On appelle les habitants de New Delhi les Delhiit. Elle abrite le siège du gouvernement de l\'Inde, le Parlement, la résidence du président et la Cour suprême.');


--
-- Contenu de la table `users`
--
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(1, 'admin', 'admin', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(2, 'assan', 'bafa1b192396b6aceacd52f5708064b1', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(6, 'dinesh', '9c9f1c65b1dc1f79498c9f09eb610e1a', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(14, 'Sean Paul', 'b9fbeb7e58125ff49f7ff735d839cab5', '2018-03-24 19:59:13',1);
