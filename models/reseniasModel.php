<?php
class reseniasModel
{

    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost' . ';dbname=db_resenias;charset=utf8', 'root', '');
    }

    public function traerTabla($tabla)
    {
        $sentencia = $this->db->prepare("SELECT * FROM $tabla");
        $sentencia->execute(array());
        $resenias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $resenias;
    }
    public function  traerResenia($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM pelicula WHERE id_pelicula = ?");
        $sentencia->execute(array(($id)));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
