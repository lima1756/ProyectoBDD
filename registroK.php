<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php");
if(isset($_POST['email'])){
	$ObjBD= new BaseDeDatos();
	var_dump($_POST);
	var_dump($ObjBD);
	try{
	$ObjBD->registro($_POST['nombre'],$_POST['fecha'],$_POST['pass'],$_POST['usuario'],$_POST['email'],$_POST['apellido']);
	}
	catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
}
?>

<html lang="es-US">
	<head>
		<title>Registrarse</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/registroK.css">
		<script type="text/javascript" href="JavaScripts/modernizr-custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
	</head>
	<body>
		<header>
			<div id="buscador">
				<form>
				<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
				<input type="text" name="search" placeholder="Buscar..." id="search">
				</form>
				<img src="Images/koncert.jpg" width="200px;">
			</div>
		</header>

		<div id="formulario">
			<p>Datos De Registro</p>
			<form method="POST" action="registroK.php">
				<input type="email" class="text" id="email" name="email" placeholder="Email" required><br>
				<input type="text" class="text" id="nombre" name="nombre" placeholder="Nombre(s)" required><br>
				<input type="text" class="text" id="apellido" name="apellido" placeholder="Apellido(s)" required><br>
				<input type="text" class="text" id="usuario" name="usuario" placeholder="Usuario" required><br>
				<script type="text/javascript">
					alert("hola")
					alert(Modernizr.inputypes.date);
					if (Modernizr.inputypes.date) {
						document.write('<input type="date" class="text" id="fecha" name="fecha" max="2016-06-30" min="1900-01-01" required><br>');
					}
					else {
						document.write("('forms-ext', {types: 'date'});");
						document.write("webshims.polyfill('forms forms-ext');");
						document.write('<input type="date" class="text2" placeholder="Fecha de nacimiento" required/>");');
					} 
				</script>
				<input type="password" class="text"  id="pass" name="pass" placeholder="Contraseña" required><br>
				<input type="password" class="text"  id="pass" name="pass2" placeholder="Confirmar Contraseña" required><br>
				<input type="submit" id="enviar" name="login" value="Registrarse">
			</form> 
		</div>
	</body>
</html>
