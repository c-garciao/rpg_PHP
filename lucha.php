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
$nombre_jefe = $_SESSION ["jefe"] [0];
$ataque_jefe = intval($_SESSION ["jefe"] [1]);
$vida_jefe = intval($_SESSION ["jefe"] [2]);

$nombre_personaje = $_SESSION ["personaje"] [0];
$ataque_personaje = intval($_SESSION ["personaje"] [1]);
$vida_personaje = intval($_SESSION ["personaje"] [2]);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Combate</title>
    </head>
    <body>
        <?php
        print '<p>La vida del jefe es ' . $vida_jefe . '</p><br/>';
        print '<p>La vida del personaje es ' . $vida_personaje . '</p><br/>';
        echo $_SESSION['personaje'][3];
        while ($vida_jefe > 0 || $vida_personaje > 0) {
            $ataque_j = rand(1, 6) * 10;
            $ataque_p = rand(1, 9) * 10;
            print '<p>####La vida del personaje es ' . $vida_personaje . '####</p><br/>';
            print '<p>####La vida del jefe es ' . $vida_jefe . '####</p><br/>';
            $vida_jefe = $vida_jefe - $ataque_p;
            $vida_personaje = $vida_personaje - $ataque_j;

            print '<h3>El jefe ' . $nombre_jefe . ' ha quitado:' . $ataque_j . '</h3>';
            print '<h3>El personaje ' . $nombre_personaje . ' ha quitado:' . $ataque_p . '</h3>';
            if ($vida_jefe <= 0 || $vida_personaje <= 0) {

                if ($vida_jefe <= 0 && $vida_personaje <= 0) {
                    print '<h1> Empate </h1>';
                    $caraCruz = rand(1, 2);
                    if ($caraCruz == 1) {
                        header("Location:./victoria.php");
                    } else {
                        header("Location:./finDeJuego.php");
                    }
                } elseif ($vida_jefe <= 0) {
                    print '<h1> Vida de jefe a 0</h1>';
                    $_SESSION ["enemigos_muertos"] = intval($_SESSION['personaje'][3]) + 1;
                    $_SESSION ["vida_personaje"] = $vida_personaje;
                    echo $_SESSION['personaje'][3];
                    header("Location:./victoria.php");
                } elseif ($vida_personaje <= 0) {
                    print '<h1> Vida de personaje a 0</h1>';
                    echo $_SESSION['personaje'][3];
                    header("Location:./finDeJuego.php");
                } else {
                    print '<h1> Error inesperado </h1>';
                }

                break;
            }
        }
        ?>
    </body>
</html>
