-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2021. Júl 28. 13:45
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
-- Tábla szerkezet ehhez a táblához `tranzakciok`
--

CREATE TABLE `tranzakciok` (
  `id` int(11) NOT NULL,
  `bankszamlaid` int(11) NOT NULL COMMENT 'Bankszámla id',
  `datum` datetime NOT NULL COMMENT 'Dátum',
  `mi` varchar(1) COLLATE utf8_hungarian_ci NOT NULL COMMENT '+ vagy -',
  `osszeg` int(45) NOT NULL COMMENT 'Amennyivel most változik',
  `egyenleg` int(45) NOT NULL COMMENT 'Amennyi a változás után lesz'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Tranzakciók';

--
-- A tábla adatainak kiíratása `tranzakciok`
--

INSERT INTO `tranzakciok` (`id`, `bankszamlaid`, `datum`, `mi`, `osszeg`, `egyenleg`) VALUES
(1, 1, '2021-07-28 12:37:55', '+', 10000, 10000),
(2, 1, '2021-07-28 12:40:55', '+', 5000, 15000),
(3, 1, '2021-07-28 12:41:55', '-', 5000, 10000),
(4, 2, '2021-07-28 12:41:55', '+', 5000, 5000);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tranzakciok`
--
ALTER TABLE `tranzakciok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BankszamlaId` (`bankszamlaid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tranzakciok`
--
ALTER TABLE `tranzakciok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `tranzakciok`
--
ALTER TABLE `tranzakciok`
  ADD CONSTRAINT `FK_BankszamlaId` FOREIGN KEY (`bankszamlaid`) REFERENCES `bankszamla` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
