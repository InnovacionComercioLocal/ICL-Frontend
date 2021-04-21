<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/Proyecto/Web_Cliente/php/auth/index.html");
} else {
    include("../conexionBD.php");
    $result = $mysqli->query("SELECT * from provincia");
    echo ($mysqli->error);

    while ($row = $result->fetch_object()) {
        echo ($row->ID_Provincia . " / " . $row->Provincia . "//");
    }

    $result->free();
    $mysqli->close();
}

?>