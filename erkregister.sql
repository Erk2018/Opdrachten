-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 11 feb 2020 om 10:15
-- Serverversie: 5.5.45
-- PHP-versie: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erkregister`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemer`
--

CREATE TABLE `deelnemer` (
  `deelnemer_ID` int(4) NOT NULL,
  `deelnemer_voornaam` varchar(20) NOT NULL,
  `deelnemer_tussenvoegsel` varchar(8) NOT NULL,
  `deelnemer_achternaam` varchar(20) NOT NULL,
  `deelnemer_adres` varchar(30) NOT NULL,
  `deelnemer_postcode` varchar(6) NOT NULL,
  `deelnemer_geboortedatum` date NOT NULL,
  `deelnemer_telefoon` varchar(15) NOT NULL,
  `deelnemer_mobiel` varchar(15) NOT NULL,
  `deelnemer_actief` tinyint(1) NOT NULL,
  `deelnemer_rol` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `deelnemer`
--

INSERT INTO `deelnemer` (`deelnemer_ID`, `deelnemer_voornaam`, `deelnemer_tussenvoegsel`, `deelnemer_achternaam`, `deelnemer_adres`, `deelnemer_postcode`, `deelnemer_geboortedatum`, `deelnemer_telefoon`, `deelnemer_mobiel`, `deelnemer_actief`, `deelnemer_rol`) VALUES
(1, 'Erkan', 'van der', 'Hoek', 'Haydnlaan 8', '2625TP', '1999-05-26', '0152610612', '0613404723', 1, 'student'),
(11, 'Aad', 'de', 'Boer', 'Handellaan 192', '2624EQ', '1995-04-20', '0702938103', '0619283947', 1, 'student'),
(13, 'Test1', 'test', 'Test1', 'Testerino 8', '2839TT', '2000-01-01', '1234567890', '1234567890', 1, 'test'),
(14, 'test2', 'test', 'test2', 'testtestets', '2839tt', '2000-01-01', '1234567890', '1234567890', 1, 'student'),
(15, 'dsasda', 'asd', 'dadadasd', 'asdasdasd', '1111AZ', '2000-01-01', '1234567890', '1234567890', 1, 'docent'),
(16, 'test3', 'test3', 'test3', 'test 3', '1234AZ', '2000-01-01', '1234567890', '1234567890', 1, 'student'),
(17, 'test4', 'van de', 'test', 'Koddeweg 41', '1919EQ', '1999-07-18', '0201928394', '0693829384', 1, 'docent'),
(18, 'Nog meer', 'van', 'Die tests', 'Testerino 20', '2930EP', '2020-03-20', '0203928394', '0692039423', 1, 'student');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `klas_ID` int(3) NOT NULL,
  `klas_naam` varchar(15) NOT NULL,
  `klas_opleiding` varchar(40) NOT NULL,
  `klas_actief` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`klas_ID`, `klas_naam`, `klas_opleiding`, `klas_actief`) VALUES
(1, 'PALVAPM1A', 'Applicatie- en Mediaontwikkeling', 1),
(2, 'PALVAPM1B', 'Applicatie- en Mediaontwikkeling', 1),
(4, 'LOGSUP1A', 'Logistiek Supervisor', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleiding`
--

CREATE TABLE `opleiding` (
  `opleiding_ID` int(3) NOT NULL,
  `opleiding_naam` varchar(40) NOT NULL,
  `opleiding_start` date NOT NULL,
  `opleiding_eind` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `opleiding`
--

INSERT INTO `opleiding` (`opleiding_ID`, `opleiding_naam`, `opleiding_start`, `opleiding_eind`) VALUES
(1, 'Applicatie- en Mediaontwikkeling', '2018-09-01', '2021-07-01'),
(3, 'Logistiek Supervisor', '2016-09-01', '2020-07-01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Administrator', '$2y$10$THh5I.B/61BPzcZbw7C2hO9G61JKeqQO8zG.9TQk80zaaU4dAEaOy', '2019-10-23 07:05:49');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `deelnemer`
--
ALTER TABLE `deelnemer`
  ADD PRIMARY KEY (`deelnemer_ID`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`klas_ID`);

--
-- Indexen voor tabel `opleiding`
--
ALTER TABLE `opleiding`
  ADD PRIMARY KEY (`opleiding_ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `deelnemer`
--
ALTER TABLE `deelnemer`
  MODIFY `deelnemer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `klas_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `opleiding`
--
ALTER TABLE `opleiding`
  MODIFY `opleiding_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
