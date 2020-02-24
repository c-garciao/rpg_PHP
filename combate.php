<!DOCTYPE html>
<?php
//include_once './Archivos/funciones.php';
include_once './BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["imagen_usuario"])) {
    $nombre_usu = $_SESSION["nombre_usuario"];
    $foto_usu = $_SESSION["imagen_usuario"];
}
if (!isset($_SESSION["noCombate"])) {
    echo '<h1>Error. Ya perdiste :(</h1>';
    echo '<a href="./index.php">Volver al laboratorio</>';
    exit();
}
if ($_SESSION["noCombate"] == "v") {
    echo '<h1>Error. Ya has combatido</h1>';
    echo '<a href="./laboratorio.php">Volver al laboratorio</>';
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Area 51</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/combateEstilo.css"/>
    </head>
    <body>
        <h1>area 51</h1>
        <?php
        if ($_SESSION["nombre_jefe"] == "nojefe") {
            $jefe = escoge_jefe();
            $info_jefe = info_jefe($jefe);
            $info_usuario = info_usu($nombre_usu);
            foreach ($info_jefe as $jefes) {
                $nombre_jefe = $jefes['nombre_enemigo'];
                $ataque_jefe = $jefes['ataque_enemigo'];
                $defensa_jefe = $jefes['defensa_enemigo'];
                //print "<p>$valores[nombre] $valores[enemigos_matados]</p>\n";}
            }
            foreach ($info_usuario as $inf_usuario) {
                $ataque_usuario = $inf_usuario ['ataque'];
                $defensa_usuario = $inf_usuario ['defensa'];
                $enemigos_derrotados = $inf_usuario ['enemigos_matados'];
            }
            $_SESSION["nombre_jefe"] = $nombre_jefe;
            $_SESSION ["jefe"] = [$nombre_jefe, $ataque_jefe, $defensa_jefe, $jefe];
            $_SESSION ["personaje"] = [$nombre_usu, $ataque_usuario, $defensa_usuario, $enemigos_derrotados];
        }
        ?>
        <div id="contenedor">
            <p><img width="154px"src="./Archivos/Imagenes/Jefes/<?php print $_SESSION ["jefe"][3] ?>.png"/></p>
            <table border="1px solid black">
                <caption>Enemigo</caption>
                <tr>
                    <th>Nombre</th>
                    <!-- Icon made by [https://www.flaticon.com/authors/freepik] from www.flaticon.com  VIDA <img width="26px" src="./Archivos/Imagenes/Iconos/vida.svg">-->
                    <!-- Icon made by [https://www.flaticon.com/authors/smalllikeart] from www.flaticon.com ARMADURA <img width="26px" src="./Archivos/Imagenes/Iconos/armadura.svg"> -->
                    <th>Ataque</th>
                    <th>Vida</th>
                </tr>
                <tr>
                    <td><?php print $_SESSION ["jefe"][0] ?></td>
                    <td><?php print $_SESSION ["jefe"][1] ?></td>
                    <td><?php print $_SESSION ["jefe"][2] ?></td>
                </tr>
            </table>
            <br/>
            <!-- Icon made by [https://www.flaticon.com/authors/freepik] from www.flaticon.com  VIDA-->
            <!-- Icon made by [https://www.flaticon.com/authors/smalllikeart] from www.flaticon.com ARMADURA -->
            <p><img width="154px"src="./Archivos/Imagenes/Personaje/<?php print $foto_usu ?>.png"/></p>
            <table border="1px solid black">
                <caption>Personaje</caption>
                <tr>
                    <th>Nombre</th>
                    <th>Ataque</th>
                    <th>Vida</th>
                    <th>Bajas</th>
                </tr>
                <tr>
                    <td><?php print $nombre_usu ?></td>
                    <td><?php print $_SESSION ["personaje"][1] ?></td>
                    <td><?php print $_SESSION ["personaje"][2] ?></td>
                    <td><?php print $_SESSION ["personaje"][3] ?></td>
                </tr>
            </table>
            <br/>
            <form action="./lucha.php" method="POST">
                <p class="boton"><input type="submit" value="¡Al ataque!"></p>
                    <!--Utilizamos javascript para utilizar el boton como un enlace-->
                <p class="boton"><input type="button" onclick="location.href = './laboratorio.php';" value="Ni de broma. LLevame al pueblo"><br/></p>
            </form>
        </div>
    </body>
</html>