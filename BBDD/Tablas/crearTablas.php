<?php
include_once '../funciones_BD.php';
$tabla_Jugadores = "CREATE TABLE jugadores (
    id_p INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    ataque INT(3),
    defensa INT(3),
    enemigos_matados INT(3),
    puntuacion INT(3),
    PRIMARY KEY(id_p)
    )";
$tabla_Enemigo = "CREATE TABLE enemigos (
    id_e INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_enemigo VARCHAR(30),
    ataque_enemigo INT(3),
    defensa_enemigo INT(3),
    PRIMARY KEY(id_e)
    )";
$enemigos = "";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p><a href="../index.php">Volver a Admon</a></p>
        <?php
        crear_tabla($tabla_Jugadores);
        crear_tabla($tabla_Enemigo);
        inserta_enemigos();
        exit();
        ?>
    </body>
</html>
