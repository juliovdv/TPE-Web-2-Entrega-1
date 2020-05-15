<?php
class reseniasModel
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost' . ';dbname=db_resenias;charset=utf8', 'root', '');
    }

    public function traerResenias()
    {
        $sentencia = $this->db->prepare("SELECT * FROM resenia");
        $sentencia->execute(array());
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }
    public function traerResenia($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM resenia WHERE id_resenia = ?");
        $sentencia->execute(array(($id)));   
        $detalle = $sentencia->fetch(PDO::FETCH_OBJ);
        return $detalle;
    }
    public function guardarResenia($nombrepelicula, $usuario, $resenia, $genero){
        $sentencia = $this->db->prepare('INSERT INTO resenia (nombre_pelicula, usuario, resenia, id_genero) VALUES (?, ?, ?, ?)');
        return $sentencia->execute([$nombrepelicula ,$usuario , $resenia, $genero]);
    }
    public function eliminarReseniaDB($id){
        $sentencia = $this->db->prepare('DELETE FROM resenia WHERE id_resenia = ?');
        $sentencia->execute([$id]);
    }
}
