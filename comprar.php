<?php
include 'variables.php';
include 'funcionesProducto.php';//Aquí ya está incluido Producto.php
session_start();
$usuario=$_SESSION['usuario'];
$productos=$_SESSION['productos'];
$lista_productos=devolverProductos();
$texto_tabla=pintarTabla($lista_productos);

?>
<html>
<head>

</head>
<body>
    <h1>Bienevnido, <?php echo $usuario?>.Hay <?php echo count($productos);?> productos.   </h1>
    <a href="vercesta.php">Ver cesta</a>
<?php 
echo $texto_tabla;
?>
</body>
</html>