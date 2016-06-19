<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php");
session_start(); 
?>
<html lang="es-US">
<head>
    <meta charset="UTF-8">
	<title>Koncert!</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilos.CSS">
    <script src="http://code.jquery.com/jquery-lastest.js"</script>
    <script src ="JavaScripts/main.js"></script>
    
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


<div class="cuerpo">
    <section>
        <?php
        echo "<h1>Tus boletos son:</h1>";
        $ObjBD = new BaseDeDatos();
        $mistickets = $ObjBD->tickets($_SESSION['user']);
        echo "<table>";
        echo "<tr><td>Concierto</td><td>Inicio</td><td>Asiento</td><td>Folio de Pago</td></tr>";
        foreach($mistickets as $key) {
            echo ("<tr><td>".$key['concert']."</td><td>".$key['inicio']."</td><td>".$key['fila'].$key['num']."</td><td>".$key['Folio_Compra']."</td></tr>");
        };
        echo "</table>";
        
        ?>
    </section>
<div id="sidebar">
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
        <a href="mytickets.php">
        <div id="btn">
            <p>Ver tus boletos</p>
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
</div>

</body>
</html>