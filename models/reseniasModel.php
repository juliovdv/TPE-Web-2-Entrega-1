<?php
class reseniasModel
{

    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost' . ';dbname=db_resenias;charset=utf8', 'root', '');
    }

    public function buscarResenias()
    {
        $sentencia = $this->db->prepare("SELECT * FROM pelicula");
        $sentencia->execute();
        $resenias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $resenias;
    }
}
