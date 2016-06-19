<!DOCTYPE html>

<html lang="es-US">
	<head>
		<title>Agregar Concierto</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/nuevoConcierto.css">
		<script src="JavaScripts/modernizr-custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="JavaScripts/js-webshim/minified/polyfiller.js"></script>
		<script src="JavaScripts/validacionConcierto.js"></script>		
	</head>
	<body>
		<header>
			<div id="buscador">
				<form>
				<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
				<input type="text" name="search" placeholder="Buscar..." id="search">
				</form>
				<a href="index.php"><img src="Images/koncert.png" width="200px;"></a>
			</div>
		</header>
		<div id="formulario">
			<p>Datos del concierto a agregar:</p>
			<form name="newConcert" enctype="multipart/form-data" method="POST" onsubmit="return validacion(document.newConcert)" action="Class-Functions/newConcert.php">
				<input type="text" class="text" id="title" name="title" tabindex="1" placeholder="Nombre del concierto" required><br>
				<textarea class="text" name="Descripcion" rows="5" cols="30" tabindex="2" placeholder="Descripción del Concierto"></textarea>
				<input type="text" class="text" id="artista" name="artista" tabindex="2" placeholder="Artista" maxlength="20" required><br>
				<input type="text" class="text" id="genero" name="genero" tabindex="3" placeholder="Genero" maxlength="20" required><br>
				<input name="imagen" class="text" type="file" placeholder="Imagen del concierto" required>
				<script type="text/javascript">
					var hoy = new Date().toJSON().slice(0,10);
					if (Modernizr.inputtypes.date) {
						document.write('<p class="fecha">Fecha y hora de inicio:</p>');
						document.write('<input type="datetime-local" class="text" id="inicio" name="inicio" tabindex="6" max="2030-01-01" min="'+hoy+'" required><br>');
					}
					else {
						('forms-ext', {types: 'date'});
						webshims.polyfill('forms forms-ext');
						document.write('<input type="datetime-local" name="inicio" class="text" placeholder="Fecha y hora de inicio" tabindex="6" required/>');
					} 
					if (Modernizr.inputtypes.date) {
						document.write('<p class="fecha">Fecha y hora de fin:</p>');
						document.write('<input type="datetime-local" class="text" id="fin" name="fin" tabindex="7" max="2030-01-01" min="'+hoy+'" required><br>');
					}
					else {
						('forms-ext', {types: 'date'});
						webshims.polyfill('forms forms-ext');
						document.write('<input type="datetime-local" name="fin" class="text" placeholder="Fecha y hora de fin" tabindex="7" required/>');
					}
				</script>
				<input type="submit" id="enviar" name="submit" tabindex="8" value="Aceptar">
			</form> 
		</div>
	</body>
</html>
