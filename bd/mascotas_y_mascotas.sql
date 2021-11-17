-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 04:20:00
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas_y_mascotas`
--
CREATE DATABASE IF NOT EXISTS `mascotas_y_mascotas` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `mascotas_y_mascotas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--
-- Creación: 17-11-2021 a las 02:08:46
-- Última actualización: 17-11-2021 a las 02:37:27
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `id_tipo_mascota` int(11) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `id_tipo_mascota`, `id_propietario`) VALUES
(9, 'firulari 43', 34, 34),
(10, 'ioerf', 34, 90),
(12, 'firulai', 65, 34),
(34, 'firulari 2', 34, 34),
(45, 'ioier', 65, 90),
(52, 'firulai rd', 65, 34),
(82, 'firulai f3', 65, 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--
-- Creación: 17-11-2021 a las 02:02:27
-- Última actualización: 17-11-2021 a las 02:47:38
--

DROP TABLE IF EXISTS `propietarios`;
CREATE TABLE `propietarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `comentarios` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `comentarios`) VALUES
(27, 'pedro', 'los robles', '5463', 'p@gmail.com', 'es un buen propietario'),
(34, 'javier', 'callw 4', '347874', 'jp@gmail.com', 'lleva un buen tiempo'),
(87, 'luis', 'carrera 5', '34782', 'l@gmail.com', 'un propietario reciente'),
(90, 'diego', 'calle 4 carrera 4', '347842', 'd@gmail.com', 'un propietario antiguo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_mascota`
--
-- Creación: 17-11-2021 a las 02:24:43
-- Última actualización: 17-11-2021 a las 02:29:42
--

DROP TABLE IF EXISTS `tipos_mascota`;
CREATE TABLE `tipos_mascota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_mascota`
--

INSERT INTO `tipos_mascota` (`id`, `nombre`, `descripcion`) VALUES
(34, 'tipo 2', 'lorem ipsum 2'),
(65, 'tipo 1', 'lorem ipsum');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mascotas_propietario_fk` (`id_propietario`),
  ADD KEY `mascotas_tipo_fk` (`id_tipo_mascota`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_mascota`
--
ALTER TABLE `tipos_mascota`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_propietario_fk` FOREIGN KEY (`id_propietario`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mascotas_tipo_fk` FOREIGN KEY (`id_tipo_mascota`) REFERENCES `tipos_mascota` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
