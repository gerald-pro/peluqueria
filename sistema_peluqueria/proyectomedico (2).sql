-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 02:59:01
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectomedico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `diagnostico` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `presionArterial` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `frecuencia` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `oxigeno` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `temperatura` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `glicemia` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `peso` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaConsulta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `idpaciente`, `idmedico`, `diagnostico`, `presionArterial`, `frecuencia`, `oxigeno`, `temperatura`, `glicemia`, `peso`, `fechaConsulta`) VALUES
(34, 3, 70, 'Se registro de que el paciente ingreso con dolores muy fuertes y poco delicado.', '130/80', '100', '99%', '37.2', '', '24.9', '2022-10-23 04:43:36'),
(35, 9, 68, 'El paciente ingreso con el yeso de brazo sucio, se le hizo el servicio de retiro de yeso.', '120/65', '165', '90', '185', '145', '74,50', '2022-10-24 00:25:00'),
(36, 7, 68, 'El paciente ingreso con síntomas de doler en la espalda, se le tuvo que poner una inyección. ', '110/65', '142', '182', '165', '154', '54.5', '2022-10-24 00:49:48'),
(37, 5, 68, 'ingreso con dolores estomacal, luego se le realizo una radiografía para poder hacer seguimiento .', '121/65', '174%', '87', '168', '158/5', '56.50', '2022-10-24 05:05:44'),
(38, 10, 68, 'El paciente presento síntomas de resfrió, se le realizo una receta para su tratamiento', '110/65', '185%', '85.5', '168', '', '69.52', '2022-10-24 05:21:48'),
(39, 7, 68, 'Se presentó con dolores de cabeza', '130/80', '185', '', '168', '', '87,50', '2022-10-24 12:35:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepagoservicio`
--

CREATE TABLE `detallepagoservicio` (
  `id_pagoservicio` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallepagoservicio`
--

INSERT INTO `detallepagoservicio` (`id_pagoservicio`, `idservicio`, `cantidad`, `precio`) VALUES
(4, 1, 1, '35.00'),
(4, 2, 1, '100.00'),
(11, 2, 1, '100.00'),
(11, 3, 1, '200.00'),
(11, 4, 1, '200.00'),
(11, 5, 1, '100.00'),
(12, 1, 1, '35.00'),
(18, 1, 1, '35.00'),
(19, 3, 1, '200.00'),
(19, 4, 1, '200.00'),
(21, 2, 1, '100.00'),
(21, 3, 1, '200.00'),
(22, 9, 1, '40.00'),
(23, 3, 1, '200.00'),
(24, 3, 1, '200.00'),
(25, 5, 1, '100.00'),
(25, 6, 1, '45.00'),
(26, 3, 1, '200.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `idficha` int(11) NOT NULL,
  `idcajera` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `turno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`idficha`, `idcajera`, `idmedico`, `idpaciente`, `numero`, `turno`, `fecha`, `estado`) VALUES
(36, 66, 70, 3, 101, 'mañana', '2022-10-20 13:35:40', 2),
(37, 66, 70, 8, 102, 'mañana', '2022-10-20 13:37:45', 2),
(38, 66, 70, 5, 103, 'mañana', '2022-10-20 13:45:13', 2),
(39, 66, 70, 6, 104, 'mañana', '2022-10-20 13:45:20', 2),
(40, 66, 70, 4, 105, 'mañana', '2022-10-20 14:19:40', 2),
(41, 66, 70, 5, 106, 'mañana', '2022-10-20 14:29:23', 2),
(42, 66, 70, 9, 107, 'mañana', '2022-10-20 16:09:12', 2),
(43, 66, 70, 4, 108, 'mañana', '2022-10-20 16:09:54', 1),
(44, 66, 70, 9, 109, 'mañana', '2022-10-21 12:43:55', 2),
(45, 66, 68, 3, 110, 'mañana', '2022-10-21 12:55:09', 2),
(46, 66, 68, 8, 111, 'mañana', '2022-10-21 13:09:09', 2),
(47, 66, 68, 2, 112, 'mañana', '2022-10-21 20:03:12', 2),
(51, 66, 68, 9, 113, 'mañana', '2022-10-24 00:27:55', 2),
(52, 66, 68, 7, 114, 'mañana', '2022-10-24 00:51:10', 2),
(53, 66, 68, 5, 115, 'mañana', '2022-10-24 05:07:05', 2),
(54, 66, 68, 10, 116, 'mañana', '2022-10-24 05:22:46', 2),
(55, 66, 68, 7, 117, 'mañana', '2022-10-24 12:36:46', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `documento`, `nombres`, `apellidos`, `telefono`, `direccion`, `sexo`, `fechaNacimiento`) VALUES
(1, '49384732', 'Catalina', ' Orteaga Peña', 75489521, 'Los Lotes', 'femenino', '1987-02-12'),
(2, '58458554', 'Alejandro', 'Méndez García', 78562354, 'B/ El Triunfo', 'masculino', '1989-01-25'),
(3, '6528755', 'Carlos', 'Cetino Cruz', 65235874, 'Los Lotes', 'masculino', '1968-05-23'),
(4, '65824875', 'Adela', 'Beatriz Pereira', 33254685, 'B/El Palmar N°346', 'femenino', '1986-09-23'),
(5, '6532875', 'Amalia', 'Álvarez Rosales', 78569524, 'B/El Palmar N°346', 'femenino', '1986-12-25'),
(6, '12587545', 'Carlos', 'Acosta Ruiz', 7523156, 'B/El Palmar N°346', 'masculino', '1893-01-01'),
(7, '13258857', 'Carmen', 'Arias Gómez', 7854216, 'Calle / El Palmar', 'femenino', '1965-11-26'),
(8, '45872154', 'Francisco', 'Orellana Ortiz', 65983254, 'B/El Palmar N°45', 'masculino', '1845-05-15'),
(9, '6352487', 'Manuel ', 'Bolaños Gómez', 74968533, 'B/El Palmar', 'masculino', '1965-10-27'),
(10, '9856452', 'Raquel', 'Diaz Mejia', 69857458, 'Los Lotes', 'femenino', '1986-01-25'),
(11, '5652355', 'Maria ', 'de los Angeles', 65824582, 'Zona- Los Lotes/ Av.Bolivia', 'femenino', '1998-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoservicio`
--

CREATE TABLE `pagoservicio` (
  `idpagoservicio` int(11) NOT NULL,
  `idcajera` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `numeroPago` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagoservicio`
--

INSERT INTO `pagoservicio` (`idpagoservicio`, `idcajera`, `idmedico`, `idpaciente`, `numeroPago`, `total`, `metodo_pago`, `fecha`) VALUES
(4, 69, 70, 2, 1002, '135.00', 'TC-5685520', '2022-10-19 15:37:05'),
(11, 67, 68, 1, 1009, '600.00', 'TD-46315641', '2022-10-22 22:41:49'),
(12, 67, 69, 2, 1010, '35.00', 'TC-52962333', '2022-10-22 22:54:04'),
(18, 67, 68, 2, 1014, '35.00', 'Efectivo', '2022-10-22 23:01:24'),
(19, 70, 68, 2, 1015, '400.00', 'Efectivo', '2022-10-23 03:47:49'),
(21, 68, 68, 2, 1016, '300.00', 'Efectivo', '2022-10-24 03:53:10'),
(22, 68, 70, 4, 1017, '40.00', 'Efectivo', '2022-10-24 03:53:43'),
(23, 68, 69, 10, 1018, '200.00', 'Efectivo', '2022-10-24 03:55:27'),
(24, 68, 70, 9, 1019, '200.00', 'Efectivo', '2022-10-24 04:58:56'),
(25, 68, 69, 3, 1020, '145.00', 'TC-56985742', '2022-10-24 05:25:47'),
(26, 66, 68, 7, 1021, '200.00', 'Efectivo', '2022-10-24 12:34:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombre`, `precio`, `estado`) VALUES
(1, 'Curación menor', '35.00', 1),
(2, 'Ecografía Electrocardiograma', '100.00', 1),
(3, 'Yeso piernas y muslos', '200.00', 1),
(4, 'Yeso brazo antebrazo', '200.00', 1),
(5, 'Retiro de yeso', '100.00', 1),
(6, 'Curación mediana', '45.00', 1),
(7, 'Glicemias', '10.00', 1),
(8, 'Lavado de oído', '90.00', 1),
(9, 'Colocado de suero', '40.00', 1),
(10, 'Colocado de Inyectable', '15.00', 1),
(11, 'Curación mayor', '70.00', 1),
(12, 'Consulta general', '90.00', 1),
(13, 'Reconsulta', '45.00', 1),
(14, 'Colocado de diu(especulo + gasa)', '200.00', 1),
(15, 'Retiro de diu', '150.00', 1),
(16, 'AMEU', '1500.00', 1),
(17, 'Abdominal', '70.00', 1),
(18, 'Ginecología', '70.00', 1),
(19, 'Obstétrica', '80.00', 1),
(20, 'Papanicolau', '80.00', 1),
(21, 'Renal', '80.00', 1),
(22, 'Transvaginal', '100.00', 1),
(23, 'Vesico Prostático', '100.00', 1),
(24, 'Electrocardiograma', '100.00', 1),
(25, 'Monitoreo fetal', '100.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(66, 'Angi Fernandez Martinez', 'angi', '$2a$07$asxx54ahjppf45sd87a5auxVxOD67HGmSKEgoq12YAGONa0eqF45u', 'Cajera', 'vistas/img/usuarios/angi/339.jpg', 1, '2022-10-26 18:33:18', '2022-10-26 23:33:18'),
(67, 'Diego Leaños Medina', 'medina', '$2a$07$asxx54ahjppf45sd87a5auEuDPXPZqa6tTcbdCR1Xj.JMKKvoAz8S', 'Administrador', 'vistas/img/usuarios/medina/188.jpg', 1, '2022-10-26 18:26:30', '2022-10-26 23:26:30'),
(68, 'Juan Perez Flores', 'juan', '$2a$07$asxx54ahjppf45sd87a5auxVxOD67HGmSKEgoq12YAGONa0eqF45u', 'Medico', 'vistas/img/usuarios/juan/302.jpg', 1, '2022-10-24 07:35:48', '2022-10-24 12:35:48'),
(69, 'Gerardo Hildago Vasquez', 'gerardo', '$2a$07$asxx54ahjppf45sd87a5auMEo6F5gKzpwJtfl90a2/ie98ptT/GCq', 'Medico', 'vistas/img/usuarios/gerardo/630.png', 1, '2022-10-19 16:32:17', '2022-10-19 21:32:17'),
(70, 'Camilo Rocha Garcia', 'camilo', '$2a$07$asxx54ahjppf45sd87a5auxVxOD67HGmSKEgoq12YAGONa0eqF45u', 'Medico', 'vistas/img/usuarios/camilo/805.png', 1, '2022-10-24 02:02:34', '2022-10-24 07:02:34'),
(71, 'Adriana Hernandez Sanchez', 'adriana', '$2a$07$asxx54ahjppf45sd87a5auP9hzE7KuZgSy4xoSyw61iUrNBsclpKO', 'Cajera', 'vistas/img/usuarios/adriana/798.jpg', 1, '0000-00-00 00:00:00', '2022-10-20 02:02:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `idpaciente` (`idpaciente`),
  ADD KEY `idmedico` (`idmedico`);

--
-- Indices de la tabla `detallepagoservicio`
--
ALTER TABLE `detallepagoservicio`
  ADD PRIMARY KEY (`id_pagoservicio`,`idservicio`),
  ADD KEY `idservicio` (`idservicio`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`idficha`),
  ADD KEY `idcajera` (`idcajera`),
  ADD KEY `idmedico` (`idmedico`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `pagoservicio`
--
ALTER TABLE `pagoservicio`
  ADD PRIMARY KEY (`idpagoservicio`),
  ADD KEY `idcajera` (`idcajera`),
  ADD KEY `idmedico` (`idmedico`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detallepagoservicio`
--
ALTER TABLE `detallepagoservicio`
  MODIFY `id_pagoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pagoservicio`
--
ALTER TABLE `pagoservicio`
  MODIFY `idpagoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`idmedico`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detallepagoservicio`
--
ALTER TABLE `detallepagoservicio`
  ADD CONSTRAINT `detallepagoservicio_ibfk_1` FOREIGN KEY (`id_pagoservicio`) REFERENCES `pagoservicio` (`idpagoservicio`),
  ADD CONSTRAINT `detallepagoservicio_ibfk_2` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`idcajera`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`idmedico`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ficha_ibfk_3` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`);

--
-- Filtros para la tabla `pagoservicio`
--
ALTER TABLE `pagoservicio`
  ADD CONSTRAINT `pagoservicio_ibfk_1` FOREIGN KEY (`idcajera`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pagoservicio_ibfk_2` FOREIGN KEY (`idmedico`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pagoservicio_ibfk_3` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
