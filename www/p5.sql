-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 jan. 2023 à 07:20
-- Version du serveur :  5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962AD5E258C5` (`posts_id`),
  KEY `IDX_5F9E962AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(1, 'la place de l\'informatique aujourd\'hui', 'L\'informatique est un domaine en constante évolution qui a profondément transformé notre société ces dernières décennies. Elle est présente dans de nombreux aspects de notre vie quotidienne, que ce soit au travail, à la maison, dans les transports en commun, ou encore dans les loisirs.\r\nL\'informatique a révolutionné les moyens de communication et de travail en permettant la création d\'outils collaboratifs en ligne, comme les messageries instantanées et les outils de gestion de projets. Elle a également facilité l\'accès à l\'information en permettant la création de bases de données en ligne accessibles à tous.\r\nL\'informatique est également présente dans de nombreux domaines professionnels, comme la finance, la médecine, l\'aéronautique, et bien d\'autres encore. Elle permet d\'automatiser certaines tâches et de gagner en efficacité, mais elle a également créé de nouvelles opportunités de travail, comme les métiers du développement web ou du data science.\r\nEn outre, l\'informatique a permis la création de nouveaux loisirs, comme les jeux vidéo, les réseaux sociaux, et les plateformes de streaming de musique et de vidéos. Elle a également facilité l\'accès aux cours en ligne et à l\'apprentissage à distance, ce qui a considérablement modifié les méthodes d\'enseignement.\r\nEn somme, l\'informatique a pris une place importante dans le monde et continue de nous surprendre par les nouvelles possibilités qu\'elle offre. Elle a transformé notre façon de communiquer, de travailler, de se divertir et de s\'instruire, et elle continue de nous accompagner dans l\'avenir.'),
(2, 'La musique', 'La musique occupe aujourd\'hui une place de choix dans notre vie quotidienne. Elle est présente partout, que ce soit à la radio, sur les plateformes de streaming en ligne, dans les films, les publicités, les jeux vidéo, et même dans les magasins et les transports en commun.\r\nDepuis l\'avènement de la technologie numérique, l\'accès à la musique s\'est considérablement simplifié. Il suffit d\'un simple clic pour écouter n\'importe quel morceau ou album, quel que soit le genre ou l\'époque. Cette facilité d\'accès a contribué à la popularité de la musique dans le monde entier.\r\nLa musique est devenue une source de divertissement incontournable, mais elle joue également un rôle important sur le plan émotionnel. Elle peut nous faire ressentir des émotions profondes, comme la tristesse ou la joie, et peut même nous aider à nous détendre ou à nous motiver. Elle est souvent utilisée en thérapie pour aider les gens à exprimer leurs émotions et à mieux gérer leur stress.\r\nEn outre, la musique est un moyen pour les artistes de s\'exprimer et de partager leur vision du monde. Elle peut être un vecteur de changement et de prise de conscience, comme l\'ont montré de nombreux mouvements sociaux ou politiques dans l\'histoire.\r\nEn somme, la musique a pris une place prépondérante dans notre société et dans nos vies. Elle nous permet de nous divertir, de ressentir des émotions et de nous exprimer. Elle est devenue un élément indissociable de notre quotidien et continue de nous émerveiller et de nous inspirer.'),
(3, 'Le cheval en tant que thérapie', 'Le cheval est un animal fascinant qui a été domestiqué depuis des millénaires. En plus de leur rôle historique dans les transports et les travaux agricoles, les chevaux sont également utilisés de nos jours dans de nombreuses activités de loisir, comme l\'équitation et les compétitions hippiques. Mais saviez-vous que le cheval peut également être utilisé en tant que thérapie pour les personnes souffrant de troubles mentaux ou physiques ?\r\nLa thérapie par le cheval, également connue sous le nom d\'hippothérapie, est une forme de thérapie physique qui utilise les mouvements naturels du cheval pour améliorer la santé physique et mentale de l\'individu. Elle peut être utilisée pour traiter une grande variété de troubles, y compris la dépression, l\'anxiété, le syndrome de stress post-traumatique (SSPT), l\'autisme, la paralysie cérébrale et les troubles du développement.\r\nComment la thérapie par le cheval est-elle utilisée ?\r\nLa thérapie par le cheval implique généralement des séances de montagne en selle sur un cheval, mais elle peut également inclure des activités au sol, comme le soins aux chevaux, le pansage et le licolage. Les séances de thérapie par le cheval sont généralement menées par un thérapeute physique ou occupentiel agréé qui travaille en collaboration avec un instructeur d\'équitation certifié.\r\nLors d\'une séance de thérapie par le cheval, le thérapeute ou l\'instructeur peut utiliser différentes techniques de montagne en selle pour aider l\'individu à atteindre ses objectifs de thérapie. Par exemple, l\'instructeur peut demander à l\'individu de diriger le cheval à travers des parcours en suivant des instructions verbales, ce qui peut aider à améliorer la communication, la confiance en soi et la coordination. Les mouvements du cheval pendant la montagne en selle peuvent également aider à renforcer les muscles, à améliorer l\'équilibre et à augmenter la flexibilité.\r\nQuels sont les avantages de la thérapie par le cheval ?\r\nIl y a de nombreux avantages à utiliser le cheval en tant que thérapie. Voici quelques-uns des principaux bienfaits de l\'hippothérapie :\r\n1. Amélioration de la santé physique : La thérapie par le cheval peut aider à renforcer les muscles, à améliorer l\'équilibre et à augmenter la flexibilité. Elle peut également être bénéfique.\r\n2. \r\nBienfaits pour la santé mentale : L\'interaction avec les chevaux peut aider à réduire le stress et l\'anxiété, et peut même être utilisée comme traitement complémentaire pour la dépression. L\'hippothérapie peut également aider à améliorer la confiance en soi et la communication.\r\n3. \r\nThérapie adaptée aux besoins individuels : L\'hippothérapie peut être adaptée aux besoins et aux capacités de chaque individu, ce qui en fait une option de thérapie très flexible. Les thérapeutes peuvent travailler avec chaque individu pour déterminer les objectifs de thérapie et s\'assurer que les séances sont adaptées à leurs besoins.\r\n4. \r\nActivité amusante et agréable : Pour de nombreuses personnes, la thérapie par le cheval est une activité amusante et agréable qui peut être très bénéfique pour le bien-être mental et physique.\r\nEn résumé, la thérapie par le cheval est une forme de thérapie physique qui utilise les mouvements naturels du cheval pour aider les individus à atteindre une meilleure santé physique et mentale. Elle peut être utilisée pour traiter une variété de troubles et est adaptée aux besoins individuels de chaque personne. Si vous êtes intéressé par l\'hippothérapie, il est important de parler à votre médecin ou à un thérapeute pour déterminer si cette forme de thérapie peut être bénéfique pour vous.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `password`, `profil`) VALUES
(11, 'hacenedu92@live.fr', 'hacène', '$2y$10$ZGMuAIXnCBjJx9e2mPS3tu2ChsIunAhrW.kxN9NRfTdIwWo37vwnO', '1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_5F9E962AD5E258C5` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
