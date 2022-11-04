-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
-- Tiempo de generación: 21-10-2022 a las 13:00:37
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10
=======
-- Tiempo de generación: 04-11-2022 a las 02:26:16
=======
-- Tiempo de generación: 03-11-2022 a las 22:07:46
>>>>>>> parent of 70f80c5 (sql)
=======
-- Tiempo de generación: 03-11-2022 a las 22:07:46
>>>>>>> parent of 70f80c5 (sql)
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6
>>>>>>> parent of 0f6bd69 (sql)
=======
-- Tiempo de generación: 21-10-2022 a las 13:00:37
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
-- Tiempo de generación: 21-10-2022 a las 13:00:37
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10
>>>>>>> parent of baac1d6 (dasfasdsaf)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
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
<<<<<<< HEAD
<<<<<<< HEAD
  `cantUsuarios` int(11) NOT NULL DEFAULT 0,
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
  `estado` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eventos`
--

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`, `estado`) VALUES
(1, '¡Logra la mayor cantidad de elixir Quemado!\r\n\r\n', 3, 'Juega una partida normal de Clash Royale intentando quemar la mayor cantidad de elixir.\r\n\r\nCuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados, así como deberás aportar la captura de pantalla.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-10-26 00:00:00', 'activo'),
(2, '¡Haz la mayor cantidad de kills!\r\n\r\n', 2, 'Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-11-09 00:00:00', 'activo'),
(3, '¡Camina la mayor distancia en el mapa!\r\n\r\n', 5, 'Descripción del evento de Fortnite, donde los jugadores deben indicar el puntaje en metros recorridos.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-10-30 11:45:10', 'activo');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`, `cantUsuarios`, `estado`) VALUES
(1, '¡Logra la mayor cantidad de elixir Quemado!\r\n\r\n', 3, 'Juega una partida normal de Clash Royale intentando quemar la mayor cantidad de elixir.\r\n\r\nCuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados, así como deberás aportar la captura de pantalla.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-11-29 00:00:00', 0, 'activo'),
(2, '¡Haz la mayor cantidad de kills!\r\n\r\n', 2, 'Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-11-20 00:00:00', 0, 'activo'),
(3, '¡Camina la mayor distancia en el mapa!\r\n\r\n', 5, 'Descripción del evento de Fortnite, donde los jugadores deben indicar el puntaje en metros recorridos.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-12-08 11:00:00', 0, 'activo');
>>>>>>> parent of 0f6bd69 (sql)
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
(1, 1, 1, 'XJuancitoGamerX', 15, '2022-10-07 22:14:05', NULL),
(2, 3, 1, 'JuanGamer123', 12, '2022-10-14 12:19:10', NULL),
(3, 3, 1, 'Adrian69', 15, '2022-10-14 12:19:10', NULL),
(4, 3, 1, 'DarthVader7', 18, '2022-10-14 12:19:10', NULL),
(5, 3, 1, 'Julio_Perez748', 12, '2022-10-14 12:19:10', NULL);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
(1, 1, 1, 'XJuancitoGamerX', 15, '2022-10-07 22:14:05', NULL);
>>>>>>> parent of 0f6bd69 (sql)
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
=======
>>>>>>> parent of 70f80c5 (sql)
=======
>>>>>>> parent of 70f80c5 (sql)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
(1, 'Valorant', 'https://i.imgur.com/GkIFMci.png'),
(2, 'CoD: Mobile', 'https://i.imgur.com/ypC3Y1U.png'),
(3, 'Clash Royale', 'https://i.imgur.com/RXwBOXf.png'),
(4, 'Free Fire', 'https://i.imgur.com/3mAiEpV.png'),
(5, 'Fortnite', 'https://i.imgur.com/JXpzXpt.png');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
(1, 'Valorant', 'portadas\\GkIFMci.png'),
(2, 'CoD: Mobile', 'portadas\\ypC3Y1U.png'),
(3, 'Clash Royale', 'portadas\\RXwBOXf.png'),
(4, 'Free Fire', 'portadas\\3mAiEpV.png'),
(5, 'Fortnite', 'portadas\\JXpzXpt.png');
<<<<<<< HEAD
>>>>>>> parent of 0f6bd69 (sql)
=======
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac
=======
>>>>>>> parent of 70f80c5 (sql)
=======
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)

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
<<<<<<< HEAD
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
>>>>>>> parent of baac1d6 (dasfasdsaf)
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `participaciones`
--
ALTER TABLE `participaciones`
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> parent of 0f6bd69 (sql)
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> 1341200d8e7137a7f8ee948dbe9d88fb21001fac

--
=======
>>>>>>> parent of 70f80c5 (sql)
=======
>>>>>>> parent of 70f80c5 (sql)
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
>>>>>>> parent of baac1d6 (dasfasdsaf)
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
>>>>>>> parent of baac1d6 (dasfasdsaf)
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
