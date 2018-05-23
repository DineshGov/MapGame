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
(2, 'Les capitales des 7 pays les plus puissants', 'active'),
(3, 'Les 7 dernieres villes organisatrices des JO', 'desactive'),
(4, 'Les finales des 7 dernieres coupe du monde de footballe', 'desactive');



--
-- Contenu de la table `questions`
--


INSERT INTO `questions` (`idQuestion`, `idQuestionnaire`, `nomQuestion`, `latitude`, `longitude`, `description`) VALUES
(1, 1, 'Où se situe la pyramide de Kheops?', 29.9789, 31.1339, 'La pyramide de Khéops ou grande pyramide de Gizeh est un monument construit par les Égyptiens de l\'Antiquité, formant une pyramide à base carrée. Tombeau présumé du pharaon Khéops, elle fut édifiée il y a plus de 4 500 ans, sous la IVe dynastie, au centre du complexe funéraire de Khéops se situant à Gizeh en Égypte.'),
(1, 2, 'Où se situe la capitale des Etats-Unis?', 38.8951, -77.0364, 'Washington, la capitale des États-Unis, est une ville dense située sur les rives du Potomac, à la frontière des États du Maryland et de Virginie. Elle se caractérise par ses monuments et bâtiments néoclassiques imposants, dont ceux qui abritent les 3 branches du gouvernement fédéral : le Capitole, la Maison-Blanche et la Cour suprême. Elle comprend également des musées et des salles de spectacle emblématiques comme le John F. Kennedy Memorial Center for the Performing Arts.'),
(1, 3, ' Ou s\'est jouée la finale de la CDM 1994?', 0, 0, NULL),
(2, 1, 'Où se situent les jardins suspendus de Babylone?', 32.5355, 44.4275, 'Les jardins suspendus de Babylone sont un édifice antique, considéré comme une des Sept Merveilles du monde antique. Ils apparaissent dans les écrits de plusieurs auteurs grecs et romains antiques (Diodore de Sicile, Strabon, Philon d\'Alexandrie, etc.), qui s\'inspirent tous de sources plus anciennes disparues, dont le prêtre babylonien Bérose. C\'est à ce dernier que l\'on doit l\'histoire de la construction de ces jardins par Nabuchodonosor II afin de rappeler à son épouse, Amytis de Médie, les montagnes boisées de son pays natal.'),
(2, 2, 'Où se situe la capitale de la Chine ?', 39.9075, 116.397, 'Beijing (ou Pékin), l’immense capitale chinoise, est empreinte d’une histoire de plus de 3 millénaires. Elle est connue aussi bien pour son architecture moderne que pour ses sites anciens tels que le grand palais impérial de la Cité interdite, dont la construction date des dynasties Ming et Qing. Non loin de cette cité impériale se trouve l’immense place piétonne Tian Anmen : elle abrite le mausolée de Mao Zedong et le musée national de Chine, où une vaste collection de vestiges culturels est exposée.'),
(2, 3, '  Ou s\'est jouée la finale de la CDM 1998?', 0, 0, NULL),
(3, 1, 'Où se situe la statue chryséléphantine de Zeus?', 38.6378, 21.63, 'La statue chryséléphantine de Zeus à Olympie est une œuvre du sculpteur athénien Phidias, réalisée vers 436 av. J.-C. à Olympie. Aujourd\'hui disparue, elle était considérée dans l\'Antiquité comme la troisième des Sept Merveilles du monde.\r\n\r\nLe terme « chryséléphantine » vient du grec chrysós (χρυσός), signifiant « or », et elephántinos (ελεφάντινος), signifiant « ivoire », désignant donc les statues réalisées à l\'aide de ces deux matériaux.'),
(3, 2, 'Où se situe la capitale du Japon ?', 35.6895, 139.692, 'Capitale animée du Japon, Tokyo associe ultramoderne et traditionnel, gratte-ciels illuminés et temples historiques. L\'opulent sanctuaire shinto Meiji est réputé pour son imposant portail et les bois qui l\'entourent. Le palais impérial (ou Kōkyo) est installé dans de vastes jardins publics. Les nombreux musées de la ville proposent des expositions allant de l\'art classique (musée national de Tokyo) à la reconstitution d\'un théâtre kabuki (musée d\'Edo-Tokyo).'),
(3, 3, '   Ou s\'est jouée la finale de la CDM 2002?', 0, 0, NULL),
(4, 1, 'Où se situe le temple d’Artémis?', 37.9497, 27.3639, 'Le temple d\'Artémis à Éphèse1 (en grec Ἀρτεμίσιον / Artemísion, en latin Artemisium) est dans l\'Antiquité l\'un des plus importants sanctuaires d\'Artémis, déesse grecque de la chasse et de la nature sauvage. Il était considéré dans l\'Antiquité comme la quatrième des Sept Merveilles du monde.'),
(4, 2, 'Où se situe la capitale de l\'Allemagne?', 52.5244, 13.4105, 'La capitale allemande, Berlin, est née au XIIIe siècle. Le Mémorial de l’Holocauste et les pans restants du mur de Berlin, sur lesquels des graffitis ont été peints, témoignent de son passé tumultueux. Divisé en deux pendant la guerre froide, le pays a adopté la porte de Brandebourg du XVIIIe siècle comme symbole de sa réunification. La ville est aussi réputée pour sa scène artistique et ses monuments modernes, comme la Philharmonie de Berlin, un bâtiment doré construit en 1963 dont le toit présente une forme géométrique particulière.'),
(4, 3, '   Ou s\'est jouée la finale de la CDM 2004?', 0, 0, NULL),
(5, 1, 'Où se situe le tombeau de Mausole?', 37.0379, 27.4241, 'Le mausolée d\'Halicarnasse (en grec Μαυσωλεῖον / Mausôleĩon) est le tombeau de Mausole, satrape perse achéménide de Carie (Asie Mineure), mort en 353 av. J.-C.. Il était considéré dans l\'Antiquité comme la cinquième des Sept Merveilles du monde. Halicarnasse est aujourd’hui la ville de Bodrum, au sud-ouest de la Turquie.'),
(5, 2, 'Où se situe la capitale de la France?', 48.8667, 2.33333, 'Paris, capitale de la France, est une grande ville européenne et un centre mondial de l\'art, de la mode, de la gastronomie et de la culture. Son paysage urbain du XIXe siècle est traversé par de larges boulevards et la Seine. Outre les monuments comme la tour Eiffel et la cathédrale gothique Notre-Dame du XIIe siècle, la ville est réputée pour ses cafés et ses boutiques de luxe bordant la rue du Faubourg-Saint-Honoré.'),
(6, 1, 'Où se situe le colosse de Rhodes?', 36.4511, 28.2278, 'Le colosse de Rhodes était une statue d\'Hélios, le dieu Soleil, en bronze, dont la hauteur dépassait trente mètres, œuvre de Charès de Lindos. Souvenir de la résistance victorieuse à Démétrios Ier Poliorcète (-305 à -304), érigée sur l\'île de Rhodes vers -292, cette gigantesque effigie d\'Hélios, dieu tutélaire de la ville de Rhodes, fut renversée en -227 ou -226 par un tremblement de terre. Cassée au niveau des genoux, elle s\'effondra et tomba en morceaux. La statue brisée resta sur place jusqu\'en 654. Il ne reste plus aujourd\'hui la moindre trace du colosse.'),
(6, 2, 'Où se situe la capitale du Royaume-Uni ?', 51.5085, -0.12574, 'Londres, la capitale de l\'Angleterre et du Royaume-Uni, est une ville moderne dont l\'histoire remonte à l\'époque romaine. En son centre se dressent l\'imposant Parlement, l\'emblématique Big Ben et l\'abbaye de Westminster, lieu de couronnement des monarques britanniques. De l\'autre côté de la Tamise, le London Eye, la grande roue, offre une vue panoramique sur le South Bank Center, et toute la ville.'),
(7, 1, 'Où se situe la tour de Pharos?', 31.2142, 29.885, 'Le phare d\'Alexandrie (du grec ancien ὁ Φάρος τῆς Ἀλεξανδρείας). Il était considéré dans l\'Antiquité comme la septième des Sept Merveilles du monde. Il a servi de guide aux marins pendant près de dix-sept siècles (du iiie siècle av. J.-C. au xive siècle). Sa construction aurait débuté entre -299 et -289 (la date exacte est inconnue) et duré une quinzaine d\'années. Les travaux sont commencés par Ptolémée Ier mais il meurt avant la fin du chantier qui est achevé sous le règne de son fils Ptolémée II.'),
(7, 2, 'Où se situe la capitale de l\'Inde?', 28.6358, 77.2244, 'New Delhi est la capitale de l\'Inde. On appelle les habitants de New Delhi les Delhiit. Elle abrite le siège du gouvernement de l\'Inde, le Parlement, la résidence du président et la Cour suprême.');



--
-- Contenu de la table `users`
--


INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(1, 'admin', 'admin', '2018-03-23 23:55:41',2);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(2, 'assan', 'bafa1b192396b6aceacd52f5708064b1', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(3, 'dinesh', '9c9f1c65b1dc1f79498c9f09eb610e1a', '2018-03-23 23:55:41',1);
INSERT INTO `users` (`id`, `login`, `password`, `date_inscription`,`progression`) VALUES(4, 'etudiant', 'a3c6c43c72c71ed874d16ce12f8cede1', '2018-05-23 20:51:41', 1);


--
-- Contenu de la table `score`
--

INSERT INTO `score` (`id`, `login`, `idQuestionnaire`, `nomQuestionnaire`, `score`, `date_partie`) VALUES
(1, 'admin', 1, 'Les 7 Merveilles du Monde', 10, '2018-05-23 21:40:07'),
(1, 'admin', 1, 'Les 7 Merveilles du Monde', 0, '2018-05-23 21:40:41'),
(1, 'admin', 2, 'Les capitales des 7 pays les plus puissants', 66, '2018-05-23 21:47:28'),
(4, 'etudiant', 1, 'Les 7 Merveilles du Monde', 0, '2018-05-23 21:08:29');
