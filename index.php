<!DOCTYPE html>
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
<form>
<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
<input type="text" name="search" placeholder="Buscar..." id="search">
</form>


</div>
</header>-->
<header>
		<div class="contenedor">
			<div class="logo">
				<img src="Images/koncert.jpg" width="250px;">
			
            <form>
                <input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
                <input type="text" name="search" placeholder="Buscar..." id="search">
            </form>
            </div>
            
			<nav class="menu-fixed">
				<ul>
                     <li><a href="index.php"><img src="Images/koncert.jpg" width="100px;"></a></li>
					<li><a href="index.php">Agenda</a></li>
                    <li><a href="index.php">Eventos</a></li>
                    <li><a href="index.php">Instalaciones</a></li>          
                   
				</ul>
			</nav>
		</div>
</header>



<section>
<div id="slide-container">
<div id="slide">
	




<div class="w3-content w3-section" style="max-width:500px">
  
  <img class="mySlides" src="Images/metallica.png" style="width:52%">
  <img class="mySlides" src="Images/Concierto.jpg" style="width:70%">
</div>

	</div>
<p>PROXIMOS EVENTOS</p>

</div>
</section>
<div id="sidebar">
<a  href="registroK.php">
<div id="registro">
<p>Registrate</p>

</div>
</a>
<a href="iniciarK.php">
<div id="sesion">
	<p>Iniciar sesion</p>
</div>
</a>
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








</body>
</html>