<?php
include 'Producto.php';
include 'variables.php';
function crearBD()
{
	global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername", $usuario_bd, $pwd_bd);
	$sql="CREATE DATABASE IF NOT EXISTS $nombre_bd";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
function crearTabla()
{
		global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="CREATE TABLE IF NOT EXISTS tienda (id INTEGER AUTO_INCREMENT, 
	nombre varchar(50),precio FLOAT, stock INTEGER, PRIMARY KEY(id))";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

//grabarProducto($nombre_producto,$precio_producto, $stock_producto );
function grabarProducto($nombre_producto,$precio_producto, $stock_producto )
{
		global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="INSERT INTO tienda (nombre, precio, stock) VALUES ('$nombre_producto',
	'$precio_producto', '$stock_producto')";
	$conexion->exec($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
function actualizarStock($id)
{

	global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	echo "nombre:".$nombre_bd;
	echo "Pwd:".$pwd_bd;
	echo "Usuario:".$usuario_bd;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="UPDATE t_productos SET stock=stock-1 where id='$id'";
	
	echo($sql);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion->exec($sql);
	
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
function devolverProductos()
{
	$lista_productos=array() ;
	global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="SELECT * FROM t_productos";
	$resultado=$conexion->query($sql);
	$lista_filas=$resultado->fetchAll();
	for($i=0; $i<count($lista_filas); $i++)
	{
		$fila=$lista_filas[$i];
		$id=$fila['id'];
		$nombre=$fila['nombre'];
		$precio=$fila['precio'];
		$stock=$fila['stock'];
		$producto=new Producto($id, $nombre, $precio, $stock);
		array_push($lista_productos, $producto);
	}
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	

	
	return $lista_productos;
//Conexion
//SELECT
//return de lista de productos
}
function devolverProducto($id)
{
	
	global $nombre_bd,$pwd_bd,$usuario_bd, $servername;
	try {
	$conexion=new PDO("mysql:host=$servername; dbname=$nombre_bd", $usuario_bd, $pwd_bd);
	$sql="SELECT * FROM t_productos where id=$id";
	$resultado=$conexion->query($sql);
	$lista_filas=$resultado->fetchAll();
	
		$fila=$lista_filas[0];
		$id=$fila['id'];
		$nombre=$fila['nombre'];
		$precio=$fila['precio'];
		$stock=$fila['stock'];
		$producto=new Producto($id, $nombre, $precio, $stock);
		
	
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	

	
	return $producto;
//Conexion
//SELECT
//return de lista de productos
}
function pintarTabla($lista_productos)
{
	$aux="<table>";
	for ($i=0; $i<count($lista_productos); $i++)
	{
		$producto=$lista_productos[$i];
		$nombre= $producto->get_nombre();
		$precio= $producto->get_precio();
		$stock= $producto->get_stock();
		$id= $producto->get_id();
		//$aux+=
		$aux.="<tr><td>$nombre</td>
		<td>$precio</td>
		<td>$stock</td>
		<td><a href='comprarproducto.php?id=$id'>Comprar</a></td></tr>";
		
	}
	$aux.="</table>";
	return $aux;
}

function pintarTablaCesta($lista_productos)
{
    
	$aux="<table>";
	for ($i=0; $i<count($lista_productos); $i++)
	{
		$producto=$lista_productos[$i];
		$nombre= $producto->get_nombre();
		$precio= $producto->get_precio();
		$stock= $producto->get_stock();
		$id= $producto->get_id();
		//$aux+=
		$aux.="<tr><td>$nombre</td>
		<td>$precio</td>
		<td>$stock</td>
		<td><a href='devolverproducto.php?id=$id'>Devolver</a></td></tr>";
		
	}
	$aux.="</table>";
	return $aux;
}
?>
