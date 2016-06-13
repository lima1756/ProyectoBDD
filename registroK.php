<!DOCTYPE html>


<html lang="es-US">
	<head>
		<title>Registrarse</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/registroK.css">
		<script src="JavaScripts/modernizr-custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		<script src="JavaScripts/validacionRegistro.js"></script>
	</head>
	<body>
		<header>
			<div id="buscador">
				<form>
				<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
				<input type="text" name="search" placeholder="Buscar..." id="search">
				</form>
				<a href="index.php"><img src="Images/koncert.jpg" width="200px;"></a>
			</div>
		</header>
		<div id="formulario">
			<p>Datos De Registro</p>
			<form name="registro" method="POST" onsubmit="return validacion(document.registro)" action="Class-Functions/Registro.php">
				<input type="email" class="text" id="email" name="email" tabindex="1" placeholder="Email" required><br>
				<input type="text" class="text" id="nombre" name="nombre" tabindex="2" placeholder="Nombre(s)" maxlength="30" required><br>
				<input type="text" class="text" id="apellido" name="apellido" tabindex="3" placeholder="Apellido(s)" maxlength="30" required><br>
				<input type="text" class="text" id="usuario" name="usuario" tabindex="4" placeholder="Usuario" minlength="5" maxlength="20" required><br>
				<script type="text/javascript">
					if (Modernizr.inputtypes.date) {
						document.write('<p class="fecha">Fecha de nacimiento:</p>')
						document.write('<input type="date" class="text" id="fecha" name="fecha" tabindex="6" max="2016-06-30" min="1900-01-01" required><br>');
					}
					else {
						('forms-ext', {types: 'date'});
						webshims.polyfill('forms forms-ext');
						document.write('<input type="date" name="fecha" class="text2" placeholder="Fecha de nacimiento" tabindex="6" required/>');
					} 
				</script>
				<input type="password" class="text"  id="pass" name="pass" tabindex="7" minlength="8" maxlength="20" placeholder="Contraseña" required><br>
				<input type="password" class="text"  id="pass" name="pass2" tabindex="8" placeholder="Confirmar Contraseña" required><br>
				<input type="submit" id="enviar" name="login" tabindex="9" value="Registrarse">
			</form> 
		</div>
	</body>
</html>
