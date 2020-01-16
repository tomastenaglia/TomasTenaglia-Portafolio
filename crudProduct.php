<!DOCTYPE html>
<?php include('sql/conexion.php');
include('sql/productos/model.php');
?>
<html lang="en">
<?php include('encabezado.php'); ?>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container">
    <section class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Ingreso de productos</strong>
                    </h5>
                    <div class="card-body px-lg-5 pt-0">
                        <form class="text-center" style="color: #757575;" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="md-form file-field col-md-4 mb-4">
                                   <div class="btn btn-primary btn-sm float-left">
                                     <span>Seleccionar imagen</span>
                                     <input type="file"  name="files[]" multiple="">
                                   </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="text" class="form-control" name="codigo" autocomplete="off">
                                        <label>Codigo</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="text"  class="form-control" name="descripcion" autocomplete="off">
                                        <label>Descripcion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="text"  class="form-control" name="stock" autocomplete="off">
                                        <label>Stock disponible</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="number" class="form-control" name="precio"  step="any" autocomplete="off">
                                        <label>Precio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-md" type="submit" name="guardar">Guardar</button>
                                    <button class="btn btn-danger btn-md" type="reset">Limpiar</button>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['guardar'])) {
                              $sql= insertProducto($_POST['codigo'],$_POST['descripcion'], $_POST['stock'],$_POST['precio']);
                              $conexiones->exec($sql);
                              $idProducto= $conexiones->lastInsertId();
                              $ruta = "img/productos/";
                              $allowTypes = array('jpg','png','jpeg','gif');
                              $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                              if(!empty(array_filter($_FILES['files']['name']))){
                                  foreach($_FILES['files']['tmp_name'] as $num=>$temp ){
                                    $nombreimg = basename($_FILES['files']['name'][$num]);
                                    $rutaguardar = $ruta . $nombreimg;
                                    $fileType = pathinfo($rutaguardar,PATHINFO_EXTENSION);
                                    if(in_array($fileType, $allowTypes)){
                                      // Subir archivo al servidor
                                      if(move_uploaded_file($_FILES["files"]["tmp_name"][$num], $rutaguardar)){
                                      }else{
                                      $errorUpload .= $_FILES['files']['name'][$num].', ';
                                      }
                                    }else{
                                    $errorUploadType .= $_FILES['files']['name'][$num].', ';
                                    }
                                    $insert = $conexiones->query("INSERT INTO imagenproductos(idImagen,nombre,ubicacion,idProducto)
                                    VALUES ('','$nombreimg', 'img/productos/".$nombreimg."', $idProducto)");
                                  }
                                }
                                echo "<script language='javascript'>";
                                echo "alert('El producto se ingreso correctamente');";
                                echo "window.location='crudProduct.php';";
                                echo "</script>";

                              }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-elegant pb-2">
      <div class="card text-center">
        <h3 class="card-header primary-color white-text fondo">Listado de productos</h3>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered table-hover table-striped display AllDataTables" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Imagen</th>
                    <th class="th-sm">Codigo</th>
                    <th class="th-sm">Descripcion</th>
                    <th class="th-sm">Stock</th>
                    <th class="th-sm">Precio</th>
                    <th class="th-sm">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($rowPro = $resultadoProductos->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                    <?php $idProducto= $rowPro ['idProducto']; ?>
                    <td><img src="<?php echo $rowPro['ubicacion']; ?>" style="width: 100px; height: 80px;"></td>
                    <td><?php echo $rowPro ['codigo']; ?></td>
                    <td><?php echo $rowPro ['descripcion']; ?></td>
                    <td><?php echo $rowPro ['stock']; ?></td>
                    <td><?php echo $rowPro ['precio']; ?></td>
                    <td><?php echo "
                    <a  href='crudProductMod.php?idProducto=$idProducto'><i class='far fa-edit'></i></a>
                    <a onClick='pDelete(this);' id='$idProducto'><i class='far fa-trash-alt'></i></a>
                    ";
                    ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <br>
    </section>
</div>
<?php include('pie.php'); ?>
</body>
<script type="text/javascript">

function pDelete(element) {
  if(confirm('Esta seguro que quiere eliminar el producto?'))
    window.location.href = "sql/productos/borrar.php?idProducto=" + element.id;
}

</script>
</html>
