<?php
	include("BaseDeDatos.php");
	session_start();
	if(isset($_POST['var'])){
		$ObjBD= new BaseDeDatos();
		$transacciones = new PDO('mysql:host=localhost; dbname=proyecto',"proyecto","proyecto", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
		if(verificar()){
			try{
					$IDUSUARIO=$ObjBD->usrID($_SESSION['user']);
					$transacciones->begintransaction();
					$sql=$transacciones->prepare("CALL `nuevoBoleto`(?,?,?)");
					$sql->bindParam(1, $_POST['asientos']);
					$sql->bindParam(2, $IDUSUARIO[0]['ID']);
					$sql->bindParam(3, $_POST['var']);
					$sql->execute();
					$_SESSION['tran']=$transacciones;
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
