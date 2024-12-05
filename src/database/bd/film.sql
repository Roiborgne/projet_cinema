-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 fév. 2024 à 17:54
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
-- Base de données : `db_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `durée` int(11) NOT NULL,
  `résumé` text NOT NULL,
  `date` date NOT NULL,
  `pays` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `durée`, `résumé`, `date`, `pays`, `image`) VALUES
(1, 'Silent Voice (Koe no katachi)', 129, 'Nishimiya est une élève douce mais qui elle est harcelée par Ishida, car elle est sourde. Dénoncé, le garçon est à son tour rejeté par ses camarades. Des années plus tard, il apprend la langue des signes et part à la recherche de la jeune fille.', '2018-08-22', ' Japon', 'https://placehold.co/200x200?text=Silent+Voice'),
(2, 'Patéma et le monde inversé', 98, 'Après une catastrophe écologique, la terre se trouve séparée en 2 mondes inversés ignorant tout l\'un de l\'autre. Dans le monde souterrain, Patéma, 14 ans, adolescente espiègle et aventurière rêve d\'ailleurs.\r\n\r\nSur la terre ferme, Age, lycéen mélancolique, a du mal à s\'adapter à son monde totalitaire.\r\n\r\nLe hasard va provoquer la rencontre des 2 adolescents en défiant les lois de la gravité.', '2014-03-12', ' Japon', 'https://placehold.co/200x200?text=Patéma'),
(3, 'Nouveaux riches', 101, 'Youss est un pro de l\'arnaque...Lors d\'une partie de poker qui tourne mal pour lui, il rencontre Stéphanie, millionaire en crypto - l\'occasion rêvée d\'essuyer ses dettes. Il cherche à se rapprocher d\'elle, mais n\'est pas seul...', '2023-11-17', 'France', 'https://placehold.co/200x200?text=Nouveaux+Riches'),
(4, 'Coeur d\'encre', 107, 'Depuis la disparition de sa mère il y a neuf ans, Meggie voyage sans cesse avec son père Mo. Celui-ci ne tient pas en place et trouve toujours un prétexte pour changer d\'endroit. Mo a en effet un secret qu\'il n\'a jamais révélé à sa fille : il possède un extraordinaire pouvoir, celui de donner vie aux personnages des livres qu\'il lit à haute voix.\r\n\r\nIl y a neuf ans, il a eu le malheur de lire Coeur d\'encre, et une bande de personnages mortellement dangereux, dont le redoutable bandit Capricorne et un jongleur cracheur de feu nommé Doigt de poussière, a surgi... Plus terrifiant encore, tandis que la troupe de malfrats prenait vie, la femme de Mo a disparu dans le livre ! Mo s\'est juré de ne plus jamais lire à haute voix. Et depuis, il fuit les personnages auxquels il a donné vie malgré lui, essayant de protéger le livre qui est son dernier espoir de retrouver la mère de Meggie.', '2009-01-28', ' U.S.A', 'https://placehold.co/200x200?text=Coeur+d\'encre'),
(5, 'Madame Web', 117, 'Cassandra Web est une ambulancière de Manhattan qui serait capable de voir dans le futur. Forcée de faire face à des révélations sur son passé, elle noue une relation avec trois jeunes femmes destinées à un avenir hors du commun... si toutefois elles parviennent à survivre à un présent mortel.', '2024-02-14', 'U.S.A.', 'https://placehold.co/200x200?text=Madame+Web'),
(6, 'Cocorico', 91, 'Sur le point de se marier, Alice et François décident de réunir leurs deux familles. Pour l’occasion, ils réservent à leurs parents un cadeau original : des tests ADN pour que chacun puisse découvrir les origines de ses ancêtres. Mais la surprise va virer au fiasco quand les Bouvier-Sauvage, grande famille aristocrate, et les Martin, beaucoup plus modestes, découvrent les résultats, pour le moins… inattendus !', '2024-02-07', 'France', 'https://placehold.co/200x200?text=Cocorico'),
(7, 'Le Dernier Jaguar', 100, 'Autumn grandit dans la forêt amazonienne aux côtes de Hope, un adorable bébé jaguar femelle qu’elle a recueilli. Mais l’année de ses six ans, un drame familial contraint Autumn et son père à retourner vivre à New York. Huit années passent, et Autumn, devenue adolescente, n’a jamais oublié son amie jaguar. Quand elle apprend que Hope est en danger de mort, Autumn décide de retourner dans la jungle pour la sauver !', '2024-02-07', 'France', 'https://placehold.co/200x200?text=Le+Dernier+Jaguar'),
(8, 'Le Royaume de Kensuke', 84, 'L’incroyable histoire de Michael, 11 ans, parti faire un tour du monde à la voile avec ses parents, avant qu’une terrible tempête ne le propulse par-dessus bord avec sa chienne Stella. Échoués sur une île déserte, comment survivre ? Un mystérieux inconnu vient alors à leur secours en leur offrant à boire et à manger. C’est Kensuké, un ancien soldat japonais vivant seul sur l’île avec ses amis les orangs-outans depuis la guerre. Il ouvre à Michael les portes de son royaume et lorsque des trafiquants de singes tentent d’envahir l’île, c’est ensemble qu’ils uniront leurs forces pour sauver ce paradis...', '2024-02-07', ' Grande-Bretagne', 'https://placehold.co/200x200?text=Le+Royaume+de+Kensuke'),
(9, 'Haikyu the Movie: (Decisive Battle at the Garbage Dump)', 123, 'Après avoir vaincu Inarizaki, une des équipes favorites du tournoi, Karasuno se trouve enfin confronté à Nekoma dans un match officiel de voleyball!', '2024-02-14', 'Japon', 'https://placehold.co/200x200?text=Haikyu'),
(10, 'Migration', 82, 'La famille Colvert se lance dans un périple vers la Jamaïque mais leur plan si bien tracé va vite battre de l’aile. La tournure aussi chaotique et inattendue que vont prendre les évènements va les changer à jamais et leur apprendre beaucoup plus qu’ils ne l’auraient imaginé.', '2023-12-06', ' U.S.A.', 'https://placehold.co/200x200?text=Migration'),
(11, 'Volt, star malgré lui', 96, 'Pour le chien Volt, star d\'une série télévisée à succès, chaque journée est riche d\'aventure, de danger et de mystère - du moins devant les caméras. Ce n\'est plus le cas lorsqu\'il se retrouve par erreur loin des studios de Hollywood, à New York... Il va alors entamer la plus grande et la plus périlleuse de ses aventures - dans le monde réel, cette fois. Et il est convaincu que ses superpouvoirs et ses actes héroïques sont réels...\r\n\r\nHeureusement, Volt va se trouver deux curieux compagnons de voyage : un chat abandonné et blasé nommé Mittens, et un hamster fan de télé dans sa balle de plastique appelé Rhino. Volt va découvrir qu\'il n\'est pas nécessaire d\'avoir des pouvoirs extraordinaires pour être un vrai héros...', '2009-02-04', 'U.S.A.', 'https://placehold.co/200x200?text=Volt'),
(12, 'Taxi 5', 102, 'Sylvain Marot, super flic parisien et pilote d’exception, est muté contre son gré à la Police Municipale de Marseille. L’ex-commissaire Gibert, devenu Maire de la ville et au plus bas dans les sondages, va alors lui confier la mission de stopper le redoutable « Gang des Italiens », qui écume des bijouteries à l’aide de puissantes Ferrari. Mais pour y parvenir, Marot n’aura pas d’autre choix que de collaborer avec le petit-neveu du célèbre Daniel, Eddy Maklouf, le pire chauffeur VTC de Marseille, mais le seul à pouvoir récupérer le légendaire TAXI blanc.', '2018-04-07', 'France', 'https://placehold.co/200x200?text=Taxi+5'),
(13, 'Taxi 4', 90, 'De l\'eau a coulé sous les ponts depuis la dernière aventure de Daniel et Emilien : les deux hommes sont désormais pères de famille et ont du mal à s\'occuper de leurs fils, deux sacrés canailles. Une chose n\'a pas changé cependant : Emilien est toujours le policier le plus maladroit et malchanceux de Marseille et Daniel le conducteur de taxi le plus rapide. Les deux hommes vont devoir faire équipe afin d\'arrêter un terrifiant braqueur de banque surnommé \"Le Belge\"...', '2007-02-14', 'France', 'https://placehold.co/200x200?text=Taxi+4'),
(14, 'Taxi 3', 90, 'Marseille, à l\'approche de Noël. Daniel ne cesse de rajouter des gadgets à son taxi. Au point de faire passer son bolide avant sa compagne, Lilly, qui décide de retourner vivre chez ses parents. Petra, elle, reproche à Emilien d\'avoir la tête ailleurs. Celui-ci enrage en effet de ne pas avoir encore arrêté le gang des pères Noël, qui multiplie les braquages depuis huit mois.', '2003-01-29', 'France', 'https://placehold.co/200x200?text=Taxi+3'),
(15, 'Taxi 2', 90, 'La ravissante Lily va enfin présenter Daniel à son père, un important général de l\'armée française. Or, Daniel est retardé par une femme enceinte qui accouche dans son taxi. Malgré tout, le jeune homme réussit à séduire son simili-beau-père, mais le repas est brusquement interrompu car le général doit accueillir le Ministre japonais de la défense. Daniel le conduit à l\'aéroport à une vitesse record. Il y retrouve son copain Emilien, policier toujours aussi dévoué, mais guère efficace.\r\n\r\n', '2000-03-29', 'France', 'https://placehold.co/200x200?text=Taxi+2'),
(16, 'Taxi', 86, 'Daniel est un fou du volant. Cet ex-livreur de pizzas est aujourd\'hui chauffeur de taxi et sait échapper aux radars les plus perfectionnés. Pourtant, un jour, il croise la route d\'Emilien, policier recalé pour la huitième fois à son permis de conduire. Pour conserver son taxi, il accepte le marché que lui propose Emilien : l\'aider à démanteler un gang de braqueurs de banques qui écume les succursales de la ville à bord de puissants véhicules. Road-movie urbain sur un scénario de Luc Besson, également producteur.', '2003-01-29', 'France', 'https://placehold.co/200x200?text=Taxi'),
(17, 'Evangelion : 3.0+1.0: (Thrice Upon A Time)', 154, 'Dans ce quatrième et ultime opus d\'Evangelion, la WILLE débarque à Paris, ville détruite par une catastrophe nucléaire. L\'équipage du vaisseau Wunder atterrit sur une tour de confinement et dispose de seulement 720 secondes pour reconstruire la ville. Quand une horde de Nerv Evas surgit, l\'unité 8 Eva de Mari doit les intercepter. De leur côté, Shinji, Asuka et Rei continuent à errer au Japon.', '2021-08-12', 'Japon', 'https://placehold.co/200x200?text=Evangelion+3.0+1.0'),
(18, 'Evangelion : 3.33 (You Can (Not) Redo)', 106, 'Shinji se réveille 14 ans après avoir vécu à bord du cuirassé AAA Wunder, qui appartient à une organisation anti-Nerv créée par d\'anciens membres du Nerv. Shinji entend la voix de Rei qui semble provenir d\'EVA Mark.09 et l\'appelle au secours. Il quitte donc Wunder et se dirige vers le Nerv. Kaworu Nagisa montre à Shinji le pays dévasté. Il apprend que le sauvetage de Rei a déclenché le Troisième Impact qui a provoqué une catastrophe sur Terre.', '2013-12-18', 'Japon', 'https://placehold.co/200x200?text=Evangelion+3.33'),
(19, 'Evangelion : 1.0 (You Are (Not) Alone)', 98, 'Traumatisé par le Second Impact, le Quatrième Ange attaque Tokyo III et le destin de l\'humanité est désormais entre les mains de l\'agence spéciale Nerv. Le jeune Shinji Ikari est contraint de piloter EVA-01. Ce dernier, accompagné du pilote Rei Ayanami, aux commandes de l\'EVA-00, sont chargés de se battre, mais EVA-01 est endommagé par le Sixième Ange. Misato Katsuragi met au point un plan pour transférer toute l\'électricité du Japon dans le canon positron d\'EVA-01 afin de vaincre l\'Ange.', '2009-02-25', 'Japon', 'https://placehold.co/200x200?text=Evangelion+1.0 '),
(20, 'Des fleurs pour Algernon', 94, 'Algernon est une souris de laboratoire dont le traitement du Pr Nemur et du Dr Strauss vient de décupler l\'intelligence. Enhardis par cette réussite, les deux savants tentent alors, avec l\'assistance de la psychologue Alice Kinnian, d\'appliquer leur découverte à Charlie Gordon, un simple d\'esprit employé dans une boulangerie. C\'est bientôt l\'extraordinaire éveil de l\'intelligence pour le jeune homme. Il découvre un monde dont il avait toujours été exclu, et l\'amour ...', '2006-10-18', 'France', 'https://placehold.co/200x200?text=Des+fleurs+pour+Algernon');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
