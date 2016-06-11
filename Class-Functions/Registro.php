<?php
include("BaseDeDatos.php");
if(isset($_POST['email'])){
	$ObjBD= new BaseDeDatos();
	try{
	$ObjBD->registro($_POST['nombre'],$_POST['fecha'],$_POST['pass'],$_POST['usuario'],$_POST['email'],$_POST['apellido']);
	}
	catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    header('Location: ../iniciark.php');
}