<?php
class reseniasModel
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
    //** Trae todas las tuplas de la tabla reseña */
    public function traerResenias()
    {
        $sentencia = $this->db->prepare("SELECT * FROM resenia");
        $sentencia->execute(array());
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }

    //**Hace un JOIN entre la tabla resenia y genero y los devuelve ordenados por la columna nombre de la tabla genero */
    public function traerReseniasporGeneros()
    {
        $sentencia = $this->db->prepare("SELECT * FROM resenia JOIN genero ON resenia.id_genero = genero.id_genero ORDER BY genero.nombre");
        $sentencia->execute(array());
        $detalletabla = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalletabla;
    }
    //**Trae una tupla de la tabla resenia por id */
    public function traerResenia($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM resenia WHERE id_resenia = ?");
        $sentencia->execute(array(($id)));   
        $detalle = $sentencia->fetch(PDO::FETCH_OBJ);
        return $detalle;
    }

    //**Inserta una nueva reseña en la tabla resenia*/
    public function guardarResenia($nombrepelicula, $usuario, $resenia, $genero, $imagen = null){
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);
            print_r($pathImg);
        $sentencia = $this->db->prepare('INSERT INTO resenia (nombre_pelicula, usuario, resenia, id_genero, img) VALUES (?, ?, ?, ?, ?)');
        return $sentencia->execute([$nombrepelicula ,$usuario , $resenia, $genero, $pathImg]);
    }
    //**Elimina una tupla por id de la tabla resenia */
    public function eliminarReseniaDB($id){
        $sentencia = $this->db->prepare('DELETE FROM resenia WHERE id_resenia = ?');
        $sentencia->execute([$id]);

    }
    //**Edita una tupla de la tabla resenia por id */
    public function editarReseniaDB($id, $nombrepelicula, $usuario, $resenia, $genero){
        $sentencia = $this->db->prepare('UPDATE resenia SET nombre_pelicula = ?, usuario = ?, resenia = ?, id_genero = ? WHERE id_resenia = ?');
        $sentencia->execute([$nombrepelicula, $usuario, $resenia, $genero, $id]);
    }

    //**Trae las tuplas de la tabla resenia que se correspondan con el id_genero */
    public function filtrarReseniasxGeneros($id_genero){
        $sentencia = $this->db->prepare("SELECT * FROM resenia WHERE id_genero = ?");
        $sentencia->execute(array(($id_genero)));   
        return $sentencia->fetchall(PDO::FETCH_OBJ);
    }
    private function uploadImage($imagen) {
        $target = 'uploads/caratulas/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }
}
