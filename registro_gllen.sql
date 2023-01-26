-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 17:59:16
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
-- Base de datos: `registro_gllen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `codigo_postal`) VALUES
(1, 'Belgrano', '5533'),
(2, 'Buena Nueva', '5523'),
(3, 'Capilla del Rosario', '5523'),
(4, 'Colonia Molina', '5646'),
(5, 'Colonia Segovia', '5646'),
(6, 'Dorrego', '5626'),
(7, 'El Bermejo', '5533'),
(8, 'El Sauce', '5533'),
(9, 'Jesús Nazareno', '5638'),
(10, 'Kilómetro 8', '5525'),
(11, 'Kilómetro 11', '5525'),
(12, 'Las Cañas', '5519'),
(13, 'Los Corralitos', '5527'),
(14, 'La Primavera', '5641'),
(15, 'Nueva Ciudad', '5519'),
(16, 'Pedro Molina', '5519'),
(17, 'Puente de Hierro', '5527'),
(18, 'Rodeo de la Cruz', '5525'),
(19, 'San Francisco del Monte', '5503'),
(20, 'San José', '5519'),
(21, 'Villa Nueva', '5521');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'No binario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `dni` bigint(20) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `nombre_calle` int(11) DEFAULT NULL,
  `altura calle` int(11) DEFAULT NULL,
  `id_distritos2` int(11) DEFAULT NULL,
  `id_genero2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombre`, `apellido`, `email`, `nacimiento`, `celular`, `nombre_calle`, `altura calle`, `id_distritos2`, `id_genero2`) VALUES
(789, 'Luca', 'Tejada', 'lucaatejada@icloud.com', '2002-11-16', 2617475404, 0, 0, 0, 1),
(44000000, 'sujeto', 'prueba', 'sujetopruebas@gmail.com', '2023-01-01', 11, NULL, NULL, NULL, 2),
(44000001, 'sujeto', 'prueba1', 'sujetoprueba1@gmail.com', '2002-11-16', 12, NULL, NULL, 1, 1),
(44000002, 'sujeto', 'prueba2', 'sujetoprueba2@gmail.com', '2023-01-03', 13, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo_usuario`) VALUES
(1, 'Agente'),
(2, 'Supervisor'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `apellido` varchar(65) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `username` varchar(65) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `usuario_creado` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `usuario_modificado` varchar(100) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `motivo_baja` varchar(300) DEFAULT NULL,
  `usuario_baja` varchar(65) DEFAULT NULL,
  `rol_anterior` varchar(65) DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `id_rol2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `correo`, `username`, `pass`, `fecha_creado`, `usuario_creado`, `fecha_modificado`, `usuario_modificado`, `fecha_baja`, `motivo_baja`, `usuario_baja`, `rol_anterior`, `ultimo_acceso`, `id_rol2`) VALUES
(20444696, 'Fernando', 'Airoldi', 'alguien@gmail.com', 'fernando.airoldi', '1234', '2022-12-06 13:16:12', 'Agustin Videla', NULL, NULL, '2022-12-07 10:52:48', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis, inventore quo fugit fugiat impedit obcaecati quas optio voluptates dolorem eum pariatur facilis id exercitationem ratione iusto sit iste ducimus.', 'Agustin Videla', 'Supervisor', NULL, NULL),
(42000000, 'Agente', 'Ejemplo', NULL, 'agente', '1234', '2022-11-16 12:39:05', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(42000001, 'Supervisor', 'Ejemplo', NULL, 'supervisor', '1234', '2022-11-18 11:08:45', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(42913695, 'Agustin', 'Videla', 'agustinvidela835@gmail.com', 'agustinvidela', '4321', '2022-11-11 08:56:31', 'agustinvidela', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-07 09:31:54', 3),
(44662123, 'Luca', 'Tejada', 'lucaatejada@icloud.com', 'luca', '789', '2023-01-05 13:30:26', 'Luca Tejada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `fk_id_genero2` (`id_genero2`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `UNIQUE_EMAIL` (`correo`),
  ADD UNIQUE KEY `UNIQUE_USER` (`username`),
  ADD KEY `fk_id_rol2` (`id_rol2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_id_genero2` FOREIGN KEY (`id_genero2`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_rol2` FOREIGN KEY (`id_rol2`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
