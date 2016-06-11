<?php
header("Content-Type: text/html;charset=utf-8");
class BaseDeDatos {
    private $con;
    //$this->con;
    public function __construct()
    {
        //CADENA DE CONEXION PDO(localhost,nombre de la bd, usuario, contraseña)
        $this->con = new PDO('mysql:host=localhost; dbname=proyecto',"proyecto","proyecto", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
    }
    public function muestraTodo()
    {
        $r=$this->con->query("SELECT * FROM datosalumnos");
        return $r->fetchAll(PDO::FETCH_ASSOC);
    }
    public function registro($Nombre,$Edad,$Pass,$Usuario,$email,$Apellido)
    {
        $sql=$this->con->prepare("CALL `registroUser`(?,?,?,?,?,?)");
        $sql->bindParam(1, $Nombre);
        $sql->bindParam(2, $Apellido);
        $sql->bindParam(3, $Pass);
        $sql->bindParam(4, $Usuario);
        $sql->bindParam(5, $Edad);
		$sql->bindParam(6, $email);
        $sql->execute();
    }
    public function
}