<!DOCTYPE html>
<?php
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["imagen_usuario"])) {
    echo '<h1>Error. Ud ya esta jugando</h1>';
    echo '<a href="./laboratorio.php">Volver al laboratorio</>';
    exit();
}
?>
<!--
    Proyecto realizado por Diego Gonzalez y Carlos Garcia para la asignatura IAW, en el curso escoloar 2018-2019, Teide Quintana
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./Archivos/Estilos/pag_principal.css" title="pag_pcpal"/>
        <script type="text/javascript" src="./Archivos/Script/comprobacion_usuarios.js"></script>
        <title>Pantalla de Inicio.</title>
    </head>
    <body>
        <img src="./Archivos/Imagenes/Fondos/titulo_menu.png"/>
        <div id="menu">
            <div id="OP"><a href="altaUsuario.php" title="Epezar una nueva partida"><p><i>I</i>Nueva Partida<i>I</i></p></a></div>
            <div id="OP"><a href="./BBDD/mejoresPuntuaciones.php" title="Ver mejores partidas"><p><i>C</i>Ranking partidas<i>C</i></p></a></div>
            <div id="OP"><a onclick="acerca_de();"title="Acerca de"><p><i>G</i>Acerca de<i>G</i></p></a></div>
            <div id="OP"><a href="http://www.google.com" onclick="window.close();" title="Abandonar el juego"><p><i>|</i>Salir del juego<i>|</i></p></a></div>
        </div>

    </body>
</html>