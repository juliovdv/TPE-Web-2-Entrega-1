-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2020 a las 01:58:34
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_resenias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_resenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `usuario`, `comentario`, `puntuacion`, `id_resenia`) VALUES
(46, '1', '1', 5, 28),
(47, '1', '1', 5, 28),
(48, '1', '1', 5, 28),
(49, '1', '1', 5, 28),
(50, '1', '1', 5, 28),
(51, '1', '1', 5, 28),
(56, '1', '5345', 1, 28),
(57, '1', 'dttryr', 1, 28),
(58, '1', 'erttert', 3, 27),
(59, '1', 'erttert', 3, 27),
(60, '1', 'erttert', 3, 27),
(61, 'admin@admin.com', 'frewr', 4, 27),
(62, 'admin@admin.com', '', 1, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(7, 'Terror'),
(8, 'Suspenso'),
(9, 'Accion'),
(11, 'Animadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `id_resenias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenia`
--

CREATE TABLE `resenia` (
  `id_resenia` int(11) NOT NULL,
  `nombre_pelicula` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `resenia` varchar(240) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resenia`
--

INSERT INTO `resenia` (`id_resenia`, `nombre_pelicula`, `usuario`, `resenia`, `id_genero`, `img`) VALUES
(18, 'Perro', 'admin@admin.com', '', 7, NULL),
(19, 'Toy Story', 'admin@admin.com', 'Muy buena', 11, NULL),
(27, 'La bella', 'admin@admin.com', 'DFGDFg', 11, NULL),
(28, 'Coraline', 'admin@admin.com', 'Buena', 11, NULL),
(30, 'Hola', 'admin@admin.com', 'Hola', 8, NULL),
(32, 'Perro', 'admin@admin.com', '5454', 7, 'uploads/caratulas/5edd531b79e75.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `mail`, `clave`, `admin`) VALUES
(1, 'admin@admin.com', '$2y$10$tWhegMJ8fheeOug05TP/dOsA.cL87sA4alHd6igAl7SlOZ/yvJVPK', 1),
(12, 'juliovdv@hotmail.com', '$2y$10$seY8UKBkFUuN50qmzsf2fOCn0ppQEiYaGAu4rA6syBGw3OgbYl3NW', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_resenia` (`id_resenia`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_resenias` (`id_resenias`);

--
-- Indices de la tabla `resenia`
--
ALTER TABLE `resenia`
  ADD PRIMARY KEY (`id_resenia`),
  ADD KEY `id_categoria` (`id_genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resenia`
--
ALTER TABLE `resenia`
  MODIFY `id_resenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_resenia`) REFERENCES `resenia` (`id_resenia`);

--
-- Filtros para la tabla `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_resenias`) REFERENCES `resenia` (`id_resenia`);

--
-- Filtros para la tabla `resenia`
--
ALTER TABLE `resenia`
  ADD CONSTRAINT `resenia_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
