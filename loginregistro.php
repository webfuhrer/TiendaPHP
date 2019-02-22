<?php
include 'funciones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$accion=$_POST['accion'];
if ($accion=='login')
{
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $usuario_correcto=comprobarUsuario( $usuario, $password);
    if ($usuario_correcto)
    {
        session_start();
        $_SESSION['usuario']=$usuario;
        $productos=array();
        $_SESSION['productos']=$productos;
        header("Location: comprar.php");
    }
    else {
         header("Location: index.php");
    }
    
}
else if ($accion=='registro')
{
    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    crearUsuario($nombre,$usuario,$password  );
    header("Location: index.php");
}

