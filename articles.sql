-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Février 2016 à 19:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `articles`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cont_article` varchar(25500) NOT NULL,
  `titre_article` text CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `chemin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `cont_article`, `titre_article`, `chemin`) VALUES
(20, 'Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, \r\nomnis nostrorum imperatorum, omnis exterarum gentium \r\npotentissimorumque populorum, omnis clarissimorum regum res gestas, cum \r\ntuis nec contentionum magnitudine nec numero proeliorum nec varietate \r\nregionum nec celeritate conficiendi nec dissimilitudine bellorum posse \r\nconferri; nec vero disiunctissimas terras citius passibus cuiusquam potuisse \r\nperagrari, quam tuis non dicam cursibus, sed victoriis lustratae sunt.\r\n\r\nOb haec et huius modi multa, quae cernebantur in paucis, omnibus timeri \r\nsunt coepta. et ne tot malis dissimulatis paulatimque serpentibus acervi \r\ncrescerent aerumnarum, nobilitatis decreto legati mittuntur: Praetextatus ex \r\nurbi praefecto et ex vicario Venustus et ex consulari Minervius oraturi, ne \r\ndelictis supplicia sint grandiora, neve senator quisquam inusitato et inlicito \r\nmore tormentis exponeretur.', 'Article 1 :  nferririte rrie ', '1455620195.jpg'),
(21, 'Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, \r\nquod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde \r\naetatem ingressus adultam post multiplices bellorum aerumnas Alpes \r\ntranscendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis \r\nambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et \r\nnomine solo aliquotiens vincens ad tranquilliora vitae discessit.\r\n\r\nHaec dum oriens diu perferret, caeli reserato tepore Constantius consulatu \r\nsuo septies et Caesaris ter egressus Arelate Valentiam petit, in Gundomadum \r\net Vadomarium fratres Alamannorum reges arma moturus, quorum crebris \r\nexcursibus vastabantur confines limitibus terrae Gallorum.', 'Article 2 : uod annis circumcluditur fere ', '1455620237.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `email` (`email`,`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `email`, `mdp`, `sid`, `nom`, `prenom`) VALUES
(1, 'kevin.senet@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7dfe267093ae6db2169679b68469cd5f', '', ''),
(4, 'test@test.fr', 'e10adc3949ba59abbe56e057f20f883e', '3ca58d7db04f49ed6dba130f704b7a51', 'senet', 'kÃ©vin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
