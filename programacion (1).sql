-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2019 a las 06:39:14
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `codigo` int(11) NOT NULL,
  `nombres` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `ap_paterno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ap_materno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `vigencia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codigo`, `nombres`, `ap_paterno`, `ap_materno`, `dni`, `telefono`, `correo`, `vigencia`) VALUES
(23, 'juan antonio', 'soto', 'cabrera', '45127385', '925237637', 'nuantora@gmail.com', 1),
(25, 'kiara oyola', '', 'masd', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 1),
(26, 'malena chinchay', '', 'vasquez', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 1),
(27, 'kiara oyola', '', 'masd', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 1),
(28, 'kiara oyola', '', 'masd', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 1),
(29, 'kiara oyola', '', 'masd', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 0),
(30, 'kiara oyola', '', 'vasquez', 'aaaaa', 'aaaaaaa', 'nuantora@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `codigoPersonal` int(11) NOT NULL,
  `vigencia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `clave`, `codigoPersonal`, `vigencia`) VALUES
(6, 'antonio', '123', 23, 1),
(7, 'kiara fea', 'eeeeeeeeeeeeeeeeeeee', 30, 1),
(12, 'malena', 'aaaa', 26, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `KF_Personal_Usuario` (`codigoPersonal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `KF_Personal_Usuario` FOREIGN KEY (`codigoPersonal`) REFERENCES `personal` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
