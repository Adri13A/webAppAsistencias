-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2024 a las 09:54:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `statusAsistencia` varchar(3) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `nombre_usuario`, `statusAsistencia`, `fecha`) VALUES
(1, 'Díaz Fernández Sofía', '2', '2024-02-08T14:48'),
(2, 'López Hernández Laura', '1', '2024-02-08T14:48'),
(3, 'Martínez López Eduardo', '0', '2024-02-08T14:48'),
(4, 'Rodríguez González Ana', '1', '2024-02-08T14:48'),
(5, 'Soto García Fernanda', '2', '2024-02-08T14:48'),
(6, 'Torres García Miguel', '0', '2024-02-08T14:48'),
(7, 'Díaz Fernández Sofía', '2', '2024-02-09T14:36'),
(8, 'López Hernández Laura', '2', '2024-02-09T14:36'),
(9, 'Martínez López Eduardo', '2', '2024-02-09T14:36'),
(10, 'Rodríguez González Ana', '2', '2024-02-09T14:36'),
(11, 'Soto García Fernanda', '2', '2024-02-09T14:36'),
(12, 'Torres García Miguel', '1', '2024-02-09T14:36'),
(13, 'Díaz Fernández Sofía', '1', '2024-02-09T17:15'),
(14, 'López Hernández Laura', '0', '2024-02-09T17:15'),
(15, 'Martínez López Eduardo', '1', '2024-02-09T17:15'),
(16, 'Rodríguez González Ana', '1', '2024-02-09T17:15'),
(17, 'Soto García Fernanda', '1', '2024-02-09T17:15'),
(18, 'Torres García Miguel', '1', '2024-02-09T17:15'),
(19, 'Díaz Fernández Sofía', '1', '2024-02-10T12:59'),
(20, 'López Hernández Laura', '1', '2024-02-10T12:59'),
(21, 'Martínez López Eduardo', '2', '2024-02-10T12:59'),
(22, 'Rodríguez González Ana', '2', '2024-02-10T12:59'),
(23, 'Soto García Fernanda', '2', '2024-02-10T12:59'),
(24, 'Torres García Miguel', '1', '2024-02-10T12:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
