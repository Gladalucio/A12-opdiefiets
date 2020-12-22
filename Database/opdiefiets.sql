-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 26 jun 2018 om 16:31
-- Serverversie: 5.5.57-0ubuntu0.14.04.1
-- PHP-versie: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `opdiefiets`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fietsen`
--

CREATE TABLE IF NOT EXISTS `fietsen` (
  `fiets_id` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL,
  `bandmaat` varchar(7) NOT NULL,
  PRIMARY KEY (`fiets_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Database voor alle fietsen' AUTO_INCREMENT=106 ;

--
-- Gegevens worden uitgevoerd voor tabel `fietsen`
--

INSERT INTO `fietsen` (`fiets_id`, `type`, `status`, `bandmaat`) VALUES
(1, 'ZV-M-PD', 'Beschikbaar', '150-160'),
(2, 'ZV-M-AT', 'Beschikbaar', '150-160'),
(3, 'ZV-V-AR', 'Beschikbaar', '150-160'),
(4, 'ZV-V-AU', 'Beschikbaar', '150-160'),
(5, 'MV-M-AM', 'Beschikbaar', '150-160'),
(6, 'MV-M-SR', 'Beschikbaar', '150-160'),
(7, 'MV-V-PD', 'Beschikbaar', '150-160'),
(8, 'MV-V-SC', 'Beschikbaar', '150-160'),
(9, 'MB-M-CA', 'Beschikbaar', '150-160'),
(10, 'MB-M-GA', 'Beschikbaar', '150-160'),
(11, 'MB-V-CA', 'Beschikbaar', '150-160'),
(12, 'MB-V-SC', 'Beschikbaar', '150-160'),
(13, 'KF-M-VT', 'Beschikbaar', '125-135'),
(14, 'KF-M-AF', 'Beschikbaar', '125-135'),
(15, 'KF-V-VE', 'Beschikbaar', '125-135'),
(16, 'KF-V-AD', 'Beschikbaar', '125-135'),
(17, 'ZV-M-PD', 'Beschikbaar', '160-170'),
(18, 'ZV-M-AT', 'Beschikbaar', '160-170'),
(19, 'ZV-V-AR', 'Beschikbaar', '160-170'),
(20, 'ZV-V-AU', 'Beschikbaar', '160-170'),
(21, 'MV-M-AM', 'Beschikbaar', '160-170'),
(22, 'MV-M-SR', 'Beschikbaar', '160-170'),
(23, 'MV-V-PD', 'Beschikbaar', '160-170'),
(24, 'MV-V-SC', 'Beschikbaar', '160-170'),
(25, 'MB-M-CA', 'Uitgeleend', '160-170'),
(26, 'MB-M-GA', 'Beschikbaar', '160-170'),
(27, 'MB-V-CA', 'Beschikbaar', '160-170'),
(28, 'MB-V-SC', 'Beschikbaar', '160-170'),
(29, 'KF-M-VT', 'Beschikbaar', '135-145'),
(30, 'KF-M-AF', 'Beschikbaar', '135-145'),
(31, 'KF-V-VE', 'Beschikbaar', '135-145'),
(32, 'KF-V-AD', 'Beschikbaar', '135-145'),
(33, 'ZV-M-PD', 'Beschikbaar', '160-170'),
(34, 'ZV-M-AT', 'Beschikbaar', '160-170'),
(35, 'ZV-V-AR', 'Beschikbaar', '160-170'),
(36, 'ZV-V-AU', 'Beschikbaar', '160-170'),
(37, 'MV-M-AM', 'Beschikbaar', '160-170'),
(38, 'MV-M-SR', 'Beschikbaar', '160-170'),
(39, 'MV-V-PD', 'Beschikbaar', '160-170'),
(40, 'MV-V-SC', 'Beschikbaar', '160-170'),
(41, 'MB-M-CA', 'Beschikbaar', '160-170'),
(42, 'MB-M-GA', 'Beschikbaar', '160-170'),
(43, 'MB-V-CA', 'Beschikbaar', '160-170'),
(44, 'MB-V-SC', 'Beschikbaar', '160-170'),
(45, 'KF-M-VT', 'Beschikbaar', '135-145'),
(46, 'KF-M-AF', 'Beschikbaar', '135-145'),
(47, 'KF-V-VE', 'Beschikbaar', '135-145'),
(48, 'KF-V-AD', 'Beschikbaar', '135-145'),
(49, 'ZV-M-PD', 'Beschikbaar', '160-170'),
(50, 'ZV-M-AT', 'Beschikbaar', '160-170'),
(51, 'ZV-V-AR', 'Beschikbaar', '160-170'),
(52, 'ZV-V-AU', 'Beschikbaar', '160-170'),
(53, 'MV-M-AM', 'Beschikbaar', '160-170'),
(54, 'MV-M-SR', 'Beschikbaar', '160-170'),
(55, 'MV-V-PD', 'Beschikbaar', '160-170'),
(56, 'MV-V-SC', 'Beschikbaar', '160-170'),
(57, 'MB-M-CA', 'Beschikbaar', '160-170'),
(58, 'MB-M-GA', 'Beschikbaar', '160-170'),
(59, 'MB-V-CA', 'Beschikbaar', '160-170'),
(60, 'MB-V-SC', 'Reparatie', '160-170'),
(61, 'KF-M-VT', 'Beschikbaar', '145-155'),
(62, 'KF-M-AF', 'Beschikbaar', '145-155'),
(63, 'KF-V-VE', 'Beschikbaar', '145-155'),
(64, 'KF-V-AD', 'Beschikbaar', '145-155'),
(65, 'ZV-M-PD', 'Beschikbaar', '180-190'),
(66, 'ZV-M-AT', 'Beschikbaar', '180-190'),
(67, 'ZV-V-AR', 'Beschikbaar', '180-190'),
(68, 'ZV-V-AU', 'Beschikbaar', '180-190'),
(69, 'MV-M-AM', 'Beschikbaar', '180-190'),
(70, 'MV-M-SR', 'Beschikbaar', '180-190'),
(71, 'MV-V-PD', 'Uitgeleend', '180-190'),
(72, 'MV-V-SC', 'Beschikbaar', '180-190'),
(73, 'MB-M-CA', 'Beschikbaar', '180-190'),
(74, 'MB-M-GA', 'Beschikbaar', '180-190'),
(75, 'MB-V-CA', 'Beschikbaar', '180-190'),
(76, 'MB-V-SC', 'Beschikbaar', '180-190'),
(77, 'KF-M-VT', 'Beschikbaar', '145-155'),
(78, 'KF-M-AF', 'Beschikbaar', '145-155'),
(79, 'KF-V-VE', 'Beschikbaar', '145-155'),
(80, 'KF-V-AD', 'Beschikbaar', '145-155'),
(81, 'ZV-M-PD', 'Beschikbaar', '180-190'),
(82, 'ZV-M-AT', 'Beschikbaar', '180-190'),
(83, 'ZV-V-AR', 'Beschikbaar', '180-190'),
(84, 'ZV-V-AU', 'Beschikbaar', '180-190'),
(85, 'MV-M-AM', 'Beschikbaar', '180-190'),
(86, 'MV-M-SR', 'Beschikbaar', '180-190'),
(87, 'MV-V-PD', 'Beschikbaar', '180-190'),
(88, 'MV-V-SC', 'Beschikbaar', '180-190'),
(89, 'MB-M-CA', 'Beschikbaar', '180-190'),
(90, 'MB-M-GA', 'Beschikbaar', '180-190'),
(91, 'MB-V-CA', 'Beschikbaar', '180-190'),
(92, 'MB-V-SC', 'Beschikbaar', '180-190'),
(93, 'KF-M-VT', 'Beschikbaar', '145-155'),
(94, 'KF-M-AF', 'Beschikbaar', '145-155'),
(95, 'KF-V-VE', 'Beschikbaar', '145-155'),
(96, 'KF-V-AD', 'Beschikbaar', '145-155'),
(97, 'MV-M-AM', 'Uitgeleend', '190-200'),
(98, 'MV-M-SR', 'Beschikbaar', '190-200'),
(99, 'MV-V-PD', 'Beschikbaar', '190-200'),
(100, 'MV-V-SC', 'Beschikbaar', '190-200'),
(101, 'KF-M-AF', 'Beschikbaar', '125-135'),
(102, 'Dr-M-AD', 'Beschikbaar', '125-135'),
(103, 'Dr-M-AD', 'Beschikbaar', '125-135'),
(104, 'KF-V-AD', 'Beschikbaar', '125-135'),
(105, 'El-M-SV', 'Beschikbaar', '180-190');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `klant_id` int(10) NOT NULL AUTO_INCREMENT,
  `naam` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefoonnr` int(10) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `plaats` varchar(30) NOT NULL,
  `afb_url` varchar(255) NOT NULL,
  PRIMARY KEY (`klant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Gegevens worden uitgevoerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klant_id`, `naam`, `email`, `telefoonnr`, `adres`, `plaats`, `afb_url`) VALUES
(1, 'Edwin Huijer', 'edwinhuijer@gmail.com', 645685318, 'Steenovens 34', 'Westerhoven', ''),
(2, 'Mario Zweep', 'm.zweep@upcmail.nl', 694928576, 'Burgemeester Coonenplein 69', 'Limbricht', ''),
(3, 'Sonja Wegman', 'sonjawegman@gmail.com', 637242351, 'Baarnseweg 144', 'Bosch en Duin', ''),
(4, 'Elise de Bruin', 'e.l.debruin@kpnmail.nl', 612481847, 'Kerkstraat 12', 'Giesbeek', 'images/stock-photo-happy-cheerful-young-woman-wearing-her-red-hair-in-bun-rejoicing-at-positive-news-or-birthday-gift-613759379.jpg'),
(5, 'Bart Meuffels', 'bartmeuffels@outlook.com', 693617288, 'Schieweg 198', 'Rotterdam', ''),
(6, 'Gerrit Gerritsen', 'gert@kpnmail.nl', 635416251, 'Greet Garretsenlaan 12', 'Giesbeek', ''),
(7, 'Ro Senvet', 'sr_zundeterde@gmail.com', 625326543, 'Blauweweg 118', 'Luierhuizen', 'images/14054773_1115579988535594_1819608944_n.jpg'),
(8, 'Bob de Graaf', 'b.graafschap@hotmail.com', 683741831, 'Graafseweg 12', 'Betlehem', ''),
(17, 'Gekke naam', 'gekke-email@mail.com', 623857082, 'Straat en Huisnummer', 'Stad', ''),
(18, 'Gers Pardol', 'oops@jpg.nl', 674839201, 'Straat 84', 'Vught', ''),
(19, 'Ruud Senvet', 'r.senvet118@upcmail.nl', 640330595, 'Blauweweg 118', 'Luierhuizen', ''),
(20, 'despacito', 'desp@cito.nl', 123324234, 'Stadstraat 2', 'Arnhem', ''),
(24, 'Kleisteen van der Ton', 'c.steen@protonmail.com', 610236543, 'Schuut-Schuijtgraag 7', 'Arnhem', ''),
(25, 'Clerrie Bapper', 'mail@example.com', 612345678, 'Koestraat 1', 'Internet', 'images/bavaria.jpg'),
(26, 'Meindert', 'mail@example.com', 12345678, 'Street 1', 'Wageningen', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `fiets_id` varchar(30) NOT NULL,
  `klant_id` int(10) NOT NULL,
  `uitgavedatum` date NOT NULL,
  `innamedatum` date NOT NULL,
  `prijs` int(4) NOT NULL,
  `borg` int(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `orders`
--

INSERT INTO `orders` (`order_id`, `fiets_id`, `klant_id`, `uitgavedatum`, `innamedatum`, `prijs`, `borg`, `status`) VALUES
(1, '1,2', 1, '2018-06-01', '2018-06-08', 160, 50, 'Goedgekeurd'),
(2, '3,4,5', 2, '2018-06-01', '2018-06-04', 140, 75, 'Goedgekeurd'),
(3, '60,61,62', 3, '2018-06-01', '2018-06-03', 135, 75, 'Afgekeurd'),
(4, '6,7,8', 4, '2018-06-03', '2018-06-06', 180, 75, 'Goedgekeurd'),
(5, '21,22,23,24', 5, '2018-06-04', '2018-06-07', 240, 100, 'Goedgekeurd'),
(6, '5,9', 2, '2018-06-05', '2018-06-08', 160, 50, 'Goedgekeurd'),
(7, '5,6', 4, '2018-06-17', '2018-06-19', 100, 50, 'Goedgekeurd'),
(9, '70,17', 1, '2018-06-21', '2018-06-23', 25, 50, 'Goedgekeurd'),
(10, '27', 4, '2018-06-12', '2018-06-23', 25, 25, 'Goedgekeurd'),
(11, '26,15,22', 7, '2018-06-21', '2018-06-26', 50, 75, 'Goedgekeurd'),
(12, '74,14', 26, '2018-06-22', '2018-06-23', 35, 50, 'Goedgekeurd'),
(13, '', 7, '2018-06-22', '2018-06-23', 0, 0, 'Lopend'),
(14, '25,71,97', 4, '2018-06-25', '2018-06-27', 55, 75, 'Lopend');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reparaties`
--

CREATE TABLE IF NOT EXISTS `reparaties` (
  `fiets_id` int(2) NOT NULL DEFAULT '0',
  `innamedatum` varchar(15) NOT NULL DEFAULT '',
  `uitgavedatum` varchar(15) DEFAULT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fiets_id`,`innamedatum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `reparaties`
--

INSERT INTO `reparaties` (`fiets_id`, `innamedatum`, `uitgavedatum`, `beschrijving`) VALUES
(1, '20-06-2018', '21-06-2018', 'Bleek niet kapot, had gewoon geen versnellingen'),
(5, '18-06-2018', '20-06-2018', 'Ketting gebroken'),
(14, '15-06-2018', '19-06-2018', 'Band lek'),
(14, '22-06-2018', '22-06-2018', 'DIT IS EEN TEST'),
(15, '21-06-2018', '22-06-2018', 'Kind gestolen'),
(22, '21-06-2018', '22-06-2018', 'Stuur enigszins krom'),
(27, '21-06-2018', '22-06-2018', 'Lekke band'),
(60, '3-6-2018', NULL, 'Ketting kapot'),
(61, '3-6-2018', '17-06-2018', 'Vlaggetje afgebroken'),
(62, '13-6-2018', '17-06-2018', 'Zie vorige reparatie'),
(62, '3-6-2018', '17-06-2018', 'Zie vorige reparatie'),
(63, '1-6-2018', '12-06-2018', 'Kapotte fietsbel'),
(64, '1-6-2018', '13-06-2018', 'Aangereden'),
(65, '1-6-2018', '18-06-2018', 'Zadel gescheurd'),
(66, '1-6-2018', '12-06-2018', 'Frame verbogen'),
(67, '1-6-2018', '12-06-2018', 'Banden lek, frame verbogen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soort_fiets`
--

CREATE TABLE IF NOT EXISTS `soort_fiets` (
  `type` varchar(10) NOT NULL DEFAULT '',
  `soort` varchar(18) DEFAULT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `geslacht` varchar(1) DEFAULT NULL,
  `tarief` int(2) DEFAULT NULL,
  `borg` int(2) DEFAULT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='De fietssoorten';

--
-- Gegevens worden uitgevoerd voor tabel `soort_fiets`
--

INSERT INTO `soort_fiets` (`type`, `soort`, `merk`, `model`, `geslacht`, `tarief`, `borg`) VALUES
('Dr-M-AD', 'Driewieler', 'Autist', ' Driewieler', 'M', 5, 25),
('El-M-SV', 'Elektrisch', 'Stella', ' Vlug Thuis', 'M', 45, 50),
('KF-M-AF', 'Kinderfiets', 'Altec', 'Speed', 'M', 10, 25),
('KF-M-VT', 'Kinderfiets', 'Volare', 'Thombike', 'M', 10, 25),
('KF-V-AD', 'Kinderfiets', 'Altec', 'Dutch', 'V', 10, 25),
('KF-V-VE', 'Kinderfiets', 'Volare', 'Excellent', 'V', 10, 25),
('MB-M-CA', 'Mountainbike', 'Cube', 'Aim Pro', 'M', 25, 25),
('MB-M-GA', 'Mountainbike', 'Giant', 'ATX 2', 'M', 25, 25),
('MB-V-CA', 'Mountainbike', 'Cube', 'Access WS EAZ', 'V', 25, 25),
('MB-V-SC', 'Mountainbike', 'Scott', 'Contessa 740', 'V', 25, 25),
('MV-M-AM', 'Met Versnelling', 'Altec', 'Metro', 'M', 15, 25),
('MV-M-SR', 'Met Versnelling', 'Spirit', 'Regular', 'M', 15, 25),
('MV-V-PD', 'Met Versnelling', 'Popal', 'Daily Dutch', 'V', 15, 25),
('MV-V-SC', 'Met Versnelling', 'Spirit', 'Cargo', 'V', 15, 25),
('ZV-M-AT', 'Zonder Versnelling', 'Altec', 'Toscana', 'M', 10, 25),
('ZV-M-PD', 'Zonder Versnelling', 'Popal', 'Daily Dutch', 'M', 10, 25),
('ZV-V-AR', 'Zonder Versnelling', 'Altec', 'Roma', 'V', 10, 25),
('ZV-V-AU', 'Zonder Versnelling', 'Altec', 'Urban', 'V', 10, 25);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(5) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='De gebruikers van het systeem' AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `pin`) VALUES
(1, 'admin', 1234);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
