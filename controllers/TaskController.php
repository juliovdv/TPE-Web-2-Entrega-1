<?php

include_once('models/TaskModel.php');
include_once('views/TaskView.php');

class TaskController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showTasks() {
        $tasks = $this->model->getAll();
        $this->view->showTasks($tasks);
    }

    /**
     * Agrega una nueva tarea a la lista.
     */
    public function addTask() {
        $title = $_POST['title'];
        $priority = $_POST['priority'];
        $description = $_POST['description'];

        if (empty($titulo) || empty($prioridad)) {
            $this->view->showError("Faltan datos obligatorios");
            die();
        }

        $success = $this->model->save($title, $priority, $description);

        if($success)
            header('Location: ' . BASE_URL . "tasks");
        else
            $this->view->showError("Faltan datos obligatorios");
    }
}