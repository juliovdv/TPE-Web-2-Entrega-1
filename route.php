<?php

require_once ('taskFunctions.php');
require_once ('controllers/TaskController.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if ($_GET['action'] == '')
    $_GET['action'] = 'tasks';


//$_GET['action'] = 'parametro1/parametro2'
$urlParts = explode('/', $_GET['action']);
//$urlParts = ['parametro1', 'parametro2']

switch ($urlParts[0]) {
    case 'tasks':
        $controller = new TaskController();
        $controller->showTasks();
        break;
    case 'task':
        echo showTaskDetail($urlParts[1]);
        break;
    case 'new':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'delete':
        deleteTask($urlParts[1]);
        break;
    case 'completed':
        endTask($urlParts[1]);
        break;
    default:
        echo "<h1>Error 404 - Page not found </h1>";
        break;
}