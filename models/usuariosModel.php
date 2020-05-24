<?php
class usuariosModel 
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost' . ';dbname=db_resenias;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_resenias';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function traerUsuario($usuario){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE mail = ?");
        $sentencia->execute(array(($usuario)));   
        return $sentencia->fetch(PDO::FETCH_OBJ);
       

    }
}
?>
