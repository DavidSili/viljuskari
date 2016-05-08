-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 07:54 PM
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nalog` int(8) NOT NULL,
  `viljuskar` int(4) NOT NULL,
  `radnik` int(4) NOT NULL,
  `datum` date NOT NULL,
  `naziv` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  `broj` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firme`
--

DROP TABLE IF EXISTS `firme`;
CREATE TABLE IF NOT EXISTS `firme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `mb` int(13) DEFAULT NULL,
  `delatnost` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `pib` int(8) DEFAULT NULL,
  `adresa` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mesto` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mobilni` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `kontakt` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `pozicija` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `www` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `komercijalista` int(4) DEFAULT NULL,
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radnik` int(4) NOT NULL,
  `radninalog` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tipnaloga` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datumotvaranja` date NOT NULL,
  `datumzatvarnja` date NOT NULL,
  `viljuskar` int(5) NOT NULL,
  `sati` int(4) NOT NULL,
  `satiserv` int(4) NOT NULL,
  `teren` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `defektaza` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  `delovi` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

DROP TABLE IF EXISTS `proizvodjaci`;
CREATE TABLE IF NOT EXISTS `proizvodjaci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `zemlja` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

DROP TABLE IF EXISTS `radnici`;
CREATE TABLE IF NOT EXISTS `radnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pozicija` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viljuskari`
--

DROP TABLE IF EXISTS `viljuskari`;
CREATE TABLE IF NOT EXISTS `viljuskari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vrsta` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vlasnik` int(8) NOT NULL,
  `upis` int(20) NOT NULL,
  `proizvodjac` int(4) NOT NULL,
  `model` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tip` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `serijski` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `godina` varchar(4) COLLATE utf8_slovenian_ci NOT NULL,
  `pogon` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `gasmod` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `gasbroj` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `gassonda` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `nosivost` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `radnihsati` int(8) NOT NULL,
  `ravnoteza` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `tezina` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `radijus` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `prolaz` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `brzina` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `pojas` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `kran1` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `kran2` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `kran3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `kran4` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `kran5` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `kran6` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `viljuske1` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `viljuske2` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `viljuske3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `viljuske4` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `viljuske5` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `motor1` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `motor2` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `motor3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `motor4` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `motor5` int(2) NOT NULL,
  `motor6` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `motor7` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `baterija1` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `baterija2` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `baterija3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `felne1` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `felne2` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `felne3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `felne4` int(1) NOT NULL,
  `felne5` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `felne6` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `gume1` int(1) NOT NULL,
  `gume2` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `gume3` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `gume4` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `gume5` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `gume6` varchar(8) COLLATE utf8_slovenian_ci NOT NULL,
  `gume7` int(1) NOT NULL,
  `gume8` int(1) NOT NULL,
  `signal1` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `signal2` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `signal3` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `signal4` varchar(2) COLLATE utf8_slovenian_ci NOT NULL,
  `napomena` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
