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

<html>
	<head>
		<title>Registrarse</title>
		<link rel="stylesheet" type="text/css" href="CSS/registroK.css">
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
				<p class="fecha">Fecha de nacimiento:</p>
				<input type="date" class="text" id="fecha" name="fecha" required><br>
				<input type="password" class="text"  id="pass" name="pass" placeholder="Contraseña" required><br>
				<input type="password" class="text"  id="pass" name="pass2" placeholder="Confirmar Contraseña" required><br>
				<input type="submit" id="enviar" name="login" value="Registrarse">
			</form> 
		</div>
	</body>
</html>
