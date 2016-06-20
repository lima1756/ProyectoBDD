<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php");
session_start(); 
?>
<html lang="es-US">
<head>
    <meta charset="UTF-8">
	<title>Koncert!</title>
	
	<link rel="stylesheet" type="text/css" href="CSS/eventos.css">
    <script src="http://code.jquery.com/jquery-lastest.js"</script>
    <script src ="JavaScripts/main.js"></script>
    
</head>
<body>

<div class="contenedor">
<header>
			<div class="logo">			
            <form>
                <input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
            </form>
            </div>
            
			<nav class="menu-fixed">
				<ul>
                     <li><a href="index.php"><img src="Images/koncert.png" width="100px;"></a></li>
                    <li><a href="eventos.php">Conciertos</a></li>
                    <li><a href="instalaciones.php">Instalaciones</a></li>    
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
            <?php echo '<img src="Images/'.$array['img'].'"  class="concertImg"   width="300px" heigh="300px" >'; ?>
		    <texto>
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
			</texto>
<form action="compra.php" method="post">
<input type="hidden" name="var" value="<?php echo $array['id_Concierto']; ?>">
<input type="submit" value="Comprar boleto"> 
</form>
    </br>
    </br>
    <hr>
        <?php } ?>

                    
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