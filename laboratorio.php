<!DOCTYPE html>
<?php
//include_once './Archivos/funciones.php';
include_once './BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
$error = recoge("error_vida");
//$_SESSION["noCombate"] = 0;
$_SESSION["noCombate"] = "f";
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
    $bajas = $_SESSION['personaje'][3];
} elseif (isset($_SESSION["vida_ataque_inicial"])) {
    $ataque = $_SESSION["vida_ataque_inicial"] [0];
    $vida = $_SESSION["vida_ataque_inicial"][1];
    $bajas=0;
} else {
    echo '<h1>Error</h1>';
    exit();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Laboratorio</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/laboratorioestilo.css"/>
    </head>
    <body>
        <img class="personaje" src="./Archivos/Imagenes/Personaje/<?php print $foto_usu ?>.png"/>
        <p class="info">Alias: <?php print $nombre_usu ?></p>
        <p class="info">Vida: <?php print $vida ?> Ataque: <?php print $ataque ?> Bajas: <?php print $bajas ?></p>
        <?php
        if ($error != "") {
            print '<p class="error_vida">' . $error . '</p>';
            $error="";
        }
        ?>
        
        <div class="contenedor">
            <p>
                <a href="#" class="boton1"title="Tienda">Tienda</a>
                <a href="./Formularios_Intermedios/actualizarVida.php" class="boton2" title="Reponer Salud">Reponer Salud</a>
            </p>
            <p>
                <a href="combate.php" class="boton3" title="Area 51">Area 51</a>
                <a href="./Formularios_Intermedios/abandonarJuego.php" title="Salir"class="boton4">Salir</a>
            </p>
        </div>		
    </body>
</html>