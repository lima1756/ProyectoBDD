<?php
	include("BaseDeDatos.php");
	if(isset($_POST['Tarjeta'])){
		$ObjBD= new BaseDeDatos();
        $ObjBD->startTransaction();
		if(verificar()){
			try{
					$ObjBD->newTC($_POST['banco'], $_POST["Tarjeta"], $_POST["CSV"], $_POST["Vencimiento"]);
                    $ObjBD->acceptTransaction();
                    header('Location: ../index.php');
				}   
			catch(PDOException $e)
			{
			echo "Error: " . $e->getMessage();
            $ObjBD->refuseTransaction();
			}
		}
        else{
            $ObjBD->refuseTransaction();
        }
	}


function verificar(){
    $inputBanc = $_POST["banco"];
    $inputTC = $_POST["Tarjeta"];
    $inputCSV = $_POST["CSV"];
    $inputVen = strotime($_POST["Vencimiento"]);    
    $minDate = strtotime(date("Y-m-d"));
    if($inputBanc == null || !preg_match("/^[a-zA-Z]*[a-zA-Z]+[a-zA-Z]$/", $inputBanc)){
        echo "Revise que el banco introducido sea correcto";
        return false;
    }
    
    if($inputTC == null || !preg_match("/^[1-9][0-9]{14}[0-9]$/", $inputTC)){
        echo "Verifique los datos de la tarjeta";
        return false;
    }
    if($inputCSV == null || !preg_match("/^[0-9][0-9]{1}[0-9]$/", $inputCSV)){
        echo "Verifique los datos de la tarjeta";
        return false;
    }

    if($inputVen == null || $inputVen < $minDate){
        echo "Verifique los datos de la tarjeta";
        return false;
    }
    return true;
}
