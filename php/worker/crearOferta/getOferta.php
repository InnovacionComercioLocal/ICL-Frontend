<?php

include("../../conexionBD.php");

$producto = $mysqli->query("SELECT * FROM `oferta`");

if (mysqli_num_rows($producto) <= 0) {       
    $row = $producto->fetch_array();

    for ($i=0; $i < $producto->num_rows; $i++) { 
        echo ('
        <!--Product 1-->
        <div class="container border-bottom border-dark d-flex p-1">
            <!--Name product-->
            <div class="container w-100 h-25 text-start p-1">
            <p class="h5"> Nombre: '.$row["Nombre"].'</p>
            <p class="h5"> Precio: '.$row["Precio"].'</p>
            </div>
    
            <!--Btn actions-->
            <div class="container w-100 h-25 text-end p-1">
                <button class="btn btn-success"><i class="bi bi-plus-square"></i></button>
                <button class="btn btn-danger"><i class="bi bi-dash-square"></i></button>
            </div>
        </div>
        ');        
    }
    
} else {
    //Mensaje de error
    echo ("No hay ofertas");
}

echo ($mysqli->error);
$mysqli->close();
