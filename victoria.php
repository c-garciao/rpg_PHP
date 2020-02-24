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
    exit();
}
$enemigos = 0;
//$_SESSION["noCombate"] = 0;
$nombre_personaje = $_SESSION ["personaje"] [0];
$enemigos = intval($_SESSION ["enemigos_muertos"]);
$vida_personaje = intval($_SESSION ["vida_personaje"]);
$_SESSION["noCombate"] = "v";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Combate Ganado</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/findejuego.css"/>
    </head>
    <body>
        <h1 class="titulo">Combate Ganado</h1>
        <?php
        print '<p class="texto">La vida del personaje es: ' . $vida_personaje . '</p>';
        print '<p class="texto">HA matado a : ' . $enemigos . ' enemigos</p>';
        unset($_SESSION["nombre_jefe"]);
        $_SESSION["nombre_jefe"] = "nojefe";
        //echo $_SESSION['personaje'][3];
        $_SESSION ["personaje"][2] = $vida_personaje;
        actualizaEnemigos($nombre_personaje, $_SESSION['personaje'][3] + 1);
        $_SESSION['personaje'][3] = $_SESSION['personaje'][3] + 1;
        actualizaVida($nombre_personaje, $vida_personaje);
        ?>
        <br/>
        <a class="boton" href="laboratorio.php">Volver al laboratorio</a>
    </body>
</html>
