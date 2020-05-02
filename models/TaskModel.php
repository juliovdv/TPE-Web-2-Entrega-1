<?php


class TaskModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_todo_list;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_todo_list';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            
            // Solo en modo desarrollo
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    /**
     * @return array
     * Retorna todas las tareas guardadas en la tabla task
     */
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM task ORDER BY priority ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function save($title, $priority, $description) {
        $query = $this->db->prepare('INSERT INTO task (title, priority, description, completed) VALUES (?, ?, ?, 0)');
        return $query->execute([$title, $priority, $description]);
    }

}