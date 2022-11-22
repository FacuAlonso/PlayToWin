-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 04:38:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `playtowin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participaciones`
--

CREATE TABLE `participaciones` (
  `id` int(11) NOT NULL,
  `evento` int(11) NOT NULL COMMENT 'FK',
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `nickJugador` varchar(30) COLLATE utf8_bin NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fechaParticipa` timestamp NOT NULL DEFAULT current_timestamp(),
  `descalificado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Si es 1, está descalificado.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participaciones`
--

INSERT INTO `participaciones` (`id`, `evento`, `usuario`, `nickJugador`, `puntaje`, `fechaParticipa`, `descalificado`) VALUES
(1, 1, 1, 'XJuancitoGamerX', 15, '2022-10-07 22:14:05', 0),
(24, 2, 6, 'Juan', 123, '2022-11-20 02:21:42', 1),
(25, 2, 7, 'MasterYoda14', 24, '2022-11-22 02:11:37', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conectarEventos` (`evento`),
  ADD KEY `conectarUsuarios` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD CONSTRAINT `conectarEventos` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`),
  ADD CONSTRAINT `conectarUsuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
