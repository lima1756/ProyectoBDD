<?php
include("BaseDeDatos.php");
if(isset($_POST['usuario'])){
	$ObjBD= new BaseDeDatos();
    if(verificar()){
		try{
			$existe=$ObjBD->verificarLogIn($_POST['usuario'], $_POST['pass']);
			if($existe[0]['exist']=='1'){
                echo "ALGO";
                session_start();
                $datos=datosDeSesion($ObjBD);
                $_SESSION['name']=$datos[0]['name'];
                $_SESSION['adm']=$datos[0]['val'];
                $_SESSION['user']=$_POST['usuario'];
                header('Location: ../index.php');
			}
            else
                echo "Revise los datos introducidos";
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
        echo "Revise los datos introducido";
        return false;
    }
    
    if($inputPassword == null || !preg_match("/[0-9a-zA-Z-_\.]/", $inputPassword)){
        echo "Verifique los datos introducidos";
        return false;
    }
    return true;
}

function datosDeSesion($BD){
    $datos = $BD->sessionData($_POST["usuario"]);
    return $datos;
}