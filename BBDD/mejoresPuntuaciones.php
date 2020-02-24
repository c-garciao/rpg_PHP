<!DOCTYPE html>
<html>
    <head>
        <title>Mejores puntuaciones</title>
        <link rel="stylesheet" type="text/css"href="../Archivos/Estilos/findejuego.css"/>
    </head>
    <?php
    include_once './funciones_BD.php';
    $puntuaciones = mejores_puntuaciones();
    ?>
    <h1 class="titulo"> Mejores puntuaciones </h1>
    
    <table>
        <tr>
            <th>Jugador</th>
            <th>Puntuación</th>
        </tr>
        <?php
        foreach ($puntuaciones as $valores) {
            /*if ($valores[enemigos_matados] == 0) {
                print '<h1>No hay</h1>';
                break;
            } else {*/
                print "<tr><td>$valores[nombre]</td>";
                print "<td>$valores[enemigos_matados]</td></tr>";
                //print "<p>$valores[nombre] $valores[enemigos_matados]</p>\n";}
            //}
        }
        ?>
    </table>
    <br/>
    <a class="boton" href="../index.php">Volver</a>
</html>
