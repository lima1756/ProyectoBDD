<?php
	include("BaseDeDatos.php");
	if(isset($_POST['id'])){
		$ObjBD= new BaseDeDatos();
        try{
              $ObjBD->delticket($_POST['id']);
              header('Location: ../mytickets.php');
		}   
		catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
}