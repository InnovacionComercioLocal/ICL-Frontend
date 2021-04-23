<?php

$email = $_POST['email'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];


include("../conexionBD.php");
$comprobacion = $mysqli->query("SELECT * from usuario WHERE usuario.Email='$email'");
if (mysqli_num_rows($comprobacion) <= 0) {
    if ($_POST['password'] == $_POST['ConfirmarPassword']) {
        $passwordCrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $mysqli->query("INSERT INTO usuario (Nombre,Telefono,Password,Email) VALUES ('$nombre','$telefono','$passwordCrypt','$email')");
        echo ($mysqli->error);
        session_start();
        $_SESSION["usuario"] = $_POST["email"];
        $mysqli->query("UPDATE usuario SET validado=1 WHERE usuario.Email ='$email'");
        echo ($mysqli->error);
        header("location:../../index.html");
    } else {
        echo ("<div id='Div1'><span style='color: red;' > Las Contraseñas deben ser iguales</span></div> ");
    }
} else {
    echo ("<div id='Div1'><span style='color: red;' >Este email ya esta registrado</span></div> ");
}

echo ($mysqli->error);
$mysqli->close();
