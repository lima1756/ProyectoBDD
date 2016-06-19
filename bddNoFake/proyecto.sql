-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2016 a las 20:40:04
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--
DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;
DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarConcierto` (IN `name` VARCHAR(20), IN `descr` TEXT, IN `artista` VARCHAR(20), IN `genero` VARCHAR(20), IN `image` VARCHAR(20), IN `inicio` DATETIME, IN `fin` DATETIME)  SQL SECURITY INVOKER
BEGIN
INSERT INTO concierto(Nombre, Descripcion, Artista, Genero, img) values (name, descr, artista, genero, image); 
INSERT INTO agenda(Fecha_inicio, Fecha_fin, id_Concierto) VALUES (inicio, fin, last_insert_id());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `conciertos` ()  NO SQL
SELECT nombre, descripcion, Artista, Genero, img, Fecha_fin, Fecha_inicio
FROM concierto
INNER JOIN agenda ON concierto.id_Concierto = agenda.id_Concierto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getImages` ()  NO SQL
SELECT concierto.img FROM concierto LEFT JOIN  (
    SELECT agenda.id_Concierto AS id FROM agenda 
    WHERE agenda.Finalizado=0
    ORDER BY agenda.Fecha_inicio ASC LIMIT 0,3
) AS subtable
    ON concierto.id_Concierto = subtable.id
    WHERE concierto.id_Concierto = subtable.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `username` VARCHAR(10), IN `password` VARCHAR(20))  NO SQL
SELECT COUNT(persona.Usuario) AS exist FROM persona WHERE persona.Usuario=username AND persona.Pass=password$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerAgenda` ()  NO SQL
SELECT Fecha_inicio, Fecha_fin, concierto.Nombre
FROM agenda
INNER JOIN concierto ON agenda.id_Concierto = concierto.id_Concierto
WHERE agenda.finalizado =0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registroUser` (IN `nombre` VARCHAR(30), IN `apellido` VARCHAR(30), IN `pass` VARCHAR(20), IN `usuario` VARCHAR(10), IN `edad` DATE, IN `correo` VARCHAR(30))  INSERT INTO persona(Nombre, Apellido, Pass, Usuario, Edad, email) values (nombre, apellido, pass, usuario, edad, correo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarCorreo` (IN `correo` VARCHAR(30))  NO SQL
SELECT COUNT(persona.email) as exist from persona where email=correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarTitle` (IN `title` VARCHAR(20))  NO SQL
SELECT COUNT(concierto.Nombre) as exist from concierto where concierto.Nombre=title$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revisarUsuario` (IN `username` VARCHAR(10))  NO SQL
SELECT COUNT(persona.Usuario) as exist from persona where persona.Usuario=username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userData` (IN `usr` VARCHAR(10))  NO SQL
SELECT persona.Nombre as name, persona.admin as val FROM persona where persona.Usuario=usr$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `Fecha_inicio` datetime NOT NULL,
  `id_Registro` int(10) UNSIGNED NOT NULL,
  `Fecha_fin` datetime NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL,
  `Finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`Fecha_inicio`, `id_Registro`, `Fecha_fin`, `id_Concierto`, `Finalizado`) VALUES
('2016-06-18 00:00:00', 2, '2016-08-19 00:00:00', 5, 0),
('2016-06-17 00:00:00', 3, '2016-06-17 00:00:00', 9, 1),
('2016-06-15 00:00:00', 8, '2016-06-15 00:00:00', 16, 1),
('2016-06-18 00:00:00', 9, '2016-06-19 00:00:00', 17, 0),
('2016-06-18 22:00:00', 10, '2016-06-19 13:00:00', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asiento`
--

CREATE TABLE `asiento` (
  `id_Zona` int(10) UNSIGNED NOT NULL,
  `Fila` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Numero` int(10) UNSIGNED NOT NULL,
  `id_Asiento` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boleto`
--

CREATE TABLE `boleto` (
  `id_Boleto` int(10) UNSIGNED NOT NULL,
  `Folio_Compra` int(10) UNSIGNED NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_Asiento` int(10) UNSIGNED NOT NULL,
  `id_Persona` int(10) UNSIGNED NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concierto`
--

CREATE TABLE `concierto` (
  `Nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_Concierto` int(10) UNSIGNED NOT NULL,
  `Artista` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Genero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `concierto`
--

INSERT INTO `concierto` (`Nombre`, `Descripcion`, `id_Concierto`, `Artista`, `Genero`, `img`) VALUES
('asdf', 'zxcv', 5, 'qwer', 'yterty', 'rtyrtye'),
('123', '456', 9, '789', '147', 'descarga (1).jpg'),
('qwer', 'asdf', 16, 'zxcv', 'poiu', 'hjklñ'),
('a....', '....', 17, 'metallica', '.....', 'metallica.png'),
('Concierto1', 'Una descripción, mola', 18, 'Artista', 'Genero', 'left hand of god.jpg');

--
-- Triggers `concierto`
--
DELIMITER $$
CREATE TRIGGER `estadoConcierto` AFTER INSERT ON `concierto` FOR EACH ROW UPDATE agenda Set agenda.Finalizado=1 WHERE agenda.Fecha_fin < NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `Edad` date NOT NULL,
  `Pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Persona` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persona`
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
-- Table structure for table `recibo`
--

CREATE TABLE `recibo` (
  `tarjetaCredito` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Banco` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Folio_Compra` int(10) UNSIGNED NOT NULL,
  `CCV` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `Precio` int(10) UNSIGNED NOT NULL,
  `id_Zona` int(10) UNSIGNED NOT NULL,
  `Ubicacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Cupo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_Registro`);

--
-- Indexes for table `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id_Asiento`);

--
-- Indexes for table `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id_Boleto`),
  ADD UNIQUE KEY `Folio_Compra` (`Folio_Compra`);

--
-- Indexes for table `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`id_Concierto`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`Folio_Compra`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_Zona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `asiento`
--
ALTER TABLE `asiento`
  MODIFY `id_Asiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id_Boleto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `concierto`
--
ALTER TABLE `concierto`
  MODIFY `id_Concierto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `Id_Persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `recibo`
--
ALTER TABLE `recibo`
  MODIFY `Folio_Compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `id_Zona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
