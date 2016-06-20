<!DOCTYPE html>
<?php
session_start(); 
include('Class-Functions/BaseDeDatos.php'); 
if(isset($_SESSION['adm']) and !$_SESSION['adm']):
$ObjBD = new BaseDeDatos();
if(isset($_GET['select'])):
$val=$ObjBD->precio($_GET['select']);
?>
<html  lang="es-US">
	<head>
		<meta charset="UTF-8">
		<title>prueba</title>
		<link rel="stylesheet" type="text/css" href="CSS/pago.css">
		<script src="JavaScripts/validacionTC.js"></script>
		<script src="JavaScripts/modernizr-custom.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="JavaScripts/js-webshim/minified/polyfiller.js"></script>
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
                <script type="text/javascript">
				var hoy = new Date().toJSON().slice(0,10);
					if (Modernizr.inputtypes.date) {
						document.write('<p class="fecha">Fecha de vencimiento:</p>')
						document.write('<input type="date" class="text" id="Vencimiento" name="Vencimiento" tabindex="6" min="'+hoy+'" required><br>');
					}
					else {
						('forms-ext', {types: 'date'});
						webshims.polyfill('forms forms-ext');
						document.write('<input type="date" name="Vencimiento" class="text2" placeholder="Fecha de vencimiento" tabindex="6" auto;" required/>');
					} 
				</script>
				
				<br><br><br>
				<input type="submit" value="Comprar">
				<a href="Class-Functions/Cancelar.php"><button>Cancelar</button></a>
			</form>
			
		</div>
		<?php else: header('Location: eventos.php');?>
		<?php endif; ?>
		<?php else: header('Location: index.php');?>
		<?php endif; ?>
	</body>
</html>