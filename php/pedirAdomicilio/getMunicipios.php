<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: http://localhost/ICL-Frontend/index.php");
    //header("location: https://pizzeriagirona.000webhostapp.com/index.html");
}
include("../conexionBD.php");
//Permissons
header('Access-Control-Allow-Origin: *');
$idProvincia = $_GET['idProvincia'];

$result = $mysqli->query("SELECT * from municipio WHERE municipio.ID_Provincia=$idProvincia");
echo ($mysqli->error);

while ($row = $result->fetch_object()) {
    echo ($row->ID_Municipio . " / " . $row->Municipio . " / " . $row->ID_Provincia . "//");
}

$result->free();
$mysqli->close();
?>