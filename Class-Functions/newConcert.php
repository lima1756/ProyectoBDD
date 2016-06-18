<?
    include("BaseDeDatos.php")
    if(isset($_POST['title'])){
        $ObjBD= new BaseDeDatos();
        if(validacion()){
            try{
                $existeUsuario=$ObjBD->verificarTitulo($_POST['title']);
                if($existeUsuario[0]['exist']=='1'){
                    echo "Ya existe el titulo introducido, porfavor introduzca uno nuevo<br>";
                }
                else{
                        $ObjBD->registro($_POST['nombre'],$_POST['fecha'],$_POST['pass'],$_POST['usuario'],$_POST['email'],$_POST['apellido']);
                        header('Location: ../iniciark.php');
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
    $inputImg = $_POST["imagen"];
    $minDate = strtotime(date("Y-m-d"));
    $maxDate = strtotime("2020-01-01");
    $inputStart = strtotime($_POST["inicio"]);
    $inputEnd = strtotime($_POST["fin"]);
    if($inputTitle == null || strlen($inputTitle) == 0 || strlen($inputTitle) > 20 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]+$/",inputTitle)){
        alert("Revise que el titulo introducido no contenga caracteres especiales");
        return false;
    }
    if($inputArtista == null || strlen($inputArtista) == 0 || strlen($inputArtista) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",(inputArtista)){
        alert("Revise el artista introducido, no se aceptan simbolos, debe ser menor a 20 caracteres");
        return false;
    }
    if($inputGenero == null || strlen($inputGenero) == 0 || strlen($inputGenero) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",inputGenero)){
        alert("Revise el genero introducido, no se aceptan simbolos, debe ser menor a 20 caracteres.");
        return false;
    }
    if($inputStart == null || $inputStart>$maxDate || inputStart<minDate){
        alert("La fecha de nacimiento no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020");
        return false;
    }
    if($inputEnd == null || $inputEnd>$maxDate || inputEnd<minDate){
        alert("La fecha de nacimiento no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020");
        return false;
    }
    return true;
}