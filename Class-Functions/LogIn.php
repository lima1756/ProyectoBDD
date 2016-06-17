<?php
include("BaseDeDatos.php");
if(isset($_POST['usuario'])){
	$ObjBD= new BaseDeDatos();
    if(verificar()){
		try{
			$existe=$ObjBD->login($_POST['usuario'], $_POST['pass']);
			if($existe[0]['exist']=='1'){
                session_start();
                $datos=datosDeSesion($ObjBD);
                $_SESSION['name']=$datos['name'];
                $_SESSION['adm']=$datos['val'];
			}
		}
		catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	}
}

function verificar(){
    $inputUsername = $_POST["usuario"];
    $inputPassword = $_POST["pass"];  

	if($inputUsername == null || !preg_match("/^[0-9a-zA-Z]+$/", $inputUsername)){
        echo "Revise el usuario introducido";
        return false;
    }
    
    if($inputPassword == null || !preg_match("/[0-9a-zA-Z-_\.]/", $inputPassword)){
        echo "Verifique la contraseña introducida";
        return false;
    }
    return true;
}

function datosDeSesion($BD){
    $datos = $BD->sessionData($_POST["usuario"]);
    return $datos;
}