-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 30. 09 2022 kl. 01:20:22
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 8.0.9

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
-- Struktur-dump for tabellen `fta_abouts`
--

CREATE TABLE `fta_abouts` (
  `Abouts_ID` int(11) NOT NULL,
  `Abouts_Title` text DEFAULT NULL,
  `Abouts_Content` text DEFAULT NULL,
  `Abouts_IMG` text DEFAULT NULL,
  `Abouts_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_abouts`
--

INSERT INTO `fta_abouts` (`Abouts_ID`, `Abouts_Title`, `Abouts_Content`, `Abouts_IMG`, `Abouts_Timestamp`) VALUES
(1, 'Lorem ipsum dolor title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem reprehenderit, recusandae similique odit animi id voluptates porro atque, officiis molestiae dignissimos nesciunt nam consequuntur inventore a cumque architecto labore sed!', 'about.jpg', '2022-09-27 11:51:47');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `fta_contacts`
--

CREATE TABLE `fta_contacts` (
  `Contacts_ID` int(11) NOT NULL,
  `Contacts_Content` text NOT NULL,
  `Contacts_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_contacts`
--

INSERT INTO `fta_contacts` (`Contacts_ID`, `Contacts_Content`, `Contacts_Timestamp`) VALUES
(1, '<b>FTATravel</b>', '2022-09-27 12:10:31'),
(2, '10520509', '2022-09-27 12:10:31'),
(3, 'Gåseurtvej 16', '2022-09-27 12:10:31'),
(4, '2700, København', '2022-09-27 12:10:31'),
(5, 'Denmark', '2022-09-27 12:10:31'),
(6, '(+45) 1234 5678', '2022-09-27 12:10:31'),
(7, 'kontakt@ftatravels.dk', '2022-09-27 12:10:31'),
(8, 'Alle hverdage kl. 10 til 17 eller efter aftale', '2022-09-27 12:10:31');

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
(3, 'logo-top', 'gero.png', 0, 1, '2022-09-26 08:35:45'),
(4, 'footer-text', '2022 - <a href=\"../\" class=\"text-decoration-none\">FTA Travels</a>, All rights reserved.', 0, 1, '2022-09-26 08:35:45'),
(5, 'search-after', 'Travels_Title', 0, NULL, '2022-09-29 21:44:10');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `fta_travels`
--

CREATE TABLE `fta_travels` (
  `Travels_ID` int(11) NOT NULL,
  `Travels_Title` text DEFAULT NULL,
  `Travels_Subtitle` text DEFAULT NULL,
  `Travels_Content` text DEFAULT NULL,
  `Travels_RoomType` text DEFAULT NULL,
  `Travels_Date` text DEFAULT NULL,
  `Travels_Duration` text DEFAULT NULL,
  `Travels_MinPrice` text DEFAULT NULL,
  `Travels_Ratings` int(11) DEFAULT 0,
  `Travels_IMG` text DEFAULT NULL,
  `Travels_Country` text DEFAULT NULL,
  `Travels_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_travels`
--

INSERT INTO `fta_travels` (`Travels_ID`, `Travels_Title`, `Travels_Subtitle`, `Travels_Content`, `Travels_RoomType`, `Travels_Date`, `Travels_Duration`, `Travels_MinPrice`, `Travels_Ratings`, `Travels_IMG`, `Travels_Country`, `Travels_Timestamp`) VALUES
(1, 'En tur til Japan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy.', '<p> Proin mollis lorem non dolor. In hac habitasse platea dictumst. <br> Nulla ultrices odio. Donec augue. Phasellus dui. <br> Maecenas facilisis nisl vitae nibh. </p> <ul> <li> Proin vel seo est vitae eros pretium dignissim. </li> <li> Aliquam aliquam sodales orci. Suspendisse potenti. </li> <li> Nunc adipiscing euismod arcu. </li> </ul> <p> Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. </p>', '<ul><li>Lorem</li><li>Ipsum</li><li>Aliquam ullamcorper</li></ul>', '2022-09-26', NULL, NULL, 5, 'japan.jpg', 'Japan', '2022-09-26 09:39:11'),
(2, 'En tur til Mexico', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy.', '<p> Proin mollis lorem non dolor. In hac habitasse platea dictumst. <br> Nulla ultrices odio. Donec augue. Phasellus dui. <br> Maecenas facilisis nisl vitae nibh. </p> <ul> <li> Proin vel seo est vitae eros pretium dignissim. </li> <li> Aliquam aliquam sodales orci. Suspendisse potenti. </li> <li> Nunc adipiscing euismod arcu. </li> </ul> <p> Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. </p>', '<ul><li>Lorem</li><li>Ipsum</li><li>Aliquam ullamcorper</li></ul>', '2022-09-01', NULL, NULL, 3, 'mexico.jpg', 'Mexico', '2022-09-26 09:39:11'),
(3, 'En tur til Ungarn', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy.', '<p> Proin mollis lorem non dolor. In hac habitasse platea dictumst. <br> Nulla ultrices odio. Donec augue. Phasellus dui. <br> Maecenas facilisis nisl vitae nibh. </p> <ul> <li> Proin vel seo est vitae eros pretium dignissim. </li> <li> Aliquam aliquam sodales orci. Suspendisse potenti. </li> <li> Nunc adipiscing euismod arcu. </li> </ul> <p> Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. </p>', '<ul><li>Lorem</li><li>Ipsum</li><li>Aliquam ullamcorper</li></ul>', '2022-10-07', NULL, NULL, 1, 'ungarn.jpg', 'Ungarn', '2022-09-26 09:39:11');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `fta_users`
--

CREATE TABLE `fta_users` (
  `Users_ID` int(11) NOT NULL,
  `Users_Name` text NOT NULL,
  `Users_Email` text NOT NULL,
  `Users_Password` text NOT NULL,
  `Users_Role` int(11) NOT NULL,
  `Users_Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `fta_users`
--

INSERT INTO `fta_users` (`Users_ID`, `Users_Name`, `Users_Email`, `Users_Password`, `Users_Role`, `Users_Timestamp`) VALUES
(1, 'Marcus Kjær Eriksen', 'mke.firma@hotmail.com', '$2y$10$IhZAimO8H0xJ0D6y3Sa7Qe1ceqFKeaxLhK7ZPrAwi1scB8wO7Theq', 0, '2022-09-29 14:03:56');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `fta_abouts`
--
ALTER TABLE `fta_abouts`
  ADD PRIMARY KEY (`Abouts_ID`);

--
-- Indeks for tabel `fta_contacts`
--
ALTER TABLE `fta_contacts`
  ADD PRIMARY KEY (`Contacts_ID`);

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
-- Indeks for tabel `fta_users`
--
ALTER TABLE `fta_users`
  ADD PRIMARY KEY (`Users_ID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `fta_abouts`
--
ALTER TABLE `fta_abouts`
  MODIFY `Abouts_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `fta_contacts`
--
ALTER TABLE `fta_contacts`
  MODIFY `Contacts_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `fta_settings`
--
ALTER TABLE `fta_settings`
  MODIFY `Settings_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `fta_travels`
--
ALTER TABLE `fta_travels`
  MODIFY `Travels_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `fta_users`
--
ALTER TABLE `fta_users`
  MODIFY `Users_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
