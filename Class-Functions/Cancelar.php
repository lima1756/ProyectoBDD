<?php
	include("BaseDeDatos.php");
	$ObjBD= new BaseDeDatos();
	try{
		$ObjBD->refuseTransaction();
        header('Location: ../index.php');
	}   
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	