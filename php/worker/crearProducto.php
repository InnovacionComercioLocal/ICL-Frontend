<?php

include("../conexionBD.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$categoria = $_POST['Categoria'];

$comprobacion = $mysqli->query("SELECT * from producto WHERE producto.Nombre='$nombre'");

if (mysqli_num_rows($comprobacion) <= 0) {

    //sacamos la fila donde esta el id de categoria
    $idCat = $mysqli->query("SELECT * FROM categoria WHERE categoria.Categoria='$categoria'");

    //extraemos los valores de idCat para poder insertar un producto con el id de categoria
    $row = $idCat->fetch_object();

    //creamos un nuevo producto
    $result = $mysqli->query("INSERT INTO producto (Nombre,Precio,img,ID_Categoria) VALUES ('$nombre','$precio','$imagen','$row->ID_Categoria')");
    echo ($mysqli->error);

    header("location:../../workers/crear-producto.html");
} else {
    //Mensaje de error
    echo ("<div id='Div1'><span style='color: red;' >Ese producto ya existe</span></div> ");
}

echo ($mysqli->error);
$mysqli->close();
