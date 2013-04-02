-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-03-2013 a las 19:37:15
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ADSI`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(12) NOT NULL,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `descripcion`) VALUES
(1, 'Admin', 'acceso y control total de todas la cuentas e informacion'),
(2, 'usuario', 'asd'),
(3, 'intruso', 'solo podrÃ¡ ver los registros'),
(5, 'invitado', 'sal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` longtext NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `user`, `pass`, `email`, `role`) VALUES
(1, 'danny', 'admin', 'edf360b3f9f25e1b43f3777db55c002035dcfe5c', 'dannymona@cuatro', 1),
(2, 'miguel', 'mangel', 'edf360b3f9f25e1b43f3777db55c002035dcfe5c', 'angel@cuatro', 2),
(9, 'andres', 'chaparro', 'b70c3af3c8eca0bb7cc21a6167c20e38f4f4e1b6', 'andi@cuatro', 3),
(10, 'geraldine', 'gral', '769116aa0c4832d5edf5d1c9234d6c89dc67179f', 'geral@cuatro', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
