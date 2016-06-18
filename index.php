<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php"); 
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
                <!--
            <header>
            <div id="buscador">
            <a href="index.php"><img src="Images/koncert.jpg" width="200px;"></a>
            <nav>
            <ul>
            <li><a href="index.php">Agenda</a></li>
            <li><a href="index.php">Eventos</a></li>
            <li><a href="index.php">Instalaciones</a></li>
            </ul>
            </nav>



            </div>
            </header>-->
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
					<li><a href="index.php">Agenda</a></li>
                    <li><a href="index.php">Eventos</a></li>
                    <li><a href="index.php">Instalaciones</a></li>    
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
        <div id="slide-container">
            <div id="slide">
                <div class="w3-content w3-section" style="max-width:500px">
                    <?php
                    $ObjBD= new BaseDeDatos();
                    $img=$ObjBD->pictures();
                    echo '<img class="mySlides" src="Images/'.$img[0]['img'].'.png" style="width:52%">';
                    echo '<img class="mySlides" src="Images/'.$img[1]['img'].'.png" style="width:52%">';
                    echo '<img class="mySlides" src="Images/'.$img[2]['img'].'.png" style="width:52%">';
                     ?>
                </div>
            </div>
        <p>PROXIMOS EVENTOS</p>
        </div>
    </section>
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
    <?php if(!$_SESSION['adm']): ?>
        <p class="session">Bienvenido, <?php echo $_SESSION['name']?></p>
        <a href="myTickets.php">
        <div id="btn">
            <p>Ver tus boletos</p>
        </div>
        <a href="Class-Functions/LogOut.php">
        <div id="btn">
            <p>Cerrar Sesión</p>
        </div>
        </a>
    <?php else: ?>
        <p class="session">Bienvenido, <?php echo $_SESSION['name']?></p>
        <a href="nuevoConcierto.php">
        <div id="btn">
            <p>Agregar concierto</p>
        </div>
    </a>
    <a href="Class-Functions/LogOut.php">
        <div id="btn">
            <p>Cerrar Sesión</p>
        </div>
        </a>
    <?php endif; ?>
<?php endif;?>
</div>
<script>
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
</div>
</body>
</html>