-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Tem 2020, 07:15:50
-- Sunucu sürümü: 10.3.22-MariaDB
-- PHP Sürümü: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `plg`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `plugin_chat`
--

CREATE TABLE `plugin_chat` (
  `id` int(11) NOT NULL,
  `uuid` varchar(60) NOT NULL,
  `siteCode` varchar(60) NOT NULL,
  `v_sender` varchar(60) NOT NULL,
  `v_receiver` varchar(60) NOT NULL,
  `v_message` text NOT NULL,
  `v_status` set('new','seen') NOT NULL,
  `v_hook` varchar(60) DEFAULT NULL,
  `ip` varchar(24) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `plugin_chat`
--
ALTER TABLE `plugin_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siteCode` (`siteCode`,`v_sender`,`v_receiver`),
  ADD KEY `siteCode_2` (`siteCode`,`v_sender`,`v_receiver`,`v_status`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `plugin_chat`
--
ALTER TABLE `plugin_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
