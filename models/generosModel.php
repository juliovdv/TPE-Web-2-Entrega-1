<?php
class generosModel 
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost' . ';dbname=db_resenias;charset=utf8', 'root', '');
    }
    public function traerGeneros()
    {
        $sentencia = $this->db->prepare("SELECT * FROM genero");
        $sentencia->execute(array());
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }
    public function guardarGenero($genero){
        $sentencia = $this->db->prepare('INSERT INTO genero (nombre) VALUES (?)');
        return $sentencia->execute([$genero]);
    }
}

?>