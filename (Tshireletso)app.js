function putTodo(todo) {
    // implement your code here

    let todos = [];
    let todosList = document.querySelector('#todo-list');
    let todosForm = document.querySelector('#todo-form');
    let todosTitleInput = document.querySelector('input[name="title"]');
   


    console.log("calling putTodo");
    console.log(todo);
}
function postTodo(todo) {
    // implement your code here

    let todosDeleteButton = document.querySelector('#todo-delete');
    let todosEditButton = document.querySelector('#todo-edit');
    let todosSaveButton = document.querySelector('#todo-save');
    todosForm.addEventListener('submit', handleSubmit);
    function handleSubmit(e) {
        e.preventDefault();      
        let todoTitle = todosTitleInput.value;    
        let newTodo = {      
          title: todoTitle,      
          isCompleted: false      
        };
        todos.push(newTodo);
        todosForm.reset();

    }
    console.log("calling postTodo");
    console.log(todo);
}
function deleteTodo(todo) {
    // implement your code here

    //implemented these 3 lines
    let index = todo.target.dataset.index;
    todos.splice(index, 1);
    updateTodosList();

    
   console.log("calling deleteTodo");
   console.log(todo);
}

// example using the FETCH API to do a GET request
function getTodos() {
    fetch('/api/todo')
    fetch(window.location.href + 'api/todo')
    .then(response => response.json())
    .then(json => drawTodos(json))
    .catch(error => showToastMessage('Failed to retrieve todos...'));
}
getTodos();
