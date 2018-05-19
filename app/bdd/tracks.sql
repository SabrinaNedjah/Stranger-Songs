-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 10 mai 2018 à 20:37
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stranger_songs`
--

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Artist` varchar(30) NOT NULL,
  `Time` time NOT NULL,
  `Share` text NOT NULL,
  `Link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`id`, `Title`, `Artist`, `Time`, `Share`, `Link`) VALUES
(1, 'Stranger love', 'Kelly W.', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/01-dead-wrong-intro.mp3'),
(2, 'Dark night', 'Alexia David', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/02-juicy-r.mp3'),
(3, 'Dark sky', 'Luisa a.', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/03-its-all-about-the-crystalizabeths.mp3'),
(4, 'Stranger things', 'Lola', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/05-one-more-chance-for-a-heart-to-skip-a-beat.mp3'),
(6, 'Life', 'Kelly W.', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/01-dead-wrong-intro.mp3'),
(7, 'Night and Test', 'Alexia David', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/02-juicy-r.mp3'),
(8, 'Dark life', 'Luisa a.', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/03-its-all-about-the-crystalizabeths.mp3'),
(9, 'Test test', 'Lola', '00:00:00', 'link', 'http://kolber.github.io/audiojs/demos/mp3/05-one-more-chance-for-a-heart-to-skip-a-beat.mp3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
