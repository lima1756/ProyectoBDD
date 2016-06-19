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
				<input type="Text" name="banco" placeholder="Banco"><br><br><br>
				<input type="number" name="Tarjeta" placeholder="Tarjeta de crédito" min="10000000000000000" max"9999999999999999"><br><br><br>
				<input type="number" name="CSV" placeholder="CSV" min="000" max="999" minlength="3"><br><br><br>
                <input type="date" name="Vencimiento" placeholder="Vencimiento"><br><br><br>
				<input type="submit" value="Comprar">
			</form>
		</div>
	</body>
</html>