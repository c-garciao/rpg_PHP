<!DOCTYPE html>
<?php
include_once '../funciones_BD.php';
$tabla_Jugadores = "DROP TABLE jugadores";
$tabla_Enemigos = "DROP TABLE enemigos";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p><a href="../index.php">Volver a Admon</a></p>
        <?php
        borrar_tabla($tabla_Jugadores);
        borrar_tabla($tabla_Enemigos);
        exit();
        ?>
        
    </body>
</html>
