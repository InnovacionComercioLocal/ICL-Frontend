<?php

include("../conexionBD.php");

$producto = $mysqli->query("SELECT * FROM `oferta`");

if (mysqli_num_rows($producto) > 0) {            
    
    while ($row = $producto->fetch_object()) {
        echo ("<!--Producto ".$row->ID_Oferta."-->                  
        <div class='container border border-dark p-2 d-flex my-2 color-White-6 rounded-4 h-25'>
          <img src='media/images/exampleP.j' alt='' class='mx-2 border w-100 h-100'>
          <div class='container border-start border-dark w-100'>
            <p class='text-primary mt-4'>Nombre: '.$row->Nombre.'</p>            
            <p class='text-danger'>Precio: '.$row->Precio.' €</p>
            <p class='hide' id='id'>'.$row->ID_Oferta.'</p>            
          </div>
          
        </div> ");                
    }
    
} else {
    //Mensaje de error
    echo ("No hay ofertas");
}

echo ($mysqli->error);
$mysqli->close();
