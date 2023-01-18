<?php
try {
    require_once("todo.controller.php");
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $path = explode( '/', $uri);
    $requestType = $_SERVER['REQUEST_METHOD'];
    $body = file_get_contents('php://input');
    $pathCount = count($path);

    $controller = new TodoController();
}

    switch($requestType) {
        case 'GET':
            if (isset($path[3]) && strlen($path[3])) {
                $id = $path[3];
            if ($path[$pathCount - 2] == 'todo' && isset($path[$pathCount - 1]) && strlen($path[$pathCount - 1])) {
                $id = $path[$pathCount - 1];
                $todo = $controller->load($id);
                if ($todo) {
                    http_response_code(200);
                    die(json_encode($todo));
                }
                http_response_code(404);
                die();
            } else {
                http_response_code(200);
                die(json_encode($controller->loadAll()));
            }
            break;
        case 'POST':
            //implement your code here
            $todo_title = $_POST['title'];
            
            $todo_data = file_get_contents('todos.json');            
            $todos = json_decode($todo_data, true);
            
            $todos[] = array('title' => $todo_title, 'isCompleted' => false);
            
            $todo_data = json_encode($todos);
            
            file_put_contents('todos.json', $todo_data);
            
            echo $todo_data;
            break;
        case 'PUT':
            //implement your code here

            //Creating new TODO

            app.post('/todos', (req, res)) => {
            let todoTitle = req.body.title;
                let newTodo = {
              
                  title: todoTitle,              
                  isCompleted: false              
                };
                todos.push(newTodo);
                res.json(todos);

        // Updating TODO
         app.put('/todos/:index', (req, res) => {
                let index = req.params.index;
                let todo = todos[index];
                let todoTitle = req.body.title;
                todo.title = todoTitle;  
                 res.json(todo);
  
  });
              
              };
            break;
        case 'DELETE':
            //implement your code here

            //Deleting a TODO

            app.delete('/todos/:index', (req, res) => {
                let index = req.params.index;
                todos.splice(index, 1);
                res.json(todos);              
              });
            break;
        default:
            http_response_code(501);
            die();
            break;
    }
} catch(Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500);
    die();
}
