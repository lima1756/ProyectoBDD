<!DOCTYPE html>
<?php 
include('Class-Functions/BaseDeDatos.php'); 
$ObjBD = new BaseDeDatos();
$val=$ObjBD->precio($_GET['select']);
?>
<html  lang="es-US">
	<head>
		<meta charset="UTF-8">
		<title>prueba</title>
		<link rel="stylesheet" type="text/css" href="CSS/pago.css">
		<script src="JavaScripts/validacionTC.js"></script>
	</head>
	<body>
		<header>
		<div id="buscador">
			<form>
				<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
				<input type="text" name="search" placeholder="Buscar..." id="search">
			</form>
			<a href="index.php"><img src="images/koncert.png" width="200px;"></a>
		</div>
		</header>
		<div id=inicioF>
			<form name="iniciar" method="POST" onsubmit="return validacionTC(document.iniciar)" action="Class-Functions/pagoTC.php">
				<label for="">Información de Pago</label><br>
				<p>Costo Total: $<?php echo $val[0]['Precio'];?></p>
				</br></br>
				<input type="Text" name="banco" placeholder="Banco"><br><br><br>
				<input type="text" name="Tarjeta" placeholder="Tarjeta de crédito" pattern="^[1-9][0-9]{14}[0-9]$"><br><br><br>
				<input type="number" name="CSV" placeholder="CSV" min="000" max="999" pattern="^[0-9][0-9]{1}[0-9]$"><br><br><br>
                <input type="date" name="Vencimiento" placeholder="Vencimiento"><br><br><br>
				<input type="submit" value="Comprar">
				<a href="Class-Functions/Cancelar.php"><button>Cancelar</button></a>
			</form>
			
		</div>
	</body>
</html>