<?php

require_once('model.php');

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
    /**
     * Recibe id y devuelve la tupla con ese "id"
     */
    public function traerComentarioporID($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_comentario = ?");
        $sentencia->execute([$id]);
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }

    /**
     * Recibe id, ordenpor y orden y devuelve las tupas que correspondan a ese "id" de resenia ordenadas por "ordenpor" y en forma de "orden"
     */
    public function traerComentariosporResenia($id, $ordenpor, $orden){
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_resenia = ? ORDER BY $ordenpor $orden");
        $sentencia->execute([$id]);   
        $detalle = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }
    /**
     * Recibe id, comentario, usuario y puntuacion y crea una nueva tupla con esos valores
     */
    public function guardarComentario($id, $comentario, $usuario, $puntuacion){
        $sentencia = $this->db->prepare('INSERT INTO comentario (id_resenia, comentario, usuario, puntuacion) VALUES (?, ?, ?, ?)');
        return $sentencia->execute([$id, $comentario, $usuario, $puntuacion]);
    }

    /**
     * Recibe id y elimina la tupla correspondiente a ese "id"
     */
    public function eliminarComentarioDB($id){
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario = ?');
        return $sentencia->execute([$id]);
        
    }
}
