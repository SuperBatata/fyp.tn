-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 jan. 2020 à 15:14
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fyp`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoire`
--

DROP TABLE IF EXISTS `accessoire`;
CREATE TABLE IF NOT EXISTS `accessoire` (
  `id_accesoire` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_accesoire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(8) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
('15010065', 'admin', 'admin', 'hamza.azzabi@esprit.tn');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` int(4) NOT NULL,
  `telephone` int(8) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `username`, `nom`, `prenom`, `password`, `email`, `adresse`, `codepostal`, `telephone`, `confirmation_token`, `confirmed_at`, `type`) VALUES
(10, 'zack', '', '', '$2y$10$aRi0Et4PL.Y6jEMm.jjowu1R1QzvdaJ98V75JGnVHwwKhlkG2ALv.', 'zack-hamed@hotmail.fr', 'rueperseverance', 2070, 20262417, 'DHZRZ8D2cvuU07iWLnqjU8EVlRKIBfprypPeAA376jrbemytKd25lCcNAOoQ', NULL, ''),
(30, 'azzabi', '', '', '$2y$10$..MPzKiOG9ADEurePk4ka.U9Hx3tLCzQvfWIAWeJDobvheKuzs4yu', 'hamza.azzabi@esprit.tn', '13ruegharnouk', 2070, 52866778, 'Xx7y9MB2gV7p7zskAXhGNPfD6K0ZRDAYogFpxiS3Vjj25OlBjJC5tRh27nfH', NULL, 'admin'),
(31, 'sayma', '', '', '$2y$10$irI.aird1VbBQZsVn1bdgOu/4wAF8.PnKQkBjcDT3eynSG21uiNv.', 'saima.fekih@esprit.tn', 'sffqf', 2465513, 1132131, 'MIObfrCV4cYvWwLw8fQcWcNAxeTtKTSly6o5nUv82cD0wr9iGP1K9nogaf8s', NULL, ''),
(34, 'khaled', '', '', '$2y$10$DUCMehMbwHSvRgmJZNVE6edU7Aq5vqvr2zCGOoDBUUpZt8sLISnue', 'khaled.battiche@esprit.tn', '13ruegharnouk', 2070, 52866778, 'X9b5bAkAnO6xjpCJgncO10zZSEA8ikWS3cdypNbI9Skb5abvm1cOxNwLZo4i', NULL, 'user'),
(39, 'taib', 'mahmoudi', 'taib', '$2y$10$lFEdUFiFEH9Q2DWsavbewe9yEITZ0hgsWP3gPAoDyC1siSCmM6bYm', 'taib.mahmoudi@esprit.tn', 'rue hkdhdhk', 2027, 22522858, 'BMfUuaOsZw9a3jbpMTebJbC1tnMfvyddxP44kfeqMpdfyCbVpYqOLKtLdYnM', NULL, 'user'),
(40, 'linda', 'ouerfelli', 'linda', '$2y$10$0L4oOAmwZuFn2coRUd7vK.zPTnzjbxo8B1FO3jaRlJcKmQjfz6u8K', 'linda.ouerfelli@esprit.tn', 'ggggggg', 2070, 25455899, '5plukhn7QRIhqs3TAXDqiFDrfpZGSjW6uaHweEEBtmH6aDankorTS7TnQRCY', NULL, 'user'),
(42, 'hamza', 'azzabi', 'hamza', '$2y$10$d4hSqK8R3tqt211/1KM2feRc7imxLT7ouwDYz.4hyMVaLLMDyXTja', 'azzabi.hamza2@gmail.com', '13ruegharnouk', 2070, 52866778, NULL, '2020-01-11 13:26:27', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `montant` float NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id_coupon` int(11) NOT NULL,
  `nom_coupon` varchar(255) NOT NULL,
  `dateA` date NOT NULL,
  `dateE` date NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `date_event` date NOT NULL,
  `lieu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `nom`, `code`, `date_event`, `lieu`) VALUES
(2, 'hackthon', '2020', '2020-02-22', 'esprit'),
(5, 'Geek Land', 'sds4', '2019-11-06', 'Tunis '),
(6, 'Night Folk', 'sdq8', '2019-11-14', 'La Marsa');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(30) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `size` int(20) NOT NULL,
  `width` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `type` varchar(6) NOT NULL,
  `lien` varchar(30) NOT NULL,
  `id_event` int(30) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `nom`, `size`, `width`, `height`, `type`, `lien`, `id_event`) VALUES
(3, 'night 1', 160, 400, 600, 'png', 'img/gallery/10.png', 6),
(5, 'night 3', 645, 654, 448, 'png', 'img/gallery/8.png', 6),
(6, 'night 4', 64, 84, 488, 'png', 'img/gallery/7.png', 6),
(7, 'night 5', 654, 484, 644, 'png', 'img/gallery/6.png', 6),
(8, 'night 6', 545, 545, 545, 'png', 'img/gallery/5.png', 6),
(9, 'night 7', 534, 545, 545, 'png', 'img/gallery/4.png', 6);

-- --------------------------------------------------------

--
-- Structure de la table `like_unlike`
--

DROP TABLE IF EXISTS `like_unlike`;
CREATE TABLE IF NOT EXISTS `like_unlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `postid` (`postid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `userid`, `postid`, `type`, `timestamp`) VALUES
(22, 40, 3, 1, '2019-12-12 13:35:51'),
(23, 40, 6, 0, '2019-12-12 13:35:40'),
(24, 42, 3, 0, '2020-01-14 11:00:25');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `total` float NOT NULL,
  `dateP` date NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `referance` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `code_barre` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`referance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`referance`, `nom`, `prix`, `code_barre`, `categorie`, `quantite`, `img`, `description`) VALUES
(1, 'album photo', 10, 1, 'decoration ', 5, 'album_photo', ''),
(2, 'cadre photo', 5, 2, 'decoration mural ', 15, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `profile_img` int(1) DEFAULT NULL,
  `bio` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nb_reservation` int(5) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service1`
--

DROP TABLE IF EXISTS `service1`;
CREATE TABLE IF NOT EXISTS `service1` (
  `id_service` int(255) NOT NULL AUTO_INCREMENT,
  `type_service` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `features` varchar(255) NOT NULL,
  `nom_offre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=78966 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service1`
--

INSERT INTO `service1` (`id_service`, `type_service`, `prix`, `features`, `nom_offre`) VALUES
(55555, 'party', 5000, 'barcha fazet', 'khaled'),
(15001, 'marriage', 1500, '1000 photos + 3H video', 'offre'),
(15155, 'azzabi', 5555, 'hamza lebes lunette', 'hamza'),
(11356, 'marriage', 562, 'pc ahmer +khaled rassou youja3 yhab yamel poli rithme ', 'polaroid'),
(14445, 'marriage', 1500, 'camera drone + video 4k', 'service');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(9) NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `dateT` date NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id_trans`, `id_client`, `nom_client`, `dateT`, `total`) VALUES
(6, '40', 'linda', '2019-12-12', 15),
(7, '38', 'hamza', '2020-01-10', 10),
(5, '38', 'hamza', '2019-12-12', 60),
(8, '42', 'hamza', '2020-01-13', 40),
(9, '42', 'hamza', '2020-01-14', 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_idevent` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD CONSTRAINT `fk_postid` FOREIGN KEY (`postid`) REFERENCES `image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userid`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
