<?php
include 'variables.php';
include 'funciones.php';
$nombre_producto=$_POST['nombre'];
$precio_producto=$_POST['precio'];
$stock_producto=$_POST['stock'];
crearBD();
crearTabla();
grabarProducto($nombre_producto,$precio_producto, $stock_producto );
?>



