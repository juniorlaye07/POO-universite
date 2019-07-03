-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 02 juil. 2019 à 22:53
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE `Batiment` (
  `NomBat` varchar(255) NOT NULL,
  `Id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Batiment`
--

INSERT INTO `Batiment` (`NomBat`, `Id_batiment`) VALUES
('B07', 4),
('AXT', 5),
('C19', 6),
('D04', 7),
('E36', 8);

-- --------------------------------------------------------

--
-- Structure de la table `Boursiers`
--

CREATE TABLE `Boursiers` (
  `Id_Etudiant` int(11) NOT NULL,
  `Id_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Boursiers`
--

INSERT INTO `Boursiers` (`Id_Etudiant`, `Id_Type`) VALUES
(158, 2),
(159, 1),
(160, 2),
(161, 2),
(162, 2),
(163, 2),
(164, 1),
(166, 2),
(168, 2),
(172, 2),
(176, 1),
(177, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Chambre`
--

CREATE TABLE `Chambre` (
  `Id_batiment` int(11) NOT NULL,
  `NChambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Chambre`
--

INSERT INTO `Chambre` (`Id_batiment`, `NChambre`) VALUES
(4, 106),
(5, 10),
(6, 12),
(6, 70),
(7, 94),
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `Id_Etudiant` int(11) NOT NULL,
  `Matricule` varchar(100) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Etudiant`
--

INSERT INTO `Etudiant` (`Id_Etudiant`, `Matricule`, `Nom`, `Prenom`, `Tel`, `Email`, `Date_naissance`) VALUES
(158, '47959', 'Ndour', 'SafiÃ¨tou', 777941094, 'safir@gmail.com', '2012-12-06'),
(159, '20930', 'Ndour', 'Rokhaya', 770382518, 'khaya18@yahoo.fr', '2010-05-04'),
(160, '27778', 'Ndour', 'Mouhamed', 778965412, 'mond@live.fr', '2000-07-08'),
(161, '18067', 'Ndour', 'Salimata', 784125412, 'sal09@gmail.com', '2009-06-02'),
(162, '14928', 'fall', 'Sokhna', 701236585, 'fallsa@gmail.com', '1987-02-09'),
(163, '69221', 'Ngom', 'Abdoulaye', 776418887, 'ngom9118@gmail.com', '1992-04-04'),
(164, '2304', 'Faye', 'Maman', 772589632, 'mamzy@yahoo.fr', '2007-06-03'),
(165, '47879', 'Faye', 'Ouseynou', 771132325, 'ouz13@gmail.com', '2016-12-01'),
(166, '37978', 'Ngom', 'Mariama', 772918604, 'mayajolie02@gmail.com', '1995-01-28'),
(167, '27622', 'Diongue', 'Maman Diara', 776931524, 'diara9623@gmail.com', '1998-11-24'),
(168, '48308', 'Diagne', 'Rokhaya', 776541285, 'diagndj@live.fr', '1996-04-07'),
(169, '24119', 'Diongue', 'Birahim', 774596312, 'gbsn@yahoo.fr', '1997-06-15'),
(170, '20446', 'Diouf', 'Ibrahima', 769541236, 'gndu@yahoo.fr', '1999-08-29'),
(171, '23011', 'Ndiaye', 'Mamadou', 789456312, 'ndygb@gmail.com', '1989-12-07'),
(172, '26544', 'GUEYE', 'Sadikh', 774228863, 'gueyeabou@gmail.com', '2002-11-22'),
(173, '19692', 'Ndir', 'Betty', 781736518, 'ndirsabi@gmail.com', '2000-02-13'),
(174, '53753', 'Dia', 'Nabou', 789645210, 'diamomo@yahoo.fr', '1994-01-07'),
(175, '33680', 'Ngom', 'Sokhna', 781191843, 'bebesokh@gmail.com', '2016-05-12'),
(176, '32264', 'Diallo', 'Oulimata', 784563210, 'dial098@gmail.com', '1998-08-31'),
(177, '63521', 'Ngom', 'Mamadou', 778524561, 'momo50@yahoo.fr', '1990-08-17');

-- --------------------------------------------------------

--
-- Structure de la table `Loger`
--

CREATE TABLE `Loger` (
  `Id_Etudiant` int(11) NOT NULL,
  `NChambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Loger`
--

INSERT INTO `Loger` (`Id_Etudiant`, `NChambre`) VALUES
(159, 10),
(162, 10),
(176, 12),
(158, 70),
(160, 70),
(163, 70),
(166, 70),
(177, 94),
(168, 106);

-- --------------------------------------------------------

--
-- Structure de la table `Non_boursier`
--

CREATE TABLE `Non_boursier` (
  `Id_Etudiant` int(11) NOT NULL,
  `Adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Non_boursier`
--

INSERT INTO `Non_boursier` (`Id_Etudiant`, `Adresse`) VALUES
(165, 'Parcelles Assainie KM'),
(167, 'Gossass'),
(169, 'Fatick'),
(170, 'Kaolack'),
(171, 'Diourbel'),
(173, 'Thies'),
(174, 'Scalle'),
(175, 'Parcelles Assainie');

-- --------------------------------------------------------

--
-- Structure de la table `TypeB`
--

CREATE TABLE `TypeB` (
  `Id_Type` int(11) NOT NULL,
  `Libelle` varchar(255) NOT NULL,
  `Montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TypeB`
--

INSERT INTO `TypeB` (`Id_Type`, `Libelle`, `Montant`) VALUES
(1, 'Demi', 20000),
(2, 'Entier', 40000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
  ADD PRIMARY KEY (`Id_batiment`);

--
-- Index pour la table `Boursiers`
--
ALTER TABLE `Boursiers`
  ADD PRIMARY KEY (`Id_Etudiant`,`Id_Type`),
  ADD KEY `Id_Etudiant` (`Id_Etudiant`),
  ADD KEY `Boursiers_ibfk_2` (`Id_Type`);

--
-- Index pour la table `Chambre`
--
ALTER TABLE `Chambre`
  ADD PRIMARY KEY (`NChambre`),
  ADD KEY `Id_batiment` (`Id_batiment`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`Id_Etudiant`),
  ADD UNIQUE KEY `Matricule` (`Matricule`),
  ADD UNIQUE KEY `Tel` (`Tel`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `Loger`
--
ALTER TABLE `Loger`
  ADD PRIMARY KEY (`Id_Etudiant`),
  ADD KEY `NChambre` (`NChambre`);

--
-- Index pour la table `Non_boursier`
--
ALTER TABLE `Non_boursier`
  ADD PRIMARY KEY (`Id_Etudiant`),
  ADD KEY `Id_Etudiant` (`Id_Etudiant`);

--
-- Index pour la table `TypeB`
--
ALTER TABLE `TypeB`
  ADD PRIMARY KEY (`Id_Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Batiment`
--
ALTER TABLE `Batiment`
  MODIFY `Id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Chambre`
--
ALTER TABLE `Chambre`
  MODIFY `NChambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `Id_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT pour la table `TypeB`
--
ALTER TABLE `TypeB`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Boursiers`
--
ALTER TABLE `Boursiers`
  ADD CONSTRAINT `Boursiers_ibfk_1` FOREIGN KEY (`Id_Etudiant`) REFERENCES `Etudiant` (`Id_Etudiant`),
  ADD CONSTRAINT `Boursiers_ibfk_2` FOREIGN KEY (`Id_Type`) REFERENCES `TypeB` (`Id_Type`);

--
-- Contraintes pour la table `Chambre`
--
ALTER TABLE `Chambre`
  ADD CONSTRAINT `Chambre_ibfk_1` FOREIGN KEY (`Id_batiment`) REFERENCES `Batiment` (`Id_batiment`);

--
-- Contraintes pour la table `Loger`
--
ALTER TABLE `Loger`
  ADD CONSTRAINT `Loger_ibfk_1` FOREIGN KEY (`Id_Etudiant`) REFERENCES `Etudiant` (`Id_Etudiant`),
  ADD CONSTRAINT `Loger_ibfk_2` FOREIGN KEY (`NChambre`) REFERENCES `Chambre` (`NChambre`);

--
-- Contraintes pour la table `Non_boursier`
--
ALTER TABLE `Non_boursier`
  ADD CONSTRAINT `Non_boursier_ibfk_1` FOREIGN KEY (`Id_Etudiant`) REFERENCES `Etudiant` (`Id_Etudiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
