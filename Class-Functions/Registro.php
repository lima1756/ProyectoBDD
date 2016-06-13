<?php
include("BaseDeDatos.php");
if(isset($_POST['email'])){
	$ObjBD= new BaseDeDatos();
    if(verificar()){
		try{
			$existeUsuario=$ObjBD->verificarUsuario($_POST['usuario']);
			$existeCorreo=$ObjBD->verificarCorreo($_POST['email']);
			$a=0;
			if($existeUsuario[0]['exist']=='1'){
				echo "Ya existe el usuario introducido, porfavor introduzca uno nuevo<br>";
				$a=1;
			}
			if($existeCorreo[0]['exist']=='1'){
				echo "Ya esta registrado ese correo, inicie sesión o verifique el correo introducido<br>";
				$a=1;
			}
			if($a==0){
					$ObjBD->registro($_POST['nombre'],$_POST['fecha'],$_POST['pass'],$_POST['usuario'],$_POST['email'],$_POST['apellido']);
					//header('Location: ../iniciark.php');
			}
		}
		catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
	}
}

function verificar(){
	$inputName = $_POST["nombre"];
    $inputLastName = $_POST["apellido"];
    $inputUsername = $_POST["usuario"];
    $maxDate = strtotime(date("Y-m-d"));
    $minDate = strtotime("1905-01-01");
    $inputDate = strtotime($_POST["fecha"]);
    $inputPassword1 = $_POST["pass"];  
    $inputPassword2 = $_POST["pass2"];    
    $inputEmail = $_POST['email'];
	if($inputName == null || strlen($inputName) == 0 || strlen($inputName) > 30 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputName)){
        echo("Revise que el nombre introducido no contenga caracteres especiales");
        return false;
    }
    if($inputLastName == null || strlen($inputLastName) == 0 || strlen($inputLastName) > 30 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputLastName)){
        echo("Revise el Apellido introducido no contenga caracteres especiales");
        return false;
    }
    if($inputUsername == null || strlen($inputUsername) < 5 || strlen($inputUsername) > 10 || !preg_match("/^[0-9a-zA-Z]+$/",$inputUsername)){
        echo("Revise el usuario introducido, no se aceptan simbolos y debe de ser de tamaño entre 5 y 10");
        return false;
    }
    
    if($inputEmail == null || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$inputEmail)){
        echo("Verifique que el correo introducido cumpla con: nombre@host.dominio");
        return false;
    }
    
    if($inputDate == null || $inputDate>$maxDate || $inputDate<$minDate){
        echo("La fecha de nacimiento no puede ser mayor a la de hoy ni menor a la del 1 de enero de 1905");
        return false;
    }

    if($inputPassword1 == null || !preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_\.]).{8,20})/",$inputPassword1)){
        echo("La contraseña debe de ser de minimo 8 caracteres, contener al menos una letra minuscula, una mayuscula, un numero y un caracter especial '.' y '-' y '_'");
        return false;
    }
    
    if($inputPassword2!=$inputPassword1){
        echo("La confirmación de contraseña es incorrecta, vuelva a intentar");
        return false;
    }
	return true;
}