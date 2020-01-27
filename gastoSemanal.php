<!DOCTYPE html>
<html lang="en">
<?php include('encabezado.php'); ?>
<link href="css/custom.css" rel="stylesheet">
</head>
<body>
<?php include('menu.php'); ?>
<div class="container">
  <section class="form-elegant pb-2">
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="card text-center">
          <h3 class="card-header danger-color white-text fondo  contenido primario">Añade tus gastos aqui</h3>
            <div class="card-body contenido primario">
              <form id="agregar-gasto" action="#">
                <div class="form-group">
                  <label for="gasto">Gasto:</label>
                    <input type="text" class="form-control" id="gasto" placeholder="Nombre Gasto">
                </div>
                <div class="form-group">
                  <label for="cantidad">Cantidad:</label>
                  <input type="text" class="form-control" id="cantidad" placeholder="Cantidad en $">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-center">
            <h3 class="card-header info-color white-text fondo">Listado de gastos</h3>
              <div class="card-body">
                <div class="contenido secundario">
                    <div id="gastos">
                        <ul class="list-group"></ul>
                    </div>
                    <div id="presupuesto" class="presupuesto">
                      <div class="alert alert-primary">
                        <p>Presupuesto: $ <span id="total"></span> </p>
                      </div>
                      <div class="restante alert alert-success">
                        <p>Restante: $ <span id="restante"></span></p>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="js/app.js"></script>
<?php include('pie.php'); ?>
</body>
</html>
