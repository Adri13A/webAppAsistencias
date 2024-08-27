-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2024 a las 02:14:24
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_profesor` int(11) NOT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_profesor`, `profesor`, `usuario`, `password`) VALUES
(1, 'Alfredo Adame', 'admin', '$2y$10$hi0zQdikoeOc87d6mKUYJuSWl3oIRpS.OL2oTe7.GlUKIBTUaWYve');

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
(24, 'Torres García Miguel', '1', '2024-02-10T12:59'),
(43, 'Díaz Fernández Daniela', '1', '2024-02-05T16:52'),
(44, 'García Jiménez Ricardo', '1', '2024-02-05T16:52'),
(45, 'Gómez Díaz Isabel', '1', '2024-02-05T16:52'),
(46, 'López Hernández Laura', '0', '2024-02-05T16:52'),
(47, 'Martines Selva Cesar', '2', '2024-02-05T16:52'),
(48, 'Rodríguez González Ana', '0', '2024-02-05T16:52'),
(49, 'Soto García Fernanda', '1', '2024-02-05T16:52'),
(50, 'Torres García Miguel', '1', '2024-02-05T16:52'),
(51, 'Torres Martínez Javier', '2', '2024-02-05T16:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` int(11) NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `fecha`) VALUES
(7, '2024-02-05T16:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `fecha_ingreso_taller` varchar(80) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` varchar(80) DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `grado` varchar(15) DEFAULT NULL,
  `profesion` varchar(100) DEFAULT NULL,
  `domicilio_profesion` varchar(200) DEFAULT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefonoCasa` varchar(20) DEFAULT NULL,
  `telefonoTrabajo` varchar(20) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `tipoSangre` varchar(4) DEFAULT NULL,
  `padecimientos` varchar(200) DEFAULT NULL,
  `alergia` varchar(20) DEFAULT NULL,
  `seguro` varchar(50) DEFAULT NULL,
  `contacto_emergenciaNombre` varchar(100) DEFAULT NULL,
  `contacto_emergenciaTelefono` varchar(20) DEFAULT NULL,
  `conyugue` varchar(50) DEFAULT NULL,
  `conyugueCumpleaños` varchar(100) DEFAULT NULL,
  `fechagrado1` varchar(255) DEFAULT NULL,
  `fechagrado2` varchar(255) DEFAULT NULL,
  `fechagrado3` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `fecha_ingreso_taller`, `nombre`, `apellidoM`, `apellidoP`, `fecha_nacimiento`, `fotografia`, `grado`, `profesion`, `domicilio_profesion`, `rfc`, `celular`, `correo`, `telefonoCasa`, `telefonoTrabajo`, `domicilio`, `tipoSangre`, `padecimientos`, `alergia`, `seguro`, `contacto_emergenciaNombre`, `contacto_emergenciaTelefono`, `conyugue`, `conyugueCumpleaños`, `fechagrado1`, `fechagrado2`, `fechagrado3`, `estado`) VALUES
(1, '2024-02-07', 'Cesar', 'Flores', 'Mendez', '1999-07-15', 'Cesar_Mendez_Flores.jpg', 'Licenciatura', 'Ingeniería en Sistemas de Información', 'Calle Principal #123', 'ABCDE123456', '1234567890', 'juan@example.com', '555-123-4567', '555-987-6543', 'Calle Secundaria #456', 'O+', 'Ninguno', '', 'SeguroX', 'María Pérez', '555-111-2222', 'Ana', '1992-10-20', '2018-05-20', '2019-05-20', '2020-05-20', 3),
(11, '2024-02-12', 'Ana', 'González', 'Rodríguez', '1995-02-28', '23e2cfb53ad95e303daba8081bfd4daa.jpg', '4-1', 'Estudiante', 'UAS', 'GOMJ820101ABC', '669-941-4277', 'ana@gmail.com', '669-234-2343', '669-234-2343', 'Avenida 789', 'AB+', 'Colitis', 'Pescado', 'Seguro456', 'Adan', '669-234-2343', 'Maria', '1999-12-12', '2022-07-01', '2022-08-01', '2022-09-01', 1),
(12, '', 'Carlos', 'Martínez', 'Soto', '1988-09-12', '', '', '', '0', '', '222222222', 'carlos@gmail.com', '', '', 'Calle 456', 'B-', '', '', 'Seguro789', '', '', '', '', '2022-12-01', '2023-01-01', '2023-02-01', 0),
(13, '', 'Laura', 'Hernández', 'López', '1993-04-15', '', '', '', '0', '', '333333333', 'laura@gmail.com', '', '', 'Avenida 012', 'A-', '', '', 'SeguroABC', '', '', '', '', '2023-03-01', '2023-04-01', '2023-05-01', 1),
(14, '', 'Miguel', 'García', 'Torres', '1991-07-20', '', '', '', '0', '', '444444444', 'miguel@gmail.com', '', '', 'Calle 789', 'B-', '', '', 'SeguroXYZ', '', '', '', '', '2023-06-01', '2023-07-01', '2023-08-01', 1),
(15, '2024-02-12', 'Daniela', 'Fernández', 'Díaz', '1997-11-05', 'dd01a9f70957f1a07df15840d53e5dd3.jpg', '4-1', 'Estudiante', 'UAS', 'GOMJ820101ABC', '669-941-4277', 'DanielaDiaz@gmail.com', '669-234-2343', '669-234-2343', 'Zapata mangos 5317', 'O+', 'Ninguno', 'Paracetamol', 'IMSS', 'Adrian', '669-234-2343', 'Adrian', '2002-02-13', '2023-09-01', '2023-10-01', '2023-11-01', 1),
(17, '', 'Isabel', 'Díaz', 'Gómez', '1990-03-22', '', '', '', '0', '', '777777777', 'isabel@gmail.com', '', '', 'Avenida 890', 'AB+', '', '', 'Seguro789', '', '', '', '', '2024-03-01', '2024-04-01', '2024-05-01', 1),
(18, '2024-02-05', 'Eduardo', 'López', 'Martínez', '1986-06-25', ' 18.jpg', '4-1', 'Estudiante', 'Tellerias', 'GOMJ820101ABC', '669-941-4277', 'eduardo@gmail.com', '669-234-2343', '669-234-2343', 'Calle 123', 'AB-', 'Ninguno', 'Paracetamol', 'SeguroABC', 'Adan', '669-234-2343', 'Luis', '1999-12-12', 'fechagrado1', 'fechagrado2', 'fechagrado3', 2),
(19, '', 'Fernanda', 'García', 'Soto', '1993-01-18', '', '', '', '0', '', '999999999', 'fernanda@gmail.com', '', '', 'Avenida 345', 'B-', '', '', 'SeguroXYZ', '', '', '', '', '2024-09-01', '2024-10-01', '2024-11-01', 1),
(20, '', 'Javier', 'Martínez', 'Torres', '1989-12-05', '', '', '', '0', '', '1010101010', 'javier@gmail.com', '', '', 'Calle 678', 'AB-', '', '', 'Seguro123', '', '', '', '', '2024-12-01', '2025-01-01', '2025-02-01', 1),
(21, '2024-02-04', 'Pedro', 'Martínez', 'Gutiérrez', '1992-08-20', 'foto3.jpg', 'Doctorado', 'Medicina', 'Calle de los Doctores #789', 'KLMNO543210', '555-333-2222', 'pedro@example.com', '555-444-5555', '555-666-7777', 'Calle de los Pacientes #123', 'AB+', 'Asma', 'Penicilina', 'SeguroZ', 'Carlos Martínez', '555-666-7777', 'María', '1995-02-15', '2016-03-10', '2017-03-10', '2018-03-10', 2),
(22, '2024-02-04', 'Laura', 'López', 'Hernández', '1980-04-05', 'foto4.jpg', 'Licenciatura', 'Derecho', 'Avenida de los Abogados #456', 'WXYZ987654', '555-888-9999', 'laura@example.com', '555-777-8888', '555-999-0000', 'Calle del Juzgado #789', 'O-', 'Ninguno', '', 'SeguroW', 'Daniel López', '555-888-7777', 'David', '1978-12-30', '2000-05-15', '2001-05-15', '2002-05-15', 2),
(23, '2024-02-04', 'Ana', 'González', 'Rodríguez', '1998-11-25', 'foto5.jpg', 'Licenciatura', 'Psicología', 'Calle de los Psicólogos #789', 'ABCD123456', '555-111-2222', 'ana@example.com', '555-222-3333', '555-333-4444', 'Calle de las Terapias #123', 'A+', 'Depresión', 'Ninguna', 'SeguroV', 'María González', '555-555-5555', 'Pedro', '2000-01-10', '2019-12-20', '2020-12-20', '2021-12-20', 2),
(24, '2024-02-04', 'Roberto', 'Díaz', 'Pérez', '1995-06-15', 'foto6.jpg', 'Licenciatura', 'Contabilidad', 'Avenida de los Contadores #456', 'EFGH543210', '555-666-7777', 'roberto@example.com', '555-777-8888', '555-888-9999', 'Calle de los Impuestos #789', 'B-', 'Ninguno', '', 'SeguroU', 'Juan Díaz', '555-444-3333', 'Laura', '1997-03-20', '2016-08-10', '2017-08-10', '2018-08-10', 3),
(25, '2024-02-04', 'Fernando', 'Hernández', 'Ruiz', '1983-09-30', 'foto7.jpg', 'Maestría', 'Ingeniería Civil', 'Calle de los Ingenieros #789', 'IJKL987654', '555-999-0000', 'fernando@example.com', '555-000-1111', '555-111-2222', 'Calle de las Obras #123', 'AB-', 'Ninguno', 'Ninguna', 'SeguroT', 'Ana Hernández', '555-222-3333', 'Sara', '1985-05-12', '2010-07-25', '2011-07-25', '2012-07-25', 2),
(26, '2024-02-04', 'Isabel', 'Moreno', 'Sánchez', '1990-02-10', 'foto8.jpg', 'Licenciatura', 'Historia', 'Avenida de los Historiadores #456', 'LMNO432109', '555-222-3333', 'isabel@example.com', '555-333-4444', '555-444-5555', 'Calle de las Investigaciones #789', 'O-', 'Ninguno', 'Polen', 'SeguroS', 'Pedro Moreno', '555-888-9999', 'María', '1992-10-15', '2012-05-20', '2013-05-20', '2014-05-20', 3),
(27, '2024-02-04', 'Ricardo', 'Jiménez', 'García', '1988-07-20', '2ebab961cd54ed0e1dcb64b60dd40151.jpg', '4-1', 'Biología', 'Calle de los Biólogos #789', 'GOMJ820101ABC', '555-555-5555', 'ricardo@example.com', '555-666-6666', '555-777-7777', 'Calle de las Especies #123', 'B+', 'Ninguno', 'Ninguna', 'SeguroR', 'Luis Jiménez', '555-999-9999', 'Laura', '1990-12-12', 'fechagrado1', 'fechagrado2', 'fechagrado3', 1),
(30, '1999-12-12', 'Cesar', 'Selva', 'Martines', '1999-12-12', '610e8192c334251f4f635ed6c9abfa3d.jpg', '4-1', 'Estudiante', 'Tellerias', 'GOMJ820101ABC', '669-941-4277', 'Cesar@gmail.com', '669-234-2343', '669-234-2343', 'Igueras mangos 5317', 'O-', 'Colitis', 'Pescado', 'ISSSTE', 'Adan', '669-234-2343', 'Maria', '1999-02-21', 'fechagrado1', 'fechagrado2', 'fechagrado3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
