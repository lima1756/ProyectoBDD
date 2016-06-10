<html>
<head>
	<title>Koncert!</title>
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
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
<div id="registro">
<a href="registroK.php">Registrate</a>

</div>

<div id="sesion">
	<a href="iniciarK.php">Iniciar sesion</a>
</div>
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