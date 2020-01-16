<?php

function insertProducto($codigo,$descripcion,$stock,$precio) {
  $sqlProducto="INSERT INTO productos (codigo,descripcion,stock,precio)
  VALUES ('$codigo','$descripcion','$stock','$precio')";
  return $sqlProducto;
}

$resultadoProductos= $conexiones->query("SELECT * from productos as pro
inner join imagenproductos as ip on ip.idProducto=pro.idProducto
GROUP by pro.idProducto")
or die ('No se puede traer listado de propiedades'.mysqli_error($conexiones));

function updateProducto($codigo,$descripcion,$stock,$precio,$idProducto){
  $sqlProductoModificar="UPDATE productos SET
  codigo = '$codigo',
  descripcion = '$descripcion',
  stock = '$stock',
  precio = '$precio'
  WHERE idProducto='$idProducto'";
  return $sqlProductoModificar;
}

?>
