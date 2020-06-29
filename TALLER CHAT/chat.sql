-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-06-2020 a las 11:13:39
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGrupo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imgGrupo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `nomeGrupo`, `imgGrupo`) VALUES
(1, 'Informática', 'informatica.jpg'),
(2, 'Tecnología', 'tecnologia.jpg'),
(3, 'Ocio outdoor', 'ocio.jpg'),
(4, 'Juegos', 'juegos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaHora` timestamp NOT NULL,
  `grupo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `mensaje`, `fechaHora`, `grupo`, `usuario`) VALUES
(19, 'En clase de informática no entendemos nada', '2020-06-25 19:30:00', 1, 12),
(18, 'la clase de tecnología se cambia a las 11:00', '2020-06-25 19:29:38', 2, 13),
(17, 'Yo me apunto a esa fiesta', '2020-06-25 19:29:10', 0, 12),
(16, 'Mañana, fiesta de despedida', '2020-06-25 19:28:53', 0, 13);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mensajesala`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `mensajesala`;
CREATE TABLE IF NOT EXISTS `mensajesala` (
`usuario` varchar(10)
,`fechaHora` timestamp
,`mensaje` varchar(100)
,`grupo` int(11)
,`idUsuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pwd` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `foto` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `pwd`, `grupo`, `foto`) VALUES
(13, 'maria', '1234', NULL, 'contacto.PNG'),
(12, 'pepe', '1234', NULL, 'copiar.PNG');

-- --------------------------------------------------------

--
-- Estructura para la vista `mensajesala`
--
DROP TABLE IF EXISTS `mensajesala`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mensajesala`  AS  select `u`.`usuario` AS `usuario`,`m`.`fechaHora` AS `fechaHora`,`m`.`mensaje` AS `mensaje`,`m`.`grupo` AS `grupo`,`u`.`idUsuario` AS `idUsuario` from (`mensajes` `m` join `usuarios` `u`) where (`u`.`idUsuario` = `m`.`usuario`) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
