<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/ICL-Frontend/index.html");
<<<<<<< HEAD
    //header("location: https://pizzeriagirona.000webhostapp.com/index.html");
=======
    // header("location: https://pizzeriagirona.000webhostapp.com/index.html");
>>>>>>> 7fae00c941bbb2f8dd41184c98bc23467d870e78
} else {
    include("../conexionBD.php");
    // header('Access-Control-Allow-Origin: *');
    $result = $mysqli->query("SELECT * from provincia");
    echo ($mysqli->error);

    while ($row = $result->fetch_object()) {
        echo ($row->ID_Provincia . " / " . $row->Provincia . "//");
    }

    $result->free();
    $mysqli->close();
}
