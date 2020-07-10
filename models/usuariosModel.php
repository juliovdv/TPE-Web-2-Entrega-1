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
    //**Trae la tupla que se corresponda con el usuario pasado por parametro */
    public function traerUsuario($usuario){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE mail = ?");
        $sentencia->execute(array(($usuario)));   
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    public function traerUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute(array());
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }
    /**
     * Recibe id y devuelve la tupla que corresponda al usuario
     */
    public function traerUsuarioId($id){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $sentencia->execute(array(($id)));   
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Recibe usuario, clave y admin y crea una nueva tupla con los valores correspondientes
     */
    public function guardarUsuario($usuario, $clave, $admin){
        $sentencia = $this->db->prepare('INSERT INTO usuario (mail, clave, admin) VALUES (?, ?, ?)');
        return $sentencia->execute([$usuario, $clave, $admin]);
    }
    /**
     * Recibe id y admin, y cambia el valor en la tabla
     */
    public function hacerAdminDB($id, $admin){
        $sentencia = $this->db->prepare('UPDATE usuario SET admin = ? WHERE id_usuario = ?');
        $sentencia->execute([$admin, $id]);
    }
    public function actualizarClave($id, $clave){
        $sentencia = $this->db->prepare('UPDATE usuario SET clave = ? WHERE id_usuario = ?');
        $sentencia->execute([$clave, $id]);
    }
    /**
    *Recibe id, y borra al usuario con el id correspondiente 
    */
    public function borrarUsuarioDB($id){
    $sentencia = $this->db->prepare('DELETE FROM usuario WHERE id_usuario = ?');
        return $sentencia->execute([$id]);
    }
}
?>
