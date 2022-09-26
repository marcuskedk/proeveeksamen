-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 26. 09 2022 kl. 12:33:17
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fta`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `fta_settings`
--

CREATE TABLE `fta_settings` (
  `Settings_ID` int(11) NOT NULL,
  `Settings_Label` text DEFAULT NULL,
  `Settings_Value` text DEFAULT NULL,
  `Settings_Type` int(11) NOT NULL DEFAULT 0,
  `Settings_UserID` int(11) DEFAULT NULL,
  `Settings_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_settings`
--

INSERT INTO `fta_settings` (`Settings_ID`, `Settings_Label`, `Settings_Value`, `Settings_Type`, `Settings_UserID`, `Settings_Timestamp`) VALUES
(1, 'title', 'FTA Travels', 0, 1, '2022-09-26 08:35:45'),
(2, 'logo-bottom', 'logo.png', 0, 1, '2022-09-26 08:35:45'),
(3, 'logo-top', 'gero.png', 0, 1, '2022-09-26 08:35:45');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `fta_travels`
--

CREATE TABLE `fta_travels` (
  `Travels_ID` int(11) NOT NULL,
  `Travels_Title` varchar(255) DEFAULT NULL,
  `Travels_Description` text DEFAULT NULL,
  `Travels_IMG` text DEFAULT NULL,
  `Travels_Country` varchar(255) DEFAULT NULL,
  `Travels_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_travels`
--

INSERT INTO `fta_travels` (`Travels_ID`, `Travels_Title`, `Travels_Description`, `Travels_IMG`, `Travels_Country`, `Travels_Timestamp`) VALUES
(1, 'Rejsemål title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo debitis quaerat asperiores ad consequatur nobis illo est, dicta enim impedit, necessitatibus doloribus aliquid quod, eaque quisquam! Quasi aspernatur modi deserunt!', 'japan.jpg', 'Japan', '2022-09-26 09:39:11'),
(2, 'Rejsemål title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo debitis quaerat asperiores ad consequatur nobis illo est, dicta enim impedit, necessitatibus doloribus aliquid quod, eaque quisquam! Quasi aspernatur modi deserunt!', 'mexico.jpg', 'Mexico', '2022-09-26 09:39:11'),
(3, 'Rejsemål title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo debitis quaerat asperiores ad consequatur nobis illo est, dicta enim impedit, necessitatibus doloribus aliquid quod, eaque quisquam! Quasi aspernatur modi deserunt!', 'japan.jpg', 'Japan', '2022-09-26 09:39:11');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `fta_settings`
--
ALTER TABLE `fta_settings`
  ADD PRIMARY KEY (`Settings_ID`);

--
-- Indeks for tabel `fta_travels`
--
ALTER TABLE `fta_travels`
  ADD PRIMARY KEY (`Travels_ID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `fta_settings`
--
ALTER TABLE `fta_settings`
  MODIFY `Settings_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `fta_travels`
--
ALTER TABLE `fta_travels`
  MODIFY `Travels_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
