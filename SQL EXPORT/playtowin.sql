-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 02:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playtowin`
--
CREATE DATABASE IF NOT EXISTS `playtowin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `playtowin`;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nomEvento` varchar(300) NOT NULL,
  `preset` int(11) NOT NULL COMMENT 'depende de id en presets',
  `descEvento` text NOT NULL,
  `reglasEvento` text NOT NULL,
  `fechaFinal` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(30) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nomEvento`, `preset`, `descEvento`, `reglasEvento`, `fechaFinal`, `estado`) VALUES
(1, '¡Logra la mayor cantidad de elixir Quemado!\r\n\r\n', 3, 'Juega una partida normal de Clash Royale intentando quemar la mayor cantidad de elixir.\r\n\r\nCuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-12-03 00:00:00', 'finalizado'),
(2, '¡Haz la mayor cantidad de kills!', 2, 'Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills. Descripción del evento de CoD Mobile, donde los jugadores deben hacer kills.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-12-12 15:49:00', 'finalizado'),
(3, '¡Camina la mayor distancia en el mapa!\r\n\r\n', 5, 'Descripción del evento de Fortnite, donde los jugadores deben indicar el puntaje en metros recorridos.', 'No cuentan partidas personalizadas. La partida debe haber sido jugada durante el período del evento.', '2022-12-08 11:00:00', 'finalizado'),
(18, '¡Haz la mayor cantidad de goles!', 44, '¡Juega una partida en línea de FIFA 22, e indica cuántos goles has hecho! Cuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados.', '- No valen partidas personalizadas ni locales (no online)', '2022-12-04 17:21:00', 'finalizado'),
(20, '¡Logra hacer la mayor cantidad de puntos!', 46, 'Juega una partida de Pac-Man, intentando conseguir el mayor puntaje. Cuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados.', '- No valen partidas modificadas/personalizadas', '2022-12-06 18:01:00', 'finalizado'),
(21, 'Gana una partida en el menor tiempo', 47, 'Demuestra tu habilidad en CS:GO e intenta ganar una partida en el menor tiempo posible. Ingresa el tiempo en cantidad de segundos. Cuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados.', '- Deben ser partidas de 30 rondas - Se puede usar cualquier arma - Modo solitario - Partidas oficiales', '2022-12-14 18:04:00', 'finalizado'),
(22, 'Realiza la mayor cantidad de bajas con cuchillo', 1, 'En partidas normales, realiza la mayor cantidad de bajas con cuchillo que puedas. Cuando estés conforme con tu puntaje obtenido, haz click en PARTICIPAR y completa los datos solicitados.', 'Sólo puedes usar el cuchillo como arma - Puedes jugar en equipo', '2022-12-01 18:15:00', 'finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `participaciones`
--

CREATE TABLE `participaciones` (
  `id` int(11) NOT NULL,
  `evento` int(11) NOT NULL COMMENT 'FK',
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `nickJugador` varchar(30) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fechaParticipa` timestamp NOT NULL DEFAULT current_timestamp(),
  `descalificado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Si es 1, está descalificado.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `participaciones`
--

INSERT INTO `participaciones` (`id`, `evento`, `usuario`, `nickJugador`, `puntaje`, `fechaParticipa`, `descalificado`) VALUES
(1, 1, 1, 'XJuancitoGamerX', 15, '2022-10-07 22:14:05', 0),
(33, 22, 1, 'Juandesu', 4, '2022-12-01 21:10:01', 0),
(34, 22, 2, 'JojoManu', 9, '2022-12-01 21:10:34', 0),
(35, 22, 8, 'Luchokun', 18, '2022-12-01 21:10:57', 0),
(36, 22, 9, 'Juli2002', 2, '2022-12-01 21:11:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `presets`
--

CREATE TABLE `presets` (
  `id` int(11) NOT NULL,
  `nomJuego` varchar(30) NOT NULL,
  `portada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `presets`
--

INSERT INTO `presets` (`id`, `nomJuego`, `portada`) VALUES
(1, 'Valorant', 'portadas/ValorantPortada1.png'),
(2, 'CoD: Mobile', 'portadas/ypC3Y1U.png'),
(3, 'Clash Royale', 'portadas\\RXwBOXf.png'),
(4, 'Free Fire', 'portadas\\3mAiEpV.png'),
(5, 'Fortnite', 'portadas/JXpzXpt.png'),
(44, 'FIFA 22', 'portadas/6389d5fd89e83@63890c531ec1b@0k5s2Iw[1].png'),
(46, 'Pac-Man', 'portadas/638915a71d7c6@20f6647164d366ad1e05ea76997e393a[1].jpg'),
(47, 'CS:GO', 'portadas/6389169778b7b@587593[1].png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `isAdmin`) VALUES
(1, 'user1@mail.com', 'Pass1234', 0),
(2, 'user2@mail.com', 'Pass1234', 0),
(5, 'admin@admin.com', 'AdminPass22', 1),
(8, 'user3@mail.com', 'Pass1234', 0),
(9, 'user4@mail.com', 'Pass1234', 0),
(10, 'user5@mail.com', 'Pass1234', 0),
(11, 'user6@mail.com', 'Pass1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conectarPresets` (`preset`);

--
-- Indexes for table `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conectarUsuarios` (`usuario`),
  ADD KEY `conectarEventos` (`evento`);

--
-- Indexes for table `presets`
--
ALTER TABLE `presets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomJuego` (`nomJuego`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `presets`
--
ALTER TABLE `presets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `conectarPresets` FOREIGN KEY (`preset`) REFERENCES `presets` (`id`);

--
-- Constraints for table `participaciones`
--
ALTER TABLE `participaciones`
  ADD CONSTRAINT `conectarEventos` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conectarUsuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
