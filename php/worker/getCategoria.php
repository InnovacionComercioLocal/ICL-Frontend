<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    //header("location: https://pizzeriagirona.000webhostapp.com/index.html");
    header("location: http://localhost/ICL-Frontend/index.html");
} else {
    include("../conexionBD.php");
    header('Access-Control-Allow-Origin: *');
    $result = $mysqli->query("SELECT * from categoria");
    echo ($mysqli->error);

    while ($row = $result->fetch_object()) {
        echo ($row->Categoria . "/");
    }

    $result->free();
    $mysqli->close();
}
