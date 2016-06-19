<?php
    include("BaseDeDatos.php");
    if(isset($_POST['title'])){
        $ObjBD= new BaseDeDatos();
        if(validacion()){
            var_dump($_FILES);
            try{
                $existe=$ObjBD->verificarTitulo($_POST['title']);
                if($existe[0]['exist']=='1')
                    echo "Ya existe el titulo introducido, porfavor introduzca uno nuevo<br>";
                else{
                    $target_path = "../Images/";
                    $target_path = $target_path . basename( $_FILES['imagen']['name']); 
                    $ObjBD->Concierto($_POST['title'],$_POST['Descripcion'],$_POST['artista'],$_POST['genero'], $_FILES["imagen"]['name'], $_POST['inicio'],$_POST['fin']);
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) { 
                        echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";
                        header('Location: ../index.php');
                    } else{
                        echo "Ha ocurrido un error, trate de nuevo!";
                    } 
                }
            }
            catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
	    }
    }

function validacion() {
    $inputTitle = $_POST["title"];
    $inputDescription = $_POST["Descripcion"];
    $inputArtista = $_POST["artista"];  
    $inputGenero = $_POST["genero"];
    $inputImg = $_FILES["imagen"]['name'];
    $minDate = strtotime(date("Y-m-d"));
    $maxDate = strtotime("2020-01-01");
    $inputStart = strtotime($_POST["inicio"]);
    $inputEnd = strtotime($_POST["fin"]);
    if($inputTitle == null || strlen($inputTitle) == 0 || strlen($inputTitle) > 20 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]+$/",$inputTitle)){
        echo "Revise que el titulo introducido no contenga caracteres especiales";
        return false;
    }
    if($inputArtista == null || strlen($inputArtista) == 0 || strlen($inputArtista) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",$inputArtista)){
        echo "Revise el artista introducido, no se aceptan simbolos, debe ser menor a 20 caracteres";
        return false;
    }
    if($inputGenero == null || strlen($inputGenero) == 0 || strlen($inputGenero) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",$inputGenero)){
        echo "Revise el genero introducido, no se aceptan simbolos, debe ser menor a 20 caracteres.";
        return false;
    }
    if($inputImg == null || strlen($inputImg) > 20 || !preg_match("/\.jpg$|\.png$$/",$inputImg)){
        echo "La imagen debe de tener una extensión png y no tener una longitud mayor a 20 caracteres (con todo y extensión)";
        return false;
    }
    if($inputStart == null || $inputStart>$maxDate || $inputEnd<$minDate){
        echo "La fecha de inicio no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020";
        return false;
    }
    if($inputEnd == null || $inputStart>$maxDate || $inputEnd<$minDate){
        echo "La fecha de fin no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020";
        return false;
    }
    return true;
}

?>