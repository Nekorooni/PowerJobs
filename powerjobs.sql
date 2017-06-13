-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 jun 2017 om 15:41
-- Serverversie: 5.7.11
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `powerjobs`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijven`
--

CREATE TABLE `bedrijven` (
  `Id` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `CompanyName` text NOT NULL,
  `Website` text NOT NULL,
  `ShortDescription` text NOT NULL,
  `LongDescription` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bedrijven`
--

INSERT INTO `bedrijven` (`Id`, `OwnerId`, `CompanyName`, `Website`, `ShortDescription`, `LongDescription`) VALUES
(1, 4, 'Nekorooni', 'http://nekorooni.com', 'A company', 'A company for nothing really.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Naam` text NOT NULL,
  `Email` varchar(254) NOT NULL,
  `Content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`Id`, `Naam`, `Email`, `Content`) VALUES
(1, 'test', 'test', 'testvraag');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`Id`, `Name`) VALUES
(1, 'User'),
(2, 'Company'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sollicitaties`
--

CREATE TABLE `sollicitaties` (
  `Id` int(11) NOT NULL,
  `VacatureId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `Role`) VALUES
(8, 'rooni2', 'ebdf8cc00bc4d9ceee633c56c63b49955769a92ca060825c9b08e4af61326e2b', 3),
(4, 'rooni', 'ebdf8cc00bc4d9ceee633c56c63b49955769a92ca060825c9b08e4af61326e2b', 2),
(13, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacatures`
--

CREATE TABLE `vacatures` (
  `Id` int(11) NOT NULL,
  `BedrijfId` int(11) NOT NULL,
  `Functie` text NOT NULL,
  `Beschrijving` text NOT NULL,
  `MaxSolicitaties` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Salaris` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vacatures`
--

INSERT INTO `vacatures` (`Id`, `BedrijfId`, `Functie`, `Beschrijving`, `MaxSolicitaties`, `Datum`, `Salaris`) VALUES
(1, 1, 'Front-end developer', 'Front-end developer description, etc.', 10, '2017-05-29', 2100);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bedrijven`
--
ALTER TABLE `bedrijven`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `sollicitaties`
--
ALTER TABLE `sollicitaties`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `vacatures`
--
ALTER TABLE `vacatures`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bedrijven`
--
ALTER TABLE `bedrijven`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `sollicitaties`
--
ALTER TABLE `sollicitaties`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT voor een tabel `vacatures`
--
ALTER TABLE `vacatures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
