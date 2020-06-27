<?php
class comentariosModel 
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
    public function traerComentarioporID($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_comentario = ?");
        $sentencia->execute([$id]);
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }

    public function traerComentariosporResenia($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_resenia = ?");
        $sentencia->execute(array(($id)));   
        $detalle = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }

    public function guardarComentario($id, $comentario){
        $sentencia = $this->db->prepare('INSERT INTO comentario (id_resenia, comentario) VALUES (?, ?)');
        return $sentencia->execute([$id, $comentario]);
    }
    public function eliminarComentarioDB($id){
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario = ?');
        return $sentencia->execute([$id]);
        
    }
}
?>