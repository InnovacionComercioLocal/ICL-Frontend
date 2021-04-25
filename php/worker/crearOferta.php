<?php

include("../conexionBD.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$comprobacion = $mysqli->query("SELECT * from oferta WHERE oferta.Nombre='$nombre'");

if (mysqli_num_rows($comprobacion) <= 0) {

    //creamos una nueva oferta
    $result = $mysqli->query("INSERT INTO oferta (Nombre,Precio) VALUES ('$nombre','$precio')");
    echo ($mysqli->error);

    header("location:../../workers/crear-oferta.html");
} else {
    //Mensaje de error
    echo ("<div id='Div1'><span style='color: red;' >Esa oferta ya existe</span></div> ");
}

echo ($mysqli->error);
$mysqli->close();
