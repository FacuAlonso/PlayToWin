-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2022 a las 11:54:08
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nomEvento` varchar(300) COLLATE utf8_bin NOT NULL,
  `preset` int(11) NOT NULL COMMENT 'depende de id en presets',
  `descEvento` text COLLATE utf8_bin NOT NULL,
  `reglasEvento` text COLLATE utf8_bin NOT NULL,
  `fechaFinal` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`, `estado`) VALUES
(1, '¡Logra la mayor cantidad de elixir Quemado!\r\n\r\n', 3, 'Juega una partida normal de Clash Royale intentando quemar la mayor cantidad de elixir.\r\n\r\nCuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados, así como deberás aportar la captura de pantalla.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-11-29 00:00:00', 'activo'),
(2, '¡Haz la mayor cantidad de kills!\r\n\r\n', 2, 'Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-11-20 00:00:00', 'activo'),
(3, '¡Camina la mayor distancia en el mapa!\r\n\r\n', 5, 'Descripción del evento de Fortnite, donde los jugadores deben indicar el puntaje en metros recorridos.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-12-08 11:00:00', 'activo');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `conectarPresets` FOREIGN KEY (`preset`) REFERENCES `presets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
