-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2014 a las 17:01:12
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--
CREATE DATABASE teatro;
use teatro;
CREATE TABLE IF NOT EXISTS `butaca` (
  `fila` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`fila`,`numero`,`seccion`),
  KEY `seccion` (`seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`fila`, `numero`, `seccion`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 5, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(3, 4, 1),
(3, 5, 1),
(3, 6, 1),
(3, 7, 1),
(3, 8, 1),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 1),
(4, 4, 1),
(4, 5, 1),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(4, 10, 1),
(4, 11, 1),
(4, 12, 1),
(5, 1, 1),
(5, 2, 1),
(5, 3, 1),
(5, 4, 1),
(5, 5, 1),
(5, 6, 1),
(5, 7, 1),
(5, 8, 1),
(5, 9, 1),
(5, 10, 1),
(5, 11, 1),
(5, 12, 1),
(1, 1, 2),
(1, 2, 2),
(1, 3, 2),
(1, 4, 2),
(1, 5, 2),
(1, 6, 2),
(1, 7, 2),
(1, 8, 2),
(1, 9, 2),
(1, 10, 2),
(1, 11, 2),
(1, 12, 2),
(1, 13, 2),
(1, 14, 2),
(1, 15, 2),
(1, 16, 2),
(1, 17, 2),
(1, 18, 2),
(2, 1, 2),
(2, 2, 2),
(2, 3, 2),
(2, 4, 2),
(2, 5, 2),
(2, 6, 2),
(2, 7, 2),
(2, 8, 2),
(2, 9, 2),
(2, 10, 2),
(2, 11, 2),
(2, 12, 2),
(2, 13, 2),
(2, 14, 2),
(2, 15, 2),
(2, 16, 2),
(2, 17, 2),
(2, 18, 2),
(3, 1, 2),
(3, 2, 2),
(3, 3, 2),
(3, 4, 2),
(3, 5, 2),
(3, 6, 2),
(3, 7, 2),
(3, 8, 2),
(3, 9, 2),
(3, 10, 2),
(3, 11, 2),
(3, 12, 2),
(3, 13, 2),
(3, 14, 2),
(3, 15, 2),
(3, 16, 2),
(3, 17, 2),
(3, 18, 2),
(1, 1, 3),
(1, 2, 3),
(1, 3, 3),
(1, 4, 3),
(1, 1, 4),
(1, 2, 4),
(1, 3, 4),
(1, 4, 4),
(1, 1, 5),
(1, 2, 5),
(1, 3, 5),
(1, 4, 5),
(1, 1, 6),
(1, 2, 6),
(1, 3, 6),
(1, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE IF NOT EXISTS `obra` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `grupo` text NOT NULL,
  `uri` text NOT NULL,
  `descripcion` text NOT NULL,
  `f_inicio` date NOT NULL,
  `f_final` date NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`ref`, `nombre`, `grupo`, `uri`, `descripcion`, `f_inicio`, `f_final`) VALUES
(1, 'el rey leon', 'producciones tetrales Disney', 'erl.jpg', 'musical', '2014-01-02', '2014-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pase`
--

CREATE TABLE IF NOT EXISTS `pase` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`fecha`,`hora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pase`
--

INSERT INTO `pase` (`fecha`, `hora`) VALUES
('2014-01-02', '20:00:00'),
('2014-01-03', '20:00:00'),
('2014-01-04', '20:00:00'),
('2014-01-05', '17:00:00'),
('2014-01-06', '20:00:00'),
('2014-01-07', '20:00:00'),
('2014-01-08', '20:00:00'),
('2014-01-09', '20:00:00'),
('2014-01-10', '20:00:00'),
('2014-01-11', '20:00:00'),
('2014-01-12', '17:00:00'),
('2014-01-13', '20:00:00'),
('2014-01-14', '20:00:00'),
('2014-01-15', '20:00:00'),
('2014-01-16', '20:00:00'),
('2014-01-17', '20:00:00'),
('2014-01-18', '20:00:00'),
('2014-01-19', '17:00:00'),
('2014-01-20', '20:00:00'),
('2014-01-21', '20:00:00'),
('2014-01-22', '20:00:00'),
('2014-01-23', '20:00:00'),
('2014-01-24', '20:00:00'),
('2014-01-25', '20:00:00'),
('2014-01-26', '17:00:00'),
('2014-01-27', '20:00:00'),
('2014-01-28', '20:00:00'),
('2014-01-29', '20:00:00'),
('2014-01-30', '20:00:00'),
('2014-01-31', '20:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `no_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `dni` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fila` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`no_entrada`),
  KEY `fecha` (`fecha`,`hora`),
  KEY `fila` (`fila`,`numero`,`seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `precio` float NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`codigo`, `precio`, `descripcion`) VALUES
(1, 50, 'Platea'),
(2, 40, 'Anfiteatro'),
(3, 30, 'Palco1'),
(4, 30, 'Palco2'),
(5, 30, 'Palco3'),
(6, 30, 'Palco4');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD CONSTRAINT `butaca_ibfk_1` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`fecha`, `hora`) REFERENCES `pase` (`fecha`, `hora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`fila`, `numero`, `seccion`) REFERENCES `butaca` (`fila`, `numero`, `seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
