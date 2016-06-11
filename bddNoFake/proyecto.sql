-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2016 a las 05:44:27
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `Fecha_inicio` datetime NOT NULL,
  `id_Registro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Fecha_fin` datetime NOT NULL,
  PRIMARY KEY (`id_Registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE IF NOT EXISTS `asiento` (
  `id_Zona` int(10) unsigned NOT NULL,
  `Fila` char(1) NOT NULL,
  `Numero` int(10) unsigned NOT NULL,
  `id_Asiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Asiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE IF NOT EXISTS `boleto` (
  `id_Boleto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Folio_Compra` int(10) unsigned NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `id_Asiento` int(10) unsigned NOT NULL,
  `id_Persona` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Boleto`),
  UNIQUE KEY `Folio_Compra` (`Folio_Compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concierto`
--

CREATE TABLE IF NOT EXISTS `concierto` (
  `Nombre` varchar(20) NOT NULL,
  `Descripcion` varchar(20) NOT NULL,
  `id_Concierto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Artista` varchar(20) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Concierto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `de`
--

CREATE TABLE IF NOT EXISTS `de` (
  `id_Zona` int(10) unsigned NOT NULL,
  `id_Concierto` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardado_en`
--

CREATE TABLE IF NOT EXISTS `guardado_en` (
  `id_Concierto` int(10) unsigned NOT NULL,
  `id_Registro` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `Edad` date NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Usuario` varchar(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Id_Persona` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Persona`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Edad`, `Pass`, `Usuario`, `Nombre`, `Apellido`, `Id_Persona`, `email`, `admin`) VALUES
('1998-05-13', '36606460', 'sam1', 'brenda', 'Avila', 1, 'brendasamat@hotmail.com', 0),
('2016-06-08', '213213', '21321', '132132', '13213231', 2, '213213', 0),
('2016-06-10', '$email', 'SAD', 'SADAAS', 'SADASD', 5, 'brendasamant@hotmail.com', 0),
('2016-06-11', '36606460', 'clau', 'claudia', 'de la torre', 6, 'cyberclaudia_3@hotmail.com', 0),
('2016-06-13', '123456789', 'greenD', 'billie', 'armstrong', 7, 'billiejoe_armstrong@live.com.m', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE IF NOT EXISTS `recibo` (
  `Forma_Pago` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Banco` varchar(20) NOT NULL,
  `Folio_Compra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Folio_Compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `Precio` int(10) unsigned NOT NULL,
  `id_Zona` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ubicacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
