<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    //header("location: http://localhost/ICL-Frontend/index.html");
    header("location: https://pizzeriagirona.000webhostapp.com/index.html");
} else {
    include("../conexionBD.php");
    header('Access-Control-Allow-Origin: *');
    $result = $mysqli->query("SELECT * from provincia");
    echo ($mysqli->error);

    while ($row = $result->fetch_object()) {
        echo ($row->ID_Provincia . " / " . $row->Provincia . "//");
    }

    $result->free();
    $mysqli->close();
}

?>