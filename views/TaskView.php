<?php


class TaskView {

    /**
     * @return string
     * Contruye el html para visualizar el encabezado
     */
    private function head_code() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' .BASE_URL. '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
            <title>Task List</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">Task List</a>            
        </nav>';
    
        return $html;
    }

    /**
     * @return string
     * Contruye el html para visualizar las tareas guardadas en la bd
     */
    function showTasks($tasks) {
        echo $this->head_code();

        $html = '<div class="container">
                    <h1>Task List</h1>
                        <form action="new" method="POST">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Priority</label>
                                <select name="priority" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control" rows="3"></textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>';
                    
        $html .= '<ul class="list-group list-padd">';

        foreach ($tasks as $task) {
            $idTask = $task->id;
            $html .= '<li class="list-group-item"> ';
            $html .= '<b>' . $task->title . "</b> - ";    
            $html .= $task->description;
            $html .= ' <a class="btn btn-info" href="task/'.$idTask.'">Ver</a>';
            $html .= ' <a class="btn btn-danger" href="delete/' . $idTask . '"> Delete </a>';
            if ($task->completed != '1') {
                $html .= ' <a class="btn btn-warning" href="completed/' . $idTask . '"> Completed </a>';
            }
            $html .= '</li>';
        }

        $html .= '</ul>
                </div>
            </body>
        </html>';

        echo $html;
    }

    /**
    * Muestra errores por pantalla
    */
    public function showError($msg) {
        echo $this->head_code();

        echo "<div class='text-center'>
                <h2>Error</h2>
                <h5>$msg</h5>
                <img src='imgs/icon_task.png'>
              </div>";

        echo '<div class="text-center"><a class="" href="'.BASE_URL . 'tasks">Back</a></div>';

        echo '  
                </div>          
            </body>
        </html>
        ';
    }

}