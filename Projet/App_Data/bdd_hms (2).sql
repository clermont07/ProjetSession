-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 jan. 2022 à 04:31
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
  `MotDePasse` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`idEmployer`, `idDepartement`, `idHopital`, `idPoste`, `Nom`, `Prenom`, `Courriel`, `Photo`, `Pseudo`, `MotDePasse`) VALUES
(1, 6, 1, 3, 'Tremblay', 'Sara', 'sara@hotmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuWkdf_BSXN0mgbLuL-oZFlBZePWgLAbSX4w&usqp=CAU', 'sarasara', 'eBHPoBiIhI0vf7DfBb8XZt9DZ2PhwqMqu1yuMeNRqc5yVm8rW26NxBhXhAfn13IgGt7u18uZzdccBcKIkWvt9w=='),
(2, 10, 2, 2, 'admin', 'admin', 'Admin@hotmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQD6-JhRPAx1Q0nw93zTfAth-DqzDe1HyVB8g&usqp=CAU', 'administration', '0ZKfdJ/g8vvqVucthp+VtGtHxPA+D1/0JBqpVyMp0E+tGAYw8O/7laQQL6wS9zXUT5unxUfUlru98EVGNy+E8w=='),
(3, 3, 1, 1, 'Vallaint', 'Thomas', 'tomma@hotmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMzqS2wZVVyZET3UCJWdM6pmvXEf45NTLLqQ&usqp=CAU', 'medecin', '73a7s0YLUYBv1bTAaVmSz3O8BV/0qBIe64Bxcz0HgqvGXz5YEc31CW2m0K65Dwdaa6DKBwfnZpEkxz0KG9ka0Q=='),
(4, 3, 2, 1, 'Bond', 'James', 'James@hotmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSesoud9TnInRAk-o4cu7Mi-wGg-AaTylfK-Q&usqp=CAU', 'medecin1', 'Ik16lmv+DxMUq8xjggzBOJX0qWyvQsWmDdqG8Fr2h4sdcnSmWqOwD/TitkhjBPOj0xN9iGYSSmevq3bfi/cSCg==');

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
  `PrixTotal` double NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idHopital` int(11) NOT NULL,
  `idEmployer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `Date`, `Tps`, `Tvq`, `AvantTaxe`, `PrixTotal`, `idPatient`, `idHopital`, `idEmployer`) VALUES
(2, '2021-12-24', 25, 50, 500, 575, 13, 1, 3),
(4, '2021-12-28', 25, 50, 500, 575, 14, 1, 3);

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
(1, 'Cité-de-la-Santé', '1755 Bd René-Laennec', 'Laval', ' H7M3L9', '4506681010', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx2yjpzLYQsp9SsQmudqFYbIYUhi2GKV1MmA&usqp=CAU'),
(2, 'Sacré-Cœur de Montréal', '5400 Boul Gouin O', 'Montréal', 'H4J1C5', '5143382222', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSk-6fLcnTH79n5nZdKOatXVH03CM-E8QToA&usqp=CAU'),
(3, 'Maisonneuve-Rosemont', '5415 Assumption Blvd', 'Montreal', 'H1T2M4', '5142523400', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTK-mGYWrjoNDViJ0tI2O4_T5GLyavAYH9EaQ&usqp=CAU'),
(4, 'Jean-Talon', '1385 Rue Jean-Talon E', 'Montréal', 'H2E1S6', '5144956767', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs4-bSBuSt16zPGXQrOQN_B5pUR6Ze1jUfIQ&usqp=CAU');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `idGrpSang` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `DateNaissance` date NOT NULL,
  `PaysNaissance` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `AssuranceMaladie` varchar(20) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `MotDePasse` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`idPatient`, `idSexe`, `idGrpSang`, `Nom`, `Prenom`, `Telephone`, `DateNaissance`, `PaysNaissance`, `Adresse`, `CodePostal`, `Ville`, `Description`, `AssuranceMaladie`, `Pseudo`, `MotDePasse`) VALUES
(13, 3, 7, 'clermont', 'Yanick', '4507753732', '2021-12-01', 'canada', '7275 rue andre-breton', 'A1B1B1', 'laval', 'Douleur a la tete', 'CLEY12345678', 'yanick', 'f3MCnzvKt2Y/vS3vjXlirLE+gSFjkWpTHoUiPoxieD5tauc0aKIPxHTYdbxxCBWPOGfr/X5aS+jGr4sfGHpL9A=='),
(14, 2, 1, 'Phil', 'Bernard', '4506634321', '2000-05-12', 'Canada', '1100 rue  montreal', 'X1X1X1', 'montreal', 'crampe ', 'BERP12345666', 'cococo', '/TbZ9lvGnk4AFbhMfD6M/GltMwZsBS5bajJDFRMjDCrcxlxreNrMUH5O8RzBPG4LuAkS1iRVaDc8DYqJO9EZzg==');

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
(2, 'Administrateur'),
(3, 'Infirmiere'),
(1, 'Medecin');

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

CREATE TABLE `prescription` (
  `idPrescription` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(500) NOT NULL,
  `idHopital` int(11) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prescription`
--

INSERT INTO `prescription` (`idPrescription`, `Date`, `Description`, `idHopital`, `idEmployer`, `idPatient`) VALUES
(1, '2021-12-21', 'vaccin covid', 1, 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `idShedule` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `idRendezvous` int(11) NOT NULL,
  `idHopital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`idShedule`, `idPatient`, `idEmployer`, `idRendezvous`, `idHopital`) VALUES
(8, 14, 3, 1, 1),
(8, 13, 3, 29, 1),
(3, 13, 1, 38, 1);

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
(2, 'Autre'),
(1, 'Femme'),
(3, 'Homme');

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
  `Disponibilite` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `shedule`
--

INSERT INTO `shedule` (`idShedule`, `Jour`, `NoEmployer`, `Shedule`, `Frais`, `maxPatient`, `cmpPatient`, `Disponibilite`) VALUES
(1, '2021-12-20', '1', '9 AM à 1 PM', 300, 5, 5, 1),
(3, '2021-12-19', '1', '1 AM à 1 AM', 999, 4, 3, 1),
(8, '2021-12-21', '3', '1 AM à 1 AM', 500, 4, 2, 1),
(15, '2021-12-30', '3', '5 PM à 7 PM', 566, 3, 3, 1);

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
  ADD UNIQUE KEY `Courriel` (`Courriel`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`);

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
  ADD UNIQUE KEY `AssuranceMaladie` (`AssuranceMaladie`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`);

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
  ADD PRIMARY KEY (`idRendezvous`);

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
  MODIFY `idDepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `idEmployer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `idPoste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `idPrescription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `idRendezvous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `idSexe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `shedule`
--
ALTER TABLE `shedule`
  MODIFY `idShedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
