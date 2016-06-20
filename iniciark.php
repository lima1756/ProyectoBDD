<!DOCTYPE html>
<html  lang="es-US">
	<head>
		<meta charset="UTF-8">
		<title>prueba</title>
		<link rel="stylesheet" type="text/css" href="CSS/iniciark.css">
		<script src="JavaScripts/validacionLogIn.js"></script>
	</head>
	<body>
		<header>
		<div id="buscador"
			<a href="index.php"><img src="images/koncert.png" width="200px;"></a>
		</div>
		</header>
		<div id=inicioF>
			<form name="iniciar" method="POST" onsubmit="return validacionLogIn(document.iniciar)" action="Class-Functions/LogIn.php">
				<label for="">Iniciar Sesión</label><br>
				<input type="text" name="usuario" id="" placeholder="Usuario" ><br><br><br>
				<input type="password" name="pass" id="" placeholder="Contraseña"><br><br><br>
				<input type="submit" value="Entrar">
			</form>
		</div>
	</body>
</html>