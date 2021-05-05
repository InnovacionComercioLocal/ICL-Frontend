<?php
$nombre = $_POST['nombre'];


session_start();


include("../conexionBD.php");

$email = $_SESSION['usuario']['email'];


$check = $mysqli->query("SELECT * FROM usuario WHERE usuario.Email='$email' ");

//Check password
$row = $check->fetch_object();

if (mysqli_num_rows($check) > 0) {




    //  $passwordCrypt = password_hash($passNueva, PASSWORD_DEFAULT);

    $sql = $mysqli->query("UPDATE usuario SET Nombre = '$nombre' WHERE Email = '$email'");


    header("Location: ../../editarPerfil.php?ncorrecto");
} else {
    echo "Error";
}
