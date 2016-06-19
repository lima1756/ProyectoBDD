<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php"); 
?>
<html lang="es-US">
<head>
    <meta charset="UTF-8">
	<title>Koncert!</title>
	<link rel="stylesheet" type="text/css" href="CSS/eventos.CSS">
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
                    <li><a href="eventos.php">Eventos</a></li>
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
                $ObjBD= new BaseDeDatos();
                $array=$ObjBD->eventos();
        ?>
        <?php foreach($array as $array){ ?>        
            <?php echo '<h1>'.$array['nombre'].'</h1>'; ?>
            </br>
            </br>
            <?php echo '<img src="Images/'.$array['img'].'" width="300px" heigh="300px">'; ?>
            </br>
            </br>
            Genero: 
            <?php echo $array['Genero']; ?>
            </br>
            </br>
            Artista(s):
            <?php echo $array['Artista']; ?>
            </br>
            </br>
            Fecha de inicio: 
            <?php echo $array['Fecha_inicio']; ?>
            </br>
            </br>
            Fecha de clausura: 
            <?php echo $array['Fecha_fin']; ?>
            </br>
            </br>                        
            <?php echo $array['descripcion']; ?>
            </br>
            </br>
    <a  href="sdfasdf">Obten tu boleto</a>
    </br>
    </br>
    <hr>
        <?php } ?>

                    
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
<p class="session">Bienvenido, <?php echo $_SESSION['name']?></p>
    <?php if(!$_SESSION['adm']): ?>
        <a href="myTickets.php">
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