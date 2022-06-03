-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 juin 2022 à 09:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddstln`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `nomadmin` varchar(100) NOT NULL,
  `motdepasseadmin` varchar(100) NOT NULL,
  PRIMARY KEY (`nomadmin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`nomadmin`, `motdepasseadmin`) VALUES
('5ed0594eacf7db9431919e714cf153803cb62dd7', '9195f873d1715b7575f88118db6dc42a91137874');

-- --------------------------------------------------------

--
-- Structure de la table `appareil_photo`
--

DROP TABLE IF EXISTS `appareil_photo`;
CREATE TABLE IF NOT EXISTS `appareil_photo` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `casque_vr`
--

DROP TABLE IF EXISTS `casque_vr`;
CREATE TABLE IF NOT EXISTS `casque_vr` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `coffre`
--

DROP TABLE IF EXISTS `coffre`;
CREATE TABLE IF NOT EXISTS `coffre` (
  `id` int(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `fichier` varchar(200) NOT NULL,
  PRIMARY KEY (`fichier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

DROP TABLE IF EXISTS `console`;
CREATE TABLE IF NOT EXISTS `console` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `laptop`
--

DROP TABLE IF EXISTS `laptop`;
CREATE TABLE IF NOT EXISTS `laptop` (
  `id` int(200) NOT NULL,
  `marque` varchar(200) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `id_modele` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `motdepasse` text NOT NULL,
  `genre` varchar(20) NOT NULL,
  `num` text NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirme` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `genre`, `num`, `confirmkey`, `confirme`) VALUES
(1, 'Rebiai Achraf', 'rebiaiachref@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Homme', '0675873738', '2', 'OK');

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

DROP TABLE IF EXISTS `moto`;
CREATE TABLE IF NOT EXISTS `moto` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_moto` varchar(40) NOT NULL,
  `num_chassis` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `matricule` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_chassis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id` int(100) NOT NULL,
  `nature` varchar(100) NOT NULL,
  `num_s` varchar(100) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `justificatif` varchar(100) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `smart_watch`
--

DROP TABLE IF EXISTS `smart_watch`;
CREATE TABLE IF NOT EXISTS `smart_watch` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `imei` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`imei`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tablette`
--

DROP TABLE IF EXISTS `tablette`;
CREATE TABLE IF NOT EXISTS `tablette` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` text NOT NULL,
  `emei` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`emei`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE IF NOT EXISTS `telephone` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `nom_appareil` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` text NOT NULL,
  `emei` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`emei`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tv`
--

DROP TABLE IF EXISTS `tv`;
CREATE TABLE IF NOT EXISTS `tv` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `typeTV` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `taille` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

DROP TABLE IF EXISTS `velo`;
CREATE TABLE IF NOT EXISTS `velo` (
  `id` int(200) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `type_velo` varchar(40) NOT NULL,
  `num_s` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(200) NOT NULL,
  `marque` varchar(200) NOT NULL,
  `nom_voiture` varchar(40) NOT NULL,
  `num_chassis` varchar(200) NOT NULL,
  `couleur` varchar(40) NOT NULL,
  `matricule` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `justificatif` varchar(200) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  PRIMARY KEY (`num_chassis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
