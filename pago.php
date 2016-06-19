<!DOCTYPE html>
<html  lang="es-US">
	<head>
		<meta charset="UTF-8">
		<title>prueba</title>
		<link rel="stylesheet" type="text/css" href="CSS/pago.css">
		<script src="JavaScripts/validacionLogIn.js"></script>
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
			<form name="iniciar" method="POST" onsubmit="return validacionLogIn(document.iniciar)" action="Class-Functions/LogIn.php">
				<label for="">Información de Pago</label><br>
				<input type="text" name="Tarjeta" id="" placeholder="Tarjeta de crédito" ><br><br><br>
				<input type="text" name="CSV" id="" placeholder="CSV"><br><br><br>
                <input type="text" name="Vencimiento" id="" placeholder="Vencimiento"><br><br><br>
				<input type="submit" value="Comprar">
			</form>
		</div>
	</body>
</html>