<!DOCTYPE html>
<?php
    include("Class-Functions/BaseDeDatos.php");
    function generarZonas(){
        $BD = new BaseDeDatos();
        $consulta = $BD->zonas();
        echo "<select name='zonas' id='zonas' onChange='cargaContenido(this.id, document.comprar)'>";
        echo "<option value='-1'>Seleccione zona</option>";
        foreach ($consulta as $key) {
            echo "<option value='".$key['id_Zona']."'>".$key['id_Zona']."</option>";
        }
        echo "</select>";
    }
?>
 
?>
<html lang="es-US">
<head>
    <meta charset="UTF-8">
	<title>Koncert!</title>
	<link rel="stylesheet" type="text/css" href="CSS/compra.CSS">
    <script src="http://code.jquery.com/jquery-lastest.js"</script>
    <script src ="JavaScripts/main.js"></script>
    <script src ="JavaScripts/select_dependientes.js"></script>
    <script src ="JavaScripts/validacionCompra.js"></script>
    
</head>
<body>

<div class="contenedor">
<header>
			<div class="logo">			
            <form>
                <input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
                <input type="text" name="search" placeholder="Buscar..." id="search">
            </form>
            </div>
            
			<nav class="menu-fixed">
				<ul>
                     <li><a href="index.php"><img src="Images/koncert.png" width="100px;"></a></li>
					<li><a href="agenda.php">Agenda</a></li>
                    <li><a href="eventos.php">Conciertos</a></li>
                    <li><a href="instalaciones.php">Instalaciones</a></li>    
                    <li><form class="search">
                        <input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
                        <input type="text" name="search" placeholder="Buscar..." id="search">
                    </form></li>
				</ul>
			</nav>
            
		</div>
</header>

<div id="sidebar">
<?php session_start(); ?>
<?php if(!isset($_SESSION['name'])): ?>
    <a  href="registroK.php">
            <div id="btn">
                <p>Registrate</p>
            </div>
        </a>
    <a href="iniciarK.php">
        <div id="btn">
            <p>Iniciar sesion</p>
        </div>
    </a>
<?php else: ?>
<p class="session">Bienvenido, <?php echo $_SESSION['name']?></p>
    <?php if(!$_SESSION['adm']): ?>
        <a href="myTickets.php">
        <div id="btn">
            <p>Ver tus boletos</p>
        </div>
		  <div id="btn">
		  <a href="pago.php">
            <p>pagar o como se iame</p>
        </div>
    <?php else: ?>
        <a href="nuevoConcierto.php">
        <div id="btn">
            <p>Agregar concierto</p>
        </div>
        </a>
	<?php endif; ?>
    <a href="Class-Functions/LogOut.php">
        <div id="btn">
            <p>Cerrar Sesion</p>
        </div>
    </a>
<?php endif;?>
</div>

<div class="cuerpo">
    <section>
        <?php
            $id=$_POST['var'];
		    $ObjBD= new BaseDeDatos();
            $concierto= $ObjBD->datosConcierto($id);
        ?>
        <?php echo '<h1>'.$concierto[0]['nombre'].'</h1>'; ?></br>
	    <?php echo '<img src="Images/'.$concierto[0]['img'].'" class="concertImg" width="300px" heigh="300px">'; ?>  
	    </br>
        <p class="descriptivo">Descripción del concierto:</p>
        <?php echo $concierto[0]['descripcion']; ?></br></br>
	    <p class="descriptivo">Genero:</p> 
        <?php echo $concierto[0]['Genero']; ?></br></br>
        <p class="descriptivo">Artista(s):</p>
        <?php echo $concierto[0]['Artista']; ?></br></br>
        <p class="descriptivo">Fecha de inicio:</p> 
        <?php echo $concierto[0]['Fecha_inicio']; ?></br></br>
        <p class="descriptivo">Fecha de clausura:</p>
        <?php echo $concierto[0]['Fecha_fin']; ?></br></br>                        
	    <p class="descriptivo">Seleccione su zona y asiento disponible</p>
		<form name="comprar" method="POST" onsubmit="return validacionCompra(document.comprar)" action="Class-Functions/Boleto.php"></br>
				<div id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" name="asiento" id="asientos">
						<option value="-1">Seleccione asiento</option>
					</select>
				</div>
				<div id="demoIzq"><?php generarZonas(); ?></div>
			</div>
				<input type="hidden" name="var" value="<?php echo $id; ?>">
				<input type="submit" value="enviar">
			</form>





</div>

	

</body>
</html>