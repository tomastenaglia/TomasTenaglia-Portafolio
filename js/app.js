class Gasto{
    constructor(nombre, cantidad){
        this.nombre = nombre;
        this.cantidad = cantidad;
    }
    recalcularRestante(){
        const restanteTotal = document.querySelector('#restante');
        const restante = restanteTotal.textContent;
        restanteTotal.innerHTML = restante - this.cantidad;
    }
}

class Interfaz{
    //mostrar tabla de gastos.
    mostrarListado(gasto){
        //crear lista
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between aligns-items-center';
        li.innerHTML = `${gasto.nombre} <span class="badge badge-primary badge-pill"> $${gasto.cantidad}</span>`;
        const gastos = document.querySelector('#gastos ul');
        gastos.appendChild(li);
    }
    mostrarAlerta(){
        const restante = document.getElementById('restante').textContent;
        const total = document.getElementById('total').textContent;
        const clase = document.getElementById('restante').parentElement.parentElement;
        if(restante < total*0.25){
            clase.classList.add("alert-danger");
        } else if(restante< total*0.50){
            clase.classList.add("alert-warning");
        }
    }
    mostrarMensaje(mensaje,tipo){
        const div = document.createElement('div');
        if (tipo === 'error'){
            div.classList.add('mensaje','error');
        } else {
            div.classList.add('mensaje','correcto');
        }
        div.innerHTML = `${mensaje}`;
        //before, 1 elemento deseas insertar, 2do parametro antes de que elemento lo quieres insertar
        btnAgregarGasto.insertBefore(div,document.querySelector('.form-group'));
        setTimeout(function(){
            document.querySelector('.mensaje').remove();
        },1500);
    }
}
//variables
const btnAgregarGasto = document.getElementById('agregar-gasto');
//event listener
eventListeners();

function eventListeners(){
    // al cargar la pagina pedir el presupuesto
    document.addEventListener('DOMContentLoaded', pedirPresupuesto);

    btnAgregarGasto.addEventListener('submit',function(e){
        e.preventDefault();
        const gastoInput = document.getElementById('gasto');
        const cantidadInput = document.getElementById('cantidad');
        const interfaz = new Interfaz();
        if ((gastoInput.value).length > 0 && (cantidadInput.value).length > 0){
            const gasto = new Gasto(gastoInput.value, cantidadInput.value);
             interfaz.mostrarListado(gasto);
             gastoInput.value = '';
             cantidadInput.value = '';
             gasto.recalcularRestante();
             interfaz.mostrarMensaje('Gasto añadido correctamente','correcto');
        } else {
            interfaz.mostrarMensaje('ERROR! chequea el formulario','error');
        }
        interfaz.mostrarAlerta();
    });
}

function pedirPresupuesto(){
    const dinero = prompt("Cual es tu presupuesto semanal?",0);
    const totalPresupuesto = document.querySelector('#total');
    totalPresupuesto.innerHTML = dinero;
    const totalRestante = document.querySelector('#restante');
    totalRestante.innerHTML = dinero;
}
