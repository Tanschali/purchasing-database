-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Apr 2013 um 17:56
-- Server Version: 5.5.29
-- PHP-Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `anschaffung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ressourcen`
--

CREATE TABLE IF NOT EXISTS `ressourcen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `produkt` varchar(255) NOT NULL,
  `bestand` int(4) NOT NULL,
  `bestellen` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `ressourcen`
--

INSERT INTO `ressourcen` (`id`, `produkt`, `bestand`, `bestellen`) VALUES
(1, 'Drucker', 125, 100),
(2, 'Computer', 250, 0),
(3, 'Kreide Weiss', 100, 0),
(4, 'Kreide Bunt', 80, 0),
(5, 'Schwamm', 50, 0),
(6, 'Flipchart', 10, 0),
(7, 'Flipchart Papierboegen', 10, 0),
(8, 'Marker Schwarz', 15, 0),
(10, 'Seife', 20, 0),
(12, 'Marker Gruen', 25, 5),
(13, 'Marker Rot', 0, 25);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `passwd`) VALUES
(1, 'admin', '123'),
(2, 'Maria', '123'),
(3, 'Peter', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
