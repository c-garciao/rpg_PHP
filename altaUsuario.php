<!DOCTYPE html>
<?php
include_once './BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
$error = recoge("error");
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["imagen_usuario"])) {
    echo '<h1>Error. Ud ya esta jugando</h1>';
    echo '<a href="./laboratorio.php">Volver al laboratorio</>';
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de usuario</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/menuEstilo.css"/>
        <script type="text/javascript" src="Archivos/Script/comprobacion_usuarios.js"></script>
    </head>
    <body>
        <div id="contenedor">
            <form action="./Formularios_Intermedios/alta_usuario.php" method="POST" onsubmit=" return compruebaNombre()">
                <fieldset>
                    <h1>Seleccion B personaje:</h1>
                    <div class="salud">
                    <p class="vida1">Vida: 50 | Ataque: 150</p>
                    <p class="vida2"">Vida: 120 | Ataque: 80</p>
                    <p class="vida3">Vida: 30 | Ataque: 170</p>
                    </div>
                    <span id="muestra_error"></span><br/>
                    <p>
                        <label for="p1">

                            <img class="imagenes_p" src="./Archivos/Imagenes/Personaje/p_1.png"/>
                            <input type="radio" name="foto_p" id="p1" value="p_1"/>
                        </label>
                        <!--<br/>-->
                        <label for="p2">
                            <img class="imagenes_p" src="Archivos/Imagenes/Personaje/p_2.png"/>
                            <input type="radio" name="foto_p" checked="true" id="p2" value="p_2"/>
                        </label>
                        <label for="p3">
                            <img class="imagenes_p" src="Archivos/Imagenes/Personaje/p_3.png "/>
                            <input type="radio" name="foto_p" id="p3" value="p_3"/>
                        </label>
                    </p>
                    <p><input type="text" autofocus="true" placeholder="Nombre de usuario" name="usuario_nombre" id="nombre_usuario" maxlength="15"/><br/></p>
                    <?php
                    if ($error != "") {
                        print '<p class="error">' . $error . '</p>';
                    }
                    ?>
                    <p><input type="submit" value="Jugar"><input type="reset"value="Borrar"></p>
                    <p id="boton" ><a href="./index.php">Volver al índice</a></p>
                </fieldset>
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
