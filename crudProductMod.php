<!DOCTYPE html>
<?php
include('sql/conexion.php');
$idProducto = $_REQUEST['idProducto'];
include('sql/productos/model.php');
include('sql/productos/productMod.php');
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
                        <strong>Modificar producto</strong>
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
                                        <input type="text" class="form-control" name="codigo"  value="<?php echo $codigo; ?>">
                                        <label>Codigo</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="text"  class="form-control" name="descripcion"  value="<?php echo $descripcion; ?>">
                                        <label>Descripcion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="text"  class="form-control" name="stock" value="<?php echo $stock; ?>">
                                        <label>Stock disponible</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="number" class="form-control" name="precio"  step="any" value="<?php echo $precio; ?>">
                                        <label>Precio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-md" type="submit" name="guardar">Guardar</button>
                                    <a href="crudProduct.php" class="btn btn-danger btn-md" >Cancelar</a>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['guardar'])) {
                              $sql= updateProducto($_POST['codigo'],$_POST['descripcion'], $_POST['stock'],$_POST['precio'],$idProducto);
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
</div>
<?php include('pie.php'); ?>
</body>
</html>
