-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2016 at 08:09 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viljuskari`
--

-- --------------------------------------------------------

--
-- Table structure for table `delovi`
--

DROP TABLE IF EXISTS `delovi`;
CREATE TABLE IF NOT EXISTS `delovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `nalog` int(8) NOT NULL COMMENT 'nalog',
  `viljuskar` int(4) NOT NULL COMMENT 'viljuskar',
  `radnik` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'radnik',
  `datum` date NOT NULL COMMENT 'datum',
  `naziv` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'naziv',
  `broj` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'broj',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firme`
--

DROP TABLE IF EXISTS `firme`;
CREATE TABLE IF NOT EXISTS `firme` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'ime',
  `mb` int(13) DEFAULT NULL COMMENT 'matični broj',
  `delatnost` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'delatnost',
  `pib` int(8) DEFAULT NULL COMMENT 'PIB',
  `adresa` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'adresa',
  `mesto` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'mesto',
  `telefon` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'telefon',
  `fax` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'fax',
  `mobilni` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'mobilni',
  `kontakt` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'kontakt',
  `pozicija` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'pozicija',
  `email` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'email',
  `www` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'www',
  `komercijalista` int(4) DEFAULT NULL COMMENT 'komercijalista',
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'napomena',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komercijalisti`
--

DROP TABLE IF EXISTS `komercijalisti`;
CREATE TABLE IF NOT EXISTS `komercijalisti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nalozi`
--

DROP TABLE IF EXISTS `nalozi`;
CREATE TABLE IF NOT EXISTS `nalozi` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `radnik` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'radnik',
  `radninalog` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'radni nalog',
  `tipnaloga` varchar(20) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'tip naloga',
  `datumotvaranja` date NOT NULL COMMENT 'datum otvaranja',
  `datumzatvaranja` date NOT NULL COMMENT 'datum zatvarnja',
  `viljuskar` int(5) NOT NULL COMMENT 'viljuškar',
  `sati` int(4) NOT NULL COMMENT 'radnih sati viljuškara',
  `satiserv` int(4) NOT NULL COMMENT 'sati servisiranja',
  `teren` varchar(20) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'teren',
  `defektaza` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'defektaža',
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'napomena',
  `delovi` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'delovi',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

DROP TABLE IF EXISTS `proizvodjaci`;
CREATE TABLE IF NOT EXISTS `proizvodjaci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `zemlja` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

DROP TABLE IF EXISTS `radnici`;
CREATE TABLE IF NOT EXISTS `radnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pozicija` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `telefon` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viljuskari`
--

DROP TABLE IF EXISTS `viljuskari`;
CREATE TABLE IF NOT EXISTS `viljuskari` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `vrsta` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'vrsta',
  `vlasnik` int(8) DEFAULT NULL COMMENT 'vlasnik',
  `upis` int(20) NOT NULL COMMENT 'broj u upisa',
  `proizvodjac` int(4) DEFAULT NULL COMMENT 'proizvođač',
  `model` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'model viljuškara',
  `tip` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'tip',
  `serijski` varchar(50) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'serijski broj',
  `godina` varchar(4) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'godina proizvodnje',
  `pogon` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'pogon',
  `gasmod` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'model gas uređaja',
  `gasbroj` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'broj uređaja za gas',
  `gassonda` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'sonda za gas',
  `nosivost` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'nosivnost',
  `radnihsati` int(8) NOT NULL COMMENT 'radnih sati',
  `ravnoteza` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'ravnoteža',
  `tezina` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'težina',
  `radijus` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'radijus',
  `prolaz` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'prolaz',
  `brzina` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'brzina',
  `pojas` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'pojas',
  `kran1` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'tip krana',
  `kran2` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'visina spuštenog krana',
  `kran3` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'maksimalna visina podizanja',
  `kran4` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'slobodno podizanje',
  `kran5` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'nagib krana',
  `kran6` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'bočni pomak',
  `viljuske1` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'dužina viljuške',
  `viljuske2` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'širina viljuške',
  `viljuske3` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'raspon između viljušaka',
  `viljuske4` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'prednje rastojanje od točkova',
  `viljuske5` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'zadnje rastojanje od točkova',
  `motor1` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'proizvođač motora',
  `motor2` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'broj motora',
  `motor3` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'nominalna snaga',
  `motor4` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'obrtni moment',
  `motor5` int(2) DEFAULT NULL COMMENT 'broj cilindara',
  `motor6` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'zapremina',
  `motor7` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'kapacitet rezervoara',
  `baterija1` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'radni pritisak',
  `baterija2` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'napon baterije',
  `baterija3` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'kapacitet baterije',
  `felne1` varchar(30) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'tip felne',
  `felne2` varchar(8) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'dimenzija prednjih felni',
  `felne3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'dimenzija zadnjih felni',
  `felne4` int(1) DEFAULT NULL COMMENT 'broj rupa',
  `felne5` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'ugao ulaska zavrtnja',
  `felne6` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'centralizacija',
  `gume1` int(1) NOT NULL COMMENT 'broj radnih smena',
  `gume2` varchar(10) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'vrsta guma a',
  `gume3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'vrsta guma b',
  `gume4` varchar(10) COLLATE utf8_slovenian_ci NOT NULL COMMENT 'proizvođač',
  `gume5` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'dimenzije guma - prednje',
  `gume6` varchar(8) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'dimenzije guma - zadnje',
  `gume7` int(1) DEFAULT NULL COMMENT 'broj prednjih guma',
  `gume8` int(1) DEFAULT NULL COMMENT 'broj zadnjih guma',
  `signal1` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'prednja svetlosna signalizacija',
  `signal2` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'zadnja svetlostna signalizacija',
  `signal3` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'prednja zvučna signalizacija',
  `signal4` varchar(2) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'zadnja zvučna signalizacija',
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci DEFAULT NULL COMMENT 'napomena',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
