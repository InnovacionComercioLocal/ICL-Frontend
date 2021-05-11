<?php

include("../php/conexionBD.php");

//id de la oferta
$valor = $_GET['valor'];

//se borra la oferta de la bd
if ($valor) {
    $sql = $mysqli->query("DELETE FROM oferta WHERE ID_Oferta='$valor' ");
    echo ($mysqli->error);
    header("location: crear-oferta.php");
}
