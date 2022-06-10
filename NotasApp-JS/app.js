//ejercicio JS

document.getElementById('formTask').addEventListener('submit', saveTask);

function saveTask(e) {

    let tipo = document.getElementById('idtipo').value;
    let title = document.getElementById('title').value;
    let cajaTarea = document.getElementById('cajaTarea').value;

    console.log(tipo, title, cajaTarea);
 
    const task = {
        tipo,
        title,
        cajaTarea
    };

    if (localStorage.getItem('tasks') === null) {
        let tasks = [];
        //conexion BD
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    } else {
        let tasks = JSON.parse(localStorage.getItem('tasks'));
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    getTask();
    document.getElementById('formTask').reset();
    e.preventDefault();
}

function getTask() {
    console.log("ingresando al metodo getTask()");
    let tasks = JSON.parse(localStorage.getItem('tasks'));
    let tasksView = document.getElementById('tasks');

    tasksView.innerHTML = ``;

    for (let i = 0; i < tasks.length; i++) {
        let tipo = tasks[i].tipo;
        let title = tasks[i].title;
        let cajaTarea = tasks[i].cajaTarea;

        tasksView.innerHTML += `<div class="recuadro">
            <p>${tipo} - ${title} - ${cajaTarea}</p>
            <a href="#" onclick="deleteTask('${title}')">
            Borrar 
            </a>
            <a href="#" onclick="updateTask('${title}')">
            Actualizar 
            </a>
            </div>`;
    }
}

function deleteTask(title) {
    console.log("Ingresando a metodo deleteTask() " + title);
    let tasks = JSON.parse(localStorage.getItem('tasks'));
    for (let i = 0; i < tasks.length; i++) {
        if (tasks[i].title == title) {
            tasks.splice(i, 1);
        }
    }
    localStorage.setItem('tasks', JSON.stringify(tasks));
    getTask();
}

function updateTask(title) {
    console.log("Ingresando a updateTask() " + title);
    let tasks = JSON.parse(localStorage.getItem('tasks'));

    for (let i = 0; i < tasks.length; i++) {
        if (tasks[i].title == title) {
            let posicion = i;
            console.log("Elemnto encontrado en la posicion " + i);
            document.getElementById('title').value = title;
            document.getElementById('cajaTarea').value = tasks[i].cajaTarea;
            document.getElementById('idtipo').value = tasks[i].tipo;
            alert('Puede editar la informacion');
            tasks[i].title = document.getElementById('title').value;
            tasks[i].cajaTarea = document.getElementById('cajaTarea').value;
            tasks[i].tipo = document.getElementById('idtipo').value;
            tasks.splice(i, 1, tasks[i]);
            localStorage.setItem('tasks', JSON.stringify(tasks));
            getTask();
        }
    }
}