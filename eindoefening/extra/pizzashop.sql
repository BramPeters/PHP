-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 25 feb 2014 om 10:56
-- Serverversie: 5.6.11
-- PHP-versie: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `pizzashop`
--
CREATE DATABASE IF NOT EXISTS `pizzashop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzashop`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `klantId` int(11) NOT NULL AUTO_INCREMENT,
  `familienaam` varchar(20) NOT NULL,
  `voornaam` varchar(15) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `postcode` int(4) NOT NULL,
  `gemeente` varchar(20) NOT NULL,
  `telefoonnummer` varchar(11) NOT NULL,
  `emailadres` varchar(50) NOT NULL,
  `wachtwoord` varchar(20) NOT NULL,
  PRIMARY KEY (`klantId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantId`, `familienaam`, `voornaam`, `adres`, `postcode`, `gemeente`, `telefoonnummer`, `emailadres`, `wachtwoord`) VALUES
(1, 'Peters', 'Bram', 'straatlaan 42', 8000, 'Brugge', '050555555', 'brampeters@website.com', 'abbibo');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizzasoorten`
--

CREATE TABLE IF NOT EXISTS `pizzasoorten` (
  `pizzaId` int(11) NOT NULL AUTO_INCREMENT,
  `pizzaNaam` varchar(20) NOT NULL,
  `prijs` decimal(11,2) NOT NULL,
  `ham` tinyint(1) NOT NULL,
  `salami` tinyint(1) NOT NULL,
  `gehakt` tinyint(1) NOT NULL,
  `paprika` tinyint(1) NOT NULL,
  `champignons` tinyint(1) NOT NULL,
  `ananas` tinyint(1) NOT NULL,
  `gemalenKaas` tinyint(1) NOT NULL,
  `mozzarella` tinyint(1) NOT NULL,
  PRIMARY KEY (`pizzaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `pizzasoorten`
--

INSERT INTO `pizzasoorten` (`pizzaId`, `pizzaNaam`, `prijs`, `ham`, `salami`, `gehakt`, `paprika`, `champignons`, `ananas`, `gemalenKaas`, `mozzarella`) VALUES
(1, 'Bolognese', '9.95', 0, 0, 1, 1, 0, 0, 1, 0),
(2, 'Hawaii', '10.95', 1, 0, 0, 0, 0, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
