<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"zonas"=>"zona",
"asientos"=>"asiento"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"]; $concierto=$_GET['concierto'];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	include 'BaseDeDatos.php';
	$ObjBD = new BaseDeDatos();
    $consulta=$ObjBD->asientosDisponibles($concierto, $opcionSeleccionada);
	// Comienzo a imprimir el select
	echo "<select name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id)'>";
	echo "<option value='-1'>Elige un asiento</option>";
	foreach ($consulta as $key) {
        echo "<option value='".$key['id_Asiento']."'>".$key['Fila'].$key['Numero']."</option>";
    }
	echo "</select>"; 
}
?>