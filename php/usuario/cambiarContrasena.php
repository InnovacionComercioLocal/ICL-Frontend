<?php
$passActual = $_POST['passActual'];
$passNueva = $_POST['passNueva'];
$passNueva2 = $_POST['passNueva2'];

session_start();


include("../conexionBD.php");

$email = $_SESSION['usuario']['email'];


$check = $mysqli->query("SELECT * FROM usuario WHERE usuario.Email='$email' ");

//Check password
$row = $check->fetch_object();

if (password_verify($passActual, $row->Password)) {

    if ($passNueva != $passNueva2) {
        echo "las pass no son iguales";
        echo "<p>no son iguales</p>";
        header("Location: ../../editarPerfil.php?error=1");
    } else if ($passNueva == $passNueva2) {


        $passwordCrypt = password_hash($passNueva, PASSWORD_DEFAULT);

        $sql = $mysqli->query("UPDATE usuario SET Password = '$passwordCrypt' WHERE Email = '$email'");


        header("Location: ../../editarPerfil.php?correcto=1");
    }
} else {
    echo "Contraseña actual incorrecta";
}
