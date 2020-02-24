<?php

//include_once '../Archivos/funciones.php';
include_once '../BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
$vida= $_SESSION["vida_ataque_inicial"][1];
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["imagen_usuario"])) {
    $nombre_usu = $_SESSION["nombre_usuario"];
    $foto_usu = $_SESSION["imagen_usuario"];
} else {
    echo '<h1>Error</h1>';
    exit();
}
if (isset($_SESSION ["personaje"][2])) {
    $vida = $_SESSION ["personaje"][2];
    $ataque = $_SESSION ["personaje"][1];
}
if ($vida == $_SESSION["vida_ataque_inicial"][1]){
    header("Location:../laboratorio.php?error_vida=La vida ya esta al maximo.");
}else {
    print("weeee");
    $vida=$_SESSION ["personaje"][2] = $_SESSION["vida_ataque_inicial"][1];
    reponer_vida($nombre_usu, $vida);
}