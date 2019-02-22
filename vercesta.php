<!DOCTYPE html>

<?php
include 'funcionesProducto.php';
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        $productos=$_SESSION['productos'];
        $tabla_cesta= pintarTablaCesta($productos);
        //1,2,1,1,3,1
        echo $tabla_cesta;
        ?>
    </body>
</html>
