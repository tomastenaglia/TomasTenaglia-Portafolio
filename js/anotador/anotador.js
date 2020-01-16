//listaTareas me guarda el div que contiene el id lista-tareas
const listaTareas = document.getElementById('lista-tareas');

//eventos
eventListeners();
function eventListeners() {
     //cuando se envia el formulario, actua la funcion agregarTarea, onsubmit de formTarea
     document.querySelector('#formTarea').addEventListener('submit', agregarTarea);

     //Cargar las tareas guardadas en el localStorage
     document.addEventListener('DOMContentLoaded', localStorageListo);

     // Borrar Tweets
     listaTareas.addEventListener('click', borrarTarea);
}


//funciones agregar tarea
function agregarTarea(e){
  e.preventDefault();

  //boton borrar
  const btnBorrar = document.createElement('a');
  btnBorrar.className = 'borrar-tarea';
  btnBorrar.innerText = 'X';
  btnBorrar.style.margin = "0px 0px 0px 10px";
  btnBorrar.style.color = 'red';

  //tweet guardarlo valor del input la tarea
  const tarea = document.getElementById('tarea').value;
  //creo un elemento li para agregarlo al div luego
  const li = document.createElement('li');
  //le doy valor a la lista
  li.innerText = tarea;
  //agrego la lista al div.
  listaTareas.appendChild(li);
  //agregar btnBorrar a la lista
  li.appendChild(btnBorrar);
  //agrego el tweet a localstorage
  agregarTareaLocalStorage(tarea);
}


// Elimina el Tweet del DOM
function borrarTarea(e) {
     e.preventDefault();
     // si se presiona dentro de la clase borrar-tarea
     if(e.target.className === 'borrar-tarea') {
          //eliminamos tarea del dom
          e.target.parentElement.remove();
          // vamos a la funcion borrartarealocalstorage con la tarea presionada.
          borrarTareaLocalStorage(e.target.parentElement.innerText);
     }
}

//agregar tarea al localstorage
function agregarTareaLocalStorage(tarea) {
  //defino una variable tipo let tareas para guardar un array de tareas
  let tareas;
  tareas = obtenerTareasLocalStorage();
  // en el array de tareas, ingreso un nuevo elemento al array llamado tarea
  tareas.push(tarea);
  // Convertir de string a arreglo para local storage
  localStorage.setItem('tareas', JSON.stringify(tareas) );
  alert('La tarea fue agregada correctamente');
  document.getElementById('tarea').value = '';
}

// Comprobar que haya elementos en localstorage, retorna un arreglo
function obtenerTareasLocalStorage() {
     let tareas;
     // Revisamos los valores de local storage
     if(localStorage.getItem('tareas') === null) {
          // sino hay tareas creo un array vacio
          tareas = [];
     } else {
          //si hay tareas, creo un array con los elementos del localstorage
          tareas  = JSON.parse(localStorage.getItem('tareas') );
     }
     return tareas;
}

function localStorageListo(){
  let tareas;
  tareas = obtenerTareasLocalStorage();
  tareas.forEach(function(tarea){
    //boton borrar
    const btnBorrar = document.createElement('a');
    btnBorrar.className = 'borrar-tarea';
    btnBorrar.innerText = 'X';
    btnBorrar.style.margin = "0px 0px 0px 10px";
    btnBorrar.style.color = 'red';
    //lista
    const li = document.createElement('li');
    //le doy valor a la lista
    li.innerText = tarea;
    //agrego la lista al div.
    listaTareas.appendChild(li);
    //agregar btnBorrar a la lista
    li.appendChild(btnBorrar);
  })
}


function borrarTareaLocalStorage(tarea){
  let tareas, borrarTarea;
  //sacar la X de la tarea
  borrarTarea = tarea.substring(0, tarea.length - 1);
  //guardartodas las tareas en el arreglo tareas
  tareas = obtenerTareasLocalStorage();
  tareas.forEach(function(tarea, index){
    if(borrarTarea === tarea){
      //eliminar de localstorage cuando borrarTarea y tarea sean iguales eliminar ese indice y eliminar 1 solo
      tareas.splice(index, 1);
    }
  });
  localStorage.setItem('tareas', JSON.stringify(tareas));
  alert('Tarea eliminada correctamente');
}
