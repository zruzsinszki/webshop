-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jún 30. 13:43
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop1`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `name` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, '123456', 'admin@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(2, '012345', '012345@gmail.com', '5da568ffb6e614af588f2e5de809d3988341e8c533d8d74133843f15b246a676eecedf78f8c44c3860aedb04e2e6ae5c937a6960fbea71bd47bd2abdb01cf180');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirlevel`
--

CREATE TABLE `hirlevel` (
  `id` int(100) NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hirlevel`
--

INSERT INTO `hirlevel` (`id`, `email`) VALUES
(1, 'ruzsinszki.zoltan@gmail.com'),
(27, 'ruzsinszki.zoltan@gmail.com'),
(28, 'ruzsinszki.zoltan@gmail.com'),
(29, 'test1@gmail.com'),
(30, 'test1@gmail.com'),
(31, 'ruzsinszki.zoltan@gmail.com'),
(32, 'user@gmail.com'),
(33, 'user@gmail.com'),
(34, 'user@gmail.com'),
(35, 'user@gmail.com'),
(36, 'user@gmail.com'),
(37, 'user@gmail.com'),
(38, 'ruzsinszki.zoltan@gmail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `id` int(9) NOT NULL,
  `katnev` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `katsorrend` varchar(100) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`id`, `katnev`, `katsorrend`) VALUES
(2, 'Fülhallgatók', '2'),
(3, 'Töltő és kábelek', '3'),
(4, 'Selfie bot', '4'),
(5, 'Egyéb', '5'),
(6, 'Akciók', '6');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `id` int(9) NOT NULL,
  `vevoid` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `szallitas` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `fizmod` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `datum` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `statusz` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `bosszeg` varchar(100) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendelesek`
--

INSERT INTO `rendelesek` (`id`, `vevoid`, `szallitas`, `fizmod`, `datum`, `statusz`, `bosszeg`) VALUES
(1, '1', 'gls', 'obk', '2020-03-14 12:46:21', 'függőben', '19999'),
(2, '2', 'gls', 'obk', '2020-03-14 13:26:16', 'függőben', '8999'),
(3, '3', 'posta', 'atutalas', '2020-03-21 10:24:57', 'függőben', '32000'),
(4, '4', 'szemelyes', 'utanvet', '2020-03-21 10:25:34', 'függőben', '63479'),
(5, '5', 'gls', 'atutalas', '2020-06-14 08:42:27', 'függőben', '0'),
(6, '6', 'gls', 'obk', '2020-06-15 18:55:53', 'függőben', '63950'),
(7, '7', 'gls', 'obk', '2020-06-15 19:09:55', 'függőben', '63950'),
(8, '8', 'gls', 'obk', '2020-06-25 14:07:23', 'függőben', '9990'),
(9, '9', 'gls', 'obk', '2020-06-26 06:28:09', 'függőben', '58960');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rend_term`
--

CREATE TABLE `rend_term` (
  `id` int(9) NOT NULL,
  `rendelesid` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `termekid` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `db` varchar(100) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `rend_term`
--

INSERT INTO `rend_term` (`id`, `rendelesid`, `termekid`, `db`) VALUES
(1, '1', '3', '1'),
(2, '2', '8', '1'),
(3, '2', '79', '1'),
(4, '2', '1', '1'),
(5, '3', '4', '2'),
(6, '4', '6', '1'),
(7, '4', '11', '1'),
(8, '4', '2', '1'),
(9, '5', '79', '1'),
(10, '5', '74', '1'),
(11, '5', '3', '2'),
(12, '6', '79', '1'),
(13, '6', '74', '1'),
(14, '6', '3', '10'),
(15, '6', '14', '3'),
(16, '6', '13', '2'),
(17, '7', '79', '1'),
(18, '7', '74', '1'),
(19, '7', '3', '10'),
(20, '7', '14', '3'),
(21, '7', '13', '2'),
(22, '8', '8', '1'),
(23, '9', '13', '1'),
(24, '9', '12', '2'),
(25, '9', '14', '1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tajekoztato`
--

CREATE TABLE `tajekoztato` (
  `id` int(9) NOT NULL,
  `cim` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `content` varchar(10000) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `tajekoztato`
--

INSERT INTO `tajekoztato` (`id`, `cim`, `content`) VALUES
(1, 'VÁSÁRLÓI TÁJÉKOZTATÓ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean velit sem, commodo vel erat id, feugiat dictum odio. Nulla aliquet ligula ac odio congue, ultricies bibendum ligula dignissim. Mauris vel magna finibus purus posuere dignissim eu sed ante. Vestibulum eget lacinia lectus, nec porta elit. Sed luctus, dolor eu sodales dapibus, magna erat blandit erat, et consectetur felis ante ut nulla. Proin ullamcorper mattis vulputate. Ut ac leo id lorem rutrum congue sit amet sit amet est. Fusce gravida sapien vitae ligula blandit pretium. Phasellus fermentum ullamcorper condimentum. Nam eget pellentesque erat. Integer vitae nunc vel nulla commodo viverra sed vitae tortor. Phasellus nec varius eros, eu efficitur metus. Fusce bibendum tortor a enim bibendum, non elementum turpis posuere. Aliquam tristique enim eget metus aliquet volutpat. Vestibulum a condimentum felis, quis consectetur neque. Praesent facilisis volutpat tortor, id finibus sem pretium in. Vivamus feugiat tristique lorem a rutrum. Aenean dolor ante, pretium nec tellus quis, accumsan laoreet nunc. Curabitur faucibus faucibus arcu, sed fermentum turpis vehicula id. In in eros purus. Fusce euismod diam in urna tempus consectetur. Ut nec tincidunt risus. Integer vitae lectus turpis. Nunc nunc erat, ultricies id erat at, mollis porttitor est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam condimentum sem id ante volutpat, non condimentum enim porttitor. Quisque elementum libero vitae bibendum euismod. Mauris luctus laoreet nulla sed venenatis. Donec eget imperdiet ex. Donec nunc sem, cursus gravida nisi sed, dapibus egestas urna.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(9) NOT NULL,
  `kategoria` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `nev` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `cikkszam` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `ar` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `rleiras` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `hleiras` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `kep` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `keszlet` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `aktiv` varchar(100) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `kategoria`, `nev`, `cikkszam`, `ar`, `rleiras`, `hleiras`, `kep`, `keszlet`, `aktiv`) VALUES
(1, '2', 'BlitzWolf® BW-ES4', '001', '8999', 'BlitzWolf® BW-ES4: Dual Dynamic Driver In-ear mikrofonos fülhallgató', 'Dual Dynamic Drivernek köszönhetően mély, határozott basszus jellemzi. ', 'img/termek1.jpg', '10', ''),
(2, '2', 'Samsung Galaxy Buds', '001', '19999', 'Samsung Galaxy Buds (SM-R170) Bluetooth fülhallgató, fekete', 'wrteas', 'img/termek2.jpg', '10', ''),
(4, '2', 'BlitzWolf® BW-FYE7', '003', '16000', 'teljesen vezeték nélküli Dual Dynamic Driver fülhallgató töltődobozzal', 'BlitzWolf® BW-FYE7: teljesen vezeték nélküli Dual Dynamic Driver fülhallgató töltődobozzal', 'img/termek3.jpg', '30', ''),
(5, '2', 'BlitzWolf® BW-HP0', '004', '11990', 'vezeték nélküli Bluetooth sport fejhallgató beépített mikrofonnal', 'BlitzWolf® BW-HP0: vezeték nélküli Bluetooth sport fejhallgató beépített mikrofonnal', 'img/termek4.jpg', '20', ''),
(6, '3', 'BlitzWolf® BW-PL2', '005', '7490', '3 portos USB hálózati gyorstöltő - 38W', 'BlitzWolf® BW-PL2: 3 portos USB hálózati gyorstöltő - 38W', 'img/termek5.jpg', '10', ''),
(7, '3', 'BlitzWolf® BW-FWC5', '006', '7990', 'vezeték nélküli gyorstöltő pad 10W teljesítménnyel', 'BlitzWolf® BW-FWC5: vezeték nélküli gyorstöltő pad 10W teljesítménnyel', 'img/termek6.jpg', '10', ''),
(8, '4', 'BlitzWolf® BW-BS10', '007', '9990', 'ultrakompakt alumínium selfie bot okostelefonhoz - Fekete', 'BlitzWolf® BW-BS10: ultrakompakt alumínium selfie bot okostelefonhoz - Fekete', 'img/termek7.jpg', '7', ''),
(9, '4', 'BlitzWolf® BW-BS9', '0008', '9990', '66,5 cm hosszú multifunkciós selfie bot okostelefonhoz - Fekete', 'BlitzWolf® BW-BS9: 66,5 cm hosszú multifunkciós selfie bot okostelefonhoz - Fekete', 'img/termek8.jpg', '8', ''),
(10, '5', 'BlitzWolf® BW-WA1', '009', '14990', '1200mAh vezeték nélküli Bluetooth hangszóró 360 fokos térhangzással (12W)', 'BlitzWolf® BW-WA1: 1200mAh vezeték nélküli Bluetooth hangszóró 360 fokos térhangzással (12W)', 'img/termek9.jpg', '30', ''),
(11, '5', 'Tronsmart Element T6', '010', '35990', 'Bluetooth hangszóró 360 fokos térhangzással (60W)', 'Tronsmart Element T6 Max SoundPulse™: Bluetooth hangszóró 360 fokos térhangzással (60W)', 'img/termek10.jpg', '1', ''),
(12, '5', 'BlitzWolf® BW-WA2', '011', '17990', 'vezeték nélküli vízálló Bluetooth hangszóró (20W)', 'BlitzWolf® BW-WA2: vezeték nélküli vízálló Bluetooth hangszóró (20W)', 'img/termek11.jpg', '11', ''),
(13, '2', 'BlitzWolf® AIRAUX AA-HE1', '012', '4990', 'Dual Dynamic Driver In-ear mikrofonos fülhallgató', 'BlitzWolf® AIRAUX AA-HE1: Dual Dynamic Driver In-ear mikrofonos fülhallgató', 'img/termek12.jpg', '12', ''),
(14, '2', 'BlitzWolf® BW-FYE6', '013', '17990', 'vezeték nélküli grafén fülhallgató digitális kijelzővel és mikrofonnal (IPX6)', 'BlitzWolf® BW-FYE6: vezeték nélküli grafén fülhallgató digitális kijelzővel és mikrofonnal (IPX6)', 'img/termek13.jpg', '13', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, '123456', '123456@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vevok`
--

CREATE TABLE `vevok` (
  `id` int(9) NOT NULL,
  `nev` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `cim` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `pw` varchar(100) COLLATE utf32_hungarian_ci NOT NULL,
  `szcim` varchar(100) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `vevok`
--

INSERT INTO `vevok` (`id`, `nev`, `email`, `cim`, `telefon`, `pw`, `szcim`) VALUES
(1, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(2, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(3, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(4, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(5, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(6, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(7, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(8, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2'),
(9, 'Ruzsinszki Zoltán', 'ruzsinszki.zoltan@gmail.com', '', '+36 6304497624', '', 'Fészek út 119 1/2');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `hirlevel`
--
ALTER TABLE `hirlevel`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rend_term`
--
ALTER TABLE `rend_term`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tajekoztato`
--
ALTER TABLE `tajekoztato`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vevok`
--
ALTER TABLE `vevok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `hirlevel`
--
ALTER TABLE `hirlevel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `rend_term`
--
ALTER TABLE `rend_term`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `tajekoztato`
--
ALTER TABLE `tajekoztato`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `vevok`
--
ALTER TABLE `vevok`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
