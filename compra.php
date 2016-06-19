<!DOCTYPE html>
<?php
include("Class-Functions/BaseDeDatos.php"); 
?>
<html lang="es-US">
<head>
    <meta charset="UTF-8">
	<title>Koncert!</title>
	<link rel="stylesheet" type="text/css" href="CSS/compra.CSS">
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
 $id=$_POST['var'];
 $zon=$_POST['zonaa'];
		
                $ObjBD= new BaseDeDatos();
               $array= $ObjBD->datosConcierto($id);
			   
				?>
				<?php foreach($array as $array){ ?>        
<div id="slide-container">
            <div id="slide">        
		<?php echo '<img src="Images/'.$array['img'].'" width="300px" heigh="300px">'; ?> 
              </div>
            </div>
			</br>
            </br>
            
			<texto> <?php echo '<h1>'.$array['nombre'].'</h1>'; ?>
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
		</texto>	
		<?php $array2= $ObjBD->asientosDisponibles($id,$zon);?>	
				 
		<formulariooo">
<form name="iniciar" method="POST" onsubmit="return validacionLogIn(document.iniciar)" action="compra.php">
				</br>
				zona   
                                <select name="zonaa">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
   </select>
                                				</br>
                                Fila
                                <select name="fila">
                                    <?php foreach($array2 as $array2){ ?>
                                    <option><?php echo $array2['Fila'];?></option>
                                    <?php } ?>
                                </select>
   
				</br>
				<input type="hidden" name="var" value="<?php echo $id; ?>">
				<input type="submit" value="enviar">
			</form>


		<?php
        } ?> </formulariooo>
				 





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



</div>

	

</body>
</html>