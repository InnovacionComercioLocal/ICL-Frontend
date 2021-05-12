<?php

include("../php/conexionBD.php");

session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION['usuario']['ID_Role'] == '2')) {
    header("location: http://localhost/workers/crear-oferta.php");
}
include("../../../php/conexionBD.php");

//id de la oferta
$id = $_GET['idOferta'];

//se borra la oferta
$usuarioUpdated = $mysqli->query("DELETE FROM oferta WHERE oferta.ID_Oferta=$id");
echo ($mysqli->error);
if (!$mysqli->error) {
    header("location: ../../../workers/crear-oferta.php");
}
$mysqli->close();
