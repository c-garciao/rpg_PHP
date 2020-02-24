<!DOCTYPE html>
<?php
//include_once './Archivos/funciones.php';
include_once './BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["imagen_usuario"])) {
    $nombre_usu = $_SESSION["nombre_usuario"];
    $foto_usu = $_SESSION["imagen_usuario"];
} else {
    echo '<h1>Error</h1>';
    echo '<a href="./index.php">Volver al menu</>';
    exit();
}
$_SESSION["noCombate"] = "p";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Game Over</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/findejuego.css"/>
    </head>
    <body>
        <h1 class="titulo">Game Over</h1>
        <?php
            $aleatorio = rand(1, 7);
            print '<img src="./Archivos/Imagenes/Jefes/Animaciones/' . $aleatorio . '.gif" />';
        ?>
        <form action="index.php" method="POST">
            <p><input type="submit" value="Volver al menu"></p>
        </form>
        <?php
        session_destroy();
        ?>
    </body>
</html>