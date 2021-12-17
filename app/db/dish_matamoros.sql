-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2021 at 11:09 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dish_matamoros`
--
CREATE DATABASE IF NOT EXISTS `dish_matamoros` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dish_matamoros`;

-- --------------------------------------------------------

--
-- Table structure for table `canales`
--

DROP TABLE IF EXISTS `canales`;
CREATE TABLE IF NOT EXISTS `canales` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `paquete_id` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_unique` (`name`),
  UNIQUE KEY `path_unique` (`path`),
  KEY `fk_canal_id_paquete_idx` (`paquete_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `canales`
--

INSERT INTO `canales` (`id`, `name`, `path`, `type`, `paquete_id`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Cine Latino', '/canales/junior/incluidos/cine_latino.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:32:33'),
(2, 'Cv Directo', '/canales/junior/incluidos/cv_directo.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:33:12'),
(3, 'Discovery', '/canales/junior/incluidos/discovery.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:33:40'),
(4, 'Discovery Kids', '/canales/junior/incluidos/discovery_kids.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:34:12'),
(5, 'Disney Junior', '/canales/junior/incluidos/disney_junior.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:34:40'),
(6, 'Espn 3', '/canales/junior/incluidos/espn3.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:35:06'),
(7, 'Exa Tv', '/canales/junior/incluidos/exa_tv.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:35:29'),
(8, 'Fox Sport', '/canales/junior/incluidos/fox_sport.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:35:51'),
(9, 'FXM', '/canales/junior/incluidos/fxm.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:36:13'),
(10, 'History', '/canales/junior/incluidos/history.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:36:35'),
(11, 'I Entertaiment', '/canales/junior/incluidos/i_entertaiment.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:36:56'),
(12, 'ID', '/canales/junior/incluidos/id.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:37:13'),
(13, 'Justicia Tv', '/canales/junior/incluidos/justicia_tv.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:37:42'),
(14, 'MC', '/canales/junior/incluidos/mc.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:38:00'),
(15, 'MP', '/canales/junior/incluidos/mp.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:38:23'),
(16, 'MTV', '/canales/junior/incluidos/mtv.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:38:42'),
(17, 'MVS Tv', '/canales/junior/incluidos/mvs_tv.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:39:23'),
(18, 'Nat Geo', '/canales/junior/incluidos/nat_geo.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:39:43'),
(19, 'Nick Music', '/canales/junior/incluidos/nick_music.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:40:08'),
(20, 'Sony', '/canales/junior/incluidos/sony.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:40:30'),
(21, 'Space', '/canales/junior/incluidos/space.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:40:51'),
(22, 'Star Channel', '/canales/junior/incluidos/star_channel.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:41:12'),
(23, 'Star Life', '/canales/junior/incluidos/star_life.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:41:37'),
(24, 'Studio', '/canales/junior/incluidos/studio.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:41:57'),
(25, 'SyFy', '/canales/junior/incluidos/syfy.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:42:20'),
(26, 'TLC', '/canales/junior/incluidos/tlc.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:42:37'),
(27, 'TNT Series', '/canales/junior/incluidos/tnt_series.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:42:59'),
(28, 'Universal', '/canales/junior/incluidos/universal.png', 'incluidos', 1, NULL, NULL, '2021-12-17 21:43:15'),
(29, 'Canal 6', '/canales/junior/abierta/canal_6.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:43:59'),
(30, 'Canal 14', '/canales/junior/abierta/canal_14.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:44:28'),
(31, 'Canal 22', '/canales/junior/abierta/canal_22.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:44:56'),
(32, 'Canal 22 2', '/canales/junior/abierta/canal_22_2.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:45:25'),
(33, 'Canal del Congreso', '/canales/junior/abierta/canal_congreso.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:45:53'),
(34, 'Canal Once', '/canales/junior/abierta/canal_once.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:46:31'),
(35, 'Cinco', '/canales/junior/abierta/cinco.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:46:54'),
(36, 'Dos', '/canales/junior/abierta/dos.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:47:14'),
(37, 'IMAGEN Televisión', '/canales/junior/abierta/imagen_tv.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:47:45'),
(38, 'Ingenio Tv', '/canales/junior/abierta/ingenio_tv.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:48:13'),
(39, 'Once Niños', '/canales/junior/abierta/once_niños.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:48:40'),
(40, 'Siete', '/canales/junior/abierta/siete.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:49:03'),
(41, 'tv unam', '/canales/junior/abierta/tv_unam.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:49:26'),
(42, 'Uno', '/canales/junior/abierta/uno.png', 'abierta', 1, NULL, NULL, '2021-12-17 21:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
CREATE TABLE IF NOT EXISTS `paquetes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paquetes`
--

INSERT INTO `paquetes` (`id`, `name`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'dish junior', NULL, NULL, '2021-12-17 21:32:02'),
(2, 'básico', NULL, NULL, '2021-12-17 21:31:56'),
(3, 'dish hd', NULL, NULL, '2021-12-17 21:29:57'),
(4, 'paquetes premiun', NULL, NULL, '2021-12-17 21:30:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canales`
--
ALTER TABLE `canales`
  ADD CONSTRAINT `fk_canal_id_paquete` FOREIGN KEY (`paquete_id`) REFERENCES `paquetes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
