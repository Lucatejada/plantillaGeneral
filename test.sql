-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2023 a las 17:59:40
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
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `actividad_id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`actividad_id`, `nombre`) VALUES
(1, 'Basquet\r\n'),
(2, 'Futbol'),
(3, 'Voley'),
(4, 'Handball'),
(5, 'Natacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `dia` date DEFAULT NULL,
  `entrada` datetime DEFAULT NULL,
  `salida` datetime DEFAULT NULL,
  `usuario-cuil` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(195) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(135) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuil` bigint(20) NOT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `sangre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `talle` int(11) DEFAULT NULL,
  `uno` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tres` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuatro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cinco` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ocho` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nueve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diez` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `once` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trece` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catorce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quince` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_tutor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni_tutor` int(11) DEFAULT NULL,
  `telEmergencia` bigint(11) DEFAULT NULL,
  `centro_asistencial` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`nombre`, `apellido`, `cuil`, `telefono`, `sangre`, `peso`, `talle`, `uno`, `dos`, `tres`, `cuatro`, `cinco`, `seis`, `siete`, `ocho`, `nueve`, `diez`, `once`, `doce`, `trece`, `catorce`, `quince`, `nombre_tutor`, `dni_tutor`, `telEmergencia`, `centro_asistencial`, `archivo`) VALUES
('Luca', 'Tejada', 123, 2617475404, 'ORH-', 100, 173, 'si ', 'si ', 'si ', 'si ', 'sarampion - varicela - rubeola - ', 'si - ', 'si - ', 'si - escoliosis - cifosis - lordosis -  -  - ', 'si - ', 'si - ', 'si -  convulsiones -  epilepsia -  ', '', 'si -  - ', 'padre  - madre  - hermanos  -   - ', 'Nada por ahora, gracias!', 'Tutor', 44662123, 12222, 'Hospital', NULL),
('Luca', 'Tejada', 789, 11, 'ORH+', 90, 90, 'no ', 'no ', 'no ', 'no ', 'sarampion - ', 'no - ', 'no - ', 'no -  -  - ', 'no - ', 'no - ', 'no -  ', '', 'no -  - ', 'padre  -   - ', 'Ponele color a la pagina', 'Tutor2', 44556789, 7894561230, 'Hospital', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cuil` int(12) NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `id_actividad2` int(11) DEFAULT NULL,
  `id_distrito2` int(11) DEFAULT NULL,
  `id_roles2` int(11) DEFAULT NULL,
  `id_respuestas2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cuil`, `nombre`, `apellido`, `telefono`, `id_actividad2`, `id_distrito2`, `id_roles2`, `id_respuestas2`) VALUES
(123, 'Agustin', 'Videla', 2616556699, 2, 12, 2, NULL),
(456, 'Javier', 'Garcia', 456, 1, 18, 2, NULL),
(789, 'Luca', 'Tejada', 789, 1, 19, 1, NULL),
(43638041, 'Diego', 'Aguilera', 2616501964, 5, 6, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`actividad_id`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario-dni` (`usuario-cuil`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`cuil`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cuil`),
  ADD KEY `fk_id_actividad2` (`id_actividad2`),
  ADD KEY `fk_id_distrito2` (`id_distrito2`),
  ADD KEY `fk_id_roles2` (`id_roles2`),
  ADD KEY `fk_id_respuestas2` (`id_respuestas2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `actividad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`usuario-cuil`) REFERENCES `usuarios` (`cuil`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_id_actividad2` FOREIGN KEY (`id_actividad2`) REFERENCES `actividades` (`actividad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_distrito2` FOREIGN KEY (`id_distrito2`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_roles2` FOREIGN KEY (`id_roles2`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
