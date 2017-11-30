-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 03:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `sku` int(20) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `valor` int(20) NOT NULL,
  `tienda` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`sku`, `nombre`, `descripcion`, `valor`, `tienda`) VALUES
(12222, 'lapices', 'de mina gruesa', 2000, 22),
(1345, 'esferos', 'de color negro y rojo', 3000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
CREATE TABLE `tienda` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `geolocalizacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `geolocalizacion`, `fecha`) VALUES
(12, 'carulla', 'chapinero', '2017-01-24'),
(14, 'exito', 'centro', '2017-10-19'),
(15, 'ara', 'norte', '2017-11-04'),
(20, 'carrefour', 'tesaquillo', '2017-11-17'),
(22, 'panamericana', 'restrepo', '2017-11-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD KEY `tienda` (`tienda`);

--
-- Indexes for table `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tienda`) REFERENCES `tienda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
