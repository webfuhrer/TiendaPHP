<?php
include 'funcionesProducto.php';
session_start();
$productos=$_SESSION['productos'];

$id_producto=$_GET['id'];
$producto=devolverProducto($id_producto);
array_push($productos, $producto);
$_SESSION['productos']=$productos;
echo($id_producto);
actualizarStock($id_producto);
header('Location: comprar.php');

?>