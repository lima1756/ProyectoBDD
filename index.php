<html>
<head>
	<title>prueba</title>
	<link rel="stylesheet" type="text/css" href="CSS/index2.css">
</head>

<style type="text/css">



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// prepare and bind


$stmt = $conn->prepare("INSERT INTO usuarios (email,nombre,apellido,usuario,password) 
    VALUES (:email,:nombre,:apellido,:usuario,:password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':email', $password);




// set parameters and execute
$nombre = "John";
$apellido = "Doe";
$email = "john@example.com";
$usuario="jon1";
$password="36606460";
$stmt->execute();
 echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

<body>
<header>
	<div id="buscador">
<form>
<input id="boton" type="submit" name="boton" value="&rarr;"  style="padding:0px 10px;">
<input type="text" name="search" placeholder="Buscar..." id="search">
</form>
<img src="koncert.jpg" width="200px;">

</div>
</header>
<section>
<div id="slide-container">
<div id="slide">
	




<div class="w3-content w3-section" style="max-width:500px">
  
  <img class="mySlides" src="metallica.png" style="width:52%">
  <img class="mySlides" src="Concierto.jpg" style="width:70%">
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