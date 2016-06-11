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
		<script src="JavaScripts/modernizr-custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		<scritp src="JavaScripts/validacionRegistros.js"></script>
	</head>
	<body>
	<!--<script>
		function validacion(form) {
			var inputName = document.registro.nombre.value;
			alert(inputName);
			var inputLastName = document.registro.apellido.value;
			var inputUsername = document.registro.usuario.value; 
			var inputDate = document.registro.fecha.value; 
			var inputPassword1 = document.registro.pass.value;  
			var inputPassword2 = document.registro.pass2.value;    
			var inputEmail = document.registro.email.value;  
			if(inputName ==NULL || inputName.length == 0 || /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputName)){
				alert("Revise el nombre introducido");
				return false;
			}
			if(inputLastName ==NULL || inputLastName.length == 0 || /^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/.test(inputLastName)){
				alert("Revise el Apellido introducido");
				return false;
			}
			if(inputUsername ==NULL || inputUsername.length < 5 || inputUsername>20 || /^[0-9a-zA-Z]+$/.test(inputUsername)){
				alert("Revise el usuario introducido, no se aceptam simbolos y debe de ser de tamaño entre 5 y 20");
				return false;
			}
			return true;
		}
	</script>-->
		<header>
			<div id="buscador">
				<form>
				<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
				<input type="text" name="search" placeholder="Buscar..." id="search">
				</form>
				<img src="Images/koncert.jpg" width="200px;">
			</div>
		</header>
		<script type="text/javascript">
		prueba("aasdf");
		</script>
		<div id="formulario">
			<p>Datos De Registro</p>
			<form name="registro" method="POST" onsubmit="return validacion(document.registro)" action="registroK.php">
				<input type="email" class="text" id="email" name="email" tabindex="1" placeholder="Email" required><br>
				<input type="text" class="text" id="nombre" name="nombre" tabindex="2" placeholder="Nombre(s)" maxlength="20" required><br>
				<input type="text" class="text" id="apellido" name="apellido" tabindex="3" placeholder="Apellido(s)" maxlength="30" required><br>
				<input type="text" class="text" id="usuario" name="usuario" tabindex="4" placeholder="Usuario" maxlength="20" required><br>
				<script type="text/javascript">
					if (Modernizr.inputtypes.date) {
						document.write('<input type="date" class="text" id="fecha" name="fecha" tabindex="6" max="2016-06-30" min="1900-01-01" required><br>');
					}
					else {
						('forms-ext', {types: 'date'});
						webshims.polyfill('forms forms-ext');
						document.write('<input type="date" name="fecha" class="text2" placeholder="Fecha de nacimiento" tabindex="6" required/>');
					} 
				</script>
				<input type="password" class="text"  id="pass" name="pass" tabindex="7" placeholder="Contraseña" required><br>
				<input type="password" class="text"  id="pass" name="pass2" tabindex="8" placeholder="Confirmar Contraseña" required><br>
				<input type="submit" id="enviar" name="login" tabindex="9" value="Registrarse">
			</form> 
		</div>
	</body>
</html>
