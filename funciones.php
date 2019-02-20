<?php
include 'variables.php';

function  crearUsuario($nombre,$usuario,$password )
{
    global $servername, $nombre_bd, $password_bd, $usuario_bd;
    $dsn="mysql:host=$servername; dbname=$nombre_bd";
    $conexion=new PDO($dsn, $usuario_bd, $password_bd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $pwd_hash= password_hash($password,PASSWORD_DEFAULT );
        $sql="INSERT INTO t_usuarios(usuario, nombre, password) VALUES('$usuario', '$nombre','$pwd_hash')";
        $conexion->exec($sql);
        
     } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function comprobarUsuario( $usuario, $password)
{
        global $servername, $nombre_bd, $password_bd, $usuario_bd;
    $dsn="mysql:host=$servername; dbname=$nombre_bd";
    $conexion=new PDO($dsn, $usuario_bd, $password_bd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT password from t_usuarios WHERE usuario='$usuario'";
    try{
        $resultado=$conexion->query( $sql);
        $array_filas=$resultado->fetchAll();
        if ($array_filas==0){return false;}
        $hash_pwd_usuario=$array_filas[0]['password'];
        return password_verify($password, $hash_pwd_usuario);
    
     } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

