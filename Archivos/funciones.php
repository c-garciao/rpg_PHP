<?php

//include_once '../BBDD/funciones_BD.php';

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
        $resultado=$conn;
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
        $resultado=$conn;
        $conn = null;
        return $resultado;
    
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
}
