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
   
    /*public function muestraTodo()
    {
     
    }*/
    
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
   
    public function verificarUsuario($Usuario) {
        $sql=$this->con->query("CALL revisarUsuario('$Usuario')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function verificarCorreo($Correo) {
        $sql=$this->con->query("CALL revisarCorreo('$Correo')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function verificarLogIn($Usuario, $Pass) {  
        $sql=$this->con->query("CALL login('$Usuario', '$Pass')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function sessionData($Usuario) {
        $sql=$this->con->query("CALL userData('$Usuario')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pictures() {
        $sql=$this->con->query("CALL getImages()");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
        public function agenda() {
        $sql=$this->con->query("CALL ObtenerAgenda()");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
            
    public function eventos() {
        $sql=$this->con->query("CALL concierto()");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarTitulo($Titulo) {
        $sql=$this->con->query("CALL revisarTitle('$Titulo')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function Concierto($name, $desc, $art, $gen, $img, $ini, $fin) {
        $sql=$this->con->prepare("CALL `agregarConcierto`(?,?,?,?,?,?,?)");
        $sql->bindParam(1, $name);
        $sql->bindParam(2, $desc);
        $sql->bindParam(3, $art);
        $sql->bindParam(4, $gen);
        $sql->bindParam(5, $img);
		$sql->bindParam(6, $ini);
        $sql->bindParam(7, $fin);
        $sql->execute();
    }

    public function datosConcierto($id){
        $sql=$this->con->query("CALL datosConcierto('$id')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function  asientosDisponibles($id, $zona){
        $sql=$this->con->query("CALL asientosDisponibles($id,$zona)");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function zonas(){
        $sql=$this->con->query("SELECT id_Zona FROM `zona`");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function nuevoBoleto($as,$per,$conc){
        $sql=$this->con->prepare("CALL `nuevoBoleto`(?,?,?)");
        $sql->bindParam(1, $as);
        $sql->bindParam(2, $per);
        $sql->bindParam(3, $conc);
        $sql->execute();
        
    }

    public function usrID($username){
        $sql=$this->con->query("CALL `userID`('$username')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function newTC($TC, $bc, $clav, $ven){
        $sql=$this->con->prepare("CALL `pagoRealizado`(?,?,?, ?)");
        $sql->bindParam(1, $TC);
        $sql->bindParam(2, $bc);
        $sql->bindParam(3, $clav);
        $sql->bindParam(4, $ven);
        $sql->execute();
         
    }

    public function precio($zona){
        $sql=$this->con->query("SELECT Precio FROM zona WHERE id_Zona=$zona");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tickets($usr){
        $sql=$this->con->query("CALL `verBoletos`('$usr')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function noMore($usr, $con)
    {
        $sql=$this->con->query("CALL `cuantosBoletos`('$usr', $con)");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function startTransaction(){
        $this->con->query("BEGIN;");
    }
    public function acceptTransaction(){
        $this->con->query("COMMIT;");
    }
    public function refuseTransaction(){
        $this->con->query("ROLLBACK;");
    }
    public function delticket($val){
        $this->con->query("CALL `delTicket`($val)");
    }
}