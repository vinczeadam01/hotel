-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 08. 22:41
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hotel`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
--

CREATE TABLE `foglalas` (
  `id` int(11) NOT NULL,
  `erkezes` date NOT NULL,
  `tavozas` date NOT NULL,
  `ellatas` int(1) NOT NULL,
  `fizet` int(10) NOT NULL,
  `szobaszam` int(11) NOT NULL,
  `vendegid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `foglalas`
--

INSERT INTO `foglalas` (`id`, `erkezes`, `tavozas`, `ellatas`, `fizet`, `szobaszam`, `vendegid`) VALUES
(1, '2021-01-04', '2021-01-09', 1, 120000, 3, 1),
(2, '2021-01-07', '2021-01-10', 0, 70000, 3, 4),
(3, '2021-11-08', '2021-11-09', 1, 17000, 1, 1),
(4, '2021-01-15', '2021-01-18', 0, 120000, 8, 7),
(5, '2021-01-23', '2021-01-24', 1, 17000, 7, 8),
(6, '2021-02-05', '2021-02-07', 0, 60000, 10, 10),
(7, '2021-02-26', '2021-02-28', 0, 100000, 5, 11),
(8, '2021-02-09', '2021-02-16', 0, 105000, 1, 12),
(9, '2021-01-30', '2021-02-02', 0, 90000, 6, 9),
(10, '2021-02-01', '2021-02-04', 1, 132000, 8, 13),
(11, '2021-02-05', '2021-02-10', 1, 290000, 9, 8),
(12, '2021-02-21', '2021-02-25', 1, 136000, 3, 7),
(13, '2021-03-01', '2021-03-07', 0, 180000, 2, 2),
(14, '2021-03-20', '2021-03-21', 1, 17000, 1, 3),
(15, '2021-03-08', '2021-03-12', 1, 176000, 4, 6),
(16, '2021-03-20', '2021-03-22', 1, 68000, 2, 5),
(17, '2021-04-02', '2021-04-06', 1, 232000, 5, 14),
(18, '2021-03-10', '2021-03-11', 1, 34000, 10, 15),
(19, '2021-04-12', '2021-04-15', 1, 132000, 4, 5),
(20, '2021-04-12', '2021-04-16', 1, 176000, 4, 8),
(21, '2021-04-11', '2021-04-12', 0, 15000, 1, 10),
(22, '2021-04-16', '2021-04-18', 0, 60000, 6, 12),
(23, '2021-04-03', '2021-04-09', 1, 348000, 9, 9),
(25, '2021-04-08', '2021-04-11', 0, 102000, 10, 17),
(26, '2021-04-20', '2021-04-22', 0, 88000, 8, 6),
(27, '2021-04-23', '2021-04-26', 1, 132000, 4, 17),
(28, '2021-05-01', '2021-05-05', 1, 232000, 5, 16),
(29, '2021-05-12', '2021-05-13', 0, 15000, 7, 20),
(30, '2021-05-17', '2021-05-21', 0, 120000, 6, 19),
(31, '2021-05-10', '2021-05-15', 0, 250000, 5, 18),
(32, '2021-05-04', '2021-05-09', 1, 170000, 10, 21),
(33, '2021-05-26', '2021-05-27', 0, 30000, 3, 1),
(34, '2021-05-18', '2021-05-20', 0, 30000, 1, 24),
(35, '2021-05-30', '2021-06-02', 0, 150000, 5, 23),
(36, '2021-06-03', '2021-06-05', 1, 68000, 3, 22),
(37, '2021-06-17', '2021-06-21', 0, 120000, 6, 9),
(38, '2021-06-01', '2021-06-08', 0, 280000, 8, 22),
(39, '2021-06-10', '2021-06-11', 0, 15000, 7, 21),
(40, '2021-06-15', '2021-06-18', 0, 90000, 10, 15),
(41, '2021-06-03', '2021-06-06', 0, 90000, 6, 23),
(42, '2021-06-25', '2021-06-28', 0, 90000, 6, 19),
(43, '2021-06-28', '2021-07-01', 0, 120000, 4, 20),
(44, '2021-07-01', '2021-07-05', 1, 136000, 3, 23),
(45, '2021-06-15', '2021-06-18', 1, 102000, 6, 25),
(46, '2021-07-21', '2021-07-23', 1, 60000, 1, 1),
(47, '2021-07-01', '2021-07-03', 0, 30000, 7, 28),
(48, '2021-07-12', '2021-07-14', 0, 60000, 6, 26),
(49, '2021-07-24', '2021-07-27', 1, 102000, 6, 27),
(50, '2021-07-16', '2021-07-19', 0, 120000, 8, 26),
(51, '2021-07-22', '2021-07-25', 1, 102000, 3, 28),
(53, '2021-07-10', '2021-07-12', 0, 116000, 9, 31),
(54, '2021-07-16', '2021-07-19', 0, 132000, 4, 32),
(55, '2021-07-29', '2021-08-01', 1, 51000, 7, 29),
(56, '2021-08-08', '2021-08-10', 1, 116000, 5, 30),
(57, '2021-08-15', '2021-08-17', 1, 34000, 1, 33),
(58, '2021-08-10', '2021-08-13', 1, 102000, 6, 34),
(59, '2021-08-15', '2021-08-19', 1, 68000, 1, 1),
(60, '2021-08-19', '2021-08-22', 0, 45000, 7, 35),
(61, '2021-08-27', '2021-08-29', 1, 68000, 6, 34),
(62, '2021-09-01', '2021-09-03', 0, 60000, 2, 5),
(63, '2021-09-01', '2021-09-05', 0, 120000, 10, 31),
(64, '2021-09-20', '2021-09-24', 0, 120000, 6, 30),
(65, '2021-09-06', '2021-09-08', 0, 116000, 9, 36),
(66, '2021-09-21', '2021-09-24', 1, 102000, 2, 37),
(67, '2021-10-01', '2021-10-02', 0, 15000, 1, 20),
(68, '2021-10-06', '2021-10-08', 0, 30000, 1, 18),
(69, '2021-10-10', '2021-10-16', 1, 264000, 4, 8),
(70, '2021-10-20', '2021-10-24', 1, 136000, 10, 33),
(71, '2021-11-20', '2021-11-26', 0, 180000, 3, 38),
(72, '2021-12-08', '2021-12-09', 1, 34000, 6, 5),
(73, '2021-12-15', '2021-12-19', 0, 160000, 8, 3),
(74, '2021-12-20', '2021-12-26', 0, 300000, 5, 35),
(75, '2021-12-28', '2021-12-30', 0, 60000, 6, 9),
(76, '2021-10-16', '2021-10-18', 1, 68000, 6, 17),
(77, '2021-08-11', '2021-08-14', 0, 90000, 2, 12),
(78, '2021-08-20', '2021-08-22', 0, 80000, 4, 24);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szoba`
--

CREATE TABLE `szoba` (
  `szobaszam` int(11) NOT NULL,
  `emelet` int(11) NOT NULL,
  `szobatipus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szoba`
--

INSERT INTO `szoba` (`szobaszam`, `emelet`, `szobatipus`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 2),
(4, 2, 3),
(5, 2, 4),
(6, 3, 2),
(7, 3, 1),
(8, 3, 3),
(9, 4, 4),
(10, 4, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szobatipus`
--

CREATE TABLE `szobatipus` (
  `id` int(11) NOT NULL,
  `ferohely` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `nev` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szobatipus`
--

INSERT INTO `szobatipus` (`id`, `ferohely`, `ar`, `nev`) VALUES
(1, 1, 15000, 'Egyágyas szoba'),
(2, 2, 30000, 'Kétágyas szoba'),
(3, 2, 40000, 'Deluxe kétágyas szoba'),
(4, 4, 50000, 'Családi lakosztály');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vendeg`
--

CREATE TABLE `vendeg` (
  `id` int(11) NOT NULL,
  `vnev` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `knev` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `szuldatum` date NOT NULL,
  `email` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vendeg`
--

INSERT INTO `vendeg` (`id`, `vnev`, `knev`, `szuldatum`, `email`) VALUES
(1, 'Horváth', 'Alex', '1980-10-15', 'alex.horvat@mail.com'),
(2, 'Kovács', 'János', '1976-02-26', 'janos.kovacs@mail.com'),
(3, 'Fodor', 'Ádám', '1998-06-05', 'adam.fodor@mail.com'),
(4, 'Kis', 'Helga', '1992-04-15', 'helga.kis92@mail.com'),
(5, 'Winch', 'Eszter', '1987-12-22', 'esztikee@hotmail.hu'),
(6, 'Vincze', 'Ádám', '2001-12-11', 'adam.vincze01@gmail.com'),
(7, 'Molnár', 'Csenge', '1970-08-30', 'csenge.molnar@mail.com'),
(8, 'Koaxk', 'Ábel', '1960-01-09', 'koax.kabel@mail.com'),
(9, 'Tóth', 'Imre', '1972-11-20', 'imretoth72@mail.com'),
(10, 'Kovács', 'Patrik', '1999-04-13', 'patrikk@mail.com'),
(11, 'Cseh', 'Laura', '1989-09-12', 'cslauraaa@mail.com'),
(12, 'Varga', 'Irén', '1972-05-23', 'irenketiktok@mail.com'),
(13, 'Bors', 'Menta', '1997-12-29', 'menta@mail.com'),
(14, 'Balog', 'Antal', '1968-04-22', 'antal68@email.com'),
(15, 'Szabó', 'Kitti', '1989-08-25', 'kittiszabo@email.com'),
(16, 'Horváth', 'Bálint', '1992-09-21', 'balintgamer@email.com'),
(17, 'Kis', 'Virág', '1989-02-12', 'virag1989@gmail.com'),
(18, 'Kocsis', 'Tibor', '1995-11-23', 'tibivagyok@gmail.com'),
(19, 'Balogh', 'Erika', '1975-06-09', 'erika75@mail.com'),
(20, 'Kovács', 'Imre', '1968-08-09', 'kovacsimre@gmail.com'),
(21, 'Varga', 'Sándor', '1952-05-20', 'sandor.varga@mail.com'),
(22, 'Lukács', 'Dániel', '1991-04-09', 'danilukacs@mail.com'),
(23, 'Molnár', 'Tamás', '1973-03-10', 'tamasmolnar@mail.com'),
(24, 'Farkas', 'Vanda', '1998-07-24', 'vanda98@mail.com'),
(25, 'Szabó', 'Sándor', '1983-06-09', 'sanyiszabo@mail.com'),
(26, 'Mészáros', 'Pál', '1968-01-04', 'pali@mail.com'),
(27, 'Arany', 'Norbert', '1989-06-06', 'norbert@mail.com'),
(28, 'Jakab', 'Endre', '1981-09-21', 'endre81@mail.com'),
(29, 'Kasai', 'Dénes', '1991-09-11', 'kdenes@mail.com'),
(30, 'Katona', 'Csilla', '1999-12-27', 'csilla99@mail.com'),
(31, 'Németh', 'Tamás', '1988-05-17', 'tamasnemet@mail.com'),
(32, 'Szabó', 'Zoé', '1986-11-12', 'szabozoe@mail.com'),
(33, 'Bencs', 'Dóra', '1978-03-03', 'dora1978@mail.com'),
(34, 'Berényi', 'Ágnes', '1967-01-09', 'agnesberenyi@mail.com'),
(35, 'Halász', 'Krisztián', '1976-10-20', 'krisz76@mail.com'),
(36, 'Szilágyi', 'András', '1976-05-05', 'andrasszilagy@mail.com'),
(37, 'Somogyi', 'Máté', '2001-05-09', 'matesomogyi@mail.com'),
(38, 'Müller', 'Ágnes', '1987-10-29', 'agnes@mail.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foglalas_ibfk_2` (`vendegid`),
  ADD KEY `szobaszam` (`szobaszam`) USING BTREE;

--
-- A tábla indexei `szoba`
--
ALTER TABLE `szoba`
  ADD PRIMARY KEY (`szobaszam`),
  ADD KEY `szobatipus` (`szobatipus`);

--
-- A tábla indexei `szobatipus`
--
ALTER TABLE `szobatipus`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vendeg`
--
ALTER TABLE `vendeg`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT a táblához `szoba`
--
ALTER TABLE `szoba`
  MODIFY `szobaszam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `szobatipus`
--
ALTER TABLE `szobatipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `vendeg`
--
ALTER TABLE `vendeg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `foglalas`
--
ALTER TABLE `foglalas`
  ADD CONSTRAINT `foglalas_ibfk_1` FOREIGN KEY (`szobaszam`) REFERENCES `szoba` (`szobaszam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foglalas_ibfk_2` FOREIGN KEY (`vendegid`) REFERENCES `vendeg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `szoba`
--
ALTER TABLE `szoba`
  ADD CONSTRAINT `szoba_ibfk_1` FOREIGN KEY (`szobatipus`) REFERENCES `szobatipus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
