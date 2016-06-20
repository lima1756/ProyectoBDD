-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 05:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `agregarConcierto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarConcierto` (IN `name` VARCHAR(20), IN `descr` TEXT, IN `artista` VARCHAR(20), IN `genero` VARCHAR(20), IN `image` VARCHAR(20), IN `inicio` DATETIME, IN `fin` DATETIME)  SQL SECURITY INVOKER
BEGIN
INSERT INTO concierto(Nombre, Descripcion, Artista, Genero, img) values (name, descr, artista, genero, image); 
INSERT INTO agenda(Fecha_inicio, Fecha_fin, id_Concierto) VALUES (inicio, fin, last_insert_id());
END$$

DROP PROCEDURE IF EXISTS `asientosDisponibles`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `asientosDisponibles` (IN `con` INT, IN `zone` INT)  NO SQL
SELECT asiento.Fila, asiento.Numero, asiento.id_Asiento FROM asiento WHERE asiento.id_Asiento NOT IN (
SELECT asiento.id_Asiento FROM asiento, boleto 
WHERE boleto.id_Asiento = asiento.id_Asiento
AND boleto.id_Concierto=con)
AND id_Zona=zone$$

DROP PROCEDURE IF EXISTS `concierto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `concierto` ()  NO SQL
SELECT agenda.id_Concierto, nombre, descripcion, Artista, Genero, img, Fecha_fin, Fecha_inicio
FROM concierto
INNER JOIN agenda ON concierto.id_Concierto = agenda.id_Concierto
WHERE agenda.Finalizado=0$$

DROP PROCEDURE IF EXISTS `cuantosBoletos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cuantosBoletos` (IN `usr` VARCHAR(10), IN `con` INT)  NO SQL
SELECT COUNT(boleto.id_Persona) as cont FROM boleto, persona, concierto 
WHERE boleto.id_Persona=persona.Id_Persona 
AND persona.Usuario=usr 
AND boleto.id_Concierto = concierto.id_Concierto 
AND boleto.id_Concierto=con$$

DROP PROCEDURE IF EXISTS `datosConcierto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `datosConcierto` (IN `id` INT)  NO SQL
SELECT nombre, descripcion, Artista, Genero, img, Fecha_fin, Fecha_inicio
FROM concierto
INNER JOIN agenda ON concierto.id_Concierto = agenda.id_Concierto
WHERE agenda.Finalizado=0
AND concierto.id_Concierto=id$$

DROP PROCEDURE IF EXISTS `delTicket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delTicket` (IN `valor` INT)  NO SQL
DELETE FROM `boleto` WHERE `boleto`.`id_Boleto` = valor$$

DROP PROCEDURE IF EXISTS `getImages`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getImages` ()  NO SQL
SELECT concierto.img FROM concierto LEFT JOIN  (
    SELECT agenda.id_Concierto AS id FROM agenda 
    WHERE agenda.Finalizado=0
    ORDER BY agenda.Fecha_inicio ASC LIMIT 0,3
) AS subtable
    ON concierto.id_Concierto = subtable.id
    WHERE concierto.id_Concierto = subtable.id$$

DROP PROCEDURE IF EXISTS `login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `username` VARCHAR(10), IN `password` VARCHAR(20))  NO SQL
SELECT COUNT(persona.Usuario) AS exist FROM persona WHERE persona.Usuario=username AND persona.Pass=password$$

DROP PROCEDURE IF EXISTS `nuevoBoleto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevoBoleto` (IN `asien` INT, IN `per` INT, IN `con` INT)  NO SQL
INSERT INTO `boleto` (`id_Asiento`, `id_Persona`, `id_Concierto`) VALUES (asien, per, con)$$

DROP PROCEDURE IF EXISTS `ObtenerAgenda`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerAgenda` ()  NO SQL
SELECT Fecha_inicio, Fecha_fin, concierto.Nombre
FROM agenda
INNER JOIN concierto ON agenda.id_Concierto = concierto.id_Concierto
WHERE agenda.finalizado =0$$

DROP PROCEDURE IF EXISTS `pagoRealizado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pagoRealizado` (IN `banco` VARCHAR(20), IN `tc` VARCHAR(16), IN `clave` VARCHAR(3), IN `ven` DATETIME)  NO SQL
INSERT INTO recibo (tarjetaCredito, Banco, CCV, Vencimiento) VALUES (tc, banco, clave, ven)$$

DROP PROCEDURE IF EXISTS `registroUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registroUser` (IN `nombre` VARCHAR(30), IN `apellido` VARCHAR(30), IN `pass` VARCHAR(20), IN `usuario` VARCHAR(10), IN `edad` DATE, IN `correo` VARCHAR(30))  INSERT INTO persona(Nombre, Apellido, Pass, Usuario, Edad, email) values (nombre, apellido, pass, usuario, edad, correo)$$

DROP PROCEDURE IF EXISTS `revisarCorreo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarCorreo` (IN `correo` VARCHAR(30))  NO SQL
SELECT COUNT(persona.email) as exist from persona where email=correo$$

DROP PROCEDURE IF EXISTS `revisarTitle`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarTitle` (IN `title` VARCHAR(20))  NO SQL
SELECT COUNT(concierto.Nombre) as exist from concierto where concierto.Nombre=title$$

DROP PROCEDURE IF EXISTS `revisarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarUsuario` (IN `username` VARCHAR(10))  NO SQL
SELECT COUNT(persona.Usuario) as exist from persona where persona.Usuario=username$$

DROP PROCEDURE IF EXISTS `userData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userData` (IN `usr` VARCHAR(10))  NO SQL
SELECT persona.Nombre as name, persona.admin as val FROM persona where persona.Usuario=usr$$

DROP PROCEDURE IF EXISTS `userID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `userID` (IN `username` VARCHAR(10))  NO SQL
SELECT Id_Persona as ID from persona WHERE persona.Usuario=username$$

DROP PROCEDURE IF EXISTS `verBoletos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verBoletos` (IN `usr` VARCHAR(10))  NO SQL
SELECT concierto.Nombre as concert, agenda.Fecha_inicio as inicio, asiento.Fila as fila, asiento.Numero as num, boleto.Folio_Compra, boleto.id_Boleto as ID FROM boleto, concierto, agenda, asiento, persona 
WHERE boleto.id_Asiento = asiento.id_Asiento 
AND boleto.id_Concierto = concierto.id_Concierto 
AND agenda.id_Concierto = concierto.id_Concierto 
AND boleto.id_Persona = persona.Id_Persona
AND persona.Usuario=usr
AND agenda.Finalizado=0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `Fecha_inicio` datetime NOT NULL,
  `id_Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Fecha_fin` datetime NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL,
  `Finalizado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_Registro`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`Fecha_inicio`, `id_Registro`, `Fecha_fin`, `id_Concierto`, `Finalizado`) VALUES
('2016-06-29 23:00:00', 9, '2016-06-30 04:00:00', 17, 0),
('2016-06-22 22:00:00', 10, '2016-06-23 13:00:00', 18, 0),
('2016-06-30 17:00:00', 12, '2016-07-01 05:00:00', 20, 0),
('2016-07-23 10:52:00', 13, '2016-07-24 01:53:00', 21, 0),
('2016-10-29 01:54:00', 14, '2016-10-30 08:56:00', 22, 0),
('2016-11-24 01:56:00', 15, '2016-11-26 06:56:00', 23, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

DROP TABLE IF EXISTS `asiento`;
CREATE TABLE IF NOT EXISTS `asiento` (
  `id_Zona` int(10) UNSIGNED NOT NULL,
  `Fila` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Numero` int(10) UNSIGNED NOT NULL,
  `id_Asiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Asiento`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`id_Zona`, `Fila`, `Numero`, `id_Asiento`) VALUES
(1, 'A', 1, 1),
(1, 'A', 2, 2),
(1, 'A', 3, 3),
(1, 'A', 4, 4),
(1, 'A', 5, 5),
(1, 'A', 6, 6),
(1, 'A', 7, 7),
(1, 'A', 8, 8),
(1, 'A', 9, 9),
(1, 'A', 10, 10),
(1, 'B', 1, 11),
(1, 'B', 2, 12),
(1, 'B', 3, 13),
(1, 'B', 4, 14),
(1, 'B', 5, 15),
(1, 'B', 6, 16),
(1, 'B', 7, 17),
(1, 'B', 8, 18),
(1, 'B', 9, 19),
(1, 'B', 10, 20),
(2, 'C', 1, 21),
(2, 'C', 2, 22),
(2, 'C', 3, 23),
(2, 'C', 4, 24),
(2, 'C', 5, 25),
(2, 'C', 6, 26),
(2, 'C', 7, 27),
(2, 'C', 8, 28),
(2, 'C', 9, 29),
(2, 'C', 10, 30),
(2, 'D', 1, 31),
(2, 'D', 2, 32),
(2, 'D', 3, 33),
(2, 'D', 4, 34),
(2, 'D', 5, 35),
(2, 'D', 6, 36),
(2, 'D', 7, 37),
(2, 'D', 8, 38),
(2, 'D', 9, 39),
(2, 'D', 10, 40),
(3, 'E', 1, 41),
(3, 'E', 2, 42),
(3, 'E', 3, 43),
(3, 'E', 4, 44),
(3, 'E', 5, 45),
(3, 'E', 6, 46),
(3, 'E', 7, 47),
(3, 'E', 8, 48),
(3, 'E', 9, 49),
(3, 'E', 10, 50),
(3, 'F', 1, 51),
(3, 'F', 2, 52),
(3, 'F', 3, 53),
(3, 'F', 4, 54),
(3, 'F', 5, 55),
(0, 'F', 6, 56),
(3, 'F', 7, 57),
(3, 'F', 8, 58),
(3, 'F', 9, 59),
(3, 'F', 10, 60),
(4, 'G', 1, 61),
(4, 'G', 2, 62),
(4, 'G', 3, 63),
(4, 'G', 4, 64),
(4, 'G', 5, 65),
(4, 'G', 6, 66),
(4, 'G', 7, 67),
(4, 'G', 8, 68),
(4, 'G', 9, 69),
(4, 'G', 10, 70),
(4, 'H', 1, 71),
(4, 'H', 2, 72),
(4, 'H', 3, 73),
(4, 'H', 4, 74),
(4, 'H', 5, 75),
(0, 'H', 6, 76),
(4, 'H', 7, 77),
(4, 'H', 8, 78),
(4, 'H', 9, 79),
(4, 'H', 10, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

DROP TABLE IF EXISTS `boleto`;
CREATE TABLE IF NOT EXISTS `boleto` (
  `id_Boleto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Folio_Compra` int(10) UNSIGNED DEFAULT NULL,
  `id_Asiento` int(10) UNSIGNED NOT NULL,
  `id_Persona` int(10) UNSIGNED NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_Boleto`),
  UNIQUE KEY `Folio_Compra` (`Folio_Compra`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id_Boleto`, `Folio_Compra`, `id_Asiento`, `id_Persona`, `id_Concierto`) VALUES
(45, 6547, 14, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concierto`
--

DROP TABLE IF EXISTS `concierto`;
CREATE TABLE IF NOT EXISTS `concierto` (
  `Nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Artista` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Genero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_Concierto`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concierto`
--

INSERT INTO `concierto` (`Nombre`, `Descripcion`, `id_Concierto`, `Artista`, `Genero`, `img`) VALUES
('Metallica World Tour', 'Metallica in Mexico!!!!', 17, 'metallica', 'Metal', 'metallica.png'),
('LHOG concert', 'Nuevo grupo de rock se presenta, Left Hand of God. (No existe en realidad pero era la imagen que tenia)', 18, 'Left Hand of God', 'Rock', 'left hand of god.jpg'),
('Nirvana', 'Nirvana se presenta !!!!!', 20, 'Nirvana', 'Rock', 'nirvana.jpg'),
('Avicii world tour', 'Avicii en su tour mundial llega a México', 21, 'Avicii', 'Electronica', 'avicii_tour.png'),
('Dreams', 'Coldplay en su gira por su nuevo album', 22, 'Coldplay', 'Alternativo', 'COLDPLAY.png'),
('Regionales', 'Pepe Aguilar presenta su gira Regionales', 23, 'PepeAguilar', 'Mexicana', 'pepe.png');

--
-- Disparadores `concierto`
--
DROP TRIGGER IF EXISTS `estadoConcierto`;
DELIMITER $$
CREATE TRIGGER `estadoConcierto` AFTER INSERT ON `concierto` FOR EACH ROW UPDATE agenda Set agenda.Finalizado=1 WHERE agenda.Fecha_fin < NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `Edad` date NOT NULL,
  `Pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Persona`),
  UNIQUE KEY `Usuario` (`Usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Edad`, `Pass`, `Usuario`, `Nombre`, `Apellido`, `Id_Persona`, `email`, `admin`) VALUES
('1998-05-13', '36606460', 'sam1', 'brenda', 'Avila', 1, 'brendasamat@hotmail.com', 0),
('2016-06-08', '213213', '21321', '132132', '13213231', 2, '213213', 0),
('2016-06-10', '$email', 'SAD', 'SADAAS', 'SADASD', 5, 'brendasamant@hotmail.com', 0),
('2016-06-11', '36606460', 'clau', 'claudia', 'de la torre', 6, 'cyberclaudia_3@hotmail.com', 0),
('2016-06-13', '123456789', 'greenD', 'billie', 'armstrong', 7, 'billiejoe_armstrong@live.com.m', 0),
('1998-01-07', 'LIMA.mali98', 'lima1756', 'Luis Iván', 'Morett Arévalo', 21, 'lima@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

DROP TABLE IF EXISTS `recibo`;
CREATE TABLE IF NOT EXISTS `recibo` (
  `tarjetaCredito` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Banco` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Folio_Compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CCV` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Vencimiento` date NOT NULL,
  PRIMARY KEY (`Folio_Compra`)
) ENGINE=InnoDB AUTO_INCREMENT=6548 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`tarjetaCredito`, `Fecha`, `Banco`, `Folio_Compra`, `CCV`, `Vencimiento`) VALUES
('1234567891023456', '2016-06-19 19:50:51', 'asdf', 6547, '123', '2016-06-22');

--
-- Disparadores `recibo`
--
DROP TRIGGER IF EXISTS `agregarFolio`;
DELIMITER $$
CREATE TRIGGER `agregarFolio` AFTER INSERT ON `recibo` FOR EACH ROW BEGIN
SET @b=(SELECT MAX(recibo.Folio_Compra) AS id FROM recibo);
SET @a=(SELECT MAX(boleto.id_Boleto) AS id FROM boleto);
UPDATE boleto
SET boleto.Folio_Compra=@b
WHERE boleto.id_Boleto=@a;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

DROP TABLE IF EXISTS `zona`;
CREATE TABLE IF NOT EXISTS `zona` (
  `Precio` int(10) UNSIGNED NOT NULL,
  `id_Zona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Ubicacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Cupo` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_Zona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`Precio`, `id_Zona`, `Ubicacion`, `Cupo`) VALUES
(500, 1, 'zona 1', 20),
(300, 2, 'zona 2', 20),
(200, 3, 'zona 3', 20),
(100, 4, 'zona 4', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
