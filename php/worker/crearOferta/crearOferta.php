<?php

include("../../conexionBD.php");

$nombre = $_GET['nombre'];
$precio = $_GET['precio'];

$comprobacion = $mysqli->query("SELECT * from oferta WHERE oferta.Nombre='$nombre'");

if (mysqli_num_rows($comprobacion) <= 0) {

    //creamos una nueva oferta
    $result = $mysqli->query("INSERT INTO oferta (Nombre,Precio) VALUES ('$nombre','$precio')");
    echo ($mysqli->error);

    //header("location:../../../workers/crear-oferta.html");
    echo(0);
} else {
    //Mensaje de error
    echo(1);
    //echo ("<div id='Div1'><span style='color: red;' >Esa oferta ya existe</span></div> ");
}

echo ($mysqli->error);
$mysqli->close();
