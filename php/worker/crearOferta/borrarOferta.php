<?php

include("../php/conexionBD.php");

// //id de la oferta
// $valor = $_GET['valor'];

// //se borra la oferta de la bd
// if ($valor) {
//     $sql = $mysqli->query("DELETE FROM oferta WHERE ID_Oferta='$valor' ");
//     echo ($mysqli->error);
//     //header("location: crear-oferta.php");
//     header("location: ../../../workers/crear-oferta.php");
// }

session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION['usuario']['ID_Role'] == '2')) {
    header("location: http://localhost/workers/crear-oferta.php");
}
include("../../../php/conexionBD.php");

$id = $_GET['idOferta'];

$usuarioUpdated = $mysqli->query("DELETE FROM oferta WHERE oferta.ID_Oferta=$id");
echo ($mysqli->error);
if (!$mysqli->error) {
    header("location: ../../../workers/crear-oferta.php");
}
$mysqli->close();
