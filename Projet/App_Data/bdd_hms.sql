-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 déc. 2021 à 20:10
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_hms`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `idDepartement` int(11) NOT NULL,
  `Departement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `Departement`) VALUES
(10, 'Administration'),
(1, 'Anesthésiologie'),
(2, 'Chirurgie'),
(4, 'Imagerie Médicale'),
(3, 'Médecine'),
(5, 'Médecine Générale'),
(6, 'Médecine Urgence '),
(7, 'Obstétrique et de Gynécologie'),
(8, 'Pédiatrie'),
(9, 'Pharmacie');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `idEmployer` int(11) NOT NULL,
  `idDepartement` int(11) NOT NULL,
  `idHopital` int(11) NOT NULL,
  `idPoste` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Courriel` varchar(100) NOT NULL,
  `Photo` varchar(500) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `MotDePasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idFacture` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Tps` double NOT NULL,
  `Tvq` double NOT NULL,
  `AvantTaxe` double NOT NULL,
  `PrixTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupesanguin`
--

CREATE TABLE `groupesanguin` (
  `idGrpSang` int(11) NOT NULL,
  `GroupeSanguin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupesanguin`
--

INSERT INTO `groupesanguin` (`idGrpSang`, `GroupeSanguin`) VALUES
(1, 'A+'),
(2, 'A-'),
(7, 'AB+'),
(8, 'AB-'),
(3, 'B+'),
(4, 'B-'),
(5, 'O+'),
(6, 'O-');

-- --------------------------------------------------------

--
-- Structure de la table `hopital`
--

CREATE TABLE `hopital` (
  `idHopital` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hopital`
--

INSERT INTO `hopital` (`idHopital`, `Nom`, `Adresse`, `Ville`, `CodePostal`, `Telephone`, `Photo`) VALUES
(1, 'Hôpital de la Cité-de-la-Santé', '1755 Bd René-Laennec', 'Laval', ' H7M 3L9', '(450) 668-1010', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx2yjpzLYQsp9SsQmudqFYbIYUhi2GKV1MmA&usqp=CAU'),
(2, 'Hôpital du Sacré-Cœur de Montréal', '5400 Boul Gouin O', 'Montréal', 'H4J 1C5', '(514) 338-2222', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSk-6fLcnTH79n5nZdKOatXVH03CM-E8QToA&usqp=CAU'),
(3, 'Hôpital Maisonneuve-Rosemont', '5415 Assumption Blvd', 'Montreal', 'H1T 2M4', '(514) 252-3400', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK-mGYWrjoNDViJ0tI2O4_T5GLyavAYH9EaQ&usqp=CAU'),
(4, 'Hôpital Jean-Talon', '1385 Rue Jean-Talon E', 'Montréal', 'H2E 1S6', '(514) 495-6767', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs4-bSBuSt16zPGXQrOQN_B5pUR6Ze1jUfIQ&usqp=CAU');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `idGrpSang` int(11) NOT NULL,
  `idPrescription` int(11) NOT NULL,
  `idFacture` int(11) NOT NULL,
  `idHopital` int(11) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `DateNaissance` date NOT NULL,
  `PaysNaissance` date NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `AssuranceMaladie` bigint(20) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `MotDePasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `idPoste` int(11) NOT NULL,
  `Poste` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`idPoste`, `Poste`) VALUES
(2, 'administrateur'),
(3, 'infirmiere'),
(1, 'Medecin');

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

CREATE TABLE `prescription` (
  `idPrescription` int(11) NOT NULL,
  `Date` date NOT NULL,
  `idPosologie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `idShedule` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `idSexe` int(11) NOT NULL,
  `Genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idSexe`, `Genre`) VALUES
(3, 'Autre'),
(1, 'Femme'),
(2, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `shedule`
--

CREATE TABLE `shedule` (
  `idShedule` int(11) NOT NULL,
  `Jour` date NOT NULL,
  `NoEmployer` varchar(30) NOT NULL,
  `Shedule` varchar(30) NOT NULL,
  `Frais` double NOT NULL,
  `maxPatient` int(11) NOT NULL,
  `cmpPatient` int(11) NOT NULL,
  `Disponibilite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`idDepartement`),
  ADD UNIQUE KEY `departement` (`Departement`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`idEmployer`),
  ADD UNIQUE KEY `Courriel` (`Courriel`,`Pseudo`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFacture`);

--
-- Index pour la table `groupesanguin`
--
ALTER TABLE `groupesanguin`
  ADD PRIMARY KEY (`idGrpSang`),
  ADD UNIQUE KEY `GroupeSanguin` (`GroupeSanguin`);

--
-- Index pour la table `hopital`
--
ALTER TABLE `hopital`
  ADD PRIMARY KEY (`idHopital`),
  ADD UNIQUE KEY `Nom` (`Nom`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD KEY `AssuranceMaladie` (`AssuranceMaladie`,`Pseudo`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`idPoste`),
  ADD UNIQUE KEY `Poste` (`Poste`);

--
-- Index pour la table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`idPrescription`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`idShedule`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`idSexe`),
  ADD UNIQUE KEY `Genre` (`Genre`);

--
-- Index pour la table `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`idShedule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `idDepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `idEmployer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupesanguin`
--
ALTER TABLE `groupesanguin`
  MODIFY `idGrpSang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `hopital`
--
ALTER TABLE `hopital`
  MODIFY `idHopital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `idPoste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `idPrescription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `idSexe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `shedule`
--
ALTER TABLE `shedule`
  MODIFY `idShedule` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
