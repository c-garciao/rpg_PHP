<?php

define("MYSQL_HOST", "mysql:host=localhost");
define("MYSQL_USUARIO", "root");
define("MYSQL_PASSWORD", "");
$dbRPG = "bd_RPG";

function recoge($var) {
    $tmp = (isset($_REQUEST[$var])) ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8")) : "";
    return $tmp;
}

function conectaDb() {
    try {
        $tmp = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $tmp->exec("set names utf8mb4");
        return($tmp);
    } catch (PDOException $e) {
        print "      <p>Error: No puede conectarse con la base de datos.</p>\n";
        print "\n";
        print "      <p>Error: " . $e->getMessage() . "</p>\n";
        print "\n";

        exit();
    }
}

function crear_BD($consultaCreaDb) {
    try {
        $conn = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($consultaCreaDb);
        echo "Se ha creado correctamenta la BD<br>";
    } catch (PDOException $e) {
        echo "Error. No se ha creado la BD:<br>";
        echo $consultaCreaDb . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function borrar_BD() {
    global $dbRPG;
    $conn = conectaDb();
    $consulta = "DROP DATABASE $dbRPG";
    if ($conn->query($consulta)) {
        print "<p>Base de datos borrada correctamente.</p>\n";
        print "\n";
    } else {
        print "<p>Error al borrar la base de datos.</p>\n";
        print "\n";
    }
    $conn = null;
}

function crear_tabla($consulta) {
    global $dbRPG;
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($consulta);
        echo "Se ha creado la tabla correctamente<br/>";
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function borrar_tabla($consulta) {
    try {
        global $dbRPG;
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($consulta);
        echo "Se ha borrado la tabla correctamente<br/>";
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function comprueba_usuario($usuario, $ataque, $defensa) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbRPG.jugadores WHERE nombre=:nombre";
        $conn = $db->prepare($consulta);
        $conn->execute([":nombre" => $usuario]);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            echo 'Se procede al registro';
            $registro = "INSERT INTO $dbRPG.jugadores (nombre, ataque, defensa, enemigos_matados, puntuacion)"
                    . " VALUES (:nombre, :ataque, :defensa, :enemigos_matados, :puntuacion)";
            $conn = $db->prepare($registro);
            if ($conn->execute(array(":nombre" => $usuario, ":ataque" => $ataque, ":defensa" => $defensa, ":enemigos_matados" => 0, ":puntuacion" => 0))) {
                print "<p>Registro <strong> $usuario </strong> creado correctamente.</p>\n";
                $error = "";
                //header("Location:../combate.php");
                header("Location:../intro.php");
            } else {
                print "<p>Error al crear el registro <strong>$usuario</strong>.</p>\n";
            }
            //$conn->execute([":nombre" => $usuario,":ataque" => 100,":defensa" => 100,":enemigos_matados" => 0, ":puntuacion" => 0 ]);
        } else {
            print "<p>Ya existe un usuario con ese nombre</p>\n";
            session_destroy();
            header("Location:../altaUsuario.php?error=Error. El registro ya existe.");
            return FALSE;
        }
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function mejores_puntuaciones() {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbRPG.jugadores WHERE enemigos_matados >= 1";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
            print '<a style=" text-decoration: none;
    background-color: #ff3385;border: 6px solid brown;color: brown;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 18px;font-family: arial;border-radius: 10px; "href="../index.php">Volver</a>';
            exit();
        } else {
            $consulta = "SELECT nombre, enemigos_matados FROM $dbRPG.jugadores WHERE enemigos_matados >= 1 ORDER BY enemigos_matados DESC";
            $resultado = $db->query($consulta);
            return $resultado;
            /* foreach ($resultado as $valores) {
              print "<p>$valores[nombre] $valores[enemigos_matados]</p>\n";
              } */
        }
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function inserta_enemigos() {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // our SQL statements
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Einstein', 90,110 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Darwin', 150,50 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Newton', 45,155 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Curie', 100,100 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Tesla', 190,10 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Pitagoras', 100,100 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Hawking', 195,5 )");
        $conn->exec("INSERT INTO $dbRPG.enemigos (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Dios', 10,190 )");

        //$conn->commit();
        echo "Se han insertado correctamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

function actualizaVida($usuario, $vida) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "UPDATE $dbRPG.jugadores SET defensa=:defensa WHERE nombre='$usuario'";
        $conn = $db->prepare($consulta);
        $conn->execute([":defensa" => $vida]);
        print 'Actualizado';
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function actualizaEnemigos($usuario, $enemigos) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "UPDATE $dbRPG.jugadores SET enemigos_matados=:enemigos WHERE  nombre= '$usuario'";
        $conn = $db->prepare($consulta);
        $conn->execute([":enemigos" => $enemigos]);
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function reponer_vida($usuario, $vida) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "UPDATE $dbRPG.jugadores SET defensa=:vida WHERE  nombre= '$usuario'";
        $conn = $db->prepare($consulta);
        $conn->execute([":vida" => $vida]);
        header("Location:../laboratorio.php");
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function escoge_jefe() {
    $numero = rand(1, 8);
    return $numero;
}

function info_jefe($id) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT  * FROM $dbRPG.enemigos WHERE id_e=:id";
        $conn = $db->prepare($consulta);
        $conn->execute([":id" => $id]);
        $resultado = $conn;
        $conn = null;
        return $resultado;
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
}

function info_usu($nomb) {
    try {
        global $dbRPG;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT  * FROM $dbRPG.jugadores WHERE nombre=:nombre";
        $conn = $db->prepare($consulta);
        $conn->execute([":nombre" => $nomb]);
        $resultado = $conn;
        $conn = null;
        return $resultado;
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
}
