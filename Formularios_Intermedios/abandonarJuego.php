<!DOCTYPE html>
<?php
session_name("ses_RPG");
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Salir del juego</title>
        <link rel="stylesheet" type="text/css"href="../Archivos/Estilos/findejuego.css"/>
    </head>
    <body>
        <div id="contenedor">
            <h1 class="titulo2">¿Estás seguro de querer abandonar el juego?</h1>
            <h2 class="subtitulo">No se podrá volver a jugar con esta cuenta</h2>
            <form method="POST" action="./cierraJuego.php">
                <input type="submit" value="Si">
                <input type="button" onclick="location.href = '../laboratorio.php';" value="No"><br/>
            </form>
        </div>
    </body>
</html>
