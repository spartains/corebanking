-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2021. Júl 28. 13:44
-- Kiszolgáló verziója: 10.3.29-MariaDB-cll-lve
-- PHP verzió: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Tábla szerkezet ehhez a táblához `bankszamla`
--

CREATE TABLE `bankszamla` (
  `id` int(11) NOT NULL,
  `nev` varchar(64) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Név',
  `szamlaszam` varchar(28) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Számlaszám',
  `pinkod` int(4) NOT NULL COMMENT 'PINkód',
  `osszeg` int(45) NOT NULL COMMENT 'Pénz'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `bankszamla`
--

INSERT INTO `bankszamla` (`id`, `nev`, `szamlaszam`, `pinkod`, `osszeg`) VALUES
(1, 'Marosi Endre', 'HU71123456781234567800000000', 1234, 10000),
(2, 'Kis Pista', 'HU71123456781234568800000000', 1236, 5000);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bankszamla`
--
ALTER TABLE `bankszamla`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bankszamla`
--
ALTER TABLE `bankszamla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
