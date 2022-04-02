-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 avr. 2022 à 13:59
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appart`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `type` enum('location','vente') DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `reservation_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(17, 'Titre', 'Ici est la description', '50000', 'Paris', 'location', '5000.00', NULL),
(18, 'Château Dimitrescu', 'Mieux vaut se planquer', '7700', 'Europe de l\'Est\n', 'location', '7777777.00', NULL),
(19, 'Asgard', 'Le domaine des As', '0001', 'Au centre du monde', 'vente', '78888888.00', NULL),
(20, 'Caravane', 'Une belle planque contre les policiers', '13000', 'Marseille', 'location', '1.00', NULL),
(21, 'Maison des Simpson', 'Une belle cabane dans l\'arbre', '941', 'Springfield', 'location', '1700.00', NULL),
(22, 'Poubelle', 'Peut-être à la fois confortable et à la fois désagréable. C\'est offert par la maison', '1300000', 'Dans toutes les villes', 'location', '0.00', NULL),
(23, 'Maison des Teletubbies', 'Un lieu paisible, la tranquilité n\'est pas rare', '7500', 'Pembrokeshire', 'vente', '540000.00', NULL),
(24, 'Dust II', 'Dans ce village vous trouverez beaucouo d\'adrénaline', '2522', 'Maroc', 'location', '7888.00', NULL),
(25, 'Mirage', 'Un beau village, avec la mer à deux pas', '2522', 'Maroc', 'vente', '98888.00', NULL),
(26, 'Manoir Spencer', 'Manoir remplie de nostalgie', '450', 'Arklay', 'vente', '99999999.99', NULL),
(27, 'Nuketown', 'Un petit village avec deux maisons', '788', 'Nevada', 'location', '555555.00', NULL),
(28, 'Maison blanche', 'Une maison situé en plein centre de la banlieue', '255', 'Los Santos', 'vente', '8989.00', NULL),
(29, 'Manoir Wayne', 'C\'est la résidence personnelle de Bruce Wayne', '125', 'Arkham City', 'location', '788885.00', NULL),
(30, 'Ou est Charlie?', 'Il n\'est pas là', '00000', '?', 'vente', '4854854.00', 'bblalbabla'),
(31, 'Château de Versailles', 'Vue splendide sur le jardin', '78000', 'Versailles', 'vente', '99999999.99', NULL),
(32, 'Kamé House', 'Elle est située sur une minuscule île perdue en plein océan ', '78', 'Inconnue', 'location', '1254.00', NULL),
(33, 'Capsule Corp', 'Une maison située à l\'ouest de la ville', '79', 'Ginger Town', 'vente', '6325.00', 'azvazdeazdazd aze azd azdza d');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
