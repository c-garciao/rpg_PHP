<!DOCTYPE html>
<?php
include_once './BBDD/funciones_BD.php';
session_name("ses_RPG");
session_start();
if (isset($_SESSION["nombre_usuario"])) {
    $nombre_usu = $_SESSION["nombre_usuario"];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Introducción de Historia</title>
        <link rel="stylesheet" type="text/css"href="./Archivos/Estilos/introEstilo.css"/>
    </head>
    <body>
        <div class="degradado"></div>
        <section class="letra">
            <div class="crawl">
                <div class="title">
                    <p><strong>bienvenid@ <?php print $nombre_usu ?></strong></p>
                    <p>a una nueva aventura</p>
                    <h1>Physicist Punches </h1>
                    <a href="laboratorio.php">Ir al laboratorio</a>
                </div>

                <p>Tras una explosión nuclear que ha asolado al mundo los científicos se revelaron contra toda forma de vida, ungidos por el poder que les había otorgado la ciencia se convirtieron en heraldos de la muerte sedientos de guerra y sangre.</p>
                <p>Fueron meses de batalla hasta que se les consiguió confinar en la terrorífica área 51, allí recluidos esperan con ansias nuevos combatientes que sacien su necesidad de batalla, muchos son los valiente que se adentran en el área 51 buscando derrotarlos pero pocos son los que salen con vida.</p>
                <p>La pelota ahora esta en tu tejado, tras años formandote como guerrero de la ciencia, has llegado a dominar todo los espectro de la física y emprendes una aventura para convertirte en el físico definitivo...</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <a href="laboratorio.php"><p class="boton">comenzar la aventura</p></a>
            </div>
        </section>	
    </body>
</html>