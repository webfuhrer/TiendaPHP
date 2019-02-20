<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="loginregistro.php" method="POST">
           Usuario: <input type="text" name="usuario">
           Password: <input type="password" name="password">
           <input type="hidden" name="accion" value="login">
            <input type="button" value="Enviar" onclick="submit();">
        </form>
        
        <h1>Registro</h1>
        <form action="loginregistro.php" method="POST">
            Nombre:  <input type="text" name="nombre">
             Usuario: <input type="text" name="usuario">
            Password: <input type="password" name="password">
            <input type="hidden" name="accion" value="registro">
            <input type="button" value="Enviar" onclick="submit();">
        </form>
    </body>
</html>
