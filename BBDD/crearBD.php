<?php
include_once './funciones_BD.php';


$dbRPG = "bd_RPG";
// Consultas
$consultaCreaDb = "CREATE DATABASE $dbRPG
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci";
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Creacion BBDD</title>
    </head>
    <body>
        <p><a href="./index.php">Volver</a></p>
        <?php
        conectaDb();
        crear_BD($consultaCreaDb);
        exit();
        ?>
    </body>
</html>
