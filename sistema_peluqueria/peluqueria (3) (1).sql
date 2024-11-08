-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2024 a las 17:35:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluqueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `sexo` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `documento`, `nombres`, `apellidos`, `telefono`, `direccion`, `sexo`, `fechaNacimiento`) VALUES
(5, '8566221', 'CARLA', 'BORDA LEAÑO ', 78451261, 'LOS CHACOS', 'femenino', '2023-07-25'),
(6, '8466295', 'CAMILA', 'ROMERO', 78469466, 'CASCO VIEJO', 'femenino', '2003-12-27'),
(7, '81541545', 'ARACELY', 'VILLARROEL', 6203063, 'LUJAN ', 'femenino', '2024-04-25'),
(8, '815415445', 'KEVIN', 'SUAREZ', 6203063, 'COTOCA', 'masculino', '2024-04-23'),
(9, '11556365', 'RUTH ', 'CUBA ', 76629070, 'VILLA 1RO DE MAYO', 'femenino', '1997-07-22'),
(10, '212464652', 'FERNANDA ', 'ORTIZ SALVATIERRA', 2147483647, 'LOS POZOS ', 'femenino', '2024-06-20'),
(11, '12245626', 'KATIA', 'BURGOS', 7894561, '3ER ANILLO', 'femenino', '2024-06-13'),
(12, '12326498', 'JOSE LUIS', 'FLORES ', 6200479, 'ADUANA', 'masculino', '2024-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `diagnostico` varchar(250) NOT NULL,
  `presionArterial` varchar(30) DEFAULT NULL,
  `frecuencia` varchar(30) DEFAULT NULL,
  `oxigeno` varchar(30) DEFAULT NULL,
  `temperatura` varchar(30) DEFAULT NULL,
  `glicemia` varchar(30) DEFAULT NULL,
  `peso` varchar(30) DEFAULT NULL,
  `fechaConsulta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(41, 28, 1, 20.00),
(42, 29, 1, 25.00),
(43, 28, 2, 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `idficha` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`idficha`, `idservicio`, `idtrabajador`, `idcliente`, `inicio`, `fin`, `estado`) VALUES
(56, 28, 70, 3, '2023-07-28 10:00:00', '2023-07-28 10:30:00', 1),
(58, 28, 73, 4, '2023-07-28 00:09:40', '2023-07-28 00:09:40', 1),
(59, 28, 67, 4, '2023-07-28 00:05:27', '2023-07-28 00:05:27', 1),
(60, 29, 67, 3, '2023-07-28 00:07:25', '2023-07-28 00:07:25', 1),
(61, 30, 67, 6, '2023-07-28 00:07:58', '2023-07-28 00:07:58', 1),
(62, 29, 67, 3, '2023-07-28 08:00:00', '2023-07-28 08:30:00', 1),
(64, 30, 67, 5, '2023-07-28 11:00:00', '2023-07-28 11:30:00', 1),
(65, 28, 70, 3, '2023-07-28 07:30:00', '2023-07-28 08:00:00', 1),
(66, 36, 73, 3, '2023-07-28 08:30:00', '2023-07-28 09:00:00', 1),
(67, 31, 73, 3, '2023-07-28 11:00:00', '2023-07-28 11:30:00', 1),
(68, 35, 67, 3, '2023-10-24 08:00:00', '2023-10-24 08:30:00', 1),
(69, 29, 67, 3, '2024-03-25 06:00:00', '2024-03-25 06:30:00', 1),
(70, 40, 74, 7, '2024-04-03 00:00:00', '2024-04-04 00:00:00', 1),
(71, 41, 74, 5, '2024-04-10 00:00:00', '2024-04-11 00:00:00', 1),
(72, 35, 74, 8, '2024-04-11 00:00:00', '2024-04-12 00:00:00', 1),
(73, 28, 74, 5, '2024-05-01 00:00:00', '2024-05-02 00:00:00', 1),
(74, 30, 74, 6, '2024-05-02 00:00:00', '2024-05-03 00:00:00', 1),
(76, 29, 74, 6, '2024-05-27 00:00:00', '2024-05-28 00:00:00', 1),
(77, 43, 74, 5, '2024-06-11 07:00:00', '2024-06-11 07:30:00', 1),
(78, 41, 74, 7, '2024-05-30 00:00:00', '2024-05-31 00:00:00', 1),
(80, 40, 74, 6, '2024-06-11 09:00:00', '2024-06-11 09:30:00', 1),
(81, 32, 74, 6, '2024-06-12 06:00:00', '2024-06-12 06:30:00', 1),
(82, 43, 74, 6, '2024-06-12 06:30:00', '2024-06-12 07:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoservicio`
--

CREATE TABLE `pagoservicio` (
  `idpagoservicio` int(11) NOT NULL,
  `idcajera` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `numeroPago` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo_pago` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagoservicio`
--

INSERT INTO `pagoservicio` (`idpagoservicio`, `idcajera`, `idtrabajador`, `idcliente`, `numeroPago`, `total`, `metodo_pago`, `fecha`) VALUES
(40, 74, 2, 5, 1012, 0.00, 'Efectivo', '2024-04-24 14:36:50'),
(41, 74, 2, 5, 1013, 20.00, 'Efectivo', '2024-04-24 14:37:34'),
(42, 74, 2, 8, 1014, 25.00, 'Efectivo', '2024-06-11 15:05:52'),
(43, 74, 2, 7, 1015, 40.00, 'TC-50', '2024-06-11 15:07:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombre`, `precio`, `estado`) VALUES
(28, 'CORTE DE PELO ', 20.00, 1),
(29, 'CORTE DE PELO EN V', 25.00, 1),
(30, 'CORTE SALVAJE ', 20.00, 1),
(32, 'PINTADO DE CEJAS ', 30.00, 1),
(33, 'PESTAÑAS UNA POR UNA', 80.00, 1),
(35, 'PLANCHADO ', 50.00, 1),
(40, 'PINTADO EN GEL', 60.00, 1),
(41, 'LIMPIEZA FACIAL ', 80.00, 1),
(42, 'PINTADO DE UÑAS ACRILICAS ', 150.00, 1),
(43, 'PEINADO DE MATRIMONIO', 80.00, 1),
(44, 'UÑAS POSTISAS', 100.00, 1),
(45, 'UÑAS POSTISAS', 70.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(2, 'RUTH', 'Ruth', '$2a$07$asxx54ahjppf45sd87a5au7D.ijOCuwE3Ry9JEYCjwj8Wgivd06ji', 'trabajador', '', 1, '2024-04-10 16:26:02', '2024-05-22 15:36:08'),
(3, 'FABIOLA', 'FABIOLA', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Administrador', '', 1, '2024-04-11 18:02:54', '2024-05-22 15:36:15'),
(74, 'ARACELY', 'ARACELY', 'CHELY2003', 'Administrador', '', 1, '2024-06-14 07:38:07', '2024-06-14 12:38:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `idtrabajador` (`idtrabajador`) USING BTREE,
  ADD KEY `idcliente` (`idcliente`) USING BTREE;

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
  ADD KEY `idcajera` (`idservicio`),
  ADD KEY `idtrabajador` (`idtrabajador`) USING BTREE,
  ADD KEY `idcliente` (`idcliente`) USING BTREE;

--
-- Indices de la tabla `pagoservicio`
--
ALTER TABLE `pagoservicio`
  ADD PRIMARY KEY (`idpagoservicio`),
  ADD KEY `idcajera` (`idcajera`),
  ADD KEY `idtrabajador` (`idtrabajador`) USING BTREE,
  ADD KEY `idcliente` (`idcliente`) USING BTREE;

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
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detallepagoservicio`
--
ALTER TABLE `detallepagoservicio`
  MODIFY `id_pagoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `pagoservicio`
--
ALTER TABLE `pagoservicio`
  MODIFY `idpagoservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
