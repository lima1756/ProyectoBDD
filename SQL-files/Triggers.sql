USE proyecto;

DROP TRIGGER IF EXISTS `estadoConcierto`;
CREATE TRIGGER `estadoConcierto` AFTER INSERT ON `concierto` FOR EACH ROW 
UPDATE agenda Set agenda.Finalizado=1 WHERE agenda.Fecha_fin < NOW();

DROP TRIGGER IF EXISTS `agregarFolio`;
DELIMITER //
CREATE TRIGGER `agregarFolio` AFTER INSERT ON `recibo`
 FOR EACH ROW BEGIN
SET @b=(SELECT MAX(recibo.Folio_Compra) AS id FROM recibo);
SET @a=(SELECT MAX(boleto.id_Boleto) AS id FROM boleto);
UPDATE boleto
SET boleto.Folio_Compra=@b
WHERE boleto.id_Boleto=@a;
END//