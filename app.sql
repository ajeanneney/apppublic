-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 fév. 2021 à 16:15
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

DROP TABLE IF EXISTS `bilan`;
CREATE TABLE IF NOT EXISTS `bilan` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idpatient` int(255) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idpatient_bilan` (`idpatient`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bilan`
--

INSERT INTO `bilan` (`id`, `idpatient`, `timestamp`, `text`) VALUES
(1, 2, '2020-10-31 23:00:00.000000', '2Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 1, '2020-11-03 23:00:00.000000', '1Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 3, '2020-10-31 23:00:00.000000', '3Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 2, '2021-01-30 22:56:43.940632', 'Michel se porte bien, sa fréquence cardiaque est bonne et il réagit très bien aux différents tests.');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `iduser` int(255) NOT NULL,
  `idpatient` int(255) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iduser_famille` (`iduser`),
  KEY `fk_idpatient_famille` (`idpatient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `iduser`, `idpatient`, `nom`, `prenom`) VALUES
(1, 4, 2, 'DRUCKER', 'Family'),
(2, 5, 1, 'le DU', 'Family'),
(3, 6, 3, 'Halliday', 'Family');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `reponse` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `reponse`) VALUES
(1, 'Comment poser une question ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.'),
(2, 'A quelle fréquence sont réalisées les mesures sur les patients ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. ouiouiooui'),
(3, 'Comment modifier son mot de passse ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. ouiouiooui'),
(4, 'J\'ai perdu mot de passe, que faire?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. ouiouiooui'),
(5, 'Comment poser une question ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.'),
(6, 'Yes la question 2?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. ouiouiooui'),
(7, 'ajout question', 'ceci est une question'),
(8, 'Test', 'repondetest'),
(9, 'question', 'faq'),
(10, 'question', 'reponse'),
(11, 'question', 'reponse');

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `iduser` int(255) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iduser_gestionnaire` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id`, `iduser`, `nom`, `prenom`) VALUES
(1, 1, 'Sebastien', 'Patrick');

-- --------------------------------------------------------

--
-- Structure de la table `gestion_capteur`
--

DROP TABLE IF EXISTS `gestion_capteur`;
CREATE TABLE IF NOT EXISTS `gestion_capteur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(255) NOT NULL,
  `idcapteur` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestion_capteur`
--

INSERT INTO `gestion_capteur` (`id`, `fonction`, `idcapteur`, `idpatient`, `msg`) VALUES
(1, 'cardiaque', 5, 1, 'oui'),
(2, 'cardiaque', 5, 3, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idDest` int(255) NOT NULL,
  `idExpd` int(255) NOT NULL,
  `Message` text COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `iduser` int(255) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iduser_medecin` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `iduser`, `nom`, `prenom`) VALUES
(1, 2, 'Lefeuvre', 'Kelig'),
(2, 3, 'Raoult', 'Didier');

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

DROP TABLE IF EXISTS `mesure`;
CREATE TABLE IF NOT EXISTS `mesure` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idpatient` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donnee` int(255) NOT NULL,
  `date` int(255) NOT NULL DEFAULT current_timestamp(),
  `idcapteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idpatient_mesure` (`idpatient`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `mesure`
--

INSERT INTO `mesure` (`id`, `idpatient`, `type`, `donnee`, `date`, `idcapteur`) VALUES
(1, 1, 'visuel', 98, 1501048673, 1),
(2, 1, 'cardiaque', 116, 1501073673, 1),
(3, 1, 'sonore', 97, 1501098673, 2),
(4, 1, 'visuel', 91, 1501123673, 1),
(5, 1, 'cardiaque', 104, 1501148673, 3),
(6, 1, 'sonore', 78, 1501173673, 5),
(7, 1, 'visuel', 98, 1501198673, 1),
(8, 1, 'cardiaque', 103, 1501223673, 1),
(9, 1, 'sonore', 110, 1501248673, 1),
(10, 1, 'visuel', 84, 1501273673, 1),
(11, 1, 'cardiaque', 63, 1501298673, 2),
(12, 1, 'sonore', 76, 1501323673, 2),
(13, 1, 'visuel', 109, 1501348673, 1),
(14, 1, 'cardiaque', 94, 1501373673, 5),
(15, 1, 'sonore', 103, 1501398673, 5),
(16, 1, 'visuel', 100, 1501423673, 1),
(17, 1, 'cardiaque', 91, 1501448673, 2),
(18, 1, 'sonore', 80, 1501473673, 2),
(19, 1, 'visuel', 117, 1501498673, 1),
(20, 1, 'cardiaque', 89, 1501523673, 1),
(21, 1, 'sonore', 96, 1501548673, 0),
(22, 1, 'visuel', 69, 1501573673, 2),
(23, 1, 'cardiaque', 84, 1501598673, 1),
(24, 1, 'sonore', 119, 1501623673, 1),
(25, 1, 'visuel', 93, 1501648673, 1),
(26, 1, 'cardiaque', 113, 1501673673, 1),
(27, 1, 'sonore', 101, 1501698673, 1),
(28, 1, 'visuel', 74, 1501723673, 1),
(29, 1, 'cardiaque', 79, 1501748673, 1),
(30, 1, 'sonore', 70, 1501773673, 2),
(31, 1, 'visuel', 100, 1501798673, 2),
(32, 1, 'cardiaque', 106, 1501823673, 2),
(33, 1, 'sonore', 107, 1501848673, 2),
(34, 1, 'visuel', 98, 1501873673, 2),
(35, 1, 'cardiaque', 62, 1501898673, 3),
(36, 1, 'sonore', 67, 1501923673, 3),
(37, 1, 'visuel', 65, 1501948673, 3),
(38, 1, 'cardiaque', 81, 1501973673, 5),
(39, 1, 'sonore', 72, 1501998673, 5),
(40, 1, 'visuel', 80, 1502023673, 6),
(41, 1, 'cardiaque', 92, 1502048673, 4),
(42, 1, 'sonore', 115, 1502073673, 4),
(43, 1, 'visuel', 91, 1502098673, 4),
(44, 1, 'cardiaque', 108, 1502123673, 4),
(45, 1, 'sonore', 78, 1502148673, 2),
(46, 1, 'visuel', 70, 1502173673, 2),
(47, 1, 'cardiaque', 84, 1502198673, 2),
(48, 1, 'sonore', 96, 1502223673, 1),
(49, 1, 'visuel', 86, 1502248673, 1),
(50, 1, 'cardiaque', 112, 1502273673, 1),
(51, 1, 'sonore', 98, 1502298673, 1),
(52, 1, 'visuel', 111, 1502323673, 1),
(53, 1, 'cardiaque', 85, 1502348673, 1),
(54, 1, 'sonore', 73, 1502373673, 1),
(55, 1, 'visuel', 106, 1502398673, 1),
(56, 1, 'cardiaque', 80, 1502423673, 1),
(57, 1, 'sonore', 106, 1502448673, 1),
(58, 1, 'visuel', 109, 1502473673, 1),
(59, 1, 'cardiaque', 116, 1502498673, 1),
(60, 1, 'sonore', 118, 1502523673, 3),
(61, 1, 'visuel', 93, 1502548673, 3),
(62, 1, 'cardiaque', 78, 1502573673, 3),
(63, 1, 'sonore', 66, 1502598673, 3),
(64, 1, 'visuel', 115, 1502623673, 3),
(65, 1, 'cardiaque', 115, 1502648673, 3),
(66, 1, 'sonore', 110, 1502673673, 33),
(67, 1, 'visuel', 63, 1502698673, 3),
(68, 1, 'cardiaque', 108, 1502723673, 3),
(69, 1, 'sonore', 114, 1502748673, 3),
(70, 1, 'visuel', 96, 1502773673, 3),
(71, 1, 'cardiaque', 105, 1502798673, 3),
(72, 1, 'sonore', 64, 1502823673, 4),
(73, 1, 'visuel', 95, 1502848673, 4),
(74, 1, 'cardiaque', 103, 1502873673, 4),
(75, 1, 'sonore', 77, 1502898673, 4),
(76, 1, 'visuel', 83, 1502923673, 4),
(77, 1, 'cardiaque', 105, 1502948673, 4),
(78, 1, 'sonore', 107, 1502973673, 4),
(79, 1, 'visuel', 86, 1502998673, 4),
(80, 2, 'cardiaque', 108, 1503023673, 4),
(81, 2, 'sonore', 71, 1503048673, 4),
(82, 2, 'visuel', 105, 1503073673, 4),
(83, 2, 'cardiaque', 107, 1503098673, 4),
(84, 2, 'sonore', 82, 1503123673, 4),
(85, 2, 'visuel', 73, 1503148673, 4),
(86, 2, 'cardiaque', 78, 1503173673, 4),
(87, 2, 'sonore', 95, 1503198673, 4),
(88, 2, 'visuel', 114, 1503223673, 4),
(89, 2, 'cardiaque', 93, 1503248673, 4),
(90, 2, 'sonore', 115, 1503273673, 4),
(91, 2, 'visuel', 81, 1503298673, 4),
(92, 2, 'cardiaque', 93, 1503323673, 4),
(93, 2, 'sonore', 97, 1503348673, 2),
(94, 2, 'visuel', 110, 1503373673, 4),
(95, 2, 'cardiaque', 63, 1503398673, 3),
(96, 2, 'sonore', 109, 1503423673, 3),
(97, 2, 'visuel', 98, 1503448673, 3),
(98, 2, 'cardiaque', 97, 1503473673, 3),
(99, 2, 'sonore', 81, 1503498673, 0),
(100, 2, 'visuel', 69, 1503523673, 3);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idmedecin` int(255) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  `pastille` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idmedecin_patient` (`idmedecin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `idmedecin`, `nom`, `prenom`, `naissance`, `pastille`) VALUES
(1, 1, 'le DU', 'Valentin', '1990-11-20', 'red'),
(2, 2, 'DRUCKER', 'Michel', '1920-06-20', 'green'),
(3, 2, 'HALLIDAY', 'Johnny', '2000-11-20', 'red');

-- --------------------------------------------------------

--
-- Structure de la table `reset_mdp`
--

DROP TABLE IF EXISTS `reset_mdp`;
CREATE TABLE IF NOT EXISTS `reset_mdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `selecteur` text NOT NULL,
  `token` longtext NOT NULL,
  `expiration` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `role`) VALUES
(1, 'gest', '$2y$10$5tRQ6RGDZG6RWL8kQKAw4uljwEc554QjoEK0k6EnR6vneXMNFreCW', 'gestionnaire'),
(2, 'medecin', '$2y$10$FWc5MkM1WTcvpLPre/GHYelyYP2wypDacMnhjvX1KICJLm8WeBt/2', 'medecin'),
(3, 'medecin2', '$2y$10$1fH9mngf/5ktgVbFIK9u7OF/NW/UZhw9ZwOBddS/UZMfKpwKIZ812', 'medecin'),
(4, 'famille', '$2y$10$0Ba./l04QRaPB22NJ6mLXOcj25FeGzoPN.cSqlUSZJ6qlvGc1WFbe', 'famille'),
(5, 'famille2', '$2y$10$lXCD2qn34yJM9bF1XBWaD.V2IsCk6o6zVhWZS.2sSdDX9BOv1tgF6', 'famille'),
(6, 'famille3', '$2y$10$N2IqrCdI.fy235rBy26E6u.sTaeZEFMhIl4t6RjmcgNe5ZFT6Fdri', 'famille');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bilan`
--
ALTER TABLE `bilan`
  ADD CONSTRAINT `fk_idpatient_bilan` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `fk_idpatient_famille` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iduser_famille` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD CONSTRAINT `fk_iduser_gestionnaire` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `fk_iduser_medecin` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `fk_idpatient_mesure` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`id`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_idmedecin_patient` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
