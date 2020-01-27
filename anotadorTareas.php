<!DOCTYPE html>
<html lang="en">
<?php include('encabezado.php'); ?>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container">
  <h3 class="mt-2">Anotador de tareas con almacenamiento en el LocalStorage</h3>
  <section class="mt-2">
    <div class="row">
      <div class="col-md-6">
        <form id="formTarea" method="post">
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4">
              <strong>Ingreso de tareas</strong>
          </h5>
          <div class="card-body px-lg-5 pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    <input type="text" class="form-control"  id="tarea" autocomplete="off">
                    <label>Ingresar tarea</label>
                </div>
              </div>
              <div class="col-md-12">
                <button class="btn btn-lg btn-danger" type="submit" id="guardar" value="guardar">Guardar</button>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header danger-color white-text text-center py-4">
              <strong>Lista de tareas</strong>
          </h5>
          <div class="card-body px-lg-5 pt-0">
            <div class="row">
              <div id="lista-tareas">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="js/anotador/anotador.js"></script>
<?php include('pie.php'); ?>
</body>
</html>
