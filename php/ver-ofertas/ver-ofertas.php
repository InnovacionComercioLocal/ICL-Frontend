<?php

include("../../conexionBD.php");

$producto = $mysqli->query("SELECT * FROM `reserva`");

if (mysqli_num_rows($producto) > 0) {          
    
    while ($row = $producto->fetch_object()) {
        echo ('
        <!--Product 1-->
        <div class="container border-bottom border-dark d-flex p-1">
            <!--Name product-->
            <div class="container w-100 h-25 text-start p-1">
            <p class="h6"> Fecha de Inicio: '.$row->Fercha_Hora_Inicio.'</p>
            <p class="h6"> Fecha fianl: '.$row->Fercha_Hora_Final.'</p>
            <p class="h6"> Clientes: '.$row->Descripcion.'</p>
            <p class="hide" id="id">'.$row->ID_Reserva.'</p>                        
            </div>
    
            <!--Btn actions-->
            <div class="container w-100 h-25 text-end p-1">
                <button class="btn btn-success"><i class="bi bi-plus-square"></i></button>
                <button class="btn btn-danger" ><i class="bi bi-dash-square"></i></button>
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
