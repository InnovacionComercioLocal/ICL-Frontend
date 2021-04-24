<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/ICL-Frontend/index.html");
} else {
    include("../conexionBD.php");
    $result = $mysqli->query("SELECT * from categoria");
    echo ($mysqli->error);

    while ($row = $result->fetch_object()) {
        echo ($row->Categoria . "/");
    }

    $result->free();
    $mysqli->close();
}
