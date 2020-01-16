<?php
  include('../conexion.php');
  $idProducto = $_REQUEST['idProducto'];
  $conexiones->exec("DELETE FROM imagenproductos WHERE idProducto='$idProducto'")or die ('Problemas en la Baja del item'.mysqli_error($conexiones));
  $conexiones->exec("DELETE FROM productos WHERE idProducto='$idProducto'")or die ('Problemas en la Baja del inventario'.mysqli_error($conexiones));
  header("Location:../../crudProduct.php");
?>
