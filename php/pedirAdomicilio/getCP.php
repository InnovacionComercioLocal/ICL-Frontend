<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/ICL-Frontend/index.html");
    //header("location: https://pizzeriagirona.000webhostapp.com/index.html");
}
include("../conexionBD.php");
//Permissons
header('Access-Control-Allow-Origin: *');
$idMunicipio = $_GET['Municipio'];

$result = $mysqli->query("SELECT * FROM cp WHERE cp.ID_Municipio = '$idMunicipio'");
echo ($mysqli->error);


while ($row = $result->fetch_object()) {
    echo ($row->CP . " / " . $row->ID_Municipio . "//");
}

$result->free();
$mysqli->close();
?>