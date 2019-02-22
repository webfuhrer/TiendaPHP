<?php
class Producto
{	
	public function __construct($id, $nombre, $precio,$stock ) {
		$this->id=$id;
        $this->nombre = $nombre;
        $this->precio = $precio;
		$this->stock = $stock;
    }
	
	public function set_nombre($nombre)
	{
	$this->nombre=$nombre;
	}
	public function set_id($id)
	{
	$this->id=$id;
	}
	public function get_id()
	{
	return $this->id;
	}
	public function set_precio($precio)
	{
	$this->precio=$precio;
	}
	public function set_stock($stock)
	{
	$this->stock=$stock;
	}
	
	public function get_nombre()
	{
	return $this->nombre;
	}
	public function get_precio()
	{
	return $this->precio;
	}
	public function get_stock()
	{
	return $this->stock;
	}
}
?>