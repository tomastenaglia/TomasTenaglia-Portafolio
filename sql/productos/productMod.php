<?php
  $modificarProducto= $conexiones->query("SELECT * FROM productos as p
  WHERE p.idProducto = $idProducto")
  or die ('No se puede traer listado Productos'.mysqli_error($conexiones));
  $rowMPro = $modificarProducto->fetch(PDO::FETCH_ASSOC);
  $codigo = $rowMPro ['codigo'];
  $descripcion = $rowMPro ['descripcion'];
  $stock = $rowMPro ['stock'];
  $precio = $rowMPro ['precio'];
?>
