<?php
	include("BaseDeDatos.php");
	session_start();
	if(isset($_POST['var'])){
		$ObjBD= new BaseDeDatos();
		if(verificar()){
			try{
					$IDUSUARIO=$ObjBD->usrID($_SESSION['user']);
                    $ObjBD->startTransaction();
					$ObjBD->nuevoBoleto($_POST['asientos'], $IDUSUARIO[0]['ID'], $_POST['var']);
                    $ObjBD->refuseTransaction();
                    header('Location: ../pago.php');
				}   
			catch(PDOException $e)
			{
			echo "Error: " . $e->getMessage();
			}
		}
	}


function verificar(){
    $inputID = $_POST["var"];
    $inputZona = $_POST["zonas"];
    $inputAsiento = $_POST["asientos"];    
    if($inputID == null || !preg_match("/^[0-9]*[0-9]+[0-9]$|^[1-9]$/", $inputID)){
        echo "Revise los datos introducido";
        return false;
    }
    
    if($inputZona == null || !preg_match("/^[1-4]$/", $inputZona)){
        echo "Verifique los datos introducidos";
        return false;
    }
    if($inputAsiento == null || !preg_match("/^[1-7][0-9]$|^[1-9]$|^80$/", $inputAsiento)){
        echo "Verifique los datos introducidos";
        return false;
    }
    return true;
}
