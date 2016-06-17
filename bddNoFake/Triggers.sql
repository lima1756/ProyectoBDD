USE proyecto;

DROP TRIGGER IF EXISTS `estadoConcierto`;
CREATE DEFINER=`root`@`localhost` TRIGGER `estadoConcierto` AFTER INSERT ON `concierto` FOR EACH ROW 
UPDATE agenda Set agenda.Finalizado=1 WHERE agenda.Fecha_fin < NOW();
