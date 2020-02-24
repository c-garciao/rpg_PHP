<?php
session_name("ses_RPG");
session_start();
include_once '../BBDD/funciones_BD.php';

$nombre_usu = recoge("usuario_nombre");
$foto_usu = recoge("foto_p");
$tipo_personaje = recoge("foto_p");
if ($tipo_personaje == "p_1") {
    $ataque = 50;
    $defensa = 150;
} elseif ($tipo_personaje == "p_2") {
    $ataque = 80;
    $defensa = 120;
} elseif ($tipo_personaje == "p_3") {
    $ataque = 170;
    $defensa = 30;
} else {
    $ataque = 100;
    $defensa = 100;
}
//print $nombre_usu;
$_SESSION["nombre_usuario"] = $nombre_usu;
$_SESSION["imagen_usuario"] = $foto_usu;
$_SESSION["vida_ataque_inicial"] = [$ataque, $defensa];
$_SESSION["nombre_jefe"] = "nojefe";
//$_SESSION["nombre_usuario"][] = $nombre_usu;
comprueba_usuario($nombre_usu, $ataque, $defensa);
