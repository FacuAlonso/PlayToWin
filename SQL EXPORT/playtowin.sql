-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 00:46:03
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
CREATE DATABASE IF NOT EXISTS `playtowin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `playtowin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nomEvento` varchar(300) COLLATE utf8_bin NOT NULL,
  `preset` int(11) NOT NULL COMMENT 'depende de id en presets',
  `descEvento` text COLLATE utf8_bin NOT NULL,
  `reglasEvento` text COLLATE utf8_bin NOT NULL,
  `fechaFinal` datetime NOT NULL DEFAULT current_timestamp(),
  `cantUsuarios` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`, `cantUsuarios`, `estado`) VALUES
(1, '¡Logra la mayor cantidad de elixir Quemado!\r\n\r\n', 3, 'Juega una partida normal de Clash Royale intentando quemar la mayor cantidad de elixir.\r\n\r\nCuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados, así como deberás aportar la captura de pantalla.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-10-14 00:00:00', 0, 'activo'),
(2, '¡Haz la mayor cantidad de kills!\r\n\r\n', 2, 'Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-10-20 00:00:00', 0, 'activo'),
(3, '¡Camina la mayor distancia en el mapa!\r\n\r\n', 5, 'Descripción del evento de Fortnite, donde los jugadores deben indicar el puntaje en metros recorridos.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-10-16 11:00:00', 0, 'activo');

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
  `posFinalVerif` int(11) DEFAULT NULL COMMENT 'La posición final que el admin declarará como resultado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participaciones`
--

INSERT INTO `participaciones` (`id`, `evento`, `usuario`, `nickJugador`, `puntaje`, `fechaParticipa`, `posFinalVerif`) VALUES
(1, 1, 1, 'XJuancitoGamerX', 15, '2022-10-07 22:14:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presets`
--

CREATE TABLE `presets` (
  `id` int(11) NOT NULL,
  `nomJuego` varchar(30) COLLATE utf8_bin NOT NULL,
  `portada` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `presets`
--

INSERT INTO `presets` (`id`, `nomJuego`, `portada`) VALUES
(1, 'Valorant', 'https://i.imgur.com/GkIFMci.png'),
(2, 'CoD: Mobile', 'https://i.imgur.com/ypC3Y1U.png'),
(3, 'Clash Royale', 'https://i.imgur.com/RXwBOXf.png'),
(4, 'Free Fire', 'https://i.imgur.com/3mAiEpV.png'),
(5, 'Fortnite', 'https://i.imgur.com/JXpzXpt.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `pass` varchar(30) COLLATE utf8_bin NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `isAdmin`) VALUES
(1, 'user1@mail.com', 'pass@123', 0),
(2, 'user2@mail.com', 'pass@123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conectarPresets` (`preset`);

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conectarEventos` (`evento`),
  ADD KEY `conectarUsuarios` (`usuario`);

--
-- Indices de la tabla `presets`
--
ALTER TABLE `presets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomJuego` (`nomJuego`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presets`
--
ALTER TABLE `presets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `conectarPresets` FOREIGN KEY (`preset`) REFERENCES `presets` (`id`);

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
