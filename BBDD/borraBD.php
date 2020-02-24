<!DOCTYPE html>
<?php
//include_once './funciones_BD.php';
include_once './funciones_BD.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrado BBDD</title>
    </head>
    <body>
        <p><a href="./index.php">Volver</a></p>
        <?php
        borrar_BD();
        exit();
        ?>
    </body>
</html>
